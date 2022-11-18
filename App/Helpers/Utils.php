<?php

namespace App\Helpers;

use App\Models\User;
use Exception;
use MongoDB\BSON\Regex;

class Utils {


    /**
     * @throws Exception
     */
    public static function getUser(string $name): ?User {
        $user = User::getAll("name = ?", [$name]);
        if (sizeof($user) == 1) {
            return $user[0];
        } else {
            return null;
        }
    }

    /**
     * @throws Exception
     */
    public static function checkName(string $name): bool {
        $userTestName = User::getAll("name = ?", [$name]);
        if (sizeof($userTestName) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @throws Exception
     */
    public static function checkEmail(string $email): bool {
        $userTestEmail = User::getAll("email = ?", [$email]);
        if (sizeof($userTestEmail) > 0) {
            return false;
        } else {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
    }

    public static function checkPassword(string $pswd): bool {
        $num = "/[0-9]/";
        $big = "/[A-Z]/";
        $numTest = preg_match($num, $pswd);
        $bigTest = preg_match($big, $pswd);
        return $numTest > 0 && $bigTest > 0;
    }

}