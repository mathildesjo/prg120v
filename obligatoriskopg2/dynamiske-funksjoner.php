<?php
// dynamiske-funksjoner.php

function listeboksKlasse($db) {
    $sqlSetning = "SELECT klassekode, klassenavn FROM klasse ORDER BY klassekode;";
    $sqlResultat = mysqli_query($db, $sqlSetning);

    if (!$sqlResultat) {
        echo "<option value=''>Feil: " . mysqli_error($db) . "</option>";
        return;
    }

    while ($rad = mysqli_fetch_assoc($sqlResultat)) {
        $kode = htmlspecialchars($rad['klassekode']);
        $navn = htmlspecialchars($rad['klassenavn']);
        echo "<option value='$kode'>$kode - $navn</option>";
    }
}
?>