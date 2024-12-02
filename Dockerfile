# Use the official PHP image with Apache
FROM php:8.2-apache

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Copy the Laravel application files into the container
COPY . .

# Set permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache