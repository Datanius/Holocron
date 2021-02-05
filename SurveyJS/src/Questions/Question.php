<?php

abstract class Question
{
    const FACTOR_SCALE = 10;
    const QUESTION_SCALE = 5;

    abstract public function calculate($value, &$factors);
}