-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 23 2017 г., 15:00
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `al_kosarkov_06`
--

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `name` varchar(12) NOT NULL,
  `big_size` varchar(64) NOT NULL,
  `small_size` varchar(64) NOT NULL,
  `view` int(5) NOT NULL,
  `date` date NOT NULL,
  `info` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `user_id`, `name`, `big_size`, `small_size`, `view`, `date`, `info`) VALUES
(12, 8, 'unknow', 'img/bez_nazvaniya.jpg', 'img/small/bez_nazvaniya.jpg', 5, '2017-01-19', '1.sahdj'),
(13, 9, 'Ляпота', 'img/bez_nazvaniya1.jpg', 'img/small/bez_nazvaniya1.jpg', 2, '2017-01-19', '123\n324kdshk'),
(15, 8, 'unknow', 'img/bdd4190dd6a854fa96d754a6b1800617.jpg', 'img/small/bdd4190dd6a854fa96d754a6b1800617.jpg', 8, '2017-01-20', 'Test Inform');

-- --------------------------------------------------------

--
-- Структура таблицы `recall`
--

CREATE TABLE `recall` (
  `id` int(11) NOT NULL,
  `name` varchar(5) NOT NULL,
  `photo_id` int(5) NOT NULL,
  `text` varchar(256) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `recall`
--

INSERT INTO `recall` (`id`, `name`, `photo_id`, `text`, `date`) VALUES
(1, 'fktrc', 15, 'dsfsdfs', '2017-01-23'),
(2, 'guest', 15, 'dsfsdfdg', '2017-01-23'),
(6, 'fktrc', 13, 'dsfsd', '2017-01-23'),
(7, 'guest', 13, 'Река', '2017-01-23');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(8, 'Guest'),
(9, 'Alex');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `recall`
--
ALTER TABLE `recall`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `recall`
--
ALTER TABLE `recall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
