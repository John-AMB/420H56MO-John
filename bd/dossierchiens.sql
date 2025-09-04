-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2025 at 06:40 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dossierchiens`
--

-- --------------------------------------------------------

--
-- Table structure for table `chiens`
--

CREATE TABLE `chiens` (
  `id` int(11) NOT NULL,
  `nom_chien` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sexe` enum('male','femelle') COLLATE utf8mb4_general_ci NOT NULL,
  `date_de_naissance` date NOT NULL,
  `vet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chiens`
--

INSERT INTO `chiens` (`id`, `nom_chien`, `sexe`, `date_de_naissance`, `vet_id`) VALUES
(1, 'Charlie', 'male', '2025-07-01', 1),
(2, 'Duke', 'male', '2025-02-03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chiens`
--
ALTER TABLE `chiens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chiens_vet` (`vet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chiens`
--
ALTER TABLE `chiens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chiens`
--
ALTER TABLE `chiens`
  ADD CONSTRAINT `fk_chiens_vet` FOREIGN KEY (`vet_id`) REFERENCES `veterinaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
