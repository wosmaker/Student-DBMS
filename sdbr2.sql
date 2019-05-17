-- phpmyadmin sql dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- host: 127.0.0.1
-- generation time: may 17, 2019 at 08:46 am
-- server version: 10.1.37-mariadb
-- php version: 7.3.1

set sql_mode = "no_auto_value_on_zero";
set autocommit = 0;
start transaction;
set time_zone = "+00:00";


/*!40101 set @old_character_set_client=@@character_set_client */;
/*!40101 set @old_character_set_results=@@character_set_results */;
/*!40101 set @old_collation_connection=@@collation_connection */;
/*!40101 set names utf8mb4 */;

--
-- database: `sdbr2`
--

-- --------------------------------------------------------

--
-- table structure for table `crash_list`
--

create table `crash_list` (
  `crashcode` varchar(191) collate utf8mb4_unicode_ci not null,
  `crashdetail` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- table structure for table `department_list`
--

create table `department_list` (
  `facultycode` varchar(191) collate utf8mb4_unicode_ci not null,
  `departmentcode` varchar(191) collate utf8mb4_unicode_ci not null,
  `departmentname` varchar(191) collate utf8mb4_unicode_ci not null,
  `departmentcontact` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `department_list`
--

insert into `department_list` (`facultycode`, `departmentcode`, `departmentname`, `departmentcontact`) values
('f1', 'd1', 'depfoo1', '1'),
('f1', 'd2', 'depfoo2', '2'),
('f2', 'd3', 'depfoo3', '3'),
('f2', 'd4', 'depfoo4', '4'),
('f3', 'd5', 'depfoo5', '5'),
('f4', 'd6', 'depfoo6', '6');

-- --------------------------------------------------------

--
-- table structure for table `faculty_list`
--

create table `faculty_list` (
  `facultycode` varchar(191) collate utf8mb4_unicode_ci not null,
  `facultyname` varchar(191) collate utf8mb4_unicode_ci not null,
  `facultycontact` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `faculty_list`
--

insert into `faculty_list` (`facultycode`, `facultyname`, `facultycontact`) values
('f1', 'facfoo1', '1'),
('f2', 'facfoo2', '2'),
('f3', 'facfoo3', '3'),
('f4', 'facfoo4', '4');

-- --------------------------------------------------------

--
-- table structure for table `migrations`
--

create table `migrations` (
  `id` int(10) unsigned not null,
  `migration` varchar(191) collate utf8mb4_unicode_ci not null,
  `batch` int(11) not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `migrations`
--

insert into `migrations` (`id`, `migration`, `batch`) values
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
-- table structure for table `parent_list`
--

create table `parent_list` (
  `parentid` bigint(20) not null,
  `parentname` varchar(191) collate utf8mb4_unicode_ci not null,
  `parentlastname` varchar(191) collate utf8mb4_unicode_ci not null,
  `parentbirthday` date not null,
  `parentcontract` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- table structure for table `password_resets`
--

create table `password_resets` (
  `email` varchar(191) collate utf8mb4_unicode_ci not null,
  `token` varchar(191) collate utf8mb4_unicode_ci not null,
  `created_at` timestamp null default null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- table structure for table `paymenttype_list`
--

create table `paymenttype_list` (
  `paymenttypeid` int(10) unsigned not null,
  `paymenttypename` varchar(191) collate utf8mb4_unicode_ci not null,
  `paymentnumber` int(11) not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `paymenttype_list`
--

insert into `paymenttype_list` (`paymenttypeid`, `paymenttypename`, `paymentnumber`) values
(1, 'kbank', 101),
(2, 'ktb', 102),
(3, 'scb', 103),
(4, 'tmb', 104);

-- --------------------------------------------------------

--
-- table structure for table `person_link_parent`
--

create table `person_link_parent` (
  `identificationno` bigint(20) not null,
  `parentid` bigint(20) not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- table structure for table `problemreport_list`
--

create table `problemreport_list` (
  `problemno` bigint(20) unsigned not null,
  `userid` bigint(20) unsigned not null,
  `problemtypeid` int(10) unsigned not null,
  `problemdatetime` timestamp not null default current_timestamp on update current_timestamp,
  `problemtitle` varchar(191) collate utf8mb4_unicode_ci not null,
  `problemdetail` varchar(191) collate utf8mb4_unicode_ci not null,
  `problemstatus` varchar(191) collate utf8mb4_unicode_ci not null,
  `answerdetail` varchar(191) collate utf8mb4_unicode_ci default null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `problemreport_list`
--

insert into `problemreport_list` (`problemno`, `userid`, `problemtypeid`, `problemdatetime`, `problemtitle`, `problemdetail`, `problemstatus`, `answerdetail`) values
(1, 1, 1, '2019-05-06 01:37:31', 'problem1', 'problemdetail1', 'waiting', null),
(2, 1, 1, '2019-05-12 19:17:06', 'test report work', 'rr', 'waiting', null),
(3, 1, 3, '2019-05-12 19:17:16', 'test report work', 'see', 'waiting', null),
(4, 1, 1, '2019-05-14 22:47:25', 'test report 2', 'ddd', 'waiting', null),
(5, 1, 2, '2019-05-14 22:47:36', 'dddsdw', 'fgrf', 'waiting', null);

-- --------------------------------------------------------

--
-- table structure for table `problemtype_list`
--

create table `problemtype_list` (
  `problemtypeid` int(10) unsigned not null,
  `problemtypename` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `problemtype_list`
--

insert into `problemtype_list` (`problemtypeid`, `problemtypename`) values
(1, 'registration'),
(2, 'upload'),
(3, 'other');

-- --------------------------------------------------------

--
-- table structure for table `registration_student`
--

create table `registration_student` (
  `subjectsectionid` int(10) unsigned not null,
  `userid` bigint(20) unsigned not null,
  `transactionid` int(10) unsigned default null,
  `dateregis` timestamp not null default current_timestamp on update current_timestamp,
  `grade` decimal(8,2) default null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `registration_student`
--

insert into `registration_student` (`subjectsectionid`, `userid`, `transactionid`, `dateregis`, `grade`) values
(1, 1, null, '2019-05-13 05:22:23', null);

-- --------------------------------------------------------

--
-- table structure for table `registration_teacher`
--

create table `registration_teacher` (
  `subjectsectionid` int(10) unsigned not null,
  `userid` bigint(20) unsigned not null,
  `dateregis` timestamp not null default current_timestamp on update current_timestamp,
  `semester` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- table structure for table `room_list`
--

create table `room_list` (
  `roomcode` varchar(191) collate utf8mb4_unicode_ci not null,
  `buildingname` varchar(191) collate utf8mb4_unicode_ci not null,
  `floor` varchar(191) collate utf8mb4_unicode_ci not null,
  `roomseattotal` smallint(6) not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `room_list`
--

insert into `room_list` (`roomcode`, `buildingname`, `floor`, `roomseattotal`) values
('r1', 'b1', 'f1', 100),
('r2', 'b2', 'f2', 100);

-- --------------------------------------------------------

--
-- table structure for table `schedule`
--

create table `schedule` (
  `subjectsectionid` int(10) unsigned not null,
  `secorder` int(10) unsigned not null,
  `secstart` datetime not null,
  `secend` datetime not null,
  `roomcode` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `schedule`
--

insert into `schedule` (`subjectsectionid`, `secorder`, `secstart`, `secend`, `roomcode`) values
(1, 1, '2019-04-01 00:00:00', '2019-04-01 01:00:00', 'r1'),
(1, 2, '2019-04-01 01:00:00', '2019-04-01 02:00:00', 'r1'),
(3, 1, '2019-05-05 00:00:00', '2019-05-05 01:00:00', 'r2'),
(4, 2, '2019-05-05 01:00:00', '2019-05-05 02:00:00', 'r2');

-- --------------------------------------------------------

--
-- table structure for table `sectioneachsubject`
--

create table `sectioneachsubject` (
  `subjectsectionid` int(10) unsigned not null,
  `subjectcode` varchar(191) collate utf8mb4_unicode_ci not null,
  `sectionno` int(11) not null,
  `price` decimal(8,2) not null,
  `seatavailable` smallint(6) not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `sectioneachsubject`
--

insert into `sectioneachsubject` (`subjectsectionid`, `subjectcode`, `sectionno`, `price`, `seatavailable`) values
(1, 's1', 1, '100.00', 10),
(2, 's1', 2, '100.00', 10),
(3, 's2', 1, '200.00', 20),
(4, 's2', 2, '200.00', 20);

-- --------------------------------------------------------

--
-- table structure for table `subject_list`
--

create table `subject_list` (
  `subjectcode` varchar(191) collate utf8mb4_unicode_ci not null,
  `subjectname` varchar(191) collate utf8mb4_unicode_ci not null,
  `subjectcredit` int(11) not null,
  `subjectdetail` text collate utf8mb4_unicode_ci
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `subject_list`
--

insert into `subject_list` (`subjectcode`, `subjectname`, `subjectcredit`, `subjectdetail`) values
('s1', 'subfoo1', 1, 'sdfoo1'),
('s2', 'subfoo2', 2, 'sdfoo2');

-- --------------------------------------------------------

--
-- table structure for table `transaction_list`
--

create table `transaction_list` (
  `transactionid` int(10) unsigned not null,
  `userid` bigint(20) unsigned not null,
  `amount` decimal(8,2) not null,
  `semester` varchar(191) collate utf8mb4_unicode_ci not null,
  `paymenttypeid` int(10) unsigned not null,
  `paymentstatus` varchar(191) collate utf8mb4_unicode_ci not null,
  `paymentdate` timestamp not null default current_timestamp on update current_timestamp,
  `picturelink` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `transaction_list`
--

insert into `transaction_list` (`transactionid`, `userid`, `amount`, `semester`, `paymenttypeid`, `paymentstatus`, `paymentdate`, `picturelink`) values
(1, 1, '10000.00', '2/2019', 1, 'waiting', '2019-05-05 05:25:32', '1_1557033931.png'),
(2, 1, '10000.00', '2/2019', 1, 'waiting', '2019-05-05 05:30:22', '1_1557034222.png'),
(3, 1, '10000.00', '2/2019', 2, 'waiting', '2019-05-05 05:37:35', '1_1557034655.png'),
(4, 1, '10.00', '0.000990589', 1, 'waiting', '2019-05-10 19:10:51', '1_1557515287.jpg'),
(5, 1, '125.00', '2/2019', 2, 'waiting', '2019-05-10 19:15:36', '1_1557515736.jpg'),
(6, 1, '12345.00', '2/2019', 2, 'waiting', '2019-05-11 04:14:26', '1_1557548066.jpg'),
(7, 1, '12345.00', '2/2019', 2, 'waiting', '2019-05-11 04:18:47', '1_1557548327.jpg');

-- --------------------------------------------------------

--
-- table structure for table `userrole_list`
--

create table `userrole_list` (
  `userroleid` tinyint(1) not null,
  `userrolename` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `userrole_list`
--

insert into `userrole_list` (`userroleid`, `userrolename`) values
(1, 'student'),
(2, 'teacher'),
(3, 'admin');

-- --------------------------------------------------------

--
-- table structure for table `users`
--

create table `users` (
  `id` bigint(20) unsigned not null,
  `name` varchar(191) collate utf8mb4_unicode_ci not null,
  `email` varchar(191) collate utf8mb4_unicode_ci not null,
  `email_verified_at` timestamp null default null,
  `password` varchar(191) collate utf8mb4_unicode_ci not null,
  `userroleid` tinyint(1) not null default '0',
  `remember_token` varchar(100) collate utf8mb4_unicode_ci default null,
  `created_at` timestamp null default null,
  `updated_at` timestamp null default null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `users`
--

insert into `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `userroleid`, `remember_token`, `created_at`, `updated_at`) values
(1, 'foo1', 'foo1@example.com', null, '$2y$10$qdu1p6ue5o3ihggpndj2a.srna8okqtkwj7dftecvinytp5m2gwzm', 1, null, '2019-04-26 07:57:13', '2019-04-26 07:57:13'),
(2, 'foo2', 'foo2@example.com', null, '$2y$10$64kf/hukl2s1ry5wgqkoh.rqj1ti3ee2uu8mfabny.jbumxhjt4qq', 2, null, '2019-04-26 08:41:16', '2019-04-26 08:41:16'),
(3, 'foo3', 'foo3@example.com', null, '$2y$10$9i5k8ivxkhusdqpzw2luaudpnv48eag9fqd0zdk3hwjn8okdnv36q', 3, null, '2019-04-26 08:41:36', '2019-04-26 08:41:36');

-- --------------------------------------------------------

--
-- table structure for table `user_list`
--

create table `user_list` (
  `identificationno` bigint(20) not null,
  `userid` bigint(20) unsigned not null,
  `titlename` varchar(191) collate utf8mb4_unicode_ci not null,
  `firstname` varchar(191) collate utf8mb4_unicode_ci not null,
  `lastname` varchar(191) collate utf8mb4_unicode_ci not null,
  `gender` varchar(191) collate utf8mb4_unicode_ci not null,
  `bloodtype` varchar(191) collate utf8mb4_unicode_ci not null,
  `birthdate` date not null,
  `race` varchar(191) collate utf8mb4_unicode_ci not null,
  `religion` varchar(191) collate utf8mb4_unicode_ci not null,
  `nationnality` varchar(191) collate utf8mb4_unicode_ci not null,
  `address` varchar(191) collate utf8mb4_unicode_ci not null,
  `postcode` int(11) not null,
  `province` varchar(191) collate utf8mb4_unicode_ci not null,
  `district` varchar(191) collate utf8mb4_unicode_ci not null,
  `subdistrict` varchar(191) collate utf8mb4_unicode_ci not null,
  `departmentcode` varchar(191) collate utf8mb4_unicode_ci not null,
  `usercontact` varchar(191) collate utf8mb4_unicode_ci not null,
  `gpax` decimal(8,2) default null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- dumping data for table `user_list`
--

insert into `user_list` (`identificationno`, `userid`, `titlename`, `firstname`, `lastname`, `gender`, `bloodtype`, `birthdate`, `race`, `religion`, `nationnality`, `address`, `postcode`, `province`, `district`, `subdistrict`, `departmentcode`, `usercontact`, `gpax`) values
(10001, 1, 'mr', 'fn1', 'ln1', 'male', 'a', '2019-04-01', 'r1', 'r1', 'n1', 'a1', 1, 'p1', 'd1', 's1', 'd1', '1', '1.00'),
(10002, 2, 'mrs', 'fn2', 'ln2', 'female', 'b', '2019-04-10', 'r2', 'r2', 'n2', 'a2', 2, 'p2', 'd2', 's2', 'd2', '2', '2.00');

-- --------------------------------------------------------

--
-- table structure for table `user_log`
--

create table `user_log` (
  `logno` bigint(20) unsigned not null,
  `userid` bigint(20) unsigned not null,
  `userdatetime` timestamp not null default current_timestamp on update current_timestamp,
  `usedactivity` varchar(191) collate utf8mb4_unicode_ci not null,
  `crashcode` varchar(191) collate utf8mb4_unicode_ci not null
) engine=innodb default charset=utf8mb4 collate=utf8mb4_unicode_ci;

--
-- indexes for dumped tables
--

--
-- indexes for table `crash_list`
--
alter table `crash_list`
  add primary key (`crashcode`);

--
-- indexes for table `department_list`
--
alter table `department_list`
  add primary key (`departmentcode`),
  add key `department_list_facultycode_foreign` (`facultycode`);

--
-- indexes for table `faculty_list`
--
alter table `faculty_list`
  add primary key (`facultycode`);

--
-- indexes for table `migrations`
--
alter table `migrations`
  add primary key (`id`);

--
-- indexes for table `parent_list`
--
alter table `parent_list`
  add primary key (`parentid`);

--
-- indexes for table `password_resets`
--
alter table `password_resets`
  add primary key (`email`),
  add key `password_resets_email_index` (`email`);

--
-- indexes for table `paymenttype_list`
--
alter table `paymenttype_list`
  add primary key (`paymenttypeid`);

--
-- indexes for table `person_link_parent`
--
alter table `person_link_parent`
  add primary key (`identificationno`,`parentid`),
  add key `person_link_parent_parentid_foreign` (`parentid`);

--
-- indexes for table `problemreport_list`
--
alter table `problemreport_list`
  add primary key (`problemno`),
  add key `problemreport_list_problemtypeid_foreign` (`problemtypeid`),
  add key `problemreport_list_userid_foreign` (`userid`);

--
-- indexes for table `problemtype_list`
--
alter table `problemtype_list`
  add primary key (`problemtypeid`);

--
-- indexes for table `registration_student`
--
alter table `registration_student`
  add primary key (`subjectsectionid`,`userid`) using btree,
  add key `registration_student_transactionid_foreign` (`transactionid`),
  add key `registration_student_userid_foreign` (`userid`);

--
-- indexes for table `registration_teacher`
--
alter table `registration_teacher`
  add primary key (`subjectsectionid`,`userid`),
  add key `registration_teacher_userid_foreign` (`userid`);

--
-- indexes for table `room_list`
--
alter table `room_list`
  add primary key (`roomcode`);

--
-- indexes for table `schedule`
--
alter table `schedule`
  add primary key (`subjectsectionid`,`secorder`),
  add key `schedule_roomcode_foreign` (`roomcode`);

--
-- indexes for table `sectioneachsubject`
--
alter table `sectioneachsubject`
  add primary key (`subjectsectionid`),
  add key `sectioneachsubject_subjectcode_foreign` (`subjectcode`);

--
-- indexes for table `subject_list`
--
alter table `subject_list`
  add primary key (`subjectcode`);

--
-- indexes for table `transaction_list`
--
alter table `transaction_list`
  add primary key (`transactionid`),
  add key `transaction_list_paymenttypeid_foreign` (`paymenttypeid`),
  add key `transaction_list_userid_foreign` (`userid`);

--
-- indexes for table `userrole_list`
--
alter table `userrole_list`
  add primary key (`userroleid`);

--
-- indexes for table `users`
--
alter table `users`
  add primary key (`id`),
  add unique key `users_email_unique` (`email`),
  add key `userroleid` (`userroleid`);

--
-- indexes for table `user_list`
--
alter table `user_list`
  add primary key (`identificationno`),
  add key `user_list_departmentcode_foreign` (`departmentcode`),
  add key `user_list_userid_foreign` (`userid`);

--
-- indexes for table `user_log`
--
alter table `user_log`
  add primary key (`logno`),
  add key `user_log_crashcode_foreign` (`crashcode`),
  add key `user_log_userid_foreign` (`userid`);

--
-- auto_increment for dumped tables
--

--
-- auto_increment for table `migrations`
--
alter table `migrations`
  modify `id` int(10) unsigned not null auto_increment, auto_increment=21;

--
-- auto_increment for table `paymenttype_list`
--
alter table `paymenttype_list`
  modify `paymenttypeid` int(10) unsigned not null auto_increment, auto_increment=5;

--
-- auto_increment for table `problemreport_list`
--
alter table `problemreport_list`
  modify `problemno` bigint(20) unsigned not null auto_increment, auto_increment=6;

--
-- auto_increment for table `problemtype_list`
--
alter table `problemtype_list`
  modify `problemtypeid` int(10) unsigned not null auto_increment, auto_increment=4;

--
-- auto_increment for table `sectioneachsubject`
--
alter table `sectioneachsubject`
  modify `subjectsectionid` int(10) unsigned not null auto_increment, auto_increment=5;

--
-- auto_increment for table `transaction_list`
--
alter table `transaction_list`
  modify `transactionid` int(10) unsigned not null auto_increment, auto_increment=8;

--
-- auto_increment for table `users`
--
alter table `users`
  modify `id` bigint(20) unsigned not null auto_increment;

--
-- auto_increment for table `user_log`
--
alter table `user_log`
  modify `logno` bigint(20) unsigned not null auto_increment;

--
-- constraints for dumped tables
--

--
-- constraints for table `department_list`
--
alter table `department_list`
  add constraint `department_list_facultycode_foreign` foreign key (`facultycode`) references `faculty_list` (`facultycode`) on delete cascade on update cascade;

--
-- constraints for table `person_link_parent`
--
alter table `person_link_parent`
  add constraint `person_link_parent_identificationno_foreign` foreign key (`identificationno`) references `user_list` (`identificationno`),
  add constraint `person_link_parent_parentid_foreign` foreign key (`parentid`) references `parent_list` (`parentid`);

--
-- constraints for table `problemreport_list`
--
alter table `problemreport_list`
  add constraint `problemreport_list_userid_foreign` foreign key (`userid`) references `users` (`userid`),
  add constraint `problemreport_list_problemtypeid_foreign` foreign key (`problemtypeid`) references `problemtype_list` (`problemtypeid`);

--
-- constraints for table `registration_student`
--
alter table `registration_student`
  add constraint `registration_student_subjectsectionid_foreign` foreign key (`subjectsectionid`) references `sectioneachsubject` (`subjectsectionid`),
  add constraint `registration_student_transactionid_foreign` foreign key (`transactionid`) references `transaction_list` (`transactionid`),
  add constraint `registration_student_userid_foreign` foreign key (`userid`) references `users` (`userid`);

--
-- constraints for table `registration_teacher`
--
alter table `registration_teacher`
  add constraint `registration_teacher_userid_foreign` foreign key (`userid`) references `users` (`userid`),
  add constraint `registration_teacher_subjectsectionid_foreign` foreign key (`subjectsectionid`) references `sectioneachsubject` (`subjectsectionid`);

--
-- constraints for table `schedule`
--
alter table `schedule`
  add constraint `schedule_roomcode_foreign` foreign key (`roomcode`) references `room_list` (`roomcode`),
  add constraint `schedule_subjectsectionid_foreign` foreign key (`subjectsectionid`) references `sectioneachsubject` (`subjectsectionid`);

--
-- constraints for table `sectioneachsubject`
--
alter table `sectioneachsubject`
  add constraint `sectioneachsubject_subjectcode_foreign` foreign key (`subjectcode`) references `subject_list` (`subjectcode`) on delete cascade on update cascade;

--
-- constraints for table `transaction_list`
--
alter table `transaction_list`
  add constraint `transaction_list_userid_foreign` foreign key (`userid`) references `users` (`userid`),
  add constraint `transaction_list_paymenttypeid_foreign` foreign key (`paymenttypeid`) references `paymenttype_list` (`paymenttypeid`);

--
-- constraints for table `users`
--
alter table `users`
  add constraint `users_ibfk_1` foreign key (`userroleid`) references `userrole_list` (`userroleid`);

--
-- constraints for table `user_list`
--
alter table `user_list`
  add constraint `user_list_departmentcode_foreign` foreign key (`departmentcode`) references `department_list` (`departmentcode`),
  add constraint `user_list_userid_foreign` foreign key (`userid`) references `users` (`userid`);

--
-- constraints for table `user_log`
--
alter table `user_log`
  add constraint `user_log_crashcode_foreign` foreign key (`crashcode`) references `crash_list` (`crashcode`),
  add constraint `user_log_userid_foreign` foreign key (`userid`) references `users` (`userid`);
commit;

/*!40101 set character_set_client=@old_character_set_client */;
/*!40101 set character_set_results=@old_character_set_results */;
/*!40101 set collation_connection=@old_collation_connection */;
