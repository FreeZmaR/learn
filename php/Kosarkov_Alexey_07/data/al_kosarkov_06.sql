-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 26 2017 г., 15:32
-- Версия сервера: 5.7.16-log
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
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `item_id`, `date`) VALUES
(1, 18, 2, '2017-01-26'),
(2, 18, 2, '2017-01-26'),
(3, 18, 2, '2017-01-26'),
(4, 18, 2, '2017-01-26'),
(5, 18, 2, '2017-01-26'),
(6, 16, 4, '2017-01-26'),
(7, 16, 2, '2017-01-26'),
(8, 16, 2, '2017-01-26');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'basketball'),
(2, 'athletics'),
(3, 'other');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `img` varchar(64) NOT NULL,
  `img_show` varchar(64) DEFAULT 'non',
  `view` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `buy` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `category`, `price`, `name`, `img`, `img_show`, `view`, `date`, `buy`) VALUES
(1, 1, 2000, 'molten GL7', 'moltengl7.jpg', 'non', 16, '2017-01-25', 0),
(2, 1, 600, 'манекен для броска', 'dummy.jpg', 'non', 4, '2017-01-25', 0),
(3, 2, 700, 'лестница для ловкости', 'agility.jpg', 'show/ag_2.jpg', 4, '2017-01-25', 0),
(4, 3, 1200, 'TRX петли', 'trx.jpg', 'show/trx2.jpg', 1, '2017-01-25', 0);

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
(12, 8, 'unknow', 'img/bez_nazvaniya.jpg', 'img/small/bez_nazvaniya.jpg', 8, '2017-01-19', '1.sahdj'),
(13, 9, 'Ляпота', 'img/bez_nazvaniya1.jpg', 'img/small/bez_nazvaniya1.jpg', 5, '2017-01-19', '123\n324kdshk'),
(15, 8, 'unknow', 'img/bdd4190dd6a854fa96d754a6b1800617.jpg', 'img/small/bdd4190dd6a854fa96d754a6b1800617.jpg', 14, '2017-01-20', 'Test Inform'),
(16, 8, 'unknow', 'img/a55babc98a1d60f86788dc65665a7f04.png', 'img/small/a55babc98a1d60f86788dc65665a7f04.png', 1, '2017-01-25', NULL);

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
  `name` varchar(12) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `basket` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(45) NOT NULL DEFAULT 'avatar/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `password`, `date`, `basket`, `avatar`) VALUES
(8, 'Guest', '', '', '0000-00-00', 0, 'avatar/default.png'),
(9, 'Алексей', 'alex', '', '0000-00-00', 0, 'avatar/default.png'),
(16, 'Алексей', 'admin', '8cb2237d0679ca88db6464eac60da96345513964', '2017-01-25', 3, 'avatar/default.png'),
(18, 'Вовка', 'adm', '8cb2237d0679ca88db6464eac60da96345513964', '2017-01-26', 5, 'avatar/default.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `recall`
--
ALTER TABLE `recall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
