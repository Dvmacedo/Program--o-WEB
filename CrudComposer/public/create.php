<?php

require '../vendor/autoload.php';

use App\Database;
use App\Functions;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$db = new Database();
$functions = new Functions($db);

$table = $_GET['table'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $functions->create($table, $data);
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create <?= ucfirst($table) ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Create <?= ucfirst($table) ?></h1>
        <form method="post">
            <?php if ($table === 'users'): ?>
                Name: <input type="text" name="name" class="form-control"><br>
                Email: <input type="text" name="email" class="form-control"><br>
            <?php elseif ($table === 'posts'): ?>
                User ID: <input type="text" name="user_id" class="form-control"><br>
                Title: <input type="text" name="title" class="form-control"><br>
                Content: <textarea name="content" class="form-control"></textarea><br>
            <?php elseif ($table === 'comments'): ?>
                Post ID: <input type="text" name="post_id" class="form-control"><br>
                User ID: <input type="text" name="user_id" class="form-control"><br>
                Comment: <textarea name="comment" class="form-control"></textarea><br>
            <?php elseif ($table === 'categories'): ?>
                Name: <input type="text" name="name" class="form-control"><br>
            <?php endif; ?>
            <input type="submit" value="Create" class="btn btn-primary">
        </form>
    </div>
</body>
</html>