<?php
namespace app\services;
use app\base\Application;
use app\traits\TSingltone;
use \PDO;
 class Db{

    protected $conn;
    protected $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'shop'
    ];

     /**
      * Db constructor.
      * @param array $config
      */
     public function __construct($driver, $host, $user, $password, $database){
         $this->config['driver'] = $driver;
         $this->config['host'] = $host;
         $this->config['user'] = $user;
         $this->config['password'] = $password;
         $this->config['database'] = $database;
     }


    public function getConnection()
    {

        if (is_null($this->conn)) {
            $this->conn = new PDO(
                $this->prepareDnsString(),
                $this->config['user'],
                $this->config['password']
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
    public function query($sql, $params = []){
        $smtp = $this->getConnection()->prepare($sql);
        $smtp->execute($params);
        return $smtp;
    }

    public function myFetchAll($sql, $params = []){

        $smtp = $this->query($sql, $params);
        return $smtp->fetchAll();
    }

    public function fetchOne($sql, $params = []){

        return $this->myFetchAll($sql, $params)[0];
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
    public function myExecute($sql, $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    protected function prepareDnsString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=UTF8",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database']
        );
    }
 }