FROM php:8.3-fpm-alpine AS build

ENV COMPOSER_ALLOW_SUPERUSER=1

# System deps & PHP extensions
RUN apk add --no-cache git unzip libzip-dev oniguruma-dev icu-dev \
    && docker-php-ext-install pdo_mysql mbstring zip intl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# 1) copy manifests only and install without scripts (cache-friendly)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress --no-scripts

# 2) now copy the whole app
COPY . ./

# 3) run install again (very fast) to execute scripts now that artisan exists
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress

# (optional, fine to keep)
RUN php artisan config:clear || true && php artisan route:clear || true