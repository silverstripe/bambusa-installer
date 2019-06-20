FROM php:7.3-apache-stretch

RUN apt-get update -y \
 && apt-get install -y \
    netcat git g++ \
    unzip wget mysql-client \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    zlib1g-dev libicu-dev libtidy-dev libzip-dev \
    libmagickwand-dev \
 && rm -rf /var/lib/apt/lists/* \
 && docker-php-source extract \
 && docker-php-ext-install iconv \
 && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
 && docker-php-ext-install gd \
 && docker-php-ext-install intl \
 && docker-php-ext-install zip \
 && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
 && docker-php-ext-install mysqli \
 && docker-php-ext-install tidy \
 && docker-php-ext-install exif \
 && docker-php-ext-install bcmath \
 && docker-php-ext-install bz2 \
 && docker-php-ext-install opcache \
 && yes '' | pecl install imagick && docker-php-ext-enable imagick \
 && docker-php-source delete \
 && curl -sSLo /usr/local/bin/gosu https://github.com/tianon/gosu/releases/download/1.10/gosu-amd64 \
 && chmod +x /usr/local/bin/gosu \
 && curl -sS https://silverstripe.github.io/sspak/install | php -- /usr/local/bin \
 && echo "ServerName localhost" > /etc/apache2/conf-enabled/fqdn.conf \
 && a2enmod rewrite expires remoteip cgid

COPY ./docker/php.ini /usr/local/etc/php/conf.d/custom.ini
COPY --chown=www-data:www-data . /var/www/html/
RUN chmod +x /var/www/html/docker/scripts/*

ENV PATH="/var/www/html/docker/scripts:$PATH"
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
EXPOSE 80

WORKDIR /var/www/html
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
