# ប្រើ PHP 8.2 ជាមួយ FPM
FROM php:8.2-fpm

# ដំឡើង System Dependencies និង PHP Extensions
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip nginx

# ដំឡើង PHP extensions សម្រាប់ Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# ដំឡើង Node.js (ដើម្បី Build Vite/Blade Assets)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

# ដំឡើង Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# កំណត់ Working Directory
WORKDIR /var/www
COPY . .

# ដំឡើង PHP Dependencies
RUN composer install --no-dev --optimize-autoloader

# ដំឡើង JS Dependencies និង Build (សម្រាប់ CSS/JS ក្នុង Blade)
RUN npm install && npm run build

# កំណត់សិទ្ធិឱ្យ Storage និង Cache (សំខាន់សម្រាប់ Blade)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# ចម្លង Config របស់ Nginx
COPY nginx.conf /etc/nginx/sites-available/default

# បើក Port 80
EXPOSE 80

# បញ្ជាឱ្យ Start ទាំង Nginx និង PHP-FPM
CMD service nginx start && php-fpm