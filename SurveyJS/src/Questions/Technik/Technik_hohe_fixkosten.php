<?php


class Technik_hohe_fixkosten extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        $factors["Nutzungsabhängig"][] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }

}