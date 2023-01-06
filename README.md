# Sportify

Sportify web development by...

## Getting Started

This project develop with Laravel framework. Visit https://laravel.com for more information.

## Requirement

* PHP >= 7.3.x
* MySql
* Composer
* NodeJS (development only)

## Installing 

1. Clone latest source from repository
        
        brach master for production and branch develop for development

2. Create .env file
    * Copy `.env` file from `.env.example` file.
    * Change value of
        * APP_ENV
            `local, dev or production`
        * APP_DEBUG
            `true for development or dev, and false for production`
        * APP_URL
        * DATABASE CONNECTION

3. Run `composer install`
4. Run `php artisan key:generate`
5. Run `composer dump autoload`

6. Frontend Development
    
        If no frontend development, skip to step 7

    * Run `npm install`
    * Compile Js and SCSS assets
        - Run `npm development` or `npm production` for minify
    * Use BEM Methodologies for writing styles : https://getbem.com/introduction/

7. Database Migration 

        If no backend development, skip this step
        Please makesure DB table is available, and DB connection already set in .env

    * Run `php artisan migrate`
    * Run `php artisan DB:seed`
    * Choose all, and enter.
        * If you want to dump Dummy data, please repeat seeder, and choose anything what you want.

## Development

### Local Development Server
* Run `php artisan serve`
* Run `npm run watch`
* Open http://localhost:8000 in web browser

### Production Server
tbd

## Maintenance
tbd

### Notes

    Any problem? hope not :).
