<?php
    require("session.php");
    require("database.php");

    $osoba1 = $_POST["osoba1"];
    $osoba2 = $_POST["osoba2"];
    $sql = "INSERT INTO glosowanie(osoba1,osoba2) VALUES ('$osoba1','$osoba2')";
    $conn->query($sql);
    $conn->close();
    header("location: bets.php");
?>