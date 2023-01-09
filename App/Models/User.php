<?php

namespace App\Models;

use App\Core\Model;

class User extends Model {

    protected int $id = 0;
    protected string $name = "";
    protected string $password = "";
    protected string $email = "";

    public static function create(string $name, string $password, string $email): User {
        $instance = new self();
        $instance->name = $name;
        $instance->password = $password;
        $instance->email = $email;
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
     * @param string $name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }
}