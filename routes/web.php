<?php

Route::get('/', function () {
    return view('main');
});

// Route::get('/1', function () {
//     return view('welcome');
// });


///////////
//|로그인 누르면 이동|//
Route::get('/user/login', [
	'as' => 'login',
	'uses' => 'SessionController@create',
]);


Auth::routes(['verify' => true]);


Route::get('profile', function () {
   return view('profile');
})->middleware('verified');

//Route::get('/1', 'HomeController@index')->name('/');
//Auth()->user()->name;



// //|회원가입완료를 누르면 이 로직으로 이동|//
// Route::post('auth/register', [
//     'as' => 'users.store',
//     'uses' => 'UsersController@store',
// ]);



