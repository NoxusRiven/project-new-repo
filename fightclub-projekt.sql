-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lip 08, 2024 at 03:25 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fightclub-projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glosowanie`
--

CREATE TABLE `glosowanie` (
  `id` int(10) UNSIGNED NOT NULL,
  `osoba1` varchar(50) NOT NULL,
  `osoba2` varchar(50) NOT NULL,
  `liczbaGlosow1` int(11) NOT NULL,
  `liczbaGlosow2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `glosowanie`
--

INSERT INTO `glosowanie` (`id`, `osoba1`, `osoba2`, `liczbaGlosow1`, `liczbaGlosow2`) VALUES
(1, 'Mike Tyson', 'Jake Paul', 1, 0),
(2, 'llll', 'oooo', 0, 1),
(3, 'Damian', 'Maciek', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id` int(10) UNSIGNED NOT NULL,
  `idWpisu` int(10) UNSIGNED NOT NULL,
  `nick` varchar(50) NOT NULL,
  `tresc` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lista_glosujacych`
--

CREATE TABLE `lista_glosujacych` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUzytkownika` int(10) UNSIGNED NOT NULL,
  `idGlosowania` int(10) UNSIGNED NOT NULL,
  `glosowalNa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `lista_glosujacych`
--

INSERT INTO `lista_glosujacych` (`id`, `idUzytkownika`, `idGlosowania`, `glosowalNa`) VALUES
(10, 1, 1, 'Mike Tyson'),
(11, 1, 2, 'oooo');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osiagniecia`
--

CREATE TABLE `osiagniecia` (
  `id` int(11) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `osiagniecia`
--

INSERT INTO `osiagniecia` (`id`, `nick`, `title`, `image`, `video_url`, `created_at`) VALUES
(5, 'damianW', 'aaaaa', 'Achivment_Images/puchar.jfif', '', '2024-06-20 09:05:12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rola` varchar(50) NOT NULL DEFAULT 'user',
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `rola`, `data`) VALUES
(1, 'damianW', '2e8cc6a4d10ab687a430553e18c60356', 'damianmdxvpc18@gmail.com', 'user', '2024-06-03 12:46:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wpisy`
--

CREATE TABLE `wpisy` (
  `id` int(10) UNSIGNED NOT NULL,
  `nick` varchar(50) NOT NULL,
  `naglowek` varchar(50) NOT NULL,
  `tresc` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `wpisy`
--

INSERT INTO `wpisy` (`id`, `nick`, `naglowek`, `tresc`, `data`) VALUES
(9, 'test', 'lllllllllllllllllllllllllllllllll', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2024-07-03 19:53:14'),
(12, 'damianW', 'przykladowy wpis 2', '', '2024-07-03 21:52:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wydarzenia`
--

CREATE TABLE `wydarzenia` (
  `id` int(10) UNSIGNED NOT NULL,
  `zdjecie` varchar(50) NOT NULL,
  `tytul` varchar(50) NOT NULL,
  `data` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `wydarzenia`
--

INSERT INTO `wydarzenia` (`id`, `zdjecie`, `tytul`, `data`) VALUES
(11, 'jake x Tyson.jpg', 'Walka Mike Tyson vs Jake Paul', '20 lipca 2024');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `glosowanie`
--
ALTER TABLE `glosowanie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idWpisu` (`idWpisu`);

--
-- Indeksy dla tabeli `lista_glosujacych`
--
ALTER TABLE `lista_glosujacych`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUzytkownika` (`idUzytkownika`),
  ADD KEY `idGlosowania` (`idGlosowania`);

--
-- Indeksy dla tabeli `osiagniecia`
--
ALTER TABLE `osiagniecia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wpisy`
--
ALTER TABLE `wpisy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wydarzenia`
--
ALTER TABLE `wydarzenia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glosowanie`
--
ALTER TABLE `glosowanie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lista_glosujacych`
--
ALTER TABLE `lista_glosujacych`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `osiagniecia`
--
ALTER TABLE `osiagniecia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wpisy`
--
ALTER TABLE `wpisy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wydarzenia`
--
ALTER TABLE `wydarzenia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`idWpisu`) REFERENCES `wpisy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lista_glosujacych`
--
ALTER TABLE `lista_glosujacych`
  ADD CONSTRAINT `lista_glosujacych_ibfk_1` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_glosujacych_ibfk_2` FOREIGN KEY (`idGlosowania`) REFERENCES `glosowanie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
