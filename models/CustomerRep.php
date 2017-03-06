<?php
namespace app\models;
use app\services\Db\;

class UserRep{

    /** @var Db */
    private $conn = null;

    public function __construct(){

        $this->conn = DB::getInstance();

    }

    public function getByLoginPass($login, $pass){

        $sql = "SELECT * FROM customer WHERE username = ':login' AND password = ':pass';";
        return $this->conn->fetchObject($sql, [":login" => $login, ":pass" => $pass], 'User');

    }

    public function getById($id){

        $sql = "SELECT * FROM customer WHERE id = ':id';";
        return $this->conn->fetchObject($sql, [":id" => $id], 'User');

    }

}