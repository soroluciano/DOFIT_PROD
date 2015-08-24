--
DROP DATABASE IF EXISTS `DoFit`;
--

CREATE DATABASE IF NOT EXISTS `DoFit`;
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-03:00";

DROP TABLE IF EXISTS DoFit.`Admin`;
DROP TABLE IF EXISTS DoFit.`Respuesta`;
DROP TABLE IF EXISTS DoFit.`Perfil_Muro_Profesor`;
DROP TABLE IF EXISTS DoFit.`Perfil_Social`;
DROP TABLE IF EXISTS DoFit.`Pago`;
DROP TABLE IF EXISTS DoFit.`Actividad_Alumno`;
DROP TABLE IF EXISTS DoFit.`Actividad_Horario`;
DROP TABLE IF EXISTS DoFit.`Actividad`;
DROP TABLE IF EXISTS DoFit.`Profesor_Institucion`;
DROP TABLE IF EXISTS DoFit.`Ficha_Institucion`;
DROP TABLE IF EXISTS DoFit.`Ficha_Usuario`;
DROP TABLE IF EXISTS DoFit.`Deporte`;
DROP TABLE IF EXISTS DoFit.`Localidad`;
DROP TABLE IF EXISTS DoFit.`Provincia`;
DROP TABLE IF EXISTS DoFit.`Institucion`;
DROP TABLE IF EXISTS DoFit.`Usuario`;
DROP TABLE IF EXISTS DoFit.`Perfil`;
DROP TABLE IF EXISTS DoFit.`Estado`;
--
CREATE TABLE IF NOT EXISTS DoFit.`Estado` (
  `id_estado`       INT(11)     NOT NULL,
  `estado`          VARCHAR(60) NOT NULL,
  `fhcreacion`      TIMESTAMP   NOT NULL,
  `fhultmod`        TIMESTAMP   NOT NULL,
  `cusuario`        VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS DoFit.`Perfil` (
  `id_perfil`   INT(11)     NOT NULL AUTO_INCREMENT,
  `perfil`      VARCHAR(60) NOT NULL,
  `fhcreacion`  TIMESTAMP   NOT NULL,
  `fhultmod`    TIMESTAMP   NOT NULL,
  `cusuario`    varchar(60) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS DoFit.`Usuario` (
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


CREATE TABLE IF NOT EXISTS DoFit.`Institucion` (
  `id_institucion` INT(11)     NOT NULL AUTO_INCREMENT,
  `email`          VARCHAR(60) NOT NULL,
  `password`       VARCHAR(60) NOT NULL,
  `fhcreacion`     TIMESTAMP   NOT NULL,
  `fhultmod`       TIMESTAMP   NOT NULL,
  `cusuario`       VARCHAR(60) NOT NULL,
  UNIQUE(`email`),
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS DoFit.`Provincia` (
  `id_provincia`    INT(11)     NOT NULL AUTO_INCREMENT,
  `provincia`       VARCHAR(60) NOT NULL,
  `fhcreacion`      TIMESTAMP   NOT NULL,
  `fhultmod`        TIMESTAMP   NOT NULL,
  `cusuario`        VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS DoFit.`Localidad` (
  `id_localidad`    INT(11)     NOT NULL AUTO_INCREMENT,
  `localidad`       VARCHAR(60) NOT NULL,
  `id_provincia`    INT(11)     NOT NULL,
  `fhcreacion`      TIMESTAMP   NOT NULL,
  `fhultmod`        TIMESTAMP   NOT NULL,
  `cusuario`        VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_localidad`),
  CONSTRAINT `localidad_provincia_fk` FOREIGN KEY (`id_provincia`)  REFERENCES `Provincia`  (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS DoFit.`Deporte` (
  `id_deporte`     INT(11)     NOT NULL AUTO_INCREMENT,
  `deporte`        VARCHAR(60) NOT NULL,
  `fhcreacion`     TIMESTAMP   NOT NULL,
  `fhultmod`       TIMESTAMP   NOT NULL,
  `cusuario`       VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_deporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS DoFit.`Ficha_Usuario` (
  `id_ficha`        INT(11)     NOT NULL AUTO_INCREMENT,
  `id_usuario`      INT(11)     NOT NULL,
  `nombre`          VARCHAR(200)NOT NULL,
  `apellido`        VARCHAR(200)NOT NULL,
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

CREATE TABLE IF NOT EXISTS DoFit.`Ficha_Institucion` (
  `id_ficha`         INT(11)     NOT NULL AUTO_INCREMENT,
  `id_institucion`   INT(11)     NOT NULL,
  `nombre`           VARCHAR(200)NOT NULL,
  `cuit`             INT(30)     NOT NULL,
  `telfijo`          VARCHAR(30)         ,
  `celular`          VARCHAR(30)         ,
  `id_localidad`     INT(11)     NOT NULL,
  `direccion`        VARCHAR(60) NOT NULL,
  `piso`             VARCHAR(10)         ,
  `depto`            VARCHAR(10)         ,
  `coordenada_x`     VARCHAR(50)         ,
  `coordenada_y`     VARCHAR(50)         ,
  `acepta_mp`        VARCHAR(1)          ,
  `fhcreacion`       TIMESTAMP   NOT NULL,
  `fhultmod`         TIMESTAMP   NOT NULL,
  `cusuario`         VARCHAR(60) NOT NULL,
  UNIQUE(`cuit`),
  UNIQUE(`id_institucion`),
  PRIMARY KEY (`id_ficha`),
  CONSTRAINT `ficha_institucion_localidad_fk`     FOREIGN KEY (`id_localidad`)   REFERENCES `Localidad`   (`id_localidad`),
  CONSTRAINT `ficha_institucion_institucion_fk`   FOREIGN KEY (`id_institucion`) REFERENCES `Institucion` (`id_institucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS DoFit.`Profesor_Institucion` (
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



CREATE TABLE IF NOT EXISTS DoFit.`Actividad` (
  `id_actividad`    INT(11)       NOT NULL AUTO_INCREMENT,
  `id_deporte`      INT(11)       NOT NULL,
  `id_institucion`  INT(11)       NOT NULL,
  `id_usuario`      INT(11)       NOT NULL,
  `valor_actividad` NUMERIC(15,2) NOT NULL,
  `fhcreacion`      TIMESTAMP     NOT NULL,
  `fhultmod`        TIMESTAMP     NOT NULL,
  `cusuario`        VARCHAR(60)   NOT NULL,
  PRIMARY KEY (`id_actividad`),
  CONSTRAINT `actividad_profesor_institucion_fk` FOREIGN KEY (`id_usuario`,`id_institucion`)  REFERENCES `Profesor_Institucion`  (`id_usuario`,`id_institucion`),
  CONSTRAINT `actividad_deporte_fk`              FOREIGN KEY (`id_deporte`)                   REFERENCES `Deporte`  (`id_deporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS DoFit.`Actividad_Horario` (
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
  

CREATE TABLE IF NOT EXISTS DoFit.`Actividad_Alumno` (
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



CREATE TABLE IF NOT EXISTS DoFit.`Pago` (
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

CREATE TABLE IF NOT EXISTS DoFit.`Perfil_Social` (
  `id_usuario`     INT(11)       NOT NULL,
  `fotoperfil`     VARCHAR(60)           ,
  `foto1`          VARCHAR(60)           ,
  `foto2`          VARCHAR(60)           ,
  `foto3`          VARCHAR(60)           ,
  `foto4`          VARCHAR(60)           ,
  `foto5`          VARCHAR(60)           ,
  `foto6`          VARCHAR(60)           ,
  `descripcion`    VARCHAR(3000)         ,
  `fhcreacion`     TIMESTAMP     NOT NULL,
  `fhultmod`       TIMESTAMP     NOT NULL,
  `cusuario`       VARCHAR(60)   NOT NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `perfil_social_usuario_fk`  FOREIGN KEY (`id_usuario`) REFERENCES `Usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS DoFit.`Perfil_Muro_Profesor` (
  `id_posteo`       INT(11)       NOT NULL AUTO_INCREMENT,
  `posteo`          VARCHAR(2000) NOT NULL,
  `id_actividad`    INT(11)       NOT NULL,
  `fhcreacion`      TIMESTAMP     NOT NULL,
  `fhultmod`        TIMESTAMP     NOT NULL,
  `cusuario`        VARCHAR(60)   NOT NULL,
  PRIMARY KEY (`id_posteo`),
  CONSTRAINT `perfil_muro_profesor_actividad_fk`  FOREIGN KEY (`id_actividad`) REFERENCES `Actividad` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS DoFit.`Respuesta` (
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

CREATE TABLE IF NOT EXISTS DoFit.`Admin` (
  `id_usuario`     INT(11)     NOT NULL AUTO_INCREMENT,
  `usuario`        VARCHAR(60) NOT NULL,
  `password`       VARCHAR(60) NOT NULL,
  `fhcreacion`     TIMESTAMP   NOT NULL,
  UNIQUE(`usuario`),
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* INSERTS */

DELETE FROM DoFit.`Provincia`;

INSERT INTO DoFit.`Provincia`
(provincia     , fhcreacion, fhultmod, cusuario) 
VALUES 
('Buenos Aires', now()     , now()   , 'sysadmin'),
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
('Tierra del Fuego'   ,  now()    , now()  , 'sysadmin'),
('Tucumán'            ,  now()    , now()  , 'sysadmin');
					  
DELETE FROM DoFit.`Localidad`;
					 
INSERT INTO DoFit.`Localidad`(localidad, id_provincia, fhcreacion, fhultmod, cusuario)
VALUES
('Morón'                                , 1, now() , now(), 'sysadmin'),
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

DELETE FROM DoFit.`Perfil`;

INSERT INTO DoFit.`Perfil`
(perfil, fhcreacion, fhultmod, cusuario )
VALUES 
('Alumno'  , now()     , now()   , 'sysadmin'),
('Profesor', now()     , now()   , 'sysadmin');
 			 
DELETE FROM DoFit.`Estado`;
			 
INSERT INTO DoFit.`Estado`
(id_estado, estado      , fhcreacion, fhultmod, cusuario)
VALUES 
(0,'En espera' , now()     , now()   , 'sysadmin'),
(1,'Confirmado', now()     , now()   , 'sysadmin');

DELETE FROM DoFit.`Deporte`;

INSERT INTO DoFit.`Deporte`
(deporte, fhcreacion, fhultmod, cusuario)
VALUES
('Fútbol'           , now()    ,  now()   , 'sysadmin'),
('Basquet'          , now()    ,  now()   , 'sysadmin'),
('Natación'         , now()    ,  now()   , 'sysadmin'),
('Fútsal'           , now()    ,  now()   , 'sysadmin'),
('Hockey'           , now()    ,  now()   , 'sysadmin'),
('Handball'         , now()    ,  now()   , 'sysadmin'),
('Judo'             , now()    ,  now()   , 'sysadmin'),
('Atletismo'        , now()    ,  now()   , 'sysadmin'),
('Kung-Fu'          , now()    ,  now()   , 'sysadmin'),
('Teakwondo'        , now()    ,  now()   , 'sysadmin'),
('Tenis'            , now()    ,  now()   , 'sysadmin'),
('Voley'            , now()    ,  now()   , 'sysadmin'),
('Rugby'            , now()    ,  now()   , 'sysadmin'),
('Esgrima'          , now()    ,  now()   , 'sysadmin'),
('Boxeo'            , now()    ,  now()   , 'sysadmin'),  
('Karate'           , now()    ,  now()   , 'sysadmin'),   
('Cross-Fit'        , now()    ,  now()   , 'sysadmin'),	 
('Pesas-Musculación', now()    ,  now()   , 'sysadmin'),
('Spinning'         , now()    ,  now()   , 'sysadmin'),
('Polo'             , now()    ,  now()   , 'sysadmin'),
('Kempo'            , now()    ,  now()   , 'sysadmin'),
('Ping-pong'        , now()    ,  now()   , 'sysadmin'),
('Acqua GYM'        , now()    ,  now()   , 'sysadmin'),
('Waterpolo'        , now()    ,  now()   , 'sysadmin');


DELETE FROM DoFit.`Admin`;

INSERT INTO DoFit.`Admin`
(usuario, password, fhcreacion)
VALUES
('admin',md5('1234'),now());

DELETE FROM DoFit.`Usuario`;
					   
INSERT INTO  DoFit.`Usuario`
(email,password,id_perfil,id_estado,fhcreacion,fhultmod,cusuario)
VALUES
('da',MD5(123),1,1,NOW(),NOW(),'usuprueba');

INSERT INTO  DoFit.`Ficha_Usuario`
(id_usuario,nombre,apellido,dni,sexo,fechanac,telfijo,celular,conemer,telemer,id_localidad,direccion,piso,depto,fhcreacion,fhultmod,cusuario)
VALUES
(1,'Dario','Soro','3345656','M',now(),12345,123456,'Mama',1234567,1,'Alberdi 1230',NULL, NULL,now(),now(),'usuprueba');

DELETE FROM DoFit.`Perfil_Social`;

INSERT INTO DoFit.`Perfil_Social`
(id_usuario, foto1, foto2, foto3, foto4, foto5, descripcion, fhcreacion, fhultmod, cusuario, fotoPerfil, foto6)
VALUES
(1, 'images.jpg', NULL, NULL, NULL, NULL, 'Futbolista argentino. Delantero en el F. C. Barcelona, de la Primera División de España, y en la Selección Argentina.', now(), now(), 'usuprueba', NULL, NULL);

