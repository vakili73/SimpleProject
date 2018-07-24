-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: saman
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,1,'0','مدیریت سیستم');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `groups_has_menus`
--

LOCK TABLES `groups_has_menus` WRITE;
/*!40000 ALTER TABLE `groups_has_menus` DISABLE KEYS */;
INSERT INTO `groups_has_menus` VALUES (1,1,1),(1,2,2);
/*!40000 ALTER TABLE `groups_has_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `homes`
--

LOCK TABLES `homes` WRITE;
/*!40000 ALTER TABLE `homes` DISABLE KEYS */;
INSERT INTO `homes` VALUES (1,'SuperAdmin');
/*!40000 ALTER TABLE `homes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'user','مدیریت کاربران','user'),(2,'group','گروه های کاربری','users'),(3,'grtvss','ث.گ.ر توقفات و.س.ش','file-text'),(4,'grvss','ث.گ.ر واحد س.ش','file-text'),(5,'grvkl','ث.گ.ر واحد خط لعاب','file-text'),(6,'gsvbb','ث.گ شیفت واحد ب.ب','file-text'),(7,'gsvp','ث.گ شیفت واحد پرس','file-text'),(8,'grtb','ث.گ.ر تهیه بدنه','file-text'),(9,'report/grtb','گ.گ.ر تهیه بدنه','file-excel-o'),(10,'report/grtvss','گ.گ.ر توقفات و.س.ش','file-excel-o'),(11,'report/grvss','گ.گ.ر واحد س.ش','file-excel-o'),(12,'report/gsvbb','گ.گ شیفت واحد ب.ب','file-excel-o'),(13,'report/gsvp','گ.گ شیفت واحد پرس','file-excel-o');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'SuperAdmin','مدیر ارشد ','سیستم','0',1,NULL,'$2y$10$iJEXW7x2L6rnQT/3VpT2Tee5OE1FTm3uJp65EigMzUd1pG2159tiW','کارشناس نرم افزار','yLHm3Rocw2WqlUmC9nVpOrz2T3u9QOjrkcOw6jTF4Ztbiygs4hofuB3TJvgG','2016-08-02 06:28:11','2018-07-24 21:13:44');
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

-- Dump completed on 2018-07-24 21:22:28
