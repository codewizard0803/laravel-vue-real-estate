FROM php:7.0.4-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client curl libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    &&  curl -sL https://deb.nodesource.com/setup_10.x | bash - \
    && apt-get install nodejs
