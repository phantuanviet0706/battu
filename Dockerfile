FROM php:8.2-apache

# Cài extension PHP bắt buộc cho Laravel
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Copy source code vào /var/www
COPY . /var/www

# Set Apache DocumentRoot trỏ vào thư mục public
RUN sed -i 's#/var/www/html#/var/www/public#g' /etc/apache2/sites-available/000-default.conf

# Set quyền đúng cho storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Copy composer từ image composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ----------------------------------------------------------
FROM php:8.2-apache

# Cài đặt wkhtmltopdf và các dependencies cần thiết
# 1. Cập nhật apt package lists
# 2. Cài đặt các dependencies cơ bản cho wkhtmltopdf:
#    - libfontconfig1: Hỗ trợ font chữ
#    - libxrender1: Hỗ trợ render X11 (cần cho headless rendering)
#    - libjpeg62-turbo: Thư viện JPEG thay thế cho libjpeg-turbo8
#    - wkhtmltopdf: Gói chính
# 3. Xóa cache của apt để giảm kích thước image
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libfontconfig1 \
    libxrender1 \
    libjpeg62-turbo \
    wkhtmltopdf && \
    rm -rf /var/lib/apt/lists/*

# Các cài đặt PHP và Apache khác (giữ nguyên nếu có)
# Ví dụ: enable rewrite module, cài đặt các extension PHP
RUN a2enmod rewrite

# ----------------------------------------------------------

# Move vào thư mục /var/www và install packages
WORKDIR /var/www
RUN composer install --no-dev --optimize-autoloader

# Bật mod_rewrite cho Apache (Laravel cần rewrite URL)
RUN a2enmod rewrite

# Mở port 80
EXPOSE 80

# Lệnh chạy Apache
CMD ["apache2-foreground", "python", "app.py"]
