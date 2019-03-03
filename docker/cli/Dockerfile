FROM php:7.3-cli

ARG PHP_ENV_NAME
ENV PHP_ENV_NAME ${PHP_ENV_NAME:-production}
RUN mv "$PHP_INI_DIR/php.ini-$PHP_ENV_NAME" "$PHP_INI_DIR/php.ini" && \
    echo 'date.timezone = Europe/Berlin' >> "$PHP_INI_DIR/php.ini"

RUN apt-get update && apt-get install -my \
  git \
  gpg \
  zip \
  && rm -rf /var/lib/apt/lists/*

RUN pecl install xdebug-2.7.0RC2 \
  && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www
