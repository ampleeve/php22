<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 22.02.17
 * Time: 10:11
 */

namespace app\controllers;
use app\base\Application;
use app\models\Product;

 class ProductController extends Controller{

    public function actionProduct($params){

        $id = $params[0];
        $this->render('product/Product', ['model' => Application::call()->product->getAllProductById($id)]);
    }

    public function actionProducts(){
        $this->render('product/Products', ['model' => Product::getAll()]);
    }

    public function actionIndex(){
        $this->actionProducts();
    }

 }