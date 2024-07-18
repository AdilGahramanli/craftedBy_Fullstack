# Utiliser l'image de base php-fpm
FROM bitnami/php-fpm:8.3.3

# Installer Nginx et Supervisor
RUN install_packages nginx supervisor

# Installer les extensions PHP nécessaires via apt-get
RUN install_packages php-pear php-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev \
    && docker-php-ext-install gd mbstring pdo pdo_mysql bcmath

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances Composer
RUN composer install

# Copier le fichier .env et générer la clé de l'application
COPY .env.example .env
RUN php artisan key:generate

# Copier les fichiers de configuration
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exposer le port 80 pour Nginx
EXPOSE 80

# Lancer Supervisor qui gère Nginx et PHP-FPM
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
