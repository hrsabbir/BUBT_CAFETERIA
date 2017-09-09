CREATE TABLE IF NOT EXISTS `cms`.`registration` ( `fname` VARCHAR(20) NOT NULL , `lname` VARCHAR(20) NOT NULL , `username` VARCHAR(20) NOT NULL , `mobile` INT(12) NOT NULL , `email`  VARCHAR(30) NOT NULL , PRIMARY KEY (`username`)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `cms`.`item` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `stock` INT(10) NOT NULL , `image_name` VARCHAR(20) NULL , `price` INT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `cms`.`orders` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `session` VARCHAR(60) NOT NULL , `item_id` INT(10) NOT NULL , `item_name` VARCHAR(20) NOT NULL , `amount` INT(10) NOT NULL , `total_price` INT(10) NOT NULL , `stock` INT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `cms`.`confirmed_orders` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `session` VARCHAR(60) NOT NULL , `item_id` INT(10) NOT NULL , `item_name` VARCHAR(20) NOT NULL , `quantity` INT(10) NOT NULL , `total_price` INT(10) NOT NULL , `token` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `cms`.`login` ( `id` INT(15) NOT NULL AUTO_INCREMENT , `username` VARCHAR(20) NOT NULL , `email` VARCHAR(30) NOT NULL , `password` VARCHAR(60) NOT NULL , `update_time` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) , `session` VARCHAR(60) NOT NULL , `user_type` VARCHAR(6) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`username`), UNIQUE (`email`)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `cms`.`sold` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `item_name` VARCHAR(20) NOT NULL , `item_quantity` INT(10) NOT NULL , `item_price` INT(10) NOT NULL , `time` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) , `username` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `cms`.`contact_us` ( `name` VARCHAR(20) NOT NULL , `mobile` VARCHAR(11) NOT NULL , `email` VARCHAR(30) NOT NULL , `message` TEXT NOT NULL , `time` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ) ENGINE = InnoDB;