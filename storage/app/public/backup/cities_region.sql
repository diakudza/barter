-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: barter
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `cities_region`
--

DROP TABLE IF EXISTS `cities_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities_region` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `cities_region_code_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities_region`
--

/*!40000 ALTER TABLE `cities_region` DISABLE KEYS */;
INSERT INTO `cities_region` (`id`, `name`, `created_at`, `updated_at`) VALUES (1,'Республика Адыгея',NULL,NULL),(2,'Республика Башкортостан',NULL,NULL),(3,'Республика Бурятия',NULL,NULL),(4,'Республика Алтай',NULL,NULL),(5,'Республика Дагестан',NULL,NULL),(6,'Республика Ингушетия',NULL,NULL),(7,'Кабардино-Балкарская Республика',NULL,NULL),(8,'Республика Калмыкия',NULL,NULL),(9,'Карачаево-Черкесская Республика',NULL,NULL),(10,'Республика Карелия',NULL,NULL),(11,'Республика Коми',NULL,NULL),(12,'Республика Марий Эл',NULL,NULL),(13,'Республика Мордовия',NULL,NULL),(14,'Республика Саха (Якутия)',NULL,NULL),(15,'Республика Северная Осетия — Алания',NULL,NULL),(16,'Республика Татарстан (Татарстан)',NULL,NULL),(17,'Республика Тыва',NULL,NULL),(18,'Удмуртская Республика',NULL,NULL),(19,'Республика Хакасия',NULL,NULL),(20,'Чеченская Республика',NULL,NULL),(21,'Чувашская Республика — Чувашия',NULL,NULL),(22,'Алтайский край',NULL,NULL),(23,'Краснодарский край',NULL,NULL),(24,'Красноярский край',NULL,NULL),(25,'Приморский край',NULL,NULL),(26,'Ставропольский край',NULL,NULL),(27,'Хабаровский край',NULL,NULL),(28,'Амурская область',NULL,NULL),(29,'Архангельская область',NULL,NULL),(30,'Астраханская область',NULL,NULL),(31,'Белгородская область',NULL,NULL),(32,'Брянская область',NULL,NULL),(33,'Владимирская область',NULL,NULL),(34,'Волгоградская область',NULL,NULL),(35,'Вологодская область',NULL,NULL),(36,'Воронежская область',NULL,NULL),(37,'Ивановская область',NULL,NULL),(38,'Иркутская область',NULL,NULL),(39,'Калининградская область',NULL,NULL),(40,'Калужская область',NULL,NULL),(41,'Камчатский край',NULL,NULL),(42,'Кемеровская область — Кузбасс',NULL,NULL),(43,'Кировская область',NULL,NULL),(44,'Костромская область',NULL,NULL),(45,'Курганская область',NULL,NULL),(46,'Курская область',NULL,NULL),(47,'Ленинградская область',NULL,NULL),(48,'Липецкая область',NULL,NULL),(49,'Магаданская область',NULL,NULL),(50,'Московская область',NULL,NULL),(51,'Мурманская область',NULL,NULL),(52,'Нижегородская область',NULL,NULL),(53,'Новгородская область',NULL,NULL),(54,'Новосибирская область',NULL,NULL),(55,'Омская область',NULL,NULL),(56,'Оренбургская область',NULL,NULL),(57,'Орловская область',NULL,NULL),(58,'Пензенская область',NULL,NULL),(59,'Пермский край',NULL,NULL),(60,'Псковская область',NULL,NULL),(61,'Ростовская область',NULL,NULL),(62,'Рязанская область',NULL,NULL),(63,'Самарская область',NULL,NULL),(64,'Саратовская область',NULL,NULL),(65,'Сахалинская область',NULL,NULL),(66,'Свердловская область',NULL,NULL),(67,'Смоленская область',NULL,NULL),(68,'Тамбовская область',NULL,NULL),(69,'Тверская область',NULL,NULL),(70,'Томская область',NULL,NULL),(71,'Тульская область',NULL,NULL),(72,'Тюменская область',NULL,NULL),(73,'Ульяновская область',NULL,NULL),(74,'Челябинская область',NULL,NULL),(75,'Забайкальский край',NULL,NULL),(76,'Ярославская область',NULL,NULL),(77,'г. Москва',NULL,NULL),(78,'Санкт-Петербург',NULL,NULL),(79,'Еврейская автономная область',NULL,NULL),(83,'Ненецкий автономный округ',NULL,NULL),(86,'Ханты-Мансийский автономный округ — Югра',NULL,NULL),(87,'Чукотский автономный округ',NULL,NULL),(89,'Ямало-Ненецкий автономный округ',NULL,NULL),(91,'Республика Крым',NULL,NULL),(92,'Севастополь',NULL,NULL),(99,'Иные территории, включая город и космодром Байконур',NULL,NULL);
/*!40000 ALTER TABLE `cities_region` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-13 12:56:57
