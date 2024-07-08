<?php
    //require("session.php");
    require("database.php");
    $id = $_GET["id"];
    $sql = "DELETE FROM wpisy WHERE id=$id";
    $conn->query($sql);
    $conn->close();
    header("location: community.php");
?>