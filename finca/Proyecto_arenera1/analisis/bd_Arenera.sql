-- MySQL Script generated by MySQL Workbench
-- 07/20/17 14:31:01
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
-- Table `mydb`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Clientes` (
  `idClientes` INT NOT NULL AUTO_INCREMENT,
  `Nombres` VARCHAR(45) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `TipoDoc` VARCHAR(4) NOT NULL,
  `Cedula` VARCHAR(45) NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idClientes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TipoArena`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TipoArena` (
  `idTipoArena` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoArena`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Pedidos` (
  `idPedidos` INT NOT NULL AUTO_INCREMENT,
  `Cantidad` VARCHAR(45) NOT NULL,
  `Estado` ENUM('Despachado', 'Pendiente') NOT NULL,
  `Valor` VARCHAR(45) NOT NULL,
  `Ciudad` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Fecha` DATE NOT NULL,
  `idClientes` INT NOT NULL,
  `idTipoArena` INT NOT NULL,
  PRIMARY KEY (`idPedidos`, `idClientes`, `idTipoArena`),
  INDEX `fk_Pedidos_Clientes_idx` (`idClientes` ASC),
  INDEX `fk_Pedidos_TipoArena1_idx` (`idTipoArena` ASC),
  CONSTRAINT `fk_Pedidos_Clientes`
    FOREIGN KEY (`idClientes`)
    REFERENCES `mydb`.`Clientes` (`idClientes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedidos_TipoArena1`
    FOREIGN KEY (`idTipoArena`)
    REFERENCES `mydb`.`TipoArena` (`idTipoArena`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Horario` (
  `idHorario` INT NOT NULL AUTO_INCREMENT,
  `Jornada` VARCHAR(45) NOT NULL,
  `Horas` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idHorario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Salarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Salarios` (
  `idSalarios` INT NOT NULL AUTO_INCREMENT,
  `Salario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSalarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Empleados` (
  `idEmpleados` INT NOT NULL AUTO_INCREMENT,
  `Nombres` VARCHAR(45) NOT NULL,
  `Apellidos` VARCHAR(45) NOT NULL,
  `Cedula` VARCHAR(45) NOT NULL,
  `Telefono` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Cargo` VARCHAR(45) NOT NULL,
  `idHorario` INT NOT NULL,
  `idSalarios` INT NOT NULL,
  PRIMARY KEY (`idEmpleados`, `idHorario`, `idSalarios`),
  INDEX `fk_Empleados_Horario1_idx` (`idHorario` ASC),
  INDEX `fk_Empleados_Salarios1_idx` (`idSalarios` ASC),
  CONSTRAINT `fk_Empleados_Horario1`
    FOREIGN KEY (`idHorario`)
    REFERENCES `mydb`.`Horario` (`idHorario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Empleados_Salarios1`
    FOREIGN KEY (`idSalarios`)
    REFERENCES `mydb`.`Salarios` (`idSalarios`)
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
  PRIMARY KEY (`idTransporte`, `idEmpleados`),
  INDEX `fk_Transporte_Empleados1_idx` (`idEmpleados` ASC),
  CONSTRAINT `fk_Transporte_Empleados1`
    FOREIGN KEY (`idEmpleados`)
    REFERENCES `mydb`.`Empleados` (`idEmpleados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Proceso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Proceso` (
  `IdProceso` INT NOT NULL AUTO_INCREMENT,
  `TipoProceso` VARCHAR(45) NOT NULL,
  `Seleccion` VARCHAR(45) NOT NULL,
  `TipoArena_idTipoArena` INT NOT NULL,
  PRIMARY KEY (`IdProceso`, `TipoArena_idTipoArena`),
  INDEX `fk_Proceso_TipoArena1_idx` (`TipoArena_idTipoArena` ASC),
  CONSTRAINT `fk_Proceso_TipoArena1`
    FOREIGN KEY (`TipoArena_idTipoArena`)
    REFERENCES `mydb`.`TipoArena` (`idTipoArena`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Produccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Produccion` (
  `idProduccion` INT NOT NULL AUTO_INCREMENT,
  `Cantidad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProduccion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Despacho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Despacho` (
  `idDespacho` INT NOT NULL AUTO_INCREMENT,
  `idTransporte` INT NOT NULL,
  `idPedidos` INT NOT NULL,
  `idClientes` INT NOT NULL,
  `idTipoArena` INT NOT NULL,
  PRIMARY KEY (`idDespacho`, `idTransporte`, `idPedidos`, `idClientes`, `idTipoArena`),
  INDEX `fk_Despacho_Transporte1_idx` (`idTransporte` ASC),
  INDEX `fk_Despacho_Pedidos1_idx` (`idPedidos` ASC, `idClientes` ASC, `idTipoArena` ASC),
  CONSTRAINT `fk_Despacho_Transporte1`
    FOREIGN KEY (`idTransporte`)
    REFERENCES `mydb`.`Transporte` (`idTransporte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Despacho_Pedidos1`
    FOREIGN KEY (`idPedidos` , `idClientes` , `idTipoArena`)
    REFERENCES `mydb`.`Pedidos` (`idPedidos` , `idClientes` , `idTipoArena`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
