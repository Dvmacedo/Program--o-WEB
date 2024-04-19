<?php
$routes->get('/insertForms', function() {
    require_once '../src/views/insertForms.php';
});

// Receber dados do formulário e inserir nas tabelas
$routes->post('/insert', function() {
    require_once '../../config/database.php';
    require_once '../models/Table1.php';
    require_once '../models/Table2.php';
    require_once '../models/Table3.php';
    require_once '../models/Table4.php';

    // Receber dados do formulário
    $data_for_table1 = $_POST['data_for_table1'];
    $data_for_table2 = $_POST['data_for_table2'];
    $data_for_table3 = $_POST['data_for_table3'];
    $data_for_table4 = $_POST['data_for_table4'];

    // Conexão com o banco de dados
    $conn = new mysqli($host, $username, $password, $database);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Inserir registros nas tabelas
    $table1 = new Table1($conn);
    $table1->insert($data_for_table1);

    $table2 = new Table2($conn);
    $table2->insert($data_for_table2);

    $table3 = new Table3($conn);
    $table3->insert($data_for_table3);

    $table4 = new Table4($conn);
    $table4->insert($data_for_table4);

    // Fechar conexão
    $conn->close();

    // Redirecionar para página de sucesso
    header("Location: /success");
    exit;
});

$routes->get('/success', function() {
    require_once '../src/views/success.php';
});