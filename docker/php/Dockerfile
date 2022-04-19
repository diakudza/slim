FROM php:8.0-apache AS wocla-php-base
COPY --from=composer:2.3 /usr/bin/composer /usr/bin/composer
RUN a2enmod rewrite && apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libyaml-dev \
    && rm -rf /var/lib/apt/lists/*

# development and tests
FROM wocla-php-base AS wocla-php-dev
ENV PATH="/var/www/html/vendor/bin:${PATH}"
ENV COMPOSER_CACHE_DIR="/dev/null"
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && yes | pecl install \
        $PHPIZE_DEPS \
        zip-1.20.0 \
        xdebug-3.1.1 \
        yaml-2.2.1 \
    && docker-php-ext-enable \
        zip \
        xdebug \
        yaml \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.log_level=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

COPY ./docker/php/local.site.conf /etc/apache2/sites-available/000-default.conf
COPY ./docker/php/local.apache.conf /etc/apache2/apache2.conf
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
