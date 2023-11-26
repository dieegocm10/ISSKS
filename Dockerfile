# Utiliza la imagen base de PHP con Apache
FROM php:7.2.2-apache

# Cambia al usuario root para realizar operaciones que requieren permisos elevados
USER root

# Instala la extensión mysqli y las dependencias de Composer
RUN docker-php-ext-install mysqli

# Copia el archivo de configuración personalizado
COPY myapache.conf /etc/apache2/sites-available/myapache.conf

# Habilita el sitio con la configuración personalizada
RUN ln -s /etc/apache2/sites-available/myapache.conf /etc/apache2/sites-enabled/

# Habilita los módulos necesarios
RUN a2enmod headers

# Asegura que Composer esté instalado y las dependencias estén configuradas adecuadamente
#RUN composer install

# Cambia los permisos en la carpeta /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html
