FROM mcr.microsoft.com/devcontainers/php:8.2

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
COPY --from=mirror.gcr.io/composer:2 /usr/bin/composer /usr/bin/composer

RUN install-php-extensions opcache xdebug && \
    sed -i -e "s/xdebug\.mode = debug/;xdebug.mode = off/" /usr/local/etc/php/conf.d/xdebug.ini && \
    echo "opcache.enable_cli = On" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
