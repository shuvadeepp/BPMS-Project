-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 01:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 7898799798, 'tester1@gmail.com', 'e6e061838856bf47e1de730719fb2609', '2023-10-25 06:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int(10) NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `AptNumber` varchar(45) DEFAULT NULL,
  `AptDate` date DEFAULT NULL,
  `AptTime` time DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL COMMENT 'status = null:  "Not Updated Yet", status = 1: Appointment Approved, status = 2: Appointment Rejected',
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `DeletedFlag` bit(1) DEFAULT b'0',
  `approvedStatus` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `UserID`, `AptNumber`, `AptDate`, `AptTime`, `Message`, `BookingDate`, `Remark`, `Status`, `RemarkDate`, `DeletedFlag`, `approvedStatus`) VALUES
(1, 7, '729411824', '2022-05-12', '19:03:00', 'Test msg', '2022-05-12 18:30:00', 'ok', 1, '2024-05-18 08:38:55', b'0', b'0'),
(2, 7, '767068476', '2022-05-14', '09:00:00', 'fghfshdgfahgrfgh', '2022-05-12 18:30:00', 'Sorry your appointment has been cancelled', NULL, '2022-05-13 06:14:39', b'0', b'0'),
(4, 10, '931783426', '2022-05-18', '15:40:00', 'NA', '2022-05-15 05:04:13', NULL, NULL, NULL, b'0', b'0'),
(5, 10, '284544154', '2022-05-18', '15:40:00', 'NA', '2022-05-15 05:04:13', NULL, NULL, NULL, b'0', b'0'),
(6, 10, '494039785', '2022-05-31', '14:47:00', 'NA', '2022-05-15 05:13:24', NULL, NULL, NULL, b'0', b'0'),
(8, 10, '891247645', '2022-05-28', '20:14:00', 'nA', '2022-05-28 08:43:55', 'Your booking is confirmed.', NULL, '2022-05-28 08:51:22', b'0', b'0'),
(9, 11, '985654240', '2022-05-29', '13:10:00', 'NA', '2022-05-29 07:34:47', 'Your appointment is confirmed', NULL, '2022-05-29 07:35:36', b'0', b'0'),
(10, 11, '707812646', '2023-10-31', '09:07:00', 'eye brow saving', '2023-10-31 10:34:45', 'ok', 1, '2024-05-04 20:54:33', b'0', b'0'),
(11, 11, '542677029', '2023-11-01', '16:00:00', 'ok', '2023-10-31 11:26:28', 'ok', NULL, '2023-10-31 11:28:51', b'0', b'0'),
(12, 12, '402375238', '2024-01-22', '12:00:00', 'testing', '2024-01-20 08:21:30', NULL, NULL, NULL, b'0', b'0'),
(13, 17, '856064501', '2024-01-22', '12:16:00', 'xxxxx', '2024-01-21 03:43:43', 'ok', NULL, '2024-01-21 03:54:31', b'0', b'0'),
(14, 17, 'BP54842024', '2024-01-23', '13:21:00', 'tesing', '2024-01-21 05:01:40', NULL, NULL, NULL, b'0', b'0'),
(15, 17, 'BP63542024', '2024-01-23', '13:38:00', 'testing', '2024-01-21 05:05:30', NULL, NULL, NULL, b'0', b'0'),
(16, 18, 'BP41022024', '2024-01-24', '01:48:00', 'testing', '2024-01-21 16:13:48', 'ok', 1, '2024-01-28 06:09:49', b'0', b'0'),
(17, 18, 'BP60522024', '2024-01-29', '02:04:00', 'kvn', '2024-01-21 18:31:24', NULL, NULL, NULL, b'0', b'0'),
(18, 19, 'BP33112024', '2024-01-27', '22:35:00', 'testing', '2024-01-26 13:01:36', NULL, NULL, NULL, b'0', b'0'),
(19, 20, 'BP25492024', '2024-01-28', '22:49:00', 'Face Wash', '2024-01-26 14:16:57', 'okkkk done', 1, '2024-05-04 20:11:42', b'0', b'0'),
(20, 20, 'BP36642024', '2024-01-30', '15:22:00', 'leg wash', '2024-01-28 05:48:31', NULL, NULL, NULL, b'0', b'0'),
(21, 20, 'BP80872024', '2024-02-17', '14:52:00', 'testtting', '2024-02-10 06:19:35', 'rejecttttt', 2, '2024-07-22 07:29:10', b'0', b'1'),
(22, NULL, 'BP18672024', '2024-02-12', '20:53:00', 'xxx', '2024-02-11 11:19:52', NULL, NULL, '2024-09-16 11:01:21', b'0', b'1'),
(23, 16, 'BP77202024', '2024-05-12', '01:10:00', 'can i come tommmoraw at 1:00PM???', '2024-05-10 18:37:12', 'ok come...', 1, '2024-05-10 18:47:34', b'0', b'0'),
(25, 20, 'BP57562024', '2024-05-13', '02:30:00', 'i want to fecial', '2024-05-12 18:14:54', 'ok', 1, '2024-05-12 18:15:50', b'0', b'0'),
(26, 20, 'BP12582024', '2024-05-19', '16:23:00', 'i want hair cut', '2024-05-18 07:37:11', 'ok', 1, '2024-05-18 07:38:33', b'0', b'0'),
(27, 21, 'BP12742024', '2024-05-20', '16:40:00', 'i want to eyebrow shev', '2024-05-18 18:07:10', 'ok come', 1, '2024-05-18 18:10:31', b'0', b'0'),
(28, 21, 'BP98682024', '2024-05-19', '01:02:00', 'urgently...', '2024-05-18 18:30:24', 'test', 1, '2024-05-18 18:32:27', b'0', b'0'),
(29, 21, 'BP96692024', '2024-05-19', '00:11:00', 'testing', '2024-05-18 18:39:24', 'approved', 1, '2024-05-18 18:42:16', b'0', b'0'),
(30, 22, 'BP23092024', '2024-09-17', '10:17:00', 'For faceal', '2024-09-16 10:57:39', 'ok', 1, '2024-09-16 10:59:09', b'0', b'0'),
(31, 22, 'BP61882024', '2024-09-19', '12:35:00', 'hair cutting', '2024-09-16 11:03:09', 'ok', 1, '2024-09-16 11:03:48', b'0', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(11) DEFAULT 0 COMMENT '0- unread, 1-read',
  `CreatedOn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`, `CreatedOn`) VALUES
(5, 'Kajal', 'Sharma', 9879878798, 'kajal@gmail.com', 'guhgjhg', '2022-05-10 08:43:18', 1, NULL),
(6, 'Anuj', 'Kumar', 1234567890, 'ak@gmail.com', 'Need booking for marriage', '2022-06-01 01:05:47', 1, NULL),
(8, 'testing', 'testing', 9877777777, 'testing@gmail.cpom', 'testing...', '2024-02-04 05:23:30', 0, '2024-02-04'),
(9, 'shuvadeep', 'podder', 9871759130, 'shuvadeep@gmail.com', 'call me', '2024-02-04 05:24:29', 0, '2024-02-04'),
(10, 'suchitra', 'palai', 9877777777, 'suchitra@gmail.com', 'testing...', '2024-02-04 05:31:07', 0, '2024-02-04'),
(11, 'ritu', 'ritu', 9877777777, 'ritu@gmail.com', 'tesitngd', '2024-02-04 05:32:06', 0, '2024-02-04'),
(12, 'test', 'test', 9861098610, 'test@gmail.com', 'testtesttest', '2024-05-09 16:25:31', 0, NULL),
(13, 'svgsvsdv', 'sdvsdvsdv', 6575675675, 'ghdfegdfg@dfgd.gfhj', 'svsdvsvs', '2024-05-09 16:27:52', 0, NULL),
(14, 'tuytu', 'tyutyu', 4645654646, 'rtrth@ddgd.fgfg', 'sgvsfdgd', '2024-05-09 16:28:04', 0, NULL),
(15, 'vxvxcv', 'xcvxcv', 9999999999, 'stu@gmail.com', 'zxczxcz', '2024-05-09 18:16:53', 0, NULL),
(16, 'asdadas', 'asdasdad', 9999999999, 'lipsa@gmail.cmo', 'xxxx', '2024-05-09 18:25:53', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT 0 COMMENT 'BillingId default 0',
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AssignServiceStatus` bit(1) DEFAULT b'0' COMMENT 'IF assignServiceStatus is 1 THEN show approved list page print button. '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`, `AssignServiceStatus`) VALUES
(6, 7, 16, 138889283, '2022-05-13 11:42:21', b'0'),
(10, 8, 11, 555850701, '2022-05-13 11:42:51', b'1'),
(14, 10, 2, 330026346, '2022-05-28 08:51:42', b'0'),
(18, 11, 12, 379060040, '2022-05-29 07:36:18', b'0'),
(19, 11, 3, 460087279, '2022-06-01 01:03:58', b'0'),
(20, 20, 1, 917929189, '2024-01-28 06:13:54', b'0'),
(21, 18, 8, 711631012, '2024-01-28 06:14:51', b'0'),
(22, 18, 16, 711631012, '2024-01-28 06:14:51', b'0'),
(23, 1, 7, 588454307, '2024-04-18 17:44:53', b'0'),
(25, 1, 27, 623743924, '2024-05-08 18:27:43', b'0'),
(26, 1, 1, 221127231, '2024-05-09 18:38:20', b'0'),
(27, 1, 2, 154268942, '2024-05-09 18:38:54', b'0'),
(29, 17, 2, 855103372, '2024-05-11 05:48:42', b'0'),
(38, 17, 5, 681894299, '2024-05-11 15:10:36', b'0'),
(39, 17, 4, 681894299, '2024-05-11 15:10:36', b'0'),
(40, 17, 3, 681894299, '2024-05-11 15:10:36', b'0'),
(41, 17, 2, 681894299, '2024-05-11 15:10:36', b'0'),
(42, 17, 1, 681894299, '2024-05-11 15:10:36', b'0'),
(43, 17, 5, 376928574, '2024-05-11 15:10:43', b'0'),
(44, 17, 4, 376928574, '2024-05-11 15:10:43', b'0'),
(45, 17, 3, 376928574, '2024-05-11 15:10:43', b'0'),
(46, 17, 2, 376928574, '2024-05-11 15:10:43', b'0'),
(47, 17, 1, 376928574, '2024-05-11 15:10:43', b'0'),
(48, 20, 8, 197053664, '2024-05-11 15:11:30', b'0'),
(49, 20, 7, 197053664, '2024-05-11 15:11:30', b'0'),
(50, 20, 6, 197053664, '2024-05-11 15:11:30', b'1'),
(51, 2, 1, 914379606, '2024-05-11 15:12:12', b'0'),
(52, 2, 2, 914379606, '2024-05-11 15:12:12', b'0'),
(53, 18, 3, 682725718, '2024-05-11 16:02:44', b'0'),
(54, 18, 2, 682725718, '2024-05-11 16:02:44', b'0'),
(55, 18, 1, 682725718, '2024-05-11 16:02:44', b'0'),
(56, 16, 34, 537485288, '2024-05-11 18:02:44', b'0'),
(57, 16, 32, 537485288, '2024-05-11 18:02:44', b'1'),
(58, 17, 36, 254115564, '2024-05-11 18:20:11', b'0'),
(59, 17, 35, 254115564, '2024-05-11 18:20:11', b'0'),
(60, 17, 7, 254115564, '2024-05-11 18:20:11', b'0'),
(61, 7, 12, 167179147, '2024-05-18 09:23:50', b'1'),
(62, 7, 11, 167179147, '2024-05-18 09:23:50', b'1'),
(63, 7, 10, 167179147, '2024-05-18 09:23:50', b'1'),
(64, 7, 8, 167179147, '2024-05-18 09:23:50', b'1'),
(65, 20, 36, 991780461, '2024-05-18 10:21:01', b'1'),
(66, 20, 35, 991780461, '2024-05-18 10:21:01', b'1'),
(67, 7, 25, 695774551, '2024-05-18 17:48:57', b'1'),
(68, 7, 18, 695774551, '2024-05-18 17:48:57', b'1'),
(69, 7, 25, 818395726, '2024-05-18 17:49:15', b'1'),
(70, 7, 18, 818395726, '2024-05-18 17:49:15', b'1'),
(71, 18, 35, 612906970, '2024-05-18 17:55:21', b'1'),
(72, 18, 34, 612906970, '2024-05-18 17:55:21', b'1'),
(73, 21, 7, 565801960, '2024-05-18 18:12:43', b'1'),
(74, 21, 6, 565801960, '2024-05-18 18:12:43', b'1'),
(75, 21, 3, 565801960, '2024-05-18 18:12:43', b'1'),
(76, 21, 36, 433208128, '2024-05-18 18:54:34', b'1'),
(77, 21, 34, 433208128, '2024-05-18 18:54:34', b'1'),
(78, 21, 36, 160526133, '2024-05-18 18:58:18', b'1'),
(79, 21, 34, 160526133, '2024-05-18 18:58:18', b'1'),
(80, 21, 34, 627825862, '2024-05-18 18:59:34', b'1'),
(81, 21, 32, 627825862, '2024-05-18 18:59:34', b'1'),
(82, 21, 34, 590070684, '2024-05-18 19:01:43', b'1'),
(83, 21, 31, 590070684, '2024-05-18 19:01:43', b'1'),
(84, 21, 34, 481341993, '2024-05-18 19:02:15', b'1'),
(85, 21, 31, 481341993, '2024-05-18 19:02:15', b'1'),
(86, 21, 36, 820930530, '2024-05-19 06:49:22', b'1'),
(87, 21, 36, 503694044, '2024-05-19 06:49:33', b'1'),
(88, 21, 36, 922063605, '2024-05-19 07:10:56', b'1'),
(89, 7, 36, 994873350, '2024-07-22 07:28:42', b'1'),
(90, 7, 35, 994873350, '2024-07-22 07:28:42', b'1'),
(91, 21, 36, 577869594, '2024-07-22 07:29:10', b'1'),
(92, 21, 35, 577869594, '2024-07-22 07:29:10', b'1'),
(93, 21, 36, 607481591, '2024-09-16 10:31:54', b'1'),
(94, 21, 35, 607481591, '2024-09-16 10:31:54', b'1'),
(95, 21, 34, 885073646, '2024-09-16 10:34:08', b'1'),
(96, 22, 25, 629854156, '2024-09-16 11:01:21', b'1'),
(97, 22, 36, 384943297, '2024-09-16 11:05:23', b'1'),
(98, 22, 35, 384943297, '2024-09-16 11:05:23', b'1'),
(99, 7, 6, 516179557, '2024-09-18 06:09:02', b'1'),
(100, 7, 5, 516179557, '2024-09-18 06:09:02', b'1'),
(101, 22, 6, 688903848, '2024-10-10 07:01:05', b'1'),
(102, 22, 5, 688903848, '2024-10-10 07:01:05', b'1'),
(103, 22, 36, 937463843, '2024-10-10 07:01:42', b'1'),
(104, 22, 35, 937463843, '2024-10-10 07:01:42', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitleOne` mediumtext DEFAULT NULL,
  `PageTitleTwo` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `TagsMenus` varchar(128) DEFAULT NULL,
  `CoverImgOne` varchar(145) DEFAULT NULL,
  `CoverImgTwo` varchar(145) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitleOne`, `PageTitleTwo`, `PageDescription`, `TagsMenus`, `CoverImgOne`, `CoverImgTwo`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'Beauty and success starts here', 'About Us', '<b> Our main</b> focus is on quality and hygiene. Our Parlour is well equipped with advanced technology equipments and provides best quality services. Our staff is well trained and experienced, offering advanced services in Skin, Hair and Body Shaping that will provide you with a luxurious experience that leave you feeling relaxed and stress free. The specialities in the parlour are, apart from regular bleachings and Facials, many types of hairstyles, Bridal and cine make-up and different types of Facials &amp; fashion hair colourings.11', '{\"0\":\"Waxing\",\"1\":\"Facial\",\"2\":\"Hair makeup\",\"3\":\"Massage\",\"4\":\"Menicure\",\"5\":\"Pedicure\",\"6\":\"Hair Cut\",\"7\":\"Body Spa\"}', 'AboutUsOne_1714769193.jpg', 'AboutUsTwo_1714769193.jpg', NULL, NULL, '2024-05-03', ''),
(2, 'contactus', NULL, 'Contact Us', '890,Sector 62, Gyan Sarovar, GAIL Noida(Delhi/NCR)11111', NULL, NULL, NULL, 'shuva@gmail.com', 9877777777, '2024-05-03', '09:00 Am to 09:30 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `ServiceDescription` mediumtext DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdatedOn` timestamp NULL DEFAULT current_timestamp(),
  `DeletedFlag` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `ServiceDescription`, `Cost`, `Image`, `UpdatedBy`, `CreationDate`, `UpdatedOn`, `DeletedFlag`) VALUES
(1, 'O3 Facial', 'O3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 Facial', 1200, 'o3plus-professional-bridal-facial-kit-for-radiant-glowing-skin.jpg', NULL, '2022-05-24 22:37:38', '2024-04-27 12:04:37', b'0'),
(2, 'Fruit Facial', 'Fruit facials contain certain fruit acid like glycolic acid, alpha hydroxyl acid, citric acid, phenolic acid, vitamins and minerals in it. These acids are antiblemish, antiwrinkle and help your skin to exfoliate, it highly detoxifies your skin, it excretes out all the toxins and it hydrates your face', 500, 'How-To-Do-Fruit-Facial-At-Home.jpg', NULL, '2022-05-24 22:37:53', '2024-04-27 12:04:37', b'0'),
(3, 'Charcol Facial', 'Activated charcoal is created from bone char, coconut shells, peat, petroleum coke, coal, olive pits, bamboo, or sawdust. It is in the form of a fine black dust that is produced when regular charcoal is activated by exposing it to very high temperatures. This is done to alter its internal structure and increase its surface area to increase absorbability. The charcoal that you get after it has undergone this process is very porous.', 1000, 'b9fb9d37bdf15a699bc071ce49baea531652852364.jpg', NULL, '2022-05-24 22:37:10', '2024-04-27 12:04:37', b'0'),
(4, 'Deluxe Menicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 500, 'efc1a80c391be252d7d777a437f868701652852477.jpg', NULL, '2022-05-24 22:37:34', '2024-04-27 12:04:37', b'0'),
(5, 'Deluxe Pedicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 600, '1e6ae4ada992769567b71815f124fac51652852492.jpg', NULL, '2022-05-24 22:37:47', '2024-04-27 12:04:37', b'0'),
(6, 'Normal Menicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 300, 'The-Dummys-Guide-To-Using-A-Manicure-Kit_OI.jpg', NULL, '2022-05-24 22:37:01', '2024-04-27 12:04:37', b'0'),
(7, 'Normal Pedicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 400, '1e6ae4ada992769567b71815f124fac51652852492.jpg', NULL, '2022-05-24 22:37:19', '2024-04-27 12:04:37', b'0'),
(8, 'U-Shape Hair Cut', 'U-Shape Hair Cut', 250, 'cff8ad28cf40ebf4fbdd383fe546098d1652852593.jpg', NULL, '2022-05-24 22:37:38', '2024-04-27 12:04:37', b'0'),
(10, 'Rebonding', 'Hair rebonding is a chemical process that changes your hair\'s natural texture and creates a smooth, straight style. It\'s also called chemical straightening. Hair rebonding is typically performed by a licensed cosmetologist at your local hair salon.', 3999, 'c362f21370120580f5779a2d019392851652852555.jpg', NULL, '2022-05-24 22:37:08', '2024-04-27 12:04:37', b'0'),
(11, 'Loreal Hair Color(Full)', 'Loreal Hair Color(Full),Loreal Hair Color(Full),Loreal Hair Color(Full)', 1200, 'images.jpg', NULL, '2022-05-24 22:37:35', '2024-04-27 12:04:37', b'0'),
(12, 'Body Spa', 'It is typically a massage spa therapy that helps reduce pain. The technique involves using fingertips, palm, elbow, or even feet to apply firm pressure on certain body parts or acupoint to encourage blood flow and promote healing', 1500, 'efc1a80c391be252d7d777a437f868701652852477.jpg', NULL, '2022-05-19 01:38:27', '2024-04-27 12:04:37', b'0'),
(18, 'Service Name', 'Service Description', 1000, '', NULL, '2024-04-27 06:47:51', '2024-04-27 12:17:51', b'0'),
(25, 'testing', 'testing', 40, '', NULL, '2024-04-27 06:51:44', '2024-04-27 12:21:44', b'0'),
(30, 'last testingf', 'last testingf', 11, '', NULL, '2024-04-27 06:57:16', '2024-04-27 12:27:16', b'0'),
(31, 'raw_test', 'raw_test', 12, '', NULL, '2024-04-27 06:57:41', '2024-04-27 12:27:41', b'0'),
(32, 'final test', 'final test', 54, '', NULL, '2024-04-27 06:59:28', '2024-04-27 12:29:28', b'0'),
(33, 'sdasd', 'asda', 0, '', NULL, '2024-04-27 13:25:37', '2024-04-27 18:55:37', b'0'),
(34, 'xxx', 'xxx', 34, 'Service_1714255278.png', NULL, '2024-04-27 13:38:54', '2024-04-27 16:31:18', b'0'),
(35, 'A Touch of Class', 'A Touch of Class', 100, 'Service_1714252786.png', NULL, '2024-04-27 13:39:26', '2024-04-27 15:49:46', b'0'),
(36, 'rwaknee', 'vbvb', 900, 'Service_1714252307.png', NULL, '2024-04-27 14:29:19', '2024-04-27 15:41:47', b'0'),
(37, 'svsdvsv', 'vsdvsdvsdv', 0, 'Service_1726485107.png', NULL, '2024-09-16 05:41:47', '2024-09-16 11:11:47', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `UpdatedPasswordOn` varchar(45) DEFAULT NULL,
  `OTP` int(11) DEFAULT NULL COMMENT 'After Register OTP will send to mail ID',
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UserRegType` int(11) DEFAULT NULL COMMENT '1= User Register Status, ',
  `CreatedOn` date DEFAULT NULL COMMENT 'IF assignServiceStatus is 1 THEN show approved list page print button. ',
  `UpdatedOn` date DEFAULT NULL,
  `DeletedFlag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `UpdatedPasswordOn`, `OTP`, `RegDate`, `UserRegType`, `CreatedOn`, `UpdatedOn`, `DeletedFlag`) VALUES
(1, 'Khusi', NULL, 8956234569, 'khusi@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2021-10-16 14:22:03', NULL, NULL, NULL, 0),
(2, 'Rishi Singh', NULL, 5689234578, 'rishi@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2021-10-16 14:37:49', NULL, NULL, NULL, 0),
(3, 'Abir Singh', NULL, 2147483649, 'abir@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2021-10-16 14:40:20', NULL, NULL, NULL, 0),
(4, 'Test Sample', NULL, 8797977779, 'sample@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2020-04-08 05:51:06', NULL, NULL, NULL, 0),
(5, 'Anuj  kumar', NULL, 1236547890, 'test@test.com', 'f925916e2754e5e03f75dd58a5733251', NULL, NULL, '2020-05-07 08:52:34', NULL, NULL, NULL, 0),
(6, 'ghhg', NULL, 8888888888, 'c@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2021-12-14 05:27:32', NULL, NULL, NULL, 0),
(7, 'Tina', 'Khan', 9789797987, 'tina@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2022-05-11 09:21:46', NULL, NULL, NULL, 0),
(8, 'Hima', 'Sharma', 8979798789, 'hima@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2022-05-11 09:23:16', NULL, NULL, NULL, 0),
(10, 'Anuj', 'Kumar', 1425362514, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', NULL, NULL, '2022-05-15 05:03:32', NULL, NULL, NULL, 0),
(11, 'John', 'Doe', 1452632541, 'johndoe@gmail.com', 'f925916e2754e5e03f75dd58a5733251', NULL, NULL, '2022-05-29 07:33:58', NULL, NULL, NULL, 0),
(13, 'shuvadeep', 'podder', 9999999999, 'sandeep@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, 5311, '2024-01-20 09:45:07', NULL, NULL, NULL, 0),
(15, 'acacasc', 'ascascasc', 9999999999, 'acac@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, 8707, '2024-01-20 10:02:55', NULL, NULL, NULL, 0),
(16, 'testing', 'testing', 9999999999, 'testp@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, 3656, '2024-01-20 10:03:23', 1, NULL, NULL, 0),
(17, 'xxx', 'xxx', 9877777777, 'xxx@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, 1159, '2024-01-20 10:09:49', 1, NULL, NULL, 0),
(18, 'shuvashree', 'podder', 9111111111, 'ritu@gmail.com', 'fbd0642ded00ae321f28ea87ace8a4fa', 'forgot_password_2024-02-10 06:01:57', 1569, '2024-01-20 10:12:01', 1, '2024-01-20', NULL, 0),
(20, 'Suchitra', 'palai', 9861659130, 'suchitra@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'updated_password_2024-02-03 20:07:24', 8602, '2024-01-26 14:15:11', 1, '2024-01-26', '2024-02-03', 0),
(21, 'shuvadeep', 'podder', 7008485768, 'shuvadeep@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, 3061, '2024-05-18 18:06:02', 1, '2024-05-18', NULL, 0),
(22, 'mrutyunjay', 'dash', 9876666666, 'mrutyunjay@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, 5530, '2024-09-16 10:56:50', 1, '2024-09-16', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
