<?php
    require("session.php");
    require("database.php");
    
    $id = (int) $_POST["id"];
    $nick = $_SESSION["login"];
    $naglowek = $_POST["naglowek"];
    $tresc = $_POST["tresc"];

    $sql = "UPDATE wpisy SET naglowek='$naglowek', tresc='$tresc' WHERE nick='$nick' AND id=$id";
    $conn->query($sql);
    $conn->close();
    header("location: community.php");
?>