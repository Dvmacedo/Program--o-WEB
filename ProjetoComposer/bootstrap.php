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

$r->get('/exer2/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer2');

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

$r->get('/exer3/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer3');

$r->post('/exer3/resposta', function(){
    $numbers = $_POST['numbers'];
    $smallest = min($numbers);
    $position = array_search($smallest, $numbers) + 1; 
        echo "O menor Número é: $smallest <br>";
        echo "A posição dele na sequencia é: $position";
});

$r->get('/exer4/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer4');

$r->post('/exer4/resposta', function(){
    $numero = $_POST['numero'];
    echo "<h2>Tabuada do $numero</h2>";
    for ($i = 0; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "$numero X $i = $resultado<br>";
    }
});

$r->get('/exer5/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer5');

$r->post('/exer5/resposta', function(){

});

$r->get('/exer6/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer6');

$r->post('/exer6/resposta', function(){

});

$r->get('/exer7/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer7');

$r->post('/exer7/resposta', function(){

});

$r->get('/exer8/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer8');

$r->post('/exer8/resposta', function(){

});

$r->get('/exer9/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer9');

$r->post('/exer9/resposta', function(){

});

$r->get('/exer10/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer10');

$r->post('/exer10/resposta', function(){

});

$r->get('/exer11/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer11');

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