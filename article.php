<?php
require_once "db_connection.php";
require_once "functions.php";

$id = (int) $_GET["article"];

$post = getPostById($connection, $id);

$user_id = $post["user_id"];
$title = $post["post_head"];
$content = $post["content"];

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1><a href="/">My Blog</a></h1>
    </header>
    <hr>

    <h2><?= $title ?></h2>
    <p><?= $content ?></p>
    <?php

    if (empty($content)): ?>
        <h3>Article NOT found</h3>
    <?php endif; ?>
    <hr>

        <footer>
        <h1>Copyright Mohammed Attya 2017</h1>
    </footer>
</body>
</html>