<?php 
require_once "db_connection.php";
require_once "functions.php";

$posts = getAllPosts($connection);
$postUser = $posts[0];
$postTitle = $posts[1];
$postContent = $posts[2];


require_once "index.view.php";
