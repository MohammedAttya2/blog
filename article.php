<?php
require_once "db_connection.php";
require_once "functions.php";

$id = (int) $_GET["article"];

$post = getPostById($connection, $id);

$user_id = $post["user_id"];
$title = $post["post_head"];
$content = $post["content"];

$comments = getPostComments($connection, $id);

$commentUserId = $comments[0];
$commentContent = $comments[1];
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
    
    <?php
    $i = 0;
    if(empty($commentUserId)){
        echo "<h4>No Comments added yet</h4>";
        echo "<h4>Add First comment</h4>";
        echo "<hr>";
    }
    foreach ($commentContent as $comment): ?>
    <h4>User ID: <?= $commentUserId[$i] ?></h4>
    <p><?= $comment ?></p>
    <hr>
    <?php
    $i++;
    endforeach;
    ?>


    <form action="/article.php?article=<?= $id ?>" method="post">
    User ID: <br><input type="text" name="user_id" default="1"><br><br>
    Content: <br><textarea name="content" rows="20" cols="80"></textarea><br>
    <button type="submit">Submit</button>   
    </form>
    <?php
    if (isset($_POST["user_id"]) && isset($_POST["content"])) {
        addComment($_POST["content"], $_POST["user_id"], $id, $connection);
        echo "<p>You add a new Comment</p>";
        unset($_POST["user_id"]);
        unset($_POST["content"]);
    }
    ?>
    <br>
    <footer>
        <h1>Copyright Mohammed Attya 2017</h1>
    </footer>
</body>
</html>