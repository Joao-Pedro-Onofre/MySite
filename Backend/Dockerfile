# =========================
# Build stage
# =========================
FROM php:8.3-fpm-alpine AS build

# Allow composer as root inside Docker
ENV COMPOSER_ALLOW_SUPERUSER=1

# System deps & PHP extensions needed by Laravel
RUN apk add --no-cache git unzip libzip-dev oniguruma-dev icu-dev \
    && docker-php-ext-install pdo_mysql mbstring zip intl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# 1) Install PHP deps WITHOUT scripts (so artisan isn't required yet)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress --no-scripts

# 2) Now copy the whole app so artisan exists
COPY . ./

# 3) Run composer install again (fast due to cache) to execute post-scripts
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress

# (optional) clear dev caches
RUN php artisan config:clear || true && php artisan route:clear || true


# =========================
# Runtime stage
# =========================
FROM alpine:3.20

# Nginx + PHP-FPM + supervisor + helpers
RUN apk add --no-cache \
      nginx \
      php83-fpm php83-opcache php83-session php83-pdo_mysql php83-mbstring php83-zip php83-intl php83-xml php83-curl \
      supervisor bash ca-certificates envsubst \
  # create runtime dirs and fix perms for unprivileged user
  && mkdir -p /run/nginx /var/log/supervisor /var/log/nginx /var/lib/nginx /etc/nginx \
  && chown -R nobody:nogroup /run/nginx /var/log/nginx /var/lib/nginx /var/log/supervisor

# Bring in the built app
COPY --from=build /app /app

# Configs + entrypoint
COPY .docker/nginx.conf.template /etc/nginx/nginx.conf.template
COPY .docker/supervisord.conf /etc/supervisord.conf
COPY .docker/entrypoint.sh /entrypoint.sh

# Make entrypoint executable and fix app dir perms
RUN chmod +x /entrypoint.sh \
    && chown -R nobody:nogroup /app /app/storage /app/bootstrap/cache

WORKDIR /app

# Run as unprivileged user
USER nobody

# Render will set $PORT; nginx will listen on it (templated in entrypoint)
EXPOSE 10000

ENTRYPOINT ["/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
