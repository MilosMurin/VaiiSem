<?php

namespace App\Models;

use App\Core\Model;
use App\Helpers\Enums\LearnStatus;
use Exception;

class LearnUser extends Model {

    protected int $id = 0;
    protected int $userId = 0;
    protected ?int $choiceId = 0;
    protected int $algId = 0;

    protected int $info = 0;

    public static function create(int $userId, int $algId, int $choiceId, int $info): LearnUser {
        $instance = new self();
        $instance->userId = $userId;
        $instance->choiceId = $choiceId;
        $instance->algId = $algId;
        $instance->info = $info;
        return $instance;
    }

    public static function createNotLearned(int $userId, int $choiceId, int $algId): LearnUser {
        return self::create($userId, $algId, $choiceId, LearnStatus::NOT_LEARNED);
    }

    /**
     * @return int
     */
    public function getUserId(): int {
        return $this->userId;
    }

    /**
     * @return ?int
     * @throws Exception
     */
    public function getChoiceId(): ?int {
        $this->checkChoice();
        return $this->choiceId;
    }

    /**
     * @return int
     */
    public function getAlgId(): int {
        return $this->algId;
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

    /**
     * @param int $choiceId
     */
    public function setChoiceId(int $choiceId): void {
        $this->choiceId = $choiceId;
    }

    /**
     * @throws Exception
     */
    public function checkChoice(): void {
        if ($this->choiceId == null || $this->choiceId == -1) {
            $this->choiceId = $this->id;
            $this->save();
        }
    }


    /**
     * @throws Exception
     */
    static public function getByAlgId(int $algId, int $userId): ?static {
        return self::getAll('algId=? AND userId=?', [$algId, $userId])[0];
    }
}