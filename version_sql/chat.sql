DROP TABLE IF EXISTS `conversacion`;
CREATE TABLE `conversacion` (
  `idConversacion` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `mensaje` varchar(45) DEFAULT NULL,
  `idusuarioori` INT NOT NULL,
  `idusuariodes` INT NOT NULL, 
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`idConversacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

