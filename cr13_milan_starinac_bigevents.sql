-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 07:18 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr13_milan_starinac_bigevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` bigint(20) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `type`, `description`, `image`, `email`, `phone`, `address`, `url`, `capacity`, `dateTime`) VALUES
(2, 'The Prodigy', 'Music', 'Push it to the limit!!', 'https://cdn3.whatculture.com/images/2014/06/Prodigy-Firestarter.jpg', 'prodigy@gmail.com', '+43 664 2817606', 'Roland-Rainer-Platz 1, 1150 Wien', 'https://theprodigy.com/', 15000, '2019-10-01 22:00:00'),
(5, 'John Wick: Chapter 3 - Parabellum', 'Movie', 'Super-assassin John Wick is on the run after killing a member of the international assassin\'s guild, and with a $14 million price tag on his head - he is the target of hit men and women everywhere.', 'https://cdn.vox-cdn.com/thumbor/Dc8bBshDmxtKUCeTFovjt_pz_bM=/0x0:1777x999/1200x800/filters:focal(708x235:992x519)/cdn.vox-cdn.com/uploads/chorus_image/image/63756879/parabellumcover.0.jpg', 'millennium-kinowelt@constantinfilm.at', '+43 01 33760', 'Wehlistraße 66, 1200 Wien', 'https://www.johnwick.movie/', 200, '2019-08-08 21:00:00'),
(6, 'SK Rapid – SCR Altach', 'Sport', 'tipico Bundesliga 2019/20, 3. Runde', 'https://staticcdn.skrapid.at/id/141b9ef2b2732f0c0dc130b1dc354aad57c5710e/img/social-img.jpg', 'stadioncenter@skrapid.com', '+43 01 1234567', 'Gerhard-Hanappi-Platz 1, 1140 Wien', 'https://www.skrapid.at/', 20000, '2019-08-10 17:00:00'),
(7, 'Africa Twinis by Roland Düringer', 'Theather', 'Im Morgengrauen fällt am 1.1.1986 in Paris der Startschuss zum härtesten Wüstenrennen der Welt, der Rallye Paris-Dakar.', 'https://kabarettfruehling.at/images/Roland-Dueringer_Africa-Twinis_web_Andrea-Sojka.jpg', 'office@stadtsaal.com', '+43 01 909 2244', 'Mariahilfer Straße 81, 1050 Wien', 'http://www.stadtsaal.com/', 300, '2019-11-05 20:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
