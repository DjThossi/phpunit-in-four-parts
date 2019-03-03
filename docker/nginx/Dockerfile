FROM nginx:latest

RUN rm /etc/nginx/conf.d/default.conf

COPY ./docker/nginx/etc /etc

WORKDIR /www
