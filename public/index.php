<?php

require_once '../vendor/autoload.php';

use App\controller\user\UserController;
use App\controller\videogame\videogameController;
use App\controller\velo\VeloController;


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// on execute le controller en fonction de cette url

$routes = [
    "/" => [UserController::class, "login"],
    "/logout" => [UserController::class, "logout"],
    "/list-velo" => [VeloController::class, "list"],
    "/add-velo" => [VeloController::class, "insert"],
    "/update-velo" => [VeloController::class, "update", 'id'],
    "/delete-velo" => [VeloController::class, "delete", 'id'],
    "/velo-par-couleur" => [VeloController::class, "veloParCouleur"]
];


if (isset($routes[$url])) {

    /*
    $protectedPages = "@^/admin@";
    if (preg_match($protectedPages,$url)&& !isset($_SESSION['user'])){
        http_response_code(404);
        require '../src/view/404.php';
        return $content;
    }
    */


    $controllerTab = $routes[$url];
    $controller = new $controllerTab[0]();
    $method = $controllerTab[1];

    if (isset($controllerTab[2])) {
        if ($_GET[$controllerTab[2]]) {
            $param = $_GET[$controllerTab[2]];
            $content = $controller->$method($param);
        }

    } else {
        $content = $controller->$method();
    }
} else {
    //go to 404
    http_response_code(404);
    require '../src/view/404.php';
}


/*
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

*/

echo $content;



