#!/usr/bin/env bash
set -e

DB_PATH="${DB_DATABASE:-/app/storage/database.sqlite}"
mkdir -p "$(dirname "$DB_PATH")"
touch "$DB_PATH"

# The persistent volume mounts over /app/storage, hiding whatever the
# Docker image had there at build time — recreate the folders Laravel
# needs to write to on every boot rather than relying on the image.
mkdir -p storage/framework/cache storage/framework/sessions storage/framework/testing storage/framework/views storage/logs storage/app/public bootstrap/cache
chmod -R 775 storage bootstrap/cache

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan storage:link || true

php artisan serve --host 0.0.0.0 --port "${PORT:-8080}"
