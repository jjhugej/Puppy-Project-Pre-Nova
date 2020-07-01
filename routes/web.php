<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name('home');

Route::post('/pets/add', 'PetController@store');

Auth::routes();

Route::get('/pets', 'PetController@index');


/* //temp test route
Route::get('/addpet', 'PetController@create'); */





