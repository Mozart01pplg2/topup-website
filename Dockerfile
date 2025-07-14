FROM php:8.2-apache
RUN docker-php-ext-install pdo_pgsql
COPY public/ /var/www/html/
