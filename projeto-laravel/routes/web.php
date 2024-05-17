<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});

Route::get('/bem-vindo', function(){
    return "Seja bem vindo!";
});

Route::get('/exer1', function(){
    return view('exer1');
});

Route::post('/exer1resp', function(Request $request){
    $valor = $request->input('valor1');
    return $valor;
});

Route::get('/mensagem/{mensagem}', [HomeController::class, 'mostrarMensagem']);