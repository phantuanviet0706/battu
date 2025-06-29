FROM php:8.2-apache

# CÀI ĐẶT WKHTMLTOPDF VÀ CÁC THƯ VIỆN BẮT BUỘC
# Thêm các dependency của wkhtmltopdf (font, xrender, jpeg)
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libfontconfig1 \
    libxrender1 \
    libjpeg62-turbo \  # Gói thay thế cho libjpeg-turbo8 trên Debian
    wkhtmltopdf && \
    rm -rf /var/lib/apt/lists/*

# CÀI ĐẶT CÁC EXTENSION PHP VÀ CÔNG CỤ CƠ BẢN
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    # Xóa cache apt sau khi cài đặt để giảm kích thước image
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_mysql zip

# CÀI ĐẶT COMPOSER
# Sử dụng multi-stage build để lấy Composer binary
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# CẤU HÌNH VÀ CHẠY ỨNG DỤNG PHP/LARAVEL
# Đặt thư mục làm việc chính
WORKDIR /var/www

# Sao chép các file composer.json và composer.lock trước để tận dụng Docker cache
# Nếu chỉ code thay đổi (không phải dependencies), Composer install sẽ không chạy lại
COPY composer.json composer.lock ./

# Cài đặt các package của Composer
RUN composer install --no-dev --optimize-autoloader

# Sao chép toàn bộ mã nguồn ứng dụng (trừ những gì bị .dockerignore bỏ qua)
COPY . .

# Set Apache DocumentRoot trỏ vào thư mục public của Laravel
# (Chỉ làm nếu cấu trúc Laravel của bạn nằm ở thư mục gốc /var/www và public là sub-folder)
RUN sed -i 's#/var/www/html#/var/www/public#g' /etc/apache2/sites-available/000-default.conf

# Set quyền đúng cho thư mục storage và bootstrap/cache của Laravel
# Đảm bảo user www-data (mà Apache chạy) có quyền ghi
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Bật mod_rewrite cho Apache (Laravel cần rewrite URL)
RUN a2enmod rewrite

# Mở port 80 cho web server
EXPOSE 80

# Lệnh chạy Apache khi container khởi động
CMD ["apache2-foreground"]