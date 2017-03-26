<?php
require_once "db_connection.php";
require_once "vendor/autoload.php";

use Blog\Post;
use Blog\Comment;

$id = (int) $_GET["article"];

$post = Post::getPostById($connection, $id);

$user_id = $post["user_id"];
$title = $post["post_head"];
$content = $post["content"];

$comments = Comment::getPostComments($connection, $id);


require_once "public/view/article.view.php";

mysqli_close($connection);
