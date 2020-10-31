CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `rscid` VARCHAR(10) NOT NULL,
    `fname` VARCHAR(50) NOT NULL,
    `lname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `users_optional` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `id` INT(10) signed NOT NULL
    `bio` VARCHAR(1000),
    `twitter` VARCHAR(100),
    `facebook` VARCHAR(100),
    `phone` INT(10) signed,
    `discord` VARCHAR(25), 
    `snapchat` VARCHAR(30),
    `instagram` VARCHAR(30),
    PRIMARY KEY (`index`)
);

CREATE TABLE IF NOT EXISTS `users_interests` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `id` INT(10) signed NOT NULL,
    `interest` INT NOT NULL,
    PRIMARY KEY (`index`)
);

CREATE TABLE IF NOT EXISTS `attraction_registry` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100),
    `bio` VARCHAR(1000),
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `attraction_category` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `attraction_id` INT(10) signed NOT NULL,
    `category` VARCHAR(30) NOT NULL,
    PRIMARY KEY (`index`)
);

CREATE TABLE IF NOT EXISTS `reviews` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `author_id` INT(10) signed NOT NULL,
    `review_body` VARCHAR(2000) NOT NULL,
    `child_id` INT(10) signed,
    `rating` INT(2) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `comments` (
    `id` INT(10) signed NOT NULL AUTO_INCREMENT,
    `author_id` INT(10) signed NOT NULL,
    `comment_body` VARCHAR(300) NOT NULL,
    `parent_id` INT(10) signed NOT NULL,
    `child_id` INT(10) signed NOT NULL,
    `likes` INT(10),
    `dislikes` INT(10),
    PRIMARY KEY(`id`)
);