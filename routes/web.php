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


Route::get('/', function () {
    return view('welcome');
});

    Route::get('/index', 'ProductsController@index');
    Route::get('register', 'UserController@register');
    Route::resource('user', 'UserController');
    Route::get('login', 'UserController@login');
    Route::get('lang/{lang}', function ($lang) {
        if(session()->has('lang'))
        {
            session()->forget('lang');
        }
        if($lang == 'ar') {
            session()->put('lang', 'ar');
        } else {
            session()->put('lang', 'en');
            //session()->put('lang', 'sp');
        }
        return back();
    });