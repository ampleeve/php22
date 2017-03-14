<?php
namespace app\services;
class RequestManager{

    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $params;

    protected $rules=[
        '#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?(?P<params>.*)#u'
    ];

    public function __construct(){
        $this->parseRequest();
    }

    public function parseRequest(){
        $this->requestString = $_SERVER['REQUEST_URI'];
        foreach ($this->rules as $rule){
            if(preg_match_all($rule, $this->requestString, $matches)){
                $this->controllerName = $matches['controller'][0];
                $this->actionName = $matches['action'][0];
                $this->params = array_merge(explode('/',$matches['params'][0]), $_REQUEST);
                break;
            }
            else{
                $this->controllerName = 'Product';
                $this->actionName = 'index';
            }
        }
    }

    public function getControllerName(){

        return $this->controllerName;
    }

    public function getActionName(){
        return $this->actionName;
    }

    public function getParams(){
        return $this->params;
    }

}