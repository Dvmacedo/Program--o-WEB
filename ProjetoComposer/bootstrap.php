<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'];

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#rotas

$r->get('/olamundo', function(){
    return "Olá Mundo!";
});

#rotas

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());