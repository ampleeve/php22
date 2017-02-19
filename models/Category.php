<?php

/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 19.02.17
 * Time: 12:55
 */
class Category extends Model{

    protected $tableName = 'category';

    public function getTableName()
    {
       return $this->tableName;
    }
}