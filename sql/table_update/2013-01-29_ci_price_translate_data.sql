# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: uastravel
# Generation Time: 2556-01-29 04:50:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ci_price_translate
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_price_translate`;

CREATE TABLE `ci_price_translate` (
  `prit_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `prit_lang` varchar(3) DEFAULT NULL,
  `prit_price_id` int(11) DEFAULT NULL,
  `prit_name` varchar(255) DEFAULT NULL,
  `prit_cr_uid` int(11) DEFAULT NULL,
  `prit_cr_date` timestamp NULL DEFAULT NULL,
  `prit_lu_uid` int(11) DEFAULT NULL,
  `prit_lu_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`prit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `ci_price_translate` WRITE;
/*!40000 ALTER TABLE `ci_price_translate` DISABLE KEYS */;

INSERT INTO `ci_price_translate` (`prit_id`, `prit_lang`, `prit_price_id`, `prit_name`, `prit_cr_uid`, `prit_cr_date`, `prit_lu_uid`, `prit_lu_date`)
VALUES
	(3,'en',406,'ninehunred',NULL,'2013-01-28 19:07:22',NULL,'2013-01-29 08:59:09'),
	(2,'en',403,'onethousandone',NULL,'2013-01-28 18:16:22',NULL,'2013-01-29 08:59:09'),
	(5,'th',406,'เก้าร้อย',NULL,'2013-01-28 20:34:16',NULL,'2013-01-29 08:59:44'),
	(6,'th',403,'พันเอ็ด',NULL,'2013-01-28 20:34:16',NULL,'2013-01-29 08:59:44'),
	(10,'th',409,'ห้าร้อย',NULL,'2013-01-29 08:59:44',NULL,'2013-01-29 08:59:44'),
	(9,'en',409,'fivehunred',NULL,'2013-01-29 08:59:09',NULL,'2013-01-29 08:59:09');

/*!40000 ALTER TABLE `ci_price_translate` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
