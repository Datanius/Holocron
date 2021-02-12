<?php


class Kundensit_kerngeschaeft_korreliert extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        $factors["Bedürfnishäufigkeit"][] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
        //KO Umsatzbeteiligung bei Wert von 5 nachträglich implementieren
    }
}