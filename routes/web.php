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

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::resource('documents', 'DocumentController');

    Route::prefix('documents')->group(function () {
        Route::get('/filedocs', 'FiledocsController@index')->name('filedocs.index');
        Route::get('{id}/filedocs/create', 'FiledocsController@create')->name('filedocs.create');
        Route::post('/filedocs/store/', 'FiledocsController@store')->name('filedocs.store');
        Route::get('/filedocs/{id}/edit', 'FiledocsController@edit')->name('filedocs.edit');
        Route::put('/filedocs/{id}', 'FiledocsController@update')->name('filedocs.update');
        Route::delete('/filedocs/{id}', 'FiledocsController@destroy')->name('filedocs.destroy');

    });
});
