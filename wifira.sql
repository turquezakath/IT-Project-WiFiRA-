CREATE DATABASE  IF NOT EXISTS `wifira` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wifira`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: wifira
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `accountNo` int(11) NOT NULL,
  `roleId` enum('Admin','Staff') NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `accountStatus` enum('Enable','Disable') NOT NULL,
  `image` longblob,
  PRIMARY KEY (`accountNo`),
  KEY `accountNo` (`accountNo`),
  KEY `accoun_no` (`accountNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'Staff','Alfa Leizel Leones','Baguio City','alfa123','000','Enable',NULL),(2,'Staff','Joneil Argao','Zambales','joneil123','111','Enable',NULL),(3,'Staff','James Anonuevo','Baguio City','james123','222','Disable',NULL),(4,'Staff','Cyrene Jane Dispo','Pangasinan','cyrene123','333','Disable',NULL),(5,'Admin','Lou Philip Beltran','Baguio City','lou123','444','Enable',NULL),(6,'Staff','Katherine Turqueza','Abra','kath123','555','Enable',NULL),(7,'Staff','Maureen Nicole Calpito','Baguio City','mau123','666','Enable',NULL),(8,'Staff','Apollo Joshua Mina','Baguio City','ajm123','777','Enable',NULL),(9,'Admin','Madonna Beltran','Baguio City','pido123','888','Enable',NULL),(10,'Admin','Don Lopen Beltran','Baguio City','Lopen123','999','Enable',NULL);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kiosk machine`
--

DROP TABLE IF EXISTS `kiosk machine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kiosk machine` (
  `kioskId` int(11) NOT NULL,
  `kioskName` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `ipAddress` varchar(45) NOT NULL,
  `kioskStatus` enum('Enable','Disable') NOT NULL,
  PRIMARY KEY (`kioskId`),
  KEY `kioskId` (`kioskId`),
  KEY `kiosk_id` (`kioskId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kiosk machine`
--

LOCK TABLES `kiosk machine` WRITE;
/*!40000 ALTER TABLE `kiosk machine` DISABLE KEYS */;
INSERT INTO `kiosk machine` VALUES (11,'FSGS','SLU Main','192.168.9.2','Enable'),(12,'ASDF','Bakakeng','192.168.9.1','Enable'),(13,'SDFF','UB','192.168.9.3','Enable'),(14,'SCFG','Session','192.168.9.4','Enable'),(15,'WSCF','Burnham','192.168.9.5','Enable');
/*!40000 ALTER TABLE `kiosk machine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `salesId` int(11) NOT NULL,
  `entity` enum('ADMIN','STAFF','KIOSK') NOT NULL,
  `voucherCode` varchar(45) NOT NULL,
  `dateUsed` date NOT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `kioskId` int(11) DEFAULT NULL,
  PRIMARY KEY (`salesId`),
  KEY `voucherCode_idx` (`voucherCode`),
  KEY `kioskId_idx` (`kioskId`),
  KEY `kiosk_id_idx` (`kioskId`),
  KEY `account_no_idx` (`accountNo`),
  CONSTRAINT `account_no` FOREIGN KEY (`accountNo`) REFERENCES `accounts` (`accountNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `kiosk_id` FOREIGN KEY (`kioskId`) REFERENCES `kiosk machine` (`kioskId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `voucherCode` FOREIGN KEY (`voucherCode`) REFERENCES `vouchers` (`voucherCode`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (123,'STAFF','10082-12312','2017-10-11',1,NULL),(134,'ADMIN','26856-68924','2018-01-25',9,NULL),(153,'STAFF','78945-25642','2018-01-26',1,NULL),(234,'STAFF','10045-45234','2017-10-16',2,NULL),(347,'STAFF','53628-37287','2017-10-19',6,NULL),(457,'ADMIN','12672-34566','2017-10-18',10,NULL),(513,'ADMIN','12349-56812','2018-01-15',9,NULL),(567,'ADMIN','12345-67809','2017-10-17',10,NULL),(568,'STAFF','25698-15632','2018-01-18',4,NULL),(682,'STAFF','12569-12356','2018-01-17',6,NULL);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vouchers` (
  `voucherCode` varchar(45) NOT NULL,
  `voucherType` enum('A','B','C') NOT NULL,
  `voucherAmount` enum('10','20','100') NOT NULL,
  `voucherStatus` enum('Sold','Unsold') NOT NULL,
  `datePrinted` date NOT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `kioskId` int(11) DEFAULT NULL,
  PRIMARY KEY (`voucherCode`),
  KEY `accountNo_idx` (`accountNo`),
  KEY `voucherCode` (`voucherCode`),
  KEY `kioskId_idx` (`kioskId`),
  CONSTRAINT `accountNo` FOREIGN KEY (`accountNo`) REFERENCES `accounts` (`accountNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `kioskId` FOREIGN KEY (`kioskId`) REFERENCES `kiosk machine` (`kioskId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vouchers`
--

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
INSERT INTO `vouchers` VALUES ('10045-45234','A','10','Sold','2017-10-12',2,NULL),('10082-12312','A','10','Sold','2017-10-11',1,NULL),('12345-67809','B','20','Unsold','2017-10-14',2,NULL),('12349-56812','B','20','Sold','2017-12-15',9,NULL),('12569-12356','C','100','Sold','2017-12-26',1,15),('12672-34566','B','20','Sold','2017-10-13',1,NULL),('25698-15632','A','10','Sold','2018-01-15',1,NULL),('26856-68924','A','10','Unsold','2017-12-25',5,NULL),('53628-37287','A','10','Unsold','2017-10-15',2,NULL),('78945-25642','B','20','Sold','2018-01-19',2,NULL);
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-26 23:13:38
