<?php


class Markt_eigenrealisierung extends Question
{
    public function calculate($value, &$factors, $excluded)
    {
        $factors["Preisbereitschaft"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}