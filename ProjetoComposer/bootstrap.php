<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#rotas

$r->get('/olamundo', function(){
    return "Olá Mundo!";
});

$r->get('/olapessoa', function(){
    return "Olá Pessoa!";
});

$r->get('/olapessoa/{nome}', function($params){
    return 'olá ' .$params[1];
});

$r->get('/exer1/formulario', function(){
    include("exer1.html");
});

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";
});

$r->get('/exer2/formulario', function(){
    include("exer2.html");
});

$r->post('/exer2/resposta', function(){
    $number = $_POST['number'];
    $number = intval($number);
        if ($number > 0) {
        echo "Valor Positivo";
    } elseif ($number < 0) {
        echo "Valor Negativo";
    } else {
        echo "Igual a Zero";
}});

#rotas

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());