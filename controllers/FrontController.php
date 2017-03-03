<?php
namespace app\controllers;
use app\services\RequestManager;
class FrontController extends Controller {

    public function actionIndex(){

        $rm = new RequestManager();
        //exit();
        $controllerName = $rm->getControllerName();
        //$controllerName =  isset($_REQUEST['c']) ? $_REQUEST['c'] : 'product';
        $actionName = $rm->getActionName();
        $actionName =  isset($_REQUEST['a']) ? $_REQUEST['a'] : null;
        $controllerName = sprintf("app\controllers\%sController", ucfirst($controllerName));

        /** @var  Controller $controller */
        $controller = new $controllerName(new \app\services\TemplateRenderer());
        $controller->run($actionName);
    }

}