FROM php:8.2-apache

# Install ekstensi dan dependencies
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Copy file ke direktori apache
COPY . /var/www/html/

# Pastikan permission
RUN chown -R www-data:www-data /var/www/html

# Expose port Apache
EXPOSE 80

# Start Apache saat container dijalankan
CMD ["apache2-foreground"]
