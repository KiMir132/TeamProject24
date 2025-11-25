FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip unzip curl libzip-dev libpng-dev \
    libonig-dev libxml2-dev libpq-dev \
    && docker-php-ext-install pdo_mysql mysqli mbstring zip exif pcntl bcmath

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
