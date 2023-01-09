<?php

namespace App\Helpers;

class AlgorithmType {

    const PLL = "PLL";
    const OLL = "OLL";
    const F2L = "F2L";

    // TODO: Add more if time (VW, 2x2, 4x4...)

    public static function checkType(string $type): bool {
        return $type == self::PLL || $type == self::OLL || $type == self::F2L;
    }

}