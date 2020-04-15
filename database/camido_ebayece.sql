-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-camido.alwaysdata.net
-- Generation Time: Apr 15, 2020 at 12:08 PM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camido_ebayece`
--

-- --------------------------------------------------------

--
-- Table structure for table `Acheteur`
--

CREATE TABLE `Acheteur` (
  `id_a` int(11) NOT NULL,
  `pseudo_a` varchar(255) NOT NULL,
  `email_a` varchar(255) NOT NULL,
  `nom_a` varchar(255) NOT NULL,
  `prenom_a` varchar(255) NOT NULL,
  `adresse_1` varchar(255) NOT NULL,
  `adresse_2` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `numero_tel` varchar(14) NOT NULL,
  `num_carte` varchar(255) NOT NULL,
  `type_de_carte` varchar(255) NOT NULL,
  `nom_carte` varchar(255) NOT NULL,
  `date_expi` varchar(255) NOT NULL,
  `code_securite` varchar(255) NOT NULL,
  `accepter_conditions` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Acheteur`
--

INSERT INTO `Acheteur` (`id_a`, `pseudo_a`, `email_a`, `nom_a`, `prenom_a`, `adresse_1`, `adresse_2`, `ville`, `code_postal`, `pays`, `numero_tel`, `num_carte`, `type_de_carte`, `nom_carte`, `date_expi`, `code_securite`, `accepter_conditions`) VALUES
(0, 'BobbyMcDoug', 'bobbymcdoug@edu.ece.fr', 'MCDOUG', 'ANTOINE', '13 rue de la Palmeraie', '', 'PARIS', '75000', 'FRANCE', '06 06 06 06 06', '1111 1111 1111 1111', 'VISA', 'MCDOUG', '09/20', '397', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `id_admin` int(11) NOT NULL,
  `pseudo_admin` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `nom_admin` varchar(255) NOT NULL,
  `prenom_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Administrateur`
--

INSERT INTO `Administrateur` (`id_admin`, `pseudo_admin`, `email_admin`, `nom_admin`, `prenom_admin`) VALUES
(1, 'camido', 'camille.laruel@edu.ece.fr', 'LARUEL', 'CAMILLE'),
(2, 'antoine', 'antoine.bourgeois@edu.ece.fr', 'BOURGEOIS', 'ANTOINE');

-- --------------------------------------------------------

--
-- Table structure for table `Affiliation Acheteur-Item`
--

CREATE TABLE `Affiliation Acheteur-Item` (
  `id_a` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Affiliation Acheteur-Item`
--

INSERT INTO `Affiliation Acheteur-Item` (`id_a`, `id_item`) VALUES
(0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Enchere`
--

CREATE TABLE `Enchere` (
  `id_e` int(11) NOT NULL,
  `offre` int(11) NOT NULL,
  `id_a` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Enchere`
--

INSERT INTO `Enchere` (`id_e`, `offre`, `id_a`, `id_item`) VALUES
(3, 300, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `id_item` int(11) NOT NULL,
  `nom_i` varchar(255) NOT NULL,
  `description_i` varchar(255) NOT NULL,
  `photo_i` varchar(255) NOT NULL,
  `video_i` varchar(255) NOT NULL,
  `prix` int(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `type_vente` varchar(255) NOT NULL,
  `id_v` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `vendu` tinyint(1) NOT NULL,
  `date_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`id_item`, `nom_i`, `description_i`, `photo_i`, `video_i`, `prix`, `categorie`, `type_vente`, `id_v`, `id_admin`, `vendu`, `date_fin`) VALUES
(1, 'montre', 'jolie montre', 'items/montre.jpg', '', 200, 'Accessoires VIP', 'enchère', 1, NULL, 0, '2020-04-16 00:00:00'),
(4, 'xx', 'xxq', 'ss', 's', 1, 's', 's', 1, NULL, 1, '2020-04-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `MeilleureOffre`
--

CREATE TABLE `MeilleureOffre` (
  `id_offre` int(11) NOT NULL,
  `proposition_a` varchar(255) NOT NULL,
  `proposition_v` varchar(255) NOT NULL,
  `nb_prop` varchar(255) NOT NULL,
  `accepter` tinyint(1) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id_a` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MeilleureOffre`
--

INSERT INTO `MeilleureOffre` (`id_offre`, `proposition_a`, `proposition_v`, `nb_prop`, `accepter`, `message`, `id_a`, `id_item`) VALUES
(1, '25', '50', '2', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Vendeur`
--

CREATE TABLE `Vendeur` (
  `id_v` int(11) NOT NULL,
  `pseudo_v` varchar(255) NOT NULL,
  `email_v` varchar(255) NOT NULL,
  `nom_v` varchar(255) NOT NULL,
  `photo_v` varchar(255) NOT NULL,
  `image_fond` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Vendeur`
--

INSERT INTO `Vendeur` (`id_v`, `pseudo_v`, `email_v`, `nom_v`, `photo_v`, `image_fond`) VALUES
(1, 'ranoush', 'rania.laouar@edu.ece.fr', 'LAOUAR', 'vendeurs/rania.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Acheteur`
--
ALTER TABLE `Acheteur`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `Affiliation Acheteur-Item`
--
ALTER TABLE `Affiliation Acheteur-Item`
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_i` (`id_item`);

--
-- Indexes for table `Enchere`
--
ALTER TABLE `Enchere`
  ADD PRIMARY KEY (`id_e`),
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_i` (`id_item`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `item-vendeur` (`id_v`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `MeilleureOffre`
--
ALTER TABLE `MeilleureOffre`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_i` (`id_item`);

--
-- Indexes for table `Vendeur`
--
ALTER TABLE `Vendeur`
  ADD PRIMARY KEY (`id_v`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Acheteur`
--
ALTER TABLE `Acheteur`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Enchere`
--
ALTER TABLE `Enchere`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `MeilleureOffre`
--
ALTER TABLE `MeilleureOffre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Vendeur`
--
ALTER TABLE `Vendeur`
  MODIFY `id_v` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Affiliation Acheteur-Item`
--
ALTER TABLE `Affiliation Acheteur-Item`
  ADD CONSTRAINT `Affiliation Acheteur-Item_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `Item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acheteur-affi` FOREIGN KEY (`id_a`) REFERENCES `Acheteur` (`id_a`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Enchere`
--
ALTER TABLE `Enchere`
  ADD CONSTRAINT `acheteur-enchere` FOREIGN KEY (`id_a`) REFERENCES `Acheteur` (`id_a`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item-enchere` FOREIGN KEY (`id_item`) REFERENCES `Item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Item`
--
ALTER TABLE `Item`
  ADD CONSTRAINT `item-admin` FOREIGN KEY (`id_admin`) REFERENCES `Administrateur` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item-vendeur` FOREIGN KEY (`id_v`) REFERENCES `Vendeur` (`id_v`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `MeilleureOffre`
--
ALTER TABLE `MeilleureOffre`
  ADD CONSTRAINT `MeilleureOffre_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `Item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acheteur-offre` FOREIGN KEY (`id_a`) REFERENCES `Acheteur` (`id_a`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
