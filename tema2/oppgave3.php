<?php /* Oppgave 3 */
/*
/* Programmet mottar fra et HTML-skjema et svar på spørsmålet "Er du student (j/n) ?"
/* Programmet sjekker om det er svart j eller n på spørsmålet og skriver ut en passende melding
*/
$svar=$_POST ["svar"];
if (!$svar) /* det er ikke svart på spørsmålet */
{
print("Du har ikke svart p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
else if ($svar == "j" || $svar == "J" || $svar == "ja" || $svar == "JA" || $svar == "Ja" )
{ /* det er et Ja-svar på spørsmålet */
print("Du har svart ja p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
else if ($svar == "n" || $svar == "N" || $svar == "nei" || $svar == "NEI" || $svar == "Nei")
{ /* det er et Nei-svar på spørsmålet */
print("Du har svart nei p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
else
{ /* det er verken et Ja-svar eller et Nei-svar på spørsmålet */
print("Du har ikke svart ja eller nei p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
?>
