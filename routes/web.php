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

Route::get('/', 'HomeController@index');

Route::get('/articles/{id}', 'ArticleController@index')->name('article');

Route::get('/categories/{id}', 'CategoryController@index')->name('category');

Route::get('/tags/{id}', 'TagController@index')->name('tag');

Route::get('/search', 'ArticleController@search')->name('search');

Route::get('/about', 'PageController@about')->name('about');
Route::get('/guestbook', 'PageController@guestbook')->name('guestbook');
Route::get('/links', 'PageController@links')->name('links');
Route::get('/album', 'PageController@album')->name('album');

Route::permanentRedirect('/pages/about', '/about');
Route::permanentRedirect('/pages/guestbook', '/guestbook');
Route::permanentRedirect('/pages/links', '/links');
Route::permanentRedirect('/pages/album', '/album');

Route::get('/pages/{alias}', 'PageController@index')->name('page.show');


