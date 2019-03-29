-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: yesPlease
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (73,'2014_10_12_000000_create_users_table',1),(74,'2014_10_12_100000_create_password_resets_table',1),(79,'2019_01_09_113800_yp_users',1),(80,'2019_01_10_053944_create_admins_table',2),(81,'2019_01_10_064443_yp_admins',3),(82,'2019_01_10_064623_yp_business_users',3),(135,'2019_01_10_074403_create_yp_admins_table',4),(142,'2019_01_09_111822_yp_business_users',5),(143,'2019_01_09_111859_yp_business_details',5),(144,'2019_01_09_111935_yp_business_categories',5),(145,'2019_01_09_113419_yp_business_sub_categories',5),(146,'2019_01_18_115501_yp_general_users',5),(147,'2019_01_31_101150_yp_verification_business_users',6),(148,'2019_01_18_102353_yp_business_user_categories',7),(149,'2019_02_06_102157_yp_business_usercategories',8),(150,'2019_01_24_114103_yp_user_hashtags',9),(151,'2019_02_07_055258_yp_business_usercategories',10),(152,'2019_02_18_072858_yp_business_users_quotes',11),(153,'2019_02_18_102010_yp_business_user_quotes',12),(154,'2019_02_18_102613_yp_business_user_quotes',13),(155,'2019_02_18_104449_yp_business_users_quotes',14),(156,'2019_02_18_104531_yp_business_users_quotes_reply',15),(157,'2019_02_18_104857_yp_business_users_quotes',16),(158,'2019_02_19_133138_yp_business_user_reviews',17),(159,'2019_02_20_052335_yp_user_reviews',18),(160,'2019_02_21_110740_business_users',19),(161,'2019_02_21_110845_yp_business_user_quote_templates',19),(162,'2019_02_28_104634_yp_general_users_quotes',20),(163,'2019_03_01_112341_yp_business_selected_services',21),(164,'2019_03_28_073947_yp_business_user_cc_details_table.php',21);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rupinder kaur','rupinder@gmail.com',NULL,'$2y$10$oxsS.15iyEt5iqiKgGnzou0REaG8S7J5..s3H5.FZ3Gt/xH9N7952','kpSnSCQ957JiEqUq2vy0LRhjTejzcjqWH88tLGCbCR1HoyeQ2uWym9S0wZlB','2019-01-10 02:04:31','2019-01-10 02:04:31'),(2,'rupinder kaur','rupinde1r@gmail.com',NULL,'$2y$10$n45GKeeD38RVP.6prYwKx.6xoTrfg4ljYkq0AO1APWu8QDMRDcKeq','f66Vo5syNEXlaufjMFrefplQ4ZOQB0tY7dNz1R6fBVvkxcjG3V8ZEyNjfkhC','2019-01-10 02:04:53','2019-01-10 02:04:53'),(3,'test test','rupinder344@gmail.com',NULL,'$2y$10$wliZtz1dziGCUClLm34XG./3vWQACftenrjWoFQzFotIy4wOqztbi','D1QOVSimJRvVAh4xumIDLWeHme1Op66Q7XkpXelU4svvuUFqTCIefDFD3oex','2019-01-10 02:31:45','2019-01-10 02:31:45'),(4,'rupinder kaur','rupindefgfr@gmail.com',NULL,'$2y$10$KKQ0POJsAN2O.ak0JFsmFO2UcsSmkySOlhR9veJoQA/KKjcg3Tj1S','iMAPUaic2Hi4MB9uJo8jlFyN8HxH6tIcINuF7lYg2EIlEHHqbk6J9BhkrVma','2019-01-10 07:09:57','2019-01-10 07:09:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_admins`
--

DROP TABLE IF EXISTS `yp_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `yp_admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_admins`
--

LOCK TABLES `yp_admins` WRITE;
/*!40000 ALTER TABLE `yp_admins` DISABLE KEYS */;
INSERT INTO `yp_admins` VALUES (1,'admin','nishant@yopmail.com','$2y$10$7cxqWMuQK0J0uJcsIDkVQu6RGCV6JBhvD4B/UzfAzJsPYmhYoxs3e','Zp6dBEV3JPb0n6ju2F0r0OSDLMGfPlPJ0Fsd2n63gVFg684HA1hjkgIynu6r','2019-01-31 06:07:58','2019-03-28 07:56:56');
/*!40000 ALTER TABLE `yp_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_categories`
--

DROP TABLE IF EXISTS `yp_business_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) NOT NULL,
  `super_cat_id` int(11) NOT NULL DEFAULT '12345',
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` tinyint(4) NOT NULL DEFAULT '1',
  `quote_with_ph` int(11) NOT NULL,
  `quote_without_ph` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `super_cat_id` (`super_cat_id`),
  CONSTRAINT `super category relation` FOREIGN KEY (`super_cat_id`) REFERENCES `yp_business_super_categories` (`super_cat_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_categories`
--

LOCK TABLES `yp_business_categories` WRITE;
/*!40000 ALTER TABLE `yp_business_categories` DISABLE KEYS */;
INSERT INTO `yp_business_categories` VALUES (7,3575791522913,1552658294,'Barmen course',1,5,4,'2019-03-18 20:01:17','2019-03-28 06:57:13'),(8,5657995240617,1552658364,'Sea',1,3,3,'2019-03-19 04:46:04','2019-03-28 06:57:06'),(9,5157897230773,1552658340,'Chandigarh',1,2,3,'2019-03-19 04:46:13','2019-03-28 06:56:54'),(10,9555979520158,1552658364,'Bottle',1,5,6,'2019-03-19 06:12:35','2019-03-28 06:56:42'),(12,155583914772,1552977361,'Electrician',1,9,7,'2019-03-19 06:38:01','2019-03-28 06:56:32'),(13,912771495452,1552977361,'Baby Sitting',1,7,7,'2019-03-19 06:38:14','2019-03-28 06:56:25'),(14,877129475505,1552977361,'Cleaner',1,7,7,'2019-03-19 06:38:28','2019-03-28 06:56:16'),(16,1980305225194,1552977361,'PLUMBER',1,5,5,'2019-03-19 07:24:50','2019-03-28 06:56:09'),(21,9150503330153,1553003098,'Php',1,12,7,'2019-03-19 13:45:03','2019-03-28 06:56:01'),(22,3621173505310,1552977607,'clean',1,4,4,'2019-03-19 13:45:21','2019-03-28 06:55:50'),(23,515361033054,1552658294,'Math',1,2,2,'2019-03-19 13:45:50','2019-03-28 06:55:37'),(24,3055116381500,1553003169,'nokia',1,7,5,'2019-03-19 13:46:20','2019-03-28 06:55:25'),(25,13501295357,1552977186,'Watsapp',1,2,4,'2019-03-20 04:44:52','2019-03-28 06:55:15'),(26,1714555830954,1552977025,'bootstrap',1,2,6,'2019-03-20 04:45:58','2019-03-28 06:55:06'),(27,2245010238577,1553072858,'android',1,3,5,'2019-03-20 09:07:52','2019-03-28 06:54:59'),(28,8254091091553,1553245858,'GreenLand_Properties_Mohali',1,5,4,'2019-03-22 09:11:41','2019-03-28 06:54:49');
/*!40000 ALTER TABLE `yp_business_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_details`
--

DROP TABLE IF EXISTS `yp_business_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_id` int(10) unsigned NOT NULL,
  `business_userid` bigint(20) NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule` text COLLATE utf8mb4_unicode_ci,
  `geographic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_profile` text COLLATE utf8mb4_unicode_ci,
  `pic_vid` text COLLATE utf8mb4_unicode_ci,
  `hash_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `distance_all` tinyint(4) NOT NULL DEFAULT '0',
  `distance_kms` tinyint(4) NOT NULL DEFAULT '0',
  `send_question` tinyint(4) NOT NULL DEFAULT '0',
  `send_schedule` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `yp_business_details_b_id_index` (`b_id`),
  CONSTRAINT `yp_business_details_b_id_foreign` FOREIGN KEY (`b_id`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_details`
--

LOCK TABLES `yp_business_details` WRITE;
/*!40000 ALTER TABLE `yp_business_details` DISABLE KEYS */;
INSERT INTO `yp_business_details` VALUES (1,1,2713965052578,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-03-15 14:15:12','2019-03-15 14:37:18',0,10,0,0),(4,4,68015592665,'','','{\"sunday_from\":\"20:12\",\"sunday_to\":\"20:12\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"20:12\",\"saturday_to\":\"20:12\"}',NULL,NULL,'{\"pic\":[\"801552660954.jpeg\",\"461552660954.jpeg\",\"351552660954.png\",\"261552660954.png\",\"be6cbd80b141486a901f0b4ce2bf14c1_665517419.png\"]}',NULL,NULL,NULL,NULL,'2019-03-15 14:40:16','2019-03-15 14:42:53',0,100,1,0),(5,5,9651461863152,'','','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"20:16\",\"friday_to\":\"20:16\",\"saturday_from\":\"20:17\",\"saturday_to\":\"20:17\"}',NULL,'Tell your clients about your business, you can also do it by uploading photos/videosTell your clients about your business, you can also do it by uploading photos/videosTell your clients about your business, you can also do it by uploading photos/videosTell your clients about your business, you can also do it by uploading photos/videos','{\"pic\":[\"851552661208.jpeg\",\"681552661208.jpeg\",\"551552661208.png\",\"391552661208.png\"]}',NULL,NULL,NULL,NULL,'2019-03-15 14:45:54','2019-03-15 14:47:06',0,100,0,0),(6,6,5196324352611,'','','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"20:20\",\"monday_to\":\"20:20\",\"tuesday_from\":\"20:20\",\"tuesday_to\":\"20:20\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,NULL,'{\"pic\":[\"251552661408.png\"]}',NULL,NULL,NULL,NULL,'2019-03-15 14:49:15','2019-03-15 14:50:25',0,10,0,0),(7,7,2658681157151,'','','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"20:24\",\"thursday_to\":\"20:24\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,NULL,'{\"pic\":[\"321552661629.jpeg\",\"291552661629.jpeg\",\"421552661629.png\",\"761552661629.png\"]}',NULL,NULL,NULL,NULL,'2019-03-15 14:53:13','2019-03-15 14:54:10',0,100,0,0),(8,9,4641388561528,'','','{\"available\":\"available\"}',NULL,'test for best','{\"pic\":[\"471552661899.png\",\"171552661899.jpg\",\"911552661899.jpeg\",\"621552661899.jpg\",\"221552661899.jpg\",\"271552661899.png\",\"441552661899.jpg\",\"411552661899.jpg\",\"791552661899.jpg\",\"611552661925.jpg\"]}',NULL,NULL,NULL,NULL,'2019-03-15 14:57:46','2019-03-15 14:59:02',0,10,1,0),(10,11,8952668807561,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-03-18 05:23:36','2019-03-18 05:24:26',0,10,0,0),(11,14,6420595715882,'  Are you social? Connect your facebook profile and add your website with your facebook group/page  ','  Are you social? Connect your facebook profile and add your website with your facebook group/page  ','{\"sunday_from\":\"13:38\",\"sunday_to\":\"13:39\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'A cleaner or a cleaning operative is a type of industrial or domestic worker who cleans homes or commercial premises for payment. Cleaning operatives may specialise in cleaning particular things or places, such as window cleaners. Cleaning operatives often work when the people who otherwise occupy the space are not around. They may clean offices at night or houses during the workday.','{\"pic\":[\"281552982844.png\",\"0bfe1182dabb4464a6fd977c06f8d32e_1984307596.png\"]}',NULL,NULL,NULL,NULL,'2019-03-19 06:29:14','2019-03-19 10:22:50',0,10,1,0),(12,15,5199527968526,'   Baby Sitting   ','      ','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"13:41\",\"monday_to\":\"13:41\",\"tuesday_from\":\"13:41\",\"tuesday_to\":\"13:41\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'Babysitting is temporarily caring for a child. Babysitting can be a paid job for all ages; however, it is best known as a temporary activity for young teenagers who are too young to be eligible for employment in the general economy. It provides autonomy from parental control, and spending money, as well as an introduction to the techniques of child care. It emerged as a social role for teenagers in the 1920s, and became especially important in suburban America in the 1950s and 1960s, when there was an abundance of small children. It stimulated an outpouring of folk culture in the form of urban legends, pulp novels, and horror films.[1]','{\"pic\":[\"281552983058.jpg\",\"0bfe1182dabb4464a6fd977c06f8d32e_1826814504.png\"]}',NULL,NULL,NULL,NULL,'2019-03-19 08:09:39','2019-03-19 10:40:11',0,10,0,0),(13,16,4551559266388,'      ','      ','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"14:39\",\"thursday_to\":\"14:39\",\"friday_from\":\"14:39\",\"friday_to\":\"14:39\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'A plumber is a tradesperson who specializes in installing and maintaining systems used for potable (drinking) water, sewage and drainage in plumbing systems. The term dates from ancient times and is related to the Latin word for lead, \"plumbum\".[1][2]','{\"pic\":[\"341552986543.jpg\"]}',NULL,NULL,NULL,NULL,'2019-03-19 09:06:32','2019-03-19 10:50:23',0,30,0,0),(14,17,1281655939846,'testing.iapp001@gmail.com','testing.iapp001@gmail.com','{\"available\":\"available\"}',NULL,'A plumber is a tradesperson who specializes in installing and maintaining systems used for potable (drinking) water, sewage and drainage in plumbing systems. The term dates from ancient times and is related to the Latin word for lead, \"plumbum\".[1][2]A plumber is a tradesperson who specializes in installing and maintaining systems used for potable (drinking) water, sewage and drainage in plumbing systems. The term dates from ancient times and is related to the Latin word for lead, \"plumbum\".[1][2]','{\"pic\":[\"651552986667.jpeg\"]}',NULL,NULL,NULL,NULL,'2019-03-19 09:10:31','2019-03-19 09:11:13',0,10,0,0),(15,18,6563590248318,'','','{\"available\":\"available\"}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-03-19 09:34:32','2019-03-19 09:35:03',0,10,0,0),(16,20,7849952251215,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-03-19 10:53:41','2019-03-19 10:53:53',0,10,0,0),(17,21,7924731922545,'    ','    ','{\"available\":\"available\"}',NULL,'k-wallpaper-afterglow-blur-1236701.jpg, 4k-wallpaper-agriculture-clouds-842711.jpg, 4k-wallpaper-android-wallpaper-art-325044.jpg, 4k-wallpaper-android-wallpaper-astro-1146134.jpg, 4k-wallpaper-architecture-background-1308624.jpg, 4k-wallpaper-audi-audi-r8-1402787.jpg, 4k-wallpaper-background-beautiful-853199.jpg, 4k-wallpaper-blur-bokeh-1213447.jpg, 4k-wallpaper-calm-waters-dark-1252869.jpg, 41trnBjzshL.png, 41wGEmM0S4L.jpg, 5073.jpg, 5075.jpg, 5077.jpg, 5078.jpg, 5079.jpg, 5080.jpg, 5081.jpg, android-wallpaper-city-dark-248159.jpg, computer-dvd-disk-250x250.png, download.jpeg, download.png, Download-HD-Wallpaper-Paris-Eiffel-Tower-Beutiful-Amazing-Monument-City-WallpapersByte-com-1600x1200.jpg, images.jpeg, images (1).jpeg, Scalebound-4K-Wallpaper.jpg, Scalebound-4K-Wallpaper-1.jpg, Scalebound-4K-Wallpaper-2.jpg, sheldon.jpg, superman.png, Water.jpeg, Water1.jpeg, Water2.jpeg, Water3.jpeg, Water4.jpeg,','{\"pic\":[\"491553248708.jpg\",\"861553248708.jpg\",\"831553248708.jpg\",\"111553248708.jpg\",\"481553248708.jpg\",\"461553248708.jpg\",\"201553248708.jpg\",\"401553248708.jpg\",\"661553248708.jpg\",\"121553248709.png\",\"351553248709.jpg\",\"631553248709.jpg\",\"821553248709.jpg\",\"941553248709.jpg\",\"331553248709.jpg\",\"181553248709.jpg\",\"781553248709.jpg\",\"701553248709.jpg\",\"631553248709.jpg\",\"841553248709.png\"]}',NULL,NULL,NULL,NULL,'2019-03-22 09:49:37','2019-03-26 05:20:25',0,10,1,1),(18,22,5348205618641,'','','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"15:37\",\"monday_to\":\"15:37\",\"tuesday_from\":\"15:37\",\"tuesday_to\":\"15:37\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'Tell your clients about your business, you can also do it by uploading photos/videosTell your clients about your business, you can also do it by uploading photos/videos','{\"pic\":[\"351553249220.jpg\",\"771553249220.jpg\"]}',NULL,NULL,NULL,NULL,'2019-03-22 10:04:24','2019-03-22 10:08:05',0,20,0,0),(19,23,7555816243973,'','','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"15:43\",\"wednesday_to\":\"15:43\",\"thursday_from\":\"15:43\",\"thursday_to\":\"15:43\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'Tell your clients about your business, you can also do it by uploading photos/videosTell your clients about your business, you can also do it by uploading photos/videos','{\"pic\":[\"901553249570.jpeg\",\"computer-dvd-disk-250x250_1269013934.png\"]}',NULL,NULL,NULL,NULL,'2019-03-22 10:09:34','2019-03-22 10:15:12',0,30,0,0),(20,24,5751285447359,'','','{\"available\":\"available\"}',NULL,'Tell your clients about your business, you can also do it by uploading photos/videos','{\"pic\":[\"521553250223.jpg\"]}',NULL,NULL,NULL,NULL,'2019-03-22 10:18:44','2019-03-22 10:23:57',0,60,0,0),(21,25,3821356150095,'','','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"15:56\",\"friday_to\":\"15:56\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,NULL,'{\"pic\":[\"931553250369.jpeg\",\"331553250369.png\",\"Water_1868681764.jpeg\"]}',NULL,NULL,NULL,NULL,'2019-03-22 10:20:46','2019-03-22 10:29:51',0,80,0,0),(22,26,3012405375575,'','','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"16:10\",\"thursday_to\":\"16:10\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'Tell your clients about your business, you can also do it by uploading photos/videosTell your clients about your business, you can also do it by uploading photos/videos','{\"pic\":[\"821553251162.jpg\",\"441553251162.jpg\"]}',NULL,NULL,NULL,NULL,'2019-03-22 10:32:29','2019-03-22 10:40:44',0,100,0,0),(23,27,8935152531156,'    ','    ','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"16:37\",\"wednesday_to\":\"16:37\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'Test for best','{\"pic\":[\"581553252800.jpg\",\"371553252800.jpg\",\"221553252800.jpg\",\"771553252800.jpg\",\"551553252800.jpg\",\"471553252800.jpg\",\"791553252800.jpg\",\"601553252800.jpg\",\"231553252800.jpg\",\"82f3a470b5c14637aaf8e7bc50a86dc7_1023055185.jpg\"]}',NULL,NULL,NULL,NULL,'2019-03-22 10:43:33','2019-03-22 13:15:19',0,10,0,0),(24,28,1536352052335,'  ','  ','{\"sunday_from\":\"\",\"sunday_to\":\"\",\"monday_from\":\"\",\"monday_to\":\"\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"\",\"wednesday_to\":\"\",\"thursday_from\":\"16:42\",\"thursday_to\":\"16:42\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'4k-wallpaper-afterglow-blur-1236701.jpg, download.jpeg, download.png,4k-wallpaper-afterglow-blur-1236701.jpg, download.jpeg, download.png,4k-wallpaper-afterglow-blur-1236701.jpg, download.jpeg, download.png,4k-wallpaper-afterglow-blur-1236701.jpg, download.jpeg, download.png,','{\"pic\":[\"701553253164.jpg\",\"651553253164.jpeg\",\"201553253164.png\",\"sheldon_1179415075.jpg\"]}',NULL,NULL,NULL,NULL,'2019-03-22 11:10:59','2019-03-22 11:14:32',0,50,1,1),(25,29,5153312255553,'    ','    ','{\"sunday_from\":\"16:57\",\"sunday_to\":\"16:57\",\"monday_from\":\"16:57\",\"monday_to\":\"16:57\",\"tuesday_from\":\"16:57\",\"tuesday_to\":\"16:57\",\"wednesday_from\":\"16:57\",\"wednesday_to\":\"16:57\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'','{\"pic\":[\"271553253947.jpg\",\"381553253947.jpg\",\"1001553253947.jpg\",\"691553253947.jpg\",\"161553253947.jpg\",\"901553253948.jpg\",\"371553253948.jpg\"]}',NULL,NULL,NULL,NULL,'2019-03-22 11:23:43','2019-03-22 11:29:03',0,80,0,0),(26,30,5256557917763,'    Are you social? Connect your facebook profile and add your website with your facebook group/page    ','    Are you social? Connect your facebook profile and add your website with your facebook group/page    ','{\"sunday_from\":\"15:15\",\"sunday_to\":\"10:55\",\"monday_from\":\"19:31\",\"monday_to\":\"13:31\",\"tuesday_from\":\"\",\"tuesday_to\":\"\",\"wednesday_from\":\"19:31\",\"wednesday_to\":\"22:31\",\"thursday_from\":\"\",\"thursday_to\":\"\",\"friday_from\":\"\",\"friday_to\":\"\",\"saturday_from\":\"\",\"saturday_to\":\"\"}',NULL,'Tell your clients about your business, you can also do it by uploading photos/videosTell your clients about your business, you can also do it by uploading photos/videosTell your clients about your business, you can also do it by uploading photos/videos','{\"pic\":[\"401553576359.jpg\",\"271553576359.jpg\",\"671553576359.jpg\",\"701553576360.jpg\",\"281553576360.jpg\",\"591553576360.jpg\",\"471553576360.jpg\",\"be6cbd80b141486a901f0b4ce2bf14c1_1490033015.png\"]}',NULL,NULL,NULL,NULL,'2019-03-26 04:58:25','2019-03-26 05:12:21',0,100,0,0);
/*!40000 ALTER TABLE `yp_business_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_selected_services`
--

DROP TABLE IF EXISTS `yp_business_selected_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_selected_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int(10) unsigned NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `service_text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_business_selected_services_business_id_index` (`business_id`),
  KEY `yp_business_selected_services_cat_id_index` (`cat_id`),
  CONSTRAINT `yp_business_selected_services_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `yp_business_selected_services_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `yp_business_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_selected_services`
--

LOCK TABLES `yp_business_selected_services` WRITE;
/*!40000 ALTER TABLE `yp_business_selected_services` DISABLE KEYS */;
INSERT INTO `yp_business_selected_services` VALUES (22,14,14,'Sector 79','2019-03-19 08:04:03','2019-03-19 08:04:03'),(23,14,13,'Sector 66','2019-03-19 08:05:47','2019-03-19 08:05:47'),(24,14,12,'Sector 79','2019-03-19 08:05:50','2019-03-19 08:05:50'),(25,14,12,'Sector 66','2019-03-19 08:05:50','2019-03-19 08:05:50'),(26,14,16,'Sector 79','2019-03-19 08:05:54','2019-03-19 08:05:54'),(27,14,16,'Sector 66','2019-03-19 08:05:54','2019-03-19 08:05:54'),(28,15,13,'Sector 66','2019-03-19 08:09:47','2019-03-19 08:09:47'),(29,15,12,'Sector 79','2019-03-19 08:09:51','2019-03-19 08:09:51'),(30,15,12,'Sector 66','2019-03-19 08:09:51','2019-03-19 08:09:51'),(31,15,14,'Sector 79','2019-03-19 08:09:58','2019-03-19 08:09:58'),(32,15,16,'Sector 79','2019-03-19 08:10:01','2019-03-19 08:10:01'),(33,15,16,'Sector 66','2019-03-19 08:10:02','2019-03-19 08:10:02'),(34,16,16,'Sector 79','2019-03-19 09:06:39','2019-03-19 09:06:39'),(35,16,16,'Sector 66','2019-03-19 09:06:39','2019-03-19 09:06:39'),(36,16,14,'Sector 79','2019-03-19 09:06:44','2019-03-19 09:06:44'),(37,16,13,'Sector 66','2019-03-19 09:06:47','2019-03-19 09:06:47'),(38,16,12,'Sector 79','2019-03-19 09:06:57','2019-03-19 09:06:57'),(39,16,12,'Sector 66','2019-03-19 09:06:57','2019-03-19 09:06:57'),(40,17,12,'Sector 79','2019-03-19 09:10:37','2019-03-19 09:10:37'),(41,17,12,'Sector 66','2019-03-19 09:10:37','2019-03-19 09:10:37'),(42,17,13,'Sector 66','2019-03-19 09:10:43','2019-03-19 09:10:43'),(43,17,14,'Sector 79','2019-03-19 09:10:47','2019-03-19 09:10:47'),(44,17,16,'Sector 79','2019-03-19 09:10:50','2019-03-19 09:10:50'),(45,17,16,'Sector 66','2019-03-19 09:10:50','2019-03-19 09:10:50'),(46,18,14,'Sector 79','2019-03-19 09:34:39','2019-03-19 09:34:39'),(47,20,9,'Sector 43','2019-03-19 10:53:48','2019-03-19 10:53:48'),(48,21,28,'Sector 79','2019-03-22 09:51:37','2019-03-22 09:51:37'),(49,21,16,'Sector 79','2019-03-22 09:51:44','2019-03-22 09:51:44'),(50,21,14,'Sector 79','2019-03-22 09:51:48','2019-03-22 09:51:48'),(51,21,13,'Sector 79','2019-03-22 09:51:52','2019-03-22 09:51:52'),(52,21,12,'Sector 79','2019-03-22 09:51:54','2019-03-22 09:51:54'),(53,22,28,'Sector 66','2019-03-22 10:05:20','2019-03-22 10:05:20'),(54,22,12,'Sector 66','2019-03-22 10:05:47','2019-03-22 10:05:47'),(55,23,13,'Sector 79','2019-03-22 10:09:53','2019-03-22 10:09:53'),(56,23,14,'Sector 79','2019-03-22 10:09:56','2019-03-22 10:09:56'),(57,24,12,'Sector 66','2019-03-22 10:21:03','2019-03-22 10:21:03'),(58,24,13,'Sector 66','2019-03-22 10:21:07','2019-03-22 10:21:07'),(59,24,16,'Sector 66','2019-03-22 10:21:12','2019-03-22 10:21:12'),(60,25,28,'Sector 79','2019-03-22 10:24:38','2019-03-22 10:24:38'),(61,26,16,'Sector 66','2019-03-22 10:38:19','2019-03-22 10:38:19'),(62,26,14,'Sector 66','2019-03-22 10:38:23','2019-03-22 10:38:23'),(63,27,16,'Sector 79','2019-03-22 11:05:30','2019-03-22 11:05:30'),(64,27,14,'Sector 79','2019-03-22 11:05:33','2019-03-22 11:05:33'),(65,27,12,'Sector 79','2019-03-22 11:05:36','2019-03-22 11:05:36'),(66,28,16,'Sector 66','2019-03-22 11:11:21','2019-03-22 11:11:21'),(67,28,28,'Sector 66','2019-03-22 11:11:26','2019-03-22 11:11:26'),(68,29,12,'Sector 79','2019-03-22 11:24:31','2019-03-22 11:24:31'),(69,29,13,'Sector 79','2019-03-22 11:24:48','2019-03-22 11:24:48'),(70,29,28,'Sector 79','2019-03-22 11:24:56','2019-03-22 11:24:56'),(71,30,9,'Sector 22','2019-03-26 04:58:40','2019-03-26 04:58:40'),(72,30,9,'Sector 17','2019-03-26 04:58:40','2019-03-26 04:58:40'),(73,30,9,'Sector 43','2019-03-26 04:58:40','2019-03-26 04:58:40'),(74,30,9,'Sector 20-D','2019-03-26 04:58:40','2019-03-26 04:58:40');
/*!40000 ALTER TABLE `yp_business_selected_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_sub_categories`
--

DROP TABLE IF EXISTS `yp_business_sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_sub_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) unsigned NOT NULL,
  `sub_category_id` bigint(20) NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_business_sub_categories_cat_id_index` (`cat_id`),
  CONSTRAINT `yp_business_sub_categories_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `yp_business_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_sub_categories`
--

LOCK TABLES `yp_business_sub_categories` WRITE;
/*!40000 ALTER TABLE `yp_business_sub_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `yp_business_sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_super_categories`
--

DROP TABLE IF EXISTS `yp_business_super_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_super_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `super_cat_id` int(100) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `category_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `super_cat_id` (`super_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_super_categories`
--

LOCK TABLES `yp_business_super_categories` WRITE;
/*!40000 ALTER TABLE `yp_business_super_categories` DISABLE KEYS */;
INSERT INTO `yp_business_super_categories` VALUES (1,1552658294,'Course',1,'2019-03-15 13:58:14','2019-03-15 13:58:14'),(2,1552658340,'City',1,'2019-03-15 13:59:00','2019-03-15 13:59:00'),(3,1552658364,'Water',1,'2019-03-15 13:59:24','2019-03-15 13:59:24'),(4,1552658830,'Downtown category',1,'2019-03-15 14:07:10','2019-03-15 14:07:10'),(5,1552977025,'design',1,'2019-03-19 06:30:25','2019-03-19 06:30:25'),(6,1552977186,'App',1,'2019-03-19 06:33:06','2019-03-19 06:33:06'),(7,1552977361,'Miscellaneous Helper\'s',1,'2019-03-19 06:36:01','2019-03-19 06:36:01'),(8,1552977607,'Water_Boy',1,'2019-03-19 06:40:07','2019-03-19 06:40:07'),(9,1552979412,'Professionals',1,'2019-03-19 07:10:12','2019-03-19 07:10:12'),(10,1552981222,'Water_Corp',1,'2019-03-19 07:40:22','2019-03-19 07:40:22'),(11,1552981611,'Water_Corp1',1,'2019-03-19 07:46:51','2019-03-19 07:46:51'),(12,1553003098,'Web Development',1,'2019-03-19 13:44:58','2019-03-19 13:44:58'),(13,1553003169,'Mobile',1,'2019-03-19 13:46:09','2019-03-19 13:46:09'),(14,1553072858,'Web dev',1,'2019-03-20 09:07:38','2019-03-20 09:07:38'),(15,1553245858,'Greenland_Properties',1,'2019-03-22 09:10:58','2019-03-22 09:10:58');
/*!40000 ALTER TABLE `yp_business_super_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_user_categories`
--

DROP TABLE IF EXISTS `yp_business_user_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_user_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_userid` int(100) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `quote_with_ph` int(11) NOT NULL DEFAULT '0',
  `quote_without_ph` int(11) NOT NULL DEFAULT '0',
  `accept_request` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sub_category_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `yp_business_user_categories_business_userid_index` (`business_userid`),
  KEY `yp_business_user_categories_category_id_index` (`category_id`),
  CONSTRAINT `yp_business_user_categories_business_userid_foreign` FOREIGN KEY (`business_userid`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `yp_business_user_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `yp_business_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_user_categories`
--

LOCK TABLES `yp_business_user_categories` WRITE;
/*!40000 ALTER TABLE `yp_business_user_categories` DISABLE KEYS */;
INSERT INTO `yp_business_user_categories` VALUES (41,14,14,0,0,0,'2019-03-19 08:03:50','2019-03-19 08:03:50',NULL),(42,14,13,0,0,0,'2019-03-19 08:05:34','2019-03-19 08:05:34',NULL),(43,14,12,0,0,0,'2019-03-19 08:05:48','2019-03-19 08:05:48',NULL),(44,14,16,0,0,0,'2019-03-19 08:05:52','2019-03-19 08:05:52',NULL),(45,15,13,0,0,0,'2019-03-19 08:09:44','2019-03-19 08:09:44',NULL),(46,15,12,0,0,0,'2019-03-19 08:09:49','2019-03-19 08:09:49',NULL),(47,15,14,0,0,0,'2019-03-19 08:09:54','2019-03-19 08:09:54',NULL),(48,15,16,0,0,0,'2019-03-19 08:09:59','2019-03-19 08:09:59',NULL),(49,16,16,0,0,0,'2019-03-19 09:06:37','2019-03-19 09:06:37',NULL),(50,16,14,0,0,0,'2019-03-19 09:06:40','2019-03-19 09:06:40',NULL),(51,16,13,0,0,0,'2019-03-19 09:06:45','2019-03-19 09:06:45',NULL),(53,16,12,0,0,0,'2019-03-19 09:06:55','2019-03-19 09:06:55',NULL),(56,17,12,0,0,0,'2019-03-19 09:10:35','2019-03-19 09:10:35',NULL),(57,17,13,0,0,0,'2019-03-19 09:10:38','2019-03-19 09:10:38',NULL),(58,17,14,0,0,0,'2019-03-19 09:10:45','2019-03-19 09:10:45',NULL),(59,17,16,0,0,0,'2019-03-19 09:10:48','2019-03-19 09:10:48',NULL),(60,18,14,0,0,0,'2019-03-19 09:34:37','2019-03-19 09:34:37',NULL),(61,20,7,0,0,0,'2019-03-19 10:53:44','2019-03-19 10:53:44',NULL),(62,20,9,0,0,0,'2019-03-19 10:53:46','2019-03-19 10:53:46',NULL),(65,21,28,10,10,1,'2019-03-22 09:51:34','2019-03-28 09:41:15',NULL),(66,21,16,7,7,1,'2019-03-22 09:51:42','2019-03-28 09:41:15',NULL),(67,21,14,3,12,1,'2019-03-22 09:51:47','2019-03-28 09:41:15',NULL),(68,21,13,12,6,1,'2019-03-22 09:51:50','2019-03-28 09:41:16',NULL),(69,21,12,6,7,1,'2019-03-22 09:51:52','2019-03-28 09:41:16',NULL),(70,22,28,0,0,0,'2019-03-22 10:05:18','2019-03-22 10:05:18',NULL),(71,22,12,0,0,0,'2019-03-22 10:05:44','2019-03-22 10:05:44',NULL),(72,23,13,0,0,0,'2019-03-22 10:09:43','2019-03-22 10:09:43',NULL),(73,23,14,0,0,0,'2019-03-22 10:09:54','2019-03-22 10:09:54',NULL),(74,24,12,0,0,0,'2019-03-22 10:20:54','2019-03-22 10:20:54',NULL),(75,24,13,0,0,0,'2019-03-22 10:21:05','2019-03-22 10:21:05',NULL),(76,24,16,0,0,0,'2019-03-22 10:21:10','2019-03-22 10:21:10',NULL),(77,25,28,0,0,0,'2019-03-22 10:24:37','2019-03-22 10:24:37',NULL),(78,26,16,0,0,0,'2019-03-22 10:38:06','2019-03-22 10:38:06',NULL),(79,26,14,0,0,0,'2019-03-22 10:38:21','2019-03-22 10:38:21',NULL),(80,27,16,0,0,0,'2019-03-22 11:05:28','2019-03-22 11:05:28',NULL),(82,27,12,0,0,0,'2019-03-22 11:05:34','2019-03-22 11:05:34',NULL),(83,28,16,0,0,0,'2019-03-22 11:11:04','2019-03-22 11:11:04',NULL),(84,28,28,0,0,0,'2019-03-22 11:11:23','2019-03-22 11:11:23',NULL),(85,29,12,0,0,0,'2019-03-22 11:24:30','2019-03-22 11:24:30',NULL),(86,29,13,0,0,0,'2019-03-22 11:24:46','2019-03-22 11:24:46',NULL),(87,29,28,0,0,0,'2019-03-22 11:24:54','2019-03-22 11:24:54',NULL),(88,30,9,0,0,0,'2019-03-26 04:58:37','2019-03-26 04:58:37',NULL);
/*!40000 ALTER TABLE `yp_business_user_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_user_cc_details`
--

DROP TABLE IF EXISTS `yp_business_user_cc_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_user_cc_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_id` int(10) unsigned NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `wallet_amount` int(11) NOT NULL,
  `lastdigit` int(11) NOT NULL,
  `expire_month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_year` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_added_on` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_business_user_cc_details_b_id_foreign` (`b_id`),
  CONSTRAINT `yp_business_user_cc_details_b_id_foreign` FOREIGN KEY (`b_id`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_user_cc_details`
--

LOCK TABLES `yp_business_user_cc_details` WRITE;
/*!40000 ALTER TABLE `yp_business_user_cc_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `yp_business_user_cc_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_user_hashtags`
--

DROP TABLE IF EXISTS `yp_business_user_hashtags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_user_hashtags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_userid` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `yp_business_user_hashtags_business_userid_foreign` (`business_userid`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `yp_business_user_hashtags_business_userid_foreign` FOREIGN KEY (`business_userid`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `yp_business_user_hashtags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `yp_hashtag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_user_hashtags`
--

LOCK TABLES `yp_business_user_hashtags` WRITE;
/*!40000 ALTER TABLE `yp_business_user_hashtags` DISABLE KEYS */;
INSERT INTO `yp_business_user_hashtags` VALUES (16,4,3),(17,4,6),(18,4,8),(19,5,9),(20,6,1),(21,6,5),(22,6,9),(23,7,5),(24,7,8),(25,9,4),(26,9,7),(36,17,13),(37,18,10),(41,14,10),(44,15,11),(47,16,12),(49,22,2),(50,22,3),(51,23,6),(52,23,7),(53,23,11),(54,24,1),(55,24,2),(56,24,3),(57,24,4),(58,24,5),(59,24,6),(60,24,7),(61,24,8),(62,24,9),(63,24,10),(64,24,11),(65,24,12),(66,24,13),(67,25,2),(68,25,3),(69,26,3),(74,28,11),(75,28,12),(76,28,13),(81,29,1),(82,29,6),(84,27,9),(139,30,1),(140,30,2),(141,30,3),(142,30,4),(143,30,5),(144,30,6),(145,30,7),(146,30,8),(147,30,9),(148,30,10),(149,30,11),(150,30,12),(151,30,13),(152,21,1),(153,21,2);
/*!40000 ALTER TABLE `yp_business_user_hashtags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_user_quote_templates`
--

DROP TABLE IF EXISTS `yp_business_user_quote_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_user_quote_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int(10) unsigned NOT NULL,
  `template_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_business_user_quote_templates_business_userid_index` (`business_id`),
  CONSTRAINT `yp_business_user_quote_templates_business_userid_foreign` FOREIGN KEY (`business_id`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_user_quote_templates`
--

LOCK TABLES `yp_business_user_quote_templates` WRITE;
/*!40000 ALTER TABLE `yp_business_user_quote_templates` DISABLE KEYS */;
INSERT INTO `yp_business_user_quote_templates` VALUES (1,26,'template one','this is template text','2019-03-27 13:06:34','2019-03-27 13:06:34'),(2,26,'second','second template','2019-03-27 13:11:45','2019-03-27 13:11:45'),(3,26,'third','third template','2019-03-27 13:14:47','2019-03-27 13:14:47');
/*!40000 ALTER TABLE `yp_business_user_quote_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_user_quotes_reply`
--

DROP TABLE IF EXISTS `yp_business_user_quotes_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_user_quotes_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int(10) unsigned NOT NULL,
  `quote_id` int(10) unsigned NOT NULL,
  `price_quotes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `templates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_files` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_business_user_quotes_reply_business_userid_index` (`business_id`),
  KEY `yp_business_user_quotes_reply_quote_id_index` (`quote_id`),
  CONSTRAINT `yp_business_user_quotes_reply_business_userid_foreign` FOREIGN KEY (`business_id`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `yp_business_user_quotes_reply_ibfk_1` FOREIGN KEY (`quote_id`) REFERENCES `yp_general_users_quotes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_user_quotes_reply`
--

LOCK TABLES `yp_business_user_quotes_reply` WRITE;
/*!40000 ALTER TABLE `yp_business_user_quotes_reply` DISABLE KEYS */;
INSERT INTO `yp_business_user_quotes_reply` VALUES (1,26,1,'1000','1',NULL,'okay we will do it. this is not a new task for us.','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\"]}','2019-03-27 11:02:28','2019-03-27 11:02:28'),(2,26,2,'20000','1',NULL,'yesall quotesall quotesallqu otesallquo tesallquotes allquotesallquotesallquotesallquo tesallquotes allquotesallq uotesallquote sallquotesallquotesallquotesallquotesallquot es','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\",\"971553687756.jpg\"]}','2019-03-27 11:55:56','2019-03-27 11:57:59'),(3,24,4,'4321','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"681553750525.jpg\"]}','2019-03-28 05:22:05','2019-03-28 05:22:05'),(4,26,3,'5432','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\",\"421553750536.jpg\"]}','2019-03-28 05:22:16','2019-03-28 05:22:16'),(5,26,4,'4321','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\",\"911553750559.jpg\"]}','2019-03-28 05:22:39','2019-03-28 05:22:39'),(6,21,5,'1234','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"101553752334.jpg\"]}','2019-03-28 05:52:14','2019-03-28 05:52:14'),(7,24,5,'4321','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"681553750525.jpg\",\"381553752365.jpeg\"]}','2019-03-28 05:52:45','2019-03-28 05:52:45'),(8,26,5,'1256','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\",\"201553752385.jpg\"]}','2019-03-28 05:53:05','2019-03-28 05:53:05'),(9,24,6,'9876543','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos',NULL,'2019-03-28 06:17:42','2019-03-28 06:17:42'),(10,26,6,'5423','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\",\"771553753910.jpg\"]}','2019-03-28 06:18:30','2019-03-28 06:18:30'),(11,26,7,'3434343','1',NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',NULL,'2019-03-28 06:30:34','2019-03-28 06:30:34'),(12,26,8,'8765432','1',NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\",\"be6cbd80b141486a901f0b4ce2bf14c1_778223804.png\"]}','2019-03-28 06:34:14','2019-03-28 06:34:14'),(13,26,9,'4','1',NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',NULL,'2019-03-28 06:39:57','2019-03-28 06:39:57'),(14,24,11,'5432123','1',NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A','{\"pic\":[\"681553750525.jpg\",\"251553755841.jpg\"]}','2019-03-28 06:50:41','2019-03-28 06:50:42'),(15,24,12,'1212121','1',NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',NULL,'2019-03-28 06:58:37','2019-03-28 06:58:37'),(16,26,10,'34','1',NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\",\"891553756466.jpg\"]}','2019-03-28 07:01:06','2019-03-28 07:01:06'),(17,26,13,'4343434','1',NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\",\"511553757462.jpeg\"]}','2019-03-28 07:17:41','2019-03-28 07:17:42'),(18,26,14,'318','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"191553758800.png\",\"161553758800.jpeg\",\"981553758800.jpeg\",\"691553758800.jpeg\",\"681553758800.jpeg\",\"111553758801.jpeg\",\"841553758801.jpeg\",\"981553758801.jpeg\",\"211553758801.jpeg\",\"271553758801.jpg\",\"351553758801.png\",\"751553758801.jpg\",\"471553758801.jpeg\",\"401553758801.png\",\"781553758801.jpg\",\"551553758801.png\",\"101553758801.jpg\",\"961553758801.png\",\"271553758801.jpg\",\"341553758801.jpg\"]}','2019-03-28 07:21:02','2019-03-28 07:40:01'),(19,26,15,'1212121','1',NULL,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"511553684548.jpeg\",\"501553684548.jpg\",\"0bfe1182dabb4464a6fd977c06f8d32e_1538835945.png\"]}','2019-03-28 07:23:15','2019-03-28 07:23:17');
/*!40000 ALTER TABLE `yp_business_user_quotes_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_user_transactions`
--

DROP TABLE IF EXISTS `yp_business_user_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_user_transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `trans_id` bigint(20) NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_id` int(10) unsigned NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `transaction_made_on` date NOT NULL,
  `type` int(11) NOT NULL,
  `amonut` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_business_user_transactions_b_id_index` (`b_id`),
  KEY `yp_business_user_transactions_cat_id_index` (`cat_id`),
  CONSTRAINT `yp_business_user_transactions_b_id_foreign` FOREIGN KEY (`b_id`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_user_transactions`
--

LOCK TABLES `yp_business_user_transactions` WRITE;
/*!40000 ALTER TABLE `yp_business_user_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `yp_business_user_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_users`
--

DROP TABLE IF EXISTS `yp_business_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_userid` bigint(20) NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed_steps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_approve` tinyint(4) NOT NULL DEFAULT '1',
  `fp_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertise_mode` int(11) NOT NULL DEFAULT '0' COMMENT '0=>free mode,1=>pro mode',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `yp_business_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_users`
--

LOCK TABLES `yp_business_users` WRITE;
/*!40000 ALTER TABLE `yp_business_users` DISABLE KEYS */;
INSERT INTO `yp_business_users` VALUES (1,2713965052578,'IT','Des','Raj','desraj.c@iapptechnologies.com','$2y$10$AcDJ5pYfXQo6WJaOXILEUOE2MawixxgURWQ8kBwzysgOJDYY8gTHK','546565644154','Mohali, Punjab, India','76.71787259999999','30.7046486',NULL,NULL,'4',1,NULL,0,'2019-03-15 14:15:02','2019-03-15 15:01:15'),(4,68015592665,'WebDev','Shawn','michel','iapptest22@yahoo.com','$2y$10$PkcF8UZ34W0rZPkNCerl7uMo.l2KZJtX4YyiCgmoYw6dvqE8miL36','7412589630','Sector 67, Mohali, Punjab, India','76.72932329999999','30.67928239999999',NULL,'8HH8FwmwzPd4L1mRoclqmSZ1rolIwQ7mqmHXem27k96Twl0goEsgM3J8742X','7',1,NULL,0,'2019-03-15 14:40:06','2019-03-18 05:57:31'),(5,9651461863152,'Party_phase11','Manoj','Dogra','developers.iapp@outlook.com','$2y$10$obScqQfd953KLRxTxZ01CuwVQFB2heBGuAFdOlrMSCTAwiFhtaugG','7410258963','Phase 11, Sector 65, Sahibzada Ajit Singh Nagar, Punjab, India','76.7466378','30.6810732',NULL,'ODrgR0nvPJTNNEn7NebiMtj9jlJV0x7He72YjRb4mLsyUSBTpudJepOnxLwM','7',1,NULL,0,'2019-03-15 14:45:43','2019-03-15 15:01:08'),(6,5196324352611,'WebDev1','Manoj','Singhaa','developer.iapptechnologies@gmail.com','$2y$10$b.ydtsDJTtRz6yt40.NMXeZVxS8xHcNKRD9e0TBq2F/j6qOCHZC2.','7412589630','Sector 71, Sahibzada Ajit Singh Nagar, Punjab, India','76.7182478','30.7312394',NULL,'NWOd1b52fFXh6hlBOI8CFTgMVIO2EIezhOzhLLd3YqfPt21EJRXvo6lFizM3','7',1,'Iu8VN32s4uUezxk6',0,'2019-03-15 14:49:09','2019-03-26 06:00:55'),(7,2658681157151,'GMX','gM','Mx','developers.iapp@gmx.com','$2y$10$zaxo.PCk4WO2qxdfX7aVpOoNgHHvjj28JSMY1Wvm.NlRg5LiOOZYu','1234567890','Sector 71, Mohali, Punjab, India','76.7182478','30.7312394',NULL,'p8RKJOoPAXgspiAv55WDdGGhXBAMwU1E3dbF5SnRE4k1f28AFsGuB2AEOaFw','7',1,NULL,0,'2019-03-15 14:53:07','2019-03-15 15:01:04'),(8,6626174151305,'Courier_Service','RedIf','mail','developers.iapp@rediffmail.com','$2y$10$oYEhLR86.FKdrgeHHAOp/u.7BzWwxKheA2E1NStooJeAEuNjdRyZ6','7412589630','sector 67','-89.345557','43.098216',NULL,NULL,'1',1,NULL,0,'2019-03-15 14:55:40','2019-03-15 15:01:00'),(9,4641388561528,'Courier_Service','RedIf','mail','manojdograaa@gmail.com','$2y$10$pjsJmQmWHpNmtPAdl8359uLbMHEQ.kE6v0WaS4Fcc/9NXu5K5daJK','7412589630','Sector 67, Mohali, Punjab, India','76.72932329999999','30.67928239999999',NULL,'gBxODxshj1GesJ3QuZTRDkxEZ2Wg8bl4Pm22eoe1ufd76kacxOLqjsAr8A9y','7',1,NULL,0,'2019-03-15 14:57:28','2019-03-18 10:42:21'),(11,8952668807561,'asdasd','dasd','Singh','developer.ias@gmail.com','$2y$10$8rhjNdqLSYPFzYVnm/xtq.7xPMDUwDnLISW27NbBl6hIJUQfGk8di','07696633264','Moghalrajpuram, Labbipet, Vijayawada, Andhra Pradesh, India','80.6414837','16.5060235',NULL,NULL,'2',0,NULL,0,'2019-03-18 05:23:28','2019-03-18 05:24:26'),(12,7516881815204,'asdasd','asdasd','asdasd','es@gmail.com','$2y$10$zaUQlhYUezFIYskP8nda3u474mvaeoC.SWhsWzqa.BM.xbUiOWPCe','07696633264','Mohali Bypass, Phase 11, Sector 65, Sahibzada Ajit Singh Nagar, Punjab, India','76.7399384','30.678252',NULL,NULL,'1',0,NULL,0,'2019-03-18 05:25:19','2019-03-18 05:25:19'),(13,8671279558868,'Test','Man','Man','logies@gmail.com','$2y$10$fxy1HAcT4M6aHVpnqMdgk.gRmceLD.E/PwJAv3W6sHeoEtu6ZePdS','07696633264','Morinda, Punjab, India','76.4996831','30.7892586',NULL,'jVVKWiDDVPRtFerzc8n3uUYgwhuqWHxU6fIZQkkJDR2qRTnplhaDCbwvf2KK','1',1,NULL,0,'2019-03-18 05:26:28','2019-03-18 05:28:10'),(14,6420595715882,'Tea_Stall','Manoj','Dogra','manoj.k@iapptechnologies.com','$2y$10$T2/h0VlXtfaUCyu4qQvDM.eaZzNhP8zO1x0eSq3JXsuYNWstopvhK','07412589630','Aroma Chowk Sector 21/22, 22C, Sector 22, Chandigarh','76.7736749','30.7301055','','4gdKL4tiPHsZzwhgU5DQB5G0kwISKZ3w4E2l1lL8AiiyV1yEBU4oRrXYPPRh','7',1,'',0,'2019-03-19 06:27:22','2019-03-20 09:30:12'),(15,5199527968526,'Baby_Sitting','MJ','DJ','redminote5pro4321@gmail.com','$2y$10$6fcDBc9Ua8GkhAUbHZ3SUOE9HlXZK.gKCHXf/2mUbK3pIj7CryHgC','7412589630','Kurukshetra University Thanesar, Haryana, India','76.8173138','29.9564963','1552992011.jpg','zD3CJVHn4xaxOaKpnrbfVbT4W5SqKTPteubXhaJprRH4QEmsVRiAo6yePe9S','7',1,'',0,'2019-03-19 08:09:25','2019-03-19 10:47:48'),(16,4551559266388,'Plumber_InCity','Under','Taker','amudasir355@gmx.com','$2y$10$z8vNDt1Zw3E5SwtqYwteP.b7zIAj8ATjygzdbIbk24nPVky2eMpHq','1234567809','9d, Madhya Marg Sector 8C, Sector 9, Chandigarh','76.7978564','30.7332665','1552992623.jpg','tMcNBWhAIk0v6lCePFsEK5qcaO2ZJTRFPqb18a6j2iFFdhgNtYBAZeVpcGxm','7',1,'',0,'2019-03-19 09:06:25','2019-03-26 06:24:14'),(17,1281655939846,'Electrician_Schenider','MJ','Dogra','testing.iapp001@gmail.com','$2y$10$6.PY/Wd0hITd/Ik1Lpx.R.yuhd8wSzHCPLwwzHfrM6pi9/u2bEXVu','07412589630','Sector 67, Mohali, Punjab, India','76.72932329999999','30.67928239999999',NULL,NULL,'7',1,'',0,'2019-03-19 09:10:19','2019-03-19 09:52:45'),(18,6563590248318,'Cleaner 79','MJ','Dogra','amudasir355@aol.com','$2y$10$wh20y9z4Vb8DL.rOkd.MWOAg4YHMW795qFY96UKTtAy6r/e3Eqs8i','07412589630','Sector 69, Mohali, Punjab, India','76.7206652','30.692499',NULL,'s65nYqCBoGr4p2eZ4ACxYXE3F0SnhFjDH8jgJooxQWP7HyoQ8cVMR3wiq3rI','7',1,'',0,'2019-03-19 09:34:23','2019-03-19 09:52:44'),(19,3557529799891,'asdas','ad','asd','asdasd@asdasd.fgh','$2y$10$8hs84FiltxiYbit2HOrpR.siQqE1PVWDF3pooANdIIWUok694z4tG','343434343434','Mohali Railway Station Road, Sector 62, Sahibzada Ajit Singh Nagar, Punjab, India','76.72605039999999','30.6949406',NULL,NULL,'1',1,NULL,0,'2019-03-19 09:56:19','2019-03-19 09:56:19'),(20,7849952251215,'Cricket','Ricky','Ponting','ricky@gmail.com','$2y$10$NMlk6QdAqxV7ALn8Cn5f3OIatSf9FimBW2cVzt07mZpWarug/2672','9896554556','Sydney NSW, Australia','151.2092955','-33.8688197',NULL,NULL,'4',1,NULL,0,'2019-03-19 10:53:32','2019-03-19 10:53:53'),(21,7924731922545,'Woodland','Sector_79','Mohali','dev1@iapptechnologies.com','$2y$10$CMTlAfhvag/kXGaRRYO.zuNxsoQhC/1WIyYQByDrFFHzV.jckH60u','7412589630','Aroma Chowk Sector 21/22, 22C, Sector 22, Chandigarh','76.7736749','30.7301055','1553577625.png','OtTKcpbbXV3YfNRyiKNfJ7HoI4cCpSrPOGRxAfixUatsQtRX4ApXbTJB2HHk','7',1,NULL,0,'2019-03-22 09:45:47','2019-03-28 07:44:40'),(22,5348205618641,'Nike','Sector_66','Mohali','dev2@iapptechnologies.com','$2y$10$mHErXvhMqU07mdi9/YqbDuhLD1kYnv8kr5BlRNXZHp8bIPCnqtrna','7412589630','Sector 8, Chandigarh, India','76.7985669','30.7400589',NULL,'XyEIjY1wnl4oNhfGWTfFhI5zjp6r89R4UiwqNyETJMhNMcX8AeXH5sr2w8rW','7',1,NULL,0,'2019-03-22 09:49:24','2019-03-28 05:16:21'),(23,7555816243973,'addidas','MJ_addidas','Dogra','dev3@iapptechnologies.com','$2y$10$ZVhS.HnnrNgeX67Ue/f5rua2zasZyRwyf/FkNfKkFQ3zzmzcTQi1y','7412589630','Bengaluru, Karnataka, India','77.5945627','12.9715987',NULL,'cwQwkapM10iLKXNbancLMKdWMrJBvg4ClFZNaZ28sClwNPIZfwlmqK8qBQSy','7',1,NULL,0,'2019-03-22 10:09:27','2019-03-28 05:16:25'),(24,5751285447359,'Caterpiller','Sector_66','Dogra','dev4@iapptechnologies.com','$2y$10$bCt34uLGkkQ8Y768UL6XTO1pvjCUpeAozj0sUyC97bcTQSEEmnza6','741258963','North Country Mall Road, Sector 117, Sahibzada Ajit Singh Nagar, Punjab, India','76.6787822','30.738992',NULL,'zr4BEo5cg1zjdFn0PoTCPWWiZuN4bcVY9wUFu5JJdm6x81H658RSOkJKlZvL','7',1,NULL,0,'2019-03-22 10:15:58','2019-03-22 10:24:01'),(25,3821356150095,'Timberland','Sector_79','Dogra','dev5@iapptechnologies.com','$2y$10$uImXgKOW2paXO4f5pYrT7Owo4p6Urkpwxhm.iI3vm0bnxSahAOOYe','7410258963','Rose Garden Road, Phase 3B-1, Sector 60, Sahibzada Ajit Singh Nagar, Chandigarh, Punjab, India','76.72268079999999','30.713544',NULL,'odWMLLWnF9CPySWfBKwLu8eLPHOdTNe0P06SoO7jeiJSgKtA9MxSRGZvCUUR','7',1,NULL,0,'2019-03-22 10:20:38','2019-03-22 10:29:55'),(26,3012405375575,'Kalonji','Sector_66','Mohali','dev6@iapptechnologies.com','$2y$10$MPilWS1GOfYUfif1OFXxPuxZKW/HV6TwXTYlJtSMNBkjKYhRM3fvi','7410258963','Paras Down Town Square mall, Green Enclave Road, Badal Colony, Zirakpur, Punjab, India','76.8166378','30.6479185',NULL,'KlTcy8TBIa5sksJA1cTutHDmKkhwScoAIJf0fujQq3zUnuwd1E4pCRkjzxkd','7',1,NULL,0,'2019-03-22 10:32:10','2019-03-22 10:40:48'),(27,8935152531156,'Reebok','Sector_79','Dogra','dev7@iapptechnologies.com','$2y$10$9k/HoyyFGKD7I3IykJ4Qh.3hFTv2qb0Y2uAW5eJlr5xZ3mQflH/yW','7410258963',' HaPalmach St 1, Jerusalem, Israel','35.2136561','31.7683417','1553260519.png','dkYZTDWH0ei1IT80q5x3PiW0KFfXonvIHtIQoEkm2HQJSOL6e5KVUEvHxJoL','7',1,NULL,0,'2019-03-22 10:42:36','2019-03-22 13:51:13'),(28,1536352052335,'Daft_Punk','Sector_66','Dogra','dev8@iapptechnologies.com','$2y$10$e591NyzI594BMO3pTbg7Juq6pX9MLpFhNCJoAVVc2WLUUCKBYBQZm','7410258963','Anandpur Sahib, Punjab, India','76.5054652','31.2344015','1553253272.jpg','uQNliJLDemCArolx4eF3DAr751eDnmphVdkoamByuZF5gB4wxkOErlyyjD3H','7',1,NULL,0,'2019-03-22 11:10:35','2019-03-22 11:14:53'),(29,5153312255553,'Migos','Migos_Sector_79','Mohali','dev9@iapptechnologies.com','$2y$10$cljx5wg3LroXlqGAraa4AOdlHyBzP8SW/DzXEHwfvxab/VGSSx44q','7410258963','3b2, Mohali Bypass, Phase 3B-2, Sector 60, Sahibzada Ajit Singh Nagar, Punjab, India','76.7170519','30.7061107','1553254143.png','i9x7baZ0SGgZiZBCRn4XOaNzjN4aN5oPdynXYOY3jZKinxIFlZx53bAQw5jB','7',1,NULL,0,'2019-03-22 11:15:55','2019-03-22 12:20:58'),(30,5256557917763,'Qaswe','Man','Man','qa@qa.qa','$2y$10$WX3VW7AqMD.8NlZ7wu3sjeUpwl7xiXdIczMpzk6K5o4LYvN7Z9q3q','4545454545','Delhi Cantonment, New Delhi, Delhi, India','77.1587375','28.5961279','1553577141.jpeg','lCKYphPdgndWvsc0Gc9Q0F5L2RVM0GAcWFktXXwIyppMi5Fe9sD2RsqSXERw','7',1,NULL,0,'2019-03-26 04:58:15','2019-03-26 05:13:45');
/*!40000 ALTER TABLE `yp_business_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_business_users_quotes`
--

DROP TABLE IF EXISTS `yp_business_users_quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_business_users_quotes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int(10) unsigned NOT NULL,
  `general_id` int(10) unsigned NOT NULL,
  `quote_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>cancelled, 1=>new, 2=>Read, 3=>Quoted, 4=>Accepted, 5=>Rejected/Ignored, 6=>Completed',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_business_users_quotes_business_userid_index` (`business_id`),
  KEY `yp_business_users_quotes_general_userid_index` (`general_id`),
  KEY `yp_business_users_quotes_quote_id_index` (`quote_id`),
  KEY `business_userid` (`business_id`),
  KEY `general_userid` (`general_id`),
  KEY `quote_id` (`quote_id`),
  CONSTRAINT `yp_business_users_quotes_business_userid_foreign` FOREIGN KEY (`business_id`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `yp_business_users_quotes_general_userid_foreign` FOREIGN KEY (`general_id`) REFERENCES `yp_general_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `yp_business_users_quotes_ibfk_1` FOREIGN KEY (`quote_id`) REFERENCES `yp_general_users_quotes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_business_users_quotes`
--

LOCK TABLES `yp_business_users_quotes` WRITE;
/*!40000 ALTER TABLE `yp_business_users_quotes` DISABLE KEYS */;
INSERT INTO `yp_business_users_quotes` VALUES (1,26,1,1,6,'2019-03-27 10:59:08','2019-03-27 11:09:21'),(2,26,1,2,4,'2019-03-27 11:54:52','2019-03-27 11:56:24'),(3,26,1,3,3,'2019-03-27 12:14:14','2019-03-28 05:22:16'),(4,26,5,4,4,'2019-03-28 05:11:09','2019-03-28 05:47:29'),(5,24,5,4,3,'2019-03-28 05:11:09','2019-03-28 05:22:06'),(6,17,5,4,1,'2019-03-28 05:11:09','2019-03-28 05:11:09'),(7,14,5,4,1,'2019-03-28 05:11:09','2019-03-28 05:11:09'),(8,15,5,4,1,'2019-03-28 05:11:09','2019-03-28 05:11:09'),(9,26,5,5,6,'2019-03-28 05:49:57','2019-03-28 05:56:40'),(10,24,5,5,3,'2019-03-28 05:49:57','2019-03-28 05:52:45'),(11,21,5,5,3,'2019-03-28 05:49:57','2019-03-28 05:52:14'),(12,26,5,6,4,'2019-03-28 06:14:46','2019-03-28 06:22:22'),(13,24,5,6,3,'2019-03-28 06:14:46','2019-03-28 06:17:42'),(14,15,5,6,1,'2019-03-28 06:14:46','2019-03-28 06:14:46'),(15,28,5,6,1,'2019-03-28 06:14:46','2019-03-28 06:14:46'),(16,14,5,6,1,'2019-03-28 06:14:46','2019-03-28 06:14:46'),(17,26,5,7,5,'2019-03-28 06:29:51','2019-03-28 06:32:27'),(18,26,5,8,6,'2019-03-28 06:33:15','2019-03-28 06:36:50'),(19,26,5,9,6,'2019-03-28 06:39:36','2019-03-28 06:45:19'),(20,26,5,10,6,'2019-03-28 06:46:18','2019-03-28 07:07:43'),(21,24,5,11,6,'2019-03-28 06:48:11','2019-03-28 06:52:55'),(22,24,5,12,6,'2019-03-28 06:56:25','2019-03-28 07:08:14'),(23,26,5,13,4,'2019-03-28 07:14:46','2019-03-28 07:18:27'),(24,24,5,13,1,'2019-03-28 07:14:46','2019-03-28 07:14:46'),(25,26,5,14,6,'2019-03-28 07:15:59','2019-03-28 07:54:34'),(26,26,5,15,6,'2019-03-28 07:22:31','2019-03-28 07:54:50');
/*!40000 ALTER TABLE `yp_business_users_quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_form_questions`
--

DROP TABLE IF EXISTS `yp_form_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_form_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formid` varchar(100) NOT NULL,
  `cat_id` int(10) unsigned NOT NULL,
  `qid` varchar(150) NOT NULL,
  `type` varchar(50) NOT NULL,
  `required` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=>required,0=>not required',
  `filter` int(11) NOT NULL DEFAULT '0',
  `options` text,
  `title` varchar(200) NOT NULL,
  `placeholder` varchar(200) DEFAULT NULL,
  `description` text,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `qid` (`qid`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `yp_form_questions_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `yp_business_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_form_questions`
--

LOCK TABLES `yp_form_questions` WRITE;
/*!40000 ALTER TABLE `yp_form_questions` DISABLE KEYS */;
INSERT INTO `yp_form_questions` VALUES (16,'f_1552977083',9,'q_103108','textbox',1,0,NULL,'Enter Your Name ?',NULL,NULL,NULL,NULL,'2019-03-19 06:31:23','2019-03-19 06:31:23'),(17,'f_1552977083',9,'q_104353','checkbox',1,0,'[{\"option_name\":\"Chips\",\"option_value\":\"1\"},{\"option_name\":\"Smaosa\'s\",\"option_value\":\"2\"},{\"option_name\":\"Burger\",\"option_value\":\"3\"},{\"option_name\":\"Spring Roll\",\"option_value\":\"4\"},{\"option_name\":\"Egg roll\",\"option_value\":\"5\"},{\"option_name\":\"Meat roll\",\"option_value\":\"6\"},{\"option_name\":\"Paneer roll\",\"option_value\":\"7\"},{\"option_name\":\"chapati roll\",\"option_value\":\"8\"},{\"option_name\":\"Dosa\",\"option_value\":\"9\"}]','What eatable\'s you want to select ?',NULL,NULL,NULL,NULL,'2019-03-19 06:31:23','2019-03-19 06:31:23'),(18,'f_1552977083',9,'q_100034','checkbox',1,1,'[{\"option_name\":\"Sector 22\",\"option_value\":\"1\"},{\"option_name\":\"Sector 17\",\"option_value\":\"2\"},{\"option_name\":\"Sector 43\",\"option_value\":\"3\"},{\"option_name\":\"Sector 20-D\",\"option_value\":\"4\"}]','Select place you want to visit',NULL,NULL,NULL,NULL,'2019-03-19 06:31:23','2019-03-19 06:31:23'),(40,'f_1552981988',14,'q_104498','radio',1,1,'[{\"option_name\":\"Sector 79\",\"option_value\":\"1\"},{\"option_name\":\"Sector 66\",\"option_value\":\"2\"}]','Select Sector in Mohali ?',NULL,NULL,NULL,NULL,'2019-03-19 07:53:08','2019-03-19 07:53:08'),(41,'f_1552981988',14,'q_108167','dropdown',1,0,'[{\"option_name\":\"1\",\"option_value\":\"1\"},{\"option_name\":\"2\",\"option_value\":\"2\"},{\"option_name\":\"3\",\"option_value\":\"3\"},{\"option_name\":\"4\",\"option_value\":\"4\"}]','Select number of helper\'s required',NULL,NULL,NULL,NULL,'2019-03-19 07:53:08','2019-03-19 07:53:08'),(42,'f_1552981988',14,'q_107633','textbox',1,0,NULL,'Enter Landmark of the area ?',NULL,NULL,NULL,NULL,'2019-03-19 07:53:08','2019-03-19 07:53:08'),(43,'f_1552981988',14,'q_100045','checkbox',1,0,'[{\"option_name\":\"Room\",\"option_value\":\"1\"},{\"option_name\":\"Walls\",\"option_value\":\"2\"},{\"option_name\":\"Carpets\",\"option_value\":\"3\"},{\"option_name\":\"Wndows\",\"option_value\":\"4\"}]','Cleaning Area ?',NULL,NULL,NULL,NULL,'2019-03-19 07:53:08','2019-03-19 07:53:08'),(46,'f_1552982296',16,'q_106405','checkbox',1,1,'[{\"option_name\":\"Sector 79\",\"option_value\":\"1\"},{\"option_name\":\"Sector 66\",\"option_value\":\"2\"}]','Select Sector in Mohali ?',NULL,NULL,NULL,NULL,'2019-03-19 07:58:16','2019-03-19 07:58:16'),(47,'f_1552982296',16,'q_100786','textbox',0,0,NULL,'Enter LandMaRK',NULL,NULL,NULL,NULL,'2019-03-19 07:58:16','2019-03-19 07:58:16'),(48,'f_1552982296',16,'q_108566','checkbox',1,0,'[{\"option_name\":\"Tap\",\"option_value\":\"q\"},{\"option_name\":\"Pipe\",\"option_value\":\"w\"},{\"option_name\":\"Bathroom Pipe\",\"option_value\":\"e\"},{\"option_name\":\"Kitchen washbasin\",\"option_value\":\"r\"}]','Select that you want to fix ?',NULL,NULL,NULL,NULL,'2019-03-19 07:58:16','2019-03-19 07:58:16'),(49,'f_1552982417',12,'q_104329','checkbox',1,1,'[{\"option_name\":\"Sector 79\",\"option_value\":\"1\"},{\"option_name\":\"Sector 66\",\"option_value\":\"2\"}]','Select Service in Mohali ?',NULL,NULL,NULL,NULL,'2019-03-19 08:00:17','2019-03-19 08:00:17'),(50,'f_1552982417',12,'q_108620','textbox',0,0,NULL,'Enter Landmark',NULL,NULL,NULL,NULL,'2019-03-19 08:00:17','2019-03-19 08:00:17'),(51,'f_1552982417',12,'q_103995','radio',1,0,'[{\"option_name\":\"3 Phase connection\",\"option_value\":\"1\"},{\"option_name\":\"2 Phase connection\",\"option_value\":\"2\"}]','Type of connection you want to fix ?',NULL,NULL,NULL,NULL,'2019-03-19 08:00:17','2019-03-19 08:00:17'),(52,'f_1552982564',13,'q_100202','radio',1,1,'{\"0\":{\"option_name\":\"Sector 79\",\"option_value\":\"1\"},\"3\":{\"option_name\":\"Sector 66\",\"option_value\":\"3\"}}','Select Baby sitting in OutSkirts of Mohali ?',NULL,NULL,NULL,NULL,'2019-03-19 08:02:44','2019-03-19 08:02:44'),(53,'f_1552982564',13,'q_105893','textbox',0,0,NULL,'Enter Landmark',NULL,NULL,NULL,NULL,'2019-03-19 08:02:44','2019-03-19 08:02:44'),(54,'f_1552982564',13,'q_106603','radio',0,0,'[{\"option_name\":\"1-3\",\"option_value\":\"1\"},{\"option_name\":\"3-5\",\"option_value\":\"2\"},{\"option_name\":\"5-7\",\"option_value\":\"3\"},{\"option_name\":\"7-9\",\"option_value\":\"4\"}]','Select age group of child ?',NULL,NULL,NULL,NULL,'2019-03-19 08:02:44','2019-03-19 08:02:44'),(55,'f_1552982564',13,'q_102209','dropdown',0,0,'[{\"option_name\":\"Male\",\"option_value\":\"1\"},{\"option_name\":\"Femalee\",\"option_value\":\"2\"}]','Child gender ?',NULL,NULL,NULL,NULL,'2019-03-19 08:02:44','2019-03-19 08:02:44'),(56,'f_1553248262',28,'q_107694','radio',0,1,'[{\"option_name\":\"Sector 79\",\"option_value\":\"2\"},{\"option_name\":\"Sector 66\",\"option_value\":\"1\"}]','Select Sector you want to visit in Mohali ?',NULL,NULL,NULL,NULL,'2019-03-22 09:51:02','2019-03-22 09:51:02'),(57,'f_1553701594',7,'q_105832','radio',1,1,'[{\"option_name\":\"aaaa\",\"option_value\":\"111\"},{\"option_name\":\"bbbb\",\"option_value\":\"222\"}]','aaaa',NULL,NULL,NULL,NULL,'2019-03-27 15:46:34','2019-03-27 15:46:34');
/*!40000 ALTER TABLE `yp_form_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_general_users`
--

DROP TABLE IF EXISTS `yp_general_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_general_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_original` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_approve` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 for approve',
  `fp_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `yp_general_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_general_users`
--

LOCK TABLES `yp_general_users` WRITE;
/*!40000 ALTER TABLE `yp_general_users` DISABLE KEYS */;
INSERT INTO `yp_general_users` VALUES (1,5451263256160,'Rupinder','kaur','mohali',NULL,NULL,'rupinder.k@iapptechnologies.com','$2y$10$bglXxRIU0IY7rFyxg8k3j.krFDVhoU9IJJdnPDdH0AtqvvVGQKrWO','98765432213','','76.71787259999999','30.7046486','RHTEVomla3mK1Abs3tFIRJVOHlr1UesWLGnTtbm24KU82tl4UeQJ3yvT3XCv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2019-03-15 14:50:05','2019-03-27 12:31:47'),(2,861134365275,NULL,NULL,NULL,NULL,NULL,'roei.mizrahi@gmail.com','$2y$10$qkBx3MtYw0PfOUvSxFkKueKx3qvwWxkWmDxE/5pd4vKwRMwBCNI1K',NULL,NULL,NULL,NULL,NULL,'116597799532782837553','רועי','https://lh5.googleusercontent.com/-twRZdF66kf0/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reXlNNiL8mWfajbiFeoAztFVM63CQ/mo/photo.jpg','https://lh5.googleusercontent.com/-twRZdF66kf0/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reXlNNiL8mWfajbiFeoAztFVM63CQ/mo/photo.jpg',NULL,NULL,NULL,1,'AtgCiiMqeWkGjopZ','2019-03-15 20:56:14','2019-03-17 15:17:44'),(3,5570305155128,'Roei','Mizrahi','Jerusalem',NULL,NULL,'roei@yesplease.co.il','$2y$10$TwN2JFynJD6GxGQ9H2KwYe0XoQvUbW7aWjoI99JMi6koewjNvesjy','','','35.21371','31.768319','XS9gEiAUlEg5eu1ktxwKAQmWI4YZ9XIAsl3OXEH4mFJblp6ssyb18dp3a0uD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'UT6pIQPuH4mxaihi','2019-03-17 08:15:35','2019-03-17 15:18:02'),(4,3501091200295,'Charn','Preet','Chandigarh, India',NULL,NULL,'charnpreet.s@iapptechnologies.com','$2y$10$uQajuTJbIDz0LDOQfYIguOog41BdMpN1ZO/vAnzyw1WdmzfjJTA26','9856213245','','76.7794179','30.7333148','GhRT1KGn2zXJt6BRET5q7A59h9Dus7PoKuYiWXGbUBQF1292PsHurv0vv7HZ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2019-03-18 09:06:49','2019-03-25 05:12:35'),(5,1036372083553,'Gernal','Dogra','Jerusalem, Israel',NULL,NULL,'dev10@iapptechnologies.com','$2y$10$2ACcMHuMp4.aBYlrK.BCfOqp3/dH3OW5X.ciH1Ln1j0iS0hkO/27u','9876543210','','35.21371','31.768319','zue47P8GjO0cbgLbkGVQOrSFaClQPqZHzgUNhef1Yli9lwHiZSqh6nRrsV9k',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2019-03-22 13:13:00','2019-03-28 07:59:27'),(6,5965165558335,'DJ','BABU','Mohali 7 Phase, Sahibzada Ajit Singh Nagar, India',NULL,NULL,'asd@dsa.asd','$2y$10$tsvBl7pg.jVy4fZwVsH02OUOZK7HDLMIWvhFIJ0NxsZBuGF/JsAoa','1234561235','1553585636.jpg','76.7247759','30.7017355','UeP0Gt03OlPSbprzup1yrmKcMrb4Bhb5x3x7V6Vv37SqqiSvsoVTjORCraZw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2019-03-26 07:33:56','2019-03-26 07:35:30'),(7,1855875535623,'DJ','BABU','Mohali, Punjab, India',NULL,NULL,'qazxs@q.asd','$2y$10$j3NT5C0b4wJcuMPgpC3Kf.wFr/5ZY2BmR77Ja0o0/rQ0wIwlZIiOu','1234567890','1553585852.png','76.71787259999999','30.7046486','95QvGEZhn2aTImlN9CHkbHuWfDC7GIGYz1Rb4stGR3qSVqe6uSHzRa35ouWj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2019-03-26 07:37:33','2019-03-26 07:39:27'),(8,3540294558156,'asd','asd','Chandigarh, India',NULL,NULL,'qwe@ewq.qwe','$2y$10$Ik0xGHn0WJGujRiW.OL1/OiCqvrZAsc2Kg3VnJJJHIMOkoDWo3hK.','9876543210','','76.7794179','30.7333148','lZtsdOl4jI0uKQP02cXdMdTxNzcRPj17fMLl20H9XFLMQjjfXivdAKGvm2T4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2019-03-26 07:41:32','2019-03-26 07:42:05');
/*!40000 ALTER TABLE `yp_general_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_general_users_quotes`
--

DROP TABLE IF EXISTS `yp_general_users_quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_general_users_quotes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quote_id` bigint(20) unsigned NOT NULL,
  `general_id` int(10) unsigned NOT NULL,
  `filter_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dynamic_formdata` text COLLATE utf8mb4_unicode_ci,
  `quote_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_files` text COLLATE utf8mb4_unicode_ci,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int(11) unsigned NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_general_users_quotes_quote_id_index` (`quote_id`),
  KEY `yp_general_users_quotes_general_id_index` (`general_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `yp_general_users_quotes_general_id_foreign` FOREIGN KEY (`general_id`) REFERENCES `yp_general_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yp_general_users_quotes_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `yp_business_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_general_users_quotes`
--

LOCK TABLES `yp_general_users_quotes` WRITE;
/*!40000 ALTER TABLE `yp_general_users_quotes` DISABLE KEYS */;
INSERT INTO `yp_general_users_quotes` VALUES (1,8354418653234,1,NULL,NULL,NULL,'hello this is my task. description of quotes . This is first quote i am sending. All work is related to water.','{\"pic\":[\"271553684348.png\"]}','98765432213',14,'Cleaner','2019-03-27 10:59:08','2019-03-27 10:59:08'),(2,1299678615375,1,NULL,NULL,NULL,'second quotesecond quotesecond quotesecond quotesecond quotesecond quotesecond quotesecond quotesecond quotesecond quotesecond quotesecond quotesecond quote','{\"pic\":[\"651553687692.jpg\"]}','98765432213',16,'PLUMBER','2019-03-27 11:54:52','2019-03-27 11:54:52'),(3,6543518158873,1,NULL,NULL,NULL,'Describe your workDescribe your workDescribe your workDescribe your workDescribe your workDescribe your workDescribe your workDescribe your workDescribe your workDescribe your workDescribe your workDescribe your work','{\"pic\":[\"411553688854.jpeg\"]}','',14,'Cleaner','2019-03-27 12:14:14','2019-03-27 12:14:14'),(4,4357861469953,5,'Sector 66','[{\"title\":\"Select Sector in Mohali ?\",\"value\":\"\",\"filter\":\"1\",\"type\":\"checkbox\",\"options\":[{\"value\":\"2\",\"label\":\"Sector 66\"}]},{\"title\":\"Enter LandMaRK\",\"value\":\"as\",\"filter\":\"0\",\"type\":\"textbox\"},{\"title\":\"Select that you want to fix ?\",\"value\":\"\",\"filter\":\"0\",\"type\":\"checkbox\",\"options\":[{\"value\":\"r\",\"label\":\"Kitchen\"}]}]','5','asadsdasd if(($_POST[\'name\']==\"\")||($_POST[\'roll\']==\"\" )||($_POST[\'address\'])==\" \"))\n	{\n		echo \"Enter value\";\n	}\n	else{if(($_POST[\'name\']==\"\")||($_POST[\'roll\']==\"\" )||($_POST[\'address\'])==\" \"))\n	{\n		echo \"Enter value\";\n	}\n	else{if(($_POST[\'name\']==\"\")||($',NULL,'9876543210',16,'PLUMBER','2019-03-28 05:11:09','2019-03-28 05:11:09'),(5,6296517515311,5,'Sector 79,Sector 66','[{\"title\":\"Select Sector in Mohali ?\",\"value\":\"\",\"filter\":\"1\",\"type\":\"checkbox\",\"options\":[{\"value\":\"1\",\"label\":\"Sector 79\"},{\"value\":\"2\",\"label\":\"Sector 66\"}]},{\"title\":\"Enter LandMaRK\",\"value\":\"Test\",\"filter\":\"0\",\"type\":\"textbox\"},{\"title\":\"Select that you want to fix ?\",\"value\":\"\",\"filter\":\"0\",\"type\":\"checkbox\",\"options\":[{\"value\":\"q\",\"label\":\"Tap\"},{\"value\":\"w\",\"label\":\"Pipe\"},{\"value\":\"e\",\"label\":\"Bathroom\"},{\"value\":\"r\",\"label\":\"Kitchen\"}]}]','3','Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"891553752196.jpg\",\"831553752197.jpg\",\"501553752197.jpg\",\"801553752197.jpg\",\"931553752197.jpg\",\"551553752197.jpg\",\"791553752197.jpg\"]}','9876543210',16,'PLUMBER','2019-03-28 05:49:56','2019-03-28 05:49:57'),(6,6853153764557,5,'Sector 66','[{\"title\":\"Select Sector in Mohali ?\",\"value\":\"\",\"filter\":\"1\",\"type\":\"checkbox\",\"options\":[{\"value\":\"2\",\"label\":\"Sector 66\"}]},{\"title\":\"Enter LandMaRK\",\"value\":\"Landmarkl\",\"filter\":\"0\",\"type\":\"textbox\"},{\"title\":\"Select that you want to fix ?\",\"value\":\"\",\"filter\":\"0\",\"type\":\"checkbox\",\"options\":[{\"value\":\"q\",\"label\":\"Tap\"},{\"value\":\"w\",\"label\":\"Pipe\"},{\"value\":\"e\",\"label\":\"Bathroom\"},{\"value\":\"r\",\"label\":\"Kitchen\"}]}]','5','Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A','{\"pic\":[\"621553753686.jpg\"]}',NULL,16,'PLUMBER','2019-03-28 06:14:46','2019-03-28 06:14:46'),(7,7512305945515,5,NULL,NULL,NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A','{\"pic\":[\"421553754591.jpg\"]}','',16,'PLUMBER','2019-03-28 06:29:51','2019-03-28 06:29:51'),(8,5559413937575,5,NULL,NULL,NULL,'SecMoh@123Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes ','{\"pic\":[\"301553754795.jpg\"]}','',16,'PLUMBER','2019-03-28 06:33:15','2019-03-28 06:33:15'),(9,5736153955731,5,NULL,NULL,NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',NULL,'9876543210',16,'PLUMBER','2019-03-28 06:39:36','2019-03-28 06:39:36'),(10,1385805507755,5,'Sector 66','[{\"title\":\"Select Sector in Mohali ?\",\"value\":\"\",\"filter\":\"1\",\"type\":\"checkbox\",\"options\":[{\"value\":\"2\",\"label\":\"Sector 66\"}]},{\"title\":\"Enter LandMaRK\",\"value\":\"Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. After the dissolution of the Soviet Union into various states, the group decided to launch some of its products in India. Hence, the first hand-stitched leather shoe was launched, which took the entire shoe market by storm. That shoe made the brand \'Woodland\'.\",\"filter\":\"0\",\"type\":\"textbox\"},{\"title\":\"Select that you want to fix ?\",\"value\":\"\",\"filter\":\"0\",\"type\":\"checkbox\",\"options\":[{\"value\":\"r\",\"label\":\"Kitchen\"}]}]','1','Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',NULL,'9876543210',16,'PLUMBER','2019-03-28 06:46:18','2019-03-28 06:46:18'),(11,9585615651372,5,NULL,NULL,NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',NULL,'',16,'PLUMBER','2019-03-28 06:48:11','2019-03-28 06:48:11'),(12,5577165153801,5,NULL,NULL,NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',NULL,'9876543210',16,'PLUMBER','2019-03-28 06:56:25','2019-03-28 06:56:25'),(13,5256357175183,5,'Sector 79,Sector 66','[{\"title\":\"Select Sector in Mohali ?\",\"value\":\"\",\"filter\":\"1\",\"type\":\"checkbox\",\"options\":[{\"value\":\"1\",\"label\":\"Sector 79\"},{\"value\":\"2\",\"label\":\"Sector 66\"}]},{\"title\":\"Enter LandMaRK\",\"value\":\"Test\",\"filter\":\"0\",\"type\":\"textbox\"},{\"title\":\"Select that you want to fix ?\",\"value\":\"\",\"filter\":\"0\",\"type\":\"checkbox\",\"options\":[{\"value\":\"q\",\"label\":\"Tap\"},{\"value\":\"w\",\"label\":\"Pipe\"},{\"value\":\"e\",\"label\":\"Bathroom\"},{\"value\":\"r\",\"label\":\"Kitchen\"}]}]','2','Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',NULL,'222222222',16,'PLUMBER','2019-03-28 07:14:46','2019-03-28 07:14:46'),(14,5753386715587,5,NULL,NULL,NULL,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A','{\"pic\":[\"431553757359.png\",\"501553757359.jpg\",\"341553757359.jpg\",\"361553757359.jpg\",\"401553757359.jpg\",\"301553757359.jpg\",\"471553757359.jpg\",\"701553757359.jpg\",\"431553757359.jpg\",\"311553757359.jpg\",\"151553757359.jpg\",\"221553757359.jpg\",\"861553757359.jpg\",\"291553757359.jpeg\",\"731553757359.jpeg\",\"971553757359.jpeg\",\"441553757359.jpeg\"]}','1111111111',16,'PLUMBER','2019-03-28 07:15:58','2019-03-28 07:15:59'),(15,2525075327715,5,'Sector 79,Sector 66','[{\"title\":\"Select Sector in Mohali ?\",\"value\":\"\",\"filter\":\"1\",\"type\":\"checkbox\",\"options\":[{\"value\":\"1\",\"label\":\"Sector 79\"},{\"value\":\"2\",\"label\":\"Sector 66\"}]},{\"title\":\"Enter LandMaRK\",\"value\":\"Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpose to ease the locomotion and prevent injuries. Secondly footwear can also be used for fashion and adornment as well as to indicate the status or rank of the person within a social structure. Socks and other hosiery are typically worn additionally between the feet and other footwear for further comfort and relief.\",\"filter\":\"0\",\"type\":\"textbox\"},{\"title\":\"Select that you want to fix ?\",\"value\":\"\",\"filter\":\"0\",\"type\":\"checkbox\",\"options\":[{\"value\":\"r\",\"label\":\"Kitchen\"}]}]','1','Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos','{\"pic\":[\"221553757750.png\",\"711553757750.jpeg\",\"801553757750.jpeg\",\"511553757750.jpeg\",\"381553757750.jpeg\",\"911553757750.jpeg\",\"991553757750.jpeg\",\"401553757750.jpeg\",\"141553757750.jpeg\",\"961553757750.jpg\",\"361553757750.png\",\"841553757750.jpg\",\"341553757750.jpeg\",\"651553757750.png\",\"591553757750.jpg\",\"171553757750.png\",\"1001553757750.jpg\",\"191553757751.png\",\"271553757751.jpg\",\"521553757751.jpg\"]}','9876543210',16,'PLUMBER','2019-03-28 07:22:30','2019-03-28 07:22:31');
/*!40000 ALTER TABLE `yp_general_users_quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_hashtag`
--

DROP TABLE IF EXISTS `yp_hashtag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_hashtag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hashtag_id` bigint(20) NOT NULL,
  `hashtag_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashtag_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_hashtag`
--

LOCK TABLES `yp_hashtag` WRITE;
/*!40000 ALTER TABLE `yp_hashtag` DISABLE KEYS */;
INSERT INTO `yp_hashtag` VALUES (1,2679555117259,'Course_1',1,'2019-03-15 14:22:01','2019-03-15 14:22:01'),(2,4932655512745,'PHP',1,'2019-03-15 14:22:12','2019-03-15 14:22:12'),(3,2515590135675,'JAVA',1,'2019-03-15 14:22:15','2019-03-15 14:22:15'),(4,9755764715302,'Mineral',1,'2019-03-15 14:22:20','2019-03-15 14:22:20'),(5,7690535472315,'Groubd',1,'2019-03-15 14:22:23','2019-03-15 14:22:23'),(6,9515595127765,'coconut',1,'2019-03-15 14:22:31','2019-03-15 14:22:31'),(7,615352557967,'Sector 67',1,'2019-03-15 14:22:37','2019-03-15 14:22:37'),(8,2196764554552,'sector 71',1,'2019-03-15 14:22:42','2019-03-15 14:22:42'),(9,6963659712575,'phase 11',1,'2019-03-15 14:22:47','2019-03-15 14:22:47'),(10,5182559857922,'Cleaner',1,'2019-03-19 08:07:37','2019-03-19 08:07:37'),(11,6529815928630,'Baby_Sitting',1,'2019-03-19 08:11:09','2019-03-19 08:11:09'),(12,9591505273080,'Plumber',1,'2019-03-19 08:11:15','2019-03-19 08:11:15'),(13,8139485056202,'Electrician',1,'2019-03-19 08:11:20','2019-03-19 08:11:20');
/*!40000 ALTER TABLE `yp_hashtag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_ques_jumps`
--

DROP TABLE IF EXISTS `yp_ques_jumps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_ques_jumps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `q_id` int(11) NOT NULL,
  `operator` int(11) NOT NULL COMMENT '1 is =,2 is !=,3 is >,4 is <',
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jump_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `q_id` (`q_id`),
  KEY `q_id_2` (`q_id`),
  KEY `q_id_3` (`q_id`),
  CONSTRAINT `yp_ques_jumps_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `yp_form_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_ques_jumps`
--

LOCK TABLES `yp_ques_jumps` WRITE;
/*!40000 ALTER TABLE `yp_ques_jumps` DISABLE KEYS */;
/*!40000 ALTER TABLE `yp_ques_jumps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_user_reviews`
--

DROP TABLE IF EXISTS `yp_user_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_user_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int(10) unsigned NOT NULL,
  `general_id` int(10) unsigned NOT NULL,
  `quote_id` int(10) unsigned NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Review by which user type',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_user_reviews_business_id_index` (`business_id`),
  KEY `yp_user_reviews_general_id_index` (`general_id`),
  KEY `yp_user_reviews_quote_id_index` (`quote_id`),
  CONSTRAINT `yp_user_reviews_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `yp_user_reviews_general_id_foreign` FOREIGN KEY (`general_id`) REFERENCES `yp_general_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_user_reviews`
--

LOCK TABLES `yp_user_reviews` WRITE;
/*!40000 ALTER TABLE `yp_user_reviews` DISABLE KEYS */;
INSERT INTO `yp_user_reviews` VALUES (1,26,1,1,'Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review Review ',1,'general','2019-03-27 11:09:00','2019-03-27 11:09:00'),(2,26,1,1,'okay okay okay okay okay okay okay okay okay okay okay okay okay okay okay okay okay okay okay okay okay okay okay ',3,'business','2019-03-27 11:09:21','2019-03-27 11:09:21'),(3,26,1,2,'Good work. Good work. Good work. Good work. Good work. Good work. Good work. Good work. Good work. Good work. Good work. Good work. Good work. Good work. Good work. Good work. ',5,'general','2019-03-27 11:56:56','2019-03-27 11:56:56'),(4,26,5,4,'Test For BEstFootwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serv',5,'general','2019-03-28 05:40:33','2019-03-28 05:40:33'),(5,26,5,4,'You will be able to view how the business rated and reviewed you after both of you will submit your reviews.\r\nYou will be able to view how the business rated and reviewed you after both of you will submit your reviews.\r\nYou will be able to view how the bu',3,'business','2019-03-28 05:46:54','2019-03-28 05:46:54'),(6,26,5,5,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos',2,'general','2019-03-28 05:55:26','2019-03-28 05:55:26'),(7,26,5,5,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos',1,'business','2019-03-28 05:56:40','2019-03-28 05:56:40'),(8,26,5,8,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',1,'general','2019-03-28 06:35:23','2019-03-28 06:35:23'),(9,26,5,8,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',5,'business','2019-03-28 06:36:50','2019-03-28 06:36:50'),(10,26,5,9,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',5,'general','2019-03-28 06:42:01','2019-03-28 06:42:13'),(11,26,5,9,'Test\r\n\r\nWoodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to',5,'business','2019-03-28 06:45:19','2019-03-28 06:45:19'),(12,24,5,11,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',5,'general','2019-03-28 06:51:39','2019-03-28 06:51:39'),(13,24,5,11,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',1,'business','2019-03-28 06:52:55','2019-03-28 06:52:55'),(14,24,5,12,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',1,'general','2019-03-28 06:59:37','2019-03-28 06:59:37'),(15,26,5,10,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',1,'general','2019-03-28 07:01:37','2019-03-28 07:01:37'),(16,26,5,10,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',1,'business','2019-03-28 07:07:43','2019-03-28 07:07:43'),(17,24,5,12,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',5,'business','2019-03-28 07:08:14','2019-03-28 07:08:14'),(18,26,5,14,'Footwear refers to garments worn on the feet, which originally serves to purpose of protection against adversities of the environment, usually regarding ground textures and temperature. Footwear in the manner of shoes therefore primarily serves the purpos',5,'general','2019-03-28 07:21:53','2019-03-28 07:21:53'),(19,26,5,15,'Testhttps://yesplease.iapplabz.co.in/business_user/quoted_accepted/14/3Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Bef',4,'general','2019-03-28 07:53:50','2019-03-28 07:53:50'),(20,26,5,14,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',5,'business','2019-03-28 07:54:34','2019-03-28 07:54:34'),(21,26,5,15,'Woodland\'s parent company, Aero Group, has been a well known name in the outdoor shoe industry since the early 50s. Founded in Quebec, Canada, it entered the Indian market in 1992. Before that, Aero Group was majorly exporting its leather shoes to USSR. A',1,'business','2019-03-28 07:54:50','2019-03-28 07:54:50'),(22,26,5,13,'Gernal Dogr Home/Quotes and Questions/ PLUMBER/Review Kalonji\r\nKalonji\r\nYou will be able to view how the business rated and reviewed yo',5,'general','2019-03-28 09:21:02','2019-03-28 09:21:02');
/*!40000 ALTER TABLE `yp_user_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_users`
--

DROP TABLE IF EXISTS `yp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `yp_users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_users`
--

LOCK TABLES `yp_users` WRITE;
/*!40000 ALTER TABLE `yp_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `yp_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yp_verfication_business_users`
--

DROP TABLE IF EXISTS `yp_verfication_business_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yp_verfication_business_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_id` int(10) unsigned NOT NULL,
  `business_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uploaded_files` text COLLATE utf8mb4_unicode_ci,
  `business_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_verified_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `yp_verfication_business_users_b_id_index` (`b_id`),
  CONSTRAINT `yp_verfication_business_users_b_id_foreign` FOREIGN KEY (`b_id`) REFERENCES `yp_business_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yp_verfication_business_users`
--

LOCK TABLES `yp_verfication_business_users` WRITE;
/*!40000 ALTER TABLE `yp_verfication_business_users` DISABLE KEYS */;
INSERT INTO `yp_verfication_business_users` VALUES (1,26,'3012405375575','{\"pic\":[\"691553759069.png\",\"931553759333.jpg\",\"0bfe1182dabb4464a6fd977c06f8d32e_1472016116.png\",\"461553759511.png\",\"be6cbd80b141486a901f0b4ce2bf14c1_447234656.png\"]}','t','1','2019-03-28 07:44:29','2019-03-28 07:51:52');
/*!40000 ALTER TABLE `yp_verfication_business_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-28  9:41:16
