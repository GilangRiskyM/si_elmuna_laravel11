FROM dunglas/frankenphp:1-php8.2-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    $PHPIZE_DEPS \
    oniguruma-dev \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Copy octane config
COPY config/octane.php /var/www/html/config/octane.php.docker

# Copy project files
COPY . .

# Install Laravel Octane and dependencies
RUN composer require laravel/octane symfony/process --with-all-dependencies \
    && php artisan octane:install --server=frankenphp

# Generate application key if needed
RUN php artisan key:generate --force

# Set permissions
RUN chmod -R 775 storage bootstrap/cache

# Expose port for FrankenPHP
EXPOSE 8000

# Use entrypoint script
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]