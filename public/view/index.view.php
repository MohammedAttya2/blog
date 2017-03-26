<?php 
    use Blog\Post;
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" type="text/css" href="public/view/style/style.css">
</head>
<body>
    <header>
        <h1>My Blog</h1>
    </header>
    <hr>
    <?php
    foreach ($posts as $post): ?>
    <h2><a href="/article.php?article=<?= $post["id"]?>"><?= $post["post_head"] ?></a></h2>
    <p><?= $post["content"] ?></p>
    <hr>
    <?php
    endforeach;
    ?>

    <form action="index.php" method="post">
    User ID: <br><input type="text" name="user_id" default="1"><br><br>
    Title: <br><input type="title" name="title"><br><br>
    Content: <br><textarea name="content" rows="20" cols="80"></textarea><br>
    <button type="submit">Submit</button>   
    </form>
    <br><br>
    <?php
    if (isset($_POST[htmlspecialchars("user_id")]) && isset($_POST[htmlspecialchars("title")]) && isset($_POST[htmlspecialchars("content")])) {
        Post::addPost($_POST["content"], $_POST["user_id"], $_POST["title"], $connection);
        echo "<p>You add a new article</p>";
        unset($_POST["user_id"]);
        unset($_POST["title"]);
        unset($_POST["content"]);
    }

    ?>
    <footer>
        <h1>Copyright Mohammed Attya 2017</h1>
    </footer>
</body>
</html>
