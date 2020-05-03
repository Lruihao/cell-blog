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

Route::get('/search', 'SearchController@index')->name('search');

Route::permanentRedirect('/pages/about', '/about');
Route::permanentRedirect('/pages/guestbook', '/guestbook');

Route::get('/pages/{alias}', 'PageController@index')->name('page.show');

Route::get('/about', 'PageController@about')->name('about');
Route::get('/guestbook', 'PageController@guestbook')->name('guestbook');

Route::get('/rss', 'RssController@index')->name('rss');
