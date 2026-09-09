#!/usr/bin/env bash
set -e

DB_PATH="${DB_DATABASE:-/app/storage/database.sqlite}"
mkdir -p "$(dirname "$DB_PATH")"
touch "$DB_PATH"

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan storage:link || true

php artisan serve --host 0.0.0.0 --port "${PORT:-8080}"
