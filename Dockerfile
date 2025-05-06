FROM mirror.gcr.io/php:8.4-cli-alpine

ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN install-php-extensions opcache && \
    echo "opcache.enable_cli = On" >> /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
