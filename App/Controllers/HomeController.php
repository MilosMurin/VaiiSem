<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Helpers\Utils;
use App\Models\LearnUser;
use App\Models\User;
use Exception;

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
                    if (Utils::checkName($formData["name"])) {
                        if (Utils::checkEmail($formData["email"])) {
                            if (Utils::checkPassword($formData["pswd"])) {
                                $reg = $this->register($formData["name"], $formData["pswd"], $formData["email"]);
                                if ($reg) {
                                    return $this->redirect('?c=home');
                                } else {
                                    $data = ["message" => "Something went wrong!"];
                                }
                            } else {
                                $data = ["message" => "Password must contain at least one uppercase letter and one number!"];
                            }
                        } else {
                            $data = ["message" => "Email is invalid or already taken!"];
                        }
                    } else {
                        $data = ["message" => "Username already taken!"];
                    }
                } else {
                    $logged = $this->login($formData['name'], $formData['pswd']);
                    if ($logged) {
                        return $this->redirect('?c=home');
                    } else {
                        $data = ["message" => "Incorrect name or password!"];
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
            $newUser = User::create($login, password_hash($password, PASSWORD_DEFAULT), $email);
            try {
                $newUser->save();
                $this->setupUserInDB($newUser->getId());
                $_SESSION['user'] = $login;
                return true;
            } catch (Exception) {
                return false;
            }
        }
    }

    /**
     * @throws Exception
     */
    private function login(string $name, string $pswd): bool {
        $logged = $this->app->getAuth()->login($name, $pswd);
        $usrId = User::getAll('name=?', [$name])[0]->getId();
        if (sizeof(LearnUser::getAll('userId=?', [$usrId])) <= 0) {
            $this->setupUserInDB($usrId);
        }
        return $logged;
    }

    /**
     * @throws Exception
     */
    private function setupUserInDB(int $userId): void {
        for ($i = 1; $i <= 78; $i++) {
            $l = LearnUser::createNotLearned($userId, $i, $i);
            $l->save();
        }
    }
}