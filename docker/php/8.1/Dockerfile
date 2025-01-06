FROM php:8.1-cli AS composer

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
  && rm -rf /var/lib/apt/lists/*

WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

FROM php:8.1-cli AS debug

RUN apt-get update && apt-get install -y --no-install-recommends \
    $PHPIZE_DEPS \
  && rm -rf /var/lib/apt/lists/*

RUN pecl channel-update pecl.php.net \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug \
  && apt-get purge -y --auto-remove $PHPIZE_DEPS \
  && rm -rf /var/lib/apt/lists/*

COPY conf/php.ini /usr/local/etc/php/conf.d/

FROM php:8.1-cli AS base

WORKDIR /app

CMD ["bash"]