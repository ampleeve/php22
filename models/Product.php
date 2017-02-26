<?php
namespace app\models;
use app\services\Db;
class Product extends Model{

    public $id;
    public $name;
    public $price;
    public $description;
    public $vendor;
    public $type;
    public $brand;
    public $category;

    protected $tableName = 'product';

    public static function getTableName()
    {
        return 'product';
    }

    public static function getAllProductById($id){

        $table = static::getTableName();
        $sql =
            "SELECT
                {$table}.id as id,
                {$table}.name as `name`,
                {$table}.price as price,
                {$table}.description as description,
                {$table}.vendorCode as vendor,
                `type`.`name` as `type`,
                brand.`name` as brand,
                category.`name` as category
                FROM {$table}
	            INNER JOIN category ON {$table}.categoryID = category.id
                INNER JOIN brand ON brand.id = {$table}.brandID
                INNER JOIN type ON `type`.id = {$table}.typeID
                WHERE product.id = :id;";
        return Db::getInstance()->fetchObject($sql, [":id" => $id], get_called_class());
    }
}