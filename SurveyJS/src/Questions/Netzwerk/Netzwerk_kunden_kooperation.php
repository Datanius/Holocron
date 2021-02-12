<?php


class Netzwerk_kunden_kooperation extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        switch ($value) {
            case "Eigenständig":
                $factors["Skalierbarkeit"][] = 2;
                break;
            case "In Kooperation mit dem Kunden im Projekt":
                $factors["Skalierbarkeit"][] = 8;
                break;
        }
    }
}