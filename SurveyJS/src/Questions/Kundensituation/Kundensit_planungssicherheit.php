<?php


class Kundensit_planungssicherheit extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        $factors["Preisstabilität"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}