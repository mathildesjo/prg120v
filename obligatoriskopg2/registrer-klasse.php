<?php
class KlasseRegistrering {
    private $db;

    public function __construct($dbTilkobling) {
        $this->db = $dbTilkobling;
    }

    // Viser HTML-skjemaet
    public function visSkjema() {
        echo '
        <h3>Registrer klasse</h3>
        <form method="post" action="">
            Klassenavn: <input type="text" name="klasse" required /> <br/>
            <input type="submit" name="registrerKlasseKnapp" value="Registrer klasse" />
            <input type="reset" value="Nullstill" /> <br/>
        </form>
        ';
    }

    // Behandler innsending av skjemaet
    public function behandleSkjema() {
        if (!isset($_POST['registrerKlasseKnapp'])) {
            return; // Skjema ikke sendt inn
        }

        $klasse = trim($_POST['klasse']);

        if (empty($klasse)) {
            echo "Klassenavn må fylles ut.";
            return;
        }

        // Sjekk om klassen allerede finnes
        $sql = "SELECT * FROM klasse WHERE klasse = ?";
        $stmt = mysqli_prepare($this->db, $sql);
        mysqli_stmt_bind_param($stmt, "s", $klasse);
        mysqli_stmt_execute($stmt);
        $resultat = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultat) > 0) {
            echo "Klassen er registrert fra før.";
        } else {
            // Sett inn ny klasse
            $sql = "INSERT INTO klasse (klasse) VALUES (?)";
            $stmt = mysqli_prepare($this->db, $sql);
            mysqli_stmt_bind_param($stmt, "s", $klasse);

            if (mysqli_stmt_execute($stmt)) {
                echo "Følgende klasse er nå registrert: " . htmlspecialchars($klasse);
            } else {
                echo "Det oppstod en feil ved registrering.";
            }
        }

        mysqli_stmt_close($stmt);
    }
}
?>