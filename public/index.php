<?php

require_once '../vendor/autoload.php';

use App\controller\user\UserController;
use App\controller\videogame\videogameController;
use App\controller\velo\VeloController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// on execute le controller en fonction de cette url

if ($url == "/") {
    $userController = new UserController();
    $content = $userController->login();
} elseif ($url == "/logout") {
    $userController = new UserController();
    $content = $userController->logout();
} elseif ($url == "/list-velo") {
    $veloController = new VeloController();
    $content = $veloController->list();
} elseif ($url == "/add-velo") {
    $veloController = new VeloController();
    $content = $veloController->insert();
} elseif ($url == "/update-velo") {
    $veloController = new VeloController();
    $content = $veloController->update();
} elseif ($url == "/delete-velo") {
    $veloController = new VeloController();
    $content = $veloController->delete();
} elseif ($url == "/velo-par-couleur") {
    $veloController = new VeloController();
    $content = $veloController->veloParCouleur();
} else {
    //go to 404
    http_response_code(404);
    require '../src/view/404.php';

}

echo $content;



