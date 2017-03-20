<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>My Blog</h1>
    </header>
    <hr>
    <?php
    $i = 0;
    foreach ($postTitle as $title): ?>
    <h2><a href="/article.php?article=<?=$id[$i]?>"><?= $title ?></a></h2>
    <p><?= $postContent[$i] ?></p>
    <hr>
    <?php
    $i++;
    endforeach;
    ?>

    <form accept="index.php" method="post">
    User ID: <br><input type="text" name="user_id" default="1"><br><br>
    Title: <br><input type="title" name="title"><br><br>
    Content: <br><textarea name="content" rows="20" cols="80"></textarea><br>
    <button type="submit">Submit</button>   
    </form>
    <br><br>
    <?php
    if (isset($_POST["user_id"]) && isset($_POST["title"]) && isset($_POST["content"])) {
        addPost($_POST["content"], $_POST["user_id"], $_POST["title"], $connection);
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