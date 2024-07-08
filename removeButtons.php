<?php
    require("session.php");
    require("database.php");
    
    $idGlosowania=$_REQUEST["idGlosowania"];
    $idUzytkownika=$_SESSION["id"];

    $sql = "SELECT glosowalNa FROM lista_glosujacych WHERE idGlosowania=$idGlosowania AND idUzytkownika=$idUzytkownika";
    $result = $conn->query($sql);

    if($result->num_rows>0)
    {
        $row=$result->fetch_object();

        echo $row->glosowalNa;
        
    }
    else
    {
        echo "false";
    }
?>