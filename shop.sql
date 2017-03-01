-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 24 2017 г., 23:44
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Gucci'),
(2, 'guci'),
(3, 'hemes'),
(4, 'bmw');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Нижнее белье'),
(2, 'Автомобили'),
(3, 'Мотоциклы'),
(4, 'Цифровые товары'),
(5, 'Спортивные товары'),
(6, 'Аксессуары (Верхняя одежда)');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id`, `username`, `phone`, `password`) VALUES
(1, 'alex@mail.ru', '8945678990', ''),
(2, 'e@ampleev.com', '89261382009', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `customerID`, `date`) VALUES
(1, 1, '2017-02-10 18:45:07'),
(2, 1, '2017-01-10 18:45:07'),
(3, 1, '2016-12-10 18:45:07'),
(4, 1, '2016-11-10 18:45:07'),
(5, 1, '2016-10-10 18:45:07'),
(6, 1, '2016-09-10 18:45:07');

-- --------------------------------------------------------

--
-- Структура таблицы `orderProduct`
--

DROP TABLE IF EXISTS `orderProduct`;
CREATE TABLE `orderProduct` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orderProduct`
--

INSERT INTO `orderProduct` (`orderID`, `productID`, `count`) VALUES
(1, 3, 5),
(1, 4, 1),
(1, 5, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `brandID` int(11) DEFAULT NULL,
  `typeID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `price` decimal(20,2) NOT NULL,
  `vendorCode` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `brandID`, `typeID`, `categoryID`, `price`, `vendorCode`, `description`) VALUES
(3, 'Перчатки Gucci', 1, 1, 6, '100.00', 'ИП Иванов А.', 'Перчатки для любого сезона, кожаные, замечательные'),
(4, 'Автомобиль BMW', 2, 2, 2, '200.00', 'ООО \"БЭЭМВЭ\"', 'Хороший автомобиль немецкий'),
(5, 'Гольфы Hermes', 1, 1, 1, '300.00', 'ООО \"Милан\"', 'Нормально для игры в поло'),
(6, 'Лосины Nike', 2, 2, 2, '400.00', 'ООО \"НАЙК\"', 'Ух какие лосинки, бери!');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'перчатки'),
(2, 'верхняя одежда'),
(3, 'мужское'),
(4, 'женское');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCustomerOrder_idx` (`customerID`);

--
-- Индексы таблицы `orderProduct`
--
ALTER TABLE `orderProduct`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `fkProductID_idx` (`productID`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCategoryProduct_idx` (`categoryID`),
  ADD KEY `fkBrandProduct_idx` (`brandID`),
  ADD KEY `fkTypeProduct_idx` (`typeID`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fkCustomerOrder` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `orderProduct`
--
ALTER TABLE `orderProduct`
  ADD CONSTRAINT `fkOrderID` FOREIGN KEY (`orderID`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkProductID` FOREIGN KEY (`productID`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fkBrandProduct` FOREIGN KEY (`brandID`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkCategoryProduct` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkTypeProduct` FOREIGN KEY (`typeID`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


--
-- Метаданные
--
USE `phpmyadmin`;

--
-- Метаданные для таблицы brand
--

--
-- Метаданные для таблицы category
--

--
-- Метаданные для таблицы customer
--

--
-- Метаданные для таблицы order
--

--
-- Метаданные для таблицы orderProduct
--

--
-- Метаданные для таблицы product
--

--
-- Метаданные для таблицы type
--

--
-- Метаданные для базы данных shop
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
