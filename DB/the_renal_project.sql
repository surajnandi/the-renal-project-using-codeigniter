-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 03:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_renal_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_unique_id` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `admin_email_id` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_phone` varchar(100) NOT NULL,
  `admin_account_status` enum('A','D','R') NOT NULL DEFAULT 'A' COMMENT 'A-Active,D-Draft,R-Reject',
  `inserted_ip` varchar(30) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` datetime DEFAULT NULL,
  `updated_ip` varchar(30) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `active_flag` enum('Y','N') NOT NULL DEFAULT 'Y',
  `del_flag` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_unique_id`, `admin_id`, `admin_email_id`, `admin_password`, `admin_username`, `admin_phone`, `admin_account_status`, `inserted_ip`, `inserted_by`, `inserted_date`, `updated_ip`, `updated_by`, `updated_date`, `active_flag`, `del_flag`) VALUES
(1, '5f03ea9dc1621', 'admin@gmail.com', '12345', 'Admin', '9999999999', 'A', '::1', 'Admin', '2021-05-05 08:53:09', '', '', '0000-00-00 00:00:00', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_unique_id` int(11) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_amount_per_patient` varchar(255) NOT NULL,
  `branch_account_status` enum('A','D','R') NOT NULL DEFAULT 'A' COMMENT 'A-Active,D-Draft,R-Reject',
  `inserted_ip` varchar(30) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` datetime DEFAULT NULL,
  `updated_ip` varchar(30) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `active_flag` enum('Y','N') NOT NULL DEFAULT 'Y',
  `del_flag` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_unique_id`, `branch_id`, `branch_name`, `branch_amount_per_patient`, `branch_account_status`, `inserted_ip`, `inserted_by`, `inserted_date`, `updated_ip`, `updated_by`, `updated_date`, `active_flag`, `del_flag`) VALUES
(1, '7JDUdfu865s', 'ABCD - Branch1', '25', 'A', NULL, NULL, NULL, '::1', 'Admin', '2021-09-11 10:47:35', 'Y', 'N'),
(2, '613c3c66c17bf', 'Branch 2', '13', 'A', '::1', 'Admin', '2021-09-11 10:49:34', '::1', 'Admin', '2021-09-11 10:50:10', 'Y', 'Y'),
(3, '613c3d04dadb2', 'Branch 3', '1112', 'A', '::1', 'Admin', '2021-09-11 10:52:12', '::1', 'Admin', '2021-09-11 10:52:24', 'Y', 'N'),
(4, '613c6d653440e', 'branch 6', '55', 'A', '::1', 'Admin', '2021-09-11 14:18:37', '::1', 'Admin', '2021-09-11 14:18:56', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_unique_id` int(11) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `doctor_email_id` varchar(100) NOT NULL,
  `doctor_password` varchar(100) NOT NULL,
  `doctor_username` varchar(100) DEFAULT NULL,
  `doctor_phone` varchar(100) NOT NULL,
  `doctor_account_status` enum('A','D','R') NOT NULL DEFAULT 'A' COMMENT 'A-Active,D-Draft,R-Reject',
  `inserted_ip` varchar(30) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` datetime DEFAULT NULL,
  `updated_ip` varchar(30) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `active_flag` enum('Y','N') NOT NULL DEFAULT 'Y',
  `del_flag` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_unique_id`, `doctor_id`, `doctor_email_id`, `doctor_password`, `doctor_username`, `doctor_phone`, `doctor_account_status`, `inserted_ip`, `inserted_by`, `inserted_date`, `updated_ip`, `updated_by`, `updated_date`, `active_flag`, `del_flag`) VALUES
(1, '7f03ea9dc1621', 'doctor@gmail.com', '12345', 'Dr.Nandi', '9999999999', 'A', '::1', 'Admin', '2021-05-05 08:53:09', '', '', '0000-00-00 00:00:00', 'Y', 'N'),
(2, '613c448192437', 'doctor1@gmail.com', '12345', 'Doctor 1', '8794587417', 'A', '::1', 'Admin', '2021-09-11 11:24:09', '::1', 'Admin', '2021-09-11 11:25:49', 'Y', 'Y'),
(3, '613c450867b19', 'doctor4@gmail.com', '123456', 'doctor 4', '8749654127', 'A', '::1', 'Admin', '2021-09-11 11:26:24', '::1', 'Admin', '2021-09-11 11:26:49', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_unique_id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_phone` varchar(255) NOT NULL,
  `patient_age` varchar(255) NOT NULL,
  `patient_dob` varchar(255) NOT NULL,
  `patient_account_status` enum('A','D','R') NOT NULL DEFAULT 'A' COMMENT 'A-Active,D-Draft,R-Reject',
  `inserted_ip` varchar(30) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` datetime DEFAULT NULL,
  `updated_ip` varchar(30) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `active_flag` enum('Y','N') NOT NULL DEFAULT 'Y',
  `del_flag` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_unique_id`, `patient_id`, `patient_name`, `patient_phone`, `patient_age`, `patient_dob`, `patient_account_status`, `inserted_ip`, `inserted_by`, `inserted_date`, `updated_ip`, `updated_by`, `updated_date`, `active_flag`, `del_flag`) VALUES
(1, '9V7Rhg4HR', 'Akash Das', '8797456145', '20', '19 April 1998', 'A', NULL, NULL, '2021-08-10 17:05:53', '::1', 'S.Nandi', '2021-09-11 08:08:53', 'Y', 'Y'),
(2, '613c15c54e24b', 'patient 1', '9874587489', '45', '19 june 1999', 'A', '::1', 'S.Nandi', '2021-09-11 08:04:45', NULL, NULL, NULL, 'Y', 'N'),
(3, '613c169c64662', 'patient 2', '9874587487', '12', '20 jan 1999', 'A', '::1', 'S.Nandi', '2021-09-11 08:08:20', NULL, NULL, NULL, 'Y', 'N'),
(4, '613d75cf2e345', 'patent 4', '7895412658', '23', '12-09-1996', 'A', '::1', 'S.Nandi', '2021-09-12 09:06:47', NULL, NULL, NULL, 'Y', 'N'),
(5, '613d7abd82dac', 'patient 5', '8459745975', '55', '22-03-1976', 'A', '::1', 'S.Nandi', '2021-09-12 09:27:49', '::1', 'S.Nandi', '2021-09-12 09:28:46', 'Y', 'N'),
(6, '613de5e6c858a', 'Singh', '7895412587', '36', '06-04-1995', 'A', '::1', 'S.Nandi', '2021-09-12 17:05:02', NULL, NULL, NULL, 'Y', 'N'),
(7, '613df423f231c', 'sam', '7895478547', '55', '16-05-1974', 'A', '::1', 'S.Nandi', '2021-08-13 18:05:47', NULL, NULL, NULL, 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_unique_id` int(11) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `staff_email_id` varchar(100) NOT NULL,
  `staff_password` varchar(100) NOT NULL,
  `staff_username` varchar(100) DEFAULT NULL,
  `staff_phone` varchar(100) NOT NULL,
  `staff_account_status` enum('A','D','R') NOT NULL DEFAULT 'A' COMMENT 'A-Active,D-Draft,R-Reject',
  `inserted_ip` varchar(30) DEFAULT NULL,
  `inserted_by` varchar(100) DEFAULT NULL,
  `inserted_date` datetime DEFAULT NULL,
  `updated_ip` varchar(30) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `active_flag` enum('Y','N') NOT NULL DEFAULT 'Y',
  `del_flag` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_unique_id`, `staff_id`, `staff_email_id`, `staff_password`, `staff_username`, `staff_phone`, `staff_account_status`, `inserted_ip`, `inserted_by`, `inserted_date`, `updated_ip`, `updated_by`, `updated_date`, `active_flag`, `del_flag`) VALUES
(1, '6f03ea9dc1621', 'staff@gmail.com', '12345', 'S.Nandi', '8769456478', 'A', '::1', 'Admin', '2021-05-05 08:53:09', '::1', 'Admin', '2021-09-12 06:16:58', 'Y', 'N'),
(2, '613d4e2263166', 'staff2@gmail.com', '12345', 'staff2', '8974589325', 'A', '::1', 'Admin', '2021-09-12 06:17:30', NULL, NULL, NULL, 'Y', 'N'),
(3, '613d4e473915a', 'staff3@gmail.com', '12345', 'staff3', '8974562147', 'A', '::1', 'Admin', '2021-09-12 06:18:07', '::1', 'Admin', '2021-09-12 06:18:15', 'Y', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_unique_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_unique_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_unique_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_unique_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_unique_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
