<?php

set_include_path('../app');
spl_autoload_extensions(".php");
spl_autoload_register();



//include_once "../services/Autoloader.php";
//include_once "../services/autoload.php";

//spl_autoload_register([new Autoloader(),'loadClass']);
//spl_autoload_register(array('Autoloader', 'loadPackagesAndLog'));

//echo '<pre>';
//var_dump(spl_autoload_functions());

/*header("Content-type: text/html;charset=utf-8");
$product = new Product();
echo '<pre>';
var_dump($product);

function test($object){
    $object->getById($id);
}*/