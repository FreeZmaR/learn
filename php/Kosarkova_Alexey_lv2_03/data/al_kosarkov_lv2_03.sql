-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 22 2017 г., 15:16
-- Версия сервера: 5.7.16-log
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `al_kosarkov_lv2_03`
--

-- --------------------------------------------------------

--
-- Структура таблицы `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `img_small` varchar(45) NOT NULL,
  `img_big` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `foto`
--

INSERT INTO `foto` (`id`, `title`, `img_small`, `img_big`) VALUES
(1, 'Синие Небо', 'img/small/small_1.jpg', 'img/big/big_1.jpg'),
(2, 'Закат Над Рекой', 'img/small/small_2.jpg', 'img/big/big_2.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
