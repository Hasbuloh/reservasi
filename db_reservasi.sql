-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: db_reservasi
-- ------------------------------------------------------
-- Server version	5.6.24

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
-- Table structure for table `tbm_booking`
--

DROP TABLE IF EXISTS `tbm_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_booking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `booking_name` varchar(30) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `duration_start` date DEFAULT NULL,
  `duration_end` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_booking`
--

LOCK TABLES `tbm_booking` WRITE;
/*!40000 ALTER TABLE `tbm_booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_facilities`
--

DROP TABLE IF EXISTS `tbm_facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_facilities` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `biaya` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_facilities`
--

LOCK TABLES `tbm_facilities` WRITE;
/*!40000 ALTER TABLE `tbm_facilities` DISABLE KEYS */;
INSERT INTO `tbm_facilities` VALUES (1,'Televisi Digital',40000);
/*!40000 ALTER TABLE `tbm_facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_kamar`
--

DROP TABLE IF EXISTS `tbm_kamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_kamar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `no_kamar` varchar(50) NOT NULL,
  `no_blok` varchar(50) NOT NULL,
  `harga` double DEFAULT NULL,
  `keyword` text,
  `deskripsi` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_kamar`
--

LOCK TABLES `tbm_kamar` WRITE;
/*!40000 ALTER TABLE `tbm_kamar` DISABLE KEYS */;
INSERT INTO `tbm_kamar` VALUES (1,'A001','A1',NULL,NULL,NULL),(2,'A002','A2',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbm_kamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_reservation`
--

DROP TABLE IF EXISTS `tbm_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_reservation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode_unik` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_reservation`
--

LOCK TABLES `tbm_reservation` WRITE;
/*!40000 ALTER TABLE `tbm_reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbm_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbm_user`
--

DROP TABLE IF EXISTS `tbm_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbm_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbm_user`
--

LOCK TABLES `tbm_user` WRITE;
/*!40000 ALTER TABLE `tbm_user` DISABLE KEYS */;
INSERT INTO `tbm_user` VALUES (1,'admin@gmail.com','21232f297a57a5a743894a0e4a801fc3','admin@gmail.com');
/*!40000 ALTER TABLE `tbm_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbt_booking`
--

DROP TABLE IF EXISTS `tbt_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbt_booking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) DEFAULT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `BOOK_FK` (`id_book`),
  CONSTRAINT `BOOK_FK` FOREIGN KEY (`id_book`) REFERENCES `tbm_booking` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbt_booking`
--

LOCK TABLES `tbt_booking` WRITE;
/*!40000 ALTER TABLE `tbt_booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbt_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbt_kamar`
--

DROP TABLE IF EXISTS `tbt_kamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbt_kamar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_kamar` int(11) NOT NULL,
  `id_facilities` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `kamar_fk` (`id_kamar`),
  KEY `facilities_fk` (`id_facilities`),
  CONSTRAINT `facilities_fk` FOREIGN KEY (`id_facilities`) REFERENCES `tbm_facilities` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kamar_fk` FOREIGN KEY (`id_kamar`) REFERENCES `tbm_kamar` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbt_kamar`
--

LOCK TABLES `tbt_kamar` WRITE;
/*!40000 ALTER TABLE `tbt_kamar` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbt_kamar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-31 12:43:51
