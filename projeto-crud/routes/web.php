<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensagemController;


Route::get('/', function () {
    return view('welcome');
});

Route::get(
    "/mensagem/{mensagem}", [MensagemController::class, 'mostrarMensagem']);

Route::resources([
    'clientes' => ClienteController::class,
]);

Route::get(
    '/clientes/delete/{id}', [ClienteController::class, 'delete']);

Route::get(
    '/clientes/edit/{id}', [ClienteController::class, 'edit']);