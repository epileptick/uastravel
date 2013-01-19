
 RENAME TABLE `ci_agencytour` TO `ci_price`;



/* 15:36:40  localhost */ ALTER TABLE `ci_price` CHANGE `agt_id` `pri_id` INT(11)  UNSIGNED  NOT NULL  AUTO_INCREMENT;

/* 15:36:43  localhost */ ALTER TABLE `ci_price` CHANGE `agt_agency_id` `pri_agency_id` INT(11)  NULL  DEFAULT NULL;

/* 15:36:48  localhost */ ALTER TABLE `ci_price` CHANGE `agt_tour_id` `pri_tour_id` INT(11)  NULL  DEFAULT NULL;

/* 15:36:55  localhost */ ALTER TABLE `ci_price` CHANGE `agt_sale_adult_price` `pri_sale_adult_price` INT(50)  NULL  DEFAULT NULL;

/* 15:36:58  localhost */ ALTER TABLE `ci_price` CHANGE `agt_net_adult_price` `pri_net_adult_price` INT(50)  NULL  DEFAULT NULL;

/* 15:37:02  localhost */ ALTER TABLE `ci_price` CHANGE `agt_discount_adult_price` `pri_discount_adult_price` INT(50)  NULL  DEFAULT NULL;

/* 15:37:06  localhost */ ALTER TABLE `ci_price` CHANGE `agt_sale_child_price` `pri_sale_child_price` INT(50)  NULL  DEFAULT NULL;

/* 15:37:10  localhost */ ALTER TABLE `ci_price` CHANGE `agt_net_child_price` `pri_net_child_price` INT(50)  NULL  DEFAULT NULL;

 /* 15:37:13  localhost */ ALTER TABLE `ci_price` CHANGE `agt_discount_child_price` `pri_discount_child_price` INT(50)  NULL  DEFAULT NULL;


/* 15:30:26  localhost */ ALTER TABLE `ci_price` ADD `pri_name` VARCHAR(255)  NULL  DEFAULT NULL  AFTER `pri_tour_id`;