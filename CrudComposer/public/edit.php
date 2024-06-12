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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $functions->update($table, $id, $data);
    header("Location: index.php");
    exit();
}

$record = $functions->getById($table, $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit <?= ucfirst($table) ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit <?= ucfirst($table) ?></h1>
        <form method="post">
            <?php if ($table === 'users'): ?>
                Name: <input type="text" name="name" value="<?= $record['name'] ?>" class="form-control"><br>
                Email: <input type="text" name="email" value="<?= $record['email'] ?>" class="form-control"><br>
            <?php elseif ($table === 'posts'): ?>
                User ID: <input type="text" name="user_id" value="<?= $record['user_id'] ?>" class="form-control"><br>
                Title: <input type="text" name="title" value="<?= $record['title'] ?>" class="form-control"><br>
                Content: <textarea name="content" class="form-control"><?= $record['content'] ?></textarea><br>
            <?php elseif ($table === 'comments'): ?>
                Post ID: <input type="text" name="post_id" value="<?= $record['post_id'] ?>" class="form-control"><br>
                User ID: <input type="text" name="user_id" value="<?= $record['user_id'] ?>" class="form-control"><br>
                Comment: <textarea name="comment" class="form-control"><?= $record['comment'] ?></textarea><br>
            <?php elseif ($table === 'categories'): ?>
                Name: <input type="text" name="name" value="<?= $record['name'] ?>" class="form-control"><br>
            <?php endif; ?>
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>
</html>