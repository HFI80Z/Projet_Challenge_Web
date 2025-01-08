FROM php:8.0-apache

RUN docker-php-ext-install pdo pdo_mysql

# Copie du code dans le container
COPY . /var/www/html

# Activation du module Apache rewrite
RUN a2enmod rewrite

# Configuration Apache (pour .htaccess)
RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]
