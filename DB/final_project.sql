-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 01:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `pp` varchar(40) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `division` varchar(25) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `two_factor` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `registered_by` int(11) NOT NULL,
  `when_login` tinyint(1) NOT NULL,
  `login` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `regi_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `pp`, `first_name`, `last_name`, `email`, `division`, `password`, `two_factor`, `role`, `registered_by`, `when_login`, `login`, `is_deleted`, `last_login`, `regi_date`) VALUES
(1000, '624f34f7b8250-1649358071.png', 'Royan', 'Harsha', 'gadse202f-009@student.nibm.lk', 'Akmeemana', 'f865b53623b121fd34ee5426c792e5c33af8c227', NULL, 1, 0, 1, 1, 0, '2022-11-30 15:52:19', '2021-02-06 07:02:54'),
(1028, '624f35c7db562-1649358279.png', 'Gangul', 'Kalhara Rathnayaka', 'gangulkalhara@gmail.com', 'Akmeemana', 'f665414c2c78e68c55baf0fdad880e6354c943f8', NULL, 2, 1000, 1, 1, 0, '2022-04-08 00:25:38', '2022-04-07 18:44:31'),
(1026, '624f2afda185f-1649355517.jpg', 'Pavithra', ' Chamod', 'roguerevengerpcj2@gmail.com', 'Akmeemana', '8e04d92d5344a4e4a7bdac8e7d16e06ada3c9f66', NULL, 2, 1000, 1, 1, 0, '2022-04-07 23:29:54', '2022-04-07 00:56:27'),
(1029, 'admin-df-img.png', 'nibm', 'galle', 'alexlanka99@gmail.com', 'Akmeemana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 1, 1000, 1, 1, 0, '2022-06-11 02:52:15', '2022-04-08 07:14:38'),
(1033, 'admin-df-img.png', 'Jhon', 'Abraham', 'royanharsha6@gmail.com', 'Akmeemana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 3, 1000, 1, 1, 0, '2022-08-06 12:20:58', '2022-07-26 05:50:49'),
(1032, 'admin-df-img.png', 'TEST', 'User', 'www.royanharsha6@gmail.com', 'Akmeemana', '3cb0fc2ce4a8c8d0269a70a345cc047da4071dd3', NULL, 3, 1000, 1, 1, 0, '2022-07-26 10:40:20', '2022-07-24 09:36:27'),
(1034, 'admin-df-img.png', 'Danidu', 'Sennath', 'danidusennath@gmail.com', 'Ginigathhena', '404a5094fae730f60f00d3cfc4dfa59260669a3d', NULL, 1, 1000, 0, 0, 0, '2022-11-30 13:48:18', '2022-11-30 08:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `api_request`
--

CREATE TABLE `api_request` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_owner_name` varchar(50) NOT NULL,
  `company_email_address` varchar(50) NOT NULL,
  `company_phone_number` int(12) NOT NULL,
  `why_req` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_request`
--

INSERT INTO `api_request` (`id`, `company_name`, `company_owner_name`, `company_email_address`, `company_phone_number`, `why_req`, `date`) VALUES
(128, 'NIBM', 'NIBM Owner', 'nibm@gmail.com', 2147483647, 'i Need api system', '2022-04-08 07:07:07'),
(129, 'Nethsara', 'Nethsara', 'nethsara@gmail.com', 771234567, 'I Need an API for our company.', '2022-07-24 10:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `subject`, `message`, `date`) VALUES
(129, 'jhon', 'Abraham', 'jhon@gmail.com', 'TEST SUBJECT', 'Message Sent Test', '2022-07-24 09:14:39'),
(130, 'Royan', 'Harsha', 'alexlanka99@gmail.com', 'New Subject', 'TEST', '2022-07-26 06:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `noti` varchar(400) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `noti`, `time`) VALUES
(530, 'Main Website temporarily down By Royan', '2022-04-07 18:47:55'),
(531, 'Main Website Up By Pavithra', '2022-04-07 18:51:54'),
(532, 'Main Website temporarily down By Royan', '2022-04-08 06:40:26'),
(533, 'Main Website Up By Royan', '2022-04-08 06:40:59'),
(534, 'New Request For API BY NIBM', '2022-04-08 07:07:07'),
(535, 'Main Website temporarily down By Royan', '2022-04-08 07:19:31'),
(536, 'Main Website Up By Royan', '2022-04-15 15:44:24'),
(537, 'New Contact Messages Send By jhon', '2022-07-24 09:14:39'),
(538, 'Main Website temporarily down By Royan', '2022-07-24 09:16:37'),
(539, 'Main Website Up By TEST', '2022-07-24 09:44:43'),
(540, 'New Request For API BY Nethsara', '2022-07-24 10:06:13'),
(541, 'New Contact Messages Send By Royan', '2022-07-26 06:41:54'),
(542, 'Main Website temporarily down By Royan', '2022-08-04 06:51:08'),
(543, 'Main Website Up By Royan', '2022-08-04 06:51:24'),
(544, 'Main Website temporarily down By Royan', '2022-11-30 08:16:55'),
(545, 'Main Website Up By Royan', '2022-11-30 08:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `system_name` varchar(25) NOT NULL,
  `main_site_is_on` tinyint(4) NOT NULL,
  `website_url` longtext NOT NULL,
  `api_system_url` longtext NOT NULL,
  `doctors_dashboard_url` longtext NOT NULL,
  `main_dashboard_url` longtext NOT NULL,
  `email` longtext NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_name`, `main_site_is_on`, `website_url`, `api_system_url`, `doctors_dashboard_url`, `main_dashboard_url`, `email`, `last_update`) VALUES
(1, 'Spreading Of Covid-19', 0, 'http://localhost/final_project/', 'http://localhost/final_project/api/', 'http://localhost/final_project/admin/', 'http://localhost/final_project/admin/', 'srilankasoc2019@gmail.com', '2022-11-30 13:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` int(11) NOT NULL,
  `aleji` longtext DEFAULT NULL,
  `registered_by` int(11) NOT NULL,
  `is_vaccinated` tinyint(4) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `regi_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nic`, `first_name`, `last_name`, `email`, `phone_number`, `aleji`, `registered_by`, `is_vaccinated`, `is_deleted`, `regi_date`) VALUES
(1036, '200032245765', 'Gangul', 'Kalhara Rathnayake', 'gangulkalhara@gmail.com', 777707291, NULL, 1032, 1, 0, '2022-07-24 09:54:28'),
(1031, '200203004591', 'Pavithra', 'Chamod', 'roguerevengerpcj2@gmail.com', 719426126, NULL, 1000, 1, 0, '2022-04-07 18:41:46'),
(1033, '992924969', 'Maleesha', 'vishwajith', 'slmaleesha23@gmail.com', 789276258, NULL, 1000, 1, 0, '2022-04-15 15:43:48'),
(1034, '991831037v', 'Navod', 'Tharidulal', 'navodtharindulal@gmail.com', 714524994, NULL, 1000, 1, 0, '2022-06-11 08:02:16'),
(1035, '993002321', 'Abeetha', 'Jayaveera', 'abeethakawshalya@gmail.com', 772805692, NULL, 1000, 1, 0, '2022-07-18 06:25:25'),
(1039, '200201800671', 'Danidu', 'Sennath', 'danidusennath@gmail.com', 764357415, NULL, 1000, 1, 0, '2022-07-26 06:21:44'),
(1040, '200066200286', 'Amna', 'Haneef', 'amnahaneefh@gmail.com', 777707291, NULL, 1000, 1, 0, '2022-08-04 06:52:46'),
(1041, '200310012654', 'Royan', 'Harsha', 'www.royanharsha6@gmail.com', 765850733, NULL, 1000, 1, 0, '2022-08-06 05:28:49'),
(1042, '973061208v', 'Mohmad', 'Ilham', 'im.ilhamk@gmail.com', 774328810, NULL, 1000, 1, 0, '2022-11-30 10:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinated_users`
--

CREATE TABLE `vaccinated_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dose_id` int(11) NOT NULL,
  `vaccinated_by` int(11) NOT NULL,
  `regi_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccinated_users`
--

INSERT INTO `vaccinated_users` (`id`, `user_id`, `dose_id`, `vaccinated_by`, `regi_date`) VALUES
(1041, 1031, 1027, 1000, '2022-04-07 18:42:16'),
(1040, 1031, 1026, 1000, '2022-04-07 18:42:13'),
(1039, 1031, 1025, 1000, '2022-04-07 18:42:10'),
(1065, 1042, 1025, 1000, '2022-11-30 10:08:15'),
(1053, 1036, 1026, 1032, '2022-07-24 09:55:03'),
(1052, 1036, 1025, 1032, '2022-07-24 09:54:34'),
(1058, 1039, 1025, 1000, '2022-07-26 06:21:57'),
(1064, 1041, 1025, 1000, '2022-08-06 05:32:04'),
(1044, 1033, 1025, 1000, '2022-04-15 15:43:57'),
(1045, 1034, 1025, 1000, '2022-06-11 08:02:27'),
(1046, 1034, 1026, 1000, '2022-06-11 08:02:31'),
(1047, 1034, 1027, 1000, '2022-06-11 08:02:35'),
(1049, 1035, 1025, 1000, '2022-07-18 06:25:29'),
(1050, 1035, 1026, 1000, '2022-07-18 06:25:37'),
(1051, 1035, 1027, 1000, '2022-07-18 06:25:41'),
(1059, 1039, 1026, 1000, '2022-07-26 06:30:03'),
(1060, 1039, 1027, 1000, '2022-07-26 06:30:07'),
(1061, 1040, 1025, 1000, '2022-08-04 06:52:59'),
(1062, 1040, 1026, 1000, '2022-08-04 06:53:02'),
(1063, 1040, 1027, 1000, '2022-08-04 06:53:05'),
(1066, 1042, 1026, 1000, '2022-11-30 10:08:18'),
(1067, 1042, 1027, 1000, '2022-11-30 10:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_dose`
--

CREATE TABLE `vaccination_dose` (
  `id` int(11) NOT NULL,
  `dose_name` varchar(50) NOT NULL,
  `add_by` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  `regi_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccination_dose`
--

INSERT INTO `vaccination_dose` (`id`, `dose_name`, `add_by`, `is_deleted`, `regi_date`) VALUES
(1025, '1 st dose', 1000, 0, '2021-02-06 07:02:54'),
(1026, '2 nd dose', 1000, 0, '2021-02-06 07:02:54'),
(1027, '3 rd dose', 1000, 0, '2021-02-06 07:02:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_request`
--
ALTER TABLE `api_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccinated_users`
--
ALTER TABLE `vaccinated_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccination_dose`
--
ALTER TABLE `vaccination_dose`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1035;

--
-- AUTO_INCREMENT for table `api_request`
--
ALTER TABLE `api_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=546;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1043;

--
-- AUTO_INCREMENT for table `vaccinated_users`
--
ALTER TABLE `vaccinated_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1068;

--
-- AUTO_INCREMENT for table `vaccination_dose`
--
ALTER TABLE `vaccination_dose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
