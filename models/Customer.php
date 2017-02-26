<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 25.02.17
 * Time: 0:34
 */
namespace app\models;
use app\services\Db;
class Customer extends Model{

    public $id;
    public $username;
    public $phone;
    public $password;

    protected $tableName = 'customer';

    public static function getTableName(){

        return 'customer';

    }

    public static function login(){

        if($_POST['email'] && $_POST['password']) {
            $currentUser = static::isUserExist($_POST['email'], md5($_POST['password']));
            if (!$currentUser) {
                return false;
            }
            return $currentUser['id'];
        }
    }

    private static function isUserExist($username, $password){

            $currentUser = false;
            foreach (parent::getAll() as $user) {
                if ($user['username'] == $username) {
                    $currentUser = $user;
                    break;
                }
            }

            if ($currentUser && $currentUser['password'] == $password) {
                return $currentUser;
            }

            return false;

    }

    public static function getActiveUserName(){

        if (!empty($_SESSION['id'])) {
                foreach (Customer::getAll() as $user) {
                    if ($_SESSION['id'] == $user['id']) {
                        return $user['username'];
                    }
                }
        }

        return false;
    }

    public static function registration(){

        $errRes = false;

        if ($_POST['login'] &&
            $_POST['password'] &&
            $_POST['password2'] &&
            $_POST['phone'] ){

            foreach (Customer::getAll() as $user) {
                if ($_POST['login'] == $user['username']) {
                    $errRes .= "Пользователь ". $user['username']. " уже зарегистрирован. <br/>";
                }
            }

            if($_POST['password']!=$_POST['password2']){

                $errRes .= "Пароли не совпадают";
            }

            if(!$errRes){
                static::createCustomer($_POST['login'], $_POST['password'], $_POST['phone']);
            }
        }
    }

    private static function createCustomer($username, $password, $phone){

        $table = static::getTableName();
        $sql =
            "INSERT INTO
                {$table} (`username`, `phone`, `password`)
                VALUES (:username, :phone, :password)";
        Db::getInstance()->execute($sql,[":username" => $username, ":phone" => $phone, ":password" => md5($password)]);
    }
}