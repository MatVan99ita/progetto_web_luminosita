-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 11, 2022 alle 12:47
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luminosita_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `compratore`
--

CREATE TABLE `compratore` (
  `BuyerID` int(11) NOT NULL,
  `codUnibo` text NOT NULL,
  `sesso` text NOT NULL,
  `zoneConsegna` text NOT NULL,
  `info_pagamento` text NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `foodcategory`
--

CREATE TABLE `foodcategory` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` text NOT NULL,
  `CategoryDescr` text NOT NULL,
  `categoryImage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `foodcategory`
--

INSERT INTO `foodcategory` (`CategoryID`, `CategoryName`, `CategoryDescr`, `categoryImage`) VALUES
(1, 'Primi', 'tipo la carbonara', ''),
(2, 'Secondi', 'I FAZUL CON LE COTICHE', ''),
(3, 'Contorni', 'Verdurao meravigliao', ''),
(4, 'Panini', 'panini di pane', ''),
(5, 'Piadine', 'leppiadine', ''),
(6, 'BBQ', 'La carnazza', ''),
(7, 'Fritti', 'risurent cineees momento', ''),
(8, 'Pizze', 'a pizza napoledana', ''),
(9, 'Focaccie', 'affogati', ''),
(10, 'Speciali', 'Menù completi o altro', ''),
(11, 'Bevande', 'hai sete?', ''),
(12, 'Birre', 'la domanda alla risposta SI', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `prodottoID` int(11) NOT NULL,
  `nomeProd` mediumtext NOT NULL,
  `descrProd` text NOT NULL,
  `foto` text NOT NULL,
  `glutenFree` tinyint(4) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `foodType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`prodottoID`, `nomeProd`, `descrProd`, `foto`, `glutenFree`, `quantity`, `vendorID`, `foodType`) VALUES
(3, 'Panino con la mortadella', 'La mortazza Bologna IGP', '', 0, 50, 1, 4),
(4, 'Piadina con la mortadella', 'La mortazza Bologna IGP e la piadeina romagnola', '', 0, 50, 1, 5),
(5, 'Ciccioli', 'Fatti con puro grasso di suino(100gr)', '', 0, 10, 1, 7),
(6, 'Birra rossa', '50cl di cantina bagnata(vol 5%)', '', 0, 50, 2, 12),
(7, 'Birra', '33cl vol 4%', '', 0, 50, 1, 12),
(8, 'Costine di maiale', 'Costine alla griglia affumicate e rosolate con la birra', '', 0, 25, 2, 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `UserID` int(11) NOT NULL,
  `Nome` text NOT NULL,
  `Cognome` text NOT NULL,
  `Email` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`UserID`, `Nome`, `Cognome`, `Email`, `password`, `image`) VALUES
(1, 'Matteo', 'Vanni', 'matteo.vanni2@studio.unibo.it', 'Banana33_', ''),
(2, 'Giovanni', 'Delnevo', 'giovanni.delnevo2@unibo.it', 'Pompelmo1!', ''),
(3, 'Silvia', 'Mirri', 'silvia.mirri@unibo.it', 'Mela2!', ''),
(4, 'Mario', 'Rossi', 'panificio.rossi@gmail.com', 'PaniniGo2!', ''),
(5, 'Giuseppe', 'Verdi', 'carnaza&grill@gmail.com', 'Bbq345.', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `venditore`
--

CREATE TABLE `venditore` (
  `vendorID` int(11) NOT NULL,
  `nomeAzienda` text NOT NULL,
  `indirizzo` text NOT NULL,
  `orariConsegna` text NOT NULL,
  `descrizione` text NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `venditore`
--

INSERT INTO `venditore` (`vendorID`, `nomeAzienda`, `indirizzo`, `orariConsegna`, `descrizione`, `userID`) VALUES
(1, 'Panificio rossi', 'via nonloso', 'Dalle 12:00 alle 14:00', 'Il camioncino più bello di tutta Cesena', 4),
(2, 'Carnaza & Grill', 'via diqua', 'Mattina 11:00 - 14:00\r\nPomeriggio/Sera 17:20 - 22:15', 'Per le grigliate universitarie', 5);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `compratore`
--
ALTER TABLE `compratore`
  ADD PRIMARY KEY (`BuyerID`),
  ADD KEY `BuyerID` (`BuyerID`),
  ADD KEY `userID` (`userID`);

--
-- Indici per le tabelle `foodcategory`
--
ALTER TABLE `foodcategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indici per le tabelle `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`prodottoID`),
  ADD KEY `vendorID` (`vendorID`),
  ADD KEY `foodType` (`foodType`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`UserID`);

--
-- Indici per le tabelle `venditore`
--
ALTER TABLE `venditore`
  ADD PRIMARY KEY (`vendorID`),
  ADD UNIQUE KEY `vendorID` (`vendorID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `compratore`
--
ALTER TABLE `compratore`
  MODIFY `BuyerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `foodcategory`
--
ALTER TABLE `foodcategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `prodottoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `venditore`
--
ALTER TABLE `venditore`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `compratore`
--
ALTER TABLE `compratore`
  ADD CONSTRAINT `compratore_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `utente` (`UserID`);

--
-- Limiti per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `prodotto_ibfk_1` FOREIGN KEY (`vendorID`) REFERENCES `venditore` (`vendorID`),
  ADD CONSTRAINT `prodotto_ibfk_2` FOREIGN KEY (`foodType`) REFERENCES `foodcategory` (`CategoryID`);

--
-- Limiti per la tabella `venditore`
--
ALTER TABLE `venditore`
  ADD CONSTRAINT `venditore_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `utente` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
