#!/bin/sh
set -e

# Ensure config directory exists
mkdir -p /var/www/html/config

# Copy Octane config if it doesn't exist
if [ ! -f /var/www/html/config/octane.php ]; then
    cp /var/www/html/config/octane.php.docker /var/www/html/config/octane.php
fi

# Install dependencies if needed
if [ ! -d /var/www/html/vendor ]; then
    composer install --optimize-autoloader
fi

# Generate key if needed
if grep -q "APP_KEY=\$" .env; then
    php artisan key:generate --force
fi

# Set proper permissions
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Start FrankenPHP with Laravel Octane
exec php artisan octane:start --server=frankenphp --host=0.0.0.0 --port=8000