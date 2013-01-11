-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2013 at 05:54 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u946015410_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) CHARACTER SET cp1250 COLLATE cp1250_czech_cs NOT NULL,
  `text` text CHARACTER SET cp1250 COLLATE cp1250_czech_cs NOT NULL,
  `authorid` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `authorid`, `date`) VALUES
(11, 'Article Title 1', '                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel arcu velit. Cras nec tempus metus. Suspendisse ut diam ut metus lobortis fermentum id in risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus viverra nibh a velit iaculis egestas. Proin in dapibus lacus. Donec id vulputate nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut non justo eu quam pellentesque dignissim ac vitae nulla. In dui justo, vulputate id sagittis ut, sollicitudin nec risus. Sed tincidunt gravida lorem in ullamcorper. Donec laoreet tincidunt arcu, eu accumsan sapien condimentum nec. Cras vel nisi ut libero aliquet tincidunt id nec diam.\r\n\r\nPellentesque elit orci, egestas quis tempus ac, auctor in risus. Vestibulum non ipsum a risus malesuada ullamcorper. Cras sollicitudin ultricies justo vulputate tempor. In id sem odio, pellentesque facilisis elit. Pellentesque id nisi neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut vel nibh quam, eu imperdiet felis. Sed odio erat, luctus a varius sit amet, vehicula a dolor. Sed id dui purus, id fringilla quam. Duis at tortor eget eros consectetur vestibulum non ac magna.                		', 1, '2012-12-22'),
(12, 'Article Title 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel arcu velit. Cras nec tempus metus. Suspendisse ut diam ut metus lobortis fermentum id in risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus viverra nibh a velit iaculis egestas. Proin in dapibus lacus. Donec id vulputate nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut non justo eu quam pellentesque dignissim ac vitae nulla. In dui justo, vulputate id sagittis ut, sollicitudin nec risus. Sed tincidunt gravida lorem in ullamcorper. Donec laoreet tincidunt arcu, eu accumsan sapien condimentum nec. Cras vel nisi ut libero aliquet tincidunt id nec diam.\r\n\r\nPellentesque elit orci, egestas quis tempus ac, auctor in risus. Vestibulum non ipsum a risus malesuada ullamcorper. Cras sollicitudin ultricies justo vulputate tempor. In id sem odio, pellentesque facilisis elit. Pellentesque id nisi neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut vel nibh quam, eu imperdiet felis. Sed odio erat, luctus a varius sit amet, vehicula a dolor. Sed id dui purus, id fringilla quam. Duis at tortor eget eros consectetur vestibulum non ac magna.                ', 1, '2012-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) CHARACTER SET cp1250 COLLATE cp1250_czech_cs NOT NULL,
  `link` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `menu`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `authorid` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `title`, `content`, `authorid`, `created_at`, `updated_at`) VALUES
(1, 'About Me tea', 'Hi, this page will descript about me		', 1, '2012-12-22', '2012-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `pollanswers`
--

CREATE TABLE IF NOT EXISTS `pollanswers` (
  `poll_answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `answer` varchar(25) NOT NULL,
  PRIMARY KEY (`poll_answer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pollanswers`
--

INSERT INTO `pollanswers` (`poll_answer_id`, `poll_id`, `answer`) VALUES
(1, 1, 'Nasi goreng');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `answer1` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `answer2` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `answer3` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `active` enum('No','Yes') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `question`, `answer1`, `answer2`, `answer3`, `active`) VALUES
(1, 'Makan apa ya enaknya malam ini ?', 'Nasi goreng', 'Ikan Bakar', 'Warteg X', 'Yes'),
(2, 'Bahasa Pemograman Apa yang Kamu Suka', 'PHP', 'Javascript', 'Java', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `authorid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`authorid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`authorid`, `username`, `password`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com'),
(3, 'testing', '96c892a3d2d171c2c7477cb0aebeb0c4', 'atang@gmail.com');
