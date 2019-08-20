FROM php:7.2-alpine
WORKDIR /usr/local/apache2/htdocs/
COPY . .
RUN docker-php-ext-install pdo pdo_mysql
RUN apk add composer \
    && composer install
# start the app
CMD [ "composer", "start" ]