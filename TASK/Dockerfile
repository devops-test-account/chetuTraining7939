# Use the official PHP image with Apache
FROM php:8.1-fpm

# Set the working directory
WORKDIR /var/www/html/chetuTraining/task

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
COPY TASK/composer*.json ./
# Copy the application files
COPY TASK/ .
# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose the port for the application
EXPOSE 8042

# Command to run your API
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8042"]
