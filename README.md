<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.vetro.co.za/wp-content/uploads/2017/09/VetroMedia-WhiteLogo.png" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Backend Development Assessment

Create a basic blog:

- Have an index page showing all posts .
- Have a create and edit page.
- Have a delete function.
- Have a way to rate a post .
- Only the owner of a post can edit/delete it.
- Form Validation (server-side).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Feel free to use any framework, composer packages etc.
Push code to github and provide descriptive commit messages. Also please provide how long
you spend on this assessment.

## Notes on how you would deploy it using LEMP or LAMP.
I’ll assume i have access to a web server configured with the LAMP (Linux, Apache, MySQL, PHP) or LEMP (Linux, Nginx, MySQL, PHP) stack, with (at time of writing for Laravel 5.8), the following specs:
•	PHP >= 7.3
•	BCMath PHP Extension
•	Ctype PHP Extension
•	JSON PHP Extension
•	Mbstring PHP Extension
•	OpenSSL PHP Extension
•	PDO PHP Extension
•	Tokenizer PHP Extension
•	XML PHP Extension


## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.4/installation#installation)


Clone the repository

    git clone https://github.com/Kwenziwa/vetro_assessment.git


Install all the dependencies using composer

    composer install — optimize-autoloader — no-dev

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration. 
Set APP_DEBUG to false and APP_ENV to production, and update the APP_NAME and APP_URL accordingly. 
If you leave APP_DEBUG as true, in the event of errors you’ll be displaying sensitive debug information.

    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=daily
    LOG_LEVEL=debug

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=8889
    DB_DATABASE=vetro_assessment
    DB_USERNAME=root
    DB_PASSWORD=root

Generate a new application key

    php artisan key:generate


Run the database migrations with seed (**Set the database connection in .env before migrating**)

    php artisan migrate --seed
    
We need to set some folder permissions so they are writeable, specifically the /storage/ and /bootstrap/cache/ folders.
    
    chmod -R o+w storage
    chmod -R o+w bootstrap/cache
    
To make these files accessible from the web, you should create a symbolic link from public/storage to storage/app/public.

    php artisan storage:link
    
Three simple steps for improving performanc

    php artisan config:cache
    php artisan config:clear
    php artisan route:cache
    php artisan route:clear
    php artisan route:cache


Start the local development server

    php artisan serve

You can now access the server at http://127.0.0.1:8000/ or visit your url if its on a live server 

