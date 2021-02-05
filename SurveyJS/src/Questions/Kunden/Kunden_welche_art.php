<?php


class Kunden_welche_art extends Question
{
    public function calculate($value, &$factors)
    {
        switch ($value) {
            case "Endkunden außerhalb Konzern":
                $factors["Nutzer"] = 8;
                break;
            case "Mitarbeiter der DB Systel":
                $factors["Nutzer"] = 2;
                break;
            case "Mitarbeiter mehrerer Tochterunternehmen des DB Konzerns":
                $factors["Nutzer"] = 6;
                break;
            case "Mitarbeiter eines Tochterunternehmens":
                $factors["Nutzer"] = 3;
                break;
        }
    }
}