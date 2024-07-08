<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="menuScript.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Społeczność</title>
    <script src="communityScript.js"></script>
</head>
<body>
    <?php
        require ("session.php");
        require("database.php");
    ?>
    <header>
        <div class="menuDiv">
            <h1>Fightclub</h1>
            <div class="menuContainer">
            <img src="menu-icon.png" class="menuIcon" width="120" height="160">
                <ul class="menu-list">
                    <li><p>Zalogowany jako: <?= $_SESSION["login"] ?></p></li>
                    <li><nav><a href="logout.php">Wyloguj</a></nav></li>
                </ul>
            </div>
            
        </div>
        <nav>
            <a href="index.php">Strona głowna</a>
            <a href="community.php" class="wybrany">Forum społecznościowe</a>
            <a href="bets.php">Głosowanie</a>
            <a href="yourAchivments.php">Wasze osiągnięcia</a>
            <a href="fights.php">Amatorskie walki</a>
        </nav>
    </header>
    <main>
        <div class="form">
            <form>
                <input type="text" class="input" name="wyszukaj" placeholder="Wyszukaj komentarz po nicku">
                <div class="buttons">
                    <input type="submit" class="button" value="Wyszukaj">
                    <a href="community.php" class="button-a">Cofnij filtr</a> 
                </div>
            </form>
        </div>
        <div class="form">
            <h1>Wpisy użytkowników</h1>
            <a href="addPostForm.php">Dodaj swój wpis</a>
            <?php
                $sql = "SELECT id, nick, naglowek, tresc, data FROM wpisy";

                if(isset($_GET["wyszukaj"]))
                {
                    $wyszukaj = $_GET["wyszukaj"];
                    $sql .= " WHERE nick LIKE '%$wyszukaj%'";
                }

                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) 
                {
                    while ($row = $result->fetch_object()) 
                    {
                        echo "<div>";
                        echo "<p>{$row->nick}: {$row->naglowek}</p>";
                        echo "<p>wstawiono: {$row->data}";
                        if($row->nick==$_SESSION["login"])
                        {
                            echo "<span class='gap'></span>";
                            echo "<a class='button' href='editPostForm.php?id={$row->id}'>Edytuj</a>";
                            echo "<span class='gap'></span>";
                            echo "<a class='button' href='deletePost.php?id={$row->id}'>Usuń</a></p>";
                        }
                        echo "</p>";
                        echo "<div class='buttons'>";
                        echo "<button onclick='toggleContent({$row->id})' class='post-button'>Pokaż/schowaj treść</button>";
                        echo "<button onclick='toggleComments({$row->id})' class='post-button'>Pokaż/schowaj komentarze</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "<div id='post-{$row->id}' style='display:none;'>";
                        echo "<p>{$row->tresc}</p>";
                        echo "</div>";
                        echo "<div id='comment-{$row->id}' style='display:none;'>";
            ?>
                        <form action="addComment.php" method="post">
                            <input type="hidden" name="nick" value=<?php echo $row->nick?>>
                            <input type="hidden" name="idWpisu" value=<?php echo $row->id ?>>
                            <div class="comment-container">
                                <textarea name="tresc" class="input-comment" rows=2 cols=10 required></textarea>
                                <input type="submit" value="Dodaj komentarz" class="button-comment">
                            </div>    
                        </form>
            <?php            
                        echo "<h2>Komentarze</h2>";
                        $comment_sql = "SELECT nick, tresc, data FROM komentarze WHERE idWpisu = {$row->id}";
                        $comment_result = $conn->query($comment_sql);

                        if ($comment_result->num_rows > 0) 
                        {
                            while ($comment_row = $comment_result->fetch_object()) 
                            {
                                echo "<div class='comment'>";
                                echo "<h3>{$comment_row->nick} wstawiono: {$comment_row->data}</h3>";
                                echo "<h4>{$comment_row->tresc}</h4>";
                                echo "</div>";
                            }
                        } 
                        else 
                        {
                            echo "<p>Brak komentarzy</p>";
                        }
                        echo "</div>"; 
                    }
                } 
                else 
                {
                    echo "<p>Brak wpisów</p>";
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