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

Route::get('/', 'HomeController@index');
Route::group(['prefix' => 'admin' , 'namespace' => 'Admin' , 'middleware'=> ['auth','admin']] , function (){
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::group(['prefix'=>'users'] , function (){
        Route::get('/', 'UsersController@index')->name('admin.users');
        Route::get('create', 'UsersController@create')->name('admin.users.create');
        Route::post('store', 'UsersController@store')->name('admin.users.store');
        Route::get('delete/{user_id}', 'UsersController@delete')->name('admin.users.delete');
        Route::get('edit/{user_id}', 'UsersController@edit')->name('admin.users.edit');
        Route::post('update/{user_id}', 'UsersController@update')->name('admin.users.update');
    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
