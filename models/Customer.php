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

    public static function login($username, $password){

        $currentUser = false;
        foreach (parent::getAll() as $user) {
            if ($user['username'] == $username) {
                $currentUser = $user;
                break;
            }
        }
            //echo "<pre>";
            //var_dump($password);die();
        if ($currentUser && $currentUser['password'] == $password) {
            //$_SESSION['id'] = $currentUser['id'];
            return $currentUser;
        }

        return false;

    }
}