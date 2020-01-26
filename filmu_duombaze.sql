-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Sau 26 d. 20:19
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmu_duombaze`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lentele_filmai`
--

CREATE TABLE `lentele_filmai` (
  `id` int(30) NOT NULL,
  `pavadinimas` varchar(45) DEFAULT NULL,
  `aprasymas` varchar(200) DEFAULT NULL,
  `metai` varchar(45) DEFAULT NULL,
  `rezisierius` varchar(45) DEFAULT NULL,
  `imdb` varchar(45) DEFAULT NULL,
  `genre_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `lentele_filmai`
--

INSERT INTO `lentele_filmai` (`id`, `pavadinimas`, `aprasymas`, `metai`, `rezisierius`, `imdb`, `genre_id`) VALUES
(1, 'Ledo salis', 'Viena laukiamiausiu animaciniu istoriju sugrizta su nauju pasakojimu apie draugyste ir meile.', '2019', 'Chris Buck, Jennifer Lee', '8', '1'),
(2, 'Midvejaus musis', 'Midvejaus juru musis, ivykes 1942 m. birzelio 4-7 dienomis Ramiame vandenyne, istoriku laikomas vienu svarbiausiu momentu, nulemusiu Sajungininku pergale Antrajame pasauliniame kare.', '2019', 'Roland', '7.5', '1'),
(3, 'Kolibrio projektas', 'Labai retai toks mokslinis terminas kaip auksto daznio prekyba yra panaudojamas pristatant veiksmo trileri, taciau filmui Kolibrio projektas jis puikiai tinka.', '2018', 'Kim', '6.2', '2'),
(12, 'Frozen', 'Frozen', '2007', 'Frozen 123', '8.6', '1'),
(14, 'Mazosios moterys', 'Amerikietes Louisos May Alcott pries pusantro simto metu parasytas romanas „Mazosios moterys“ laikomas tikra savo zanro klasika ir lyginamas su seseru Bronte ar Dzeines Osten kuryba.', '2019', 'Greta Gerwig', '9', '2'),
(15, 'Daktaras miegas', 'Stiveno Kingo „Daktaras Miegas“ pasakoja Denio Torenso istorija – vyro, kuris pries 40 metu, dar budamas berniukas, nuo pasaulio atkirstame viesbutyje isgyveno siaubinga žiema filme „Svytejimas“.', '2019', 'Mike Flanagan', '7.5', '2');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `lentele_zanrai`
--

CREATE TABLE `lentele_zanrai` (
  `id` int(30) NOT NULL,
  `pavadinimas` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `lentele_zanrai`
--

INSERT INTO `lentele_zanrai` (`id`, `pavadinimas`) VALUES
(1, 'Komedijos'),
(2, 'Siaubo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lentele_filmai`
--
ALTER TABLE `lentele_filmai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lentele_zanrai`
--
ALTER TABLE `lentele_zanrai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lentele_filmai`
--
ALTER TABLE `lentele_filmai`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lentele_zanrai`
--
ALTER TABLE `lentele_zanrai`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
