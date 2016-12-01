-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2015 at 02:38 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bluesms`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `contact_hoten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `contact_phone` int(15) NOT NULL,
  `contact_birthday` date NOT NULL,
  `contact_gender` int(1) NOT NULL,
  `contact_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `contact_company` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact_notes` varchar(255) CHARACTER SET utf8 NOT NULL,
  `member_createby` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `category_id`, `contact_hoten`, `contact_phone`, `contact_birthday`, `contact_gender`, `contact_address`, `contact_email`, `contact_company`, `contact_notes`, `member_createby`) VALUES
(1, 1, 'Thôn', 1678761554, '1990-12-20', 1, 'Tả thanh oai, Thanh trì, Hà nội', 'nvthong90@gmail.com', 'Công ty TNHH giải pháp phần mền sơn lâm', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_categorie`
--

CREATE TABLE IF NOT EXISTS `contact_categorie` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_createby` int(11) NOT NULL,
  `category_status` int(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `history_contact`
--

CREATE TABLE IF NOT EXISTS `history_contact` (
  `history_contact_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `history_contact_hoten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `history_contact_phone` int(15) NOT NULL,
  `history_contact_birthday` date NOT NULL,
  `history_contact_gender` int(1) NOT NULL,
  `history_contact_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `history_contact_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `history_contact_company` varchar(255) CHARACTER SET utf8 NOT NULL,
  `history_contact_notes` varchar(255) CHARACTER SET utf8 NOT NULL,
  `history_contact_status` int(1) NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `history_sms`
--

CREATE TABLE IF NOT EXISTS `history_sms` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `history_campaingname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `history_brandname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `history_startdate` datetime NOT NULL,
  `history_status` int(1) NOT NULL,
  `history_total` int(11) NOT NULL,
  `history_notes` varchar(255) CHARACTER SET utf8 NOT NULL,
  `history_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `history_mobile` varchar(100) CHARACTER SET utf8 NOT NULL,
  `member_createby` int(11) NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pr_members`
--

CREATE TABLE IF NOT EXISTS `pr_members` (
  `pr_primary_key` int(11) NOT NULL AUTO_INCREMENT,
  `pr_roles_id` int(11) NOT NULL,
  `pr_username` varchar(50) NOT NULL,
  `pr_member_email` varchar(255) NOT NULL,
  `pr_member_password` varchar(255) NOT NULL,
  `pr_member_status` int(1) NOT NULL,
  `pr_member_rand_key` varchar(255) NOT NULL,
  `pr_member_data_register` datetime NOT NULL,
  `pr_member_active` int(11) NOT NULL,
  PRIMARY KEY (`pr_primary_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pr_members`
--

INSERT INTO `pr_members` (`pr_primary_key`, `pr_roles_id`, `pr_username`, `pr_member_email`, `pr_member_password`, `pr_member_status`, `pr_member_rand_key`, `pr_member_data_register`, `pr_member_active`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '3993744c05ea89d0c936d438cc1feae56f800062a895b725fc1836d36dd0e1c5', 1, 'cf10631498c7ff8e5434e0afd8dd8d65848e5090a0f44436c476e66eff1ca622', '2014-06-15 00:00:00', 1),
(2, 1, 'admin133', 'admin123@gmial.com', '3993744c05ea89d0c936d438cc1feae56f800062a895b725fc1836d36dd0e1c5', 1, '3447fca67f45a8bb72a2fee628a54b5318b3f1ef10f782a2bbaaf461cf1ea6c5', '2015-05-22 00:00:00', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pr_member_profile`
--

INSERT INTO `pr_member_profile` (`pr_primary_key`, `pr_member_id`, `pr_member_profile_surname`, `pr_member_profile_given_name`, `pr_member_profile_display_name`, `pr_member_profile_phone`, `pr_member_profile_address`, `pr_member_profile_images`, `pr_member_profile_date`) VALUES
(1, 1, '', '', 'Administrator', '123', '', '/uploads/1437905601-man-city.jpg', '2015-01-01 00:00:00'),
(2, 2, '', '', 'Nguyen Văn Thông', '', '', '/images/no-user.png', '0000-00-00 00:00:00');

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
(3, 'Thành viên đăng ký', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `template_sms`
--

CREATE TABLE IF NOT EXISTS `template_sms` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_content` text CHARACTER SET utf8 NOT NULL,
  `template_date` datetime NOT NULL,
  `template_createby` int(11) NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yiisession`
--

CREATE TABLE IF NOT EXISTS `yiisession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yiisession`
--

INSERT INTO `yiisession` (`id`, `expire`, `data`) VALUES
('cq6000aiq6ohfiuatv0g63dh65', 1471622250, 0x33613836336433653765306231636164616639633061393132613234333532345f5f72657475726e55726c7c733a34373a222f626c7565736d732f4d656d626572732f64656661756c742f757064617465496e666f726d6174696f6e2f69642f31223b33613836336433653765306231636164616639633061393132613234333532345f5f69647c733a313a2231223b33613836336433653765306231636164616639633061393132613234333532345f5f6e616d657c733a353a2261646d696e223b33613836336433653765306231636164616639633061393132613234333532345f5f7374617465737c613a303a7b7d),
('fnl2vosvlbvjh0ss8aon18cp51', 1471623320, ''),
('i6o5ufl7deusi988heqlk2efa2', 1471721047, 0x33613836336433653765306231636164616639633061393132613234333532345f5f72657475726e55726c7c733a31363a222f626c7565736d732f4d656d62657273223b33613836336433653765306231636164616639633061393132613234333532345f5f69647c733a313a2231223b33613836336433653765306231636164616639633061393132613234333532345f5f6e616d657c733a353a2261646d696e223b33613836336433653765306231636164616639633061393132613234333532345f5f7374617465737c613a303a7b7d6769695f5f72657475726e55726c7c733a31323a222f626c7565736d732f676969223b6769695f5f69647c733a353a227969696572223b6769695f5f6e616d657c733a353a227969696572223b6769695f5f7374617465737c613a303a7b7d),
('so3aglj4t3mm7f74l5afkdq3g7', 1471622824, 0x33613836336433653765306231636164616639633061393132613234333532345f5f72657475726e55726c7c733a31363a222f626c7565736d732f4d656d62657273223b33613836336433653765306231636164616639633061393132613234333532345f5f69647c733a313a2231223b33613836336433653765306231636164616639633061393132613234333532345f5f6e616d657c733a353a2261646d696e223b33613836336433653765306231636164616639633061393132613234333532345f5f7374617465737c613a303a7b7d),
('vvmreo35lan9mdpvhvooah4fr3', 1471623320, 0x33613836336433653765306231636164616639633061393132613234333532345f5f72657475726e55726c7c733a33343a222f626c7565736d732f4d656d626572732f64656661756c742f766965772f69642f31223b);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
