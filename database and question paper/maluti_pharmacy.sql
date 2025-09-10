-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 10:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maluti_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultaion`
--

CREATE TABLE `consultaion` (
  `patient_id` int(5) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `Patient message` text DEFAULT NULL,
  `pharmarcist_reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultaion`
--

INSERT INTO `consultaion` (`patient_id`, `EMP_ID`, `Patient message`, `pharmarcist_reply`) VALUES
(601, 1, 'ey', 'sup bro you ayt?'),
(1, 1, 'hey sir/madam, please recommend me a cure, i have back pains', ' you should take the menthols. go check the meds available on our system');

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `patient_id` int(5) NOT NULL,
  `med_id` int(5) NOT NULL,
  `pharmacist_id` int(11) DEFAULT NULL,
  `issues` text DEFAULT NULL,
  `medical_record_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`patient_id`, `med_id`, `pharmacist_id`, `issues`, `medical_record_id`) VALUES
(1, 7000, 1, 'sore throat and frequent coughs', 1),
(1, 7002, 1, 'a patient has a flu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(11) NOT NULL,
  `med_name` varchar(20) NOT NULL,
  `quantity` int(7) NOT NULL,
  `price_maloti` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `med_name`, `quantity`, `price_maloti`) VALUES
(7002, 'Alejex', 70, 20),
(7001, 'Dispring', 70, 10),
(7003, 'ethanoic acid', 10, 300),
(7000, 'Panado', 70, 10);

-- --------------------------------------------------------

--
-- Table structure for table `new_`
--

CREATE TABLE `new_` (
  `catalogue_id` int(11) NOT NULL,
  `photo` blob NOT NULL,
  `discription` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_`
--

INSERT INTO `new_` (`catalogue_id`, `photo`, `discription`, `file_path`) VALUES
(6, 0x7461626c6574732d70696c6c732e6a7067, 'heliux is the medicine that cures the back pains. take one tablet three time a day after food.', 'C:xampphtdocsendass/uploads/tablets-pills.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `town` varchar(25) NOT NULL,
  `district` varchar(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password_` varchar(15) NOT NULL,
  `pharmacist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `first_name`, `last_name`, `town`, `district`, `username`, `password_`, `pharmacist_id`) VALUES
(600, 'Realeboha', 'Rathebe', 'Pitseng', 'Leribe', 'relo', 'relo@1', 1),
(601, 'Liteboho ', 'Moloi', 'Hlotse', 'Leribe', 'mthakathi', 'molo@1', 1),
(602, 'chaki', 'lerotholi', 'hlotse', 'leribe', 'chaks', 'chaks@1', 1),
(603, 'Thabisang', 'Lipallo', 'Pitseng', 'Leribe', 'thabisang', 'thabi@1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_order`
--

CREATE TABLE `patient_order` (
  `Order_id` int(5) NOT NULL,
  `Ord_date` varchar(20) NOT NULL,
  `patient_id` int(5) NOT NULL,
  `Status_` varchar(10) DEFAULT NULL,
  `Collection` varchar(10) NOT NULL,
  `Distance` int(5) NOT NULL,
  `status_update_date` varchar(20) DEFAULT NULL,
  `med_id` int(11) NOT NULL,
  `pharmacist_id` int(4) DEFAULT NULL,
  `quantity_` int(11) NOT NULL,
  `Totalamout` int(7) NOT NULL,
  `patient_address` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_order`
--

INSERT INTO `patient_order` (`Order_id`, `Ord_date`, `patient_id`, `Status_`, `Collection`, `Distance`, `status_update_date`, `med_id`, `pharmacist_id`, `quantity_`, `Totalamout`, `patient_address`) VALUES
(8, '2023-04-25', 1, 'delivered', 'delivery', 13, '2023-04-26', 7002, 1, 2, 45, 'lisemengII');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `EMP_ID` int(4) NOT NULL,
  `FIRST_NAME` varchar(20) NOT NULL,
  `LAST_NAME` varchar(20) NOT NULL,
  `HOME_TOWN` varchar(25) NOT NULL,
  `DSTRICT` varchar(25) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWD` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`EMP_ID`, `FIRST_NAME`, `LAST_NAME`, `HOME_TOWN`, `DSTRICT`, `USERNAME`, `PASSWD`) VALUES
(1, 'Machakela', 'Mopeli', 'Hlotse', 'Leribe', 'machakela', 'mopeli@1'),
(2, 'Lerato', 'Mafethe', 'Hlotse', 'Leribe', 'lerato', 'mafethe@'),
(3, 'Thabo', 'Masia', 'Hlotse', 'Leribe', 'thabo', 'masia@12'),
(4, 'Nathane', 'Masia', 'Hlotse', 'Leribe', 'nathane', 'nathane@'),
(5, 'Thabang', 'Masia', 'Thaba-Bosiu', 'Maseru', 'thabang', 'thabz@12'),
(8, 'Thapelo', 'Mokoaleli', 'Hlotse', 'Leribe', 'thapelo', 'thapelo@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultaion`
--
ALTER TABLE `consultaion`
  ADD UNIQUE KEY `patient_id` (`patient_id`,`EMP_ID`);
ALTER TABLE `consultaion` ADD FULLTEXT KEY `Patient message` (`Patient message`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD UNIQUE KEY `medical_record_id` (`medical_record_id`),
  ADD UNIQUE KEY `patient_id` (`patient_id`,`med_id`,`pharmacist_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD UNIQUE KEY `med_name` (`med_name`),
  ADD UNIQUE KEY `med_id` (`med_id`);

--
-- Indexes for table `new_`
--
ALTER TABLE `new_`
  ADD PRIMARY KEY (`catalogue_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password_`),
  ADD UNIQUE KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_order`
--
ALTER TABLE `patient_order`
  ADD PRIMARY KEY (`Order_id`),
  ADD UNIQUE KEY `patient_id` (`patient_id`,`med_id`,`pharmacist_id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `PASSWD` (`PASSWD`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `medical_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_`
--
ALTER TABLE `new_`
  MODIFY `catalogue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_order`
--
ALTER TABLE `patient_order`
  MODIFY `Order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
