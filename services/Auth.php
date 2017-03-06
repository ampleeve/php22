<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 06.03.17
 * Time: 18:05
 */
namespace app\services;
 use app\models\CustomerRep;

 class Auth{

    public function login($login, $password){



        $user = (new CustomerRep())->getByLoginPass($login, $password);
        echo "<pre>";
        var_dump($user);die();

    }

 }