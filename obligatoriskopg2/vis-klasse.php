<?php  /* vis-klasse */
/*
/*  Programmet viser informasjon om én spesifikk klasse
*/
?>

<h3>Vis klasse</h3>

<form method="post" action="">
  Klassekode: <input type="text" name="klassekode" required /> <br/>
  <input type="submit" value="Vis klasse" name="visKlasseKnapp" />
</form>

<?php
if (isset($_POST["visKlasseKnapp"]))
{
    $klassekode = $_POST["klassekode"];

    if (!$klassekode)
    {
        print("Klassekode må fylles ut.");
    }
    else
    {
        include("db-tilkobling.php");  // kobling til databasen

        $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");

        if (mysqli_num_rows($sqlResultat) == 0)
        {
            print("Klassen med kode '$klassekode' finnes ikke.");
        }
        else
        {
            $rad = mysqli_fetch_array($sqlResultat);
            $klassenavn = $rad["klassenavn"];
            $studiumkode = $rad["studiumkode"];

            print("<h4>Informasjon om klasse $klassekode</h4>");
            print("<table border=1>");
            print("<tr><th>Klassekode</th> <th>Klassenavn</th> <th>Studiumkode</th></tr>");
            print("<tr><td>$klassekode</td> <td>$klassenavn</td> <td>$studiumkode</td></tr>");
            print("</table>");
        }
    }
}
?>