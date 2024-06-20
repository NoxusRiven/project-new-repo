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
            <form action="addEventInfo.php" method="post" enctype="multipart/form-data">
                <p>Zdjęcie</p>
                <input type="file" name="zdjecie" class="file">
                <p>Tytuł</p>
                <input type="text" name="tytul" class="input">
                <p>Data</p>
                <input type="text" name="data" class="input">
                <input type="submit" value="Dodaj wydarzenie" class="button">
            </form>
            <p><a href="index.php" class="button">Powrót do strony</a></p>
        </div>
    </main>
</body>
</html>