<?php
namespace app\controllers;
use app\base\Application;
use app\models\Customer;
use app\services\Auth;

class AuthController extends Controller {

    protected $useLayout = true;

    public function actionIndex(){

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && isset($_POST['pass'])){

            if((new Auth())->login($_POST['login'], $_POST['pass'])){

                $this->redirect("/");
            }

        }

        //echo "<pre>"; var_dump(Application::call()->user->getCurrent());die();

        if(Application::call()->user->getCurrent()){

            $this->redirect("/");

        }

        $this->render('auth/login');
    }
}