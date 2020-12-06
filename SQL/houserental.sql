-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: houserentaldb
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `houses`
--

DROP TABLE IF EXISTS `houses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `houses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Area` int(50) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `CarParking` varchar(100) NOT NULL,
  `Tenants` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Publish` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `houses`
--

LOCK TABLES `houses` WRITE;
/*!40000 ALTER TABLE `houses` DISABLE KEYS */;
INSERT INTO `houses` VALUES (5,'Olive','Apartments',1600,'Hyderabad','Yes','Married',15000,'9872563254','1607256516_8607_Olive_House8.jpg','2020-12-06'),(2,'Highfield','Villa',2500,'Chandigarh','Yes','Married',20000,'9872652415','1607256284_9393_Highfield_House2.jpg','2020-12-06'),(3,'La Grande Maison','Apartments',1200,'Hyderabad','No','Bachelors',12000,'9852634175','1607256326_9423_La Grande Maison_House7.jpg','2020-12-06'),(4,'The Mill House','BuilderFloors',1500,'Delhi','Yes','Boys',15000,'9875263415','1607256388_1640_The Mill House_House6.jpg','2020-12-06'),(6,'CityViews','Apartments',1200,'Delhi','Yes','Boys',17000,'8526985236','1607256740_2028_CityViews_House5.jpg','2020-12-06');
/*!40000 ALTER TABLE `houses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`Email`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com','9872971934','25d55ad283aa400af464c76d713c07ad'),(2,'Sanju Pal','sanjupal3066@gmail.com','7889264965','25d55ad283aa400af464c76d713c07ad');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-06 19:40:18
