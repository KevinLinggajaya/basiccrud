# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.16)
# Database: printerous
# Generation Time: 2015-04-12 17:43:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_10_12_000000_create_users_table',1),
	('2014_10_12_100000_create_password_resets_table',1),
	('2015_03_25_173356_create_products_table',1),
	('2015_03_25_173851_create_product_details_table',1),
	('2015_03_26_162708_create_orders_table',2),
	('2015_03_26_164354_create_order_details_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_detail_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_detail_id_foreign` (`product_detail_id`),
  CONSTRAINT `order_details_product_detail_id_foreign` FOREIGN KEY (`product_detail_id`) REFERENCES `product_details` (`id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;

INSERT INTO `order_details` (`id`, `order_id`, `product_detail_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,2,1,1,'2015-03-27 04:55:18','2015-03-27 04:55:18',NULL),
	(2,2,3,1,'2015-03-27 04:55:18','2015-03-27 04:55:18',NULL),
	(3,2,8,1,'2015-03-27 04:55:18','2015-03-27 04:55:18',NULL),
	(4,2,11,1,'2015-03-27 04:55:18','2015-03-27 04:55:18',NULL),
	(5,3,2,1,'2015-03-27 04:56:05','2015-03-27 04:56:05',NULL),
	(6,3,6,1,'2015-03-27 04:56:05','2015-03-27 04:56:05',NULL),
	(7,3,8,1,'2015-03-27 04:56:05','2015-03-27 04:56:05',NULL),
	(8,3,10,1,'2015-03-27 04:56:05','2015-03-27 04:56:05',NULL),
	(9,3,13,1,'2015-03-27 04:56:05','2015-03-27 04:56:05',NULL),
	(10,4,1,1,'2015-03-27 04:56:12','2015-03-27 04:56:12',NULL),
	(11,4,5,1,'2015-03-27 04:56:12','2015-03-27 04:56:12',NULL),
	(12,4,7,1,'2015-03-27 04:56:12','2015-03-27 04:56:12',NULL),
	(13,4,11,1,'2015-03-27 04:56:12','2015-03-27 04:56:12',NULL),
	(14,4,13,1,'2015-03-27 04:56:12','2015-03-27 04:56:12',NULL),
	(15,5,1,1,'2015-03-27 04:56:20','2015-03-27 04:56:20',NULL),
	(16,5,3,1,'2015-03-27 04:56:20','2015-03-27 04:56:20',NULL),
	(17,5,5,1,'2015-03-27 04:56:20','2015-03-27 04:56:20',NULL),
	(18,5,9,1,'2015-03-27 04:56:20','2015-03-27 04:56:20',NULL),
	(19,6,1,1,'2015-03-27 04:56:30','2015-03-27 04:56:30',NULL),
	(20,6,2,1,'2015-03-27 04:56:30','2015-03-27 04:56:30',NULL),
	(21,6,4,1,'2015-03-27 04:56:30','2015-03-27 04:56:30',NULL),
	(22,6,8,1,'2015-03-27 04:56:30','2015-03-27 04:56:30',NULL),
	(23,6,12,1,'2015-03-27 04:56:30','2015-03-27 04:56:30',NULL),
	(24,7,1,1,'2015-03-27 04:56:37','2015-03-27 04:56:37',NULL),
	(25,7,6,1,'2015-03-27 04:56:37','2015-03-27 04:56:37',NULL),
	(26,7,9,1,'2015-03-27 04:56:37','2015-03-27 04:56:37',NULL),
	(27,7,10,1,'2015-03-27 04:56:37','2015-03-27 04:56:37',NULL),
	(28,7,13,1,'2015-03-27 04:56:37','2015-03-27 04:56:37',NULL),
	(29,8,1,1,'2015-03-27 04:56:43','2015-03-27 04:56:43',NULL),
	(30,8,4,1,'2015-03-27 04:56:43','2015-03-27 04:56:43',NULL),
	(31,8,8,1,'2015-03-27 04:56:43','2015-03-27 04:56:43',NULL),
	(32,9,1,1,'2015-03-27 04:56:52','2015-03-27 04:56:52',NULL),
	(33,9,6,1,'2015-03-27 04:56:52','2015-03-27 04:56:52',NULL),
	(34,9,15,1,'2015-03-27 04:56:52','2015-03-27 04:56:52',NULL),
	(35,9,16,1,'2015-03-27 04:56:52','2015-03-27 04:56:52',NULL),
	(36,10,1,1,'2015-03-27 04:57:00','2015-03-27 04:57:00',NULL),
	(37,10,7,1,'2015-03-27 04:57:00','2015-03-27 04:57:00',NULL),
	(38,10,9,1,'2015-03-27 04:57:00','2015-03-27 04:57:00',NULL),
	(39,10,12,1,'2015-03-27 04:57:00','2015-03-27 04:57:00',NULL),
	(40,11,1,1,'2015-03-27 04:57:07','2015-03-27 04:57:07',NULL),
	(41,11,6,1,'2015-03-27 04:57:07','2015-03-27 04:57:07',NULL),
	(42,11,9,1,'2015-03-27 04:57:07','2015-03-27 04:57:07',NULL),
	(43,11,12,1,'2015-03-27 04:57:07','2015-03-27 04:57:07',NULL),
	(44,12,2,1,'2015-03-27 04:57:16','2015-03-27 04:57:16',NULL),
	(45,12,5,1,'2015-03-27 04:57:16','2015-03-27 04:57:16',NULL),
	(46,12,6,1,'2015-03-27 04:57:16','2015-03-27 04:57:16',NULL),
	(47,12,10,1,'2015-03-27 04:57:16','2015-03-27 04:57:16',NULL),
	(48,13,3,1,'2015-03-27 04:57:26','2015-03-27 04:57:26',NULL),
	(49,13,7,1,'2015-03-27 04:57:26','2015-03-27 04:57:26',NULL),
	(50,13,8,1,'2015-03-27 04:57:26','2015-03-27 04:57:26',NULL),
	(51,13,12,1,'2015-03-27 04:57:26','2015-03-27 04:57:26',NULL),
	(52,13,16,1,'2015-03-27 04:57:26','2015-03-27 04:57:26',NULL),
	(53,14,4,1,'2015-03-27 04:57:38','2015-03-27 04:57:38',NULL),
	(54,14,6,1,'2015-03-27 04:57:38','2015-03-27 04:57:38',NULL),
	(55,14,11,1,'2015-03-27 04:57:38','2015-03-27 04:57:38',NULL),
	(56,14,15,1,'2015-03-27 04:57:38','2015-03-27 04:57:38',NULL),
	(57,14,16,1,'2015-03-27 04:57:38','2015-03-27 04:57:38',NULL),
	(58,15,4,1,'2015-03-27 04:57:46','2015-03-27 04:57:46',NULL),
	(59,15,6,1,'2015-03-27 04:57:46','2015-03-27 04:57:46',NULL),
	(60,15,10,1,'2015-03-27 04:57:46','2015-03-27 04:57:46',NULL),
	(61,15,12,1,'2015-03-27 04:57:46','2015-03-27 04:57:46',NULL),
	(62,16,3,1,'2015-03-27 04:57:53','2015-03-27 04:57:53',NULL),
	(63,16,5,1,'2015-03-27 04:57:53','2015-03-27 04:57:53',NULL),
	(64,16,8,1,'2015-03-27 04:57:54','2015-03-27 04:57:54',NULL),
	(65,16,10,1,'2015-03-27 04:57:54','2015-03-27 04:57:54',NULL),
	(66,16,13,1,'2015-03-27 04:57:54','2015-03-27 04:57:54',NULL),
	(67,16,15,1,'2015-03-27 04:57:54','2015-03-27 04:57:54',NULL),
	(68,16,16,1,'2015-03-27 04:57:54','2015-03-27 04:57:54',NULL),
	(69,17,2,1,'2015-03-27 04:58:03','2015-03-27 04:58:03',NULL),
	(70,17,3,1,'2015-03-27 04:58:03','2015-03-27 04:58:03',NULL),
	(71,17,6,1,'2015-03-27 04:58:03','2015-03-27 04:58:03',NULL),
	(72,17,10,1,'2015-03-27 04:58:03','2015-03-27 04:58:03',NULL),
	(73,17,11,1,'2015-03-27 04:58:03','2015-03-27 04:58:03',NULL),
	(74,17,16,1,'2015-03-27 04:58:03','2015-03-27 04:58:03',NULL),
	(75,18,3,1,'2015-03-27 04:58:16','2015-03-27 04:58:16',NULL),
	(76,18,4,1,'2015-03-27 04:58:16','2015-03-27 04:58:16',NULL),
	(77,18,7,1,'2015-03-27 04:58:16','2015-03-27 04:58:16',NULL),
	(78,18,9,1,'2015-03-27 04:58:16','2015-03-27 04:58:16',NULL),
	(79,18,12,1,'2015-03-27 04:58:16','2015-03-27 04:58:16',NULL),
	(80,18,13,1,'2015-03-27 04:58:16','2015-03-27 04:58:16',NULL),
	(81,18,16,1,'2015-03-27 04:58:16','2015-03-27 04:58:16',NULL),
	(82,19,2,1,'2015-03-27 04:58:27','2015-03-27 04:58:27',NULL),
	(83,19,4,1,'2015-03-27 04:58:27','2015-03-27 04:58:27',NULL),
	(84,19,7,1,'2015-03-27 04:58:27','2015-03-27 04:58:27',NULL),
	(85,19,11,1,'2015-03-27 04:58:27','2015-03-27 04:58:27',NULL),
	(86,19,14,1,'2015-03-27 04:58:27','2015-03-27 04:58:27',NULL),
	(87,20,2,1,'2015-03-27 04:58:37','2015-03-27 04:58:37',NULL),
	(88,20,3,1,'2015-03-27 04:58:37','2015-03-27 04:58:37',NULL),
	(89,20,6,1,'2015-03-27 04:58:37','2015-03-27 04:58:37',NULL),
	(90,20,7,1,'2015-03-27 04:58:37','2015-03-27 04:58:37',NULL),
	(91,20,9,1,'2015-03-27 04:58:37','2015-03-27 04:58:37',NULL),
	(92,20,14,1,'2015-03-27 04:58:37','2015-03-27 04:58:37',NULL),
	(93,20,15,1,'2015-03-27 04:58:37','2015-03-27 04:58:37',NULL),
	(94,20,16,1,'2015-03-27 04:58:37','2015-03-27 04:58:37',NULL),
	(95,21,6,1,'2015-03-27 04:58:45','2015-03-27 04:58:45',NULL),
	(96,21,11,1,'2015-03-27 04:58:45','2015-03-27 04:58:45',NULL),
	(97,21,16,1,'2015-03-27 04:58:45','2015-03-27 04:58:45',NULL);

/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_no` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `shipping_address` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `order_no`, `total_price`, `shipping_address`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(2,'0000000001',580000.00,'This is Shipping Address','2015-03-27 04:55:18','2015-03-27 04:55:18',NULL),
	(3,'0000000002',830000.00,'This is Shipping Address','2015-03-27 04:56:05','2015-03-27 04:56:05',NULL),
	(4,'0000000003',770000.00,'This is Shipping Address','2015-03-27 04:56:12','2015-03-27 04:56:12',NULL),
	(5,'0000000004',650000.00,'This is Shipping Address','2015-03-27 04:56:20','2015-03-27 04:56:20',NULL),
	(6,'0000000005',680000.00,'This is Shipping Address','2015-03-27 04:56:30','2015-03-27 04:56:30',NULL),
	(7,'0000000006',900000.00,'This is Shipping Address','2015-03-27 04:56:37','2015-03-27 04:56:37',NULL),
	(8,'0000000007',380000.00,'This is Shipping Address','2015-03-27 04:56:43','2015-03-27 04:56:43',NULL),
	(9,'0000000008',700000.00,'This is Shipping Address','2015-03-27 04:56:52','2015-03-27 04:56:52',NULL),
	(10,'0000000009',570000.00,'This is Shipping Address','2015-03-27 04:57:00','2015-03-27 04:57:00',NULL),
	(11,'0000000010',700000.00,'This is Shipping Address','2015-03-27 04:57:07','2015-03-27 04:57:07',NULL),
	(12,'0000000011',700000.00,'This is Shipping Address','2015-03-27 04:57:16','2015-03-27 04:57:16',NULL),
	(13,'0000000012',750000.00,'This is Shipping Address','2015-03-27 04:57:26','2015-03-27 04:57:26',NULL),
	(14,'0000000013',950000.00,'This is Shipping Address','2015-03-27 04:57:38','2015-03-27 04:57:38',NULL),
	(15,'0000000014',750000.00,'This is Shipping Address','2015-03-27 04:57:46','2015-03-27 04:57:46',NULL),
	(16,'0000000015',1280000.00,'This is Shipping Address','2015-03-27 04:57:53','2015-03-27 04:57:53',NULL),
	(17,'0000000016',1050000.00,'This is Shipping Address','2015-03-27 04:58:03','2015-03-27 04:58:03',NULL),
	(18,'0000000017',1170000.00,'This is Shipping Address','2015-03-27 04:58:16','2015-03-27 04:58:16',NULL),
	(19,'0000000018',720000.00,'This is Shipping Address','2015-03-27 04:58:27','2015-03-27 04:58:27',NULL),
	(20,'0000000019',1320000.00,'This is Shipping Address','2015-03-27 04:58:37','2015-03-27 04:58:37',NULL),
	(21,'0000000020',600000.00,'This is Shipping Address','2015-03-27 04:58:45','2015-03-27 04:58:45',NULL);

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table product_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_details`;

CREATE TABLE `product_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `is_enabled` tinyint(1) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_details_product_id_foreign` (`product_id`),
  CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;

INSERT INTO `product_details` (`id`, `product_id`, `is_enabled`, `color`, `size`, `quantity`, `weight`, `price`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,1,'White','10 x 10',1,250.00,100000.00,'2015-03-27 04:37:36','2015-03-27 04:57:07',NULL),
	(2,1,1,'Black','10 x 10',4,250.00,100000.00,'2015-03-27 04:37:53','2015-03-27 04:58:37',NULL),
	(3,1,1,'White','20 x 20',3,250.00,150000.00,'2015-03-27 04:38:12','2015-03-27 04:58:37',NULL),
	(4,1,1,'Black','20 x 20',4,250.00,150000.00,'2015-03-27 04:38:33','2015-03-27 04:58:27',NULL),
	(5,1,1,'White','30 x 30',6,250.00,200000.00,'2015-03-27 04:39:03','2015-03-27 04:57:53',NULL),
	(6,1,1,'Black','30 x 30',0,250.00,200000.00,'2015-03-27 04:39:38','2015-03-27 04:58:45',NULL),
	(7,3,1,'','Mini 4 magnets',4,100.00,70000.00,'2015-03-27 04:42:57','2015-03-27 04:58:37',NULL),
	(8,3,1,'','Standard 9 magnets',4,100.00,130000.00,'2015-03-27 04:43:24','2015-03-27 04:57:54',NULL),
	(9,3,1,'','Family 16 magnets',4,100.00,200000.00,'2015-03-27 04:43:44','2015-03-27 04:58:37',NULL),
	(10,4,1,'White','40 x 40',4,500.00,200000.00,'2015-03-27 04:47:36','2015-03-27 04:58:03',NULL),
	(11,4,1,'Black','40 x 40',4,500.00,200000.00,'2015-03-27 04:47:50','2015-03-27 04:58:45',NULL),
	(12,4,1,'Orange','40 x 40',4,500.00,200000.00,'2015-03-27 04:48:06','2015-03-27 04:58:16',NULL),
	(13,2,1,'White','40 x 40',5,100.00,200000.00,'2015-03-27 04:48:34','2015-03-27 04:58:16',NULL),
	(14,2,1,'Black','40 x 40',8,100.00,200000.00,'2015-03-27 04:48:52','2015-03-27 04:58:37',NULL),
	(15,2,1,'Gray','40 x 40',6,100.00,200000.00,'2015-03-27 04:49:06','2015-03-27 04:58:37',NULL),
	(16,2,1,'Brown','40 x 40',2,100.00,200000.00,'2015-03-27 04:49:20','2015-03-27 04:58:45',NULL);

/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `is_enabled` tinyint(1) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `is_enabled`, `name`, `code`, `description`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,'Canvas','CANVAS','This is description of canvas product','2015-03-27 04:35:21','2015-03-27 04:35:21',NULL),
	(2,1,'Tote Bag','TOTEBAG','This is description of tote bag','2015-03-27 04:35:42','2015-03-27 04:35:42',NULL),
	(3,1,'Magnet','MAGNET','This is description of magnet','2015-03-27 04:36:03','2015-03-27 04:36:03',NULL),
	(4,1,'Pillow','PILLOW','This is description of pillow','2015-03-27 04:36:21','2015-03-27 04:36:21',NULL);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(3,'Admin','admin@admin.com','$2y$10$vqQldi613f.D2z.oxwL1puzKDQatluSR.b3gHe9CuLL/YorEobl5G',NULL,'2015-04-12 17:17:17','2015-04-12 17:17:17',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
