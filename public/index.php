<?php

require_once __DIR__ . '/../app/services/NamespaceAutoloader.php';
$autoloader = new NamespaceAutoloader();
$autoloader->addNamespace('models', __DIR__ . '/../app/models');
$autoloader->addNamespace('services', __DIR__ . '/../app/services');
$autoloader->register();

header("Content-type: text/html;charset=utf-8");
$product = new Product();
echo '<pre>';
var_dump($product);