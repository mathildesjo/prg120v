<?php  /* registrer-klasse */
/*
   Programmet lager et HTML-skjema for å registrere en klasse.
   Programmet registrerer data (klassekode, klassenavn og studiumkode) i databasen.
*/
?> 

<h3>Registrer klasse</h3>

<form method="post" action="">
  Klassekode: <input type="text" id="klassekode" name="klassekode" required /> <br/>
  Klassenavn: <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
  Studiumkode: <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
  <input type="submit" value="Registrer klasse" name="registrerKlasseKnapp" /> 
  <input type="reset" value="Nullstill" /> <br />
</form>

<?php 
if (isset($_POST["registrerKlasseKnapp"])) {
    $klassekode = trim($_POST["klassekode"]);
    $klassenavn = trim($_POST["klassenavn"]);
    $studiumkode = trim($_POST["studiumkode"]);

    if (!$klassekode || !$klassenavn || !$studiumkode) {
        print("Alle felt må fylles ut (klassekode, klassenavn og studiumkode).");
    } else {
        include("db-tilkobling.php");

        $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Feil ved spørring: " . mysqli_error($db));
        $antallRader = mysqli_num_rows($sqlResultat); 

        if ($antallRader != 0) {
            print("Klassen er registrert fra før.");
        } else {
            $sqlSetning = "INSERT INTO klasse (klassekode, klassenavn, studiumkode)
                           VALUES('$klassekode', '$klassenavn', '$studiumkode');";
            mysqli_query($db, $sqlSetning) or die("Feil ved registrering: " . mysqli_error($db));

            print("Følgende klasse er nå registrert:<br>
                   Klassekode: $klassekode <br>
                   Klassenavn: $klassenavn <br>
                   Studiumkode: $studiumkode");
        }
    }
}
?>