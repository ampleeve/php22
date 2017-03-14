<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 06.03.17
 * Time: 18:05
 */
namespace app\services;
use app\models\Customer;
use app\models\CustomerRep;
use app\models\SessionsRep;
use app\base\Application;

 class Auth{

     protected $sessionKey = 'sid';

     public function login($login, $password){

        $user = (new CustomerRep())->getByLoginPass($login, $password);
        if(!$user){
            return false;
        }

        return $this->openSession($user);
     }

     public function logout($login){


         //$user = (new CustomerRep())->getByLoginPass($login, $password);
         //if(!$user){
           //  return false;
         //}

         //return $this->openSession($user);
     }

     protected function openSession(Customer $user){
        $model = new SessionsRep();
        $sid = $this->generateStr();
        $model->createNew($user->getId(),$sid, date('Y-m-d H:i:s'));
        $_SESSION[$this->sessionKey] = $sid;
        return true;

     }

     public function getSessionId(){

        $sid = $_SESSION[$this->sessionKey];
        if(!is_null($sid)){
            Application::call()->session_rep->updateLastTime($sid);
        }
        return $sid;
     }

     private function generateStr($length = 10){

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;

        while (strlen($code) < $length)
            $code .= $chars[mt_rand(0, $clen)];

        return $code;
     }

 }