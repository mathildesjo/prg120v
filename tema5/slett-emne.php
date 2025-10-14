<?php /* slett-emne */
/*
/* Programmet lager et skjema for å kunne slette et emne
/* Programmet sletter det valgte studiet
*/
?>
<script src="funksjoner.js"> </script>
<h3>Slett emne</h3>
<form method="post" action="" id="slettEmneSkjema" name="slettEmneSkjema" onSubmit="return
bekreft()">
Emnekode <input type="text" id="emnekode" name="emnekode" required /> <br/>
<input type="submit" value="Slett emne" name="slettEmneKnapp" id="slettEmneKnapp" />
</form>
<?php
if (isset($_POST ["slettEmneKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$emnekode=$_POST ["emnekode"];
$sqlSetning="DELETE FROM emne WHERE emnekode='$emnekode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende emne er n&aring; slettet: $emnekode <br />");
}
?>
