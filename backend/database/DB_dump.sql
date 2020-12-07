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
-- Table structure for table `adminlist`
--

DROP TABLE IF EXISTS `adminlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminlist` (
  `id` int(10) NOT NULL,
  `rcsid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminlist`
--

LOCK TABLES `adminlist` WRITE;
/*!40000 ALTER TABLE `adminlist` DISABLE KEYS */;
INSERT INTO `adminlist` VALUES (1,'bonada'),(2,'sunraj'),(3,'hales3'),(4,'treham'),(5,'callab5');
/*!40000 ALTER TABLE `adminlist` ENABLE KEYS */;
UNLOCK TABLES;

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
  `link` varchar(300) DEFAULT NULL,
  `attractionPictureLocation` varchar(255) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions`
--

LOCK TABLES `attractions` WRITE;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;
INSERT INTO `attractions` VALUES (1,'The Whistling Kettle','Contemporary cafe & tearoom serving savory crepes, panini & salads, plus afternoon tea.','(518) 874-1938',4.33,'254 Broadway, Troy, NY 12180',NULL,'The Whistling Kettle.jpg',42.721,-73.7147),(2,'Dinosaur Bar-B-Que','Barbecue chain serving Southern-style meats & draft brews in a retro setting (most have live music).','(518) 308-0400',0,'377 River St, Troy, NY 12180',NULL,'Dinosaur Bar-B-Que.jpg',42.7327,-73.6879),(3,'Druthers Brewing Company','Elevated comfort food and handcrafted beer.','(518) 650-7996',0,'1053 Broadway, Albany, NY 12204',NULL,'Druthers Brewing Company.jpg',42.6712,-73.7464),(4,'De Fazio\'s','Italian eatery serving wood-fired pies & handmade treats in an easygoing outlet with outdoor tables.','(518) 271-1111',0,'266 4th St, Troy, NY 12180',NULL,'De Fazio\'s.jpg',42.7232,-73.6928),(5,'Slidin Dirty','Lively, compact outpost featuring inventive sliders, cocktails & craft brews in a rustic-chic venue.','(518) 326-8492',0,'9 1st St, Troy, NY 12180',NULL,'Slidin Dirty.jpg',42.7306,-73.6953),(6,'Troy Waterfront Farmers Market','Our market provides access to healthy, locally grown food for our community.','(518) 708-4216',0,'Riverfront Park, Troy, NY 12180',NULL,'Troy Waterfront Farmers Market.jpg',42.7321,-73.6915),(7,'Truly Rhe','Truly Rhe is the premier women’s boutique in Troy, NY.','(518) 273-1540',0,'1 Broadway, Troy, NY 12180',NULL,'Truly Rhe.jpg',NULL,NULL);
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
  CONSTRAINT `attractions_categories_ibfk_1` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `attractions_categories_ibfk_2` FOREIGN KEY (`category`) REFERENCES `tags` (`id`) ON DELETE CASCADE
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
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'I also love The Whistling Kettle. So many good options!',1),(3,1,'Agreed! Such a great place to grab a bite.',1),(4,1,'I\'ve always wanted to go there. Now I definitely will!',1),(5,1,'What\'s your favorite tea to get?',3),(8,1,'My favorite is the hot chocolate.',3),(9,1,'I like the hot chocolate too.',3),(10,1,'I just went there! The food is great.',3),(16,1,'This is my favorite place!',1),(17,1,'I agree! So much to choose from.',4),(36,1,'So true! I always find something new to try!',4),(40,1,'I couldn\'t agree more.',3),(45,1,'That\'s so true!',1),(46,1,'I agree.',1),(47,1,'I agree.',4),(48,1,'Same here.',4),(49,1,'Me too!',1),(50,1,'Same here!',1),(51,1,'Me as well.',1),(52,1,'I agree also!',3),(53,1,'Great place!',4),(54,1,'Me too!',3),(55,1,'Best place ever.',4),(56,1,'Same here!',3),(57,1,'Same here.',1),(58,1,'Me too.',1),(59,1,'Same here!',1),(60,1,'Agreed!',8),(61,1,'Same.',9),(62,1,'Me too.',9),(63,1,'Same.',9),(64,1,'Me too.',9),(65,1,'Same!',9),(66,1,'Me too!',9),(67,1,'Same!',9),(68,1,'Agreed.',9),(69,1,'Same here.',9),(70,1,'Agreed!',9),(71,1,'Same.',8),(72,1,'Me too!',8),(73,1,'Agreed.',8),(74,1,'I agree.',1),(75,1,'Same here.',9),(76,1,'So true.',8),(77,1,'Agree!',10),(78,1,'I completely agree.',10),(79,1,'Very true.',10);
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
  CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (1,3,1),(3,1,1),(4,4,1);
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
  CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`followed_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,1,1,'Fantastic food and service','I love this place! The food is great and the servers are so nice. Plus it\'s not too far from campus.','11/01/2020',4,26),(3,1,1,'My favorite place to eat!','I go to The Whistling Kettle with my friends almost every weekend. They have the best sandwiches and so many teas to choose from. Highly recommend!','11/02/2020',5,16),(4,1,1,'Awesome options','There are so many different options for everyone. There\'s something for everyone!','11/03/2020',5,13),(8,1,1,'Great lunch spot','This is a great choice for a quick lunch.','11/07/2020',3,1),(9,1,1,'My favorite place','The Whistling Kettle is my favorite place ever!','11/14/2020',5,4),(10,1,1,'Best place ever','The Whistling Kettle is the greatest restaurant ever.','11/13/2020',4,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Chinese','Restaurant'),(2,'Mexican','Restaurant'),(3,'Italian','Restaurant'),(4,'Jamaican','Restaurant'),(5,'Sit-Down','Restaurant'),(6,'Fast Food','Restaurant'),(7,'Cheap','Restaurant'),(8,'Outdoor Seating','Restaurant'),(9,'Casual','Restaurant'),(10,'Formal','Restaurant'),(11,'Vegan','Restaurant'),(12,'Breakfast','Restaurant'),(13,'Lunch','Restaurant'),(14,'Dinner','Restaurant'),(15,'Desert','Restaurant'),(16,'Ice-Cream','Restaurant'),(17,'Steak','Restaurant'),(18,'Burger','Restaurant'),(19,'Clothes','Shopping'),(20,'Toys','Shopping'),(21,'Books','Shopping'),(22,'Electronics','Shopping'),(23,'Grocery','Shopping'),(24,'Drug Store','Shopping'),(25,'Hiking','Recreation'),(26,'Swimming','Recreation'),(27,'Sports Field','Recreation'),(28,'Biking','Recreation'),(29,'Indoor','Recreation'),(30,'Kayak','Recreation'),(31,'Gym','Recreation'),(32,'Rock-Climbing','Recreation'),(33,'Skatepark','Recreation'),(34,'Basketball','Recreation'),(35,'Stadium','Recreation');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_like`
--

LOCK TABLES `user_like` WRITE;
/*!40000 ALTER TABLE `user_like` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'zhanh','haotian','zhan','haotianzhan7@gmail.com'),(2,'linz10','zhanfeng','lin','linz10@rpi.edu'),(3,'zhout5','tianshi','zhou','zhout5@rpi.edu'),(4,'wand12','dannong','wang','wand12@rpi.edu'),(5,'hales3','Sean','Hale','hales3@rpi.edu');
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
  CONSTRAINT `users_interests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_interests_ibfk_2` FOREIGN KEY (`interest`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_interests`
--

LOCK TABLES `users_interests` WRITE;
/*!40000 ALTER TABLE `users_interests` DISABLE KEYS */;
INSERT INTO `users_interests` VALUES (1,5,22),(2,5,6),(3,5,2),(4,5,35),(5,5,17);
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
  CONSTRAINT `users_optional_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_optional`
--

LOCK TABLES `users_optional` WRITE;
/*!40000 ALTER TABLE `users_optional` DISABLE KEYS */;
INSERT INTO `users_optional` VALUES (1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607189587hales3profile.jpg');
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

-- Dump completed on 2020-12-07 16:52:51
