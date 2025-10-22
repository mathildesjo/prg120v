<?php  /* vis-alle-studenter */
/*
/*  Programmet skriver ut alle registrerte studenter
*/
include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

$sqlSetning = "SELECT * FROM student;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; hente data fra databasen");
/* SQL-setning sendt til database-serveren */

$antallRader = mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

print("<h3>Registrerte studenter</h3>");
print("<table border=1>");  
print("<tr><th align=left>Brukernavn</th> <th align=left>Fornavn</th> <th align=left>Etternavn</th> <th align=left>Klassekode</th></tr>"); 

while ($rad = mysqli_fetch_array($sqlResultat))  /* henter hver rad fra resultatet */
{
    $brukernavn = $rad["brukernavn"];
    $fornavn = $rad["fornavn"];
    $etternavn = $rad["etternavn"];
    $klassekode = $rad["klassekode"];

    print("<tr> <td>$brukernavn</td> <td>$fornavn</td> <td>$etternavn</td> <td>$klassekode</td> </tr>");
}

print("</table>"); 
?>