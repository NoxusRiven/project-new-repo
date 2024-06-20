<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Fightclub</title>
</head>
<body>
    <?php
        require ("session.php");
        require("database.php");
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
        <div class="wstep">
            <h1>Witamy w Fightclub</h1>
            <p>Jest to strona dla miłośników sztuk walki w którym można znaleźć informacje o najciekawszych eventach w świecie walk, rozmiawiać z innymi użytkownikami i wiele innych ciekawych rzeczy dla osób inretesujących się sztukami walki</p>
        </div>

        <div class="eventy">
            <h1>Wyderzenia w świecie walki</h1>
            <a href="addEventInfoForm.php">Dodaj wydarzenie</a>
                <?php
                    $sql = "SELECT zdjecie, tytul, data FROM wydarzenia";
                    $result = $conn->query($sql);
                    $index = 1;

                    if($result->num_rows > 0)
                    {
                        
                        while($row = $result->fetch_object())
                        {
                            echo "<div>";
                            echo "<p>$index. {$row->tytul}</p>";
                            echo "<p>Data: {$row->data}</p>";
                            echo "<p><img src='Event_Images/{$row->zdjecie}'></p>";
                            echo "</div>";
                            $index++;
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
    <footer>
        <p><b>Informacje o właścicielu strony:</b></p>
            <p><b>Imie i nazwisko:</b> Damian Woźny</p>
            <p><b>Telefon:</b> 884805777</p>
            <p><b>Email:</b></p>
            <p>-prywatny: damianmdxvpc18@gmail.com</p>
            <p>-szkolny: dw89246@stud.uws.edu.pl</p>   
    </footer>
</body>
</html>

</body>
</html>