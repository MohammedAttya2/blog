<?php

namespace Blog;

class Post {

    static function addPost($content, $userId, $title, $connection)
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

    static function getAllPosts($connection)
    {

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

    static function getPostById($connection, $id)
    {
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

}
