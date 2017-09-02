-- MySQL Script generated by MySQL Workbench
-- 07/17/17 08:54:49
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
-- Table `mydb`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Horario` (
  `idHorario` INT NOT NULL,
  `Jornada` VARCHAR(45) NULL,
  `Horas` VARCHAR(45) NULL,
  PRIMARY KEY (`idHorario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Salarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Salarios` (
  `idSalarios` INT NOT NULL,
  `HorasTrabajadas` VARCHAR(45) NULL,
  `Empleado` VARCHAR(45) NULL,
  `Horario_idHorario` INT NOT NULL,
  PRIMARY KEY (`idSalarios`, `Horario_idHorario`),
  UNIQUE INDEX `HorasTrabajadas_UNIQUE` (`HorasTrabajadas` ASC),
  UNIQUE INDEX `Empleado_UNIQUE` (`Empleado` ASC),
  INDEX `fk_Salarios_Horario1_idx` (`Horario_idHorario` ASC),
  CONSTRAINT `fk_Salarios_Horario1`
    FOREIGN KEY (`Horario_idHorario`)
    REFERENCES `mydb`.`Horario` (`idHorario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Persona` (
  `idPersona` INT NOT NULL,
  `TipoDocumento` VARCHAR(45) NOT NULL,
  `Documento` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Apellido` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Usuario` VARCHAR(45) NOT NULL,
  `Contrasena` VARCHAR(45) NOT NULL,
  `Horario_idHorario` INT NOT NULL,
  `Salarios_idSalarios` INT NOT NULL,
  PRIMARY KEY (`idPersona`, `Horario_idHorario`, `Salarios_idSalarios`),
  INDEX `fk_Persona_Horario1_idx` (`Horario_idHorario` ASC),
  INDEX `fk_Persona_Salarios1_idx` (`Salarios_idSalarios` ASC),
  CONSTRAINT `fk_Persona_Horario1`
    FOREIGN KEY (`Horario_idHorario`)
    REFERENCES `mydb`.`Horario` (`idHorario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Persona_Salarios1`
    FOREIGN KEY (`Salarios_idSalarios`)
    REFERENCES `mydb`.`Salarios` (`idSalarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TipoArena`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TipoArena` (
  `idTipoArena` INT NOT NULL,
  PRIMARY KEY (`idTipoArena`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Proceso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Proceso` (
  `idProceso` INT NOT NULL,
  `TipoProceso` VARCHAR(45) NOT NULL,
  `Seleccion` VARCHAR(45) NOT NULL,
  `TipoArena_idTipoArena` INT NOT NULL,
  PRIMARY KEY (`idProceso`, `TipoArena_idTipoArena`),
  INDEX `fk_Proceso_TipoArena_idx` (`TipoArena_idTipoArena` ASC),
  CONSTRAINT `fk_Proceso_TipoArena`
    FOREIGN KEY (`TipoArena_idTipoArena`)
    REFERENCES `mydb`.`TipoArena` (`idTipoArena`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Pedidos` (
  `idPedidos` INT NOT NULL AUTO_INCREMENT,
  `Cantidad` VARCHAR(45) NOT NULL,
  `TipoTransporte` VARCHAR(45) NOT NULL,
  `Cliente` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPedidos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Transporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Transporte` (
  `idTransporte` INT NOT NULL,
  `TipoCarro` VARCHAR(45) NOT NULL,
  `Conductor` VARCHAR(45) NOT NULL,
  `Pedido` VARCHAR(45) NOT NULL,
  `Pedidos_idPedidos` INT NOT NULL,
  PRIMARY KEY (`idTransporte`, `Pedidos_idPedidos`),
  INDEX `fk_Transporte_Pedidos1_idx` (`Pedidos_idPedidos` ASC),
  CONSTRAINT `fk_Transporte_Pedidos1`
    FOREIGN KEY (`Pedidos_idPedidos`)
    REFERENCES `mydb`.`Pedidos` (`idPedidos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Registros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Registros` (
  `idRegistros` INT NOT NULL,
  `Pedidos` VARCHAR(45) NOT NULL,
  `Salarios` VARCHAR(45) NOT NULL,
  `Salarios_idSalarios` INT NOT NULL,
  `Salarios_Horario_idHorario` INT NOT NULL,
  `Pedidos_idPedidos` INT NOT NULL,
  PRIMARY KEY (`idRegistros`, `Salarios_idSalarios`, `Salarios_Horario_idHorario`, `Pedidos_idPedidos`),
  INDEX `fk_Registros_Salarios1_idx` (`Salarios_idSalarios` ASC, `Salarios_Horario_idHorario` ASC),
  INDEX `fk_Registros_Pedidos1_idx` (`Pedidos_idPedidos` ASC),
  CONSTRAINT `fk_Registros_Salarios1`
    FOREIGN KEY (`Salarios_idSalarios` , `Salarios_Horario_idHorario`)
    REFERENCES `mydb`.`Salarios` (`idSalarios` , `Horario_idHorario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Registros_Pedidos1`
    FOREIGN KEY (`Pedidos_idPedidos`)
    REFERENCES `mydb`.`Pedidos` (`idPedidos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pedidos_has_TipoArena`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Pedidos_has_TipoArena` (
  `Pedidos_idPedidos` INT NOT NULL,
  `TipoArena_idTipoArena` INT NOT NULL,
  PRIMARY KEY (`Pedidos_idPedidos`, `TipoArena_idTipoArena`),
  INDEX `fk_Pedidos_has_TipoArena_TipoArena1_idx` (`TipoArena_idTipoArena` ASC),
  INDEX `fk_Pedidos_has_TipoArena_Pedidos1_idx` (`Pedidos_idPedidos` ASC),
  CONSTRAINT `fk_Pedidos_has_TipoArena_Pedidos1`
    FOREIGN KEY (`Pedidos_idPedidos`)
    REFERENCES `mydb`.`Pedidos` (`idPedidos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedidos_has_TipoArena_TipoArena1`
    FOREIGN KEY (`TipoArena_idTipoArena`)
    REFERENCES `mydb`.`TipoArena` (`idTipoArena`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
