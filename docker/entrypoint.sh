#!/bin/sh
set -e


# ---- Render menyediakan PORT secara dinamis lewat env var ----
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

# ---- Paksa session & cache pakai file, bukan database ----
# Project ini masih pakai data dummy (belum ada database sungguhan),
# jadi SESSION_DRIVER/CACHE_STORE default (database) akan selalu error
# karena tidak ada database yang tersambung. File driver tidak butuh
# database sama sekali, aman untuk kondisi saat ini.
if grep -q "^SESSION_DRIVER=" .env; then
    sed -i "s/^SESSION_DRIVER=.*/SESSION_DRIVER=file/" .env
else
    echo "SESSION_DRIVER=file" >> .env
fi

if grep -q "^CACHE_STORE=" .env; then
    sed -i "s/^CACHE_STORE=.*/CACHE_STORE=file/" .env
elif grep -q "^CACHE_DRIVER=" .env; then
    sed -i "s/^CACHE_DRIVER=.*/CACHE_DRIVER=file/" .env
else
    echo "CACHE_STORE=file" >> .env
fi

if [ -z "$APP_KEY" ]; then
    echo "APP_KEY belum di-set, generating..."
    php artisan key:generate --force
fi

mkdir -p database
touch database/database.sqlite

# ---- Cache config & route untuk performa produksi ----
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true


exec supervisord -c /etc/supervisor/conf.d/supervisord.conf