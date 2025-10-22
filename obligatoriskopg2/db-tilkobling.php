<?php
$host = 'localhost';
$db = 'databasenavn';
$user = 'brukernavn';
$pass = 'passord';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Tilkobling feilet: " . $conn->connect_error);
}
?>
