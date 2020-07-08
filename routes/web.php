<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('main');
})->name('home');

Route::post('/pets/add', 'PetController@store');


Route::get('/pets', 'PetController@index');


/* //temp test route
Route::get('/addpet', 'PetController@create'); */





