<?php


class Technik_hohe_fixkosten extends QuestionWithUnknown
{


    public function calculate($value, &$factors, $excluded, $unknownFlag)
    {
        // TODO: Implement calculate() method.
        $factors["Nutzungsabhängig"][] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}