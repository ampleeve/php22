<?php

class Db{

    protected static $conn;
    protected static $instance = null;

    protected $dbConfig = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'shop'
    ];

    protected function __construct(){}
    protected function __clone(){}
    protected function __wakeup(){}

    public static function getInstance(){

        if(is_null(static::$instance)){

            static::$instance = new static();

        }

        return static::$instance;

    }

    public function getConnection(){

        if (is_null($this->conn)) {
            $this->conn = new PDO(
                $this->prepareDnsString(),
                $this->dbConfig['login'],
                $this->dbConfig['password']
            );

            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }

    /**
     * @param $sql
     * @param $params
     * @return PDOStatement
     */
    public function query($sql, $params = [])
    {
        $smtp = $this->getConnection()->prepare($sql);
        $smtp->execute($params);
        return $smtp;
    }

    public function fetchAll($sql, $params = [])
    {
        $smtp = $this->query($sql, $params);
        return $smtp->fetchAll();
    }

    public function fetchOne($sql, $params = [])
    {
        return $this->fetchAll($sql, $params)[0];
    }

    public function fetchObject($sql, $params = [], $class)
    {
        $smtp = $this->query($sql, $params);
        $smtp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $class);
        return $smtp->fetch();
    }

    /**
     * Запрос на исполнение
     * @param $sql
     * @param $params
     * @return int - количество обработанных запросом строк
     */
    public function execute($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    protected function prepareDnsString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=UTF8",
            $this->dbConfig['driver'],
            $this->dbConfig['host'],
            $this->dbConfig['database']
        );
    }
}