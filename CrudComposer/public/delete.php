<?php

require '../vendor/autoload.php';

use App\Database;
use App\Functions;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = new Database();
$functions = new Functions($db);

$table = $_GET['table'];
$id = $_GET['id'];

$functions->delete($table, $id);
header("Location: index.php");
exit();