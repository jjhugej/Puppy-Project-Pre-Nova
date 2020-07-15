<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('main');
})->name('home');

Route::post('/pets/add', 'PetController@store');


Route::get('/pets', 'PetController@index');
Route::get('/pets/show/{pet}', 'PetController@show');
Route::get('/pets/liked', 'PetController@likedPets');

Route::get('/pets/search/', 'PetController@refineSearch');

Route::post('/pets/like/{id}', 'PetController@like');
Route::post('/pets/unlike/{id}', 'PetController@unlike');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* //temp test route
Route::get('/addpet', 'PetController@create'); */





