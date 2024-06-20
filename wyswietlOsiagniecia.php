<?php
require("database.php");

$sql = "SELECT * FROM osiagniecia ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='achievement'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>Użytkownik: " . $row['nick'] . "</p>";
        echo "<img src='" . $row['image'] . "' alt='" . $row['title'] . "'>";

        if (!empty($row['video_url'])) {
            preg_match('#(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})#i', $row['video_url'], $matches);
            $youtube_id = $matches[1] ?? '';

            echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/" . $youtube_id . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
        }

        echo "<p>Dodano: " . $row['created_at'] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Brak osiągnięć</p>";
}
$conn->close();
?>
