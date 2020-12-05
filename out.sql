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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions`
--

LOCK TABLES `attractions` WRITE;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;
INSERT INTO `attractions` VALUES (11,'Manory\'s','Casual, modest diner throwback serving classic American comfort foods for more than 100 years.','(518) 272-2422',4,'99 Congress St, Troy, NY 12180',42.7289,-73.6892,'manorys.PNG'),(12,'The Whistling Kettle','Contemporary cafe & tearoom serving savory crepes, panini & salads, plus afternoon tea.','(518) 874-1938',3.67,'254 Broadway, Troy, NY 12180',NULL,NULL,'The Whistling Kettle.jpg'),(14,'Dinosaur Bar-B-Que','Barbecue chain serving Southern-style meats & draft brews in a retro setting (most have live music).','(518) 308-0400',3.67,'377 River St, Troy, NY 12180',NULL,NULL,'Dinosaur Bar-B-Que.jpg'),(16,'Grafton State Park','Grafton Lakes State Park is a 2,545-acre state park located in Rensselaer County, New York, United States.','(518) 279-1155',3,'254 Grafton Lakes State Park Way, Grafton, NY 12082',NULL,NULL,'Grafton State Park.webp'),(17,'Troy Waterfront Farmers Market','Our market provides access to healthy, locally grown food for our community.','(518) 708-4216',5,'Riverfront Park, Troy, NY 12180',NULL,NULL,'Troy Waterfront Farmers Market.jpg'),(18,'T&J Handcrafted Soap','Gift shop in Troy, New York','(518) 272-2660',5,'271 River St, Troy, NY 12180',NULL,NULL,'T&J Handcrafted Soap.PNG'),(19,'Slidin\' Dirty','Lively, compact outpost featuring inventive sliders, cocktails & craft brews in a rustic-chic venue.','(518) 326-8492',1.5,'9 1st St, Troy, NY 12',NULL,NULL,'Slidin\' Dirty.jpg'),(20,'Truly Rhe','Truly Rhe is the premier women’s boutique in Troy, NY.','(518) 273-1540',4,'1 Broadway, Troy, NY 12180',NULL,NULL,'Truly Rhe.jpg'),(21,'Nighthawks','100% locally sourced farm to table restaurant located in Downtown Troy! Open 7 days a week! Daily specials & take out available!','(518) 272-1000',4.5,'461 Broadway, Troy, NY 12180',NULL,NULL,'Nighthawks.jpg'),(22,'Prospect Park','Prospect Park is an 80-acre city park in Troy, New York.','(518) 235-0215',5,'65 Prospect Park Rd, Troy, NY 12180',NULL,NULL,'Prospect Park.jpg'),(24,'Pastime Legends','Video game store in Troy, New York','(518) 272-6872',2,'73 4th St, Troy, NY 12180',NULL,NULL,'Pastime Legends.PNG'),(26,'Russell Sage Dining Hall','RPI Dining Hall','2314123',3,'1234 Place St.',NULL,NULL,'Russell Sage Dining Hall.jpg'),(27,'Duck Donuts','Made-to-order donuts','2394817',4,'1234 Roundable str.',NULL,NULL,'Duck Donuts.jpeg');
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions_categories`
--

LOCK TABLES `attractions_categories` WRITE;
/*!40000 ALTER TABLE `attractions_categories` DISABLE KEYS */;
INSERT INTO `attractions_categories` VALUES (4,11,14),(5,11,37),(6,11,38),(7,12,5),(8,12,9),(9,12,11),(10,12,12),(11,12,13),(12,12,36),(13,12,38),(14,14,9),(15,14,14),(16,14,37),(18,16,25),(19,16,26),(20,16,28),(21,17,39),(22,17,40),(23,18,41),(24,18,42),(25,19,13),(26,19,14),(27,19,18),(28,20,19),(29,21,5),(30,21,9),(31,21,13),(32,21,14),(33,21,17),(34,21,18),(35,21,37),(36,22,25),(37,22,28),(38,22,43),(41,24,20),(42,24,22),(55,26,5),(56,26,7),(57,26,9),(58,26,18),(59,27,9),(60,27,15),(61,27,45);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (2,7,'I agree! I love the food here.',4),(3,6,'I agree. They have good quality clothes.',12),(4,6,'I agree. Too good.',13),(5,5,'For real, they\'re a little hard to get a table with during the fall move-in but still some great food',5),(6,7,'It ruined my Thanksgiving too.',22),(7,6,'I agree. The food is super awesome.',14),(9,5,'Totally agree',14);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorites`
--

LOCK TABLES `favorites` WRITE;
/*!40000 ALTER TABLE `favorites` DISABLE KEYS */;
INSERT INTO `favorites` VALUES (3,12,7),(5,14,5),(6,11,5),(8,11,8),(9,21,8),(11,12,5);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (2,7,8),(3,5,7),(4,8,5),(5,8,7),(6,8,6);
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (3,8,11,'Great Coffee!','I had coffee here and loved it!','12/01/2020',4,2),(4,5,12,'Perfect place to prep for finals','I love to come here to get ready for the onslaught that is finals week, can\'t recommend the apple green tea enough.','12/11/2020',5,1),(5,7,14,'Great food','The food here is so good. This is one of my favorite restaurants in Troy.','12/04/2020',4,1),(7,6,14,'Great Food','Really enjoyed my dinner there last night. Must have the \'Wango Tango\' wings...so delicious!','11/28/2020',5,1),(8,5,16,'Worth the trip','My dog and I go hiking here a few times a week, it\'s a bit of a trip outside of Troy but the views are totally worth it.','09/09/2020',4,0),(9,7,17,'Great vendors','There are so many great vendors here. I love all of the food and the music!','12/11/2020',5,1),(10,8,18,'Nice soap!','Got some nice soap here.','11/04/2020',5,0),(11,6,19,'Never Again','I went yesterday for lunch with my family and the service was absolutely terrible. We waited almost an hour for our food. We even had to ask them three times to bring us our drinks. Never Again!','11/21/2020',1,0),(12,7,20,'Great store','I found this little boutique when exploring Troy with my friends. The clothing is so pretty!','12/17/2020',4,0),(13,5,21,'Fun little spot','These guys have killer burgers, check \'em out.','10/13/2019',4,0),(14,7,12,'Great service','This is a great place to grab a quick bite to eat. The service is amazing, and the servers are so nice.','12/11/2020',5,0),(15,8,12,'It was alright.','My grandmother fell down and broke her thumbs trying to sit down in one of the booths. Soup was good though. 4 stars.','12/02/2020',4,0),(16,5,11,'These guys have a great breakfast','If you can find space for a Sunday brunch this is where to do it!','10/21/2020',4,1),(17,6,22,'Great Park!','Enjoyed my Sunday afternoon at the park. Lots of green space perfect for a picnic. ','11/22/2020',5,1),(18,8,16,'The water is too cold.','I know its November but really? This is outrageous. Make the water warmer please. I\'ll be in touch....','11/18/2020',2,1),(19,6,17,'Great Experience','This is one of the best farmers market\'s I have ever been! So many good choices. Perfect place to spend a Saturday afternoon. ','10/11/2020',5,2),(20,8,19,'Sliding \"Clean\"?','I was excited when I found this place as the name of this establishment implies sliding and dirt. Reminded me of my childhood roughhousing with Chuck in the mud flats. Sad to say that on my visit I was treated to a perfectly clean dining establishment. Very disappointed.','12/01/2020',2,1),(21,8,21,'Nighthawks is such a cool name.','The food here is absolutely horrible. However, Nighthawks is such an awesome name I cant complain. Reminds me of the tile of a Tom Cruise film.','12/01/2020',5,0),(22,8,14,'No Dinosaurs','There were no dinosaurs, only barbeque. Ruined Thanksgiving.','11/26/2020',2,1),(24,8,24,'These games rock!!','I got a PlayStation 2 here as a treat for myself for my birthday. I was very sad at time and had cried the night before. Thank you for the PlayStation. They really live up to the titular \"Legends\". 2 stars, Final Fantasy 10 sucks.','02/03/2020',2,0),(26,5,26,'I ate food here','I was edible','03/04/2020',3,0),(27,5,27,'Great donuts','These guys just opened up the other day, there was a pretty crazy line to get into the place but other than that I can\'t recommend the donuts enough they\'re so good.','12/03/2020',4,0),(28,5,12,'fodo here','mmm mmm','12/01/2020',2,0),(29,5,12,'fodo here','mmm mmm','12/01/2020',2,0),(30,5,12,'mmmh foos','wow eats tea','12/09/2020',4,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Chinese','Restaurant'),(2,'Mexican','Restaurant'),(3,'Italian','Restaurant'),(4,'Jamaican','Restaurant'),(5,'Sit-Down','Restaurant'),(6,'Fast Food','Restaurant'),(7,'Cheap','Restaurant'),(8,'Outdoor Seating','Restaurant'),(9,'Casual','Restaurant'),(10,'Formal','Restaurant'),(11,'Vegan','Restaurant'),(12,'Breakfast','Restaurant'),(13,'Lunch','Restaurant'),(14,'Dinner','Restaurant'),(15,'Desert','Restaurant'),(16,'Ice-Cream','Restaurant'),(17,'Steak','Restaurant'),(18,'Burger','Restaurant'),(19,'Clothes','Shopping'),(20,'Toys','Shopping'),(21,'Books','Shopping'),(22,'Electronics','Shopping'),(23,'Grocery','Shopping'),(24,'Drug Store','Shopping'),(25,'Hiking','Recreation'),(26,'Swimming','Recreation'),(27,'Sports Field','Recreation'),(28,'Biking','Recreation'),(29,'Indoor','Recreation'),(30,'Kayak','Recreation'),(31,'Gym','Recreation'),(32,'Rock-Climbing','Recreation'),(33,'Skatepark','Recreation'),(34,'Basketball','Recreation'),(35,'Stadium','Recreation'),(36,'Brunch','restaurant'),(37,'Burgers','restaurant'),(38,'Coffee','restaurant'),(39,'Food','excursion'),(40,'Music','excursion'),(41,'Gift','shop'),(42,'Soap','shop'),(43,'Picnic','excursion'),(44,'Auditorium','excursion'),(45,'Donuts','Restaurant');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_like`
--

LOCK TABLES `user_like` WRITE;
/*!40000 ALTER TABLE `user_like` DISABLE KEYS */;
INSERT INTO `user_like` VALUES (2,7,4),(3,7,3),(4,6,9),(5,6,19),(6,5,5),(7,6,20),(8,7,16),(9,7,7),(10,7,22),(11,7,19),(12,6,17),(13,5,25),(14,5,3),(15,5,18);
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_interests`
--

LOCK TABLES `users_interests` WRITE;
/*!40000 ALTER TABLE `users_interests` DISABLE KEYS */;
INSERT INTO `users_interests` VALUES (1,7,28),(2,7,12),(3,7,36),(23,5,36),(24,5,38),(25,5,22),(26,5,23),(27,5,31),(28,5,25),(29,5,30),(30,5,8),(31,5,42),(32,5,26);
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
INSERT INTO `users_optional` VALUES (2,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607034215trehamprofile.jpg'),(3,5,'Presentation bio','seanthehale',NULL,NULL,NULL,'seanthehale',NULL,'1607110283hales3profile.jpg'),(4,7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607034234sunrajprofile.JPG'),(5,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1607034236bonadaprofile.jpg');
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

-- Dump completed on 2020-12-05 12:17:51
