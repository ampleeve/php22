<?php
abstract class Model {

    protected  static $db;

    abstract public static function getTableName();

    public static function getById($id){

        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE id={$id}";
        $res = DB::getInstance()->query($sql);
        return new Product($res);

    }

    public static function getAll(){

        $sql = "SELECT * FROM {static::tableName}";
        return DB::getInstance()->getAll();

    }
}