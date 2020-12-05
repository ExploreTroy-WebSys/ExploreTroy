CREATE TABLE `adminlist` (
  `id` int(10) NOT NULL,
  `rcsid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `adminlist` (`id`, `rcsid`) VALUES
(1, 'bonada'),
(2, 'sunraj'),
(3, 'hales3'),
(4, 'treham');


CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `rcsid` VARCHAR(10) NOT NULL,
    `fname` VARCHAR(50) NOT NULL,
    `lname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `users_optional` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `id` INT(10) signed NOT NULL,
    `bio` VARCHAR(1000),
    `twitter` VARCHAR(100),
    `facebook` VARCHAR(100),
    `phone` BIGINT signed,
    `discord` VARCHAR(25), 
    `snapchat` VARCHAR(30),
    `instagram` VARCHAR(30),
    `profilePictureLocation` VARCHAR(255),
    PRIMARY KEY (`index`),
    FOREIGN KEY (`id`) REFERENCES users(`id`)
    ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `tags` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `tag_name` VARCHAR(25) NOT NULL,
    `category` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `users_interests` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `user_id` INT(10) signed NOT NULL,
    `interest` INT NOT NULL,
    PRIMARY KEY (`index`),
    FOREIGN KEY (`user_id`) REFERENCES users(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`interest`) REFERENCES tags(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `attractions` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `description` VARCHAR(1000),
    `phone` VARCHAR(20) NOT NULL,
    `avg_rating` FLOAT(2) NOT NULL DEFAULT 0.0,
    `address` VARCHAR(100) NOT NULL,
    `link` VARCHAR(300) NOT NULL,
    `attractionPictureLocation` VARCHAR(255) DEFAULT NULL,
    `lat` FLOAT,
    `lng` FLOAT,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `followers` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `follower_id` INT(10) signed NOT NULL,
    `followed_id` INT(10) signed NOT NULL,
    PRIMARY KEY (`index`),
    FOREIGN KEY (`follower_id`) REFERENCES users(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`followed_id`) REFERENCES users(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `attractions_categories` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `attraction_id` INT(10) signed NOT NULL,
    `category` INT(10) signed NOT NULL,
    PRIMARY KEY (`index`),
    FOREIGN KEY (`attraction_id`) REFERENCES attractions(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`category`) REFERENCES tags(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `reviews` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `author_id` INT(10) signed NOT NULL,
    `attraction_id` INT(10) signed NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `review_body` VARCHAR(2000) NOT NULL,
    `date` VARCHAR(50) NOT NULL,
    `rating` INT(2) NOT NULL,
    `likes` INT(10) DEFAULT 0,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`author_id`) REFERENCES users(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`attraction_id`) REFERENCES attractions(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `comments` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `author_id` INT(10) signed NOT NULL,
    `comment_body` VARCHAR(300) NOT NULL,
    `parent_id` INT(10) signed NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`author_id`) REFERENCES users(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`parent_id`) REFERENCES reviews(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `favorites` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `attraction_id` INT(10) signed NOT NULL,
    `user_id` INT(10) signed NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`attraction_id`) REFERENCES attractions(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES users(`id`) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS `user_like` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `like_id` INT(10) signed NOT NULL,
    `review_id` INT(10) signed NOT NULL,
    PRIMARY KEY(`id`)
);


INSERT INTO `favorites` (`id`, `attraction_id`, `user_id`) VALUES
(57, 3, 1),
(58, 9, 1),
(59, 1, 1),
(60, 4, 1);

INSERT INTO `attractions` (`id`, `name`, `description`, `phone`, `avg_rating`, `address`, `lat`, `lng`) VALUES
(1, 'The Whistling Kettle', 'Contemporary cafe & tearoom serving savory crepes, panini & salads, plus afternoon tea.', '(518) 874-1938', 4.6, '254 Broadway, Troy, NY 12180',42.7209687,-73.7147398),
(2, 'Dinosaur Bar-B-Que', 'Barbecue chain serving Southern-style meats & draft brews in a retro setting (most have live music).', '(518) 308-0400', 4.4, '377 River St, Troy, NY 12180',42.7326548,-73.6878615),
(3, 'Druthers Brewing Company', 'Elevated comfort food and handcrafted beer.', '(518) 650-7996', 4.5, '1053 Broadway, Albany, NY 12204',42.6711755,-73.746359),
(4, "De Fazio\'s", 'Italian eatery serving wood-fired pies & handmade treats in an easygoing outlet with outdoor tables.', '(518) 271-1111', 4.6, '266 4th St, Troy, NY 12180',42.7232157,-73.6927589),
(5, 'Slidin Dirty', 'Lively, compact outpost featuring inventive sliders, cocktails & craft brews in a rustic-chic venue.', '(518) 326-8492', 4.1, '9 1st St, Troy, NY 12180',42.7306479,-73.6952804),
(6, 'Troy Waterfront Farmers Market', 'Our market provides access to healthy, locally grown food for our community.', '(518) 708-4216', 4.8, 'Riverfront Park, Troy, NY 12180',42.7320688,-73.6915275),
(7, 'Truly Rhe', 'Truly Rhe is the premier women’s boutique in Troy, NY.', '(518) 273-1540', 4.9, '1 Broadway, Troy, NY 12180',NULL,NULL),
(8, 'Rainbow Shops', 'Apparel chain offering fashionable clothing for juniors & plus-size women, plus accessories.', '(518) 274-3801', 3.8, '120 Hoosick St, Troy, NY 12180',NULL,NULL),
(9, 'Prospect Park', 'Prospect Park is an 80-acre city park in Troy, New York.', '(518) 235-0215', 4.3, '65 Prospect Park Rd, Troy, NY 12180',NULL,NULL);

INSERT INTO `reviews` (`id`, `author_id`, `attraction_id`, `title`, `review_body`, `date`, `rating`, `likes`) VALUES
(1, 1, 1, 'Fantastic food and service', "I love this place! The food is great and the servers are so nice. Plus it\'s not too far from campus.", '11/01/2020', 4, 26),
(3, 1, 1, 'My favorite place to eat!', 'I go to The Whistling Kettle with my friends almost every weekend. They have the best sandwiches and so many teas to choose from. Highly recommend!', '11/02/2020', 5, 16),
(4, 1, 1, 'Awesome options', "There are so many different options for everyone. There's something for everyone!", '11/03/2020', 5, 13),
(8, 1, 1, 'Great lunch spot', 'This is a great choice for a quick lunch.', '11/07/2020', 3, 1),
(9, 1, 1, 'My favorite place', 'The Whistling Kettle is my favorite place ever!', '11/14/2020', 5, 4),
(10, 1, 1, 'Best place ever', 'The Whistling Kettle is the greatest restaurant ever.', '11/13/2020', 4, 1);

INSERT INTO `comments` (`id`, `author_id`, `comment_body`, `parent_id`) VALUES
(1, 1, 'I also love The Whistling Kettle. So many good options!', 1),
(3, 1, 'Agreed! Such a great place to grab a bite.', 1),
(4, 1, "I've always wanted to go there. Now I definitely will!", 1),
(5, 1, "What's your favorite tea to get?", 3),
(8, 1, 'My favorite is the hot chocolate.', 3),
(9, 1, 'I like the hot chocolate too.', 3),
(10, 1, 'I just went there! The food is great.', 3),
(16, 1, 'This is my favorite place!', 1),
(17, 1, 'I agree! So much to choose from.', 4),
(36, 1, 'So true! I always find something new to try!', 4),
(40, 1, "I couldn't agree more.", 3),
(45, 1, "That's so true!", 1),
(46, 1, 'I agree.', 1),
(47, 1, 'I agree.', 4),
(48, 1, 'Same here.', 4),
(49, 1, 'Me too!', 1),
(50, 1, 'Same here!', 1),
(51, 1, 'Me as well.', 1),
(52, 1, 'I agree also!', 3),
(53, 1, 'Great place!', 4),
(54, 1, 'Me too!', 3),
(55, 1, 'Best place ever.', 4),
(56, 1, 'Same here!', 3),
(57, 1, 'Same here.', 1),
(58, 1, 'Me too.', 1),
(59, 1, 'Same here!', 1),
(60, 1, 'Agreed!', 8),
(61, 1, 'Same.', 9),
(62, 1, 'Me too.', 9),
(63, 1, 'Same.', 9),
(64, 1, 'Me too.', 9),
(65, 1, 'Same!', 9),
(66, 1, 'Me too!', 9),
(67, 1, 'Same!', 9),
(68, 1, 'Agreed.', 9),
(69, 1, 'Same here.', 9),
(70, 1, 'Agreed!', 9),
(71, 1, 'Same.', 8),
(72, 1, 'Me too!', 8),
(73, 1, 'Agreed.', 8),
(74, 1, 'I agree.', 1),
(75, 1, 'Same here.', 9),
(76, 1, 'So true.', 8),
(77, 1, 'Agree!', 10),
(78, 1, 'I completely agree.', 10),
(79, 1, 'Very true.', 10);

INSERT INTO `tags` (`tag_name`, `category`) VALUES
    ('Chinese', 'Restaurant'),
    ('Mexican', 'Restaurant'),
    ('Italian', 'Restaurant'),
    ('Jamaican', 'Restaurant'),
    ('Sit-Down', 'Restaurant'),
    ('Fast Food', 'Restaurant'),
    ('Cheap', 'Restaurant'),
    ('Outdoor Seating', 'Restaurant'),
    ('Casual', 'Restaurant'),
    ('Formal', 'Restaurant'),
    ('Vegan', 'Restaurant'),
    ('Breakfast', 'Restaurant'),
    ('Lunch', 'Restaurant'),
    ('Dinner', 'Restaurant'),
    ('Desert', 'Restaurant'),
    ('Ice-Cream', 'Restaurant'),
    ('Steak', 'Restaurant'),
    ('Burger', 'Restaurant'),
    ('Clothes', 'Shopping'),
    ('Toys', 'Shopping'),
    ('Books', 'Shopping'),
    ('Electronics', 'Shopping'),
    ('Grocery', 'Shopping'),
    ('Drug Store', 'Shopping'),
    ('Hiking', 'Recreation'),
    ('Swimming', 'Recreation'),
    ('Sports Field', 'Recreation'),
    ('Biking', 'Recreation'),
    ('Indoor', 'Recreation'),
    ('Kayak', 'Recreation'),
    ('Gym', 'Recreation'),
    ('Rock-Climbing', 'Recreation'),
    ('Skatepark', 'Recreation'),
    ('Basketball', 'Recreation'),
    ('Stadium', 'Recreation');

INSERT INTO `users` (`rcsid`, `fname`,`lname`,`email`) VALUES
    ('zhanh', 'haotian', 'zhan', 'haotianzhan7@gmail.com'),
    ('linz10', 'zhanfeng', 'lin', 'linz10@rpi.edu'),
    ('zhout5', 'tianshi','zhou','zhout5@rpi.edu'),
    ('wand12', 'dannong','wang','wand12@rpi.edu');


-- haotian
