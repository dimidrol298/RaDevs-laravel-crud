# RaDevs-laravel-crud

# Laravel Crud App

A simple crud App with Laravel 5.5.

## Installation

Clone the repository-
```
git clone https://github.com/dimidrol298/RaDevs-laravel-crud.git
```
Then do a composer install and composer update
```
composer install && composer update
```

Then create a environment file using this command-
```
cp .env.example .env or copy .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Generate your application encryption key using
```
php artisan key:generate
```

Running the following command, you will be able to get all the dependencies in your node_modules folder:
```
yarn
```

To run the project, you need to run following command in the project directory. 
```
yarn mix
```

Then create a database named `new_laravel_app` and then do a database migration using this command-
```
php artisan migrate
```

Then execute the db:seed Artisan command
```
php artisan db:seed
```

## Run server

Run server using this command-
```
php artisan serve
```