<?php
namespace app\models;
 use app\base\Application;
 use app\services\Auth;

 class Customer{

    protected $id;
    public $username;
    protected $phone;
    protected $password;
    protected $sessionId;

    public function getId(){

        return $this->id;

    }

    /**@return static*/
     public function getCurrent()
     {
         $userId = $this->getUserId();
         if($userId){
             return Application::call()->user_rep->getById($userId);
         }
         return null;
     }

     protected function getUserId()
     {
         $sid = Application::call()->auth->getSessionId();
         if(!is_null($sid)){
             return Application::call()->session_rep->getUidBySid($sid);
         }
         return null;
     }

 }