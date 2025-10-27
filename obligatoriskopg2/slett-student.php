<?php  
/* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes  
/*  Programmet sletter den valgte studenten
*/
?> 

<script src="funksjoner.js"></script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
    <?php 
        include("db-tilkobling.php");  /* kobler til database-serveren */

        $sqlSetning = "SELECT * FROM student ORDER BY brukernavn;";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die ("Ikke mulig å hente data fra databasen");
    ?>

    Brukernavn:
    <select name="brukernavn" id="brukernavn">
        <option value="">Velg student</option>
        <?php 
            while ($rad = mysqli_fetch_array($sqlResultat))  {
                $brukernavn = $rad["brukernavn"];
                /*$fornavn = $rad["fornavn"];
                $etternavn = $rad["etternavn"];*/
                print("<option value='$brukernavn'>$brukernavn</option>");
            }
            ?>
    </select>
    <br/>

    <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>

<?php
    if (isset($_POST["slettStudentKnapp"]))  {
        $brukernavn = $_POST["brukernavn"];

        if (!$brukernavn)  {
            print ("Du må velge en student fra listen.");
        }
        else {
            include("db-tilkobling.php");  /* kobler til database-serveren */



            $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
            $sqlResultat = mysqli_query($db, $sqlSetning) or die ("Ikke mulig å hente data fra databasen");
            $antallRader = mysqli_num_rows($sqlResultat);

            if ($antallRader == 0)  {
                print ("Studenten finnes ikke i databasen.");
            }
            else {
                $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
                mysqli_query($db, $sqlSetning) or die ("Ikke mulig å slette data fra databasen");

                print ("Studenten med brukernavnet $brukernavn er nå slettet fra databasen.");
            }
        }
    }