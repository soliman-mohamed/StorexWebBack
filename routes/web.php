<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:web'], function(){
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login', 'AuthController@makeLogin')->name('login');
});


Route::group(['middleware' => 'auth:web'], function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');

    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('movies', 'MovieController');

    Route::any('logout', function() {
        auth('web')->logout();
        return redirect('login');
    })->name('logout');
});
