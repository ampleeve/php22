<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 22.02.17
 * Time: 10:11
 */

namespace app\controllers;
use app\interfaces\IRenderer;
use app\models\Product;

class ProductController extends Controller{

    //protected $useLayout = false;

    public function actionProduct(){
        $id = $_GET['id'];
        $this->render('Product', ['model' => Product::getAllProductById($id)]);
    }

    public function actionProducts(){
        $this->render('Products', ['model' => Product::getAll()]);
    }

    public function actionIndex(){
        $this->actionProducts();
        //$this->render('products');
    }

}