-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 10:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdbrv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `crash_list`
--

CREATE TABLE `crash_list` (
  `crashcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crashdetail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `facultycode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentcontact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`facultycode`, `departmentcode`, `departmentname`, `departmentcontact`) VALUES
('f1', 'd1', 'depfoo1', '1'),
('f1', 'd2', 'depfoo2', '2'),
('f2', 'd3', 'depfoo3', '3'),
('f2', 'd4', 'depfoo4', '4'),
('f3', 'd5', 'depfoo5', '5'),
('f4', 'd6', 'depfoo6', '6');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_list`
--

CREATE TABLE `faculty_list` (
  `facultycode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facultyname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facultycontact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_list`
--

INSERT INTO `faculty_list` (`facultycode`, `facultyname`, `facultycontact`) VALUES
('f1', 'facfoo1', '1'),
('f2', 'facfoo2', '2'),
('f3', 'facfoo3', '3'),
('f4', 'facfoo4', '4');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_27_000001_crash_list', 1),
(4, '2019_03_27_000001_faculty_list', 1),
(5, '2019_03_27_000001_parent_list', 1),
(6, '2019_03_27_000001_paymenttype_list', 1),
(7, '2019_03_27_000001_problemtype_list', 1),
(8, '2019_03_27_000001_room_list', 1),
(9, '2019_03_27_000001_subject_list', 1),
(10, '2019_03_27_000001_userrole_list', 1),
(11, '2019_03_27_000002_department_list', 1),
(12, '2019_03_27_000002_section_each_subject', 1),
(13, '2019_03_27_000003_problemreport_list', 1),
(14, '2019_03_27_000003_schedule', 1),
(15, '2019_03_27_000003_user_list', 1),
(16, '2019_03_27_000003_user_log', 1),
(17, '2019_03_27_000004_transaction_list', 1),
(18, '2019_03_27_000005_person_link_parent', 1),
(19, '2019_03_27_000005_registration_student', 1),
(20, '2019_03_27_000005_registration_teacher', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_list`
--

CREATE TABLE `parent_list` (
  `parentid` bigint(20) NOT NULL,
  `parentname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentlastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentbirthday` date NOT NULL,
  `parentcontract` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymenttype_list`
--

CREATE TABLE `paymenttype_list` (
  `paymenttypeid` int(10) UNSIGNED NOT NULL,
  `paymenttypename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymenttype_list`
--

INSERT INTO `paymenttype_list` (`paymenttypeid`, `paymenttypename`, `paymentnumber`) VALUES
(1, 'kbank', 101),
(2, 'ktb', 102),
(3, 'scb', 103),
(4, 'tmb', 104);

-- --------------------------------------------------------

--
-- Table structure for table `person_link_parent`
--

CREATE TABLE `person_link_parent` (
  `identificationno` bigint(20) NOT NULL,
  `parentid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problemreport_list`
--

CREATE TABLE `problemreport_list` (
  `problemno` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `problemtypeid` int(10) UNSIGNED NOT NULL,
  `problemdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `problemtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problemdetail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problemstatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answerdetail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problemreport_list`
--

INSERT INTO `problemreport_list` (`problemno`, `userid`, `problemtypeid`, `problemdatetime`, `problemtitle`, `problemdetail`, `problemstatus`, `answerdetail`) VALUES
(1, 1, 1, '2019-05-06 01:37:31', 'problem1', 'problemdetail1', 'waiting', NULL),
(2, 1, 1, '2019-05-12 19:17:06', 'test report work', 'rr', 'waiting', NULL),
(3, 1, 3, '2019-05-12 19:17:16', 'test report work', 'see', 'waiting', NULL),
(4, 1, 1, '2019-05-14 22:47:25', 'test report 2', 'ddd', 'waiting', NULL),
(5, 1, 2, '2019-05-14 22:47:36', 'dddsdw', 'fgrf', 'waiting', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `problemtype_list`
--

CREATE TABLE `problemtype_list` (
  `problemtypeid` int(10) UNSIGNED NOT NULL,
  `problemtypename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problemtype_list`
--

INSERT INTO `problemtype_list` (`problemtypeid`, `problemtypename`) VALUES
(1, 'registration'),
(2, 'upload'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `registration_student`
--

CREATE TABLE `registration_student` (
  `subjectsectionid` int(10) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `transactionid` int(10) UNSIGNED DEFAULT NULL,
  `dateregis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `grade` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration_student`
--

INSERT INTO `registration_student` (`subjectsectionid`, `userid`, `transactionid`, `dateregis`, `grade`) VALUES
(3, 1, NULL, '2019-05-18 08:21:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration_teacher`
--

CREATE TABLE `registration_teacher` (
  `subjectsectionid` int(10) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `dateregis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `roomcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buildingname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomseattotal` smallint(6) NOT NULL,
  `monday` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1111111',
  `tuesday` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1111111',
  `wednesday` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1111111',
  `thursday` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1111111',
  `friday` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1111111'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`roomcode`, `buildingname`, `floor`, `roomseattotal`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`) VALUES
('r1', 'b1', 'f1', 100, '2211111', '2211111', '1111111', '1111111', '1111111'),
('r2', 'b2', 'f2', 100, '0000111', '1111111', '1111111', '1111111', '1111111');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `subjectsectionid` int(10) UNSIGNED NOT NULL,
  `secorder` int(10) UNSIGNED NOT NULL,
  `secstart` datetime NOT NULL,
  `secend` datetime NOT NULL,
  `roomcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_period` int(10) NOT NULL,
  `end_period` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`subjectsectionid`, `secorder`, `secstart`, `secend`, `roomcode`, `day`, `start_period`, `end_period`) VALUES
(3, 1, '2019-05-05 00:00:00', '2019-05-05 01:00:00', 'r2', 'monday', 1, 2),
(4, 1, '2019-05-05 01:00:00', '2019-05-05 02:00:00', 'r2', 'monday', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sectioneachsubject`
--

CREATE TABLE `sectioneachsubject` (
  `subjectsectionid` int(10) UNSIGNED NOT NULL,
  `subjectcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sectionno` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `seatavailable` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectioneachsubject`
--

INSERT INTO `sectioneachsubject` (`subjectsectionid`, `subjectcode`, `sectionno`, `price`, `seatavailable`) VALUES
(3, 's2', 1, '200.00', 20),
(4, 's2', 2, '200.00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `subject_list`
--

CREATE TABLE `subject_list` (
  `subjectcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectcredit` int(11) NOT NULL,
  `subjectdetail` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_list`
--

INSERT INTO `subject_list` (`subjectcode`, `subjectname`, `subjectcredit`, `subjectdetail`) VALUES
('s2', 'subfoo2', 2, 'sdfoo2'),
('s3', 'subfoo3', 3, 'what?');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_list`
--

CREATE TABLE `transaction_list` (
  `transactionid` int(10) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymenttypeid` int(10) UNSIGNED NOT NULL,
  `paymentstatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `picturelink` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_list`
--

INSERT INTO `transaction_list` (`transactionid`, `userid`, `amount`, `semester`, `paymenttypeid`, `paymentstatus`, `paymentdate`, `picturelink`) VALUES
(1, 1, '10000.00', '2/2019', 1, 'CONFIRM', '2019-05-17 07:56:15', '1_1557033931.png'),
(2, 1, '10000.00', '2/2019', 1, 'CONFIRM', '2019-05-17 07:55:59', '1_1557034222.png'),
(3, 1, '10000.00', '2/2019', 2, 'waiting', '2019-05-05 05:37:35', '1_1557034655.png'),
(4, 1, '10.00', '0.000990589', 1, 'CONFIRM', '2019-05-17 07:56:04', '1_1557515287.jpg'),
(5, 1, '125.00', '2/2019', 2, 'waiting', '2019-05-10 19:15:36', '1_1557515736.jpg'),
(6, 1, '12345.00', '2/2019', 2, 'waiting', '2019-05-11 04:14:26', '1_1557548066.jpg'),
(7, 1, '12345.00', '2/2019', 2, 'waiting', '2019-05-11 04:18:47', '1_1557548327.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userrole_list`
--

CREATE TABLE `userrole_list` (
  `userroleid` tinyint(1) NOT NULL,
  `userrolename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userrole_list`
--

INSERT INTO `userrole_list` (`userroleid`, `userrolename`) VALUES
(1, 'student'),
(2, 'teacher'),
(3, 'staff'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userroleid` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `userroleid`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'foo1', 'Foo1@example.com', NULL, '$2y$10$QdU1P6Ue5o3ihgGPNdj2a.srNA8oKQtKWJ7DFtecVINytP5M2GWzm', 1, NULL, '2019-04-26 07:57:13', '2019-04-26 07:57:13'),
(2, 'foo2', 'Foo2@example.com', NULL, '$2y$10$64kF/HUKl2s1RY5wGqKoH.rQj1tI3Ee2uU8mfABny.jBUmXhJT4qq', 2, NULL, '2019-04-26 08:41:16', '2019-04-26 08:41:16'),
(3, 'foo3', 'Foo3@example.com', NULL, '$2y$10$9I5k8IvxkHUSdqPzw2LUauDPnV48EAG9Fqd0ZDK3hWjN8oKdNv36q', 3, NULL, '2019-04-26 08:41:36', '2019-04-26 08:41:36'),
(4, 'teacher1', 'teacher1@example.com', NULL, '$2y$10$sj55R/bj0gXfToD0YvUTt.ih48cwVyWExKhF9ktZJ6TanBw5gVZ8W', 2, NULL, '2019-05-17 02:46:15', '2019-05-17 02:46:15'),
(5, 'teacher2', 'teacher2@example.com', NULL, '$2y$10$rgbJkAdTeYRFdVYZSH29TuaARUFXi/U3v2FosqNVaZBp3XFAWc/om', 2, NULL, '2019-05-17 03:06:30', '2019-05-17 03:06:30'),
(6, 'teacher3', 'teacher3@example.com', NULL, '$2y$10$qqpKywEstCFjZetGJ9WSFeb8VU1TTcDZW1YxtvpC/sSaZNBGvEGBq', 2, NULL, '2019-05-17 03:09:30', '2019-05-17 03:09:30'),
(7, 'teacher4', 'teacher4@example.com', NULL, '$2y$10$RGhWs.q9GVWoUhIJ7dcrCuwgrgvy1PrD2IIr7LuMeafEvUp/McU1C', 2, NULL, '2019-05-17 03:12:24', '2019-05-17 03:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `identificationno` bigint(20) NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `titlename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bloodtype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `race` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationnality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdistrict` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departmentcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usercontact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpax` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`identificationno`, `userid`, `titlename`, `firstname`, `lastname`, `gender`, `bloodtype`, `birthdate`, `race`, `religion`, `nationnality`, `address`, `postcode`, `province`, `district`, `subdistrict`, `departmentcode`, `usercontact`, `gpax`) VALUES
(10001, 1, 'mr', 'fn1', 'ln1', 'male', 'a', '2019-04-01', 'r1', 'r1', 'n1', 'a1', 1, 'p1', 'd1', 's1', 'd1', '1', '1.00'),
(10002, 2, 'mrs', 'fn2', 'ln2', 'female', 'b', '2019-04-10', 'r2', 'r2', 'n2', 'a2', 2, 'p2', 'd2', 's2', 'd2', '2', '2.00'),
(10003, 3, 'mr', 'fn3', 'ln3', 'male', 'ab', '2019-05-02', 'r3', 'r3', 'n3', 'a3', 3, 'p3', 'd3', 's3', NULL, '3', NULL),
(10004, 4, 'mrs', 'jenny', 'ynnej', 'female', 'AB', '2019-05-03', 'thai', 'buddism', 'thai', 'a4', 4, 'p4', 'd4', 's4', 'd1', 'u4', NULL),
(10005, 5, 'mr', 'david', 'divad', 'male', 'A', '2018-10-01', 'thai', 'chris', 'thai', 'a5', 5, 'p5', 'd5', 's5', 'd3', 'u5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `logno` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `userdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usedactivity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crashcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crash_list`
--
ALTER TABLE `crash_list`
  ADD PRIMARY KEY (`crashcode`);

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`departmentcode`),
  ADD KEY `department_list_facultycode_foreign` (`facultycode`);

--
-- Indexes for table `faculty_list`
--
ALTER TABLE `faculty_list`
  ADD PRIMARY KEY (`facultycode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_list`
--
ALTER TABLE `parent_list`
  ADD PRIMARY KEY (`parentid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymenttype_list`
--
ALTER TABLE `paymenttype_list`
  ADD PRIMARY KEY (`paymenttypeid`);

--
-- Indexes for table `person_link_parent`
--
ALTER TABLE `person_link_parent`
  ADD PRIMARY KEY (`identificationno`,`parentid`),
  ADD KEY `person_link_parent_parentid_foreign` (`parentid`);

--
-- Indexes for table `problemreport_list`
--
ALTER TABLE `problemreport_list`
  ADD PRIMARY KEY (`problemno`),
  ADD KEY `problemreport_list_problemtypeid_foreign` (`problemtypeid`),
  ADD KEY `problemreport_list_userid_foreign` (`userid`);

--
-- Indexes for table `problemtype_list`
--
ALTER TABLE `problemtype_list`
  ADD PRIMARY KEY (`problemtypeid`);

--
-- Indexes for table `registration_student`
--
ALTER TABLE `registration_student`
  ADD PRIMARY KEY (`subjectsectionid`,`userid`) USING BTREE,
  ADD KEY `registration_student_transactionid_foreign` (`transactionid`),
  ADD KEY `registration_student_userid_foreign` (`userid`);

--
-- Indexes for table `registration_teacher`
--
ALTER TABLE `registration_teacher`
  ADD PRIMARY KEY (`subjectsectionid`,`userid`),
  ADD KEY `registration_teacher_userid_foreign` (`userid`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
  ADD PRIMARY KEY (`roomcode`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`subjectsectionid`,`secorder`),
  ADD KEY `schedule_roomcode_foreign` (`roomcode`);

--
-- Indexes for table `sectioneachsubject`
--
ALTER TABLE `sectioneachsubject`
  ADD PRIMARY KEY (`subjectsectionid`),
  ADD KEY `sectioneachsubject_subjectcode_foreign` (`subjectcode`);

--
-- Indexes for table `subject_list`
--
ALTER TABLE `subject_list`
  ADD PRIMARY KEY (`subjectcode`);

--
-- Indexes for table `transaction_list`
--
ALTER TABLE `transaction_list`
  ADD PRIMARY KEY (`transactionid`),
  ADD KEY `transaction_list_paymenttypeid_foreign` (`paymenttypeid`),
  ADD KEY `transaction_list_userid_foreign` (`userid`);

--
-- Indexes for table `userrole_list`
--
ALTER TABLE `userrole_list`
  ADD PRIMARY KEY (`userroleid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `userroleid` (`userroleid`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`identificationno`),
  ADD KEY `user_list_departmentcode_foreign` (`departmentcode`),
  ADD KEY `user_list_userid_foreign` (`userid`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`logno`),
  ADD KEY `user_log_crashcode_foreign` (`crashcode`),
  ADD KEY `user_log_userid_foreign` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `paymenttype_list`
--
ALTER TABLE `paymenttype_list`
  MODIFY `paymenttypeid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `problemreport_list`
--
ALTER TABLE `problemreport_list`
  MODIFY `problemno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `problemtype_list`
--
ALTER TABLE `problemtype_list`
  MODIFY `problemtypeid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sectioneachsubject`
--
ALTER TABLE `sectioneachsubject`
  MODIFY `subjectsectionid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_list`
--
ALTER TABLE `transaction_list`
  MODIFY `transactionid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `logno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department_list`
--
ALTER TABLE `department_list`
  ADD CONSTRAINT `department_list_facultycode_foreign` FOREIGN KEY (`facultycode`) REFERENCES `faculty_list` (`facultycode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `person_link_parent`
--
ALTER TABLE `person_link_parent`
  ADD CONSTRAINT `person_link_parent_identificationno_foreign` FOREIGN KEY (`identificationno`) REFERENCES `user_list` (`identificationno`),
  ADD CONSTRAINT `person_link_parent_parentid_foreign` FOREIGN KEY (`parentid`) REFERENCES `parent_list` (`parentid`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`subjectsectionid`) REFERENCES `sectioneachsubject` (`subjectsectionid`);

--
-- Constraints for table `sectioneachsubject`
--
ALTER TABLE `sectioneachsubject`
  ADD CONSTRAINT `sectioneachsubject_ibfk_1` FOREIGN KEY (`subjectcode`) REFERENCES `subject_list` (`subjectcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_list`
--
ALTER TABLE `user_list`
  ADD CONSTRAINT `user_list_ibfk_1` FOREIGN KEY (`departmentcode`) REFERENCES `department_list` (`departmentcode`),
  ADD CONSTRAINT `user_list_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
