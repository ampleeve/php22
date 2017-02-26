<?php

class Autoloader{

    public function loadClass($className){

        $className = str_replace("app", "..", $className);
        $className = str_replace("\\", "/", $className). ".php";
        include_once $className;

    }

}