<?php
include_once "../services/Autoloader.php";
spl_autoload_register([new Autoloader(), 'loadClass']);

header("Content-type: text/html;charset=utf-8");
$product = new Product();

