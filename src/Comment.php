<?php

namespace Blog;

class Comment {
    static function getPostComments($connection, $postId)
    {
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

        $query = "INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?);";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "iis", $postId, $userId, $content);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }
}
