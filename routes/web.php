<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('main');
});
Route::get('/pets', 'PetController@index');
Route::post('/pets/add', 'PetController@store');

//temp test route
Route::get('/addpet', 'PetController@create');

Auth::routes();


