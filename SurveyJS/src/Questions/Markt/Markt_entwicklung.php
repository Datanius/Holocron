<?php


class Markt_entwicklung extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        switch ($value) {
            case "Hohes Wachstum":
                $factors["Skalierbarkeit"] = 8;
                break;
            case "Mittleres Wachstum":
                $factors["Skalierbarkeit"] = 5;
                break;
            case "Markt stagniert":
                $factors["Skalierbarkeit"] = 2;
                break;
        }
    }
}