<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 24.02.17
 * Time: 19:39
 */

namespace app\controllers;
use app\models\Customer;

class CustomerController extends Controller {

    public function actionLogin(){

        $isOk = Customer::login();

        if($isOk){
            //$this->startSession();
            $_SESSION['id'] = $isOk;
            $this->redirect("/");
        }

        echo "Ошибка авторизации"; exit();

    }


    public function actionLogout(){

        unset($_SESSION['id']);
        $this->redirect("/");
    }


    public function actionTrylogin(){

        $this->render('Login', []);

    }
}