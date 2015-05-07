-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2015 at 07:16 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rental_7435282`
--
CREATE DATABASE IF NOT EXISTS `rental_7435282` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rental_7435282`;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` char(20) DEFAULT NULL,
  `password` char(10) DEFAULT NULL,
  `fname` varchar(35) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `phoneNumber` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `age` int(3) NOT NULL,
  `pet` varchar(25) NOT NULL,
  `smoke` tinyint(1) NOT NULL,
  `wage` varchar(35) NOT NULL,
  `occupation` varchar(35) NOT NULL,
  `inhabitants` varchar(12) NOT NULL,
  `personalMessage` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `username`, `password`, `fname`, `lname`, `phoneNumber`, `email`, `age`, `pet`, `smoke`, `wage`, `occupation`, `inhabitants`, `personalMessage`) VALUES
(1, 'ownerone', 'asdfghjkl1', 'Owner', 'One', '(111)111-1111', 'ownerOne@hotmail.com', 11, 'Insects', 0, 'unemployed', 'Student', '1', 'Owner One								'),
(2, 'ownertwo', 'asdfghjkl1', 'Owner', 'Two', '(222)222-2222', 'ownertwo@hotmail.com', 12, 'None', 0, '20-29.99', 'Management', '1', 'Owner Two							'),
(3, 'ownerthree', 'asdfghjkl1', 'Owner', 'Three', '(333)333-3333', 'ownerthree@hotmail.com', 33, 'Bird(s)', 0, '30-39.99', 'Office/Administration', '1', 'Owner Three						'),
(4, 'ownerFour', 'asdfghjkl1', 'OWner', 'Four', '(444)444-4444', 'ownerfour@hotmail.com', 44, 'Cat,Insects', 0, 'unemployed', 'Student', '1', 'OwnerFour'),
(5, 'ownerfive', 'asdfghjkl1', 'ownerfive', 'Five', '(514)626-3004', 'ownerFive@hotmail.com', 55, 'Dog,Cat', 0, '50-above', 'Student', '1', 'OwnerFive							');

-- --------------------------------------------------------

--
-- Table structure for table `propertylistings`
--

CREATE TABLE IF NOT EXISTS `propertylistings` (
  `propertyId` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) NOT NULL,
  `streetAndNumber` varchar(30) NOT NULL,
  `appartement` int(4) NOT NULL,
  `city` varchar(25) NOT NULL,
  `postalCode` varchar(7) NOT NULL,
  `province` varchar(2) NOT NULL,
  `available` varchar(15) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `paymentMethod` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  PRIMARY KEY (`propertyId`),
  KEY `ownerId` (`ownerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `propertylistings`
--

INSERT INTO `propertylistings` (`propertyId`, `ownerId`, `streetAndNumber`, `appartement`, `city`, `postalCode`, `province`, `available`, `price`, `paymentMethod`, `title`) VALUES
(1, 1, 'OwnerOne 144', 0, 'Montreal', 'h9h 2b1', 'QC', 'Available', '11', 'Per Week', 'OwnerOneAdd'),
(2, 2, 'OwnerTwo 2', 0, 'Montreal', 'h9h 2b1', 'QC', 'Available', '22', 'Per Week', 'OwnerTwoAdd'),
(3, 3, 'OwnerThree 33', 0, 'Toronto', 'h9h 2b1', 'ON', 'Available', '33', 'Per Week', 'OwnerThreeAdd'),
(4, 4, 'OwnerFour 44', 0, 'Toronto', 'h9h 2b1', 'ON', 'Available', '44', 'Per Week', 'OwnerFour'),
(5, 5, 'ownerfive 55', 0, 'Toronto', 'h9h 2b1', 'ON', 'Available', '55', 'Per Week', 'ownerFive');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE IF NOT EXISTS `tenant` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` char(20) DEFAULT NULL,
  `password` char(10) DEFAULT NULL,
  `fname` varchar(35) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `phoneNumber` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `age` int(20) NOT NULL,
  `pet` varchar(25) NOT NULL,
  `smoke` tinyint(1) NOT NULL,
  `wage` varchar(35) NOT NULL,
  `occupation` varchar(35) NOT NULL,
  `inhabitants` varchar(12) NOT NULL,
  `personalMessage` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `username`, `password`, `fname`, `lname`, `phoneNumber`, `email`, `age`, `pet`, `smoke`, `wage`, `occupation`, `inhabitants`, `personalMessage`) VALUES
(1, 'tenantone', 'asdfghjkl1', 'tenantone', 'one', '(111)111-1111', 'tenantone@hotmail.com', 20, 'None', 1, '30-39.99', 'Management', '3', 'Tenant 1							'),
(2, 'tenanttwo', 'asdfghjkl1', 'tenanttwo', 'ttwo', '(222)222-2222', 'tenanttwo@hotmail.com', 22, 'None', 1, '20-29.99', 'Military and Protective Service', '1', 'Tenant Two						'),
(3, 'tenantthree', 'asdfghjkl1', 'tenantthree', 'tenantthree', '(333)333-3333', 'tenantthree@hotmail.com', 33, 'Dog', 1, 'unemployed', 'Student', '1', 'tenant three					'),
(4, 'tenantfour', 'asdfghjkl1', 'tenantfour', 'tenantfour', '(444)444-4444', 'tenantfour@hotmail.com', 44, 'Fish', 1, 'unemployed', 'Student', '1', 'tenant 4							'),
(5, 'tenantfive', 'asdfghjkl1', 'tenantfive', 'tenantfive', '(514)626-3004', 'tenantfive@hotmail.com', 55, 'None', 1, 'unemployed', 'Student', '1', 'tenant five							');

-- --------------------------------------------------------

--
-- Table structure for table `tenantpreferences`
--

CREATE TABLE IF NOT EXISTS `tenantpreferences` (
  `tenantPreferencesId` int(11) NOT NULL AUTO_INCREMENT,
  `tenantId` int(11) NOT NULL,
  `city` varchar(25) NOT NULL,
  `province` varchar(2) NOT NULL,
  `available` varchar(15) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `paymentMethod` varchar(10) NOT NULL,
  PRIMARY KEY (`tenantPreferencesId`),
  KEY `ownerId` (`tenantId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tenantpreferences`
--

INSERT INTO `tenantpreferences` (`tenantPreferencesId`, `tenantId`, `city`, `province`, `available`, `price`, `paymentMethod`) VALUES
(1, 1, 'Montreal', 'QC', 'Available', '11', 'Per Week'),
(2, 2, 'Montreal', 'QC', 'Available', '22', 'Per Week'),
(3, 3, 'Toronto', 'ON', 'Available', '33', 'Per Week'),
(4, 4, 'Toronto', 'ON', 'Available', '44', 'Per Week'),
(5, 5, 'Toronto', 'ON', 'Available', '55', 'Per Week');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `propertylistings`
--
ALTER TABLE `propertylistings`
  ADD CONSTRAINT `propertylistings_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `owner` (`id`);

--
-- Constraints for table `tenantpreferences`
--
ALTER TABLE `tenantpreferences`
  ADD CONSTRAINT `tenantpreferences_ibfk_1` FOREIGN KEY (`tenantId`) REFERENCES `tenant` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
