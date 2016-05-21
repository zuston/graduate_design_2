-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: jxc_system
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cancel_info`
--

DROP TABLE IF EXISTS `cancel_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cancel_info` (
  `cancel_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `cancel_reason` varchar(24) DEFAULT NULL,
  `cancel_type` tinyint(11) DEFAULT NULL COMMENT '1:è¿›è´§çš„é€€è´§2ï¼šé”€å”®çš„é€€è´§',
  `cancel_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`cancel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cancel_info`
--

LOCK TABLES `cancel_info` WRITE;
/*!40000 ALTER TABLE `cancel_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `cancel_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_company_name` varchar(24) DEFAULT NULL,
  `customer_company_phone` varchar(24) DEFAULT NULL,
  `customer_contact_name` varchar(24) DEFAULT NULL,
  `customer_contact_phone` varchar(24) DEFAULT NULL,
  `customer_contact_qq` varchar(24) DEFAULT NULL,
  `customer_contact_address` varchar(24) DEFAULT NULL,
  `customer_state` tinyint(11) DEFAULT NULL COMMENT '0:åˆ é™¤1ï¼šæœªåˆ é™¤',
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (2,'华联超市','13862634250','姜峰','15705213532','731673917','扬州高邮',1),(4,'hua','1892','hua','173','7343','hs',NULL),(5,'asd','sad','sda','sd','dsa','sad',NULL),(9,'沃尔玛','57227310','许国通','15705213532','731673917','苏州昆山',1),(10,'三星','57227310','小马哥','15705213532','731673917','铜山',1),(11,'中信','57227310','张韬','15705213532','731673917','上海徐汇',1);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_code` varchar(24) DEFAULT NULL COMMENT 'å•†å“æ¡å½¢ç ',
  `product_name` varchar(24) DEFAULT NULL COMMENT 'å•†å“å',
  `provider_id` int(11) DEFAULT NULL COMMENT 'å•†å“æ¥æº',
  `product_type` int(11) DEFAULT NULL COMMENT 'å•†å“ç±»åˆ«',
  `product_brand` varchar(24) DEFAULT NULL COMMENT 'å•†å“å“ç‰Œ',
  `product_cost` int(11) DEFAULT NULL COMMENT 'å•†å“æˆæœ¬',
  `product_price` int(11) DEFAULT NULL COMMENT 'å•†å“é›¶å”®ä»·',
  `product_unit` varchar(24) DEFAULT NULL COMMENT 'å•†å“å•ä½',
  `product_count` int(11) DEFAULT NULL COMMENT 'å•†å“æ•°é‡',
  `product_unit_count` int(11) DEFAULT NULL COMMENT 'å•†å“å•ä½æ•°é‡',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'','',NULL,0,'',0,0,NULL,99,NULL),(2,'1001','cake',NULL,0,'mary',100,200,NULL,15,NULL),(3,'1001','cake',NULL,0,'mary',100,200,NULL,244,NULL),(4,'1002','pie',NULL,0,'htc',10,34,NULL,12,NULL),(5,'1003','pie',NULL,0,'htc',10,34,NULL,5,NULL),(6,'23233','晨光铅笔',NULL,0,'晨光',200,350,NULL,7,NULL),(7,'E1463305106','手机',NULL,0,'天机',3400,7800,NULL,110,NULL),(8,'E1463305765867','肥皂',5,3,'dove',3,NULL,NULL,85,NULL),(9,'E1463305934863','macbook pro',5,1,'apple',8800,NULL,NULL,352,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider` (
  `provider_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `provider_company_name` varchar(24) DEFAULT NULL,
  `provider_company_phone` varchar(24) DEFAULT NULL,
  `provider_contact_name` varchar(24) DEFAULT NULL,
  `provider_contact_phone` varchar(24) DEFAULT NULL,
  `provider_contact_qq` varchar(24) DEFAULT NULL,
  `provider_contact_address` varchar(24) DEFAULT NULL,
  `provider_state` tinyint(11) DEFAULT NULL COMMENT '0:åˆ é™¤1ï¼šæœªåˆ é™¤',
  PRIMARY KEY (`provider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider`
--

LOCK TABLES `provider` WRITE;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
INSERT INTO `provider` VALUES (6,'乐视','57227310','伊月挺','57227310','731673197','北京乐视网',1),(5,'中兴','1909230832','张恒','123244545','2324334545','徐州',1);
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_info`
--

DROP TABLE IF EXISTS `purchase_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_info` (
  `purchase_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT 'å•†å“id',
  `purchase_count` int(11) DEFAULT NULL COMMENT 'è¿›è´§æ•°é‡',
  `purchase_order_id` varchar(20) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_info`
--

LOCK TABLES `purchase_info` WRITE;
/*!40000 ALTER TABLE `purchase_info` DISABLE KEYS */;
INSERT INTO `purchase_info` VALUES (1,14,9,10,'1001','2016-05-09 13:46:31',5),(2,14,5,12,'1002','2016-05-09 13:50:15',5),(3,14,5,20,'1004','2016-05-09 13:50:39',5),(4,14,6,20,'1005','2016-05-09 13:51:13',5),(5,14,6,7,'1004','2016-05-11 13:26:02',5),(6,4,1,100,'1005','2016-05-11 13:33:36',5),(7,4,3,234,'2009','2016-05-11 13:34:08',5),(8,4,2,10,'3434','2016-05-15 17:24:52',5),(9,4,7,100,'1235','2016-05-15 17:38:26',5),(10,4,8,100,'F1463305765156','2016-05-15 17:49:25',5),(11,4,9,232,'F1463305934349','2016-05-15 17:52:14',5),(12,4,8,20,'F1463306082115','2016-05-15 17:54:42',5),(13,4,8,23,'F1463306211449','2016-05-15 17:56:51',5),(14,4,8,12,'F1463306268731','2016-05-15 17:57:48',5),(15,4,8,12,'F1463308932570','2016-05-15 18:42:12',5),(16,4,8,12,'F1463309002869','2016-05-15 18:43:22',5),(17,0,0,0,'F1463309116671','2016-05-15 18:45:16',5),(18,4,8,12,'F1463309123652','2016-05-15 18:45:23',5),(19,4,8,12,'F1463309148578','2016-05-15 18:45:48',5),(20,4,9,23,'F1463309230743','2016-05-15 18:47:10',5),(21,4,9,90,'F1463309277590','2016-05-15 18:47:57',5),(22,4,9,10,'F1463309320323','2016-05-15 18:48:40',5),(23,4,9,10,'F1463309452938','2016-05-15 18:50:52',5),(24,4,9,10,'F1463738256781','2016-05-20 17:57:36',5),(25,4,7,10,'F1463810699504','2016-05-21 14:04:59',NULL),(26,4,9,10,'F1463811450502','2016-05-21 14:17:30',6);
/*!40000 ALTER TABLE `purchase_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sell_info`
--

DROP TABLE IF EXISTS `sell_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sell_info` (
  `sell_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL COMMENT 'å•†å“id',
  `sell_count` int(11) DEFAULT NULL COMMENT 'é”€å”®æ•°é‡',
  `sell_order_id` varchar(20) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sell_info`
--

LOCK TABLES `sell_info` WRITE;
/*!40000 ALTER TABLE `sell_info` DISABLE KEYS */;
INSERT INTO `sell_info` VALUES (5,2,4,'1212','2016-05-15 17:09:48',13,10),(6,2,1,'2323','2016-05-15 17:11:17',13,2),(7,8,20,'G1463312185125','2016-05-15 19:36:25',13,9),(8,8,78,'G1463312210813','2016-05-15 19:36:50',13,2),(9,8,20,'G1463731536935','2016-05-20 16:05:36',17,10),(10,9,10,'G1463737959336','2016-05-20 17:52:39',13,10);
/*!40000 ALTER TABLE `sell_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(24) DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT NULL COMMENT '1:ç®¡ç†å‘˜2:è¿›è´§å‘˜3ï¼šé”€å”®å‘˜',
  `user_password` varchar(24) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `user_state` tinyint(11) DEFAULT NULL COMMENT '0:åˆ é™¤1ï¼šæœªåˆ é™¤',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (4,'张一',2,'shacha','2016-05-08 00:00:00',1),(11,'shacha',1,'shacha','2016-05-09 04:02:16',1),(12,'张二',2,'shacha','2016-05-09 04:11:56',1),(13,'张三',3,'shacha','2016-05-09 04:17:36',1),(17,'张四',3,'shacha','2016-05-16 12:21:45',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-21  7:06:53
