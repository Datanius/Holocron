<?php

class RiskSharing extends Question
{
    public function calculate($value, &$factors)
    {
        $factors["Nutzer"] = ($value / self::QUESTION_SCALE) * self::FACTOR_SCALE;
    }
}