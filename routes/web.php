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
Route::get('/', 'PostsController@index');
Route::post('/posts/search', 'PostsController@search')->name('search');
Route::post('/posts', 'PostsController@store')->name('store');
Route::delete('/posts/{post}', 'PostsController@destroy')->name('delete');
Route::get('/users/{user}', 'UserController@mypage')->where('user', '[0-9]+')->name('mypage');
Route::get('/users/{user}/editprofile', 'UserController@editprofile')->where('user', '[0-9]+')->name('editprofile');
Route::patch('/user/{user}/', 'UserController@profileUpdate')->where('user', '[0-9]+')->name('profileUpdate');
Route::get('/posts/post', 'PostsController@post')->name('post');
Auth::routes(['verify' => 'true']);
Route::get('/home', 'HomeController@index')->name('home');

