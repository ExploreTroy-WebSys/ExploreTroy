-- MySQL dump 10.17  Distrib 10.3.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: websys_final
-- ------------------------------------------------------
-- Server version	10.3.25-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attractions`
--

DROP TABLE IF EXISTS `attractions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attractions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `avg_rating` float NOT NULL DEFAULT 0,
  `address` varchar(100) NOT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `attractionPictureLocation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions`
--

LOCK TABLES `attractions` WRITE;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;
INSERT INTO `attractions` VALUES (1,'The Whistling Kettle','Contemporary cafe & tearoom serving savory crepes, panini & salads, plus afternoon tea.','(518) 874-1938',5,'254 Broadway, Troy, NY 12180',42.721,-73.7147,NULL),(2,'Dinosaur Bar-B-Que','Barbecue chain serving Southern-style meats & draft brews in a retro setting (most have live music).','(518) 308-0400',4.4,'377 River St, Troy, NY 12180',42.7327,-73.6879,NULL),(3,'Druthers Brewing Company','Elevated comfort food and handcrafted beer.','(518) 650-7996',4.5,'1053 Broadway, Albany, NY 12204',42.6712,-73.7464,NULL),(4,'De Fazio\'s','Italian eatery serving wood-fired pies & handmade treats in an easygoing outlet with outdoor tables.','(518) 271-1111',4.6,'266 4th St, Troy, NY 12180',42.7232,-73.6928,NULL),(5,'Slidin Dirty','Lively, compact outpost featuring inventive sliders, cocktails & craft brews in a rustic-chic venue.','(518) 326-8492',4.1,'9 1st St, Troy, NY 12180',42.7306,-73.6953,NULL),(6,'Troy Waterfront Farmers Market','Our market provides access to healthy, locally grown food for our community.','(518) 708-4216',4.8,'Riverfront Park, Troy, NY 12180',42.7321,-73.6915,NULL),(7,'Truly Rhe','Truly Rhe is the premier women’s boutique in Troy, NY.','(518) 273-1540',4.9,'1 Broadway, Troy, NY 12180',NULL,NULL,NULL),(8,'Rainbow Shops','Apparel chain offering fashionable clothing for juniors & plus-size women, plus accessories.','(518) 274-3801',3.8,'120 Hoosick St, Troy, NY 12180',NULL,NULL,NULL),(9,'Prospect Park','Prospect Park is an 80-acre city park in Troy, New York.','(518) 235-0215',4.3,'65 Prospect Park Rd, Troy, NY 12180',NULL,NULL,NULL);
/*!40000 ALTER TABLE `attractions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attractions_categories`
--

DROP TABLE IF EXISTS `attractions_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attractions_categories` (
  `index` int(10) NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) NOT NULL,
  `category` int(10) NOT NULL,
  PRIMARY KEY (`index`),
  KEY `attraction_id` (`attraction_id`),
  KEY `category` (`category`),
  CONSTRAINT `attractions_categories_ibfk_1` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`),
  CONSTRAINT `attractions_categories_ibfk_2` FOREIGN KEY (`category`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions_categories`
--

LOCK TABLES `attractions_categories` WRITE;
/*!40000 ALTER TABLE `attractions_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `attractions_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author_id` int(10) NOT NULL,
  `comment_body` varchar(300) NOT NULL,
  `parent_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `reviews` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,7,'I completely agree! The food there is so good.',1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorites` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `attraction_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attraction_id` (`attraction_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`),
  CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (1,1,7);
/*!40000 ALTER TABLE `favorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followers` (
  `index` int(10) NOT NULL AUTO_INCREMENT,
  `follower_id` int(10) NOT NULL,
  `followed_id` int(10) NOT NULL,
  PRIMARY KEY (`index`),
  KEY `follower_id` (`follower_id`),
  KEY `followed_id` (`followed_id`),
  CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`),
  CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`followed_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author_id` int(10) NOT NULL,
  `attraction_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `review_body` varchar(2000) NOT NULL,
  `date` varchar(50) NOT NULL,
  `rating` int(2) NOT NULL,
  `likes` int(10) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `attraction_id` (`attraction_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,6,1,'Great Experience','Best place ever! The Whistling Kettle is the greatest restaurant ever!','11/08/2020',5,1);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(25) NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_like`
--

DROP TABLE IF EXISTS `user_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_like` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `like_id` int(10) NOT NULL,
  `review_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_like`
--

LOCK TABLES `user_like` WRITE;
/*!40000 ALTER TABLE `user_like` DISABLE KEYS */;
INSERT INTO `user_like` VALUES (1,7,1);
/*!40000 ALTER TABLE `user_like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rcsid` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'hales3','Sean','Hale','hales3@rpi.edu'),(6,'treham','Manya','Trehan','treham@rpi.edu'),(7,'sunraj','Jody','Sunray','sunraj@rpi.edu'),(8,'bonada','Anthony','Bonadies','bonada@rpi.edu');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_interests`
--

DROP TABLE IF EXISTS `users_interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_interests` (
  `index` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `interest` int(11) NOT NULL,
  PRIMARY KEY (`index`),
  KEY `user_id` (`user_id`),
  KEY `interest` (`interest`),
  CONSTRAINT `users_interests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `users_interests_ibfk_2` FOREIGN KEY (`interest`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_interests`
--

LOCK TABLES `users_interests` WRITE;
/*!40000 ALTER TABLE `users_interests` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_optional`
--

DROP TABLE IF EXISTS `users_optional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_optional` (
  `index` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `discord` varchar(25) DEFAULT NULL,
  `snapchat` varchar(30) DEFAULT NULL,
  `instagram` varchar(30) DEFAULT NULL,
  `profilePictureLocation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`index`),
  KEY `id` (`id`),
  CONSTRAINT `users_optional_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_optional`
--

LOCK TABLES `users_optional` WRITE;
/*!40000 ALTER TABLE `users_optional` DISABLE KEYS */;
INSERT INTO `users_optional` VALUES (2,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607034215trehamprofile.jpg'),(3,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607034253hales3profile.jpg'),(4,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607034234sunrajprofile.JPG'),(5,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607034236bonadaprofile.jpg');
/*!40000 ALTER TABLE `users_optional` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-03 17:31:16
