<?php  /* slett-klasse */
/*
   Programmet lager et skjema for å velge en klasse som skal slettes  
   Programmet sletter den valgte klassen
*/
?> 

<script src="funksjoner.js"></script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
  Klassekode 
  <select name="klassekode" id="klassekode">
    <option value="">Velg klasse</option>
    <?php 
        include("dynamiske-funksjoner.php"); 
        listeboksKlasse();  // fyller listen dynamisk fra databasen
    ?> 
  </select>  
  <br/>
  <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" /> 
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {	
    $klassekode = $_POST["klassekode"];
  
    if (!$klassekode) {
        print("Ingen klasse valgt");
    } else {
        include("db-tilkobling.php");  /* kobler til database-serveren */

        $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen: " . mysqli_error($db));
        $antallRader = mysqli_num_rows($sqlResultat); 

        if ($antallRader == 0) {
            print("Klassen finnes ikke");
        } else {	  
            $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
            mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen: " . mysqli_error($db));

            print("Følgende klasse er nå slettet: $klassekode <br />");
        }
    }
}
?> 