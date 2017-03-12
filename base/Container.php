<?php
/**
 * Created by PhpStorm.
 * User: evgenijampleev
 * Date: 12.03.17
 * Time: 17:47
 */
namespace app\base;
class Container{

    protected $items = [];

    public function set($object, $key){

        $this->items[$key] = $object;

    }

    public function get($key){

        if(!isset($this->items[$key])){

            $this->items[$key] = Application::call()->createComponent($key);

        }

        return $this->items[$key];

    }

}