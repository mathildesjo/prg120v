<?php  /* vis-klasse */
/*
   Programmet lar brukeren skrive inn en klassekode
   og viser informasjon om den valgte klassen.
*/
?> 

<h3>Vis klasse</h3>

<form method="post" action="" id="visKlasseSkjema" name="visKlasseSkjema">
  Klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
  <input type="submit" value="Vis klasse" name="visKlasseKnapp" id="visKlasseKnapp" /> 
</form>

<?php
if (isset($_POST["visKlasseKnapp"])) {
    $klassekode = $_POST["klassekode"];

    if (!$klassekode) {
        print("Klassekode må fylles ut");
    } else {
        include("db-tilkobling.php");  /* kobler til databasen */

        $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig &aring; hente data fra databasen");

        $antallRader = mysqli_num_rows($sqlResultat);

        if ($antallRader == 0) {
            print("Klassen finnes ikke i databasen.");
        } else {
            $rad = mysqli_fetch_array($sqlResultat);
            $klassenavn = $rad["klassenavn"];
            $studiumkode = $rad["studiumkode"];

            print("<h4>Informasjon om klassen:</h4>");
            print("<table border='1'>
                    <tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>
                    <tr><td>$klassekode</td><td>$klassenavn</td><td>$studiumkode</td></tr>
                   </table>");
        }
    }
}
?>