<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 22.02.17
 * Time: 10:11
 */

namespace app\controllers;
use app\models\Product;

class ProductController{

    protected $action;
    protected $defaultAction = "index";

    public function run($action = null){

        $this->action = $action?:$this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        $this->$method();

    }

    public function actionProduct(){

        $id = $_GET['id'];
        $this->render(
            'Product',
            ['model' => Product::getById($id)]
        );

    }

    public function actionIndex(){

        echo "Index";

    }

    protected function render($template, $params = []){

        $templatePath =
            $_SERVER['DOCUMENT_ROOT'] .
            "/../views/{$template}.php";
        extract($params);
        include $templatePath;

    }

}