<?php

/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 19.02.17
 * Time: 9:25
 */
class Product extends Model {

    public $id;
    public $name;
    public $description;
    public $price;

    protected $tableName = 'product';

}