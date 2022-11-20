-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema IngSoft_II
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema IngSoft_II
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `IngSoft_II` DEFAULT CHARACTER SET utf8 ;
USE `IngSoft_II` ;

-- -----------------------------------------------------
-- Table `IngSoft_II`.`Personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Personas` (
  `id_Persona` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(60) NOT NULL,
  `Apellido` VARCHAR(60) NOT NULL,
  `Cedula` VARCHAR(20) NOT NULL,
  `Fecha_Nac` DATE NOT NULL,
  `Ruta_Imagen` VARCHAR(45) NOT NULL,
  `Sexo` CHAR NOT NULL,
  `Vacuna_Aplicada` VARCHAR(60) NOT NULL,
  `Dosis_Vacuna` INT NOT NULL,
  `Observacion` TEXT NOT NULL,
  PRIMARY KEY (`id_Persona`),
  UNIQUE INDEX `Cedula_UNIQUE` (`Cedula` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Contactos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Contactos` (
  `id_Contacto` INT NOT NULL AUTO_INCREMENT,
  `Correo` VARCHAR(60) NULL,
  `id_Personas` INT NOT NULL,
  PRIMARY KEY (`id_Contacto`, `id_Personas`),
  INDEX `fk_Contactos_Personas1_idx` (`id_Personas` ASC),
  CONSTRAINT `fk_Contactos_Personas1`
    FOREIGN KEY (`id_Personas`)
    REFERENCES `IngSoft_II`.`Personas` (`id_Persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Empleados` (
  `id_Empleado` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NOT NULL,
  `Fecha_Ingreso` DATE NOT NULL,
  `Nivel_Academico` VARCHAR(45) NOT NULL,
  `id_Personas` INT NOT NULL,
  PRIMARY KEY (`id_Empleado`, `id_Personas`),
  INDEX `fk_Empleado_Personas1_idx` (`id_Personas` ASC),
  CONSTRAINT `fk_Empleado_Personas1`
    FOREIGN KEY (`id_Personas`)
    REFERENCES `IngSoft_II`.`Personas` (`id_Persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Obreros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Obreros` (
  `id_Obrero` INT NOT NULL AUTO_INCREMENT,
  `Rol` VARCHAR(45) NOT NULL,
  `id_Empleado` INT NOT NULL,
  PRIMARY KEY (`id_Obrero`, `id_Empleado`),
  INDEX `fk_Obrero_Empleado1_idx` (`id_Empleado` ASC),
  CONSTRAINT `fk_Obrero_Empleado1`
    FOREIGN KEY (`id_Empleado`)
    REFERENCES `IngSoft_II`.`Empleados` (`id_Empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Docentes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Docentes` (
  `id_Docente` INT NOT NULL AUTO_INCREMENT,
  `Especialidad` VARCHAR(45) NOT NULL,
  `id_Empleado` INT NOT NULL,
  PRIMARY KEY (`id_Docente`, `id_Empleado`),
  INDEX `fk_Docente_Empleado1_idx` (`id_Empleado` ASC),
  CONSTRAINT `fk_Docente_Empleado1`
    FOREIGN KEY (`id_Empleado`)
    REFERENCES `IngSoft_II`.`Empleados` (`id_Empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Administrativos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Administrativos` (
  `id_Administrativo` INT NOT NULL AUTO_INCREMENT,
  `Titulo_2do_Grado` VARCHAR(45) NOT NULL,
  `id_Empleado` INT NOT NULL,
  PRIMARY KEY (`id_Administrativo`, `id_Empleado`),
  INDEX `fk_Administrativo_Empleado1_idx` (`id_Empleado` ASC),
  CONSTRAINT `fk_Administrativo_Empleado1`
    FOREIGN KEY (`id_Empleado`)
    REFERENCES `IngSoft_II`.`Empleados` (`id_Empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Telefonos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Telefonos` (
  `id_Telefono` INT NOT NULL AUTO_INCREMENT,
  `Prefijo` VARCHAR(6) NOT NULL,
  `Numero` VARCHAR(20) NOT NULL,
  `Relacion` VARCHAR(45) NOT NULL,
  `id_Contacto` INT NOT NULL,
  PRIMARY KEY (`id_Telefono`, `id_Contacto`),
  INDEX `fk_Telefonos_Contactos1_idx` (`id_Contacto` ASC),
  CONSTRAINT `fk_Telefonos_Contactos1`
    FOREIGN KEY (`id_Contacto`)
    REFERENCES `IngSoft_II`.`Contactos` (`id_Contacto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Direccion` (
  `id_Direccion` INT NOT NULL AUTO_INCREMENT,
  `Municipio` VARCHAR(100) NOT NULL,
  `Parroquia` VARCHAR(100) NOT NULL,
  `Direccion` VARCHAR(45) NOT NULL,
  `Contactos_id_Contacto` INT NOT NULL,
  PRIMARY KEY (`id_Direccion`, `Contactos_id_Contacto`),
  INDEX `fk_Direccion_Contactos1_idx` (`Contactos_id_Contacto` ASC),
  CONSTRAINT `fk_Direccion_Contactos1`
    FOREIGN KEY (`Contactos_id_Contacto`)
    REFERENCES `IngSoft_II`.`Contactos` (`id_Contacto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Carga_Horaria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Carga_Horaria` (
  `id_Carga_Horaria` INT NOT NULL AUTO_INCREMENT,
  `Carga_Horaria_Semanal` INT NOT NULL,
  `Empleados_id_Empleado` INT NOT NULL,
  PRIMARY KEY (`id_Carga_Horaria`, `Empleados_id_Empleado`),
  INDEX `fk_Carga_Horaria_Empleados1_idx` (`Empleados_id_Empleado` ASC),
  CONSTRAINT `fk_Carga_Horaria_Empleados1`
    FOREIGN KEY (`Empleados_id_Empleado`)
    REFERENCES `IngSoft_II`.`Empleados` (`id_Empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
