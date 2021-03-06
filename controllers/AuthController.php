<?php
namespace app\controllers;
use app\base\Application;
use app\models\Customer;
use app\services\Auth;

 class AuthController extends Controller {

    protected $useLayout = true;

    public function actionIndex(){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && isset($_POST['pass'])){

            if(Application::call()->auth->login($_POST['login'], $_POST['pass'], $_POST['remember'])){

                $this->redirect("/");
            }

        }

        if(Application::call()->user->getCurrent()){

            $this->redirect("/");

        }

        $this->render('auth/login');
    }

    public function actionLogout(){

        $currentSid = Application::call()->auth->getSessionId();
        Application::call()->session_rep->clearSessionBySid($currentSid);

        if (isset($_COOKIE['uid'])) {
            unset($_COOKIE['uid']);
            setcookie('uid', '', time() - 3600, '/');
        }

        if (isset($_COOKIE['sid'])) {
            unset($_COOKIE['sid']);
            setcookie('sid', '', time() - 3600, '/');
        }
        
        $this->redirect('/');

    }
 }