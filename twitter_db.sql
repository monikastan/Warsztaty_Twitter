-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 13 Paź 2016, 21:56
-- Wersja serwera: 5.5.50-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `twitter_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `creationDate` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `tweetId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `tweetId` (`tweetId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=41 ;

--
-- Zrzut danych tabeli `Comment`
--

INSERT INTO `Comment` (`id`, `text`, `creationDate`, `userId`, `tweetId`) VALUES
(1, 'to jest moj 1 komentarz', '2016-10-11 22:40:28', 21, 11),
(2, 'to jest moj 1 komentarz', '2016-10-11 22:40:47', 21, 11),
(3, 'to jest moj komentarz', '2016-10-11 22:41:36', 12, 2),
(8, 'Insert your comment', '2016-10-11 23:50:25', 22, 28),
(9, 'Insert your comment', '2016-10-11 23:51:32', 22, 28),
(10, 'Insert your comment', '2016-10-11 23:56:49', 22, 28),
(11, 'Insert your comment', '2016-10-11 23:56:57', 22, 28),
(12, 'Insert your comment', '2016-10-11 23:57:09', 22, 29),
(13, 'Insert your comment', '2016-10-11 23:58:21', 22, 29),
(14, 'Insert your comment', '2016-10-11 23:58:24', 22, 29),
(15, 'Insert your comment', '2016-10-11 23:58:26', 22, 29),
(16, 'Insert your comment', '2016-10-11 23:58:50', 22, 29),
(17, 'Insert your comment', '2016-10-11 23:58:53', 22, 29),
(18, 'Insert your comment', '2016-10-12 00:07:09', 22, 29),
(19, 'Insert your comment', '2016-10-12 00:07:43', 22, 29),
(20, 'Insert your comment', '2016-10-12 00:08:40', 22, 29),
(21, 'Insert your comment', '2016-10-12 00:10:38', 22, 29),
(22, 'Insert your comment', '2016-10-12 00:10:38', 22, 29),
(23, 'Insert your comment', '2016-10-12 00:12:09', 22, 28),
(24, 'Insert your comment', '2016-10-12 00:12:13', 22, 28),
(25, 'Insert your comment', '2016-10-12 00:12:20', 22, 28),
(26, 'Insert your comment', '2016-10-12 00:12:43', 22, 28),
(27, 'Insert your comment', '2016-10-12 00:12:46', 22, 28),
(28, 'Insert your comment', '2016-10-12 00:12:56', 22, 28),
(29, 'to jest kmentarz do tweeta Ali :)', '2016-10-12 17:38:42', 36, 26),
(30, 'Ala, niestety nie zgadzam siÄ™ z TobÄ… ;)', '2016-10-12 22:51:29', 36, 30),
(40, 'bla', '2016-10-12 23:55:38', 36, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senderUserId` int(11) NOT NULL,
  `recipientUserId` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `is_read` bit(1) NOT NULL DEFAULT b'0',
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `senderUserId` (`senderUserId`),
  KEY `recipientUserId` (`recipientUserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `Messages`
--

INSERT INTO `Messages` (`id`, `senderUserId`, `recipientUserId`, `text`, `is_read`, `creationDate`) VALUES
(1, 36, 36, 'message', b'1', '2016-10-12 23:49:35'),
(2, 36, 36, 'drugi message', b'1', '2016-10-12 23:50:40'),
(3, 36, 36, 'trzeci', b'1', '2016-10-12 23:51:01'),
(4, 36, 12, 'czwarty', b'1', '2016-10-12 23:52:39');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tweet`
--

CREATE TABLE IF NOT EXISTS `Tweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=32 ;

--
-- Zrzut danych tabeli `Tweet`
--

INSERT INTO `Tweet` (`id`, `userId`, `text`, `creationDate`) VALUES
(1, 12, 'to jest moj pierwszy wpis', '2016-10-08 17:54:00'),
(2, 12, 'to jest moj drugi wpis', '2016-10-08 23:27:00'),
(3, 19, 'to jest wpis od 19', '2016-10-08 23:09:00'),
(4, 12, 'to jest juz trzeci wpis', '0000-00-00 00:00:00'),
(5, 17, 'to jest moj pierwszy wpis', '0000-00-00 00:00:00'),
(6, 21, 'to jest moj pierwszy wpis', '0000-00-00 00:00:00'),
(7, 21, 'to jest moj drugi wpis', '0000-00-00 00:00:00'),
(8, 21, 'to jest moj trzeci wpis', '2016-10-08 23:35:00'),
(9, 21, 'to jest moj trzeci wpis', '2016-10-08 23:35:00'),
(10, 21, 'to jest moj trzeci wpis', '2016-10-08 23:35:00'),
(11, 21, 'to jest moj trzeci wpis', '2016-10-08 23:35:00'),
(12, 21, 'to jest moj trzeci wpis', '2016-10-08 23:35:00'),
(13, 21, 'to jest moj trzeci wpis', '2016-10-08 23:35:00'),
(14, 21, 'to jest moj trzeci wpis', '2016-10-08 23:35:00'),
(15, 17, 'to jest moj kolejny wpis', '2016-10-08 23:55:45'),
(16, 17, 'to jest moj kolejny wpis', '2016-10-08 23:55:58'),
(17, 19, 'to jest moj kolejny wpis', '2016-10-09 12:18:38'),
(18, 19, 'to jest moj kolejny wpis', '2016-10-09 12:19:07'),
(19, 22, 'to jest moj kolejny wpis', '2016-10-11 19:28:47'),
(20, 22, 'to jest moj kolejny wpis', '2016-10-11 19:39:36'),
(21, 22, 'to jest moj kolejny wpis', '2016-10-11 19:40:17'),
(22, 22, 'to jest moj kolejny wpis', '2016-10-11 19:40:18'),
(23, 22, 'to jest moj kolejny wpis', '2016-10-11 19:40:19'),
(24, 22, 'to jest moj kolejny wpis', '2016-10-11 19:40:19'),
(25, 22, 'to jest moj kolejny wpis', '2016-10-11 19:40:19'),
(26, 22, 'to jest moj kolejny wpis', '2016-10-11 19:40:20'),
(27, 22, 'to jest moj kolejny wpis', '2016-10-11 19:40:21'),
(28, 22, 'Insert your tweet', '2016-10-11 19:50:05'),
(29, 22, 'Insert your tweet', '2016-10-11 20:45:41'),
(30, 22, 'moj kolejny komentarz', '2016-10-12 17:34:11'),
(31, 36, 'test\r\n', '2016-10-12 17:35:28');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `hashed_password` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=37 ;

--
-- Zrzut danych tabeli `Users`
--

INSERT INTO `Users` (`id`, `username`, `hashed_password`, `email`) VALUES
(1, 'myUser', '$2y$10$P1vXFVtnDxNfTOgUu1DXh.26Ef5xuO/jcJKHj562rMx6LWtFt56de', 'mail@mail.com'),
(12, 'Monika', '$2y$10$DsFLmM9blhq9xyU3Ol/fvudKzdkb9FkHm0XriYKsl5XgzxWuJUb6a', 'monika@mail.com'),
(17, 'Zosia', '$2y$10$6YcnVilAAHQ6SQWt0tvAMOOjlT50ZrzFIL.t/B73Dpmi9j3PD.Flm', 'zisia@coders.com'),
(19, 'Gosia', '$2y$10$FGC8deFbjFNxYyvhqPJqqu7K/CIHQrJMGRp3gqukIoih9Bg7ZZhFK', 'gosia@mail.com'),
(21, 'Lusia', '$2y$10$i6bokOS7xPVLrqZDdsdJsecFgkNQ7fJfCUZiPLdzG7PADieEFMXce', 'nowy@mail.com'),
(22, 'ala', '$2y$10$BbXVUj4XGqsju9w7vbvEgeCVGHDpPwekTVkcmB8YBJhPdjJbXslim', 'ala@ala.com'),
(29, 'bartek', '$2y$10$..s6EGIUm5SxosoqpQ8I4.F6Eso7e0y6vm6TBXLFQ/dYqkL79PLSq', 'bartek@bartek.com'),
(30, 'franio', '$2y$10$cuXM05DsPTDeXr9ugr2y0OBImD3kvrQvkHHmSrmVkhBnjpWUEKqDq', 'franio@fff.com'),
(32, 'basia', '$2y$10$1jH9razhcfE8EPPrMVkw4eIy6fT3fiwhuwiTbRu7RSy3.ZkomlCDi', 'basia@basia.com'),
(33, 'magda', '$2y$10$FTZxoPAFrcTFN/OAH6EbBu5Pai6LpTQuS8fIJcbVNFSWwhDs8vNNC', 'magda@mm.com'),
(34, 'Piotrek', '$2y$10$VIlCLXggGFz.zg1jPwKuPO5TYqtHTYUean7NkNScRLacBp5hJpPfG', 'piotr@piotr.com'),
(35, 'Krzysiek', '$2y$10$FHt.X5x28uT96iypx/pPZeUFXQ9EcZsNN/T.UCoerVjDUx6HnAv4e', 'krzys@krzys.com'),
(36, 'Bogulaw', '$2y$10$toY.jyppfqkYWCZ3PwHdcuHDKVgcC3blVNmmvVSnEAxG836Ioimxa', 'bogus@bogus.com');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`tweetId`) REFERENCES `Tweet` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`senderUserId`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`recipientUserId`) REFERENCES `Users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
