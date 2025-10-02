# =========================
# Build stage
# =========================
FROM php:8.3-fpm-alpine AS build

ENV COMPOSER_ALLOW_SUPERUSER=1

# System deps & PHP extensions
RUN apk add --no-cache git unzip libzip-dev oniguruma-dev icu-dev \
    && docker-php-ext-install pdo_mysql mbstring zip intl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# 1) Install deps without scripts (no artisan needed yet)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress --no-scripts

# 2) Copy full app (artisan now exists)
COPY . ./

# 3) Run install again to execute scripts (fast due to cache)
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress

# optional: clear any dev caches
RUN php artisan config:clear || true && php artisan route:clear || true


# =========================
# Runtime stage
# =========================
FROM alpine:3.20

# Nginx + PHP-FPM + supervisor + helpers
# --- Runtime stage (only this apk line needs updating) ---
RUN apk add --no-cache \
      nginx \
      php83-fpm php83-opcache php83-session \
      php83-pdo_mysql php83-mbstring php83-zip php83-intl php83-xml php83-curl \
      php83-openssl php83-fileinfo \
      supervisor bash ca-certificates envsubst \
  && mkdir -p /run/nginx /var/log/supervisor /var/log/nginx /var/lib/nginx /etc/nginx \
  && chown -R nobody:nogroup /run/nginx /var/log/nginx /var/lib/nginx /var/log/supervisor /etc/nginx


# Bring in built app
COPY --from=build /app /app

# Configs + entrypoint
COPY .docker/nginx.conf.template /etc/nginx/nginx.conf.template
COPY .docker/supervisord.conf /etc/supervisord.conf
COPY .docker/entrypoint.sh /entrypoint.sh

# Make entrypoint executable and fix app dir perms
RUN chmod +x /entrypoint.sh \
    && chown -R nobody:nogroup /app /app/storage /app/bootstrap/cache

WORKDIR /app
USER nobody

# Render sets $PORT; nginx will listen on it (templated in entrypoint)
EXPOSE 10000

ENTRYPOINT ["/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
