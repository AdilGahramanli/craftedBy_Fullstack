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
    libonig-dev

# Installer les extensions PHP requises
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy the application files
COPY . .

# Install composer dependencies
RUN composer install

# Copy over the environment file
COPY .env.example .env

# Copy Supervisor configuration file
COPY supervisord.conf /etc/supervisord.conf

COPY nginx.conf /etc/nginx/conf.d

# Expose the port for php-fpm
EXPOSE 9000

# Start Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
