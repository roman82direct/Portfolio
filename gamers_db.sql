-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Дек 06 2020 г., 00:21
-- Версия сервера: 8.0.19
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gamers_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_basket` int NOT NULL,
  `id_user` int NOT NULL,
  `id_good` int NOT NULL,
  `price` double DEFAULT NULL,
  `is_in_order` tinyint DEFAULT NULL,
  `id_order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id_basket`, `id_user`, `id_good`, `price`, `is_in_order`, `id_order`) VALUES
(44, 3, 1, 100, NULL, 9),
(84, 9, 2, 90, NULL, 5),
(85, 9, 1, 100, NULL, 5),
(86, 9, 4, 120, NULL, 5),
(87, 9, 3, 110, NULL, 5),
(88, 9, 1, 100, NULL, 6),
(89, 9, 2, 90, NULL, 6),
(90, 9, 3, 110, NULL, 6),
(91, 9, 1, 100, NULL, 7),
(92, 9, 4, 120, NULL, 7),
(93, 4, 1, 100, NULL, 8),
(94, 4, 2, 90, NULL, 8),
(95, 4, 3, 110, NULL, 8),
(96, 3, 1, 100, NULL, 9),
(97, 3, 2, 90, NULL, 9),
(98, 12, 1, 100, NULL, 10),
(99, 12, 2, 90, NULL, 10),
(100, 12, 3, 110, NULL, 10),
(103, 13, 1, 100, NULL, 11),
(104, 13, 2, 90, NULL, 11),
(105, 13, 3, 110, NULL, 11),
(106, 13, 4, 120, NULL, 11),
(112, 9, 1, 100, NULL, 12),
(113, 9, 5, 105, NULL, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL,
  `status` int DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_good` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double DEFAULT NULL,
  `catalogImg` text NOT NULL,
  `discription` text NOT NULL,
  `id_category` int DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `name`, `price`, `catalogImg`, `discription`, `id_category`, `status`) VALUES
(1, 'Assassins CREED', 150, 'Assasin.jpg', 'The plot is set in a fictional history of real world events and follows the centuries-old struggle between the Assassins, who fight for peace with free will, and the Templars, who desire peace through control. The story is set in the mid-18th century during the Seven Years\' War, and follows Shay Patrick Cormac, an Assassin-turned-Templar who hunts down former members of his Brotherhood after being betrayed by them. Gameplay in Rogue is very similar to that of Black Flag with a mixture of ship-based naval exploration and third-person land-based exploration with some new features.', NULL, NULL),
(2, 'Tomb Rider', 105, 'tombrider.jpg', 'The plot is set in a fictional history of real world events and follows the centuries-old who fight for peace with free will, and the Templars, who desire peace through control.', NULL, NULL),
(3, 'World Of Tanks', 110, 'galwoft.png', 'The plot is set in a fictional history of real world events and follows the centuries-old struggle between', NULL, NULL),
(4, 'Call Of Duty', 120, 'galcallofd.png', 'The plot is set in a fictional history of real world events and follows the centuries-old struggle between the, who fight for peace with free will, and the Templars, who desire peace through control. The story is set in the mid-18th century during the Seven Years\' War, and follows Shay Patrick Cormac', NULL, NULL),
(5, 'HITMAN', 105, 'simhit.png', 'The plot is set in a fictional history of real world events and follows the centuries-old struggle between the Assassins, who fight for peace with free will, and the Templars, who desire peace through control. The story is set in the mid-18th century during the Seven Years\' War, and follows Shay Patrick Cormac, an Assassin-turned-Templar who hunts down former members of his Brotherhood after being betrayed by them. Gameplay in Rogue is very similar to that of Black Flag with a mixture of ship-based naval exploration and third-person land-based exploration with some new features.', NULL, NULL),
(6, 'World of Warships', 130, 'galWorld_of_Warships.png', '', NULL, NULL),
(7, 'Ryse', 110, 'ryse.jpg', 'The plot is set in a fictional history of real world events and follows the centuries-old struggle between the Assassins, who fight for peace with free will, and the Templars, who desire peace through control. The story is set in the mid-18th century during the Seven Years\' War, and follows Shay Patrick Cormac, an Assassin-turned-Templar who hunts down former members of his Brotherhood after being betrayed by them. Gameplay in Rogue is very similar to that of Black Flag with a mixture of ship-based naval exploration and third-person land-based exploration with some new features.', NULL, NULL),
(8, 'Battlefield 1', 130, 'galbattfield1.png', 'The plot is set in a fictional history of real world events and follows the centuries-old struggle between the Assassins, who fight for peace with free will, and the Templars, who desire peace through control. The story is set in the mid-18th century during the Seven Years\' War, and follows Shay Patrick Cormac, an Assassin-turned-Templar who hunts down former members of his Brotherhood after being betrayed by them. Gameplay in Rogue is very similar to that of Black Flag with a mixture of ship-based naval exploration and third-person land-based exploration with some new features.', NULL, NULL),
(11, 'Battlefront II', 125, 'galbatfr.png', 'dsgbgvdsfbdfgbgb', NULL, NULL),
(24, 'Battlefield 4', 145, 'galbatfi4.png', 'The plot is set in a fictional history of real world events and follows the centuries-old struggle between the Assassins, who fight for peace with free will, and the Templars, who desire peace through control. The story is set in the mid-18th century during the Seven Years\' War, and follows Shay Patrick Cormac, an Assassin-turned-Templar who hunts down former members of his Brotherhood after being betrayed by them. Gameplay in Rogue is very similar to that of Black Flag with a mixture of ship-based naval exploration and third-person land-based exploration with some new features.', NULL, NULL),
(25, 'for honor', 120, 'galhonor.png', 'The plot is set in a fictional history of real world events and follows the centuries-old struggle between the Assassins, who fight for peace with free will, and the Templars, who desire peace through control. The story is set in the mid-18th century during the Seven Years\' War, and follows Shay Patrick Cormac, an Assassin-turned-Templar who hunts down former members of his Brotherhood after being betrayed by them. Gameplay in Rogue is very similar to that of Black Flag with a mixture of ship-based naval exploration and third-person land-based exploration with some new features.', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `id_user` int NOT NULL,
  `amount` double DEFAULT NULL,
  `datetime_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_order_status` int DEFAULT NULL,
  `destination` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `amount`, `datetime_create`, `id_order_status`, `destination`) VALUES
(5, 9, 420, '2020-11-23 23:27:25', 1, ''),
(6, 9, 300, '2020-11-24 10:29:00', 1, ''),
(7, 9, 220, '2020-11-24 10:29:20', 1, 'Москва'),
(8, 4, 300, '2020-11-24 10:30:39', 1, 'Moscow'),
(9, 3, 290, '2020-11-24 10:31:48', 1, 'City'),
(10, 12, 300, '2020-11-24 11:23:33', 1, 'SPB'),
(11, 13, 420, '2020-11-24 21:59:22', 1, 'Tver'),
(12, 9, 205, '2020-11-24 23:58:19', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id_order_status` int NOT NULL,
  `order_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id_order_status`, `order_status_name`) VALUES
(1, 'сформирован'),
(2, 'отправлен');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(60) DEFAULT NULL,
  `user_last_action` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_login`, `user_password`, `user_last_action`) VALUES
(3, 'roman', 'roman', '202cb962ac59075b964b07152d234b70', NULL),
(4, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', NULL),
(9, 'User_1', '1', 'c4ca4238a0b923820dcc509a6f75849b', NULL),
(12, 'User_2', '2', 'c81e728d9d4c2f636f067f89cc14862c', NULL),
(13, 'Test', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', NULL),
(14, '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL),
(15, '', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int NOT NULL,
  `id_user` int NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `id_user`, `id_role`) VALUES
(2, 9, 1),
(3, 4, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_good`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_order_status`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_good` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_order_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
