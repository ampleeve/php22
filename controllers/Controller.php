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
abstract class Controller{

    protected $action;
    protected $defaultAction = "index";
    protected $layout = 'main';

    protected $useLayout = true;
    protected $renderer = null;

    public function __construct(IRenderer $renderer = null){

        $this->renderer = $renderer;

    }

    public function run($action = null){

        $this->startSession();
        $this->action = $action?:$this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        $this->$method();

    }

    protected function render($template, $params = []){

        //echo "<pre>";
        //var_dump($template);die();


        if ($this->useLayout){
            echo $this->renderTemplate('layouts/'. $this->layout, [
                'content' => $this->renderTemplate($template, $params),
                'username' => Customer::getActiveUserName()]);
        }else{
            //$template = lcfirst(str_replace(['Controller','app\controllers\\'],'', get_called_class()));
            echo $this->renderTemplate($template, $params);
        }

    }

    protected function renderTemplate($template, $params = []){

        return $this->renderer->render($template, $params);

    }

    protected function redirect($to){

        header('Location: ' . $to);
        exit();
    }

    protected function startSession() {

        if ( session_id() ) return true;
        else return session_start();
    }

}