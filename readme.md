### Requirements

-   Laravel 5.8
-   PHP 7.2/7.3/7.4
-   Composer

### Installation

```bash
git clone git@github.com:Iqbalung/laravel-crud.git
cd laravel-crud
composer install
cp .env.example .env
# edit .env file and set your database connection
php artisan key:generate
php artisan migrate:fresh --seed # run migration and seed
php artisan serve
```

### Test

Open your browser and visit `http://localhost:8000`

Login with default user:

-   email: `user@example.com`
-   password: `password`
