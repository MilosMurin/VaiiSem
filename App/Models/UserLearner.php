<?php

namespace App\Models;

use App\Core\Model;
use App\Helpers\Enums\LearnInfo;

class UserLearner extends Model {

    protected int $userId = 0;
    protected int $choiceId = 0;

    protected int $info = 0;

    public static function create(int $userId, int $algId, int $info): UserLearner {
        $instance = new self();
        $instance->userId = $userId;
        $instance->choiceId = $algId;
        $instance->info = $info;
        return $instance;
    }

    public static function createNotLearned(int $userId, int $algId): UserLearner {
        return self::create($userId, $algId, LearnInfo::NOT_LEARNED);
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
    public function getChoiceId(): int {
        return $this->choiceId;
    }

    /**
     * @return int
     */
    public function getInfo(): int {
        return $this->info;
    }

    /**
     * @param int $info
     */
    public function setInfo(int $info): void {
        $this->info = $info;
    }
}