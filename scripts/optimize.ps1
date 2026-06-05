$ErrorActionPreference = 'Stop'

Write-Host 'Starting Khmer-Room optimization...'

if (Test-Path '.git') {
    git pull origin main
} else {
    Write-Host 'Skipping git pull: not a git repository.'
}

composer install --no-dev --optimize-autoloader

php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan migrate --force

Write-Host 'Khmer-Room has been optimized.'