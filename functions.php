<?php

require_once "db_connection.php";

function addPost($content, $userId, $title, $connection)
{
    $query = "INSERT INTO posts (user_id, post_head, content) VALUES (?, ?, ?);";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "iss", $userId, $title, $content);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function addComment($content, $userId, $postId, $connection)
{
    $query = "INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?);";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "iis", $postId, $userId, $content);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function getAllPosts($connection){
    $query = "SELECT * FROM posts;";
    $result = mysqli_query($connection, $query);
    $posts = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($posts, $row);
    }
    mysqli_free_result($result);
    return $posts;
}

function getPostComments($connection, $postId){
    $query = "SELECT user_id, content FROM comments WHERE post_id = ?;";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $postId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $comments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($comments, $row);
    }
    mysqli_stmt_close($stmt);
    return $comments;
}

function getPostById($connection, $id){
    $query = "SELECT user_id, post_head, content FROM posts WHERE id = ?;";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $row;
}

function addUser(){

}

function getUsers($userId, $connection){

}
