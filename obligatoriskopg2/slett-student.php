<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes  
/*  Programmet sletter den valgte studenten
*/
?> 

<script src="funksjoner.js"> </script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
  Brukernavn <input type="text" id="brukernavn" name="brukernavn" maxlength="7" required /> <br/>
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" /> 
</form>

<?php
  if (isset($_POST["slettStudentKnapp"])) {	
      $brukernavn = trim($_POST["brukernavn"]);
	  
      if (!$brukernavn) {
          print ("Brukernavn må fylles ut");
      }
      else {
          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
          $sqlResultat = mysqli_query($db, $sqlSetning) or die ("Ikke mulig å hente data fra databasen");
          $antallRader = mysqli_num_rows($sqlResultat); 

          if ($antallRader == 0)  /* studenten finnes ikke */
          {
              print ("Studenten finnes ikke");
          }
          else
          {	  
              $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
              mysqli_query($db, $sqlSetning) or die ("Ikke mulig å slette data i databasen");
                /* SQL-setning sendt til database-serveren */
		
              print ("Følgende student er nå slettet: $brukernavn <br />");
          }
      }
  }
?> 