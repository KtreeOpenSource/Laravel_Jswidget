<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\CheckRequest;

Route::get('/', function () {
    return view('welcome');
});


//->middleware(CheckRequest::class);


Route::group(['prefix' => 'operations','middleware' => CheckRequest::class], function()
{
    Route::get('/test/{manager1}/{manager2?}', function ($manager1,$manager2 = null) {
        return $manager1.$manager2;
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
