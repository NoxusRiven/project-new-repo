<?php
    require("database.php");
    $zdjecie = basename($_FILES["zdjecie"]["name"]);
    echo $zdjecie;
    move_uploaded_file($_FILES["zdjecie"]["tmp_name"], "Event_Images/$zdjecie");
    $tytul = $_POST["tytul"];
    $data = $_POST["data"];
    $sql = "INSERT INTO wydarzenia(zdjecie, tytul, data) VALUES ('$zdjecie','$tytul','$data')";
    $conn->query($sql);
    $conn->close();
    header("location: index.php");
?>
