<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 24.02.17
 * Time: 19:39
 */

namespace app\controllers;


class LoginController extends Controller {

    public function actionLogin(){}
    public function actionRegistrattion(){

        
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