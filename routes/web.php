<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/post/create', 'PostController@index');
Route::post('/post/create', 'PostController@create');

Route::get('/post/read/{id}', 'PostController@read');
Route::get('/post/update/{id}', 'PostController@updateIndex');
Route::post('/post/update/', 'PostController@update');
Route::get('/post/delete/{id}', 'PostController@delete');


Route::group(['middleware' => ['role:super-admin']], function(){ 
                Route::get('/admin', 'UserController@index')->name('admin');
                Route::get('/admin/moveUp/{role}', 'UserController@moveUpRole')->name('moveUpRole');
                Route::get('/admin/moveDown/{role}', 'UserController@moveDownRole')->name('moveDownRole');
                Route::get('/admin/{options}', 'UserController@admin')->name('admin-filters');
                
});


