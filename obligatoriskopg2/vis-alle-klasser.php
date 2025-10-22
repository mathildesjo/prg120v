<?php  /* vis-alle-klasser */
/*
/*  Programmet skriver ut alle registrerte klasser
*/
include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

$sqlSetning = "SELECT * FROM klasse;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; hente data fra databasen");
/* SQL-setning sendt til database-serveren */

$antallRader = mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

print("<h3>Registrerte klasser</h3>");
print("<table border=1>");  
print("<tr><th align=left>Klassekode</th> <th align=left>Klassenavn</th> <th align=left>Studiumkode</th></tr>"); 

while ($rad = mysqli_fetch_array($sqlResultat))  /* henter hver rad fra resultatet */
{
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
    $studiumkode = $rad["studiumkode"];

    print("<tr> <td>$klassekode</td> <td>$klassenavn</td> <td>$studiumkode</td> </tr>");
}

print("</table>"); 
?>