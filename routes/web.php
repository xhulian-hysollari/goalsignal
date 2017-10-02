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

use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],

    function() {

    Auth::routes();

    Route::get('/dashboard/users/profile', ['middleware' => ['auth', 'active'], 'as' => 'users.profile', 'uses' => 'HomeController@index']);

    Route::get('/', ['as' => 'feeds.index', 'uses' => 'FeedsController@index']);


    Route::get('/feeds/allNews', ['as' => 'feeds.allNews', 'uses' => 'FeedsController@all']);


    Route::get('/feeds/create', ['middleware' => ['auth', 'active'], 'as' => 'feeds.create', 'uses' => 'FeedsController@create']);
    Route::get('/feeds/show/{id}', ['as' => 'feeds.show', 'uses' => 'FeedsController@show']);
    Route::post('/feeds/store', ['middleware' => ['auth', 'active'], 'as' => 'feeds.store', 'uses' => 'FeedsController@store']);
    Route::patch('/feeds/update/{id}', ['middleware' => ['auth', 'active'], 'as' => 'feeds.update', 'uses' => 'FeedsController@update']);
    Route::get('/feeds/edit/{id}', ['middleware' => ['auth', 'active'], 'as' => 'feeds.edit', 'uses' => 'FeedsController@edit']);

    Route::get('/feeds/destroy/{id}', ['middleware' => ['auth', 'active'], 'as' => 'feeds.destroy', 'uses' => 'FeedsController@destroy']);

    Route::get('/feeds/showCategory/{url}', ['as' => 'feeds.categories', 'uses' => 'FeedsController@showByCategory']);


    Route::get('/dashboard/categories', ['middleware' => ['auth', 'active'], 'as' => 'categories.index', 'uses' => 'CategoriesController@index']);
    Route::get('/dashboard/categories/create', ['middleware' => ['auth', 'active'], 'as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    Route::post('/dashboard/categories/store', ['middleware' => ['auth', 'active'], 'as' => 'categories.store', 'uses' => 'CategoriesController@store']);
    Route::patch('/dashboard/categories/update/{id}', ['middleware' => ['auth', 'active'], 'as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    Route::get('/dashboard/categories/edit/{id}', ['middleware' => ['auth', 'active'], 'as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::get('/dashboard/categories/destroy/{id}', ['middleware' => ['auth', 'active'], 'as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);

    Route::get('/dashboard/users/', ['middleware' => ['auth', 'active'], 'as' => 'users.index', 'uses' => 'UserController@index']);
    Route::get('/dashboard/users/create', ['middleware' => ['auth', 'active'], 'as' => 'users.create', 'uses' => 'UserController@create']);


    Route::get('/register', ['middleware' => ['registered'], 'as' => 'users.register', 'uses' => 'UserController@create']);

    Route::get('/registered', ['middleware' => ['registered'], 'as' => 'users.registered', 'uses' => 'UserController@store']);


    Route::post('/dashboard/users/store', ['as' => 'users.store', 'uses' => 'UserController@store']);

    Route::get('/dashboard/users/profile', ['middleware' => ['auth', 'active'],'as' => 'users.profile', 'uses' => 'UserController@show']);
    Route::get('/dashboard/users/showUsers/{id}', ['middleware' => ['auth', 'active', 'admin'],'as' => 'users.showUsers', 'uses' => 'UserController@showUsers']);

    Route::get('/dashboard/users/edit/{id}', ['middleware' => ['auth', 'active'], 'as' => 'users.edit', 'uses' => 'UserController@edit']);
    Route::patch('/dashboard/users/update/{id}', ['middleware' => ['auth', 'active'], 'as' => 'users.update', 'uses' => 'UserController@update']);
    Route::get('/dashboard/users/destroy/{id}', ['middleware' => ['auth', 'active'], 'as' => 'users.destroy', 'uses' => 'UserController@destroy']);
    Route::get('/dashboard/users/activate/{id}', ['middleware' => ['auth', 'active'], 'as' => 'users.activate', 'uses' => 'UserController@activate']);


    Route::get('/dashboard/pages', ['middleware' => ['auth', 'active'], 'as' => 'pages.index', 'uses' => 'PagesController@index']);
    Route::get('/dashboard/pages/create', ['middleware' => ['auth', 'active'], 'as' => 'pages.create', 'uses' => 'PagesController@create']);
    Route::get('/dashboard/pages/show/{url}', ['as' => 'pages.show', 'uses' => 'PagesController@show']);
    Route::get('/dashboard/pages/edit/{id}', ['middleware' => ['auth', 'active'], 'as' => 'pages.edit', 'uses' => 'PagesController@edit']);

    Route::post('/dashboard/pages/store', ['middleware' => ['auth', 'active'], 'as' => 'pages.store', 'uses' => 'PagesController@store']);

    Route::patch('/dashboard/pages/update/{id}', ['middleware' => ['auth', 'active'], 'as' => 'pages.update', 'uses' => 'PagesController@update']);
    Route::get('/dashboard/pages/destroy/{id}', ['middleware' => ['auth', 'active'], 'as' => 'pages.destroy', 'uses' => 'PagesController@destroy']);
});


Route::get('/testing', function () {
    return view('partials.testing');
});