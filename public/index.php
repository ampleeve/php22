<?php
error_reporting( E_ERROR );
include_once "../vendor/autoload.php";
include_once "../services/Autoloader.php";
spl_autoload_register([new Autoloader(),'loadClass']);
header("Content-type: text/html;charset=utf-8");

$controllerName =  isset($_REQUEST['c']) ? $_REQUEST['c'] : 'product';
$viewDir = $controllerName;
$actionName =  isset($_REQUEST['a']) ? $_REQUEST['a'] : null;

$controllerName = sprintf("app\controllers\%sController", ucfirst($controllerName));
$controller = new $controllerName(new \app\services\TemplateRenderer());
$controller->run($actionName);



