# Getting started

## Installation

Clone the repository

    git clone git@github.com:devs-ground/geographical-product.git

Switch to the repo folder

    cd geographical-product

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate:fresh --seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:devs-ground/geographical-product.git
    cd geographical-product
    composer install
    cp .env.example .env
    php artisan key:generate

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan optimize:clear
    php artisan migrate:fresh --seed
    php artisan serve
