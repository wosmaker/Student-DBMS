-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 08:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdbr2`
--

-- --------------------------------------------------------

--
-- Table structure for table `crash_list`
--

CREATE TABLE `crash_list` (
  `CrashCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CrashDetail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `FacultyCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DepartmentCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DepartmentName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DepartmentContact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`FacultyCode`, `DepartmentCode`, `DepartmentName`, `DepartmentContact`) VALUES
('F1', 'D1', 'DepFoo1', '1'),
('F1', 'D2', 'DepFoo2', '2'),
('F2', 'D3', 'DepFoo3', '3'),
('F2', 'D4', 'DepFoo4', '4'),
('F3', 'D5', 'DepFoo5', '5'),
('F4', 'D6', 'DepFoo6', '6');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_list`
--

CREATE TABLE `faculty_list` (
  `FacultyCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FacultyName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FacultyContact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_list`
--

INSERT INTO `faculty_list` (`FacultyCode`, `FacultyName`, `FacultyContact`) VALUES
('F1', 'FacFoo1', '1'),
('F2', 'FacFoo2', '2'),
('F3', 'FacFoo3', '3'),
('F4', 'FacFoo4', '4');

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
  `ParentID` bigint(20) NOT NULL,
  `ParentName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ParentLastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ParentBirthday` date NOT NULL,
  `ParentContract` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
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
  `PaymentTypeID` int(10) UNSIGNED NOT NULL,
  `PaymentTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PaymentNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymenttype_list`
--

INSERT INTO `paymenttype_list` (`PaymentTypeID`, `PaymentTypeName`, `PaymentNumber`) VALUES
(1, 'Kbank', 101),
(2, 'KTB', 102),
(3, 'SCB', 103),
(4, 'TMB', 104);

-- --------------------------------------------------------

--
-- Table structure for table `person_link_parent`
--

CREATE TABLE `person_link_parent` (
  `IdentificationNo` bigint(20) NOT NULL,
  `ParentID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problemreport_list`
--

CREATE TABLE `problemreport_list` (
  `ProblemNo` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `ProblemTypeID` int(10) UNSIGNED NOT NULL,
  `ProblemDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ProblemTitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProblemDetail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProblemStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AnswerDetail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problemreport_list`
--

INSERT INTO `problemreport_list` (`ProblemNo`, `UserID`, `ProblemTypeID`, `ProblemDateTime`, `ProblemTitle`, `ProblemDetail`, `ProblemStatus`, `AnswerDetail`) VALUES
(1, 1, 1, '2019-05-06 01:37:31', 'Problem1', 'ProblemDetail1', 'waiting', NULL),
(2, 1, 1, '2019-05-12 19:17:06', 'test report work', 'rr', 'waiting', NULL),
(3, 1, 3, '2019-05-12 19:17:16', 'test report work', 'see', 'waiting', NULL),
(4, 1, 1, '2019-05-14 22:47:25', 'test report 2', 'ddd', 'waiting', NULL),
(5, 1, 2, '2019-05-14 22:47:36', 'dddsdw', 'fgrf', 'waiting', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `problemtype_list`
--

CREATE TABLE `problemtype_list` (
  `ProblemTypeID` int(10) UNSIGNED NOT NULL,
  `ProblemTypeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problemtype_list`
--

INSERT INTO `problemtype_list` (`ProblemTypeID`, `ProblemTypeName`) VALUES
(1, 'Registration'),
(2, 'Upload'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `registration_student`
--

CREATE TABLE `registration_student` (
  `SubjectSectionID` int(10) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `TransactionID` int(10) UNSIGNED DEFAULT NULL,
  `DateRegis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Grade` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration_student`
--

INSERT INTO `registration_student` (`SubjectSectionID`, `UserID`, `TransactionID`, `DateRegis`, `Grade`) VALUES
(1, 1, NULL, '2019-05-13 05:22:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration_teacher`
--

CREATE TABLE `registration_teacher` (
  `SubjectSectionID` int(10) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `DateRegis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `RoomCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BuildingName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Floor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RoomSeatTotal` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`RoomCode`, `BuildingName`, `Floor`, `RoomSeatTotal`) VALUES
('R1', 'B1', 'F1', 100),
('R2', 'B2', 'F2', 100);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `SubjectSectionID` int(10) UNSIGNED NOT NULL,
  `SecOrder` int(10) UNSIGNED NOT NULL,
  `SecStart` datetime NOT NULL,
  `SecEnd` datetime NOT NULL,
  `RoomCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`SubjectSectionID`, `SecOrder`, `SecStart`, `SecEnd`, `RoomCode`) VALUES
(1, 1, '2019-04-01 00:00:00', '2019-04-01 01:00:00', 'R1'),
(1, 2, '2019-04-01 01:00:00', '2019-04-01 02:00:00', 'R1'),
(3, 1, '2019-05-05 00:00:00', '2019-05-05 01:00:00', 'R2'),
(4, 2, '2019-05-05 01:00:00', '2019-05-05 02:00:00', 'R2');

-- --------------------------------------------------------

--
-- Table structure for table `sectioneachsubject`
--

CREATE TABLE `sectioneachsubject` (
  `SubjectSectionID` int(10) UNSIGNED NOT NULL,
  `SubjectCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SectionNo` int(11) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  `SeatAvailable` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectioneachsubject`
--

INSERT INTO `sectioneachsubject` (`SubjectSectionID`, `SubjectCode`, `SectionNo`, `Price`, `SeatAvailable`) VALUES
(1, 'S1', 1, '100.00', 10),
(2, 'S1', 2, '100.00', 10),
(3, 'S2', 1, '200.00', 20),
(4, 'S2', 2, '200.00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `subject_list`
--

CREATE TABLE `subject_list` (
  `SubjectCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SubjectName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SubjectCredit` int(11) NOT NULL,
  `Subjectdetail` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_list`
--

INSERT INTO `subject_list` (`SubjectCode`, `SubjectName`, `SubjectCredit`, `Subjectdetail`) VALUES
('S1', 'SubFoo1', 1, 'SDFoo1'),
('S2', 'SubFoo2', 2, 'SDFoo2');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_list`
--

CREATE TABLE `transaction_list` (
  `TransactionID` int(10) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `Amount` decimal(8,2) NOT NULL,
  `Semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PaymentTypeID` int(10) UNSIGNED NOT NULL,
  `PaymentStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PaymentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PictureLink` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_list`
--

INSERT INTO `transaction_list` (`TransactionID`, `UserID`, `Amount`, `Semester`, `PaymentTypeID`, `PaymentStatus`, `PaymentDate`, `PictureLink`) VALUES
(1, 1, '10000.00', '2/2019', 1, 'waiting', '2019-05-05 05:25:32', '1_1557033931.png'),
(2, 1, '10000.00', '2/2019', 1, 'waiting', '2019-05-05 05:30:22', '1_1557034222.png'),
(3, 1, '10000.00', '2/2019', 2, 'waiting', '2019-05-05 05:37:35', '1_1557034655.png'),
(4, 1, '10.00', '0.000990589', 1, 'waiting', '2019-05-10 19:10:51', '1_1557515287.jpg'),
(5, 1, '125.00', '2/2019', 2, 'waiting', '2019-05-10 19:15:36', '1_1557515736.jpg'),
(6, 1, '12345.00', '2/2019', 2, 'waiting', '2019-05-11 04:14:26', '1_1557548066.jpg'),
(7, 1, '12345.00', '2/2019', 2, 'waiting', '2019-05-11 04:18:47', '1_1557548327.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userrole_list`
--

CREATE TABLE `userrole_list` (
  `UserRoleID` tinyint(1) NOT NULL,
  `UserRoleName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userrole_list`
--

INSERT INTO `userrole_list` (`UserRoleID`, `UserRoleName`) VALUES
(1, 'student'),
(2, 'teacher'),
(3, 'admin');

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
(1, 'Foo1', 'Foo1@example.com', NULL, '$2y$10$QdU1P6Ue5o3ihgGPNdj2a.srNA8oKQtKWJ7DFtecVINytP5M2GWzm', 1, NULL, '2019-04-26 07:57:13', '2019-04-26 07:57:13'),
(2, 'Foo2', 'Foo2@example.com', NULL, '$2y$10$64kF/HUKl2s1RY5wGqKoH.rQj1tI3Ee2uU8mfABny.jBUmXhJT4qq', 2, NULL, '2019-04-26 08:41:16', '2019-04-26 08:41:16'),
(3, 'Foo3', 'Foo3@example.com', NULL, '$2y$10$9I5k8IvxkHUSdqPzw2LUauDPnV48EAG9Fqd0ZDK3hWjN8oKdNv36q', 3, NULL, '2019-04-26 08:41:36', '2019-04-26 08:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `IdentificationNo` bigint(20) NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `TitleName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bloodtype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Birthdate` date NOT NULL,
  `Race` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationnality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Postcode` int(11) NOT NULL,
  `Province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `District` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SubDistrict` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DepartmentCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserContact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GPAX` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`IdentificationNo`, `UserID`, `TitleName`, `FirstName`, `LastName`, `Gender`, `Bloodtype`, `Birthdate`, `Race`, `Religion`, `Nationnality`, `Address`, `Postcode`, `Province`, `District`, `SubDistrict`, `DepartmentCode`, `UserContact`, `GPAX`) VALUES
(10001, 1, 'Mr', 'FN1', 'LN1', 'Male', 'A', '2019-04-01', 'R1', 'R1', 'N1', 'A1', 1, 'P1', 'D1', 'S1', 'D1', '1', '1.00'),
(10002, 2, 'Mrs', 'FN2', 'LN2', 'Female', 'B', '2019-04-10', 'R2', 'R2', 'N2', 'A2', 2, 'P2', 'D2', 'S2', 'D2', '2', '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `LogNo` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `UserDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UsedActivity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CrashCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crash_list`
--
ALTER TABLE `crash_list`
  ADD PRIMARY KEY (`CrashCode`);

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`DepartmentCode`),
  ADD KEY `department_list_facultycode_foreign` (`FacultyCode`);

--
-- Indexes for table `faculty_list`
--
ALTER TABLE `faculty_list`
  ADD PRIMARY KEY (`FacultyCode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_list`
--
ALTER TABLE `parent_list`
  ADD PRIMARY KEY (`ParentID`);

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
  ADD PRIMARY KEY (`PaymentTypeID`);

--
-- Indexes for table `person_link_parent`
--
ALTER TABLE `person_link_parent`
  ADD PRIMARY KEY (`IdentificationNo`,`ParentID`),
  ADD KEY `person_link_parent_parentid_foreign` (`ParentID`);

--
-- Indexes for table `problemreport_list`
--
ALTER TABLE `problemreport_list`
  ADD PRIMARY KEY (`ProblemNo`),
  ADD KEY `problemreport_list_problemtypeid_foreign` (`ProblemTypeID`),
  ADD KEY `problemreport_list_UserID_foreign` (`UserID`);

--
-- Indexes for table `problemtype_list`
--
ALTER TABLE `problemtype_list`
  ADD PRIMARY KEY (`ProblemTypeID`);

--
-- Indexes for table `registration_student`
--
ALTER TABLE `registration_student`
  ADD PRIMARY KEY (`SubjectSectionID`,`UserID`) USING BTREE,
  ADD KEY `registration_student_transactionid_foreign` (`TransactionID`),
  ADD KEY `registration_student_userid_foreign` (`UserID`);

--
-- Indexes for table `registration_teacher`
--
ALTER TABLE `registration_teacher`
  ADD PRIMARY KEY (`SubjectSectionID`,`UserID`),
  ADD KEY `registration_teacher_UserID_foreign` (`UserID`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
  ADD PRIMARY KEY (`RoomCode`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`SubjectSectionID`,`SecOrder`),
  ADD KEY `schedule_roomcode_foreign` (`RoomCode`);

--
-- Indexes for table `sectioneachsubject`
--
ALTER TABLE `sectioneachsubject`
  ADD PRIMARY KEY (`SubjectSectionID`),
  ADD KEY `sectioneachsubject_subjectcode_foreign` (`SubjectCode`);

--
-- Indexes for table `subject_list`
--
ALTER TABLE `subject_list`
  ADD PRIMARY KEY (`SubjectCode`);

--
-- Indexes for table `transaction_list`
--
ALTER TABLE `transaction_list`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `transaction_list_paymenttypeid_foreign` (`PaymentTypeID`),
  ADD KEY `transaction_list_UserID_foreign` (`UserID`);

--
-- Indexes for table `userrole_list`
--
ALTER TABLE `userrole_list`
  ADD PRIMARY KEY (`UserRoleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `UserRoleID` (`userroleid`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`IdentificationNo`),
  ADD KEY `user_list_departmentcode_foreign` (`DepartmentCode`),
  ADD KEY `user_list_userid_foreign` (`UserID`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`LogNo`),
  ADD KEY `user_log_crashcode_foreign` (`CrashCode`),
  ADD KEY `user_log_userid_foreign` (`UserID`);

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
  MODIFY `PaymentTypeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `problemreport_list`
--
ALTER TABLE `problemreport_list`
  MODIFY `ProblemNo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `problemtype_list`
--
ALTER TABLE `problemtype_list`
  MODIFY `ProblemTypeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sectioneachsubject`
--
ALTER TABLE `sectioneachsubject`
  MODIFY `SubjectSectionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction_list`
--
ALTER TABLE `transaction_list`
  MODIFY `TransactionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `LogNo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department_list`
--
ALTER TABLE `department_list`
  ADD CONSTRAINT `department_list_facultycode_foreign` FOREIGN KEY (`FacultyCode`) REFERENCES `faculty_list` (`FacultyCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `person_link_parent`
--
ALTER TABLE `person_link_parent`
  ADD CONSTRAINT `person_link_parent_identificationno_foreign` FOREIGN KEY (`IdentificationNo`) REFERENCES `user_list` (`IdentificationNo`),
  ADD CONSTRAINT `person_link_parent_parentid_foreign` FOREIGN KEY (`ParentID`) REFERENCES `parent_list` (`ParentID`);

--
-- Constraints for table `problemreport_list`
--
ALTER TABLE `problemreport_list`
  ADD CONSTRAINT `problemreport_list_UserID_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `problemreport_list_problemtypeid_foreign` FOREIGN KEY (`ProblemTypeID`) REFERENCES `problemtype_list` (`ProblemTypeID`);

--
-- Constraints for table `registration_student`
--
ALTER TABLE `registration_student`
  ADD CONSTRAINT `registration_student_subjectsectionid_foreign` FOREIGN KEY (`SubjectSectionID`) REFERENCES `sectioneachsubject` (`SubjectSectionID`),
  ADD CONSTRAINT `registration_student_transactionid_foreign` FOREIGN KEY (`TransactionID`) REFERENCES `transaction_list` (`TransactionID`),
  ADD CONSTRAINT `registration_student_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `registration_teacher`
--
ALTER TABLE `registration_teacher`
  ADD CONSTRAINT `registration_teacher_UserID_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `registration_teacher_subjectsectionid_foreign` FOREIGN KEY (`SubjectSectionID`) REFERENCES `sectioneachsubject` (`SubjectSectionID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_roomcode_foreign` FOREIGN KEY (`RoomCode`) REFERENCES `room_list` (`RoomCode`),
  ADD CONSTRAINT `schedule_subjectsectionid_foreign` FOREIGN KEY (`SubjectSectionID`) REFERENCES `sectioneachsubject` (`SubjectSectionID`);

--
-- Constraints for table `sectioneachsubject`
--
ALTER TABLE `sectioneachsubject`
  ADD CONSTRAINT `sectioneachsubject_subjectcode_foreign` FOREIGN KEY (`SubjectCode`) REFERENCES `subject_list` (`SubjectCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_list`
--
ALTER TABLE `transaction_list`
  ADD CONSTRAINT `transaction_list_UserID_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `transaction_list_paymenttypeid_foreign` FOREIGN KEY (`PaymentTypeID`) REFERENCES `paymenttype_list` (`PaymentTypeID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserRoleID`) REFERENCES `userrole_list` (`UserRoleID`);

--
-- Constraints for table `user_list`
--
ALTER TABLE `user_list`
  ADD CONSTRAINT `user_list_departmentcode_foreign` FOREIGN KEY (`DepartmentCode`) REFERENCES `department_list` (`DepartmentCode`),
  ADD CONSTRAINT `user_list_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_crashcode_foreign` FOREIGN KEY (`CrashCode`) REFERENCES `crash_list` (`CrashCode`),
  ADD CONSTRAINT `user_log_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
