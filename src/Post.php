<?php

namespace Blog;
use PDO;

class Post {

    private $connection;
    private $userId;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        $this->userId = 1;
    }

    public function addPost()
    {   
        /**
        * this function add a new post to the database
        * @return bool
        */

        $query = "INSERT INTO posts (user_id, post_head, content) VALUES (:userId, :title, :content);";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":userId", $this->userId, PDO::PARAM_INT);
        $stmt->bindParam(":title", $_POST[htmlspecialchars("title")], PDO::PARAM_STR);
        $stmt->bindParam(":content", $_POST[htmlspecialchars("content")], PDO::PARAM_STR);
        return $stmt->execute();
    }

    function getAllPosts()
    {

        /**
        * this function fetch all posts from the DB
        * @return array $posts association array includes title, userid, content
        */

        $query = "SELECT * FROM posts;";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById()
    {
        /**
        * this function add a new post to the database
        * @return array $row assoc array includes auther, title and content
        */

        $query = "SELECT user_id, post_head, content FROM posts WHERE id = :id;";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $_GET["article"], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_NUM);
    }

}
