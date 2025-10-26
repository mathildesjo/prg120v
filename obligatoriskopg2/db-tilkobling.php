<?php
// db-tilkobling.php
// Kobling til MySQL-database

$host = "127.0.0.1";        // Bruk 127.0.0.1 i stedet for localhost
$brukernavn = "root";       // MySQL-brukernavn
$passord = "";              // Passord (sett inn hvis du har)
$database = "skole";        // Databasenavn

// Opprette kobling
$db = mysqli_connect($host, $brukernavn, $passord, $database);

// Sjekke kobling
if (!$db) {
    die("Feil ved tilkobling til databasen: " . mysqli_connect_error());
}

// Sett tegnsett til UTF-8
mysqli_set_charset($db, "utf8");
?>