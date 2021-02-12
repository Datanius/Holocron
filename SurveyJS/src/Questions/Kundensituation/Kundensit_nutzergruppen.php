<?php


class Kundensit_nutzergruppen extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        switch ($value) {
            case "Eine":
                $factors["Anzahl Nutzergruppen"] = 2;
                break;
            case "Zwei":
                $factors["Anzahl Nutzergruppen"] = 5;
                break;
            case "Mehrere":
                $factors["Anzahl Nutzergruppen"] = 8;
                break;
        }
    }
}