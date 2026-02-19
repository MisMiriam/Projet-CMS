# Utilise l'image officielle PHP + Apache
FROM php:8.2-apache

# Installer les dépendances nécessaires pour PostgreSQL et activer modules
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install \
    intl \
    pdo \
    pdo_mysql \
    zip \
    opcache

# Copier un php.ini personnalisé si besoin (monté via docker-compose)
# WORKDIR /var/www/html

# Activer mod_rewrite (indispensable pour le routeur MVC)
RUN a2enmod rewrite

# Copier la configuration Apache personnalisée
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Permettre à Apache d'écrire sur le dossier (utile pour uploads / sessions)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80