<?php
//error_reporting( E_ERROR );
header("Content-type: text/html;charset=utf-8");
include_once "../vendor/autoload.php";
include_once "../services/Autoloader.php";
spl_autoload_register([new Autoloader(),'loadClass']);
(new \app\controllers\FrontController())->run();





