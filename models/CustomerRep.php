<?php
namespace app\models;
use app\base\Application;
use app\services\Db;

 class CustomerRep{

    /** @var Db */
    private $conn = null;
    protected $nestedClass = 'app\models\Customer';

    public function __construct(){

        $this->conn = Application::call()->db;

    }

    public function getByLoginPass($login, $pass){

        return $this->conn->fetchObject(
            sprintf("SELECT * FROM customer WHERE username = '%s' AND password = '%s'", $login, md5($pass)
            ), [], $this->nestedClass
        );

    }

    public function getById($id){

        $sql = "SELECT * FROM customer WHERE id = :id";
        return $this->conn->fetchObject($sql, [":id" => $id], $this->nestedClass);

    }

 }