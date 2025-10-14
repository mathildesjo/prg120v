<?php /* vis-alle-emner */
/*
/* Programmet skriver ut alle registrerte emner
*/
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM emne ORDER BY emnekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen"); /*
SQL-setning sendt til database-serveren */
$antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */
print ("<h3>Registrerte emnee </h3>");
print ("<table border=1>");
print ("<tr><th align=left>emnekode</th> <th align=left>emnenavn</th> <th align=left>studiumkode</th>
</tr>");
for ($r=1;$r<=$antallRader;$r++)
{
$rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
$emnekode=$rad["emnekode"];
$emnenavn=$rad["emnenavn"];
$studiumkode=$rad["studiumkode"];
print ("<tr> <td> $emnekode </td> <td> $emnenavn </td> <td> $studiumkode </td> </tr>");
}
print ("</table>");
?>
