<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'blog');
define("DB_USER", 'root');
define("DB_PASS", 'root');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno($connection)) {
    die("DATABSE connection failed" . mysqli_connect_error($connection));
}