# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: uastravel
# Generation Time: 2556-01-29 04:44:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ci_tour_translate
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_tour_translate`;

CREATE TABLE `ci_tour_translate` (
  `tout_id` int(11) NOT NULL AUTO_INCREMENT,
  `tout_tour_id` int(11) unsigned NOT NULL,
  `tout_lang` varchar(3) NOT NULL DEFAULT 'th',
  `tout_name` varchar(255) DEFAULT NULL,
  `tout_url` varchar(255) NOT NULL DEFAULT '',
  `tout_short_description` text,
  `tout_description` text,
  `tout_detail` text,
  `tout_included` text,
  `tout_remark` text,
  `tout_cr_date` timestamp NULL DEFAULT NULL,
  `tout_cr_uid` int(11) DEFAULT NULL,
  `tout_lu_date` timestamp NULL DEFAULT NULL,
  `tout_lu_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`tout_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
