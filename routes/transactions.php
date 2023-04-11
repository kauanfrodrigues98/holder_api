<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'index');
Route::get('/{id}', 'show');
Route::post('/', 'store');
Route::put('/{id}', 'update');
Route::delete('/{id}', 'destroy');