<?php


class Kundensit_zusammenbrechen_service extends Question
{
    public function calculate($value, &$factors)
    {
        $factors["Preisbereitschaft"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
        $factors["Risiko"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
        $factors["Nutzungsabhängig"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}