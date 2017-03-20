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
    $posts = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($posts, $row);
    }
    mysqli_free_result($result);
    return $posts;
}

function getPostComments($connection, $post_id){
    $query = "SELECT user_id, content FROM comments WHERE post_id = {$post_id};";
    $result = mysqli_query($connection, $query);
    $comments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($comments, $row);
    }
    mysqli_free_result($result);
    return $comments;
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
