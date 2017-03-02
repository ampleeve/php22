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

    public function actionTrylogin(){

        $this->render('customer/Login', []);

    }

    public function actionLogin(){

        $isOk = Customer::login();

        if($isOk){
            $_SESSION['id'] = $isOk;
            $this->redirect("/");
        }
        echo "Ошибка авторизации"; exit();
    }

    public function actionLogout(){

        unset($_SESSION['id']);
        $this->redirect("/");
    }

    public function actionTryregistration(){

        $this->render('customer/Registration', []);

    }

    public function actionRegistration(){

        $err = Customer::registration();
        if($err){
            echo $err;
            echo "<br/>";
        }else{
           $this->redirect("/?c=customer&a=trylogin");
        }
    }

}