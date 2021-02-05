<?php


class Kundensit_budgetsituation extends Question
{
    public function calculate($value, &$factors)
    {
        $factors["Budgetsituation"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}