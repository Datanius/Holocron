<?php


class Nutzen_wie_haeufig extends Question
{
    public function calculate($value, &$factors)
    {
        $factors["Bedürfnishäufigkeit"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}