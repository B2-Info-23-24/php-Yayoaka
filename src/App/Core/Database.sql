-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table carouledb. brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_brand` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table carouledb.brand : ~10 rows (environ)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `name_brand`) VALUES
	(2, 'Renault'),
	(24, 'Nissan'),
	(25, 'Volvo'),
	(26, 'Tesla'),
	(27, 'Fiat'),
	(28, 'Peugeot'),
	(29, 'Volkswagen'),
	(30, 'Kia'),
	(31, 'Ferrari'),
	(32, 'Hyundai');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Listage de la structure de la table carouledb. color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_color` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table carouledb.color : ~7 rows (environ)
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id`, `name_color`) VALUES
	(8, 'Bleu turquoise'),
	(11, 'Rouge'),
	(12, 'Blanc'),
	(13, 'Gris'),
	(14, 'Noir'),
	(15, 'Noir mat'),
	(16, 'Bleu marine');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Listage de la structure de la table carouledb. comment
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vehicle` int(11) NOT NULL,
  `comment` text NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table carouledb.comment : ~0 rows (environ)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Listage de la structure de la table carouledb. favorite
CREATE TABLE IF NOT EXISTS `favorite` (
  `id_user` int(11) NOT NULL,
  `id_vehicle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table carouledb.favorite : ~0 rows (environ)
/*!40000 ALTER TABLE `favorite` DISABLE KEYS */;
/*!40000 ALTER TABLE `favorite` ENABLE KEYS */;

-- Listage de la structure de la table carouledb. places
CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nb_places` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table carouledb.places : ~6 rows (environ)
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` (`id`, `nb_places`) VALUES
	(2, 4),
	(3, 7),
	(6, 2),
	(7, 3),
	(8, 5),
	(9, 9);
/*!40000 ALTER TABLE `places` ENABLE KEYS */;

-- Listage de la structure de la table carouledb. reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vehicle` int(11) NOT NULL,
  `date_begin` date NOT NULL DEFAULT '1970-01-01',
  `date_end` date NOT NULL DEFAULT '1970-01-01',
  `nb_day` int(11) NOT NULL DEFAULT '0',
  `total_price` float NOT NULL DEFAULT '0',
  `date_reservation` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table carouledb.reservation : ~14 rows (environ)
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` (`id`, `state`, `id_user`, `id_vehicle`, `date_begin`, `date_end`, `nb_day`, `total_price`, `date_reservation`) VALUES
	(1, 1, 1, 9, '2023-12-08', '2023-12-18', 3, 150, '2023-12-03 18:20:25'),
	(2, 1, 1, 9, '2024-01-01', '2024-01-06', 3, 720, '1970-01-01 00:00:00'),
	(14, 0, 1, 11, '2024-01-09', '2024-01-12', 4, 480, '2023-12-06 18:49:34'),
	(15, 0, 1, 11, '2023-12-16', '2023-12-18', 3, 360, '2023-12-06 18:51:52'),
	(16, 0, 1, 11, '2023-12-25', '2023-12-27', 3, 360, '2023-12-06 18:59:39'),
	(17, 0, 1, 11, '2024-01-19', '2024-01-20', 2, 240, '2023-12-06 19:03:27'),
	(18, 0, 1, 11, '2024-01-22', '2024-01-25', 4, 480, '2023-12-06 19:03:27'),
	(19, 0, 1, 9, '2023-12-02', '2023-12-02', 1, 60, '2023-12-06 21:51:51'),
	(20, 0, 1, 9, '2023-12-26', '2023-12-27', 2, 120, '2023-12-06 21:51:51'),
	(21, 0, 1, 10, '2023-12-11', '2023-12-13', 3, 165, '2023-12-06 22:41:57'),
	(22, 0, 1, 10, '2023-12-16', '2023-12-17', 2, 110, '2023-12-06 22:41:57'),
	(23, 1, 1, 11, '2023-12-20', '2023-12-22', 3, 360, '2023-12-06 23:05:51'),
	(24, 1, 1, 8, '2023-12-18', '2023-12-20', 3, 300, '2023-12-07 00:06:47'),
	(25, 0, 1, 8, '2023-12-23', '2023-12-24', 2, 200, '2023-12-07 00:06:47');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;

-- Listage de la structure de la table carouledb. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `nb_phone` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table carouledb.user : ~0 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `admin`, `name`, `firstname`, `nb_phone`, `mail`, `password`) VALUES
	(1, 1, 'lucas', 'Studer', '061122334455', 'luctest@yopmail.com', '74b87337454200d4d33f80c4663dc5e5');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Listage de la structure de la table carouledb. vehicle
CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_model` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `description_vehicle` text NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_nb_place` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL DEFAULT '',
  `lat` float NOT NULL DEFAULT '0',
  `lng` float NOT NULL DEFAULT '0',
  `city` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table carouledb.vehicle : ~5 rows (environ)
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` (`id`, `name_model`, `price`, `description_vehicle`, `id_brand`, `id_nb_place`, `id_color`, `photo`, `lat`, `lng`, `city`) VALUES
	(7, 'Qashai', 90, 'More compact and more aerodynamic than the X-Trail, the Qashqai (type J10) is sold in Europe from spring 2007 and is called Dualis in Japan and Australia.<br />In a redefined range, it replaces the Almera, as well as the Primera', 24, 3, 11, 'qashqai.jpg', 43.2557, 3.56465, 'Paris'),
	(8, 'Kadjar', 100, 'Compact SUV from the French car manufacturer Renault presented in February 2015 and marketed from 2015 to 2022. It uses the CMF-C/D modular technical platform developed by Renault-Nissan, used in particular by the Nissan Qashqai', 2, 2, 16, '', 0, 0, ''),
	(9, '308', 60, 'Compact, feline, sensational. Discover the new face of Peugeot.', 28, 8, 14, '', 0, 0, ''),
	(10, 'Picanto', 55, 'Discover the Kia Picanto, city car, fun, and dynamic by nature. This city car has the largest trunk in its category and a very comfortable interior.', 30, 6, 12, '', 0, 0, ''),
	(11, 'Austral', 120, 'With its hybrid engine and 200 hp, Renault Austral E-Tech full hybrid accompanies you on your professional trips.', 2, 8, 12, '', 0, 0, '');
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
