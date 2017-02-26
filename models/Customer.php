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
}