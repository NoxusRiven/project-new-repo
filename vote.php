<?php
    require("session.php");
    require("database.php");

    $liczbaGlosow = intval($_REQUEST["liczbaGlosow"]) + 1;
    $idGlosowania = $_REQUEST["id"];
    $przycisk = $_REQUEST["button"];
    $idUzytkownika = $_SESSION["id"];

    $sql_check = "SELECT * FROM lista_glosujacych WHERE idGlosowania=$idGlosowania AND idUzytkownika=$idUzytkownika";
    $result = $conn->query($sql_check);

    if ($result && $result->num_rows == 0) 
    {
        if ($przycisk == "button1") {
            $sql = "UPDATE glosowanie SET liczbaGlosow1=$liczbaGlosow WHERE id=$idGlosowania";
        } else if ($przycisk == "button2") {
            $sql = "UPDATE glosowanie SET liczbaGlosow2=$liczbaGlosow WHERE id=$idGlosowania";
        }

        if ($conn->query($sql) === TRUE) {
            echo $liczbaGlosow;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql_insert = "INSERT INTO lista_glosujacych (idGlosowania, idUzytkownika) VALUES ($idGlosowania, $idUzytkownika)";
        if ($conn->query($sql_insert) !== TRUE) 
        {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    } 
    else 
    {
        echo $liczbaGlosow-1;
    }

    $conn->close();





        
        /*require("session.php");
        require("database.php");

        $liczbaGlosow = intval($_REQUEST["liczbaGlosow"])+1;
        $idGlosowania = $_REQUEST["id"];
        $przycisk = $_REQUEST["button"];

        if($przycisk == "button1")
        {
            $sql = "UPDATE glosowanie SET liczbaGlosow1=$liczbaGlosow WHERE id=$idGlosowania";
        }
        else if($przycisk == "button2")
        {
            $sql = "UPDATE glosowanie SET liczbaGlosow2=$liczbaGlosow WHERE id=$idGlosowania";
        }

        if ($conn->query($sql) === TRUE) 
        {
            echo $liczbaGlosow;
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();*/
    
?>