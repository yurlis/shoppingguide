-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Квт 24 2022 р., 19:31
-- Версія сервера: 5.7.37-log
-- Версія PHP: 7.4.29

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `yurylisovsky4`
--

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--



--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`
id`,
`name
`, `category_id`, `measure_id`, `picture_id`) VALUES
(7, 'Microwave oven LG-1', 1, 1, 9),
(8, 'Vacuum cleaner Samsung TM-2003', 1, 1, 10),
(9, 'Washing machine LG CXKF-1924', 1, 1, 11),
(10, 'DYSON hair dryer - 9', 1, 1, 12),
(11, 'Refrigerator SAMSUNG SDFLK-9908', 1, 1, 13),
(12, 'NIVEA for MEN shower gel', 5, 4, 14),
(13, 'SARMA detergent', 5, 3, 15),
(14, 'Natura Siberica Oblepikha Professional Styling Spray', 5, 4, 16),
(15, 'Natura Siberica Oblepikha Professional Shampoo', 5, 4, 17),
(16, 'Nivea for Men Shampoo', 5, 4, 18),
(17, 'Wooden chair \"Naples\"', 2, 1, 19),
(18, 'Bar stool \"Valerie\"', 2, 1, 20),
(19, 'Ikea ​​armchair', 2, 1, 21),
(20, 'Simple kitchen table \"Cadiz\"', 2, 1, 22),
(21, 'Bedside table \"Aqua Rodos\"', 2, 1, 23),
(22, 'Smetana \"Prostokvashino\" 15%', 3, 4, 24),
(23, 'Russian Cheese\"Como\" 45%', 3, 3, 25),
(24, 'Russian cheese \"Novgorod-Siversky\" 50%', 3, 3, 26),
(25, 'Black bread \"Kievkhleb\"', 3, 3, 27),
(26, 'Black bread \"Super toast\"', 3, 3, 28),
(27, 'Gypsum plasterboard ceiling', 4, 1, 29),
(28, 'Professional flooring PK-1', 4, 1, 30),
(29, 'Cement Heidelberg M400', 4, 2, 31),
(30, 'Cument Heidelberg M-500', 4, 2, 32),
(31, 'Putty \"Isogypsum\"', 4, 2, 33),
(32, 'Wall drywall', 4, 1, 29),
(33, 'tea ahmed', 1, 3, 17);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
ADD PRIMARY KEY
(`id`),
ADD UNIQUE KEY `id`
(`id`,`name`),
ADD UNIQUE KEY `id_2`
(`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
