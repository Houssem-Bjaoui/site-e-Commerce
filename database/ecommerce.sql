-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2024 at 06:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `email`, `mp`) VALUES
(1, 'houssem', 'houssem@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `createur`, `date_creation`, `date_modification`) VALUES
(10, 'categorie 1', 'description categorie 1', 1, '2024-10-07', '2024-10-07'),
(11, 'categorie 2', 'description categorie 2', 1, '2024-10-07', '2024-10-07'),
(15, 'categorie 3', 'description categorie 3', 0, '2024-10-10', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` float NOT NULL,
  `panier` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `quantite`, `total`, `panier`, `date_creation`, `date_modification`, `produit`) VALUES
(1, 5, 1500, 1, '2024-10-12', '0000-00-00', 8),
(2, 10, 2500, 2, '2024-10-12', '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `visiteur` int(11) NOT NULL,
  `total` float NOT NULL,
  `etat` varchar(50) NOT NULL DEFAULT '''en cours...''',
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id`, `visiteur`, `total`, `etat`, `date_creation`, `date_modification`) VALUES
(1, 5, 1500, 'valider', '2024-10-12', '0000-00-00'),
(2, 6, 2500, 'valider', '2024-10-12', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `categorie` int(11) NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `image`, `categorie`, `createur`, `date_creation`, `date_modification`) VALUES
(9, 'produit z', 'descriptoion produit z', 500, '77.jpg.jpg', 11, 1, '2024-10-07', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `createur` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `produit`, `quantite`, `createur`, `date_creation`, `date_modification`) VALUES
(1, '9', 0, '1', '2024-10-07', '0000-00-00'),
(2, '10', 20, '1', '2024-10-07', '0000-00-00'),
(3, '11', 0, '<br />\r\n<b>Warning</b>:  Undefined array key ', '2024-10-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `mp` varchar(255) NOT NULL,
  `etat` int(11) DEFAULT 0,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `email`, `nom`, `prenom`, `mp`, `etat`, `date_creation`, `date_modification`, `telephone`) VALUES
(5, 'ahmed@gmail.com', 'ahmed', 'gharbi', 'e10adc3949ba59abbe56e057f20f883e', 1, '0000-00-00', '0000-00-00', 789456),
(6, 'test@test', 'test', 'test', 'e10adc3949ba59abbe56e057f20f883e', 1, '0000-00-00', '0000-00-00', 789456),
(8, 'jhon@gmail.com', 'jhon', 'doe', 'e1f60ee64481d586a7b9897e89571852', 1, '0000-00-00', '0000-00-00', 12345678),
(9, 'adem@gmail.com', 'adem', 'adem', '1bce20d834be27ad65984ff50bd93be6', 1, '0000-00-00', '0000-00-00', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
