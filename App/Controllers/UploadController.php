<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class UploadController extends AControllerBase {


    public function authorize(string $action): bool {
        return $this->app->getAuth()->isLogged();
    }


    public function index(): Response {
        return $this->html();
    }


}