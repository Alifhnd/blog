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


//use App\Model\User;

//Route::get('/test' , function (){
//    $user = User::all()->pluck('email');
//    dd($user);
//});

Route::group( ['prefix'=>'posts' , 'middleware'=>['auth' , 'admin' , 'editor']],function() {
    Route::get('/', 'PostsController@index')->name('posts');
    Route::get('create', 'PostsController@create')->name('posts.create');
    Route::post('store', 'PostsController@store')->name('posts.store');
    Route::get('delete/{post_id}', 'PostsController@delete')->name('posts.delete');
    Route::get('edit/{post_id}', 'PostsController@edit')->name('posts.edit');
    Route::post('update/{post_id}', 'PostsController@update')->name('posts.update');
});


Route::group( ['prefix'=>'posts' , 'middleware'=>['auth' , 'editor' , ]],function() {
    Route::get('/', 'PostsController@index')->name('posts');
    Route::get('create', 'PostsController@create')->name('posts.create');
    Route::post('store', 'PostsController@store')->name('posts.store');

});

Route::group( ['prefix'=>'posts' , 'middleware'=>['auth' , 'author']],function() {
    Route::get('create', 'PostsController@create')->name('posts.create');
    Route::post('store', 'PostsController@store')->name('posts.store');

});
