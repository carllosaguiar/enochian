CREATE TABLE IF NOT EXISTS `enochian_db`.`tb_arcane` (
    `idarcane` INT NOT NULL,
    `image` LONGBLOB NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `letter` VARCHAR(45) NOT NULL,
    `spiritual_plane` VARCHAR(255) NOT NULL,
    `mental_plane` VARCHAR(255) NOT NULL,
    `physical_plane` VARCHAR(255) NOT NULL,
    `transcendent_axiom` VARCHAR(255) NOT NULL,
    `astrological_association` VARCHAR(255) NOT NULL,
    `in_general` VARCHAR(255) NOT NULL,
    `right` VARCHAR(255) NOT NULL,
    `reverse` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idarcane`),
    UNIQUE INDEX `idarcane_UNIQUE` (`idarcane` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8

CREATE TABLE IF NOT EXISTS `enochian_db`.`tb_user` (
    `iduser` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(45) NOT NULL,
    `image` LONGBLOB NULL,
    `email` VARCHAR(45) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`iduser`),
    UNIQUE INDEX `iduser_UNIQUE` (`iduser` ASC) VISIBLE,
    UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
    UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8

CREATE TABLE IF NOT EXISTS `enochian_db`.`tb_inner_urgency` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `inner_urgency` INT NOT NULL,
    `iduser` INT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_tb_inner_urgency_idx` (`iduser` ASC) VISIBLE,
    CONSTRAINT `fk_tb_inner_urgency`
    FOREIGN KEY (`iduser`)
    REFERENCES `enochian_db`.`tb_user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8

CREATE TABLE IF NOT EXISTS `enochian_db`.`tb_fundamental_tonic` (
    `id` INT NOT NULL,
    `fundamental_tonic` INT NOT NULL,
    `iduser` INT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_tb_fundamental_tonic_idx` (`iduser` ASC) VISIBLE,
    CONSTRAINT `fk_tb_fundamental_tonic`
    FOREIGN KEY (`iduser`)
    REFERENCES `enochian_db`.`tb_user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8