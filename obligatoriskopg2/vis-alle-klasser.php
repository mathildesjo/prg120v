<?php  /* vis-alle-klasser */
/*
   Programmet skriver ut alle registrerte klasser
*/

include("db-tilkobling.php");  /* kobler til databasen */

$sqlSetning = "SELECT * FROM klasse;";

$sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig &aring; hente data fra databasen");

/* Beregn antall rader i resultatet */
$antallRader = mysqli_num_rows($sqlResultat);

print("<h3>Registrerte klasser</h3>");
print("<table border='1'>");
print("<tr>
        <th align='left'>Klassekode</th>
        <th align='left'>Klassenavn</th>
        <th align='left'>Studiumkode</th>
      </tr>");

for ($r = 1; $r <= $antallRader; $r++) {
    $rad = mysqli_fetch_array($sqlResultat);
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
    $studiumkode = $rad["studiumkode"];

    print("<tr>
            <td>$klassekode</td>
            <td>$klassenavn</td>
            <td>$studiumkode</td>
          </tr>");
}

print("</table>");
?>