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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('about','PageController@about')->name('about');

Route::post('/posts/{post}/comments','CommentController@store');
Route::get('/posts/{post}/comments','CommentController@index');
Route::resource('posts', 'PostController');

Route::view('/contacts/thanks','contacts.thanks')->name('contacts.thanks');
Route::resource('contacts', 'ContactController')->only('index', 'create', 'store');
