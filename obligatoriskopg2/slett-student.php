<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes  
/*  Programmet sletter den valgte studenten
*/
?> 

<script src="funksjoner.js"> </script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
  Brukernavn: <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" /> 
</form>

<?php
if (isset($_POST["slettStudentKnapp"]))
{	
    $brukernavn = $_POST["brukernavn"];
	  
    if (!$brukernavn)
    {
        print("Brukernavn m&aring; fylles ut");
    }
    else
    {
        include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

        $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; hente data fra databasen");
        $antallRader = mysqli_num_rows($sqlResultat); 

        if ($antallRader == 0)  /* studenten er ikke registrert */
        {
            print("Studenten finnes ikke");
        }
        else
        {	  
            $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
            mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; slette data i databasen");
            /* SQL-setning sendt til database-serveren */
		
            print("F&oslash;lgende student er n&aring; slettet: $brukernavn <br />");
        }
    }
}
?> 