<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Algorithm;
use App\Models\AlgorithmChoice;
use App\Models\UserLearner;
use Exception;

class BrowserController extends AControllerBase {

    // TODO: Change learning utilities (coloring selections, voting) only available for logged in users
    public function index(): Response {
        return $this->html(null, "index");
    }

    public function browse(): Response {

        if (isset($_GET['s']) && isset($_GET['t'])) {
            if (intval($_GET['s']) > 0) {
                if ($_GET['s'])
                    $data = [];
                try {
                    $data["algs"] = Algorithm::getAll("type=? AND size=?", [$_GET['t'], $_GET['s']]);
                    for ($i = 0; $i < sizeof($data["algs"]); $i++) {
                        // TODO: Change for getOne
                        $data["choice"][$i] = AlgorithmChoice::getAll("userId=0 AND algId=?", [$data["algs"][$i]->getId()])[0];
                    }
                } catch (Exception) {
                    return self::index();
                }
                return $this->html($data, "browse");
            }
        }
        return $this->index();
    }

    public function show(): Response {
        if (isset($_GET['alg'])) {
            if (intval($_GET['alg']) > 0) {
                $data = [];
                try {
                    $data["alg"] = Algorithm::getOne($_GET['alg']);
                    $data["choices"] = AlgorithmChoice::getAll("algId=?", [$_GET['alg']]);
                    $data["chosen"] = UserLearner::getByAlgId($_GET['alg'], 0);
                } catch (Exception) {
                    return self::index();
                }
                return $this->html($data, "show");
            }
        }
        return self::index();
    }
}