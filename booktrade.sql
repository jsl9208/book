-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 10 日 12:09
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `booktrade`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `bookinfo`
--

CREATE TABLE IF NOT EXISTS `bookinfo` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` float(6,2) NOT NULL DEFAULT '0.00',
  `owner` varchar(100) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `createdate` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `press` varchar(100) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `bookinfo`
--

INSERT INTO `bookinfo` (`bookid`, `name`, `price`, `owner`, `ownerid`, `createdate`, `image`, `author`, `ISBN`, `press`) VALUES
(1, '精通正则表达式', 89.00, 'jsl', 2, 0, '', 'Jeffrey E.F. Friedl', '978-7-121-17501-5', '电子工业出版社'),
(2, 'HTTP权威指南', 109.00, 'jsl9208', 1, 0, '', 'David', 'xxx', '人民邮电出版社');

-- --------------------------------------------------------

--
-- 表的结构 `tradeinfo`
--

CREATE TABLE IF NOT EXISTS `tradeinfo` (
  `bookname` varchar(100) NOT NULL,
  `tradeid` int(11) NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `ownerid` int(11) NOT NULL,
  `buyer` varchar(100) NOT NULL,
  `buyerid` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `createdate` int(11) NOT NULL,
  `price` float(6,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`tradeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tradeinfo`
--

INSERT INTO `tradeinfo` (`bookname`, `tradeid`, `bookid`, `owner`, `ownerid`, `buyer`, `buyerid`, `state`, `createdate`, `price`) VALUES
('精通正则表达式', 1, 1, 'jsl', 2, 'jsl9208', 1, 1, 0, 89.00);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(1, 'jsl9208', 'abc'),
(2, 'jsl', 'abc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
