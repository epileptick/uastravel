/*
SQLyog Ultimate v9.20 
MySQL - 5.5.25a : Database - uastravel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`uastravel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `uastravel`;

/*Table structure for table `ci_agency` */

DROP TABLE IF EXISTS `ci_agency`;

CREATE TABLE `ci_agency` (
  `agn_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agn_name` varchar(255) DEFAULT NULL,
  `agn_firstname` varchar(255) DEFAULT NULL,
  `agn_lastname` varchar(255) DEFAULT NULL,
  `agn_address` text,
  `agn_email` varchar(255) DEFAULT NULL,
  `agn_telephone` text,
  `agn_fax` text,
  `agn_website` varchar(255) DEFAULT NULL,
  `agn_credittime` int(11) DEFAULT NULL,
  `agn_condition` text,
  `agn_bookbank` text,
  `agn_remark` text,
  `agn_cr_date` timestamp NULL DEFAULT NULL,
  `agn_cr_uid` int(11) DEFAULT NULL,
  `agn_lu_date` timestamp NULL DEFAULT NULL,
  `agn_lu_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`agn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `ci_agency` */

/*Table structure for table `ci_agencytour` */

DROP TABLE IF EXISTS `ci_agencytour`;

CREATE TABLE `ci_agencytour` (
  `agt_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agt_agency_id` int(11) DEFAULT NULL,
  `agt_tour_id` int(11) DEFAULT NULL,
  `agt_sale_adult_price` int(50) DEFAULT NULL,
  `agt_net_adult_price` int(50) DEFAULT NULL,
  `agt_discount_adult_price` int(50) DEFAULT NULL,
  `agt_sale_child_price` int(50) DEFAULT NULL,
  `agt_net_child_price` int(50) DEFAULT NULL,
  `agt_discount_child_price` int(50) DEFAULT NULL,
  PRIMARY KEY (`agt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `ci_agencytour` */

/*Table structure for table `ci_images` */

DROP TABLE IF EXISTS `ci_images`;

CREATE TABLE `ci_images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_file_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_size` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_parent_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_table_id` int(2) DEFAULT NULL,
  UNIQUE KEY `img_id` (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `ci_images` */

insert  into `ci_images`(`img_id`,`img_file_name`,`img_size`,`img_type`,`img_parent_id`,`img_url`,`img_table_id`) values (1,'p179keu6i46t5lld1jub1uve2fa.jpg','77803','file',NULL,'http://localhostuastravel.com/resource\\post_images/a/a4/a4570aa0\\28\\p179keu6i46t5lld1jub1uve2fa.jpg',NULL),(2,'p179keu6i8m971huv1ms2qkuj8ob.jpg','22891','file',NULL,'http://localhostuastravel.com/resource\\post_images/a/ae/ae8b0b05\\28\\p179keu6i8m971huv1ms2qkuj8ob.jpg',NULL),(3,'p179keu6i8k6317368pc1rnt1s6hc.jpg','22891','file',NULL,'http://localhostuastravel.com/resource\\post_images/a/ab/ab040a77\\28\\p179keu6i8k6317368pc1rnt1s6hc.jpg',NULL),(4,'p179pir4u91kotmoa1gm013g11r24.png','338190','file',NULL,'http://localhostuastravel.com/resource\\post_images/b/b8/b83d0aa8\\\\p179pir4u91kotmoa1gm013g11r24.png',NULL),(5,'p179pkh2po1i3o1li51io97lj11cr4.png','17511','file',37,'http://localhostuastravel.com/resource\\post_images/b/bf/bff40b0a\\37\\p179pkh2po1i3o1li51io97lj11cr4.png',NULL),(6,'p179pl0n1n17862a91ncnso6jn74.png','17511','file',NULL,'http://localhostuastravel.com/resource\\post_images/9/9f/9f7c0a0b\\\\p179pl0n1n17862a91ncnso6jn74.png',NULL),(7,'p179pl3b021aeimkb1ooa1s3u1d5r4.png','17511','file',NULL,'http://localhostuastravel.com/resource\\post_images/b/be/be000b1e\\\\p179pl3b021aeimkb1ooa1s3u1d5r4.png',NULL),(8,'p179pl7rp2lk01hivj2u1ra3gfc4.png','180','file',3,'http://localhostuastravel.com/resource\\post_images/a/af/afb80ad7\\3\\p179pl7rp2lk01hivj2u1ra3gfc4.png',NULL),(9,'p179plhnvf1dte1gpu1ccc1g41e5p6.jpg','879394','file',3,'http://localhostuastravel.com/resource\\post_images/c/cd/cda30b91\\3\\p179plhnvf1dte1gpu1ccc1g41e5p6.jpg',NULL),(10,'p179plhnvg1u531ni5bg78lo1bec7.jpg','845941','file',3,'http://localhostuastravel.com/resource\\post_images/b/ba/ba3f0b00\\3\\p179plhnvg1u531ni5bg78lo1bec7.jpg',NULL),(11,'p179plhnvg1c4r1ggcrrt1gfntli8.jpg','595284','file',3,'http://localhostuastravel.com/resource\\post_images/c/c6/c6970bf1\\3\\p179plhnvg1c4r1ggcrrt1gfntli8.jpg',NULL),(12,'p179plhnvh1fm7cs63mnl8476l9.jpg','775702','file',3,'http://localhostuastravel.com/resource\\post_images/a/a7/a7c40a50\\3\\p179plhnvh1fm7cs63mnl8476l9.jpg',NULL),(13,'p179plhnvhp7lcb8kql1svspiqa.jpg','780831','file',3,'http://localhostuastravel.com/resource\\post_images/b/b5/b5200ba1\\3\\p179plhnvhp7lcb8kql1svspiqa.jpg',NULL),(14,'p179plhnvh1djlceut3mjr417s5b.jpg','561276','file',3,'http://localhostuastravel.com/resource\\post_images/b/bc/bc010b4f\\3\\p179plhnvh1djlceut3mjr417s5b.jpg',NULL),(15,'p179plhnvh18p66dr1oit1qa11chnc.jpg','777835','file',3,'http://localhostuastravel.com/resource\\post_images/c/c8/c8e10baa\\3\\p179plhnvh18p66dr1oit1qa11chnc.jpg',NULL),(16,'p179plhnvh1ugttpm1tdc1757epud.jpg','620888','file',3,'http://localhostuastravel.com/resource\\post_images/c/c8/c8cf0bd1\\3\\p179plhnvh1ugttpm1tdc1757epud.jpg',NULL),(17,'p17a3c436k1usi2ae11lnsl1i904.png','17511','file',720095,'http://localhostuastravel.com/resource\\post_images/a/a2/a2a70a17\\11\\p17a3c436k1usi2ae11lnsl1i904.png',NULL),(18,'p17a3cakc01ei21d2m1fmk119qqf26.PNG','458973','file',720095,'http://localhostuastravel.com/resource\\post_images/b/b8/b8b20a61\\11\\p17a3cakc01ei21d2m1fmk119qqf26.PNG',NULL),(19,'_2','0','file',NULL,'http://localhostuastravel.com/resource\\post_images/0/00/00000001\\\\_2',0),(20,'p17advt3bnfesqcd81l1sla1a664.png','1475709','file',NULL,'http://localhostuastravel.com/resource\\post_images/b/b9/b91f0aec\\\\p17advt3bnfesqcd81l1sla1a664.png',0),(21,'p17ae01jnt1ng5f6pd5mhdnlk4.png','668079','file',NULL,'http://localhostuastravel.com/resource\\post_images/9/9a/9a850a51\\\\p17ae01jnt1ng5f6pd5mhdnlk4.png',0),(22,'p17ae0a3no1dls1ean1m31hcn1fl54.png','668079','file',720095,'http://localhostuastravel.com/resource\\post_images/c/c2/c2870b33\\12\\p17ae0a3no1dls1ean1m31hcn1fl54.png',NULL),(23,'p17ae0dn82c5s1gcv1uau1ar2u4r4.png','668079','file',731384,'http://localhostuastravel.com/resource\\post_images/b/b6/b6560afb\\13\\p17ae0dn82c5s1gcv1uau1ar2u4r4.png',NULL),(24,'p17ae0grjs1cab1immnp71nc18a14.png','668079','file',731384,'http://localhostuastravel.com/resource\\post_images/b/be/be6a0b09\\14\\p17ae0grjs1cab1immnp71nc18a14.png',1),(25,'p17ae0p7rm14q21shi1q2fsjo1t56.png','1475709','file',731384,'http://localhostuastravel.com/resource\\post_images/b/b5/b50c0adb\\14\\p17ae0p7rm14q21shi1q2fsjo1t56.png',1),(26,'p17aefad161g2pedn1r7r8q53u84.png','668079','file',1,'http://localhostuastravel.com/resource\\post_images/a/aa/aa320a53\\1\\p17aefad161g2pedn1r7r8q53u84.png',1),(27,'p17aefad171vtj1ngjb9m10q0pq15.png','1475709','file',1,'http://localhostuastravel.com/resource\\post_images/b/b9/b9be0aeb\\1\\p17aefad171vtj1ngjb9m10q0pq15.png',1),(28,'p17agonkn518tmprd155atl7187o4.png','668079','file',25,'http://localhostuastravel.com/resource\\post_images/b/bd/bd070ae5\\25\\p17agonkn518tmprd155atl7187o4.png',1),(29,'p17agonkn5gqu1p7718j59r8tm75.png','1475709','file',25,'http://localhostuastravel.com/resource\\post_images/b/b1/b1eb0a93\\25\\p17agonkn5gqu1p7718j59r8tm75.png',1),(30,'p17agonkn51919q9f1kcm1tgnjtf6.PNG','458973','file',25,'http://localhostuastravel.com/resource\\post_images/b/b9/b9930ae3\\25\\p17agonkn51919q9f1kcm1tgnjtf6.PNG',1),(31,'p17ao79d3i25c1vtqtk7gvh7954.png','668079','file',NULL,'http://localhostuastravel.com/resource\\post_images/9/9e/9eb90a16\\\\p17ao79d3i25c1vtqtk7gvh7954.png',NULL),(32,'p17ao79d3k1khjqtbha014v41qka5.png','1475709','file',NULL,'http://localhostuastravel.com/resource\\post_images/b/b7/b7910aee\\\\p17ao79d3k1khjqtbha014v41qka5.png',NULL),(33,'p17ao80dg510dr1ikd17fv6ch111s4.png','668079','file',0,'http://localhostuastravel.com/resource\\post_images/b/b7/b7ab0aa3\\0\\p17ao80dg510dr1ikd17fv6ch111s4.png',2),(34,'p17ao80dg6qce1mktbpbh7j16ct5.png','1475709','file',0,'http://localhostuastravel.com/resource\\post_images/b/b1/b1740aeb\\0\\p17ao80dg6qce1mktbpbh7j16ct5.png',2),(35,'p17aob323a1q1hu0f10tsuhe11oq4.png','668079','file',310525,'http://localhostuastravel.com/resource\\post_images/b/b0/b0d60abd\\310525\\p17aob323a1q1hu0f10tsuhe11oq4.png',2),(36,'p17aob323bcm719fcfvr1c17nal5.png','1475709','file',310525,'http://localhostuastravel.com/resource\\post_images/a/a7/a7890a6c\\310525\\p17aob323bcm719fcfvr1c17nal5.png',2),(37,'p17aobpim217hm191tccv9f51524.png','668079','file',856079,'http://localhostuastravel.com/resource\\post_images/a/ab/ab110a1e\\856079\\p17aobpim217hm191tccv9f51524.png',2),(38,'p17aobpim36ap1se91m65o8kbam5.png','1475709','file',856079,'http://localhostuastravel.com/resource\\post_images/b/b1/b11d0ac0\\856079\\p17aobpim36ap1se91m65o8kbam5.png',2),(39,'p17aoc6qkg19uj1tm91324duicjn4.png','668079','file',720095,'http://localhostuastravel.com/resource\\post_images/b/b9/b93f0b07\\720095\\p17aoc6qkg19uj1tm91324duicjn4.png',2),(40,'p17aoc6qkhqqu4e613jd14si197p5.png','1475709','file',720095,'http://localhostuastravel.com/resource\\post_images/b/bc/bc5c0ad8\\720095\\p17aoc6qkhqqu4e613jd14si197p5.png',2),(41,'p17aocb3rb1f191u8n14381d237so4.png','668079','file',731384,'http://localhostuastravel.com/resource\\post_images/b/b5/b5ab0a4c\\731384\\p17aocb3rb1f191u8n14381d237so4.png',2),(42,'p17aocb3rcdapf0l10h51e5mq6e5.png','1475709','file',731384,'http://localhostuastravel.com/resource\\post_images/b/b0/b0810a97\\731384\\p17aocb3rcdapf0l10h51e5mq6e5.png',2),(43,'p17aocs8b2tpusau1h1d1ljhvu14.png','668079','file',605975,'http://localhostuastravel.com/resource\\post_images/b/ba/ba510b4d\\605975\\p17aocs8b2tpusau1h1d1ljhvu14.png',2),(44,'p17aocs8b31m8j1h91gphk8ms4b5.png','1475709','file',605975,'http://localhostuastravel.com/resource\\post_images/a/ab/aba00a8f\\605975\\p17aocs8b31m8j1h91gphk8ms4b5.png',2),(45,'p17aodrr921du6cfh1v5q1re7123u4.png','668079','file',17,'http://localhostuastravel.com/resource\\post_images/c/c4/c4170b0b\\17\\p17aodrr921du6cfh1v5q1re7123u4.png',2),(46,'p17aodrr934mh6kh1fjgc8n188d5.png','1475709','file',17,'http://localhostuastravel.com/resource\\post_images/a/af/afe00a8d\\17\\p17aodrr934mh6kh1fjgc8n188d5.png',2),(47,'p17aoev9691t8i18kg124s1nic149h4.png','668079','file',22,'http://localhostuastravel.com/resource\\post_images/c/c2/c2380acf\\135897\\p17aoev9691t8i18kg124s1nic149h4.png',2),(48,'p17aoev96bm4edtg1j6m1cdeais5.png','1475709','file',22,'http://localhostuastravel.com/resource\\post_images/b/b4/b4570b1a\\135897\\p17aoev96bm4edtg1j6m1cdeais5.png',2),(49,'p17aof873dlqh1onknd1cpvvgk4.png','668079','file',22,'http://localhostuastravel.com/resource\\post_images/a/aa/aafd0b0e\\22\\p17aof873dlqh1onknd1cpvvgk4.png',2),(50,'p17aof873e7ut10761b8v18161lmk5.png','1475709','file',22,'http://localhostuastravel.com/resource\\post_images/b/b0/b01e0a32\\22\\p17aof873e7ut10761b8v18161lmk5.png',2),(51,'p17aqhduro1tdim6n17451n02clp4.png','668079','file',30,'http://localhostuastravel.com/resource\\post_images/c/c0/c04a0b08\\30\\p17aqhduro1tdim6n17451n02clp4.png',1),(52,'p17aqhdurp19ndton196aacq1bbp5.png','1475709','file',30,'http://localhostuastravel.com/resource\\post_images/c/c6/c6ba0b9e\\30\\p17aqhdurp19ndton196aacq1bbp5.png',1),(53,'p17avg7gjn18931olq1htn199f1dn74.png','668079','file',1,'http://localhostuastravel.com/resource\\post_images/c/cb/cb2f0b44\\1\\p17avg7gjn18931olq1htn199f1dn74.png',1),(54,'p17avg7gjn4m41l8v1gldg1816955.png','1475709','file',1,'http://localhostuastravel.com/resource\\post_images/b/b5/b5f10a62\\1\\p17avg7gjn4m41l8v1gldg1816955.png',1),(55,'p17avhhqh7ie21t5iqg211rk1l934.png','668079','file',1,'http://localhostuastravel.com/resource\\post_images/b/bc/bc6d0acc\\1\\p17avhhqh7ie21t5iqg211rk1l934.png',1),(56,'p17avhhqh8o0tnsjqrf1vrqi4f5.png','1475709','file',1,'http://localhostuastravel.com/resource\\post_images/b/b6/b6e40b6d\\1\\p17avhhqh8o0tnsjqrf1vrqi4f5.png',1);

/*Table structure for table `ci_language` */

DROP TABLE IF EXISTS `ci_language`;

CREATE TABLE `ci_language` (
  `lang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang_acronym` varchar(255) DEFAULT NULL,
  `lang_name` varchar(255) DEFAULT NULL,
  `lang_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `ci_language` */

insert  into `ci_language`(`lang_id`,`lang_acronym`,`lang_name`,`lang_image`) values (1,'TH','Thai',NULL),(2,'EN','English',NULL);

/*Table structure for table `ci_location` */

DROP TABLE IF EXISTS `ci_location`;

CREATE TABLE `ci_location` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `loc_body` text CHARACTER SET utf8,
  `loc_status` int(1) DEFAULT NULL,
  `loc_level` int(3) DEFAULT NULL,
  `loc_group` int(2) DEFAULT NULL,
  `loc_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `loc_cr_date` date DEFAULT NULL,
  `loc_cr_uid` int(11) DEFAULT NULL,
  `loc_lu_date` date DEFAULT NULL,
  `loc_lu_uid` int(11) DEFAULT NULL,
  `loc_longitude` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `loc_latitude` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `loc_suggestion` text CHARACTER SET utf8,
  `loc_route` text CHARACTER SET utf8,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `ci_location` */

insert  into `ci_location`(`loc_id`,`loc_title`,`loc_body`,`loc_status`,`loc_level`,`loc_group`,`loc_url`,`loc_cr_date`,`loc_cr_uid`,`loc_lu_date`,`loc_lu_uid`,`loc_longitude`,`loc_latitude`,`loc_suggestion`,`loc_route`) values (1,'เขาตะเกียบ','<blockquote>\n<p>ให้นักท่องเที่ยวได้สนุกสนานหลายอย่าง เช่น เล่นน้ำ อาบแดด ขี่ม้า นั่งเรือยาง เล่นเจ็ทสกี ที่บริเวณชายหาดเขาตะเกียบมีที่พัก และร้านอาหารเปิดให้บริการหลายแห่ง</p>\n</blockquote>\n<p>เขาตะเกียบ ตั้งอยู่ทางใต้ของอำเภอหัวหิน จังหวัดประจวบคีรีขันธ์ ห่างจากตัวเมืองหัวหินประมาณ 7 กิโลเมตร เป็นเขาที่ยื่นออกไปในทะเล และมีโขดหินสวยงาม ความสูงประมาณ 272 เมตร ที่บริเวณเชิงเขามีพระพุทธรูปปางห้ามสมุทรองค์ใหญ่หันหน้าออกสู่ทะเล ซึ่งเป็นเหมือนสัญลักษณ์ของเขาตะเกียบตั้งอยู่ บนเขาเป็นที่ตั้งของวัดตะเกียบที่มีจุดชมวิวที่สวยงาม ตรงข้ามกับเขาตะเกียบยังมีภูเขาอีกลูกหนึ่งชื่อ เขาไกรลาส เป็นที่ตั้งของวัดเขาไกรลาส</p>\n<hr />\n<p>ชายหาดเขาตะเกียบเป็นชายหาดฝั่งอ่าวไทย มีความยาวประมาณ 1.5 กิโลเมตร มีความลาดชันน้อย ทรายขาวละเอียด ชายหาดเขาตะเกียบมีกิจกรรมต่างๆ ให้นักท่องเที่ยวได้สนุกสนานหลายอย่าง เช่น เล่นน้ำ อาบแดด ขี่ม้า นั่งเรือยาง เล่นเจ็ทสกี ที่บริเวณชายหาดเขาตะเกียบมีที่พัก และร้านอาหารเปิดให้บริการหลายแห่ง</p>\n<hr />\n<div class=\"flex-video\"><iframe src=\"http://www.youtube.com/embed/Eo2D8Ez3WAo\" frameborder=\"0\" width=\"560\" height=\"315\"></iframe></div>\n<p>ชายหาดเขาตะเกียบเป็นชายหาดฝั่งอ่าวไทย มีความยาวประมาณ 1.5 กิโลเมตร มีความลาดชันน้อย ทรายขาวละเอียด ชายหาดเขาตะเกียบมีกิจกรรมต่างๆ ให้นักท่องเที่ยวได้สนุกสนานหลายอย่าง เช่น เล่นน้ำ อาบแดด ขี่ม้า นั่งเรือยาง เล่นเจ็ทสกี ที่บริเวณชายหาดเขาตะเกียบมีที่พัก และร้านอาหารเปิดให้บริการหลายแห่ง</p>',0,NULL,NULL,'เขาตะเกียบ','2012-10-25',0,'2012-11-02',0,'98.34449018537998','7.951172174578056','',''),(2,'โขมพัสตร์','<p>โขมพัสตร์ ก่อตั้งขึ้นที่อำเภอหัวหิน ในปี พ.ศ. 2491 เป็นร้านผ้าที่อยู่คู่เมืองหัวหินมานาน ตั้งแต่สมัยหลังสงครามโลกครั้งที่ 2 โดยพลเอกพระวรวงศ์เธอ พระองค์เจ้าบวรเดช และ หม่อมเจ้าหญิงผจงจิตร กฤดากร ได้ทรงสร้างโรงงานย้อมและพิมพ์ผ้าขึ้นที่หัวหิน บนพื้นที่ผืนเดียวกับที่ตั้งร้านในปัจจุบัน สมัยนั้นเป็นโรงงานเล็กๆ มีคนงานเพียง 20 คน จำลองรูปแบบมาจากโรงงานที่ทรงเคยทำสมัยลี้ภัยการเมืองไปประทับที่ไซง่อน ประเทศเวียดนาม ทรงเลือกหัวหิน เพราะทรงมีที่ดินอยู่แล้ว และทรงมีเจตนาให้ชาวบ้านมีงานทำ มีรายได้เลี้ยงดูครอบครัวให้มีความเป็นอยู่ดีขึ้น<br />ปัจจุบันบริหารงานโดย คุณอัสสยา คงสิริ ทายาทรุ่นที่ 3 ที่สานต่อเจตนารมณ์ของบรรพบุรุษและสืบตำนานการพิมพ์ผ้าไทยแบบดั้งเดิมเรื่อยมา โดยที่ปัจจุบันมีคนงานประมาณ 80 คน และทางร้านยังคงพิมพ์ผ้าด้วยมือเหมือนสมัยก่อน เริ่มจากการผสมสี ทำกรอบเขียนลาย ถ่ายลงกรอบ ใช้มือพิมพ์ แต่ได้มีการนำเครื่องจักรเข้ามาใช้บ้างในบางกระบวนการ เช่น ซัก อบ รีดผ้าให้แห้งไม่ให้สีตกหลังจากพิมพ์ลายผ้าเสร็จแล้วเท่านั้น ส่วนการดำเนินธุรกิจยังเหมือนในอดีต ที่ทำเป็นธุรกิจขนาดเล็กๆ ไม่ได้ทำการตลาดใหญ่โตฟุ่มเฟือย และสินค้ายังคงมีเอกลักษณ์ความงามเฉพาะของโขมพัสตร์เช่นเดิม</p>',0,NULL,NULL,'?????????','2012-10-25',0,'2012-10-25',0,'98.34449018537998','7.951172174578056',NULL,NULL),(11,'Unnamed Location','',0,NULL,NULL,'unnamed-location','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(12,'Unnamed Location','',0,NULL,NULL,'unnamed-location','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(13,'Unnamed Location','',0,NULL,NULL,'unnamed-location','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(14,'dsfdsfdsf','<p>sdfsdfsdfdsfdsf</p>',0,NULL,NULL,'dsfdsfdsf','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(15,'Unnamed Location','',0,NULL,NULL,'unnamed-location','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(16,'Unnamed Location','',0,NULL,NULL,'unnamed-location','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(17,'dsfsdf','<p>dsfsdafdasf</p>',0,NULL,NULL,'dsfsdf','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(18,'โอทะเลแสนงาม','<p>โอทะเลแสนงาม</p>',0,NULL,NULL,'โอทะเลแสนงาม','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(19,'โอทะเลแสนงาม','<p>โอทะเลแสนงาม</p>',0,NULL,NULL,'โอทะเลแสนงาม','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(20,'โอทะเลแสนงาม','<p>โอทะเลแสนงาม</p>',0,NULL,NULL,'โอทะเลแสนงาม','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(21,'โอทะเลแสนงาม','<p>โอทะเลแสนงาม</p>',0,NULL,NULL,'โอทะเลแสนงาม','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(22,'sdfsdf','',0,NULL,NULL,'sdfsdf','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(23,'jquerytagjquerytagjquerytag','<p><span>jquerytag</span><span>jquerytag</span><span>jquerytag</span><span>jquerytag</span><span>jquerytag</span></p>',0,NULL,NULL,'jquerytagjquerytagjquerytag','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(24,'asdfasdfdsaf','<p>sdafasdfsdafsdaf</p>',0,NULL,NULL,'asdfasdfdsaf','2012-10-26',0,'2012-10-26',0,'98.34449018537998','7.951172174578056',NULL,NULL),(25,'กมลา','<p>fasdfsdafsdfsaf</p>',0,NULL,NULL,'กมลา','2012-10-27',0,'2012-10-27',0,'98.2686158567667','7.933490641667898',NULL,NULL),(26,'Unnamed Location','',0,NULL,NULL,'unnamed-location','2012-10-30',0,'2012-10-30',0,'98.376846','7.887868',NULL,NULL),(27,'asdasdsad','<p>Body</p>',0,NULL,NULL,'asdasdsad','2012-10-31',0,'2012-10-31',0,'98.34449018537998','7.951172174578056','<h3 class=\"text_big\">Suggestion</h3>','<h3 class=\"text_big\">Route</h3>'),(28,'adfafa','',0,NULL,NULL,'adfafa','2012-10-31',0,'2012-10-31',0,'98.34449018537998','7.951172174578056','',''),(29,'fssdfdsfds','',0,NULL,NULL,'fssdfdsfds','2012-10-31',0,'2012-10-31',0,'98.34449018537998','7.951172174578056','',''),(30,'TTTTTT23','<p>AAAAs23</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p><img src=\"../../../resource\\post_images/c/c0/c04a0b08\\30\\p17aqhduro1tdim6n17451n02clp4.png\" alt=\"\" width=\"561\" height=\"374\" /></p>',0,NULL,NULL,'tttttt23','2012-10-31',0,'2012-10-31',0,'98.33796705305576','8.032769348139716','<p>BBBBBB23</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>','<p>CCCCCC23</p>');

/*Table structure for table `ci_tag` */

DROP TABLE IF EXISTS `ci_tag`;

CREATE TABLE `ci_tag` (
  `tag_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag_language_id` int(11) DEFAULT NULL,
  `tag_parent` int(11) DEFAULT NULL,
  `tag_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `ci_tag` */

insert  into `ci_tag`(`tag_id`,`tag_language_id`,`tag_parent`,`tag_name`) values (1,NULL,NULL,'asdfsadfs'),(2,NULL,NULL,'dfsd'),(3,NULL,NULL,'f'),(4,NULL,NULL,'sad'),(5,NULL,NULL,'fs'),(6,NULL,NULL,'adf'),(7,NULL,NULL,''),(8,NULL,NULL,'jquerytagjquerytagjquerytag'),(9,NULL,NULL,'jquerytag'),(10,NULL,NULL,'asd'),(11,NULL,NULL,'wadw'),(12,NULL,NULL,'d'),(13,NULL,NULL,'sadf'),(14,NULL,NULL,'sdaf'),(15,NULL,NULL,'sdf'),(16,NULL,NULL,'ds'),(17,NULL,NULL,'TagA'),(18,NULL,NULL,'TagB'),(19,NULL,NULL,'sd'),(20,NULL,NULL,'ทดสอบ 1'),(21,NULL,NULL,'asdasd'),(22,NULL,NULL,'www'),(23,NULL,NULL,'errtyyyy');

/*Table structure for table `ci_taglocation` */

DROP TABLE IF EXISTS `ci_taglocation`;

CREATE TABLE `ci_taglocation` (
  `tal_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tal_location_id` int(11) DEFAULT NULL,
  `tal_tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `ci_taglocation` */

insert  into `ci_taglocation`(`tal_id`,`tal_location_id`,`tal_tag_id`) values (1,24,13),(2,24,14),(3,24,15),(4,24,16),(5,24,3),(6,24,17),(7,24,18),(8,1,7),(9,1,7),(10,1,7),(11,1,7),(12,1,7),(13,1,7),(14,1,7),(15,1,7),(16,1,7),(17,1,7),(18,25,15),(19,25,19),(20,25,5),(21,25,2),(22,25,7),(24,30,1),(25,30,22),(26,30,23);

/*Table structure for table `ci_tagtour` */

DROP TABLE IF EXISTS `ci_tagtour`;

CREATE TABLE `ci_tagtour` (
  `tat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tat_tag_id` int(11) DEFAULT NULL,
  `tat_tour_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `ci_tagtour` */

insert  into `ci_tagtour`(`tat_id`,`tat_tag_id`,`tat_tour_id`) values (35,7,12),(34,7,11),(33,7,10),(32,7,9),(28,7,1),(31,7,3),(7,1,4),(8,2,4),(9,3,4),(10,4,4),(11,5,4),(12,6,4),(13,1,5),(14,2,5),(15,3,5),(16,4,5),(17,5,5),(18,6,5),(36,20,13),(37,21,13),(38,20,16),(39,21,16),(40,7,17),(41,7,22);

/*Table structure for table `ci_tour` */

DROP TABLE IF EXISTS `ci_tour`;

CREATE TABLE `ci_tour` (
  `tou_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tou_language_id` int(11) DEFAULT NULL,
  `tou_code` varchar(255) DEFAULT NULL,
  `tou_name` varchar(255) DEFAULT NULL,
  `tou_description` text,
  `tou_detail` text,
  `tou_included` text,
  `tou_remark` text,
  `tou_discount` int(11) DEFAULT NULL,
  `tou_net_adult_price` int(50) DEFAULT NULL,
  `tou_net_child_price` int(50) DEFAULT NULL,
  `tou_sale_adult_price` int(50) DEFAULT NULL,
  `tou_sale_child_price` int(50) DEFAULT NULL,
  `tou_amount_time` float DEFAULT NULL,
  `tou_start_date` date DEFAULT NULL,
  `tou_end_date` date DEFAULT NULL,
  `tou_start_time1` time DEFAULT NULL,
  `tou_end_time1` time DEFAULT NULL,
  `tou_longitude` varchar(255) DEFAULT NULL,
  `tou_latitude` varchar(255) DEFAULT NULL,
  `tou_cr_date` timestamp NULL DEFAULT NULL,
  `tou_cr_uid` int(11) DEFAULT NULL,
  `tou_lu_date` timestamp NULL DEFAULT NULL,
  `tou_lu_uid` int(11) DEFAULT NULL,
  `tou_start_time2` time DEFAULT NULL,
  `tou_end_time2` time DEFAULT NULL,
  PRIMARY KEY (`tou_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `ci_tour` */

insert  into `ci_tour`(`tou_id`,`tou_language_id`,`tou_code`,`tou_name`,`tou_description`,`tou_detail`,`tou_included`,`tou_remark`,`tou_discount`,`tou_net_adult_price`,`tou_net_child_price`,`tou_sale_adult_price`,`tou_sale_child_price`,`tou_amount_time`,`tou_start_date`,`tou_end_date`,`tou_start_time1`,`tou_end_time1`,`tou_longitude`,`tou_latitude`,`tou_cr_date`,`tou_cr_uid`,`tou_lu_date`,`tou_lu_uid`,`tou_start_time2`,`tou_end_time2`) values (1,NULL,NULL,'sdfsadfds','<p>fadsfasdfsfsfdsaf</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012-10-10','2012-10-08','06:39:00','06:32:00','','',NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,'sdfsadfds','<p>fadsfasdfsfsfdsaf</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012-10-10','2012-10-08','06:39:00','06:32:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,'sdfsadfds','<p>fadsfasdfsfsfdsaffadsfasdfsfsfdsaffadsfasdfsfsfdsaffadsfasdfsfsfdsaffadsfasdfsfsfdsaffadsfasdfsfsfdsaffadsfasdfsfsfdsaf</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012-10-10','2012-10-08','06:39:00','06:32:00','98.30878461897373','7.834187956583079',NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,'sdfsadfds','<p>fadsfasdfsfsfdsaf</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012-10-10','2012-10-08','06:39:00','06:32:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,'sdfsadfds','<p>fadsfasdfsfsfdsaf</p>',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012-10-10','2012-10-08','06:39:00','06:32:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,'sdfdsfdsfsdf','<p>sfsdfds</p>','<p>fdsfsfs</p>','<p>dsfsdfsd</p>','<p>sdfsdfsd</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(7,NULL,NULL,'sdfdsfdsfsdf','<p>sfsdfds</p>','<p>fdsfsfs</p>','<p>dsfsdfsd</p>','<p>sdfsdfsd</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(8,NULL,NULL,'sdfdsfdsfsdf','<p>sfsdfds</p>','<p>fdsfsfs</p>','<p>dsfsdfsd</p>','<p>sdfsdfsd</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(9,NULL,NULL,'sdfdsfdsfsdf','<p>sfsdfds</p>','<p>fdsfsfs</p>','<p>dsfsdfsd</p>','<p>sdfsdfsd</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(10,NULL,NULL,'sdfdsfdsfsdf','<p>sfsdfds</p>','<p>fdsfsfs</p>','<p>dsfsdfsd</p>','<p>sdfsdfsd</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(11,NULL,NULL,'sadfsadfdsfafsd','<p>asdfasdfasf</p>','<p>asdfasdfsdaf</p>','<p>asdfasdfsdaf</p>','<p>asdfasfsadfsadfs</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(12,NULL,NULL,'sadfsadfdsfafsd','<p>asdfasdfasf</p>','<p>asdfasdfsdaf</p>','<p>asdfasdfsdaf</p>','<p>asdfasfsadfsadfs</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(13,NULL,NULL,'ทดสอบ 1','<p>ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>',NULL,NULL,NULL,NULL,NULL,NULL,'2012-10-02','2012-10-10','06:00:00','08:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'05:00:00','14:00:00'),(14,NULL,NULL,'ทดสอบ 1','<p>ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>',NULL,NULL,NULL,NULL,NULL,NULL,'2012-10-02','2012-10-10','06:00:00','08:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'05:00:00','14:00:00'),(15,NULL,NULL,'ทดสอบ 1','<p>ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>',NULL,NULL,NULL,NULL,NULL,NULL,'2012-10-02','2012-10-10','06:00:00','08:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'05:00:00','14:00:00'),(16,NULL,NULL,'ทดสอบ 1','<p>ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>','<p>ทดสอบ 1ทดสอบ 1ทดสอบ 1ทดสอบ 1</p>',NULL,NULL,NULL,NULL,NULL,NULL,'2012-10-02','2012-10-10','06:00:00','08:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'05:00:00','14:00:00'),(17,NULL,NULL,'asfs','<p>fsadf</p>\r\n<p>+sdfs</p>\r\n<p>daf</p>','<p>fsadf</p>\r\n<p>+sdfs</p>\r\n<p>daf</p>','<p>fsadf</p>\r\n<p>+sdfs</p>\r\n<p>daf</p>','<p>fsadf</p>\r\n<p>+sdfs</p>\r\n<p>daf</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(18,NULL,NULL,'TSTETST','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(19,NULL,NULL,'TSTETST','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(20,NULL,NULL,'TSTETST','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(21,NULL,NULL,'TSTETST','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00'),(22,NULL,NULL,'TSTETST','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>','<p>TSTETST</p>',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00','0000-00-00','00:00:00','00:00:00','98.376846','7.887868',NULL,NULL,NULL,NULL,'00:00:00','00:00:00');

/*Table structure for table `ci_user` */

DROP TABLE IF EXISTS `ci_user`;

CREATE TABLE `ci_user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(255) DEFAULT NULL,
  `usr_password` varchar(255) DEFAULT NULL,
  `usr_facebook_id` varchar(50) DEFAULT NULL,
  `usr_status` int(1) DEFAULT '0',
  `usr_level` int(3) DEFAULT '100',
  `usr_group` int(11) DEFAULT '0',
  `usr_email` varchar(255) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `ci_user` */

insert  into `ci_user`(`usr_id`,`usr_username`,`usr_password`,`usr_facebook_id`,`usr_status`,`usr_level`,`usr_group`,`usr_email`) values (1,'unzo','ragther','1',1,900,1,'kwon.unzo@gmail.com'),(2,'unzo01','ragther','2',0,100,0,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
