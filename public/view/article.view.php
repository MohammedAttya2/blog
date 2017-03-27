<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" type="text/css" href="public/view/style/style.css">
</head>
<body>
    <header>
        <a href="index.php"><h1>My Blog</h1></a>
    </header>
    <hr>

    <h2><?= $title ?></h2>
    <p><?= $content ?></p>
    <?php

    if (empty($content)): ?>
        <h3>Article NOT found</h3>
    <?php endif; ?>
    <hr>
    <h3 style="text-align: center;">Comments</h3>
    <?php
    if(empty($comments)){
        echo "<h4>No Comments added yet</h4>";
        echo "<h4>Add First comment</h4>";
        echo "<hr>";
    }
    foreach ($comments as $oneComment): ?>
    <h4>User ID: <?= $oneComment["user_id"] ?></h4>
    <p><?= $oneComment["content"] ?></p>
    <hr>
    <?php
    endforeach;
    ?>


    <form action="/article.php?article=<?= $id ?>" method="post">
    User ID: <br><input type="text" name="user_id" default="1"><br><br>
    Content: <br><textarea name="content" rows="20" cols="80"></textarea><br>
    <button type="submit">Submit</button>   
    </form>
    <?php
    if (isset($_POST["user_id"]) && isset($_POST["content"])) {
        $comment->addComment();
        header("Location: /article.php?article={$id}");
    }
    ?>
    <br>
    <footer>
        <h1>Copyright Mohammed Attya 2017</h1>
    </footer>
</body>
</html>
