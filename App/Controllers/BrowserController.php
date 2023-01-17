<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Helpers\Enums\LearnStatus;
use App\Models\Algorithm;
use App\Models\AlgorithmChoice;
use App\Models\LearnUser;
use Exception;

class BrowserController extends AControllerBase {

    public function index(): Response {
        return $this->html(null, "index");
    }

    public function browse(): Response {
        if (isset($_GET['s']) && isset($_GET['t'])) {
            if (intval($_GET['s']) > 0) {
                if ($_GET['s'])
                    $data = [];
                try {
                    $isLogged = $this->app->getAuth()->isLogged();
                    if ($isLogged) {
                        $usrId = $this->app->getAuth()->getLoggedUserId();
                    }
                    $data["algs"] = Algorithm::getAll("type=? AND size=?", [$_GET['t'], $_GET['s']]);
                    for ($i = 0; $i < sizeof($data["algs"]); $i++) {
                        if ($isLogged) {
                            $learn = (LearnUser::getAll("userId=? AND algId=?", [$usrId, $data["algs"][$i]->getId()]))[0];
                            $learn->checkChoice();
                            $choiceId = $learn->getChoiceId();
                            $data["color"][$i] = LearnStatus::getColor($learn->getInfo());
                            $data["choice"][$i] = AlgorithmChoice::getOne($choiceId)->getAlgorithm();
                        } else {
                            $data["choice"][$i] = AlgorithmChoice::getAll('algId=?', [$data["algs"][$i]->getId()])[0]->getAlgorithm();
                            $data["color"][$i] = "";
                        }

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
                    $isLogged = $this->app->getAuth()->isLogged();
                    $data["alg"] = Algorithm::getOne($_GET['alg']);
                    $data["choices"] = AlgorithmChoice::getAll("algId=?", [$_GET['alg']]);
                    if ($isLogged) {
                        $usrId = $this->app->getAuth()->getLoggedUserId();
                        $data["chosen"] = LearnUser::getByAlgId($_GET['alg'], intval($usrId))->getChoiceId();
                    } else {
                        $data["chosen"] = $_GET['alg'];
                    }

                } catch (Exception) {
                    return self::index();
                }
                return $this->html($data, "show");
            }
        }
        return self::index();
    }

    /**
     * @throws Exception
     */
    public function update() {
        if ($this->app->getAuth()->isLogged()) {
            if (isset($_GET['id'])) {
                $ex = explode("_", $_GET['id']);
                $algId = intval($ex[1]);
                $choiceId = intval($ex[2]);
                if ($algId > 0 && $choiceId > 0) {
                    $usrId = $this->app->getAuth()->getLoggedUserId();
                    $learn = LearnUser::getAll('algId=? AND userId=?', [$algId, $usrId])[0];
                    $learn->setChoiceId($choiceId);
                    $learn->save();
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    public function updateLearning() {
        if ($this->app->getAuth()->isLogged()) {
            if (isset($_GET['id'])) {
                $ex = explode("_", $_GET['id']);
                $algId = intval($ex[1]);
                $learnId = intval($ex[2]);
                if ($algId > 0 && $learnId > 0) {
                    $usrId = $this->app->getAuth()->getLoggedUserId();
                    $learn = LearnUser::getAll('algId=? AND userId=?', [$algId, $usrId])[0];
                    $learn->checkChoice();
                    $learn->setInfo($learnId);
                    $learn->save();
                }
            }
        }
    }


    /**
     * @throws Exception
     */
    public function delete(): Response {
        if ($this->app->getAuth()->isLogged()) {
            if (isset($_GET['id'])) {
                $choiceId = intval($_GET['id']);
                if ($choiceId > 0) {
                    $choice = AlgorithmChoice::getOne($choiceId);
                    $choice->delete();
                }
            }
        }
        return $this->redirect("?c=browser");
    }
}