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
    <?php foreach ($posts as $onePost): ?>
    <h2><a href='/article.php?article=<?= $onePost["id"]?>'><?= $onePost["post_head"] ?></a></h2>
    <p><?= $onePost["content"] ?></p>
    <hr>
    <?php endforeach; ?>

    <form action="index.php" method="post">
    User ID: <br><input type="text" name="user_id" default="1"><br><br>
    Title: <br><input type="title" name="title"><br><br>
    Content: <br><textarea name="content" rows="20" cols="80"></textarea><br>
    <button type="submit">Submit</button>   
    </form>
    <br><br>
    <?php
    if (isset($_POST["user_id"]) && isset($_POST["title"]) && isset($_POST["content"]))
    {  
        $post->addPost();
    }

    ?>
    <footer>
        <h1>Copyright Mohammed Attya 2017</h1>
    </footer>
</body>
</html>
