-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2020 at 07:33 AM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lyreh`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`) VALUES
(1, 'Aalto', '2020-01-21 10:54:29'),
(2, 'Abercrombie', '2020-01-21 10:54:29'),
(3, 'Acne Studios', '2020-01-21 10:54:29'),
(4, 'Acqua di Parma', '2020-01-21 10:54:29'),
(5, 'Adidas', '2020-01-21 10:54:29'),
(6, 'Alexander Wang', '2020-01-21 10:54:29'),
(7, 'Aesop', '2020-01-21 10:54:29'),
(8, 'Aeyde', '2020-01-21 10:54:29'),
(9, 'ALAIA', '2020-01-21 10:54:29'),
(10, 'AlaÃ¯a Vintage', '2020-01-21 10:54:29'),
(11, 'Alberta Ferretti', '2020-01-21 10:54:29'),
(12, 'Alberto Fasciani', '2020-01-21 10:54:29'),
(13, 'AllSaints', '2020-01-21 10:54:29'),
(14, 'American Apparel', '2020-01-21 10:54:29'),
(15, 'Aquascutum', '2020-01-21 10:54:29'),
(16, 'Audemars Piguet', '2020-01-21 10:54:29'),
(17, 'Badgley Mischka', '2020-01-21 10:54:29'),
(18, 'Balenciaga', '2020-01-21 10:54:29'),
(19, 'Balenciaga Vintage', '2020-01-21 10:54:29'),
(20, 'Bally', '2020-01-21 10:54:29'),
(21, 'Balmain', '2020-01-21 10:54:29'),
(22, 'Banana Republic', '2020-01-21 10:54:29'),
(23, 'Bao Bao Issey Miyake', '2020-01-21 10:54:29'),
(24, 'Barbour', '2020-01-21 10:54:29'),
(25, 'BAPE', '2020-01-21 10:54:29'),
(26, 'Begg & Co', '2020-01-21 10:54:29'),
(27, 'Belsire', '2020-01-21 10:54:29'),
(28, 'BELSTAFF', '2020-01-21 10:54:29'),
(29, 'Berluti', '2020-01-21 10:54:29'),
(30, 'Best Made Company', '2020-01-21 10:54:29'),
(31, 'Billionaire Boys Club', '2020-01-21 10:54:29'),
(32, 'Birkenstock', '2020-01-21 10:54:29'),
(33, 'Blumarine', '2020-01-21 10:54:29'),
(34, 'Bobbi Brown', '2020-01-21 10:54:29'),
(35, 'Boss Hugo Boss', '2020-01-21 10:54:29'),
(36, 'Bottega Veneta', '2020-01-21 10:54:29'),
(37, 'Brian Atwood', '2020-01-21 10:54:29'),
(38, 'Brunello Cucinelli', '2020-01-21 10:54:29'),
(39, 'Buccellati', '2020-01-21 10:54:29'),
(40, 'Bugaboo', '2020-01-21 10:54:29'),
(41, 'Bulgari', '2020-01-21 10:54:29'),
(42, 'Burberry', '2020-01-21 10:54:29'),
(43, 'Buscemi', '2020-01-21 10:54:29'),
(44, 'BVLGARI', '2020-01-21 10:54:29'),
(45, 'By Malene Birger', '2020-01-21 10:54:29'),
(46, 'Calvin Klein', '2020-01-21 10:54:29'),
(47, 'Camper', '2020-01-21 10:54:29'),
(48, 'Canada Goose', '2020-01-21 10:54:29'),
(49, 'Carolina Herrera', '2020-01-21 10:54:29'),
(50, 'Carrera', '2020-01-21 10:54:29'),
(51, 'Cartier', '2020-01-21 10:54:29'),
(52, 'Cartier Eyewear', '2020-01-21 10:54:29'),
(53, 'Casadei', '2020-01-21 10:54:29'),
(54, 'Cecilia Prado', '2020-01-21 10:54:29'),
(55, 'Celine', '2020-01-21 10:54:29'),
(56, 'Cerruti', '2020-01-21 10:54:29'),
(57, 'Champion', '2020-01-21 10:54:29'),
(58, 'Chanel', '2020-01-21 10:54:29'),
(59, 'Charlotte Olympia', '2020-01-21 10:54:29'),
(60, 'Charlotte Tilbury', '2020-01-21 10:54:29'),
(61, 'Ch Carolina Herrera', '2020-01-21 10:54:29'),
(62, 'Chiara Ferragni', '2020-01-21 10:54:29'),
(63, 'Chloe', '2020-01-21 10:54:29'),
(64, 'Christian Dior', '2020-01-21 10:54:29'),
(65, 'Christian Lacroix', '2020-01-21 10:54:29'),
(66, 'Christian Louboutin', '2020-01-21 10:54:29'),
(67, 'Christopher Kane', '2020-01-21 10:54:29'),
(68, 'Clarins', '2020-01-21 10:54:29'),
(69, 'Clinique', '2020-01-21 10:54:29'),
(70, 'Club Monaco', '2020-01-21 10:54:29'),
(71, 'Coach', '2020-01-21 10:54:29'),
(72, 'Comme des GarÃ§ons', '2020-01-21 10:54:29'),
(73, 'Common Projects', '2020-01-21 10:54:29'),
(74, 'Converse', '2020-01-21 10:54:29'),
(75, 'COS', '2020-01-21 10:54:29'),
(76, 'Creed', '2020-01-21 10:54:29'),
(77, 'Crockett & Jones', '2020-01-21 10:54:29'),
(78, 'Davidoff', '2020-01-21 10:54:29'),
(79, 'Dents', '2020-01-21 10:54:29'),
(80, 'Diane von Furstenberg', '2020-01-21 10:54:29'),
(81, 'Diesel', '2020-01-21 10:54:29'),
(82, 'Dior Eyewear', '2020-01-21 10:54:29'),
(83, 'DKNY', '2020-01-21 10:54:29'),
(84, 'Dolce & Gabbana', '2020-01-21 10:54:29'),
(85, 'Dolce Vita', '2020-01-21 10:54:29'),
(86, 'Dondup', '2020-01-21 10:54:29'),
(87, 'Donna Karan', '2020-01-21 10:54:29'),
(88, 'Dr. Martens', '2020-01-21 10:54:29'),
(89, 'Dsquared2', '2020-01-21 10:54:29'),
(90, 'Dunhill', '2020-01-21 10:54:29'),
(91, 'Dyson', '2020-01-21 10:54:29'),
(92, 'Elie Saab', '2020-01-21 10:54:29'),
(93, 'Emanuel Ungaro', '2020-01-21 10:54:29'),
(94, 'Emilio Pucci', '2020-01-21 10:54:29'),
(95, 'Emporio Armani', '2020-01-21 10:54:29'),
(96, 'Enfants Riches DÃ©primÃ©s', '2020-01-21 10:54:29'),
(97, 'Ermenegildo Zegna', '2020-01-21 10:54:29'),
(98, 'Escada', '2020-01-21 10:54:29'),
(99, 'Estee Lauder', '2020-01-21 10:54:29'),
(100, 'Fjallraven ', '2020-01-21 10:54:29'),
(101, 'Fendi', '2020-01-21 10:54:29'),
(102, 'Fenty Puma by Rihanna', '2020-01-21 10:54:29'),
(103, 'Fila', '2020-01-21 10:54:29'),
(104, 'Fred Perry', '2020-01-21 10:54:29'),
(105, 'Forever 21', '2020-01-21 10:54:29'),
(106, 'Furla', '2020-01-21 10:54:29'),
(107, 'GANT', '2020-01-21 10:54:29'),
(108, 'Ganni', '2020-01-21 10:54:29'),
(109, 'GAP', '2020-01-21 10:54:29'),
(110, 'Geox', '2020-01-21 10:54:29'),
(111, 'Gianvito Rossi', '2020-01-21 10:54:29'),
(112, 'Gieves & Hawkes', '2020-01-21 10:54:29'),
(113, 'Giorgio Armani', '2020-01-21 10:54:29'),
(114, 'Giuseppe Zanotti', '2020-01-21 10:54:29'),
(115, 'Givenchy', '2020-01-21 10:54:29'),
(116, 'Grenson', '2020-01-21 10:54:29'),
(117, 'G-Star', '2020-01-21 10:54:29'),
(118, 'Gucci', '2020-01-21 10:54:29'),
(119, 'Hackett', '2020-01-21 10:54:29'),
(120, 'Heidi Klein', '2020-01-21 10:54:29'),
(121, 'Helmut Lang', '2020-01-21 10:54:29'),
(122, 'Hermes', '2020-01-21 10:54:29'),
(123, 'Hogan', '2020-01-21 10:54:29'),
(124, 'House Of Holland', '2020-01-21 10:54:29'),
(125, 'Hudson', '2020-01-21 10:54:29'),
(126, 'Hugo Boss', '2020-01-21 10:54:29'),
(127, 'Hunter', '2020-01-21 10:54:29'),
(128, 'H&M', '2020-01-21 10:54:29'),
(129, 'Iceberg', '2020-01-21 10:54:29'),
(130, 'Isabel Marant', '2020-01-21 10:54:29'),
(131, 'Issey Miyake', '2020-01-21 10:54:29'),
(132, 'Jac+ Jack', '2020-01-21 10:54:29'),
(133, 'Jacquemus', '2020-01-21 10:54:29'),
(134, 'Jason Wu', '2020-01-21 10:54:29'),
(135, 'J Brand', '2020-01-21 10:54:29'),
(136, 'J.Crew', '2020-01-21 10:54:29'),
(137, 'Jean Louis Scherrer Vintage', '2020-01-21 10:54:29'),
(138, 'Jean Paul Gaultier', '2020-01-21 10:54:29'),
(139, 'Jean Shop', '2020-01-21 10:54:29'),
(140, 'Jenny Packham', '2020-01-21 10:54:29'),
(141, 'Jil Sander', '2020-01-21 10:54:29'),
(142, 'Jimmy Choo', '2020-01-21 10:54:29'),
(143, 'Jo Malone London', '2020-01-21 10:54:29'),
(144, 'Jonathan Adler', '2020-01-21 10:54:29'),
(145, 'Joseph', '2020-01-21 10:54:29'),
(146, 'Joules', '2020-01-21 10:54:29'),
(147, 'Juicy Couture', '2020-01-21 10:54:29'),
(148, 'Just Cavalli', '2020-01-21 10:54:29'),
(149, 'JW Anderson', '2020-01-21 10:54:29'),
(150, 'Karl Lagerfeld', '2020-01-21 10:54:29'),
(151, 'Kate Spade', '2020-01-21 10:54:29'),
(152, 'Kendall+Kylie', '2020-01-21 10:54:29'),
(153, 'Kenzo', '2020-01-21 10:54:29'),
(154, 'K. Jacques', '2020-01-21 10:54:29'),
(155, 'Lacoste', '2020-01-21 10:54:29'),
(156, 'LANA GIRL BY LANA JEWELRY', '2020-01-21 10:54:29'),
(157, 'Lancer', '2020-01-21 10:54:29'),
(158, 'Lancome', '2020-01-21 10:54:29'),
(159, 'Lanvin', '2020-01-21 10:54:29'),
(160, 'La Perla', '2020-01-21 10:54:29'),
(161, 'Laura Mercier', '2020-01-21 10:54:29'),
(162, 'Les Hommes', '2020-01-21 10:54:29'),
(163, 'Les Petits Joueurs', '2020-01-21 10:54:29'),
(164, 'Lisa Eisner Jewelry', '2020-01-21 10:54:29'),
(165, 'Little Marc Jacobs', '2020-01-21 10:54:29'),
(166, 'Loewe', '2020-01-21 10:54:29'),
(167, 'Love Moschino', '2020-01-21 10:54:29'),
(168, 'Mackage', '2020-01-21 10:54:29'),
(169, 'Maison Margiela', '2020-01-21 10:54:29'),
(170, 'Manolo Blahnik', '2020-01-21 10:54:29'),
(171, 'Marchesa', '2020-01-21 10:54:29'),
(172, 'Marc Jacobs', '2020-01-21 10:54:29'),
(173, 'Marni', '2020-01-21 10:54:29'),
(174, 'Massimo Dutti', '2020-01-21 10:54:29'),
(175, 'Matthew Williamson', '2020-01-21 10:54:29'),
(176, 'Maxmara', '2020-01-21 10:54:29'),
(177, 'Max Mara', '2020-01-21 10:54:29'),
(178, 'MCM', '2020-01-21 10:54:29'),
(179, 'M.Cohen', '2020-01-21 10:54:29'),
(180, 'McQ Alexander McQueen', '2020-01-21 10:54:29'),
(181, 'Melissa Odabash', '2020-01-21 10:54:29'),
(182, 'Michael Kors', '2020-01-21 10:54:29'),
(183, 'Missoni', '2020-01-21 10:54:29'),
(184, 'Miu Miu', '2020-01-21 10:54:29'),
(185, 'Moncler', '2020-01-21 10:54:29'),
(186, 'Monique Lhuillier', '2020-01-21 10:54:29'),
(187, 'Montblanc', '2020-01-21 10:54:29'),
(188, 'Moon Boot', '2020-01-21 10:54:29'),
(189, 'Moschino', '2020-01-21 10:54:29'),
(190, 'Moscot', '2020-01-21 10:54:29'),
(191, 'Movado', '2020-01-21 10:54:29'),
(192, 'MSGM', '2020-01-21 10:54:29'),
(193, 'Mugler', '2020-01-21 10:54:29'),
(194, 'Mulberry', '2020-01-21 10:54:29'),
(195, 'Needle & Thread', '2020-01-21 10:54:29'),
(196, 'New Balance', '2020-01-21 10:54:29'),
(197, 'Nicholas Kirkwood', '2020-01-21 10:54:29'),
(198, 'Nike', '2020-01-21 10:54:29'),
(199, 'Nina Ricci', '2020-01-21 10:54:29'),
(200, 'Oakley', '2020-01-21 10:54:29'),
(201, 'Off-White', '2020-01-21 10:54:29'),
(202, 'Oliver Peoples', '2020-01-21 10:54:29'),
(203, 'Omega', '2020-01-21 10:54:29'),
(204, 'Opening Ceremony', '2020-01-21 10:54:29'),
(205, 'Oris', '2020-01-21 10:54:29'),
(206, 'Oscar de la Renta', '2020-01-21 10:54:29'),
(207, 'Paco Rabanne', '2020-01-21 10:54:29'),
(208, 'Paul & Joe', '2020-01-21 10:54:29'),
(209, 'Paul & Shark', '2020-01-21 10:54:29'),
(210, 'Paul Smith', '2020-01-21 10:54:29'),
(211, 'Patek Philippe', '2020-01-21 10:54:29'),
(212, 'Perris Monte Carlo', '2020-01-21 10:54:29'),
(213, 'Piaget', '2020-01-21 10:54:29'),
(214, 'Pierre Balmain', '2020-01-21 10:54:29'),
(215, 'Pinko', '2020-01-21 10:54:29'),
(216, 'Polo Ralph Lauren', '2020-01-21 10:54:29'),
(217, 'Porsche Design', '2020-01-21 10:54:29'),
(218, 'Prada', '2020-01-21 10:54:29'),
(219, 'Pretty Ballerinas', '2020-01-21 10:54:29'),
(220, 'Pringle Of Scotland', '2020-01-21 10:54:29'),
(221, 'Puma', '2020-01-21 10:54:29'),
(222, 'QuickSilver', '2020-01-21 10:54:29'),
(223, 'Rachel Zoe', '2020-01-21 10:54:29'),
(224, 'rag & bone', '2020-01-21 10:54:29'),
(225, 'Ralph Lauren', '2020-01-21 10:54:29'),
(226, 'Ray-Ban', '2020-01-21 10:54:29'),
(227, 'Red Valentino', '2020-01-21 10:54:29'),
(228, 'Reebok', '2020-01-21 10:54:29'),
(229, 'Rene Caovilla', '2020-01-21 10:54:29'),
(230, 'Rick Owens', '2020-01-21 10:54:29'),
(231, 'Roberto Cavalli', '2020-01-21 10:54:29'),
(232, 'Rolex', '2020-01-21 10:54:29'),
(233, 'Roger Vivier', '2020-01-21 10:54:29'),
(234, 'Roland Mouret', '2020-01-21 10:54:29'),
(235, 'Rupert Sanderson', '2020-01-21 10:54:29'),
(236, 'Saint Laurent', '2020-01-21 10:54:29'),
(237, 'Salvatore Ferragamo', '2020-01-21 10:54:29'),
(238, 'Sam Edelman', '2020-01-21 10:54:29'),
(239, 'Sandro', '2020-01-21 10:54:29'),
(240, 'Sebago', '2020-01-21 10:54:29'),
(241, 'See by Chloe', '2020-01-21 10:54:29'),
(242, 'Sekford', '2020-01-21 10:54:29'),
(243, 'Self-Portrait', '2020-01-21 10:54:29'),
(244, 'Senso', '2020-01-21 10:54:29'),
(245, 'Sergio Rossi', '2020-01-21 10:54:29'),
(246, 'Sigma Beauty', '2020-01-21 10:54:29'),
(247, 'Simonnot Godard', '2020-01-21 10:54:29'),
(248, 'Sisley-Paris', '2020-01-21 10:54:29'),
(249, 'Sjp Collection', '2020-01-21 10:54:29'),
(250, 'Smythson', '2020-01-21 10:54:29'),
(251, 'Sophia Webster', '2020-01-21 10:54:29'),
(252, 'Spanx', '2020-01-21 10:54:29'),
(253, 'Sportmax', '2020-01-21 10:54:29'),
(254, 'Stefano Ricci', '2020-01-21 10:54:29'),
(255, 'Stella McCartney', '2020-01-21 10:54:29'),
(256, 'Stone Island', '2020-01-21 10:54:29'),
(257, 'Stuart Weitzman', '2020-01-21 10:54:29'),
(258, 'Swarovski', '2020-01-21 10:54:29'),
(259, 'Tag Heuer', '2020-01-21 10:54:29'),
(260, 'The Cambridge Satchel Company', '2020-01-21 10:54:29'),
(261, 'The North Face', '2020-01-21 10:54:29'),
(262, 'Theory', '2020-01-21 10:54:29'),
(263, 'Thierry Mugler', '2020-01-21 10:54:29'),
(264, 'Timberland', '2020-01-21 10:54:29'),
(265, 'Timex', '2020-01-21 10:54:29'),
(266, 'TOM FORD', '2020-01-21 10:54:29'),
(267, 'Tommy Hilfiger', '2020-01-21 10:54:29'),
(268, 'Tory Burch', '2020-01-21 10:54:29'),
(269, 'True Religion', '2020-01-21 10:54:29'),
(270, 'UGG', '2020-01-21 10:54:29'),
(271, 'Under Armour', '2020-01-21 10:54:29'),
(272, 'Uniqlo', '2020-01-21 10:54:29'),
(273, 'Valentino', '2020-01-21 10:54:29'),
(274, 'Valextra', '2020-01-21 10:54:29'),
(275, 'Vans', '2020-01-21 10:54:29'),
(276, 'Veja', '2020-01-21 10:54:29'),
(277, 'Vera Wang', '2020-01-21 10:54:29'),
(278, 'Versace', '2020-01-21 10:54:29'),
(279, 'Versus', '2020-01-21 10:54:29'),
(280, 'Vetements', '2020-01-21 10:54:29'),
(281, 'Victoria Beckham', '2020-01-21 10:54:29'),
(282, 'Viktor & Rolf', '2020-01-21 10:54:29'),
(283, 'Vivienne Westwood', '2020-01-21 10:54:29'),
(284, 'Voile Blanche', '2020-01-21 10:54:29'),
(285, 'Voz', '2020-01-21 10:54:29'),
(286, 'WANT LES ESSENTIELS', '2020-01-21 10:54:29'),
(287, 'Wolford', '2020-01-21 10:54:29'),
(288, 'Woolrich', '2020-01-21 10:54:29'),
(289, 'Y-3', '2020-01-21 10:54:29'),
(290, 'Yeezy', '2020-01-21 10:54:29'),
(291, 'Yves Saint Laurent Beaute', '2020-01-21 10:54:29'),
(292, 'Yves Salomon', '2020-01-21 10:54:29'),
(293, 'Zac Posen', '2020-01-21 10:54:29'),
(294, 'Zadig & Voltaire', '2020-01-21 10:54:29'),
(295, 'Zara', '2020-01-21 10:54:29'),
(296, 'Zimmermann', '2020-01-21 10:54:29'),
(297, 'Z Zegna', '2020-01-21 10:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `category_name`, `created_at`) VALUES
(1, 'Women', '2019-12-19 05:39:49'),
(2, 'Men', '2019-12-19 05:40:06'),
(3, 'Accessories', '2019-12-19 05:40:14'),
(4, 'Kids', '2019-12-19 05:40:22'),
(6, 'Beauty', '2020-01-15 14:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `archive` smallint(6) DEFAULT '0',
  `last_message_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `sender_id`, `receiver_id`, `archive`, `last_message_at`) VALUES
(1, 26, 71, 0, '2020-06-10 17:53:03'),
(2, 26, 45, 0, '2020-06-10 16:09:57'),
(3, 47, 71, 0, '2020-06-10 17:04:03'),
(4, 45, 45, 0, '2020-06-10 16:08:54'),
(5, 47, 38, 0, NULL),
(6, 47, 26, 0, '2020-06-10 17:54:24'),
(7, 72, 71, 0, '2020-06-10 17:55:50'),
(8, 72, 38, 0, '2020-06-10 17:13:39'),
(9, 26, 26, 0, '2020-06-10 17:51:41'),
(10, 47, 45, 0, '2020-06-10 17:52:41'),
(11, 45, 71, 0, NULL),
(12, 71, 38, 0, NULL),
(13, 71, 19, 0, NULL),
(14, 71, 71, 0, NULL),
(15, 26, 21, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatId` int(11) NOT NULL,
  `fromId` int(11) NOT NULL,
  `toId` int(11) NOT NULL,
  `sequence` double NOT NULL,
  `message` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chatStartId` int(11) DEFAULT NULL,
  `receiveId` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatId`, `fromId`, `toId`, `sequence`, `message`, `time`, `chatStartId`, `receiveId`, `status`) VALUES
(1, 75, 71, 2, 'offer-sent-5f1854c9d7ebc', '2020-07-22 22:01:29', 1, 71, 'read'),
(2, 71, 75, 3, 'offer-sent-5f1858ea2033d', '2020-07-22 22:19:06', 2, 75, 'read'),
(3, 71, 75, 4, 'offer-sent-5f185df851a26', '2020-07-22 22:40:40', 2, 75, 'read'),
(4, 71, 75, 5, 'offer-sent-5f18623a5fee0', '2020-07-22 22:58:50', 2, 75, 'read'),
(5, 71, 75, 6, 'offer-sent-5f1868b7c79de', '2020-07-22 23:26:31', 3, 75, 'unread'),
(8, 26, 19, 9, 'Hi would you accept an offer ', '2020-07-27 01:35:40', 6, 19, 'unread'),
(7, 19, 71, 8, 'offer-sent-5f1d87d38ce57', '2020-07-26 20:40:35', 5, 71, 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `chatstart`
--

CREATE TABLE `chatstart` (
  `chatStartId` int(11) NOT NULL,
  `fromId` int(11) NOT NULL,
  `toId` int(11) NOT NULL,
  `productSlug` text NOT NULL,
  `type` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL DEFAULT '0',
  `changeStatus` varchar(255) NOT NULL DEFAULT 'read',
  `archive` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatstart`
--

INSERT INTO `chatstart` (`chatStartId`, `fromId`, `toId`, `productSlug`, `type`, `time`, `userId`, `changeStatus`, `archive`) VALUES
(1, 75, 71, 'sasfdsadfs', 1, '2020-07-22 22:01:29', 0, 'read', 0),
(2, 71, 75, 'abc', 1, '2020-07-22 22:19:06', 0, 'read', 0),
(3, 71, 75, 'errr', 1, '2020-07-22 23:26:31', 0, 'read', 0),
(5, 19, 71, 'sasfdsadfs', 1, '2020-07-26 20:40:35', 0, 'read', 0),
(6, 26, 19, 'testing-an-item', 1, '2020-07-27 01:35:40', 0, 'read', 0);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `created_at`) VALUES
(1, 'Beige', '2019-12-09 10:11:32'),
(2, 'Black', '2019-12-09 10:11:32'),
(3, 'Blue', '2019-12-09 10:11:32'),
(4, 'Brown', '2019-12-09 10:11:32'),
(5, 'Burgundy', '2019-12-09 10:11:32'),
(6, 'Camel', '2019-12-09 10:11:32'),
(7, 'Gold', '2019-12-09 10:11:32'),
(8, 'Green', '2019-12-09 10:11:32'),
(9, 'Grey', '2019-12-09 10:11:32'),
(10, 'Khaki', '2019-12-09 10:11:32'),
(11, 'Multicolour', '2019-12-09 10:11:32'),
(12, 'Orange', '2019-12-09 10:11:32'),
(13, 'Pink', '2019-12-09 10:11:32'),
(14, 'Purple', '2019-12-09 10:11:32'),
(15, 'Red', '2019-12-09 10:11:32'),
(16, 'Silver', '2019-12-09 10:11:32'),
(17, 'White', '2019-12-09 10:11:32'),
(18, 'Yellow', '2019-12-09 10:11:32'),
(19, 'Other', '2020-01-21 06:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `concierge`
--

CREATE TABLE `concierge` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_photo` varchar(250) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `last_seen` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concierge`
--

INSERT INTO `concierge` (`id`, `user_id`, `upload_photo`, `brand`, `last_seen`, `size`, `message`, `created_at`) VALUES
(3, 0, 'FB1D41C8-11C0-493F-B1C1-C0028AD6E098.png', '1', 'Hzn', '1', 'Gh', '2020-01-17 15:27:05'),
(5, 1, '231-category_default.jpg', '3', '345345', '33', 'erf4t4t', '2020-01-22 11:51:09'),
(6, 1, '231-category_default1.jpg', '1', '34324', '32432', '32453254', '2020-02-03 13:45:36'),
(7, 1, 'Screenshot_2020-02-03-15-15-21-60.png', '1', 'Kkk', '2', 'Yyy', '2020-02-03 13:58:35'),
(8, 1, '231-category_default2.jpg', '1', '4356', '456', '546', '2020-02-03 14:22:06'),
(9, 1, '231-category_default3.jpg', '1', '32432', '324532', '325434534', '2020-02-04 11:58:12'),
(10, 1, 'F65CDCBA-C77C-4024-A59F-2B03082AFA28.jpeg', '1', 'Ghh', '89', 'Test', '2020-02-04 12:13:00'),
(11, 19, '89083EEA-326E-4023-AF5B-2B1B3F7AB4C3.png', '1', 'Online ', '10', 'Checking to see if this works ', '2020-02-05 14:48:02'),
(12, 21, 'E9C84B16-EA82-43B0-9AAA-45780A04C7EA.jpeg', '1', 'Gucci', '11', 'Shoe', '2020-02-06 21:14:13'),
(13, 19, '1B353484-79A8-4EBB-98A3-0DF56CDC8871.jpeg', '1', 'Brown', '0', 'Testing ', '2020-02-07 19:25:33'),
(14, 19, '34FBF63C-4700-4A0B-B518-CC0422D12D45.jpeg', '1', 'Test ', '10', 'Testing to see what happens', '2020-02-10 07:25:45'),
(15, 1, 'a259e22a-fbb9-42f0-b531-c622062a8602.JPG', '1', 'iwayy.com', '0', 'Hey This is a test message', '2020-02-14 06:21:19'),
(16, 1, 'boss.png', '1', 'afs', '45', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2020-02-20 07:37:53'),
(18, 1, 'download.jpg', '5', 'Test Store', '35', 'This is a Test message.', '2020-03-04 04:52:08'),
(19, 1, 'download1.jpg', '9', 'test 2', '33', 'this is test message 2', '2020-03-04 04:53:33'),
(20, 1, 'download2.jpg', '3', 'sdfg', '525', 'asdfd', '2020-03-04 04:55:19'),
(21, 36, '231-category_default4.jpg', '1', 'test6667', '45', 'gsdgds', '2020-03-05 05:27:01'),
(22, 37, 'IMG_20200308_142553.jpg', '1', 'afs', '45', 'dsfasfas', '2020-03-09 10:45:25'),
(23, 26, '00344E67-DD79-4097-AA74-706B1FDFFA77.png', 'Abercrombie', 'Www. Hjgjh.com', '8', 'Testing to see where the email notification goes x', '2020-04-09 16:16:55'),
(24, 44, 'suv.jpg', 'ALAIA', 'asdasda', '123', 'asdasdda', '2020-04-17 16:35:20'),
(25, 42, 'index.jpg', 'Dondup', 'asdasdasd', '123', 'addadsad', '2020-04-21 16:59:25'),
(27, 45, 'life.jpg', '21', 'olx.com ', '12', 'Testing ', '2020-05-02 05:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `condition_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email_address` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email_address`, `phone_number`, `message`, `created_at`) VALUES
(2, 'Bernadine Ansell', 'Ansell', 'ansell.bernadine@gmail.com', '', 'Acquiring GOV backlinks is one of the most sought-after link building strategies that’s still popular among SEO experts today.\r\n\r\nAlthough Matt Cutts (the former head of Google search quality team) has said that Google does not give any special importance to .gov domains, seasoned SEO practitioners have proven that powerful backlinks from government websites can improve your website’s overall search visibility.\r\n\r\nMore info:\r\nhttps://www.monkeydigital.io/product/gov-backlinks/\r\n\r\nthanks and regards\r\nMike\r\nmonkeydigital.co@gmail.com\r\n', '2020-01-05 00:19:58'),
(3, 'Ryan', 'C', 'ryan48@that.trillania.com', '000-000-0000', 'Hi, I came across your website, lyreh.com, and wanted to see if\r\nyou\'re hiring right now?\r\n\r\nIf so, we can help you reach qualified job seekers, fast.\r\n\r\nHere are some of the key benefits:\r\n\r\n- Post to top job sites with one submission\r\n- Easily manage all candidates in one place\r\n- No cost for one full week\r\n\r\nPost Jobs Now at No Cost for One Full Week:\r\n\r\nTryProJob [dot] com\r\n\r\nThanks,\r\nRyan\r\n\r\nTo opt out, please send an email to:  remove [at] pjnmail [dot] com\r\nwith \"remove lyreh.com\" in the subject line.\r\n\r\nPro Job Network\r\n10451 Twin Rivers Rd #279\r\nColumbia, MD  21044', '2020-01-07 15:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(250) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`) VALUES
(1, 'How do I become a Lyreh user?', 'Before you can starting earning or bagging a deal, complete a registration form and verify your email. You’ll be asked to provide your name, email address, phone number and other contact details in order to become a Lyreh user. ', '2020-02-21 07:26:45'),
(2, 'How do I post my item online?', 'Simply, click sell on the home page and follow the steps. Upload the best sellable snaps of your goods, including proof of authenticity when possible. We will require you to include as much details as possible for your advert and by doing so limits the need for a buyer to send you further questions.', '2020-02-21 07:27:04'),
(3, 'Must I pay the asking price for a good or are prices negotiable?', '1.	If you don’t ask, you’ll never get. Buyers and seller can negotiate the final selling price via a DM or take advantage of the negotiation area – submit up to 3 offers per item. ', '2020-02-21 07:27:31'),
(4, 'How do I sell my product?', 'The steps to selling your items are easy. First, list your items, then negotiate with buyers via a DM or review offers. You can accept offers (up to 3 offers per buyer) before the buyer can only select to buy at the full listing price.', '2020-02-21 07:27:50'),
(5, 'How do I buy products on Lyreh?', 'The steps to buying products on Lyreh is simple and straightforward\r\nStep 1: Search items\r\nStep 2: Save items\r\nStep 3: Follow seller\r\nStep 4: Buy now or make an offer\r\nStep 5: Leave feedback\r\nWe always encourage buyers and sellers to leave feedback once they are done with their transactions.\r\n', '2020-02-21 07:28:11'),
(6, 'How do we ensure the quality of our products?', 'We monitor all adverts to ensure that our standards of quality are strictly followed, as well as ask all sellers to post quality photos of the items, including evidence of the authenticity. ', '2020-02-21 07:28:26'),
(7, 'How much commission do I have to pay?', 'Once an item is sold, the seller will be charged a small commission on the total transaction, no matter the value we will charge 5% of the final sale.\r\n “Why continue to pay more to sell your goods?”\r\n', '2020-02-21 07:28:48'),
(8, 'How long will my item be live?', 'Buyers can set the duration to post an item for up to 30 days with full flexibility to remove or edit an item before the 30 days are up, considering someone hasn’t purchased the item.', '2020-02-21 07:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_user_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `other_brand` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `item_image` text NOT NULL,
  `price` int(11) NOT NULL,
  `postage_fee` varchar(100) NOT NULL,
  `material` varchar(250) NOT NULL,
  `other_material` varchar(100) NOT NULL,
  `color` varchar(250) NOT NULL,
  `other_color` varchar(100) NOT NULL,
  `condition` varchar(250) NOT NULL,
  `how_long_to_list_item` varchar(250) NOT NULL,
  `item_views` int(11) NOT NULL,
  `like_user` text NOT NULL,
  `item_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_user_id`, `item_name`, `slug`, `category`, `subcategory`, `product`, `size`, `brand`, `other_brand`, `description`, `item_image`, `price`, `postage_fee`, `material`, `other_material`, `color`, `other_color`, `condition`, `how_long_to_list_item`, `item_views`, `like_user`, `item_status`, `created_at`, `updated_at`) VALUES
(12, 21, 'Testing', 'testing', 3, 0, 35, 185, 0, '3', 'Testing', 'a:1:{i:0;s:41:\"EAA27C44-07B9-479F-9E5F-700B79F77C59.jpeg\";}', 50, '', '', '2', '', '2', '', '8', 47, 'a:1:{i:0;s:2:\"21\";}', 1, '2020-03-03 09:15:39', '2020-03-03 09:15:39'),
(13, 19, 'Testing again ', 'testing-again', 1, 1, 2, 185, 0, '1', 'Testing again. ', 'a:1:{i:0;s:41:\"5B444996-F781-493A-8A9E-DE2E84C10DE9.jpeg\";}', 50, '', '', '1', '', '2', '', '9', 44, 'a:1:{i:0;s:2:\"72\";}', 1, '2020-03-03 11:03:23', '2020-03-03 11:03:23'),
(14, 36, 'Double TWO Paradigm Men\'s Solid Light Purple Pure Cotton Non-Iron Shirt', 'double-two-paradigm-mens-solid-light-purple-pure-cotton-non-iron-shirt', 2, 2, 15, 98, 0, '15', 'Care Instructions: Normal machine wash with cold water\r\nFit Type: Slim Fit\r\nFabric: Pure Cotton Non-Iron,Formal Shirt\r\nSleeve Length: Long Sleeve\r\nColour: Light Purple\r\nStyle: Spread Collar', 'a:4:{i:0;s:10:\"shirt1.jpg\";i:1;s:10:\"shirt2.jpg\";i:2;s:10:\"shirt3.jpg\";i:3;s:10:\"shirt4.jpg\";}', 500, '', '', '2', '', '19', '', '9', 15, '', 2, '2020-03-04 05:23:48', '2020-03-04 05:23:48'),
(15, 36, 'Bar Harbour Men\'s Slim Fit Corduroy Navy Shirt', 'bar-harbour-mens-slim-fit-corduroy-navy-shirt', 2, 2, 15, 103, 0, '11', 'This is a test product number 2', 'a:5:{i:0;s:12:\"shirt2_1.jpg\";i:1;s:12:\"shirt2_2.jpg\";i:2;s:12:\"shirt2_3.jpg\";i:3;s:12:\"shirt2_4.jpg\";i:4;s:12:\"shirt2_5.jpg\";}', 750, '', '', '2', '', '2', '', '10', 3, 'a:1:{i:0;s:2:\"47\";}', 1, '2020-03-04 05:27:45', '2020-03-04 05:27:45'),
(19, 27, 'Men Blue Tapered', 'men-blue-tapered', 2, 2, 9, 0, 5, '', 'Black dark wash 5-pocket mid-rise jeans, clean look with no fade, has a button and zip closure, waistband with belt loops', 'a:1:{i:0;s:10:\"jean11.jpg\";}', 1700, '', '8', '2', '3', '3', '', '10', 0, 'a:1:{i:0;s:2:\"45\";}', 1, '2020-03-17 05:37:38', '2020-03-17 05:37:38'),
(20, 35, 'Men Black Tapered', 'men-black-tapered', 2, 2, 9, 97, 10, '', 'PRODUCT DETAILS \r\nBlack dark wash 5-pocket mid-rise jeans, clean look with no fade, has a button and zip closure, waistband with belt loops\r\n\r\nSize & Fit\r\nTapered Fit\r\nStretchable\r\nThe model (height 6\') is wearing a size 32', 'a:1:{i:0;s:10:\"jean12.jpg\";}', 1400, '', '2', '1', '2', '2', '', '9', 9, 'a:1:{i:0;s:2:\"21\";}', 1, '2020-03-17 05:42:05', '2020-03-17 05:42:05'),
(24, 35, 'Men white shirt', 'men-white-shirt', 2, 2, 15, 99, 14, '', 'Black and grey checked casual shirt, has a spread collar, a full button placket, long sleeves with roll-up tabs, a patch pocket, a curved hem', 'a:1:{i:0;s:10:\"jean13.jpg\";}', 1100, '', '15', '1', '17', '17', '', '10', 6, 'a:1:{i:0;s:2:\"45\";}', 1, '2020-03-17 05:56:54', '2020-03-17 05:56:54'),
(27, 26, 'Testing an ad to make an offer ', 'testing-an-ad-to-make-an-offer', 1, 1, 1, 185, 0, '1', 'Just checking to see the ad offer process ', 'a:1:{i:0;s:41:\"14F89DE3-4662-4FCA-B1C1-EC0299A644BF.jpeg\";}', 60, '', '', '1', '', '1', '', '11', 30, 'a:1:{i:0;s:2:\"72\";}', 1, '2020-03-22 14:52:04', '2020-03-22 14:52:04'),
(28, 38, 'Testing another ', 'testing-another', 1, 1, 5, 185, 0, '1', 'Testing to see where In listing ', 'a:1:{i:0;s:41:\"4A0B7629-CD9C-4BE0-823D-CC1B3C58C6D4.jpeg\";}', 59, '5', '', '1', '', '1', '', '11', 206, 'a:1:{i:0;s:2:\"21\";}', 1, '2020-03-25 13:58:54', '2020-03-25 13:58:54'),
(29, 45, 'Testing', 'testing', 2, 2, 15, 121, 0, '4', 'Testing', 'a:1:{i:0;s:14:\"www_YTS_MX.jpg\";}', 58, '8', '', '4', '', '2', '', '8', 47, 'a:0:{}', 1, '2020-04-25 09:16:06', '2020-04-25 09:16:06'),
(31, 47, 'Pepsi', 'pepsi', 2, 3, 22, 58, 0, '3', 'asdfwdfasdas', 'a:1:{i:0;s:10:\"paypal.png\";}', 100, '100', '', '4', '', '2', '', '11', 48, 'a:1:{i:0;s:2:\"26\";}', 1, '2020-04-30 11:08:05', '2020-04-30 11:08:05'),
(32, 37, 'lion', 'lion', 1, 2, 12, 80, 18, '', 'afdasdas', 'file-20181101-83635-1xcrr391.jpg', 111, '', '15', '', '18', '', '', '10', 0, '', 2, '2020-05-05 15:32:18', '2020-05-05 15:32:18'),
(33, 71, 'Lionjacket', 'lionjacket', 2, 2, 18, 124, 0, '15', 'here is my product best in the town.', 'a:1:{i:0;s:9:\"index.jpg\";}', 1234, '12', '', '9', '', '2', '', '8', 100, 'a:0:{}', 1, '2020-05-15 13:32:09', '2020-05-15 13:32:09'),
(34, 71, 'plastic waterproof jingers', 'plastic-waterproof-jingers', 1, 3, 22, 13, 0, '1', 'test draft we are here for you\r\n', 'a:1:{i:0;s:32:\"file-20181101-83635-1xcrr392.jpg\";}', 1111, '34', '', '11', '', '15', '', '8', 55, 'a:1:{i:0;s:2:\"47\";}', 1, '2020-05-15 13:37:06', '2020-05-15 13:37:06'),
(35, 71, 'liontest', 'liontest', 1, 2, 15, 87, 0, '1', 'sadadadddasdadads', 'a:1:{i:0;s:32:\"file-20181101-83635-1xcrr393.jpg\";}', 1122, '11', '', '2', '', '1', '', '8', 16, 'a:1:{i:0;s:2:\"72\";}', 1, '2020-05-19 10:21:11', '2020-05-19 10:21:11'),
(36, 71, 'testitemproductdamil', 'testitemproductdamil', 1, 2, 0, 87, 0, '1', 'asdfsdfsdfsfsdf', 'a:3:{i:0;s:32:\"file-20181101-83635-1xcrr394.jpg\";i:1;s:43:\"tz-130-hercules-top-speed-cycle-500x500.png\";i:2;s:10:\"index1.jpg\";}', 1122, '12', '', '2', '', '1', '', '8', 109, 'a:1:{i:0;s:2:\"47\";}', 1, '2020-05-20 12:32:33', '2020-05-20 12:32:33'),
(37, 26, 'talha produt', 'talha-produt', 2, 2, 18, 123, 0, '1', 'Talha Product ', 'a:3:{i:0;s:11:\"testing.jpg\";i:1;s:12:\"testing1.jpg\";i:2;s:12:\"testing2.jpg\";}', 45, '5', '', '1', '', '2', '', '8', 0, '', 1, '2020-06-22 16:12:31', '2020-06-22 16:12:31'),
(38, 26, 'newpro', 'newpro', 1, 1, 3, 0, 0, '1', 'sdfsdgkjsdfbgsdhvfbsdvbsygfehfsaudybfsduygfsduygbfdsauybfsduygfsuyfcsdyufvsduyfvsdyufvsduyfvdsfvdsyvfdsyvfydfvyfyvfydvfdyvdysvysdcytysdcsfsadfsdaffdsaf', 'a:1:{i:0;s:22:\"New-listing-set-up.png\";}', 12000, '12000', '', '1', '', '1', '', '8', 10, '', 1, '2020-07-04 14:24:09', '2020-07-04 14:24:09'),
(39, 71, 'sasfdsadfs', 'sasfdsadfs', 1, 2, 14, 95, 0, '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'a:1:{i:0;s:8:\"blog.jpg\";}', 213, '2432', '', '1', '', '1', '', '8', 7, 'a:1:{i:0;s:2:\"75\";}', 1, '2020-07-14 14:21:24', '2020-07-14 14:21:24'),
(40, 75, 'abc', 'abc', 2, 1, 2, 185, 0, '3', 'xyz', 'a:1:{i:0;s:16:\"Professional.jpg\";}', 500, '100', '', '9', '', '2', '', '11', 1, '', 1, '2020-07-22 15:18:16', '2020-07-22 15:18:16'),
(41, 75, 'errr', 'errr', 3, 0, 34, 185, 0, '109', 'yttrfed', 'a:2:{i:0;s:41:\"38f18cdd1d18471c164a2cfd84cbdb3e_800x.png\";i:1;s:14:\"images_(1).jpg\";}', 100, '11', '', '2', '', '4', '', '10', 0, '', 1, '2020-07-22 16:25:46', '2020-07-22 16:25:46'),
(42, 19, 'Testing an item ', 'testing-an-item', 1, 1, 5, 185, 0, '2', 'Testing the option to see how it comes up ', 'a:1:{i:0;s:41:\"E22D3505-ADD7-4B73-B8CC-A798929F56D1.jpeg\";}', 409, '6', '', '1', '', '1', '', '9', 2, '', 1, '2020-07-26 18:30:59', '2020-07-26 18:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `item_feedbacks`
--

CREATE TABLE `item_feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `feedback_text` text NOT NULL,
  `rating` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_feedbacks`
--

INSERT INTO `item_feedbacks` (`id`, `user_id`, `item_id`, `feedback_text`, `rating`, `created_at`) VALUES
(1, 26, 28, 'Good product', '5', '2020-05-13 18:49:34'),
(2, 45, 28, '1 star ', '1', '2020-05-13 18:49:37'),
(3, 45, 31, 'testing with 4 stars', '4', '2020-05-13 19:12:22'),
(4, 72, 34, 'I love this product.', '3', '2020-05-15 13:42:40'),
(5, 45, 34, 'Nice Product.', '5', '2020-05-15 15:48:18'),
(6, 45, 33, 'Testing the feed back \r\n', '4', '2020-05-19 11:31:50'),
(7, 72, 36, 'good', '4', '2020-05-20 17:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `list_items`
--

CREATE TABLE `list_items` (
  `id` int(11) NOT NULL,
  `list_item_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_items`
--

INSERT INTO `list_items` (`id`, `list_item_name`, `created_at`) VALUES
(8, '3', '2019-12-17 12:06:11'),
(9, '7', '2019-12-17 12:06:25'),
(10, '14', '2019-12-17 12:06:32'),
(11, '30', '2019-12-17 12:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` int(11) NOT NULL,
  `registration_subject` varchar(250) NOT NULL,
  `registration_message` text NOT NULL,
  `forgot_password_subject` varchar(250) NOT NULL,
  `forgot_password_message` text NOT NULL,
  `contact_subject` varchar(250) NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `registration_subject`, `registration_message`, `forgot_password_subject`, `forgot_password_message`, `contact_subject`, `contact_message`) VALUES
(4, 'Registration mail', '<img src=\"https://lyreh.com/themes/front/images/logo.png\" alt=\"\" widht=\"50\" style=\"width:100px\" >\r\n<p><strong>Hello {email}</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks for registring with us.</p>\r\n\r\n<p>Please click on link below for confirm id.</p>\r\n\r\n<p><a href=\"http://lyreh.com/activation/id/{activation_id}\">https://lyreh.com/activation/id/{activation_id}</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks</p>\r\n', 'Forgot Password', '<img src=\"https://lyreh.com/themes/front/images/logo.png\" alt=\"\" widht=\"100\" style=\"width:100px\">\r\n<p><strong>Hello {first_name} {last_name}</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Have you Forgotten your password?</p>\r\n\r\n<p>Please click on link below for new password.</p>\r\n\r\n<p><a href=\"http://lyreh.com/forgot_password/id/{activation_id}\">https://lyreh.com/forgot_password/id/{activation_id}</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks</p>\r\n', 'Contact mail', '<p>Hello Admin,</p>\r\n\r\n<p>User have contact with you,</p>\r\n\r\n<p>Here is detail:</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `material_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_name`, `created_at`) VALUES
(1, 'Cashmere', '2019-12-09 10:07:33'),
(2, 'Cotton', '2019-12-09 10:07:33'),
(3, 'Cotton - elasthane', '2019-12-09 10:07:33'),
(4, 'Denim', '2019-12-09 10:07:33'),
(5, 'Exotic leathers', '2019-12-09 10:07:33'),
(6, 'Fur', '2019-12-09 10:07:33'),
(7, 'Glitter', '2019-12-09 10:07:33'),
(8, 'Lace', '2019-12-09 10:07:33'),
(9, 'Leather', '2019-12-09 10:07:33'),
(10, 'Linen', '2019-12-09 10:07:33'),
(11, 'Patent leather', '2019-12-09 10:07:33'),
(12, 'Polyester', '2019-12-09 10:07:33'),
(13, 'Pony-style calfskin', '2019-12-09 10:07:33'),
(14, 'Silk', '2019-12-09 10:07:33'),
(15, 'Sponge', '2019-12-09 10:07:33'),
(16, 'Suede', '2019-12-09 10:07:33'),
(17, 'Synthetic', '2019-12-09 10:07:33'),
(18, 'Tweed', '2019-12-09 10:07:33'),
(19, 'Velvet', '2019-12-09 10:07:33'),
(20, 'Viscose', '2019-12-09 10:07:33'),
(21, 'Wool', '2019-12-09 10:07:33'),
(22, 'Rubber', '2019-12-09 10:07:33'),
(23, 'Plastic', '2019-12-09 10:07:33'),
(24, 'Faux Fur', '2019-12-09 10:07:33'),
(25, 'Other', '2020-01-22 06:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `msg_read` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `receiver_id`, `channel_id`, `message`, `msg_read`, `created_at`) VALUES
(3, 45, 26, 2, 'okay testingback\n', 1, '2020-06-10 16:01:00'),
(7, 26, 45, 2, 'talha\n\n', 1, '2020-06-10 16:09:59'),
(9, 47, 71, 3, 'okok', 1, '2020-06-10 17:04:03'),
(10, 26, 71, 1, 'talha', 1, '2020-06-10 17:53:03'),
(14, 47, 26, 6, 'hello talha', 1, '2020-06-10 17:54:12'),
(16, 26, 47, 6, 'good\n\n', 1, '2020-06-10 17:54:24'),
(18, 72, 71, 7, 'asdadad', 1, '2020-06-10 17:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_alert`
--

CREATE TABLE `notifications_alert` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `receiver_read` int(11) NOT NULL DEFAULT '0',
  `sender_read` int(11) NOT NULL DEFAULT '0',
  `admin_read` int(11) NOT NULL DEFAULT '0',
  `channel_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications_alert`
--

INSERT INTO `notifications_alert` (`id`, `sender_id`, `receiver_id`, `message`, `receiver_read`, `sender_read`, `admin_read`, `channel_id`, `created_at`) VALUES
(1, 71, 75, 'offer-sent-5f185df851a26', 1, 1, 0, NULL, '2020-07-22 22:40:40'),
(2, 71, 75, 'offer-sent-5f18623a5fee0', 1, 1, 0, NULL, '2020-07-22 22:58:50'),
(3, 71, 75, 'offer-sent-5f1868b7c79de', 1, 1, 0, NULL, '2020-07-22 23:26:31'),
(4, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 12:59:43'),
(5, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 15:23:17'),
(6, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 15:27:57'),
(7, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 15:30:39'),
(8, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 15:34:34'),
(9, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 15:36:32'),
(10, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 15:39:26'),
(11, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 15:46:22'),
(12, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 16:06:44'),
(13, 75, 71, 'Burhan purchased <b>sasfdsadfs</b> product', 1, 0, 0, NULL, '2020-07-24 17:17:15'),
(14, 75, 71, 'Burhan purchased <b>liontest</b> product', 1, 0, 0, NULL, '2020-07-24 17:32:49'),
(15, 75, 38, 'Burhan purchased <b>Testing another </b> product', 0, 0, 0, NULL, '2020-07-24 17:32:49'),
(16, 71, 38, 'test purchased <b>Testing another </b> product', 0, 1, 0, NULL, '2020-07-24 17:50:40'),
(17, 75, 71, 'Burhan purchased <b>liontest</b> product', 1, 0, 0, NULL, '2020-07-24 18:33:25'),
(18, 75, 71, 'Burhan purchased <b>sasfdsadfs</b> product', 1, 0, 0, NULL, '2020-07-24 18:43:57'),
(19, 75, 21, 'Burhan purchased <b>Testing</b> product', 0, 0, 0, NULL, '2020-07-24 18:43:57'),
(20, 75, 71, 'Burhan purchased <b>Lionjacket</b> product', 1, 0, 0, NULL, '2020-07-24 18:43:57'),
(21, 76, 0, 'New user Annie has been added', 0, 0, 1, NULL, '2020-07-26 13:38:02'),
(22, 19, 26, 'offer-sent-5f1d87c76c2bc', 1, 1, 0, NULL, '2020-07-26 20:40:23'),
(23, 19, 71, 'offer-sent-5f1d87d38ce57', 1, 1, 0, NULL, '2020-07-26 20:40:35'),
(24, 0, 19, '<b>Test1</b> has sent you a new message.', 0, 0, 0, NULL, '2020-07-27 01:35:40'),
(25, 71, 38, 'test purchased <b>Testing another </b> product', 0, 0, 0, NULL, '2020-07-27 07:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `offerdata`
--

CREATE TABLE `offerdata` (
  `offerId` int(11) NOT NULL,
  `productSlug` text NOT NULL,
  `fromId` int(11) NOT NULL,
  `toId` int(11) NOT NULL,
  `offerPrice` double NOT NULL,
  `offerMessage` text NOT NULL,
  `offerStatus` varchar(255) NOT NULL,
  `offerTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `offerUniqueId` text NOT NULL,
  `cartStatus` varchar(255) NOT NULL DEFAULT 'not_added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offerdata`
--

INSERT INTO `offerdata` (`offerId`, `productSlug`, `fromId`, `toId`, `offerPrice`, `offerMessage`, `offerStatus`, `offerTime`, `offerUniqueId`, `cartStatus`) VALUES
(1, 'sasfdsadfs', 75, 71, 200, 'eqwe', 'declined', '2020-07-22 22:01:29', 'offer-sent-5f1854c9d7ebc', 'not_added'),
(2, 'abc', 71, 75, 400, 'sdad', 'accepted', '2020-07-19 22:19:06', 'offer-sent-5f1858ea2033d', 'added'),
(3, 'abc', 71, 75, 499, 'frefd', 'accepted', '2020-07-19 22:40:40', 'offer-sent-5f185df851a26', 'added'),
(4, 'abc', 71, 75, 700, 'sdee', 'declined', '2020-07-17 22:58:50', 'offer-sent-5f18623a5fee0', 'not_added'),
(5, 'errr', 71, 75, 80, 'da', 'accepted', '2020-07-22 23:26:31', 'offer-sent-5f1868b7c79de', 'added'),
(6, 'newpro', 19, 26, 50, 'Testing ', 'accepted', '2020-07-26 20:40:23', 'offer-sent-5f1d87c76c2bc', 'added'),
(7, 'sasfdsadfs', 19, 71, 54, 'Hrch', 'pending', '2020-07-26 20:40:35', 'offer-sent-5f1d87d38ce57', 'not_added');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(250) NOT NULL,
  `u_id` varchar(100) NOT NULL,
  `item_record` text NOT NULL,
  `billing_fname` varchar(250) NOT NULL,
  `billing_lname` varchar(250) NOT NULL,
  `billing_country` varchar(250) NOT NULL,
  `billing_address` varchar(250) NOT NULL,
  `billing_state` varchar(250) NOT NULL,
  `billing_zip` varchar(250) NOT NULL,
  `billing_email` varchar(250) NOT NULL,
  `billing_phone` varchar(250) NOT NULL,
  `diff_ship_address` varchar(250) NOT NULL DEFAULT '0',
  `shipping_fname` varchar(250) NOT NULL,
  `shipping_lname` varchar(250) NOT NULL,
  `shipping_country` varchar(250) NOT NULL,
  `shipping_address` varchar(250) NOT NULL,
  `shipping_state` varchar(250) NOT NULL,
  `shipping_zip` varchar(250) NOT NULL,
  `shipping_email` varchar(250) NOT NULL,
  `shipping_phone` varchar(250) NOT NULL,
  `order_notes` varchar(250) NOT NULL,
  `total_price` varchar(250) NOT NULL,
  `payment_mode` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `trackingInformation` text NOT NULL,
  `month_at` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `u_id`, `item_record`, `billing_fname`, `billing_lname`, `billing_country`, `billing_address`, `billing_state`, `billing_zip`, `billing_email`, `billing_phone`, `diff_ship_address`, `shipping_fname`, `shipping_lname`, `shipping_country`, `shipping_address`, `shipping_state`, `shipping_zip`, `shipping_email`, `shipping_phone`, `order_notes`, `total_price`, `payment_mode`, `payment_status`, `trackingInformation`, `month_at`, `created_at`) VALUES
(2, '5e777f58843d6', '19', 'a:1:{s:12:\"demo product\";a:3:{s:5:\"price\";s:3:\"234\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"234\";}}', 'Cheryl', 'Brown', 'usa', 'Test ', 'Hfvh', 'Hy13 t7!', 'cherylyn.m.brown@gmail.com', '07495502111', '0', 'Cheryl', 'Brown', 'usa', 'Test ', 'Hfvh', 'Hy13 t7!', 'cherylyn.m.brown@gmail.com', '07495502111', 'Testing ', '234', 'paypal', 'success', 'Track this information', 3, '2020-03-22 15:10:35'),
(3, '5e7f5cfde6496', '39', 'a:1:{s:31:\"Testing an ad to make an offer \";a:3:{s:5:\"price\";s:2:\"60\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"60\";}}', 'Jazi', 'asdasda', '', 'Sabzazar Sabzazar Housing Scheme Phase 1 & 2', 'Punjab', 'asdasdas', 'jjjservices@gmail.com', '012312313', '0', 'Jazi', 'asdasda', '', 'Sabzazar Sabzazar Housing Scheme Phase 1 & 2', 'Punjab', 'asdasdas', 'jjjservices@gmail.com', '012312313', '', '60', 'paypal', 'success', '', 3, '2020-03-28 14:20:16'),
(4, '5e85a3c062ff0', '26', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Test1', 'Testing ', '', 'sdfjksahfk', 'salkjdfh', '54000', 'awaissarwar18@gmail.com', '03224625175', '0', 'Test1', 'Testing ', '', 'sdfjksahfk', 'salkjdfh', '54000', 'awaissarwar18@gmail.com', '03224625175', 'sdaf', '64', 'paypal', 'success', '', 4, '2020-04-02 08:35:53'),
(5, '5e85e36e35a7c', '39', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Jazib', 'Javed', '', 'Johar ', 'Town', '1231231', 'jjjservicess@gmail.com', '92131231231312', '0', 'Jazib', 'Javed', '', 'Johar ', 'Town', '1231231', 'jjjservicess@gmail.com', '92131231231312', 'no notes', '64', 'paypal', 'success', '', 4, '2020-04-02 13:07:48'),
(6, '5ea40ff480462', '47', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Kenneth', 'Burt', 'usa', 'Labore eligendi culp', 'Est tempore labore', '20943', 'fyceny@mailinator.net', '25', '0', 'Kenneth', 'Burt', '', 'Labore eligendi culp', 'Est tempore labore', '20943', 'fyceny@mailinator.net', '25', 'Cupidatat magnam sit', '64', 'card_pay', 'success', '', 4, '2020-04-25 10:31:23'),
(7, '5ea7dd7cc29c9', '45', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'talha', 'khaliq', '', 'Nill', 'Testing', '4400', 'talhakhaliq10@gmail.com', '03444638498', '0', 'talha', 'khaliq', '', 'Nill', 'Testing', '4400', 'talhakhaliq10@gmail.com', '03444638498', '', '64', 'paypal', 'pending', '', 4, '2020-04-28 07:39:13'),
(8, '5ea7ddb13bc6b', '45', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'talha', 'khaliq', '', 'Nill', 'Testing', '4400', 'talhakhaliq10@gmail.com', '03444638498', '0', 'talha', 'khaliq', '', 'Nill', 'Testing', '4400', 'talhakhaliq10@gmail.com', '03444638498', '', '64', 'card_pay', 'success', '', 4, '2020-04-28 07:40:35'),
(9, '5ea7ea991318a', '45', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'talha', 'khaliq', '', 'Testing', 'Testing', '4400', 'talhakhaliq10@gmail.com', '0344638498', '0', 'talha', 'khaliq', '', 'Testing', 'Testing', '4400', 'talhakhaliq10@gmail.com', '0344638498', '', '64', 'card_pay', 'success', '', 4, '2020-04-28 08:35:43'),
(10, '5ea8582417b82', '26', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Blaze', 'Matthews', 'australia', 'Velit et quibusdam m', 'Lorem deserunt offic', '21977', 'zeduben@mailinator.net', '84', '1', 'Imani', 'Dyer', '', 'Temporibus aperiam i', 'Dolorem eligendi ull', '78528', 'nuvibam@mailinator.com', '100', 'Vel delectus fugiat', '64', 'card_pay', 'success', '', 4, '2020-04-28 16:22:19'),
(11, '5ea86eab46745', '47', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Aurelia', 'Terrell', 'uk', 'Earum consequat Ut ', 'Consequatur Atque d', '45423', 'nytiry@mailinator.com', '6', '0', 'Aurelia', 'Terrell', '', 'Earum consequat Ut ', 'Consequatur Atque d', '45423', 'nytiry@mailinator.com', '6', 'Ut non sed pariatur', '64', 'card_pay', 'success', '', 4, '2020-04-28 17:58:27'),
(12, '5ea8c07d1d60b', '47', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Noel', 'Sears', 'canada', 'Reiciendis quisquam ', 'Autem ut ullam modi ', '50073', 'bicin@mailinator.com', '12', '0', 'Noel', 'Sears', '', 'Reiciendis quisquam ', 'Autem ut ullam modi ', '50073', 'bicin@mailinator.com', '12', 'Anim ut est animi ', '64', 'card_pay', 'success', '', 4, '2020-04-28 23:47:41'),
(13, '5ea927c6e9859', '45', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'talha', 'khaliq', '', 'j22/15', 'islamabad ', '4400', 'talhakhaliq10@gmail.com', '03444638498', '0', 'talha', 'khaliq', '', 'j22/15', 'islamabad ', '4400', 'talhakhaliq10@gmail.com', '03444638498', '', '64', 'card_pay', 'success', '', 4, '2020-04-29 07:19:07'),
(14, '5ea9cf1fa134b', '47', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Sean', 'Hensley', 'other', 'Ad ut enim nisi unde', 'Aut delectus aut ex', '94871', 'gewisedi@mailinator.com', '55', '0', 'Sean', 'Hensley', '', 'Ad ut enim nisi unde', 'Aut delectus aut ex', '94871', 'gewisedi@mailinator.com', '55', 'Doloremque laboriosa', '64', 'card_pay', 'success', '', 4, '2020-04-29 19:02:12'),
(15, '5eaa9ea4c8f1d', '26', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Barrett', 'Hobbs', 'canada', 'Modi voluptate dolor', 'Praesentium iste cul', '68594', 'kote@mailinator.com', '98', '1', 'Carson', 'Oneil', '', 'Exercitation et id l', 'Qui laudantium temp', '68237', 'wibaze@mailinator.net', '97', 'Adipisci eligendi el', '64', 'card_pay', 'success', '', 4, '2020-04-30 09:47:32'),
(16, '5eaaa02789c2a', '45', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'talha', 'khaliq', '', 'dadasdasdaasd', 'islabad ', '4200', 'talhakhaliq10@gmail.com', '34446316584', '0', 'talha', 'khaliq', '', 'dadasdasdaasd', 'islabad ', '4200', 'talhakhaliq10@gmail.com', '34446316584', '', '64', 'card_pay', 'success', '', 4, '2020-04-30 09:54:35'),
(17, '5eb1d42b1eb6a', '47', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'adeel', 'riaz', '', 'lahore', 'lahore', '121', 'm.adeel141@gmail.com', '1231231231', '0', 'adeel', 'riaz', '', 'lahore', 'lahore', '121', 'm.adeel141@gmail.com', '1231231231', '', '64', 'card_pay', 'success', '', 5, '2020-05-05 21:03:10'),
(18, '5eb1d4763b38d', '45', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'talha', 'khaliq', '', '1213', 'sassa', '42200', 'talhakhaliq10@gmail.com', '034444656464', '0', 'talha', 'khaliq', '', '1213', 'sassa', '42200', 'talhakhaliq10@gmail.com', '034444656464', '', '200', 'card_pay', 'success', '', 5, '2020-05-05 21:03:41'),
(19, '5eb1d982ec276', '45', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'talha', 'khaliq', '', '123', 'taa', '252452', 'talhakhaliq10@gmail.com', '36135153152152', '0', 'talha', 'khaliq', '', '123', 'taa', '252452', 'talhakhaliq10@gmail.com', '36135153152152', '', '200', 'paypal', 'pending', '', 5, '2020-05-05 21:24:56'),
(20, '5eb2ee8f4e6ad', '26', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Test1', 'Testing ', '', '123 test street ', 'testing ', 'b4ee 6', 'c.brown1@live.co.uk', '1234567890998', '0', 'Test1', 'Testing ', '', '123 test street ', 'testing ', 'b4ee 6', 'c.brown1@live.co.uk', '1234567890998', '', '64', 'paypal', 'pending', '', 5, '2020-05-06 17:08:04'),
(21, '5ebb83e83763d', '45', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'talha', 'khaliq', '', '2jghj', 'khkjh', '45200', 'talhakhaliq10@gmail.com', '02121646464', '0', 'talha', 'khaliq', '', '2jghj', 'khkjh', '45200', 'talhakhaliq10@gmail.com', '02121646464', '', '200', 'card_pay', 'success', '', 5, '2020-05-13 05:22:54'),
(22, '5ebe967d7a27f', '42', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'testw', 'QA', '', 'asdasd', 'dasd', 'adada', 'softwaretester1122@gmail.com', '12312323', '0', 'testw', 'QA', '', 'asdasd', 'dasd', 'adada', 'softwaretester1122@gmail.com', '12312323', '', '64', 'card_pay', 'success', '', 5, '2020-05-15 13:18:21'),
(23, '5ebe9baa7e0e9', '72', 'a:1:{s:26:\"plastic waterproof jingers\";a:3:{s:5:\"price\";s:4:\"1111\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1111\";}}', 'qa', 'test', '', 'dad', 'dsasadasd', '1231', 'softwaretester910@gmail.com', '1123123123123', '0', 'qa', 'test', '', 'dad', 'dsasadasd', '1231', 'softwaretester910@gmail.com', '1123123123123', '', '1145', 'card_pay', 'success', 'I am changing this tracking information', 5, '2020-05-15 13:40:24'),
(24, '5ebeb8eb46e1f', '72', 'a:1:{s:26:\"plastic waterproof jingers\";a:3:{s:5:\"price\";s:4:\"1111\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1111\";}}', 'qa', 'test', '', 'asdasdasd', 'dasasdas', '123123132', 'softwaretester910@gmail.com', '3232312312', '0', 'qa', 'test', '', 'asdasdasd', 'dasasdas', '123123132', 'softwaretester910@gmail.com', '3232312312', '', '1145', 'card_pay', 'success', 'safasdfasdfasdf', 5, '2020-05-15 15:45:45'),
(25, '5ec3b062a8fae', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'test', 'qa', '', 'sadads', 'dsddd', '12312312', 'softwaretester1122@gmail.com', '123123133', '0', 'test', 'qa', '', 'sadads', 'dsddd', '12312312', 'softwaretester1122@gmail.com', '123123133', '', '64', 'card_pay', 'success', '', 5, '2020-05-19 10:10:19'),
(26, '5ec3c3302ee19', '45', 'a:1:{s:10:\"Lionjacket\";a:3:{s:5:\"price\";s:4:\"1234\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1234\";}}', 'talha', 'khaliq', '', '35453,jn,j', 'ygyjg', '5454', 'talhakhaliq10@gmail.com', '034446338498', '0', 'talha', 'khaliq', '', '35453,jn,j', 'ygyjg', '5454', 'talhakhaliq10@gmail.com', '034446338498', '', '1246', 'card_pay', 'pending', 'I am putting information now', 5, '2020-05-19 11:30:55'),
(27, '5ec56fbce483c', '72', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1122\";}}', 'qa', 'test', '', 'sdfsdf', 'sdfsdf', '2323', 'softwaretester910@gmail.com', '23234234', '0', 'qa', 'test', '', 'sdfsdf', 'sdfsdf', '2323', 'softwaretester910@gmail.com', '23234234', '', '1134', 'card_pay', 'success', '', 5, '2020-05-20 17:59:21'),
(28, '5ec57056608fc', '72', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'qa', 'test', '', 'adasd', 'adsdsada', '12323', 'softwaretester910@gmail.com', '23232', '0', 'qa', 'test', '', 'adasd', 'adsdsada', '12323', 'softwaretester910@gmail.com', '23232', '', '64', 'card_pay', 'success', '', 5, '2020-05-20 18:01:15'),
(29, '5ed773f2784c1', '26', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1122\";}}', 'Nicholas', 'Herman', 'other', 'Animi at magnam ver', 'Cupidatat voluptate ', '53101', 'gotuhaw@mailinator.net', '90', '1', 'Mari', 'Horn', '', 'Autem animi incidun', 'Laboris elit labore', '85140', 'wutaxip@mailinator.com', '30', 'Voluptatem eveniet ', '1134', 'card_pay', 'success', '', 6, '2020-06-03 09:57:39'),
(30, '5ed774d8dee64', '26', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1122\";}}', 'Tanek', 'Sherman', 'canada', 'Adipisicing cum veri', 'Ut qui magnam dicta ', '39553', 'qoxa@mailinator.net', '7', '0', 'Tanek', 'Sherman', '', 'Adipisicing cum veri', 'Ut qui magnam dicta ', '39553', 'qoxa@mailinator.net', '7', 'Animi enim neque a ', '1134', 'card_pay', 'success', '', 6, '2020-06-03 10:01:31'),
(31, '5ed778c0a6645', '26', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Deanna', 'Frye', 'india', 'Necessitatibus earum', 'In veniam aliquid u', '90177', 'rowepazyqi@mailinator.net', '9', '1', 'Cheryl', 'Soto', '', 'Libero mollit numqua', 'Ipsum reprehenderit', '36898', 'jihowyj@mailinator.com', '93', 'Qui impedit nisi au', '64', 'card_pay', 'success', '', 6, '2020-06-03 10:18:03'),
(32, '5ed77b800a46f', '26', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1122\";}}', 'Donovan', 'Mendez', 'india', 'Vel ad ex nihil rem ', 'Doloremque dolorem e', '93505', 'gope@mailinator.net', '15', '1', 'Kareem', 'Horn', '', 'Eaque sed blanditiis', 'Doloribus non dolore', '56995', 'jefyhu@mailinator.com', '2', 'Magna eos aut cum pa', '1134', 'card_pay', 'success', '', 6, '2020-06-03 10:29:50'),
(33, '5ed77ed515f24', '26', 'a:1:{s:10:\"Lionjacket\";a:3:{s:5:\"price\";s:4:\"1234\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1234\";}}', 'Mary', 'Woodard', 'india', 'Iure et qui qui sapi', 'Veniam vel eum iste', '66922', 'senov@mailinator.net', '34', '0', 'Mary', 'Woodard', '', 'Iure et qui qui sapi', 'Veniam vel eum iste', '66922', 'senov@mailinator.net', '34', 'In culpa sint sed qu', '1246', 'card_pay', 'success', '', 6, '2020-06-03 10:43:52'),
(34, '5ed7d5551fb4b', '45', 'a:1:{s:26:\"plastic waterproof jingers\";a:3:{s:5:\"price\";s:4:\"1111\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1111\";}}', 'talha', 'khaliq', '', '135135', 'isb', '4200', 'talhakhaliq10@gmail.com', '0344638498', '0', 'talha', 'khaliq', '', '135135', 'isb', '4200', 'talhakhaliq10@gmail.com', '0344638498', '', '1145', 'card_pay', 'success', '', 6, '2020-06-03 16:53:33'),
(35, '5ed8ddf0d0701', '26', 'a:1:{s:7:\"Testing\";a:3:{s:5:\"price\";s:2:\"58\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"58\";}}', 'Ursula', 'Reyes', 'other', 'Cillum officia et au', 'Est facilis iusto u', '27036', 'midexunyq@mailinator.net', '35', '1', 'Rebecca', 'Roman', '', 'Laudantium dolorem ', 'Dicta omnis iusto oc', '83198', 'wekihy@mailinator.net', '79', 'Numquam aut itaque a', '66', 'card_pay', 'success', '', 6, '2020-06-04 11:41:52'),
(36, '5ed8e354d89f3', '45', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'talha', 'khaliq', '', '12123', 'adasd', '5525', 'talhakhaliq10@gmail.com', '06568468746', '0', 'talha', 'khaliq', '', '12123', 'adasd', '5525', 'talhakhaliq10@gmail.com', '06568468746', '', '64', 'card_pay', 'success', '', 6, '2020-06-04 12:05:14'),
(37, '5ed8e7e943401', '26', 'a:1:{s:7:\"Testing\";a:3:{s:5:\"price\";s:2:\"58\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"58\";}}', 'Maggy', 'Middleton', 'other', 'Anim laborum magni p', 'Aut ut voluptas sed ', '98739', 'xunuluwo@mailinator.net', '1', '0', 'Maggy', 'Middleton', '', 'Anim laborum magni p', 'Aut ut voluptas sed ', '98739', 'xunuluwo@mailinator.net', '1', 'In ipsum praesentium', '66', 'card_pay', 'success', '', 6, '2020-06-04 12:24:31'),
(38, '5ed8f18595e5d', '45', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'talha', 'khaliq', '', '545', '5135', '4545312', 'talhakhaliq10@gmail.com', '54534634634', '0', 'talha', 'khaliq', '', '545', '5135', '4545312', 'talhakhaliq10@gmail.com', '54534634634', '', '200', 'card_pay', 'success', '', 6, '2020-06-04 13:05:46'),
(39, '5ed8f287d04d2', '26', 'a:1:{s:7:\"Testing\";a:3:{s:5:\"price\";s:2:\"58\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"58\";}}', 'Test1', 'Testing ', '', '654564', 'Testing', '4400', 'c.brown1@live.co.uk', '645564646', '0', 'Test1', 'Testing ', '', '654564', 'Testing', '4400', 'c.brown1@live.co.uk', '645564646', '', '66', 'card_pay', 'success', '', 6, '2020-06-04 13:10:19'),
(40, '5ed8f64937a51', '47', 'a:1:{s:7:\"Testing\";a:3:{s:5:\"price\";s:2:\"58\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"58\";}}', 'Keaton', 'Levy', 'india', 'Nostrud magni qui eu', 'Asperiores quia quis', '59131', 'fuvix@mailinator.net', '46', '0', 'Keaton', 'Levy', '', 'Nostrud magni qui eu', 'Asperiores quia quis', '59131', 'fuvix@mailinator.net', '46', 'Aliquip quae qui off', '66', 'card_pay', 'success', '', 6, '2020-06-04 13:25:44'),
(41, '5ed8f5f064e20', '72', 'a:1:{s:10:\"Lionjacket\";a:3:{s:5:\"price\";s:4:\"1234\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1234\";}}', 'qa', 'test', '', 'dfgf', 'dfgdfg', '123123', 'softwaretester910@gmail.com', '234213423423423', '0', 'qa', 'test', '', 'dfgf', 'dfgdfg', '123123', 'softwaretester910@gmail.com', '234213423423423', '', '1246', 'card_pay', 'success', '', 6, '2020-06-04 13:26:00'),
(42, '5ed8f8ea4d588', '47', 'a:1:{s:31:\"Testing an ad to make an offer \";a:3:{s:5:\"price\";s:2:\"60\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"60\";}}', 'Piper', 'Fuentes', 'other', 'Sunt rerum sit hic ', 'Pariatur Sit accus', '53067', 'xyxi@mailinator.com', '67', '1', 'Kessie', 'Maddox', '', 'Voluptatum inventore', 'Laborum Deleniti qu', '56579', 'fepobe@mailinator.com', '90', 'Rerum nulla sunt vol', '60', 'card_pay', 'success', '', 6, '2020-06-04 13:37:01'),
(43, '5ed8f9ef2ff71', '26', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Test1', 'Testing ', '', 'QAD', 'SDASD', '4400', 'c.brown1@live.co.uk', '6354544', '0', 'Test1', 'Testing ', '', 'QAD', 'SDASD', '4400', 'c.brown1@live.co.uk', '6354544', '', '200', 'paypal', 'pending', '', 6, '2020-06-04 13:41:30'),
(44, '5ed8fa14754c3', '26', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Test1', 'Testing ', '', 'QAD', 'SDASD', '4400', 'c.brown1@live.co.uk', '6354544', '0', 'Test1', 'Testing ', '', 'QAD', 'SDASD', '4400', 'c.brown1@live.co.uk', '6354544', '', '200', 'card_pay', 'success', '', 6, '2020-06-04 13:42:12'),
(45, '5ef0d9de96aac', '26', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"2\";s:8:\"subtotal\";s:4:\"2244\";}}', 'Test1', 'Testing ', '', 'aadwsd', 'ddadad', '4222', 'c.brown1@live.co.uk', '.0655646464', '0', 'Test1', 'Testing ', '', 'aadwsd', 'ddadad', '4222', 'c.brown1@live.co.uk', '.0655646464', 'Testing', '2256', 'card_pay', 'success', '', 6, '2020-06-22 16:20:15'),
(46, '5ef383d51bc24', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'test', 'qa', '', 'sqawdawsqd', 'sdfsdfsdff', '123123', 'softwaretester1122@gmail.com', '132123123', '0', 'test', 'qa', '', 'sqawdawsqd', 'sdfsdfsdff', '123123', 'softwaretester1122@gmail.com', '132123123', '', '64', 'card_pay', 'success', '', 6, '2020-06-24 16:50:10'),
(47, '5f044706280d8', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Mollie', 'Ellis', 'india', 'In cupiditate cum ad', 'Voluptatem id esse', '14443', 'gajo@mailinator.com', '77', '1', 'Shafira', 'Kirkland', '', 'Sint culpa ex ut v', 'Exercitation beatae ', '88097', 'vucuxefeba@mailinator.com', '84', 'Reprehenderit offic', '64', 'paypal', 'pending', '', 7, '2020-07-07 09:57:41'),
(48, '5f04471fbd11a', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Mollie', 'Ellis', 'india', 'In cupiditate cum ad', 'Voluptatem id esse', '14443', 'gajo@mailinator.com', '77', '1', 'Shafira', 'Kirkland', '', 'Sint culpa ex ut v', 'Exercitation beatae ', '88097', 'vucuxefeba@mailinator.com', '84', 'Reprehenderit offic', '64', 'card_pay', 'success', '', 7, '2020-07-07 10:10:55'),
(49, '5f044ea43b859', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Hilda', 'Faulkner', 'india', 'Laudantium beatae d', 'Voluptates ut praese', '55764', 'halijegu@mailinator.com', '76', '1', 'Orson', 'Padilla', '', 'Labore est neque qui', 'Vitae ut quo minima ', '81038', 'jihur@mailinator.com', '34', 'Possimus sit repell', '64', 'card_pay', 'success', '', 7, '2020-07-07 10:30:51'),
(50, '5f0450b828136', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Alfonso', 'Valentine', 'canada', 'Impedit nulla adipi', 'Voluptatum ipsam do ', '40477', 'pupe@mailinator.com', '50', '1', 'Ramona', 'Rasmussen', '', 'Voluptatum minus con', 'Iure dolore aut sunt', '26355', 'rymudetaty@mailinator.com', '73', 'Tenetur voluptates e', '200', 'stripe', 'pending', '', 7, '2020-07-07 10:40:30'),
(51, '5f045124b8332', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Bernard', 'Buck', 'uk', 'Repellendus Autem a', 'Eum dolores error qu', '20096', 'siti@mailinator.com', '73', '0', 'Bernard', 'Buck', '', 'Repellendus Autem a', 'Eum dolores error qu', '20096', 'siti@mailinator.com', '73', 'Cum omnis officia ne', '200', 'card_pay', 'success', '', 7, '2020-07-07 10:41:46'),
(52, '5f0453271d1b9', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Jamalia', 'Sawyer', 'other', 'Similique sint quo ', 'Praesentium ducimus', '27224', 'zuhisago@mailinator.com', '31', '1', 'Addison', 'Lopez', '', 'Neque aut excepteur ', 'Iste adipisci porro ', '11719', 'zygeresiv@mailinator.com', '24', 'Nostrum nesciunt el', '200', 'stripe', 'pending', '', 7, '2020-07-07 10:49:21'),
(53, '5f04540f52210', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Fleur', 'Bond', 'usa', 'Sed rerum nisi id cu', 'Exercitation est eni', '13265', 'sivuvylowu@mailinator.com', '87', '0', 'Fleur', 'Bond', '', 'Sed rerum nisi id cu', 'Exercitation est eni', '13265', 'sivuvylowu@mailinator.com', '87', 'Voluptatem dolorum ', '200', 'stripe', 'pending', '', 7, '2020-07-07 10:53:20'),
(54, '5f04548316c9c', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Macaulay', 'Willis', 'india', 'In quis laborum offi', 'Quas libero qui inci', '84591', 'vadato@mailinator.com', '64', '0', 'Macaulay', 'Willis', '', 'In quis laborum offi', 'Quas libero qui inci', '84591', 'vadato@mailinator.com', '64', 'Est aliquip temporib', '200', 'stripe', 'pending', '', 7, '2020-07-07 10:55:15'),
(55, '5f04552bf0fb3', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Anastasia', 'Mccarty', 'india', 'Reprehenderit facere', 'Et et autem ad est q', '81410', 'gecom@mailinator.com', '55', '1', 'Zeph', 'Vasquez', '', 'Quos quam libero iur', 'Ab sed enim mollit q', '47937', 'wotigyveby@mailinator.com', '36', 'Quis perspiciatis e', '200', 'stripe', 'pending', '', 7, '2020-07-07 10:58:06'),
(56, '5f0464c1bc863', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Xena', 'Burnett', 'australia', 'Explicabo Minim vol', 'Lorem non anim eos e', '94772', 'vyfevebeg@mailinator.com', '1', '1', 'Leila', 'Brady', '', 'Dolor et quidem aut ', 'Eum libero reiciendi', '71503', 'tyju@mailinator.com', '27', 'Minim nostrum volupt', '200', 'stripe', 'pending', '', 7, '2020-07-07 12:04:48'),
(57, '5f0466da040ad', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Simone', 'Sellers', 'india', 'Distinctio Explicab', 'Ex enim deleniti quo', '35419', 'basilipito@mailinator.com', '36', '0', 'Simone', 'Sellers', '', 'Distinctio Explicab', 'Ex enim deleniti quo', '35419', 'basilipito@mailinator.com', '36', 'Nihil rem culpa lau', '200', 'stripe', 'pending', '', 7, '2020-07-07 12:13:51'),
(58, '5f04709ddf093', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Jenette', 'Perez', 'australia', 'Sed laboriosam impe', 'Numquam voluptate om', '83564', 'resepaxaba@mailinator.com', '96', '0', 'Jenette', 'Perez', '', 'Sed laboriosam impe', 'Numquam voluptate om', '83564', 'resepaxaba@mailinator.com', '96', 'Suscipit odio velit ', '200', 'stripe', 'success', '', 7, '2020-07-07 12:55:09'),
(59, '5f0476b660b9d', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Camille', 'Wright', 'other', 'Qui quam non eos hic', 'Reiciendis ea quasi ', '59985', 'falys@mailinator.com', '25', '0', 'Camille', 'Wright', '', 'Qui quam non eos hic', 'Reiciendis ea quasi ', '59985', 'falys@mailinator.com', '25', 'Elit blanditiis et ', '200', 'stripe', 'success', '', 7, '2020-07-07 13:21:06'),
(60, '5f0476f3942f2', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Rinah', 'Frye', 'australia', 'Sint assumenda incid', 'Quia ut dolore velit', '67685', 'kifywaquqi@mailinator.com', '9', '0', 'Rinah', 'Frye', '', 'Sint assumenda incid', 'Quia ut dolore velit', '67685', 'kifywaquqi@mailinator.com', '9', 'Cumque sit dolore cu', '200', 'stripe', 'pending', '', 7, '2020-07-07 13:22:16'),
(61, '5f04775eb8d69', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Armand', 'Leblanc', 'usa', 'Consectetur aut in ', 'Maxime voluptatum el', '86804', 'lupab@mailinator.com', '12', '1', 'Lilah', 'Sims', '', 'Exercitationem et vo', 'Minus ad veritatis c', '94782', 'veja@mailinator.com', '41', 'Adipisci sapiente re', '200', 'stripe', 'pending', '', 7, '2020-07-07 13:23:55'),
(62, '5f0478847e4af', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Desiree', 'Kennedy', 'other', 'Sit sequi nihil cul', 'Qui ut labore quia s', '58709', 'fopidum@mailinator.com', '91', '1', 'Todd', 'Kidd', '', 'Voluptas sed ut ut n', 'Excepturi voluptatem', '34165', 'hovy@mailinator.com', '94', 'Eos do sit iusto te', '200', 'stripe', 'pending', '', 7, '2020-07-07 13:28:49'),
(63, '5f04793ea666e', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Rhoda', 'Rich', 'india', 'Impedit officia mag', 'Voluptate nemo volup', '90343', 'zewuwyg@mailinator.com', '79', '1', 'Linda', 'Dejesus', '', 'Velit debitis susci', 'Voluptas quam molest', '98645', 'tyzyxutetu@mailinator.com', '65', 'Ut est neque commodo', '200', 'stripe', 'pending', '', 7, '2020-07-07 13:32:07'),
(64, '5f047b119fd04', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Kuame', 'Jacobson', 'australia', 'Beatae omnis sit ve', 'Rerum dolor elit do', '94957', 'hixefiz@mailinator.com', '35', '1', 'Anne', 'Foster', '', 'Minus nulla vitae pr', 'Culpa eos earum pra', '87293', 'licygukep@mailinator.com', '45', 'Recusandae Harum do', '200', 'stripe', 'pending', '', 7, '2020-07-07 13:40:06'),
(65, '5f0480c846860', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Jade', 'Glenn', 'uk', 'Sit est ea dolores ', 'Non illo possimus e', '40571', 'dukefam@mailinator.com', '40', '0', 'Jade', 'Glenn', '', 'Sit est ea dolores ', 'Non illo possimus e', '40571', 'dukefam@mailinator.com', '40', 'Deserunt nulla odio ', '200', 'stripe', 'pending', '', 7, '2020-07-07 14:04:04'),
(66, '5f0481edcfda1', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Echo', 'Greer', 'india', 'Aliquip minima tempo', 'Exercitationem est q', '44751', 'gysenuzuq@mailinator.com', '14', '1', 'Kellie', 'Cash', '', 'Quia id neque ipsum', 'Sint optio ex sequ', '64409', 'jizalev@mailinator.com', '9', 'Consequatur ea eos ', '200', 'stripe', 'pending', '', 7, '2020-07-07 14:08:58'),
(67, '5f048211b4366', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Wynne', 'Richard', 'india', 'Explicabo Laborum ', 'Lorem magnam laborum', '23418', 'bypa@mailinator.com', '15', '1', 'Solomon', 'Cook', '', 'Occaecat consequatur', 'Et eaque exercitatio', '97491', 'xesedazuhy@mailinator.com', '2', 'Maiores lorem perfer', '200', 'stripe', 'pending', '', 7, '2020-07-07 14:09:32'),
(68, '5f048ba934f8f', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Tasha', 'Moon', 'india', 'Rerum sint et corpo', 'Culpa aute autem asp', '57489', 'qavesav@mailinator.com', '57', '0', 'Tasha', 'Moon', '', 'Rerum sint et corpo', 'Culpa aute autem asp', '57489', 'qavesav@mailinator.com', '57', 'Fugit sunt ipsam s', '200', 'stripe', 'pending', '', 7, '2020-07-07 14:50:33'),
(69, '5f048bd93dd32', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Jaden', 'Maldonado', 'uk', 'Dolor tempora iste m', 'Nisi ut maxime est v', '29510', 'dedehyfyd@mailinator.com', '71', '0', 'Jaden', 'Maldonado', '', 'Dolor tempora iste m', 'Nisi ut maxime est v', '29510', 'dedehyfyd@mailinator.com', '71', 'Sint officia dolore', '200', 'stripe', 'pending', '', 7, '2020-07-07 14:51:17'),
(70, '5f048c4f7b4a7', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Shellie', 'Gonzalez', 'india', 'Consequuntur tenetur', 'Cupiditate distincti', '86036', 'habakyh@mailinator.com', '55', '0', 'Shellie', 'Gonzalez', '', 'Consequuntur tenetur', 'Cupiditate distincti', '86036', 'habakyh@mailinator.com', '55', 'Sed vel id deserunt', '200', 'stripe', 'success', '', 7, '2020-07-07 14:53:15'),
(71, '5f048ceba0ce0', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Hermione', 'Becker', 'canada', 'Rerum placeat autem', 'Deserunt voluptatum ', '79839', 'latoneduwy@mailinator.com', '87', '1', 'Holly', 'Lester', '', 'Exercitationem aliqu', 'Consequuntur velit ', '10579', 'gugulysyqo@mailinator.com', '44', 'Unde et et doloribus', '200', 'stripe', 'success', '', 7, '2020-07-07 14:56:23'),
(72, '5f048d5d99940', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Elmo', 'Velez', 'other', 'Possimus in culpa c', 'Ad qui incididunt co', '23099', 'manyd@mailinator.com', '83', '1', 'Ursula', 'Buckley', '', 'Sit cum aut repelle', 'Velit sed ipsa et n', '13041', 'wocigigev@mailinator.com', '55', 'Tenetur asperiores l', '200', 'stripe', 'success', '', 7, '2020-07-07 14:57:43'),
(73, '5f048dc8d000c', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Lysandra', 'Tucker', 'india', 'Maxime et maiores et', 'Qui veniam nulla es', '98233', 'taji@mailinator.com', '33', '0', 'Lysandra', 'Tucker', '', 'Maxime et maiores et', 'Qui veniam nulla es', '98233', 'taji@mailinator.com', '33', 'Est voluptas quis nu', '200', 'stripe', 'success', '', 7, '2020-07-07 14:59:32'),
(74, '5f0490b8019e2', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Sacha', 'Day', 'india', 'Nisi soluta enim ex ', 'Non excepteur ipsum', '59022', 'tecajefud@mailinator.com', '51', '1', 'Silas', 'Gould', '', 'Qui est ut blanditii', 'Saepe dolore consect', '58080', 'xovugideq@mailinator.com', '40', 'Ex cupidatat neque c', '64', 'stripe', 'pending', '', 7, '2020-07-07 15:12:01'),
(75, '5f0491398ee46', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Yeo', 'Mclean', 'canada', 'Minim harum incidunt', 'Dignissimos enim des', '29714', 'puji@mailinator.com', '25', '1', 'Megan', 'Cotton', '', 'Officiis sit fugiat ', 'Pariatur Vel atque ', '60753', 'pywoluha@mailinator.com', '98', 'Dicta id velit deser', '64', 'stripe', 'pending', '', 7, '2020-07-07 15:14:09'),
(76, '5f049172a4cee', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Lance', 'Morrison', 'india', 'Ullamco sed beatae v', 'Sed magna enim nostr', '54677', 'myxote@mailinator.com', '14', '0', 'Lance', 'Morrison', '', 'Ullamco sed beatae v', 'Sed magna enim nostr', '54677', 'myxote@mailinator.com', '14', 'Magnam quo amet dic', '64', 'stripe', 'success', '', 7, '2020-07-07 15:15:13'),
(77, '5f0491ceea2da', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'David', 'Valdez', 'other', 'Eos molestias incidu', 'Mollitia omnis disti', '22648', 'dehuqiwob@mailinator.com', '50', '1', 'Sydnee', 'Ratliff', '', 'Elit non minus at u', 'Labore vitae cupidat', '26939', 'wedyn@mailinator.com', '24', 'Fugit non necessita', '64', 'stripe', 'pending', '', 7, '2020-07-07 15:16:43'),
(78, '5f04922883709', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Jonas', 'Vincent', 'australia', 'Odit magna molestias', 'Et id minim reicien', '75946', 'tamixiqite@mailinator.com', '19', '1', 'Robert', 'Barrett', '', 'Qui fuga Amet ex s', 'Assumenda aliquip an', '82563', 'guzycix@mailinator.com', '89', 'Exercitation ut cons', '64', 'stripe', 'success', '', 7, '2020-07-07 15:18:15'),
(79, '5f0492f3ab8e5', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Sigourney', 'Hutchinson', 'canada', 'Commodi voluptatibus', 'Sapiente aut cupidat', '18170', 'cepibusine@mailinator.com', '20', '1', 'Macaulay', 'Mccormick', '', 'Ut aut omnis cum ips', 'Aute ea aute cum con', '53297', 'woposoje@mailinator.com', '13', 'Rerum sint exceptur', '200', 'stripe', 'pending', '', 7, '2020-07-07 15:21:45'),
(80, '5f0493f1a01be', '71', 'a:1:{s:5:\"Pepsi\";a:3:{s:5:\"price\";s:3:\"100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"100\";}}', 'Aspen', 'Dillard', 'australia', 'Aliqua Consequuntur', 'Velit illo laborum a', '60080', 'gegyl@mailinator.com', '25', '0', 'Aspen', 'Dillard', '', 'Aliqua Consequuntur', 'Velit illo laborum a', '60080', 'gegyl@mailinator.com', '25', 'Modi dolor eos sed q', '200', 'stripe', 'success', '', 7, '2020-07-07 15:25:53'),
(81, '5f0494ce93254', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Zenaida', 'Christensen', 'australia', 'Natus deserunt magna', 'Eaque saepe autem vo', '50526', 'bolejakosy@mailinator.com', '67', '1', 'Gillian', 'Houston', '', 'Omnis earum commodi ', 'Sint laboris lorem l', '19646', 'jywowu@mailinator.com', '13', 'Consequatur quos al', '64', 'stripe', 'success', '', 7, '2020-07-07 15:29:31'),
(82, '5f0498ee78fa3', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Warren', 'Leonard', 'usa', 'Inventore do nisi co', 'Et velit assumenda u', '75307', 'jiky@mailinator.com', '32', '1', 'Hermione', 'Madden', '', 'Voluptas iusto dolor', 'Et officiis cum cum ', '78545', 'biwam@mailinator.com', '11', 'Illum omnis eum ab ', '64', 'stripe', 'pending', '', 7, '2020-07-07 15:47:05'),
(83, '5f04993831fc2', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Naomi', 'England', 'india', 'Consequatur dolorib', 'Consectetur aut vol', '45293', 'nekof@mailinator.com', '31', '1', 'Avye', 'Parks', '', 'Explicabo Velit qua', 'Corporis ullamco com', '50408', 'kavewix@mailinator.com', '24', 'Rerum deleniti eveni', '64', 'stripe', 'pending', '', 7, '2020-07-07 15:48:16'),
(84, '5f04997d3091a', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Farrah', 'Cochran', 'canada', 'Nemo voluptatem aspe', 'Ratione commodi duis', '35722', 'cexuvun@mailinator.com', '96', '0', 'Farrah', 'Cochran', '', 'Nemo voluptatem aspe', 'Ratione commodi duis', '35722', 'cexuvun@mailinator.com', '96', 'Labore recusandae V', '64', 'stripe', 'success', '', 7, '2020-07-07 15:49:30'),
(85, '5f058238ba8e5', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Victor', 'Bradley', 'other', 'Molestiae rerum qui ', 'Alias qui excepteur ', '31172', 'veli@mailinator.com', '13', '0', 'Victor', 'Bradley', '', 'Molestiae rerum qui ', 'Alias qui excepteur ', '31172', 'veli@mailinator.com', '13', 'Repudiandae ut quos ', '64', 'stripe', 'pending', '', 7, '2020-07-08 08:22:24'),
(86, '5f05828ec94ca', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Jamalia', 'Morton', 'uk', 'Eum consectetur des', 'Amet quasi suscipit', '22232', 'beja@mailinator.com', '28', '1', 'Violet', 'Chaney', '', 'Rerum error obcaecat', 'Nam quisquam aut tem', '29747', 'ruqekexa@mailinator.com', '4', 'Et ut mollitia neces', '64', 'stripe', 'pending', '', 7, '2020-07-08 08:23:50'),
(87, '5f0585bd4a184', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Taylor', 'Gillespie', 'usa', 'Optio et libero cup', 'Quas quo et fugiat ', '48045', 'nyfy@mailinator.com', '75', '0', 'Taylor', 'Gillespie', '', 'Optio et libero cup', 'Quas quo et fugiat ', '48045', 'nyfy@mailinator.com', '75', 'Ut nihil iure rem re', '64', 'stripe', 'pending', '', 7, '2020-07-08 08:37:37'),
(88, '5f05b3574a487', '26', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1122\";}}', 'Quemby', 'Jennings', 'australia', 'Omnis esse culpa s', 'Earum reprehenderit ', '53406', 'tufyfafahe@mailinator.com', '98', '1', 'Wallace', 'Pace', '', 'Similique ex odio ap', 'Tempora dolores illu', '73648', 'wigyhij@mailinator.com', '41', 'Assumenda excepteur ', '1134', 'stripe', 'success', '', 7, '2020-07-08 11:51:57'),
(89, '5f05b9b4bbb64', '26', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1122\";}}', 'Brian', 'Curry', 'uk', 'Lorem nisi sit rerum', 'Iusto ratione corrup', '58097', 'rojuti@mailinator.com', '34', '0', 'Brian', 'Curry', '', 'Lorem nisi sit rerum', 'Iusto ratione corrup', '58097', 'rojuti@mailinator.com', '34', 'Voluptas voluptate d', '1134', 'stripe', 'pending', '', 7, '2020-07-08 12:19:15'),
(90, '5f05b9f017de5', '26', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1122\";}}', 'Evangeline', 'Cabrera', 'canada', 'Minus sequi aliquip ', 'Velit labore incidu', '56925', 'nipuwakamu@mailinator.com', '5', '0', 'Evangeline', 'Cabrera', '', 'Minus sequi aliquip ', 'Velit labore incidu', '56925', 'nipuwakamu@mailinator.com', '5', 'Proident fuga Sit ', '1134', 'stripe', 'success', '', 7, '2020-07-08 12:20:10'),
(91, '5f0605d23810c', '71', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:3:\"200\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"200\";}}', 'test', 'qa', '', 'sadfasdf', 'sadfasd', '23412', 'softwaretester1122@gmail.com', '123412342134', '0', 'test', 'qa', '', 'sadfasdf', 'sadfasd', '23412', 'softwaretester1122@gmail.com', '123412342134', 'asdfasdfasdfsadf', '1224', 'stripe', 'success', '', 7, '2020-07-08 17:44:13'),
(92, '5f060af507972', '71', 'a:1:{s:20:\"testitemproductdamil\";a:3:{s:5:\"price\";s:4:\"1100\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1100\";}}', 'test', 'qa', '', 'sadfasdfasdf', 'asdfasdf', '234234', 'softwaretester1122@gmail.com', '23123412341234', '0', 'test', 'qa', '', 'sadfasdfasdf', 'asdfasdf', '234234', 'softwaretester1122@gmail.com', '23123412341234', '', '1112', 'stripe', 'pending', '', 7, '2020-07-08 18:06:05'),
(93, '5f0820f0d192a', '71', 'a:1:{s:31:\"Testing an ad to make an offer \";a:3:{s:5:\"price\";s:2:\"55\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"55\";}}', 'test', 'qa', '', 'sdfsfasfsdf', 'fsdsfsfs', '54000', 'softwaretester1122@gmail.com', '2131231313', '0', 'test', 'qa', '', 'sdfsfasfsdf', 'fsdsfsfs', '54000', 'softwaretester1122@gmail.com', '2131231313', '', '55', 'stripe', 'pending', '', 7, '2020-07-10 08:06:31'),
(94, '5f08960ed0012', '75', 'a:1:{s:26:\"plastic waterproof jingers\";a:3:{s:5:\"price\";s:4:\"1000\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1000\";}}', 'Burhan', 'Azhar', '', 'addwdw', 'dwqdw', 'dwqqw', 'burhanazhar111@gmail.com', '233223323', '0', 'Burhan', 'Azhar', '', 'addwdw', 'dwqdw', 'dwqqw', 'burhanazhar111@gmail.com', '233223323', 'ewgfedwwef', '1034', 'stripe', 'success', 'Testing Tracking Information.', 7, '2020-07-10 16:24:18'),
(95, '5f11cd37df22c', '19', 'a:1:{s:7:\"Testing\";a:3:{s:5:\"price\";s:2:\"58\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"58\";}}', 'Cheryl', 'Brown', '', '107 Ravensbourne Avenue', 'Kent', 'BR2 0AZ', 'cherylyn.m.brown@gmail.com', '07495502111', '0', 'Cheryl', 'Brown', '', '107 Ravensbourne Avenue', 'Kent', 'BR2 0AZ', 'cherylyn.m.brown@gmail.com', '07495502111', '', '66', 'stripe', 'pending', '', 7, '2020-07-17 16:12:19'),
(96, '5f159048b9135', '75', 'a:1:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:1:\"3\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:1:\"3\";}}', 'Burhan', 'Azhar', '', 'qwerqwrqwer', 'qeqeqe', '54000', 'burhanazhar111@gmail.com', '1234535356', '0', 'Burhan', 'Azhar', '', 'qwerqwrqwer', 'qeqeqe', '54000', 'burhanazhar111@gmail.com', '1234535356', '', '4879', 'stripe', 'pending', '', 7, '2020-07-20 12:39:01'),
(97, '5f15932615a7e', '75', 'a:1:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:1:\"3\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:1:\"3\";}}', 'Burhan', 'Azhar', '', 'asdasdad', 'asdasdad', '2342423', 'burhanazhar111@gmail.com', '12313131313', '0', 'Burhan', 'Azhar', '', 'asdasdad', 'asdasdad', '2342423', 'burhanazhar111@gmail.com', '12313131313', '', '4879', 'stripe', 'pending', '', 7, '2020-07-20 12:51:08'),
(98, '5f15936d0dfd4', '75', 'a:1:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:1:\"3\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:1:\"3\";}}', 'Burhan', 'Azhar', '', 'werweerwe', 'werwer', '54000', 'burhanazhar111@gmail.com', '34324234234', '0', 'Burhan', 'Azhar', '', 'werweerwe', 'werwer', '54000', 'burhanazhar111@gmail.com', '34324234234', '', '4879', 'stripe', 'pending', '', 7, '2020-07-20 12:52:11'),
(99, '5f1593d74ecac', '75', 'a:1:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:1:\"3\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:1:\"3\";}}', 'Burhan', 'Azhar', '', 'dwewe', 'rwerwerwre', '540000', 'burhanazhar111@gmail.com', '342342423423', '0', 'Burhan', 'Azhar', '', 'dwewe', 'rwerwerwre', '540000', 'burhanazhar111@gmail.com', '342342423423', '', '4879', 'stripe', 'success', '', 7, '2020-07-20 12:53:53'),
(100, '5f16d5a393654', '75', 'a:1:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:3:\"213\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"213\";}}', 'Burhan', 'Azhar', '', 'sdfsf', 'sdfsdf', '4353', 'burhanazhar111@gmail.com', '234124234', '0', 'Burhan', 'Azhar', '', 'sdfsf', 'sdfsdf', '4353', 'burhanazhar111@gmail.com', '234124234', '', '2645', 'stripe', 'pending', '', 7, '2020-07-21 11:48:44'),
(101, '5f16d7f18e645', '75', 'a:1:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:3:\"213\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"213\";}}', 'Burhan', 'Azhar', '', 'wqdasd', 'asdasd', '3455646', 'burhanazhar111@gmail.com', '4323424', '0', 'Burhan', 'Azhar', '', 'wqdasd', 'asdasd', '3455646', 'burhanazhar111@gmail.com', '4323424', '', '2645', 'stripe', 'pending', '', 7, '2020-07-21 11:56:48'),
(102, '5f16d8c504e37', '75', 'a:1:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:3:\"213\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"213\";}}', 'Burhan', 'Azhar', '', 'werwer', 'werwerwe', '23424', 'burhanazhar111@gmail.com', '42342342', '0', 'Burhan', 'Azhar', '', 'werwer', 'werwerwe', '23424', 'burhanazhar111@gmail.com', '42342342', '', '2645', 'stripe', 'pending', '', 7, '2020-07-21 12:00:14'),
(103, '5f16d92425c99', '75', 'a:1:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:3:\"213\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"213\";}}', 'Burhan', 'Azhar', '', 'adadads', 'dfsadada', '12312312', 'burhanazhar111@gmail.com', '123121233', '0', 'Burhan', 'Azhar', '', 'adadads', 'dfsadada', '12312312', 'burhanazhar111@gmail.com', '123121233', '', '2645', 'stripe', 'pending', '', 7, '2020-07-21 12:02:04'),
(104, '5f17ee949dc34', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Keane', 'Logan', 'uk', 'Qui qui laboriosam ', 'Repellendus Est in ', '46600', 'kuzate@mailinator.com', '83', '1', 'Dieter', 'Mann', '', 'Corrupti animi ea ', 'Animi consequat Co', '75865', 'facydasoge@mailinator.com', '38', 'Voluptatum anim exer', '64', 'stripe', 'pending', '', 7, '2020-07-22 07:46:40'),
(105, '5f17ef2e18f2b', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Alexa', 'King', 'india', 'Asperiores blanditii', 'Sequi laborum deseru', '37991', 'zeby@mailinator.com', '35', '0', 'Alexa', 'King', '', 'Asperiores blanditii', 'Sequi laborum deseru', '37991', 'zeby@mailinator.com', '35', 'Itaque deleniti ipsu', '64', 'stripe', 'pending', '', 7, '2020-07-22 07:48:47'),
(106, '5f17f11e744dc', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Ulla', 'Becker', 'uk', 'At dolores dolore er', 'Nihil eiusmod tenetu', '26057', 'xekaciroj@mailinator.com', '24', '1', 'Britanni', 'Mclaughlin', '', 'Rerum aut blanditiis', 'Soluta nulla consequ', '32128', 'laqum@mailinator.com', '24', 'Distinctio Officia ', '64', 'stripe', 'pending', '', 7, '2020-07-22 07:56:33'),
(107, '5f1aff704b10b', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Sheila', 'Bernard', 'australia', 'Inventore esse ut ve', 'Sed et optio neque ', '66056', 'nipetocuq@mailinator.com', '54', '1', 'Craig', 'Fields', '', 'Tempore do sit porr', 'Qui officia consecte', '20251', 'qiqim@mailinator.com', '38', 'Est excepturi conseq', '64', 'stripe', 'success', '', 7, '2020-07-24 15:34:34'),
(108, '5f1affd47975a', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Hadassah', 'Foreman', 'other', 'Dignissimos quia fac', 'Exercitation suscipi', '65738', 'ruru@mailinator.com', '37', '0', 'Hadassah', 'Foreman', '', 'Dignissimos quia fac', 'Exercitation suscipi', '65738', 'ruru@mailinator.com', '37', 'Ratione accusantium ', '64', 'stripe', 'success', '', 7, '2020-07-24 15:36:32'),
(109, '5f1b0088c1a32', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Blaine', 'Mcdaniel', 'australia', 'Non et minim officia', 'Et sunt eum ab earum', '92627', 'quvo@mailinator.com', '37', '1', 'Buckminster', 'Perry', '', 'Cupiditate dolore ip', 'Reprehenderit dolor', '54944', 'pyroxokeqi@mailinator.com', '54', 'This is a test description', '64', 'stripe', 'success', '', 7, '2020-07-24 15:39:26'),
(110, '5f1b022c7acb5', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Noelani', 'House', 'other', 'Cillum rerum nulla r', 'Quidem beatae cupida', '42752', 'maxojuv@mailinator.com', '49', '1', 'Penelope', 'Armstrong', '', 'Perspiciatis incidu', 'Veniam expedita tot', '25139', 'noqohutetu@mailinator.com', '98', 'Distinctio Adipisic', '64', 'stripe', 'success', '', 7, '2020-07-24 15:46:22'),
(111, '5f1b06ea4eda9', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Ina', 'Allison', 'uk', 'Aute quia explicabo', 'Odio odit ut dolorem', '98339', 'nitexop@mailinator.com', '75', '0', 'Ina', 'Allison', '', 'Aute quia explicabo', 'Odio odit ut dolorem', '98339', 'nitexop@mailinator.com', '75', 'Tempora vero volupta', '64', 'stripe', 'success', '', 7, '2020-07-24 16:06:44'),
(112, '5f1b1753cf0bd', '75', 'a:1:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:3:\"213\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"213\";}}', 'Xaviera', 'Harding', 'uk', 'Ea occaecat hic tota', 'Sit eu ullam et eaqu', '17951', 'lisyxeke@mailinator.com', '76', '0', 'Xaviera', 'Harding', '', 'Ea occaecat hic tota', 'Sit eu ullam et eaqu', '17951', 'lisyxeke@mailinator.com', '76', 'B testing', '2645', 'stripe', 'success', '', 7, '2020-07-24 17:17:15'),
(113, '5f1b1b15f219c', '75', 'a:2:{s:8:\"liontest\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1122\";}s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Kevyn', 'Madden', 'other', 'Fuga Dolor beatae v', 'Amet nihil autem do', '37297', 'gowawel@mailinator.com', '11', '1', 'Gregory', 'Sosa', '', 'Reiciendis est id u', 'Consectetur ducimus', '96712', 'dynicazyq@mailinator.com', '70', 'Amet laborum exerci', '1197', 'stripe', 'success', '', 7, '2020-07-24 17:32:49');
INSERT INTO `orders` (`id`, `order_id`, `u_id`, `item_record`, `billing_fname`, `billing_lname`, `billing_country`, `billing_address`, `billing_state`, `billing_zip`, `billing_email`, `billing_phone`, `diff_ship_address`, `shipping_fname`, `shipping_lname`, `shipping_country`, `shipping_address`, `shipping_state`, `shipping_zip`, `shipping_email`, `shipping_phone`, `order_notes`, `total_price`, `payment_mode`, `payment_status`, `trackingInformation`, `month_at`, `created_at`) VALUES
(114, '5f1b1f3e73cb5', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Regan', 'Guthrie', 'india', 'Occaecat lorem nisi ', 'Natus quo nobis temp', '92555', 'xudaj@mailinator.com', '99', '1', 'Macy', 'Marquez', '', 'Quia magni hic fugia', 'Mollitia esse nihil', '83983', 'zujykipym@mailinator.com', '28', 'Officiis non volupta', '64', 'stripe', 'success', '', 7, '2020-07-24 17:50:40'),
(115, '5f1b29559b90b', '75', 'a:1:{s:8:\"liontest\";a:3:{s:5:\"price\";s:4:\"1122\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1122\";}}', 'Dylan', 'Blevins', 'australia', 'Ipsum necessitatibus', 'Eius occaecat dolore', '15033', 'jubo@mailinator.com', '52', '0', 'Dylan', 'Blevins', '', 'Ipsum necessitatibus', 'Eius occaecat dolore', '15033', 'jubo@mailinator.com', '52', 'Dolor veniam consec', '1133', 'stripe', 'success', '', 7, '2020-07-24 18:33:25'),
(116, '5f1b2ba85dc93', '75', 'a:3:{s:10:\"sasfdsadfs\";a:3:{s:5:\"price\";s:3:\"213\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:3:\"213\";}s:7:\"Testing\";a:3:{s:5:\"price\";s:2:\"58\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"58\";}s:10:\"Lionjacket\";a:3:{s:5:\"price\";s:4:\"1234\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:4:\"1234\";}}', 'Velma', 'Bright', 'australia', 'Eum quis praesentium', 'Sunt voluptas omnis', '38375', 'malihufeju@mailinator.com', '38', '0', 'Velma', 'Bright', '', 'Eum quis praesentium', 'Sunt voluptas omnis', '38375', 'malihufeju@mailinator.com', '38', 'Quod rerum aut aliqu', '3957', 'stripe', 'success', '', 7, '2020-07-24 18:43:57'),
(117, '5f1e8073f2d01', '71', 'a:1:{s:16:\"Testing another \";a:3:{s:5:\"price\";s:2:\"59\";s:3:\"qty\";s:1:\"1\";s:8:\"subtotal\";s:2:\"59\";}}', 'Hayden', 'Larson', 'uk', 'Velit aut non sit om', 'Aut est aperiam del', '52043', 'softwaretester1122@gmail.com', '42', '1', 'Nelle', 'Conner', '', 'Sint enim elit sun', 'Quia error omnis odi', '91740', 'byfi@mailinator.com', '70', 'This is first testing order', '64', 'stripe', 'success', '', 7, '2020-07-27 07:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `icon` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `page_type` varchar(250) NOT NULL,
  `children` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `show_in_menu` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `icon`, `slug`, `page_type`, `children`, `sort`, `show_in_menu`, `created_at`, `updated_at`) VALUES
(5, 'About', '<p>The simple questions I had - Why should high-end pieces lie unused in our wardrobes? How can I profit from preloved goods that have recyclability? How can I trust the goods I&rsquo;m purchasing are authentic if they not bought from the store? Where can I find that out of season piece or that sold out item the bloggers are posting?</p>\r\n\r\n<p>From conception, Lyreh is encouraging consumers to have a smarter and sustainable approach to fashion while still looking glam. I wanted an easily accessible, user-friendly medium to buy and resell luxury brands, without being charge a bomb.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lyreh offers simple steps to get your goods online and accessible to members. Our unique model provides users with a catalogue of luxury goods, whether used, vintage or new &ndash; using a peer to peer service. You can quickly sell pre-owned luxury garments for an infinitesimal fee, and earn, from pieces that would otherwise collect dust.</p>\r\n\r\n<p>Our authentication service offers buyers the opportunity to authentic an item they&rsquo;ve purchased whereby they&rsquo;re able to ensure the quality and authenticity of their item before you receive it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Can&rsquo;t find that dress, bag or shoes? Sold out? Want what that blogger hasn&rsquo;t tagged? We offer a concierge service and will notify you when we&rsquo;ve tracked the item down.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lyreh is dedicated to high-quality service. To keep it that way we monitor each listing, and each item is verified by our platform.</p>\r\n\r\n<p>Once an item is sold, the seller will be charged a small commission on the total transaction, no matter the value and earning sellers more profit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Can&rsquo;t find an item? Use our concierge service&hellip;</strong></p>\r\n\r\n<p>Save time and avoid frustration by delegating the search to our concierge service. Currently, we are the only online platform, which provides a concierge for buyers.</p>\r\n\r\n<p>It&rsquo;s really simple:</p>\r\n\r\n<ol>\r\n	<li>Submit a photo</li>\r\n	<li>Provide as much info as possible of the item you&rsquo;re searching</li>\r\n</ol>\r\n\r\n<p>Once we&rsquo;ve tracked it down, you&rsquo;ll be able to buy it directly from us and it&rsquo;ll be shipped to you within days</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'fa-file', 'about', 'dynamic', 0, 1, 1, '2019-11-06 12:45:52', '2019-11-06 12:45:52'),
(11, 'Home', '', 'fa-home', 'home', 'static', 0, 0, 1, '2019-11-11 06:22:23', '2019-11-11 06:22:23'),
(12, 'Buy', '', 'fa-search', 'buy', 'static', 0, 2, 1, '2019-11-14 06:14:45', '2019-11-14 06:14:45'),
(13, 'Sell', '', 'fa-tag', 'sell', 'static', 0, 3, 1, '2019-11-14 06:14:45', '2019-11-14 06:14:45'),
(14, 'Faq', '', 'fa-question', 'faq', 'static', 0, 4, 0, '2019-11-18 12:53:25', '2019-11-18 12:53:25'),
(19, 'Privacy Policy', '<p><strong>LYREH LIMITED PRIVACY POLICY </strong><br />\r\n&nbsp;<br />\r\nLast Updated &amp; Effective Date: February 2020</p>\r\n\r\n<p><strong>Summary:</strong></p>\r\n\r\n<p>We like to keep things simple but we also have an obligation to make our Privacy Policy clear for you, the customer.</p>\r\n\r\n<p>Whilst we would love you to read this all, we thought we would highlight the main pointers from our Policy for you here.</p>\r\n\r\n<ul>\r\n	<li>Yes, we secure all of the information you submit to us like it&rsquo;s our own. And we only ask you for information that is important to complete a payment, or to keep you up-to-date.</li>\r\n</ul>\r\n\r\n<p>??We hate spam, and take GDPR seriously. If you have any questions or concerns in this regard please contact - [contact@lyreh.com]</p>\r\n\r\n<p><strong>Preliminary: </strong><br />\r\nThis Privacy Policy explains how information about you is collected, used and disclosed by Lyreh (&ldquo;<strong>LYREH</strong>&rdquo;).</p>\r\n\r\n<p>LYREH operates a network platform through which it provides marketplace services to Vendors to list luxury goods on the Website for sale to Customers (the &ldquo;Services&rdquo;).</p>\r\n\r\n<p>This Privacy Policy describes how LYREH collects, uses, and discloses information when you visit this Website and all other platforms that integrate the Services.<br />\r\n&nbsp;</p>\r\n\r\n<p>We may change this Privacy Policy from time to time. If we make changes, we will notify you by revising the date at the top of the policy. We encourage you to check back regularly to stay informed about our information practices and the choices available to you.<br />\r\n&nbsp;<br />\r\n&nbsp;A. <strong>COLLECTION OF INFORMATION</strong><br />\r\nA.1 <strong>Information We Collect Automatically through the Services</strong>: In order to help provide recommendations and promoted content that is relevant to your interests, we automatically collect certain information when you access websites and mobile applications that incorporate the Services. This information reflects information about the websites you visit, the mobile applications you use, and how you interact with our Services.</p>\r\n\r\n<p><br />\r\nA.2 <strong>Browser and Device Information</strong>: We collect information about your browser and device, including your browser type, device type, IP address, user agent string, operating system, mobile carrier, and identifiers assigned to your browser or device.<br />\r\n&nbsp;</p>\r\n\r\n<p>A.3 <strong>Usage Data</strong>: We collect information about the websites and mobile applications you visit that integrate our Services and about the websites that you visit immediately prior to visiting a website that integrates our Services, including the date and time your browser or device accesses such websites and the specific pages accessed.<br />\r\n&nbsp;</p>\r\n\r\n<p>A.4 <strong>Click Data</strong>: We collect information about the content and ads that you click on within the Services.&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>A.5 <strong>Information<em> </em>You Provide</strong><br />\r\nA.5.1 You may be able to customize your experience by logging in to LYREH network through a social media service. If you do this, we will have access to certain information from that service, such as your name, profile information, likes, shares, posts, etc., in accordance with the authorization procedures determined by the social media service you use to login.<br />\r\n&nbsp;</p>\r\n\r\n<p>A.5.2 You also may be able to customize your LYREH experience by registering as a user directly with the LYREH and selecting topics of interest to customize your experience. If you do this, we will have access to the information you provide in doing so, including your name, contact information, and any preferences or interests you select. I do not know how this works so if someone asks me what it means I am unable to answer. What does this mean please?<br />\r\n&nbsp;</p>\r\n\r\n<p>B. <strong>INFORMATION WE COLLECT FROM OTHER SOURCES</strong><br />\r\nB.1 We may also obtain information from other sources and combine that with information we collect through our Services. For example, we may collect information about you from third parties, including our business partners, other advertising companies, and publicly available sources.<br />\r\n&nbsp;</p>\r\n\r\n<p>B.2&nbsp;<strong>Cookies and Other Tracking Technologies We Use to Collect Information</strong></p>\r\n\r\n<p>B.2.1 We use various technologies to collect information, including cookies, web beacons, web storage, unique device identifiers, and similar technologies. Cookies are small data files stored on your hard drive or in device memory that help us to tailor recommendations and promoted content to your preferences over time. For example, we may use your web browsing information to show you specific recommendations and sponsored recommendations that we think will be of particular interest to you. We may also collect information using web beacons (also known as &quot;tracking pixels&quot;). Web beacons are electronic images that may be used in our Services and help perform a variety of functions, including delivering cookies, counting visits, and understanding usage. For more information about cookies, and how to disable them, please see &quot;Your Choices&quot; below or refer to our Cookie Policy.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;<strong>C. USE OF INFORMATION</strong><br />\r\nC.1 We use the information we collect to determine what content is most relevant to you, to disseminate recommendations and promoted content to you, and to understand, measure, and report on how users interact with the Services. We also use the information we collect from the Service to maintain and constantly improve upon the Services.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;<strong>C.2&nbsp;Sharing Of Information</strong><br />\r\n&nbsp;C.2.1&nbsp;We may share the information we collect as follows or as otherwise described in this Privacy Policy:</p>\r\n\r\n<ul>\r\n	<li>With vendors, consultants and other service providers who need access to such information to carry out work or perform services on our behalf;</li>\r\n	<li>In response to a request for information if we believe disclosure is in accordance with, or required by, any applicable law, rule, regulation or legal process;</li>\r\n	<li>If we believe your actions are inconsistent with our user agreements or policies, or to protect the rights, property or safety of LYREH or others;</li>\r\n	<li>In connection with, or during negotiations of, any merger, sale of company assets, financing or acquisition of all or a portion of our business by another company;</li>\r\n	<li>Between and among LYREH and any current or future parent, subsidiary and/or affiliated company; and</li>\r\n	<li>With your consent or at your direction.</li>\r\n</ul>\r\n\r\n<p>C.2.2 We may also share aggregated or de-identified information, which cannot reasonably be used to identify you. For example, we may share de-identified information with advertisers that partner with us to help them understand how well their advertisements performed.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>D.&nbsp;YOUR CHOICES<br />\r\nD.1 Opting out of Personalized Content</strong><br />\r\nD.1.1 You may opt out of receiving personalized content and advertisements from LYREH by clicking the &ldquo;Opt Out&rdquo; button at the top of this page. When you opt out, we will set a cookie on your browser that tells us not to personalize recommendations or promoted content on that browser or to record information about the sites you are visiting. If you use multiple devices and/or multiple browsers, you need to opt out on each device and browser you use, even if you login to LYREH using a social media account.</p>\r\n\r\n<p><br />\r\nD.1.2 Please note that even after you have opted out, you will still see LYREH recommendations and promoted content, but these recommendations and promoted content will not be personalized based on the sites you visit.</p>\r\n\r\n<p><br />\r\nD.1.3 Note that if you clear your cookies, you will need to opt out again.</p>\r\n\r\n<p><br />\r\nD.1.4 For information about interest-based ads, or to opt out of having your web browsing information used for interest-based advertising purposes by companies that participate in the Digital Adverting Alliance, please visit <a href=\"http://www.aboutads.info/choices\" target=\"_blank\">www.aboutads.info/choices</a>. If you are in the EU, you may opt out at the European Digital Advertising Alliance, <a href=\"http://www.youronlinechoices.eu/\" target=\"_blank\">http://www.youronlinechoices.eu/</a>.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Cookies</strong><br />\r\n&nbsp;D.1.5 Most web browsers are set to accept cookies by default. If you prefer, you can usually choose to set your browser to remove or reject browser cookies. Please note that if you choose to remove or reject cookies, this could affect the availability and functionality of some websites.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>E. INFORMATION COLLECTED ON OUR WEBSITE</strong></p>\r\n\r\n<p>&nbsp;E.1 Advertisers and publishers may provide contact information through our Site to find out more about LYREH, be contacted by a LYREH representative, or to start working with LYREH. LYREH (and its agents and service providers) may use this information to respond to your request, to send you marketing communications, and for business purposes such as marketing and research.</p>\r\n\r\n<p>E.2 We will also use the information we collect from advertisers and publishers for invoicing and billing purposes. We will not rent or sell this information to other companies. You may opt out of receiving promotional emails from LYREH by following the instructions in those emails or by emailing us at <a href=\"mailto:support@racheljenkins.online\">[Email]</a>. If you opt out, we may still send you non-promotional communications, such as those about your account or our ongoing business relations.</p>\r\n\r\n<p><br />\r\nE.3 LYREH may also work with third parties that collect data on our Site and on other websites to serve you targeted ads. You can opt out of interest-based ads by companies that participate in the Digital Advertising Alliance opt out program by visiting about <a href=\"http://optout.aboutads.info/\">http://optout.aboutads.info/</a>. If you are in the EU, you may opt out at the European Digital Advertising Alliance, <a href=\"http://www.youronlinechoices.eu/\" target=\"_blank\">http://www.youronlinechoices.eu/</a>.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>F.DATA RETENTION</strong></p>\r\n\r\n<p>F.1 We store the information we collect for as long as is necessary for the purpose(s) for which we originally collected it. We may retain certain information for legitimate business purposes or as required by law.<br />\r\n&nbsp;<br />\r\n<strong>G.&nbsp;DATA TRANSFERS</strong><br />\r\nG.1 LYREH is based in the United Kingdom. As such, we and our service providers may transfer your information to, or store or access it in, jurisdictions that may not provide equivalent levels of data protection as your home jurisdiction. We will take steps to ensure that your personal data receives an adequate level of protection in the jurisdictions in which we process it.<br />\r\n&nbsp;<br />\r\n<strong>H.&nbsp;HOW WE PROTECT THE INFORMATION WE COLLECT</strong><br />\r\nH.1&nbsp;We take reasonable measures to help protect the information we collect from loss, theft, misuse and unauthorized access, disclosure, alteration and destruction. However, no transmission over the internet or electronic storage can be completely secure, so we cannot guarantee the absolute security of any data.<br />\r\n&nbsp;<br />\r\n<strong>I. &nbsp;EEA RESIDENTS</strong><br />\r\nI.1&nbsp;If you are a resident of the European Economic Area (&ldquo;EEA&rdquo;), you have certain rights and protections under the law regarding the processing of your personal data.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>I.2 <em>Legal Basis for Processing</em></strong><br />\r\nI.2.1 If you are a resident of the EEA, when we process your personal data we will only do so in the following situations:</p>\r\n\r\n<ul>\r\n	<li>We need to use your personal data to perform our responsibilities under our contract with you (e.g., processing payments for and providing the services you have requested).</li>\r\n	<li>We have a legitimate interest in processing your personal data. For example, we may process your personal data to provide content and advertisements that may be of interest to you, to communicate with you about changes to our Services, and to provide, secure, and improve our Services.</li>\r\n	<li>There is another applicable lawful basis under which we are permitted to process your personal data.</li>\r\n</ul>\r\n\r\n<p><strong>I.3 Data Subject Requests</strong><br />\r\nI.3.1 If you are a resident of the EEA, you have the right to access personal data we hold about you and to ask that your personal data be corrected, erased, or transferred. You may also have the right to object to, or request that we restrict, certain processing. If you would like to exercise any of these rights, please contact us at [email].<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>I.4&nbsp;Questions or Complaints</strong><br />\r\n&nbsp;I.4.1 If you are a resident of the EEA and have a concern about our processing of personal data that we are not able to resolve, you have the right to lodge a complaint with the data privacy authority where you reside. For contact details of your local Data Protection Authority, please see: <a href=\"http://ec.europa.eu/justice/data-protection/article-29/structure/data-protection-authorities/index_en.htm\" target=\"_blank\">http://ec.europa.eu/justice/data-protection/article-29/structure/data-protection-authorities/index_en.htm</a>.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>J.&nbsp;CONTACT US</strong><br />\r\nJ.1 If you have any questions or need to contact us, please do so at contact@lyreh.com or at:&nbsp;20-22 Wenlock Road, London , N1 7GU</p>\r\n', 'fa fa-items', 'privacy-policy', 'dynamic', 0, 4, 0, '2019-12-09 13:12:32', '2019-12-09 13:12:32');
INSERT INTO `pages` (`id`, `title`, `content`, `icon`, `slug`, `page_type`, `children`, `sort`, `show_in_menu`, `created_at`, `updated_at`) VALUES
(20, 'Legal Stuff', '<p><strong>A. PRELIMNARY</strong></p>\r\n\r\n<p>A.1 This document is an electronic record. This electronic record is computer system<br />\r\ngenerated and does not require a physical or electronic signature.</p>\r\n\r\n<p>A.2 PLEASE READ THESE TERMS OF USE CAREFULLY PRIOR TO USE OF OR<br />\r\nREGISTRATION ON THE DOMAIN [WEBSITE NAME], THE WEB-<br />\r\nAPPLICATION NAMED &lsquo;[ ]&rsquo; ON ANDROID AND IOS OR ANY OTHER MANNER<br />\r\nOF ACCESSING OUR ONLINE SERVICES (&ldquo;WEBSITE&rdquo;). ANY USE OF THE<br />\r\nWEBSITE SHALL SIGNIFY YOUR UNDERSTANDING, VERIFICATION AND<br />\r\nACCEPTANCE OF THESE TERMS AND YOU SHALL BE CONSIDERED<br />\r\nLEGALLY BOUND IN THIS REGARD. BY ACCEPTING THESE TERMS OF USE<br />\r\nYOU ALSO AGREED TO BE BOUND BY OTHER LYREH POLICIES INCLUDING<br />\r\nBUT NOT LIMITED TO OUR PRIVACY POLICY.</p>\r\n\r\n<p><strong>B. GENERAL</strong></p>\r\n\r\n<p>B.1 The Website is owned by Lyreh Ltd a private limited company incorporated under the<br />\r\nlaws of the United Kingdom with its registered office at 20-22 Wenlock Road, London,<br />\r\nEngland, N1 7GU.</p>\r\n\r\n<p>B.2 The following terms and conditions shall apply to your use of the Website (&ldquo;Terms of<br />\r\nUse&rdquo;). These Terms of Use may be updated from time to time subject to our own policies or<br />\r\nchange in applicable law. Lyreh shall not be obliged to notify you of such changes and your<br />\r\ncontinued use of the Website shall signify that you have understood and accepted such new or<br />\r\nupdated Terms of Use.</p>\r\n\r\n<p>B.3 All data usage, internet, telephony, hardware, software, maintenance and such associated<br />\r\ncharges connected with Your accessing the Website or the Services, shall be wholly to Your<br />\r\naccount and shall not be borne in any way, shape or form by Lyreh.</p>\r\n\r\n<p>B.4 Where You access Service that is provided against payment of a fee, You agree that You<br />\r\nwill be responsible for all such payments as well as any associated taxes. Where you chose to<br />\r\npay such fee through a credit card, bank transfer or other similar methodology, You warrant<br />\r\nthat You are authorised to use such payment services and that You will indemnify and hold<br />\r\nharmless Lyreh against any unauthorised use of such services by You.</p>\r\n\r\n<p>B.5 By using the Website you will be contracting with Lyreh, unless specified otherwise, and<br />\r\nthese Terms of Use as well as the privacy policy of the Website will constitute the mutual -<br />\r\nlegally binding - obligations of both You and Lyreh.</p>\r\n\r\n<p>B.6 The terms &ldquo;You&rdquo;, &ldquo;Your&rdquo; or &ldquo;User&rdquo; is a reference to you the person using this website for<br />\r\nany purpose whatsoever, whether you are a natural or legal person irrespective of whether or<br />\r\nnot you have registered on the Website. These terms include both customers who wish to<br />\r\navail of such goods and services that may be listed by vendors and service providers on the<br />\r\nWebsite or avail such other services that may be provided by vendors on the Website<br />\r\n(&ldquo;Customers&rdquo;) as well as vendors who actually list and provide such goods and/or services<br />\r\non the Website to Customers (&ldquo;Services&rdquo;) to Customers (&ldquo;Vendors&rdquo;), unless expressly<br />\r\nspecified otherwise.</p>\r\n\r\n<p>B.7 In exchange for your compliance with our Terms of Use, privacy policy and other terms<br />\r\nand conditions, incorporated by reference, we grant you a non-exclusive, non-transferable<br />\r\nprivilege to enter and use the Website.</p>\r\n\r\n<p><strong>C. THE SERVICE</strong></p>\r\n\r\n<p><br />\r\nC.1 This Website is a marketplace platform enabling Customers to connect with Vendors,<br />\r\nwho are independent contractors and not affiliated or employed by Lyreh, and provide<br />\r\nServices.</p>\r\n\r\n<p>C.1A Customers understand that Lyreh is not providing the Services directly and that the<br />\r\nWebsite is only a marketplace to connect Customers with Vendors. All transactions related to<br />\r\nthe provision of Services are by and between Customers and Vendors directly. Lyreh is not a</p>\r\n\r\n<p>direct party to any such transactions but is only a marketplace service provider and payment<br />\r\nfacilitation service provider. This is with exception to the Concierge Services, which will be<br />\r\nprovided by Lyreh directly to Customers. Further, both parties are advised to exercise<br />\r\nindependent due diligence when dealing with other parties on the Website.</p>\r\n\r\n<p>C.2 The Service is not chargeable to Customers, except in the case of the Customers availing<br />\r\nof a customized concierge service that includes engaging Lyreh to locate a particular item or<br />\r\nto authenticate a particular item or such other services as may be advertised as concierge<br />\r\nservices on the Website from time to time (&ldquo;Concierge Services&rdquo;).</p>\r\n\r\n<p>C.3 Vendors may be charged for the Service by way of :</p>\r\n\r\n<p>A success fee of 5 (five) percent of the total transaction value payable in respect of each<br />\r\nsuccessful quote selected by a Customer (&ldquo;Success Fee&rdquo;).</p>\r\n\r\n<p>chargeable in accordance with the terms as they appear hereto, as modified from time to<br />\r\ntime.</p>\r\n\r\n<p>The quantum of the payment for the means of accessing the Service is<br />\r\nupdated from time to time; for the latest rates please refer to the Website.</p>\r\n\r\n<p><br />\r\nC.4 It is hereby expressly clarified that no other requests for refund shall be processed or<br />\r\nentertained by Lyreh.</p>\r\n\r\n<p>C.5 Customers understand that except in the case of Concierge Services we are not selling<br />\r\nthe goods sold on the Website to you directly and that we are merely a marketplace service<br />\r\nprovider that facilitates the sale from the Vendor to the Customer. We therefore, encourage<br />\r\nyou to exercise appropriate due diligence when purchasing goods on the Website, satisfy<br />\r\nyourself in respect of the quality and condition of the goods. However, to protect Customer<br />\r\ninterests we have a product authentication service, whereby we will authenticate the<br />\r\ngenuineness of any items sold on our Website (&ldquo;Authentication Service&rdquo;), this is a paid<br />\r\nservice, wherein a fixed fee shall be collected from Customers who avail of the<br />\r\nAuthentication Services. Vendors understand that any items required to authenticated will<br />\r\nhave to be shipped to Lyreh, at the Vendor&rsquo;s cost, and thereafter an authentication process,<br />\r\nbased on our internal policy, will be initiated. If the goods are found to be authentic at the end<br />\r\nof this process, they will be shipped to the Customer by Lyreh directly. However, if the goods<br />\r\nare found to be fake, Lyreh is authorized by the Vendor to destroy such goods and refund any<br />\r\namounts paid towards the purchase of such goods back to the Customer.</p>\r\n\r\n<p>C.6 Aside from as otherwise provided here in, no returns shall be accepted by Lyreh.</p>\r\n\r\n<p>C.7 Where the Vendor accepts returns (sell product listing pages from details), we ask that<br />\r\nCustomers comply with the following in addition to any further conditions the Vendor may<br />\r\nhave conveyed:<br />\r\ni. Return requests must be placed within 10 (ten) calendar days of receipt;<br />\r\nii. The item must be unused and in the same condition as it was received; and<br />\r\niii. The item must be in its original packaging with all tags intact.</p>\r\n\r\n<p>C.8 All refunds in respect of Vendor approved returns will be processed by Us within 15<br />\r\n(fifteen) days of receipt of a return approval from the Vendor.</p>\r\n\r\n<p><strong>D. THE SERVICE &ndash; Vendors</strong></p>\r\n\r\n<p>D.1 The Website is a platform for Vendors to list their goods for sale on the online<br />\r\nmarketplace and make such goods available for purchase by Customers.</p>\r\n\r\n<p>D.2 Vendors are liable to pay fees in accordance with paragraph C.2.</p>\r\n\r\n<p>D.3 Any transfer charges, processing charges, transfer fees, transaction charges etc., by<br />\r\nwhatever name called, charged by banks or payment services shall be borne by the Vendors.<br />\r\nLyreh shall be entitled to add such amounts towards such transaction charges from the any<br />\r\npayments due from the Vendors.</p>\r\n\r\n<p>D.4 The Success Fee shall be automatically collected by Lyreh at the point of sale, the<br />\r\nbalance shall be transmitted to the Vendors in due course.</p>\r\n\r\n<p>D.5 The Website is a service for the sale of luxury goods. It is therefore essential for the<br />\r\nitems sold on the Website to be authentic and original, to this end, any complaints received by<br />\r\nCustomers in respect of the authenticity of any goods, We may require the Vendor to<br />\r\nproduce appropriate documentation to verify the authenticity of said goods. Failure on the<br />\r\npart of the Vendor to produce such documentation may result in the goods being deemed<br />\r\nto be fake. Accordingly, a full refund of the amount paid by the Customer shall be processed<br />\r\nby Us in such cases. Further, all deemed fake goods shall be destroyed and shall not be<br />\r\nreturned to the Vendor.</p>\r\n\r\n<p><strong>E. ELIGIBILITY</strong></p>\r\n\r\n<p>Membership etc &ndash; Customers</p>\r\n\r\n<p>E.1 Use of the Website is available to all persons who are atleast 188 years of age.<br />\r\nUsers may register either directly with the Website or through their LinkedIn.com<br />\r\n(&ldquo;LinkedIn&rdquo;), Facebook.com (&ldquo;Facebook&rdquo;), Plus.Google.com (&ldquo;Google+) accounts.</p>\r\n\r\n<p>E.2 If You are a person under the age of 18 years &ndash; You are required to declare this<br />\r\ninformation at the time of registration as a User (&ldquo;Minor Users&rdquo;). Minor Users shall have<br />\r\nrestricted use to the Website once they have obtained and provided Us with the prior consent<br />\r\nof their parent or legal guardian. Your communication privileges may be restricted to the<br />\r\nextent that you comments or reviews of the Website which may identify you personally in<br />\r\nany manner may not be permitted to be published. Your communications will be monitored<br />\r\nby our moderators and you will be provided with three warnings incase it is found that you<br />\r\nare sharing information online that identifies you personally in any manner. In the event of a<br />\r\nfourth infarction of this nature, your Account shall be terminated forthwith and you shall be<br />\r\nbanned from opening an Account till you attain majority. You will only be permitted to<br />\r\naccess the Website under supervision from a parent and/or guardian.</p>\r\n\r\n<p>E.3 If it is discovered at any point of time by Lyreh that You are younger than either 18 years<br />\r\nof age and have failed to declare it at the time of registration, Lyreh reserves the right to<br />\r\nterminate your membership immediately and to take appropriate legal action, where<br />\r\napplicable, against You.</p>\r\n\r\n<p>E.4 Even other than in circumstances where You are found to have declared your age<br />\r\nincorrectly, Lyreh reserves the right to unilaterally terminate your Account and refuse access<br />\r\nto any Service offered on the Website without providing You with any reasons or<br />\r\nexplanations.</p>\r\n\r\n<p>E.5 You shall refrain from transferring, selling or trading your Account to any third parties.<br />\r\nAny such actions on your part that comes to Lyreh&rsquo;s notice shall result in the immediate<br />\r\ntermination of your Account.</p>\r\n\r\n<p>E.6 You undertake that:</p>\r\n\r\n<p>1. You will use your actual identity when registering on the Website. And that you shall<br />\r\nproduce government issued identification if demanded by Us for the verification of<br />\r\nyour identity and/or legal status at any time;<br />\r\n2. The personal data that you have provided Us is true, accurate and complete; and<br />\r\n3. You will update your personal data from time to time to ensure that it is accurate and<br />\r\ncomplete.</p>\r\n\r\n<p>Your failing to comply with any of the above provisions shall result in the termination<br />\r\nof your membership solely at Lyreh&rsquo;s discretion.</p>\r\n\r\n<p>E.7 Customers shall have access to certain features of the Website only after registration.</p>\r\n\r\n<p>E.8 Customer expressly undertakes to use the &lsquo;feedback&rsquo; feature only in respect of Vendor&rsquo;s<br />\r\nwhose service they have used and to post genuine and honest feedback about their experience<br />\r\nof such service.</p>\r\n\r\n<p>E.9 Customer understands that any transaction undertaken with Vendors on the Website<br />\r\nconstitutes a binding contract.</p>\r\n\r\n<p>E.10 Customer&rsquo;s understand that Lyreh does not verify any information that is provided by<br />\r\nVendors listed on the Website nor is liable for the actions of the Vendors in any manner<br />\r\nwhatsoever, unless otherwise provided herein. Customers should independently verify the<br />\r\nantecedents of any Vendors that they contact through the Website.</p>\r\n\r\n<p>Membership etc &ndash; Vendors</p>\r\n\r\n<p>E.11 Vendors Accounts will only be permitted to be created and operated through the sign up<br />\r\nmethodology on the Website and not through third-party means of access. This will include<br />\r\nverification of certain credentials as may be required from time to time by Lyreh</p>\r\n\r\n<p>E.12 Vendors will be required to be registered under applicable laws and in accordance with<br />\r\nsuch terms as may be updated by Lyreh from time to time. Registration numbers/certificates<br />\r\nmay be required to be produced at the time of registration.</p>\r\n\r\n<p>E.13 Vendors will not be permitted to post their contact details directly on the Website. The<br />\r\ncontact details shall be conveyed by us to the Customer upon the Customer selecting the<br />\r\nVendors for work. A failure to abide by this condition shall result in the immediate<br />\r\ntermination of the Vendors account.</p>\r\n\r\n<p>E.14 This requirement for eligibility will be subject to modification at the sole discretion of<br />\r\nLyreh. The above is only indicative and not an exhaustive list of all criteria taken into<br />\r\nconsideration by Lyreh. Lyreh&rsquo;s decision to permit or refuse a person a Vendors Account shall<br />\r\nbe final and not subject to any kind of dispute or challenge.</p>\r\n\r\n<p>E.15 Vendors undertake to have appropriate mechanism and technology in place to protect<br />\r\nCustomer data made available to you in accordance with the applicable laws. You also</p>\r\n\r\n<p>undertake to be solely liable, to the extent permitted under law, for any breach of Customer<br />\r\ndata in your control and possession. You also agree to indemnify and hold harmless Lyreh<br />\r\nagainst any such breach.</p>\r\n\r\n<p>E.16 You undertake to be compliant with all applicable laws in England and Wales that<br />\r\nwould apply to a business of your nature. You further undertake to be solely liable for any<br />\r\nbreaches of such law by You and to hold Lyreh indemnified and harmless against all such<br />\r\nbreaches caused for any reason whatsoever.</p>\r\n\r\n<p>E.17 As a Vendors registered on our Website you undertake to be wholly responsible and<br />\r\nliable for all Services undertaken by you for Customers. Further, you agree to indemnify and<br />\r\nhold harmless Lyreh against any liability that may arise due to any reason whatsoever<br />\r\nconnected with the Services including but not limited to damages, losses whether direct or<br />\r\nindirect, fines, legal proceedings, attorney&rsquo;s fees etc.</p>\r\n\r\n<p>E.18 You undertake to not hold Us responsible or liable for any reviews that may be written<br />\r\nwith regards to your service by Customers on the Website. These reviews are an integral part<br />\r\nof the online marketplace process of ranking vendors and are independently written by<br />\r\nCustomers. Lyreh is in no way involved in the process of raking or rating Your services and<br />\r\nthus, cannot be held liable for any remarks that you may deem unflattering or harmful to your<br />\r\nbusiness. In case of genuine concern on your part that a review may be defamatory and not<br />\r\njust a review of your services, you may contact customer support with the specifics of your<br />\r\nconcern. The final decision with regards to whether the review may be retained or removed<br />\r\nshall be Lyreh&rsquo;s and this will be binding on You.</p>\r\n\r\n<p><strong>F. ACCOUNT AND SECURITY OBLIGATIONS</strong></p>\r\n\r\n<p>F.1 The full use of the Website is only available to You upon providing certain required<br />\r\ninformation, which facilitates the creation of Your account (&ldquo;Account&rdquo;). To have access to<br />\r\nyour Account You will choose your own use name and password for access. You shall</p>\r\n\r\n<p>yourself be responsible for maintaining the confidentiality of your username and password<br />\r\nand shall be responsible for all activities that occur under your username and password. In the<br />\r\nalternate, except as otherwise provided for Vendors, You may also access the website by<br />\r\nlogging on through your LinkedIn, Facebook or Google+ accounts.</p>\r\n\r\n<p>F.2 You also consent to the suspension and termination of Your Account and permanent<br />\r\nrefusal of access to the Website to You in case it comes to Lyreh&rsquo;s notice at any point of time<br />\r\nthat the information you have provided is incorrect, incomplete, misleading or is provided in<br />\r\nimpersonation of another person.</p>\r\n\r\n<p>F.3 You are obliged to immediately inform Lyreh of any unauthorised use of Your Account or<br />\r\nany other breach of security that comes to your notice.</p>\r\n\r\n<p>F.4 You are also obliged to logout of Your Account at the end of each session.</p>\r\n\r\n<p>F.5 Lyreh shall not be liable for any loss or damage occurring as a consequence of Your<br />\r\nfailure to comply with the aforementioned conditions. Further, You may be held liable for<br />\r\nlosses incurred by Lyreh or third-parties as a consequence of Your failure to comply with the<br />\r\naforementioned conditions.</p>\r\n\r\n<p>F.6 Lyreh will create communication and offer policies. These will be updated on the Website<br />\r\nfrom time to time. Unless otherwise provided by a policy displayed on the Website, a Seller<br />\r\nshall have the opportunity to consider only three offers from a particular Customer for any<br />\r\none item. If none of the three offers are successful, the Customer shall only be able to<br />\r\npurchase the item at full listing price.</p>\r\n\r\n<p>F.7 Vendors and Customers shall have the ability to communicate over a chat platform on the<br />\r\nWebsite. Vendors and Customers are prohibited from exchanging any information that lets<br />\r\nthem contact each other off platform. Any incidents of this nature discovered by Lyreh may<br />\r\nresult in the respective parties facing account restrictions and/or bans. The policy in this<br />\r\nregard shall be update on the Website from time to time.</p>\r\n\r\n<p>F.8 Restricted access to the Website may also be provided to unregistered Users.</p>\r\n\r\n<p><strong>G. CONTENT AND USE</strong></p>\r\n\r\n<p>G.1 You give Lyreh an automatic non-exclusive, non-transferable right over all works of<br />\r\nauthorship whether through text, images, videos, audio etc., (&ldquo;Content&rdquo;) that you upload,<br />\r\nprovide, transfer or otherwise make available (&ldquo;Post&rdquo;) on the Website. Such rights given to<br />\r\nLyreh do not include the ownership of the Content, which remains vested in the author or the<br />\r\nappropriate copyright holder, however, they include an unrestricted, perpetual, irrevocable,<br />\r\nnon-exclusive, fully paid and royalty free licence with the right to unrestrictedly sub-licence,<br />\r\nto use copy, perform, display, distribute, derive works from and distribute such Content in<br />\r\nany and all media, whether known or unknown, throughout the world. You shall not be liable<br />\r\nto receive any payment or compensation from Lyreh for Content posted on the Website,<br />\r\nunless provided otherwise herein.</p>\r\n\r\n<p>G.2 For sharing of Content by users inter-se or on third-party websites or platforms, all<br />\r\nContent shall be governed strictly by the following creative commons licence regime -<br />\r\nhttp://creativecommons.org/licenses/by-nc-nd/3.0/ .</p>\r\n\r\n<p>G.3 For all other content, posted by Lyreh or its third-party service providers, (&ldquo;Lyreh<br />\r\nContent&rdquo;) Lyreh shall retain all proprietary rights. You as the User shall be granted a limited,<br />\r\nrevocable, non-licensable licence by Lyreh to view the Lyreh Content. You shall use the<br />\r\nLyreh Content only for your personal use and never for any commercial or related purposes.<br />\r\nYou agree not to reproduce, modify, publish, distribute, transmit, perform, display, sell or<br />\r\ncreate any derivate works based on the Lyreh Content.</p>\r\n\r\n<p>G.4 The same limitations that apply to Your use of the Lyreh Content also apply to Content<br />\r\nposted by other Users.</p>\r\n\r\n<p>G.5 You further agree that in respect of third party Content, including but not limited to<br />\r\nContent uploaded by other Users, that Lyreh shall be in no way responsible or liable for any<br />\r\nsuch Content. Lyreh assumes no responsibility for objectionable, unlawful, incorrect,<br />\r\nmisleading or unintended Content made available by other Users, advertisers or third-parties.</p>\r\n\r\n<p>G.6 You represent and warrant that:</p>\r\n\r\n<p>(a) you own the Content posted by you on the Website;<br />\r\n(b) your Content does not violate the privacy rights, copyright rights, or other rights of<br />\r\nany person;<br />\r\n(c) by posting the Content, You do not violate any confidentiality, non-disclosure,<br />\r\nor contractual obligations you might have towards a third party;<br />\r\n(d) any information you provide as a part of the Content is correct and true to the best of<br />\r\nyour knowledge and is provided by You in good faith; and<br />\r\n(e) Please do not provide any information that you are not allowed to share with others,<br />\r\nincluding by contract or law; please note that any information you provide will be<br />\r\naccessible to every User of the Website, except as provided herein.</p>\r\n\r\n<p>G.7 Any interactions, agreements between You and other Users or advertisers are made<br />\r\ncompletely independent of Lyreh. Lyreh is not a party to any such arrangements and shall not<br />\r\nbe liable for or a party to any disputes arising out of such agreements nor for any loss<br />\r\nincurred by You thereunder. You shall indemnify and hold harmless Lyreh against any such<br />\r\ndisputes.</p>\r\n\r\n<p>G.8 In order to protect Users from unwanted advertising and solicitation, Lyreh may, as and<br />\r\nwhen deemed appropriate by Us, restrict the volume of messages Users in general or in<br />\r\nparticular may send one another. Information obtained by you as a User of the Website shall<br />\r\nnot be used in any manner to abuse, harass or harm any other Users or third-parties using the<br />\r\nWebsite.</p>\r\n\r\n<p>G.9 You are solely responsible for any and all Content that is posted through your Account<br />\r\non the Services and for your interactions with other Users.</p>\r\n\r\n<p>G.10 In addition to the Content prohibited by law, You agree that you will not post any<br />\r\nContent that:<br />\r\n(i) is offensive or denigrates any religion, caste, creed, nationality or similar affiliations;<br />\r\n(ii) promotes racism, bigotry, hatred or physical harm of any kind against any group or<br />\r\nindividual, or is pornographic or sexually explicit in nature;<br />\r\n(iii) harasses or advocates stalking or harassment of another person;<br />\r\n(iv) involves the transmission of &ldquo;junk mail&rdquo; or unsolicited mass mailing, or<br />\r\n&ldquo;spamming&rdquo;;<br />\r\n(v) is false or misleading or promotes, endorses or furthers illegal activities or conduct<br />\r\nthat is abusive, threatening, obscene, defamatory or libelous;<br />\r\n(vi) promotes, copies, performs or distributes an illegal or unauthorized copy of another<br />\r\nperson&#39;s work that is protected by intellectual property law, such as providing pirated<br />\r\ncomputer programs or links to them, providing information to circumvent<br />\r\nmanufacturer-installed copy-protection devices, or providing pirated music, videos, or<br />\r\nmovies, or links to such pirated music, videos, or movies;<br />\r\n(vii) is involved in the exploitation of persons under the age of eighteen (18) in a sexual<br />\r\nor violent manner, or solicits personal information from anyone under eighteen (18);<br />\r\n(viii) provides instructional information about illegal activities such as making or<br />\r\nbuying illegal weapons, violating someone&#39;s privacy, or providing or creating computer<br />\r\nviruses and other harmful code;<br />\r\n(ix) solicits passwords or personally identifying information for commercial or unlawful<br />\r\npurposes from other Users;<br />\r\n(x) except as expressly approved by Us, involves commercial activities and/or<br />\r\npromotions such as contests, sweepstakes, barter, advertising, or pyramid schemes;<br />\r\n(xi) contains viruses, Trojan horses, worms, time bombs, cancelbots, corrupted files, or<br />\r\nsimilar software; or</p>\r\n\r\n<p>(xii) posts or distributes information which would violate any confidentiality, non-<br />\r\ndisclosure or other contractual restrictions or rights of any third party, including any<br />\r\ncurrent or former employers or potential employers; or<br />\r\n(xiii) otherwise violates the terms of these Terms of Use or creates liability for Us<br />\r\n(&ldquo;Prohibited Content&rdquo;).</p>\r\n\r\n<p>G.11 Any use of the Website in violation of these Terms of Use may result in, among other<br />\r\nconsequences, termination or suspension of your rights to use the Website. We may disclose<br />\r\ninformation about your use of the Website in accordance with our privacy policy.</p>\r\n\r\n<p>G.12 We have the right (but not the obligation) to review any Content and delete (or modify)<br />\r\nany Content that in our sole discretion violates these User Terms or which is Prohibited<br />\r\nContent, or may otherwise violate the rights, harm, or threaten the safety of any User or any<br />\r\nother person, or create liability for us or any User. We reserve the right (but have no<br />\r\nobligation) to investigate and take appropriate legal action in our sole discretion against you<br />\r\nif you violate this provision or any other provision of these Terms, including without<br />\r\nlimitation, removing Content from the Website (or modifying it), terminating Your<br />\r\nmembership and Account, reporting you to appropriate legal authorities, and taking legal<br />\r\naction against You. We shall not be liable for any loss of data or information as a<br />\r\nconsequence of Your use of the Website.</p>\r\n\r\n<p>G.13 You will use the Website in a manner consistent with any and all applicable laws and<br />\r\nregulations and solely for lawful purposes. The Website is, except for the exceptions carved<br />\r\nout herein, for the personal use of Users except the Vendors. Commercial advertisements,<br />\r\naffiliate links, and other forms of solicitation may be removed from your Content without<br />\r\nnotice and may result in suspension or termination of your Account.</p>\r\n\r\n<p>G.14 You will not attempt to impersonate another User or person, including any of our<br />\r\nemployees. You will use the Services in a manner consistent with any and all applicable laws<br />\r\nand regulations.<br />\r\n<strong>H. THIRD-PARTY INTELLECTUAL PROPERTY</strong><br />\r\nH.1 We take intellectual property protection very seriously and it is our policy to terminate<br />\r\nmembership privileges of any User who repeatedly infringes copyright upon prompt<br />\r\nnotification to us by the copyright owner or the copyright owner&#39;s legal agent. If you believe<br />\r\nthat your intellectual property rights are being used on the Website in a way that constitutes<br />\r\nan intellectual property infringement, please provide us the following information:</p>\r\n\r\n<p>(i) an electronic or physical signature of the person authorized to act on behalf of the<br />\r\nowner of the intellectual property interest;<br />\r\n(ii) an identification of the copyrighted work that you claim has been infringed;<br />\r\n(iii) a description of where the material that you claim is infringing is located on the<br />\r\nWebsite;<br />\r\n(iv) your address, contact number, and e-mail address;<br />\r\n(v) a written statement that you have a bona fide belief that the disputed use is not<br />\r\nauthorized by the intellectual property owner, its agent, or the law;<br />\r\n(vi) a statement by you in a sworn affidavit &ndash; please note that executing a sworn<br />\r\naffidavit with the knowledge that the information contained therein is false, is a<br />\r\ncriminal offence punishable by law - that the above information in your notice is<br />\r\naccurate and that you are the copyright owner or authorized to act on the copyright<br />\r\nowner&#39;s behalf.</p>\r\n\r\n<p>H.2 Contact information for notice of claims of intellectual property infringement is as<br />\r\nbelow:<br />\r\n&lt;a href=&quot;mailto:contact@lyreh.com&quot;&gt;contact@lyreh.com.&lt;/a&gt;</p>\r\n\r\n<p><strong>I. COMMUNICATIONS</strong></p>\r\n\r\n<p>Your use of the Website or communications with Lyreh are a form of electronic record. You<br />\r\nunderstand and as a consequence, consent to receiving electronic or other communication<br />\r\nfrom Lyreh as and when required.</p>\r\n\r\n<p><strong>J. EXPRESS DISCLAIMERS</strong></p>\r\n\r\n<p>J.1 Lyreh does not make any warranty regarding the truthfulness or veracity of any Content<br />\r\non the Website or of any claims of quality or workmanship by any third-party. Lyreh<br />\r\nexpressly disclaims that the views expressed by Users on the Website are their own and Lyreh<br />\r\ndoes not endorse the same merely because they are posted on the Website. Further, Lyreh<br />\r\nshall in not be liable for any false, libelous or mala fide views expressed in the Content on the<br />\r\nWebsite. In the case of such Content that is malicious, false, inflammatory, libelous or in<br />\r\nviolation of third-party intellectual property rights (as addressed above) or is in any other<br />\r\nmanner in violation of Lyreh&rsquo;s policies, affected parties are advised to contact our customer<br />\r\nservice team at &lt;a href=&quot;mailto:contact@lyreh.com&quot;&gt;contact@lyreh.com.&lt;/a&gt; with the details of such violation to enable us to<br />\r\ntake appropriate action.</p>\r\n\r\n<p>J.2 We are further not responsible for:</p>\r\n\r\n<p>i. any incorrect or inaccurate Content (including any information in User profiles)<br />\r\nposted on the Website, whether caused by Users or by any of the equipment or<br />\r\nprogramming associated with or utilized in the Website.<br />\r\nii. the conduct, whether online or offline, of any User of the Services.<br />\r\niii. any error, omission, interruption, deletion, defect, delay in operation or<br />\r\ntransmission, communications line failure, theft or destruction or unauthorized<br />\r\naccess to, or alteration of, any communication with other Users.</p>\r\n\r\n<p>iv. any problems or technical malfunction of any hardware and software due to<br />\r\ntechnical problems on the Internet or at the Website or combination thereof,<br />\r\nincluding any injury or damage to Users or to any person&#39;s computer related to or<br />\r\nresulting from participation or downloading materials from the Website.<br />\r\nv. any loss or damage, including personal injury or death, resulting from use of the<br />\r\nWebsite or from any Content posted on the Website or transmitted to Users, or any<br />\r\ninteractions between Users whether online or offline.</p>\r\n\r\n<p>J.3 The Website and Service are provided on an &ldquo;As-Is&rdquo; basis. We expressly disclaim any<br />\r\nwarranties and conditions of any kind, whether express or implied, including the warranties<br />\r\nor conditions of merchantability, fitness for a particular purpose, title, quiet enjoyment,<br />\r\naccuracy, or non-infringement. We make no warranty that: (a) the Website and Service will<br />\r\nmeet Your requirements; (b) the Website will be available on an uninterrupted, timely, secure,<br />\r\nor error-free basis; or (c) the results that may be obtained from the use of the Website will be<br />\r\naccurate or reliable.</p>\r\n\r\n<p><strong>K. USE</strong></p>\r\n\r\n<p>K.1 You agree, undertake and confirm that Your use of Website shall be strictly governed by<br />\r\nthe following statutory and non-statutory principles:</p>\r\n\r\n<p>K.1.1 You shall not host, display, upload, modify, publish, transmit, update or share any<br />\r\ninformation which:</p>\r\n\r\n<p>(a) belongs to another person and to which You do not have any right;<br />\r\n(b) is grossly harmful, harassing, blasphemous, defamatory, obscene, pornographic,<br />\r\npaedophilic, libelous, invasive of another&#39;s privacy, hateful, or racially, ethnically<br />\r\nobjectionable, disparaging, relating or encouraging money laundering or gambling,<br />\r\nor otherwise unlawful in any manner whatever; or unlawfully threatening or<br />\r\nunlawfully harassing including but not limited to indecent representation of women<br />\r\nor children;</p>\r\n\r\n<p>(c) is patently offensive to the online community, such as sexually explicit content,<br />\r\nor content that promotes obscenity, paedophilia, racism, bigotry, hatred or physical<br />\r\nharm of any kind against any group or individual;<br />\r\n(d) harasses or advocates harassment of another person;<br />\r\n(e) involves the transmission of &quot;junk mail&rdquo; or unsolicited mass mailing;<br />\r\n(f) promotes illegal activities or conduct that is abusive, threatening, obscene,<br />\r\ndefamatory or libelous;<br />\r\n(g) infringes upon or violates any third party&#39;s rights including, but not limited&nbsp;to,<br />\r\nintellectual property rights, rights of privacy (including without limitation<br />\r\nunauthorized disclosure of a person&#39;s name, email address, physical address or&nbsp;phone<br />\r\nnumber) or rights of publicity;<br />\r\nviolates or promotes the violation of a third-persons intellectual property rights;<br />\r\n(j) provides material that exploits people in a sexual, violent or otherwise<br />\r\ninappropriate manner or solicits personal information from anyone;<br />\r\n(k) provides instructional information about illegal activities such as making or<br />\r\nbuying illegal weapons, violating someone&#39;s privacy, or providing or creating<br />\r\ncomputer viruses;<br />\r\n(l) contains video, photographs, or images of another person (with a minor or an<br />\r\nadult);<br />\r\ntries to gain unauthorized access or exceeds the scope of authorized access to the Website ;<br />\r\n(n) solicits gambling or engages in any gambling activity which Lyreh in its sole<br />\r\ndiscretion, believes is or could be construed as being illegal;<br />\r\n(o) interferes with another User&#39;s use and enjoyment of the Website or any other<br />\r\nindividual&#39;s User and enjoyment of similar services;<br />\r\n(p) refers to any website or url that, in Our sole discretion, contains material that is<br />\r\ninappropriate for the Website or any other website, contains content that would be<br />\r\nprohibited or violates the letter or spirit of these Terms of Use;<br />\r\n(q) harms minors in any way;<br />\r\n(r) violates any law for the time being in force;<br />\r\n(s) deceives or misleads the addressee/ users about the origin of such messages or<br />\r\ncommunicates any information which is grossly offensive or menacing in nature;</p>\r\n\r\n<p>(t) impersonates another person;<br />\r\n(u) contains software viruses or any other computer code, files or programs designed<br />\r\nto interrupt, destroy or limit the functionality of any computer resource; or contains<br />\r\nany trojan horses, worms, time bombs, cancelbots, easter eggs or other computer<br />\r\nprogramming routines that may damage, detrimentally interfere with, diminish value<br />\r\nof, surreptitiously intercept or expropriate any system, data or personal information;<br />\r\n(v) threatens the unity, integrity, defence, security or sovereignty of England and<br />\r\nWales, friendly relations with foreign states, or public order or causes incitement to<br />\r\nthe commission of any cognizable offence or prevents investigation of any offence<br />\r\nor is insulting any other nation; or<br />\r\n(w) directly or indirectly offers, attempts to offer, trades or attempts to trade in any<br />\r\nitem, the dealing of which is prohibited or restricted in any manner under the<br />\r\nprovisions of any applicable law, rule, regulation or guideline for the time being in<br />\r\nforce.</p>\r\n\r\n<p>K.2 You shall not use any automatic device, program, algorithm or methodology, or any<br />\r\nsimilar or equivalent manual process, to access, acquire, copy or monitor any portion of the<br />\r\nWebsite or any Content, or in any way reproduce or circumvent the navigational structure or<br />\r\npresentation of the Website or any Content, to obtain or attempt to obtain any materials,<br />\r\ndocuments or information through any means not purposely made available through the<br />\r\nWebsite. Lyreh reserves the right to bar any such activity.</p>\r\n\r\n<p>K.3 You shall not attempt to gain unauthorized access to any portion or feature of the<br />\r\nWebsite, or any other systems or networks connected to the Website or to any server,<br />\r\ncomputer, network, or to any of the services offered on or through the Website, by hacking,<br />\r\npassword &ldquo;mining&rdquo; or any other illegitimate means.</p>\r\n\r\n<p>K.4 You shall not probe, scan or test the vulnerability of the Website or any network<br />\r\nconnected to the Website nor breach the security or authentication measures on the Website<br />\r\nor any network connected to the Website. You may not reverse look-up, trace or seek to trace<br />\r\nany information on any other User of or visitor to Website, or any other customer, including</p>\r\n\r\n<p>any account on the Website not owned by You, to its source, or exploit the Website or any<br />\r\nservice or information made available or offered by or through the Website, in any way where<br />\r\nthe purpose is to reveal any information, including but not limited to personal identification<br />\r\nor information, other than Your own information, as provided for by the Website.</p>\r\n\r\n<p>K.5 You shall not misuse or otherwise violate the intellectual property rights of Lyreh or any<br />\r\nthird-party User of the Website. Further, you also agree not to take any action that has a<br />\r\nnegative impact on the infrastructure and operation of the Website.</p>\r\n\r\n<p>K.6 You may not use the Website or any content for any purpose that is unlawful or<br />\r\nprohibited by law, these Terms of Use, or to solicit the performance of any illegal activity or<br />\r\nother activity which infringes the rights of Lyreh or third-parties .</p>\r\n\r\n<p>K.7 You shall at all times ensure full compliance with the applicable provisions of the all<br />\r\ndomestic laws in force in England and Wales as applicable and as amended from time to time<br />\r\nand also all applicable rules and regulations and international laws, foreign exchange laws,<br />\r\nstatutes, ordinances and regulations regarding Your use of the Service. You shall not engage<br />\r\nin any activity which is prohibited by the provisions of any applicable law for the time being<br />\r\nin force.</p>\r\n\r\n<p>K.8 Solely to enable Lyreh to use the Personal and Non-Personal Information You supply -<br />\r\nYou agree to grant Lyreh a non-exclusive, worldwide, perpetual, royalty-free, sub-licensable<br />\r\nright to exercise the copyright, publicity, database rights or any other rights You have in the<br />\r\nPersonal and Non-Personal Information, in any media. Lyreh will only use the information in<br />\r\naccordance with the Terms of Use and Privacy Policy applicable to use of the Website.</p>\r\n\r\n<p>K.9 It is possible that other users (including unauthorized users or &ldquo;hackers&rdquo;) may post or<br />\r\ntransmit offensive or obscene materials on the Website and that You may be involuntarily<br />\r\nexposed to such offensive and obscene materials. It also is possible for others to obtain<br />\r\npersonal information about You due to your use of the Website, and that the recipient may use<br />\r\nsuch information to harass or injure You. We do not approve of such unauthorized uses, but</p>\r\n\r\n<p>by using the Website You acknowledge and agree that We are not responsible for the use of<br />\r\nany personal information that You publicly disclose or share with others on the Website.<br />\r\nPlease carefully select the type of information that You publicly disclose or share with others<br />\r\non the Website.</p>\r\n\r\n<p><strong>L. PRIVACY</strong></p>\r\n\r\n<p>L.1 Your privacy and data is dealt with by us in a manner consistent with all applicable<br />\r\ndomestic laws in England and Wales. Your information collected by us may be sold to third-<br />\r\nparties as a part of a merger, amalgamation or such similar proceedings that Lyreh may be<br />\r\ninvolved in the future. Please read our privacy policy &lt;a href=&quot;https://lyreh.com/privacy-policy&quot; target=&quot;_blank&quot;&gt;&quot;click here&quot;&lt;/a&gt; and if you still have<br />\r\nobjections to the use of your data in this manner then please do not use the Website.</p>\r\n\r\n<p>L.2 You may be required to register a mobile number with us at the time of registration. By<br />\r\nproviding us with this mobile number, You consent to receive calls and text messages from us<br />\r\nin relation to the Website and any offers and promotions that we may operate from time to<br />\r\ntime. We will never share your mobile number with third-parties for promotional purposes.</p>\r\n\r\n<p><strong>M. DISCLAIMER OF WARRANTIES AND LIABILITY</strong></p>\r\n\r\n<p>M.1 This Website, all the materials and products (including but not limited to software) and<br />\r\nservices, included on or otherwise made available to You through this site are provided on &ldquo;as<br />\r\nis&rdquo; and &ldquo;as available&rdquo; basis without any representation or warranties, express or implied<br />\r\nexcept otherwise specified in writing. Without prejudice to the forgoing paragraph, Lyreh<br />\r\ndoes not warrant that:</p>\r\n\r\n<p>a. This Website will be constantly available, or available at all; or<br />\r\nb. The information on this Website is complete, true, accurate or non-misleading.</p>\r\n\r\n<p>M.2 Lyreh will not be liable to You in any way or in relation to the Contents of, or use of, or<br />\r\notherwise in connection with, the Website. Lyreh does not warrant that this site; information,<br />\r\nContent, materials, product (including software) or services included on or otherwise made<br />\r\navailable to You through the Website; their servers; or electronic communication sent from<br />\r\nUs are free of viruses or other harmful components.</p>\r\n\r\n<p>M.3 Nothing on Website constitutes, or is meant to constitute, advice of any kind.</p>\r\n\r\n<p><strong>N. INDEMNITY</strong></p>\r\n\r\n<p>You shall indemnify and hold harmless Lyreh, its owner, licensee, affiliates, subsidiaries,<br />\r\ngroup companies (as applicable) and their respective officers, directors, agents, and<br />\r\nemployees, from any claim or demand, or actions including reasonable attorneys&#39; fees, made<br />\r\nby any third party or penalty imposed due to or arising out of Your breach of this Terms of<br />\r\nUse, privacy Policy and other Policies, or Your violation of any law, rules or regulations or<br />\r\nthe rights (including infringement of intellectual property rights) of a third party.</p>\r\n\r\n<p><strong>O. APPLICABLE LAW</strong></p>\r\n\r\n<p>Terms of Use shall be governed by and interpreted and construed in accordance with the laws<br />\r\nof the Republic of England and Wales. The courts at England and Wales shall exercise<br />\r\nexclusive jurisdiction over any disputes.</p>\r\n\r\n<p><strong>P. JURISDICTION</strong></p>\r\n\r\n<p>Unless otherwise specified, the material on the Website is presented solely for the purpose of<br />\r\nsale in England and Wales. Lyreh makes no representation that materials on the Website are<br />\r\nappropriate or available for use in other locations/countries other than England and Wales.</p>\r\n\r\n<p><strong>Q. OUR INTELLECTUAL PROPERTY</strong></p>\r\n\r\n<p>This site is controlled and operated by Lyreh. All material on this site, including images,<br />\r\nillustrations, audio clips, and video clips, are protected by copyrights, trademarks, and other<br />\r\nintellectual property rights. Material on the Website is solely for Your personal, non-<br />\r\ncommercial use, unless specified otherwise. You must not directly or indirectly, or conspire<br />\r\nwith or enable a third party to - copy, reproduce, republish, upload, post, transmit or<br />\r\ndistribute such material in any way, including by email or other electronic means and whether<br />\r\ndirectly or indirectly</p>\r\n\r\n<p><strong>R. LIMITATION OF LIABILITY</strong></p>\r\n\r\n<p>IN NO EVENT SHALL LYREH BE LIABLE FOR ANY SPECIAL, INCIDENTAL,<br />\r\nINDIRECT OR CONSEQUENTIAL DAMAGES OF ANY KIND IN CONNECTION<br />\r\nWITH THESE TERMS OF USE, EVEN IF USER HAS BEEN INFORMED IN ADVANCE<br />\r\nOF THE POSSIBILITY OF SUCH DAMAGES.</p>\r\n\r\n<p><strong>S. WAIVER</strong></p>\r\n\r\n<p>The failure to enforce our rights with respect to any violation by you will not be seen as a<br />\r\nwaiver of our rights in any manner.</p>\r\n\r\n<p><strong>T. SEVERABILITY</strong></p>\r\n\r\n<p>Should any provision of these terms be found to be unenforceable by a court, such<br />\r\nunenforceable term(s) shall be severable from the remainder of the provision of these terms<br />\r\nof service thereby the remainder of the terms shall continue to be valid and enforceable.</p>\r\n\r\n<p><strong>U. CONTACT US</strong></p>\r\n\r\n<p>Please send any questions, comments or complaints regarding this Website to<br />\r\n&lt;a href=&quot;mailto:contact@lyreh.com&quot;&gt;contact@lyreh.com.&lt;/a&gt;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'fa fa-items', 'legal-stuff', 'dynamic', 0, 0, 0, '2019-12-20 12:23:10', '2019-12-20 12:23:10');
INSERT INTO `pages` (`id`, `title`, `content`, `icon`, `slug`, `page_type`, `children`, `sort`, `show_in_menu`, `created_at`, `updated_at`) VALUES
(21, 'Cookies', '<p>(Effective as of 2 February 2020)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We like to keep things simple but we also have an obligation to make our Cookie Policy clear for you, the customer to be confident in us when you use our Website &amp; Services.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Whist we would love for you to read the entire policy, we thought we would highlight the main pointers from our Policy for you here.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Yes we use Cookies (like all good websites) but this is only to improve and make your experience better for now and in the future.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Yes, we hate jargon so we want to make this as simple to understand as possible. A cookie is a small text file which is stored on your computer (until you decide to clear cookies from your device(s)), to help make websites like ours work to its full potential, improve performance/efficiency, and provide useful information to website operators. See the section titled Managing Cookies below,&nbsp;for more detail relating to your Web browser.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>We do not store any information that could identify you personally as a part of ?ur ???k?? data.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>1. <strong>C</strong><strong>??</strong><strong>k??</strong><strong> P?l??? </strong><strong>Und</strong><strong>?</strong><strong>r</strong><strong> GDPR </strong><strong>C</strong><strong>?m?l??n</strong><strong>??</strong><strong> </strong></h3>\r\n\r\n<p><a href=\"https://lyreh.com/\">Lyreh</a>&rsquo;s cookie use is in compliance with GDPR:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Th? regulations ?t?t? that w? ??n ?t?r? certain kinds of ???k??? called &lsquo;essential cookies&rsquo; on ??ur d?v??? ?f they are strictly n??????r? for the ???r?t??n ?f this ??t?. For ?ll ?th?r types of cookies (non-essential), w? n??d ??ur express ??rm?????n.</li>\r\n	<li>&nbsp;Certain cookies that appear on our pages are third-party cookies and nothing to do with our website or service.</li>\r\n	<li>&nbsp;Y?u can ?h?ng? ?r withdraw ??ur consent at any time from the C??k?? D??l?r?t??n on our w?b??t?.</li>\r\n	<li>&nbsp;Learn more about who we are, how ??u can contact us and how w? process personal data I our Privacy Policy.</li>\r\n	<li>Your consent applies to the following domains: <a href=\"https://lyreh.com/\">Lyreh</a></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>2. <strong>General </strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>LYREH u?? a number ?f different ???k??? on our site. If you do not know what ???k??? are or how to control or delete th?m, then w? recommend ??u visit <a href=\"https://www.printwrapp.com\">www.?b?ut???k???.?rg</a> for detailed guidance.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Th? list b?l?w d???r?b?? the ???k??? we u?? ?n th?? site ?nd what we u?? th?m for. Curr?ntl? we ???r?t? ?n &lsquo;?m?l??d ??n??nt&rsquo; policy which m??n? that w? assume ??ur use of the website operates as consent. If you do not agree with this policy, then ??u are free to either not u?? this site, or to delete the ???k??? after having visited the ??t? or ??u should br?w?? the ??t? using your browser&rsquo;s anonymous usage setting (called &ldquo;Incognito&rdquo; ?n Chrome, &ldquo;In Private&rdquo; for Internet Explorer, &quot;Private Browsing&quot; ?n Firfox and Safari etc.)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>B? using th?? website and agreeing to th?? policy, you consent to LYREH&rsquo;s use ?f ???k??? in accordance with the terms of policy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>3. <strong>Ab</strong><strong>?ut</strong><strong> </strong><strong>C</strong><strong>??</strong><strong>k???</strong></h3>\r\n\r\n<ul>\r\n	<li>Cookies are small text files.&nbsp;</li>\r\n	<li>Many websites place cookies on your computer when you visit.?&nbsp;</li>\r\n	<li>Cookies are used to make websites work, improve performance/efficiency, and provide useful information to website operators.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>At <a href=\"https://lyreh.com/\">Lyreh</a> w? u?? ???k??? to help you to navigate our website more effectively ?nd to u?? our services with greater efficiency. LYREH d??? not store personally identifiable information in ?ur ???k?? data.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cookies may either b? session cookies or persistent ???k???. Session ???k??? are deleted from ??ur computer when you cl??? your browser, whereas persistent cookies remain stored on ??ur computer until deleted b? you, ?r until they reach their expiry date, which is sooner.</p>\r\n\r\n<h3>4. <strong>Cookies on our Website under GDPR Compliance</strong></h3>\r\n\r\n<p>LYREH.com uses ???k??? ?nd persistent ???k??? on th?? w?b??t?, for the following purposes:-</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>To make ?ur website fumction as ??u would expect;</li>\r\n		<li>To offer ??u quality services at affordable rates;</li>\r\n		<li>To remember your settings whenever ??u visit th?? website after a certain period of time;</li>\r\n		<li>To enhance the security/????d of our website; and</li>\r\n		<li>To consistently improve our site for ??u and your experience of it.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>5. <strong>Cookies</strong>&nbsp;<strong>we use</strong></h3>\r\n\r\n<p>The table below explains what cookies we use and why. Many web browsers allow users to control most cookies through their browser settings.</p>\r\n\r\n<p>By continuing to use [Website Link], you are consenting to LYREH to using the following cookies for the purposes described below:-</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:623px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:17px; width:119px\">\r\n			<p>Category&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:17px; width:92px\">\r\n			<p>Name&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:17px; width:411px\">\r\n			<p>Purpose&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#efefef; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:49px; width:119px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#efefef; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:49px; width:92px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#efefef; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:49px; width:411px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:111px; width:119px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:111px; width:92px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:111px; width:411px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>6. <strong>Third-Party Cookies&nbsp;</strong></h3>\r\n\r\n<p>By continuing to use [Website Link], you are consenting to 3rd party cookies in association with Lyreh using the following cookies for the purposes described below:&nbsp;</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:623px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:17px; width:102px\">\r\n			<p>Category&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:17px; width:114px\">\r\n			<p>Name&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:17px; width:407px\">\r\n			<p>Purpose&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#efefef; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:81px; width:102px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#efefef; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:81px; width:114px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#efefef; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:81px; width:407px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>7. <strong>Managing Cookies</strong>&nbsp;</h3>\r\n\r\n<p>If you do not have cookies enabled on your device, your website experience may be limited. Use the links below to learn more about how to manage, enable and disable cookies.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\" style=\"border-collapse:collapse; width:642px\">\r\n	<thead>\r\n		<tr>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:20px; vertical-align:top; width:161px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:20px; vertical-align:top; width:161px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:20px; vertical-align:top; width:161px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"background-color:#5f497a; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:20px; vertical-align:top; width:161px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:67px; vertical-align:top; width:161px\">\r\n			<p><img src=\"data:image/jpeg;base64,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\" style=\"height:38.25pt; width:38.25pt\" /></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:67px; vertical-align:top; width:161px\">\r\n			<p><img src=\"data:image/jpeg;base64,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\" style=\"height:39pt; width:36pt\" /></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:67px; vertical-align:top; width:161px\">\r\n			<p><img src=\"data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABGAAD/4QMvaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzExMSA3OS4xNTgzMjUsIDIwMTUvMDkvMTAtMDE6MTA6MjAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE1IChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo2NTRBNEM5MTBGRTExMUU3QTdFQkY4N0M4RkY5MjQ3MiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo2NTRBNEM5MjBGRTExMUU3QTdFQkY4N0M4RkY5MjQ3MiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjY1NEE0QzhGMEZFMTExRTdBN0VCRjg3QzhGRjkyNDcyIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjY1NEE0QzkwMEZFMTExRTdBN0VCRjg3QzhGRjkyNDcyIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABAMDAwMDBAMDBAYEAwQG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\" style=\"height:47.25pt; width:46.5pt\" /></p>\r\n			</td>\r\n			<td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:67px; vertical-align:top; width:161px\">\r\n			<p><img src=\"data:image/jpeg;base64,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\" style=\"height:45pt; width:45pt\" /></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#eeeeee; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:80px; vertical-align:top; width:161px\">\r\n			<p><a href=\"https://support.google.com/chrome/answer/95647?hl=en\">Clear, enable, and manage</a></p>\r\n\r\n			<p><a href=\"https://support.google.com/chrome/answer/95647?hl=en\">cookies in Chrome</a></p>\r\n			</td>\r\n			<td style=\"background-color:#eeeeee; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:80px; vertical-align:top; width:161px\">\r\n			<p><a href=\"https://support.microsoft.com/en-gb/help/17442/windows-internet-explorer-delete-manage-cookies\">Delete and manage cookies</a></p>\r\n\r\n			<p><a href=\"https://support.microsoft.com/en-gb/help/17442/windows-internet-explorer-delete-manage-cookies\">in Internet Explorer</a></p>\r\n			</td>\r\n			<td style=\"background-color:#eeeeee; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:80px; vertical-align:top; width:161px\">\r\n			<p><a href=\"https://support.mozilla.org/t5/Cookies-and-cache/Enable-and-disable-cookies-that-websites-use-to-track-your/ta-p/2784\">Enable and disable cookies</a></p>\r\n\r\n			<p><a href=\"https://support.mozilla.org/t5/Cookies-and-cache/Enable-and-disable-cookies-that-websites-use-to-track-your/ta-p/2784\">in Firefox</a></p>\r\n			</td>\r\n			<td style=\"background-color:#eeeeee; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:80px; vertical-align:top; width:161px\">\r\n			<p>Manage Safari Cookies</p>\r\n\r\n			<p><a href=\"https://support.apple.com/kb/ph21411?locale=en_US\">Mac</a></p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><a href=\"https://support.apple.com/en-gb/HT201265\">Phone/Tablet</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'fa-home', 'cookies', 'dynamic', 0, 0, 0, '2020-02-27 07:47:53', '2020-02-27 07:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `product_name`, `created_at`) VALUES
(1, 0, 1, 'Handbags', '2019-12-20 11:26:20'),
(2, 0, 1, 'Backpack', '2019-12-20 11:26:30'),
(3, 0, 1, 'Suitcase', '2019-12-20 11:26:39'),
(4, 0, 1, 'Luggage', '2019-12-20 11:26:46'),
(5, 0, 1, 'Purse', '2019-12-20 11:26:54'),
(6, 0, 2, 'Active', '2019-12-20 11:27:09'),
(7, 0, 2, 'Coats & Jackets', '2019-12-20 11:27:22'),
(8, 0, 2, 'Knit', '2019-12-20 11:27:31'),
(9, 0, 2, 'Jeans', '2019-12-20 11:27:40'),
(10, 0, 2, 'Jumpsuit & Playsuits', '2019-12-20 11:27:56'),
(11, 0, 2, 'Swim and Beachwear', '2019-12-20 11:28:09'),
(12, 0, 2, 'Tops', '2019-12-20 11:28:17'),
(13, 0, 2, 'Trousers & Leggings', '2019-12-20 11:28:30'),
(14, 0, 2, 'Skirts', '2019-12-20 11:28:38'),
(15, 0, 2, 'Shirts', '2019-12-20 11:28:46'),
(16, 0, 2, 'Shorts', '2019-12-20 11:28:56'),
(17, 0, 2, 'Jumpers & Cardigan', '2019-12-20 11:29:11'),
(18, 0, 2, 'Suit', '2019-12-20 11:29:23'),
(19, 0, 3, 'Shoes', '2019-12-20 11:30:00'),
(20, 0, 3, 'Boots', '2019-12-20 11:30:10'),
(21, 0, 3, 'Trainers', '2019-12-20 11:30:20'),
(22, 0, 3, 'Sandals', '2019-12-20 11:30:28'),
(23, 0, 3, 'Heels', '2019-12-20 11:30:38'),
(24, 0, 3, 'Flat', '2019-12-20 11:30:48'),
(25, 0, 3, 'Mules', '2019-12-20 11:30:59'),
(26, 0, 3, 'Slingback', '2019-12-20 11:31:08'),
(27, 0, 3, 'Slippers', '2019-12-20 11:31:18'),
(28, 0, 4, 'Watch', '2019-12-20 11:31:45'),
(29, 0, 4, 'Earrings', '2019-12-20 11:31:55'),
(30, 0, 4, 'Necklaces', '2019-12-20 11:32:02'),
(31, 0, 4, 'Bracelets', '2019-12-20 11:32:12'),
(32, 0, 4, 'Bangles', '2019-12-20 11:32:26'),
(33, 3, 0, 'Belts', '2019-12-20 11:32:38'),
(34, 3, 0, 'Scarves', '2019-12-20 11:32:46'),
(35, 3, 0, 'Gloves', '2019-12-20 11:32:56'),
(36, 3, 0, 'Hats', '2019-12-20 11:33:06'),
(37, 3, 0, 'Socks & Tights', '2019-12-20 11:33:22'),
(38, 3, 0, 'Sunglasses', '2019-12-20 11:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `id` int(11) NOT NULL,
  `search_name` varchar(250) NOT NULL,
  `creared_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` (`id`, `search_name`, `creared_at`) VALUES
(232, 'test', '2020-03-12 12:01:57'),
(234, 'test', '2020-03-12 12:02:00'),
(236, 'test', '2020-03-12 12:02:47'),
(238, 'Coca cola', '2020-04-30 11:09:46'),
(240, 'asdsadadadadadsasdasdadad', '2020-06-04 13:31:05'),
(233, 'test', '2020-03-12 12:01:58'),
(237, 'test', '2020-03-12 12:03:35'),
(239, 'Pepsi', '2020-04-30 11:10:07'),
(231, 'test', '2020-03-12 12:01:55'),
(235, 'test', '2020-03-12 12:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(250) NOT NULL,
  `meta_value` text NOT NULL,
  `input_type` varchar(250) NOT NULL,
  `max_length` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `meta_key`, `meta_value`, `input_type`, `max_length`) VALUES
(1, 'phone_number', '0123456789', 'number', 20),
(2, 'email', 'contact@lyreh.com', 'email', 35),
(3, 'address', '6224 74th Ave – Glendale, NY 11385, US', 'text', 100),
(4, 'facebook_link', 'https://www.facebook.com/lyreh', 'text', 100),
(5, 'twitter_link', 'https://twitter.com/lyreh', 'text', 100),
(6, 'trustpilot_link', 'https://uk.trustpilot.com', 'text', 100),
(7, 'insta_link', 'https://www.instagram.com/lyrehofficial', 'text', 100),
(8, 'footer_text', 'Copyright ©2020 All rights reserved', 'text', 100),
(9, 'restricted_text', '@|.com|.co.uk|.net|.fr|.au|.us|Payment|Offline|Avoid fee|PayPal|Meet|Address|Mobile|WhatsApp|Telephone|Phone|Email|Postcode|Contact me|Http|Dotcom|Symbol|078|077|079|074|075|071|073|076', 'textarea', 500),
(10, 'help_content', 'Welcome to the online home of Lyreh. The new home of recommerce and your answer to fashstainability!\r\nWe are extremely passionate about what we do because our users are at the very heart of what we do, we are always available 24/7 to answer your questions\r\nAny questions or suggestions, you can fill the contact form below and we will come back to you ASAP.\r\nOr you can reach us by email on contact@lyreh.com', 'textarea', 500),
(11, 'footer_content', 'Lyreh offers simple steps to get your goods online and accessible to members. Our unique model provides users with a catalogue of luxury goods, whether used, vintage or new – using a peer to peer service. ', 'textarea', 300),
(12, 'tips_of_sell', '<p><strong>Tips for selling</strong></p>\r\n\r\n<p><strong>This is your Eccommerce platform to resell your inventory. Be professional, build your following and make a profit</strong></p>\r\n\r\n<ul>\r\n	<li>Include photos of the actual item</li>\r\n	<li>This is Key!. Take clear photos of at least two angles of the item.&nbsp; Inc the soles if selling footwear and point out any obvious wear</li>\r\n	<li>Include as much information as possible; size, new with tags, include receipt (where possible), true to size?</li>\r\n	<li>Stay contactable. Your DMs are crucial</li>\r\n	<li>Be realistic with your prices and negotiate were possible. If unsure, we&rsquo;re here to help.</li>\r\n	<li>Be honest; no refunds, only posting once a week, repairable damage? Say so.</li>\r\n	<li>Package your item &ndash; something goes beyond an envelope and boxes</li>\r\n	<li>Build your reputation - Good feedback is likely to bring you repeat business and new customers will not hesitate to make a purchase</li>\r\n</ul>\r\n', 'textarea', 500),
(13, 'home_banner_text', 'CAN’T FIND THAT BAG, DRESS OR SHOES? USE OUR CONCIERGE', 'text', 77),
(14, 'home_banner_image', 'home-b3.jpg', 'file', 0),
(15, 'home_bottom_left_image', 'intsa-62.jpg', 'file', 0),
(16, 'home_bottom_right_image', 'intsaaaaaa-51.jpg', 'file', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `size` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `category_id`, `subcategory_id`, `size`, `created_at`) VALUES
(1, 1, 3, '1', '2020-01-08 09:19:47'),
(2, 1, 3, '2 ', '2020-01-08 09:19:47'),
(3, 1, 3, '3', '2020-01-08 09:19:47'),
(4, 1, 3, '4', '2020-01-08 09:19:47'),
(5, 1, 3, '4.5', '2020-01-08 09:19:47'),
(6, 1, 3, '5', '2020-01-08 09:19:47'),
(7, 1, 3, '5.5', '2020-01-08 09:19:47'),
(8, 1, 3, '6', '2020-01-08 09:19:47'),
(9, 1, 3, '6.5', '2020-01-08 09:19:47'),
(10, 1, 3, '7', '2020-01-08 09:19:47'),
(11, 1, 3, '7.5', '2020-01-08 09:19:47'),
(12, 1, 3, '8', '2020-01-08 09:19:47'),
(13, 1, 3, '8.5', '2020-01-08 09:19:47'),
(14, 1, 3, '9', '2020-01-08 09:19:47'),
(15, 1, 3, '35', '2020-01-08 09:19:47'),
(16, 1, 3, '36', '2020-01-08 09:19:47'),
(17, 1, 3, '36.5', '2020-01-08 09:19:47'),
(18, 1, 3, '37,37.5', '2020-01-08 09:19:47'),
(19, 1, 3, '38', '2020-01-08 09:19:47'),
(20, 1, 3, '38.5', '2020-01-08 09:19:47'),
(21, 1, 3, '39', '2020-01-08 09:19:47'),
(22, 1, 3, '39.5', '2020-01-08 09:19:47'),
(23, 1, 3, '40', '2020-01-08 09:19:47'),
(24, 1, 3, '40.5', '2020-01-08 09:19:47'),
(25, 1, 3, '41', '2020-01-08 09:19:47'),
(26, 1, 3, '41.5', '2020-01-08 09:19:47'),
(27, 1, 3, '42', '2020-01-08 09:19:47'),
(28, 2, 3, '5', '2020-01-08 09:26:14'),
(29, 2, 3, '5.5', '2020-01-08 09:26:14'),
(30, 2, 3, '6', '2020-01-08 09:26:14'),
(31, 2, 3, '6.5', '2020-01-08 09:26:14'),
(32, 2, 3, '7', '2020-01-08 09:26:14'),
(33, 2, 3, '7.5', '2020-01-08 09:26:14'),
(34, 2, 3, '8', '2020-01-08 09:26:14'),
(35, 2, 3, '8.5 ', '2020-01-08 09:26:14'),
(36, 2, 3, '9', '2020-01-08 09:26:14'),
(37, 2, 3, '10', '2020-01-08 09:26:14'),
(38, 2, 3, '10.5', '2020-01-08 09:26:14'),
(39, 2, 3, '11', '2020-01-08 09:26:14'),
(40, 2, 3, '11.5', '2020-01-08 09:26:14'),
(41, 2, 3, '12', '2020-01-08 09:26:14'),
(42, 2, 3, '12.5', '2020-01-08 09:26:14'),
(43, 2, 3, '13', '2020-01-08 09:26:14'),
(44, 2, 3, '13.5', '2020-01-08 09:26:14'),
(45, 2, 3, '14', '2020-01-08 09:26:14'),
(46, 2, 3, '35', '2020-01-08 09:26:14'),
(47, 2, 3, '36', '2020-01-08 09:26:14'),
(48, 2, 3, '36.5', '2020-01-08 09:26:14'),
(49, 2, 3, '37', '2020-01-08 09:26:14'),
(50, 2, 3, '37.5', '2020-01-08 09:26:14'),
(51, 2, 3, '38', '2020-01-08 09:26:14'),
(52, 2, 3, '38.5', '2020-01-08 09:26:14'),
(53, 2, 3, '39', '2020-01-08 09:26:14'),
(54, 2, 3, '39.5', '2020-01-08 09:26:14'),
(55, 2, 3, '40', '2020-01-08 09:26:14'),
(56, 2, 3, '40.5', '2020-01-08 09:26:14'),
(57, 2, 3, '41', '2020-01-08 09:26:14'),
(58, 2, 3, '41.5', '2020-01-08 09:26:14'),
(59, 2, 3, '42', '2020-01-08 09:26:14'),
(60, 2, 3, '42.5', '2020-01-08 09:26:14'),
(61, 2, 3, '43', '2020-01-08 09:26:14'),
(62, 2, 3, '43.5', '2020-01-08 09:26:14'),
(63, 2, 3, '44', '2020-01-08 09:26:14'),
(64, 2, 3, '44.5', '2020-01-08 09:26:14'),
(65, 2, 3, '45', '2020-01-08 09:26:14'),
(66, 2, 3, '45.5', '2020-01-08 09:26:14'),
(67, 2, 3, '46', '2020-01-08 09:26:14'),
(68, 2, 3, '46.5', '2020-01-08 09:26:14'),
(69, 2, 3, '47', '2020-01-08 09:26:14'),
(70, 2, 3, '47.5', '2020-01-08 09:26:14'),
(71, 2, 3, '48', '2020-01-08 09:26:14'),
(72, 2, 3, '49.5', '2020-01-08 09:26:14'),
(73, 1, 2, 'xxxs', '2020-01-08 09:29:45'),
(74, 1, 2, 'xxs', '2020-01-08 09:29:45'),
(75, 1, 2, 'xs', '2020-01-08 09:29:45'),
(76, 1, 2, 's', '2020-01-08 09:29:45'),
(77, 1, 2, 'p', '2020-01-08 09:29:45'),
(78, 1, 2, 'm', '2020-01-08 09:29:45'),
(79, 1, 2, 'l', '2020-01-08 09:29:45'),
(80, 1, 2, 'xl', '2020-01-08 09:29:45'),
(81, 1, 2, 'xx', '2020-01-08 09:29:45'),
(82, 1, 2, 'xxxl', '2020-01-08 09:29:45'),
(83, 1, 2, '0', '2020-01-08 09:29:45'),
(84, 1, 2, '2', '2020-01-08 09:29:45'),
(85, 1, 2, '4', '2020-01-08 09:29:45'),
(86, 1, 2, '6', '2020-01-08 09:29:45'),
(87, 1, 2, '8', '2020-01-08 09:29:45'),
(88, 1, 2, '10', '2020-01-08 09:29:45'),
(89, 1, 2, '12', '2020-01-08 09:29:45'),
(90, 1, 2, '14', '2020-01-08 09:29:45'),
(91, 1, 2, '16', '2020-01-08 09:29:45'),
(92, 1, 2, '18', '2020-01-08 09:29:45'),
(93, 1, 2, '20', '2020-01-08 09:29:45'),
(94, 1, 2, '22', '2020-01-08 09:29:45'),
(95, 1, 2, '24', '2020-01-08 09:29:45'),
(96, 1, 2, '26', '2020-01-08 09:29:45'),
(97, 2, 2, 'XXS/14in', '2020-01-08 09:44:50'),
(98, 2, 2, 'XXS/14.5in', '2020-01-08 09:44:51'),
(99, 2, 2, 'XXS/15in', '2020-01-08 09:44:51'),
(100, 2, 2, 'XXS/15.5in', '2020-01-08 09:44:51'),
(101, 2, 2, 'XXS/16in', '2020-01-08 09:44:51'),
(102, 2, 2, 'XXS/17,in', '2020-01-08 09:44:51'),
(103, 2, 2, 'XXS/17.5in', '2020-01-08 09:44:51'),
(104, 2, 2, 'XXS/18.5in', '2020-01-08 09:44:51'),
(105, 2, 2, 'XXS/19.5in', '2020-01-08 09:44:51'),
(106, 2, 2, 'XXS/26in', '2020-01-08 09:44:51'),
(107, 2, 2, 'XXS/28in', '2020-01-08 09:44:51'),
(108, 2, 2, 'XXS/29in', '2020-01-08 09:44:51'),
(109, 2, 2, 'XXS/30in', '2020-01-08 09:44:51'),
(110, 2, 2, 'XXS/30-32in', '2020-01-08 09:44:51'),
(111, 2, 2, 'XXS/31in', '2020-01-08 09:44:51'),
(112, 2, 2, 'XXS/32in', '2020-01-08 09:44:51'),
(113, 2, 2, 'XXS/32-34in', '2020-01-08 09:44:51'),
(114, 2, 2, 'XXS/33in', '2020-01-08 09:44:51'),
(115, 2, 2, 'XS/34in', '2020-01-08 09:44:51'),
(116, 2, 2, 'XS/36in', '2020-01-08 09:44:51'),
(117, 2, 2, 'S/36-38in', '2020-01-08 09:44:51'),
(118, 2, 2, 'S/38in', '2020-01-08 09:44:51'),
(119, 2, 2, 'M/38-40in', '2020-01-08 09:44:51'),
(120, 2, 2, 'M/40in', '2020-01-08 09:44:51'),
(121, 2, 2, 'L/40-42in', '2020-01-08 09:44:51'),
(122, 2, 2, 'XL/42-44in', '2020-01-08 09:44:51'),
(123, 2, 2, 'XXL/44-46in', '2020-01-08 09:44:51'),
(124, 2, 2, 'XXXL/46-48in', '2020-01-08 09:44:51'),
(125, 4, 2, '0-3M', '2020-01-10 11:17:18'),
(126, 4, 2, '3-6M', '2020-01-10 11:17:18'),
(127, 4, 2, '6-12M', '2020-01-10 11:17:18'),
(128, 4, 2, '12-18M', '2020-01-10 11:17:18'),
(129, 4, 2, '18-24M', '2020-01-10 11:17:18'),
(130, 4, 2, '2-3Y', '2020-01-10 11:17:18'),
(132, 4, 2, '3-4Y', '2020-01-10 11:17:18'),
(134, 4, 2, '4-5Y', '2020-01-10 11:17:18'),
(136, 4, 2, '5-6Y', '2020-01-10 11:17:18'),
(138, 4, 2, '6-7Y', '2020-01-10 11:17:18'),
(140, 4, 2, '7-8Y', '2020-01-10 11:17:18'),
(142, 4, 2, '8-9Y', '2020-01-10 11:17:18'),
(144, 4, 2, '9-10Y', '2020-01-10 11:17:18'),
(146, 4, 2, '11Y', '2020-01-10 11:17:18'),
(147, 4, 2, '11-12Y', '2020-01-10 11:17:18'),
(149, 4, 2, '13Y', '2020-01-10 11:17:18'),
(150, 4, 2, '13-14Y', '2020-01-10 11:17:18'),
(152, 4, 2, '15Y', '2020-01-10 11:17:18'),
(153, 4, 2, '15-16Y', '2020-01-10 11:17:18'),
(155, 4, 3, '0-3M', '2020-01-10 11:17:18'),
(156, 4, 3, '3-6M', '2020-01-10 11:17:18'),
(157, 4, 3, '6-12M', '2020-01-10 11:17:18'),
(158, 4, 3, '12-18M', '2020-01-10 11:17:18'),
(159, 4, 3, '18-24M', '2020-01-10 11:17:18'),
(160, 4, 3, '2-3Y', '2020-01-10 11:17:18'),
(162, 4, 3, '3-4Y', '2020-01-10 11:17:18'),
(164, 4, 3, '4-5Y', '2020-01-10 11:17:18'),
(166, 4, 3, '5-6Y', '2020-01-10 11:17:18'),
(168, 4, 3, '6-7Y', '2020-01-10 11:17:18'),
(170, 4, 3, '7-8Y', '2020-01-10 11:17:18'),
(172, 4, 3, '8-9Y', '2020-01-10 11:17:18'),
(174, 4, 3, '9-10Y', '2020-01-10 11:17:18'),
(176, 4, 3, '11Y', '2020-01-10 11:17:18'),
(177, 4, 3, '11-12Y', '2020-01-10 11:17:18'),
(179, 4, 3, '13Y', '2020-01-10 11:17:18'),
(180, 4, 3, '13-14Y', '2020-01-10 11:17:18'),
(182, 4, 3, '15Y', '2020-01-10 11:17:18'),
(183, 4, 3, '15-16Y', '2020-01-10 11:17:18'),
(131, 4, 3, '3Y', '2020-01-10 11:17:18'),
(133, 4, 2, '4Y', '2020-01-10 11:17:18'),
(135, 4, 2, '5Y', '2020-01-10 11:17:18'),
(137, 4, 2, '6Y', '2020-01-10 11:17:18'),
(139, 4, 2, '7Y', '2020-01-10 11:17:18'),
(141, 4, 2, '8Y', '2020-01-10 11:17:18'),
(143, 4, 2, '9Y', '2020-01-10 11:17:18'),
(145, 4, 2, '10Y', '2020-01-10 11:17:18'),
(148, 4, 2, '12Y', '2020-01-10 11:17:18'),
(151, 4, 2, '14Y', '2020-01-10 11:17:18'),
(154, 4, 2, '16Y', '2020-01-10 11:17:18'),
(161, 4, 3, '3Y', '2020-01-10 11:17:18'),
(163, 4, 3, '4Y', '2020-01-10 11:17:18'),
(165, 4, 3, '5Y', '2020-01-10 11:17:18'),
(167, 4, 3, '6Y', '2020-01-10 11:17:18'),
(169, 4, 3, '7Y', '2020-01-10 11:17:18'),
(171, 4, 3, '8Y', '2020-01-10 11:17:18'),
(173, 4, 3, '9Y', '2020-01-10 11:17:18'),
(175, 4, 3, '10Y', '2020-01-10 11:17:18'),
(178, 4, 3, '12Y', '2020-01-10 11:17:18'),
(181, 4, 3, '14Y', '2020-01-10 11:17:18'),
(184, 4, 3, '16Y', '2020-01-10 11:17:18'),
(185, 0, 0, 'Other', '2020-01-22 06:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `stripeSettings`
--

CREATE TABLE `stripeSettings` (
  `stripeId` int(11) NOT NULL,
  `publicKey` text NOT NULL,
  `privateKey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stripeSettings`
--

INSERT INTO `stripeSettings` (`stripeId`, `publicKey`, `privateKey`) VALUES
(1, 'pk_test_51H2AqZLc5y1YgOD6CkbOszoDHimIMFzwCcQHpk06X2mkGxojnNcL9xZ7jyUDOUxlMp0nQ1XRb1sKW2Zp8GOjP5se00nskGiATK', 'sk_test_51H2AqZLc5y1YgOD643JfvZNYvRhf2ohCDCvr4hZkuSQavzHY5snpqcqYYaLunwmOds4RTLNvtzNCk4zt7Ia0YXOk00j7Y2qP1r');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` text NOT NULL,
  `subcategory_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`) VALUES
(1, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', 'Bags', '2019-12-20 07:32:40'),
(2, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"4\";}', 'Clothes', '2019-12-20 07:32:53'),
(3, 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"4\";}', 'Footwear', '2019-12-20 10:36:02'),
(4, 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', 'Jewellery and Watches', '2019-12-20 07:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `address` text,
  `user_image` varchar(250) NOT NULL,
  `activation_id` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `like_item` text NOT NULL,
  `bookmark_item` text NOT NULL,
  `offer_data` text NOT NULL,
  `online_status` varchar(250) NOT NULL,
  `last_online_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `follow_user` text NOT NULL,
  `chat_status` smallint(6) NOT NULL DEFAULT '1',
  `month_at` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `role`, `username`, `email`, `password`, `gender`, `address`, `user_image`, `activation_id`, `status`, `like_item`, `bookmark_item`, `offer_data`, `online_status`, `last_online_at`, `follow_user`, `chat_status`, `month_at`, `created_at`, `updated_at`) VALUES
(55, 'Test', 'test', 'customer', 'testing ', 'testing@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '', NULL, 'sample_user.jpg', '5ea928d31ff18', 2, '', '', '', 'offline', '2020-04-29 07:12:19', '', 1, 4, '2020-04-29 07:12:19', '2020-04-29 07:12:19'),
(56, 'user', 'test ', 'customer', 'usertest ', 'usertest@gmail.com', 'eec88d19477c9c6f185cebb08436eb33', '', NULL, 'sample_user.jpg', '5ea92bbb36810', 2, '', '', '', 'offline', '2020-04-29 07:24:43', '', 1, 4, '2020-04-29 07:24:43', '2020-04-29 07:24:43'),
(57, 'testnotification ', '123', 'customer', 'testnotification123', 'testnotification123@gmail.com', 'f29196c60ee4470218741ca23130714c', '', NULL, 'sample_user.jpg', '5ea92c12a0767', 2, '', '', '', 'offline', '2020-04-29 07:26:10', '', 1, 4, '2020-04-29 07:26:10', '2020-04-29 07:26:10'),
(58, 'Castor', 'lesapudi', 'customer', 'lyfyrus', 'tebyg@mailinator.com', '80bc114d9c3c4553afc6e5588464cec7', '', NULL, 'sample_user.jpg', '5ea9cd9a2531c', 2, '', '', '', 'offline', '2020-04-29 18:55:22', '', 1, 4, '2020-04-29 18:55:22', '2020-04-29 18:55:22'),
(19, 'Cheryl', 'Brown', 'admin', 'cherylyn.m.brown', 'cherylyn.m.brown@gmail.com', 'f603f8ae396e11ad658322979b73a074', '', NULL, 'sample_user.jpg', '', 1, 'a:1:{i:0;s:2:\"12\";}', 'a:1:{i:0;s:1:\"5\";}', 'a:5:{i:0;a:6:{s:7:\"item_id\";s:2:\"38\";s:10:\"item_price\";s:5:\"12000\";s:11:\"offer_price\";s:3:\"444\";s:9:\"offer_msg\";s:0:\"\";s:12:\"auth_user_id\";s:2:\"19\";s:6:\"status\";s:7:\"pending\";}i:1;a:6:{s:7:\"item_id\";s:2:\"27\";s:10:\"item_price\";s:2:\"60\";s:11:\"offer_price\";s:2:\"50\";s:9:\"offer_msg\";s:32:\"Just checking to see the process\";s:12:\"auth_user_id\";s:2:\"19\";s:6:\"status\";s:7:\"pending\";}i:2;a:5:{s:7:\"item_id\";s:2:\"12\";s:10:\"item_price\";s:2:\"50\";s:11:\"offer_price\";s:2:\"34\";s:12:\"auth_user_id\";s:2:\"19\";s:6:\"status\";s:7:\"pending\";}i:3;a:5:{s:7:\"item_id\";s:1:\"8\";s:10:\"item_price\";s:2:\"23\";s:11:\"offer_price\";s:2:\"50\";s:12:\"auth_user_id\";s:2:\"19\";s:6:\"status\";s:7:\"pending\";}i:4;a:4:{s:7:\"item_id\";s:1:\"4\";s:10:\"item_price\";s:2:\"10\";s:11:\"offer_price\";s:3:\"200\";s:6:\"status\";s:7:\"approve\";}}', 'offline', '2020-07-27 01:31:04', 'a:1:{i:0;s:2:\"19\";}', 1, 12, '2019-12-19 16:13:52', '2019-12-19 16:13:52'),
(20, 'Andrew', 'Ovi', 'admin', 'andrewoviasu', 'andrewoviasu@yahoo.com', 'ec5e8eb834889c7c16de1cc2bedd4455', '', NULL, 'sample_user.jpg', '5e1f3a92911c3', 2, '', '', '', 'offline', '2020-01-07 07:30:38', '', 1, 1, '2020-01-07 07:30:38', '2020-01-07 07:30:38'),
(21, 'Dre', 'Ovi', 'admin', 'oviasuandrew27', 'oviasuandrew27@gmail.com', 'ec5e8eb834889c7c16de1cc2bedd4455', '', NULL, 'sample_user.jpg', '', 1, 'a:3:{i:0;s:2:\"12\";i:1;s:2:\"28\";i:2;s:2:\"20\";}', 'a:1:{i:0;s:1:\"5\";}', 'a:4:{i:0;a:6:{s:7:\"item_id\";s:1:\"5\";s:10:\"item_price\";s:2:\"70\";s:11:\"offer_price\";s:2:\"20\";s:9:\"offer_msg\";s:11:\"Nice kettle\";s:12:\"auth_user_id\";s:2:\"21\";s:6:\"status\";s:7:\"pending\";}i:1;a:5:{s:7:\"item_id\";s:2:\"12\";s:10:\"item_price\";s:2:\"50\";s:11:\"offer_price\";s:2:\"40\";s:12:\"auth_user_id\";s:2:\"21\";s:6:\"status\";s:7:\"approve\";}i:2;a:5:{s:7:\"item_id\";s:2:\"13\";s:10:\"item_price\";s:2:\"50\";s:11:\"offer_price\";s:2:\"65\";s:12:\"auth_user_id\";s:2:\"21\";s:6:\"status\";s:7:\"pending\";}i:3;a:4:{s:7:\"item_id\";s:1:\"5\";s:10:\"item_price\";s:2:\"70\";s:11:\"offer_price\";s:2:\"75\";s:6:\"status\";s:7:\"pending\";}}', 'online', '2020-01-15 16:16:34', 'a:1:{i:0;s:2:\"19\";}', 1, 1, '2020-01-15 16:16:34', '2020-01-15 16:16:34'),
(22, 'Checking ', 'to see if this works', 'customer', 'cheryl@lyreh.com', 'cheryl@lyreh.com', '3a636cf398ebe2a930acca32a1bf0743', '', NULL, 'sample_user.jpg', '', 1, '', '', '', 'offline', '2020-02-26 02:03:10', '', 1, 1, '2020-01-21 19:56:41', '2020-01-21 19:56:41'),
(54, 'Adam', 'mabuj', 'customer', 'geluliseri', 'kitu@mailinator.com', '80bc114d9c3c4553afc6e5588464cec7', '', NULL, 'sample_user.jpg', '5ea8543e7ebf5', 2, '', '', '', 'offline', '2020-04-28 16:05:18', '', 1, 4, '2020-04-28 16:05:18', '2020-04-28 16:05:18'),
(53, 'Adrian', 'wunyt', 'customer', 'zafove', 'rigobi@mailinator.com', '80bc114d9c3c4553afc6e5588464cec7', '', NULL, 'sample_user.jpg', '5ea75be6936b6', 2, '', '', '', 'offline', '2020-04-27 22:25:42', '', 1, 4, '2020-04-27 22:25:42', '2020-04-27 22:25:42'),
(24, 'Maria', 'Bellinfantie', 'customer', 'maria_fantie', 'maria_fantie@icloud.com', '3581a732ea7f0152030545344add9fe8', '', NULL, 'sample_user.jpg', '5e36f5eb7fe5c', 2, '', '', '', 'offline', '2020-02-02 16:16:43', '', 1, 2, '2020-02-02 16:16:43', '2020-02-02 16:16:43'),
(25, 'Adrian', 'Lashley', 'customer', 'adrian.saopaulo', 'adrian.saopaulo@hotmail.co.uk', '54b29623bc724f616c43c3ce6b7c1046', 'male', '', 'hqdefault.jpg', '', 1, '', '', '', 'offline', '2020-02-03 00:41:12', '', 1, 2, '2020-02-02 16:38:04', '2020-02-02 16:38:04'),
(26, 'Test1', 'Testing ', 'admin', 'c.brown1', 'c.brown1@live.co.uk', 'c35e6f30b20e849ecad6b1524016e938', '', NULL, 'sample_user.jpg', '5eac9c6a014c3', 1, 'a:8:{i:0;s:1:\"5\";i:1;s:2:\"10\";i:2;s:2:\"25\";i:3;s:2:\"33\";i:4;s:2:\"15\";i:5;s:2:\"31\";i:6;s:2:\"34\";i:7;s:2:\"35\";}', '', 'a:8:{i:0;a:6:{s:7:\"item_id\";s:2:\"35\";s:10:\"item_price\";s:4:\"1122\";s:11:\"offer_price\";s:3:\"233\";s:9:\"offer_msg\";s:29:\"This is a testing description\";s:12:\"auth_user_id\";s:2:\"26\";s:6:\"status\";s:7:\"pending\";}i:1;a:6:{s:7:\"item_id\";s:2:\"36\";s:10:\"item_price\";s:4:\"1122\";s:11:\"offer_price\";s:3:\"122\";s:9:\"offer_msg\";s:9:\"fasdfasdf\";s:12:\"auth_user_id\";s:2:\"26\";s:6:\"status\";s:7:\"pending\";}i:2;a:6:{s:7:\"item_id\";s:2:\"28\";s:10:\"item_price\";s:2:\"59\";s:11:\"offer_price\";s:1:\"6\";s:9:\"offer_msg\";s:0:\"\";s:12:\"auth_user_id\";s:2:\"26\";s:6:\"status\";s:7:\"pending\";}i:3;a:5:{s:7:\"item_id\";s:2:\"12\";s:10:\"item_price\";s:2:\"50\";s:11:\"offer_price\";s:2:\"69\";s:12:\"auth_user_id\";s:2:\"26\";s:6:\"status\";s:7:\"pending\";}i:4;a:5:{s:7:\"item_id\";s:2:\"13\";s:10:\"item_price\";s:2:\"50\";s:11:\"offer_price\";s:1:\"1\";s:12:\"auth_user_id\";s:2:\"26\";s:6:\"status\";s:7:\"pending\";}i:5;a:4:{s:7:\"item_id\";s:1:\"5\";s:10:\"item_price\";s:2:\"70\";s:11:\"offer_price\";s:2:\"10\";s:6:\"status\";s:7:\"pending\";}i:6;a:4:{s:7:\"item_id\";s:1:\"4\";s:10:\"item_price\";s:2:\"10\";s:11:\"offer_price\";s:2:\"10\";s:6:\"status\";s:7:\"pending\";}i:7;a:4:{s:7:\"item_id\";s:1:\"5\";s:10:\"item_price\";s:2:\"70\";s:11:\"offer_price\";s:2:\"50\";s:6:\"status\";s:7:\"pending\";}}', 'online', '2020-07-20 02:57:05', 'a:3:{i:0;s:1:\"1\";i:1;s:2:\"38\";i:2;s:2:\"71\";}', 1, 2, '2020-02-10 07:28:53', '2020-02-10 07:28:53'),
(43, 'Mubashir Khaliq', 'Abdul Khaliq', 'customer', '160565', '160565@students.au.edu.pk', '', '', NULL, 'sample_user.jpg', '', 1, '', '', '', 'offline', '2020-04-13 18:15:46', '', 1, 4, '2020-04-13 11:14:18', '2020-04-13 11:14:18'),
(32, 'Test', 'C', 'customer', 'test1', 'test1@gmail.com', '0192023a7bbd73250516f069df18b500', '', NULL, 'sample_user.jpg', '5e479d3188e55', 2, '', '', '', 'offline', '2020-02-15 07:26:41', '', 1, 2, '2020-02-15 07:26:41', '2020-02-15 07:26:41'),
(51, 'Larissa', 'venafyf', 'customer', 'ropepibyz', 'julakok@mailinator.net', '80bc114d9c3c4553afc6e5588464cec7', '', NULL, 'sample_user.jpg', '5ea7581f48e32', 2, '', '', '', 'offline', '2020-04-27 22:09:35', '', 1, 4, '2020-04-27 22:09:35', '2020-04-27 22:09:35'),
(52, 'Scarlett', 'xafywixo', 'customer', 'dodegaxi', 'cyjupyvepy@mailinator.com', '80bc114d9c3c4553afc6e5588464cec7', '', NULL, 'sample_user.jpg', '5ea75af1c1d95', 2, '', '', '', 'offline', '2020-04-27 22:21:37', '', 1, 4, '2020-04-27 22:21:37', '2020-04-27 22:21:37'),
(38, 'Cheryl', 'Bell ', 'customer', 'cheryl.bellinfantie', 'cheryl.bellinfantie@hotmail.co.uk', '25d55ad283aa400af464c76d713c07ad', '', NULL, 'sample_user.jpg', '5f14a5d219440', 1, '', '', 'a:2:{i:0;a:6:{s:7:\"item_id\";s:2:\"27\";s:10:\"item_price\";s:2:\"60\";s:11:\"offer_price\";s:2:\"50\";s:9:\"offer_msg\";s:8:\"Testing \";s:12:\"auth_user_id\";s:2:\"38\";s:6:\"status\";s:7:\"pending\";}i:1;a:6:{s:7:\"item_id\";s:1:\"4\";s:10:\"item_price\";s:2:\"10\";s:11:\"offer_price\";s:2:\"40\";s:9:\"offer_msg\";s:4:\"Test\";s:12:\"auth_user_id\";s:2:\"38\";s:6:\"status\";s:7:\"pending\";}}', 'online', '2020-06-27 18:48:13', '', 1, 3, '2020-03-23 10:10:35', '2020-03-23 10:10:35'),
(71, 'test', 'qa', 'customer', 'damilseller', 'softwaretester1122@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', NULL, 'sample_user.jpg', '5ebe978b93ade', 1, 'a:1:{i:0;s:2:\"28\";}', '', 'a:1:{i:0;a:6:{s:7:\"item_id\";s:2:\"28\";s:10:\"item_price\";s:2:\"59\";s:11:\"offer_price\";s:2:\"40\";s:9:\"offer_msg\";s:12:\"sadfasdfasdf\";s:12:\"auth_user_id\";s:2:\"71\";s:6:\"status\";s:7:\"pending\";}}', 'online', '2020-07-22 22:14:53', '', 1, 5, '2020-05-15 13:22:19', '2020-05-15 13:22:19'),
(68, 'trail', 'testing', 'customer', 'trial account', 'cheryl.brown1@nhs.net', '2168ad5e463d9accb215edaafa31c8d9', '', NULL, 'sample_user.jpg', '5eb2e9a5ed5d9', 2, '', '', '', 'offline', '2020-05-06 16:45:25', '', 1, 5, '2020-05-06 16:45:25', '2020-05-06 16:45:25'),
(45, 'talha', 'khaliq', 'customer', 'talhakhaliq10', 'talhakhaliq10@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', NULL, 'sample_user.jpg', '5eb1d641d6c56', 1, 'a:7:{i:0;s:2:\"19\";i:1;s:2:\"12\";i:2;s:2:\"25\";i:3;s:2:\"24\";i:4;s:2:\"31\";i:5;s:2:\"27\";i:6;s:2:\"37\";}', '', 'a:2:{i:0;a:6:{s:7:\"item_id\";s:2:\"35\";s:10:\"item_price\";s:4:\"1122\";s:11:\"offer_price\";s:3:\"-30\";s:9:\"offer_msg\";s:4:\"klnk\";s:12:\"auth_user_id\";s:2:\"45\";s:6:\"status\";s:7:\"pending\";}i:1;a:6:{s:7:\"item_id\";s:2:\"31\";s:10:\"item_price\";s:3:\"100\";s:11:\"offer_price\";s:1:\"1\";s:9:\"offer_msg\";s:18:\"i am writing notes\";s:12:\"auth_user_id\";s:2:\"45\";s:6:\"status\";s:7:\"pending\";}}', 'online', '2020-06-09 22:28:04', 'a:2:{i:0;s:2:\"35\";i:1;s:2:\"71\";}', 1, 4, '2020-04-22 14:08:15', '2020-04-22 14:08:15'),
(46, 'Ruby', 'zovepiz', 'customer', 'wupib', 'nadakoly@mailinator.com', '38a0d85817a2f22792c1af22424128c5', '', NULL, 'sample_user.jpg', '5ea332789be28', 2, '', '', '', 'offline', '2020-04-24 18:39:52', '', 1, 4, '2020-04-24 18:39:52', '2020-04-24 18:39:52'),
(47, 'admin', 'test', 'admin', 'testadmin', 'test@gmail.com', 'd54d1702ad0f8326224b817c796763c9', '', NULL, 'sample_user.jpg', '5eacc43d9c2a3', 1, 'a:7:{i:0;s:2:\"15\";i:1;s:2:\"25\";i:2;s:2:\"28\";i:3;s:2:\"27\";i:4;s:2:\"13\";i:5;s:2:\"35\";i:6;s:2:\"34\";}', '', 'a:0:{}', 'offline', '2020-07-14 22:15:55', 'a:0:{}', 1, 4, '2020-04-25 09:15:48', '2020-04-25 09:15:48'),
(48, 'test', 'talha', 'customer', 'test123', 'testtalha@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', '', NULL, 'sample_user.jpg', '5ea401a5d6e56', 2, '', '', '', 'offline', '2020-04-25 09:23:49', '', 1, 4, '2020-04-25 09:23:49', '2020-04-25 09:23:49'),
(50, 'Kimberley', 'reqyzu', 'customer', 'sibeqefo', 'hobora@mailinator.net', '80bc114d9c3c4553afc6e5588464cec7', '', NULL, 'sample_user.jpg', '5ea7568da42ae', 2, '', '', '', 'offline', '2020-04-27 22:02:53', '', 1, 4, '2020-04-27 22:02:53', '2020-04-27 22:02:53'),
(37, 'Test', 'test', 'customer', 'demo', 'demo@gmail.com', 'e6e061838856bf47e1de730719fb2609', '', NULL, 'sample_user.jpg', '5e661cdd45504', 1, '', '', '', 'online', '2020-03-09 10:39:25', '', 1, 3, '2020-03-09 10:39:25', '2020-03-09 10:39:25'),
(39, 'Jazib', 'Javed', 'customer', 'jjjservicess', 'jjjservicess@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', NULL, 'sample_user.jpg', '', 1, '', '', '', 'online', '2020-03-26 17:17:22', 'a:1:{i:0;s:2:\"26\";}', 1, 3, '2020-03-26 17:17:22', '2020-03-26 17:17:22'),
(49, 'Jerome', 'pafofaqe', 'customer', 'letefoj', 'xumowyqe@mailinator.net', '80bc114d9c3c4553afc6e5588464cec7', '', NULL, 'sample_user.jpg', '5ea755ab3eb46', 2, '', '', '', 'offline', '2020-04-27 21:59:07', '', 1, 4, '2020-04-27 21:59:07', '2020-04-27 21:59:07'),
(41, 'Pamela', 'Whittaker', 'customer', 'knutsfordsoftware', 'knutsfordsoftware@gmail.com', '', '', NULL, 'sample_user.jpg', '', 1, '', '', '', 'online', '2020-03-28 17:12:30', 'a:1:{i:0;s:2:\"38\";}', 1, 3, '2020-03-28 17:12:30', '2020-03-28 17:12:30'),
(72, 'qa', 'test', 'customer', 'damllbuyer', 'softwaretester910@gmail.com', '5e8667a439c68f5145dd2fcbecf02209', '', NULL, 'sample_user.jpg', '5ebe982ae6b24', 1, 'a:5:{i:0;s:2:\"35\";i:1;s:2:\"27\";i:2;s:2:\"13\";i:3;s:2:\"34\";i:4;s:2:\"33\";}', '', '', 'online', '2020-06-10 00:28:32', 'a:2:{i:0;s:2:\"71\";i:1;s:2:\"38\";}', 1, 5, '2020-05-15 13:24:58', '2020-05-15 13:24:58'),
(59, 'Yael', 'cosivota', 'customer', 'rarycojika', 'gopokec@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', NULL, 'sample_user.jpg', '5ea9cea411d87', 2, '', '', '', 'offline', '2020-04-29 18:59:48', '', 1, 4, '2020-04-29 18:59:48', '2020-04-29 18:59:48'),
(60, 'Tashya', 'lesynujer', 'customer', 'bimyhav', 'bako@mailinator.net', '0192023a7bbd73250516f069df18b500', '', NULL, 'sample_user.jpg', '5ea9d5283d6dc', 2, '', '', '', 'offline', '2020-04-29 19:27:36', '', 1, 4, '2020-04-29 19:27:36', '2020-04-29 19:27:36'),
(61, 'Tashya', 'lesynujer', 'customer', 'bimyhav', 'bako@mailinator.net', '0192023a7bbd73250516f069df18b500', '', NULL, 'sample_user.jpg', '5ea9d5283d6dc', 2, '', '', '', 'offline', '2020-04-29 19:27:36', '', 1, 4, '2020-04-29 19:27:36', '2020-04-29 19:27:36'),
(62, 'talha', 'testing', 'customer', 'talhatesting123', 'talhatesting123@gmail.com', '9e4ce5701f9f4467095394a2d0d0a4a7', '', NULL, 'sample_user.jpg', '5eaa8e51d6eff', 2, '', '', '', 'offline', '2020-04-30 08:37:37', '', 1, 4, '2020-04-30 08:37:37', '2020-04-30 08:37:37'),
(63, 'Imelda', 'kowenas', 'customer', 'muxupasi', 'r112223ace@mailinator.net', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', NULL, 'sample_user.jpg', '5eaab2ad3e6ec', 2, '', '', '', 'offline', '2020-04-30 11:12:45', '', 1, 4, '2020-04-30 11:12:45', '2020-04-30 11:12:45'),
(64, 'qqqqqqqqq', 'qqqq', 'customer', 'qqqqqqq', 'foodtruck@e.com', 'd54d1702ad0f8326224b817c796763c9', '', NULL, 'sample_user.jpg', '5eaaf0b750746', 2, '', '', '', 'offline', '2020-04-30 15:37:27', '', 1, 4, '2020-04-30 15:37:27', '2020-04-30 15:37:27'),
(66, 'qqq', 'qqqq', 'customer', 'damiltesterqaqa', 'mdamilzaheer@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', NULL, 'sample_user.jpg', '5eb1582a2507e', 1, '', '', '', 'online', '2020-05-05 12:12:26', '', 1, 5, '2020-05-05 12:12:26', '2020-05-05 12:12:26'),
(69, 'test', 'test', 'customer', 'test', 'test@e.com', 'cc03e747a6afbbcbf8be7668acfebee5', '', NULL, 'sample_user.jpg', '5eb4378d7642f', 2, '', '', '', 'offline', '2020-05-07 16:30:05', '', 1, 5, '2020-05-07 16:30:05', '2020-05-07 16:30:05'),
(70, 'Talha', 'Testing', 'customer', 'Talhatesting406', 'talhatesting406@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', NULL, 'sample_user.jpg', '5ebe507ce019c', 2, '', '', '', 'offline', '2020-05-15 08:19:08', '', 1, 5, '2020-05-15 08:19:08', '2020-05-15 08:19:08'),
(73, 'Sibgha', 'Ilyas', 'customer', 'sibghailyas967@gmail.com', 'sibghailyas967@gmail.com', '', '', NULL, 'sample_user.jpg', '', 1, '', '', '', 'offline', '2020-06-09 22:29:28', '', 1, 6, '2020-06-09 15:17:38', '2020-06-09 15:17:38'),
(74, 'Adnan', 'Arif', 'customer', 'adnanarif', 'adnan.arif50@gmail.com', '2a682f9714a2a948457c51ec784a3b6c', '', NULL, 'sample_user.jpg', '5eea313459f50', 1, 'a:1:{i:0;s:2:\"36\";}', '', '', 'offline', '2020-07-13 20:21:04', '', 1, 6, '2020-06-17 15:05:24', '2020-06-17 15:05:24'),
(75, 'Burhan', 'Azhar', 'customer', 'BurhanTest', 'burhanazhar111@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', NULL, 'sample_user.jpg', '5f0831db9f234', 1, 'a:2:{i:0;s:2:\"34\";i:1;s:2:\"39\";}', '', 'a:3:{i:0;a:6:{s:7:\"item_id\";s:2:\"39\";s:10:\"item_price\";s:3:\"213\";s:11:\"offer_price\";s:1:\"3\";s:9:\"offer_msg\";s:3:\"eee\";s:12:\"auth_user_id\";s:2:\"75\";s:6:\"status\";s:7:\"pending\";}i:1;a:6:{s:7:\"item_id\";s:2:\"34\";s:10:\"item_price\";s:4:\"1111\";s:11:\"offer_price\";s:2:\"10\";s:9:\"offer_msg\";s:2:\"ty\";s:12:\"auth_user_id\";s:2:\"75\";s:6:\"status\";s:7:\"pending\";}i:2;a:6:{s:7:\"item_id\";s:2:\"35\";s:10:\"item_price\";s:4:\"1122\";s:11:\"offer_price\";s:3:\"999\";s:9:\"offer_msg\";s:5:\"iuyiu\";s:12:\"auth_user_id\";s:2:\"75\";s:6:\"status\";s:7:\"pending\";}}', 'online', '2020-07-22 22:14:18', '', 1, 7, '2020-07-10 09:16:11', '2020-07-10 09:16:11'),
(76, 'Annie', 'Solaren', 'customer', 'Annieboo', 'babyboo_1232002@yahoo.co.uk', '7816a2ccbd03d4eb56382830dca170d9', '', NULL, 'sample_user.jpg', '5f1d873aa22b4', 2, '', '', '', 'offline', '2020-07-26 13:38:02', '', 1, 7, '2020-07-26 13:38:02', '2020-07-26 13:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `users_feedbacks`
--

CREATE TABLE `users_feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_feedbackid` int(11) NOT NULL,
  `rating` int(250) NOT NULL DEFAULT '0',
  `notes` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `orderId` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_feedbacks`
--

INSERT INTO `users_feedbacks` (`id`, `user_id`, `user_feedbackid`, `rating`, `notes`, `status`, `orderId`, `created_at`) VALUES
(12, 26, 71, 5, 'Testing', 1, '5f05b9f017de5', '2020-07-09 12:46:49'),
(13, 26, 21, 5, 'No matter what', 1, '5ed8f287d04d2', '2020-07-09 12:47:16'),
(14, 26, 71, 5, 'This is the classic feedback.', 1, '5f05b9b4bbb64', '2020-07-09 12:53:08'),
(15, 75, 71, 1, 'Recommended', 1, '5f08960ed0012', '2020-07-10 16:29:07'),
(16, 71, 26, 0, 'sadasa', 1, '5f0820f0d192a', '2020-07-13 09:26:40'),
(17, 71, 26, 0, 'sadasa', 1, '5f0820f0d192a', '2020-07-13 09:26:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatId`);

--
-- Indexes for table `chatstart`
--
ALTER TABLE `chatstart`
  ADD PRIMARY KEY (`chatStartId`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concierge`
--
ALTER TABLE `concierge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_feedbacks`
--
ALTER TABLE `item_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_items`
--
ALTER TABLE `list_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_alert`
--
ALTER TABLE `notifications_alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offerdata`
--
ALTER TABLE `offerdata`
  ADD PRIMARY KEY (`offerId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searches`
--
ALTER TABLE `searches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripeSettings`
--
ALTER TABLE `stripeSettings`
  ADD PRIMARY KEY (`stripeId`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_feedbacks`
--
ALTER TABLE `users_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chatstart`
--
ALTER TABLE `chatstart`
  MODIFY `chatStartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `concierge`
--
ALTER TABLE `concierge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `item_feedbacks`
--
ALTER TABLE `item_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `list_items`
--
ALTER TABLE `list_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications_alert`
--
ALTER TABLE `notifications_alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `offerdata`
--
ALTER TABLE `offerdata`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `searches`
--
ALTER TABLE `searches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `stripeSettings`
--
ALTER TABLE `stripeSettings`
  MODIFY `stripeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users_feedbacks`
--
ALTER TABLE `users_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
