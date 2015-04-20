-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 20 2015 г., 11:08
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `display` varchar(10) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `name`, `iduser`, `width`, `height`, `display`, `body`) VALUES
(111, 'banner_Home', 1, 250, 200, 'block', '<img src="http://www.wddw.net/images/template-monster.gif">'),
(112, 'banner', 1, 750, 150, 'block', '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm-vkcrHB2DckzlyyxRy6KjZAfOlQCC2xKQMiWHIY4cmJ-KpE_Sw">'),
(113, 'banner', 1, 650, 580, 'block', '<a href="http://localhost/banner_admin" target="_blank"><img src="http://www.nakedart.ru/assets/images/graphic-portfolio/038_belgorod_listowka_big.jpg"></a>'),
(120, 'banner120', 1, 320, 200, 'block', '<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSJpubtIj06mIReOv0HQg4pMPh_Rp93CyB0xao3nGP2B_uNeQje" title="??????">'),
(121, 'banner_new', 1, 1170, 520, 'block', '<img src="http://demiart.ru/forum/uploads5/post-140144-1270552474.jpg">'),
(126, 'banner_cat', 1, 400, 270, 'block', '<img src="https://www.it-tv.org/img/main_inet.jpg">'),
(128, 'banner_code', 1, 1170, 100, 'none', '<code>function hello(){alert("Hello world!"};</code>'),
(139, 'banner', 1, 400, 270, 'block', '<img src="https://www.it-tv.org/img/main_inet.jpg">'),
(167, 'advertising banner', 1, 520, 310, 'block', '<img src="http://files3.adme.ru/files/news/part_6/62341/eldorado.jpg">'),
(168, 'banner_user1', 2, 450, 240, 'block', '<img src="http://www.seofly.kiev.ua/images/image/%D0%B1%D0%B0%D0%BD%D0%BD%D0%B5%D1%80%D1%8B.png">');

-- --------------------------------------------------------

--
-- Структура таблицы `banner_url`
--

CREATE TABLE IF NOT EXISTS `banner_url` (
`id` int(11) NOT NULL,
  `banner_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banner_url`
--

INSERT INTO `banner_url` (`id`, `banner_id`) VALUES
(1, 111),
(2, 112),
(3, 113),
(7, 120),
(13, 126),
(15, 128),
(21, 139),
(28, 167),
(48, 168);

-- --------------------------------------------------------

--
-- Структура таблицы `url`
--

CREATE TABLE IF NOT EXISTS `url` (
`id` int(11) NOT NULL,
  `page` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `url`
--

INSERT INTO `url` (`id`, `page`) VALUES
(1, 'index'),
(2, 'index'),
(3, 'search'),
(7, 'index'),
(8, 'category'),
(9, 'index'),
(10, 'index'),
(13, 'category'),
(15, 'templates'),
(19, 'index'),
(21, 'templates'),
(22, 'templates'),
(23, 'templates'),
(24, 'templates'),
(25, 'templates'),
(26, 'templates'),
(27, 'templates'),
(28, 'templates'),
(32, NULL),
(33, NULL),
(34, NULL),
(35, NULL),
(36, NULL),
(37, NULL),
(38, NULL),
(39, NULL),
(40, NULL),
(41, NULL),
(42, NULL),
(43, NULL),
(44, NULL),
(45, NULL),
(46, NULL),
(47, NULL),
(48, 'contact');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'user1', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
 ADD PRIMARY KEY (`id`), ADD KEY `banners_ibfk_1` (`iduser`);

--
-- Индексы таблицы `banner_url`
--
ALTER TABLE `banner_url`
 ADD KEY `id` (`id`), ADD KEY `banner_id` (`banner_id`);

--
-- Индексы таблицы `url`
--
ALTER TABLE `url`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT для таблицы `banner_url`
--
ALTER TABLE `banner_url`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT для таблицы `url`
--
ALTER TABLE `url`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `banners`
--
ALTER TABLE `banners`
ADD CONSTRAINT `banners_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `banner_url`
--
ALTER TABLE `banner_url`
ADD CONSTRAINT `banner_url_ibfk_1` FOREIGN KEY (`id`) REFERENCES `url` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `banner_url_ibfk_2` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
