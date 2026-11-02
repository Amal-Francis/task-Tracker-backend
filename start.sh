
#!/bin/sh

set -e

sed -i "s/Listen 80/Listen ${PORT:-80}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT:-80}>/" /etc/apache2/sites-available/000-default.conf

php artisan optimize:clear
php artisan config:cache

# Run database migrations
php artisan migrate --force

# Start Apache
exec apache2-foreground
