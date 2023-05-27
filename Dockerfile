FROM php:apache AS base
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY docker/php/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update 
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -

RUN apt-get install -y nodejs unzip git

#ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

#RUN chmod +x /usr/local/bin/install-php-extensions && \
   # install-php-extensions pdo_mysql

RUN docker-php-ext-configure opcache --enable-opcache 
#RUN docker-php-ext-enable pdo_mysql.so


FROM base

WORKDIR /var/www/html
COPY . .
RUN mv .env.production .env
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-dev --no-interaction
RUN composer update
RUN npm install && npm run build

RUN php artisan config:cache && php artisan route:cache 
RUN chmod 777 -R /var/www/html/storage/
RUN chown -R www-data:www-data /var/www/
RUN a2enmod rewrite