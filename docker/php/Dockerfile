FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev \
    && docker-php-ext-install zip pdo

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

EXPOSE 9000
CMD ["php-fpm"]
