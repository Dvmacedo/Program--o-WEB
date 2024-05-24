<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function mostrarMensagem($mensagem)
    {
        return view('mensagem', compact('mensagem'));
    }
}
