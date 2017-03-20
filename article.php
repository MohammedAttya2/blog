<?php
require_once "db_connection.php";
require_once "functions.php";

$id = (int) $_GET["article"];

$post = getPostById($connection, $id);

$user_id = $post["user_id"];
$title = $post["post_head"];
$content = $post["content"];

$comments = getPostComments($connection, $id);

// $commentUserId = $comments[0];
// $commentContent = $comments[1];

require_once "article.view.php";

mysqli_close($connection);
