<?php

class Autoloader{

    public function loadClass($className){

        $className = str_replace("app", "..", $className);
        $className = str_replace("\\", "/", $className). ".php";
        //var_dump($className);die();
        include_once $className;

    }

}