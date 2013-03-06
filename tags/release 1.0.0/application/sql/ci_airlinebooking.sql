
DROP TABLE IF EXISTS `ci_airlinebooking`;

CREATE TABLE `ci_airlinebooking` (
  `flt_id` int(11) NOT NULL AUTO_INCREMENT,
  `flt_code` varchar(50) DEFAULT NULL,
  `flt_firstname` varchar(50) DEFAULT NULL,
  `flt_lastname` varchar(50) DEFAULT NULL,
  `flt_address` varchar(255) DEFAULT NULL,
  `flt_city` varchar(50) DEFAULT NULL,
  `flt_province` varchar(50) DEFAULT NULL,
  `flt_zipcode` varchar(10) DEFAULT NULL,
  `flt_telephone` varchar(50) DEFAULT NULL,
  `flt_email` varchar(50) DEFAULT NULL,
  `flt_nationality` varchar(50) DEFAULT NULL,
  `flt_from_location` varchar(255) DEFAULT NULL,
  `flt_go_to_location` varchar(255) DEFAULT NULL,
  `flt_depart_date` date DEFAULT NULL,
  `flt_depart_time` varchar(50) DEFAULT NULL,
  `flt_return_date` date DEFAULT NULL,
  `flt_return_time` varchar(50) DEFAULT NULL,
  `flt_adult_amount` int(11) DEFAULT NULL,
  `flt_child_amount` int(11) DEFAULT NULL,
  `flt_infant_amount` int(11) DEFAULT NULL,
  `flt_type` varchar(50) DEFAULT NULL,
  `flt_class` varchar(50) DEFAULT NULL,
  `flt_hashcode` varchar(255) DEFAULT NULL,
  `flt_message` varchar(255) DEFAULT NULL,
  `flt_cr_uid` int(11) DEFAULT NULL,
  `flt_cr_date` timestamp NULL DEFAULT NULL,
  `flt_lu_uid` int(11) DEFAULT NULL,
  `flt_lu_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`flt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
