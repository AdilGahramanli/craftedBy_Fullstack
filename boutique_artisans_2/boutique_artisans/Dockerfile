# Utiliser une image officielle PHP avec les extensions nécessaires
FROM php:8.2-fpm

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    supervisor \
    nginx \
    libonig-dev \
    default-mysql-client

# Installer les extensions PHP requises
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers de l'application
COPY . .

# Nettoyer le cache de Composer
RUN composer clear-cache

# Remove the vendor directory if it exists
RUN rm -rf /app/vendor
# Installer les dépendances de Composer
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-interaction --prefer-dist --optimize-autoloader --no-plugins --no-scripts

# Copier le fichier d'environnement
COPY .env.example .env

# Copier le fichier de configuration de Supervisor
COPY supervisord.conf /etc/supervisord.conf

# Exposer le port pour php-fpm
EXPOSE 9000

# Démarrer Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
