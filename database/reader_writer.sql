-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 08:12 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reader_writer`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkReadRequest` (IN `param_process_name` VARCHAR(255), IN `param_type` VARCHAR(255))  BEGIN
DECLARE total_row INT DEFAULT 0;
DECLARE type_process VARCHAR(255) DEFAULT 'none';

    START TRANSACTION;
    
    SELECT type,count(*) INTO type_process,total_row FROM semaphore;
    
    IF type_process = 'read' OR total_row = 0 THEN
    	INSERT INTO semaphore VALUES(param_process_name,param_type);
        SELECT 'success';
        COMMIT;
    ELSE
    	SELECT 'failure';
    	ROLLBACK;
    END IF;
    
  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reader_queue`
--

CREATE TABLE `reader_queue` (
  `process_name` varchar(255) NOT NULL,
  `arrival_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reader_queue`
--

INSERT INTO `reader_queue` (`process_name`, `arrival_time`) VALUES
('a', '2018-10-14 16:38:13'),
('b', '2018-10-14 16:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `semaphore`
--

CREATE TABLE `semaphore` (
  `process_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semaphore`
--

INSERT INTO `semaphore` (`process_name`, `type`) VALUES
('c', 'read'),
('asd', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `writer_queue`
--

CREATE TABLE `writer_queue` (
  `process_name` varchar(255) NOT NULL,
  `arrival_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
