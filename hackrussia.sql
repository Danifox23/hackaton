-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 20 2016 г., 07:40
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hackrussia`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Part`
--

CREATE TABLE IF NOT EXISTS `Part` (
  `id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vol_id` int(11) DEFAULT NULL,
  `date_edit` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `spot_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Part`
--

INSERT INTO `Part` (`id`, `status_id`, `user_id`, `vol_id`, `date_edit`, `date`, `spot_id`) VALUES
(1, 1, 6, 3, 0, 0, 1),
(2, 3, 6, 3, 87436487, 23432424, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Position`
--

CREATE TABLE IF NOT EXISTS `Position` (
  `id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `restraunt_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `date_edit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Position`
--

INSERT INTO `Position` (`id`, `part_id`, `name`, `quantity`, `restraunt_id`, `date`, `date_edit`) VALUES
(1, 1, 'Куриная грудка', 5, 6, 1479573410, 1479573410);

-- --------------------------------------------------------

--
-- Структура таблицы `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Role`
--

CREATE TABLE IF NOT EXISTS `Role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(1, 'Администратор'),
(2, 'Волонтёр'),
(3, 'Заведение');

-- --------------------------------------------------------

--
-- Структура таблицы `Spot`
--

CREATE TABLE IF NOT EXISTS `Spot` (
  `id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `Spot`
--

INSERT INTO `Spot` (`id`, `address`) VALUES
(1, 'аыва'),
(2, 'ваыаыва'),
(3, 'аыаываыва');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`, `color`) VALUES
(1, 'Принято', 'ct-azure-s'),
(2, 'В пути', 'ct-green-s'),
(3, 'Завершён', 'ct-orange-s'),
(4, 'Свободна', 'ct-red-s'),
(5, 'В пункте выдачи', 'ct-green-s');

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`id`, `name`, `email`, `phone`, `address`, `password`, `role_id`, `rating`, `date`) VALUES
(1, 'Ресторан у Витали', 'a@m.ru', '89091861277', 'Адресс', '202cb962ac59075b964b07152d234b70', 2, 0, 0),
(2, 'adm', '123', '123', '123', '$2y$13$dGLKGXXq8GpdxTYLWtxw5OCu.FDvHsJup2M7QhNZ7aNe9AUWCh3X.', 1, 60, 0),
(3, 'Иван Петрович', '5', '5', '5', '$2y$13$8R8BjgORvEFXTwyx2Cc88OZDN9j5DLlNe8fXre4RRzC7ca3moD5u6', 2, 0, 0),
(4, 'ghjg', 'ghjg', 'jhgjhg', 'jhgjhgjhg', '$2y$13$c5V./7A9miVWwtO4A7scaeei52nNdBekxZfz.EqAB/0wy0TREzNLq', 1, 0, 0),
(5, 'hhhhh', 'hhh', 'hhh', 'hhhh', '$2y$13$0V.NfKQpGuYUAlCKoRPKpu1Y9Jq6IzziX9FHiAaZl2b9tO8XJShn2', 3, 0, 0),
(6, 'Ресторан Григорий', 'email@mail.ru', '89091861277', 'Тюмень пролетарская 116', '$2y$13$f/DELLiGrIx5CX96D2M4velTbeOnEOtEQY8d1O9xPwJik/NhZLjuC', 3, 0, 0),
(7, 'Забегаловка', 'ываыва', '23423423422', 'Митилёво 29 корпус 5', '5', 2, 100, 100);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Part`
--
ALTER TABLE `Part`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vol_id` (`vol_id`),
  ADD KEY `spot_id` (`spot_id`);

--
-- Индексы таблицы `Position`
--
ALTER TABLE `Position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_id` (`part_id`),
  ADD KEY `restraunt_id` (`restraunt_id`);

--
-- Индексы таблицы `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Spot`
--
ALTER TABLE `Spot`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD UNIQUE KEY `user_id` (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Part`
--
ALTER TABLE `Part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `Position`
--
ALTER TABLE `Position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Role`
--
ALTER TABLE `Role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Spot`
--
ALTER TABLE `Spot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Part`
--
ALTER TABLE `Part`
  ADD CONSTRAINT `part_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `part_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `part_ibfk_4` FOREIGN KEY (`vol_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `part_ibfk_5` FOREIGN KEY (`spot_id`) REFERENCES `Spot` (`id`);

--
-- Ограничения внешнего ключа таблицы `Position`
--
ALTER TABLE `Position`
  ADD CONSTRAINT `position_ibfk_2` FOREIGN KEY (`part_id`) REFERENCES `Part` (`id`),
  ADD CONSTRAINT `position_ibfk_3` FOREIGN KEY (`restraunt_id`) REFERENCES `User` (`id`);

--
-- Ограничения внешнего ключа таблицы `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `Role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
