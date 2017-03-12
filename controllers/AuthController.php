<?php
namespace app\controllers;
use app\services\Auth;

class AuthController extends Controller {

    protected $useLayout = true;

    public function actionIndex(){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && isset($_POST['pass'])){

            if((new Auth())->login($_POST['login'], $_POST['pass'])){

                $this->redirect("/");
            }

        }
        $this->render('auth/login');
    }
}