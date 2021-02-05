<?php


class Kundensit_loesung_aufwaendig extends Question
{
    public function calculate($value, &$factors)
    {
        $factors["Preisbereitschaft"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}