FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --no-scripts --no-autoloader --ignore-platform-reqs

FROM php:8.3-cli

RUN apt-get update && apt-get install -y --no-install-recommends \
        libsqlite3-dev \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        unzip \
    && docker-php-ext-install pdo pdo_sqlite mbstring bcmath zip gd \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY --from=vendor /usr/bin/composer /usr/bin/composer
COPY --from=vendor /app/vendor ./vendor
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction \
    && chmod +x start.sh \
    && mkdir -p storage/framework/cache storage/framework/sessions storage/framework/testing storage/framework/views storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080
CMD ["bash", "start.sh"]
