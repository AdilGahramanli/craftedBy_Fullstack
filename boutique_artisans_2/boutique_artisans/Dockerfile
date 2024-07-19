FROM bitnami/php-fpm:latest

# Install additional PHP extensions
RUN install_packages php8.3 php8.3-mysql php8.3-xml php8.3-mbstring php8.3-bcmath

# Set working directory
WORKDIR /app

# Copy the application files
COPY . .

# Install composer dependencies
RUN composer install

# Copy over the environment file
COPY .env.example .env

# Generate the application key
RUN php artisan key:generate

# Install Supervisor
RUN install_packages supervisor

# Copy Supervisor configuration file
COPY supervisord.conf /etc/supervisord.conf

# Expose the port for php-fpm
EXPOSE 9000

# Start Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
