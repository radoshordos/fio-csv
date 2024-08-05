FROM php:8.3-apache
COPY src/ /var/www/html
EXPOSE 3000