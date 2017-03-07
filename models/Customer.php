<?php
namespace app\models;
 class Customer{

    protected $id;
    protected $username;
    protected $phone;
    protected $password;
    protected $sessionId;

    public function getId(){

        return $this->id;

    }

    /**@return static*/
    public function getCurrent(){

        return true;

    }

 }