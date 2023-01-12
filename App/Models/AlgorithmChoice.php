<?php

namespace App\Models;

use App\Core\Model;

class AlgorithmChoice extends Model {

    protected int $id = 0;

    protected int $algId = 0;
    protected string $algorithm = "";
    protected int $userId = 0; // who put it on the site
    protected string $dateAdded = "";

    public static function create(int $algId, string $algorithm, int $userId): AlgorithmChoice {
        $instance = new self();
        $instance->userId = $userId;
        $instance->algorithm = $algorithm;
        $instance->algId = $algId;
        $instance->dateAdded = date("d/m/Y");
        return $instance;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAlgId(): int {
        return $this->algId;
    }

    /**
     * @return string
     */
    public function getAlgorithm(): string {
        return $this->algorithm;
    }

    /**
     * @return int
     */
    public function getUserId(): int {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getDateAdded(): string {
        return $this->dateAdded;
    }
}