+) Install composer:
composer install

+) Rename .env.example file:
rename .env.example .env

+) Generate key:
php artisan key:generate

+) migrate database:
php artisan migrate:fresh --seed


php artisan storage:link