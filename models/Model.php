<?php

/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 19.02.17
 * Time: 12:59
 */
interface IModel{

    public static function getBuId($id);
    public static function getAll();

}

abstract class Model{

    protected $db;
    protected $dbConfig =[

        'class' => 'Db',
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',

    ];
    protected static $tableName = null;

    public function __construct(){

        var_dump($this->prepareDnsString());

        $this->db = new PDO(

            $this->prepareDnsString(),
            $this->dbConfig['login'],
            $this->dbConfig['password']

        );

    }

    abstract public static function getTableName();

    public static function getById($id){

        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE id={$id}";
        $result = $this->db->query($sql);
        return new Product($result);

    }

    public static function getAll(){

        $sql = "SELECT * FROM {static::tableName}";
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