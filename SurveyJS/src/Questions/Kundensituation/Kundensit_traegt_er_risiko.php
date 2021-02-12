<?php


class Kundensit_traegt_er_risiko extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        switch ($value) {
            case "Ja":
                $factors["Risiko"] = 8;
                break;
            case "Nein":
                $factors["Risiko"] = 2;
                break;
        }
    }
}