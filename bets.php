<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="betScript.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Głosowanie</title>

</head>
<body>
    <?php
        require ("session.php");
        require("database.php");
        
        //var_dump($_SESSION);
    ?>

    <header>
        <p>Zalogowany jako: <?= $_SESSION["login"] ?></p>
        <nav><a href="logout.php">Wyloguj</a></nav>
        <h1>Fightclub</h1>
        <nav>
            <a href="index.php">Strona głowna</a>
            <a href="community.php">Forum społecznościowe</a>
            <a href="bets.php">Głosowanie</a>
            <a href="yourAchivments.php">Wasze osiągnięcia</a>
            <a href="fights.php">Amatorskie walki</a>
        </nav>
    </header>
    <main>
        <div class="form">
            <h1>Głosowanie zwycięsców walk</h1>
            <a href="addBetForm.php">Dodaj głosowanie</a>
            <?php
                $sql = "SELECT id, osoba1, osoba2, liczbaGlosow1, liczbaGlosow2 FROM glosowanie";
                $result = $conn->query($sql);

                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_object())
                        {
                            echo "<div class='bet'>";                            
                            echo "<p>{$row->osoba1}<span class='gap'></span>{$row->osoba2}</p>";
                            echo "<p><span class='liczbaGlosow1' data-id='$row->id'>{$row->liczbaGlosow1}";
                            echo "</span><span class='gap'></span>";
                            echo "<span class='liczbaGlosow2' data-id='$row->id'>{$row->liczbaGlosow2}</span></p>";
                            echo "<button class='button-bet1'>Oddaj głos</button>";
                            echo "<span class='gap'></span>";
                            echo "<button class='button-bet2'>Oddaj głos</button>";
                            //echo "<button class='button-back'>Cofnij głos</button>"
                            echo "</div>";
                        }
                    }
                    else
                    {
                        echo "<p>Brak wydarzeń</p>";
                    }
                    $conn->close();
            ?>
        </div>
        
    </main>
</body>
</html>