<?php

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

Route::get('/', 'HomeController')->name('home');

Route::get('books', 'BookController@index')->name('book.index');
Route::get('book/{book}-{title?}', 'BookController@show')->name('book.show');
Route::get('book/{book}/cover.jpg', 'BookCoverController')->name('book.cover');

Route::get('download/{file}', 'BookDownloadController')->name('book.download');

Route::get('authors', 'AuthorController@index')->name('author.index');
Route::get('author/{author}-{name?}', 'AuthorController@show')->name('author.show');

Route::get('series', 'SeriesController@index')->name('series.index');
Route::get('series/{series}-{name?}', 'SeriesController@show')->name('series.show');

Route::get('publishers', 'PublisherController@index')->name('publisher.index');
Route::get('publisher/{publisher}-{name?}', 'PublisherController@show')->name('publisher.show');