FROM php:7.4-apache
#os install tools
RUN apt-get update
RUN apt-get install -y wget vim zip unzip libzip-dev libpng-dev

#php extensions
RUN docker-php-ext-install -j$(nproc) mysqli pdo_mysql gd zip pcntl
#apache modules
RUN a2enmod headers expires rewrite
#working directory
WORKDIR /var/www/html/
#set environment variables
ENV MYSQLUSER=root
ENV MYSQLPASS=root
#TO DO :IMPLEMENT SECRETS IN DOCKERFILE
COPY . .
EXPOSE 80
