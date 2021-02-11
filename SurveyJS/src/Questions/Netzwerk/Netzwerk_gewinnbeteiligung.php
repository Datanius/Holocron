<?php


class Netzwerk_gewinnbeteiligung extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        $excluded[] = "Pro Asset basiert";
        //bitte implementieren Frage 21 "Wäre die Mehrzahl der Kunden bereit dich am Gewinn mitzubeteiligen?"
        ////Ist ein KO Kriterium
    }
}