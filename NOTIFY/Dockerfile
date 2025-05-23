# Use the official PHP image with Apache
FROM php:8.1-fpm

# Set the working directory
WORKDIR /var/www/html/chetuTraining/notify

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy package.json and package-lock.json
COPY NOTIFY/composer*.json ./
# Copy the application files
COPY NOTIFY/ .
# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose the port for the application
EXPOSE 8043

# Command to run your API
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8043"]
