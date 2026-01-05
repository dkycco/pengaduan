FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip

# Install PHP extensions required by Laravel
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    bcmath \
    gd \
    pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Permission Laravel
RUN chmod -R 775 storage bootstrap/cache

# Expose Laravel port
EXPOSE 5000

# Run Laravel built-in server
CMD php artisan serve --host=0.0.0.0 --port=5000
