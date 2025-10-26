<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes  
/*  Programmet sletter den valgte studenten
*/
?> 

<script src="funksjoner.js"></script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
  Brukernavn 
  <select name="brukernavn" id="brukernavn">
    <option value="">Velg student</option>
    <?php 
        include("dynamiske-funksjoner.php"); 
        listeboksStudent();  // fyller listen dynamisk fra databasen
    ?> 
  </select>  
  <br/>
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" /> 
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {	
    $brukernavn = $_POST["brukernavn"];
	  
    if (!$brukernavn) {
        print("Ingen student valgt");
    } else {
        include("db-tilkobling.php");  /* kobler til database-serveren */

        $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen: " . mysqli_error($db));
        $antallRader = mysqli_num_rows($sqlResultat); 

        if ($antallRader == 0) {
            print("Studenten finnes ikke");
        } else {	  
            $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
            mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen: " . mysqli_error($db));

            print("Følgende student er nå slettet: $brukernavn <br />");
        }
    }
}
?> 