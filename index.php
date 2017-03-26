<?php 
require_once "vendor/autoload.php";
use Blog\Post;


require_once "db_connection.php";

$posts = Post::getAllPosts($connection);

require_once "public/view/index.view.php";


mysqli_close($connection);
