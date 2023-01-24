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
  `Fecha_Ingreso` DATE NOT NULL,
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
  `Area` VARCHAR(45) NOT NULL,
  `Horas_Clase_S` INT NOT NULL,
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
-- Table `IngSoft_II`.`Direcciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Direcciones` (
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


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Estudios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Estudios` (
  `id_Estudio` INT NOT NULL AUTO_INCREMENT,
  `Nivel_Acad` CHAR NOT NULL,
  `Titulo_Obt` VARCHAR(180) NULL,
  `Mencion` VARCHAR(180) NULL,
  `Estudio_2do_Nvl` VARCHAR(180) NULL,
  `Empleados_id_Empleado` INT NOT NULL,
  PRIMARY KEY (`id_Estudio`, `Empleados_id_Empleado`),
  INDEX `fk_Estudio_Empleados1_idx` (`Empleados_id_Empleado` ASC),
  CONSTRAINT `fk_Estudio_Empleados1`
    FOREIGN KEY (`Empleados_id_Empleado`)
    REFERENCES `IngSoft_II`.`Empleados` (`id_Empleado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Usuarios` (
  `id_Usuario` INT NOT NULL AUTO_INCREMENT,
  `Rol` VARCHAR(50) NOT NULL,
  `Contraseña` VARCHAR(50) NOT NULL,
  `Personas_id_Persona` INT NOT NULL,
  PRIMARY KEY (`id_Usuario`, `Personas_id_Persona`),
  INDEX `fk_Rol_Personas1_idx` (`Personas_id_Persona` ASC),
  CONSTRAINT `fk_Rol_Personas1`
    FOREIGN KEY (`Personas_id_Persona`)
    REFERENCES `IngSoft_II`.`Personas` (`id_Persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Informes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Informes` (
  `id_Informe` INT NOT NULL AUTO_INCREMENT,
  `Cert_Salud` VARCHAR(45) NULL,
  `Tarjeta_Vac` VARCHAR(45) NULL,
  `Personas_id_Persona` INT NOT NULL,
  PRIMARY KEY (`id_Informe`, `Personas_id_Persona`),
  INDEX `fk_Informe_Personas1_idx` (`Personas_id_Persona` ASC),
  CONSTRAINT `fk_Informe_Personas1`
    FOREIGN KEY (`Personas_id_Persona`)
    REFERENCES `IngSoft_II`.`Personas` (`id_Persona`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Personal_Doc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Personal_Doc` (
  `id_Personal_Doc` INT NOT NULL AUTO_INCREMENT,
  `Especialidad` VARCHAR(45) NOT NULL,
  `Docentes_id_Docente` INT NOT NULL,
  PRIMARY KEY (`id_Personal_Doc`, `Docentes_id_Docente`),
  INDEX `fk_Personal_Doc_Docentes1_idx` (`Docentes_id_Docente` ASC),
  CONSTRAINT `fk_Personal_Doc_Docentes1`
    FOREIGN KEY (`Docentes_id_Docente`)
    REFERENCES `IngSoft_II`.`Docentes` (`id_Docente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Coordinacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Coordinacion` (
  `id_Coordinacion` INT NOT NULL AUTO_INCREMENT,
  `Docentes_id_Docente` INT NOT NULL,
  PRIMARY KEY (`id_Coordinacion`, `Docentes_id_Docente`),
  INDEX `fk_Coordinacion_Docentes1_idx` (`Docentes_id_Docente` ASC),
  CONSTRAINT `fk_Coordinacion_Docentes1`
    FOREIGN KEY (`Docentes_id_Docente`)
    REFERENCES `IngSoft_II`.`Docentes` (`id_Docente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `IngSoft_II`.`Directivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `IngSoft_II`.`Directivo` (
  `id_Directivo` INT NOT NULL AUTO_INCREMENT,
  `Cargo` VARCHAR(120) NOT NULL,
  `Docentes_id_Docente` INT NOT NULL,
  PRIMARY KEY (`id_Directivo`, `Docentes_id_Docente`),
  INDEX `fk_Directivo_Docentes1_idx` (`Docentes_id_Docente` ASC),
  CONSTRAINT `fk_Directivo_Docentes1`
    FOREIGN KEY (`Docentes_id_Docente`)
    REFERENCES `IngSoft_II`.`Docentes` (`id_Docente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- PERSONAS

INSERT IGNORE INTO `personas` (id_Persona, Nombre, Apellido, Cedula, Fecha_Nac, Ruta_Imagen,Sexo) VALUES 
(99, 'Elber', 'Rondón', 'V27919566', '2001-05-05', 'V27919566.jpg','M'),
(100, 'user', 'user', 'V11111111', '', 'V11111111.jpg','M'),
(1, 'Morganica', 'Lawty', 'V12649473', '2022-4-14', 'V12649473.jpg','M'),
(2, 'Edythe', 'Rigney', 'V13415496', '2022-1-16', 'V13415496.jpg','M'),
(3, 'Berne', 'Pavlenkov', 'V84769533', '2022-8-9', 'V84769533.jpg','F'),
(4, 'Tull', 'Monget', 'V55945231', '2022-5-9', 'V55945231.jpg','M'),
(5, 'Hobie', 'Barthelet', 'V08851411', '2022-4-21', 'V08851411.jpg','F'),
(6, 'Allin', 'Molineaux', 'V96647829', '2022-1-17', 'V96647829.jpg','M'),
(7, 'Terri', 'Fist', 'V93909125', '2022-10-18', 'V93909125.jpg','F'),
(8, 'Ramsay', 'Roussel', 'V69823294', '2022-7-21', 'V69823294.png','M'),
(9, 'Frannie', 'Pirkis', 'V10113385', '2022-8-6', 'V10113385.png','M'),
(10, 'Evaleen', 'Bindley', 'V32896787', '2022-4-6', 'V32896787.jpg','M'),
(11, 'Reinaldos', 'Brabham', 'V35029573', '2022-9-1', 'V35029573.jpg','F'),
(12, 'Arny', 'Liverseege', 'V66509818', '2022-1-1', 'V66509818.jpg','M'),
(13, 'Cal', 'Vedyashkin', 'V66298340', '2021-12-7', 'V66298340.jpg','M'),
(14, 'Ralf', 'Barnwall', 'V50950642', '2022-10-7', 'V50950642.jpg','M'),
(15, 'Rebekkah', 'Jaycock', 'V12716584', '2022-10-18', 'V12716584.jpg','F'),
(16, 'Samara', 'Sandy', 'V90653986', '2022-2-4', 'V90653986.jpg','M'),
(17, 'Amy', 'Overnell', 'V70018820', '2022-3-2', 'V70018820.jpg','M'),
(18, 'Emiline', 'Conring', 'V58352407', '2021-11-28', 'V58352407.jpg','M'),
(19, 'Gabbie', 'Duffan', 'V48483148', '2022-8-15', 'V48483148.png','F'),
(20, 'Marcelle', 'Sword', 'V31338339', '2022-3-4', 'V31338339.jpg','M');

-- usuarios

insert into `usuarios`(`id_usuario`, `rol`, `contraseña`, `personas_id_persona`) values 
  (NULL,'Administrador','12345','99'),
  (NULL,'Usuario','12345','100');