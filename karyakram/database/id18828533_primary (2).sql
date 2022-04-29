-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2022 at 01:10 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18828533_primary`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Health'),
(3, 'Outdoor'),
(4, 'Art'),
(5, 'Entertainment'),
(6, 'Education'),
(7, 'IT'),
(8, 'Vocation');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `deadline` date DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(5) NOT NULL DEFAULT 0,
  `organizer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) NOT NULL,
  `tags` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_Id` int(11) NOT NULL,
  `interested` int(10) NOT NULL DEFAULT 0,
  `present` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `start_date`, `end_date`, `deadline`, `location`, `price`, `organizer`, `detail`, `image`, `category`, `tags`, `user_Id`, `interested`, `present`) VALUES
(1, 'Mass Communication', '2022-04-30', '2022-05-15', '2022-04-27', 'Kirtipur, Kathmandu', 0, 'ABC Youth Club', 'Mass communication workshop for youths of Kirtipur. Organized by Kirtipur Municipality Office ward-3.', '2.jpg', 6, 'education, outdoor', 1, 0, 0),
(2, 'Web Dev', '2022-04-30', '2022-07-30', '2022-04-27', 'Teku, Kathmandu', 1500, 'Kirtipur Municipality', 'A 3 month Web Development Bootcamp. This bootcamp facilitates MERN Stack', '2.jpg', 7, '', 2, 5, 0),
(3, 'Free Eye Checkup', '2022-04-30', '2022-05-07', '2022-04-30', 'Balkhu, Kathmandu', 0, 'ABC Youth Club', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '2.jpg', 1, '', 3, 5, 0),
(4, 'Polio Vaccine', '2022-04-30', '2022-05-07', '2022-04-30', 'Teku, Kathmadnu', 0, 'Kirtipur Municipality', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. I', '2.jpg', 1, '', 3, 5, 0),
(5, 'Covid Vaccine', '2022-05-01', '2022-05-05', '2022-05-05', 'Kirtipur, Kathmandu', 0, 'ABC Youth Club', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ', '2.jpg', 1, '', 4, 2000, 0),
(6, 'Concert', '2022-05-07', '2022-05-07', '2022-05-06', 'Tudikhel, Kathmandu', 750, 'Kirtipur Municipality', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ', '2.jpg', 5, '', 5, 800, 0),
(7, 'CofeforChange Hackathon', '2022-03-20', '2022-08-05', '2022-03-10', 'Panga, Kirtipu', 500, 'ABC Youth Club', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ', '2.jpg', 8, '', 5, 10, 0),
(8, 'Carpentry Workshop', '2022-05-07', '2022-07-30', '2022-05-06', 'Panga, Kathmandu', 500, 'Kirtipur Municipality', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. ', '2.jpg', 8, '', 5, 1500, 0),
(9, 'Cycling', '2022-05-01', '2022-05-05', '2022-05-01', 'Basantapur, Kathandu', 0, 'ABC Youth Club', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. ', '2.jpg', 3, '', 2, 1800, 0),
(10, 'Marathon', '2022-04-30', '2022-04-30', '2022-04-29', 'Patan, Lalitpur', 0, 'Kirtipur Municipality', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at turpis ligula. Nam purus nunc, tincidunt a magna sit amet, pretium tincidunt tellus. Pellentesque et efficitur mi, a maximus magna. Praesent efficitur iaculis purus quis volutpat. Nullam eu maximus lacus. Nullam mauris eros, imperdiet eget pulvinar euismod, elementum non lacus. Maecenas pretium et turpis vitae rutrum. Integer sapien nibh, sagittis in elit in, blandit luctus mi. Nunc lobortis gravida consectetur. ', '2.jpg', 3, '', 4, 200, 0),
(13, 'Blood Donation', '2022-05-25', '2022-05-27', '2022-05-27', 'Basantapur, Kathandu', 0, 'ABC Youth Club', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at turpis ligula. Nam purus nunc, tincidunt a magna sit amet, pretium tincidunt tellus. Pellentesque et efficitur mi, a maximus magna. Praesent efficitur iaculis purus quis volutpat. ', '2.jpg', 1, '', 3, 5, 0),
(14, 'AIDS awarness', '2022-05-03', '2022-05-03', '2022-05-02', 'Bagghbazar, Kathmandu', 0, 'Kirtipur Municipality', 'Pellentesque et efficitur mi, a maximus magna. Praesent efficitur iaculis purus quis volutpat. Nullam eu maximus lacus. Nullam mauris eros, imperdiet eget pulvinar euismod, elementum non lacus. Maecenas pretium et turpis vitae rutrum. Integer sapien nibh, sagittis in elit in, blandit luctus mi. Nunc lobortis gravida consectetur. ', '2.jpg', 1, '', 2, 500, 0),
(15, 'Baksetball Match', '2022-04-30', '2022-04-30', '2022-04-30', 'Jhamsikhel, Lalitpur', 300, 'ABC Youth Club', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2.jpg', 3, '', 4, 5, 0),
(16, 'Protest', '2022-05-07', '2022-05-07', '2022-05-07', 'Maitighar, Kathmandu', 0, 'Kirtipur Municipality', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2.jpg', 3, '', 3, 1000, 0),
(17, 'Free Git Workshop', '2022-05-25', '2022-05-30', '2022-05-30', 'Putalisadak, Kathmandu', 0, 'ABC Youth Club', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2.jpg', 7, '', 6, 1500, 0),
(18, 'Achs Hackathon', '2022-03-01', '2022-04-01', '2022-03-11', 'Putalisadak, Kathmandu', 500, 'Kirtipur Municipality', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2.jpg', 7, '', 3, 100, 90),
(19, 'CFC Hackathon', '2022-03-03', '2022-03-08', '2022-03-01', 'Minbhawan, Kathmandu', 50, 'ABC Youth Club', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2.jpg', 7, '', 4, 121, 100),
(20, 'Office Mastery', '2022-05-01', '2022-05-27', '2022-05-01', 'Baghbazar, Kathmandu', 1000, 'Kirtipur Municipality', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2.jpg', 7, '', 5, 10, 0),
(21, 'Dance Competition', '2022-02-22', '2022-02-26', '2022-02-21', 'Jawalakhel,Lalitpur', 10000, 'XYZ club', 'All the people who are interested are requested to register their name and also we warmly welcome all the participants', '2.jpg', 5, '', 16, 300, 290),
(22, 'Self Defence Program', '2022-06-06', '2022-06-07', '2022-06-06', 'Kirtipur', 0, 'kirtipur Municipality', 'fhjhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2.jpg', 3, '', 8, 22, 0),
(23, 'Free Python Training', '2022-04-30', '2022-05-06', '2022-04-30', 'DilliBazar,Kathmandu', 0, 'XYZ youth club', 'When planning your scavenger hunt, include a task that requires participants to ask five strangers to “name their favorite thing about the school.” Include a “find the hidden talent” challenge that encourages competitors to build bonds with other students by unlocking their unique skills. The opportunities are endless!', '2.jpg', 6, '', 15, 10, 0),
(25, 'FirstAid Training', '2022-05-11', '2022-05-16', '2022-05-11', 'Kuleshwor,Kathmandu', 0, 'XYZ youth club', 'When planning your scavenger hunt, include a task that requires participants to ask five strangers to “name their favorite thing about the school.” Include a “find the hidden talent” challenge that encourages competitors to build bonds with other students by unlocking their unique skills. The opportunities are endless!', '2.jpg', 1, '', 11, 1700, 0),
(26, 'Gardening', '2022-05-05', '2022-05-05', '2022-05-05', 'Kirtipur', 0, 'kirtipur Municipality', 'When planning your scavenger hunt, include a task that requires participants to ask five strangers to “name their favorite thing about the school.” Include a “find the hidden talent” challenge that encourages competitors to build bonds with other students by unlocking their unique skills. The opportunities are endless!', '2.jpg', 8, '', 19, 1400, 0),
(32, 'test event', '2022-04-30', '2022-05-03', '2022-04-30', 'Kirtipur', 0, 'This Org', 'details details details details details details details details details details details details details details details details details details details details details details details details ', 'a.png', 6, 'Art,Entertainment,Education', 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `attendence` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `user_id`, `event_id`, `attendence`) VALUES
(1, 1, 18, 1),
(2, 1, 15, 0),
(3, 2, 18, 1),
(4, 2, 15, 0),
(5, 3, 1, 0),
(6, 4, 1, 0),
(7, 3, 2, 0),
(8, 4, 3, 0),
(9, 5, 3, 0),
(10, 6, 6, 0),
(11, 8, 6, 0),
(12, 9, 6, 0),
(13, 6, 5, 0),
(14, 9, 5, 0),
(15, 1, 7, 0),
(16, 9, 8, 0),
(17, 12, 15, 0),
(18, 11, 16, 1),
(19, 13, 15, 1),
(20, 12, 16, 0),
(21, 11, 15, 0),
(22, 13, 16, 1),
(23, 18, 20, 0),
(24, 14, 22, 0),
(25, 15, 14, 0),
(26, 14, 20, 0),
(27, 18, 14, 0),
(28, 15, 21, 0),
(29, 10, 17, 0),
(30, 16, 23, 0),
(87, 10, 17, 60),
(88, 16, 13, 1),
(89, 10, 16, 40),
(90, 17, 22, 0),
(91, 18, 17, 1),
(92, 16, 22, 0),
(93, 10, 23, 1),
(94, 19, 23, 0),
(95, 18, 16, 0),
(96, 17, 23, 1),
(97, 20, 20, 0),
(98, 13, 22, 0),
(99, 14, 10, 1),
(100, 22, 17, 0),
(113, 22, 14, 1),
(114, 21, 26, 0),
(115, 10, 16, 1),
(116, 22, 25, 0),
(117, 1, 1, 0),
(118, 1, 1, 0),
(119, 1, 1, 0),
(120, 1, 1, 0),
(121, 1, 1, 0),
(122, 1, 1, 0),
(123, 1, 1, 0),
(124, 1, 1, 0),
(125, 1, 1, 0),
(126, 1, 1, 0),
(233, 2, 2, 0),
(234, 2, 2, 0),
(235, 2, 2, 0),
(236, 2, 2, 0),
(237, 2, 2, 0),
(238, 2, 2, 0),
(239, 2, 2, 0),
(240, 2, 2, 0),
(241, 10, 15, 1),
(242, 10, 15, 1),
(243, 10, 15, 1),
(244, 10, 15, 1),
(245, 10, 15, 1),
(246, 10, 15, 1),
(247, 10, 15, 1),
(248, 10, 15, 1),
(249, 10, 15, 1),
(250, 67, 20, 0),
(251, 68, 21, 12),
(252, 69, 22, 19),
(253, 67, 20, 0),
(254, 68, 21, 12),
(255, 69, 22, 19),
(256, 67, 20, 0),
(257, 68, 21, 12),
(258, 69, 22, 19),
(259, 67, 20, 0),
(260, 68, 21, 12),
(261, 69, 22, 19),
(262, 26, 7, 0),
(263, 27, 7, 0),
(264, 1, 2, 0),
(265, 1, 19, 1),
(266, 2, 19, 1),
(267, 3, 19, 1),
(268, 4, 19, 1),
(269, 5, 19, 1),
(270, 6, 19, 1),
(271, 13, 19, 1),
(272, 8, 19, 1),
(273, 9, 19, 1),
(274, 10, 19, 1),
(275, 11, 19, 1),
(276, 12, 19, 1),
(277, 14, 19, 1),
(278, 15, 19, 1),
(279, 16, 19, 1),
(280, 17, 19, 1),
(281, 18, 19, 1),
(282, 19, 19, 1),
(283, 20, 19, 1),
(284, 21, 19, 1),
(285, 22, 19, 1),
(286, 23, 19, 1),
(287, 24, 19, 1),
(288, 25, 19, 1),
(289, 26, 19, 1),
(290, 27, 19, 1),
(291, 28, 19, 1),
(292, 29, 19, 1),
(293, 30, 19, 1),
(294, 31, 19, 1),
(295, 32, 19, 1),
(296, 34, 19, 1),
(297, 35, 19, 1),
(298, 36, 19, 1),
(299, 37, 19, 1),
(300, 38, 19, 1),
(301, 39, 19, 0),
(302, 40, 19, 0),
(303, 41, 19, 0),
(304, 42, 19, 0),
(305, 43, 19, 0),
(306, 44, 19, 0),
(307, 45, 19, 0),
(308, 46, 19, 0),
(309, 47, 19, 0),
(310, 48, 19, 0),
(311, 49, 19, 0),
(312, 50, 19, 0),
(313, 51, 19, 0),
(314, 52, 19, 0),
(315, 53, 19, 0),
(316, 54, 19, 0),
(317, 55, 19, 0),
(318, 56, 19, 0),
(319, 57, 19, 0),
(320, 58, 19, 0),
(321, 59, 19, 0),
(322, 60, 19, 0),
(323, 60, 19, 0),
(324, 61, 19, 1),
(325, 62, 19, 1),
(326, 63, 19, 1),
(327, 64, 19, 1),
(328, 65, 19, 1),
(329, 66, 19, 1),
(330, 67, 19, 1),
(331, 68, 19, 1),
(332, 69, 19, 1),
(333, 70, 19, 1),
(334, 71, 19, 1),
(335, 72, 19, 1),
(336, 73, 19, 1),
(337, 74, 19, 1),
(338, 75, 19, 1),
(339, 76, 19, 1),
(340, 77, 19, 1),
(341, 78, 19, 1),
(342, 79, 19, 1),
(343, 80, 19, 1),
(462, 81, 19, 0),
(463, 82, 19, 0),
(464, 83, 19, 0),
(465, 84, 19, 0),
(466, 85, 19, 0),
(467, 86, 19, 0),
(468, 87, 19, 0),
(469, 88, 19, 0),
(470, 89, 19, 0),
(471, 90, 19, 0),
(472, 91, 19, 0),
(473, 92, 19, 0),
(474, 93, 19, 0),
(475, 94, 19, 0),
(476, 95, 19, 0),
(477, 96, 19, 0),
(478, 97, 19, 0),
(479, 98, 19, 0),
(480, 99, 19, 0),
(481, 100, 19, 0),
(482, 101, 19, 0),
(483, 102, 19, 1),
(484, 103, 19, 1),
(485, 104, 19, 1),
(486, 105, 19, 1),
(487, 106, 19, 1),
(488, 107, 19, 1),
(489, 108, 19, 1),
(490, 109, 19, 1),
(491, 110, 19, 1),
(492, 111, 19, 1),
(493, 112, 19, 1),
(494, 113, 19, 1),
(495, 114, 19, 1),
(496, 115, 19, 1),
(497, 16, 19, 1),
(498, 117, 19, 1),
(499, 118, 19, 1),
(500, 119, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `age` int(5) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `blacklist` int(50) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `contact`, `password`, `dob`, `age`, `status`, `blacklist`, `created`, `role`) VALUES
(1, 'AppleBoi', 'appleB@gmail.com', '9860222338', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1999-12-18', 22, 1, 0, '2022-04-28 13:25:24', 0),
(2, 'AppleGirl', 'appleG@gmail.com', '9866666665', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1999-12-19', 23, 0, 0, '2022-04-28 13:25:24', 0),
(3, 'BananaBoi', 'bananaB@gmail.com', '9866666664', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1999-12-20', 23, 0, 0, '2022-04-28 13:25:24', 0),
(4, 'BananaGirl', 'bananaG@gmail.com', '9800000000', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1999-12-21', 23, 0, 0, '2022-04-28 13:25:24', 0),
(5, 'CarrotBoi', 'carrotB@gmail.com', '5555555555', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1999-12-18', 23, 0, 0, '2022-04-28 13:25:24', 0),
(6, 'CarrotGirl', 'carrotG@gmail.com', '9866666660', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1999-12-21', 23, 0, 0, '2022-04-28 13:25:24', 0),
(8, 'sauravprasad', 'sauravp@gmail.com', '9841222222', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '2000-05-05', 21, 0, 0, '2022-04-28 13:25:24', 0),
(9, 'rajulama', 'rajul@gmail.com', '9813636212', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '2005-03-03', 17, 0, 0, '2022-04-28 13:25:24', 0),
(10, 'krishnaLal', 'krishnal@gmail.com', '9813636212', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1996-11-09', 26, 0, 0, '2022-04-28 13:25:24', 0),
(11, 'user33', 'user33@gmail.com', '9813636212', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1996-05-11', 26, 0, 0, '2022-04-28 13:25:24', 0),
(12, 'user4', 'user4@gmail.com', '9813527885', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1995-07-07', 27, 0, 0, '2022-04-28 13:25:24', 0),
(13, 'user6', 'user6@gmail.com', '9813527885', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1990-12-23', 32, 0, 0, '2022-04-28 13:25:24', 0),
(14, 'GuruPrasad', 'gurup@gmail.com', '9813527665', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1986-07-23', 36, 0, 0, '2022-04-28 13:25:24', 0),
(15, 'KaliPrasad', 'kalip@gmail.com', '9810888888', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1984-11-22', 38, 0, 0, '2022-04-28 13:25:24', 0),
(16, 'uer56', 'user56@gmail.com', '9810888888', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1983-10-12', 39, 0, 0, '2022-04-28 13:25:24', 0),
(17, 'GuruMainali', 'gurum@gmail.com', '9810987654', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1984-11-22', 38, 0, 0, '2022-04-28 13:25:24', 0),
(18, 'user77', 'user77@gmail.com', '9819135678', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1966-11-22', 56, 0, 0, '2022-04-28 13:25:24', 0),
(19, 'user76', 'user76@gmail.com', '9810888888', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1964-04-04', 58, 0, 0, '2022-04-28 13:25:24', 0),
(20, 'JanakLal', 'janakl@gmail.com', '9813527885', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '1962-11-09', 60, 0, 0, '2022-04-28 13:25:24', 0),
(21, 'user12', 'user12@gmail.com', '9841222222', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '2006-11-22', 18, 0, 0, '2022-04-28 13:25:24', 0),
(22, 'user22', 'user22@gmail,.com', '9813627364', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '2007-10-10', 19, 0, 0, '2022-04-28 13:25:24', 0),
(23, 'user55', 'user55@gmail.com', '9841222222', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '2008-09-08', 20, 0, 0, '2022-04-28 13:25:24', 0),
(24, 'user66', 'user66@gmail.com', '9813627364', '$2y$10$AMAxaWbaeASOqkiuwJHOnuB1wliCQtbhJsgrxev8RxmC1EDHualqG', '2009-10-10', 21, 0, 0, '2022-04-28 13:25:24', 0),
(25, 'ashesh', 'ashesh112233@gmail.com', '9818414487', '$2y$10$qQd3RnK1HnTWRItR69aaF.phzc69rbNK3M.0CExumd54VawRonFxC', '2055-05-25', 23, 1, 0, '2022-04-28 13:44:26', 1),
(26, 'cat women ', 'cat@gmail.com', '11243243', '123123123', '1889-12-20', 14, 0, 1, '2022-04-28 18:00:42', 1),
(27, 'cat women ', 'cat@gmail.com', '11243243', '123123123', '1879-12-20', 14, 0, 1, '2022-04-28 18:01:39', 1),
(28, 'cat women ', 'cat@gmail.com', '11243243', '123123123', '1889-12-20', 14, 0, 1, '2022-04-28 18:01:39', 1),
(29, 'cat women ', 'cat@gmail.com', '11243243', '123123123', '1880-12-20', 14, 0, 1, '2022-04-28 18:01:39', 1),
(30, 'cat women ', 'cat@gmail.com', '11243243', '123123123', '1689-12-20', 14, 0, 1, '2022-04-28 18:01:39', 1),
(31, 'cat women ', 'cat@gmail.com', '11243243', '123123123', '1789-12-20', 14, 0, 1, '2022-04-28 18:01:39', 1),
(32, 'pink panther  ', 'pink@gmail.com', '11243243', '123123123', '1879-12-20', 14, 0, 1, '2022-04-28 18:02:39', 1),
(33, 'pink panther ', 'pink@gmail.com', '11243243', '123123123', '1889-12-20', 14, 0, 1, '2022-04-28 18:02:39', 1),
(34, 'pink panther ', 'v@gmail.com', '11243243', '123123123', '1880-12-20', 14, 0, 1, '2022-04-28 18:02:39', 1),
(35, 'cpink panther ', 'pink@gmail.com', '11243243', '123123123', '1689-12-20', 14, 0, 1, '2022-04-28 18:02:39', 1),
(36, 'cpink panthermen ', 'pink@gmail.com', '11243243', '123123123', '1789-12-20', 14, 0, 1, '2022-04-28 18:02:39', 1),
(37, 'pink panther  ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 14, 0, 1, '2022-04-28 18:04:06', 0),
(38, 'pink panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 14, 0, 1, '2022-04-28 18:04:06', 0),
(39, 'pink pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 14, 0, 1, '2022-04-28 18:04:06', 0),
(40, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 14, 0, 1, '2022-04-28 18:04:06', 0),
(41, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 14, 0, 1, '2022-04-28 18:04:06', 0),
(42, 'pink panther  ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 56, 0, 1, '2022-04-28 18:06:03', 0),
(43, 'pink panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 10, 0, 1, '2022-04-28 18:06:03', 0),
(44, 'pink pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 20, 0, 1, '2022-04-28 18:06:03', 0),
(45, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 40, 0, 1, '2022-04-28 18:06:03', 0),
(46, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 30, 0, 1, '2022-04-28 18:06:03', 0),
(47, 'nirobi  ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 45, 0, 0, '2022-04-28 18:06:03', 0),
(48, 'balen panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 23, 0, 0, '2022-04-28 18:06:03', 0),
(49, 'sharha pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 15, 0, 0, '2022-04-28 18:06:03', 0),
(50, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 67, 0, 0, '2022-04-28 18:06:03', 0),
(51, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 80, 0, 0, '2022-04-28 18:06:03', 0),
(52, 'pink panther ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 56, 0, 1, '2022-04-28 18:06:51', 0),
(53, 'pink panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 10, 0, 1, '2022-04-28 18:06:51', 0),
(54, 'pink pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 20, 0, 1, '2022-04-28 18:06:51', 0),
(55, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 40, 0, 1, '2022-04-28 18:06:51', 0),
(56, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 30, 0, 1, '2022-04-28 18:06:51', 0),
(57, 'nirobi ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 45, 0, 0, '2022-04-28 18:06:51', 0),
(58, 'balen panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 23, 0, 0, '2022-04-28 18:06:51', 0),
(59, 'sharha pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 15, 0, 0, '2022-04-28 18:06:51', 0),
(60, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 67, 0, 0, '2022-04-28 18:06:51', 0),
(61, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 80, 0, 0, '2022-04-28 18:06:51', 0),
(62, 'pink panther ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 56, 0, 1, '2022-04-28 18:07:41', 0),
(63, 'pink panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 10, 0, 1, '2022-04-28 18:07:41', 0),
(64, 'pink pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 20, 0, 1, '2022-04-28 18:07:41', 0),
(65, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 40, 0, 1, '2022-04-28 18:07:41', 0),
(66, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 30, 0, 1, '2022-04-28 18:07:41', 0),
(67, 'nirobi ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 45, 0, 0, '2022-04-28 18:07:41', 0),
(68, 'balen panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 23, 0, 0, '2022-04-28 18:07:41', 0),
(69, 'sharha pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 15, 0, 0, '2022-04-28 18:07:41', 0),
(70, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 67, 0, 0, '2022-04-28 18:07:41', 0),
(71, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 80, 0, 0, '2022-04-28 18:07:41', 0),
(72, 'pink panther ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 56, 0, 1, '2022-04-28 18:07:41', 0),
(73, 'pink panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 10, 0, 1, '2022-04-28 18:07:41', 0),
(74, 'pink pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 20, 0, 1, '2022-04-28 18:07:41', 0),
(75, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 40, 0, 1, '2022-04-28 18:07:41', 0),
(76, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 30, 0, 1, '2022-04-28 18:07:41', 0),
(77, 'nirobi ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 45, 0, 0, '2022-04-28 18:07:41', 0),
(78, 'balen panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 23, 0, 0, '2022-04-28 18:07:41', 0),
(79, 'sharha pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 15, 0, 0, '2022-04-28 18:07:41', 0),
(80, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 67, 0, 0, '2022-04-28 18:07:41', 0),
(81, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 80, 0, 0, '2022-04-28 18:07:41', 0),
(82, 'pink panther ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 56, 0, 1, '2022-04-28 18:08:23', 0),
(83, 'pink panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 10, 0, 1, '2022-04-28 18:08:23', 0),
(84, 'pink pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 20, 0, 1, '2022-04-28 18:08:23', 0),
(85, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 40, 0, 1, '2022-04-28 18:08:23', 0),
(86, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 30, 0, 1, '2022-04-28 18:08:23', 0),
(87, 'nirobi ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 45, 0, 0, '2022-04-28 18:08:23', 0),
(88, 'balen panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 23, 0, 0, '2022-04-28 18:08:23', 0),
(89, 'sharha pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 15, 0, 0, '2022-04-28 18:08:23', 0),
(90, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 67, 0, 0, '2022-04-28 18:08:23', 0),
(91, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 80, 0, 0, '2022-04-28 18:08:23', 0),
(92, 'pink panther ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 56, 0, 1, '2022-04-28 18:08:23', 0),
(93, 'pink panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 10, 0, 1, '2022-04-28 18:08:23', 0),
(94, 'pink pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 20, 0, 1, '2022-04-28 18:08:23', 0),
(95, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 40, 0, 1, '2022-04-28 18:08:23', 0),
(96, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 30, 0, 1, '2022-04-28 18:08:23', 0),
(97, 'nirobi ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 45, 0, 0, '2022-04-28 18:08:23', 0),
(98, 'balen panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 23, 0, 0, '2022-04-28 18:08:23', 0),
(99, 'sharha pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 15, 0, 0, '2022-04-28 18:08:23', 0),
(100, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 67, 0, 0, '2022-04-28 18:08:23', 0),
(101, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 80, 0, 0, '2022-04-28 18:08:23', 0),
(102, 'pink panther ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 56, 0, 1, '2022-04-28 18:09:14', 0),
(103, 'pink panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 10, 0, 1, '2022-04-28 18:09:14', 0),
(104, 'pink pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 20, 0, 1, '2022-04-28 18:09:14', 0),
(105, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 40, 0, 1, '2022-04-28 18:09:14', 0),
(106, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 30, 0, 1, '2022-04-28 18:09:14', 0),
(107, 'nirobi ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 45, 0, 0, '2022-04-28 18:09:14', 0),
(108, 'balen panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 23, 0, 0, '2022-04-28 18:09:14', 0),
(109, 'sharha pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 15, 0, 0, '2022-04-28 18:09:14', 0),
(110, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 67, 0, 0, '2022-04-28 18:09:14', 0),
(111, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 80, 0, 0, '2022-04-28 18:09:14', 0),
(112, 'pink panther ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 56, 0, 1, '2022-04-28 18:09:14', 0),
(113, 'pink panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 10, 0, 1, '2022-04-28 18:09:14', 0),
(114, 'pink pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 20, 0, 1, '2022-04-28 18:09:14', 0),
(115, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 40, 0, 1, '2022-04-28 18:09:14', 0),
(116, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 30, 0, 1, '2022-04-28 18:09:14', 0),
(117, 'nirobi ree ', 'pink@gmail.com', '11243243', '123123123', '1998-12-20', 45, 0, 0, '2022-04-28 18:09:14', 0),
(118, 'balen panthereffd ', 'pink@gmail.com', '11243243', '123123123', '0198-12-20', 23, 0, 0, '2022-04-28 18:09:14', 0),
(119, 'sharha pantherfdfd ', 'v@gmail.com', '11243243', '123123123', '1978-12-20', 15, 0, 0, '2022-04-28 18:09:14', 0),
(120, 'cpink pantherfdd ', 'pink@gmail.com', '11243243', '123123123', '1968-12-20', 67, 0, 0, '2022-04-28 18:09:14', 0),
(121, 'cpink panthermen fddf', 'pink@gmail.com', '11243243', '123123123', '1958-12-20', 80, 0, 0, '2022-04-28 18:09:14', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_Id` (`user_Id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interests_ibfk_1` (`user_id`),
  ADD KEY `interests_ibfk_2` (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Constraints for table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interests_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
