# ---- Dockerfile ----

FROM php:8.2-fpm-alpine AS base

# ---- Install system dependencies & PHP extensions ----
RUN apk add --no-cache \
    nginx \
    supervisor \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        intl

# ---- Install Composer ----
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# ---- Copy composer files first (better layer caching) ----
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# ---- Copy the rest of the application ----
COPY . .

# ---- Finish composer install (run scripts, generate autoloader) ----
RUN composer dump-autoload --optimize \
    && composer run-script post-autoload-dump || true

# ---- Install & build frontend assets (if using Vite) ----
RUN if [ -f package.json ]; then npm install && npm run build; fi

# ---- Set permissions ----
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# ---- Nginx config ----
COPY docker/nginx.conf /etc/nginx/http.d/default.conf

# ---- Supervisor config (runs nginx + php-fpm together) ----
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# ---- Entrypoint script (runs migrations/cache on boot) ----
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8080

ENTRYPOINT ["/entrypoint.sh"]