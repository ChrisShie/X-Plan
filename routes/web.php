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
//Route::get('/admin', 'HomeController@index')->name('admin');
Route::resource('/city', 'CityController');
Route::get('/city/{city}/getThumbnail', 'CityController@getThumbnail');
Route::post('/city/{city}/uploadThumbnail', 'CityController@uploadThumbnail');
Route::get('/city/{city}/getSlides', 'CityController@getSlides');
Route::post('/city/{city}/uploadSlides', 'CityController@uploadSlides');
Auth::routes();



