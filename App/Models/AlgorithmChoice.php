<?php

namespace App\Models;

use App\Core\Model;
use Exception;
use PDO;
use PDOException;

class AlgorithmChoice extends Model {

    protected int $id = 0;

    protected int $algId = 0;
    protected string $algorithm = "";
    protected int $userId = 0; // who put it on the site
    protected string $date = "";

    public static function create(int $algId, string $algorithm, int $userId): AlgorithmChoice {
        $instance = new self();
        $instance->userId = $userId;
        $instance->algorithm = $algorithm;
        $instance->algId = $algId;
        $instance->date = date("d/m/Y");
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
    public function getDate(): string {
        return $this->date;
    }

    static public function getById(int $id): ?static {
        if ($id == null) return null;

        try {
            $sql = "SELECT * FROM `" . static::getTableName() . "` WHERE " . "`algId=?` LIMIT 1";
            $stmt = self::getConnection()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, static::class);
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new Exception('Query failed: ' . $e->getMessage(), 0, $e);
        }
    }
}