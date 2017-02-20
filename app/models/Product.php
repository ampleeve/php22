<?php
class Product extends Model {

    public $id;
    public $name;
    public $description;
    public $price;

    protected $tableName = 'product';

    public static function getTableName(){

        return static::tableName;

    }
}