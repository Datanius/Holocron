<?php


class Nutzen_wie_erfolgt extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        switch ($value) {
            case "Kurzfristig und temporär":
                $factors["Bedürfnishäufigkeit"] = 8;
                break;
            case "Dauerhaft":
                $factors["Bedürfnishäufigkeit"] = 2;
                break;
        }
    }
}