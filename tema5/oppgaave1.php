<?php /* registrer-studium */
/*
/* Programmet lager et html-skjema for å registrere et studium
/* Programmet registrerer data (studiumkode og studiumnavn) i databasen
*/
?>
<h3>Registrer studium </h3>
<form method="post" action="" id="registrerStudiumSkjema" name="registrerStudiumSkjema">
Studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
Studiumnavn <input type="text" id="studiumnavn" name="studiumnavn" required /> <br/>
<input type="submit" value="Registrer studium" id="registrerStudiumKnapp" name="registrerStudiumKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
if (isset($_POST ["registrerStudiumKnapp"]))
{
$studiumkode=$_POST ["studiumkode"];
$studiumnavn=$_POST ["studiumnavn"];
if (!$studiumkode || !$studiumnavn)
{
print ("Alle felt m&aring; fylles ut");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM studium WHERE studiumkode='$studiumkode';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat);
if ($antallRader!=0) /* studiet er registrert fra før */
{
print ("Studiet er registrert fra f&oslashr");
}
else
{
$sqlSetning="INSERT INTO studium (studiumkode,studiumnavn)
VALUES('$studiumkode','$studiumnavn');";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende studium er n&aring; registrert: $studiumkode $studiumnavn");
}
}
}
?>
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
<?php /* slett-studium */
/*
/* Programmet lager et skjema for å kunne slette et studium
/* Programmet sletter det valgte studiet
*/
?>
<script src="funksjoner.js"> </script>
<h3>Slett studium</h3>
<form method="post" action="" id="slettStudiumSkjema" name="slettStudiumSkjema" onSubmit="return bekreft()">
Studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
<input type="submit" value="Slett studium" name="slettStudiumKnapp" id="slettStudiumKnapp" />
</form>
<?php
if (isset($_POST ["slettStudiumKnapp"]))
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$studiumkode=$_POST ["studiumkode"];
$sqlSetning="DELETE FROM studium WHERE studiumkode='$studiumkode';";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
/* SQL-setning sendt til database-serveren */
print ("F&oslash;lgende studium er n&aring; slettet: $studiumkode <br />");
}
?>
<?php /* registrer-emne */
/*
/* Programmet lager et html-skjema for å registrere et emne
/* Programmet registrerer data i databasen
*/
?>
<h3>Registrer emne </h3>
<form method="post" action="" id="registrerEmneSkjema" name="registrerEmneSkjema">
Emnekode <input type="text" id="emnekode" name="emnekode" required /> <br/>
Emnenavn <input type="text" id="emnenavn" name="emnenavn" required /> <br/>
Studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
<input type="submit" value="Registrer emne" id="registrerEmneKnapp" name="registrerEmneKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
if (isset($_POST ["registrerEmneKnapp"]))
{
$emnekode=$_POST ["emnekode"];
$emnenavn=$_POST ["emnenavn"];
$studiumkode=$_POST ["studiumkode"];
if (!$emnekode || !$emnenavn || !$studiumkode)
{
print ("Alle felt m&aring; fylles ut");
}
else
{
include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
$sqlSetning="SELECT * FROM emne WHERE emnekode='$emnekode';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat);
if ($antallRader!=0) /* faget er registrert fra før */
{
print ("Emnet er registrert fra f&oslashr");
}
else
{
$sqlSetning="INSERT INTO emne (emnekode,emnenavn,studiumkode)
VALUES('$emnekode','$emnenavn','$studiumkode');";
mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
print ("F&oslash;lgende emne er n&aring; registrert: $emnekode $emnekode $studiumkode");
}
}
}
?>
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
<?php /* db-tilkobling */
/*
/* Programmet foretar tilkobling til database-server og valg av database
*/
$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');
$db=mysqli_connect($host,$username,$password,$database) or die ("ikke kontakt med database-server");
/* tilkobling til database-serveren utført */
?>
/* funksjoner.js */
function bekreft()
{
return confirm ("Er du sikker ?");
}