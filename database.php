<?php
    $conn = new mysqli("localhost", "root", "", "fightclub-projekt");
    if ($conn->connect_error) 
    {
        exit("Connection failed: " . $conn->connect_error);
    }
?>