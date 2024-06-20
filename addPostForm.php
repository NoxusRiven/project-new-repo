<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Dodaj wpis</title>
</head>
<body>
    <?php
        require("session.php");
        require("database.php");
    ?>
    <main>
        <div class="form">
            <form action="addPost.php" method="post">
                <input type="hidden" name="nick" value=<?php echo $_SESSION["login"]; ?>>
                <p>Nagłówek</p>
                <input type="text" name="naglowek" class="input">
                <p>Treść wpisu</p>
                <textarea name="tresc" cols="20" rows="10" class="input"></textarea>
                <input type="submit" value="Dodaj wpis" class="button">
            </form>
            <p><a href="community.php" class="button">Powrót do strony</a></p>
        </div>
    </main>
</body>
</html>