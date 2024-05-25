<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="{{ route('clientes.create') }}">Inserir Cliente</a>
    <table>
        <tr>
            <td>Nome</td>
            <td></td>
        </tr>
        @foreach ($clientes as $c )
        <tr>
            <td>{{ $c->nome }}</td>
            <td>
                <a href="{{ route('clientes.edit', $c->id) }}">Alterar</a>
                <a href="/clientes/delete/{{$c->id}}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>