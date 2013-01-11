DROP TABLE IF EXISTS `ci_carbooking`;

CREATE TABLE `ci_carbooking` (
  `cab_id` int(11) NOT NULL AUTO_INCREMENT,
  `cab_code` varchar(255) DEFAULT NULL,
  `cab_firstname` varchar(50) DEFAULT NULL,
  `cab_lastname` varchar(50) DEFAULT NULL,
  `cab_address` varchar(250) DEFAULT NULL,
  `cab_city` varchar(50) DEFAULT NULL,
  `cab_province` varchar(50) DEFAULT NULL,
  `cab_zipcode` varchar(50) DEFAULT NULL,
  `cab_telephone` varchar(50) DEFAULT NULL,
  `cab_email` varchar(50) DEFAULT NULL,
  `cab_nationality` varchar(50) DEFAULT NULL,
  `cab_passenger_amount` int(11) DEFAULT NULL,
  `cab_pickup_location` varchar(250) DEFAULT NULL,
  `cab_pickup_date` date DEFAULT NULL,
  `cab_pickup_time` varchar(50) DEFAULT NULL,
  `cab_dropoff_location` varchar(250) DEFAULT NULL,
  `cab_dropoff_date` date DEFAULT NULL,
  `cab_dropoff_time` varchar(50) DEFAULT NULL,
  `cab_message` varchar(250) DEFAULT NULL,
  `cab_hashcode` varchar(250) DEFAULT NULL,
  `cab_cr_uid` int(11) DEFAULT NULL,
  `cab_cr_date` timestamp NULL DEFAULT NULL,
  `cab_lu_uid` int(11) DEFAULT NULL,
  `cab_lu_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cab_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
