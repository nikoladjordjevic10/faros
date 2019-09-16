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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

// Categories routes
Route::get('admin/categories', 'CategoryController@index')->name('categories.index');
Route::get('admin/categories/create', 'CategoryController@create')->name('categories.create');
Route::post('admin/categories', 'CategoryController@store')->name('categories.store');
Route::get('admin/categories/{category}', 'CategoryController@show')->name('categories.show');
Route::get('admin/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
Route::patch('admin/categories/{category}', 'CategoryController@update')->name('categories.update');
Route::delete('admin/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

// Chairs routes
Route::resource('admin/chairs', 'ChairController');
// Route::get('admin/chairs', 'ChairController@index')->name('chairs.index');
// Route::get('admin/chairs/create', 'ChairController@create')->name('chairs.create');
// Route::post('admin/chairs', 'ChairController@store')->name('chairs.store');
// Route::get('admin/chairs/{chair}', 'ChairController@show')->name('chairs.show');
// Route::get('admin/chairs/{chair}/edit', 'ChairController@edit')->name('chairs.edit');
// Route::patch('admin/chairs/{chair}', 'ChairController@update')->name('chairs.update');
// Route::delete('admin/chairs/{chair}', 'ChairController@destroy')->name('chairs.destroy');
Route::get('admin/chairs/{chair}/editImages', 'ChairController@editImages')->name('chairs.editImages');
Route::delete('admin/chairs/{image}/editImages', 'ChairController@destroyImages')->name('chairs.destroyImages');
Route::post('admin/chairs/{chair}/editImages', 'ChairController@storeImagesOnly')->name('chairs.storeImagesOnly');

// Tables routes
Route::resource('admin/tables', 'TableController');
// Route::get('admin/tables', 'TableController@index')->name('tables.index');
// Route::get('admin/tables/create', 'TableController@create')->name('tables.create');
// Route::post('admin/tables', 'TableController@store')->name('tables.store');
// Route::get('admin/tables/{table}', 'TableController@show')->name('tables.show');
// Route::get('admin/tables/{table}/edit', 'TableController@edit')->name('tables.edit');
// Route::patch('admin/tables/{table}', 'TableController@update')->name('tables.update');
// Route::delete('admin/tables/{table}', 'TableController@destroy')->name('tables.destroy');
Route::get('admin/tables/{table}/editImages', 'TableController@editImages')->name('tables.editImages');
Route::delete('admin/tables/{image}/editImages', 'TableController@destroyImages')->name('tables.destroyImages');
Route::post('admin/tables/{table}/editImages', 'TableController@storeImagesOnly')->name('tables.storeImagesOnly');

