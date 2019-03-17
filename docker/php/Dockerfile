FROM php:7.3.3-fpm-alpine
LABEL maintainer "ucan"

# php.ini
COPY php.ini /usr/local/etc/php

# Composer environment
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# Composer install
RUN set -eux && \
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
  php composer-setup.php && \
  php -r "unlink('composer-setup.php');" && \
  mv composer.phar /usr/local/bin/composer && \
  apk update && \
  apk add --update --no-cache icu-dev libzip-dev git zip unzip tzdata && \
  cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
  echo "Asia/Tokyo" > /etc/timezone && \
  apk del tzdata && \
  docker-php-ext-install intl mbstring zip && \
  composer config -g repos.packagist composer https://packagist.jp && \
  composer global require hirak/prestissimo
