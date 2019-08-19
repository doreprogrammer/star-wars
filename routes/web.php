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


Route::get('/search','filmsController@searchFilms');
Route::get('/', 'filmsController@showFilms');
Route::get('episode/{id}', 'filmsController@showEpisode');
Route::get('/characters', 'charactersController@showCharacters');
