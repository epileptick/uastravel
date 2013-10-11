# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: uastravel
# Generation Time: 2556-01-29 02:49:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ci_tour
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_tour`;

CREATE TABLE `ci_tour` (
  `tou_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tou_display` int(11) NOT NULL DEFAULT '1',
  `tou_code` varchar(255) DEFAULT NULL,
  `tou_amount_time` float DEFAULT NULL,
  `tou_start_date` date DEFAULT NULL,
  `tou_end_date` date DEFAULT NULL,
  `tou_start_month` int(11) NOT NULL,
  `tou_end_month` int(11) NOT NULL,
  `tou_start_time1` time DEFAULT NULL,
  `tou_end_time1` time DEFAULT NULL,
  `tou_start_time2` time DEFAULT NULL,
  `tou_end_time2` time DEFAULT NULL,
  `tou_start_time3` time NOT NULL,
  `tou_end_time3` time NOT NULL,
  `tou_longitude` text,
  `tou_latitude` text,
  `tou_first_image` varchar(255) NOT NULL,
  `tou_background_image` varchar(255) NOT NULL,
  `tou_banner_image` varchar(255) NOT NULL,
  `tou_cr_date` timestamp NULL DEFAULT NULL,
  `tou_cr_uid` int(11) DEFAULT NULL,
  `tou_lu_date` timestamp NULL DEFAULT NULL,
  `tou_lu_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`tou_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
