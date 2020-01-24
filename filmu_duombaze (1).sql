-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Sau 24 d. 14:03
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
(1, 'Ledo salis', 'Viena laukiamiausiu animaciniu istoriju sugrizta su nauju pasakojimu apie draugyste ir meile.', '2019', 'Chris Buck, Jennifer Lee', '7.2', '1'),
(2, 'Midvejaus musis', 'Midvejaus juru musis, ivykes 1942 m. birzelio 4-7 dienomis Ramiame vandenyne, istoriku laikomas vienu svarbiausiu momentu, nulemusiu Sajungininku pergale Antrajame pasauliniame kare.', '2019', 'Roland Emmerich', '6.9', '2'),
(3, 'Kolibrio projektas', 'Labai retai toks mokslinis terminas kaip auksto daznio prekyba yra panaudojamas pristatant veiksmo trileri, taciau filmui Kolibrio projektas jis puikiai tinka.', '2018', 'Kim Nguyen', '6.2', '2'),
(4, NULL, 'filmas', '2012', 'filmas', '10', '1'),
(5, 'filmas', 'filmas', '2011', 'filmas', '8.2', '1'),
(6, 'MovieAdd', 'Unknown', '2004', 'Unknown', '10', '2'),
(7, 'Juodoji zudike', 'Vienisa motina bijo del savo ir dukters gyvybiu, kai jos taps serijinio zudiko taikiniais.', '2018', 'Adrian Langley', '4.3', NULL),
(8, 'MovieAdd', 'Unknown', '2019', 'Unknown', '10', NULL),
(9, 'rthrth', 'trhtrh', '2005', 'thrtrh', '8.2', NULL),
(10, 'Frozen', 'Unknown', '2006', 'Unknown', '8.2', NULL),
(11, 'Frozen', 'Unknown', '2006', 'Unknown', '8.2', '<br />\r\n<b>Notice</b>:  Undefined variable: l'),
(12, 'Frozen', 'Frozen', '2007', 'Frozen', '8.2', '1');

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lentele_zanrai`
--
ALTER TABLE `lentele_zanrai`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
