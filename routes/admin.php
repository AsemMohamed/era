<?php

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {

    Config::set('auth.defines', 'admin');
    Route::get('login', 'adminAuth@login');
    Route::post('login', 'adminAuth@doLogin');
    Route::group(['middleware' => 'admin:admin'], function () {

        Route::resource('admins', 'adminController');
        Route::resource('users', 'userController');
        Route::get('home', function () {
            return view('admin/home');
        });
        Route::any('logout', 'adminAuth@logout');
    });
        Route::resource('products','productController');
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
});

/*Route::get('/home', function () {
    return view('admin/home');
});*/