<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class AdminController extends AControllerBase {
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action): bool {
        return $this->app->getAuth()->isLogged();
    }

    /**
     * Example of an action (authorization needed)
     * @return Response|ViewResponse
     */
    public function index(): Response {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return ViewResponse
     */
    public function contact(): Response {
        return $this->html();
    }
}