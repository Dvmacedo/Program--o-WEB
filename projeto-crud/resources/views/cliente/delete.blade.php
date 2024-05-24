<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Exclusão de Clientes</title>
</head>
<body>
    <h1>Formulário de Exclusão de Clientes</h1>
    <form action="{{ route('clientes.destroy') }}">
        @CSRF
        @method('DELETE')
        <label for="nome">Informe o nome do Cliente</label>
        <input type="text" name="nome" id="nome" disabled><br/>
        <label for="telefone">Informe o telefone do Cliente</label>
        <input type="text" name="telefone" id="telefone" disabled><br/>
        <label for="email">Informe o email do Cliente</label>
        <input type="text" name="email" id="email" disabled><br/>
        <button type="submit">Excluir</button>
    </form>
</body>
</html>