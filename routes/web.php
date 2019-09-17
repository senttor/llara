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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
    Route::resource('posts', 'PostController')->names('blog.posts');
});
//http://xxxx.com/blog/posts  => resources/views/blog/posts/index.blade.php
//Route::resource('rest', 'RestTestController')->names('restTest');

/*Route::resource('/cruds', 'CrudsController', [
    'except' => ['edit', 'show', 'store']
]);*/


//admin part

$groupData = [
    'namespace' => 'Blog\Admin',// locatiin for controller  (in the case)-> CategoryController
    'prefix' => 'admin/blog',
];

Route::group($groupData, function () {
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories', 'CategoryController')
        ->only($methods) //white list of methods
        ->names('blog.admin.categories');
});


