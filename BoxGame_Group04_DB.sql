-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema boxgame
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema boxgame
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `boxgame` DEFAULT CHARACTER SET utf8 ;
USE `boxgame` ;

-- -----------------------------------------------------
-- Table `boxgame`.`game`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`game` (
  `gameId` VARCHAR(45) NOT NULL,
  `price` INT NOT NULL,
  `description` VARCHAR(500) NOT NULL,
  `icon` VARCHAR(45) NOT NULL,
  `gameplay` VARCHAR(45) NOT NULL,
  `release_date` DATETIME NOT NULL,
  `developer` VARCHAR(45) NOT NULL,
  `developer_web` VARCHAR(45) NULL,
  `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sale` INT NULL DEFAULT 0,
  PRIMARY KEY (`gameId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boxgame`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`user` (
  `userId` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `birthdate` DATETIME NOT NULL,
  `update_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `image` VARCHAR(45) NULL,
  PRIMARY KEY (`userId`));


-- -----------------------------------------------------
-- Table `boxgame`.`rating`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`rating` (
  `userId` VARCHAR(45) NOT NULL,
  `gameId` VARCHAR(45) NOT NULL,
  `message` VARCHAR(1000) NULL,
  `star` FLOAT NOT NULL,
  `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` TIMESTAMP NULL,
  PRIMARY KEY (`userId`, `gameId`),
  CONSTRAINT `user_cmt`
    FOREIGN KEY (`userId`)
    REFERENCES `boxgame`.`user` (`userId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `game_cmt`
    FOREIGN KEY (`gameId`)
    REFERENCES `boxgame`.`game` (`gameId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `boxgame`.`cart_master`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`cart_master` (
  `cardId` INT NOT NULL AUTO_INCREMENT,
  `userId` VARCHAR(45) NOT NULL,
  `create_at` TIMESTAMP GENERATED ALWAYS AS (CURRENT_TIMESTAMP) VIRTUAL,
  `status` BIT NOT NULL DEFAULT 0,
  PRIMARY KEY (`cardId`),
  CONSTRAINT `name_cart`
    FOREIGN KEY (`userId`)
    REFERENCES `boxgame`.`user` (`userId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `boxgame`.`cart_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`cart_details` (
  `cartId` INT NOT NULL,
  `gameId` VARCHAR(45) NOT NULL,
  `quantity` INT NOT NULL,
  PRIMARY KEY (`cartId`, `gameId`),
  CONSTRAINT `game_cart`
    FOREIGN KEY (`gameId`)
    REFERENCES `boxgame`.`game` (`gameId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `cart`
    FOREIGN KEY (`cartId`)
    REFERENCES `boxgame`.`cart_master` (`cardId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `boxgame`.`account_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`account_admin` (
  `adminId` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `status` BIT NOT NULL DEFAULT 1,
  `phone` VARCHAR(10) NULL,
  `create_at` VARCHAR(45) NULL,
  `update_at` VARCHAR(45) NULL,
  `image` VARCHAR(45) NULL,
  PRIMARY KEY (`adminId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boxgame`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`type` (
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `boxgame`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`category` (
  `category` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `gameId` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`category`),
  CONSTRAINT `game_cate`
    FOREIGN KEY (`gameId`)
    REFERENCES `boxgame`.`game` (`gameId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `type_cate`
    FOREIGN KEY (`type`)
    REFERENCES `boxgame`.`type` (`type`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `boxgame`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`payment` (
  `cardId` INT NOT NULL AUTO_INCREMENT,
  `userId` VARCHAR(45) NOT NULL,
  `card_number` INT(12) NOT NULL,
  `cvv` INT(3) NOT NULL,
  `payment_date` DATETIME NOT NULL,
  PRIMARY KEY (`cardId`),
  CONSTRAINT `user_payment`
    FOREIGN KEY (`userId`)
    REFERENCES `boxgame`.`user` (`userId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `boxgame`.`System_requirement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `boxgame`.`System_requirement` (
  `sysId` INT NOT NULL AUTO_INCREMENT,
  `gameId` VARCHAR(45) NOT NULL,
  `os` VARCHAR(45) NOT NULL,
  `version` VARCHAR(45) NOT NULL,
  `storage` VARCHAR(45) NOT NULL,
  `ram` VARCHAR(45) NOT NULL,
  `chip` VARCHAR(45) NOT NULL,
  `graphic` VARCHAR(45) NULL,
  `internet` VARCHAR(45) NULL,
  PRIMARY KEY (`sysId`),
  CONSTRAINT `game_sys_re`
    FOREIGN KEY (`gameId`)
    REFERENCES `boxgame`.`game` (`gameId`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

ALTER TABLE `game` ADD `number_sold` INT(100) NULL AFTER `sale`, ADD `top_page` BIT(1) NULL AFTER `number_sold`, ADD `coming_soon` BIT(1) NULL AFTER `top_page`, ADD `most_played` BIT(1) NULL AFTER `coming_soon`;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- Value of type
INSERT INTO `type` (`type`) VALUES ('Sandbox'), ('MOBA'), ('PvP'), ('PvE'), ('Adventure'), ('Co-op'), ('Strategic'), ('2D'), ('FPS'), ('Garden'), ('Family'), ('Crafting');
-- Value of account_admin
INSERT INTO `account_admin` (`adminId`, `name`, `email`, `password`, `status`, `phone`, `create_at`, `update_at`, `image`) VALUES ('loc', 'Mr. Ezzzz', 'loclongla1999@gmail.com', '1111', b'1', NULL, NULL, NULL, NULL);
INSERT INTO `account_admin` (`adminId`, `name`, `email`, `password`, `status`, `phone`, `create_at`, `update_at`, `image`) VALUES ('admin', 'admin', 'admin@gmail.com', '1111', b'1', NULL, NULL, NULL, NULL);
-- Game table
INSERT INTO
  `game` (
    `gameId`,
    `description`,
    `price`,
    `release_date`,
    `developer`,
    `developer_web`,
    `icon`,
    `top_page`,
    `most_played`,
    `coming_soon`,
    `gameplay`
  )
VALUES
  (
    Uncharted_Legacy_of_Thieves,
    Play AS Nathan Drake
    AND Chloe Frazer IN their own standalone adventures AS they confront their pasts
    AND forge their own legacies.This game includes the critically acclaimed single - player stories
    FROM
      BOTH UNCHARTED 4: A Thief ’ s
  END
  AND UNCHARTED: The Lost Legacy.,
  60,
  2022 -10 -19,
  Naghty Dog,
  https: / / www.naughtydog.com /,
  img / game / Uncharted_Legacy_of_Thieves / icon / icon.jpg,
  1,
  0,
  1,
  img / game / Uncharted_Legacy_of_Thieves / gameplay /
)
