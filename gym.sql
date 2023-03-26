-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 12 Oca 2023, 23:24:13
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `gym`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `quota` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `start_time`, `end_time`, `created_at`, `quota`) VALUES
(6, 'Premium Membership', '40', '2023-01-21 00:00:00', '2023-01-18 00:00:00', '2023-01-06 17:06:24', 0),
(7, 'Platinium Membership', '60', '2023-01-21 00:00:00', '2023-01-26 00:00:00', '2023-01-06 17:12:08', 0),
(8, 'Gold Membership', '50', '2023-01-22 00:00:00', '2023-01-24 00:00:00', '2023-01-06 17:13:21', 1),
(9, 'Ulta premium membership', '100', '2023-01-29 00:00:00', '2023-01-24 00:00:00', '2023-01-06 17:13:46', 0),
(11, 'Normal Membership', '20', '2023-01-03 00:00:00', '2023-01-27 00:00:00', '2023-01-13 00:21:11', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `membership_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `surname`, `dob`, `password`, `created_at`, `membership_id`) VALUES
(1, 'dodo2', 'dogukan', 'atis', '2023-01-12 00:00:00', '$2y$10$Fa1pRzUfxyYCwYaoN77UkemFpuLKn31fy06BnTmBzHMkI4USgWZyC', '2023-01-06 16:33:38', 8),
(2, 'tansu1', 'tansu', 'a', '1998-01-11 00:00:00', '$2y$10$tweuAOrWESyV6j4beXwZHuzXd3BeH93q34nx.cbe3Tr3CGUNeXXmS', '2023-01-11 22:41:43', 9);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
