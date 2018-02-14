-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 �?02 �?10 �?12:17
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `image`
--

-- --------------------------------------------------------

--
-- 表的结构 `im`
--

CREATE TABLE IF NOT EXISTS `im` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tupian` varchar(30) DEFAULT NULL,
  `miaoshu` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `im`
--

INSERT INTO `im` (`id`, `tupian`, `miaoshu`) VALUES
(1, 'LRKsW7WoKB=.jpg', '111111111111111111111111111111'),
(2, 'LRKsW7WoLn=.jpg', '254254245'),
(8, 'link.jpg', '5'),
(7, '305848-smMFzv.jpg', '11'),
(9, 'link (1).jpg', '55'),
(10, 'LRKsW7WoKB= (1).jpg', '5'),
(11, 'LRKsW7WoKB=.jpg', '7'),
(12, 'LRKsW7WoLn=.jpg', '7'),
(13, 'LRKsW7WoLn=.jpg', '77'),
(14, 'link (2).jpg', '777'),
(15, 'link (1).jpg', '00000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
