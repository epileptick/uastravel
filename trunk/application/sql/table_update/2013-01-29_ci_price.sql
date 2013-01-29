# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: uastravel
# Generation Time: 2556-01-29 02:49:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ci_price
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_price`;

CREATE TABLE `ci_price` (
  `pri_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pri_agency_id` int(11) DEFAULT NULL,
  `pri_tour_id` int(11) DEFAULT NULL,
  `pri_sale_adult_price` int(50) DEFAULT NULL,
  `pri_net_adult_price` int(50) DEFAULT NULL,
  `pri_discount_adult_price` int(50) DEFAULT NULL,
  `pri_sale_child_price` int(50) DEFAULT NULL,
  `pri_net_child_price` int(50) DEFAULT NULL,
  `pri_discount_child_price` int(50) DEFAULT NULL,
  `pri_cr_uid` int(11) DEFAULT NULL,
  `pri_cr_date` timestamp NULL DEFAULT NULL,
  `pri_lu_uid` int(11) DEFAULT NULL,
  `pri_lu_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pri_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
