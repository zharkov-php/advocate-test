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
Route::get('/show/{id}', 'MainController@show')->name('main.show');

Route::get('/', 'MainController@index')->name('main');

Route::get('generate-pdf/{id}','MainController@pdf')->name('main.pdf');
Route::get('download-pdf/{id}','MainController@download')->name('main.pdf_download');


Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::resource('documents', 'DocumentController');

    Route::prefix('documents')->group(function () {
        Route::get('generate-pdf/{id}','FiledocsController@pdf')->name('filedocs.pdf');
        Route::get('download-pdf/{id}','FiledocsController@download')->name('filedocs.pdf_download');
        Route::get('/filedocs', 'FiledocsController@index')->name('filedocs.index');
        Route::get('{id}/filedocs/create', 'FiledocsController@create')->name('filedocs.create');
        Route::post('/filedocs/store/', 'FiledocsController@store')->name('filedocs.store');
        Route::get('/filedocs/{id}/edit', 'FiledocsController@edit')->name('filedocs.edit');
        Route::put('/filedocs/{id}', 'FiledocsController@update')->name('filedocs.update');
        Route::delete('/filedocs/{id}', 'FiledocsController@destroy')->name('filedocs.destroy');

    });
});
