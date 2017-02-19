<?php

/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 19.02.17
 * Time: 9:25
 */
class Product
{
    public $id;
    public $name;
    public $description;
    public $price;

    protected $db;
    protected $dbConfig =[

        'class' => 'Db',
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop',

    ];

    public function __construct(){

        $this->db = new PDO(

            $this->prepareDnsString(),
            $this->dbConfig['login'],
            $this->dbConfig['password']

        );

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