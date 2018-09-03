<?php

use Illuminate\Http\Request;
use App\Bun;
use App\Http\Resources\BunsResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Register Routes
Route::post('register', 'API\AuthController@register');
Route::post('login', 'API\AuthController@login');
Route::get('login', 'API\AuthController@login');
Route::post('logout', 'API\AuthController@logout');

Route::apiResources([
    'buns' => 'API\BunController',
    'items' => 'API\ItemController',
    'buns/{bun}/ratings' => 'API\RatingController'
]);

Route::middleware('jwt.auth')->get('me', function(Request $request) {
    return auth()->user();
});
