<?php

namespace Blog;
use PDO;

class Comment {

    private $connection;
    private $userId;
    private $postId;
    private $content;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        $this->postId = $_GET[htmlspecialchars("article")];
        $this->userId = 1;
    }

    public function getPostComments()
    {
        /**
        * this function add a new post to the database
        * @return array $comments assoc array includes the comments and its author
        */

        $query = "SELECT user_id, content FROM comments WHERE post_id = :postId;";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":postId",$this->postId , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment()
    {
        /**
        * this function add a new comment to the database
        * @return bool
        */

        $query = "INSERT INTO comments (post_id, user_id, content) VALUES (:postId, :userId, :content);";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":postId", $this->postId, PDO::PARAM_INT);
        $stmt->bindParam(":userId", $this->userId, PDO::PARAM_INT);
        $stmt->bindParam(":content", $_POST[htmlspecialchars("content")], PDO::PARAM_STR);
        return $stmt->execute();
    }
}
