<?php
namespace app\controllers;
use app\base\Application;
use app\models\Customer;
use app\services\RequestManager;

 class FrontController extends Controller {

    protected $controllerName;
    protected $actionName;
    protected $params;

    public function actionIndex(){
        $rm = new RequestManager();
        $this->controllerName = $rm->getControllerName();
        $this->checkUser();
        $this->actionName = $rm->getActionName();
        $this->params = $rm->getParams();
        $this->controllerName = sprintf("app\controllers\%sController", ucfirst($this->controllerName));
        /** @var  Controller $controller */
        $controller = new $this->controllerName(Application::call()->renderer);
        //$controller = new $this->controllerName(new \app\services\TemplateRenderer());
        $controller->run($this->actionName, $this->params);
    }

    protected function checkUser(){

        session_start();

        if($this->controllerName != 'auth'){
            /** @var  Customer $user */
            $user = Application::call()->user->getCurrent();
            if(!$user){
                $this->redirect('auth');
            }

        }

    }

 }