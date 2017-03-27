<?php 
require_once "vendor/autoload.php";
use Blog\Post;


require_once "db_connection.php";

$post = new Post($connection);
$posts = $post->getAllPosts();

require_once "public/view/index.view.php";

