# Použití oficiálního PHP obrazu s Apachem
FROM php:8.3-apache

# Instalace závislostí pro PHP
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mbstring zip pdo pdo_mysql

# Instalace Composeru
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalace VirtualHost
COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Nastavení pracovní složky na /var/www/html
WORKDIR /var/www/html

# Zkopírování aplikace do kontejneru
COPY ./public /var/www/html/public
COPY ./app /var/www/html/app
COPY ./tests /var/www/html/tests
COPY ./composer.json /var/www/html/composer.json

# Instalace PHP závislostí pomocí Composeru
RUN composer install

# Nastavení práv k souborům a složkám
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Povolení Apache mod_rewrite pro podporu hezkých URL
RUN a2enmod rewrite

# Exponování portu 3000
EXPOSE 3000

# Spuštění Apache
CMD ["apache2-foreground"]
