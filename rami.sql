-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for rami
CREATE DATABASE IF NOT EXISTS `rami` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `rami`;

-- Dumping structure for table rami.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table rami.pages: ~4 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
REPLACE INTO `pages` (`id`, `name`) VALUES
	(1, 'page1'),
	(2, 'page2'),
	(3, 'page3'),
	(4, 'apple'),
	(5, 'Banana');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table rami.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prefix` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT 'idle',
  `channel` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billsec` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rminutes` int(11) DEFAULT NULL,
  `number` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tselect` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_call` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ready_status` int(11) DEFAULT NULL,
  `status_time` char(50) COLLATE utf8_unicode_ci DEFAULT '1',
  `price` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `tprefix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moreprefix` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table rami.products: ~7 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
REPLACE INTO `products` (`id`, `name`, `prefix`, `status`, `channel`, `billsec`, `rminutes`, `number`, `tselect`, `start_call`, `ready_status`, `status_time`, `price`, `page_id`, `tprefix`, `moreprefix`) VALUES
	(30, 'sss', '', 'idle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 54, NULL, 'sdf', NULL),
	(31, 'dfgd', '', 'idle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 45, NULL, 'dfgsdf', NULL),
	(32, 'ssssss', '', 'idle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 45, NULL, 'dfgdfg', NULL),
	(33, 'sss', '', 'idle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 54, 1, 'sdf', NULL),
	(34, 'ssss', '', 'idle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 456, 1, 'dfg', NULL),
	(35, 'aaa', '', 'idle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 5464, 1, 'gfhf', NULL),
	(36, 'sdfs', '', 'idle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 4567, 2, 'fgf', NULL),
	(37, 'sf', '', 'idle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 345, 4, 'sdf', NULL),
	(38, 'sss', '', 'idle', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 45, 4, 'fgsdf', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
