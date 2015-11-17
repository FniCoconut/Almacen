CREATE DATABASE  IF NOT EXISTS `bdalmacen2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bdalmacen2`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bdalmacen2
-- ------------------------------------------------------
-- Server version	5.6.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bkp_caja_fuerte`
--

DROP TABLE IF EXISTS `bkp_caja_fuerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bkp_caja_fuerte` (
  `ID_CAJA` int(4) NOT NULL,
  `TIPO_CAJA` varchar(15) DEFAULT 'Caja Fuerte',
  `ALTO` int(3) NOT NULL,
  `ANCHO` int(3) NOT NULL,
  `PROFUNDIDAD` int(3) NOT NULL,
  `COLOR` varchar(7) DEFAULT NULL,
  `CERRADURA` varchar(30) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  `FECHA_SALIDA` date NOT NULL,
  PRIMARY KEY (`ID_CAJA`,`FECHA_ENTRADA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bkp_caja_fuerte`
--

LOCK TABLES `bkp_caja_fuerte` WRITE;
/*!40000 ALTER TABLE `bkp_caja_fuerte` DISABLE KEYS */;
INSERT INTO `bkp_caja_fuerte` VALUES (22,'Caja Fuerte',10,10,10,'#808000','candado con llave','2015-10-20','2015-10-27'),(24,'Caja Fuerte',35,45,120,'#800040','doble con retardo','2015-10-21','2015-10-26'),(25,'Caja Fuerte',11,13,10,'#3ec1a7','codigo','2015-10-22','2015-10-27'),(26,'Caja Fuerte',20,20,20,'#8080ff','digital','2015-10-26','2015-10-28'),(28,'Caja Fuerte',70,74,95,'#80ffff','doble con retardo','2015-10-29','2015-10-29');
/*!40000 ALTER TABLE `bkp_caja_fuerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bkp_caja_negra`
--

DROP TABLE IF EXISTS `bkp_caja_negra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bkp_caja_negra` (
  `ID_CAJA` int(4) NOT NULL,
  `TIPO_CAJA` varchar(15) DEFAULT 'Caja Negra',
  `ALTO` int(3) NOT NULL,
  `ANCHO` int(3) NOT NULL,
  `PROFUNDIDAD` int(3) NOT NULL,
  `COLOR` varchar(7) DEFAULT '#FC6900',
  `PLACA_BASE` varchar(30) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  `FECHA_SALIDA` date NOT NULL,
  PRIMARY KEY (`ID_CAJA`,`FECHA_ENTRADA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bkp_caja_negra`
--

LOCK TABLES `bkp_caja_negra` WRITE;
/*!40000 ALTER TABLE `bkp_caja_negra` DISABLE KEYS */;
INSERT INTO `bkp_caja_negra` VALUES (16,'Caja Negra',10,10,10,'#FF4401','MK-GEN-T2','2015-10-20','2015-10-26'),(17,'Caja Negra',13,13,13,'#FF4401','BLUBLI','2015-10-20','2015-10-26'),(18,'Caja Negra',13,17,12,'#FF4401','MB-150A','2015-10-23','2015-10-26'),(19,'Caja Negra',150,150,150,'#FF4401','MK-GEN-T2','2015-10-26','2015-10-26');
/*!40000 ALTER TABLE `bkp_caja_negra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bkp_caja_sorpresa`
--

DROP TABLE IF EXISTS `bkp_caja_sorpresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bkp_caja_sorpresa` (
  `ID_CAJA` int(4) NOT NULL,
  `TIPO_CAJA` varchar(15) DEFAULT 'Caja Sorpresa',
  `ALTO` int(3) NOT NULL,
  `ANCHO` int(3) NOT NULL,
  `PROFUNDIDAD` int(3) NOT NULL,
  `COLOR` varchar(7) DEFAULT NULL,
  `CONTENIDO` mediumblob NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  `FECHA_SALIDA` date NOT NULL,
  PRIMARY KEY (`ID_CAJA`,`FECHA_ENTRADA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bkp_caja_sorpresa`
--

LOCK TABLES `bkp_caja_sorpresa` WRITE;
/*!40000 ALTER TABLE `bkp_caja_sorpresa` DISABLE KEYS */;
INSERT INTO `bkp_caja_sorpresa` VALUES (12,'Caja Sorpresa',10,10,10,'#80ff00','Esponjas','2015-10-26','2015-10-28'),(12,'Caja Sorpresa',10,10,10,'#80ff00','Esponjas','2015-10-28','2015-11-12'),(13,'Caja Sorpresa',50,50,50,'#00ff00','Esponjas verdes','2015-10-28','2015-10-29'),(14,'Caja Sorpresa',80,80,80,'#008080','Sales de baño','2015-11-03','2015-11-12');
/*!40000 ALTER TABLE `bkp_caja_sorpresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bkp_ocupacion`
--

DROP TABLE IF EXISTS `bkp_ocupacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bkp_ocupacion` (
  `ID_ESTANTERIA` int(3) NOT NULL,
  `LEJA` int(2) NOT NULL,
  `ID_CAJA` int(4) NOT NULL,
  `TIPO_CAJA` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTANTERIA`,`ID_CAJA`,`LEJA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bkp_ocupacion`
--

LOCK TABLES `bkp_ocupacion` WRITE;
/*!40000 ALTER TABLE `bkp_ocupacion` DISABLE KEYS */;
INSERT INTO `bkp_ocupacion` VALUES (22,2,12,'Caja Sorpresa'),(22,1,13,'Caja Sorpresa'),(22,2,15,'Caja Sorpresa'),(22,4,19,'Caja Negra'),(22,3,20,'Caja Negra'),(22,0,26,'Caja Fuerte'),(22,0,28,'Caja Fuerte'),(23,0,14,'Caja Sorpresa'),(23,2,27,'Caja Fuerte'),(31,4,14,'Caja Sorpresa'),(31,3,20,'Caja Negra'),(35,3,12,'Caja Sorpresa'),(36,3,30,'Caja Fuerte');
/*!40000 ALTER TABLE `bkp_ocupacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caja_fuerte`
--

DROP TABLE IF EXISTS `caja_fuerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja_fuerte` (
  `ID_CAJA` int(4) NOT NULL AUTO_INCREMENT,
  `TIPO_CAJA` varchar(15) DEFAULT 'Caja Fuerte',
  `ALTO` int(3) NOT NULL,
  `ANCHO` int(3) NOT NULL,
  `PROFUNDIDAD` int(3) NOT NULL,
  `COLOR` varchar(7) DEFAULT NULL,
  `CERRADURA` varchar(30) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  PRIMARY KEY (`ID_CAJA`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja_fuerte`
--

LOCK TABLES `caja_fuerte` WRITE;
/*!40000 ALTER TABLE `caja_fuerte` DISABLE KEYS */;
INSERT INTO `caja_fuerte` VALUES (27,'Caja Fuerte',20,20,20,'#008080','candado con llave','2015-11-10'),(29,'Caja Fuerte',58,10,15,'#008040','extra&super','2015-11-03'),(30,'Caja Fuerte',35,60,25,'#ff0080','doble con retardo','2015-11-05');
/*!40000 ALTER TABLE `caja_fuerte` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bdalmacen2`.`caja_fuerte_AFTER_DELETE` AFTER DELETE ON `caja_fuerte` FOR EACH ROW
begin
INSERT INTO `bdalmacen2`.`bkp_caja_fuerte` VALUES (old.ID_CAJA, old.TIPO_CAJA, old.ALTO, old.ANCHO, old.PROFUNDIDAD, old.COLOR, old.CERRADURA, old.FECHA_ENTRADA, sysdate());
delete from `bdalmacen2`.`ocupacion` where ID_CAJA = old.ID_CAJA AND TIPO_CAJA = old.TIPO_CAJA;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `caja_negra`
--

DROP TABLE IF EXISTS `caja_negra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja_negra` (
  `ID_CAJA` int(4) NOT NULL AUTO_INCREMENT,
  `TIPO_CAJA` varchar(15) DEFAULT 'Caja Negra',
  `ALTO` int(3) NOT NULL,
  `ANCHO` int(3) NOT NULL,
  `PROFUNDIDAD` int(3) NOT NULL,
  `COLOR` varchar(7) DEFAULT '#FC6900',
  `PLACA_BASE` varchar(30) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  PRIMARY KEY (`ID_CAJA`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja_negra`
--

LOCK TABLES `caja_negra` WRITE;
/*!40000 ALTER TABLE `caja_negra` DISABLE KEYS */;
INSERT INTO `caja_negra` VALUES (20,'Caja Negra',80,50,20,'#FF4401','BLUBLI','2015-11-16');
/*!40000 ALTER TABLE `caja_negra` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bdalmacen2`.`caja_negra_AFTER_DELETE` AFTER DELETE ON `caja_negra` FOR EACH ROW
    begin
INSERT INTO `bdalmacen2`.`bkp_caja_negra` VALUES (old.ID_CAJA, old.TIPO_CAJA, old.ALTO, old.ANCHO, old.PROFUNDIDAD, old.COLOR, old.PLACA_BASE, old.FECHA_ENTRADA, sysdate());
delete from `bdalmacen2`.`ocupacion` where ID_CAJA = old.ID_CAJA AND TIPO_CAJA = old.TIPO_CAJA;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `caja_sorpresa`
--

DROP TABLE IF EXISTS `caja_sorpresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja_sorpresa` (
  `ID_CAJA` int(4) NOT NULL AUTO_INCREMENT,
  `TIPO_CAJA` varchar(15) DEFAULT 'Caja Sorpresa',
  `ALTO` int(3) NOT NULL,
  `ANCHO` int(3) NOT NULL,
  `PROFUNDIDAD` int(3) NOT NULL,
  `COLOR` varchar(7) DEFAULT NULL,
  `CONTENIDO` mediumblob NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  PRIMARY KEY (`ID_CAJA`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja_sorpresa`
--

LOCK TABLES `caja_sorpresa` WRITE;
/*!40000 ALTER TABLE `caja_sorpresa` DISABLE KEYS */;
INSERT INTO `caja_sorpresa` VALUES (13,'Caja Sorpresa',50,50,50,'#00ff00','Esponjas verdes','2015-11-03'),(15,'Caja Sorpresa',13,13,11,'#d200d2','Loción para masaje de melocoton','2015-11-10'),(16,'Caja Sorpresa',25,25,25,'#800000','álbumes de fotos','2015-11-08'),(17,'Caja Sorpresa',70,90,90,'#80ff00','libros de ocasión','2015-11-08');
/*!40000 ALTER TABLE `caja_sorpresa` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bdalmacen2`.`caja_sorpresa_AFTER_DELETE` AFTER DELETE ON `caja_sorpresa` FOR EACH ROW
    begin
INSERT INTO `bdalmacen2`.`bkp_caja_sorpresa` VALUES (old.ID_CAJA, old.TIPO_CAJA, old.ALTO, old.ANCHO, old.PROFUNDIDAD, old.COLOR, old.CONTENIDO, old.FECHA_ENTRADA, sysdate());
delete from `bdalmacen2`.`ocupacion` where ID_CAJA = old.ID_CAJA AND TIPO_CAJA = old.TIPO_CAJA;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `estanteria`
--

DROP TABLE IF EXISTS `estanteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estanteria` (
  `ID_ESTANTERIA` int(3) NOT NULL AUTO_INCREMENT,
  `NUM_LEJAS` int(1) NOT NULL,
  `ALTO_LEJA` int(3) DEFAULT NULL,
  `ANCHO_LEJA` int(3) DEFAULT '250',
  `PROF_LEJA` int(3) DEFAULT '250',
  `OCUPADAS` int(1) NOT NULL,
  `MATERIAL` varchar(25) NOT NULL,
  `PASILLO` varchar(2) NOT NULL,
  `NUMERO` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTANTERIA`),
  KEY `FK_CORRIDOR_idx` (`PASILLO`),
  KEY `FK_MATERIAL_idx` (`MATERIAL`),
  CONSTRAINT `FK_CORRIDOR` FOREIGN KEY (`PASILLO`) REFERENCES `pasillo` (`ID_PASILLO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_MATERIAL` FOREIGN KEY (`MATERIAL`) REFERENCES `material` (`MATERIAL_ESTANTERIA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estanteria`
--

LOCK TABLES `estanteria` WRITE;
/*!40000 ALTER TABLE `estanteria` DISABLE KEYS */;
INSERT INTO `estanteria` VALUES (30,5,100,250,250,0,'Madera','CI',6),(31,8,63,250,250,0,'Madera','BI',6),(32,5,100,250,250,2,'Madera','AD',4),(33,5,100,250,250,2,'Madera','BD',4),(34,5,100,250,250,0,'Acero Inoxidable','AI',4),(35,8,63,250,250,1,'Acero Inoxidable','AD',2),(36,5,100,250,250,0,'Acero Inoxidable','CD',5),(37,8,63,250,250,3,'Madera','AD',1);
/*!40000 ALTER TABLE `estanteria` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bdalmacen2`.`estanteria` BEFORE INSERT ON `estanteria` FOR EACH ROW
BEGIN
UPDATE `bdalmacen2`.`pasillo` SET POSICIONES = POSICIONES - 1 WHERE ID_PASILLO = NEW.PASILLO;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `MATERIAL_ESTANTERIA` varchar(25) NOT NULL,
  PRIMARY KEY (`MATERIAL_ESTANTERIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES ('Acero Inoxidable'),('Madera'),('PVC');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ocupacion`
--

DROP TABLE IF EXISTS `ocupacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ocupacion` (
  `ID_ESTANTERIA` int(3) NOT NULL,
  `LEJA` int(2) NOT NULL,
  `ID_CAJA` int(4) NOT NULL,
  `TIPO_CAJA` varchar(15) NOT NULL DEFAULT 'Caja',
  PRIMARY KEY (`ID_ESTANTERIA`,`LEJA`),
  CONSTRAINT `FK_ESTANTERIA` FOREIGN KEY (`ID_ESTANTERIA`) REFERENCES `estanteria` (`ID_ESTANTERIA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ocupacion`
--

LOCK TABLES `ocupacion` WRITE;
/*!40000 ALTER TABLE `ocupacion` DISABLE KEYS */;
INSERT INTO `ocupacion` VALUES (32,0,13,'Caja Sorpresa'),(32,2,20,'Caja Negra'),(33,2,29,'Caja Fuerte'),(33,4,30,'Caja Fuerte'),(35,1,17,'Caja Sorpresa'),(37,1,16,'Caja Sorpresa'),(37,2,15,'Caja Sorpresa'),(37,7,27,'Caja Fuerte');
/*!40000 ALTER TABLE `ocupacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bdalmacen2`.`ocupacion` AFTER DELETE ON `ocupacion` FOR EACH ROW
 begin
 insert into `bdalmacen2`.`bkp_ocupacion` values (OLD.ID_ESTANTERIA, OLD.LEJA, OLD.ID_CAJA, OLD.TIPO_CAJA);
 UPDATE `bdalmacen2`.`estanteria` SET OCUPADAS = OCUPADAS - 1 WHERE ID_ESTANTERIA = OLD.ID_ESTANTERIA;
 END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pasillo`
--

DROP TABLE IF EXISTS `pasillo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasillo` (
  `ID_PASILLO` varchar(2) NOT NULL,
  `POSICIONES` int(1) NOT NULL,
  PRIMARY KEY (`ID_PASILLO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasillo`
--

LOCK TABLES `pasillo` WRITE;
/*!40000 ALTER TABLE `pasillo` DISABLE KEYS */;
INSERT INTO `pasillo` VALUES ('AD',5),('AI',7),('BD',7),('BI',7),('CD',7),('CI',7);
/*!40000 ALTER TABLE `pasillo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `ID_USUARIO` varchar(7) NOT NULL,
  `AUTENTICACION` varchar(50) NOT NULL,
  `SALT` varchar(4) NOT NULL,
  `PERMISO` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('ALFA-01','5f154afdb733a7bd354b476dd37283983276460e','boss',2),('BETA-01','bdac01c5b63fcfb9d87dfc914f14fc4db45d34b1','gern',1),('TAU-001','28745c65c35c743327cb75a128d6c7075d00b38b','empl',0),('TAU-002','d3f4fd2bc59c20fff53ecb8050ef6de9463c7017','empl',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-17 10:44:50
