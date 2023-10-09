-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ppt_maasvallei
CREATE DATABASE IF NOT EXISTS `ppt_maasvallei` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ppt_maasvallei`;

-- Dumping structure for table ppt_maasvallei.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(60) NOT NULL,
  `achternaam` varchar(60) NOT NULL,
  `telefoon_nummer` varchar(12) NOT NULL,
  `email` varchar(64) NOT NULL,
  `wachtwoord` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.accounts: ~0 rows (approximately)
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `voornaam`, `achternaam`, `telefoon_nummer`, `email`, `wachtwoord`) VALUES
	(13, 'Dirk', 'Schaafstra', '0613575700', 'dirk.schaafstra@gmail.com', '$2y$10$.o1XM/59nMj5QlXC6GXMJuOO73NJHy0AftcOnsqdlFoGmHkco0iPy'),
	(14, 'Bjoreno', 'Degens', '0611pijpjeze', 'bjorenodegens@gmail.com', '$2y$10$bzmh1MttPs.zqcdqsw5K4.lK5ug3sglw2WbPNn/TuJXl0E4WlwOkO');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.dagen
CREATE TABLE IF NOT EXISTS `dagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Dag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.dagen: ~7 rows (approximately)
/*!40000 ALTER TABLE `dagen` DISABLE KEYS */;
INSERT INTO `dagen` (`id`, `Dag`) VALUES
	(1, 'Maandag'),
	(2, 'Dinsdag\r\n'),
	(3, 'Woensdag'),
	(4, 'Donderdag'),
	(5, 'Vrijdag'),
	(6, 'Zaterdag'),
	(7, 'Zondag');
/*!40000 ALTER TABLE `dagen` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.kampeerplaatsen
CREATE TABLE IF NOT EXISTS `kampeerplaatsen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kampeerplek_nummer` varchar(5) DEFAULT NULL,
  `klant_id` int(11) DEFAULT NULL,
  `betaald` tinyint(4) DEFAULT 0,
  `bezet` tinyint(4) DEFAULT 0,
  `schoongemaakt` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `klant_id` (`klant_id`),
  CONSTRAINT `kampeerplaatsen_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `accounts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.kampeerplaatsen: ~0 rows (approximately)
/*!40000 ALTER TABLE `kampeerplaatsen` DISABLE KEYS */;
/*!40000 ALTER TABLE `kampeerplaatsen` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.klachten
CREATE TABLE IF NOT EXISTS `klachten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klant_id` int(11) DEFAULT NULL,
  `titel_klacht` varchar(60) NOT NULL,
  `bericht` text DEFAULT NULL,
  `verwerkt` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `klant_id` (`klant_id`),
  CONSTRAINT `klachten_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `accounts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.klachten: ~0 rows (approximately)
/*!40000 ALTER TABLE `klachten` DISABLE KEYS */;
/*!40000 ALTER TABLE `klachten` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.klanten
CREATE TABLE IF NOT EXISTS `klanten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(60) DEFAULT NULL,
  `achternaam` varchar(60) DEFAULT NULL,
  `account_id` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `FK__accounts` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.klanten: ~0 rows (approximately)
/*!40000 ALTER TABLE `klanten` DISABLE KEYS */;
INSERT INTO `klanten` (`id`, `voornaam`, `achternaam`, `account_id`) VALUES
	(12, 'Dirk', 'Schaafstra', 13),
	(13, 'Bjoreno', 'Degens', 14);
/*!40000 ALTER TABLE `klanten` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.nieuws
CREATE TABLE IF NOT EXISTS `nieuws` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(60) DEFAULT NULL,
  `bericht` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.nieuws: ~0 rows (approximately)
/*!40000 ALTER TABLE `nieuws` DISABLE KEYS */;
/*!40000 ALTER TABLE `nieuws` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.positie
CREATE TABLE IF NOT EXISTS `positie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `positie` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.positie: ~2 rows (approximately)
/*!40000 ALTER TABLE `positie` DISABLE KEYS */;
INSERT INTO `positie` (`id`, `positie`) VALUES
	(1, 'Medewerker\r\n'),
	(2, 'Manager'),
	(3, 'Directeur');
/*!40000 ALTER TABLE `positie` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.recensies
CREATE TABLE IF NOT EXISTS `recensies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klant_id` int(11) DEFAULT NULL,
  `bericht` text NOT NULL,
  `goedgekeurd` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `klant_id` (`klant_id`),
  CONSTRAINT `recensies_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `accounts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.recensies: ~0 rows (approximately)
/*!40000 ALTER TABLE `recensies` DISABLE KEYS */;
/*!40000 ALTER TABLE `recensies` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.weken
CREATE TABLE IF NOT EXISTS `weken` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `week` int(11) DEFAULT NULL,
  `jaar` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.weken: ~52 rows (approximately)
/*!40000 ALTER TABLE `weken` DISABLE KEYS */;
INSERT INTO `weken` (`id`, `week`, `jaar`) VALUES
	(1, 1, '2023'),
	(2, 2, '2023'),
	(3, 3, '2023'),
	(4, 4, '2023'),
	(5, 5, '2023'),
	(6, 6, '2023'),
	(7, 7, '2023'),
	(8, 8, '2023'),
	(9, 9, '2023'),
	(10, 10, '2023'),
	(11, 11, '2023'),
	(12, 12, '2023'),
	(13, 13, '2023'),
	(14, 14, '2023'),
	(15, 15, '2023'),
	(16, 16, '2023'),
	(17, 17, '2023'),
	(18, 18, '2023'),
	(19, 19, '2023'),
	(20, 20, '2023'),
	(21, 21, '2023'),
	(22, 22, '2023'),
	(23, 23, '2023'),
	(24, 24, '2023'),
	(25, 25, '2023'),
	(26, 26, '2023'),
	(27, 27, '2023'),
	(28, 28, '2023'),
	(29, 29, '2023'),
	(30, 30, '2023'),
	(31, 31, '2023'),
	(32, 32, '2023'),
	(33, 33, '2023'),
	(34, 34, '2023'),
	(35, 35, '2023'),
	(36, 36, '2023'),
	(37, 37, '2023'),
	(38, 38, '2023'),
	(39, 39, '2023'),
	(40, 40, '2023'),
	(41, 41, '2023'),
	(42, 42, '2023'),
	(43, 43, '2023'),
	(44, 44, '2023'),
	(45, 45, '2023'),
	(46, 46, '2023'),
	(47, 47, '2023'),
	(48, 48, '2023'),
	(49, 49, '2023'),
	(50, 50, '2023'),
	(51, 51, '2023'),
	(52, 52, '2023');
/*!40000 ALTER TABLE `weken` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.werknemers
CREATE TABLE IF NOT EXISTS `werknemers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `voornaam` varchar(60) NOT NULL,
  `achternaam` varchar(60) NOT NULL,
  `positie_id` int(11) DEFAULT 1,
  `account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `positie_id` (`positie_id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `FK_werknemers_accounts` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `werknemers_ibfk_1` FOREIGN KEY (`positie_id`) REFERENCES `positie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.werknemers: ~2 rows (approximately)
/*!40000 ALTER TABLE `werknemers` DISABLE KEYS */;
INSERT INTO `werknemers` (`id`, `username`, `voornaam`, `achternaam`, `positie_id`, `account_id`) VALUES
	(3, 'DirkEz', 'Dirk', 'Schaafstra', 1, 13),
	(4, 'Bjoreno', 'Bjoreno', 'Degens', 1, 14);
/*!40000 ALTER TABLE `werknemers` ENABLE KEYS */;

-- Dumping structure for table ppt_maasvallei.werknemers_rooster
CREATE TABLE IF NOT EXISTS `werknemers_rooster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `werknemer_id` int(11) DEFAULT NULL,
  `begin_tijd` time DEFAULT NULL,
  `eind_tijd` time DEFAULT NULL,
  `dag` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `werknemer_id` (`werknemer_id`),
  KEY `dag` (`dag`),
  KEY `week` (`week`),
  CONSTRAINT `FK_werknemers_rooster_dagen` FOREIGN KEY (`dag`) REFERENCES `dagen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_werknemers_rooster_weken` FOREIGN KEY (`week`) REFERENCES `weken` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `werknemers_rooster_ibfk_1` FOREIGN KEY (`werknemer_id`) REFERENCES `werknemers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ppt_maasvallei.werknemers_rooster: ~3 rows (approximately)
/*!40000 ALTER TABLE `werknemers_rooster` DISABLE KEYS */;
INSERT INTO `werknemers_rooster` (`id`, `werknemer_id`, `begin_tijd`, `eind_tijd`, `dag`, `week`) VALUES
	(3, 3, '14:41:02', '14:41:03', 1, 2),
	(4, 3, '14:41:02', '14:41:03', 1, 2),
	(5, 3, '11:07:20', '11:07:23', 4, 2),
	(6, NULL, '11:18:45', '11:18:47', 3, 2);
/*!40000 ALTER TABLE `werknemers_rooster` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
