<?php
    require("session.php");
    require("database.php");

    $nick = $_POST["nick"];
    $naglowek = $_POST["naglowek"];
    $tresc = $_POST["tresc"];
    $sql = "INSERT INTO wpisy(nick,naglowek,tresc) VALUES ('$nick','$naglowek','$tresc')";
    $conn->query($sql);
    $conn->close();
    header("location: community.php");
?>