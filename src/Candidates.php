<?php

namespace Hexlet\Phpunit\Candidates;

function calcSum(array $arr = []):int
{
    if (empty($arr)) {
        return 0;
    }
    return array_sum($arr);
}