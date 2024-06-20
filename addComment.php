<?php
    require("session.php");
    require("database.php");
    
    $idWpisu=$_POST["idWpisu"];
    $nick=$_SESSION["login"];
    $tresc=$_POST["tresc"];

    $sql = "INSERT INTO komentarze(idWpisu,nick,tresc) VALUES ($idWpisu,'$nick','$tresc')";
    $conn->query($sql);
    $conn->close();
    header("location: community.php");
?>