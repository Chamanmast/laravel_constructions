/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u476708578_mmtl_db
-- ------------------------------------------------------
-- Server version	10.11.10-MariaDB-log

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
-- Table structure for table `blogcategories`
--

DROP TABLE IF EXISTS `blogcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogcategories`
--

LOCK TABLES `blogcategories` WRITE;
/*!40000 ALTER TABLE `blogcategories` DISABLE KEYS */;
INSERT INTO `blogcategories` VALUES
(1,'Sustainability','sustainability','2023-12-08 07:17:53','2025-09-05 23:36:28'),
(2,'Energy Efficiency','energy-efficiency','2023-12-08 07:17:56','2025-09-05 23:36:37'),
(3,'Compliance & Security','compliance-security','2025-09-05 23:36:50','2025-09-05 23:36:50');
/*!40000 ALTER TABLE `blogcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blogcat_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_slug` varchar(255) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `short_descp` text DEFAULT NULL,
  `long_descp` text DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `front` int(11) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES
(1,1,1,'How Your Property Fits into Vision 2030','how-your-property-fits-into-vision-2030','upload/blog/thumbnail/1842628873725919.jpg','We\'re all seeing Saudi Arabia transform under Vision 2030. It\'s an exciting time of building a smarter, greener, and more vibrant nation. But did you know that the buildings we live and work in are a huge part of this story.','<p>We\'re all seeing Saudi Arabia transform under Vision 2030. It\'s an exciting time of building a smarter, greener, and more vibrant nation. But did you know that the buildings we live and work in are a huge part of this story?</p><p>This is where \"smart buildings\" come in, and they\'re simpler than you might think.</p><p>So, What Makes a Building \"Smart\"?</p><p>Imagine your building had a brain. That\'s essentially a Building Management System (BMS). It\'s a central hub that connects everything—the AC, lights, security cameras, and elevators—and helps them work together intelligently.</p><p>Instead of wasting energy cooling an empty room or leaving lights on all night, a BMS automates everything for maximum efficiency and comfort. It\'s the secret sauce that turns a regular structure into a smart, responsive environment.</p>','1,2',0,0,'2024-04-23 08:31:17','2025-09-07 12:27:12'),
(2,2,1,'Why This Matters for Vision 2030','why-this-matters-for-vision-2030','upload/blog/thumbnail/1842629156487070.jpg','A huge part of Vision 2030 is sustainability. A smart building with a BMS is incredibly energy-efficient. It knows when to power down systems, which means','<p>This isn\'t just about cool tech; it\'s about hitting the key goals for our country\'s future.</p><h2>Greener &amp; Smarter Spending</h2><p>A huge part of Vision 2030 is sustainability. A smart building with a BMS is incredibly energy-efficient. It knows when to power down systems, which means:</p><ul><li>&nbsp;Lower electricity bills: A direct impact on your bottom line.</li><li>&nbsp;A smaller carbon footprint: Helping meet the goals of the Saudi Green Initiative.</li><li>Less waste: The building only uses what it needs, when it needs it.</li></ul><h2>A Better Place to Live and Work</h2><p>Vision 2030 is also about improving our quality of life. Smart buildings create spaces that are simply better for people.</p>','',0,0,'2024-04-23 10:15:49','2025-09-07 12:31:41'),
(3,3,1,'BMS Cybersecurity: OT Segmentation Made Practical','bms-cybersecurity-ot-segmentation-made-practical','','dadsdas',NULL,'13',0,1,'2025-09-05 23:53:47','2025-09-07 12:17:34');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogtags`
--

DROP TABLE IF EXISTS `blogtags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogtags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  `tag_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogtags`
--

LOCK TABLES `blogtags` WRITE;
/*!40000 ALTER TABLE `blogtags` DISABLE KEYS */;
INSERT INTO `blogtags` VALUES
(1,'iaq','iaq','2023-12-08 07:15:41','2025-09-05 23:38:05'),
(2,'smart buildings','smart-buildings','2023-12-08 07:21:37','2025-09-05 23:37:52'),
(3,'esg','esg','2025-09-05 23:37:30','2025-09-05 23:38:02'),
(4,'net zero','net-zero','2025-09-05 23:38:15','2025-09-05 23:38:15'),
(5,'ot security','ot-security','2025-09-05 23:44:49','2025-09-05 23:44:49'),
(6,'network segmentation','network-segmentation','2025-09-05 23:44:54','2025-09-05 23:44:54'),
(7,'zero trust','zero-trust','2025-09-05 23:44:59','2025-09-05 23:44:59'),
(8,'nist','nist','2025-09-05 23:45:05','2025-09-05 23:45:05'),
(9,'secure remote access','secure-remote-access','2025-09-05 23:45:11','2025-09-05 23:45:11'),
(10,'hvac optimization','hvac-optimization','2025-09-05 23:45:23','2025-09-05 23:45:23'),
(11,'fdd','fdd','2025-09-05 23:45:30','2025-09-05 23:45:30'),
(12,'tariff-based scheduling','tariff-based-scheduling','2025-09-05 23:45:37','2025-09-05 23:45:37'),
(13,'energy savings','energy-savings','2025-09-05 23:45:42','2025-09-05 23:45:42');
/*!40000 ALTER TABLE `blogtags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `small_text` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES
(1,'Johnson Controls-FX','upload/brand/thumbnail/1842597971239413.jpg',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(2,'DEOS-AG','upload/brand/thumbnail/1842597856513136.jpg',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(3,'Honeywell Alerton','upload/brand/thumbnail/1842765587782127.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(4,'Eelectron','upload/brand/thumbnail/1842765677319127.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(5,'Setra','upload/brand/thumbnail/1842598048583291.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(7,'Kamstrup','upload/brand/thumbnail/1842598118050297.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(8,'Axioma','upload/brand/thumbnail/1842598091849424.jpeg',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(9,'Hochiki','upload/brand/thumbnail/1842764846638844.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(10,'Notifier','upload/brand/thumbnail/1842764862990423.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(11,'Ravel-Fire','upload/brand/thumbnail/1842764890191000.jpeg',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(12,'Avaya','upload/brand/thumbnail/1842764953162068.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(13,'Cisco','upload/brand/thumbnail/1842764729020174.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(14,'Schrack Seconet AG','upload/brand/thumbnail/1842765000607465.jpeg',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(15,'Bosch','upload/brand/thumbnail/1842764825040448.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(16,'Ravel Electronics','upload/brand/thumbnail/1842765048210991.jpeg',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(17,'Legrand','upload/brand/thumbnail/1842765102673386.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(18,'Systimax','upload/brand/thumbnail/1842764802661021.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(19,'Axis','upload/brand/thumbnail/1842765173549602.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(20,'Dahua','upload/brand/thumbnail/1842765184896504.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(21,'Honeywell','upload/brand/thumbnail/1842597930282341.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(22,'Hikvision','upload/brand/thumbnail/1842765221215855.jpg',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22'),
(23,'ZMR Technology Distribution','upload/brand/thumbnail/1842765200801516.png',NULL,NULL,0,'2025-09-08 16:54:48','2025-09-09 06:59:22');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES
('muassasah_mwad_altshyd_cache_spatie.permission.cache','a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"group_name\";s:1:\"d\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:102:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"smtp.menu\";s:1:\"c\";s:4:\"smtp\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"smtp.setting\";s:1:\"c\";s:4:\"smtp\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"site.menu\";s:1:\"c\";s:4:\"site\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:12:\"site.setting\";s:1:\"c\";s:4:\"site\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"role.menu\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:5:{s:1:\"a\";i:6;s:1:\"b\";s:10:\"role.index\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:11:\"role.create\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:9:\"role.edit\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:5:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"role.delete\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:5:{s:1:\"a\";i:10;s:1:\"b\";s:16:\"permission.index\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:5:{s:1:\"a\";i:11;s:1:\"b\";s:17:\"permission.create\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:5:{s:1:\"a\";i:12;s:1:\"b\";s:15:\"permission.edit\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:17:\"permission.delete\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:20:\"add.roles.permission\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:20:\"all.roles.permission\";s:1:\"c\";s:4:\"role\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:10:\"admin.menu\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:9:\"all.admin\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:9:\"add.admin\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:9:\"all.users\";s:1:\"c\";s:5:\"admin\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:17:\"image_preset.menu\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:18:\"image_preset.index\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:19:\"image_preset.create\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:17:\"image_preset.edit\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:19:\"image_preset.status\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:19:\"image_preset.delete\";s:1:\"c\";s:12:\"image_preset\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:11:\"module.menu\";s:1:\"c\";s:6:\"module\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:12:\"module.index\";s:1:\"c\";s:6:\"module\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:5:{s:1:\"a\";i:28;s:1:\"b\";s:13:\"module.create\";s:1:\"c\";s:6:\"module\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:13:\"module.delete\";s:1:\"c\";s:6:\"module\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:10:\"pages.menu\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:12:\"pages.create\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:11:\"pages.index\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:10:\"pages.edit\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:12:\"pages.status\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:12:\"pages.delete\";s:1:\"c\";s:5:\"pages\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:9:\"blog.menu\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"blog.index\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:11:\"blog.create\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:5:{s:1:\"a\";i:39;s:1:\"b\";s:9:\"blog.edit\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:5:{s:1:\"a\";i:40;s:1:\"b\";s:11:\"blog.delete\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:5:{s:1:\"a\";i:41;s:1:\"b\";s:8:\"tag.menu\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:5:{s:1:\"a\";i:42;s:1:\"b\";s:9:\"tag.index\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:5:{s:1:\"a\";i:43;s:1:\"b\";s:10:\"tag.create\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:5:{s:1:\"a\";i:44;s:1:\"b\";s:8:\"tag.edit\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:5:{s:1:\"a\";i:45;s:1:\"b\";s:10:\"tag.delete\";s:1:\"c\";s:3:\"tag\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:5:{s:1:\"a\";i:46;s:1:\"b\";s:10:\"menus.menu\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:5:{s:1:\"a\";i:47;s:1:\"b\";s:11:\"menus.index\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:5:{s:1:\"a\";i:48;s:1:\"b\";s:12:\"menus.create\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:5:{s:1:\"a\";i:49;s:1:\"b\";s:10:\"menus.edit\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:5:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"menus.delete\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:5:{s:1:\"a\";i:51;s:1:\"b\";s:12:\"menus.status\";s:1:\"c\";s:5:\"menus\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:5:{s:1:\"a\";i:52;s:1:\"b\";s:14:\"menugroup.menu\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:5:{s:1:\"a\";i:53;s:1:\"b\";s:15:\"menugroup.index\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:5:{s:1:\"a\";i:54;s:1:\"b\";s:16:\"menugroup.create\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:5:{s:1:\"a\";i:55;s:1:\"b\";s:14:\"menugroup.edit\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:5:{s:1:\"a\";i:56;s:1:\"b\";s:16:\"menugroup.delete\";s:1:\"c\";s:9:\"menugroup\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:5:{s:1:\"a\";i:57;s:1:\"b\";s:17:\"blogcategory.menu\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:5:{s:1:\"a\";i:58;s:1:\"b\";s:19:\"blogcategory.create\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:5:{s:1:\"a\";i:59;s:1:\"b\";s:18:\"blogcategory.index\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:5:{s:1:\"a\";i:60;s:1:\"b\";s:17:\"blogcategory.edit\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:5:{s:1:\"a\";i:61;s:1:\"b\";s:19:\"blogcategory.delete\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:5:{s:1:\"a\";i:62;s:1:\"b\";s:19:\"blogcategory.status\";s:1:\"c\";s:12:\"blogcategory\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:5:{s:1:\"a\";i:63;s:1:\"b\";s:13:\"category.menu\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:5:{s:1:\"a\";i:64;s:1:\"b\";s:14:\"category.index\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:5:{s:1:\"a\";i:65;s:1:\"b\";s:15:\"category.create\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:5:{s:1:\"a\";i:66;s:1:\"b\";s:13:\"category.edit\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:5:{s:1:\"a\";i:67;s:1:\"b\";s:15:\"category.delete\";s:1:\"c\";s:4:\"post\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:5:{s:1:\"a\";i:68;s:1:\"b\";s:14:\"megamenu.index\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:5:{s:1:\"a\";i:69;s:1:\"b\";s:15:\"megamenu.create\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:5:{s:1:\"a\";i:70;s:1:\"b\";s:13:\"megamenu.edit\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:5:{s:1:\"a\";i:71;s:1:\"b\";s:15:\"megamenu.delete\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:5:{s:1:\"a\";i:72;s:1:\"b\";s:15:\"megamenu.status\";s:1:\"c\";s:8:\"megamenu\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:5:{s:1:\"a\";i:79;s:1:\"b\";s:17:\"testimonials.menu\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:5:{s:1:\"a\";i:80;s:1:\"b\";s:19:\"testimonials.create\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:5:{s:1:\"a\";i:81;s:1:\"b\";s:18:\"testimonials.index\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:5:{s:1:\"a\";i:82;s:1:\"b\";s:17:\"testimonials.edit\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:5:{s:1:\"a\";i:83;s:1:\"b\";s:19:\"testimonials.status\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:5:{s:1:\"a\";i:84;s:1:\"b\";s:19:\"testimonials.delete\";s:1:\"c\";s:12:\"testimonials\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:5:{s:1:\"a\";i:91;s:1:\"b\";s:13:\"services.menu\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:5:{s:1:\"a\";i:92;s:1:\"b\";s:15:\"services.create\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:5:{s:1:\"a\";i:93;s:1:\"b\";s:14:\"services.index\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:5:{s:1:\"a\";i:94;s:1:\"b\";s:13:\"services.edit\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:5:{s:1:\"a\";i:95;s:1:\"b\";s:15:\"services.status\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:5:{s:1:\"a\";i:96;s:1:\"b\";s:15:\"services.delete\";s:1:\"c\";s:8:\"services\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:5:{s:1:\"a\";i:97;s:1:\"b\";s:11:\"slider.menu\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:5:{s:1:\"a\";i:98;s:1:\"b\";s:13:\"slider.create\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:5:{s:1:\"a\";i:99;s:1:\"b\";s:12:\"slider.index\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:5:{s:1:\"a\";i:100;s:1:\"b\";s:11:\"slider.edit\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:5:{s:1:\"a\";i:101;s:1:\"b\";s:13:\"slider.status\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:89;a:5:{s:1:\"a\";i:102;s:1:\"b\";s:13:\"slider.delete\";s:1:\"c\";s:6:\"slider\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:90;a:5:{s:1:\"a\";i:109;s:1:\"b\";s:10:\"brand.menu\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:91;a:5:{s:1:\"a\";i:110;s:1:\"b\";s:12:\"brand.create\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:92;a:5:{s:1:\"a\";i:111;s:1:\"b\";s:11:\"brand.index\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:93;a:5:{s:1:\"a\";i:112;s:1:\"b\";s:10:\"brand.edit\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:94;a:5:{s:1:\"a\";i:113;s:1:\"b\";s:12:\"brand.status\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:95;a:5:{s:1:\"a\";i:114;s:1:\"b\";s:12:\"brand.delete\";s:1:\"c\";s:5:\"brand\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:96;a:5:{s:1:\"a\";i:115;s:1:\"b\";s:12:\"project.menu\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:97;a:5:{s:1:\"a\";i:116;s:1:\"b\";s:14:\"project.create\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:98;a:5:{s:1:\"a\";i:117;s:1:\"b\";s:13:\"project.index\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:99;a:5:{s:1:\"a\";i:118;s:1:\"b\";s:12:\"project.edit\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:100;a:5:{s:1:\"a\";i:119;s:1:\"b\";s:14:\"project.status\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:101;a:5:{s:1:\"a\";i:120;s:1:\"b\";s:14:\"project.delete\";s:1:\"c\";s:7:\"project\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:10:\"SuperAdmin\";s:1:\"d\";s:3:\"web\";}}}',1757694834);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT 0,
  `front` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,0,1,'Control & automations','control-automations','',NULL,0),
(2,0,0,'Fire','fire','',NULL,0),
(3,0,1,'Low Current Systems','low-current-systems','',NULL,0),
(4,0,1,'Data & Networking Solutions','data-networking-solutions','',NULL,0),
(5,0,1,'Security Systems','security-systems','',NULL,0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_presets`
--

DROP TABLE IF EXISTS `image_presets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_presets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_presets`
--

LOCK TABLES `image_presets` WRITE;
/*!40000 ALTER TABLE `image_presets` DISABLE KEYS */;
INSERT INTO `image_presets` VALUES
(1,'small',36,36,0),
(2,'avatar',30,30,0),
(3,'photo',100,100,0),
(4,'thumb',130,100,0),
(5,'Profile',370,250,0),
(6,'Testimonials',250,318,0),
(7,'slider',770,520,0),
(8,'property_listing',300,350,0),
(9,'Agent_avatar',300,334,0),
(10,'portfolio_image',347,200,0),
(11,'blog_image_large',837,523,0),
(12,'blog_image_front',515,322,0),
(13,'logo',150,106,0),
(14,'Full',0,0,0);
/*!40000 ALTER TABLE `image_presets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mega_menus`
--

DROP TABLE IF EXISTS `mega_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mega_menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) unsigned NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `links` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mega_menus`
--

LOCK TABLES `mega_menus` WRITE;
/*!40000 ALTER TABLE `mega_menus` DISABLE KEYS */;
INSERT INTO `mega_menus` VALUES
(1,2,'Control & automations','1,2,3,4'),
(2,2,'Fire','6,7,8,9'),
(3,2,'Low Current Systems','8,9,10,11'),
(4,2,'Data & Networking Solutions','12,16'),
(5,2,'Security Systems','13,14,15');
/*!40000 ALTER TABLE `mega_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menugroups`
--

DROP TABLE IF EXISTS `menugroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menugroups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menugroups`
--

LOCK TABLES `menugroups` WRITE;
/*!40000 ALTER TABLE `menugroups` DISABLE KEYS */;
INSERT INTO `menugroups` VALUES
(1,'Main Menu'),
(2,'Footer Menu');
/*!40000 ALTER TABLE `menugroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(4) DEFAULT 0,
  `title` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `position` tinyint(4) NOT NULL,
  `group_id` varchar(20) NOT NULL,
  `megamenu` tinyint(1) NOT NULL DEFAULT 0,
  `attachment` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES
(1,0,'Company','about-us',2,1,'1',0,'',0),
(2,0,'Solutions','solutions',2,2,'1',1,'',0),
(3,1,'About us','about-us',2,3,'1',0,'',0),
(4,1,'Our Partners','brands',2,5,'1',0,'',0),
(5,0,'Projects','projects',2,4,'1',0,'',0),
(6,1,'Download Our Research','#',1,6,'1',0,'upload/I21W7DI5Py13eMkHhMxOnJbKiTGYzvEzua5KXvjE.pdf',0),
(7,1,'Download Company Profile','#',1,7,'1',0,'upload/company_profile.pdf',0),
(8,0,'Blog','blogs',2,8,'1',0,'',0),
(9,0,'Contact Us','contact-us',2,9,'1',0,'',0);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metainfos`
--

DROP TABLE IF EXISTS `metainfos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metainfos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `metable_id` bigint(20) unsigned NOT NULL,
  `metable_type` varchar(255) NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `metainfos_metable_id_metable_type_index` (`metable_id`,`metable_type`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metainfos`
--

LOCK TABLES `metainfos` WRITE;
/*!40000 ALTER TABLE `metainfos` DISABLE KEYS */;
INSERT INTO `metainfos` VALUES
(1,7,'App\\Models\\Menu',NULL,NULL),
(2,1,'App\\Models\\Service',NULL,NULL),
(3,3,'App\\Models\\Menu',NULL,NULL),
(4,5,'App\\Models\\Menu',NULL,NULL),
(5,1,'App\\Models\\Blog',NULL,NULL),
(6,2,'App\\Models\\Blog',NULL,NULL),
(7,2,'App\\Models\\Service',NULL,NULL),
(8,3,'App\\Models\\Service',NULL,NULL),
(9,4,'App\\Models\\Service',NULL,NULL),
(10,5,'App\\Models\\Service',NULL,NULL),
(11,8,'App\\Models\\Service',NULL,NULL),
(12,7,'App\\Models\\Service',NULL,NULL),
(13,9,'App\\Models\\Service',NULL,NULL),
(14,10,'App\\Models\\Service',NULL,NULL),
(15,11,'App\\Models\\Service',NULL,NULL),
(16,12,'App\\Models\\Service',NULL,NULL),
(17,13,'App\\Models\\Service',NULL,NULL),
(18,14,'App\\Models\\Service',NULL,NULL),
(19,15,'App\\Models\\Service',NULL,NULL),
(20,16,'App\\Models\\Service',NULL,NULL);
/*!40000 ALTER TABLE `metainfos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'2023_11_28_131149_create_site_settings_table',1),
(4,'2023_11_28_131201_create_smtp_settings_table',1),
(5,'2023_11_28_131225_create_menus_table',1),
(6,'2023_11_28_131244_create_pages_table',1),
(7,'2023_11_28_131306_create_modules_table',1),
(8,'2023_11_28_132524_create_image_presets_table',1),
(9,'2023_12_05_064558_create_menugroups_table',1),
(10,'2023_12_05_120341_create_blogcategories_table',1),
(11,'2023_12_05_120351_create_blogs_table',1),
(12,'2023_12_05_120456_create_blogtags_table',1),
(13,'2024_02_15_074005_create_testimonials_table',1),
(14,'2025_04_16_114251_create_metainfos_table',1),
(15,'2025_04_17_152736_create_mega_menus_table',1),
(16,'2025_04_26_072044_create_permission_tables',1),
(17,'2025_05_24_222344_add_group_name_to_permissions_table',1),
(18,'2025_08_11_044830_create_sliders_table',1),
(19,'2025_08_11_050535_create_categories_table',1),
(21,'2025_08_15_075036_create_products_table',2),
(22,'2025_08_15_090944_create_galleries_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES
(1,'App\\Models\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `small_text` varchar(400) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES
(1,'Contact Page','Convinced yet? Let\'s make something great together.',NULL,'5000','upload/module/thumbnail/1842803867742653.jpg','<h3>Muassasah Mwad AlTshyd</h3>',0,'2024-09-12 06:36:29','2024-09-12 06:36:29'),
(2,'Contact Form','Drop Us a Line',NULL,'Reach out to us from our contact form and we will get back to you shortly.','upload/module/thumbnail/1842803913782120.jpg',NULL,0,'2024-09-12 06:38:38','2024-09-12 06:38:38'),
(3,'Emails','Contact Emails',NULL,'<strong>Support:</strong> support@mastheadtechnologies.com<br><strong>Sales:</strong> sales@mastheadtechnologies.com<br><strong>Hr: </strong>hr@mastheadtechnologies.com','',NULL,0,'2024-09-12 06:52:06','2024-09-12 06:52:06'),
(4,'Home About','About Muassasah Mwad AlTshyd',NULL,NULL,'upload/module/thumbnail/1842984595629248.jpg','<p>Welcome to Construction Material Trading official name Muassasah Mwad AlTshyd, Saudi Arabia\'s leading supplier of high-quality MEP, HVAC, Low Current, innovative and Automation solutions provider. We are committed to delivering excellence, innovation, and customer satisfaction while upholding the highest standards of safety and sustainability.</p><p>We are a trusted partner delivering end-to-end MEP, HVAC, Low Current, and Automation solutions across Saudi Arabia. Through global partnerships and local expertise, we ensure reliability, compliance, and innovation in every project</p>',0,'2025-08-29 00:57:13','2025-08-29 00:57:13'),
(6,'About Page','Who Are We?',NULL,NULL,'upload/module/thumbnail/1842716335654551.jpg','<p>Muassasah Mwad AlTshyd is one of Saudi Arabia’s most trusted partners for integrated MEP, HVAC, Low Current, and Automation solutions. Leveraging a strong network of global and local partners, we deliver innovative and cost-effective systems engineered for long-term reliability.</p><p><br>Guided by the principles of Vision 2030, our approach combines international expertise with localized procurement to support national growth while upholding the highest standards of quality and safety. From critical systems like fire alarm and security systems to intelligent buildings, guest room automation and IOT, our solutions are trusted by leading clients across the commercial, hospitality, and infrastructure sectors. Muassasah Mwad AlTshyd stands as a proven partner, committed to delivering integrated engineering excellence</p>',0,'2025-09-08 17:06:54','2025-09-08 17:06:54'),
(7,'home vision','Vision 2030 & Local Commitment',NULL,NULL,'','<p>At Muassasah Mwad Al Tshyd, we\'re passionate about building the future of Saudi Arabia. Our focus is simple: we invest in local talents and businesses, use the smartest technology to create innovative solutions, and ensure everything we build is sustainable for the long run. For us, it’s about more than just projects—it’s about helping build a stronger, smarter, and greener Kingdom, together</p>',0,'2025-09-08 17:09:55','2025-09-08 17:09:55');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `menu_id` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `small_text` varchar(400) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES
(1,'smtp.menu','smtp','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(2,'smtp.setting','smtp','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(3,'site.menu','site','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(4,'site.setting','site','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(5,'role.menu','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(6,'role.index','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(7,'role.create','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(8,'role.edit','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(9,'role.delete','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(10,'permission.index','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(11,'permission.create','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(12,'permission.edit','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(13,'permission.delete','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(14,'add.roles.permission','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(15,'all.roles.permission','role','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(16,'admin.menu','admin','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(17,'all.admin','admin','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(18,'add.admin','admin','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(19,'all.users','admin','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(20,'image_preset.menu','image_preset','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(21,'image_preset.index','image_preset','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(22,'image_preset.create','image_preset','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(23,'image_preset.edit','image_preset','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(24,'image_preset.status','image_preset','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(25,'image_preset.delete','image_preset','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(26,'module.menu','module','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(27,'module.index','module','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(28,'module.create','module','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(29,'module.delete','module','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(30,'pages.menu','pages','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(31,'pages.create','pages','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(32,'pages.index','pages','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(33,'pages.edit','pages','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(34,'pages.status','pages','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(35,'pages.delete','pages','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(36,'blog.menu','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(37,'blog.index','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(38,'blog.create','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(39,'blog.edit','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(40,'blog.delete','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(41,'tag.menu','tag','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(42,'tag.index','tag','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(43,'tag.create','tag','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(44,'tag.edit','tag','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(45,'tag.delete','tag','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(46,'menus.menu','menus','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(47,'menus.index','menus','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(48,'menus.create','menus','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(49,'menus.edit','menus','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(50,'menus.delete','menus','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(51,'menus.status','menus','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(52,'menugroup.menu','menugroup','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(53,'menugroup.index','menugroup','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(54,'menugroup.create','menugroup','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(55,'menugroup.edit','menugroup','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(56,'menugroup.delete','menugroup','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(57,'blogcategory.menu','blogcategory','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(58,'blogcategory.create','blogcategory','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(59,'blogcategory.index','blogcategory','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(60,'blogcategory.edit','blogcategory','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(61,'blogcategory.delete','blogcategory','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(62,'blogcategory.status','blogcategory','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(63,'category.menu','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(64,'category.index','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(65,'category.create','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(66,'category.edit','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(67,'category.delete','post','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(68,'megamenu.index','megamenu','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(69,'megamenu.create','megamenu','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(70,'megamenu.edit','megamenu','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(71,'megamenu.delete','megamenu','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(72,'megamenu.status','megamenu','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(79,'testimonials.menu','testimonials','web','2025-08-15 03:15:51','2025-08-15 03:15:51'),
(80,'testimonials.create','testimonials','web','2025-08-15 03:15:51','2025-08-15 03:15:51'),
(81,'testimonials.index','testimonials','web','2025-08-15 03:15:51','2025-08-15 03:15:51'),
(82,'testimonials.edit','testimonials','web','2025-08-15 03:15:51','2025-08-15 03:15:51'),
(83,'testimonials.status','testimonials','web','2025-08-15 03:15:51','2025-08-15 03:15:51'),
(84,'testimonials.delete','testimonials','web','2025-08-15 03:15:51','2025-08-15 03:15:51'),
(91,'services.menu','services','web','2025-08-24 02:21:24','2025-08-24 02:21:24'),
(92,'services.create','services','web','2025-08-24 02:21:24','2025-08-24 02:21:24'),
(93,'services.index','services','web','2025-08-24 02:21:24','2025-08-24 02:21:24'),
(94,'services.edit','services','web','2025-08-24 02:21:24','2025-08-24 02:21:24'),
(95,'services.status','services','web','2025-08-24 02:21:24','2025-08-24 02:21:24'),
(96,'services.delete','services','web','2025-08-24 02:21:24','2025-08-24 02:21:24'),
(97,'slider.menu','slider','web','2025-08-24 03:06:08','2025-08-24 03:06:08'),
(98,'slider.create','slider','web','2025-08-24 03:06:09','2025-08-24 03:06:09'),
(99,'slider.index','slider','web','2025-08-24 03:06:09','2025-08-24 03:06:09'),
(100,'slider.edit','slider','web','2025-08-24 03:06:09','2025-08-24 03:06:09'),
(101,'slider.status','slider','web','2025-08-24 03:06:09','2025-08-24 03:06:09'),
(102,'slider.delete','slider','web','2025-08-24 03:06:09','2025-08-24 03:06:09'),
(109,'brand.menu','brand','web','2025-09-07 03:40:08','2025-09-07 03:40:08'),
(110,'brand.create','brand','web','2025-09-07 03:40:08','2025-09-07 03:40:08'),
(111,'brand.index','brand','web','2025-09-07 03:40:08','2025-09-07 03:40:08'),
(112,'brand.edit','brand','web','2025-09-07 03:40:08','2025-09-07 03:40:08'),
(113,'brand.status','brand','web','2025-09-07 03:40:08','2025-09-07 03:40:08'),
(114,'brand.delete','brand','web','2025-09-07 03:40:08','2025-09-07 03:40:08'),
(115,'project.menu','project','web','2025-09-07 04:29:59','2025-09-07 04:29:59'),
(116,'project.create','project','web','2025-09-07 04:29:59','2025-09-07 04:29:59'),
(117,'project.index','project','web','2025-09-07 04:29:59','2025-09-07 04:29:59'),
(118,'project.edit','project','web','2025-09-07 04:29:59','2025-09-07 04:29:59'),
(119,'project.status','project','web','2025-09-07 04:29:59','2025-09-07 04:29:59'),
(120,'project.delete','project','web','2025-09-07 04:29:59','2025-09-07 04:29:59');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stext` varchar(500) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `front` tinyint(1) DEFAULT 0,
  `client` varchar(100) DEFAULT NULL,
  `contractor` varchar(100) DEFAULT NULL,
  `specialist_supplier` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES
(1,1,'Al Akaria – Olaya Street, Riyadh','al-akaria-olaya-street-riyadh','upload/projects/thumbnail/1842599640199663.jpeg','We have successfully completed the upgrade of the Fire Alarm system to a new system','<p>The scope includes the supply of the new fire alarm system, including installation of the fire alarm system (2nd fix) and testing &amp; commissioning with handing over of the system</p>',0,'Al-Akaria','Idworks Global Company','Muassasah Mwad AlTshyd','9,10,11','Al Olaya Street - Riyadh',0,NULL,'2025-09-08 11:28:24'),
(2,2,'Al Yamama – University Riyadh','al-yamama-university-riyadh','upload/projects/thumbnail/1842617202763293.jpeg','We are in the process of upgrading the existing BMS, Fire, CCTV and ACS System for the entire University. The system includes HVAC, plumbing systems, Lighting control system, upgrading of the legacy Fire alarm system, CCTV and ACS system.','<p>The scope includes the supply of BMS, CCTV and Fire materials with field devices along with installation, testing &amp; commissioning, and handing over.</p>',0,'Al-Yamama University','International Contracting Company','Muassasah Mwad AlTshyd','19,2,6,9,21,3,1,10,11,Hikvision','Madinah Road - Riyadh',0,'2025-09-07 09:21:41','2025-09-08 11:30:15'),
(3,2,'Kimpton IHG Hotel KAFD - Riyadh','kimpton-ihg-hotel-kafd-riyadh','upload/projects/thumbnail/1842985864120951.jpeg','We have completed the handing over of the wireless distress/panic alarm system and the handing over of the Avaya Server for IP telephony','<p>The scope includes the supply of a wireless panic alarm system, installation of the panic alarm system, and testing &amp; commissioning with handing over of the system</p><p>For the Avaya Server, our scope was testing &amp; commissioning, including handing over</p>',0,'KAFD','3S','Construction  Material','12,13','KAFD parcel-4.05 at Boulevard Street, Aqiq District',0,'2025-09-07 09:23:17','2025-09-11 16:31:24'),
(4,2,'King Khalid International Airport Load Center 3','king-khalid-international-airport-load-center-3','upload/projects/thumbnail/1842983163452540.png','We have successfully completed the completion of Chiller Plant Manager.','<p>The scope includes the supply of the BMS Materials and testing &amp; commissioning with handing over of the system</p>',0,'GACA','SSEM','Muassasah Mwad AlTshyd','2,3,1','Airport Load Center 3 - Riyadh',0,'2025-09-07 09:26:12','2025-09-11 15:48:28'),
(5,3,'Marriott Hotel – Diplomatic Quarter','marriott-hotel-diplomatic-quarter','upload/projects/thumbnail/1842983179529404.jpeg','We have commissioned new HVAC units and upgraded the existing systems','<p>Our scope included upgrading of the existing AHU and supply of new materials for the VAV and FCUs, including testing &amp; commissioning and handing over.</p>',0,'Marriott','Anfa Contracting Company','Muassasah Mwad AlTshyd','2,6,3,1','Diplomatic Quarter - Riyadh',0,'2025-09-07 09:27:45','2025-09-11 15:48:43'),
(6,4,'Riyadh Cables Factory','riyadh-cables-factory','upload/projects/thumbnail/1842983196184564.jpeg','Completion of the HVAC system in the Riyadh Cable Factory','<p>Our scope included complete supply of BMS materials along with handing over of the system</p>',0,'Riyadh Cables','Raneem Al Wusta','Muassasah Mwad AlTshyd','2,6,3,1','2nd Industrial City, Kharj Road – Riyadh',0,'2025-09-07 09:29:04','2025-09-11 15:48:59');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1),
(11,1),
(12,1),
(13,1),
(14,1),
(15,1),
(16,1),
(17,1),
(18,1),
(19,1),
(20,1),
(21,1),
(22,1),
(23,1),
(24,1),
(25,1),
(26,1),
(27,1),
(28,1),
(29,1),
(30,1),
(31,1),
(32,1),
(33,1),
(34,1),
(35,1),
(36,1),
(37,1),
(38,1),
(39,1),
(40,1),
(41,1),
(42,1),
(43,1),
(44,1),
(45,1),
(46,1),
(47,1),
(48,1),
(49,1),
(50,1),
(51,1),
(52,1),
(53,1),
(54,1),
(55,1),
(56,1),
(57,1),
(58,1),
(59,1),
(60,1),
(61,1),
(62,1),
(63,1),
(64,1),
(65,1),
(66,1),
(67,1),
(68,1),
(69,1),
(70,1),
(71,1),
(72,1),
(79,1),
(80,1),
(81,1),
(82,1),
(83,1),
(84,1),
(91,1),
(92,1),
(93,1),
(94,1),
(95,1),
(96,1),
(97,1),
(98,1),
(99,1),
(100,1),
(101,1),
(102,1),
(109,1),
(110,1),
(111,1),
(112,1),
(113,1),
(114,1),
(115,1),
(116,1),
(117,1),
(118,1),
(119,1),
(120,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'SuperAdmin','web','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(2,'Editor','web','2025-08-15 02:14:08','2025-08-15 02:14:08');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `small_text` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `brands` varchar(100) DEFAULT NULL,
  `projects` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES
(1,1,'Building Management System','building-management-system',0,'upload/services/thumbnail/1842624297280304.jpg','Linking productivity and well-being to controlled comfort, air quality, and lighting reflects widely cited BMS outcomes that enhance occupant experience and performance.',NULL,'2,21,1','6,5,2,4',0),
(2,1,'Guest Room Management System','guest-room-management-system',0,'upload/services/thumbnail/1842624591615327.jpg','Automated guest room controls for lighting, temperature, and entertainment systems to enhance guest comfort and operational efficiency.',NULL,'4','',0),
(3,1,'HVAC Control System','hvac-control-system',0,'upload/services/thumbnail/1842624537126337.jpg','Centralized heating, ventilation, and air conditioning management to optimize indoor climate while reducing energy consumption and maintenance costs.',NULL,'5','6,5,2',0),
(4,1,'Lighting Control System','lighting-control-system',0,'upload/services/thumbnail/1842624820892177.jpg','Intelligent lighting management with automated scheduling, occupancy sensing, and dimming controls to improve energy efficiency and user comfort.',NULL,'6','',0),
(5,1,'Meters & Billing System','meters-billing-system',0,'upload/services/thumbnail/1842624989241559.jpg','Real-time monitoring and automated billing for utilities including electricity, water, and gas consumption to enable accurate cost allocation and energy management.',NULL,'7,8','',0),
(6,2,'Fire Alarm System','fire-alarm-system',0,NULL,'Comprehensive fire detection and alarm network with smoke sensors, heat detectors, and notification devices to ensure occupant safety and regulatory compliance.',NULL,NULL,'2,1',0),
(7,2,'VESDA System','vesda-system',0,'upload/services/thumbnail/1842625289773936.jpg','Very Early Smoke Detection Apparatus providing ultra-sensitive air sampling smoke detection for critical areas requiring advanced fire protection.',NULL,NULL,'',0),
(8,3,'IP Telephony System','ip-telephony-system',0,'upload/services/thumbnail/1842985228074243.jpg','Voice over Internet Protocol communication system enabling scalable, cost-effective telephony with advanced features like unified messaging and mobility.',NULL,'','3',0),
(9,3,'Nurse Call System','nurse-call-system',0,'upload/services/thumbnail/1842985398119036.jpg','Patient-to-staff communication system allowing immediate assistance requests and priority-based response management in healthcare facilities.',NULL,'','',0),
(10,3,'Public Address System','public-address-system',0,'upload/services/thumbnail/1842809690973160.jpg','Building-wide audio communication system for announcements, emergency notifications, and background music distribution across multiple zones.',NULL,'','',0),
(11,3,'UPS System','ups-system',0,'upload/services/thumbnail/1842809780343387.jpg','Uninterruptible Power Supply providing backup power and voltage regulation to protect critical systems from power outages and electrical disturbances.',NULL,'','',0),
(12,4,'Data and Passive Components','data-and-passive-components',0,'upload/services/thumbnail/1842810102668823.jfif','Structured cabling infrastructure including fiber optic and copper networks, patch panels, and passive connectivity components supporting all building systems.',NULL,'','2',0),
(13,5,'CCTV','cctv',0,'upload/services/thumbnail/1842810239475567.jpg','Closed Circuit Television surveillance system with IP cameras, recording capabilities, and remote monitoring to enhance security and incident management.',NULL,'','2',0),
(14,5,'ACS','acs',0,'upload/services/thumbnail/1842810354443019.jpg','Access Control System managing entry permissions through card readers, biometric scanners, and electronic locks to secure restricted areas and track personnel movement.',NULL,'','',0),
(15,5,'Intrusion Detection System','intrusion-detection-system',0,'upload/services/thumbnail/1842810588480753.jpg','Perimeter and interior security monitoring with motion sensors, door/window contacts, and glass break detectors to detect unauthorized access attempts.',NULL,'','',0),
(16,4,'IOT Solutions','iot-solutions',0,'upload/services/thumbnail/1842810616765480.jpg','We harness the power of the Internet of Things (IoT) to create a truly intelligent and unified building ecosystem.',NULL,'','',0);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('00Ga1LF4smnlUitwr4gSM28Jbk4CvrvLKGsASV0g',NULL,'4.43.184.114','Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50728)','YTozOntzOjY6Il90b2tlbiI7czo0MDoicnkxZ2s2YWsweldpZzVSWjRydUZZMzNObUpSQVhRVFdoMjJjMDY0SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vbW10bC10ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1757609602),
('2Yev4dlRw0RRCwIAtKx82nJRTJYuAluEXI1rdOJF',NULL,'82.156.68.74','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSE52YkV0dUJ1Zk85TmdrTmhwS3FHazJ2UXVXaUU2Y0hwaDNRQThHOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vbW10bC10ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1757648247),
('6Gee0oaKWn4wqfdpE8aFD7TzIaERVnY14tifVN1X',NULL,'103.211.14.254','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUFhuOXNvVnVEQWdLdlNBZlRXZklTMmp0eEtRd1JSNjNMNVNxaTY0cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3d3Lm1tdGwtdGVjaC5jb20vY29udGFjdC11cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTQ6ImNhcHRjaGFfYW5zd2VyIjtpOjk7fQ==',1757611986),
('8UwlElg8oXMETqhLEx1BaDhsGpJ9UVwGdbAkmf7z',NULL,'2a0d:5600:101:d002:8e5b:bf3c:1e57:b287','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiek1TNkxhWE9WNTVGRkFDWlNaSEN6WTQxOUhTQWZpQVU0cjM4eVRzQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1757626127),
('Dj0tRIt6HwXtQL7Pih7sZgOMUKNtN02HG4aB1KN6',NULL,'132.232.144.200','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTRGRFNYOU9yTTFIYmh2akZ3TUkwQ2ZCV2Y2S2pWVUNGYkE4TDRHNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3Lm1tdGwtdGVjaC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1757615286),
('k09nil712ET3IczPcjA21QdrnwALJDo31r03MfNq',NULL,'103.211.14.254','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWNINUNpY1k5cmo0cHBzUEhXcVdueEFldU5maUxvRDQ1UWJLeUJyQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vbW10bC10ZWNoLmNvbS9zb2x1dGlvbnMvYnVpbGRpbmctbWFuYWdlbWVudC1zeXN0ZW0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1757613570),
('n9PM1PVj6YX9dHRXwPst0vlQ2SxLWzJRs8aUJr6d',NULL,'43.130.32.245','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYzZoWXFSZHdsbVV0dHBoSTkyQmVrYktiV2tGaGl6R21LUDlpSjllYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3Lm1tdGwtdGVjaC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1757642674),
('onVxY7lU5IJuCqd9XDYgEVMKpg3illMRJxgnh6s7',1,'103.211.14.254','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoibG9KVUZYcm9pSEJKdVRFTUZGWG1WWGMxWDBYUE9UTGxaRDBUZ2dMWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vbW10bC10ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNDoiY2FwdGNoYV9hbnN3ZXIiO2k6OTt9',1757613616),
('QqbFae7JVsUzOEJoRYgR1gMuii7UCREZj1fBAHt7',1,'103.211.14.254','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYWUyRU1iV2NoRzJscllxZFNlQnlENkZmemNUVGluY05hSDVKVlBJZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbW10bC10ZWNoLmNvbS9hZG1pbi9icmFuZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1757614626),
('r9VDlqpcMbcrVJy6NK1oLSslzoKPucLWY7Vf37ur',NULL,'66.249.68.35','Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.7339.127 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUVPcG1TNDVXcVZUWW02UjlwTVM4VEk0cFpISFVDQXh3MXlLYmo1SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3Lm1tdGwtdGVjaC5jb20vcHJvamVjdC9zb2x1dGlvbnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1757639202),
('VFIu7ex1Xuenci6gM9IG8egL64dt3O8KHlkiUzcK',1,'103.154.246.150','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM1A4R1hJdjdwWldRcXRQaEpyZFRwSlB4NVBjNlJoV0Fad2NoUUczRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8vbW10bC10ZWNoLmNvbS9hZG1pbi9tb2R1bGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1757651635),
('wzwwUxDwF3rMhTB0hoji5XfUFh192C7nilGgOxaA',NULL,'223.190.84.202','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ0xYODNhd2pueVBRR0dEeGQ1VFdBMVFRemsxZ1R4Mzh3bm5PcTZGNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8vbW10bC10ZWNoLmNvbS9icmFuZHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjIyOiJQSFBERUJVR0JBUl9TVEFDS19EQVRBIjthOjA6e319',1757608534),
('XdWCbKhshxQdZhZTggqvYuKvcv9djKaMjGLOiLyi',NULL,'140.143.98.18','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkZaSDhnTFZwcnM2SkF2T2dWaVdSVkx1TzI1THNxbDNqYWV6Rk5xRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8vbW10bC10ZWNoLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1757626268);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `site_title` varchar(100) NOT NULL,
  `app_name` varchar(100) DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keywords` mediumtext DEFAULT NULL,
  `about` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `pinterest` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `youtube` varchar(50) DEFAULT NULL,
  `copywrite` varchar(100) DEFAULT NULL,
  `pagination` int(11) NOT NULL DEFAULT 6,
  `script` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES
(1,'upload/template/thumbnail/1842983515136863.png','upload/template/thumbnail/1841318869029999.png','Smart Building Automation & BMS Solutions | Muassasah Mwad AlTshyd','Muassasah Mwad AlTshyd','Leading provider of building management system (BMS) automation, HVAC & low-current systems, fire & security management. Delivering smart building automation solutions with precision, safety, and innovation.','BMS automation, HVAC BMS system, building automation system, smart buildings, fire alarm system, intrusion alarm system, CCTV system, low current systems, security management system, nurse call system, smart building automation solutions','Welcome to Construction Material Trading official name Muassasah Mwad AlTshyd, Saudi Arabia\'s leading supplier of high-quality MEP, HVAC, Low Current, innovative and Automation solutions provider.','966-546308237','Building No.3242, Nhaound, Al-Aziziyah District, Riyadh-14513, Saudi Arabia','info@mmtl-tech.com','#','#','#',NULL,NULL,'Muassasah Mwad AlTshyd',10,'','2025-08-15 07:44:08','2025-09-11 16:47:23');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES
(1,'Slider-1',NULL,'Precision, Innovation, and Reliability','For us, precision is more than just a buzzword—it\'s a fundamental part of our process. We meticulously select and source only the highest-quality materials, ensuring every component meets the strictest international standards','upload/slider/thumbnail/1841325484379738.jpg','<p>Innovative Low Current &amp; Automation Solutions for a Smarter Saudi Arabia.</p>',0),
(2,'Slider-2',NULL,'Empowering Smart Buildings with Seamless Automation','We are here to take care of all your smart, low-current, and automation needs—making your building more intelligent, safe, and energy efficient.','upload/slider/thumbnail/1841325774957390.jpg',NULL,0);
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smtp_settings`
--

DROP TABLE IF EXISTS `smtp_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smtp_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mailer` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `encryption` varchar(255) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `from_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smtp_settings`
--

LOCK TABLES `smtp_settings` WRITE;
/*!40000 ALTER TABLE `smtp_settings` DISABLE KEYS */;
INSERT INTO `smtp_settings` VALUES
(1,'smtp','smtp.hostinger.com','465','info@mmtl-tech.com','Mmtl@2025%','ssl','Muassasah Mwad AlTshyd','support@mastheadtechnologies.in','2023-07-24 20:34:21','2025-09-09 17:05:43');
/*!40000 ALTER TABLE `smtp_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `designation` varchar(60) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES
(1,'Eng. Faisal Al‑Harbia','Facilities Director, Riyadh Commercial Tower','','Muassasah Mwad AlTshyd our HVAC, lighting, and metering into a single BMS dashboard. We saw immediate energy savings and far better visibility for reporting.',0),
(2,'Sara Al‑Qahtani','Sustainability Lead, Mixed‑Use Development (Jeddah)',NULL,'Their team delivered a smooth migration to a modern BMS with analytics. Fault detection cut waste and complaints dropped significantly.',0),
(3,'Mohammed Al‑Amri','Operations Manager, 5‑Star Hotel (Makkah)',NULL,'Smart room controls and centralized BMS improved guest comfort while reducing energy during low occupancy hours. Excellent support and training.',0),
(4,'Dr. Hanan Al‑Mutairi','Hospital Administrator, Dammam',NULL,'We rely on Aala Tech for HVAC, IAQ, and emergency integrations. The BMS helps maintain comfort targets and compliance with audit-ready data.',0),
(5,'Omar Al‑Ghamdi','Real Estate Asset Manager, KSA Portfolio',NULL,'Portfolio dashboards and open integrations made budgeting and ESG reporting easier. Clear ROI from optimization and maintenance reduction.',0),
(6,'Eng. Reem Al‑Otaibi','MEP Lead, Government Campus (Riyadh)',NULL,'Seamless integration of access control, fire alarm, and metering with the BMS. Strong engineering discipline and on‑time delivery.',0),
(7,'Khalid Al‑Dosari','Factory GM, Eastern Province',NULL,'Variable frequency drives and BMS sequencing stabilized our loads and reduced downtime. The mobile dashboards are invaluable for on‑call teams.',0);
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'admin','admin','admin@gmail.com',NULL,'$2y$12$XYVfK/Msk7ekN8vCsZX/dOnRfRIeIfEkmeFRvPVqQQYdBHYSdAoFi','upload/user/thumbnail/1830193814201669.jpg',NULL,NULL,'admin',0,'Jr6IXENCxZR6uEdNeaalbFZ6jtayK38hnOeTX5naF5ETctAtqSkzsVGLiCKW','2025-08-15 02:14:08','2025-08-15 02:14:08'),
(2,'sumit kumar','sumit','sumit@gmail.com',NULL,'$2y$12$hZpVX8vApS7jmIVFFjW9iOZ/Es2dC9j5Oy7erTTEonIH9zzdKdVY2','',NULL,NULL,'admin',0,NULL,'2025-08-15 02:14:08','2025-08-15 02:14:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-12  4:54:52
