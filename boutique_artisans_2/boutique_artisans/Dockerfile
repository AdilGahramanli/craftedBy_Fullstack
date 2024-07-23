FROM php:8.3-fpm
#FROM bitnami/php-fpm:latest

# Install additional PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mbstring pdo pdo_mysql xml bcmath

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

# Expose the port for php-fpm
EXPOSE 9000

# Start Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
