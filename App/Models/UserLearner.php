<?php

namespace App\Models;

use App\Core\Model;
use App\Helpers\Enums\LearnStatus;
use Exception;
use PDO;
use PDOException;

class UserLearner extends Model {

    protected int $userId = 0;
    protected int $choiceId = 0;
    protected int $algId = 0;

    protected int $info = 0;

    public static function create(int $userId, int $algId, int $info): UserLearner {
        $instance = new self();
        $instance->userId = $userId;
        $instance->choiceId = $algId;
        $instance->info = $info;
        return $instance;
    }

    public static function createNotLearned(int $userId, int $algId): UserLearner {
        return self::create($userId, $algId, LearnStatus::NOT_LEARNED);
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
     * @throws Exception
     */
    static public function getByAlgId(int $id, int $userId): ?static {
        if ($id == null || $userId == null) return null;

        try {
            $sql = "SELECT * FROM `" . static::getTableName() . "` WHERE " . "`algId=? AND userId=?` LIMIT 1";
            $stmt = self::getConnection()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, static::class);
            $stmt->execute([$id, $userId]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception('Query failed: ' . $e->getMessage(), 0, $e);
        }
    }
}