<?php

namespace App\Helpers\Enums;

class AlgorithmType {

    const PLL = "PLL";
    const OLL = "OLL";
    const VW = "VW";

    public static function checkType(string $type): bool {
        return $type == self::PLL || $type == self::OLL || $type == self::VW;
    }

}