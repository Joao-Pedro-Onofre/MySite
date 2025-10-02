#!/usr/bin/env bash
set -e

# Render sets $PORT; template nginx.conf
: "${PORT:=10000}"
envsubst '${PORT}' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

# Laravel housekeeping
php artisan key:generate --force || true
php artisan storage:link || true
php artisan config:cache || true
php artisan route:cache  || true
php artisan view:cache   || true

exec "$@"
