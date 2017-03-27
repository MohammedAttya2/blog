<?php

namespace Blog;
use PDO;

class Post {

    static function addPost($content, $userId, $title, PDO $connection)
    {   
        /**
        * this function add a new post to the database
        * 
        * @param string $content article content
        * @param integer $userId the ID of the author
        * @param string $title article title
        * @param PDO  $connection database connection
        * @return bool
        */

        $query = "INSERT INTO posts (user_id, post_head, content) VALUES (:userId, :title, :content);";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":content", $content, PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    static function getAllPosts(PDO $connection)
    {

        /**
        * this function fetch all posts from the DB
        * 
        * @param PDO $connection database connection
        * @return array $posts association array includes title, userid, content
        */

        $query = "SELECT * FROM posts;";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static function getPostById($connection, $id)
    {
        /**
        * this function add a new post to the database
        * @param PDO $connection database connection
        * @param integer $id article ID
        * @return array $row assoc array includes auther, title and content
        */

        $query = "SELECT user_id, post_head, content FROM posts WHERE id = :id;";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
