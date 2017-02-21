<?php
include_once "../services/Autoloader.php";
spl_autoload_register([new Autoloader(),'loadClass']);

header("Content-type: text/html;charset=utf-8");
//$product = new Product();
$order = new Order();
echo '<pre>';
echo "Получить конкретный заказ: <br/>";
var_dump($order->getAllOrderById(1));
echo "Получить всю информацию о заказах в интервале дат: <br/>";
var_dump($order->getAllOrdersByDate("2016-02-10 18:45:07","2016-10-10 18:45:07"));



