# Utiliza la imagen base de PHP con Apache
FROM php:7.2.2-apache

# Cambia al usuario root para realizar operaciones que requieren permisos elevados
USER root

# Instala la extensión mysqli
RUN docker-php-ext-install mysqli

# Copia los archivos de la aplicación al directorio de trabajo del contenedor
COPY . /var/www/html

# Copia el archivo de configuración personalizado
COPY myapache.conf /etc/apache2/sites-available/myapache.conf

# Habilita el sitio con la configuración personalizada
RUN ln -s /etc/apache2/sites-available/myapache.conf /etc/apache2/sites-enabled/

# Habilita los módulos necesarios
RUN a2enmod headers

# Reinicia Apache para aplicar los cambios
RUN service apache2 restart
# Crea el archivo intentos_login.txt
RUN touch /var/www/html/WebSitema.log

# Cambia el propietario y los permisos del directorio de trabajo
RUN chown -R www-data:www-data /var/www/html 

RUN chmod -R 777 /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Expone el puerto 80 para el servidor web Apache
EXPOSE 80

# Comando de inicio del contenedor (puedes ajustar esto según tus necesidades)
CMD ["apache2-foreground"]

