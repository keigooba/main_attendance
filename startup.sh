cp .env.example .env
composer install
touch /var/www/main_attendance/storage/logs/laravel.log
chmod -R 777 /var/www/main_attendance/storage
chmod -R 777 /var/www/main_attendance/bootstrap
php artisan key:generate
php artisan migrate
php artisan db:seed
