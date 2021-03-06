# LaraBun: PHP, Laravel App to inform about Bunnies' life and races!

## Start App: Backend, Frontend & Browser:
    php -S localhost:8000 -t public/            //in the LaraBun_Backend folder
    ng serve                                    //in the LaraBun_Fronten folder
    http://localhost:4200

## Visual Code Extensions
- GitLens
- PHP IntelliSense
- SQLite

## Frontend in front of the Code editor:

![fe](https://raw.githubusercontent.com/privet56/LaraBun/master/img/frontend.gif)

## TODO:
	fill in a lot of real data

## Editor with Backend and Frontend projects

![editor](https://raw.githubusercontent.com/privet56/LaraBun/master/img/vsc.php.json.api.png)

## Commands:

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
    php artisan make:test BunTest
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

## Frontend on mobile (iPhone X) in comparison with the Desktop browser:

![fem](https://raw.githubusercontent.com/privet56/LaraBun/master/img/frontend_mobile.gif)

## Project Setup
    php artisan jwt:secret										//attention: do not check in secrets & keys in to your git repo
    php artisan key:generate                                    //they put keys into .env
    php -S localhost:8000 -t public/                            //use builtin php webserver, easier than xamp
    php artisan serve

### Swagger
    composer require "darkaonline/l5-swagger"
    php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
    php artisan l5-swagger:generate								//generates swagger docu, if you have comments a'la @SWG\Swagger( ...
    php artisan serve                                           //don't use 'php -S ...'
    http://localhost:8000/api/documentation

### SQLite
    php.ini -> activate sqlite (pdo-) extension
    composer require doctrine/dbal
    php artisan migrate
    php artisan db:seed

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

    ng update --all --force                                     //update all dependencies of package.json

    npm install http-server -g									//local webserver for testing frontend
    http-server -p 8080											//start this command in the dist folder

### Debug mode:
    app.php
        'debug' => env('APP_DEBUG', true),                      //you will get nice error output in the browser

###

## PHP Editor in VSCode
![e1](https://raw.githubusercontent.com/privet56/LaraBun/master/img/vsc.php.editor.png)

## GitLens
![e2](https://raw.githubusercontent.com/privet56/LaraBun/master/img/vsc.gitlens.png)


## Lighthouse Audit:
    Performance: not ok (too large animated assets / gif)
    PWA: OK
    Accessibility: OK
    Best Practices: OK
    SEO: OK

![audit](https://raw.githubusercontent.com/privet56/LaraBun/master/img/lighthouse.audit.png)

## Swagger UI:

![swui](https://raw.githubusercontent.com/privet56/LaraBun/master/img/swagger_ui_for_buns.gif)
