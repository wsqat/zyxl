-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 04 月 21 日 04:46
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `liuyan`
--

-- --------------------------------------------------------

--
-- 表的结构 `liuyans`
--

CREATE TABLE IF NOT EXISTS `liuyans` (
  `liuyan_id` int(8) NOT NULL AUTO_INCREMENT,
  `liuyan_yxdm` varchar(20) NOT NULL,
  `liuyan_title` varchar(50) NOT NULL,
  `liuyan_name` varchar(50) NOT NULL,
  `liuyan_content` varchar(255) NOT NULL,
  `liuyan_time` date NOT NULL,
  `reply_name` varchar(50) DEFAULT NULL,
  `reply_content` varchar(255) DEFAULT NULL,
  `reply_time` date DEFAULT NULL,
  `is_reply` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`liuyan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `liuyans`
--

INSERT INTO `liuyans` (`liuyan_id`, `liuyan_yxdm`, `liuyan_title`, `liuyan_name`, `liuyan_content`, `liuyan_time`, `reply_name`, `reply_content`, `reply_time`, `is_reply`) VALUES
(1, '1111', '', '111', '111', '2015-03-03', 'admin', 'fsdfds', '2015-04-21', 1),
(2, 'dasd', '', 'dasd', 'dasds', '2015-04-03', 'sad', 'sad', '2015-04-03', 1),
(3, '2222', '的说法', '发生的发生', '说法', '0000-00-00', NULL, NULL, NULL, 0),
(4, '2222', '的说法', '发生的发生', '说法', '0000-00-00', NULL, NULL, NULL, 0),
(5, '2222', '的说法', '发生的发生', '说法', '0000-00-00', '22', '2222', NULL, 0),
(6, '2222', '11', '11', '11', '0000-00-00', NULL, NULL, NULL, 0),
(7, '1111', '11', '11', '11', '0000-00-00', 'admin', '都是该死的', '2015-04-06', 1),
(9, '1111', '的说法', '佛挡杀佛', '似懂非懂', '0000-00-00', 'admin', '', '2015-04-06', 1),
(10, '1111', '发士大夫', '房顶上', '发生DVD是', '0000-00-00', 'admin', '健康和健康 ', '2015-04-06', 1),
(13, '3333', '大神vds', '速度', '的说法', '0000-00-00', 'keda', 'dasdada', '2015-04-21', 1),
(15, '3333', '123', '321', '123', '2015-04-06', 'keda', 'dasdasda', '2015-04-21', 1),
(17, '1111', '是的发生大', '的说法都是', '9800', '2015-04-06', 'admin', '的说法', '2015-04-06', 1),
(20, '2222', '123', '123', '123', '2015-04-17', 'anda', '123', '2015-04-17', 1),
(18, '1111', '是打发的说', '的说法', '发的说法', '2015-04-06', NULL, NULL, NULL, 0),
(19, '1111', '撒发达', '是打发', '是打发', '2015-04-06', NULL, NULL, NULL, 0),
(21, '1111', '4141', '4134', 'ttttttt', '2015-04-21', 'admin', 'hhhhhh', '2015-04-21', 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pw` varchar(50) NOT NULL,
  `user_yxdm` varchar(10) NOT NULL,
  `user_dsdm` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pw`, `user_yxdm`, `user_dsdm`) VALUES
(1, 'admin', '123456', '1111', ''),
(2, 'anda', '123456', '2222', ''),
(3, 'keda', '123456', '3333', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
