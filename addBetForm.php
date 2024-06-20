<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainPageStyle.css">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="form">
            <form action="addBet.php" method="post">
                <p>Pierwsza osoba walcząca</p>
                
                <input type="text" name="osoba1" class="input">
                <p>Druga osoba walcząca</p>
                
                <input type="text" name="osoba2" class="input">
                <input type="submit" value="Dodaj głosowanie" class="button">
            </form>
        </div>
    </main>
</body>
</html>