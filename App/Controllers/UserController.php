<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Helpers\Utils;
use Exception;

class UserController extends AControllerBase {

    public function authorize(string $action): bool {
        return $this->app->getAuth()->isLogged();
    }


    /**
     * @throws Exception
     */
    public function index(): Response {
        $user = Utils::getUser($this->app->getAuth()->getLoggedUserName());
        if ($user != null) {
            return $this->html(["user" => $user]);
        } else {
            return $this->redirect("?c=home");
        }
    }

    // TODO: add editing

    /**
     * @throws Exception
     */
    public function delete(): Response {

        // TODO: add confirmation
        $user = Utils::getUser($this->app->getAuth()->getLoggedUserName());
        if ($user != null) {
            $this->app->getAuth()->logout();
            $user->delete();
        }
        return $this->redirect("?c=home");
    }

}