#!/usr/bin/env bash

set -euo pipefail

echo "Starting Khmer-Room optimization..."

if [ -d .git ] && command -v git >/dev/null 2>&1; then
  git pull origin main
else
  echo "Skipping git pull: not a git repository."
fi

composer install --no-dev --optimize-autoloader

php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan migrate --force

chmod -R 775 storage bootstrap/cache || true

echo "Khmer-Room has been optimized."