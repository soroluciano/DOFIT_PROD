CREATE TABLE IF NOT EXISTS `Estado` (
  `id_estado`       INT(11)     NOT NULL,
  `estado`          VARCHAR(60) NOT NULL,
  `fhcreacion`      TIMESTAMP   NOT NULL,
  `fhultmod`        TIMESTAMP   NOT NULL,
  `cusuario`        VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `Perfil` (
  `id_perfil`   INT(11)     NOT NULL AUTO_INCREMENT,
  `perfil`      VARCHAR(60) NOT NULL,
  `fhcreacion`  TIMESTAMP   NOT NULL,
  `fhultmod`    TIMESTAMP   NOT NULL,
  `cusuario`    varchar(60) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `Usuario` (
  `id_usuario`     INT(11)     NOT NULL AUTO_INCREMENT,
  `email`          VARCHAR(60) NOT NULL,
  `password`       VARCHAR(60) NOT NULL,
  `id_perfil`      INT(11)     NOT NULL,
  `id_estado`      INT(1)      NOT NULL,
  `fhcreacion`     TIMESTAMP   NOT NULL,
  `fhultmod`       TIMESTAMP   NOT NULL,
  `cusuario`       VARCHAR(60) NOT NULL,
  UNIQUE(`email`),
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `usuario_perfil_fk` FOREIGN KEY (`id_perfil`)  REFERENCES `Perfil`  (`id_perfil`),
  CONSTRAINT `usuario_estado_fk` FOREIGN KEY (`id_estado`)  REFERENCES `Estado`  (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `Institucion` (
  `id_institucion` INT(11)     NOT NULL AUTO_INCREMENT,
  `email`          VARCHAR(60) NOT NULL,
  `password`       VARCHAR(60) NOT NULL,
  `fhcreacion`     TIMESTAMP   NOT NULL,
  `fhultmod`       TIMESTAMP   NOT NULL,
  `cusuario`       VARCHAR(60) NOT NULL,
  UNIQUE(`email`),
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `Provincia` (
  `id_provincia`    INT(11)     NOT NULL AUTO_INCREMENT,
  `provincia`       VARCHAR(60) NOT NULL,
  `fhcreacion`      TIMESTAMP   NOT NULL,
  `fhultmod`        TIMESTAMP   NOT NULL,
  `cusuario`        VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `Localidad` (
  `id_localidad`    INT(11)     NOT NULL AUTO_INCREMENT,
  `localidad`       VARCHAR(60) NOT NULL,
  `id_provincia`    INT(11)     NOT NULL,
  `fhcreacion`      TIMESTAMP   NOT NULL,
  `fhultmod`        TIMESTAMP   NOT NULL,
  `cusuario`        VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_localidad`),
  CONSTRAINT `localidad_provincia_fk` FOREIGN KEY (`id_provincia`)  REFERENCES `Provincia`  (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/* CREATE TABLE IF NOT EXISTS `Dia` (
  `id_dia`      INT(11)     NOT NULL AUTO_INCREMENT,
  `dia`         VARCHAR(60) NOT NULL,
  `fhcreacion`  TIMESTAMP   NOT NULL,
  `fhultmod`    TIMESTAMP   NOT NULL,
  `cusuario`    VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_dia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; */


CREATE TABLE IF NOT EXISTS `Deporte` (
  `id_deporte`     INT(11)     NOT NULL AUTO_INCREMENT,
  `deporte`        VARCHAR(60) NOT NULL,
  `fhcreacion`     TIMESTAMP   NOT NULL,
  `fhultmod`       TIMESTAMP   NOT NULL,
  `cusuario`       VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_deporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*CREATE TABLE IF NOT EXISTS `Mes` (
  `id_mes`      INT(11)     NOT NULL AUTO_INCREMENT,
  `mes`         VARCHAR(60) NOT NULL,
  `fhcreacion`  TIMESTAMP   NOT NULL,
  `fhultmod`    TIMESTAMP   NOT NULL,
  `cusuario`    VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;*/



CREATE TABLE IF NOT EXISTS `Ficha_Usuario` (
  `id_ficha`        INT(11)     NOT NULL AUTO_INCREMENT,
  `id_usuario`      INT(11)     NOT NULL,
  `dni`             VARCHAR(60) NOT NULL,
  `sexo`            VARCHAR(1)  NOT NULL,
  `fechanac`        DATE        NOT NULL,
  `telfijo`         VARCHAR(30)         ,
  `celular`         VARCHAR(30)         ,
  `conemer`         VARCHAR(60)         ,  /* CONTACTO POR EMERGENCIA!! */
  `telemer`         VARCHAR(30)         ,  /* TELEFONO CONTACTO POR EMERGENCIA */
  `id_localidad`    INT(11)     NOT NULL,
  `direccion`       VARCHAR(60) NOT NULL,
  `piso`            VARCHAR(10)         ,
  `depto`           VARCHAR(10)         ,
  `fhcreacion`      TIMESTAMP   NOT NULL,
  `fhultmod`        TIMESTAMP   NOT NULL,
  `cusuario`        VARCHAR(60) NOT NULL,
  UNIQUE(`dni`),
  UNIQUE(`id_usuario`),
  PRIMARY KEY (`id_ficha`),
  CONSTRAINT `ficha_localidad_fk` FOREIGN KEY (`id_localidad`)  REFERENCES `Localidad`  (`id_localidad`),
  CONSTRAINT `ficha_usuario_fk`   FOREIGN KEY (`id_usuario`)    REFERENCES `Usuario`    (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Ficha_Institucion` (
  `id_ficha`         INT(11)     NOT NULL AUTO_INCREMENT,
  `id_institucion`   INT(11)     NOT NULL,
  `cuit`             INT(30)     NOT NULL,
  `telfijo`          VARCHAR(30)         ,
  `celular`          VARCHAR(30)         ,
  `id_localidad`     INT(11)     NOT NULL,
  `direccion`        VARCHAR(60) NOT NULL,
  `piso`             VARCHAR(10)         ,
  `depto`            VARCHAR(10)         ,
  `fhcreacion`       TIMESTAMP   NOT NULL,
  `fhultmod`         TIMESTAMP   NOT NULL,
  `cusuario`         VARCHAR(60) NOT NULL,
  UNIQUE(`cuit`),
  UNIQUE(`id_institucion`),
  PRIMARY KEY (`id_ficha`),
  CONSTRAINT `ficha_institucion_localidad_fk`     FOREIGN KEY (`id_localidad`)   REFERENCES `Localidad`   (`id_localidad`),
  CONSTRAINT `ficha_institucion_institucion_fk`   FOREIGN KEY (`id_institucion`) REFERENCES `Institucion` (`id_institucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `Profesor_Institucion` (
  `id_usuario`        INT(11)     NOT NULL,
  `id_institucion`    INT(11)     NOT NULL,
  `id_estado`         INT(1)      NOT NULL,
  `fhcreacion`        TIMESTAMP   NOT NULL,
  `fhultmod`          TIMESTAMP   NOT NULL,
  `cusuario`          VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_institucion`),
  CONSTRAINT  `profesor_institucion_usuario_fk`     FOREIGN KEY (`id_usuario`)        REFERENCES `Usuario`       (`id_usuario`),
  CONSTRAINT  `profesor_institucion_institucion_fk` FOREIGN KEY (`id_institucion`)    REFERENCES `Institucion`   (`id_institucion`),
  CONSTRAINT  `profesor_institucion_estado_fk`      FOREIGN KEY (`id_estado`)         REFERENCES `Estado`        (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `Actividad` (
  `id_actividad`    INT(11)     NOT NULL AUTO_INCREMENT,
  `id_deporte`      INT(11)     NOT NULL,
  `id_institucion`  INT(11)     NOT NULL,
  `id_usuario`      INT(11)     NOT NULL,
  `fhcreacion`      TIMESTAMP   NOT NULL,
  `fhultmod`        TIMESTAMP   NOT NULL,
  `cusuario`        VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_actividad`),
  CONSTRAINT `actividad_profesor_institucion_fk` FOREIGN KEY (`id_usuario`,`id_institucion`)  REFERENCES `Profesor_Institucion`  (`id_usuario`,`id_institucion`),
  CONSTRAINT `actividad_deporte_fk`              FOREIGN KEY (`id_deporte`)                   REFERENCES `Deporte`  (`id_deporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `Actividad_Horario` (
  `id_actividad`   INT(11)     NOT NULL,
  `id_dia`         INT(11)     NOT NULL,
  `hora`           INT(11)     NOT NULL,
  `minutos`        INT(11)     NOT NULL,
  `fhcreacion` TIMESTAMP   NOT NULL,
  `fhultmod`   TIMESTAMP   NOT NULL,
  `cusuario`   VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_actividad`,`id_dia`),
  CONSTRAINT `actividad_horario_actividad_fk` FOREIGN KEY (`id_actividad`)  REFERENCES `Actividad`  (`id_actividad`)
  /* CONSTRAINT `actividad_horario_dia_fk`       FOREIGN KEY (`id_dia`)        REFERENCES `Dia`        (`id_dia`) */
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  

CREATE TABLE IF NOT EXISTS `Actividad_Alumno` (
  `id_actividad`   INT(11)     NOT NULL,
  `id_usuario`     INT(11)     NOT NULL,
  `id_estado`      INT(1)      NOT NULL,
  `fhcreacion`     TIMESTAMP   NOT NULL,
  `fhultmod`       TIMESTAMP   NOT NULL,
  `cusuario`       VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_actividad`,`id_usuario`),
  CONSTRAINT `actividad_alumno_actividad_fk`  FOREIGN KEY (`id_actividad`)  REFERENCES `Actividad`  (`id_actividad`),
  CONSTRAINT `actividad_alumno_usuario_fk`    FOREIGN KEY (`id_usuario`)    REFERENCES `Usuario`    (`id_usuario`),
  CONSTRAINT `actividad_ac_estado_fk`         FOREIGN KEY (`id_estado`)     REFERENCES `Estado`     (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `Pago` (
  `id_actividad`   INT(11)       NOT NULL,
  `id_usuario`     INT(11)       NOT NULL,
  `mes`            INT(11)       NOT NULL,
  `anio`           INT(11)       NOT NULL,
  `monto`          NUMERIC(15,2) NOT NULL,
  `fhcreacion` TIMESTAMP     NOT NULL,
  `fhultmod`   TIMESTAMP     NOT NULL,
  `cusuario`   VARCHAR(60)   NOT NULL,
  PRIMARY KEY (`id_actividad`,`id_usuario`,`mes`,`anio`),
  CONSTRAINT `pago_actividad_alumno_fk` FOREIGN KEY (`id_actividad`,`id_usuario`) REFERENCES `Actividad_Alumno`  (`id_actividad`,`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Perfil_Social` (
  `id_usuario`     INT(11)       NOT NULL,
  `foto1`          VARCHAR(60)           ,
  `foto2`          VARCHAR(60)           ,
  `foto3`          VARCHAR(60)           ,
  `foto4`          VARCHAR(60)           ,
  `foto5`          VARCHAR(60)           ,
  `descripcion`    VARCHAR(3000)         ,
  `fhcreacion`     TIMESTAMP     NOT NULL,
  `fhultmod`       TIMESTAMP     NOT NULL,
  `cusuario`       VARCHAR(60)   NOT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `perfil_social_usuario_fk`  FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* CREATE TABLE IF NOT EXISTS `Perfil_Profesor_Actividad` (
  `pia_id`           int(11)      NOT NULL AUTO_INCREMENT,
  `pia_actividad`   int(11)       NOT NULL,
  `pia_foto1`       varchar(60)           ,
  `pia_foto2`       varchar(60)           ,
  `pia_foto3`       varchar(60)           ,
  `pia_foto4`       varchar(60)           ,
  `pia_foto5`       varchar(60)           ,
  `pia_descripcion` varchar(3000)         ,
  `pia_fhcreacion`  TIMESTAMP     NOT NULL,
  `pia_fhultmod`    TIMESTAMP     NOT NULL,
  `pia_cusuario`    varchar(60)   NOT NULL,
  PRIMARY KEY (`pia_id`),
  UNIQUE(`pia_actividad`),
  CONSTRAINT `perfil_profesor_actividad_fk`  FOREIGN KEY (`pia_actividad`) REFERENCES `Actividad` (`act_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; */

CREATE TABLE IF NOT EXISTS `Perfil_Muro_Profesor` (
  `id_posteo`       INT(11)       NOT NULL AUTO_INCREMENT,
  `posteo`          VARCHAR(2000) NOT NULL,
  `id_actividad`    INT(11)       NOT NULL,
  `fhcreacion`      TIMESTAMP     NOT NULL,
  `fhultmod`        TIMESTAMP     NOT NULL,
  `cusuario`        VARCHAR(60)   NOT NULL,
  PRIMARY KEY (`id_posteo`),
  CONSTRAINT `perfil_muro_profesor_actividad_fk`  FOREIGN KEY (`id_actividad`) REFERENCES `Actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Respuesta` (
  `id_posteo`       INT(11)       NOT NULL,
  `id_respuesta`    INT(11)       NOT NULL,
  `respuesta`       VARCHAR(2000) NOT NULL,
  `id_usuario`      INT(11)       NOT NULL,
  `fhcreacion`      TIMESTAMP     NOT NULL,
  `fhultmod`        TIMESTAMP     NOT NULL,
  `cusuario`        VARCHAR(60)   NOT NULL,
  PRIMARY KEY (`id_posteo`,`id_respuesta`),
  CONSTRAINT `respuesta_perfil_muro_profesor_fk`  FOREIGN KEY (`id_posteo`)    REFERENCES `Perfil_Muro_Profesor` (`id_posteo`),
  CONSTRAINT `respuesta_usuario_fk`               FOREIGN KEY (`id_usuario`)   REFERENCES `Usuario`              (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Inserción de datos --
INSERT INTO `Provincia`(provincia     , fhcreacion, fhultmod, cusuario) 
                VALUES ('Buenos Aires', now()     , now()   , 'sysadmin'),
                       ('Catamarca'   , now()     , now()   , 'sysadmin'),
                       ('Chaco'       , now()     , now()   , 'sysadmin'), 					   
					   ('Chubut'      , now()     , now()   , 'sysadmin'), 
					   ('Córdoba'     , now()     , now()   , 'sysadmin'),
					   ('Corrientes'  , now()     , now()   , 'sysadmin'),
					   ('Entre Ríos'  , now()     , now()   , 'sysadmin'),
					   ('Formosa'     , now()     , now()   , 'sysadmin'),
					   ('Jujuy'       , now()     , now()   , 'sysadmin'),
					   ('La Pampa'    , now()     , now()   , 'sysadmin'),
					   ('La Rioja'    , now()     , now()   , 'sysadmin'),
					   ('Mendoza'     , now()     , now()   , 'sysadmin'),
					   ('Misiones'    , now()     , now()   , 'sysadmin'),
					   ('Neuquén'     , now()     , now()   , 'sysadmin'),
					   ('Rio Negro'   , now()     , now()   , 'sysadmin'),
					   ('Salta'       , now()     , now()   , 'sysadmin'),
					   ('San Juan'    , now()     , now()   , 'sysadmin'),
					   ('San Luis'    , now()     , now()   , 'sysadmin'),
                       ('Santa Cruz'  , now()     , now()   , 'sysadmin'),
                       ('Santa Fé'    , now()    , now()    , 'sysadmin'),
                 ('Santiago del Estero',  now()    , now()  , 'sysadmin'),
('Tierra del Fuego Antártida e Isla del Atlántico Sur', now()  , now()  , 'sysadmin'),
					  ('Tucumán'        , now()   , now()   , 'sysadmin');
					  
INSERT INTO `Localidad`(localidad                              , id_provincia, fhcreacion, fhultmod, cusuario)
                 VALUES('Morón'                                , 1, now() , now(), 'sysadmin'),
                       ('San Martin'                           , 1, now() , now(), 'sysadmin'),				 
					   ('Avellaneda'                           , 1, now() , now(), 'sysadmin'),
					   ('Ramos Mejía'                          , 1, now() , now(), 'sysadmin'),
					   ('San Justo'                            , 1, now() , now(), 'sysadmin'),
					   ('Banfield'                             , 1, now() , now(), 'sysadmin'),
					   ('Capital Federal'                      , 1, now() , now(), 'sysadmin'),
					   ('Heado'                                , 1, now() , now(), 'sysadmin'),
                       ('Quilmes'                              , 1, now() , now(), 'sysadmin'),
                       ('Lanus'                                , 1, now() , now(), 'sysadmin'),
                       ('Mar del Plata'                        , 1, now() , now(), 'sysadmin'),
                       ('San Fernando del valle de Catamarca'  , 2, now() , now(), 'sysadmin'),
                       ('Resistencia'                          , 3, now() , now(), 'sysadmin'),
                       ('Rawson'                               , 4, now() , now(), 'sysadmin'),
                       ('Córdoba'                              , 5, now() , now(), 'sysadmin'),
                       ('Corrientes'                           , 6, now() , now(), 'sysadmin'),
                       ('Paraná'                               , 7, now() , now(), 'sysadmin'),
                       ('Gualeguaychú'                         , 7, now() , now(), 'sysadmin'),
      				   ('Gualeguay'                            , 7, now() , now(), 'sysadmin'),
                       ('Formosa'                              , 8, now() , now(), 'sysadmin'),
                       ('San Salvador de Jujuy'                , 9, now() , now(), 'sysadmin'),
                       ('Santa Rosa'                          , 10, now() , now(), 'sysadmin'),					   
                       ('La Rioja'                            , 11, now() , now(), 'sysadmin'), 
                       ('Mendoza'                             , 12, now() , now(), 'sysadmin'),
                       ('Posadas'                             , 13, now() , now(), 'sysadmin'),
                       ('Neuquén'                             , 14, now() , now(), 'sysadmin'),
                       ('Viedma'                              , 15, now() , now(), 'sysadmin'),
                       ('Salta'                               , 16, now() , now(), 'sysadmin'),  					   
                       ('San Juan'                            , 17, now() , now(), 'sysadmin'),
                       ('San Luis'                            , 18, now() , now(), 'sysadmin'),
 					   ('Río Gallegos'                        , 19, now() , now(), 'sysadmin'),
					   ('Santa Fe'                            , 20, now() , now(), 'sysadmin'),
                       ('Santiago del Estero'                 , 21, now() , now(), 'sysadmin'), 
                       ('Ushuaia'                             , 22, now() , now(), 'sysadmin'), 
   					   ('San Miguel de Tucumán'               , 23, now() , now(), 'sysadmin');

INSERT INTO `Perfil`(perfil    , fhcreacion, fhultmod, cusuario )
             VALUES ('Alumno'  , now()     , now()   , 'sysadmin'),
			        ('Profesor', now()     , now()   , 'sysadmin');
 			 
INSERT INTO `Estado`(estado      , fhcreacion, fhultmod, cusuario)
             VALUES ('En espera', now()      , now()   , sysadmin),
			        ('Confirmado', now()     , now()   , sysadmin);
					   
