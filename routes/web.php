<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('main');
});
Route::get('/pets', 'PetController@index');

Auth::routes();


