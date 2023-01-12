<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class BrowserController extends AControllerBase {
    public function index(): Response {
        return $this->html();
    }

    public function browse(): Response {
        if (isset($_GET['s']) && isset($_GET['t'])) {
            return $this->html("", "browse");
        } else {
            return self::index();
        }
    }

}