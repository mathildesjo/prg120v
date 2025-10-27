<?php 
/* vis-alle-studenter */
/*
/*  Programmet skriver ut alle registrerte studenter
*/
?>

<h3>Alle registrerte studenter</h3>

<?php
  include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

  $sqlSetning = "SELECT * FROM student ORDER BY brukernavn;";
  $sqlResultat = mysqli_query($db, $sqlSetning) or die ("Ikke mulig å hente data fra databasen");
    /* SQL-setning sendt til database-serveren */
	
  $antallRader = mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  if ($antallRader==0)
    {
      print ("Det er ingen registrerte studenter i databasen.");
    } 
    else
    {
      print ("<table border='1' cellspacing='0' cellpadding='5'>");
      print ("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>");
    
    while ($rad = mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra spørringsresultatet */
      $brukernavn = $rad["brukernavn"];
      $fornavn = $rad["fornavn"];
      $etternavn = $rad["etternavn"];
      $klassekode = $rad["klassekode"];

      print ("<tr> <td>$brukernavn</td> <td>$fornavn</td> <td>$etternavn</td> <td>$klassekode</td> </tr>");
    }
  print ("</table>"); 
  }
?>