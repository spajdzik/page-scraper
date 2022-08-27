FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y git

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Xdebug
RUN yes | pecl install xdebug && docker-php-ext-enable xdebug

# Set working directory
WORKDIR /var/www
