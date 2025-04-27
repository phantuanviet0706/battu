# Sử dụng PHP 8.2 + Apache làm base image
FROM php:8.2-apache

# Cài extension PHP bắt buộc cho Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Copy source code vào /var/www
COPY . /var/www

# Set Apache DocumentRoot trỏ vào thư mục public
RUN sed -i 's#/var/www/html#/var/www/public#g' /etc/apache2/sites-available/000-default.conf

# Set quyền đúng cho storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Cài Composer (quản lý PHP package)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Move vào thư mục /var/www và install packages
WORKDIR /var/www
RUN composer install --no-dev --optimize-autoloader

# Bật mod_rewrite cho Apache (Laravel bắt buộc dùng rewrite routes)
RUN a2enmod rewrite

# Mở port 80
EXPOSE 80

# Lệnh chạy Apache
CMD ["apache2-foreground"]
