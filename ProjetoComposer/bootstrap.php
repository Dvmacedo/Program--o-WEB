<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#rotas

$r->get('/olamundo', 'Php\Primeiroprojeto\Controllers\HomeControllers@olaMundo');

$r->get('/olapessoa', function(){
    return "Olá Pessoa!";
});

$r->get('/olapessoa/{nome}', function($params){
    return 'olá ' .$params[1];
});

$r->get('/exer1/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer1');

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

$r->get('/exer3/formulario', function(){
    include("exer3.html");
});

$r->post('/exer3/resposta', function(){
    $numbers = $_POST['numbers'];
    $smallest = min($numbers);
    $position = array_search($smallest, $numbers) + 1; 
        echo "O menor Número é: $smallest <br>";
        echo "A posição dele na sequencia é: $position";
});

$r->get('/exer4/formulario', function(){
    include("exer4.html");
});

$r->post('/exer4/resposta', function(){

});

$r->get('/exer5/formulario', function(){
    include("exer4.html");
});

$r->post('/exer5/resposta', function(){

});

$r->get('/exer6/formulario', function(){
    include("exer4.html");
});

$r->post('/exer6/resposta', function(){

});

$r->get('/exer7/formulario', function(){
    include("exer4.html");
});

$r->post('/exer7/resposta', function(){

});

$r->get('/exer8/formulario', function(){
    include("exer4.html");
});

$r->post('/exer8/resposta', function(){

});

$r->get('/exer9/formulario', function(){
    include("exer4.html");
});

$r->post('/exer9/resposta', function(){

});

$r->get('/exer10/formulario', function(){
    include("exer4.html");
});

$r->post('/exer10/resposta', function(){

});

$r->get('/exer11/formulario', function(){
    include("exer4.html");
});

$r->post('/exer11/resposta', function(){

});

$r->get('/categoria/inserir', 'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

$r->post('/categoria/novo', 'Php\Primeiroprojeto\Controllers\CategoriaController@novo');

#rotas

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}