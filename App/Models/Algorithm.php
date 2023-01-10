<?php

namespace App\Models;

use App\Core\Model;
use App\Helpers\Enums\AlgorithmType;
use InvalidArgumentException;

class Algorithm extends Model {

    protected int $id = 0;
    protected string $name = "";
    protected string $type = "";
    protected int $size = 3; // depicts the size of the cube (3->3x3, 2->2x2...)

    protected string $picture = ""; // gonna store compiled pictures or like i did it in in mobile app

    public static function create(string $name, string $type, int $size): Algorithm {
        $instance = new self();
        $instance->name = $name;
        if (!AlgorithmType::checkType($type)) {
            throw new InvalidArgumentException($type . " is not a valid argument to create an algorithm");
        }
        $instance->type = $type;
        $instance->size = $size;
        return $instance;
    }


    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getSize(): int {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getPicture(): string {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): void {
        $this->picture = $picture;
    }
}