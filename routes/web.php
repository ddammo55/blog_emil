<?php

Route::get('/', function () {
    return view('main');
});

Route::get('/1', function () {
    return view('welcome');
});


///////////
//|로그인 누르면 이동|//
Route::get('/user/login', 'SessionController@create');


Auth::routes(['verify' => true]);

Route::get('profile', function () {
   return view('profile');
})->middleware('verified');

//Route::get('/', 'HomeController@index')->name('home');
//Auth()->user()->name;


