FROM php:8.2-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

COPY . .

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
