<?php

namespace Blog;
use PDO;

class Comment {
    static function getPostComments(PDO $connection, $postId)
    {
        /**
        * this function add a new post to the database
        * @param PDO  $connection database connection
        * @param integer $postId the ID of the article
        * @return array $comments assoc array includes the comments and its author
        */

        $query = "SELECT user_id, content FROM comments WHERE post_id = :postId;";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":postId", $postId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static function addComment($content, $userId, $postId, $connection)
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

        $query = "INSERT INTO comments (post_id, user_id, content) VALUES (:postId, :userId, :content);";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(":postId", $postId, PDO::PARAM_INT);
        $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
        $stmt->bindParam(":content", $content, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
