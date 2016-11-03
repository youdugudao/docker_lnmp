FROM php:7-fpm

#ADD php.ini    /usr/local/etc/php/php.ini
#ADD php-fpm.conf    /usr/local/etc/php-fpm.conf


RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        curl \
        libmemcached-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng12-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        libicu-dev


RUN docker-php-ext-configure gd \
        --enable-gd-native-ttf \
        --with-jpeg-dir=/usr/lib \
        --with-freetype-dir=/usr/include/freetype2 && \
    docker-php-ext-install gd
RUN docker-php-ext-install mcrypt
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

COPY redis.tgz /home/redis.tgz
RUN pecl install /home/redis.tgz && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini
ADD composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer
RUN echo "pdo_mysql.default_socket=/var/run/mysqld/mysqld.sock" >> /usr/local/etc/php/conf.d/docker-php-ext-mysqli.ini \
    && echo "mysql.default_socket=/var/run/mysqld/mysqld.sock" >> /usr/local/etc/php/conf.d/docker-php-ext-mysqli.ini \
    && echo "mysqli.default_socket=/var/run/mysqld/mysqld.sock" >> /usr/local/etc/php/conf.d/docker-php-ext-mysqli.ini


WORKDIR /opt
RUN usermod -u 1000 www-data

VOLUME ["/opt"]