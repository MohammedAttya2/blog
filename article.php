<?php
require_once "db_connection.php";
require_once "vendor/autoload.php";

use Blog\Post;
use Blog\Comment;

$post = new Post($connection);
[$user_id, $title, $content] = $post->getPostById();

$id = $_GET[htmlspecialchars("article")];
$comment = new Comment($connection);
$comments = $comment->getPostComments();

require_once "public/view/article.view.php";

