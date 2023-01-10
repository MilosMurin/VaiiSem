<?php

namespace App\Helpers\Cube;

class TopCube {

    private array $colors;

    public function __construct(string $repr) {
        $this->colors = explode(",", $repr);
    }

    public function getColor(int $i): string {
        return $this->colors[$i];
    }
}