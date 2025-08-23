# ===== Base PHP + Apache =====
FROM php:8.2-apache

# ===== System packages & PHP extensions =====
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    tzdata \
    && docker-php-ext-install pdo pdo_mysql zip \
    && a2enmod rewrite

# ===== Timezone (VN) to avoid ±1 day drift =====
ENV TZ=Asia/Ho_Chi_Minh
RUN echo "date.timezone=$TZ" > /usr/local/etc/php/conf.d/timezone.ini

# ===== Composer (from official image) =====
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /var/www

# ===== Composer cache layer (best practice) =====
# Copy only composer manifests first to leverage Docker layer caching
COPY composer.json composer.lock ./

# If your composer.json CHƯA có 6tail/lunar-php, uncomment dòng dưới để add trong lúc build:
# RUN composer --no-interaction require 6tail/lunar-php:^1.7 || true

# Install vendor trước, tối ưu cache
RUN composer install --no-dev --prefer-dist --no-scripts --optimize-autoloader

# ===== Copy toàn bộ source sau khi vendor đã cache =====
COPY . .

# ===== Apache vhost: trỏ DocumentRoot tới public & bật AllowOverride =====
RUN sed -ri 's#/var/www/html#/var/www/public#g' /etc/apache2/sites-available/000-default.conf \
    && printf "\n<Directory /var/www/public>\n\tAllowOverride All\n</Directory>\n" >> /etc/apache2/apache2.conf

# ===== Quyền thư mục (Laravel) =====
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# ===== Optimize autoload sau khi copy code =====
RUN composer dump-autoload -o

EXPOSE 80
CMD ["apache2-foreground"]
