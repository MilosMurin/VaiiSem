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

    /**
     * @throws Exception
     */
    public function delete(): Response {
        $user = Utils::getUser($this->app->getAuth()->getLoggedUserName());
        if ($user != null) {
            $this->app->getAuth()->logout();
            $user->delete();
        }
        return $this->redirect("?c=home");
    }

    /**
     * @throws Exception
     */
    public function update(): Response {
        $user = Utils::getUser($this->app->getAuth()->getLoggedUserName());
        $data = ["user" => $user];
        if ($user != null) {
            $formData = $this->app->getRequest()->getPost();
            if (isset($formData["name"])) {
                if ($formData["name"] != "" && $formData["email"] != "") {
                    if (Utils::checkName($formData["name"])) {
                        if (Utils::checkEmail($formData["email"])) {
                            if ($formData["oldPswd"] != "") {
                                // Change password
                                if ($formData["oldPswd"] == $formData["newPswd"]) {
                                    $data += ["message" => "New password cannot be the same as old password!"];
                                    return $this->html($data, "index");
                                }
                                if (Utils::checkPassword($formData["newPswd"])) {
                                    $user->setPassword(password_hash($formData["newPswd"], PASSWORD_DEFAULT));
                                } else {
                                    $data += ["message" => "New password must contain at least one uppercase letter and one number!"];
                                    return $this->html($data, "index");
                                }
                            }

                            $user->setName($formData["name"]);
                            $_SESSION['user'] = $formData["name"];
                            $user->setEmail($formData["email"]);
                            $user->save();
                        } else {
                            $data += ["message" => "Email already taken or incorrect!"];
                            return $this->html($data, "index");
                        }
                    } else {
                        $data += ["message" => "Username already taken!"];
                        return $this->html($data, "index");
                    }
                } else {
                    $data += ["message" => "Username and email cannot be empty!"];
                    return $this->html($data, "index");
                }
            }

        }
        return $this->redirect("?c=home");
    }
}