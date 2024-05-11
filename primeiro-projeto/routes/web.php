<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bem-vindo', function () {
    return "Seja bem vindo!";
});

