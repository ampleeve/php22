<?php
namespace app\controllers;
use app\services\RequestManager;
class FrontController extends Controller {

    public function actionIndex(){
        $rm = new RequestManager();
        $controllerName = $rm->getControllerName();
        $actionName = $rm->getActionName();
        $params = $rm->getParams();
        $controllerName = sprintf("app\controllers\%sController", ucfirst($controllerName));

        /** @var  Controller $controller */
        $controller = new $controllerName(new \app\services\TemplateRenderer());
        //echo "<pre>";
        //var_dump($params);die();
        $controller->run($actionName, $params);
    }

}