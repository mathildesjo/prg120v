<?php /* Oppgave 4 */
/*
/* Programmet mottar fra et HTML-skjema et svar på spørsmålene
/* "Er du gift (j/n) ?" og "Har du barn (j/n) ?"
/* Programmet sjekker om det er svart j eller n på spørsmålet og skriver ut en passende melding
*/
$gift=$_POST ["gift"];
$barn=$_POST ["barn"];
if (!$gift || !$barn) /* det er ikke svart på begge spørsmålene */
{
print("Du har ikke svart p&aring; begge sp&oslash;rsm&aring;lene <br/>");
}
else if ($gift == "j" && $barn == "j") /* det er svart j på spørsmålet om gift og j på spørsmålet om barn */
{
print("Du er gift og har barn <br/>");
}
else if ($gift == "j" && $barn == "n") /* det er svart j på spørsmålet om gift og n på spørsmålet om barn */
{
print("Du er gift og har ikke barn <br/>");
}
else if ($gift == "n" && $barn == "j") /* det er svart n på spørsmålet om gift og j på spørsmålet om barn */
{
print("Du er ikke gift og har barn <br/>");
}
else if ($gift == "n" && $barn == "n") /* det er svart n på spørsmålet om gift og n på spørsmålet om barn */
{
print("Du er ikke gift og har ikke barn <br/>");
}
else /* det er ikke svart verken j eller n på begge spørsmålene */
{
print("Du har ikke svart ja eller nei p&aring; begge sp&oslash;rsm&aring;lene <br/>");
}
?>
