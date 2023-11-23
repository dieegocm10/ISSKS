FROM php:7.2.2-apache
USER root
RUN docker-php-ext-install mysqli





