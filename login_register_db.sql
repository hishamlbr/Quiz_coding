-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 02 jan. 2024 à 20:40
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `login_register_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pylevel` int(11) NOT NULL,
  `cpplevel` int(11) NOT NULL,
  `javalevel` int(11) NOT NULL,
  `weblevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `pylevel`, `cpplevel`, `javalevel`, `weblevel`) VALUES
(42, 'Hicham LABRAHMI', 'labrahmimosstafa@gmail.com', 'e1671797c52e15f763380b45e841ec32', 5, 0, 0, 0),
(63, 'Oumaima LAZZAR', 'ouma@gmail.com', 'ff312f3eb1d94ce46d4f664cf666e67d', 1, 2, 0, 3),
(64, 'adminn', 'lbrahmihicham50@gmail.com', '2510c39011c5be704182423e3a695e91', 0, 0, 0, 0),
(66, 'GASMI Sarra', 'gasmi@gmail.com', '0e59b6795555ca89ce7bd94bff9aa865', 3, 1, 2, 2),
(67, 'BOURUIZE Mohammed', 'brs@ump.ac.ma', 'ca01ba434cb157dced11b9f0ba552096', 1, 1, 2, 2),
(68, 'HIZOUN Manal', 'manel@gmail.com', '95ab6cdfaa9d646f83061a936bfb8996', 2, 3, 1, 0),
(69, 'ESIYOURI Yamina', 'yamina@gmail.com', 'd24f1433cf50ad4a3399ea5d44022286', 0, 0, 0, 0),
(70, 'MBARKI Ayyoub', 'a-mbarki@gmail.com', '46ca7b48081c87e87753c06af8cccebf', 2, 2, 2, 2),
(71, 'ZENIBLA Mohamed', 'zn@gmail.com', '19b20303333518e0f43f918d6259ac1f', 1, 2, 1, 2),
(72, 'AYYADI Imane', 'imaneayyadi@gmail.com', 'a34d79c40da10ad1f1ba183d1f7a5458', 3, 2, 1, 0),
(73, 'TAHA LAHMAMY', 'taha123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 0, 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
