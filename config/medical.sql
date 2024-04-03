-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 06:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `email`, `password`, `verified`) VALUES
(1, 'admin1@xyz.com', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_info`
--

CREATE TABLE `appointment_info` (
  `id` int(11) NOT NULL,
  `patientname` varchar(255) NOT NULL,
  `patientemail` varchar(255) NOT NULL,
  `patientphone` varchar(255) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `doctoremail` varchar(255) NOT NULL,
  `doctorphone` varchar(255) NOT NULL,
  `doctorspeciality` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `create_at` varchar(255) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `id` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `maritalstatus` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`id`, `email`, `password`, `fullname`, `gender`, `dob`, `phone`, `blood`, `religion`, `occupation`, `nationality`, `maritalstatus`, `address`, `speciality`, `image`, `active`, `verified`) VALUES
(1, 'doctor1@xyz.com', '1', 'Doctor 1', 'male', '2023-09-21', '123456789', 'A+', 'Islam', 'Doctor', 'Bangladeshi', 'married', 'Dhaka', 'Family Medicine', '', 1, 0),
(2, 'doctor2@xyz.com', '1', 'Doctor 2', 'female', '2023-09-21', '123456789', 'A-', 'Islam', 'Doctor', 'Bangladeshi', 'married', 'Dhaka', 'Internal Medicine', '', 0, 0),
(3, 'doctor3@xyz.com', '1', 'Doctor 3', 'male', '2023-09-21', '123456789', 'B+', 'Islam', 'Doctor', 'Bangladeshi', 'notmarried', 'Dhaka', 'Cardiology', '', 1, 1),
(4, 'doctor4@xyz.com', '1', 'Doctor 4', 'female', '2023-09-21', '123456789', 'B-', 'Islam', 'Doctor', 'Bangladeshi', 'married', 'Dhaka', 'Homeopathy', '', 0, 0),
(5, 'doctor5@xyz.com', '1', 'Doctor 5', 'male', '2023-09-21', '123456789', 'O+', 'Islam', 'Doctor', 'Bangladeshi', 'married', 'Dhaka', 'Rheumatology', '', 1, 1),
(6, 'doctor6@xyz.com', '1', 'Doctor 6', 'female', '2023-09-21', '123456789', 'O-', 'Islam', 'Doctor', 'Bangladeshi', 'notmarried', 'Dhaka', 'Plastic Surgery', '', 0, 1),
(7, 'doctor7@xyz.com', '1', 'Doctor 7', 'male', '2023-09-21', '123456789', 'AB+', 'Islam', 'Doctor', 'Bangladeshi', 'married', 'Dhaka', 'Hematology', '', 1, 1),
(8, 'doctor8@xyz.com', '1', 'Doctor 8', 'female', '2023-09-21', '123456789', 'AB-', 'Islam', 'Doctor', 'Bangladeshi', 'notmarried', 'Dhaka', 'Nephrology', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `maritalstatus` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL,
  `v_code` varchar(255) NOT NULL,
  `resettoken` varchar(255) NOT NULL,
  `resettokenexpire` varchar(255) NOT NULL,
  `create_at` varchar(255) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `email`, `password`, `fullname`, `gender`, `dob`, `phone`, `blood`, `religion`, `occupation`, `nationality`, `maritalstatus`, `address`, `prescription`, `image`, `verified`, `v_code`, `resettoken`, `resettokenexpire`, `create_at`, `update_at`) VALUES
(1, 'patient1@xyz.com', '$2y$10$nbXZZg9/EtG8cO.vYntTQuQrIN0pgv1MgNwRxiGM7tlnyhgSKsjIG', 'Patient 1', 'male', '2023-10-02', '123456789', 'A+', 'Islam', 'Student', 'Bangladeshi', 'married', 'Dhaka', '65633379990541.55157331.jpg', '', 1, '', '', '', '', ''),
(2, 'patient2@xyz.com', '$2y$10$nbXZZg9/EtG8cO.vYntTQuQrIN0pgv1MgNwRxiGM7tlnyhgSKsjIG', 'Patient 2', 'male', '2001-02-03', '123456789', 'A-', 'Islam', 'Student', 'Bangladeshi', 'notmarried', 'Dhaka', 'patient1.jpg', '', 1, '', '', '', '', ''),
(3, 'patient3@xyz.com', '$2y$10$nbXZZg9/EtG8cO.vYntTQuQrIN0pgv1MgNwRxiGM7tlnyhgSKsjIG', 'Patient 3', 'female', '2001-02-03', '123456789', 'B+', 'Islam', 'Student', 'Bangladeshi', 'notmarried', 'Dhaka', 'patient1.jpg', '', 1, '', '', '', '', ''),
(4, 'patient4@xyz.com', '$2y$10$nbXZZg9/EtG8cO.vYntTQuQrIN0pgv1MgNwRxiGM7tlnyhgSKsjIG', 'Patient 4', 'male', '2001-02-03', '123456789', 'B-', 'Islam', 'Student', 'Bangladeshi', 'married', 'Dhaka', '', '', 1, '', '', '', '', ''),
(5, 'patient5@xyz.com', '$2y$10$nbXZZg9/EtG8cO.vYntTQuQrIN0pgv1MgNwRxiGM7tlnyhgSKsjIG', 'Patient 5', 'female', '2001-02-03', '123456789', 'O+', 'Islam', 'Student', 'Bangladeshi', 'notmarried', 'Dhaka', 'patient1.jpg', '', 1, '', '', '', '', ''),
(6, 'patient6@xyz.com', '$2y$10$nbXZZg9/EtG8cO.vYntTQuQrIN0pgv1MgNwRxiGM7tlnyhgSKsjIG', 'Patient 6', 'male', '2001-02-03', '123456789', 'O-', 'Islam', 'Student', 'Bangladeshi', 'married', 'Dhaka', '', '', 1, '', '', '', '', ''),
(7, 'patient7@xyz.com', '$2y$10$nbXZZg9/EtG8cO.vYntTQuQrIN0pgv1MgNwRxiGM7tlnyhgSKsjIG', 'Patient 7', 'female', '2001-02-03', '123456789', 'AB-', 'Islam', 'Student', 'Bangladeshi', 'notmarried', 'Dhaka', 'patient1.jpg', '', 1, '', '', '', '', ''),
(8, 'patient8@xyz.com', '$2y$10$nbXZZg9/EtG8cO.vYntTQuQrIN0pgv1MgNwRxiGM7tlnyhgSKsjIG', 'Patient 8', 'female', '2001-02-03', '123456789', 'AB+', 'Islam', 'Student', 'Bangladeshi', 'married', 'Dhaka', '', '', 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `quote_info`
--

CREATE TABLE `quote_info` (
  `id` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `create_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_info`
--

CREATE TABLE `website_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `about` longtext NOT NULL,
  `description` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `maintainance` varchar(10) NOT NULL DEFAULT 'off',
  `create_at` varchar(255) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_info`
--

INSERT INTO `website_info` (`id`, `name`, `email`, `phone`, `favicon`, `logo`, `about`, `description`, `keywords`, `author`, `facebook`, `instagram`, `twitter`, `youtube`, `maintainance`, `create_at`, `update_at`) VALUES
(1, 'Medical Health Care', '', '', '', '', '', 'Hello World', 'Hello, World', 'PHP Website', '', '', '', '', 'off', '2024-03-30 00:43:10', '2024-03-30 00:43:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_info`
--
ALTER TABLE `appointment_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_info`
--
ALTER TABLE `quote_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_info`
--
ALTER TABLE `website_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_info`
--
ALTER TABLE `appointment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `quote_info`
--
ALTER TABLE `quote_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
