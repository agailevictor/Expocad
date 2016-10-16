-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2016 at 04:46 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `expocad`
--
CREATE DATABASE IF NOT EXISTS `expocad` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `expocad`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booth`
--

CREATE TABLE IF NOT EXISTS `tbl_booth` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(100) NOT NULL,
  `space` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `exid` int(11) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `is_all` varchar(10) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_booth`
--

INSERT INTO `tbl_booth` (`bid`, `bname`, `space`, `amount`, `exid`, `mid`, `spid`, `staffid`, `is_all`) VALUES
(1, 'Booth 1', '1500', '10000', NULL, NULL, NULL, NULL, 'N'),
(2, 'Booth 2', '2000', '15000', NULL, 2, NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `menu_id` varchar(100) NOT NULL,
  `sequence` int(11) NOT NULL,
  `u_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`m_id`, `menu`, `icon`, `menu_id`, `sequence`, `u_type`, `status`) VALUES
(1, 'Master', 'fa fa-gear fa-fw fa-lg', 'idMaster', 1, 1, 1),
(2, 'Arrange', 'fa fa-th fa-fw fa-lg', 'idArrange', 2, 1, 1),
(3, 'Approve', 'fa fa-check-square-o fa-fw fa-lg', 'idApprove', 3, 1, 1),
(4, 'Master', 'fa fa-gear fa-fw fa-lg', 'idMaster', 1, 2, 1),
(5, 'Approve', 'fa fa-check-square-o fa-fw fa-lg', 'idApprove', 2, 2, 1),
(6, 'View', 'fa fa-search fa-lg', 'idView', 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submenu`
--

CREATE TABLE IF NOT EXISTS `tbl_submenu` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `s_menu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `sub_id` varchar(100) NOT NULL,
  `pid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`sid`, `s_menu`, `url`, `sub_id`, `pid`, `status`) VALUES
(1, 'Manager', 'common/listmanager', 'idManager', 1, 1),
(2, 'Booth', 'Common/listbooth', 'idBooth', 1, 1),
(3, 'Booth', 'Common/allocatebooth', 'idAllocateBooth', 2, 1),
(4, 'Exhibitor', 'Common/approveexhibitor', 'idApproveExhi', 3, 1),
(5, 'Booth', 'Common/approvebooth', 'idApproveBooth', 3, 1),
(6, 'Staff', 'Common/staff', 'idStaff', 4, 1),
(7, 'Request', 'Common/request', 'idRequest', 5, 1),
(8, 'Booth', 'Common/booth', 'idBooth', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE IF NOT EXISTS `tbl_user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Staff'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `password`, `name`, `email`, `mobile`, `type`, `parent_id`) VALUES
(1, 'admin', 'ZGVtbw==', 'Administrator', 'admin@expocad.com', '9995116478', 1, 0),
(2, 'agaile', 'ZGVtbw==', 'Agaile Victor', 'agailevictor@expocad.com', '8954778650', 2, 1),
(3, 'jane', 'ZGVtbw==', 'Jane Elizabeth Jose', 'jane@expocad.com', '6664785214', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
