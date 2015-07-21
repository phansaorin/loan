-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2015 at 03:43 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendant`
--

CREATE TABLE IF NOT EXISTS `tbl_attendant` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `attendant` int(11) NOT NULL,
  `check_date` date NOT NULL,
  `sta_id` int(11) NOT NULL,
  PRIMARY KEY (`att_id`),
  KEY `st_id` (`sta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_attendant`
--

INSERT INTO `tbl_attendant` (`att_id`, `attendant`, `check_date`, `sta_id`) VALUES
(1, 1, '2015-02-11', 4),
(2, 2, '2015-02-11', 7),
(3, 1, '2015-02-11', 4),
(4, 1, '2015-02-10', 7),
(5, 1, '2015-02-01', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE IF NOT EXISTS `tbl_group` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(255) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`gro_id`, `gro_name`, `created_date`) VALUES
(2, 'Group B', '2015-02-11'),
(3, 'Group A', '2015-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE IF NOT EXISTS `tbl_position` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`pos_id`, `pos_title`) VALUES
(1, 'Staff'),
(2, 'Project Manager'),
(3, 'Admin'),
(4, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE IF NOT EXISTS `tbl_project` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(225) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `description` text,
  `use_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `use_id` (`use_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`pro_id`, `pro_name`, `company`, `description`, `use_id`, `start_date`, `end_date`, `status`) VALUES
(1, 'ABC', 'FWTA', 'This my project                                                     ', 9, '2015-02-01', '2015-02-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `title`) VALUES
(1, 'HR Staff'),
(2, 'IT Admin'),
(3, 'Project Manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary`
--

CREATE TABLE IF NOT EXISTS `tbl_salary` (
  `sal_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,0) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`sal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_salary`
--

INSERT INTO `tbl_salary` (`sal_id`, `amount`, `description`, `created_date`) VALUES
(1, '100', 'Staff', '2015-02-11'),
(2, '200', 'Manager', '2015-02-11'),
(3, '300', 'HR', '2015-02-09'),
(4, '400', 'Amin', '2015-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salarypromote`
--

CREATE TABLE IF NOT EXISTS `tbl_salarypromote` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `duration` date NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `discription` text CHARACTER SET utf16 NOT NULL,
  `use_id` int(11) NOT NULL,
  `sta_id` int(11) NOT NULL,
  `approve` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `u_id` (`use_id`),
  KEY `s_id` (`sta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_salarypromote`
--

INSERT INTO `tbl_salarypromote` (`pro_id`, `duration`, `amount`, `discription`, `use_id`, `sta_id`, `approve`) VALUES
(3, '2015-02-01', '54', 'Good Staff						', 3, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs`
--

CREATE TABLE IF NOT EXISTS `tbl_staffs` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `family_name` varchar(255) NOT NULL,
  `given_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cur_address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `related_file` varchar(255) DEFAULT NULL,
  `work_start` date NOT NULL,
  `main_id` int(11) DEFAULT NULL,
  `created_date` date NOT NULL,
  `sal_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  PRIMARY KEY (`sta_id`),
  KEY `use_id` (`main_id`),
  KEY `tbl_staffs_ibfk_2` (`sal_id`),
  KEY `pos_id` (`pos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_staffs`
--

INSERT INTO `tbl_staffs` (`sta_id`, `family_name`, `given_name`, `gender`, `dob`, `phone`, `address`, `cur_address`, `photo`, `related_file`, `work_start`, `main_id`, `created_date`, `sal_id`, `pos_id`) VALUES
(3, 'Sophorn', 'HR', 'M', '2015-02-11', '098821737', 'Takeo Province                                    ', 'Phnome Penh', 'in.gif', '', '2015-02-11', 3, '2015-02-12', 3, 4),
(4, 'Saorin', 'Manager', 'M', '1992-02-11', '098821737', 'Kampong Chhnang            ', 'Phnome Penh', '', '', '2015-02-11', 3, '2015-02-11', 4, 2),
(5, 'Chetra', 'Admin', 'M', '1992-02-11', '098821737', 'Takeo            ', 'Phnome Penh', '', '', '2015-02-11', NULL, '2015-02-11', 4, 3),
(6, 'SreyChen', 'Sok', 'F', '0000-00-00', '098821737', 'Takeo', 'Phnome Penh', NULL, NULL, '2015-02-09', 4, '2015-02-09', 1, 1),
(7, 'Meyleang', 'Mao', 'M', '2001-02-11', '0987654223', 'Battambang                                    ', 'Phnom Penh', 'a1.png', 'a.png', '2015-02-09', 7, '2015-02-12', 4, 2),
(8, 'Sochetra', 'sok', 'M', '1992-02-11', '098821737', 'Takeo                                    ', 'Phnome Penh', 'f.gif', '', '2015-02-11', 7, '2015-02-12', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_takeleave`
--

CREATE TABLE IF NOT EXISTS `tbl_takeleave` (
  `tak_id` int(11) NOT NULL AUTO_INCREMENT,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `reason` text NOT NULL,
  `approved` varchar(150) NOT NULL,
  `sta_id` int(11) NOT NULL,
  PRIMARY KEY (`tak_id`),
  KEY `st_id` (`sta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_takeleave`
--

INSERT INTO `tbl_takeleave` (`tak_id`, `startdate`, `enddate`, `reason`, `approved`, `sta_id`) VALUES
(1, '2015-02-12', '2015-02-12', 'Go home', '0', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `gro_id` int(11) DEFAULT NULL,
  `sta_id` int(11) NOT NULL,
  PRIMARY KEY (`use_id`),
  KEY `rol_id` (`rol_id`),
  KEY `tbl_users_ibfk_1` (`gro_id`),
  KEY `sta_id` (`sta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`use_id`, `username`, `password`, `status`, `rol_id`, `gro_id`, `sta_id`) VALUES
(1, 'hr', '123', 1, 2, NULL, 3),
(2, 'admin', '123', 1, 1, NULL, 5),
(3, 'saorin.manager', '123', 1, 3, 2, 4),
(9, 'meyleang.manager', '123', 1, 3, 3, 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_attendant`
--
ALTER TABLE `tbl_attendant`
  ADD CONSTRAINT `tbl_attendant_ibfk_1` FOREIGN KEY (`sta_id`) REFERENCES `tbl_staffs` (`sta_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD CONSTRAINT `tbl_project_ibfk_1` FOREIGN KEY (`use_id`) REFERENCES `tbl_users` (`use_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_salarypromote`
--
ALTER TABLE `tbl_salarypromote`
  ADD CONSTRAINT `tbl_salarypromote_ibfk_1` FOREIGN KEY (`sta_id`) REFERENCES `tbl_staffs` (`sta_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_salarypromote_ibfk_2` FOREIGN KEY (`use_id`) REFERENCES `tbl_users` (`use_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_staffs`
--
ALTER TABLE `tbl_staffs`
  ADD CONSTRAINT `tbl_staffs_ibfk_2` FOREIGN KEY (`sal_id`) REFERENCES `tbl_salary` (`sal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_staffs_ibfk_3` FOREIGN KEY (`main_id`) REFERENCES `tbl_staffs` (`sta_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_staffs_ibfk_4` FOREIGN KEY (`pos_id`) REFERENCES `tbl_position` (`pos_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_takeleave`
--
ALTER TABLE `tbl_takeleave`
  ADD CONSTRAINT `tbl_takeleave_ibfk_1` FOREIGN KEY (`sta_id`) REFERENCES `tbl_staffs` (`sta_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`sta_id`) REFERENCES `tbl_staffs` (`sta_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_users_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `tbl_roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_users_ibfk_3` FOREIGN KEY (`gro_id`) REFERENCES `tbl_group` (`gro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
