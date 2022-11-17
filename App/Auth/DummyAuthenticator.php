<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use Exception;
use App\Models\User;

/**
 * Class DummyAuthenticator
 * Basic implementation of user authentication
 * @package App\Auth
 */
class DummyAuthenticator implements IAuthenticator {

    /**
     * DummyAuthenticator constructor
     */
    public function __construct() {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $userLogin
     * @param $pass
     * @return bool
     * @throws Exception
     */
    function login($userLogin, $pass): bool {
        $users = User::getAll("name=?", [$userLogin]);
        if (sizeof($users) == 0) {
            return false;
        } else {
            $pwd = $users[0]->getPassword();
            if (password_verify($pass, $pwd)) {
                $_SESSION['user'] = $userLogin;
                return true;
            }
        }
        return false;
    }

    /**
     * Logout the user
     */
    function logout(): void {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    /**
     * Get the name of the logged-in user
     * @return string
     * @throws Exception
     */
    function getLoggedUserName(): string {

        return $_SESSION['user'] ?? throw new Exception("User not logged in");
    }

    /**
     * Get the context of the logged-in user
     * @return string
     */
    function getLoggedUserContext(): mixed {
        return null;
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    function isLogged(): bool {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    /**
     * Return the id of the logged-in user
     * @return mixed
     */
    function getLoggedUserId(): mixed {
        return $_SESSION['user'];
    }
}