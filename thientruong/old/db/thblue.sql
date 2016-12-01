-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 11:40 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `theBlue`
--

-- --------------------------------------------------------

--
-- Table structure for table `pr_members`
--

CREATE TABLE IF NOT EXISTS `pr_members` (
  `pr_primary_key` int(11) NOT NULL AUTO_INCREMENT,
  `pr_roles_id` int(11) NOT NULL,
  `pr_member_email` varchar(255) NOT NULL,
  `pr_member_password` varchar(255) NOT NULL,
  `pr_member_status` int(1) NOT NULL,
  `pr_member_rand_key` varchar(255) NOT NULL,
  `pr_member_data_register` datetime NOT NULL,
  `pr_member_active` int(11) NOT NULL,
  PRIMARY KEY (`pr_primary_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pr_members`
--

INSERT INTO `pr_members` (`pr_primary_key`, `pr_roles_id`, `pr_member_email`, `pr_member_password`, `pr_member_status`, `pr_member_rand_key`, `pr_member_data_register`, `pr_member_active`) VALUES
(1, 4, 'admin', '3993744c05ea89d0c936d438cc1feae56f800062a895b725fc1836d36dd0e1c5', 1, 'cf10631498c7ff8e5434e0afd8dd8d65848e5090a0f44436c476e66eff1ca622', '2014-06-15 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pr_member_profile`
--

CREATE TABLE IF NOT EXISTS `pr_member_profile` (
  `pr_primary_key` int(11) NOT NULL AUTO_INCREMENT,
  `pr_member_id` int(11) NOT NULL,
  `pr_member_profile_surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pr_member_profile_given_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pr_member_profile_display_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pr_member_profile_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pr_member_profile_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pr_member_profile_images` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pr_member_profile_date` datetime NOT NULL,
  PRIMARY KEY (`pr_primary_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pr_member_profile`
--

INSERT INTO `pr_member_profile` (`pr_primary_key`, `pr_member_id`, `pr_member_profile_display_name`, `pr_member_profile_images`, `pr_member_profile_date`) VALUES
(1, 1, 'Administrator', '/uploads/user.jpg', '2015-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pr_roles`
--

CREATE TABLE IF NOT EXISTS `pr_roles` (
  `pr_primary_key` int(11) NOT NULL AUTO_INCREMENT,
  `pr_roles_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pr_roles_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pr_roles_status` int(1) NOT NULL,
  PRIMARY KEY (`pr_primary_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pr_roles`
--

INSERT INTO `pr_roles` (`pr_primary_key`, `pr_roles_name`, `pr_roles_description`, `pr_roles_status`) VALUES
(1, 'Quản lý', '', 1),
(2, 'Thành viên quản trị', '', 1),
(3, 'Thành viên đăng ký', '', 1)
;
