<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //vai exibir a tabela com todos os clientes
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //vou mostrar o formulario de cadastro de cliente
        Clientes::create([
            'nome' => 'Vanessa', 'telefone' => '1233456789', 'idade' => 10
        ]);
        return "Registro inserido!";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //salvar os dados na tabela clientes
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
