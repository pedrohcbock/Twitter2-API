para o projeto funcionar rode os seguintes comandos:

composer install
cp .env.example .env
php artisan key:generate
composer require php-open-source-saver/jwt-auth
php artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
composer require rtconner/laravel-likeable
php artisan migrate
php artisan serve
