<?php

namespace App\Util;

class Random
{
    function maybe($chance, $value1, $value2)
    {
        if (mt_rand(1, $chance) == 1) {
            return $value1;
        }

        return $value2;
    }
}