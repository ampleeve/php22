<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 23.02.17
 * Time: 13:56
 */
namespace app\controllers;
use app\models\Customer;

abstract class Controller{

    protected $action;
    protected $defaultAction = "index";
    protected $layout = 'main';
    protected $useLayout = true;

    public function run($action = null){

        $this->startSession();
        $this->action = $action?:$this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        $this->$method();

    }

    protected function render($template, $params = []){

        if ($this->useLayout){

            echo $this->renderTemplate('layouts/'. $this->layout, [
                'content' => $this->renderTemplate($template, $params),
                'username' => Customer::getActiveUserName()
            ]);
        }else{
            echo $this->renderTemplate($template, $params);
        }

    }

    protected function renderTemplate($template, $params = []){

        $dir = '';

        if($template != 'layouts/main'){
            $dir = lcfirst(str_replace(['Controller', 'app\controllers\\'], '', get_called_class()));
        }

        $templatePath = $_SERVER['DOCUMENT_ROOT'] . "/../views/{$dir}/{$template}.php";
        extract($params);
        ob_start();
        include $templatePath;
        return ob_get_clean();

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