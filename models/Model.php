<?php

/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 19.02.17
 * Time: 12:59
 */
class Model{

    protected $db;
    protected $dbConfig =[

        'class' => 'Db',
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',

    ];
    protected $tableName = null;

    public function __construct(){

        var_dump($this->prepareDnsString());

        $this->db = new PDO(

            $this->prepareDnsString(),
            $this->dbConfig['login'],
            $this->dbConfig['password']

        );

    }

    public static function getById($id){

        $sql = "SELECT * FROM {$this->tableName} WHERE id={$id}";
        $result = $this->db->query($sql);
        return new Product($result);

    }

    public static function getAll(){

        $sql = "SELECT * FROM {$this->tableName}";
        $result = $this->db->query($sql);
        return new Product($result);

    }

    protected function prepareDnsString(){

        return sprintf(

            "%s:host=%s;dbname=%s;charset=UTF-8",
            $this->dbConfig['driver'],
            $this->dbConfig['host'],
            $this->dbConfig['database']

        );

    }

}