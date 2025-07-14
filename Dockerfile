FROM php:8.2-apache

# Install PostgreSQL support
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql

# Enable mod_rewrite
RUN a2enmod rewrite

# Copy public folder ke /var/www/html (root Apache)
COPY public/ /var/www/html/

# Copy includes kalau perlu (optional)
COPY includes/ /var/www/html/includes/

# Set permission
RUN chown -R www-data:www-data /var/www/html
