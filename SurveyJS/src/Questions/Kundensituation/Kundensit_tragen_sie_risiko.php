<?php


class Kundensit_tragen_sie_risiko extends Question
{
    public function calculate($value, &$factors)
    {
        $factors["Nutzer"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}