-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2015 at 08:31 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manage_your_picture`
--
CREATE DATABASE IF NOT EXISTS `manage_your_picture` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `manage_your_picture`;

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_admin` varchar(50) CHARACTER SET latin1 NOT NULL,
  `contrasenia` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `nombre_admin`, `contrasenia`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sign_in_date` datetime NOT NULL,
  `terms` enum('yes','no') DEFAULT 'no',
  `upload_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `url_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `unique_name` (`id`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `sign_in_date`, `terms`, `upload_date`, `url_image`) VALUES
(1, 'Polo mbo &#40;Polombo&#41;', 'elpolombo@gmail.com', '2015-04-20 19:57:19', 'yes', '2015-04-20 18:28:57', './uploads/images/upload/elpolombo@gmail.com/BrushedMetal.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
