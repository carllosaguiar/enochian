CREATE TABLE IF NOT EXISTS `enochian_db`.`arcane` (
    `idarcane` INT NOT NULL,
    `image` LONGBLOB NOT NULL,
    `nome` VARCHAR(45) NOT NULL,
    `description` VARCHAR(45) NOT NULL,
    `letter` VARCHAR(45) NOT NULL,
    `spiritual_plane` VARCHAR(45) NOT NULL,
    `mental_plane` VARCHAR(45) NOT NULL,
    `physical_plane` VARCHAR(45) NOT NULL,
    `transcendent_axiom` VARCHAR(45) NOT NULL,
    `astrological_association` VARCHAR(45) NOT NULL,
    `in_general` VARCHAR(45) NOT NULL,
    `right` VARCHAR(45) NOT NULL,
    `reverse` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idarcane`),
    UNIQUE INDEX `idarcane_UNIQUE` (`idarcane` ASC) VISIBLE)
ENGINE = InnoDB