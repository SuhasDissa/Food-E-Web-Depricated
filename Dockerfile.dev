FROM php:8.2-fpm-bullseye AS base
COPY docker-compose/php/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

RUN apt-get update 
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -

RUN apt-get install -y \
   nodejs \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure opcache --enable-opcache 
COPY --from=composer /usr/bin/composer /usr/bin/composer

ARG user
ARG uid

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user