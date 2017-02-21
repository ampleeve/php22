<?php
namespace app\models;
class Product extends Model
{
    public $id;
    public $name;
    public $brandId;
    public $typeId;
    public $categoryId;
    public $price;
    public $vendorCode;

    protected $tableName = 'product';

    public static function getTableName()
    {
        return "product";
    }
}