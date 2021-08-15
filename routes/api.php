<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'App\Http\Controllers\UserController@register');

Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::get('authenticated', 'App\Http\Controllers\UserController@getAuthenticatedUser');


Route::group(['middleware' => ['jwt.verify']], function() {
	Route::get('people', 'App\Http\Controllers\PeopleController@index');
	Route::get('programers', 'App\Http\Controllers\ProgramerController@index');
	Route::get('programer/{id}', 'App\Http\Controllers\ProgramerController@getProgramer');
	Route::post('/people/create', 'App\Http\Controllers\PeopleController@store');
	Route::get('/find/people/{name}', 'App\Http\Controllers\PeopleController@findname');
	Route::get('/people/delete/{id}', 'App\Http\Controllers\PeopleController@delete');
	Route::post('/people/githubuser', 'App\Http\Controllers\ProgramerController@makeUser');
	Route::get('/programs/orders/{id}', 'App\Http\Controllers\ProgramController@getOrders');
	Route::get('/programs/orders/all/{id}', 'App\Http\Controllers\ProgramController@allOfProyect');
	Route::post('/programs/orders/edit', 'App\Http\Controllers\ProgramController@editOrder');
	Route::post('/programs/make/order', 'App\Http\Controllers\ProgramController@store');
 });