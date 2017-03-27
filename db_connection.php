<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'blog');
define("DB_USER", 'root');
define("DB_PASS", 'root');

try {
    $connection = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
    die("DATABSE connection failed " . $e->getMessage());
}
