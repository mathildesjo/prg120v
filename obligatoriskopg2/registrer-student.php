<?php  /* registrer-student */
/*
/*  Programmet lager et HTML-skjema for å registrere en student
/*  Programmet registrerer data (brukernavn, fornavn, etternavn, klassekode) i databasen
*/
?> 

<h3>Registrer student</h3>

<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
  Brukernavn <input type="text" id="brukernavn" name="brukernavn" maxlength="7" required /> <br/>
  Fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
  Etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
  Klassekode 
  <select id="klassekode" name="klassekode" required>
    <option value="">Velg klassekode</option>
    <?php
      include("dynamiske-funksjoner.php");
      listeboksKlasse();  // dynamisk fylling av klassekode fra databasen
    ?>
  </select> 
  <br/>

  <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  if (isset($_POST["registrerStudentKnapp"])) {
      $brukernavn = trim($_POST["brukernavn"]);
      $fornavn = trim($_POST["fornavn"]);
      $etternavn = trim($_POST["etternavn"]);
      $klassekode = $_POST["klassekode"];

      if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode) {
          print("Alle felt må fylles ut");
      } else {
          include("db-tilkobling.php");

          $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
          $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen: " . mysqli_error($db));
          $antallRader = mysqli_num_rows($sqlResultat); 

          if ($antallRader != 0) {
              print("Studenten er registrert fra før");
          } else {
              $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) 
                             VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode');";
              mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrere data i databasen: " . mysqli_error($db));

              print("<p>Følgende student er nå registrert: <b>$brukernavn $fornavn $etternavn ($klassekode)</b></p>"); 
          }
      }
  }
?> 