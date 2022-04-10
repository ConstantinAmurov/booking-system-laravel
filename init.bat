:: With this script you can initialize from scratch this Laravel project in Windows

:: Installing dependencies without any interaction and output
call composer install --no-interaction --quiet
:: Creating the .env file, and generating a new application key
:: The .env.example file in the starter kit contains all the necessary modifications, so we can use it
:: It is not necessary to rewrite the DB configuration
copy .env.example .env
call php artisan key:generate
:: Installing JavaScript dependencies quietly
call npm install --silent
:: Generate front-end assets
call npm run dev
:: Creating an empty database file to make migartions run: database/database.sqlite
type nul > database/database.sqlite
:: Creating a fresh migration
call php artisan migrate:fresh
:: Seed the database
call php artisan db:seed
:: Prepare a folder for file upload
mkdir .\storage\app\public
:: Creating a symlink: /public/storage --> /storage/app/public
call php artisan storage:link
:: Starting the app
call php artisan serve
