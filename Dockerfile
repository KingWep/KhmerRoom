# ---------- PHP ----------
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    nginx

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

# Copy Nginx config
COPY nginx.conf /etc/nginx/sites-available/default

# Expose port (Render uses 10000)
EXPOSE 10000

# Start services
CMD service php8.2-fpm start && nginx -g "daemon off;"

RUN php artisan key:generate || true
RUN php artisan migrate --force || true
RUN php artisan storage:link || true
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear
