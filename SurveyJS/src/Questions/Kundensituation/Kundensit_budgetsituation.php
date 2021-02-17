<?php


class Kundensit_budgetsituation extends QuestionWithUnknown
{

    public function calculate($value, &$factors, $excluded, $unknownFlag)
    {
        $factors["Budgetsituation"][] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}