-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Sty 2020, 19:24
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `magazyn`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `alejka`
--

CREATE TABLE `alejka` (
  `id_alejka` int(11) NOT NULL,
  `alejka` int(11) NOT NULL,
  `id_dostepnosc` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dostepnosc`
--

CREATE TABLE `dostepnosc` (
  `id_dostepnosc` int(11) NOT NULL,
  `dostepnosc` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `id_prod` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ilosc`
--

CREATE TABLE `ilosc` (
  `id_ilosc` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `id_alejka` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejsce`
--

CREATE TABLE `miejsce` (
  `id_miejsce` int(11) NOT NULL,
  `miejsce` int(11) NOT NULL,
  `id_alejka` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `id_prod` int(11) NOT NULL,
  `nazwa_prod` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `material` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `typ` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `cena` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkt`
--

INSERT INTO `produkt` (`id_prod`, `nazwa_prod`, `material`, `typ`, `cena`) VALUES
(1, 'mebelC', 'plastik', 'szafka', 25);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc_zamowien` int(11) NOT NULL,
  `zmiany` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `ilosc_zamowien`, `zmiany`) VALUES
(1, 'adam', 'qwerty', 'adam@gmail.com', 213, 2),
(2, 'marek', 'asdfg', 'marek@gmail.com', 324, 15),
(3, 'anna', 'zxcvb', 'anna@gmail.com', 4536, 25),
(4, 'andrzej', 'asdfg', 'andrzej@gmail.com', 5465, 0),
(5, 'justyna', 'yuiop', 'justyna@gmail.com', 245, 0),
(6, 'kasia', 'hjkkl', 'kasia@gmail.com', 267, 12),
(7, 'beata', 'fgthj', 'beata@gmail.com', 565, 77),
(8, 'jakub', 'ertyu', 'jakub@gmail.com', 2467, 0),
(9, 'janusz', 'cvbnm', 'janusz@gmail.com', 65, 0),
(10, 'roman', 'dfghj', 'roman@gmail.com', 97, 23),
(15, 'Test123', 'Testowanie1', 'testowy@wp.pl', 0, 0),
(16, 'Julia', '3897julia', 'julia_zg@wp.pl', 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `alejka`
--
ALTER TABLE `alejka`
  ADD PRIMARY KEY (`id_alejka`),
  ADD KEY `id_dostepnosc` (`id_dostepnosc`);

--
-- Indeksy dla tabeli `dostepnosc`
--
ALTER TABLE `dostepnosc`
  ADD PRIMARY KEY (`id_dostepnosc`),
  ADD UNIQUE KEY `id_dostepnosc` (`id_dostepnosc`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indeksy dla tabeli `ilosc`
--
ALTER TABLE `ilosc`
  ADD PRIMARY KEY (`id_ilosc`),
  ADD KEY `id_alejka` (`id_alejka`);

--
-- Indeksy dla tabeli `miejsce`
--
ALTER TABLE `miejsce`
  ADD PRIMARY KEY (`id_miejsce`),
  ADD UNIQUE KEY `id_miejsce` (`id_miejsce`),
  ADD KEY `id_alejka` (`id_alejka`);

--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`id_prod`),
  ADD UNIQUE KEY `id_prod` (`id_prod`),
  ADD KEY `AI_id_prod` (`id_prod`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `alejka`
--
ALTER TABLE `alejka`
  MODIFY `id_alejka` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `dostepnosc`
--
ALTER TABLE `dostepnosc`
  MODIFY `id_dostepnosc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `miejsce`
--
ALTER TABLE `miejsce`
  MODIFY `id_miejsce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
