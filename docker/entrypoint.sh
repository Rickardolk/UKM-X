#!/bin/sh
set -e

if [ -n "$PORT" ]; then
    sed -i "s/listen 8080;/listen $PORT;/" /etc/nginx/http.d/default.conf
fi

# ---- Pastikan storage & cache folder ada dan writable ----
mkdir -p /var/www/html/storage/framework/{sessions,views,cache}
mkdir -p /var/www/html/storage/logs
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ---- Generate APP_KEY otomatis kalau belum di-set di environment variables ----
cd /var/www/html

if [ ! -f .env ]; then
    if [ -f .env.example ]; then
        cp .env.example .env
    else
        touch .env
    fi
fi

# ---- Generate APP_KEY otomatis kalau belum di-set di environment variables ----
if [ -z "$APP_KEY" ]; then
    echo "APP_KEY belum di-set, generating..."
    php artisan key:generate --force
fi

# ---- Cache config & route untuk performa produksi ----
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# ---- Jalankan migration otomatis (aman untuk dijalankan berulang) ----
# Uncomment baris di bawah kalau sudah pakai database sungguhan.
# php artisan migrate --force || true

# ---- Start nginx + php-fpm lewat supervisor ----
exec supervisord -c /etc/supervisor/conf.d/supervisord.conf