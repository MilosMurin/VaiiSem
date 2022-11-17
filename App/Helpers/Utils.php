<?php

namespace App\Helpers;

use App\Models\User;

class Utils {


    /**
     * @throws \Exception
     */
    public static function getUser(string $name): ?User {
        $user = User::getAll("name = ?", [$name]);
        if (sizeof($user) == 1) {
            return $user[0];
        } else {
            return null;
        }
    }

}