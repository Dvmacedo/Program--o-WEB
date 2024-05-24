<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Alteração de Clientes</title>
</head>
<body>
    <h1>Formulário de Alteração de Clientes</h1>
    <form action="{{ route('clientes.update') }}">
        @CSRF
        @method('PUT')
        <label for="nome">Informe o nome do Cliente</label>
        <input type="text" name="nome" id="nome"><br/>
        <label for="telefone">Informe o telefone do Cliente</label>
        <input type="text" name="telefone" id="telefone"><br/>
        <label for="email">Informe o email do Cliente</label>
        <input type="text" name="email" id="email"><br/>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>