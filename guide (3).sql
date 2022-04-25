-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 12 2020 г., 15:54
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `guide`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categorie`
--

INSERT INTO `categorie` (`id`, `name`) VALUES
(1, 'Бытовая техника'),
(2, 'Мебель'),
(3, 'Продуктовые товары'),
(5, 'Автозапчасти'),
(6, 'Хоз. товары');

-- --------------------------------------------------------

--
-- Структура таблицы `main`
--

CREATE TABLE `main` (
  `create_moment` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` varchar(255) NOT NULL,
  `shop_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `main`
--

INSERT INTO `main` (`create_moment`, `product_id`, `shop_id`, `price`, `quantity`, `user_id`) VALUES
('2020-04-11 16:56:40', '1', '', '55 руб', '1', 4),
('2020-04-11 17:01:34', '6', '', '10 000 руб', '1', 5),
('2020-04-12 12:03:16', '2', '', '1000 руб.', '1', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `measure`
--

CREATE TABLE `measure` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `normalise_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `measure`
--

INSERT INTO `measure` (`id`, `name`, `unit`, `normalise_unit`) VALUES
(1, 'шт.', '1 шт.', 1),
(2, 'кг.', '1 кг.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `picture`
--

INSERT INTO `picture` (`id`, `name`) VALUES
(1, 'sun.jpeg'),
(2, 'sun2.jpeg'),
(3, 'product-e7dca5fee67ba8ec1bc70a97f97f1da1.jpeg'),
(4, 'product-ba67fc0893457ec659a995d51324922c.png'),
(5, 'product-ba67fc0893457ec659a995d51324923c.png'),
(7, 'persil.jfif'),
(8, 'shkaf.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `measure_id`, `picture_id`) VALUES
(1, 'Батон \"Солнышко\"', 3, 1, 1),
(2, 'Порошок Persil', 6, 2, 7),
(6, 'Шкаф платяной', 2, 1, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `name`, `address`) VALUES
(1, 'Metro', 'ул. Правды, д. 47'),
(7, 'Пятерочка', 'Ленинский пр., д. 1');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `password`) VALUES
(4, 'Иван', '5553322', '0000'),
(5, 'Дамир', '9284058', '1234'),
(6, 'Юрий', '7778899', '9876');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`name`);

--
-- Индексы таблицы `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`create_moment`);

--
-- Индексы таблицы `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`name`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Индексы таблицы `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`phone`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `measure`
--
ALTER TABLE `measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
