FROM php:7.2-fpm

RUN docker-php-ext-install pdo pdo_mysql

COPY ./docker/fpm/usr /usr

RUN mkdir /www
WORKDIR /www
