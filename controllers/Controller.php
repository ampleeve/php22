<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 23.02.17
 * Time: 13:56
 */
namespace app\controllers;
use app\interfaces\IRenderer;
use app\models\Customer;
//use app\services\TemplateRenderer;
 class Controller{

    protected $action;
    protected $defaultAction = "index";
    protected $layout = 'main';
    protected $useLayout = true;
    protected $renderer = null;

    public function __construct(IRenderer $renderer = null){

        $this->renderer = $renderer;

    }

    public function run($action = null, $params = []){

        $this->action = $action?:$this->defaultAction;
        $action = 'action' . ucfirst($this->action);
        $this->beforeAction();
        $this->$action();
        $this->afterAction();

    }

    protected function render($template, $params = []){

        if ($this->useLayout){
            echo $this->renderTemplate('layouts/'. $this->layout, ['content' => $this->renderTemplate($template, $params)]);
        }else{
            echo $this->renderTemplate($template, $params);
        }

    }

    protected function renderTemplate($template, $params = []){

        return $this->renderer->render($template, $params);

    }

    protected function beforeAction(){}
    protected function afterAction(){}

    protected function redirect($to){

        header('Location: ' . $to);

    }
}