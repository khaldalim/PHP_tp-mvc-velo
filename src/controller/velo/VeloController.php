<?php


namespace App\controller\velo;


use App\database\Connection;
use App\model\color\ColorManager;
use App\model\velo\VeloManager;

class VeloController
{
    public function list()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $pdo = Connection::getPdo();
            $veloManager = new VeloManager($pdo);
            $velos = $veloManager->getAll();

            require '../src/view/velo/list_velo.php';
            return $content;
        } else {
            http_response_code(404);
            require '../src/view/404.php';
            return $content;
        }

    }


    public function insert()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $pdo = Connection::getPdo();
            $titleForm = "Ajouter";
            $colorManager = new ColorManager($pdo);
            $colors = $colorManager->getAll();
            $veloManager = new VeloManager($pdo);

            //data of form
            $name = "";
            $price = "";
            $height = "";
            $type = "";
            $suspension = "";
            $colorChoice = "";

            if (isset($_POST['velo_form'])) {
                $velo = $veloManager->handleRequest();
                $errors = $veloManager->validate($velo);
                if (empty($errors)) {
                    $insert = $veloManager->insert($velo);
                    if ($insert) {
                        header('Location: /list-velo');
                        exit();
                    }
                } else {
                    $messsage = "erreurs";
                }
            }


            require '../src/view/velo/form_velo.php';
            return $content;
        } else {
            http_response_code(404);
            require '../src/view/404.php';
            return $content;
        }

    }


    public
    function update()
    {
        session_start();
        if (isset($_SESSION['user'])) {

            if (isset($_GET['id'])) {
                $pdo = Connection::getPdo();
                $id = $_GET['id'];
                $titleForm = "Modifier";

                //recupération de la liste des couleurs
                $colorManager = new ColorManager($pdo);
                $colors = $colorManager->getAll();

                $veloManager = new VeloManager($pdo);
                $velo = $veloManager->getOne($id);

                $name = $velo->getVeloName();
                $price = $velo->getVeloPrice();
                $height = $velo->getVeloHeight();
                $type = (int)$velo->isVeloType();
                $suspension = (int)$velo->isVeloSuspension();
                $colorChoice = $velo->getVeloColor()->getIdColor();


                if (isset($_POST['velo_form'])) {
                    $velo = $veloManager->handleRequest($velo->getVeloId());

                    $errors = $veloManager->validate($velo);

                    if (empty($errors)) {

                        $update = $veloManager->update($velo);


                        if ($update) {
                            header('Location: /list-velo?update=' . $velo->getVeloId());
                            exit();
                        } else {
                            header('Location: /list-velo?update=noId');
                            exit();
                        }

                    } else {
                        $messsage = "erreurs";
                    }
                }


            } else {
                header('Location: /add-velo');
                exit();
            }
            require '../src/view/velo/form_velo.php';
            return $content;
        } else {
            http_response_code(404);
            require '../src/view/404.php';
            return $content;
        }

    }

    public
    function delete()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $pdo = Connection::getPdo();
                $veloManager = new VeloManager($pdo);
                $velo = $veloManager->getOne($id);
                var_dump($velo);
                $veloManager->delete($velo);

                var_dump($veloManager->delete($velo));
                if ($veloManager->delete($velo)) {
                    header('Location: /list-velo?delete=' . $id);
                    exit();
                }

            } else {
                header('Location: /list-velo?delete=noId');
                exit();
            }


        } else {
            http_response_code(404);
            require '../src/view/404.php';
            return $content;
        }

    }

    public
    function veloParCouleur()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $pdo = Connection::getPdo();
            $veloManager = new VeloManager($pdo);

            $veloNumberbyColor = $veloManager->selectNumbersofVeloByColor($pdo);
            require '../src/view/velo/velo_par_couleur.php';
            return $content;
        } else {
            http_response_code(404);
            require '../src/view/404.php';
            return $content;
        }
    }
}
