<?php /* Oppgave 1 */
/*
/* Programmet mottar fra et HTML-skjema et svar på spørsmålet "Er du student (j/n) ?"
/* Programmet sjekker om det er svart j eller n på spørsmålet og skriver ut en passende melding
*/
$svar=$_POST ["svar"];

$svar.lower();
if (!$svar) /* det er ikke svart på spørsmålet */
{
print("Du har ikke svart p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
else if ($svar == "j" or $svar == "ja") /* det er svart j på spørsmålet */
{
print("Du har svart ja p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
else if ($svar == "n") /* det er svart n på spørsmålet */
{
print("Du har svart nei p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
else /* det er ikke svart verken j eller n på spørsmålet */
{
print("Du har ikke svart ja eller nei p&aring; sp&oslash;rsm&aring;let om du er student <br/>");
}
?>