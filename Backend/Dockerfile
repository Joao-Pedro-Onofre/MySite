# =========================
# Build stage
# =========================
FROM php:8.3-fpm-alpine AS build
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apk add --no-cache git unzip libzip-dev oniguruma-dev icu-dev \
  && docker-php-ext-install pdo_mysql mbstring zip intl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app

# install without scripts first (no artisan yet)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress --no-scripts

# copy app and then run scripts
COPY . ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress \
 && php artisan config:clear || true \
 && php artisan route:clear  || true

# =========================
# Runtime stage
# =========================
FROM alpine:3.20

RUN apk add --no-cache \
      nginx \
      php83-fpm php83-opcache php83-session \
      php83-pdo_mysql php83-mbstring php83-zip php83-intl php83-xml php83-curl \
      php83-openssl php83-fileinfo \
      supervisor bash ca-certificates envsubst \
  && mkdir -p /run/nginx /var/log/supervisor /var/log/nginx /var/lib/nginx /etc/nginx /run/php \
  && chown -R nobody:nogroup /run/nginx /var/log/nginx /var/lib/nginx /var/log/supervisor /etc/nginx /run/php \
  # make php-fpm listen on unix socket
  && sed -i 's|^listen = .*|listen = /run/php/php-fpm.sock|' /etc/php83/php-fpm.d/www.conf

# app files
COPY --from=build /app /app

# configs + entrypoint
COPY .docker/nginx.conf.template /etc/nginx/nginx.conf.template
COPY .docker/supervisord.conf     /etc/supervisord.conf
COPY .docker/entrypoint.sh        /entrypoint.sh

RUN chmod +x /entrypoint.sh \
 && chown -R nobody:nogroup /app /app/storage /app/bootstrap/cache

WORKDIR /app
USER nobody
EXPOSE 10000

ENTRYPOINT ["/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
