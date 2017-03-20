<?php 
require_once "db_connection.php";
require_once "functions.php";

$posts = getAllPosts($connection);

require_once "index.view.php";


mysqli_close($connection);
