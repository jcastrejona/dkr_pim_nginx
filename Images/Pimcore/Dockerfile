FROM php:fpm-buster
LABEL maintainer="jose.castrejon@softtek.com"

COPY ./entrypoint.sh /
COPY ./configFiles/installer.yml /

# Set the locale
RUN apt-get clean && apt-get update && apt-get install -y locales\
    && sed -i -e 's/# es_MX.UTF-8 UTF-8/es_MX.UTF-8 UTF-8/' /etc/locale.gen\
    && locale-gen

#Install php deps & modules
RUN apt-get update && apt-get install -y \
    git \
    mariadb-client \
    unzip \
    redis-tools \
    libpng-dev \
    libjpeg-dev \
    libpq-dev \
    zlib1g-dev \
    libbz2-dev \
    libonig-dev \
    libzip-dev \
    libxml2-dev && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure gd && \
    docker-php-ext-install \
    iconv \
    dom \
    bz2 \
    zip \
    exif \
    intl \
    opcache \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    soap \
    mysqli \
    gd && \
    chmod +x /entrypoint.sh

#Install imagemagick
RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick

#Install Composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer && \
    composer --version

ENTRYPOINT ["/bin/bash", "-c","/entrypoint.sh"]