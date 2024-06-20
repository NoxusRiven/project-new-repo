<?php
    require("session.php");
    require("database.php");

    $id=$_REQUEST("id");

    $sql = "DELETE FROM lista_glosujacych WHERE id=$id";
?>