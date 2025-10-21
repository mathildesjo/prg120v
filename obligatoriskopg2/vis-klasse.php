<?php
include 'db.php';
$result = $conn->query("SELECT * FROM klasse");
echo "<h2>Klasser</h2><ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>{$row['klassekode']} - {$row['klassenavn']} ({$row['studiumkode']})</li>";
}
echo "</ul>";
?>