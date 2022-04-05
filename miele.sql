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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.apicoltore: ~0 rows (circa)
/*!40000 ALTER TABLE `apicoltore` DISABLE KEYS */;
/*!40000 ALTER TABLE `apicoltore` ENABLE KEYS */;

-- Dump della struttura di tabella miele.barattolo
CREATE TABLE IF NOT EXISTS `barattolo` (
  `Capienza` int(11) DEFAULT NULL,
  `Codice_barattolo` int(11) NOT NULL AUTO_INCREMENT,
  `Codice_apicoltore` int(11) DEFAULT NULL,
  `Codice_magazzino` int(11) DEFAULT NULL,
  `Nome_miele` char(50) DEFAULT NULL,
  `Data_confezionamento` date DEFAULT NULL,
  `Data_immagazzinamento` date DEFAULT NULL,
  `Codice_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`Codice_barattolo`),
  KEY `Codice_apicoltore` (`Codice_apicoltore`),
  KEY `Codice_magazzino` (`Codice_magazzino`),
  KEY `Nome_miele` (`Nome_miele`),
  KEY `Codice_cliente` (`Codice_cliente`),
  CONSTRAINT `FK_barattolo_apicoltore` FOREIGN KEY (`Codice_apicoltore`) REFERENCES `apicoltore` (`Codice_apicoltore`) ON UPDATE CASCADE,
  CONSTRAINT `FK_barattolo_cliente` FOREIGN KEY (`Codice_cliente`) REFERENCES `cliente` (`Codice_cliente`) ON UPDATE CASCADE,
  CONSTRAINT `FK_barattolo_magazzino` FOREIGN KEY (`Codice_magazzino`) REFERENCES `magazzino` (`Codice_magazzino`) ON UPDATE CASCADE,
  CONSTRAINT `FK_barattolo_miele` FOREIGN KEY (`Nome_miele`) REFERENCES `miele` (`Nome`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.barattolo: ~0 rows (circa)
/*!40000 ALTER TABLE `barattolo` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.cliente: ~0 rows (circa)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.magazzino: ~0 rows (circa)
/*!40000 ALTER TABLE `magazzino` DISABLE KEYS */;
/*!40000 ALTER TABLE `magazzino` ENABLE KEYS */;

-- Dump della struttura di tabella miele.miele
CREATE TABLE IF NOT EXISTS `miele` (
  `Nome` char(50) NOT NULL DEFAULT '//',
  `Prezzo` int(11) DEFAULT NULL,
  `Proprietà` text DEFAULT NULL,
  `Specie_albero` char(50) DEFAULT NULL,
  `Genere_albero` char(50) DEFAULT NULL,
  PRIMARY KEY (`Nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella miele.miele: ~0 rows (circa)
/*!40000 ALTER TABLE `miele` DISABLE KEYS */;
/*!40000 ALTER TABLE `miele` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
