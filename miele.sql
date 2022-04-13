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
CREATE DATABASE IF NOT EXISTS `miele` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `miele`;

-- Dump della struttura di tabella miele.apicoltore
CREATE TABLE IF NOT EXISTS `apicoltore` (
  `Nome` char(50) DEFAULT NULL,
  `Cognome` char(50) DEFAULT NULL,
  `Codice_apicoltore` int(11) NOT NULL AUTO_INCREMENT,
  `E_mail` char(150) DEFAULT NULL,
  `Numero_telefono` int(11) DEFAULT NULL,
  `Città` char(50) DEFAULT NULL,
  `Via` char(50) DEFAULT NULL,
  `Civico` int(11) DEFAULT NULL,
  `Password` char(50) DEFAULT NULL,
  PRIMARY KEY (`Codice_apicoltore`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.apicoltore: ~2 rows (circa)
/*!40000 ALTER TABLE `apicoltore` DISABLE KEYS */;
INSERT INTO `apicoltore` (`Nome`, `Cognome`, `Codice_apicoltore`, `E_mail`, `Numero_telefono`, `Città`, `Via`, `Civico`, `Password`) VALUES
	('Matteo', 'Carolla', 1, 'matteo.carolla@liceobanfi.eu', 2147483647, 'Cambiago', 'Della Libertà', 13, 'GC'),
	('Andrea', 'Galimberti', 2, 'andrea.galimberti@liceobanfi.eu', 2147483647, 'Verona', 'Garibaldi', 2, '3004');
/*!40000 ALTER TABLE `apicoltore` ENABLE KEYS */;

-- Dump della struttura di tabella miele.barattolo
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.barattolo: ~60 rows (circa)
/*!40000 ALTER TABLE `barattolo` DISABLE KEYS */;
INSERT INTO `barattolo` (`Capienza`, `Codice_barattolo`, `Codice_apicoltore`, `Codice_magazzino`, `Nome_miele`, `Data_confezionamento`, `Data_immagazzinamento`, `Codice_cliente`, `Prezzo`) VALUES
	(250, 1, 1, 1, 'Acacia', '2022-04-05', '2022-04-09', 1, 4),
	(250, 2, 1, 1, 'Acacia', '2022-04-05', '2022-04-09', NULL, 4),
	(500, 3, 1, 1, 'Acacia', '2022-04-05', '2022-04-13', NULL, NULL),
	(500, 4, 1, 1, 'Acacia', '2022-04-05', '2022-04-13', NULL, NULL),
	(1000, 5, 1, 1, 'Acacia', '2022-04-05', '2022-04-13', NULL, NULL),
	(1000, 6, 1, 1, 'Acacia', '2022-04-05', '2022-04-13', NULL, NULL),
	(250, 7, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, NULL),
	(250, 8, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, NULL),
	(500, 9, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, NULL),
	(500, 10, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, NULL),
	(1000, 11, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, NULL),
	(1000, 12, 1, 1, 'Castagno', '2022-04-06', '2022-04-13', NULL, NULL),
	(250, 13, 1, 1, 'Tiglio', '2022-04-07', '2022-04-13', NULL, NULL),
	(250, 14, 1, 1, 'Tiglio', '2022-04-07', '2022-04-13', NULL, NULL),
	(500, 15, 1, 1, 'Tiglio', '2022-04-07', '2022-04-13', NULL, NULL),
	(500, 16, 1, 1, 'Tiglio', '2022-04-07', '2022-04-13', NULL, NULL),
	(1000, 17, 1, 1, 'Tiglio', '2022-04-07', '2022-04-13', NULL, NULL),
	(1000, 18, 1, 1, 'Tiglio', '2022-04-07', '2022-04-13', NULL, NULL),
	(250, 19, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, NULL),
	(250, 20, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, NULL),
	(500, 21, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, NULL),
	(500, 22, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, NULL),
	(1000, 23, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, NULL),
	(1000, 24, 1, 1, 'Tarassaco', '2022-04-08', '2022-04-13', NULL, NULL),
	(250, 25, 1, 1, 'Rododendro', '2022-04-09', '2022-04-13', NULL, NULL),
	(250, 26, 1, 2, 'Rododendro', '2022-04-09', '2022-04-13', NULL, NULL),
	(500, 27, 1, 2, 'Rododendro', '2022-04-09', '2022-04-13', NULL, NULL),
	(500, 28, 1, 2, 'Rododendro', '2022-04-09', '2022-04-13', NULL, NULL),
	(1000, 29, 1, 2, 'Rododendro', '2022-04-09', '2022-04-13', NULL, NULL),
	(1000, 30, 1, 2, 'Rododendro', '2022-04-09', '2022-04-13', NULL, NULL),
	(250, 31, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', NULL, NULL),
	(250, 32, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', NULL, NULL),
	(500, 33, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', NULL, NULL),
	(500, 34, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', NULL, NULL),
	(1000, 35, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', NULL, NULL),
	(1000, 36, 2, 2, 'Millefiori', '2022-04-10', '2022-04-13', NULL, NULL),
	(250, 37, 2, 2, 'Timo', '2022-04-11', '2022-04-13', NULL, NULL),
	(250, 38, 2, 2, 'Timo', '2022-04-11', '2022-04-13', NULL, NULL),
	(500, 39, 2, 2, 'Timo', '2022-04-11', '2022-04-13', NULL, NULL),
	(500, 40, 2, 2, 'Timo', '2022-04-11', '2022-04-13', NULL, NULL),
	(1000, 41, 2, 3, 'Timo', '2022-04-11', '2022-04-13', NULL, NULL),
	(1000, 42, 2, 3, 'Timo', '2022-04-11', '2022-04-13', NULL, NULL),
	(250, 43, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, NULL),
	(250, 44, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, NULL),
	(500, 45, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, NULL),
	(500, 46, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, NULL),
	(1000, 47, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, NULL),
	(1000, 48, 2, 3, 'Girasole', '2022-04-12', '2022-04-13', NULL, NULL),
	(250, 49, 2, 3, 'Erba_medica', '2022-04-13', '2022-04-13', NULL, NULL),
	(250, 50, 2, 3, 'Erba_medica', '2022-04-13', '2022-04-13', NULL, NULL),
	(500, 51, 2, 3, 'Erba_medica', '2022-04-13', '2022-04-13', NULL, NULL),
	(500, 52, 2, 3, 'Erba_medica', '2022-04-13', '2022-04-13', NULL, NULL),
	(1000, 53, 2, 3, 'Erba_medica', '2022-04-13', '2022-04-13', NULL, NULL),
	(1000, 54, 2, 3, 'Erba_medica', '2022-04-13', '2022-04-13', NULL, NULL),
	(250, 55, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', NULL, NULL),
	(250, 56, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', NULL, NULL),
	(500, 57, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', NULL, NULL),
	(500, 58, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', NULL, NULL),
	(1000, 59, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', NULL, NULL),
	(1000, 60, 2, 3, 'Eucalipto', '2022-04-14', '2022-04-15', NULL, NULL);
/*!40000 ALTER TABLE `barattolo` ENABLE KEYS */;

-- Dump della struttura di tabella miele.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `Nome` char(50) DEFAULT NULL,
  `Cognome` char(50) DEFAULT NULL,
  `Codice_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Password` char(50) NOT NULL DEFAULT '0',
  `Numero_telefono` int(11) DEFAULT NULL,
  `E_mail` char(150) DEFAULT NULL,
  `Città` char(50) DEFAULT NULL,
  `Via` char(50) DEFAULT NULL,
  `Civico` int(11) DEFAULT NULL,
  PRIMARY KEY (`Codice_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.cliente: ~1 rows (circa)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`Nome`, `Cognome`, `Codice_cliente`, `Password`, `Numero_telefono`, `E_mail`, `Città`, `Via`, `Civico`) VALUES
	('Andrea', 'Galimberti', 1, '300404', 2147483647, 'andrea.galimberti@liceobanfi.eu', 'Caponago', 'Roma', 51);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Dump della struttura di tabella miele.magazzino
CREATE TABLE IF NOT EXISTS `magazzino` (
  `Città` char(50) DEFAULT NULL,
  `Via` char(50) DEFAULT NULL,
  `Civico` int(11) DEFAULT NULL,
  `Superficie` int(11) DEFAULT NULL,
  `Capienza` int(11) DEFAULT NULL,
  `Codice_magazzino` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Codice_magazzino`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.magazzino: ~3 rows (circa)
/*!40000 ALTER TABLE `magazzino` DISABLE KEYS */;
INSERT INTO `magazzino` (`Città`, `Via`, `Civico`, `Superficie`, `Capienza`, `Codice_magazzino`) VALUES
	('Milano', 'Garibaldi', 43, 70000, 35, 1),
	('Bergamo', 'Adamello', 12, 45000, 20, 2),
	('Monza', 'Circonvallazione', 36, 62000, 25, 3);
/*!40000 ALTER TABLE `magazzino` ENABLE KEYS */;

-- Dump della struttura di tabella miele.miele
CREATE TABLE IF NOT EXISTS `miele` (
  `Nome` char(50) NOT NULL DEFAULT '//',
  `Proprietà` text DEFAULT NULL,
  `Specie_albero` char(50) DEFAULT NULL,
  `Genere_albero` char(50) DEFAULT NULL,
  `Prezzo` float unsigned NOT NULL,
  PRIMARY KEY (`Nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.miele: ~10 rows (circa)
/*!40000 ALTER TABLE `miele` DISABLE KEYS */;
INSERT INTO `miele` (`Nome`, `Proprietà`, `Specie_albero`, `Genere_albero`, `Prezzo`) VALUES
	('Acacia', 'Rinforza le mammelle', 'GC', 'GC', 16),
	('Castagno', NULL, NULL, NULL, 20),
	('Erba_medica', NULL, NULL, NULL, 14),
	('Eucalipto', NULL, NULL, NULL, 19),
	('Girasole', NULL, NULL, NULL, 18),
	('Millefiori', NULL, NULL, NULL, 12),
	('Rododendro', NULL, NULL, NULL, 22),
	('Tarassaco', NULL, NULL, NULL, 18),
	('Tiglio', NULL, NULL, NULL, 16),
	('Timo', NULL, NULL, NULL, 20);
/*!40000 ALTER TABLE `miele` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
