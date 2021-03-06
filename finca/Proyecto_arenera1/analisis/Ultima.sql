-- MySQL Script generated by MySQL Workbench
-- 08/02/17 00:01:22
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`TipoArena`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TipoArena` (
  `idTipoArena` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoArena`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Salarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Salarios` (
  `idSalarios` INT NOT NULL AUTO_INCREMENT,
  `Salario` VARCHAR(45) NOT NULL,
  `TipoSalario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSalarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Horario` (
  `idHorario` INT NOT NULL AUTO_INCREMENT,
  `Jornada` VARCHAR(45) NOT NULL,
  `HoraInicio` VARCHAR(45) NOT NULL,
  `HoraFinal` VARCHAR(45) NULL,
  PRIMARY KEY (`idHorario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Empleados` (
  `Nombres` VARCHAR(45) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `Cedula` VARCHAR(45) NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Cargo` VARCHAR(45) NOT NULL,
  `idSalarios` INT NOT NULL,
  `idHorario` INT NOT NULL,
  INDEX `fk_Empleados_Salarios1_idx` (`idSalarios` ASC),
  INDEX `fk_Empleados_Horario1_idx` (`idHorario` ASC),
  PRIMARY KEY (`Cedula`),
  CONSTRAINT `fk_Empleados_Salarios1`
    FOREIGN KEY (`idSalarios`)
    REFERENCES `mydb`.`Salarios` (`idSalarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empleados_Horario1`
    FOREIGN KEY (`idHorario`)
    REFERENCES `mydb`.`Horario` (`idHorario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Transporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Transporte` (
  `idTransporte` INT NOT NULL AUTO_INCREMENT,
  `TipoCarro` VARCHAR(45) NOT NULL,
  `Placa` VARCHAR(45) NOT NULL,
  `Conductor` VARCHAR(45) NOT NULL,
  `Dueño` VARCHAR(45) NOT NULL,
  `idEmpleados` INT NOT NULL,
  `idCedula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTransporte`),
  INDEX `fk_Transporte_Empleados1_idx` (`idCedula` ASC),
  CONSTRAINT `fk_Transporte_Empleados1`
    FOREIGN KEY (`idCedula`)
    REFERENCES `mydb`.`Empleados` (`Cedula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Pedidos` (
  `idPedidos` INT NOT NULL AUTO_INCREMENT,
  `Cantidad` VARCHAR(45) NOT NULL,
  `Fecha` DATE NOT NULL,
  `Nombre` INT NOT NULL,
  `Documento` VARCHAR(45) NOT NULL,
  `Estado` VARCHAR(45) NULL,
  `Confirmacion` VARCHAR(45) NULL,
  `idTipoArena` INT NOT NULL,
  `idTransporte` INT NOT NULL,
  PRIMARY KEY (`idPedidos`),
  INDEX `fk_Pedidos_TipoArena1_idx` (`idTipoArena` ASC),
  INDEX `fk_Pedidos_Transporte1_idx` (`idTransporte` ASC),
  CONSTRAINT `fk_Pedidos_TipoArena1`
    FOREIGN KEY (`idTipoArena`)
    REFERENCES `mydb`.`TipoArena` (`idTipoArena`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedidos_Transporte1`
    FOREIGN KEY (`idTransporte`)
    REFERENCES `mydb`.`Transporte` (`idTransporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Clientes` (
  `idClientes` INT NOT NULL AUTO_INCREMENT,
  `Nombres` VARCHAR(45) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `TipoDoc` VARCHAR(4) NOT NULL,
  `Cedula` VARCHAR(45) NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Contrasena` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idClientes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Produccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Produccion` (
  `idProduccion` INT NOT NULL AUTO_INCREMENT,
  `Cantidad` VARCHAR(45) NOT NULL,
  `fecha` VARCHAR(45) NOT NULL,
  `idTipoArena` INT NOT NULL,
  PRIMARY KEY (`idProduccion`),
  INDEX `fk_Produccion_TipoArena1_idx` (`idTipoArena` ASC),
  CONSTRAINT `fk_Produccion_TipoArena1`
    FOREIGN KEY (`idTipoArena`)
    REFERENCES `mydb`.`TipoArena` (`idTipoArena`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
