<?php
class Category extends Model{

    protected $tableName = 'category';

    public function getTableName()
    {
       return $this->tableName;
    }
}