-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2013 at 10:16 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postTitle` varchar(255) NOT NULL DEFAULT 'My Post',
  `postContent` text NOT NULL,
  `lastModified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postDate`, `postTitle`, `postContent`, `lastModified`) VALUES
(1, '2013-05-15 16:18:29', 'Sample Post', 'This is a post sample that consist of <h1> H1 tags </h1> <p> p tag </p> <a href="http://google.ca"> a tag </a> and an image tag from thecodinglove.com <img alt="" src="http://i.minus.com/iXajjBGYza7mI.gif" />', '2013-05-15 16:18:29'),
(2, '2013-05-15 16:41:43', 'This is Post 2', 'Just another sample', '2013-05-15 16:41:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
