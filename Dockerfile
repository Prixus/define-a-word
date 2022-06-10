FROM php:8.1-fpm-alpine

WORKDIR /var/www/app

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install node
RUN apk add --update npm

RUN docker-php-ext-install pdo pdo_mysql