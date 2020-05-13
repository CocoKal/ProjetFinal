-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 mai 2020 à 09:25
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `check_in` timestamp NOT NULL,
  `check_out` timestamp NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `customer_id` (`user_id`),
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `room_id`, `booking_date`, `check_in`, `check_out`, `payment_status`) VALUES
(6, 16, 60, '2020-05-11 15:37:17', '2020-05-11 08:00:00', '2020-05-18 08:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `complaint` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int(10) NOT NULL AUTO_INCREMENT,
  `hotel_localisation_country` varchar(20) NOT NULL,
  `hotel_localisation_city` varchar(20) NOT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_localisation_country`, `hotel_localisation_city`) VALUES
(1, 'Maroc', 'Marrakech'),
(2, 'France', 'Paris'),
(3, 'Emirat Arabes Unis', 'Dubai'),
(4, 'Etats Unis', 'New York'),
(5, 'Italie', 'Rome'),
(6, 'Royaume Uni', 'Londres'),
(7, 'Thaïlande', 'Bangkok'),
(8, 'Indonésie', 'Bali'),
(9, 'Pays-Bas', 'Amsterdam'),
(10, 'Brésil', 'Rio de Janeiro');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `room_type_id` (`room_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=438 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `room_no`, `hotel_id`) VALUES
(18, 1, '101', 1),
(19, 1, '102', 1),
(20, 1, '103', 1),
(29, 2, '201', 1),
(30, 2, '202', 1),
(31, 2, '203', 1),
(50, 3, '301', 1),
(55, 4, '401', 1),
(56, 4, '402', 1),
(60, 1, '101', 2),
(61, 1, '102', 2),
(62, 1, '103', 2),
(71, 2, '201', 2),
(72, 2, '202', 2),
(73, 2, '203', 2),
(92, 3, '301', 2),
(97, 4, '401', 2),
(98, 4, '402', 2),
(102, 1, '101', 3),
(103, 1, '102', 3),
(104, 1, '103', 3),
(113, 2, '201', 3),
(114, 2, '202', 3),
(115, 2, '203', 3),
(134, 3, '301', 3),
(139, 4, '401', 3),
(140, 4, '402', 3),
(144, 1, '101', 4),
(145, 1, '102', 4),
(146, 1, '103', 4),
(155, 2, '201', 4),
(156, 2, '202', 4),
(157, 2, '203', 4),
(176, 3, '301', 4),
(181, 4, '401', 4),
(182, 4, '402', 4),
(186, 1, '101', 5),
(187, 1, '102', 5),
(188, 1, '103', 5),
(197, 2, '201', 5),
(198, 2, '202', 5),
(199, 2, '203', 5),
(218, 3, '301', 5),
(223, 4, '401', 5),
(224, 4, '402', 5),
(228, 1, '101', 6),
(229, 1, '102', 6),
(230, 1, '103', 6),
(239, 2, '201', 6),
(240, 2, '202', 6),
(241, 2, '203', 6),
(260, 3, '301', 6),
(265, 4, '401', 6),
(266, 4, '402', 6),
(270, 1, '101', 7),
(271, 1, '102', 7),
(272, 1, '103', 7),
(281, 2, '201', 7),
(282, 2, '202', 7),
(283, 2, '203', 7),
(302, 3, '301', 7),
(307, 4, '401', 7),
(308, 4, '402', 7),
(312, 1, '101', 8),
(313, 1, '102', 8),
(314, 1, '103', 8),
(323, 2, '201', 8),
(324, 2, '202', 8),
(325, 2, '203', 8),
(344, 3, '301', 8),
(349, 4, '401', 8),
(350, 4, '402', 8),
(354, 1, '101', 9),
(355, 1, '102', 9),
(356, 1, '103', 9),
(365, 2, '201', 9),
(366, 2, '202', 9),
(367, 2, '203', 9),
(386, 3, '301', 9),
(391, 4, '401', 9),
(392, 4, '402', 9),
(396, 1, '101', 10),
(397, 1, '102', 10),
(398, 1, '103', 10),
(407, 2, '201', 10),
(408, 2, '202', 10),
(409, 2, '203', 10),
(428, 3, '301', 10),
(433, 4, '401', 10),
(434, 4, '402', 10);

-- --------------------------------------------------------

--
-- Structure de la table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
CREATE TABLE IF NOT EXISTS `room_type` (
  `room_type_id` int(10) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `got_tel` tinyint(1) NOT NULL,
  `got_tv` tinyint(1) NOT NULL,
  `price` int(10) NOT NULL,
  `nbr_bed` int(10) NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type`, `got_tel`, `got_tv`, `price`, `nbr_bed`) VALUES
(1, 'Standard', 0, 0, 1000, 1),
(2, 'Tourisme', 1, 0, 1500, 1),
(3, 'Confort', 1, 1, 3000, 2),
(4, 'Luxe', 1, 1, 4000, 2);

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `staff_type_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`emp_id`),
  KEY `staff_type_id` (`staff_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `staff_type`
--

DROP TABLE IF EXISTS `staff_type`;
CREATE TABLE IF NOT EXISTS `staff_type` (
  `staff_type_id` int(10) NOT NULL,
  `staff_type` varchar(100) NOT NULL,
  PRIMARY KEY (`staff_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `staff_type`) VALUES
(1, 'Manager'),
(2, 'Cleaning'),
(3, 'Reception'),
(4, 'Cook'),
(5, 'Waiter');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `email`, `password`, `created_at`) VALUES
(15, 'Müller', 'Gunter', 'gunter.muller@gmail.com', '$2y$10$Cy4tZTOboEFYCM7.QUOTbO22oodbHyL/SAYwHKwEAj2.363AtLLLW', '2020-05-11 14:48:21'),
(16, 'Wang', 'Su', 'su.wang@gmail.com', '$2y$10$iimZD68UNYJA08PrT9P6y.16i.bMFNvvBYY4vGTP7WdNo26Pi531K', '2020-05-11 14:48:47'),
(17, 'Rodriguez', 'Julia', 'julia.rodriguez@gmail.com', '$2y$10$zLqntIlhZqf5ZI2oo00yluCFc0g7l/Xxe7gGYY.FiJ71reVkjDt8K', '2020-05-11 14:49:11'),
(18, 'Ivanova', 'Vladimir', 'vladimir.ivanova@gmail.com', '$2y$10$SbuvblZvJj.apupwfrPjh.CD8oRi9DHk5HWHqkvlmrC6m6vH.wANu', '2020-05-11 14:49:39'),
(19, 'Smith', 'John', 'john.smith@gmail.com', '$2y$10$fq0FFfNcvNKErRSFSQ6yLeD111IDZKp0fN4UP6snNfNuvlV7v3lzi', '2020-05-11 14:50:04'),
(20, 'Garcia', 'Sergent', 'sergent.garcia@gmail.com', '$2y$10$gv2G70KhJmEtLKscdd.QCOre4S1xVS/PoN9wx.wkVFQtGT8fZyUNu', '2020-05-11 14:50:27'),
(21, 'Satõ', 'Sora', 'sora.sato@gmail.com', '$2y$10$BYFEcX/Zlk2Bd/a68Oe8tufyK7D/ud6tyf.TnPaEPAmUmOuTCz0eu', '2020-05-11 14:51:35'),
(22, 'Durand', 'Mathieu', 'mathieu.durand@gmail.com', '$2y$10$u84sf.HDWGVkpaFwPv5l1e2Fq8qd1xbxEvuJptYPhF8FJkYIxgWEO', '2020-05-11 14:51:56'),
(23, 'Da Silva', 'Rafael', 'rafael.dasilva@gmail.com', '$2y$10$rSxYOEjIitnnRxC4ldN5PuMg.MLEmE0mwPhYbiAcsiyGwrPCTm/O.', '2020-05-11 14:52:17'),
(24, 'Devi', 'Rajesh', 'rajesh.devi@gmail.com', '$2y$10$uLPIfc59RWMWB/Vzm0bMP.tGKSeKWWe0tRIbEKitx5Oofh4oP/Iyy', '2020-05-11 14:52:38'),
(25, 'test', 'test', 'test@test.com', '$2y$10$hKSY8RQzSEipkGBiSlr6dOAPZ4Dgf8PM9ee7duVHj2zncZqorZ5k.', '2020-05-11 14:53:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
