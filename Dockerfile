FROM php:apache
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update 
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -

RUN apt-get install -y nodejs unzip git

WORKDIR /var/www/html
COPY . .
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update --no-scripts
RUN composer install --prefer-dist --no-scripts --no-dev --optimize-autoloader --no-interaction

RUN npm install && npm run build

#ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

#RUN chmod +x /usr/local/bin/install-php-extensions && \
   # install-php-extensions pdo_mysql

RUN docker-php-ext-configure opcache --enable-opcache 
#RUN docker-php-ext-enable pdo_mysql.so

COPY docker/php/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY .env.prod /var/www/html/.env

ENV APP_NAME=Food-E
ENV APP_ENV=production
ENV APP_DEBUG=false

RUN php artisan config:cache && php artisan route:cache 
RUN chmod 777 -R /var/www/html/storage/ && chown -R www-data:www-data /var/www/ && a2enmod rewrite