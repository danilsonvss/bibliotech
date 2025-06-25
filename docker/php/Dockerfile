FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
    build-base \
    autoconf \
    mysql-client \
    nginx \
    supervisor \
    libzip-dev \
    zip \
    curl \
    git \
    openssl-dev \
    zlib-dev

RUN docker-php-ext-install pdo pdo_mysql bcmath zip

RUN pecl install redis \
    && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 9000
