<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;
use Exception;

class UserController extends AControllerBase {


    public function authorize(string $action): bool {
        return $this->app->getAuth()->isLogged();
    }


    /**
     * @throws Exception
     */
    public function index(): Response {
        $name = $this->app->getAuth()->getLoggedUserName();
        $user = User::getAll("name = ?", [$name]);
        if (sizeof($user) == 1) {
            return $this->html(["user" => $user[0]]);
        } else {
            return $this->redirect("?c=home");
        }
    }
}