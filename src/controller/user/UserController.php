<?php


namespace App\controller\user;

use App\database\Connection;
use App\model\user\UserManager;

class UserController
{

    public function login()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            header('Location: /list-velo');
        } else {
            $message = "";
            $pdo = Connection::getPdo();
            $userManager = new UserManager($pdo);

            if (isset($_POST['login_form'])) {

                $user = $userManager->handleRequest();
                $errors = $userManager->validate($user);


                if (empty($errors)) {
                    $message = "no errors";
                    $exist = $userManager->existUser($user);
                    if ($exist) {

                        $_SESSION['user'] = $user->getUsername();
                        header('Location: /list-velo');
                        exit();
                    } else {
                        $message = "Username ou mot de passe incorrect";
                    }


                } else {
                    $message = "Erreur de saisie";
                }
            }

            require '../src/view/user/login_user.php';
            return $content;
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /');

    }
}
