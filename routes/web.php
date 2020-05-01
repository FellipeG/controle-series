<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::resource('series', 'SeriesController');
Route::get('series/{series}/temporadas', 'TemporadasController@index')->name('temporadas.index');
Route::get('temporadas/{temporada}/episodios', 'EpisodiosController@index')->name('episodios.index');
Route::put('temporadas/{temporada}/episodios', 'EpisodiosController@update')->name('episodios.update')
    ->middleware('autenticateUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/in', 'InController@index')->name('in.index');
Route::post('/in', 'InController@in')->name('in.in');

Route::get('/register', 'RegisterController@create')->name('register.create');
Route::post('/register', 'RegisterController@store')->name('register.store');

Route::get('/out', function() {
    Auth::logout();
    return redirect()->route('in.index');
})->name('out');
