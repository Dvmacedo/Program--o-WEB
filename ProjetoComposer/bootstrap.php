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
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    if ($valor1 === $valor2) {
        $resultado = $soma * 3;
    } else {
        $resultado = $soma;
    }
        echo "Resultado: $resultado";
});

$r->get('/exer5/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer5');

$r->post('/exer5/resposta', function(){
    $numero = $_POST['numero'];
    echo "<h2>Tabuada do $numero</h2>";
    for ($i = 0; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "$numero X $i = $resultado<br>";
    }
});

$r->get('/exer6/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer6');

$r->post('/exer6/resposta', function(){
    $numero = $_POST["numero"];
    $fatorial = 1;
    $resultado = "";
    for ($i = $numero; $i > 1; $i--) {
        $fatorial *= $i;
        $resultado .= "$i * ";
    }
    $resultado .= "1";
    echo "<h2>Resultado do Fatorial de $numero</h2>";
    echo "<p>Processamento: $resultado</p>";
    echo "<p>Saída: $fatorial</p>";
});

$r->get('/exer7/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer7');

$r->post('/exer7/resposta', function(){
    $a = $_POST["a"];
    $b = $_POST["b"];
    if ($a == $b) {
        echo "Os Números são iguais: $a";
    } else {
    if ($a < $b) {
        echo "$a $b";
    } else {
        echo "$b $a";
}}});

$r->get('/exer8/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer8');

$r->post('/exer8/resposta', function(){
    $metros = $_POST["metros"];
    $centimetros = $metros * 100;
        echo "O valor de $metros metros equivale a $centimetros centímetros.";
});

$r->get('/exer9/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer9');

$r->post('/exer9/resposta', function(){
    $tamanho_area = $_POST['tamanho_area'];
    $litros_tinta = $tamanho_area / 3;
    $quantidade_latas = ceil($litros_tinta / 18);
    $preco_total = $quantidade_latas * 80;
        echo "Quantidade de latas de tinta necessárias: $quantidade_latas <br>";
        echo "Preço total das latas de tinta: R$ $preco_total";
});

$r->get('/exer10/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer10');

$r->post('/exer10/resposta', function(){
    $ano_nascimento = $_POST['ano_nascimento'];
    $ano_atual = date("Y");
    $idade = $ano_atual - $ano_nascimento;
    $dias_vividos = $idade * 365; 
    $idade_2025 = 2025 - $ano_nascimento;
        echo "a. Idade atual: $idade anos <br>";
        echo "b. Dias vividos até hoje: $dias_vividos dias <br>";
        echo "c. Idade em 2025: $idade_2025 anos";
});

$r->get('/exer11/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer11');

$r->post('/exer11/resposta', function(){
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $imc = $peso / ($altura * $altura);
        if ($imc < 18.5) {
        $condicao = "Abaixo do peso";
    } elseif ($imc >= 18.5 && $imc < 25) {
        $condicao = "Peso normal";
    } elseif ($imc >= 25 && $imc < 30) {
        $condicao = "Sobrepeso";
    } else {
        $condicao = "Obesidade";
    }
        echo "<h2>Seu IMC é: $imc</h2>";
        echo "<h3>Condição de peso: $condicao</h3>";
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