#!/bin/sh
set -e

# Update Nginx port if PORT environment variable is set
PORT="${PORT:-80}"
sed -i "s/listen 80 default_server;/listen ${PORT} default_server;/g" /etc/nginx/nginx.conf
sed -i "s/listen \[::\]:80 default_server;/listen \[::\]:${PORT} default_server;/g" /etc/nginx/nginx.conf

# Setup SQLite database if not exists
mkdir -p /var/www/html/database
if [ ! -f /var/www/html/database/database.sqlite ]; then
    touch /var/www/html/database/database.sqlite
fi
chown -R www-data:www-data /var/www/html/database
chmod -R 775 /var/www/html/database

# Ensure storage directories and permissions
mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache
mkdir -p /var/www/html/storage/logs
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Run database migrations and seeder
php artisan migrate --force
php artisan db:seed --class=PortfolioSeeder --force

# Cache Laravel configuration, routes, and views
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "🚀 Starting application via Supervisord..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
