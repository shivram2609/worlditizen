-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2017 at 06:40 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wc`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` longtext COLLATE utf8_bin,
  `meta_title` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `meta_keyword` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `language_id`, `title`, `content`, `meta_title`, `meta_keyword`, `url`, `is_active`, `created`, `modified`) VALUES
(1, 1, 'fbgb', '<p>gbnh</p>', 'nfg', 'hh', 'hnghm', 1, '2017-10-05 12:38:03', '2017-10-05 12:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `slug` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `seo_url` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `header` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_keyword` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `language_id`, `content`, `slug`, `seo_url`, `header`, `meta_title`, `meta_keyword`, `is_active`, `created`, `modified`) VALUES
(2, 1, '<p>rajatbtybhshgdt5dghy6gy6h</p>', 'About', 'about-us', 'About Us', 'hjhk', 'hkjj', 1, '2017-10-05 12:32:01', '2017-10-06 13:28:13'),
(3, 2, '<p>dvsdfgvsdf</p>', 'About', 'about-us', 'About Us', 'sdfgfd', 'sdfgsdf', 1, '2017-10-06 10:35:25', '2017-10-06 10:54:21'),
(4, 1, '<p>mnbvm</p>', 'Amb', 'ambassador', 'Ambassador', 'bnnb', 'bb', 1, '2017-10-06 10:37:13', '2017-10-06 10:54:55'),
(5, 2, '<p>b m,m</p>', 'amb', 'ambassador', 'Ambassador', 'bn ', 'vbvbn', 1, '2017-10-06 10:37:36', '2017-10-06 10:57:00'),
(6, 1, '<p>cfbfv</p>', 'decl', 'declaration', 'Declaration', 'nn', 'bb', 1, '2017-10-06 10:38:00', '2017-10-06 10:57:34'),
(7, 2, '<p>bnb</p>', 'decl', 'declaration', 'Declaration', 'bnb', 'bnb', 1, '2017-10-06 10:38:15', '2017-10-06 10:57:58'),
(8, 1, '<p>dvd</p>', 'mile', 'milestones ', 'Milestones and Participation', 'hjh', 'hjnh', 1, '2017-10-06 10:39:05', '2017-10-06 10:58:24'),
(9, 2, '<p>cv</p>', 'mile', 'milestones', 'Milestones and Participation', 'sdsd', 'ddd', 1, '2017-10-06 10:39:17', '2017-10-06 10:58:39'),
(11, 1, '<p>cf</p>', 'wc', 'wc-stats', ' WC Stats', 'kjg', 'jkgj', 1, '2017-10-06 10:40:14', '2017-10-06 10:59:05'),
(12, 2, '<p>jhkjh</p>', 'wc', 'wc-stats', ' WC Stats', 'jgh', 'jghj', 1, '2017-10-06 10:40:32', '2017-10-06 10:59:19'),
(13, 1, '<p>fdf</p>', 'blog', 'blogs', 'Blogs', 'gjhg', 'fghg', 1, '2017-10-06 10:41:10', '2017-10-06 11:09:56'),
(14, 2, '<p>gfdg</p>', 'blog', 'blogs', 'Blogs', 'dhdg', 'ghgh', 1, '2017-10-06 10:41:28', '2017-10-06 11:20:40'),
(15, 1, '<p>dgd</p>', 'contact', 'contact-us', 'Contact Us ', 'gfd', 'jf', 1, '2017-10-06 10:41:49', '2017-10-06 11:00:28'),
(16, 2, '<p>gfg</p>', 'contact', 'contact-us', ' Contact Us', 'cxc', 'bcvb', 1, '2017-10-06 10:42:33', '2017-10-06 11:00:41'),
(17, 1, '<p>scvsd</p>', 'frequent', 'faq''s', '    FAQ’s', 'vd', 'fdf', 1, '2017-10-06 10:43:21', '2017-10-06 11:01:44'),
(18, 2, '<p>nm bn</p>', 'frequent', 'faq''s', ' FAQ’s', 'fvdf', 'gf', 1, '2017-10-06 10:43:48', '2017-10-06 11:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `short_code` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_code`, `is_active`, `created`, `modified`) VALUES
(1, 'English', 'en', 1, '2017-10-05 09:10:46', '2017-10-05 10:59:03'),
(2, 'Hebrew', 'heb', 1, '2017-10-06 10:20:44', '2017-10-06 10:20:44'),
(3, 'French', 'fra', 1, '2017-10-06 17:00:38', '2017-10-06 17:00:38'),
(4, 'Portugees', 'por', 1, '2017-10-06 17:01:05', '2017-10-06 17:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `short_code` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `short_code`, `is_active`, `created`, `modified`) VALUES
(1, 'United States', 'us', 1, '2017-10-04 17:28:29', '2017-10-04 17:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password_token` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_active`, `is_delete`, `is_admin`, `confirmation_token`, `password_token`, `created`, `modified`) VALUES
(1, 'admin@admin.com', 'd155020066aa0ba8a32b61ff4050f936614e85d5', 1, NULL, 1, NULL, '', NULL, '2017-10-05 17:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `details` text COLLATE utf8_bin,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `details`, `name`, `created`, `modified`) VALUES
(1, 1, NULL, 'Admin User', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
