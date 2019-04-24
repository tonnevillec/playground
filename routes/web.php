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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::post('/attachments', 'AttachmentsController@store')->name('attachments.store');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'Admin\AdminController@index')->name('admin');

    Route::resource('posts', 'Admin\PostsController');
    Route::resource('tags', 'Admin\TagsController')->except([
        'destroy',
    ]);

    Route::resource('users', 'Admin\UsersController');
});
