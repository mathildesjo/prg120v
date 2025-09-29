<?php /* Oppgave 3 */
/*
/* Programmet mottar fra et HTML-skjema et fornavn og et etternavn ved POST-metoden
/* Programmet skriver ut en "god dag"-melding med personens navn
*/
$tall1=$_POST ["tall1"];
$tall2=$_POST ["tall2"]; /* variable gitt verdier fra feltene i HTML-skjemaet */
$um=$tall1+$tall2;
$differanse=$tall1-$tall2;


?>