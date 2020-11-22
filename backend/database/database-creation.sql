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
    `profile_picture` BLOB,
    `bio` VARCHAR(1000),
    `twitter` VARCHAR(100),
    `facebook` VARCHAR(100),
    `phone` BIGINT signed,
    `discord` VARCHAR(25), 
    `snapchat` VARCHAR(30),
    `instagram` VARCHAR(30),
    PRIMARY KEY (`index`),
    FOREIGN KEY (`id`) REFERENCES users(`id`)
);

CREATE TABLE IF NOT EXISTS `tags` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `interest_name` VARCHAR(25) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `users_interests` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `user_id` INT(10) signed NOT NULL,
    `interest` INT NOT NULL,
    PRIMARY KEY (`index`),
    FOREIGN KEY (`user_id`) REFERENCES users(`id`),
    FOREIGN KEY (`interest`) REFERENCES tags(`id`)
);

CREATE TABLE IF NOT EXISTS `attractions` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `description` VARCHAR(1000),
    `phone` BIGINT signed NOT NULL,
    `avg_rating` FLOAT(2) NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `attraction_picture` BLOB,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `attractions_categories` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `attraction_id` INT(10) signed NOT NULL,
    `category` INT(10) signed NOT NULL,
    PRIMARY KEY (`index`),
    FOREIGN KEY (`attraction_id`) REFERENCES attractions(`id`)
    FOREIGN KEY (`category`) REFERENCES tags(`id`)
);

CREATE TABLE IF NOT EXISTS `reviews` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `author_id` INT(10) signed NOT NULL,
    `review_body` VARCHAR(2000) NOT NULL,
    `child_id` INT(10) signed,
    `rating` INT(2) NOT NULL,
    `likes` INT(10) DEFAULT 0,
    `dislikes` INT(10) DEFAULT 0,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`author_id`) REFERENCES users(`id`)
);

CREATE TABLE IF NOT EXISTS `comments` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `author_id` INT(10) signed NOT NULL,
    `comment_body` VARCHAR(300) NOT NULL,
    `parent_id` INT(10) signed NOT NULL,
    `likes` INT(10) DEFAULT 0,
    PRIMARY KEY(`id`),
    FOREIGN KEY (`author_id`) REFERENCES users(`id`),
    FOREIGN KEY (`parent_id`) REFERENCES reviews(`id`)
);

INSERT INTO `attractions` (`name`, `description`, `phone`, `avg_rating`, `address`) VALUES ('test place', 'with a test description', '1234567890', '2.1', '123 Place Blvd. Troy, NY');
INSERT INTO `attractions` (`name`, `description`, `phone`, `avg_rating`, `address`) VALUES ('test place 2', 'with another test description', '0987654321', '4.1', '321 Loc Str. Troy, NY');