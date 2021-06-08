<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// 記事
Route::get('/', "App\Http\Controllers\Article\ArticleController@index")->name('articles.index');
Route::middleware('auth')->group(function() {
    Route::get('/create', "App\Http\Controllers\Article\ArticleController@create")->name('articles.create');
    Route::post('/store', "App\Http\Controllers\Article\ArticleController@store")->name('articles.store');
    Route::post('/destroy/{article}', "App\Http\Controllers\Article\ArticleController@destroy")->name('articles.destroy');
    Route::get('/edit/{article}', "App\Http\Controllers\Article\ArticleController@edit")->name('articles.edit');
    Route::post('/edit/{article}/update', "App\Http\Controllers\Article\ArticleController@update")->name('articles.update');
});

// ユーザー
require __DIR__.'/auth.php';
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{id}', "App\Http\Controllers\User\UserController@show")->name('show');
});