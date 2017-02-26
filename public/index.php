<?php
error_reporting( E_ERROR );
include_once "../services/Autoloader.php";
include_once '../lib/Twig/Autoloader.php';
spl_autoload_register([new Autoloader(),'loadClass']);
spl_autoload_register([new Twig_Autoloader(),'Twig_Autoloader::register']);

header("Content-type: text/html;charset=utf-8");

$controllerName =  isset($_REQUEST['c']) ? $_REQUEST['c'] : 'product';
$actionName =  isset($_REQUEST['a']) ? $_REQUEST['a'] : null;

$controllerName = sprintf("app\controllers\%sController", ucfirst($controllerName));
$controller = new $controllerName();
$controller->run($actionName);



