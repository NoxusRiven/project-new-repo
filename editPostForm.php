<?php
    //require("session.php");
    require("database.php");
    $id = $_GET["id"];
    $sql = "SELECT naglowek, tresc FROM wpisy WHERE id=$id";
    $result = $conn->query($sql);
    $wpis = $result->fetch_object();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj wpis</title>
    <link rel="stylesheet" href="mainPageStyle.css">
</head>
<body>
    <main>
        <div class="form">
            <form action="editPost.php" method="post">
                <input type="hidden" name="id" value='<?php echo $id ?>'>
                <p>Nagłowek</p>
                <textarea name="naglowek" class="input" style="resize: none; width: 300px; height: 150px;"><?php echo $wpis->naglowek ?></textarea>
                <p>Treść</p>
                <textarea name="tresc" class="input" style="resize: none; width: 300px; height: 150px;"><?php echo $wpis->tresc ?></textarea>
                <p><input class="button" type="submit" value="Zmień"></p>
            </form>
        </div>
    </main>
</body>
</html>