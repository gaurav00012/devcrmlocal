/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.11-MariaDB : Database - devcrm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`devcrm` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `devcrm`;

/*Table structure for table `mas_companies` */

DROP TABLE IF EXISTS `mas_companies`;

CREATE TABLE `mas_companies` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `mas_companies` */

insert  into `mas_companies`(`id`,`user_id`,`company_name`,`description`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (7,17,'Google','testsjs',NULL,'2020-05-18 14:44:43',NULL,'2020-05-18 14:44:43'),(8,18,'Larrie Black','Blinds and shutters',NULL,'2020-05-18 17:33:27',NULL,'2020-05-18 17:33:27');

/*Table structure for table `mas_dropdowns` */

DROP TABLE IF EXISTS `mas_dropdowns`;

CREATE TABLE `mas_dropdowns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(25) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mas_dropdowns` */

insert  into `mas_dropdowns`(`id`,`type`,`name`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'TASK_STATUS','To do',NULL,NULL,NULL,NULL),(2,'TASK_STATUS','Ongoing',NULL,NULL,NULL,NULL),(3,'TASK_STATUS','Done',NULL,NULL,NULL,NULL),(4,'TASK_STATUS','Paused',NULL,NULL,NULL,NULL);

/*Table structure for table `mas_projects` */

DROP TABLE IF EXISTS `mas_projects`;

CREATE TABLE `mas_projects` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `company_id` int(25) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `mas_projects_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `mas_companies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `mas_projects` */

insert  into `mas_projects`(`id`,`project_name`,`description`,`company_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (10,'Google Mobile App Development','Mobile app development project',7,NULL,'2020-05-18 14:47:14',NULL,'2020-05-18 14:47:14'),(11,'Blinds and Shutters Website design','Built a website with word press',8,NULL,'2020-05-18 17:34:44',NULL,'2020-05-18 17:34:44'),(12,'Texting Application','Build texting application with twilo',8,NULL,'2020-05-18 17:35:47',NULL,'2020-05-18 17:35:47');

/*Table structure for table `mas_task_assignee` */

DROP TABLE IF EXISTS `mas_task_assignee`;

CREATE TABLE `mas_task_assignee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(25) DEFAULT NULL,
  `assignee` bigint(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  CONSTRAINT `mas_task_assignee_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `master_tasks` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `mas_task_assignee` */

insert  into `mas_task_assignee`(`id`,`task_id`,`assignee`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (73,69,2,'2020-05-18 14:51:36',3,'2020-05-18 14:51:36',NULL),(75,71,14,'2020-05-18 15:00:17',3,'2020-05-18 15:00:17',NULL),(76,70,2,'2020-05-18 17:05:17',3,'2020-05-18 17:05:17',NULL),(77,70,4,'2020-05-18 17:05:17',3,'2020-05-18 17:05:17',NULL),(78,72,2,'2020-05-18 17:39:04',3,'2020-05-18 17:39:04',NULL),(79,72,4,'2020-05-18 17:39:04',3,'2020-05-18 17:39:04',NULL),(80,73,2,'2020-05-18 17:42:09',3,'2020-05-18 17:42:09',NULL),(81,74,2,'2020-05-18 17:58:40',3,'2020-05-18 17:58:40',NULL);

/*Table structure for table `mas_task_attachments` */

DROP TABLE IF EXISTS `mas_task_attachments`;

CREATE TABLE `mas_task_attachments` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `task_id` int(25) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(25) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  CONSTRAINT `mas_task_attachments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `master_tasks` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mas_task_attachments` */

insert  into `mas_task_attachments`(`id`,`task_id`,`file_name`,`file_type`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (31,74,'task_mon-may-18-2020-558-pm.docx',NULL,'2020-05-18 17:58:45',3,'2020-05-18 17:58:45',NULL);

/*Table structure for table `mas_task_comment` */

DROP TABLE IF EXISTS `mas_task_comment`;

CREATE TABLE `mas_task_comment` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `task_id` int(25) DEFAULT NULL,
  `task_comments` text DEFAULT NULL,
  `edit_count` int(25) DEFAULT 0,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  CONSTRAINT `mas_task_comment_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `master_tasks` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mas_task_comment` */

insert  into `mas_task_comment`(`id`,`task_id`,`task_comments`,`edit_count`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,70,'<p>This is comment&nbsp;</p>',1,4,'2020-05-18 15:02:03',4,'2020-05-18 16:03:35'),(18,70,'<p>sdsdsds sdsdsd sdsdsd&nbsp;</p>',0,4,'2020-05-18 16:51:41',NULL,'2020-05-18 16:51:41'),(19,70,'<p>This comment is added by gaurav</p>',0,2,'2020-05-18 17:10:46',NULL,'2020-05-18 17:10:46'),(20,70,'<p>document is provided jhjhj&nbsp;</p>',1,4,'2020-05-18 17:27:31',4,'2020-05-18 17:27:52'),(21,73,'<p>Weekly report sent today.</p>',1,2,'2020-05-18 17:45:01',2,'2020-05-18 17:45:25'),(22,74,'<p>this is edit comment .. ... .&nbsp; &nbsp;.&nbsp;</p>',3,18,'2020-05-20 07:33:18',18,'2020-05-20 09:24:27'),(23,74,'<p>Mail is confirm</p>',0,18,'2020-05-20 09:26:01',NULL,'2020-05-20 09:26:01'),(24,74,'<p>Mail is confirm</p>',0,18,'2020-05-20 09:26:01',NULL,'2020-05-20 09:26:01'),(25,74,'<p>Mail is confirm</p>',0,18,'2020-05-20 09:26:15',NULL,'2020-05-20 09:26:15'),(26,74,'<p>Mail is confirm</p>',0,18,'2020-05-20 09:26:15',NULL,'2020-05-20 09:26:15'),(27,74,'<p>test comment&nbsp;&nbsp;</p>',0,18,'2020-05-20 09:27:12',NULL,'2020-05-20 09:27:12'),(28,74,'<p>last comment .. .. ... !!!&nbsp;</p>',0,18,'2020-05-20 09:32:23',NULL,'2020-05-20 09:32:23'),(29,74,'<p>ssdsdsdsd sdsds&nbsp;</p>',0,18,'2020-05-20 10:29:53',NULL,'2020-05-20 10:29:53'),(30,74,'<p>this is completed .. .. .. .. .. . .. . . . .. . . .&nbsp;</p>',0,18,'2020-05-23 18:47:24',NULL,'2020-05-23 18:47:24'),(31,74,'<p>sds ds sds dsd sds sds sds ds sds ds s dsds dsd</p>',0,18,'2020-05-23 19:22:48',NULL,'2020-05-23 19:22:48'),(32,74,'<p>this is comment&nbsp; dsd</p>',1,18,'2020-05-24 11:45:11',18,'2020-05-24 11:46:59'),(33,70,'<p>sds sdsds dsdsdsd</p>',0,2,'2020-05-24 12:56:02',NULL,'2020-05-24 12:56:02'),(34,69,'<p>this design inteface</p>',0,2,'2020-05-24 12:56:56',NULL,'2020-05-24 12:56:56'),(35,69,'<p>this design inteface</p>',0,2,'2020-05-24 12:57:23',NULL,'2020-05-24 12:57:23'),(36,72,'<p>this is test comment</p>',0,2,'2020-05-24 15:29:48',NULL,'2020-05-24 15:29:48'),(37,74,NULL,0,3,'2020-05-24 16:58:29',NULL,'2020-05-24 16:58:29'),(38,74,NULL,0,3,'2020-05-24 16:59:49',NULL,'2020-05-24 16:59:49'),(39,74,'<p>THIS IS COMMENT&nbsp;</p>',0,3,'2020-05-24 17:01:11',NULL,'2020-05-24 17:01:11'),(40,74,'<p>sdsd sdsdsds sdsdsd sds sd</p>',0,3,'2020-05-24 17:02:53',NULL,'2020-05-24 17:02:53'),(41,73,'<p>Err</p>',2,3,'2020-05-25 14:06:12',3,'2020-05-25 15:10:31'),(42,73,'<p>Weekly report send today .. ... 25-05-2020</p>',0,3,'2020-05-25 15:14:47',NULL,'2020-05-25 15:14:47');

/*Table structure for table `mas_task_comment_attachment` */

DROP TABLE IF EXISTS `mas_task_comment_attachment`;

CREATE TABLE `mas_task_comment_attachment` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `task_id` int(25) DEFAULT NULL,
  `task_comment_id` int(2) DEFAULT NULL,
  `attachment_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_comment_id` (`task_comment_id`),
  KEY `task_id` (`task_id`),
  CONSTRAINT `mas_task_comment_attachment_ibfk_1` FOREIGN KEY (`task_comment_id`) REFERENCES `mas_task_comment` (`id`),
  CONSTRAINT `mas_task_comment_attachment_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `master_tasks` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mas_task_comment_attachment` */

insert  into `mas_task_comment_attachment`(`id`,`task_id`,`task_comment_id`,`attachment_name`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (18,74,31,'comment_sat-may-23-2020-718-pm.txt','2020-05-23 19:18:29',18,'2020-05-23 19:18:29',NULL),(19,74,31,'comment_sat-may-23-2020-722-pm.txt','2020-05-23 19:22:48',18,'2020-05-23 19:22:48',NULL),(21,74,32,'comment_sun-may-24-2020-1145-am.jpg','2020-05-24 11:45:13',18,'2020-05-24 11:45:13',NULL),(22,69,35,'comment_sun-may-24-2020-1257-pm.jpg','2020-05-24 12:57:23',2,'2020-05-24 12:57:23',NULL),(23,72,36,'comment_sun-may-24-2020-329-pm.jpg','2020-05-24 15:29:49',2,'2020-05-24 15:29:49',NULL),(24,74,37,'comment_sun-may-24-2020-458-pm.jpg','2020-05-24 16:58:29',3,'2020-05-24 16:58:29',NULL),(25,74,38,'comment_sun-may-24-2020-459-pm.jpg','2020-05-24 16:59:49',3,'2020-05-24 16:59:49',NULL),(26,74,39,'comment_sun-may-24-2020-501-pm.jpg','2020-05-24 17:01:11',3,'2020-05-24 17:01:11',NULL),(27,74,40,'comment_sun-may-24-2020-502-pm.txt','2020-05-24 17:02:53',3,'2020-05-24 17:02:53',NULL),(28,73,41,'comment_mon-may-25-2020-206-pm.jpg','2020-05-25 14:06:14',3,'2020-05-25 14:06:14',NULL),(29,73,42,'comment_mon-may-25-2020-314-pm.jpg','2020-05-25 15:14:48',3,'2020-05-25 15:14:48',NULL);

/*Table structure for table `master_tasks` */

DROP TABLE IF EXISTS `master_tasks`;

CREATE TABLE `master_tasks` (
  `task_id` int(25) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `company_id` int(25) DEFAULT NULL,
  `project_id` int(25) DEFAULT NULL,
  `task_status` int(11) DEFAULT NULL,
  `task_description` text DEFAULT NULL,
  `task_progress` int(11) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `is_attachment` tinyint(25) DEFAULT NULL,
  `task_view_to_client` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`task_id`),
  KEY `company_id` (`company_id`),
  KEY `project_id` (`project_id`),
  KEY `task_status` (`task_status`),
  CONSTRAINT `master_tasks_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `mas_companies` (`id`),
  CONSTRAINT `master_tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `mas_projects` (`id`),
  CONSTRAINT `master_tasks_ibfk_3` FOREIGN KEY (`task_status`) REFERENCES `mas_dropdowns` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `master_tasks` */

insert  into `master_tasks`(`task_id`,`task_name`,`user_id`,`company_id`,`project_id`,`task_status`,`task_description`,`task_progress`,`due_date`,`position`,`is_attachment`,`task_view_to_client`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (69,'Design User interface',NULL,7,10,1,'Design ui for mobile app',NULL,'2020-05-27 00:00:00',NULL,NULL,NULL,'2020-05-18 14:51:36','3','2020-05-18 14:51:36',NULL),(70,'Test UI design',NULL,7,10,2,'Test UI Design of mobile app',NULL,'2020-04-24 00:00:00',NULL,NULL,NULL,'2020-05-18 14:58:34','3','2020-05-18 17:27:31','3'),(71,'Add functionality in mobile app',NULL,7,10,1,'add functionality in mobile app after testing',NULL,'2020-05-31 00:00:00',NULL,NULL,NULL,'2020-05-18 15:00:17','3','2020-05-18 15:00:17',NULL),(72,'Facebook Advertising',NULL,8,11,4,'Spend 300 dollars on facebook ads this month',NULL,'2020-05-22 00:00:00',2,NULL,NULL,'2020-05-18 17:39:04','3','2020-05-24 15:30:09',NULL),(73,'Send weekly market report',NULL,8,11,3,'Send weekly marketing report to larry',NULL,'2020-05-31 00:00:00',1,NULL,1,'2020-05-18 17:42:09','3','2020-05-18 17:50:55',NULL),(74,'Switch Emails back to Microsoft',NULL,8,11,2,'Switch email back to microsoft',NULL,'2020-05-21 00:00:00',NULL,NULL,1,'2020-05-18 17:58:40','3','2020-05-20 09:32:06',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(4,'2020_03_14_082849_create_user_role_table',2),(5,'2020_03_14_083723_add_user_type_in_user',3),(6,'2020_03_14_142610_create_master_companies_table',4),(7,'2020_03_14_143559_create_master_projects_table',5),(8,'2020_03_14_150218_create_master_tasks_table',6),(9,'2020_03_14_151857_alter_master_tasks',7),(10,'2020_03_14_152824_add_foreign_keys_in_task_table',8),(11,'2020_03_21_162054_alter_user_tabletextpassword',9),(12,'2020_04_12_073921_add_descrption_in_mascompanies',10),(13,'2020_04_12_074221_add_descrption_in_masprojects',10),(14,'2020_04_12_090306_change_updated_mascompanies',10),(15,'2020_04_12_091223_change_created_mascompanies',10),(16,'2020_04_12_120004_change_updated_masprojects',10),(17,'2020_04_12_120432_change_updatedd_masprojects',10),(18,'2020_04_14_042909_add_taskprogress_intask',11),(19,'2020_04_14_044608_add_taskprogres_intask',12),(20,'2020_04_14_045506_create_mas_task_assignee',13),(21,'2020_04_14_050739_add_foreign_key_mastaskassignee',14),(22,'2020_04_18_134216_createstatustable',15),(23,'2020_04_18_160749_create_attachment',16),(24,'2020_04_18_161823_adddescriptionstatusmastertasks',17),(25,'2020_04_18_170837_addfiletypeinattachment',18),(27,'2020_04_20_142135_changecreateupdateinmastertasks',19),(28,'2020_04_21_142952_addpositioninmastertask',20),(29,'2020_04_30_091214_addtoshowclientinmaster_tasks',21),(30,'2020_05_02_113441_create_master_task_comment',22),(31,'2020_05_02_114432_create_master_task_comment_attachment',23),(32,'2020_05_02_155719_add_task_id_in_mas_task_comment_attachment',24),(33,'2020_05_16_134153_add_edit_count_in_master_comment',25),(34,'2020_05_16_163148_add_user_id_in_master_companies',26);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `user_role_id` int(2) NOT NULL,
  `user_type_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`user_role_id`,`user_type_name`) values (1,'admin'),(2,'developer'),(3,'client');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` int(2) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `user_role` (`user_role`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`user_role`,`email_verified_at`,`password`,`text_password`,`remember_token`,`created_at`,`updated_at`) values (1,'Gaurav','aggarwal.gaurav611@gmail.com',1,NULL,'$2y$10$Ks.C2PMSbjPiZeK7qOvAs.n2Q5FNtdjKr4Pxi40Grja19l4ZDbra.',NULL,NULL,'2020-02-15 03:37:14','2020-02-15 03:37:14'),(2,'Gaurav','a@b.com',2,NULL,'$2y$10$mLKnPstijHM4pDVQ9YppR.w1ygk0iipgqMQNYTVmrKJK2rvKT0Rfa','test12345',NULL,'2020-03-03 18:29:32','2020-05-18 17:09:55'),(3,'gaurav','aa@b.com',1,NULL,'$2y$10$kuB1rLWy7j1EV9/N6C4P2uBRSjSma9X5lSsvKDOpis7kDvyRzNmw2','test12345',NULL,'2020-03-08 06:34:06','2020-03-08 06:34:06'),(4,'Diwakar','diwakar@yopmail.com',2,NULL,'$2y$10$ZK/kkFbuZZH2Ht0OVHD0qeK3/mDmruZU7ywMkqH5twvI1Nab9/.Bq',NULL,NULL,'2020-03-12 19:47:17','2020-04-30 19:55:25'),(5,'Test','gaurav@yopmail.com',1,NULL,'$2y$10$W53u7BdIyw/UsLyBVWeL8Optynn4zGkTY4CunqNcZbkxU1D8E0Gka',NULL,NULL,'2020-03-21 16:08:10','2020-03-21 16:08:10'),(6,'Yark','rat@yopmail.com',1,NULL,'$2y$10$M1MjWJbIPBqOadFzT3J9zu.Psqnzh/rxQoVlo1RlPDSZZBl8vUvKu',NULL,NULL,'2020-03-21 16:09:28','2020-03-21 16:09:28'),(7,'Umbrella','umbrella@yopmail.com',1,NULL,'$2y$10$TtwxEfQieVeAezxr9G5KN.5X7gfDMLr4CJADmnPn8LvUFobbUeg/W',NULL,NULL,'2020-03-21 16:13:57','2020-03-21 16:13:57'),(10,'Jerry','jerry@yopmail.com',1,NULL,'$2y$10$Slhn6PvtUDb/IQpkdRu18OEDrQRD.MKxr80LZ8//0QwsU2jKmXe/2','dummy12345',NULL,'2020-03-21 17:53:12','2020-03-21 17:55:53'),(11,'Test Client','client@yopmail.com',3,NULL,'$2y$10$ZoymujXDa6tLcex39KHqxeo8SONK16wSjr2C5xE8nb5yX6s1P2p5W','test12345678',NULL,'2020-03-21 19:45:14','2020-03-21 20:00:45'),(13,'client 4','sds@yopmail.com',3,NULL,'$2y$10$/snsGFhiU2hiRf6mDoImdOM6hYu4Ks.20YSKcOCzJz7ApZLphdQw2','test123456',NULL,'2020-03-21 19:55:25','2020-03-21 19:55:25'),(14,'team name','team@gmail.com',2,NULL,'$2y$10$BpTt.RqdYOoBgjBzP5pKPe1wklAZOUa1S1UfQQatg4EMhUjMa/MF2','test123456',NULL,'2020-03-22 06:17:24','2020-03-22 06:17:24'),(17,'Google','admin@google.com',3,NULL,'$2y$10$zbFI8cK1CWJaRBk6HhM0F.P9uyuHbNE.fpRrEW3YzqJ4BktYMLIXS','test12345',NULL,'2020-05-18 14:44:43','2020-05-18 14:44:43'),(18,'Larrie Black','info@aabsaz.com',3,NULL,'$2y$10$99ufXeQUoKGEzwcdEpW6WOACkMqWui5XzVWFjAt7UXKzySvjEBYa2','test12345',NULL,'2020-05-18 17:33:27','2020-05-18 17:33:27');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
