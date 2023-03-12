FROM php:8.1-apache

# application
COPY . /var/www/html/

# vhosts
COPY ./.docker/conf/vhosts.conf /etc/apache2/sites-enabled/

WORKDIR /var/www/html/

# packages
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev libicu-dev libzip-dev \
    ca-certificates curl g++ git make tar unzip zip

# apcu
RUN mkdir -p /usr/src/php/ext/apcu

RUN curl -fsSL https://pecl.php.net/get/apcu | tar xvz -C "/usr/src/php/ext/apcu" --strip 1

# php extensions
RUN docker-php-ext-install gettext mysqli opcache pdo_mysql

RUN docker-php-ext-enable gettext mysqli opcache pdo_mysql

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install

# apache
RUN a2enmod rewrite
