#!/bin/bash

echo "==========================================================="
echo "|       script by: https://github.com/fauzymadani/        |"
echo "==========================================================="

if ! command -v composer &> /dev/null || ! command -v php &> /dev/null; then
    echo "No composer nor PHP was found. Please install them first."
    exit 1
fi

if [ ! -f .env.example ]; then
    echo ".env.example file not found!"
    exit 1
fi

cp .env.example .env

# Install dependencies
composer update || { echo "Composer update failed!"; exit 1; }
composer install || { echo "Composer install failed!"; exit 1; }

php artisan key:generate || { echo "Failed to generate app key!"; exit 1; }

php artisan migrate || { echo "Migration failed!"; exit 1; }
php artisan db:seed || { echo "Seeding failed!"; exit 1; }
php artisan db:seed --class=UserTableSeeder || { echo "UserTableSeeder failed!"; exit 1; }
php artisan db:seed --class=BookSeeder || { echo "BookSeeder failed!"; exit 1; }
php artisan db:seed --class=DatabaseSeeder || { echo "DatabaseSeeder failed!"; exit 1; }

echo "======================== Thank you for cloning this project! =============================="

