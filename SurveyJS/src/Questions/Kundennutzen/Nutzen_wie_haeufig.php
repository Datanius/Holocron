<?php


class Nutzen_wie_haeufig extends QuestionWithUnknown
{


    public function calculate($value, &$factors, $excluded, $unknownFlag)
    {
        // TODO: Implement calculate() method.
        $factors["Bedürfnishäufigkeit"][] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}