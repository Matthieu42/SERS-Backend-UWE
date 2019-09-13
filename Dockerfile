FROM php:7.2-alpine
WORKDIR /usr/local/apache2/htdocs/
RUN docker-php-ext-install pdo pdo_mysql

# Copy codebase
COPY . .

# Install dependencies
RUN apk add composer \
    && composer install

EXPOSE 8080
# start the app
CMD [ "composer", "start" ]