-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2019 at 09:35 PM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 5.6.40-0+deb8u2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tads17_jonatas`
--

-- --------------------------------------------------------

--
-- Table structure for table `turma_models`
--

CREATE TABLE IF NOT EXISTS `turma_models` (
`id` int(10) unsigned NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `ativo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `turma_models`
--

INSERT INTO `turma_models` (`id`, `nome`, `ano`, `id_curso`, `ativo`, `created_at`, `updated_at`) VALUES
(2, 'TADS17', 2017, 1, 1, '2019-04-17 03:55:48', '2019-04-17 03:55:48'),
(3, 'TADS16', 2016, 1, 1, '2019-04-17 03:56:03', '2019-04-17 03:56:03'),
(4, 'TADS18', 2018, 1, 1, '2019-04-17 03:56:13', '2019-04-17 03:56:13'),
(5, 'TADS19', 2019, 1, 1, '2019-04-17 03:56:22', '2019-04-17 03:56:22'),
(6, 'INFO16', 2016, 4, 1, '2019-04-17 03:56:43', '2019-04-17 03:56:43'),
(7, 'INFO17', 2017, 4, 1, '2019-04-17 03:57:01', '2019-04-17 03:57:01'),
(8, 'INFO18', 2018, 4, 1, '2019-04-17 03:57:21', '2019-04-17 03:57:21'),
(9, 'INFO19', 2019, 4, 1, '2019-04-17 03:57:34', '2019-04-17 03:57:34'),
(10, 'FIS17', 2017, 7, 1, '2019-04-17 05:47:18', '2019-04-17 05:47:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `turma_models`
--
ALTER TABLE `turma_models`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `turma_models`
--
ALTER TABLE `turma_models`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`tads17_jonatas`@`%` EVENT `nome` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-08-27 08:37:50' ENDS '2018-08-27 08:42:50' ON COMPLETION PRESERVE ENABLE DO begin
	select * from ator;
end$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
