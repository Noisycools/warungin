-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: warungin
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_activation_attempts`
--

DROP TABLE IF EXISTS `auth_activation_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_activation_attempts`
--

LOCK TABLES `auth_activation_attempts` WRITE;
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups`
--

LOCK TABLES `auth_groups` WRITE;
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` VALUES (1,'admin','Site administration'),(2,'user','Reguler user'),(3,'kurir','Reguler Kurir');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_permissions`
--

LOCK TABLES `auth_groups_permissions` WRITE;
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (1,7),(2,8),(2,12),(2,13),(3,9);
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'::1','adityanh1604@gmail.com',7,'2021-09-28 02:12:54',1),(2,'::1','adityanh1604@gmail.com',7,'2021-09-28 02:24:36',1),(3,'::1','adityanh1604@gmail.com',7,'2021-09-28 02:40:29',1),(4,'::1','adityanh1604@gmail.com',7,'2021-09-28 02:56:40',1),(5,'::1','adityanh1604@gmail.com',7,'2021-09-28 03:03:48',1),(6,'::1','adityanh1604@gmail.com',7,'2021-09-28 03:04:53',1),(7,'::1','adityanh1604@gmail.com',7,'2021-09-28 03:11:54',1),(8,'::1','adityanh1604@gmail.com',7,'2021-09-28 03:12:47',1),(9,'::1','adityanh1604@gmail.com',7,'2021-09-28 03:19:36',1),(10,'::1','adityanh1604@gmail.com',7,'2021-09-28 03:55:23',1),(11,'::1','adityanh1604@gmail.com',7,'2021-09-28 04:19:27',1),(12,'::1','adityanh1604@gmail.com',7,'2021-09-28 06:12:37',1),(13,'::1','adityanh1604@gmail.com',7,'2021-09-28 06:18:19',1),(14,'::1','adityanh1604@gmail.com',7,'2021-09-28 22:57:06',1),(15,'::1','adityanh1604@gmail.com',7,'2021-09-28 23:56:25',1),(16,'::1','adityanh1604@gmail.com',7,'2021-09-29 01:29:34',1),(17,'::1','adityanh1604@gmail.com',7,'2021-09-29 05:06:18',1),(18,'::1','noisycools',NULL,'2021-09-29 09:09:06',0),(19,'::1','juned',NULL,'2021-09-29 09:09:40',0),(20,'::1','adityanh1604@gmail.com',7,'2021-09-29 09:09:51',1),(21,'::1','adityanh1604@gmail.com',7,'2021-09-30 22:30:53',1),(22,'::1','adityanh1604@gmail.com',7,'2021-10-01 06:40:32',1),(23,'::1','loewibu@gmail.com',8,'2021-10-01 09:43:06',1),(24,'::1','loewibu@gmail.com',8,'2021-10-03 07:20:33',1),(25,'::1','loewibu@gmail.com',8,'2021-10-03 22:01:14',1),(26,'::1','loewibu@gmail.com',8,'2021-10-04 22:24:18',1),(27,'::1','loewibu@gmail.com',8,'2021-10-05 22:40:00',1),(28,'::1','loewibu@gmail.com',8,'2021-10-05 22:40:16',1),(29,'::1','loewibu@gmail.com',8,'2021-10-21 10:39:45',1),(30,'::1','loewibu@gmail.com',8,'2021-10-21 19:24:56',1),(31,'::1','noisycools',NULL,'2021-10-21 20:02:13',0),(32,'::1','noisycools',NULL,'2021-10-21 20:02:27',0),(33,'::1','adityanh1604@gmail.com',7,'2021-10-21 20:02:47',1),(34,'::1','loewibu@gmail.com',8,'2021-10-21 20:04:46',1),(35,'::1','noisycools',NULL,'2021-10-21 20:05:25',0),(36,'::1','adityanh1604@gmail.com',7,'2021-10-21 20:05:34',1),(37,'::1','adityanh1604@gmail.com',7,'2021-10-21 20:08:28',1),(38,'::1','loewibu@gmail.com',8,'2021-10-21 20:30:21',1),(39,'::1','loewibu@gmail.com',8,'2021-10-25 22:51:28',1),(40,'::1','adityanh1604@gmail.com',7,'2021-10-26 00:31:14',1),(41,'::1','adityanh1604@gmail.com',7,'2021-10-26 14:21:53',1),(42,'::1','adityanh1604@gmail.com',7,'2021-10-26 22:34:57',1),(43,'::1','adityanh1604@gmail.com',7,'2021-10-26 22:55:10',1),(44,'::1','adityanh1604@gmail.com',7,'2021-10-27 01:52:17',1),(45,'::1','adityanh1604@gmail.com',7,'2021-10-27 02:08:21',1),(46,'::1','loewibu@gmail.com',8,'2021-10-27 02:49:00',1),(47,'::1','adityanh1604@gmail.com',7,'2021-10-27 23:11:50',1),(48,'::1','loewibu@gmail.com',8,'2021-10-28 00:24:25',1),(49,'::1','adityanh1604@gmail.com',7,'2021-10-28 02:33:39',1),(50,'::1','adityanh1604@gmail.com',7,'2021-10-28 02:37:45',1),(51,'::1','adityanh1604@gmail.com',7,'2021-10-28 02:40:04',1),(52,'::1','loewibu@gmail.com',8,'2021-10-28 02:41:39',1),(53,'::1','adityanh1604@gmail.com',7,'2021-10-28 02:42:02',1),(54,'::1','adityanh1604@gmail.com',7,'2021-10-28 06:15:15',1),(55,'::1','loewibu@gmail.com',8,'2021-10-28 06:52:42',1),(56,'::1','adityanh1604@gmail.com',7,'2021-10-28 07:13:20',1),(57,'::1','loewibu@gmail.com',8,'2021-10-28 21:50:51',1),(58,'::1','adityanh1604@gmail.com',7,'2021-10-28 22:03:40',1),(59,'::1','adityanh1604@gmail.com',7,'2021-10-29 02:18:38',1),(60,'::1','adityanh1604@gmail.com',7,'2021-10-31 23:26:57',1),(61,'::1','loewibu@gmail.com',8,'2021-10-31 23:44:42',1),(62,'::1','adityanh1604@gmail.com',7,'2021-10-31 23:48:26',1),(63,'::1','loewibu@gmail.com',8,'2021-10-31 23:48:49',1),(64,'::1','adityanh1604@gmail.com',7,'2021-10-31 23:59:18',1),(65,'::1','adityanh1604@gmail.com',7,'2021-11-22 00:31:06',1),(66,'::1','adityanh1604@gmail.com',7,'2021-11-22 21:50:01',1),(67,'::1','adityanh1604@gmail.com',7,'2021-11-29 07:10:07',1),(68,'::1','loewibu@gmail.com',8,'2021-11-29 07:48:26',1),(69,'::1','adityanh1604@gmail.com',7,'2021-11-29 07:49:24',1),(70,'::1','juned@gmail.com',9,'2021-11-29 23:34:13',1),(71,'::1','adityanh1604@gmail.com',7,'2021-11-30 01:16:43',1),(72,'::1','juned@gmail.com',9,'2021-11-30 02:53:27',1),(73,'::1','noisycools',NULL,'2021-11-30 02:56:06',0),(74,'::1','adityanh1604@gmail.com',7,'2021-11-30 02:56:24',1),(75,'::1','adityanh1604@gmail.com',7,'2021-11-30 07:40:22',1),(76,'::1','juned@gmail.com',9,'2021-11-30 07:40:46',1),(77,'::1','adityanh1604@gmail.com',7,'2021-12-13 07:42:24',1),(78,'::1','adityanh1604@gmail.com',7,'2021-12-13 07:42:26',1),(79,'::1','juned@gmail.com',9,'2021-12-13 08:58:10',1),(80,'::1','adityanh1604@gmail.com',7,'2021-12-13 09:07:14',1),(81,'::1','juned@gmail.com',9,'2021-12-15 04:42:02',1),(82,'::1','juned@gmail.com',9,'2022-01-05 21:21:20',1),(83,'::1','juned@gmail.com',9,'2022-01-05 21:36:38',1),(84,'::1','juned@gmail.com',9,'2022-01-06 04:06:16',1),(85,'::1','juned@gmail.com',9,'2022-01-07 03:51:10',1),(86,'::1','juned@gmail.com',9,'2022-01-10 18:20:40',1),(87,'::1','adityanh1604@gmail.com',7,'2022-01-10 18:28:31',1),(88,'::1','adityanh1604@gmail.com',7,'2022-01-10 18:31:09',1),(89,'::1','adityanh1604@gmail.com',7,'2022-01-16 00:59:00',1),(90,'::1','juned@gmail.com',9,'2022-01-16 01:00:45',1),(91,'::1','juned@gmail.com',9,'2022-01-20 19:52:08',1),(92,'::1','juned@gmail.com',9,'2022-01-24 06:35:32',1),(93,'::1','juned@gmail.com',9,'2022-01-24 18:48:29',1),(94,'::1','loewibu@gmail.com',8,'2022-01-24 19:23:30',1),(95,'::1','adityanh1604@gmail.com',7,'2022-01-24 19:26:26',1),(96,'::1','loewibu@gmail.com',8,'2022-01-26 08:21:25',1),(97,'::1','loewibu@gmail.com',8,'2022-01-27 08:00:50',1),(98,'::1','loewibu@gmail.com',8,'2022-02-22 17:44:57',1),(99,'::1','loewibu@gmail.com',8,'2022-03-02 23:19:19',1),(100,'::1','adityanh1604@gmail.com',7,'2022-03-06 18:49:15',1),(101,'::1','loewibu@gmail.com',8,'2022-03-14 03:45:07',1),(102,'::1','adityanh1604@gmail.com',7,'2022-03-14 03:46:50',1),(103,'::1','adityanh1604@gmail.com',7,'2022-03-14 07:21:35',1),(104,'::1','adityanh1604@gmail.com',7,'2022-03-14 19:17:28',1),(105,'::1','adityanh1604@gmail.com',7,'2022-03-14 20:11:13',1),(106,'::1','loewibu@gmail.com',8,'2022-03-14 20:37:06',1),(107,'::1','adityanh1604@gmail.com',7,'2022-03-14 21:26:11',1),(108,'::1','adityanh1604@gmail.com',7,'2022-03-14 23:49:14',1),(109,'::1','adityanh1604@gmail.com',7,'2022-03-15 07:45:58',1),(110,'::1','adityanh1604@gmail.com',7,'2022-03-15 21:03:51',1),(111,'::1','loewibu@gmail.com',8,'2022-03-15 23:34:33',1),(112,'::1','adityanh47@gmail.com',11,'2022-03-15 23:40:32',1),(113,'::1','loewibu@gmail.com',8,'2022-03-15 23:42:45',1),(114,'::1','juned@gmail.com',9,'2022-03-15 23:52:01',1),(115,'::1','juned@gmail.com',9,'2022-03-15 23:52:55',1),(116,'::1','loewibu@gmail.com',8,'2022-03-15 23:53:23',1),(117,'::1','adityanh1604@gmail.com',7,'2022-03-16 03:38:52',1),(118,'::1','adityanh1604@gmail.com',7,'2022-03-21 09:20:17',1),(119,'::1','adityanh1604@gmail.com',7,'2022-03-21 20:27:06',1),(120,'::1','adityanh1604@gmail.com',7,'2022-03-21 21:02:27',1),(121,'::1','adityanh1604@gmail.com',7,'2022-03-21 21:25:19',1),(122,'::1','loewibu@gmail.com',8,'2022-03-21 22:06:09',1),(123,'::1','loewibu@gmail.com',8,'2022-03-21 22:17:58',1),(124,'::1','juned@gmail.com',9,'2022-03-21 22:25:01',1),(125,'::1','loewibu@gmail.com',8,'2022-03-22 09:24:11',1),(126,'::1','adityanh1604@gmail.com',7,'2022-03-22 09:34:08',1),(127,'::1','juned@gmail.com',9,'2022-03-22 10:31:46',1),(128,'::1','adityanh1604@gmail.com',7,'2022-03-22 11:20:32',1),(129,'::1','juned@gmail.com',9,'2022-03-22 11:24:21',1),(130,'::1','loewibu@gmail.com',8,'2022-03-22 11:38:19',1),(131,'::1','juned@gmail.com',9,'2022-03-22 11:53:35',1),(132,'::1','juned@gmail.com',9,'2022-03-22 12:13:13',1),(133,'::1','loewibu@gmail.com',8,'2022-03-22 12:13:46',1),(134,'::1','juned@gmail.com',9,'2022-03-22 12:39:53',1),(135,'::1','loewibu@gmail.com',8,'2022-03-22 12:44:53',1),(136,'::1','juned@gmail.com',9,'2022-03-22 19:18:02',1),(137,'::1','loewibu@gmail.com',8,'2022-03-22 19:31:54',1),(138,'::1','juned@gmail.com',9,'2022-03-22 19:44:19',1),(139,'::1','juned@gmail.com',9,'2022-03-22 21:04:51',1),(140,'::1','adityanh1604@gmail.com',7,'2022-03-24 06:32:38',1),(141,'::1','juned@gmail.com',9,'2022-03-24 06:40:36',1),(142,'::1','loewibu@gmail.com',8,'2022-03-24 07:28:13',1),(143,'::1','adityanh1604@gmail.com',7,'2022-03-24 11:57:00',1),(144,'::1','adityanh1604@gmail.com',7,'2022-03-24 19:25:50',1),(145,'::1','asep87@gmail.com',12,'2022-03-24 21:38:34',1),(146,'::1','juned@gmail.com',9,'2022-03-24 22:36:20',1),(147,'::1','adityanh1604@gmail.com',7,'2022-03-24 22:44:41',1),(148,'::1','juned@gmail.com',9,'2022-03-25 06:03:29',1),(149,'::1','juned@gmail.com',9,'2022-03-25 06:04:31',1),(150,'::1','juned@gmail.com',9,'2022-03-25 06:05:23',1),(151,'::1','juned@gmail.com',9,'2022-03-25 06:05:28',1),(152,'::1','juned@gmail.com',9,'2022-03-25 23:01:17',1),(153,'::1','loewibu@gmail.com',8,'2022-03-25 23:07:37',1),(154,'::1','loewibu@gmail.com',8,'2022-03-26 04:27:49',1),(155,'::1','juned@gmail.com',9,'2022-03-26 04:46:50',1),(156,'::1','loewibu@gmail.com',8,'2022-03-26 08:52:16',1),(157,'::1','adityanh1604@gmail.com',7,'2022-03-26 09:08:35',1),(158,'::1','juned@gmail.com',9,'2022-03-26 10:27:32',1),(159,'::1','adityanh1604@gmail.com',7,'2022-03-27 01:30:24',1),(160,'::1','juned@gmail.com',9,'2022-03-27 01:37:40',1),(161,'::1','loewibu@gmail.com',8,'2022-03-29 21:09:58',1),(162,'::1','naira',NULL,'2022-03-30 09:41:58',0),(163,'::1','loewibu@gmail.com',8,'2022-03-30 09:42:03',1),(164,'::1','loewibu@gmail.com',8,'2022-03-31 07:53:52',1),(165,'::1','loewibu@gmail.com',8,'2022-03-31 07:58:24',1),(166,'::1','dinda868@gmail.com',12,'2022-03-31 07:59:49',1),(167,'::1','dinda868@gmail.com',12,'2022-03-31 08:35:50',1),(168,'::1','dinda868@gmail.com',12,'2022-04-03 20:25:00',1),(169,'::1','juned@gmail.com',9,'2022-04-03 20:26:22',1),(170,'::1','loewibu@gmail.com',8,'2022-04-03 20:26:44',1),(171,'::1','juned@gmail.com',9,'2022-04-03 20:27:10',1),(172,'::1','dinda868@gmail.com',12,'2022-04-03 20:29:05',1),(173,'::1','pipi208@gmail.com',13,'2022-04-04 01:11:24',1),(174,'::1','adityanh1604@gmail.com',7,'2022-04-04 04:19:32',1),(175,'::1','adityanh1604@gmail.com',7,'2022-04-04 08:55:53',1),(176,'::1','loewibu@gmail.com',8,'2022-04-04 08:56:06',1),(177,'::1','loewibu@gmail.com',8,'2022-04-04 10:59:30',1),(178,'::1','loewibu@gmail.com',8,'2022-04-04 10:59:58',1),(179,'::1','juned@gmail.com',9,'2022-04-04 11:01:36',1),(180,'::1','adityanh1604@gmail.com',7,'2022-04-04 11:04:41',1),(181,'127.0.0.1','loewibu@gmail.com',8,'2022-04-04 21:44:08',1),(182,'127.0.0.1','juned@gmail.com',9,'2022-04-04 21:44:55',1),(183,'127.0.0.1','adityanh1604@gmail.com',7,'2022-04-04 21:45:51',1),(184,'127.0.0.1','adityanh1604@gmail.com',7,'2022-04-04 21:48:33',1),(185,'127.0.0.1','juned@gmail.com',9,'2022-04-04 22:27:03',1),(186,'127.0.0.1','adityanh1604@gmail.com',7,'2022-04-04 22:32:30',1),(187,'127.0.0.1','loewibu@gmail.com',8,'2022-04-04 22:32:49',1),(188,'127.0.0.1','juned@gmail.com',9,'2022-04-04 22:38:34',1),(189,'127.0.0.1','loewibu@gmail.com',8,'2022-04-04 22:39:51',1),(190,'127.0.0.1','juned@gmail.com',9,'2022-04-04 22:40:57',1),(191,'127.0.0.1','loewibu@gmail.com',8,'2022-04-04 22:43:46',1),(192,'127.0.0.1','juned@gmail.com',9,'2022-04-04 22:46:26',1),(193,'127.0.0.1','loewibu@gmail.com',8,'2022-04-04 23:40:00',1),(194,'127.0.0.1','loewibu@gmail.com',8,'2022-04-04 23:40:36',1),(195,'127.0.0.1','adityanh1604@gmail.com',7,'2022-04-04 23:42:16',1),(196,'127.0.0.1','loewibu@gmail.com',8,'2022-04-04 23:42:44',1),(197,'127.0.0.1','adityanh1604@gmail.com',7,'2022-04-04 23:42:52',1),(198,'127.0.0.1','juned@gmail.com',9,'2022-04-04 23:43:20',1),(199,'127.0.0.1','loewibu@gmail.com',8,'2022-04-04 23:43:30',1),(200,'127.0.0.1','juned@gmail.com',9,'2022-04-04 23:44:37',1),(201,'127.0.0.1','loewibu@gmail.com',8,'2022-04-04 23:46:51',1),(202,'127.0.0.1','juned@gmail.com',9,'2022-04-05 01:20:28',1),(203,'127.0.0.1','loewibu@gmail.com',8,'2022-04-05 02:03:07',1),(204,'127.0.0.1','juned@gmail.com',9,'2022-04-05 02:09:24',1),(205,'127.0.0.1','loewibu@gmail.com',8,'2022-04-05 02:11:41',1),(206,'127.0.0.1','loewibu@gmail.com',8,'2022-04-05 20:28:05',1),(207,'127.0.0.1','loewibu@gmail.com',8,'2022-04-05 21:21:56',1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_permissions`
--

DROP TABLE IF EXISTS `auth_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_permissions`
--

LOCK TABLES `auth_permissions` WRITE;
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_reset_attempts`
--

DROP TABLE IF EXISTS `auth_reset_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_reset_attempts`
--

LOCK TABLES `auth_reset_attempts` WRITE;
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_tokens`
--

LOCK TABLES `auth_tokens` WRITE;
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_users_permissions`
--

DROP TABLE IF EXISTS `auth_users_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_users_permissions`
--

LOCK TABLES `auth_users_permissions` WRITE;
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `bahan_masakan`
--

DROP TABLE IF EXISTS `bahan_masakan`;
/*!50001 DROP VIEW IF EXISTS `bahan_masakan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `bahan_masakan` (
  `nama_barang` tinyint NOT NULL,
  `id_kategori` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `barang_transaksi`
--

DROP TABLE IF EXISTS `barang_transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_profile` int(11) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0',
  `kode_transaksi` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL DEFAULT '0',
  `qty` varchar(255) NOT NULL DEFAULT '0',
  `harga_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `barang_transaksi_ibfk_1` (`kode_transaksi`),
  KEY `username` (`username`),
  KEY `barang_id` (`barang_id`),
  KEY `id_profile` (`id_profile`),
  CONSTRAINT `barang_transaksi_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE,
  CONSTRAINT `barang_transaksi_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `tabel_barang` (`barang_id`),
  CONSTRAINT `barang_transaksi_ibfk_4` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang_transaksi`
--

LOCK TABLES `barang_transaksi` WRITE;
/*!40000 ALTER TABLE `barang_transaksi` DISABLE KEYS */;
INSERT INTO `barang_transaksi` VALUES (22,4,'loewibu','wr-849513',20,'Pop Mie All Varian 75gr','2',90000,180000);
/*!40000 ALTER TABLE `barang_transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `sisaStok` BEFORE INSERT ON `barang_transaksi` FOR EACH ROW UPDATE tabel_barang SET stok=stok-NEW.qty
WHERE nama_barang=NEW.nama_barang */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `daftar_belanja`
--

DROP TABLE IF EXISTS `daftar_belanja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daftar_belanja` (
  `id_profile` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(5) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `img_barang` varchar(100) NOT NULL,
  KEY `username` (`username`),
  KEY `barang_id` (`barang_id`),
  KEY `id_profile` (`id_profile`),
  CONSTRAINT `daftar_belanja_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `tabel_barang` (`barang_id`),
  CONSTRAINT `daftar_belanja_ibfk_3` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daftar_belanja`
--

LOCK TABLES `daftar_belanja` WRITE;
/*!40000 ALTER TABLE `daftar_belanja` DISABLE KEYS */;
/*!40000 ALTER TABLE `daftar_belanja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_barang`
--

DROP TABLE IF EXISTS `kategori_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori_barang` (
  `id_kategori` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_barang`
--

LOCK TABLES `kategori_barang` WRITE;
/*!40000 ALTER TABLE `kategori_barang` DISABLE KEYS */;
INSERT INTO `kategori_barang` VALUES ('B-001','Minuman'),('B-002','Makanan Ringan'),('B-003','Bahan Masakan'),('B-004','Makanan Instan'),('B-005','Peralatan Mandi'),('B-006','Obat');
/*!40000 ALTER TABLE `kategori_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_barang`
--

DROP TABLE IF EXISTS `log_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_barang` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `old_namaBrng` varchar(100) DEFAULT NULL,
  `new_namaBrng` varchar(100) DEFAULT NULL,
  `old_slug` varchar(100) DEFAULT NULL,
  `new_slug` varchar(100) DEFAULT NULL,
  `old_hargaBrng` varchar(100) DEFAULT NULL,
  `new_hargaBrng` varchar(100) DEFAULT NULL,
  `old_stok` int(11) DEFAULT NULL,
  `new_stok` int(11) DEFAULT NULL,
  `changedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_barang`
--

LOCK TABLES `log_barang` WRITE;
/*!40000 ALTER TABLE `log_barang` DISABLE KEYS */;
INSERT INTO `log_barang` VALUES (1,'Lifebuoy Shampo 1 Renteng','Lifebuoy Shampo 2 renceng','lifebuoy-shampo-1-renteng','lifebuoy-shampo-2-renceng','5000','10000',134,100,'2022-03-30 04:52:04'),(2,'Lifebuoy Shampo 2 renceng','Lifebuoy Shampo 1 renceng','lifebuoy-shampo-2-renceng','lifebuoy-shampo-1-renceng','10000','5000',100,100,'2022-03-30 06:24:50'),(3,'Lifebuoy Shampo 1 renceng','Lifebuoy Shampo 1 renceng','lifebuoy-shampo-1-renceng','lifebuoy-shampo-1-renceng','10000','5000',100,100,'2022-03-30 06:30:08'),(4,'Beras 5kg','Beras 5kg','beras-5kg','beras-5kg','58000','58000',103,101,'2022-03-31 13:02:34'),(5,'Aqua Botol ','Aqua Botol ','aqua-botol','aqua-botol','57000','57000',253,230,'2022-03-31 13:30:14'),(6,'Aqua Botol ','Aqua Botol','aqua-botol','aqua-botol','57000','67000',230,200,'2022-03-31 13:42:03'),(7,'Aqua Botol','Aqua Botol','aqua-botol','aqua-botol','67000','67000',200,200,'2022-04-04 01:23:52'),(8,'Beras 5kg','Beras 5kg','beras-5kg','beras-5kg','58000','58000',101,101,'2022-04-04 05:46:02'),(9,'Beras 5kg','Beras ','beras-5kg','beras-5kg','58000','58000',101,101,'2022-04-04 05:47:09'),(10,'Tepung Terigu 1kg','Tepung Terigu ','tepung-terigu-1kg','tepung-terigu-1kg','121000','121000',123,123,'2022-04-04 05:47:14'),(11,'Sovia Minyak Goreng 1L','Sovia Minyak Goreng ','sovia-minyak-goreng-1L','sovia-minyak-goreng-1L','228000','228000',64,64,'2022-04-04 05:47:18'),(12,'Garam Cap Kapal 250g','Garam Cap Kapal ','garam-cap-kapal-250g','garam-cap-kapal-250g','40000','40000',156,156,'2022-04-04 05:47:53'),(13,'Gulaku Hijau 1kg','Gulaku Hijau ','gulaku-hijau-1kg','gulaku-hijau-1kg','20000','20000',170,170,'2022-04-04 05:47:59'),(14,'Kecap Sedap 63ml','Kecap Sedap ','kecap-sedap-63ml','kecap-sedap-63ml','48000','48000',135,135,'2022-04-04 05:48:03'),(15,'Masako Sapi 1 Renteng','Masako Sapi ','masako-sapi-1-renteng','masako-sapi-1-renteng','24000','24000',106,106,'2022-04-04 05:48:10'),(16,'ABC Sarden 425gr','ABC Sarden ','abc-sarden-extra-pedas-425gr','abc-sarden-extra-pedas-425gr','20000','20000',104,104,'2022-04-04 05:48:16'),(17,'Susu Kental Manis 40gr','Susu Kental Manis ','susu-kental-manis-40gr','susu-kental-manis-40gr','22000','22000',172,172,'2022-04-04 05:48:32'),(18,'ABC Kopi Susu 1 Renteng','ABC Kopi Susu ','abc-kopi-susu-1-renteng','abc-kopi-susu-1-renteng','12000','12000',196,196,'2022-04-04 05:49:16'),(19,'Teh Pucuk Dus','Teh Pucuk Dus','teh-pucuk-dus','teh-pucuk-dus','54000','54000',71,70,'2022-04-04 15:50:13'),(20,'Tolak Angin Cair','Tolak Angin Cair','tolak-angin-cair','tolak-angin-cair','40000','40000',200,199,'2022-04-05 02:04:00'),(21,'Obat Bodrex ','Obat Bodrex ','obat-bodrex ','obat-bodrex ','81000','81000',111,110,'2022-04-05 02:44:38'),(22,'Permen Yupi','Permen Yupi','permen-yupi','permen-yupi','12000','12000',184,181,'2022-04-05 03:40:31'),(23,'Hit Mat Obat Nyamuk','Hit Mat Obat Nyamuk','hit-mat-obat-nyamuk','hit-mat-obat-nyamuk','12000','12000',80,79,'2022-04-05 03:44:09'),(24,'Momogi Jagung Bakar 8gr','Momogi Jagung Bakar 8gr','momogi-jagung-bakar-8gr','momogi-jagung-bakar-8gr','21000','21000',143,142,'2022-04-05 03:45:29'),(25,'Momogi Jagung Bakar 8gr','Momogi Jagung Bakar 8gr','momogi-jagung-bakar-8gr','momogi-jagung-bakar-8gr','21000','21000',142,141,'2022-04-05 04:43:46'),(26,'Aqua Botol','Aqua Botol','aqua-botol','aqua-botol','67000','67000',200,197,'2022-04-05 04:44:26'),(27,'Momogi Jagung Bakar 8gr','Momogi Jagung Bakar 8gr','momogi-jagung-bakar-8gr','momogi-jagung-bakar-8gr','21000','21000',141,10,'2022-04-05 04:46:36'),(28,'Momogi Jagung Bakar 8gr','Momogi Jagung Bakar 8gr','momogi-jagung-bakar-8gr','momogi-jagung-bakar-8gr','21000','21000',10,0,'2022-04-05 04:46:41'),(29,'Fruitea Blackcurrant 200ml','Fruitea Blackcurrant 200ml','fruitea-blackcurrant-200ml','fruitea-blackcurrant-200ml','72000','72000',179,0,'2022-04-05 04:46:46'),(30,'Hit Mat Obat Nyamuk','Hit Mat Obat Nyamuk','hit-mat-obat-nyamuk','hit-mat-obat-nyamuk','12000','12000',79,76,'2022-04-05 07:05:33'),(31,'Gulaku Hijau ','Gulaku Hijau ','gulaku-hijau-1kg','gulaku-hijau-1kg','20000','20000',170,169,'2022-04-05 07:05:33'),(32,'Dancow Coklat Sachet 27g','Dancow Coklat Sachet 27g','dancow-coklat-sachet-27g','dancow-coklat-sachet-27g','56000','56000',190,189,'2022-04-05 07:05:33'),(33,'Teh Pucuk Dus','Teh Pucuk Dus','teh-pucuk-dus','teh-pucuk-dus','54000','54000',70,69,'2022-04-05 07:08:38'),(34,'Mie Sedap Goreng','Mie Sedap Goreng','mie-sedap-goreng','mie-sedap-goreng','80000','80000',63,62,'2022-04-05 07:08:38'),(35,'Sovia Minyak Goreng ','Sovia Minyak Goreng ','sovia-minyak-goreng-1L','sovia-minyak-goreng-1L','228000','228000',64,62,'2022-04-05 07:08:38'),(36,'Piattos Sapi Panggang 75gr','Piattos Sapi Panggang 75gr','piattos-sapi-panggang-75gr','piattos-sapi-panggang-75gr','66000','66000',176,6,'2022-04-05 07:18:35'),(37,'Piattos Sapi Panggang 75gr','Piattos Sapi Panggang 75gr','piattos-sapi-panggang-75gr','piattos-sapi-panggang-75gr','66000','66000',6,-3,'2022-04-05 07:24:56'),(38,'Piattos Sapi Panggang 75gr','Piattos Sapi Panggang 75gr','piattos-sapi-panggang-75gr','piattos-sapi-panggang-75gr','66000','66000',-3,6,'2022-04-05 07:25:09'),(39,'Piattos Sapi Panggang 75gr','Piattos Sapi Panggang 75gr','piattos-sapi-panggang-75gr','piattos-sapi-panggang-75gr','66000','66000',6,120,'2022-04-05 07:30:41'),(40,'Sovia Minyak Goreng ','Sovia Minyak Goreng ','sovia-minyak-goreng-1L','sovia-minyak-goreng-1L','228000','228000',62,61,'2022-04-06 01:29:14'),(41,'Teh Gelas','Teh Gelas','teh-gelas','teh-gelas','24000','24000',110,108,'2022-04-06 01:33:36'),(42,'Teh Pucuk Dus','Teh Pucuk Dus','teh-pucuk-dus','teh-pucuk-dus','54000','54000',69,68,'2022-04-06 01:34:46'),(43,'Obat Bodrex ','Obat Bodrex ','obat-bodrex ','obat-bodrex ','81000','81000',110,108,'2022-04-06 01:34:46'),(44,'Dancow Coklat Sachet 27g','Dancow Coklat Sachet 27g','dancow-coklat-sachet-27g','dancow-coklat-sachet-27g','56000','56000',189,188,'2022-04-06 03:24:22'),(45,'Pop Mie All Varian 75gr','Pop Mie All Varian 75gr','pop-mie-all-varian-75gr','pop-mie-all-varian-75gr','90000','90000',74,72,'2022-04-06 03:25:47');
/*!40000 ALTER TABLE `log_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `makanan_instan`
--

DROP TABLE IF EXISTS `makanan_instan`;
/*!50001 DROP VIEW IF EXISTS `makanan_instan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `makanan_instan` (
  `nama_barang` tinyint NOT NULL,
  `id_kategori` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `makanan_ringan`
--

DROP TABLE IF EXISTS `makanan_ringan`;
/*!50001 DROP VIEW IF EXISTS `makanan_ringan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `makanan_ringan` (
  `nama_barang` tinyint NOT NULL,
  `id_kategori` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1632144504,1),(2,'2021-09-20-135701','App\\Database\\Migrations\\AddBlog','default','App',1632150196,2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `minuman`
--

DROP TABLE IF EXISTS `minuman`;
/*!50001 DROP VIEW IF EXISTS `minuman`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `minuman` (
  `nama_barang` tinyint NOT NULL,
  `id_kategori` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `obat`
--

DROP TABLE IF EXISTS `obat`;
/*!50001 DROP VIEW IF EXISTS `obat`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `obat` (
  `nama_barang` tinyint NOT NULL,
  `id_kategori` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `peralatan_mandi`
--

DROP TABLE IF EXISTS `peralatan_mandi`;
/*!50001 DROP VIEW IF EXISTS `peralatan_mandi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `peralatan_mandi` (
  `nama_barang` tinyint NOT NULL,
  `id_kategori` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_warung` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_profile`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (4,8,'loewibu','Aditya Nur Huda','Warung Ade','Jl. Baladewa No. 49','+6281563957870','adityanh1604@gmail.com','2022-04-05');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_barang`
--

DROP TABLE IF EXISTS `tabel_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_barang` (
  `barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `harga_barang` double NOT NULL,
  `satuan_barang` varchar(50) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `id_kategori` varchar(255) CHARACTER SET latin1 NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`barang_id`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `tabel_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_barang` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_barang`
--

LOCK TABLES `tabel_barang` WRITE;
/*!40000 ALTER TABLE `tabel_barang` DISABLE KEYS */;
INSERT INTO `tabel_barang` VALUES (1,'Aqua Botol','aqua-botol',67000,'dus (24 pcs)','aqua_botol.jpg','B-001',197),(2,'Beras ','beras-5kg',58000,'karung (5kg)','beras.jpg','B-003',101),(3,'Ciki Chitato 15g','ciki-chitato-15g',105000,'dus (60 pcs)','ciki_chitato.jpg','B-002',198),(4,'Sovia Minyak Goreng ','sovia-minyak-goreng-1L',228000,'dus (12 pcs)','minyak.jpg','B-003',61),(5,'Tepung Terigu ','tepung-terigu-1kg',121000,'dus (12 pcs)','tepung_terigu.jpg','B-003',123),(6,'Teh Gelas','teh-gelas',24000,'dus (24 pcs)','teh_gelas.jpg','B-001',108),(7,'Momogi Jagung Bakar 8gr','momogi-jagung-bakar-8gr',21000,'dus (20 pcs)','momogi.jpg','B-002',0),(8,'Piattos Sapi Panggang 75gr','piattos-sapi-panggang-75gr',66000,'dus (60 pcs)','ciki_piatos.jpg','B-002',120),(9,'Permen Yupi','permen-yupi',12000,'dus (24 pcs)','permen_yupi.jpg','B-002',181),(10,'Permen Mintz','permen-mintz',5000,'pcs','permen_mintz.jpg','B-002',172),(11,'Fruitea Blackcurrant 200ml','fruitea-blackcurrant-200ml',72000,'dus (24 pcs)','minuman_fruit.jpg','B-001',0),(12,'Dancow Coklat Sachet 27g','dancow-coklat-sachet-27g',56000,'dus (16 pcs)','susu_dancow.jpg','B-001',188),(13,'Tolak Angin Cair','tolak-angin-cair',40000,'dus (12 pcs)','tolak_angin.jpg','B-006',199),(14,'Obat Bodrex ','obat-bodrex ',81000,'dus (12 psc)','bodrex.jpg','B-006',108),(15,'Hit Mat Obat Nyamuk','hit-mat-obat-nyamuk',12000,'dus','obat_nyamuk.jpg','B-006',76),(16,'Garam Cap Kapal ','garam-cap-kapal-250g',40000,'dus (12 pcs)','garam.jpg','B-003',156),(17,'Gulaku Hijau ','gulaku-hijau-1kg',20000,'kg','gula.jpg','B-003',169),(18,'Kecap Sedap ','kecap-sedap-63ml',48000,'dus (48 pcs)','kecap.jpg','B-003',135),(19,'Masako Sapi ','masako-sapi-1-renteng',24000,'pcs (12 pcs)','masako.jpg','B-003',106),(20,'Pop Mie All Varian 75gr','pop-mie-all-varian-75gr',90000,'dus (24 pcs)','pop_mie.jpg','B-004',72),(21,'Mie Sedap Goreng','mie-sedap-goreng',80000,'dus (40 pcs)','mie_goreng.jpg','B-004',62),(22,'ABC Sarden ','abc-sarden-extra-pedas-425gr',20000,'kaleng','sarden.jpg','B-004',104),(23,'Teh Pucuk Dus','teh-pucuk-dus',54000,'dus (24 pcs)','teh_pucuk.jpg','B-001',68),(24,'Susu Kental Manis ','susu-kental-manis-40gr',22000,'12 pcs','susu_kental_manis.jpg','B-001',172),(25,'Lifebuoy Shampo 1 renceng','lifebuoy-shampo-1-renceng',5000,'12 pcs','shampo.jpg','B-005',100),(26,'Dettol Sabun Batang','dettol-sabun-batang',15000,'5 pcs','sabun_batang.jpg','B-005',157),(27,'ABC Kopi Susu ','abc-kopi-susu-1-renteng',12000,'12 pcs','kopi.jpg','B-001',196),(28,'CloseUp Pasta Gigi 160gr','closeUp-pasta-gigi-160gr',29000,'gr','pasta_gigi.jpg','B-005',165),(29,'Nabati Box 168gr','nabati-box-168gr',10000,'dus (isi 20)','nabati.jpg','B-002',112),(30,'Pepsodent Sikat Gigi','pepsodent-sikat-gigi',12000,'pcs','sikat_gigi.jpg','B-005',99);
/*!40000 ALTER TABLE `tabel_barang` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `update_tabel_barang` AFTER UPDATE ON `tabel_barang` FOR EACH ROW INSERT INTO log_barang VALUES (null, old.nama_barang, new.nama_barang, old.slug, new.slug, old.harga_barang, new.harga_barang, old.stok, new.stok,NOW()) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(255) NOT NULL,
  `id_profile` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `nama_warung` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_pembayaran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `foto_struk` varchar(255) NOT NULL,
  `foto_pengiriman` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `expired_date` date NOT NULL,
  `waktu_created_at` time NOT NULL,
  PRIMARY KEY (`kode_transaksi`),
  KEY `username` (`username`),
  KEY `id_profile` (`id_profile`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES ('wr-849513',4,'loewibu','Aditya Nur Huda','Warung Ade','Jl. Baladewa No. 49','+6281563957870','adityanh1604@gmail.com','6 Apr 2022','Pending','none','','2022-04-05','2022-04-12','10:25:00');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'adityanh1604@gmail.com','noisycools','$2y$10$Sy1StV5gL0EyOl1xaWQ1/ewEhefT4ft.q0EH5ahVOoTSlbRbgjZOe',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2021-09-28 02:12:43','2021-09-28 02:12:43',NULL),(8,'loewibu@gmail.com','loewibu','$2y$10$KlRbRgEUTL34p8f3H2zhWONTB39kkvqZLOSiMj0mLR/A0dkMhKQNm',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2021-09-28 05:55:27','2021-09-28 05:55:27',NULL),(9,'juned@gmail.com','juned','$2y$10$q/d/c774MLSBaNQs7pj1t.ywAMm8.gCpKMdfuVJwYdN17.DOEzdsi',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2021-09-29 09:12:35','2021-09-29 09:12:35',NULL),(10,'adminpusat@gmail.com','yanto','$2y$10$ELjkxomHk5XQV.vWBqeBLuKUsVv8eHzll43hKJYAGD2reJXLzSMku',NULL,NULL,NULL,'abb88ae3ef477b87d07c2c7e3e8cfa96',NULL,NULL,0,0,'2021-10-21 09:19:48','2021-10-21 09:19:48',NULL),(11,'adityanh47@gmail.com','adit','$2y$10$BTjY2W0KFmo7QWh9c7ph7eu4Y6SgRh2Il3RCQ5sNZQypisXZfFU/W',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-03-15 23:40:06','2022-03-15 23:40:06',NULL),(12,'dinda868@gmail.com','Dinda','$2y$10$8RFvpQd1WbAfWe695InU7OxZ9f9X8cua8Nv3n3/Kf/mB8pbvJo/u6',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-03-31 07:59:44','2022-03-31 07:59:44',NULL),(13,'pipi208@gmail.com','pipi','$2y$10$ja/heeKTKj6OfMMdC96JlOTCihYHjBo3lVGQ81AzFwC7AHxipMjFK',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2022-04-04 01:11:18','2022-04-04 01:11:18',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `bahan_masakan`
--

/*!50001 DROP TABLE IF EXISTS `bahan_masakan`*/;
/*!50001 DROP VIEW IF EXISTS `bahan_masakan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `bahan_masakan` AS select `tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_barang`.`id_kategori` AS `id_kategori` from `tabel_barang` where `tabel_barang`.`id_kategori` = 'B-003' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `makanan_instan`
--

/*!50001 DROP TABLE IF EXISTS `makanan_instan`*/;
/*!50001 DROP VIEW IF EXISTS `makanan_instan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `makanan_instan` AS select `tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_barang`.`id_kategori` AS `id_kategori` from `tabel_barang` where `tabel_barang`.`id_kategori` = 'B-004' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `makanan_ringan`
--

/*!50001 DROP TABLE IF EXISTS `makanan_ringan`*/;
/*!50001 DROP VIEW IF EXISTS `makanan_ringan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `makanan_ringan` AS select `tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_barang`.`id_kategori` AS `id_kategori` from `tabel_barang` where `tabel_barang`.`id_kategori` = 'B-002' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `minuman`
--

/*!50001 DROP TABLE IF EXISTS `minuman`*/;
/*!50001 DROP VIEW IF EXISTS `minuman`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `minuman` AS select `tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_barang`.`id_kategori` AS `id_kategori` from `tabel_barang` where `tabel_barang`.`id_kategori` = 'B-001' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `obat`
--

/*!50001 DROP TABLE IF EXISTS `obat`*/;
/*!50001 DROP VIEW IF EXISTS `obat`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `obat` AS select `tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_barang`.`id_kategori` AS `id_kategori` from `tabel_barang` where `tabel_barang`.`id_kategori` = 'B-002' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `peralatan_mandi`
--

/*!50001 DROP TABLE IF EXISTS `peralatan_mandi`*/;
/*!50001 DROP VIEW IF EXISTS `peralatan_mandi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `peralatan_mandi` AS select `tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_barang`.`id_kategori` AS `id_kategori` from `tabel_barang` where `tabel_barang`.`id_kategori` = 'B-005' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-06 10:39:23
