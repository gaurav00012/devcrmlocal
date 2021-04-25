-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 01:43 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_form`
--

CREATE TABLE `client_form` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mailing_address` text,
  `about_business` text,
  `domain_name` text,
  `hosting_access` text,
  `hosting_email` varchar(100) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `copy` text,
  `primary_goal` text,
  `target_geographic` varchar(255) DEFAULT NULL,
  `target_audience` varchar(255) DEFAULT NULL,
  `describe_word_1` varchar(25) DEFAULT NULL,
  `describe_word_2` varchar(25) DEFAULT NULL,
  `describe_word_3` varchar(25) DEFAULT NULL,
  `company_colors` varchar(255) DEFAULT NULL,
  `navigation` text,
  `competitors` varchar(255) DEFAULT NULL,
  `reference` text,
  `company_logo` varchar(255) DEFAULT NULL,
  `additional_notes` text,
  `is_approved` int(2) DEFAULT '0',
  `ip` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_form`
--

INSERT INTO `client_form` (`id`, `company_name`, `contact_person`, `email`, `mailing_address`, `about_business`, `domain_name`, `hosting_access`, `hosting_email`, `content`, `copy`, `primary_goal`, `target_geographic`, `target_audience`, `describe_word_1`, `describe_word_2`, `describe_word_3`, `company_colors`, `navigation`, `competitors`, `reference`, `company_logo`, `additional_notes`, `is_approved`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'Build Mart Pvt Ltd', 'Gaurav', 'gaurav@yopmail.com', 'sdsjkdjskdjk', 'skdsdkjsdkj', 'dksdkjsdksdjk', 'sdsdjskdsjkdsjdksjdk', 'sdkskdsjdk', 'sdskdksd', 'na', 'na', 'na', 'na', 'Mixed', 'Experienced', 'Clean', 'NA', 'About us', 'sdsjdk', 'sdksjdk', NULL, NULL, 0, '127.0.0.1', '2020-10-28 20:56:35', '2020-10-28 21:19:13'),
(2, 'ABCD Pvt Ltd', 'Gaurav Aggarwal', 'gaurav@streetkart.in', 'FA - 331, Mansarover Garden, New Delhi', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'Mixed', 'Experienced', 'Clean', 'Blue', 'Home/ About Us/ Contact Us', 'skjds', 'kdsdskj', 'company_logo_1603899460.xls', NULL, 1, '127.0.0.1', '2020-10-28 21:07:40', '2021-01-07 21:45:20'),
(3, 'DealsKart', 'Gaurav', 'gaurav00123@yopmail.com', 'FA - 331, Mansarover Garden, New Delhi - 110015', 'this is my busness none of your business', 'streetkart.in', 'Godaddy Server', 'gaurav@streetkart.in', 'NA', 'Sales Pitch', 'Traffic . .. ..... ... . ....', 'Delhi', 'India, America', 'Serious', 'Youthful', 'Mixed', 'Brown', 'HOme', 'lsdk', 'slskdlwe', 'company_logo_1603908628.jpg', NULL, 1, '127.0.0.1', '2020-10-28 23:40:28', '2021-01-07 21:45:11'),
(4, 'Test', 'skdsdjk', 'wewe@yopmail.com', 'skdsdkjk', 'sdksjdk', 'sdksdjk', 'sdksjdk', 'sdsjdkkdj', 'kdsjdkj', 'ksdjskdj', 'sdskdlkldk', 'sdlskdlk', 'sdkskdj', 'Serious', 'Youthful', 'Mixed', 'sdksdjkjkdj', 'sdksjdkkj', 'sdskdk', 'sdksjdkskdj', NULL, NULL, 0, '127.0.0.1', '2020-10-31 20:50:40', '2020-10-31 20:50:40'),
(5, 'Streetkart sdsd', 'Gaurav', 'gauravwe@yopmail.com', 'Fa - 331, Mansarover garden', 'sdksjdk sjdksdsjdsk jskdjskj skdjsk jdksjdksjd', 'www.streetkart.in', 'NA', 'gaurav@yopmail.com', 'NA', 'Sales pitch', 'Sell online', 'NA', 'NA', 'Serious', 'Mixed', 'Clean', 'NA', 'NA', 'NA', 'NA', 'company_logo_1610043035.png', 'NA', 1, '127.0.0.1', '2021-01-07 23:40:35', '2021-04-02 16:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item_detail`
--

CREATE TABLE `invoice_item_detail` (
  `id` bigint(20) NOT NULL,
  `invoice_id` varchar(50) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `price` bigint(100) DEFAULT NULL,
  `amount` bigint(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_item_detail`
--

INSERT INTO `invoice_item_detail` (`id`, `invoice_id`, `item_name`, `quantity`, `price`, `amount`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '321917', 'item one', 2, 200, 400, '2021-01-07 21:48:19', NULL, '2021-01-07 21:48:19', NULL),
(2, '321917', 'item two', 5, 500, 2500, '2021-01-07 21:48:19', NULL, '2021-01-07 21:48:19', NULL),
(3, '321917', 'item three', 1, 100, 100, '2021-01-07 21:48:19', NULL, '2021-01-07 21:48:19', NULL),
(4, '360091', 'Product one', 2, 100, 200, '2021-01-07 21:50:57', NULL, '2021-01-07 21:50:57', NULL),
(5, '360091', 'Product two', 3, 500, 1500, '2021-01-07 21:50:57', NULL, '2021-01-07 21:50:57', NULL),
(6, '638390', 'product one', 10, 2, 20, '2021-01-07 23:23:32', NULL, '2021-01-07 23:23:32', NULL),
(7, '638390', 'product tow', 50, 5, 250, '2021-01-07 23:23:33', NULL, '2021-01-07 23:23:33', NULL),
(8, '479478', 'Product one', 10, 2, 20, '2021-01-08 00:09:21', NULL, '2021-01-08 00:09:21', NULL),
(9, '479478', 'Product two', 89, 2, 178, '2021-01-08 00:09:21', NULL, '2021-01-08 00:09:21', NULL),
(10, '479478', 'Product three', 50, 5, 250, '2021-01-08 00:09:21', NULL, '2021-01-08 00:09:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_total`
--

CREATE TABLE `invoice_total` (
  `id` bigint(20) NOT NULL,
  `invoice_id` text,
  `total` bigint(50) DEFAULT NULL,
  `invoice` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_total`
--

INSERT INTO `invoice_total` (`id`, `invoice_id`, `total`, `invoice`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '321917', 3000, NULL, '2021-01-07 21:48:20', NULL, '2021-01-07 21:48:20', NULL),
(2, '360091', 1700, NULL, '2021-01-07 21:50:57', NULL, '2021-01-07 21:50:57', NULL),
(3, '638390', 270, NULL, '2021-01-07 23:23:33', NULL, '2021-01-07 23:23:33', NULL),
(4, '479478', 448, NULL, '2021-01-08 00:09:21', NULL, '2021-01-08 00:09:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_tasks`
--

CREATE TABLE `master_tasks` (
  `task_id` int(25) NOT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `company_id` int(25) DEFAULT NULL,
  `project_id` int(25) DEFAULT NULL,
  `task_status` int(11) DEFAULT NULL,
  `task_description` text,
  `task_progress` int(11) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `is_attachment` tinyint(25) DEFAULT NULL,
  `task_view_to_client` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_tasks`
--

INSERT INTO `master_tasks` (`task_id`, `task_name`, `user_id`, `company_id`, `project_id`, `task_status`, `task_description`, `task_progress`, `due_date`, `position`, `is_attachment`, `task_view_to_client`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(5, 'Task name', NULL, 9, 1, 1, 'sdksjdk jskdjsk jskdjskd jskdjskj ksjdks jdksj ksdj ksjdks jsk djsk jsk jskjsk jskjd skjds kjdskdjsk djsk jskdjs kdj skdjsk jdskjd skdjk jdksdj skdjk jsdksj dksj ksjk jskd sjkdjs dksdjskdsjdksjdksj ksjdks jdksj ksjd kjdksdjksdjksdjks jdksjdksdjks jksj ksjk sjdkj dksjdks jksjd ksdjskweow', NULL, '2021-03-31 00:00:00', NULL, NULL, 1, '2021-03-14 11:15:46', '35', '2021-03-14 13:00:19', NULL),
(6, 'Task name', NULL, 9, 1, 1, 'sdksjdk jskdjsk jskdjskd jskdjskj ksjdks jdksj ksdj ksjdks jsk djsk jsk jskjsk jskjd skjds kjdskdjsk djsk jskdjs kdj skdjsk jdskjd skdjk jdksdj skdjk jsdksj dksj ksjk jskd sjkdjs dksdjskdsjdksjdksj ksjdks jdksj ksjd kjdksdjksdjksdjks jdksjdksdjks jksj ksjk sjdkj dksjdks jksjd ksdjskweow', NULL, '2021-03-31 00:00:00', NULL, NULL, NULL, '2021-03-14 11:21:50', '35', '2021-03-14 11:21:50', NULL),
(7, 'Mobile application debug', NULL, 9, 1, 1, 'thisd skdjsk jdskdjskdj ksdjks djks jksjd ks dk', NULL, '2021-03-31 00:00:00', NULL, NULL, NULL, '2021-03-19 01:27:24', '35', '2021-03-19 01:27:24', NULL),
(8, 'Mobile application debug', NULL, 9, 1, 1, 'thisd skdjsk jdskdjskdj ksdjks djks jksjd ks dk', NULL, '2021-03-31 00:00:00', NULL, NULL, NULL, '2021-03-19 01:28:16', '35', '2021-03-19 01:28:16', NULL),
(9, 'Task five', NULL, 9, 1, 3, 'this is sdskjdsk jdsk jdskdj ksjdksk dsk sk jsks', NULL, '2021-03-31 00:00:00', NULL, NULL, NULL, '2021-03-24 23:48:36', '35', '2021-03-24 23:48:36', NULL),
(10, 'Task five', NULL, 9, 1, 3, 'this is sdskjdsk jdsk jdskdj ksjdksk dsk sk jsks', NULL, '2021-03-31 00:00:00', NULL, NULL, NULL, '2021-03-24 23:48:52', '35', '2021-03-24 23:48:52', NULL),
(11, 'Task three', NULL, 9, 1, 3, 'this dsdjskds d', NULL, '2021-03-31 00:00:00', NULL, NULL, NULL, '2021-03-24 23:50:17', '35', '2021-03-25 00:10:17', '35'),
(12, 'Create website for wallet', NULL, 9, 1, 1, 'loklskdlskl', NULL, '2021-01-31 00:00:00', NULL, NULL, NULL, '2021-03-24 23:52:41', '35', '2021-03-24 23:52:41', NULL),
(13, 'Dummy task for testing', NULL, 9, 1, 1, 'thisd kdjsk jskdj skdj skjd ksjdksjdksd', NULL, '2021-03-31 00:00:00', NULL, NULL, NULL, '2021-03-24 23:54:56', '35', '2021-03-24 23:54:56', NULL),
(14, 'Create Mobile Application', NULL, 9, 1, 5, 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.', NULL, '2021-08-31 00:00:00', NULL, NULL, 1, '2021-03-24 23:57:25', '35', '2021-03-31 01:06:38', '35'),
(15, 'Seo Task for website', NULL, 9, 1, 1, 'Add google analystics code in home page.', NULL, '2020-09-30 00:00:00', NULL, NULL, NULL, '2021-03-25 00:50:49', '35', '2021-03-25 00:50:49', NULL),
(16, 'Upcoming appountment', NULL, 9, 1, 6, 'kdskjdksdjsd', NULL, '2021-04-22 00:00:00', NULL, NULL, 1, '2021-03-31 00:57:15', '35', '2021-03-31 00:59:37', NULL),
(17, 'Upcoming appountment for mobile application', NULL, 9, 1, 6, 'kdskjdksdjsd', NULL, '2021-04-22 00:00:00', NULL, NULL, 1, '2021-03-31 00:57:18', '35', '2021-03-31 00:59:37', NULL),
(18, 'abcd mobile application development proejc', NULL, 8, 3, 1, 'this is task description sldsdlskdlkas ldksad', NULL, '2021-05-25 00:00:00', 2, NULL, NULL, '2021-04-02 01:26:01', '35', '2021-04-11 18:17:28', NULL),
(19, 'Dummy website', NULL, 8, 3, 3, 'lorekjdskdsj ksjdksj skdjskdjskdjskdjs kdjsdksjk jsdksjdksjsk djksdjskdj skdjskdjskdjskj dkj kdsjkd jsdksjdksdjskdjskdjsdksjdkjdk djsk jskdjskjsk', NULL, '2021-04-30 00:00:00', 1, NULL, NULL, '2021-04-11 18:14:30', '35', '2021-04-17 23:04:36', NULL),
(20, 'task kasdkajdasd', NULL, 8, 3, 3, 'this is task sdekjd', NULL, '2021-04-13 00:00:00', NULL, NULL, NULL, '2021-04-13 18:21:43', '57', '2021-04-13 18:21:43', NULL),
(21, 'this task is now edited', NULL, 8, 3, 1, 'this edited  is test for single dp', NULL, '2021-04-30 00:00:00', NULL, NULL, NULL, '2021-04-17 23:28:56', '57', '2021-04-18 20:47:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_client`
--

CREATE TABLE `mas_client` (
  `id` int(25) NOT NULL,
  `client_description` text,
  `company_id` int(25) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_client`
--

INSERT INTO `mas_client` (`id`, `client_description`, `company_id`, `user_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'sdkjsk dsjdks jdksd', 18, 38, NULL, '2020-10-13 21:14:49', NULL, '2020-10-13 21:14:49'),
(2, 'sdsjd ksdskdj skdjsk djsk d', 18, 39, NULL, '2020-10-13 21:20:18', NULL, '2020-10-13 21:20:18'),
(6, 'sdkskdjsd', 18, 50, '35', '2020-10-29 00:13:13', NULL, '2020-10-29 00:13:13'),
(7, 'this is my busness none of your business', 21, 53, '35', '2021-01-07 21:45:12', NULL, '2021-01-07 21:45:12'),
(8, 'NA', 21, 54, '35', '2021-01-07 21:45:21', NULL, '2021-01-07 21:45:21'),
(9, 'dsdsdsds sdsds sds sdsdsd', 21, 55, '35', '2021-01-07 23:44:05', NULL, '2021-04-02 16:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `mas_companies`
--

CREATE TABLE `mas_companies` (
  `id` int(25) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_companies`
--

INSERT INTO `mas_companies` (`id`, `user_id`, `company_name`, `description`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(21, 35, 'Youtube', 'thisis descrpto', NULL, NULL, NULL, NULL),
(22, 56, 'Pure Armor Labs', 'The same FDA approved Medical grade hand sanitizer used by front line workers, now available for home use with our unique hand softening formula', NULL, '2021-03-19 00:42:41', NULL, '2021-03-19 00:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `mas_dropdowns`
--

CREATE TABLE `mas_dropdowns` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(25) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_dropdowns`
--

INSERT INTO `mas_dropdowns` (`id`, `type`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'TASK_STATUS', 'To do', NULL, NULL, NULL, NULL),
(2, 'TASK_STATUS', 'Ongoing', NULL, NULL, NULL, NULL),
(3, 'TASK_STATUS', 'Done', NULL, NULL, NULL, NULL),
(4, 'TASK_STATUS', 'Paused', NULL, NULL, NULL, NULL),
(5, 'TASK_STATUS', 'Need\'s Client Approval', NULL, NULL, NULL, NULL),
(6, 'TASK_STATUS', 'Appointment with client', NULL, NULL, NULL, NULL),
(7, 'TASK_STATUS', 'Request Client approval for attachment', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_invoice`
--

CREATE TABLE `mas_invoice` (
  `id` bigint(20) NOT NULL,
  `invoice_id` varchar(50) DEFAULT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_invoice`
--

INSERT INTO `mas_invoice` (`id`, `invoice_id`, `client_id`, `company_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '321917', 7, 21, '2021-01-07 21:48:19', NULL, '2021-01-07 21:48:19', NULL),
(2, '360091', 7, 21, '2021-01-07 21:50:57', NULL, '2021-01-07 21:50:57', NULL),
(3, '638390', 8, 21, '2021-01-07 23:23:33', NULL, '2021-01-07 23:23:33', NULL),
(4, '479478', 9, 21, '2021-01-08 00:09:21', NULL, '2021-01-08 00:09:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_notification`
--

CREATE TABLE `mas_notification` (
  `id` int(25) NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text,
  `status` int(2) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_notification`
--

INSERT INTO `mas_notification` (`id`, `from`, `to`, `subject`, `message`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 35, 41, 'test task', 'test task assigned to you.', 0, '2020-11-03 23:42:06', 35, '2020-11-03 23:42:06', 35),
(2, 35, 4, 'Task oNe', 'Task oNe assigned to you.', 1, '2020-11-10 23:56:35', 35, '2021-03-13 23:19:46', 35),
(3, 35, 2, 'task one', 'task one assigned to you.', 0, '2020-11-10 23:58:11', 35, '2020-11-10 23:58:11', 35),
(4, 35, 2, 'task one', 'task one assigned to you.', 0, '2020-11-11 00:00:10', 35, '2020-11-11 00:00:10', 35),
(5, 35, 4, 'this is project', 'this is project assigned to you.', 1, '2020-11-15 18:48:17', 35, '2021-03-13 23:19:47', 35),
(6, 35, 4, 'sdsdsdsd', 'sdsdsdsd assigned to you.', 1, '2020-11-15 18:56:06', 35, '2021-03-13 23:19:47', 35),
(7, 35, 4, 'sdsdsdsd', 'sdsdsdsd assigned to you.', 1, '2020-11-15 18:56:26', 35, '2021-03-13 23:19:47', 35),
(8, 35, 4, 'sdsdsdsd', 'sdsdsdsd assigned to you.', 1, '2020-11-15 18:57:39', 35, '2021-03-13 23:19:47', 35),
(9, 35, 4, 'sdsdsdsd', 'sdsdsdsd assigned to you.', 1, '2020-11-15 18:58:09', 35, '2021-03-13 23:19:47', 35),
(10, 35, 4, 'sdsdsdsd', 'sdsdsdsd assigned to you.', 1, '2020-11-15 19:00:04', 35, '2021-03-13 23:19:47', 35),
(11, 35, 4, 'this task name', 'this task name assigned to you.', 1, '2020-11-22 20:55:12', 35, '2021-03-13 23:19:47', 35),
(12, 35, 52, 'this task name', 'this task name assigned to you.', 0, '2020-11-22 20:55:13', 35, '2020-11-22 20:55:13', 35),
(13, 35, 4, 'this task name', 'this task name assigned to you.', 1, '2020-11-22 20:56:14', 35, '2021-03-13 23:19:47', 35),
(14, 35, 52, 'this task name', 'this task name assigned to you.', 0, '2020-11-22 20:56:14', 35, '2020-11-22 20:56:14', 35),
(15, 35, 4, 'this task name', 'this task name assigned to you.', 1, '2020-11-22 20:56:33', 35, '2021-03-13 23:19:47', 35),
(16, 35, 52, 'this task name', 'this task name assigned to you.', 0, '2020-11-22 20:56:33', 35, '2020-11-22 20:56:33', 35),
(17, 35, 4, 'this task name', 'this task name assigned to you.', 1, '2020-11-22 20:56:54', 35, '2021-03-13 23:19:47', 35),
(18, 35, 52, 'this task name', 'this task name assigned to you.', 0, '2020-11-22 20:56:54', 35, '2020-11-22 20:56:54', 35),
(19, 35, 4, 'this task name', 'this task name assigned to you.', 1, '2020-11-22 20:57:56', 35, '2021-03-13 23:19:47', 35),
(20, 35, 52, 'this task name', 'this task name assigned to you.', 0, '2020-11-22 20:57:56', 35, '2020-11-22 20:57:56', 35),
(21, 35, 4, 'this task name', 'this task name assigned to you.', 1, '2020-11-22 20:58:06', 35, '2021-03-13 23:19:47', 35),
(22, 35, 52, 'this task name', 'this task name assigned to you.', 0, '2020-11-22 20:58:06', 35, '2020-11-22 20:58:06', 35),
(23, 35, 4, 'this task name', 'this task name assigned to you.', 1, '2020-11-22 21:00:03', 35, '2021-03-13 23:19:47', 35),
(24, 35, 52, 'this task name', 'this task name assigned to you.', 0, '2020-11-22 21:00:04', 35, '2020-11-22 21:00:04', 35),
(25, 35, 4, 'this task name', 'this task name assigned to you.', 1, '2020-11-22 21:02:40', 35, '2021-03-13 23:19:47', 35),
(26, 35, 52, 'this task name', 'this task name assigned to you.', 0, '2020-11-22 21:02:40', 35, '2020-11-22 21:02:40', 35),
(27, 35, 4, 'Test task', 'Test task assigned to you.', 1, '2020-11-26 16:07:23', 35, '2021-03-13 23:19:47', 35),
(28, 35, 4, 'Test task', 'Test task assigned to you.', 1, '2020-11-26 16:19:12', 35, '2021-03-13 23:19:48', 35),
(29, 35, 4, 'Test task', 'Test task assigned to you.', 1, '2020-11-26 16:20:03', 35, '2021-03-13 23:19:48', 35),
(30, 35, 4, 'Test task', 'Test task assigned to you.', 1, '2020-11-26 16:21:57', 35, '2021-03-13 23:19:48', 35),
(31, 35, 4, 'Test task', 'Test task assigned to you.', 1, '2020-11-26 16:28:19', 35, '2021-03-13 23:19:48', 35),
(32, 35, 4, 'Test task', 'Test task assigned to you.', 1, '2020-11-26 16:29:23', 35, '2021-03-13 23:19:48', 35),
(33, 35, 41, 'this is task two', 'this is task two assigned to you.', 0, '2020-11-26 16:41:32', 35, '2020-11-26 16:41:32', 35),
(34, 35, 41, 'hi this is task ldskldksldksldk', 'hi this is task ldskldksldksldk assigned to you.', 0, '2020-11-26 17:58:18', 35, '2020-11-26 17:58:18', 35),
(35, 35, 55, 'Mobile Application', 'Mobile Application updated successfully.', 1, '2021-03-13 23:37:50', 35, '2021-03-14 19:45:04', 35),
(36, 35, 55, 'Mobile Application', 'Mobile Application updated successfully.', 1, '2021-03-13 23:38:50', 35, '2021-03-14 19:45:05', 35),
(37, 35, 55, 'Mobile Application', 'Mobile Application updated successfully.', 1, '2021-03-13 23:39:53', 35, '2021-03-14 19:45:05', 35),
(38, 35, 55, 'Mobile Application', 'Mobile Application updated successfully.', 1, '2021-03-13 23:40:53', 35, '2021-03-14 19:45:05', 35),
(39, 35, 4, 'Test task name', 'Test task name assigned to you.', 0, '2021-03-14 00:18:01', 35, '2021-03-14 00:18:01', 35),
(40, 35, 4, 'thisd sds', 'thisd sds assigned to you.', 0, '2021-03-14 00:20:00', 35, '2021-03-14 00:20:00', 35),
(41, 35, 2, 'task one', 'task one assigned to you.', 0, '2021-03-14 10:47:54', 35, '2021-03-14 10:47:54', 35),
(42, 35, 4, 'task one', 'task one assigned to you.', 0, '2021-03-14 10:47:54', 35, '2021-03-14 10:47:54', 35),
(43, 35, 2, 'Task name', 'Task name assigned to you.', 0, '2021-03-14 10:53:58', 35, '2021-03-14 10:53:58', 35),
(44, 35, 4, 'Task name', 'Task name assigned to you.', 0, '2021-03-14 10:53:58', 35, '2021-03-14 10:53:58', 35),
(45, 35, 2, 'Task name', 'Task name assigned to you.', 0, '2021-03-14 11:15:46', 35, '2021-03-14 11:15:46', 35),
(46, 35, 4, 'Task name', 'Task name assigned to you.', 0, '2021-03-14 11:15:46', 35, '2021-03-14 11:15:46', 35),
(47, 35, 2, 'Task name', 'Task name assigned to you.', 0, '2021-03-14 11:21:49', 35, '2021-03-14 11:21:49', 35),
(48, 35, 4, 'Task name', 'Task name assigned to you.', 0, '2021-03-14 11:21:50', 35, '2021-03-14 11:21:50', 35),
(49, 35, 55, 'Mobile Application', 'Mobile Application updated successfully.', 1, '2021-03-19 00:45:15', 35, '2021-03-19 01:30:31', 35),
(50, 35, 4, 'Mobile application debug', 'Mobile application debug assigned to you.', 0, '2021-03-19 01:27:24', 35, '2021-03-19 01:27:24', 35),
(51, 35, 4, 'Mobile application debug', 'Mobile application debug assigned to you.', 0, '2021-03-19 01:28:16', 35, '2021-03-19 01:28:16', 35);

-- --------------------------------------------------------

--
-- Table structure for table `mas_projects`
--

CREATE TABLE `mas_projects` (
  `id` int(25) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `client_id` int(25) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_projects`
--

INSERT INTO `mas_projects` (`id`, `project_name`, `description`, `client_id`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Mobile Application', 'Mobile Application development sdssdsds ds', 9, NULL, '2021-01-07 23:54:06', NULL, '2021-03-19 00:45:15'),
(2, 'SEO project', 'This is seo project', 9, NULL, '2021-03-30 23:39:26', NULL, '2021-03-30 23:39:26'),
(3, 'Mobile Application Developemt in l', 'Tjisdslkds kdlsdksldskd lskdlsksldk sldksd', 8, NULL, '2021-04-02 01:24:30', NULL, '2021-04-02 01:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `mas_task_assignee`
--

CREATE TABLE `mas_task_assignee` (
  `id` int(11) NOT NULL,
  `task_id` int(25) DEFAULT NULL,
  `assignee` bigint(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_task_assignee`
--

INSERT INTO `mas_task_assignee` (`id`, `task_id`, `assignee`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 6, 2, '2021-03-14 11:21:50', 35, '2021-03-14 11:21:50', NULL),
(2, 6, 4, '2021-03-14 11:21:50', 35, '2021-03-14 11:21:50', NULL),
(3, 7, 4, '2021-03-19 01:27:24', 35, '2021-03-19 01:27:24', NULL),
(4, 8, 4, '2021-03-19 01:28:16', 35, '2021-03-19 01:28:16', NULL),
(5, 10, 1, '2021-03-24 23:48:53', 35, '2021-03-24 23:48:53', NULL),
(7, 12, 1, '2021-03-24 23:52:42', 35, '2021-03-24 23:52:42', NULL),
(8, 13, 1, '2021-03-24 23:54:56', 35, '2021-03-24 23:54:56', NULL),
(14, 11, 1, '2021-03-25 00:10:17', 35, '2021-03-25 00:10:17', NULL),
(15, 15, 1, '2021-03-25 00:50:50', 35, '2021-03-25 00:50:50', NULL),
(16, 17, 1, '2021-03-31 00:57:18', 35, '2021-03-31 00:57:18', NULL),
(17, 16, 1, '2021-03-31 00:57:18', 35, '2021-03-31 00:57:18', NULL),
(18, 14, 1, '2021-03-31 01:04:08', 35, '2021-03-31 01:04:08', NULL),
(19, 18, 1, '2021-04-02 01:26:01', 35, '2021-04-02 01:26:01', NULL),
(20, 18, 59, '2021-04-02 01:26:01', 35, '2021-04-02 01:26:01', NULL),
(21, 19, 57, '2021-04-11 18:14:30', 35, '2021-04-11 18:14:30', NULL),
(22, 20, 57, '2021-04-13 18:21:43', 57, '2021-04-13 18:21:43', NULL),
(23, 21, 57, '2021-04-17 23:28:57', 57, '2021-04-17 23:28:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_task_attachments`
--

CREATE TABLE `mas_task_attachments` (
  `id` int(25) NOT NULL,
  `task_id` int(25) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(25) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_task_attachments`
--

INSERT INTO `mas_task_attachments` (`id`, `task_id`, `file_name`, `file_type`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 7, 'task_fri-mar-19-2021-127-am.jpg', NULL, '2021-03-19 01:27:28', 35, '2021-03-19 01:27:28', NULL),
(2, 12, 'task_wed-mar-24-2021-1152-pm.png', NULL, '2021-03-24 23:52:46', 35, '2021-03-24 23:52:46', NULL),
(3, 13, 'task_wed-mar-24-2021-1155-pm.png', NULL, '2021-03-24 23:55:44', 35, '2021-03-24 23:55:44', NULL),
(4, 14, 'task_wed-mar-24-2021-1157-pm.png', NULL, '2021-03-24 23:57:27', 35, '2021-03-24 23:57:27', NULL),
(5, 11, 'task_thu-mar-25-2021-1210-am.png', NULL, '2021-03-25 00:10:18', 35, '2021-03-25 00:10:18', NULL),
(6, 15, 'task_thu-mar-25-2021-1250-am.png', NULL, '2021-03-25 00:50:54', 35, '2021-03-25 00:50:54', NULL),
(7, 16, 'task_wed-mar-31-2021-1257-am.jpg', NULL, '2021-03-31 00:57:25', 35, '2021-03-31 00:57:25', NULL),
(8, 18, 'task_fri-apr-2-2021-126-am.png', NULL, '2021-04-02 01:26:04', 35, '2021-04-02 01:26:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_task_comment`
--

CREATE TABLE `mas_task_comment` (
  `id` int(2) NOT NULL,
  `task_id` int(25) DEFAULT NULL,
  `task_comments` text,
  `edit_count` int(25) DEFAULT '0',
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_task_comment`
--

INSERT INTO `mas_task_comment` (`id`, `task_id`, `task_comments`, `edit_count`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 5, '<p>test comment sdlsk</p>', 0, 35, '2021-03-14 11:44:43', NULL, '2021-03-14 11:44:43'),
(2, 5, '<p>Check status of task</p>', 0, 35, '2021-03-19 00:48:07', NULL, '2021-03-19 00:48:07'),
(3, 5, '<p>Comment with image</p>', 0, 35, '2021-03-19 00:48:46', NULL, '2021-03-19 00:48:46'),
(4, 5, '<p>comment with attachment wo</p>', 0, 35, '2021-03-19 00:50:47', NULL, '2021-03-19 00:50:47'),
(5, 5, '<p>sdksjdskjdksjkjkj&nbsp;</p>', 0, 35, '2021-03-19 01:01:28', NULL, '2021-03-19 01:01:28'),
(6, 5, '<p>sdjskdjskdjs&nbsp;</p>', 0, 35, '2021-03-19 01:07:33', NULL, '2021-03-19 01:07:33'),
(7, 5, '<p>sdjskdjskdjs&nbsp;</p>', 0, 35, '2021-03-19 01:11:57', NULL, '2021-03-19 01:11:57'),
(8, 5, '<p>Test comment with attachment ... . .. . . ..&nbsp;</p>', 0, 35, '2021-03-19 01:14:41', NULL, '2021-03-19 01:14:41'),
(9, 11, '<p>this is comment one</p>', 0, 35, '2021-03-25 00:12:27', NULL, '2021-03-25 00:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `mas_task_comment_attachment`
--

CREATE TABLE `mas_task_comment_attachment` (
  `id` int(25) NOT NULL,
  `task_id` int(25) DEFAULT NULL,
  `task_comment_id` int(2) DEFAULT NULL,
  `attachment_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mas_task_comment_attachment`
--

INSERT INTO `mas_task_comment_attachment` (`id`, `task_id`, `task_comment_id`, `attachment_name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 5, 7, 'comment_fri-mar-19-2021-111-am.jpg', '2021-03-19 01:11:57', 35, '2021-03-19 01:11:57', NULL),
(2, 5, 8, 'comment_fri-mar-19-2021-114-am.xlsx', '2021-03-19 01:14:41', 35, '2021-03-19 01:14:41', NULL),
(3, 11, 9, 'comment_thu-mar-25-2021-1212-am.png', '2021-03-25 00:12:27', 35, '2021-03-25 00:12:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_task_time_log`
--

CREATE TABLE `mas_task_time_log` (
  `id` int(25) NOT NULL,
  `task_id` int(25) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `total_time` bigint(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_task_time_log`
--

INSERT INTO `mas_task_time_log` (`id`, `task_id`, `user_id`, `start_time`, `end_time`, `total_time`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 6, 59, '2021-04-02 11:41:32', '2021-04-02 11:41:46', NULL, '2021-04-02 11:41:32', 59, '2021-04-02 11:41:46', 59),
(2, 19, 57, '2021-04-11 20:22:43', '2021-04-11 20:22:55', NULL, '2021-04-11 20:22:43', 57, '2021-04-11 20:22:55', 57),
(3, 19, 57, '2021-04-11 20:23:03', '2021-04-11 20:23:17', NULL, '2021-04-11 20:23:03', 57, '2021-04-11 20:23:17', 57);

-- --------------------------------------------------------

--
-- Table structure for table `mas_team`
--

CREATE TABLE `mas_team` (
  `id` int(25) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `company_id` int(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_team`
--

INSERT INTO `mas_team` (`id`, `user_id`, `company_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 57, 21, '2021-03-24 00:23:55', NULL, '2021-03-24 00:23:55', NULL),
(2, 59, 21, '2021-04-02 01:23:40', NULL, '2021-04-02 01:23:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_ticket`
--

CREATE TABLE `mas_ticket` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `subject` text,
  `description` text,
  `attachment` varchar(50) DEFAULT NULL,
  `status` varchar(25) DEFAULT 'open',
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_ticket`
--

INSERT INTO `mas_ticket` (`id`, `user_id`, `client_id`, `company_id`, `subject`, `description`, `attachment`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 55, 9, 21, 'this is ticket for subject', 'this is description ldklak ldkld kaldklaskda', 'ticket_wed-mar-17-2021-104-am.jpg', 'open', '2021-03-15 00:18:31', NULL, '2021-03-15 00:18:31', NULL),
(2, 55, 9, 21, 'this is ticket for subject', 'this is description ldklak ldkld kaldklaskda', 'ticket_wed-mar-17-2021-104-am.jpg', 'close', '2021-03-15 00:20:30', NULL, '2021-03-25 13:47:27', NULL),
(3, 55, 9, 21, 'the tickelkdlksl ksdl', 'lklkdlsk sldks lksl ksld ksdl skdlk slk slkd sldk sldk sldk sldks ldksdlks lskdlskdls dksldksldks ldksldk sldksldsldksld', 'ticket_wed-mar-17-2021-104-am.jpg', 'open', '2021-03-17 00:35:22', NULL, '2021-03-17 00:35:22', NULL),
(4, 55, 9, 21, 'yhiee jkfj', 'kdjfkdj kdjfkdjfkdjfkdj kdfjkdjf kdjfkdfjkdfjk d', 'ticket_wed-mar-17-2021-104-am.jpg', 'open', '2021-03-17 00:41:09', NULL, '2021-03-17 00:41:09', NULL),
(5, 55, 9, 21, 'thisid sdsdksldk', 'skdlskldk sldksl dsd', 'ticket_wed-mar-17-2021-104-am.jpg', 'open', '2021-03-17 00:54:18', NULL, '2021-03-17 00:54:18', NULL),
(6, 55, 9, 21, 'sdlsdk', 'lkdlskdlskdlsdksld', 'ticket_wed-mar-17-2021-104-am.jpg', 'open', '2021-03-17 01:04:02', NULL, '2021-03-17 01:04:02', NULL),
(7, 55, 9, 21, 'sdskdsdk', 'lalkeowoewe', 'ticket_wed-mar-17-2021-104-am.jpg', 'open', '2021-03-17 01:04:30', NULL, '2021-03-17 01:04:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_ticket_comment`
--

CREATE TABLE `mas_ticket_comment` (
  `id` bigint(20) NOT NULL,
  `ticket_id` bigint(20) DEFAULT NULL,
  `comment` text,
  `commented_by` varchar(50) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_ticket_comment`
--

INSERT INTO `mas_ticket_comment` (`id`, `ticket_id`, `comment`, `commented_by`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 2, 'this is comermen msdmsdmsdnsmdnsm nds', 'company_admin', 35, '2021-03-25 02:32:36', 35, '2021-03-25 02:32:36'),
(2, 2, 'this is comermen msdmsdmsdnsmdnsm nds', 'company_admin', 35, '2021-03-25 02:33:58', 35, '2021-03-25 02:33:58'),
(3, 2, 'Closing remark', 'company_admin', 35, '2021-03-25 13:47:27', 35, '2021-03-25 13:47:27'),
(4, 1, 'this is commet', 'client', 55, '2021-03-25 15:23:54', 55, '2021-03-25 15:23:54'),
(5, 1, 'Hi this commment', 'client', 55, '2021-03-25 15:25:33', 55, '2021-03-25 15:25:33'),
(6, 4, 'kjkjkjkjkj', 'client', 55, '2021-03-25 23:15:51', 55, '2021-03-25 23:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2020_03_14_082849_create_user_role_table', 2),
(5, '2020_03_14_083723_add_user_type_in_user', 3),
(6, '2020_03_14_142610_create_master_companies_table', 4),
(7, '2020_03_14_143559_create_master_projects_table', 5),
(8, '2020_03_14_150218_create_master_tasks_table', 6),
(9, '2020_03_14_151857_alter_master_tasks', 7),
(10, '2020_03_14_152824_add_foreign_keys_in_task_table', 8),
(11, '2020_03_21_162054_alter_user_tabletextpassword', 9),
(12, '2020_04_12_073921_add_descrption_in_mascompanies', 10),
(13, '2020_04_12_074221_add_descrption_in_masprojects', 10),
(14, '2020_04_12_090306_change_updated_mascompanies', 10),
(15, '2020_04_12_091223_change_created_mascompanies', 10),
(16, '2020_04_12_120004_change_updated_masprojects', 10),
(17, '2020_04_12_120432_change_updatedd_masprojects', 10),
(18, '2020_04_14_042909_add_taskprogress_intask', 11),
(19, '2020_04_14_044608_add_taskprogres_intask', 12),
(20, '2020_04_14_045506_create_mas_task_assignee', 13),
(21, '2020_04_14_050739_add_foreign_key_mastaskassignee', 14),
(22, '2020_04_18_134216_createstatustable', 15),
(23, '2020_04_18_160749_create_attachment', 16),
(24, '2020_04_18_161823_adddescriptionstatusmastertasks', 17),
(25, '2020_04_18_170837_addfiletypeinattachment', 18),
(27, '2020_04_20_142135_changecreateupdateinmastertasks', 19),
(28, '2020_04_21_142952_addpositioninmastertask', 20),
(29, '2020_04_30_091214_addtoshowclientinmaster_tasks', 21),
(30, '2020_05_02_113441_create_master_task_comment', 22),
(31, '2020_05_02_114432_create_master_task_comment_attachment', 23),
(32, '2020_05_02_155719_add_task_id_in_mas_task_comment_attachment', 24),
(33, '2020_05_16_134153_add_edit_count_in_master_comment', 25),
(34, '2020_05_16_163148_add_user_id_in_master_companies', 26),
(35, '2020_07_01_075414_create_table_task_timelog', 27),
(36, '2020_07_04_154557_addprofilepicture_in_users', 28),
(37, '2020_07_20_204626_add_slug_in_user_table', 29),
(38, '2020_07_24_211614_client_form', 30),
(39, '2020_07_25_133050_editupdate_in_client_form', 31),
(40, '2020_07_25_143753_remove_in_client_form', 32),
(41, '2020_07_25_220057_alter_client_form', 33),
(42, '2020_07_25_220259_alter_users_table', 34),
(43, '2020_07_25_220939_alterclient_form', 35),
(44, '2020_07_25_220939_alteraddclient_form', 36),
(45, '2020_08_17_180603_create_table_mas_notification', 37),
(46, '2020_08_18_165803_alter_subject_in_notification', 38),
(47, '2020_08_18_173140_alter_mas_notification_status_column', 39),
(48, '2020_10_13_004431_create_client_table', 40),
(49, '2020_10_13_220156_alter_mas_projects', 41),
(50, '2020_10_13_220848_drop_foreign_key_mas_project', 42),
(51, '2020_10_13_221020_add_foreign_key_mas_project', 43),
(52, '2020_10_13_225229_create_team_member_table', 44),
(53, '2020_10_24_174457_alter_email_client_form', 45),
(54, '2020_12_16_215947_create_invoice_table', 46),
(55, '2020_12_23_212604_creat_invoice_item_table', 47),
(56, '2020_12_23_214005_create_invoice_total_table', 48),
(57, '2021_01_07_183958_add_invoice_number_invoice_total', 49),
(58, '2021_01_07_184932_add_invoice_id_invoice_item_detail', 50),
(59, '2021_01_07_185620_alter_mas_invoice_add_invoice_id', 51),
(60, '2021_03_14_105756_alter_master_task_change_client_id', 52),
(61, '2021_03_14_111408_add_foreirgn_key_master_task', 53),
(62, '2021_03_14_220729_create_ticket_table', 54),
(63, '2021_03_14_221855_alter_ticket_table', 55),
(64, '2021_03_16_232714_add_attachment_in_mas_ticket', 55),
(65, '2021_03_18_154911_alter_status_ticket_table', 56),
(66, '2021_03_25_021238_create_table_ticket_comment', 57);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('diwakar@yopmail.com', '$2y$10$GVtgA4ZRKvnq2SH0KR/XrelZQWl5fhMy2XPflXDCvjh3HrnHloRsq', '2021-04-06 09:35:38'),
('gaurav@deverybody.com', '$2y$10$ZYSyxiS8Z1ur0bLzYwJLbOKobWmugS4N0KLH.LoOlcyTmrhR28bHi', '2021-04-08 06:00:36'),
('gaurav@yopmail.com', '$2y$10$S286ZygQG385qsYE6x/CieOvHO3YyiU1smM/xs4J7n1n/YJ/ui/86', '2021-04-08 06:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` int(2) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_role`, `email_verified_at`, `password`, `text_password`, `profile_picture`, `slug`, `c_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Gaurav', 'a@b.com', 2, NULL, '$2y$10$mLKnPstijHM4pDVQ9YppR.w1ygk0iipgqMQNYTVmrKJK2rvKT0Rfa', 'test12345', '2_1594146021.jpg', NULL, 0, NULL, '2020-03-03 12:59:32', '2020-07-07 18:20:21'),
(3, 'gaurav', 'diwakar@deverybody.com', 4, NULL, '$2y$10$kuB1rLWy7j1EV9/N6C4P2uBRSjSma9X5lSsvKDOpis7kDvyRzNmw2', 'test12345', NULL, NULL, 0, NULL, '2020-03-08 01:04:06', '2020-03-08 01:04:06'),
(4, 'Diwakar', 'diwakar@yopmail.com', 2, NULL, '$2y$10$ZK/kkFbuZZH2Ht0OVHD0qeK3/mDmruZU7ywMkqH5twvI1Nab9/.Bq', NULL, NULL, NULL, 0, NULL, '2020-03-12 14:17:17', '2020-04-30 14:25:25'),
(5, 'Test', 'gaurav@yopmail.com', 1, NULL, '$2y$10$W53u7BdIyw/UsLyBVWeL8Optynn4zGkTY4CunqNcZbkxU1D8E0Gka', NULL, NULL, NULL, 0, NULL, '2020-03-21 10:38:10', '2020-03-21 10:38:10'),
(35, 'Deverybody', 'admin@deverybody.com', 1, NULL, '$2y$10$nJYJOaMW0qMJPujtbd4nTeAC5rJwOGNvgazbFzeIteUQAI/.Q.W0G', 'test12345', NULL, NULL, 0, NULL, '2020-10-13 15:19:54', '2020-10-13 15:19:54'),
(36, 'Yahoo', 'admin@yahoo.com', 1, NULL, '$2y$10$vRHXKJF43B8tlSZ3njQEpu2xVVHnvo4yjTKIw/yU.4jwIy9baVn.C', 'test12345', NULL, NULL, 0, NULL, '2020-10-13 15:22:07', '2020-10-13 15:22:07'),
(41, 'gaurav', 'gauravui@yopmail.com', 2, NULL, '$2y$10$uHW6IpmU1Kl8odTmvZdIC.eNSnu/OKyjgeg64.2uemlwVeBVyXCfy', 'test123456', NULL, NULL, 0, NULL, '2020-10-19 19:48:22', '2020-11-15 11:56:51'),
(52, 'Gaurav', 'gaurava786@yopmail.com', 2, NULL, '$2y$10$zN0zagqzI9ay95yGNoeGS.cpZK4gjqM0/vwPiUoNA1zInGV0yBKLG', 'test12345', NULL, NULL, 0, NULL, '2020-10-31 14:57:59', '2020-10-31 14:57:59'),
(53, 'DealsKart', 'gaurav00123@yopmail.com', 3, NULL, '$2y$10$FQzpa6LR53vhxKOPoDK8HOj9aNEkmQukGj47MRpMB7S5H4rKxD1q6', 'test12345', NULL, 'dealskart', 3, NULL, '2021-01-07 16:15:12', '2021-01-07 16:15:12'),
(54, 'ABCD Pvt Ltd', 'gaurav@streetkart.in', 3, NULL, '$2y$10$XhzEoWODhTjif.PlRR1mJ.15Imsmlu8qOmVrN/yJsZfFAS8XLf2bS', 'test12345', NULL, 'abcd-pvt-ltd', 2, NULL, '2021-01-07 16:15:21', '2021-01-07 16:15:21'),
(55, 'Streetkart sdsd', 'gauravwe@yopmail.com', 3, NULL, '$2y$10$WAkQZMaVvTCZ8Zon22PbAe2oJDqA6KC5JNUWgxaTGyLZrHOZqsyM.', 'test12345', NULL, 'streetkart', 5, NULL, '2021-01-07 18:14:04', '2021-04-02 11:08:28'),
(56, 'Pure Armor Labs', 'info@purearmorlabs.com', 1, NULL, '$2y$10$8LFw3Y6hgmSPTmWqz./XZ.2y6lKL4Fky561gSdR2/5himhaD8JbcC', 'test12345', NULL, NULL, 0, NULL, '2021-03-18 19:12:41', '2021-03-18 19:12:41'),
(57, 'John', 'john@deverybody.com', 2, NULL, '$2y$10$6STfm482Vxbr5K7cmPVEu.dOaGDyybRPZ7qtXMTdtXq3JyVCGGXlm', 'test12345', NULL, NULL, 0, NULL, '2021-03-23 18:53:55', '2021-03-23 18:53:55'),
(58, 'Diwakar', 'diwakarkumar@deverybody.com', 1, NULL, '$2y$10$vT0vO.TsLk8NkVfsbdpyFuGyfIaYLSvK.MH4EFN3bXGQcQ4vRGvOa', NULL, NULL, NULL, 0, NULL, '2021-04-01 19:10:04', '2021-04-01 19:10:04'),
(59, 'Gaurav', 'gaurav@deverybody.com', 2, NULL, '$2y$10$aQKwCqp34NSo4fYWwbaN9ulwL1PjQLF4ufslJpFIJNCqpM.la6gue', 'test12345', NULL, NULL, 0, NULL, '2021-04-01 19:53:39', '2021-04-01 19:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(2) NOT NULL,
  `user_type_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_type_name`) VALUES
(1, 'client_admin'),
(2, 'team'),
(3, 'client'),
(4, 'super_admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_form`
--
ALTER TABLE `client_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_item_detail`
--
ALTER TABLE `invoice_item_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_total`
--
ALTER TABLE `invoice_total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_tasks`
--
ALTER TABLE `master_tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `task_status` (`task_status`);

--
-- Indexes for table `mas_client`
--
ALTER TABLE `mas_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_companies`
--
ALTER TABLE `mas_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_dropdowns`
--
ALTER TABLE `mas_dropdowns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_invoice`
--
ALTER TABLE `mas_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_notification`
--
ALTER TABLE `mas_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from` (`from`),
  ADD KEY `to` (`to`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `mas_projects`
--
ALTER TABLE `mas_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`client_id`);

--
-- Indexes for table `mas_task_assignee`
--
ALTER TABLE `mas_task_assignee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `mas_task_attachments`
--
ALTER TABLE `mas_task_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `mas_task_comment`
--
ALTER TABLE `mas_task_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `mas_task_comment_attachment`
--
ALTER TABLE `mas_task_comment_attachment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_comment_id` (`task_comment_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `mas_task_time_log`
--
ALTER TABLE `mas_task_time_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mas_team`
--
ALTER TABLE `mas_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_ticket`
--
ALTER TABLE `mas_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_ticket_comment`
--
ALTER TABLE `mas_ticket_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `user_role` (`user_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_form`
--
ALTER TABLE `client_form`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_item_detail`
--
ALTER TABLE `invoice_item_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice_total`
--
ALTER TABLE `invoice_total`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_tasks`
--
ALTER TABLE `master_tasks`
  MODIFY `task_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mas_client`
--
ALTER TABLE `mas_client`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mas_companies`
--
ALTER TABLE `mas_companies`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mas_dropdowns`
--
ALTER TABLE `mas_dropdowns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mas_invoice`
--
ALTER TABLE `mas_invoice`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mas_notification`
--
ALTER TABLE `mas_notification`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `mas_projects`
--
ALTER TABLE `mas_projects`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mas_task_assignee`
--
ALTER TABLE `mas_task_assignee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mas_task_attachments`
--
ALTER TABLE `mas_task_attachments`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mas_task_comment`
--
ALTER TABLE `mas_task_comment`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mas_task_comment_attachment`
--
ALTER TABLE `mas_task_comment_attachment`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mas_task_time_log`
--
ALTER TABLE `mas_task_time_log`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mas_team`
--
ALTER TABLE `mas_team`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mas_ticket`
--
ALTER TABLE `mas_ticket`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mas_ticket_comment`
--
ALTER TABLE `mas_ticket_comment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_tasks`
--
ALTER TABLE `master_tasks`
  ADD CONSTRAINT `master_tasks_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `mas_client` (`id`),
  ADD CONSTRAINT `master_tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `mas_projects` (`id`),
  ADD CONSTRAINT `master_tasks_ibfk_3` FOREIGN KEY (`task_status`) REFERENCES `mas_dropdowns` (`id`);

--
-- Constraints for table `mas_notification`
--
ALTER TABLE `mas_notification`
  ADD CONSTRAINT `mas_notification_ibfk_1` FOREIGN KEY (`from`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mas_notification_ibfk_2` FOREIGN KEY (`to`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mas_notification_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mas_notification_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `mas_projects`
--
ALTER TABLE `mas_projects`
  ADD CONSTRAINT `mas_projects_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `mas_client` (`id`);

--
-- Constraints for table `mas_task_assignee`
--
ALTER TABLE `mas_task_assignee`
  ADD CONSTRAINT `mas_task_assignee_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `master_tasks` (`task_id`);

--
-- Constraints for table `mas_task_attachments`
--
ALTER TABLE `mas_task_attachments`
  ADD CONSTRAINT `mas_task_attachments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `master_tasks` (`task_id`);

--
-- Constraints for table `mas_task_comment`
--
ALTER TABLE `mas_task_comment`
  ADD CONSTRAINT `mas_task_comment_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `master_tasks` (`task_id`);

--
-- Constraints for table `mas_task_comment_attachment`
--
ALTER TABLE `mas_task_comment_attachment`
  ADD CONSTRAINT `mas_task_comment_attachment_ibfk_1` FOREIGN KEY (`task_comment_id`) REFERENCES `mas_task_comment` (`id`),
  ADD CONSTRAINT `mas_task_comment_attachment_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `master_tasks` (`task_id`);

--
-- Constraints for table `mas_task_time_log`
--
ALTER TABLE `mas_task_time_log`
  ADD CONSTRAINT `mas_task_time_log_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `master_tasks` (`task_id`),
  ADD CONSTRAINT `mas_task_time_log_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`user_role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
