DROP TABLE IF EXISTS `conversacion`;
CREATE TABLE `conversacion` (
  `idConversacion` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `mensaje` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idConversacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `conversacion` VALUES (11,'Geo','Hola Brothers !');
