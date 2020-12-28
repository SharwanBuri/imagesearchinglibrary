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

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/admin/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/search', 'SearchController@index')->name('search');
Route::get('/search', 'SearchController@index')->name('search');


