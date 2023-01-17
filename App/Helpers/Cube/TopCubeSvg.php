<?php

namespace App\Helpers\Cube;

class TopCubeSvg {

    const RED = "red";
    const GREEN = "lime";
    const BLUE = "blue";
    const YELLOW = "yellow";
    const ORANGE = "orange";
    const WHITE = "white";
    const BLACK = "black";
    const GRAY = "#656565";

    private array $colors;
    private array $polygons = array("80,80 290,80 290,10 110,10", "710,80 500,80 500,10 680,10",
        "710,80 710,290 780,290 780,100", "710,710 710,500 780,500 780,680",
        "710,710 500,710 500,780 680,780", "80,710 290,710 290,780 110,780",
        "80,710 80,500 10,500 10,680", "80,80 80,290 10,290 10,110");

    private int $rotation = 0;

    /**
     * @param string $stringRepr
     */
    public function __construct(string $stringRepr) {
        // TODO: Add rotation with y move as first
        $this->colors = explode(",", $stringRepr);
    }


    public function getSVG(int $width, int $height): string {
        $start = sprintf("<svg width=\"%d\" height=\"%d\" viewBox='0 0 790 790'>\n", $width, $height);
        $start .= sprintf("<g transform='rotate(%d 395 395)'>\n", $this->rotation);
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) { // top
                $start .= $this->getSvgSquare($i, $j);
            }
        }
        // edges 10, 13, 16, 19
        for ($i = 0; $i < 4; $i++) {
            $start .= $this->getSvgRect($i);
        }
        // corners
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $start .= $this->getSvgPolygon($i, $j);
            }
        }
        $start .= "</g>\n</svg>";
        return $start;
    }


    private function getSvgSquare(int $i, int $j): string {
        return sprintf("<rect x=\"%d\" y=\"%d\" width=\"208\" height=\"208\" style=\"fill:%s;stroke-width:2;stroke:black\" />\n",
            81 + 210 * $j, 81 + 210 * $i, $this->getColor($this->colors[3 * $i + $j]));
    }

    private function getSvgRect(int $i): string {
        $top = $i % 2 == 0;
        $i = intdiv($i, 2);
        if ($top) { // 0 2 -> 0 1
            return sprintf("<rect x=\"%d\" y=\"%d\" width=\"210\" height=\"70\" style=\"fill:%s;stroke-width:4;stroke:black\" />\n",
                290, 10 + 700 * $i, $this->getColor($this->colors[10 + 6 * $i]));
        } else { // 1 3 -> 0 1
            return sprintf("<rect x=\"%d\" y=\"%d\" width=\"70\" height=\"210\" style=\"fill:%s;stroke-width:4;stroke:black\" />\n",
                10 + 700 * $i, 290, $this->getColor($this->colors[19 - 6 * $i]));
        }
    }

    private function getSvgPolygon(int $i, int $j): string {
        return sprintf("<polygon points=\"%s\" style=\"fill:%s;stroke:black;stroke-width:4\" />\n",
            $this->polygons[2 * $i + $j], $this->getColor($this->colors[9 + 3 * $i + 2 * $j]));
    }

    private function getColor(string $i): string {
        return match ($i) {
            "1" => self::WHITE,
            "2" => self::GREEN,
            "3" => self::RED,
            "4" => self::BLUE,
            "5" => self::ORANGE,
            "6" => self::YELLOW,
            "7" => self::GRAY,
            default => self::BLACK,
        };
    }

    /**
     * @param int $rotation
     */
    public function setRotation(int $rotation): void {
        $this->rotation = $rotation;
    }
}