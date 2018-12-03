-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: facebook
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.34-MariaDB

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
-- Table structure for table `commentario`
--

DROP TABLE IF EXISTS `commentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentario` (
  `commentario_id` int(11) NOT NULL AUTO_INCREMENT,
  `commentario` varchar(500) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentario_id`),
  KEY `fk_post_comment_idx` (`post_id`),
  KEY `fk_user_comment_idx` (`user_id`),
  CONSTRAINT `fk_post_comment` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_comment` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentario`
--

LOCK TABLES `commentario` WRITE;
/*!40000 ALTER TABLE `commentario` DISABLE KEYS */;
INSERT INTO `commentario` VALUES (1,'Buena publicacion',1,1,'2018-12-03 22:11:50'),(2,'Sigue asi',1,2,'2018-12-03 22:11:50'),(5,'Que rico se ve',3,1,'2018-12-03 22:12:21'),(6,'HOLA',9,1,'2018-12-03 22:41:57'),(7,'DSADAS',9,2,'2018-12-03 22:42:07'),(8,'Comentarios xd',8,1,'2018-12-03 22:44:33');
/*!40000 ALTER TABLE `commentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friendship_status`
--

DROP TABLE IF EXISTS `friendship_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friendship_status` (
  `friendship_status_id` int(11) NOT NULL,
  `friendship_status` varchar(45) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`friendship_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friendship_status`
--

LOCK TABLES `friendship_status` WRITE;
/*!40000 ALTER TABLE `friendship_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `friendship_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(45) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Hombre','2018-12-03 15:43:31'),(2,'Mujer','2018-12-03 15:43:31'),(3,'Gay','2018-12-03 15:43:40');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_comment`
--

DROP TABLE IF EXISTS `like_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_comment` (
  `like_comment_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `last_update` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`like_comment_id`),
  KEY `fk_like_comment_user_idx` (`user_id`),
  KEY `fk_comment_id_idx` (`comment_id`),
  CONSTRAINT `fk_comment_id` FOREIGN KEY (`comment_id`) REFERENCES `commentario` (`commentario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_like_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_comment`
--

LOCK TABLES `like_comment` WRITE;
/*!40000 ALTER TABLE `like_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `like_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_post`
--

DROP TABLE IF EXISTS `like_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_post` (
  `like_post_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`like_post_id`),
  KEY `fk_like_user_idx` (`user_id`),
  KEY `fk_like_post_idx` (`post_id`),
  CONSTRAINT `fk_like_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_like_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_post`
--

LOCK TABLES `like_post` WRITE;
/*!40000 ALTER TABLE `like_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `like_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`),
  KEY `fk_post_user_idx` (`user_id`),
  CONSTRAINT `fk_post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'Mi primer post',2,'2018-12-03 21:17:55'),(3,'bla',2,'2018-12-03 21:17:55'),(4,'test',2,'2018-12-03 21:17:55'),(5,'equisde',2,'2018-12-03 21:17:55'),(6,'test ',1,'2018-12-03 21:18:04'),(7,'segundo post',1,'2018-12-03 21:20:15'),(8,'test 3',1,'2018-12-03 21:21:04'),(9,'teasdas',1,'2018-12-03 21:21:51');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` char(32) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  KEY `fk_user_genre_idx` (`genre_id`),
  CONSTRAINT `fk_user_genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Nicolas','Miranda','nmiranda@sanisidrosa.cl','316208',1,'1989-10-14','2018-12-03 15:44:19'),(2,'admin','admin','admin','admin',3,'2018-12-03','2018-12-03 15:45:18');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'facebook'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-03 19:46:53
