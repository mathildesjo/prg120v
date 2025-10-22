<?php
/* registrer-klasse */
/*
/*  Programmet lager et html-skjema for å registrere en klasse
/*  Programmet registrerer data (klassekode og klassenavn) i databasen
*/
include("db-tilkobling.php");
?> 

<h3>Registrer klasse</h3>

<form method="post" action="" id="registrerKlasseSkjema" name="registrerKlasseSkjema">
  Klassekode: <input type="text" id="klassekode" name="klassekode" required /> <br/>
  Klassenavn: <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
  <input type="submit" value="Registrer klasse" id="registrerKlasseKnapp" name="registrerKlasseKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
if (isset($_POST["registrerKlasseKnapp"]))
{
    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];

    if (!$klassekode || !$klassenavn)
    {
        print("B&aring;de klassekode og klassenavn m&aring; fylles ut");
    }
    else
    {
        include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

        $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader = mysqli_num_rows($sqlResultat); 

        if ($antallRader != 0)  /* klassen er registrert fra før */
        {
            print("Klassen er registrert fra f&oslash;r");
        }
        else
        {
            $sqlSetning = "INSERT INTO klasse VALUES('$klassekode', '$klassenavn');";
            mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");

            print("F&oslash;lgende klasse er n&aring; registrert: $klassekode $klassenavn"); 
        }
    }
}
?> 