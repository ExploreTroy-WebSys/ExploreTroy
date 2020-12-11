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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions`
--

LOCK TABLES `attractions` WRITE;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;
INSERT INTO `attractions` VALUES (1,'The Whistling Kettle','Contemporary cafe & tearoom serving savory crepes, panini & salads, plus afternoon tea.','(518) 874-1938',4.5,'254 Broadway, Troy, NY 12180',NULL,'The Whistling Kettle.jpg',42.721,-73.7147),(2,'Dinosaur Bar-B-Que','Barbecue chain serving Southern-style meats & draft brews in a retro setting (most have live music).','(518) 308-0400',3.33,'377 River St, Troy, NY 12180',NULL,'Dinosaur Bar-B-Que.jpg',42.7327,-73.6879),(3,'Druthers Brewing Company','Elevated comfort food and handcrafted beer.','(518) 650-7996',3,'1053 Broadway, Albany, NY 12204',NULL,'Druthers Brewing Company.jpg',42.6712,-73.7464),(4,'De Fazio\'s','Italian eatery serving wood-fired pies & handmade treats in an easygoing outlet with outdoor tables.','(518) 271-1111',5,'266 4th St, Troy, NY 12180',NULL,'De Fazio\'s.jpg',42.7232,-73.6928),(5,'Slidin Dirty','Lively, compact outpost featuring inventive sliders, cocktails & craft brews in a rustic-chic venue.','(518) 326-8492',5,'9 1st St, Troy, NY 12180',NULL,'Slidin Dirty.jpg',42.7306,-73.6953),(6,'Troy Waterfront Farmers Market','Our market provides access to healthy, locally grown food for our community.','(518) 708-4216',5,'Riverfront Park, Troy, NY 12180',NULL,'Troy Waterfront Farmers Market.jpg',42.7321,-73.6915),(7,'Truly Rhe','Truly Rhe is the premier women’s boutique in Troy, NY.','(518) 273-1540',4,'1 Broadway, Troy, NY 12180',NULL,'Truly Rhe.jpg',NULL,NULL),(10,'Grafton Lakes State Park','There are some fantastic hikes around here, large park with multiple lakes to swim in, fish from, or boat around on.',' (518) 279-1155',5,'254 Grafton Lakes State Park Way, Grafton, NY 12082','https://parks.ny.gov/parks/53/details.aspx','Grafton Lakes State Park.jpg',NULL,NULL),(11,'Copper Pot','Located in Historic North Central Troy NY, Copper Pot is a purveyor of Northeast favorites with a twist from the Chef who brought you Sweet Sue\'s.','(518) 629-5922',4,'433 River St, Troy, NY 12180','https://www.riverstreetmkt.com/vendors/copper-pot/','Copper Pot.jpg',NULL,NULL),(12,'Prospect Park','Prospect Park is an 80-acre city park in Troy, New York.','(518) 235-0215',5,'65 Prospect Park Rd, Troy, NY 12180','http://www.troyny.gov/departments/parks-recreation/parks-facilities/prospect-park/','Prospect Park.jpg',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions_categories`
--

LOCK TABLES `attractions_categories` WRITE;
/*!40000 ALTER TABLE `attractions_categories` DISABLE KEYS */;
INSERT INTO `attractions_categories` VALUES (15,1,12),(16,1,9),(17,2,9),(18,2,14),(19,3,9),(20,3,13),(21,4,3),(22,4,5),(23,5,5),(24,6,9),(25,6,16),(26,7,19),(27,10,25),(28,10,26),(29,10,30),(30,10,36),(31,11,5),(32,11,9),(33,12,25),(34,12,37);
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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (80,6,'I agree! There is so much to choose from.',11),(81,5,'Especially those fancy hot chocolates that they do',12),(82,7,'I agree... they are probably one of the best burgers I have had!',19),(83,6,'That doesn\'t sound too good.',20),(84,5,'I feel like they\'re always soggy or hard as a rock here, no in between',15);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (1,3,1),(3,1,1),(4,4,1),(5,5,6);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (2,5,7);
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (11,7,1,'Great Food','Had a great lunch there yesterday. Highly recommend!','12/09/2020',5,2),(12,6,1,'Really great food','I really like the food here. Definitely try the hot chocolate if you come!','12/03/2020',4,0),(13,6,2,'I love dinosaurs','I was hoping there would be dinosaurs here, but the food is still tasty.','12/11/2020',3,2),(14,7,2,'Great Dinner','Great service and even better food! The \'Wango Tango\' wings are the best.','12/01/2020',5,1),(15,6,3,'Was a little disappointed','The service was amazing, but I was not too impressed with the French fries I ordered.','12/03/2020',3,0),(16,7,6,'Wonderful Experience','Great place to spend a Saturday afternoon. So many options to choose from. I would give more than 5 stars if I could...','12/05/2020',5,2),(17,6,4,'All things Italian','If you love Italian food, this place is for you! I went here last week with my family, and we were all very satisfied with our meals!','12/03/2020',5,0),(18,6,7,'Beautiful clothing','I bought my graduation dress here. It was absolutely stunning!','12/05/2020',4,0),(19,6,5,'Huge fan of burgers','I love burgers, and I\'ve never loved a burger more than what I had at Slidin Dirty! It\'s no wonder they call them gourmet...','12/04/2020',5,1),(20,5,2,'Friends and Food Poisoning','This place is great for a good dinner on the water, but beware. Some friends of mine caught a bad case of food poisoning which landed them in the hospital!','12/08/2020',2,0),(21,5,10,'My dog can\'t get enough','A couple times a week I take my dog out here to hike around and burn off some energy and he loves it. It\'s a little outside Troy but totally worth the trip if you can make it.','10/13/2020',5,0),(22,6,11,'Awesome experience','I love everything about this place! Not only is the food really good but the servers are so nice.','12/09/2020',4,0),(23,7,12,'Great Day!','Spent Saturday afternoon at the park. What a lovely day! Had a great picnic. ','12/05/2020',5,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Chinese','Restaurant'),(2,'Mexican','Restaurant'),(3,'Italian','Restaurant'),(4,'Jamaican','Restaurant'),(5,'Sit-Down','Restaurant'),(6,'Fast Food','Restaurant'),(7,'Cheap','Restaurant'),(8,'Outdoor Seating','Restaurant'),(9,'Casual','Restaurant'),(10,'Formal','Restaurant'),(11,'Vegan','Restaurant'),(12,'Breakfast','Restaurant'),(13,'Lunch','Restaurant'),(14,'Dinner','Restaurant'),(15,'Desert','Restaurant'),(16,'Ice-Cream','Restaurant'),(17,'Steak','Restaurant'),(18,'Burger','Restaurant'),(19,'Clothes','Shopping'),(20,'Toys','Shopping'),(21,'Books','Shopping'),(22,'Electronics','Shopping'),(23,'Grocery','Shopping'),(24,'Drug Store','Shopping'),(25,'Hiking','Recreation'),(26,'Swimming','Recreation'),(27,'Sports Field','Recreation'),(28,'Biking','Recreation'),(29,'Indoor','Recreation'),(30,'Kayak','Recreation'),(31,'Gym','Recreation'),(32,'Rock-Climbing','Recreation'),(33,'Skatepark','Recreation'),(34,'Basketball','Recreation'),(35,'Stadium','Recreation'),(36,'Fishing','Recreation'),(37,'Park','Recreation');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_like`
--

LOCK TABLES `user_like` WRITE;
/*!40000 ALTER TABLE `user_like` DISABLE KEYS */;
INSERT INTO `user_like` VALUES (1,6,11),(2,7,13),(3,6,16),(4,7,16),(5,5,11),(6,7,19),(7,6,14),(8,5,13);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'zhanh','haotian','zhan','haotianzhan7@gmail.com'),(2,'linz10','zhanfeng','lin','linz10@rpi.edu'),(3,'zhout5','tianshi','zhou','zhout5@rpi.edu'),(4,'wand12','dannong','wang','wand12@rpi.edu'),(5,'hales3','Sean','Hale','hales3@rpi.edu'),(6,'sunraj','Jody','Sunray','sunraj@rpi.edu'),(7,'treham','Manya','Trehan','treham@rpi.edu');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_interests`
--

LOCK TABLES `users_interests` WRITE;
/*!40000 ALTER TABLE `users_interests` DISABLE KEYS */;
INSERT INTO `users_interests` VALUES (1,5,22),(2,5,6),(3,5,2),(4,5,35),(5,5,17),(6,6,12),(7,6,14),(8,6,25),(9,6,16),(10,7,15),(11,7,3),(12,7,13),(13,7,26);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_optional`
--

LOCK TABLES `users_optional` WRITE;
/*!40000 ALTER TABLE `users_optional` DISABLE KEYS */;
INSERT INTO `users_optional` VALUES (1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607189587hales3profile.jpg'),(2,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607635508sunrajprofile.JPG'),(3,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607635563trehamprofile.jpg');
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

-- Dump completed on 2020-12-11 14:39:43
