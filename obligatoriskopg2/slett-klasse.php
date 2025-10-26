<?php  /* slett-klasse */
/*
   Programmet lager et skjema for å velge en klasse som skal slettes  
   Programmet sletter den valgte klassen
*/
?> 

<script src="funksjoner.js"></script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
  Klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
  <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" /> 
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {	
    $klassekode = $_POST["klassekode"];
  
    if (!$klassekode) {
        print("Klassekode må fylles ut");
    } else {
        include("db-tilkobling.php");  /* kobler til database-serveren */

        $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig &aring; hente data fra databasen");
        $antallRader = mysqli_num_rows($sqlResultat); 

        if ($antallRader == 0) {
            print("Klassen finnes ikke");
        } else {	  
            $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode';";
            mysqli_query($db, $sqlSetning) or die("Ikke mulig &aring; slette data i databasen");

            print("F&oslash;lgende klasse er n&aring; slettet: $klassekode <br />");
        }
    }
}
?> 