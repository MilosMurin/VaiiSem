<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use Exception;
use App\Models\User;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class HomeController extends AControllerBase {
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action): bool {
        return true;
    }

    /**
     * Example of an action (authorization needed)
     * @return Response
     * @throws Exception
     */
    public function index(): Response {
        $formData = $this->app->getRequest()->getPost();
        $data = [];
        if (isset($formData["name"])) {
            if ($formData["name"] != "" && $formData["pswd"] != "") {
                if ($formData["email"] != "") {
                    $reg = $this->register($formData["name"], $formData["pswd"], $formData["email"]);
                    if ($reg) {
                        return $this->redirect('?c=home');
                    } else {
                        $data = ["message" => "Something went wrong!"];
                    }
                } else {
                    $logged = $this->app->getAuth()->login($formData['name'], $formData['pswd']);
                    if ($logged) {
                        return $this->redirect('?c=home');
                    } else {
                        $data = ["message" => "Incorrect name or username!"];
                    }
                }
            }
        }

        return $this->html($data);
    }

    public function logout(): Response {
        $this->app->getAuth()->logout();
        return $this->redirect("?c=home");
    }

    /**
     * @throws Exception
     */
    private function register($login, $password, $email): bool {
        $users = User::getAll("name = ?", [$login]);
        if (sizeof($users) > 0) {
            return false;
        } else {
            $newUser = new User();
            $newUser->setName($login);
            $newUser->setEmail($email);
            $newUser->setPassword(password_hash($password, PASSWORD_DEFAULT));
            try {
                $newUser->save();
                $_SESSION['user'] = $login;
                return true;
            } catch (Exception) {
                return false;
            }
        }
    }
}