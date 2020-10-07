<?php

use App\Http\Controllers\PostController;
use App\Post;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome', [
        'posts' => Post::latest()->get(),
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('user', 'UserController');

Route::group(['middleware' => ['role:user|super-admin']], function(){
    Route::get('/post/create', 'PostController@index');
    Route::post('/post/create', 'PostController@create');              
    Route::get('/post/read/{post}', 'PostController@read');              
    Route::get('/post/update/{post}', 'PostController@updateIndex');
    Route::post('/post/update/{post}', 'PostController@update');              
    Route::get('/post/delete/{post}', 'PostController@delete');    
});


Route::get('/user/read/{user}');
Route::get('/user/update/{user}');

Route::get('/user/delete/{user}', 'UserController@delete')
    ->middleware('permission:delete user|role:super-admin');


Route::group(['middleware' => ['role:admin|super-admin']], function(){ 
    Route::get('/admin', 'UserController@index')
        ->name('admin');
    
    Route::get('/admin/moveUp/{id}', 'UserController@moveUpRole')
        ->name('moveUpRole');

    Route::get('/admin/moveDown/{id}', 'UserController@moveDownRole')
        ->name('moveDownRole');
    
    Route::get('/admin/{options}', 'UserController@admin')
        ->name('admin-filters')
        ->where('options', 'admin|super-admin|user|online');
});


