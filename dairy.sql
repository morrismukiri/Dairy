-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2015 at 10:05 PM
-- Server version: 5.5.35
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_f_no` varchar(50) NOT NULL,
  `r_kg` float NOT NULL,
  `r_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `r_received_by` varchar(50) NOT NULL,
  `r_deliverer` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `r_f_no` (`r_f_no`),
  KEY `r_received_by` (`r_received_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `r_f_no`, `r_kg`, `r_dt`, `r_received_by`, `r_deliverer`) VALUES
(2, '49', 66, '2013-04-07 23:00:00', '', 'muthoni'),
(4, '456785', 5, '0000-00-00 00:00:00', '', 'Mzee'),
(5, '66', 7, '2013-04-07 23:30:00', '', 'john'),
(10, '49', 99, '2013-11-01 11:11:45', '', 'karugi'),
(11, '49', 10, '2013-05-23 18:09:05', '', 'muthoni'),
(12, '456785', 80, '2013-05-01 18:14:58', '', 'mercy'),
(13, '8', 30, '2013-05-23 18:15:19', '', 'Mzee'),
(14, '66', 80, '2013-04-05 23:38:00', '', 'Owner'),
(15, '452', 23, '2013-05-16 18:17:29', '', 'Owner'),
(16, '675', 22, '2013-05-10 18:18:32', '', 'Owner'),
(17, '452', 22, '2013-04-03 23:30:00', '', 'Owner'),
(18, '452', 22, '2013-05-03 18:19:18', '', 'Owner'),
(19, '49', 10, '2013-05-11 18:19:31', '', 'Owner'),
(20, '777', 30, '2013-05-25 10:43:25', '', 'karen'),
(21, '777', 90, '2013-05-01 11:41:41', '', 'muthoni'),
(22, '11', 40, '2013-05-03 17:37:11', '', 'Owner'),
(23, '11', 41, '2013-05-04 17:37:52', '', ''),
(24, '11', 40, '2013-05-26 16:08:04', '', ''),
(25, '11', 30, '2013-05-07 16:09:41', '', ''),
(26, '86', 45, '2013-05-26 17:06:57', '', 'rean'),
(27, '9001', 10, '2015-11-26 15:40:41', '', 'Kathambi');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` varchar(50) NOT NULL,
  `e_mail` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `e_pass` varchar(50) NOT NULL,
  `e_role` varchar(50) DEFAULT NULL,
  `e_payroll_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `e_name` (`e_name`),
  UNIQUE KEY `e_payroll_no_2` (`e_payroll_no`),
  KEY `e_payroll_no` (`e_payroll_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `e_name`, `e_mail`, `username`, `e_pass`, `e_role`, `e_payroll_no`) VALUES
(2, 'kelly', 'kelly@ciangoi.co.ke', '', '827ccb0eea8a706c4c34a16891f84e7b', 'Supervisor', 'e1'),
(3, 'Catherine Muendi', 'cnmuend@yahoo.com', '', '827ccb0eea8a706c4c34a16891f84e7b', 'Manager', '3456'),
(4, 'Janet Mwende', 'jane@ciangoi.co.ke', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Clerk', 'e2'),
(5, 'Mike Kithinji', 'kithinjinthiiri@gmail.com', '', '482c811da5d5b4bc6d497ffa98491e38', 'Manager', '90909'),
(6, 'John Muthure', 'john@ciangoi.co.ke', '', '827ccb0eea8a706c4c34a16891f84e7b', 'Clerk', '343');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE IF NOT EXISTS `farmers` (
  `f_no` varchar(50) NOT NULL,
  `f_id` text NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_locallity` varchar(50) DEFAULT NULL,
  `f_ac` varchar(50) DEFAULT NULL,
  `last_paid` date DEFAULT NULL,
  `f_phone` varchar(20) DEFAULT NULL,
  `f_photo` blob,
  PRIMARY KEY (`f_no`),
  KEY `f_no` (`f_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`f_no`, `f_id`, `f_name`, `f_locallity`, `f_ac`, `last_paid`, `f_phone`, `f_photo`) VALUES
('1', '23456779', 'alexandar jones', 'kk', '9890485987', '2013-04-30', '0721274242', NULL),
('11', '246890', 'Henry Muthee', 'Kibumbu', '3456423', '2013-04-30', '0987654', NULL),
('23', '234567', 'mokua Joe', 'kathigiririni', '3456423', '2013-04-30', '2343562', NULL),
('452', '345678', 'Jane nduta', 'kathigiririni', '5689', '2013-04-30', '4579', NULL),
('456785', '4456754457', 'DANIEL', 'KE', '4213', '2013-05-26', '2467', ''),
('49', '4456754', 'Michael Muasya musyimi', 'mungoni centre', '9890485', '2013-04-30', '2023586', ''),
('66', '670065', 'Jaames', 'kk', '6790875', '2013-04-30', '0987654', ''),
('675', '44567543', 'Michael Muasya musyimi', 'mungoni centre', '6790875', '2013-04-30', '2023586', NULL),
('777', '7897389', 'Eva Nkatha', 'Njaina', '2345678', '2013-05-25', '900', NULL),
('8', '99', 'joy kanampiu', 'kibumbu', '879273', '2013-04-30', '09278', ''),
('86', '34257', 'Timothy ndegwa', 'mungoni centre', '7178110987', '2013-05-26', '67895', NULL),
('900', '454', 'Leonard Mabo', '12', '346743', '2013-04-30', '22', ''),
('9001', '22908070', 'Martin Ireri', 'Njaina', '459141241', NULL, '+254722339900', NULL),
('901', '451', 'Jane Kobi', 'Thika', '34624', '2013-04-30', '78342', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL,
  `p_to` varchar(50) NOT NULL,
  `p_date` date NOT NULL,
  `p_ac` bigint(20) NOT NULL,
  `p_method` varchar(30) NOT NULL,
  `p_transaction_code` int(11) NOT NULL COMMENT 'Bank or Mpesa confirmation or receipt no',
  `p_transacted_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `p_to` (`p_to`),
  KEY `p_transacted_by` (`p_transacted_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings_rates`
--

CREATE TABLE IF NOT EXISTS `settings_rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `rate` float NOT NULL COMMENT 'sh per kg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `settings_rates`
--

INSERT INTO `settings_rates` (`id`, `from`, `to`, `rate`) VALUES
(4, '2013-01-01', '2013-01-31', 20),
(5, '2013-03-01', '2013-03-31', 24);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`r_f_no`) REFERENCES `farmers` (`f_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`p_transacted_by`) REFERENCES `employees` (`e_payroll_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`p_to`) REFERENCES `farmers` (`f_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
