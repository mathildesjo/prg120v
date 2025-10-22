<?php
// db-tilkobling.php
// Kobling til MySQL-database

$host = "localhost";        // Serveren databasen ligger på
$brukernavn = "root";       // MySQL brukernavn
$passord = "";              // MySQL passord (sett passordet ditt her)
$database = "skole";        // Navn på databasen din

// Opprette kobling
$db = mysqli_connect($host, $brukernavn, $passord, $database);

// Sjekke kobling
if (!$db) {
    die("Feil ved tilkobling til databasen: " . mysqli_connect_error());
}

// Sett tegnsett til UTF-8
mysqli_set_charset($db, "utf8");
?>