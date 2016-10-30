-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2015 at 06:14 PM
-- Server version: 5.5.41
-- PHP Version: 5.4.39-1+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stu3881_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TaskName` varchar(80) NOT NULL DEFAULT '',
  `TaskName1` varchar(30) NOT NULL,
  `TaskType` varchar(30) NOT NULL DEFAULT '',
  `shift_id` varchar(30) NOT NULL,
  `active_for_current_show` tinyint(1) NOT NULL DEFAULT '0',
  `PermanentTask` varchar(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  KEY `ID` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `TaskName`, `TaskName1`, `TaskType`, `shift_id`, `active_for_current_show`, `PermanentTask`, `created_at`, `updated_at`) VALUES
(1, 'Artist backstage relations entire show', 'Artist backstage relations', 'show', '5', 0, 'y', '0000-00-00 00:00:00', '2015-05-19 23:08:14'),
(2, 'Bar 1st shift @start_shift_1@ - @start_shift_2@', 'Bar', 'show', '4', 0, 'y', '0000-00-00 00:00:00', '2015-05-19 23:09:54'),
(3, 'Bar 1st shift @start_shift_1@ - @start_shift_2@', 'Bar', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(4, 'Bar 1st shift @start_shift_1@ - @start_shift_2@', 'Bar', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(5, 'Bar 2nd shift @start_shift_2@ - @start_shift_3@', 'Bar', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(6, 'Bar 3rd shift @start_shift_3@ - close', 'Bar', 'show', '2', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(7, 'BBQ catering 1st shift  @start_shift_1@ - @start_shift_2@', 'BBQ catering', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 09:10:35'),
(8, 'Box Office 1st shift @start_shift_1@ - @start_shift_2@', 'Box Office', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(9, 'Box Office 1st shift @start_shift_1@ - @start_shift_2@', 'Box Office', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(10, 'Box Office 2nd shift @start_shift_2@ - @start_shift_3@', 'Box Office', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(11, 'CD Raffle Sales 1st shift @start_shift_1@ - @start_shift_2@', 'CD Raffle Sales', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(12, 'Doorman / Door woman 1st shift @start_shift_1@ - @start_shift_2@', 'Doorman / Door woman', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(13, 'Door Monitor 1st shift @start_shift_1@ - @start_shift_2@', 'Door Monitor', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(15, 'Greeter 1st shift @start_shift_1@ - @start_shift_2@', 'Greeter', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(16, 'Membership Sales 1st shift @start_shift_1@ - @start_shift_2@', 'Membership Sales', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(17, 'Membership Sales 1st shift @start_shift_1@ - @start_shift_2@', 'Membership Sales', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(18, 'Membership Sales 2nd shift @start_shift_2@ - @start_shift_3@', 'Membership Sales', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(19, 'Merchandise 1st shift ', 'Merchandise', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 09:10:35'),
(20, 'Merchandise 1st shift  @start_shift_1@ - @start_shift_2@', 'Merchandise', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 09:10:35'),
(21, 'Merchandise @start_shift_2@ - @start_shift_3@', 'Merchandise @start_shift_2@ - ', 'show', '3', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(22, 'Security 1st shift @start_shift_1@ - @start_shift_2@', 'Security', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 09:10:35'),
(23, 'Set up/clean up', 'Set up/clean up', 'show', '3', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(24, 'Sound 1st shift', 'Sound', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(25, 'Ticket holders/will call 1st shift  @start_shift_1@ - @start_shift_2@', 'Ticket holders/will call', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 09:10:35'),
(26, 'Ticket holders/will call 1st shift  @start_shift_1@ - @start_shift_2@', 'Ticket holders/will call', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 09:10:35'),
(27, 'VIP 1st shift  @start_shift_1@ - @start_shift_2@', 'VIP', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 09:10:35'),
(28, 'Volunteer Coordinator entire show', 'Volunteer Coordinator', 'show', '3', 0, 'y', '0000-00-00 00:00:00', '2015-01-19 15:51:26'),
(29, 'Alternate 1st shift @start_shift_1@ - @start_shift_2@', 'Alternate', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 16:47:47'),
(30, 'Bar 2nd shift @start_shift_2@ - @start_shift_3@', 'Bar', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(31, 'Bar 2nd shift @start_shift_2@ - @start_shift_3@', 'Bar', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(36, 'Bar Manager', 'Bar Manager', 'show', '3', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(37, 'Sound 2nd shift', 'Sound', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(38, 'Box Office 1st shift @start_shift_1@ - @start_shift_2@', 'Box Office', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(40, 'Alternate 2nd shift @start_shift_1@ - @start_shift_2@', 'Alternate', 'show', '1', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 16:47:47'),
(41, 'Auction support 1st shift ', 'Auction support', 'show', '0', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 09:06:29'),
(42, 'Membership Sales 1st shift @start_shift_1@ - @start_shift_2@', 'Membership Sales', 'show', '0', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(43, 'Membership Sales 1st shift @start_shift_1@ - @start_shift_2@', 'Membership Sales', 'show', '0', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(44, 'Membership Sales 2nd shift @start_shift_2@ - close', 'Membership Sales', 'show', '1', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(46, 'BBQ catering 1st shift  @start_shift_1@ - @start_shift_2@', 'BBQ catering', 'show', '0', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 09:06:29'),
(47, 'Merchandise 1st shift  @start_shift_1@ - @start_shift_2@', 'Merchandise', 'show', '0', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 09:06:29'),
(48, 'Afternoon chair setup @chair_setup_start@ to @chair_setup_end@', 'Afternoon chair setup @chair_s', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(49, 'Afternoon chair setup @chair_setup_start@ to @chair_setup_end@', 'Afternoon chair setup @chair_s', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(50, 'Birthday Cake Server', 'Birthday Cake Server', 'show', '3', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(51, 'Birthday Cake Server', 'Birthday Cake Server', 'show', '3', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(52, 'Afternoon  setup @chair_setup_start@ to @chair_setup_end@', 'Afternoon  setup @chair_setup_', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(53, 'Afternoon chair setup @chair_setup_start@ to @chair_setup_end@', 'Afternoon chair setup @chair_s', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(54, 'President entire show', 'President', 'show', '3', 0, 'y', '0000-00-00 00:00:00', '2015-01-19 15:51:26'),
(77, 'Door Monitor 2nd shift @start_shift_2@ - @start_shift_3@', 'Door Monitor', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(56, 'Auction support', 'Auction support', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(57, 'Raffle tickets', 'Raffle tickets', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(58, 'Raffle tickets', 'Raffle tickets', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(59, 'Afternoon setup @chair_setup_start@ to @chair_setup_end@', 'Afternoon setup @chair_setup_s', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(60, 'Auction support', 'Auction support', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(61, 'Security entire show@start_shift_2@ - @start_shift_3@', 'Security', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-19 15:51:26'),
(62, 'Security @start_shift_1@ - @start_shift_2@', 'Security @start_shift_1@ - @st', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 08:58:33'),
(63, 'Bar 1st shift @start_shift_1@ - @start_shift_2@', 'Bar', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(64, 'Bar Setup entire show', 'Bar Setup', 'show', '3', 0, 'n', '0000-00-00 00:00:00', '2015-01-19 15:51:26'),
(68, 'Alternate 3rd shift @start_shift_1@ - @start_shift_2@', 'Alternate', 'show', '2', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 16:47:47'),
(70, 'Alternate 1st shift @start_shift_1@ - @start_shift_2@', 'Alternate', 'show', '0', 0, 'n', '0000-00-00 00:00:00', '2015-01-18 16:47:47'),
(73, 'Door Monitor 2nd shift @start_shift_2@ - @start_shift_3@', 'Door Monitor', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(74, 'Door Monitor 2nd shift @start_shift_2@ - @start_shift_3@', 'Door Monitor', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(75, 'Doorman / Door woman 1st shift @start_shift_1@ - @start_shift_2@', 'Doorman / Door woman', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(76, 'Door Monitor 1st shift @start_shift_1@ - @start_shift_2@', 'Door Monitor', 'show', '0', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(78, 'Door Monitor 2nd shift @start_shift_2@ - @start_shift_3@', 'Door Monitor', 'show', '1', 0, 'y', '0000-00-00 00:00:00', '2015-01-18 08:39:01'),
(79, '', '', '', '', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
