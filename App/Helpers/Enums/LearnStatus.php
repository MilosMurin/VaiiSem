<?php

namespace App\Helpers\Enums;

class LearnStatus {

    const NOT_LEARNED = 0;
    const LEANRNING = 1;
    const LEARNED = 2;

    public static function getColor(int $i): string {
        return match ($i) {
            self::LEANRNING => "yellow",
            self::LEARNED => "lime",
            default => "",
        };
    }
}