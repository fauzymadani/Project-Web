#!/bin/bash

cp .env.example .env
composer update
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan db:seed --class=UserTableSeeder
php artisan db:seed --class=BookSeeder
php artisan db:seed --class=DatabaseSeeder

