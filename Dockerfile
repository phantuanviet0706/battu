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

# Move vào thư mục /var/www và install packages
WORKDIR /var/www
RUN composer install --no-dev --optimize-autoloader

FROM php:8.1-fpm-bullseye

# Cài đặt extension và gói phụ thuộc PHP cần thiết (giữ nguyên phần này nếu có)
# RUN docker-php-ext-install pdo pdo_mysql ...

# Cài đặt Composer (giữ nguyên nếu đã có)
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cài đặt wkhtmltopdf 0.12.6 (phiên bản ổn định với patched Qt)
RUN apt-get update && apt-get install -y --no-install-recommends \
    fontconfig fontconfig-config fonts-dejavu-core libxrender1 \
    libfontconfig1 libfreetype6 libjpeg62-turbo libpng16-16 \
    libx11-6 libxcb1 libxdmcp6 libxext6 xfonts-75dpi xfonts-base wget && \
    rm -rf /var/lib/apt/lists/*

ENV DEBIAN_CODENAME=bullseye

RUN wget -O wkhtmltox.deb "https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.${DEBIAN_CODENAME}_amd64.deb" && \
    dpkg -i wkhtmltox.deb && apt-get install -f -y && \
    rm -f wkhtmltox.deb

# Bật mod_rewrite cho Apache (Laravel cần rewrite URL)
RUN a2enmod rewrite

# Mở port 80
EXPOSE 80

# Lệnh chạy Apache
CMD ["apache2-foreground"]
