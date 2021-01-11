-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: auto_moto_salon
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auto`
--

DROP TABLE IF EXISTS `auto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auto` (
  `id_auto` int NOT NULL AUTO_INCREMENT,
  `id_goods` int DEFAULT NULL,
  `id_categories` int NOT NULL,
  PRIMARY KEY (`id_auto`),
  KEY `id_categories_idx` (`id_categories`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auto`
--

LOCK TABLES `auto` WRITE;
/*!40000 ALTER TABLE `auto` DISABLE KEYS */;
/*!40000 ALTER TABLE `auto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id_categories` int NOT NULL AUTO_INCREMENT,
  `descriptioneng` varchar(45) NOT NULL,
  `descriptionrus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'auto','автомобиль'),(2,'moto','мотоцикл'),(3,'Spares','Запчасти');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `goods` (
  `id_goods` int NOT NULL AUTO_INCREMENT,
  `id_categories` int NOT NULL,
  `namegoods` varchar(45) DEFAULT NULL,
  `yeargoods` date DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `texteng` varchar(345) DEFAULT NULL,
  `textrus` varchar(345) DEFAULT NULL,
  `descriptioneng` varchar(45) DEFAULT NULL,
  `descriptionrus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_goods`),
  KEY `id_categories_idx` (`id_categories`),
  CONSTRAINT `id_categories` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (5,1,'scoda','2005-04-02','Opel_Astra_J_1.4_ecoFLEX_Edition_front_20100725.jpg','    Skoda KodiaQ is a seven-seat family crossover with the ability to install 3 rows of seats and a record-breaking capacity in its class, its length is 4697 mm, width is 1882 mm, height is 1676 mm, wheelbase is 2791 mm, and ground clearance is 194 mm.    ','Skoda KodiaQ- семиместный семейный кроссовер с возможностью установки 3 ряда сидений и рекордной в своем классе вместимостью.            ','auto','автомобиль'),(6,1,'scoda','2018-07-15','img1.jpg','   Skoda KodiaQ is a seven-seat family crossover with the ability to install 3 rows of seats and a record-breaking capacity in its class.  ','   Skoda KodiaQ- семиместный семейный кроссовер с возможностью установки 3 ряда сидений и рекордной в своем классе вместимостью.       ','auto','автомобиль'),(7,1,'nissan','2006-02-05','photo-1556213313-fc5be959c4a9.jpg','   The Nissan Leaf is built on the new Nissan V platform, which the electric car shares with the Juke crossover and the 2011 Micra subcompact.  ','   Nissan Leaf построен на новой платформе Nissan V, которую электромобиль делит с кроссовером Juke и малолитражной Micra 2011 модельного года.        ','auto','автомобиль'),(13,3,'Bosch','2020-02-01','Без названия (1).jpg','    Battery Bosch S5 001 52 Ah    ','    Аккумулятор Bosch S5 001 52 Аh            ','spares','запчасти'),(61,1,'LEXUS','2008-12-04','car2030.jpg','  Lorem lorem lorem  ','  Описание на русском      ',NULL,NULL),(62,1,'YAMyuyuyuy','2020-05-09','36262.png','                              Lorem Lorem Lorem                              ','                              ОПИСАНИЕ НА РУССКОМ                                                                                          ',NULL,NULL),(63,2,'YAMAHA','2019-07-12','motoYamaha.jpg','Compact, high-spirited, energetic - this is all about the YBR125 - a beautiful representative of urban small-cubic road conquerors with a serious inner world: a 4-stroke engine with a 5-speed gearbox.','Компактный, резвый, энергичный - это все о мотоцикле YBR125 – красивом представителе городских малокубатурных покорителей дорог с серьезным внутренним миром: 4-тактный двигатель с 5-скоростной коробкой передач.',NULL,NULL),(64,2,'kawasaki','2020-12-09','a1ffb41d26e8941d86ca36c8f5dd2060.jpg','  The Z spirit has been reincarnated in the Z900 with the Sugomi style. LED lighting fixtures and a TFT dashboard that reflect modern technology, increased power, intuitive controls and traction control are redefining the Supernaked concept. Expand your boundaries and control your trip.  ','  Дух Z обрел свое новое воплощение в Z900 со стилем Sugomi. Светодиодное световое оборудование и приборная TFT-панель, которые отражают современные технологии, возросшая мощность, интуитивно понятное управление и трекшн-контроль переопределяют понятие Супернейкеда. Расширяйте границы и управляйте своей поездкой.      ',NULL,NULL),(65,3,'MICHELIN1','2020-05-09','depositphotos_9171295-stock-photo-stack-of-four-car-wheel.jpg','    really high quality rubber that does not deform after frequent long trips on any surface. When buying Michelin tires, you need to clarify whether the size 205/55 R16 is suitable for your car\'s design.    ','    по-настоящему качественную резину, которая не деформируется после частых продолжительных поездок по любой поверхности. При покупке шин Michelin необходимо уточнить, подходит ли типоразмер 205/55 R16 для конструкции вашего авто.            ',NULL,NULL);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moto`
--

DROP TABLE IF EXISTS `moto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moto` (
  `id_moto` int NOT NULL AUTO_INCREMENT,
  `id_category` int DEFAULT NULL,
  `id_goods` int DEFAULT NULL,
  PRIMARY KEY (`id_moto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moto`
--

LOCK TABLES `moto` WRITE;
/*!40000 ALTER TABLE `moto` DISABLE KEYS */;
/*!40000 ALTER TABLE `moto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newtransport`
--

DROP TABLE IF EXISTS `newtransport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newtransport` (
  `id_newtransport` int NOT NULL AUTO_INCREMENT,
  `id_auto` int DEFAULT NULL,
  `id_moto` int DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_newtransport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newtransport`
--

LOCK TABLES `newtransport` WRITE;
/*!40000 ALTER TABLE `newtransport` DISABLE KEYS */;
INSERT INTO `newtransport` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(3,3,NULL,NULL),(4,6,NULL,NULL),(5,NULL,1,NULL),(6,NULL,2,NULL),(7,NULL,NULL,NULL);
/*!40000 ALTER TABLE `newtransport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oldtransport`
--

DROP TABLE IF EXISTS `oldtransport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oldtransport` (
  `id_oldtransport` int NOT NULL AUTO_INCREMENT,
  `id_auto` int DEFAULT NULL,
  `id_moto` int DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_oldtransport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oldtransport`
--

LOCK TABLES `oldtransport` WRITE;
/*!40000 ALTER TABLE `oldtransport` DISABLE KEYS */;
INSERT INTO `oldtransport` VALUES (1,NULL,NULL,NULL),(2,NULL,NULL,NULL),(3,NULL,NULL,NULL),(4,NULL,NULL,NULL);
/*!40000 ALTER TABLE `oldtransport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spares`
--

DROP TABLE IF EXISTS `spares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spares` (
  `id_spares` int NOT NULL AUTO_INCREMENT,
  `id_goods` int NOT NULL,
  `id_category` int NOT NULL,
  PRIMARY KEY (`id_spares`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spares`
--

LOCK TABLES `spares` WRITE;
/*!40000 ALTER TABLE `spares` DISABLE KEYS */;
/*!40000 ALTER TABLE `spares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(355) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `urole` varchar(45) DEFAULT 'user',
  `tel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (45,'Янина Мацакова','Янина','yanamatsakova30@gmail.com','123','photo_2020-05-02_18-00-47.jpg','admin','+375-29-1730673'),(47,'Надежда','Бабкина','babkina@gmail.com','123','бабкина.jpg','admin','+456-35-6783465'),(48,'Пелагея','Пелагея','pelageya30@gmail.com','123','пелагея.jpg','user','+784-45-6783456'),(49,'Полина Гагарина','Гагарина','gagarina30@gmail.com','123','Полина Гагарина.jpg','user','+589-26-4879069'),(52,'Екатерина Климова','Климова','klimova@mail.ru','123','ekaterina-klimova083149.jpg','user','+589-26-4879069'),(56,'Баранов Емеля','баранов','baranov@inbox.ru','123','15698233144.png','user','+389-49-4567890'),(58,'Эвелина Хромченко','Хромченко','hromchenko@tut.by','123','хромченко.jpg','user','+389-49-4567890');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'auto_moto_salon'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-09 19:46:15
