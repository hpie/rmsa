-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 05:19 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `rmsa_employee_users`
--

CREATE TABLE IF NOT EXISTS `rmsa_employee_users` (
  `rmsa_user_id` bigint(20) NOT NULL,
  `rmsa_user_employee_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Populated if it is an employee',
  `rmsa_user_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User first name',
  `rmsa_user_middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User middle name',
  `rmsa_user_last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User last name',
  `rmsa_user_nick_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nick name of the user',
  `rmsa_user_gender` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Gender of the user - M, F, O',
  `rmsa_user_DOB` date NOT NULL COMMENT 'Date of birth of the user',
  `rmsa_user_father_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User father name',
  `rmsa_user_class` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User class',
  `rmsa_user_mobile_no` bigint(20) DEFAULT NULL COMMENT 'User subject id',
  `rmsa_user_email_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id',
  `rmsa_user_email_password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id password encrypted',
  `rmsa_user_password_salt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id password salt',
  `rmsa_user_password_question` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id password security question',
  `rmsa_user_password_answer` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id password security question answer',
  `rmsa_user_activation_key` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User id activation key',
  `rmsa_user_photo_path` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User photo - place where it is saved',
  `rmsa_user_role_id` int(11) DEFAULT NULL,
  `rmsa_user_email_verified_status` int(11) DEFAULT NULL COMMENT 'User email id verification 0,1',
  `rmsa_user_locked_status` int(11) DEFAULT NULL COMMENT 'User id lock status 0,1',
  `rmsa_user_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_user_activation_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rmsa_school_id` bigint(20) NOT NULL COMMENT 'User school id',
  `rmsa_sub_district_id` bigint(20) NOT NULL COMMENT 'User school sub-district id',
  `rmsa_district_id` bigint(20) NOT NULL COMMENT 'User school district id',
  `rmsa_subject_id` bigint(20) DEFAULT NULL COMMENT 'User subject id',
  `rmsa_department_id` bigint(20) DEFAULT NULL COMMENT 'User department id',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rmsa_employee_users_log`
--

CREATE TABLE IF NOT EXISTS `rmsa_employee_users_log` (
  `rmsa_user_id` bigint(20) NOT NULL,
  `last_login_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_password_change_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `failed_password_attempt_count` int(11) DEFAULT NULL,
  `failed_password_attempt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `failed_secure_answer_count` int(11) DEFAULT NULL,
  `failed_secure_answer_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_login_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_logged_in` int(11) DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rmsa_student_users`
--

CREATE TABLE IF NOT EXISTS `rmsa_student_users` (
  `rmsa_user_id` bigint(20) NOT NULL,
  `rmsa_user_roll_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Populated if it is an employee',
  `rmsa_user_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User first name',
  `rmsa_user_middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User middle name',
  `rmsa_user_last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User last name',
  `rmsa_user_nick_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nick name of the user',
  `rmsa_user_gender` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Gender of the user - M, F, O',
  `rmsa_user_DOB` date NOT NULL COMMENT 'Date of birth of the user',
  `rmsa_user_father_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User father name',
  `rmsa_user_class` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User class',
  `rmsa_user_mobile_no` bigint(20) DEFAULT NULL COMMENT 'User subject id',
  `rmsa_user_email_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id',
  `rmsa_user_email_password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id password encrypted',
  `rmsa_user_password_salt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id password salt',
  `rmsa_user_password_question` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id password security question',
  `rmsa_user_password_answer` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User email id password security question answer',
  `rmsa_user_activation_key` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User id activation key',
  `rmsa_user_photo_path` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'User photo - place where it is saved',
  `rmsa_user_role_id` int(11) DEFAULT NULL,
  `rmsa_user_email_verified_status` int(11) DEFAULT NULL COMMENT 'User email id verification 0,1',
  `rmsa_user_locked_status` int(11) DEFAULT NULL COMMENT 'User id lock status 0,1',
  `rmsa_user_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ACTIVE or REMOVED',
  `rmsa_user_activation_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rmsa_school_id` bigint(20) NOT NULL COMMENT 'User school id',
  `rmsa_sub_district_id` bigint(20) NOT NULL COMMENT 'User school sub-district id',
  `rmsa_district_id` bigint(20) NOT NULL COMMENT 'User school district id',
  `rmsa_subject_id` bigint(20) DEFAULT NULL COMMENT 'User subject id',
  `rmsa_department_id` bigint(20) DEFAULT NULL COMMENT 'User department id',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rmsa_student_users_log`
--

CREATE TABLE IF NOT EXISTS `rmsa_student_users_log` (
  `rmsa_user_id` bigint(20) NOT NULL,
  `last_login_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_password_change_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `failed_password_attempt_count` int(11) DEFAULT NULL,
  `failed_password_attempt_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `failed_secure_answer_count` int(11) DEFAULT NULL,
  `failed_secure_answer_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_login_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_logged_in` int(11) DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modified_dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rmsa_employee_users`
--
ALTER TABLE `rmsa_employee_users`
  ADD PRIMARY KEY (`rmsa_user_id`);

--
-- Indexes for table `rmsa_student_users`
--
ALTER TABLE `rmsa_student_users`
  ADD PRIMARY KEY (`rmsa_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rmsa_employee_users`
--
ALTER TABLE `rmsa_employee_users`
  MODIFY `rmsa_user_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rmsa_student_users`
--
ALTER TABLE `rmsa_student_users`
  MODIFY `rmsa_user_id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




ALTER TABLE `rmsa_employee_users` ADD `rmsa_employee_login_active` INT(1) NOT NULL DEFAULT '0' COMMENT 'will be 1 if logged in and active' AFTER `rmsa_user_locked_status`;


ALTER TABLE `rmsa_student_users` ADD `rmsa_student_login_active` INT(1) NOT NULL DEFAULT '0' COMMENT 'will be 1 if logged in and active' AFTER `rmsa_user_locked_status`;