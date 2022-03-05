ARG PHP_VERSION=8.0

FROM php:${PHP_VERSION}-cli-alpine

ENV COMPOSER_CACHE_DIR /tmp

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN find /usr/src -type f -name 'php.tar*' -delete \
    && apk add unzip

VOLUME /app

WORKDIR /app
