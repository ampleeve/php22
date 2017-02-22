<?php
//error_reporting( E_ERROR );
include_once "../services/Autoloader.php";
spl_autoload_register([new Autoloader(),'loadClass']);
header("Content-type: text/html;charset=utf-8");

$controllerName = $_REQUEST['c'];
$actionName =  isset($_REQUEST['a']) ? $_REQUEST['a'] : null;

$controllerName = sprintf("app\controllers\%sController", ucfirst($controllerName));
$controller = new $controllerName();
$controller->run($actionName);



