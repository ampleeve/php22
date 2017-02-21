<?php

class Autoloader
{
    public $paths = [
        'models/',
        'services/',
        'traits/'
    ];

    public function loadClass($className)
    {
        foreach ($this->paths as $dir) {
            $filename = "../{$dir}{$className}.php";
            if (file_exists($filename)) {
                require_once($filename);
                break;
            }
        }
    }
}