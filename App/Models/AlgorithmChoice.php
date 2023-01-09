<?php

namespace App\Models;

use App\Core\Model;

class AlgorithmChoice extends Model {

    protected int $id = 0;

    protected int $algId = 0;
    protected string $algorithm = "";
    protected int $userId = 0; // who put it on the site
    protected int $voteScore = 0;
    protected string $dateAdded = "";

    public static function create(int $algId, string $algorithm, int $userId): AlgorithmChoice {
        $instance = new self();
        $instance->userId = $userId;
        $instance->algorithm = $algorithm;
        $instance->algId = $algId;
        $instance->voteScore = 0;
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
     * @return int
     */
    public function getVoteScore(): int {
        return $this->voteScore;
    }

    /**
     * @param int $voteScore
     */
    public function setVoteScore(int $voteScore): void {
        $this->voteScore = $voteScore;
    }

    /**
     * Function to add to vote score, if amount is negative it subtracts from score
     * @param int $amount the amount to substract
     */
    public function addVoteScore(int $amount): void {
        $this->voteScore += $amount;
    }

    /**
     * @return string
     */
    public function getDateAdded(): string {
        return $this->dateAdded;
    }
}