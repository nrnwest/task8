FROM php:8.1.0-fpm-alpine

# Install packages
RUN apk add --no-cache git curl build-base zlib-dev oniguruma-dev autoconf bash

# Xdebug
ARG INSTALL_XDEBUG=false
RUN if [ ${INSTALL_XDEBUG} = true ]; \
    then \
      pecl install xdebug && docker-php-ext-enable xdebug; \
    fi;

COPY ./_docker/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY ./_docker/php-fpm/opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

# Postgres && Mysql
RUN apk add --no-cache libpq-dev && docker-php-ext-install pdo_mysql mysqli
# Image support
# libjpeg-turbo-dev libwebp-dev zlib-dev libxpm-dev
#RUN apk add --no-cache libpng-dev libjpeg-turbo-dev libwebp-dev zlib-dev libxpm-dev && docker-php-ext-install gd
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j$(nproc) gd && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

# node js
RUN apk add --update nodejs npm
RUN apk add --update npm


# opCache
RUN docker-php-ext-install opcache

# Configure non-root user.
ARG PUID=1000
ARG PGID=1000
RUN apk --no-cache add shadow && \
    groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Source code
RUN chown www-data:www-data /var/www
COPY --chown=www-data:www-data ./ /var/www
WORKDIR /var/www

USER www-data

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD php-fpm

EXPOSE 9000
