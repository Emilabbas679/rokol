# Copied from cyberduck/php-fpm-laravel
#https://github.com/Cyber-Duck/php-fpm-laravel/blob/8.1/Dockerfile
FROM php:8.1-fpm

ARG WWWGROUP
ARG NODE_VERSION=20
ARG MYSQL_CLIENT="mysql-client"
ENV COMPOSER_MEMORY_LIMIT='-1'

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC
ENV SUPERVISOR_PHP_COMMAND="/usr/bin/php -d variables_order=EGPCS /var/www/html/artisan serve --host=0.0.0.0 --port=80"
ENV SUPERVISOR_PHP_USER="sail"

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get clean all && \
    apt-get update && \
    apt-get dist-upgrade -y && \
    # and optionally
    apt-get autoremove

RUN apt-get update --fix-missing && \
    apt-get install -y --force-yes --no-install-recommends \
        libmemcached-dev \
        libzip-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        openssh-server \
        libmagickwand-dev \
        imagemagick \
        git \
        cron \
        nano \
        libxml2-dev \
        libreadline-dev \
        libgmp-dev \
        mariadb-client \
        unzip \
        gnupg \
        gosu \
        curl \
        ca-certificates \
        supervisor \
        libpng-dev \
        dnsutils \
        librsvg2-bin \
        fswatch \
        ffmpeg


#
RUN apt-get update \
        && mkdir -p /etc/apt/keyrings \
        && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
        && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" > /etc/apt/sources.list.d/nodesource.list \
        && apt-get update \
        && apt-get install -y nodejs \
        && npm install -g npm \
        && npm install -g pnpm \
        && npm install -g bun \
        && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /etc/apt/keyrings/yarn.gpg >/dev/null \
        && echo "deb [signed-by=/etc/apt/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
        && curl -sS https://www.postgresql.org/media/keys/ACCC4CF8.asc | gpg --dearmor | tee /etc/apt/keyrings/pgdg.gpg >/dev/null \
        && echo "deb [signed-by=/etc/apt/keyrings/pgdg.gpg] http://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
        && apt-get update \
        && apt-get install -y yarn \
        && apt-get -y autoremove \
        && apt-get clean

# Install soap extention
RUN docker-php-ext-install soap

# Install for image manipulation
RUN docker-php-ext-install exif

# Install the PHP pcntl extention
RUN docker-php-ext-install pcntl

# Install the PHP zip extention
RUN docker-php-ext-install zip

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install the PHP pdo_pgsql extention
RUN docker-php-ext-install pdo_pgsql

# Install the PHP bcmath extension
RUN docker-php-ext-install bcmath

# Install the PHP intl extention
RUN docker-php-ext-install intl

# Install the PHP gmp extention
RUN docker-php-ext-install gmp

# Install the PHP gmp extention
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

#####################################
# PHPRedis:
#####################################
RUN pecl install redis && docker-php-ext-enable redis

#####################################
# Imagick:
#####################################

RUN pecl install imagick && docker-php-ext-enable imagick

#####################################
# GD:
#####################################

# Install the PHP gd library
RUN docker-php-ext-install gd && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

#####################################
# xDebug:
#####################################

# Install the xdebug extension
#RUN pecl install xdebug

#####################################
# PHP Memcached:
#####################################

# Install the php memcached extension
#RUN pecl install memcached && docker-php-ext-enable memcached

#####################################
# Composer:
#####################################

# Install composer and add its bin to the PATH.
RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer
# Source the bash
RUN . ~/.bashrc

#####################################
# Laravel Schedule Cron Job:
#####################################

#RUN echo "* * * * * www-data /usr/local/bin/php /var/www/artisan schedule:run >> /dev/null 2>&1"  >> /etc/cron.d/laravel-scheduler
#RUN chmod 0644 /etc/cron.d/laravel-scheduler

#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

ADD ./php.ini /usr/local/etc/php/conf.d

#####################################
# Aliases:
#####################################
# docker-compose exec php-fpm dep --> locally installed Deployer binaries
#RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/vendor/bin/dep "$@"' > /usr/bin/dep
#RUN chmod +x /usr/bin/dep
## docker-compose exec php-fpm art --> php artisan
#RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan "$@"' > /usr/bin/art
#RUN chmod +x /usr/bin/art
## docker-compose exec php-fpm migrate --> php artisan migrate
#RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan migrate "$@"' > /usr/bin/migrate
#RUN chmod +x /usr/bin/migrate
## docker-compose exec php-fpm fresh --> php artisan migrate:fresh --seed
#RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan migrate:fresh --seed' > /usr/bin/fresh
#RUN chmod +x /usr/bin/fresh
## docker-compose exec php-fpm t --> run the tests for the project and generate testdox
#RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan config:clear\n/var/www/vendor/bin/phpunit -d memory_limit=2G --stop-on-error --stop-on-failure --testdox-text=tests/report.txt "$@"' > /usr/bin/t
#RUN chmod +x /usr/bin/t
## docker-compose exec php-fpm d --> run the Laravel Dusk browser tests for the project
#RUN echo '#!/bin/bash\n/usr/local/bin/php /var/www/artisan config:clear\n/bin/bash\n/usr/local/bin/php /var/www/artisan dusk -d memory_limit=2G --stop-on-error --stop-on-failure --testdox-text=tests/report-dusk.txt "$@"' > /usr/bin/d
#RUN chmod +x /usr/bin/d
#
#RUN rm -r /var/lib/apt/lists/*

#RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.3

RUN groupadd --force -g $WWWGROUP sail
RUN useradd -r -u 1000 -g sail  sail

COPY start-container /usr/local/bin/start-container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN chmod +x /usr/local/bin/start-container


ENTRYPOINT ["php-fpm"]


EXPOSE 9000

