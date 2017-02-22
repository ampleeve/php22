<?php
namespace app\models;
class Product extends Model
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $vendorCode;
    public $typeID;
    public $brandID;
    public $categoryID;

    protected $tableName = 'product';

    public static function getTableName()
    {
        return "product";
    }
}