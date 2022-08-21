-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ago 21, 2022 alle 11:11
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.29

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
  `info_pagamento` text NOT NULL DEFAULT 'NotSaved',
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `compratore`
--

INSERT INTO `compratore` (`BuyerID`, `codUnibo`, `sesso`, `zoneConsegna`, `info_pagamento`, `userID`) VALUES
(30, '', 'Uomo', '[value-4]', '[value-5]', 41),
(31, '', 'Donna', '', '???', 42),
(32, '', 'Uomo', '', 'NotSaved', 43),
(33, '', 'Donna', '', 'NotSaved', 44),
(34, '', 'Donna', '', 'NotSaved', 45),
(35, '1234567', 'Uomo', 'aula 3010', 'ginopeppo', 46);

-- --------------------------------------------------------

--
-- Struttura della tabella `foodcategory`
--

CREATE TABLE `foodcategory` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` text NOT NULL,
  `CategoryDescr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `foodcategory`
--

INSERT INTO `foodcategory` (`CategoryID`, `CategoryName`, `CategoryDescr`) VALUES
(1, 'Primi', 'tipo la carbonara'),
(2, 'Secondi', 'I FAZUL CON LE COTICHE'),
(3, 'Contorni', 'Verdurao meravigliao'),
(4, 'Panini', 'panini di pane'),
(5, 'Piadine', 'leppiadine'),
(6, 'BBQ', 'La carnazza'),
(7, 'Fritti', 'risurent cineees momento'),
(8, 'Pizze', 'a pizza napoledana'),
(9, 'Focaccie', 'affogati'),
(10, 'Speciali', 'Menù completi o altro'),
(11, 'Bevande', 'hai sete?'),
(12, 'Birre', 'la domanda alla risposta SI');

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `notificationID` int(11) NOT NULL,
  `dest` text NOT NULL,
  `send` varchar(100) NOT NULL DEFAULT 'luminosita@cibarie.food',
  `obj` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `spedita` timestamp NOT NULL DEFAULT current_timestamp(),
  `isRead` tinyint(4) NOT NULL DEFAULT 0,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `notifiche`
--

INSERT INTO `notifiche` (`notificationID`, `dest`, `send`, `obj`, `body`, `spedita`, `isRead`, `customerID`) VALUES
(85, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #67916A: n°3 prodotti', '\"[{\\\"name\\\":\\\"Piadina con la mortadella\\\",\\\"id\\\":4,\\\"price\\\":1,\\\"count\\\":1},{\\\"name\\\":\\\"Birra rossa\\\",\\\"id\\\":6,\\\"price\\\":1,\\\"count\\\":1},{\\\"name\\\":\\\"Panino con la mortadella\\\",\\\"id\\\":3,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-07-31 08:40:39', 1, 46),
(86, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #67916A: Panino con la mortadella -> quantity: 1', '{\"name\":\"Panino con la mortadella\",\"richieste\":1,\"rimanenti\":950,\"venduto\":13}', '2022-07-31 08:40:39', 1, 48),
(87, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #67916A: Piadina con la mortadella -> quantity: 1', '{\"name\":\"Piadina con la mortadella\",\"richieste\":1,\"rimanenti\":950,\"venduto\":46}', '2022-07-31 08:40:39', 1, 48),
(88, 'carnaza&grill@gmail.com', 'vannicraft@gmail.com', 'Ricevuta ordine #67916A: Birra rossa -> quantity: 1', '{\"name\":\"Birra rossa\",\"richieste\":1,\"rimanenti\":950,\"venduto\":21}', '2022-07-31 08:40:39', 0, 5),
(89, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #731030: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-07-31 08:41:47', 1, 46),
(90, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #731030: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9951,\"venduto\":5}', '2022-07-31 08:41:47', 1, 48),
(91, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #60FF71: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-04 18:12:24', 1, 46),
(92, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #60FF71: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9950,\"venduto\":5}', '2022-08-04 18:12:24', 1, 48),
(93, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #5F00C7: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-04 18:13:11', 1, 46),
(94, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #5F00C7: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9949,\"venduto\":5}', '2022-08-04 18:13:11', 1, 48),
(95, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #9871A6: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-04 18:14:10', 1, 46),
(96, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #9871A6: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9948,\"venduto\":5}', '2022-08-04 18:14:10', 1, 48),
(97, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #9DC412: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-04 18:16:38', 1, 46),
(98, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #9DC412: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9941,\"venduto\":5}', '2022-08-04 18:16:38', 1, 48),
(99, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #984ED9: n°1 prodotti', '\"[{\\\"name\\\":\\\"Lasagna\\\",\\\"id\\\":11,\\\"price\\\":4,\\\"count\\\":1}]\"', '2022-08-20 15:17:01', 0, 46),
(100, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #984ED9: Lasagna -> quantity: 1', '{\"name\":\"Lasagna\",\"richieste\":1,\"rimanenti\":75,\"venduto\":105}', '2022-08-20 15:17:01', 0, 48),
(101, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #E0717C: n°1 prodotti', '\"[{\\\"name\\\":\\\"Lasagna\\\",\\\"id\\\":11,\\\"price\\\":4,\\\"count\\\":1}]\"', '2022-08-20 15:38:18', 0, 46),
(102, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #E0717C: Lasagna -> quantity: 1', '{\"name\":\"Lasagna\",\"richieste\":1,\"rimanenti\":74,\"venduto\":105}', '2022-08-20 15:38:18', 0, 48),
(103, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #06054E: n°1 prodotti', '\"[{\\\"name\\\":\\\"Lasagna\\\",\\\"id\\\":11,\\\"price\\\":4,\\\"count\\\":1}]\"', '2022-08-20 15:39:27', 0, 46),
(104, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #06054E: Lasagna -> quantity: 1', '{\"name\":\"Lasagna\",\"richieste\":1,\"rimanenti\":73,\"venduto\":105}', '2022-08-20 15:39:27', 0, 48),
(105, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #0CE4A1: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-20 15:40:59', 0, 46),
(106, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #0CE4A1: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9940,\"venduto\":5}', '2022-08-20 15:40:59', 0, 48),
(107, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #FB29EE: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-20 15:44:22', 0, 46),
(108, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #FB29EE: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9939,\"venduto\":5}', '2022-08-20 15:44:22', 0, 48),
(109, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #994544: n°3 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":3}]\"', '2022-08-20 15:45:57', 0, 46),
(110, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #994544: Ciccioli -> quantity: 3', '{\"name\":\"Ciccioli\",\"richieste\":3,\"rimanenti\":9936,\"venduto\":5}', '2022-08-20 15:45:57', 0, 48),
(111, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #EF3905: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-20 15:46:36', 0, 46),
(112, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #EF3905: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9935,\"venduto\":5}', '2022-08-20 15:46:36', 0, 48),
(113, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #DFD7AE: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-20 16:00:20', 0, 46),
(114, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #DFD7AE: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9934,\"venduto\":5}', '2022-08-20 16:00:20', 0, 48),
(115, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #7D3288: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-20 16:01:34', 0, 46),
(116, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #7D3288: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9933,\"venduto\":5}', '2022-08-20 16:01:34', 0, 48),
(117, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #64A194: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-20 16:01:53', 1, 46),
(118, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #64A194: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9932,\"venduto\":5}', '2022-08-20 16:01:53', 0, 48),
(119, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #82D809: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-20 16:03:36', 1, 46),
(120, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #82D809: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9931,\"venduto\":5}', '2022-08-20 16:03:36', 0, 48),
(121, 'vannicraft@gmail.com', 'luminosita@cibarie.food', 'Ricevuta ordine #BF15D1: n°1 prodotti', '\"[{\\\"name\\\":\\\"Ciccioli\\\",\\\"id\\\":5,\\\"price\\\":1,\\\"count\\\":1}]\"', '2022-08-20 16:05:51', 1, 46),
(122, 'panificio_rossi@ilforno.org', 'vannicraft@gmail.com', 'Ricevuta ordine #BF15D1: Ciccioli -> quantity: 1', '{\"name\":\"Ciccioli\",\"richieste\":1,\"rimanenti\":9930,\"venduto\":5}', '2022-08-20 16:05:51', 1, 48);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotto`
--

CREATE TABLE `prodotto` (
  `prodottoID` int(11) NOT NULL,
  `nomeProd` mediumtext NOT NULL,
  `descrProd` text NOT NULL,
  `prezzo` decimal(10,2) UNSIGNED NOT NULL,
  `glutenFree` tinyint(4) NOT NULL DEFAULT 0,
  `quantity` int(11) UNSIGNED NOT NULL,
  `venduto` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `foodType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotto`
--

INSERT INTO `prodotto` (`prodottoID`, `nomeProd`, `descrProd`, `prezzo`, `glutenFree`, `quantity`, `venduto`, `vendorID`, `foodType`) VALUES
(3, 'Panino con la mortadella', 'La mortazza Bologna IGP', '4.00', 0, 0, 13, 3, 4),
(4, 'Piadina con la mortadella', 'La mortazza Bologna IGP e la piadeina romagnola', '1.00', 0, 947, 46, 3, 5),
(5, 'Ciccioli', 'Fatti con puro grasso di suino(100gr)', '1.00', 1, 9930, 5, 3, 7),
(6, 'Birra rossa', '50cl di cantina bagnata(vol 5%)', '1.00', 0, 950, 21, 2, 12),
(7, 'Birra', '33cl vol 4%', '1.00', 0, 47, 30, 3, 12),
(8, 'Costine di maiale', 'Costine alla griglia affumicate e rosolate con la birra', '1.00', 0, 25, 2, 2, 6),
(11, 'Lasagna', 'Buona come quella della nonna o della mamma', '4.00', 0, 73, 105, 3, 1),
(13, 'Cibo gluten free per i test', ' ', '1.00', 1, 1, 0, 3, 1),
(14, 'altra roba usata a caso', ' ', '1.00', 1, 1, 0, 3, 10),
(15, 'la bevanda al glutine senza glutine', ' ', '1.00', 1, 1, 0, 3, 11),
(16, 'la bevanda al glutine con glutine', ' ', '1.00', 0, 1, 0, 3, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `UserID` int(11) NOT NULL,
  `Nome` text NOT NULL,
  `Cognome` text NOT NULL,
  `Email` text NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `vendors` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`UserID`, `Nome`, `Cognome`, `Email`, `password`, `salt`, `vendors`) VALUES
(5, 'Giuseppe', 'Verdi', 'carnaza&grill@gmail.com', 'Bbq345.', '', 1),
(41, 'Paperino', 'Papero', 'matteo.vanni2@studio.unibo.it', 'afe6ea1dab0794c64c54d074412f384ad42ec00e2b7e656aa8a5b7fe2da1d8f9a0620040061c2a51792c3d0a64022c97efda00c40933c667bafce6d6570191ee', '1c0de521759998d18d16e32a909b948a184e47577aa4aed37490de03715aa773989815f5ed2dda4caeaeac48c3b58195e8cd3b32049ab3a91bb76f672130f2e9', 0),
(42, 'Paperino', 'Papero', 'gino.pippo@hotmail.comfvrbef', '261110e633863e29807599720754bae28543c8faeb3aca8f06d5ab797f56511548e523a0a6b02c92b8ae32c565bc4ffa80058a06c93d5777924de911289339a3', '53e2e5d43ea25a7d50b3f482df82b46894a864cf972b3fdfa86926de0664ac2a3bb0c91c564cd6ac15c956114ef570fdfc580c2f5539da98ebf86526b73c7ac1', 0),
(43, 'Paperino', 'e', 'matteo.vanni2@studio.unibo.itfvcdfvcd', '2c5cbf4f6bd5cd61214853fad016b20ac41ec14098c4ab8ea731b0f735b22f961a1eae9b31ee6fb0dc686aef0afa443b596d3513f9837bacc8b0e69b2bded43f', '7e1f85be355895139f178d2f0066b86604079e8b7da94104119fb72cf2bf91de06d7784ea87724a1f221db5e1870b77471ca94022a1e9ee54051bdd3c757b5a0', 0),
(44, 'bilbo', 'e', 'paperaino@topolinia.orguygfcdxsdfv', 'eb902215f85df81547178c19eb1d542f8425bbf1dc6cb185efaa79c0d744435212e633bd76666a4cb373e80275c7a66307698a0e1df0e10eb0acdcf8d4754adc', '1f6484bb037e685fed601de2c63d15c5a8e613d3c1937cc3f0e81061901e95605478d64c32474ae74f3d7dab421bdfb6ea57417a725611930a04bbaab8c5adf7', 0),
(45, 'Gino', 'Pippo', 'gino.pippo@hotmail.comvbvfdfvv', 'b391a429fc4d70ffe65528008cc8b68db7699fa0e0b5a14b2b55db43221364dc7ed158fb68c6b89827e15f081183e89f3498669c2580b02d0a074d018ff3ee0a', '3605487a8908eb12541771acc97cc0ff0c335438a1ab234f8dd1a52b6446dc73d319cb8ac628bc8d962424fb70e3f0432b2d6c155917ccbb15a058669102a44c', 0),
(46, 'Matteo', 'Vanni', 'vannicraft@gmail.com', 'da839cb302ccb3938c065efdd5895e720fc21e9b2bb1de27819f3c889be62db539a7da5aac1ef451eceffb4e9b3cd94aa6307ec0fb40e663dc9a479c7c74fbd2', '8a8cc9543668a888b7e7d106f31952030b6a4206ffaf6d063d6ab69c932f299ccf321688bf69ab9261a169ea86cfccbdfd8d1e96adab820645cd564e3ac10a04', 0),
(48, 'Mario', 'Rossi', 'panificio_rossi@ilforno.org', 'ae5bc4f3da50508e3c03252b0a5a9cecfbf60848e486b2205bdbaf71c59e96fd330465b0024fa3594a8381162ea2a14d34c7a006dde3e69a5f97320e2c140c5b', 'f006c92afac7b4c78752f1735dd5f35cd7589c3775ed1305f9aa8d66f648a18f546533555f6b895373753100ff14be454888600c8c8a3e0bed311eb719097416', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `venditore`
--

CREATE TABLE `venditore` (
  `vendorID` int(11) NOT NULL,
  `nomeAzienda` text NOT NULL,
  `indirizzo` text NOT NULL,
  `orariConsegna` text NOT NULL,
  `contatto` text NOT NULL,
  `descrizione` text NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `venditore`
--

INSERT INTO `venditore` (`vendorID`, `nomeAzienda`, `indirizzo`, `orariConsegna`, `contatto`, `descrizione`, `userID`) VALUES
(2, 'Carnaza & Grill', 'via diqua', 'Mattina 11:00 - 14:00\r\nPomeriggio/Sera 17:20 - 22:15', '0', 'Per le grigliate universitarie', 5),
(3, 'Panificio Rossi', 'via Rossificio, 15', 'Lun/Ven - 11:00/14:00', '1234567890', 'Il camioncino nel parcheggio fico fico', 48);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `compratore`
--
ALTER TABLE `compratore`
  ADD PRIMARY KEY (`BuyerID`),
  ADD KEY `BuyerID` (`BuyerID`),
  ADD KEY `compratore_ibfk_1` (`userID`);

--
-- Indici per le tabelle `foodcategory`
--
ALTER TABLE `foodcategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `customerID` (`customerID`);

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
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`) USING HASH,
  ADD UNIQUE KEY `Email_2` (`Email`) USING HASH;

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
  MODIFY `BuyerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `foodcategory`
--
ALTER TABLE `foodcategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT per la tabella `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `prodottoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT per la tabella `venditore`
--
ALTER TABLE `venditore`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `compratore`
--
ALTER TABLE `compratore`
  ADD CONSTRAINT `compratore_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `utente` (`UserID`) ON DELETE CASCADE;

--
-- Limiti per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  ADD CONSTRAINT `notifiche_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `utente` (`UserID`);

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
