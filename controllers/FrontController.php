<?php
namespace app\controllers;
use app\models\Customer;
use app\services\RequestManager;

 class FrontController extends Controller {

    protected $controllerName;
    protected $actionName;
    protected $params;

    public function actionIndex(){
        $rm = new RequestManager();
        $this->controllerName = $rm->getControllerName();
        $this->actionName = $rm->getActionName();
        $this->params = $rm->getParams();
        $this->checkUser();
        $this->controllerName = sprintf("app\controllers\%sController", ucfirst($this->controllerName));

        /** @var  Controller $controller */
        $controller = new $this->controllerName(new \app\services\TemplateRenderer());
        $controller->run($this->actionName, $this->params);
    }

    protected function checkUser(){

        if($this->controllerName != 'auth'){

            session_start();
            //echo "<pre>";
            //var_dump($_SESSION);die();
            $user = (new Customer())->getCurrent();
            if(!$user){
                $this->redirect('auth');
            }

        }

    }

 }