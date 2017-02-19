<?php

/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 19.02.17
 * Time: 9:44
 */
class Autoloader
{
    public $paths = [
        'models/',
        'services/'
    ];


    public function loadClass($className){

        foreach ($this->paths as $dir){

            $fileName = "../{$dir}{$className}.php";

            if(file_exists($fileName)){

                require_once($fileName);
                break;

            }
        }

    }

}