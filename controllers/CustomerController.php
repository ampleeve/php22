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
            $this->redirect("/");
            $_SESSION['id'] = $currentUser['id'];
        }

        echo "Ошибка авторизации"; exit();

    }
    
    public function actionRegistration(){

        if($_POST['customer'] && $_POST['password']){
            $currentUser = Customer::login($_POST['email'], md5($_POST['password']));
            if(!$currentUser){
                echo "Такого пользователя нет в базе данных";
                exit();
            }
            $_SESSION['id'] = $currentUser['id'];
            $this->redirect("/");
        }

    }
    public function actionLogout(){}

    public function actionTrylogin(){

        $this->render('Login', []);

    }
    public function actionShowregform(){

        $this->render('Showregform', []);

    }

    public function isAuthorized(){}
    public function getCurrentUsername(){}


}