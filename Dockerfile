# PHP + Apache
FROM php:7.4-apache
# Update OS and install common dev tools
RUN apt-get update
RUN apt-get install -y wget vim git zip unzip zlib1g-dev libzip-dev libpng-dev
# Install PHP extensions needed
RUN docker-php-ext-install -j$(nproc) mysqli pdo_mysql gd zip pcntl exif
# Enable common Apache modules
RUN a2enmod headers expires rewrite
# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
# Set working directory to workspace
WORKDIR /var/www