<?php
namespace app\models;
use app\services\Db;
class Order extends Model{

    public $id;
    public $customerId;
    public $date;

    protected $tableName = 'order';

    public static function getTableName()
    {
        return "`order`";
    }

    public static function getAllOrderById($id){

        $table = static::getTableName();
        $sql =
                "SELECT 
                  {$table}.id as orderID,
                  customer.id as customerID,
                  customer.name as customerNAME,
                  customer.phone as customerPHONE,
                  {$table}.date as orderDATE
                  FROM {$table} 
	              INNER JOIN customer ON order.customerID = customer.id
                  WHERE order.id = :id; ";
        return Db::getInstance()->fetchOne($sql, [":id" => $id]);
    }


    public static function getAllOrdersByDate($sinceDate, $toDate){

        $table = static::getTableName();

        $sql =
            "SELECT {$table}.id, {$table}.date, customer.name, customer.phone FROM {$table}
                INNER JOIN customer ON {$table}.customerID = customer.id
                WHERE `date` BETWEEN :sinceDate  AND  :toDate";

        return Db::getInstance()->fetchAll($sql, [
            ":sinceDate" => $sinceDate,
            ":toDate" => $toDate,
        ]);
    }
}