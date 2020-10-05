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
    PRIMARY KEY (`index`)
);

CREATE TABLE IF NOT EXISTS `users_interests` (
    `index` INT(10) signed NOT NULL AUTO_INCREMENT,
    `id` INT(10) signed NOT NULL,
    `interest` INT NOT NULL,
    PRIMARY KEY (`index`)
);