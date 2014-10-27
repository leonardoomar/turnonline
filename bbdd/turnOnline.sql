CREATE SCHEMA IF NOT EXISTS `turnOnline` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `turnOnline` ;

-- -----------------------------------------------------
-- Table `turnOnline`.`persona`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnOnline`.`persona` (
  `nombre` VARCHAR(45) NULL COMMENT 'nombre de la persona' ,
  `apellido` VARCHAR(45) NULL COMMENT 'apellido de la persona' ,
  `dni` INT NOT NULL ,
  PRIMARY KEY (`dni`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turnOnline`.`obrasSociales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnOnline`.`obrasSociales` (
  `idObraSocial` INT NOT NULL COMMENT 'codigo de obra social' ,
  `nombre` VARCHAR(125) NULL COMMENT 'nombre de la obra social' ,
  `observaciones` VARCHAR(125) NULL COMMENT 'cualquier informacion extra' ,
  PRIMARY KEY (`idObraSocial`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turnOnline`.`paciente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnOnline`.`paciente` (
  `dni` INT NOT NULL COMMENT 'dni del paciente' ,
  `telCelular` VARCHAR(45) NULL COMMENT 'telefono celular principal' ,
  `telFijo` VARCHAR(45) NULL COMMENT 'telefono fijo principal' ,
  `otrosTel` VARCHAR(125) NULL COMMENT 'otros telefonos alternativos' ,
  `idObraSocial` INT NOT NULL COMMENT 'codigo de obra social principal que cubre al paciente' ,
  `observaciones` VARCHAR(125) NULL COMMENT 'cualquier observacion que se puede utilizar para agregar informacion' ,
  PRIMARY KEY (`dni`) ,
  UNIQUE INDEX `dni_UNIQUE` (`dni` ASC) ,
  INDEX `fk_pacientePersona` (`dni` ASC) ,
  INDEX `fk_pacienteObrasScociales` (`idObraSocial` ASC) ,
  CONSTRAINT `fk_pacientePersona`
    FOREIGN KEY (`dni` )
    REFERENCES `turnOnline`.`persona` (`dni` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pacienteObrasScociales`
    FOREIGN KEY (`idObraSocial` )
    REFERENCES `turnOnline`.`obrasSociales` (`idObraSocial` )
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `turnOnline`.`especialidad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnOnline`.`especialidad` (
  `idEspecialidad` INT NOT NULL COMMENT 'codigo de especialidad' ,
  `nombre` VARCHAR(125) NULL COMMENT 'nombre de la especialidad' ,
  PRIMARY KEY (`idEspecialidad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turnOnline`.`profesional`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnOnline`.`profesional` (
  `dni` INT NOT NULL COMMENT 'dni del profesional medico' ,
  `id_Especialidad` INT NOT NULL ,
  `telCelular` VARCHAR(45) NOT NULL COMMENT 'telefono celular principal del profesional' ,
  `telFijo` VARCHAR(45) NULL COMMENT 'telefono fijo principal del profesional' ,
  `observaciones` VARCHAR(125) NULL COMMENT 'cualquier observacion que se puede utilizar para agregar informacion' ,
  PRIMARY KEY (`dni`, `id_Especialidad`) ,
  CONSTRAINT `fk_profesionalApersona`
    FOREIGN KEY (`dni` )
    REFERENCES `turnOnline`.`persona` (`dni` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesionalAespecialidad`
    FOREIGN KEY (`id_Especialidad` )
    REFERENCES `turnOnline`.`especialidad` (`idEspecialidad` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turnOnline`.`atiendeLos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnOnline`.`atiendeLos` (
  `dniProfesional` INT NOT NULL COMMENT 'dni del profesional' ,
  `dias` VARCHAR(2) NULL COMMENT 'dias que atiende el profesional' ,
  `horai` DECIMAL(2) NULL COMMENT 'hora en que comienza a atender el profesional' ,
  `horaf` DECIMAL(2) NULL COMMENT 'hora en que finaliza en atender el profesional' ,
  `intervalo` INT NULL COMMENT 'minutos que atiende cada paciente' ,
  INDEX `fk_aPersona` (`dniProfesional` ASC) ,
  CONSTRAINT `fk_aPersona`
    FOREIGN KEY (`dniProfesional` )
    REFERENCES `turnOnline`.`persona` (`dni` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `turnOnline`.`turnos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnOnline`.`turnos` (
  `idturno` INT NOT NULL AUTO_INCREMENT COMMENT 'numero unico de identificacion del turno' ,
  `dia` VARCHAR(2) NULL COMMENT 'dia del turno' ,
  `hora` DECIMAL(2) NULL COMMENT 'hora del turno' ,
  `mes` INT NULL COMMENT 'mes del turno' ,
  `año` INT NULL COMMENT 'año del turno' ,
  `dniProfesional` INT NULL COMMENT 'dni del profesional' ,
  `dniPaciente` INT NULL COMMENT 'dni del paciente' ,
  `presente` TINYINT(1) NULL COMMENT 'indica si el paciente asistio o no al turno reservado' ,
  PRIMARY KEY (`idturno`) ,
  INDEX `fk_aPersonaProfesional` (`dniProfesional` ASC) ,
  INDEX `fk_aPersonaPaciente` (`dniPaciente` ASC) ,
  CONSTRAINT `fk_aPersonaProfesional`
    FOREIGN KEY (`dniProfesional` )
    REFERENCES `turnOnline`.`persona` (`dni` )
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_aPersonaPaciente`
    FOREIGN KEY (`dniPaciente` )
    REFERENCES `turnOnline`.`persona` (`dni` )
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- ------------------------------
-- volcado de datos de tablas
-- ------------------------------

INSERT INTO obrasSociales (idObraSocial,nombre,observaciones) VALUES
(1,'SEROS','obra social empleados publicos provincia del chubut'),
(2,'SEROS VITAL','obra social residentes en la provincia del chubut'),
(3,'OSECAC','obra social empleados de comercio'),
(4,'OSDE','obra social de ejecutivos'),
(5,'OSPRERA','obra social de los trabajadores rurales y estibadores');

INSERT INTO especialidad (idEspecialidad,nombre) VALUES
(1,'medicina general'),
(2,'pediatria'),
(3,'odontologia'),
(4,'oftalmologia'),
(5,'traumatologia'),
(6,'cardiologia'),
(7,'radiologia');

INSERT INTO persona (dni, nombre, apellido) VALUES
(100,'pepe','argento'),
(150,'el gato','con botas'),
(200,'pancho','villa'),
(250,'peter','capusoto'),
(300,'cormillot','cormillot');

INSERT INTO profesional (dni,id_Especialidad,telCelular,telFijo,observaciones) VALUES
(100,1,"999","",""),
(150,1,"555","",""),
(200,2,"777","88","nada"),
(250,4,"","55555",""),
(300,7,"123","234","");
