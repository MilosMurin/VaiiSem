<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class ResultController extends AControllerBase {

    public function index(): Response {
        return $this->html();
    }


}