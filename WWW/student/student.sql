-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?12 �?21 �?03:12
-- 服务器版本: 5.5.53
-- PHP 版本: 7.0.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `student`
--

-- --------------------------------------------------------

--
-- 表的结构 `student_xinxi`
--

CREATE TABLE IF NOT EXISTS `student_xinxi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xingming` varchar(10) DEFAULT NULL,
  `xuehao` varchar(20) DEFAULT NULL,
  `youxiang` varchar(40) DEFAULT NULL,
  `jinqian` decimal(10,0) DEFAULT NULL,
  `touxiang` varchar(40) DEFAULT NULL,
  `jianjie` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `student_xinxi`
--

INSERT INTO `student_xinxi` (`id`, `xingming`, `xuehao`, `youxiang`, `jinqian`, `touxiang`, `jianjie`) VALUES
(1, '1', '2', '897665461@qq.com', '76', '21', '1'),
(2, '1', '2', '897665461@qq.com', '76', '21', '1'),
(3, '1', '2', '897665461@qq.com', '76', '21', '1'),
(4, '7', '78', '897665461@qq.com', '8', '21', '89789'),
(5, '45', '45', '897665461@qq.com', '32', '', '43'),
(6, '23', '213', '897665461@qq.com', '213', '', '213123'),
(7, '*/', '/', '897665461@qq.com', '8', '', '8'),
(8, '*/', '/', '897665461@qq.com', '8', '', '8'),
(9, '*/', '/', '897665461@qq.com', '8', '', '8'),
(10, '*/', '/', '897665461@qq.com', '8', '', '8'),
(14, '5', '5', '897665461@qq.com', '100', '', '55555'),
(15, '2', '2', '897665461@qq.com', '8', '', '98'),
(16, '0', '0', '897665461@qq.com', '0', '', '-'),
(17, '45', '45', '897665461@qq.com', '32', '', '76'),
(18, '45', '45', '897665461@qq.com', '32', '', '76'),
(19, '99', '99', '897665461@qq.com', '99', '', '99'),
(20, '99', '99', '897665461@qq.com', '99', '', '99'),
(21, '99', '99', '897665461@qq.com', '99', '', '99'),
(22, '99', '99', '897665461@qq.com', '99', '', '99'),
(23, '99', '99', '897665461@qq.com', '99', '', '99'),
(24, '', '', '', '0', '', ''),
(25, '', '', '', '0', '', ''),
(26, '8', '8', '897665461@qq.com', '8', '', '8');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
