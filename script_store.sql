-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema store
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema store
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `store` DEFAULT CHARACTER SET utf8 ;
USE `store` ;

-- -----------------------------------------------------
-- Table `store`.`store_client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store`.`store_client` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `address` VARCHAR(100) NULL,
  `postal_code` VARCHAR(10) NULL,
  `email` VARCHAR(45) NOT NULL,
  `birthday` DATE NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store`.`store_product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(100) NULL,
  `cost` DOUBLE NULL,
  `price` DOUBLE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_sale`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store`.`store_sale` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `store_client_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_store_sale_store_client_idx` (`store_client_id` ASC),
  CONSTRAINT `fk_store_sale_store_client`
    FOREIGN KEY (`store_client_id`)
    REFERENCES `store`.`store_client` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `store`.`store_product_sale`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `store`.`store_product_sale` (
  `sale_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `price` DOUBLE NOT NULL,
  PRIMARY KEY (`sale_id`, `product_id`),
  INDEX `fk_store_sale_has_store_product_store_product1_idx` (`product_id` ASC),
  INDEX `fk_store_sale_has_store_product_store_sale1_idx` (`sale_id` ASC),
  CONSTRAINT `fk_store_sale_has_store_product_store_sale1`
    FOREIGN KEY (`sale_id`)
    REFERENCES `store`.`store_sale` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_store_sale_has_store_product_store_product1`
    FOREIGN KEY (`product_id`)
    REFERENCES `store`.`store_product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
