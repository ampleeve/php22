<?php
namespace app\models;
use app\services\Db;

class CustomerRep{

    /** @var Db */
    private $conn = null;
    protected $nestedClass = 'app\models\Customer';

    public function __construct(){

        $this->conn = DB::getInstance();

    }

    public function getByLoginPass($login, $pass){

        //echo "<pre>";
        //var_dump($this->conn->fetchObject());die();

        return $this->conn->fetchObject(
            sprintf("SELECT * FROM customer WHERE username = '%s' AND password = '%s'", $login, md5($pass)
            ), [], $this->nestedClass
        );

    }

    public function getById($id){

        $sql = "SELECT * FROM customer WHERE id = ':id';";
        return $this->conn->fetchObject($sql, [":id" => $id], $this->nestedClass);

    }

}