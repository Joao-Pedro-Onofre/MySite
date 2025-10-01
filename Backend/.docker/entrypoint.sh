#!/usr/bin/env bash
set -e

# Render provides $PORT. Build nginx.conf from the template.
: "${PORT:=10000}"
envsubst '${PORT}' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Laravel housekeeping
php artisan key:generate --force || true
php artisan storage:link || true
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# No DB migrations needed since you’re not using a DB

exec "$@"
