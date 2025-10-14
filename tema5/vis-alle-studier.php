<?php /* vis-alle-studier */
/*
/* Programmet skriver ut alle registrerte studier
*/
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM studium ORDER BY studiumkode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
/* SQL-setning sendt til database-serveren */
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
print ("<h3>Registrerte studier </h3>");
print ("<table border=1>");
print ("<tr><th align=left>studiumkode</th> <th align=left>studiumnavn</th> </tr>");
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$studiumkode=$rad["studiumkode"];
$studiumnavn=$rad["studiumnavn"];
print ("<tr> <td> $studiumkode </td> <td> $studiumnavn </td> </tr>");
}
print ("</table>");
?>