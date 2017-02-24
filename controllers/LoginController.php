<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 24.02.17
 * Time: 19:39
 */

namespace app\controllers;


use app\models\Customer;

class LoginController extends Controller {

    public function actionLogin(){

        if($_POST['email'] && $_POST['password']){
            $currentUser = Customer::login($_POST['email'], md5($_POST['password']));
            if(!$currentUser){
                echo "Такого пользователя нет в базе данных";
                exit();
            }
            $_SESSION['id'] = $currentUser['id'];
            $this->redirect("/");
        }
    }
    public function actionRegistration(){


    }
    public function actionLogout(){}
    public function actionShowform(){

        $this->render('Showform', []);

    }
    public function actionShowregform(){

        $this->render('Showregform', []);

    }

    public function isAuthorized(){}
    public function getCurrentUsername(){}


}