FROM bitnami/laravel:latest

# Optionally, you can add additional PHP extensions or other customizations
RUN install_packages php8.3 php8.3-mysql php8.3-xml php8.3-mbstring php8.3-bcmath

# Set working directory
WORKDIR /app

# Copy the application files
COPY . .

# Install composer dependencies
RUN composer install

# Copy over the environment file
COPY .env.example .env
#.env.example
# Generate the application key
RUN php artisan key:generate

# Expose the port for Laravel
EXPOSE 8000

# Start the Laravel application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

