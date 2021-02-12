<?php


class Kundensit_zahlungsbereitschaft extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        switch ($value) {
            case "Ja":
                $factors["Budgetsituation"][] = 8;
                break;
            case "Nein":
                $factors["Budgetsituation"][] = 2;
                break;
        }
    }
}