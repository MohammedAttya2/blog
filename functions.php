<?php
/**
* functions.php
* this file include function resposible for handle the content of the blog
* 
* 
* PHP version 7.1
*
* @category   Blog
* @author     Mohammed Attya mohammed.attya25@gmail.com
* @copyright  2017 Mohammed Attya
* @license    MIT License
*
*/

/**
* the db_connection.php file is responsible for making the connection to the
* database
*/
require_once "db_connection.php";

function addPost($content, $userId, $title, $connection)
{   
    /**
    * this function add a new post to the database
    * 
    * @param string $content article content
    * @param integer $userId the ID of the author
    * @param string $title article title
    * @param DB Connection $connection database connection
    * @return bool
    */

    $query = "INSERT INTO posts (user_id, post_head, content) VALUES (?, ?, ?);";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "iss", $userId, $title, $content);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function addComment($content, $userId, $postId, $connection)
{
    /**
    * this function add a new comment to the database
    * 
    * @param string $content comment content
    * @param integer $userId the ID of the commenter
    * @param integer $postId article ID
    * @param DB Connection $connection database connection
    * @return bool
    */

    $query = "INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?);";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "iis", $postId, $userId, $content);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function getAllPosts($connection){

    /**
    * this function fetch all posts from the DB
    * 
    * @param database connection $connection
    * @return array $posts association array includes title, userid, content
    */
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
    /**
    * this function add a new post to the database
    * 
    * @param integer $postId the ID of the article
    * @param DB Connection $connection database connection
    * @return array $comments assoc array includes the comments and its author
    */

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
    /**
    * this function add a new post to the database
    * @param DB Connection $connection database connection
    * @param integer $id article ID
    * @return array $row assoc array includes auther, title and content
    */
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
