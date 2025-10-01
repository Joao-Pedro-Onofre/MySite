# --- Build: install PHP deps with Composer
FROM php:8.3-fpm-alpine AS build
RUN apk add --no-cache git unzip libzip-dev oniguruma-dev icu-dev \
    && docker-php-ext-install pdo_mysql mbstring zip intl
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress
COPY . ./
RUN php artisan config:clear || true && php artisan route:clear || true

# --- Runtime: nginx + php-fpm via supervisord
FROM alpine:3.20
RUN apk add --no-cache nginx php83-fpm php83-opcache php83-session \
    php83-pdo_mysql php83-mbstring php83-zip php83-intl php83-xml php83-curl \
    supervisor bash ca-certificates envsubst
RUN mkdir -p /run/nginx /var/log/supervisor /app/storage /app/bootstrap/cache /etc/nginx
COPY --from=build /app /app
COPY .docker/nginx.conf.template /etc/nginx/nginx.conf.template
COPY .docker/supervisord.conf /etc/supervisord.conf
COPY .docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh && \
    chown -R nobody:nogroup /app /app/storage /app/bootstrap/cache
WORKDIR /app
USER nobody
# Render sets $PORT; we'll template nginx to listen on it at runtime
EXPOSE 10000
ENTRYPOINT ["/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
