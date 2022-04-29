-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.21-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database miele
DROP DATABASE IF EXISTS `miele`;
CREATE DATABASE IF NOT EXISTS `miele` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `miele`;

-- Dump della struttura di tabella miele.apicoltore
DROP TABLE IF EXISTS `apicoltore`;
CREATE TABLE IF NOT EXISTS `apicoltore` (
  `Nome` char(50) DEFAULT NULL,
  `Cognome` char(50) DEFAULT NULL,
  `Codice_apicoltore` int(11) NOT NULL AUTO_INCREMENT,
  `E_mail` char(150) DEFAULT NULL,
  `Numero_telefono` int(11) DEFAULT NULL,
  `Citta` char(50) DEFAULT NULL,
  `Via` char(50) DEFAULT NULL,
  `Civico` int(11) DEFAULT NULL,
  `Password` char(50) DEFAULT NULL,
  PRIMARY KEY (`Codice_apicoltore`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.apicoltore: ~3 rows (circa)
DELETE FROM `apicoltore`;
/*!40000 ALTER TABLE `apicoltore` DISABLE KEYS */;
INSERT INTO `apicoltore` (`Nome`, `Cognome`, `Codice_apicoltore`, `E_mail`, `Numero_telefono`, `Citta`, `Via`, `Civico`, `Password`) VALUES
	('Matteo', 'Carolla', 1, 'matteo.carolla@liceobanfi.eu', 2147483647, 'Cambiago', 'Della Libertà', 13, 'GC'),
	('Andrea', 'Galimberti', 2, 'andrea.galimberti@liceobanfi.eu', 2147483647, 'Verona', 'Garibaldi', 2, '3004'),
	('GC', 'GC', 3, 'hello.bitvh@gmail.com', 0, '', '', 0, 'yyy'),
	('ghj', 'ghj', 4, 'ghj', 0, '', '', 0, 'ghj'),
	('insulina', 'insulina', 5, 'insulina', 0, '', '', 0, 'insulina');
/*!40000 ALTER TABLE `apicoltore` ENABLE KEYS */;

-- Dump della struttura di tabella miele.barattolo
DROP TABLE IF EXISTS `barattolo`;
CREATE TABLE IF NOT EXISTS `barattolo` (
  `Capienza` float DEFAULT NULL,
  `Codice_barattolo` int(11) NOT NULL AUTO_INCREMENT,
  `Codice_apicoltore` int(11) DEFAULT NULL,
  `Codice_magazzino` int(11) DEFAULT NULL,
  `Nome_miele` char(50) DEFAULT NULL,
  `Data_confezionamento` date DEFAULT NULL,
  `Data_immagazzinamento` date DEFAULT NULL,
  `Codice_cliente` int(11) DEFAULT NULL,
  `Prezzo` float DEFAULT NULL,
  PRIMARY KEY (`Codice_barattolo`),
  KEY `Codice_apicoltore` (`Codice_apicoltore`),
  KEY `Codice_magazzino` (`Codice_magazzino`),
  KEY `Nome_miele` (`Nome_miele`),
  KEY `Codice_cliente` (`Codice_cliente`),
  CONSTRAINT `FK_barattolo_apicoltore` FOREIGN KEY (`Codice_apicoltore`) REFERENCES `apicoltore` (`Codice_apicoltore`) ON UPDATE CASCADE,
  CONSTRAINT `FK_barattolo_cliente` FOREIGN KEY (`Codice_cliente`) REFERENCES `cliente` (`Codice_cliente`) ON UPDATE CASCADE,
  CONSTRAINT `FK_barattolo_magazzino` FOREIGN KEY (`Codice_magazzino`) REFERENCES `magazzino` (`Codice_magazzino`) ON UPDATE CASCADE,
  CONSTRAINT `FK_barattolo_miele` FOREIGN KEY (`Nome_miele`) REFERENCES `miele` (`Nome`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.barattolo: ~71 rows (circa)
DELETE FROM `barattolo`;
/*!40000 ALTER TABLE `barattolo` DISABLE KEYS */;
INSERT INTO `barattolo` (`Capienza`, `Codice_barattolo`, `Codice_apicoltore`, `Codice_magazzino`, `Nome_miele`, `Data_confezionamento`, `Data_immagazzinamento`, `Codice_cliente`, `Prezzo`) VALUES
	(250, 2, 1, 1, 'Acacia', '2022-04-05', '2022-04-09', 2, 4),
	(500, 3, 1, 1, 'Acacia', '2022-04-05', '2022-04-13', 2, 8),
	(500, 4, 1, 1, 'Acacia', '2022-04-05', '2022-04-13', 2, 8),
	(250, 7, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, 5),
	(250, 8, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, 5),
	(500, 9, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, 10),
	(500, 10, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, 10),
	(1000, 11, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, 20),
	(1000, 12, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, 20),
	(500, 21, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, 9),
	(500, 22, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, 9),
	(1000, 23, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, 18),
	(1000, 24, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, 18),
	(250, 26, 1, 2, 'Rododendro', '2022-04-09', '2022-04-13', 2, 5.5),
	(500, 28, 1, 2, 'Rododendro', '2022-04-09', '2022-04-13', NULL, 11),
	(500, 33, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', 2, 6),
	(500, 34, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', 2, 6),
	(1000, 35, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', NULL, 12),
	(1000, 36, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', NULL, 12),
	(250, 37, 2, 2, 'Timo', '2022-04-11', '2022-04-13', NULL, 5),
	(250, 38, 2, 2, 'Timo', '2022-04-11', '2022-04-13', NULL, 5),
	(500, 39, 2, 2, 'Timo', '2022-04-11', '2022-04-13', NULL, 10),
	(1000, 42, 2, 3, 'Timo', '2022-04-11', '2022-04-13', NULL, 20),
	(500, 45, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, 9),
	(500, 46, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, 9),
	(1000, 47, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, 18),
	(1000, 48, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, 18),
	(250, 49, 2, 3, 'Erba medica', '2022-04-13', '2022-04-13', NULL, 3.5),
	(250, 50, 2, 3, 'Erba medica', '2022-04-13', '2022-04-13', NULL, 3.5),
	(500, 51, 2, 3, 'Erba medica', '2022-04-13', '2022-04-13', 2, 7),
	(500, 52, 2, 3, 'Erba medica', '2022-04-13', '2022-04-13', NULL, 7),
	(1000, 53, 2, 3, 'Erba medica', '2022-04-13', '2022-04-13', NULL, 14),
	(1000, 54, 2, 3, 'Erba medica', '2022-04-13', '2022-04-13', NULL, 14),
	(250, 56, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', 1, 4.75),
	(500, 58, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', NULL, 9.5),
	(1000, 59, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', NULL, 19),
	(1000, 60, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', NULL, 19),
	(500, 62, 3, 3, 'Acacia', '2022-04-15', '2022-04-19', 2, 8),
	(1000, 63, 5, 3, 'Millefiori', '2022-04-15', '2022-04-23', NULL, 12),
	(1000, 64, 5, 3, 'Millefiori', '2022-04-15', '2022-04-23', NULL, 12),
	(500, 68, 5, 2, 'Millefiori', '2022-04-15', '2022-04-23', NULL, 6),
	(500, 69, 5, 3, 'Millefiori', '2022-04-15', '2022-04-23', NULL, 6),
	(250, 70, 5, 2, 'Tarassaco', '2022-04-14', '2022-04-23', NULL, 4.5),
	(250, 71, 5, 2, 'Tarassaco', '2022-04-14', '2022-04-23', NULL, 4.5),
	(500, 72, 5, 2, 'Tarassaco', '2022-04-13', '2022-04-23', NULL, 9),
	(500, 73, 2, 3, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 8),
	(500, 74, 2, 3, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 8),
	(500, 75, 2, 3, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 8),
	(500, 76, 2, 3, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 8),
	(250, 77, 2, 3, 'Tiglio', '0000-00-00', '2022-04-28', NULL, 4),
	(500, 79, 2, 2, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 8),
	(500, 80, 2, 2, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 8),
	(500, 81, 2, 2, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 8),
	(250, 82, 2, 2, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(500, 83, 2, 2, 'Acacia', '2022-04-13', '2022-04-28', NULL, 8),
	(250, 87, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 88, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 93, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 94, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 96, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 97, 2, 1, 'Acacia', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 98, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 99, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 100, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 101, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 102, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 103, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 104, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 105, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 106, 2, 1, 'Tiglio', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 107, 2, 3, 'Acacia', '2022-04-13', '2022-04-28', NULL, 4),
	(250, 108, 2, 2, 'Erba medica', '2022-04-14', '2022-04-28', NULL, 3.5),
	(250, 109, 2, 2, 'Erba medica', '2022-04-14', '2022-04-28', NULL, 3.5),
	(250, 110, 2, 1, 'Erba medica', '2022-04-14', '2022-04-28', NULL, 3.5);
/*!40000 ALTER TABLE `barattolo` ENABLE KEYS */;

-- Dump della struttura di tabella miele.cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `Nome` char(50) DEFAULT NULL,
  `Cognome` char(50) DEFAULT NULL,
  `Codice_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Password` char(50) NOT NULL DEFAULT '0',
  `Numero_telefono` int(11) DEFAULT NULL,
  `E_mail` char(150) DEFAULT NULL,
  `Citta` char(50) DEFAULT NULL,
  `Via` char(50) DEFAULT NULL,
  `Civico` int(11) DEFAULT NULL,
  PRIMARY KEY (`Codice_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.cliente: ~11 rows (circa)
DELETE FROM `cliente`;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`Nome`, `Cognome`, `Codice_cliente`, `Password`, `Numero_telefono`, `E_mail`, `Citta`, `Via`, `Civico`) VALUES
	('Andrea', 'Galimberti', 1, '300404', 2147483647, 'andrea.galimberti@liceobanfi.eu', 'Caponago', 'Roma', 51),
	('yyyy', 'yyyy', 2, 'yyy', 66666666, 'hello.bitvh@gmail.com', 'yui', 'iop', 89),
	('matta', 'matta', 3, 'matta', 0, 'matta', '', '', 0),
	('asd', 'asd', 5, 'asd', 0, 'asd', '', '', 0),
	('mammellone', 'mammellone', 6, 'srg', 0, 'srg', '', '', 0),
	('Andrea', 'Galimberti', 7, '300404', 0, 'ciao', '', '', 0),
	('Andrea', 'Galimberti', 8, '3004', 0, 'carello', '', '', 0),
	('u', 'u', 9, 'u', 0, 'u', '', '', 0),
	('a', 'a', 10, 'a', 0, 'a', '', '', 0),
	('i', 'i', 11, 'i', 0, 'i', '', '', 0),
	('e', 'e', 12, 'e', 0, 'e', '', '', 0);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Dump della struttura di tabella miele.magazzino
DROP TABLE IF EXISTS `magazzino`;
CREATE TABLE IF NOT EXISTS `magazzino` (
  `Citta` char(50) DEFAULT NULL,
  `Via` char(50) DEFAULT NULL,
  `Civico` int(11) DEFAULT NULL,
  `Capienza` int(11) DEFAULT NULL,
  `Codice_magazzino` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Codice_magazzino`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.magazzino: ~3 rows (circa)
DELETE FROM `magazzino`;
/*!40000 ALTER TABLE `magazzino` DISABLE KEYS */;
INSERT INTO `magazzino` (`Citta`, `Via`, `Civico`, `Capienza`, `Codice_magazzino`) VALUES
	('Milano', 'Garibaldi', 43, 35, 1),
	('Bergamo', 'Adamello', 12, 20, 2),
	('Monza', 'Circonvallazione', 36, 25, 3);
/*!40000 ALTER TABLE `magazzino` ENABLE KEYS */;

-- Dump della struttura di tabella miele.miele
DROP TABLE IF EXISTS `miele`;
CREATE TABLE IF NOT EXISTS `miele` (
  `Nome` char(50) NOT NULL DEFAULT '//',
  `Prezzo` float unsigned NOT NULL,
  PRIMARY KEY (`Nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.miele: ~10 rows (circa)
DELETE FROM `miele`;
/*!40000 ALTER TABLE `miele` DISABLE KEYS */;
INSERT INTO `miele` (`Nome`, `Prezzo`) VALUES
	('Acacia', 16),
	('Castagno', 20),
	('Erba medica', 14),
	('Eucalipto', 19),
	('Girasole', 18),
	('Millefiori', 12),
	('Rododendro', 22),
	('Tarassaco', 18),
	('Tiglio', 16),
	('Timo', 20);
/*!40000 ALTER TABLE `miele` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
