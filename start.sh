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

# Force-clear any cached config/routes/services from a previous boot.
# If bootstrap/cache/config.php exists at all, Laravel uses it instead of
# reading the live environment — regardless of whether this boot tries to
# regenerate it — so a stale file here silently locks in old env values
# (this is what caused APP_KEY to keep appearing missing).
rm -f bootstrap/cache/config.php bootstrap/cache/routes-v7.php bootstrap/cache/services.php bootstrap/cache/packages.php

php artisan migrate --force
php artisan storage:link || true

php artisan serve --host 0.0.0.0 --port "${PORT:-8080}"
