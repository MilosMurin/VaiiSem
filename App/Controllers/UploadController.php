<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\AlgorithmChoice;
use App\Models\User;
use Exception;

class UploadController extends AControllerBase {


    public function authorize(string $action): bool {
        return $this->app->getAuth()->isLogged();
    }


    public function index(): Response {
        return $this->html();
    }

    /**
     * @throws Exception
     */
    public function upload(): Response {
        $formData = $this->app->getRequest()->getPost();
        $algId = intval($formData["alg"]);
        $usrId = User::getAll('name=?', [$_SESSION['user']])[0]->getId();
        $choice = AlgorithmChoice::create($algId, $formData["alg"], $usrId);
        $choice->save();

        return $this->html(["message" => "Successfully uploaded!"]);
    }

}