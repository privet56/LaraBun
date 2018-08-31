# LaraBun: PHP, Laravel App to inform about Bunnies' life and races!

## Visual Code Extensions
- GitLens
- PHP IntelliSense
- SQLite

## Editor with Backend and Frontend projects

![editor](https://raw.githubusercontent.com/privet56/LaraBun/master/vsc.php.json.api.png)

## TODO:
    build frontend into backend/public
    front pic & title (animated)

## helpful commands:

    composer --version
    composer create-project --prefer-dist laravel/laravel LaraBun
    composer install                                            //installs dependencies from composer.json into /vendor

    php artisan list
    php artisan -h migrate										//h = help
    php artisan -h make:controller								//h = help
    php artisan make:model Bun
    php artisan make:model Bun -m								//m = create migration file too
    php artisan make:controller BunController --resource		//resource = create CRUD functions
    php artisan make:controller API/BunController --api
    php artisan make:migration create_buns_table
    php artisan make:seeder BunsTableSeeder
    php artisan make:resource BunsResource						//creates class to handle JSON Web API
    php artisan migrate
    php artisan db:seed
    php artisan migrate:refresh
    php artisan migrate:fresh --seed

    php artisan tinker
    DB::connection()->getPdo();
    DB::table('buns')->get();
    DB::table('buns')->find(3);
    Buns::where('id', '=', 3)->get();
    Buns::with('resource')->find(3);

### Swagger
    composer require "darkaonline/l5-swagger"
    php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
    php artisan l5-swagger:generate								//generates swagger docu, if you have comments a'la @SWG\Swagger( ...
    php -S localhost:8000 -t public/
    php artisan serve
    http://localhost:8000/api/documentation

### SQLite
    php.ini -> activate sqlite (pdo-) extension
    composer require doctrine/dbal
    php artisan migrate
    php artisan db:seed

## Setup
    php artisan jwt:secret
    php artisan key:generate                                    //they put keys into .env
    php -S localhost:8000 -t public/                            //use builtin php webserver, easier than xamp
    php artisan serve

### JWT
    composer.json -> "tymon/jwt-auth": "1.0.*"
    php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
    php artisan jwt:secret										//sets JWT_SECRET=??? into .env

### CORS
    composer require barryvdh/laravel-cors						//+ config in /app/Http/Kernel.php

### Angular CLI commands
    ng doc HttpClient											//opens docu
    ng new LaraBun_Frontend --style=scss --routing				//creates Angular project
    ng build --env=prod											//+ conf output in angular.json: "outputPath": "???"
    ng build --prod
    ng generate module pages/home --routing
    ng g c pages/home
    ng g class pages/auth/user
    ng g module buns											//generate module
    ng g component buns											//-> BunsComponent
    ng g service buns/buns										//-> BunsService
    ng g guard pages/auth/_guards/auth
    ng g pipe pages/buns/_pipes/bunSearch
    ng add @angular/pwa											//...and check with chrome plugin lighthouse, incl. SEO
    ng add @ng-bootstrap/schematics								//adds bootstrap
    ng test --watch
    npm run e2e

    npm install http-server -g									//local webserver for testing frontend
    http-server -p 8080											//start this command in the dist folder

### Debug mode:
    app.php
        'debug' => env('APP_DEBUG', true),                      //you will get nice error output in the browser

###

## PHP Editor in VSCode
![e1](https://raw.githubusercontent.com/privet56/LaraBun/master/vsc.php.editor.png)

## GitLens
![e2](https://raw.githubusercontent.com/privet56/LaraBun/master/vsc.gitlens.png)
