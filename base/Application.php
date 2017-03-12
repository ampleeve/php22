<?php
namespace app\base;
use app\services\Db;

/**
 * Class Application
 * @package app\base
 * @property Controller mainController
 * @property Db db
 * @property RequestManager request
 */
class Application{

    protected $config;
    /**@var Container*/
    protected $storage;

    protected static $instance;

    /** @return static */
    public static function call(){

        if(is_null(self::$instance)){

            self::$instance = new static();

        }

        return self::$instance;

    }

    public function run(){

        error_reporting( E_ERROR );
        $this->config = include_once "../config/main.php";
        $this->autoload();
        $this->storage = new Container();
        $this->mainController->run();

    }

    protected function autoload(){

        include_once "../services/Autoloader.php";
        include_once "../vendor/autoload.php";
        spl_autoload_register([new \Autoloader(),'loadClass']);

    }

    public function createComponent($name){

        if(isset($this->config['components'][$name])){
            $params = $this->config['components'][$name];
            $class = $params['class'];
            unset ($params['class']);
            $reflection = new \ReflectionClass($class);
            return $reflection->newInstanceArgs($params);

        }

    }

    function __get($name){

        return $this->storage->get($name);

    }
}