<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 22.02.17
 * Time: 10:11
 */

namespace app\controllers;
use app\models\Product;

class ProductController extends Controller{

   // protected $useLayout = true;

    public function actionProduct($params){

        $id = $params[0];
        $this->render('product/Product', ['model' => Product::getAllProductById($id)]);
    }

    public function actionProducts(){
        $this->render('product/Products', ['model' => Product::getAll()]);
    }

    public function actionIndex(){
        $this->actionProducts();
    }

}