/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.38-MariaDB : Database - devcrm
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`devcrm` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `devcrm`;

/*Table structure for table `mas_companies` */

DROP TABLE IF EXISTS `mas_companies`;

CREATE TABLE `mas_companies` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `mas_companies` */

insert  into `mas_companies`(`id`,`company_name`,`description`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Sucavu','',NULL,NULL,NULL,NULL),(2,'Ultimate LeadsWell','',NULL,NULL,NULL,NULL),(3,'Kadee Malone','',NULL,NULL,NULL,NULL),(4,'J.W. Medspa','',NULL,NULL,NULL,NULL),(5,'Legends Vape','',NULL,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `mas_projects` */

insert  into `mas_projects`(`id`,`project_name`,`description`,`company_id`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Sucavu Website','',1,NULL,NULL,NULL,NULL),(2,'Sucavu Flyer','',1,NULL,NULL,NULL,NULL),(3,'Sucavu Marketing','',1,NULL,NULL,NULL,NULL),(4,'UL App','',2,NULL,NULL,NULL,NULL),(5,'Kadee Website','',3,NULL,NULL,NULL,NULL),(6,'Website','',4,NULL,NULL,NULL,NULL),(7,'Facebook Marketing','',4,NULL,NULL,NULL,NULL),(8,'Website','',5,NULL,NULL,NULL,NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mas_task_assignee` */

/*Table structure for table `master_tasks` */

DROP TABLE IF EXISTS `master_tasks`;

CREATE TABLE `master_tasks` (
  `task_id` int(25) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `company_id` int(25) DEFAULT NULL,
  `project_id` int(25) DEFAULT NULL,
  `task_progress` int(11) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `is_attachment` tinyint(25) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`task_id`),
  KEY `company_id` (`company_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `master_tasks_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `mas_companies` (`id`),
  CONSTRAINT `master_tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `mas_projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `master_tasks` */

insert  into `master_tasks`(`task_id`,`task_name`,`user_id`,`company_id`,`project_id`,`task_progress`,`due_date`,`is_attachment`,`created`,`created_by`,`updated`,`updated_by`) values (1,'Task one',NULL,1,1,NULL,'2020-04-14 10:07:58',NULL,NULL,NULL,NULL,NULL),(2,'Task Two',NULL,2,4,NULL,'2020-04-14 10:08:03',NULL,NULL,NULL,NULL,NULL),(3,'Task Three',NULL,3,5,NULL,'2020-04-30 10:08:07',NULL,NULL,NULL,NULL,NULL),(4,'Task Four',NULL,4,6,NULL,'2020-04-30 10:08:11',NULL,NULL,NULL,NULL,NULL),(5,'Task Five',NULL,5,7,NULL,'2020-04-30 10:08:16',NULL,NULL,NULL,NULL,NULL),(6,'Task Six',NULL,NULL,2,NULL,'2020-04-30 10:08:20',NULL,NULL,NULL,NULL,NULL),(7,'Task Seven',NULL,2,4,NULL,'2020-04-30 10:08:24',NULL,NULL,NULL,NULL,NULL),(8,'Task Eight',NULL,2,4,NULL,'2020-04-30 10:08:28',NULL,NULL,NULL,NULL,NULL),(9,'Task Nine',NULL,2,4,NULL,'2020-04-30 10:08:32',NULL,NULL,NULL,NULL,NULL),(10,'Task Ten',NULL,NULL,4,NULL,'2020-05-01 10:08:36',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(4,'2020_03_14_082849_create_user_role_table',2),(5,'2020_03_14_083723_add_user_type_in_user',3),(6,'2020_03_14_142610_create_master_companies_table',4),(7,'2020_03_14_143559_create_master_projects_table',5),(8,'2020_03_14_150218_create_master_tasks_table',6),(9,'2020_03_14_151857_alter_master_tasks',7),(10,'2020_03_14_152824_add_foreign_keys_in_task_table',8),(11,'2020_03_21_162054_alter_user_tabletextpassword',9),(12,'2020_04_12_073921_add_descrption_in_mascompanies',10),(13,'2020_04_12_074221_add_descrption_in_masprojects',10),(14,'2020_04_12_090306_change_updated_mascompanies',10),(15,'2020_04_12_091223_change_created_mascompanies',10),(16,'2020_04_12_120004_change_updated_masprojects',10),(17,'2020_04_12_120432_change_updatedd_masprojects',10),(18,'2020_04_14_042909_add_taskprogress_intask',11),(19,'2020_04_14_044608_add_taskprogres_intask',12),(20,'2020_04_14_045506_create_mas_task_assignee',13),(21,'2020_04_14_050739_add_foreign_key_mastaskassignee',14);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`user_role`,`email_verified_at`,`password`,`text_password`,`remember_token`,`created_at`,`updated_at`) values (1,'Gaurav','aggarwal.gaurav611@gmail.com',1,NULL,'$2y$10$Ks.C2PMSbjPiZeK7qOvAs.n2Q5FNtdjKr4Pxi40Grja19l4ZDbra.',NULL,NULL,'2020-02-15 03:37:14','2020-02-15 03:37:14'),(2,'Gaurav','a@b.com',2,NULL,'$2y$10$CkOSiMmHi670YaW4/vrf4.MciqOheDlZYEbQ/9Q7h3sDv9FjEpJWq',NULL,NULL,'2020-03-03 18:29:32','2020-03-03 18:29:32'),(3,'gaurav','aa@b.com',1,NULL,'$2y$10$kuB1rLWy7j1EV9/N6C4P2uBRSjSma9X5lSsvKDOpis7kDvyRzNmw2','test12345',NULL,'2020-03-08 06:34:06','2020-03-08 06:34:06'),(4,'Diwakar','diwakar@yopmail.com',2,NULL,'$2y$10$ZoJ1snFI3i3NwlstCrv0q.FKQ72Z2ohpM81FlXthhA8ppiE7YGaMa',NULL,NULL,'2020-03-12 19:47:17','2020-03-12 19:47:17'),(5,'Test','gaurav@yopmail.com',1,NULL,'$2y$10$W53u7BdIyw/UsLyBVWeL8Optynn4zGkTY4CunqNcZbkxU1D8E0Gka',NULL,NULL,'2020-03-21 16:08:10','2020-03-21 16:08:10'),(6,'Yark','rat@yopmail.com',1,NULL,'$2y$10$M1MjWJbIPBqOadFzT3J9zu.Psqnzh/rxQoVlo1RlPDSZZBl8vUvKu',NULL,NULL,'2020-03-21 16:09:28','2020-03-21 16:09:28'),(7,'Umbrella','umbrella@yopmail.com',1,NULL,'$2y$10$TtwxEfQieVeAezxr9G5KN.5X7gfDMLr4CJADmnPn8LvUFobbUeg/W',NULL,NULL,'2020-03-21 16:13:57','2020-03-21 16:13:57'),(10,'Jerry','jerry@yopmail.com',1,NULL,'$2y$10$Slhn6PvtUDb/IQpkdRu18OEDrQRD.MKxr80LZ8//0QwsU2jKmXe/2','dummy12345',NULL,'2020-03-21 17:53:12','2020-03-21 17:55:53'),(11,'Test Client','client@yopmail.com',3,NULL,'$2y$10$ZoymujXDa6tLcex39KHqxeo8SONK16wSjr2C5xE8nb5yX6s1P2p5W','test12345678',NULL,'2020-03-21 19:45:14','2020-03-21 20:00:45'),(13,'client 4','sds@yopmail.com',3,NULL,'$2y$10$/snsGFhiU2hiRf6mDoImdOM6hYu4Ks.20YSKcOCzJz7ApZLphdQw2','test123456',NULL,'2020-03-21 19:55:25','2020-03-21 19:55:25'),(14,'team name','team@gmail.com',2,NULL,'$2y$10$BpTt.RqdYOoBgjBzP5pKPe1wklAZOUa1S1UfQQatg4EMhUjMa/MF2','test123456',NULL,'2020-03-22 06:17:24','2020-03-22 06:17:24');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
