-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 21 Δεκ 2021 στις 13:45:54
-- Έκδοση διακομιστή: 10.4.14-MariaDB
-- Έκδοση PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `spitogatos`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `aggelia`
--

CREATE TABLE `aggelia` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `area` varchar(255) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `tetragonika` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `aggelia`
--

INSERT INTO `aggelia` (`id`, `uid`, `price`, `area`, `availability`, `tetragonika`) VALUES
(24, 2, 677, 'Αθήνα', 'ενοικίαση', 765),
(26, 3, 600, 'Πάτρα', 'πώληση', 567);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `usertype` varchar(60) NOT NULL DEFAULT 'user',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `usertype`, `status`) VALUES
(1, 'admin', '12345', 'admin', 1),
(2, 'user1', '54321', 'user', 1),
(3, 'user2', '112233', 'user', 1),
(4, 'user3', '55555', 'user', 1);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `aggelia`
--
ALTER TABLE `aggelia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `aggelia`
--
ALTER TABLE `aggelia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT για πίνακα `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `aggelia`
--
ALTER TABLE `aggelia`
  ADD CONSTRAINT `uid` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
