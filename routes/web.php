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

Route::get('/img/icons/arrowdown.svg', 'SvgController@arrowdown');
Route::get('/img/icons/medal.svg', 'SvgController@medal');
Route::get('/img/icons/medal-red.svg', 'SvgController@medalred');

Route::get('/animaux/{slug}', 'SpeciesController@listing')->name('animals.of.species');
Route::get('/search', 'SearchController@search')->name('search');
