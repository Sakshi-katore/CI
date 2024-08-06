-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: cinemaDB
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `company_settings`
--

DROP TABLE IF EXISTS `company_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_settings`
--

LOCK TABLES `company_settings` WRITE;
/*!40000 ALTER TABLE `company_settings` DISABLE KEYS */;
INSERT INTO `company_settings` VALUES (12,'Company Name','Meta'),(13,'Company Address','EVR Highs'),(14,'email','sakshi@gmail.com'),(17,'Email','fruit@gmail.com'),(24,'companynumber','+91 888 777 6660'),(25,'companynumber','+91 777 888 9990'),(27,'Date','1101-11-11'),(28,'dateformat','2022-12-17 16:32:24'),(32,'date','2001-12-12'),(34,'dateFormat','2001-12-29 16:31:02'),(35,'DateFormat','2022-10-29 16:31:34'),(37,'companynumber','0'),(39,'companynumber','+91 777 888 9990'),(40,'date','2001-11-12'),(42,'dateformat','0'),(43,'companynumber','+91 999 888 9990'),(44,'companynumber','+91 222 888 9998'),(45,'companynumber','+91 222 888 9990'),(46,'dateformat','2222-11-21 16:55:00'),(47,'DateFormat','2001-12-12 16:55:21'),(49,'companyNumber','+91 444 555 6667'),(50,'companynumber','+91 222 777 8889'),(51,'mobile','+91 888 999 0001'),(52,'CompanyNumbER','+91 777 888 9990'),(53,'Date','2009-12-12'),(54,'companynumber','+91 333 888 9990'),(55,'date','2001-12-12'),(56,'date','2001-12-22'),(57,'date','2001-12-17'),(58,'date','2009-12-13'),(59,'Date','2001-12-12'),(60,'Company Address','sarla nagar'),(61,'companynumber','+91 777 888 9990'),(62,'date','2001-12-12'),(63,'dateformat','2001-12-12 22:52:47'),(64,'mobile','+91 888 999 0009'),(65,'mobile','+91 222 333 5556'),(66,'date','2000-02-13'),(67,'date','2001-12-12'),(68,'date','2012-12-12'),(69,'dateformat','2024-08-01');
/*!40000 ALTER TABLE `company_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `record_id` int DEFAULT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `record_id` (`record_id`),
  CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `records` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (3,'Project Duration','Have to build a project..........','2023-05-04','2023-08-09','2024-07-30 11:51:58');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `upload_date` datetime NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `key_value_store`
--

DROP TABLE IF EXISTS `key_value_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `key_value_store` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `key_value_store`
--

LOCK TABLES `key_value_store` WRITE;
/*!40000 ALTER TABLE `key_value_store` DISABLE KEYS */;
INSERT INTO `key_value_store` VALUES (2,'Email','meta@gmail.com'),(3,'company_Number','+91 878 825 3999'),(4,'email1','katore@gmail.com'),(13,'Date17','2000-12-17'),(15,'Company_name','Meta'),(19,'date2','2028-08-02'),(22,'date','2001-12-12'),(23,'companynumber','+91 878 825 3999'),(24,'Address','tg'),(27,'Pin','445304');
/*!40000 ALTER TABLE `key_value_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_key` date NOT NULL,
  `company_number` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date_key` (`date_key`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keys`
--

LOCK TABLES `keys` WRITE;
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
INSERT INTO `keys` VALUES (2,'2024-08-03','+91 954 599 9100','Gamma Verse','Tagore chowk','gma@gmail.com','gmapv@gmail.com','2024-08-01 11:59:00'),(5,'2024-08-20','+91 777 888 9990','google','Blr','google@gmail.com','gmapv@gmail.com','2024-08-01 12:00:00'),(11,'2024-08-27','+91 878 825 3523','Gamma Verse','Tagore chowk','gma@gmail.com','gmapv@gmail.com','2024-08-01 14:28:00'),(12,'2024-08-26','+91 878 825 3522','Gamma Verse','Tagore chowk','gma@gmail.com','gmapv@gmail.com','2024-08-01 15:12:00'),(15,'2024-08-10','+91 777 888 9990','google','Tagore chowk','gma@gmail.com','gmapv@gmail.com','2024-09-28 16:49:00');
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `record_id` int DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `marks` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `record_id` (`record_id`),
  CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `records` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marks`
--

LOCK TABLES `marks` WRITE;
/*!40000 ALTER TABLE `marks` DISABLE KEYS */;
INSERT INTO `marks` VALUES (4,50,'English',100),(8,65,'maths',55),(9,49,'English',44);
/*!40000 ALTER TABLE `marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie` (
  `movie_id` int NOT NULL AUTO_INCREMENT,
  `duration` double NOT NULL,
  `genre` enum('HORROR','ROMANTIC','COMEDY','BIOGRAPHY','DRAMA','ACTION','THRILLER','SCIFI','FICTIONAL') DEFAULT NULL,
  `languege` enum('TAMIL','HINDI','MARATHI','BENGALI','BHOJPURI','ENGLISH','MALLAYALAM','TELUGU','ODIA') DEFAULT NULL,
  `movie_name` varchar(255) DEFAULT NULL,
  `rating` double NOT NULL,
  `release_date` date DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movies` (
  `movie_id` int NOT NULL AUTO_INCREMENT,
  `duration` double NOT NULL,
  `genre` enum('HORROR','ROMANTIC','COMEDY','BIOGRAPHY','DRAMA','ACTION','THRILLER','SCIFI','FICTIONAL') DEFAULT NULL,
  `languege` enum('TAMIL','HINDI','MARATHI','BENGALI','BHOJPURI','ENGLISH','MALLAYALAM','TELUGU','ODIA') DEFAULT NULL,
  `movie_name` varchar(255) DEFAULT NULL,
  `rating` double NOT NULL,
  `release_date` date DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (10,160,'FICTIONAL',NULL,'Rds',9.6,'2013-09-01'),(11,160,'FICTIONAL',NULL,'Rds',9.6,'2013-09-01'),(12,160,'FICTIONAL',NULL,'Rds',9.6,'2013-09-01'),(13,133,'FICTIONAL','HINDI','Race',8.6,'2013-01-01');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` text,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `records`
--

LOCK TABLES `records` WRITE;
/*!40000 ALTER TABLE `records` DISABLE KEYS */;
INSERT INTO `records` VALUES (49,'Khushal Katore','7776993990','Gandhi Ward','khushalkatore97@gmail.com'),(50,'Aish Rai','9876778889','Rathi Nagar','aishwarrai@gmail.com'),(51,'Sakshi Khushal Katore','0878825352','Tagore chowk','katoresakshi@mail.com'),(57,'Vedant Talse','9834570852','Shubhash Chandra Bose Chowk, Wani','vedtal@gmail.com'),(61,'Sakshi Khushal Katore','7776993991','Tagore chowk','katoresakshi@gmail.com'),(63,'Sakshi Khushal Katore','9978825352','Tagore chowks','sakshiikatore@gmail.com'),(65,'Sakshi Khushal Katore','0878825354','Tagore chowk','katoresashi@gmail.com'),(66,'Sakshi Khushal Katore','0878825350','Tagore chowk','khushalkatoe97@gmail.com'),(68,'Sakshi Khushal Katore','0878853522','Tagore chowk','katoesakshi@gmail.com'),(69,'Sakshi Khushal Katore','0878823522','Tagore chowk','khusalkatore97@gmail.com'),(70,'Sakshi Khushal Katore','0878825356','Tagore chowk','khushalkkatoe97@gmail.com'),(71,'Sakshi Khushal Katore','0878895352','Tagore chowk','katoreskshi@gmail.com');
/*!40000 ALTER TABLE `records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `show_seat`
--

DROP TABLE IF EXISTS `show_seat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `show_seat` (
  `show_seat_id` int NOT NULL AUTO_INCREMENT,
  `is_available` bit(1) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `seat_no` varchar(255) DEFAULT NULL,
  `seat_type` enum('CLASSIC','PREMIUM') DEFAULT NULL,
  PRIMARY KEY (`show_seat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `show_seat`
--

LOCK TABLES `show_seat` WRITE;
/*!40000 ALTER TABLE `show_seat` DISABLE KEYS */;
/*!40000 ALTER TABLE `show_seat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shows`
--

DROP TABLE IF EXISTS `shows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shows` (
  `show_id` int NOT NULL AUTO_INCREMENT,
  `show_date` date DEFAULT NULL,
  `show_time` time(6) DEFAULT NULL,
  `movie_movie_id` int DEFAULT NULL,
  `theater_theater_id` int DEFAULT NULL,
  PRIMARY KEY (`show_id`),
  KEY `FK89lblqeyhjl57hbaww06y590g` (`movie_movie_id`),
  KEY `FKcnm11xvfctacdnhva7thhl3gh` (`theater_theater_id`),
  CONSTRAINT `FK89lblqeyhjl57hbaww06y590g` FOREIGN KEY (`movie_movie_id`) REFERENCES `movies` (`movie_id`),
  CONSTRAINT `FKcnm11xvfctacdnhva7thhl3gh` FOREIGN KEY (`theater_theater_id`) REFERENCES `theaters` (`theater_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shows`
--

LOCK TABLES `shows` WRITE;
/*!40000 ALTER TABLE `shows` DISABLE KEYS */;
/*!40000 ALTER TABLE `shows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `studentid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'John Smith',18,'Male','A'),(2,'Jane Doe',17,'Female','B'),(3,'Alice Johnson',19,'Female','B'),(4,'Bob Anderson',20,'Male','C'),(5,'Emily Wilson',18,'Female','A'),(6,'Michael Brown',19,'Male','B'),(7,'Emma Taylor',17,'Female','A'),(8,'James Williams',20,'Male','B'),(9,'Olivia Martinez',18,'Female','A'),(10,'William Jackson',19,'Male','C');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (2,'Sakshi Khushal Kator','English','katoresaksi@gmail.com'),(3,'Vall Solanke','English','katoresaks4hi@gmail.com'),(4,'Sakshi Khushal Katore','English','suyogpatil534@gmail.com'),(6,'tara','marathi','taras@gmail.com'),(8,'Sakshi Khushal Katore','English','katoresakshi@gmail.com'),(10,'Sakshi Khusha','English','katoresakshi@gmail.com');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theater seat`
--

DROP TABLE IF EXISTS `theater seat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theater seat` (
  `theater_seat_id` int NOT NULL,
  `seat_no` varchar(255) DEFAULT NULL,
  `seat_type` tinyint DEFAULT NULL,
  `theater_theater_id` int DEFAULT NULL,
  PRIMARY KEY (`theater_seat_id`),
  KEY `FKkll6q6wm3isigpfsxgu5a1vm9` (`theater_theater_id`),
  CONSTRAINT `FKkll6q6wm3isigpfsxgu5a1vm9` FOREIGN KEY (`theater_theater_id`) REFERENCES `theaters` (`theater_id`),
  CONSTRAINT `theater seat_chk_1` CHECK ((`seat_type` between 0 and 1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theater seat`
--

LOCK TABLES `theater seat` WRITE;
/*!40000 ALTER TABLE `theater seat` DISABLE KEYS */;
/*!40000 ALTER TABLE `theater seat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theater_seat`
--

DROP TABLE IF EXISTS `theater_seat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theater_seat` (
  `theater_seat_id` int NOT NULL,
  `seat_no` varchar(255) DEFAULT NULL,
  `seat_type` tinyint DEFAULT NULL,
  `theater_theater_id` int DEFAULT NULL,
  PRIMARY KEY (`theater_seat_id`),
  KEY `FKfersyha9hb5951s2r1jpwg2u7` (`theater_theater_id`),
  CONSTRAINT `FKfersyha9hb5951s2r1jpwg2u7` FOREIGN KEY (`theater_theater_id`) REFERENCES `theaters` (`theater_id`),
  CONSTRAINT `theater_seat_chk_1` CHECK ((`seat_type` between 0 and 1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theater_seat`
--

LOCK TABLES `theater_seat` WRITE;
/*!40000 ALTER TABLE `theater_seat` DISABLE KEYS */;
/*!40000 ALTER TABLE `theater_seat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theaters`
--

DROP TABLE IF EXISTS `theaters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theaters` (
  `theater_id` int NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `no_of_screens` int DEFAULT NULL,
  PRIMARY KEY (`theater_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theaters`
--

LOCK TABLES `theaters` WRITE;
/*!40000 ALTER TABLE `theaters` DISABLE KEYS */;
/*!40000 ALTER TABLE `theaters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sakshi Khushal Katore','8788253522','Tagore chowk, wani'),(2,'Sapna ','4581236998','Ravi nagar');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `values`
--

DROP TABLE IF EXISTS `values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `values` (
  `id` int NOT NULL AUTO_INCREMENT,
  `key_id` int NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `key_id` (`key_id`),
  CONSTRAINT `values_ibfk_1` FOREIGN KEY (`key_id`) REFERENCES `keys` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `values`
--

LOCK TABLES `values` WRITE;
/*!40000 ALTER TABLE `values` DISABLE KEYS */;
/*!40000 ALTER TABLE `values` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-06 11:10:43
