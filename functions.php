<?php

require_once "db_connection.php";

function addPost($content, $user_id, $title, $connection)
{
    $query = "INSERT INTO posts (user_id, post_head, content) VALUES ({$user_id}, '{$title}', '{$content}');";
    return mysqli_query($connection, $query);
}

function addComment($content, $user_id, $post_id, $connection)
{
    $query = "INSERT INTO comments (post_id, user_id, content) VALUES ({$post_id}, '{$user_id}', '{$content}');";
    return mysqli_query($connection, $query);
}

function getAllPosts($connection){
    $query = "SELECT id, user_id, post_head, content FROM posts;";
    $result = mysqli_query($connection, $query);
    $i = 0;
    $user = [];
    $title = [];
    $content = [];
    $id = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $user[$i] = $row["user_id"];
        $title[$i] = $row["post_head"];
        $content[$i] = $row["content"];
        $id[$i] = $row["id"];
        $i++;
    }
    return [$user, $title, $content, $id];
}

function getPostComments($connection, $post_id){
    $query = "SELECT user_id, content FROM comments WHERE post_id = {$post_id};";
    $result = mysqli_query($connection, $query);
    $i = 0;
    $user = [];
    $content = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $user[$i] = $row["user_id"];
        $content[$i] = $row["content"];
        $i++;
    }
    return [$user, $content];
}

function getPostById($connection, $id){
    $query = "SELECT user_id, post_head, content FROM posts WHERE id = {$id};";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function addUser(){

}

function getUsers($user_id, $connection){

}