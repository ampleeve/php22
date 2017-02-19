<?php
$product = new Product();

function __autoload($className){
    var_dump($className);
}