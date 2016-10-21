-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2016 at 08:01 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twitter_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `Comment`
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
(40, 'bla', '2016-10-12 23:55:38', 36, 2),
(41, 'testowy komentarz', '2016-10-17 15:47:41', 37, 33),
(42, 'no comments\r\n', '2016-10-18 15:34:02', 37, 34),
(43, 'Insert your commenthvhjdkvdlsbkjlvbdj', '2016-10-18 15:37:50', 37, 33),
(44, 'Insert your commentfhjsdjlsajdjla', '2016-10-18 15:37:59', 37, 33),
(45, 'Insert your commentfhjsdjlsajdjla', '2016-10-18 15:42:56', 37, 33),
(46, 'bhskhas', '2016-10-18 15:43:06', 37, 33),
(47, 'fjkdhdkas', '2016-10-18 15:43:11', 37, 33),
(48, 'Insert your comment', '2016-10-18 22:17:56', 29, 34),
(49, 'Insert your comment', '2016-10-21 17:00:41', 45, 33),
(50, 'Insert your commentbjsbdsjbjsbjcsd', '2016-10-21 17:00:51', 45, 33),
(51, 'cbhjasvcbnx nxbhcvdsjhghcfgsjhdddddddddddddddddddddddBLJLLLLLLLLXNDCCCCCCCCCCCCCCCCCC', '2016-10-21 17:01:02', 45, 33),
(52, 'Insert your comment', '2016-10-21 19:02:39', 45, 35),
(53, 'Insert your comment', '2016-10-21 19:02:42', 45, 35),
(54, 'Insert your comment', '2016-10-21 19:02:44', 45, 35),
(55, 'Insert your comment', '2016-10-21 19:02:52', 45, 35),
(56, 'Insert your comment', '2016-10-21 19:12:52', 37, 36),
(57, 'Insert your comment', '2016-10-21 19:12:56', 37, 36),
(58, 'Insert your comment', '2016-10-21 19:13:29', 37, 38),
(59, 'Insert your comment', '2016-10-21 19:13:31', 37, 38);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senderUserId` int(11) NOT NULL,
  `recipientUserId` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `isRead` bit(1) NOT NULL DEFAULT b'0',
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `senderUserId` (`senderUserId`),
  KEY `recipientUserId` (`recipientUserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`id`, `senderUserId`, `recipientUserId`, `text`, `isRead`, `creationDate`) VALUES
(4, 36, 12, 'czwarty', b'0', '2016-10-12 23:52:39'),
(5, 29, 37, 'wiadomosc testowa', b'0', '2016-10-18 19:02:39'),
(6, 29, 37, 'Insert your message', b'0', '2016-10-18 19:03:28'),
(7, 29, 37, 'Insert your message123', b'0', '2016-10-18 19:03:33'),
(8, 29, 37, 'Insert your message32dsadsajhdjksah', b'1', '2016-10-18 19:03:38'),
(9, 29, 29, 'Insert your message', b'0', '2016-10-18 22:19:18'),
(10, 29, 29, 'Insert your message', b'0', '2016-10-18 22:19:20'),
(11, 29, 29, 'Insert your message', b'0', '2016-10-18 22:19:20'),
(12, 29, 22, 'Insert your message', b'0', '2016-10-18 22:19:36'),
(13, 29, 22, 'Insert your message', b'0', '2016-10-18 22:19:41'),
(14, 29, 22, 'Insert your message', b'0', '2016-10-18 22:19:44'),
(15, 29, 37, 'Insert your message', b'0', '2016-10-19 18:51:48'),
(16, 29, 37, 'Insert your message1', b'0', '2016-10-19 18:51:54'),
(17, 29, 37, 'Insert your message2', b'1', '2016-10-19 18:51:58'),
(18, 29, 37, 'wiadomosc testowa', b'0', '2016-10-19 19:02:16'),
(19, 29, 37, 'wiadomosc kolejna', b'1', '2016-10-19 19:02:40'),
(20, 36, 37, 'hjkshkcasbcjkbmxz', b'1', '2016-10-19 22:44:39'),
(21, 36, 37, 'Insert your messagebcjsabcjlasbdjkbsjb', b'0', '2016-10-19 22:44:51'),
(22, 42, 36, 'od marty do Boguslawa', b'0', '2016-10-20 15:52:03'),
(23, 42, 36, 'od marty do bogusia', b'0', '2016-10-20 15:52:12'),
(24, 36, 37, 'Hej Miska ;)', b'1', '2016-10-21 15:04:16'),
(25, 36, 37, 'Hej Miska ;)', b'0', '2016-10-21 15:06:20'),
(26, 36, 37, 'Hej Miska ;)', b'0', '2016-10-21 15:08:32'),
(27, 36, 37, 'Hej Miska ;)', b'1', '2016-10-21 15:09:13'),
(28, 45, 37, 'Insert your message', b'0', '2016-10-21 16:50:53'),
(29, 45, 37, 'Insert your message', b'0', '2016-10-21 16:51:33'),
(30, 45, 37, 'Insert your message', b'0', '2016-10-21 16:52:08'),
(31, 45, 37, 'Insert your message', b'1', '2016-10-21 16:57:08'),
(32, 45, 37, 'Insert your message', b'0', '2016-10-21 16:57:10'),
(33, 45, 37, 'Insert your message', b'0', '2016-10-21 16:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `Tweet`
--

CREATE TABLE IF NOT EXISTS `Tweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `creationDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `Tweet`
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
(31, 36, 'test\r\n', '2016-10-12 17:35:28'),
(32, 36, 'my tweet', '2016-10-17 14:48:59'),
(33, 37, 'my first tweet', '2016-10-17 15:00:56'),
(34, 37, 'my second tweet', '2016-10-17 15:05:33'),
(35, 45, 'Insert your tweet', '2016-10-21 19:02:22'),
(36, 45, 'Insert your tweet', '2016-10-21 19:02:26'),
(37, 37, 'Insert your tweet', '2016-10-21 19:13:21'),
(38, 37, 'Insert your tweet', '2016-10-21 19:13:25'),
(39, 37, 'Insert your tweet', '2016-10-21 19:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `hashed_password` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `hashed_password`, `email`) VALUES
(1, 'myUser', '$2y$10$P1vXFVtnDxNfTOgUu1DXh.26Ef5xuO/jcJKHj562rMx6LWtFt56de', 'mail@mail.com'),
(12, 'Monika', '$2y$10$DsFLmM9blhq9xyU3Ol/fvudKzdkb9FkHm0XriYKsl5XgzxWuJUb6a', 'monika@mail.com'),
(17, 'Zosia', '$2y$10$6YcnVilAAHQ6SQWt0tvAMOOjlT50ZrzFIL.t/B73Dpmi9j3PD.Flm', 'zisia@coders.com'),
(19, 'Gosia', '$2y$10$FGC8deFbjFNxYyvhqPJqqu7K/CIHQrJMGRp3gqukIoih9Bg7ZZhFK', 'gosia@mail.com'),
(21, 'Lusia', '$2y$10$i6bokOS7xPVLrqZDdsdJsecFgkNQ7fJfCUZiPLdzG7PADieEFMXce', 'nowy@mail.com'),
(22, 'ala', '$2y$10$BbXVUj4XGqsju9w7vbvEgeCVGHDpPwekTVkcmB8YBJhPdjJbXslim', 'ala@ala.com'),
(29, 'Bartek', '$2y$10$e8Jo1Z0dSbcYVtwL5wqPPO/uS7zUjx.UTq9xjQvKiklehCze1YnLW', 'bartek@bartek.com'),
(30, 'franio', '$2y$10$cuXM05DsPTDeXr9ugr2y0OBImD3kvrQvkHHmSrmVkhBnjpWUEKqDq', 'franio@fff.com'),
(32, 'basia', '$2y$10$1jH9razhcfE8EPPrMVkw4eIy6fT3fiwhuwiTbRu7RSy3.ZkomlCDi', 'basia@basia.com'),
(33, 'magda', '$2y$10$FTZxoPAFrcTFN/OAH6EbBu5Pai6LpTQuS8fIJcbVNFSWwhDs8vNNC', 'magda@mm.com'),
(34, 'Piotrek', '$2y$10$VIlCLXggGFz.zg1jPwKuPO5TYqtHTYUean7NkNScRLacBp5hJpPfG', 'piotr@piotr.com'),
(35, 'Krzys', '$2y$10$FHt.X5x28uT96iypx/pPZeUFXQ9EcZsNN/T.UCoerVjDUx6HnAv4e', 'krzys@krzys.com'),
(36, 'Bogulaw', '$2y$10$toY.jyppfqkYWCZ3PwHdcuHDKVgcC3blVNmmvVSnEAxG836Ioimxa', 'bogus@bogus.com'),
(37, 'Misia', '$2y$10$4gJEQIqHOqwXxvI5WO5Nx.QdiLRkB4PcWOD4R8lkEfyA6vfTcC79y', 'misia@misia.com'),
(41, 'daniel', '$2y$10$kkwOR4uv3zIHSZZ2Sxb7rubnwiJsm.qUlqmhWLCRGGYIwm5gZpqcK', 'daniel@daniel.com'),
(42, 'marta', '$2y$10$LYcjRXbTZK4ZbxvQVrEKt.1h8lGwhTTp1ZSFsXQK2BErrXjkRxi/m', 'marta@marta.com'),
(43, 'igor', '$2y$10$ZQhOMPwS71PcYmr3F6SYIOOpbMd6LMk9YeSwabWAvu9dNF/gKwkBG', 'igor@igor.com'),
(44, 'kamil', '$2y$10$vsTAyu6S57F5NUKsNVZvY.WnsonA/I79bRP4y8Ohp6fZS1nOewftK', 'kamil@kami.com'),
(45, 'Stefan', '$2y$10$aMrDzrvzr2wwZ0F4xo5VOuXMQH4TNzS1oGNmqZDpwh2XbpvYK5vLW', 'stefan@stefan.pl');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Comment_ibfk_2` FOREIGN KEY (`tweetId`) REFERENCES `Tweet` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`senderUserId`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`recipientUserId`) REFERENCES `Users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
