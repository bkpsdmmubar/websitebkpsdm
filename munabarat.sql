-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2024 pada 01.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `munabarat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `kode_agama` char(2) NOT NULL,
  `agama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`kode_agama`, `agama`) VALUES
('1', 'Islam'),
('2', 'Kristen'),
('3', 'Katholik'),
('4', 'Hindu'),
('5', 'Budha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `asn`
--

CREATE TABLE `asn` (
  `nip` char(18) NOT NULL,
  `id_asn` varchar(150) DEFAULT NULL,
  `nip_lama` char(9) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `gelar_depan` varchar(10) DEFAULT NULL,
  `gelar_belakang` varchar(10) DEFAULT NULL,
  `kode_pangkatgol` char(2) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `kode_agama` char(2) DEFAULT NULL,
  `kode_jenis_kawin` char(2) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `nomor_hp` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `npwp` char(20) DEFAULT NULL,
  `kartu_asn` varchar(255) DEFAULT NULL,
  `kode_jabatan` char(10) NOT NULL,
  `jenis_kepegawaian` char(10) DEFAULT NULL,
  `kode_skpd` char(4) NOT NULL,
  `kode_unitkerja` char(8) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `asn`
--

INSERT INTO `asn` (`nip`, `id_asn`, `nip_lama`, `nama_lengkap`, `gelar_depan`, `gelar_belakang`, `kode_pangkatgol`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kode_agama`, `kode_jenis_kawin`, `nik`, `nomor_hp`, `email`, `photo`, `npwp`, `kartu_asn`, `kode_jabatan`, `jenis_kepegawaian`, `kode_skpd`, `kode_unitkerja`, `password`, `remember_token`) VALUES
('198707102023211034', 'b854c667-2315-41ec-bdec-807356863d67', NULL, 'YULI ADI PURNOMO', '', 'ST', NULL, 'Muna', '1987-07-10', 'L', '1', '1', '3309051007879003', '085333321115', NULL, '198707102023211034.png', NULL, NULL, '32000100', 'PPPK', 'MB32', 'UKMB0032', '$2y$10$COcI8Mnj8CuurcmE7qItbuDzWpu7HLJs3WvTqpXEqn/TVH.LZ89Pm', ''),
('198806202022031004', NULL, NULL, 'FAISAL', NULL, NULL, NULL, NULL, NULL, 'L', '1', '1', NULL, '085424525141', NULL, '198806202022031004.jpg', NULL, NULL, '32000100', 'PNS', 'MB32', 'UKMB0032', '$2y$10$HSGBH5AdeBXl4VdRwongqOPdWTAJVfq29FjA2NF.lb/iRpvL1TgPa', NULL),
('199212272019031011', NULL, NULL, 'NYOMAN BAJRANING HARTA YASITA', NULL, NULL, NULL, NULL, NULL, 'L', '4', '1', NULL, '085424525141', NULL, '199212272019031011.jpg', NULL, NULL, '32000100', 'PNS', 'MB32', 'UKMB0032', '$2y$10$FHR5cR3hM1aFjhCmjDQv9ecH6cMR06JQSHVvgJwr8TDoB9FXE.q.e', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `golongan` varchar(20) DEFAULT NULL,
  `masa_kerja` char(2) DEFAULT NULL,
  `gaji_pokok` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `golongan`, `masa_kerja`, `gaji_pokok`) VALUES
(1, 'I/a', '0', '1685700'),
(2, 'I/a', '1', '1685700'),
(3, 'I/a', '2', '1738800'),
(4, 'I/a', '3', '1738800'),
(5, 'I/a', '4', '1793500'),
(6, 'I/a', '5', '1793500'),
(7, 'I/a', '6', '1850000'),
(8, 'I/a', '7', '1850000'),
(9, 'I/a', '8', '1908300'),
(10, 'I/a', '9', '1908300'),
(11, 'I/a', '10', '1968400'),
(12, 'I/a', '11', '1968400'),
(13, 'I/a', '12', '2030400'),
(14, 'I/a', '13', '2030400'),
(15, 'I/a', '14', '2094300'),
(16, 'I/a', '15', '2094300'),
(17, 'I/a', '16', '2160300'),
(18, 'I/a', '17', '2160300'),
(19, 'I/a', '18', '2228300'),
(20, 'I/a', '19', '2228300'),
(21, 'I/a', '20', '2298500'),
(22, 'I/a', '21', '2298500'),
(23, 'I/a', '22', '2370900'),
(24, 'I/a', '23', '2370900'),
(25, 'I/a', '24', '2445500'),
(26, 'I/a', '25', '2445500'),
(27, 'I/a', '26', '2522600'),
(28, 'I/a', '27', '2522600'),
(29, 'I/b', '3', '1840800'),
(30, 'I/b', '4', '1840800'),
(31, 'I/b', '5', '1898800'),
(32, 'I/b', '6', '1898800'),
(33, 'I/b', '7', '1958600'),
(34, 'I/b', '8', '1958600'),
(35, 'I/b', '9', '2020300'),
(36, 'I/b', '10', '2020300'),
(37, 'I/b', '11', '2083900'),
(38, 'I/b', '12', '2083900'),
(39, 'I/b', '13', '2149600'),
(40, 'I/b', '14', '2149600'),
(41, 'I/b', '15', '2217300'),
(42, 'I/b', '16', '2217300'),
(43, 'I/b', '17', '2287100'),
(44, 'I/b', '18', '2287100'),
(45, 'I/b', '19', '2359100'),
(46, 'I/b', '20', '2359100'),
(47, 'I/b', '21', '2433400'),
(48, 'I/b', '22', '2433400'),
(49, 'I/b', '23', '2510100'),
(50, 'I/b', '24', '2510100'),
(51, 'I/b', '25', '2589100'),
(52, 'I/b', '26', '2589100'),
(53, 'I/b', '27', '2670700'),
(54, 'I/c', '3', '1918700'),
(55, 'I/c', '4', '1918700'),
(56, 'I/c', '5', '1989100'),
(57, 'I/c', '6', '1989100'),
(58, 'I/c', '7', '2041500'),
(59, 'I/c', '8', '2041500'),
(60, 'I/c', '9', '2105800'),
(61, 'I/c', '10', '2105800'),
(62, 'I/c', '11', '2172100'),
(63, 'I/c', '12', '2172100'),
(64, 'I/c', '13', '2240500'),
(65, 'I/c', '14', '2240500'),
(66, 'I/c', '15', '2311100'),
(67, 'I/c', '16', '2311100'),
(68, 'I/c', '17', '2383900'),
(69, 'I/c', '18', '2383900'),
(70, 'I/c', '19', '2458900'),
(71, 'I/c', '20', '2458900'),
(72, 'I/c', '21', '2536400'),
(73, 'I/c', '22', '2536400'),
(74, 'I/c', '23', '2616300'),
(75, 'I/c', '24', '2616300'),
(76, 'I/c', '25', '2698700'),
(77, 'I/c', '26', '2698700'),
(78, 'I/c', '27', '2783700'),
(79, 'I/d', '3', '1999900'),
(80, 'I/d', '4', '1999900'),
(81, 'I/d', '5', '2062900'),
(82, 'I/d', '6', '2062900'),
(83, 'I/d', '7', '2127800'),
(84, 'I/d', '8', '2127800'),
(85, 'I/d', '9', '2194800'),
(86, 'I/d', '10', '2194800'),
(87, 'I/d', '11', '2264000'),
(88, 'I/d', '12', '2264000'),
(89, 'I/d', '13', '2335300'),
(90, 'I/d', '14', '2335300'),
(91, 'I/d', '15', '2408800'),
(92, 'I/d', '16', '2408800'),
(93, 'I/d', '17', '2484700'),
(94, 'I/d', '18', '2484700'),
(95, 'I/d', '19', '2562900'),
(96, 'I/d', '20', '2562900'),
(97, 'I/d', '21', '2643700'),
(98, 'I/d', '22', '2643700'),
(99, 'I/d', '23', '2726900'),
(100, 'I/d', '24', '2726900'),
(101, 'I/d', '25', '2812800'),
(102, 'I/d', '26', '2812800'),
(103, 'I/d', '27', '2901400'),
(104, 'II/a', '0', '2184000'),
(105, 'II/a', '1', '2218400'),
(106, 'II/a', '2', '2218400'),
(107, 'II/a', '3', '2288200'),
(108, 'II/a', '4', '2288200'),
(109, 'II/a', '5', '2360300'),
(110, 'II/a', '6', '2360300'),
(111, 'II/a', '7', '2434600'),
(112, 'II/a', '8', '2434600'),
(113, 'II/a', '9', '2511300'),
(114, 'II/a', '10', '2511300'),
(115, 'II/a', '11', '2590400'),
(116, 'II/a', '12', '2590400'),
(117, 'II/a', '13', '2672000'),
(118, 'II/a', '14', '2672000'),
(119, 'II/a', '15', '2756200'),
(120, 'II/a', '16', '2756200'),
(121, 'II/a', '17', '2843000'),
(122, 'II/a', '18', '2843000'),
(123, 'II/a', '19', '2932500'),
(124, 'II/a', '20', '2932500'),
(125, 'II/a', '21', '3024900'),
(126, 'II/a', '22', '3024900'),
(127, 'II/a', '23', '3120100'),
(128, 'II/a', '24', '3120100'),
(129, 'II/a', '25', '3218400'),
(130, 'II/a', '26', '3218400'),
(131, 'II/a', '27', '3319800'),
(132, 'II/a', '28', '3319800'),
(133, 'II/a', '29', '3424300'),
(134, 'II/a', '30', '3424300'),
(135, 'II/a', '31', '3532200'),
(136, 'II/a', '32', '3532200'),
(137, 'II/a', '33', '3643400'),
(138, 'II/b', '3', '2385000'),
(139, 'II/b', '4', '2385000'),
(140, 'II/b', '5', '2460100'),
(141, 'II/b', '6', '2460100'),
(142, 'II/b', '7', '2537600'),
(143, 'II/b', '8', '2537600'),
(144, 'II/b', '9', '2617500'),
(145, 'II/b', '10', '2617500'),
(146, 'II/b', '11', '2700000'),
(147, 'II/b', '12', '2700000'),
(148, 'II/b', '13', '2785000'),
(149, 'II/b', '14', '2785000'),
(150, 'II/b', '15', '2872700'),
(151, 'II/b', '16', '2872700'),
(152, 'II/b', '17', '2963200'),
(153, 'II/b', '18', '2963200'),
(154, 'II/b', '19', '3056500'),
(155, 'II/b', '20', '3056500'),
(156, 'II/b', '21', '3152800'),
(157, 'II/b', '22', '3152800'),
(158, 'II/b', '23', '3252100'),
(159, 'II/b', '24', '3252100'),
(160, 'II/b', '25', '3354500'),
(161, 'II/b', '26', '3354500'),
(162, 'II/b', '27', '3460200'),
(163, 'II/b', '28', '3460200'),
(164, 'II/b', '29', '3569200'),
(165, 'II/b', '30', '3569200'),
(166, 'II/b', '31', '3681600'),
(167, 'II/b', '32', '3681600'),
(168, 'II/b', '33', '3797500'),
(169, 'II/c', '3', '2485900'),
(170, 'II/c', '4', '2485900'),
(171, 'II/c', '5', '2564200'),
(172, 'II/c', '6', '2564200'),
(173, 'II/c', '7', '2645000'),
(174, 'II/c', '8', '2645000'),
(175, 'II/c', '9', '2728300'),
(176, 'II/c', '10', '2728300'),
(177, 'II/c', '11', '2814200'),
(178, 'II/c', '12', '2814200'),
(179, 'II/c', '13', '2902800'),
(180, 'II/c', '14', '2902800'),
(181, 'II/c', '15', '2994300'),
(182, 'II/c', '16', '2994300'),
(183, 'II/c', '17', '3088600'),
(184, 'II/c', '18', '3088600'),
(185, 'II/c', '19', '3185800'),
(186, 'II/c', '20', '3185800'),
(187, 'II/c', '21', '3286200'),
(188, 'II/c', '22', '3286200'),
(189, 'II/c', '23', '3389700'),
(190, 'II/c', '24', '3389700'),
(191, 'II/c', '25', '3496400'),
(192, 'II/c', '26', '3496400'),
(193, 'II/c', '27', '3606500'),
(194, 'II/c', '28', '3606500'),
(195, 'II/c', '29', '3720100'),
(196, 'II/c', '30', '3720100'),
(197, 'II/c', '31', '3837300'),
(198, 'II/c', '32', '3837300'),
(199, 'II/c', '33', '3958200'),
(200, 'II/d', '3', '2591100'),
(201, 'II/d', '4', '2591100'),
(202, 'II/d', '5', '2672700'),
(203, 'II/d', '6', '2672700'),
(204, 'II/d', '7', '2756800'),
(205, 'II/d', '8', '2756800'),
(206, 'II/d', '9', '2843700'),
(207, 'II/d', '10', '2843700'),
(208, 'II/d', '11', '2933200'),
(209, 'II/d', '12', '2933200'),
(210, 'II/d', '13', '3025600'),
(211, 'II/d', '14', '3025600'),
(212, 'II/d', '15', '3120900'),
(213, 'II/d', '16', '3120900'),
(214, 'II/d', '17', '3219200'),
(215, 'II/d', '18', '3219200'),
(216, 'II/d', '19', '3320600'),
(217, 'II/d', '20', '3320600'),
(218, 'II/d', '21', '3425200'),
(219, 'II/d', '22', '3425200'),
(220, 'II/d', '23', '3533100'),
(221, 'II/d', '24', '3533100'),
(222, 'II/d', '25', '3644300'),
(223, 'II/d', '26', '3644300'),
(224, 'II/d', '27', '3759100'),
(225, 'II/d', '28', '3759100'),
(226, 'II/d', '29', '3877500'),
(227, 'II/d', '30', '3877500'),
(228, 'II/d', '31', '3999600'),
(229, 'II/d', '32', '3999600'),
(230, 'II/d', '33', '4125600'),
(231, 'III/a', '0', '2785700'),
(232, 'III/a', '1', '2785700'),
(233, 'III/a', '2', '2873500'),
(234, 'III/a', '3', '2873500'),
(235, 'III/a', '4', '2964000'),
(236, 'III/a', '5', '2964000'),
(237, 'III/a', '6', '3057300'),
(238, 'III/a', '7', '3057300'),
(239, 'III/a', '8', '3153600'),
(240, 'III/a', '9', '3153600'),
(241, 'III/a', '10', '3252900'),
(242, 'III/a', '11', '3252900'),
(243, 'III/a', '12', '3355400'),
(244, 'III/a', '13', '3355400'),
(245, 'III/a', '14', '3461100'),
(246, 'III/a', '15', '3461100'),
(247, 'III/a', '16', '3570100'),
(248, 'III/a', '17', '3570100'),
(249, 'III/a', '18', '3682500'),
(250, 'III/a', '19', '3682500'),
(251, 'III/a', '20', '3798500'),
(252, 'III/a', '21', '3798500'),
(253, 'III/a', '22', '3918100'),
(254, 'III/a', '23', '3918100'),
(255, 'III/a', '24', '4041500'),
(256, 'III/a', '25', '4041500'),
(257, 'III/a', '26', '4168800'),
(258, 'III/a', '27', '4168800'),
(259, 'III/a', '28', '4300100'),
(260, 'III/a', '29', '4300100'),
(261, 'III/a', '30', '4435500'),
(262, 'III/a', '31', '4435500'),
(263, 'III/a', '32', '4575200'),
(264, 'III/b', '0', '2903600'),
(265, 'III/b', '1', '2903600'),
(266, 'III/b', '2', '2995000'),
(267, 'III/b', '3', '2995000'),
(268, 'III/b', '4', '3089300'),
(269, 'III/b', '5', '3089300'),
(270, 'III/b', '6', '3186600'),
(271, 'III/b', '7', '3186600'),
(272, 'III/b', '8', '3287000'),
(273, 'III/b', '9', '3287000'),
(274, 'III/b', '10', '3390500'),
(275, 'III/b', '11', '3390500'),
(276, 'III/b', '12', '3497300'),
(277, 'III/b', '13', '3497300'),
(278, 'III/b', '14', '3607500'),
(279, 'III/b', '15', '3607500'),
(280, 'III/b', '16', '3721100'),
(281, 'III/b', '17', '3721100'),
(282, 'III/b', '18', '3838300'),
(283, 'III/b', '19', '3838300'),
(284, 'III/b', '20', '3959200'),
(285, 'III/b', '21', '3959200'),
(286, 'III/b', '22', '4083900'),
(287, 'III/b', '23', '4083900'),
(288, 'III/b', '24', '4242500'),
(289, 'III/b', '25', '4242500'),
(290, 'III/b', '26', '4345100'),
(291, 'III/b', '27', '4345100'),
(292, 'III/b', '28', '4482000'),
(293, 'III/b', '29', '4482000'),
(294, 'III/b', '30', '4623200'),
(295, 'III/b', '31', '4623200'),
(296, 'III/b', '32', '4768800'),
(297, 'III/c', '0', '3026400'),
(298, 'III/c', '1', '3026400'),
(299, 'III/c', '2', '3121700'),
(300, 'III/c', '3', '3121700'),
(301, 'III/c', '4', '3220000'),
(302, 'III/c', '5', '3220000'),
(303, 'III/c', '6', '3321400'),
(304, 'III/c', '7', '3321400'),
(305, 'III/c', '8', '3426000'),
(306, 'III/c', '9', '3426000'),
(307, 'III/c', '10', '3533900'),
(308, 'III/c', '11', '3533900'),
(309, 'III/c', '12', '3645200'),
(310, 'III/c', '13', '3645200'),
(311, 'III/c', '14', '3760100'),
(312, 'III/c', '15', '3760100'),
(313, 'III/c', '16', '3878500'),
(314, 'III/c', '17', '3878500'),
(315, 'III/c', '18', '4000600'),
(316, 'III/c', '19', '4000600'),
(317, 'III/c', '20', '4126600'),
(318, 'III/c', '21', '4126600'),
(319, 'III/c', '22', '4256600'),
(320, 'III/c', '23', '4256600'),
(321, 'III/c', '24', '4390700'),
(322, 'III/c', '25', '4390700'),
(323, 'III/c', '26', '4528900'),
(324, 'III/c', '27', '4528900'),
(325, 'III/c', '28', '4671600'),
(326, 'III/c', '29', '4671600'),
(327, 'III/c', '30', '4818700'),
(328, 'III/c', '31', '4818700'),
(329, 'III/c', '32', '4970500'),
(330, 'III/d', '0', '3154400'),
(331, 'III/d', '1', '3154400'),
(332, 'III/d', '2', '3253700'),
(333, 'III/d', '3', '3253700'),
(334, 'III/d', '4', '3356200'),
(335, 'III/d', '5', '3356200'),
(336, 'III/d', '6', '3461900'),
(337, 'III/d', '7', '3461900'),
(338, 'III/d', '8', '3571000'),
(339, 'III/d', '9', '3571000'),
(340, 'III/d', '10', '3683400'),
(341, 'III/d', '11', '3683400'),
(342, 'III/d', '12', '3799400'),
(343, 'III/d', '13', '3799400'),
(344, 'III/d', '14', '3919100'),
(345, 'III/d', '15', '3919100'),
(346, 'III/d', '16', '4042500'),
(347, 'III/d', '17', '4042500'),
(348, 'III/d', '18', '4169900'),
(349, 'III/d', '19', '4169900'),
(350, 'III/d', '20', '4301200'),
(351, 'III/d', '21', '4301200'),
(352, 'III/d', '22', '4436700'),
(353, 'III/d', '23', '4436700'),
(354, 'III/d', '24', '4576400'),
(355, 'III/d', '25', '4576400'),
(356, 'III/d', '26', '4720500'),
(357, 'III/d', '27', '4720500'),
(358, 'III/d', '28', '4869200'),
(359, 'III/d', '29', '4869200'),
(360, 'III/d', '30', '5022500'),
(361, 'III/d', '31', '5022500'),
(362, 'III/d', '32', '5180700'),
(363, 'IV/a', '0', '3287800'),
(364, 'IV/a', '1', '3287800'),
(365, 'IV/a', '2', '3391400'),
(366, 'IV/a', '3', '3391400'),
(367, 'IV/a', '4', '3498200'),
(368, 'IV/a', '5', '3498200'),
(369, 'IV/a', '6', '3608400'),
(370, 'IV/a', '7', '3608400'),
(371, 'IV/a', '8', '3722000'),
(372, 'IV/a', '9', '3722000'),
(373, 'IV/a', '10', '3839200'),
(374, 'IV/a', '11', '3839200'),
(375, 'IV/a', '12', '3960200'),
(376, 'IV/a', '13', '3960200'),
(377, 'IV/a', '14', '4084900'),
(378, 'IV/a', '15', '4084900'),
(379, 'IV/a', '16', '4213500'),
(380, 'IV/a', '17', '4213500'),
(381, 'IV/a', '18', '4346200'),
(382, 'IV/a', '19', '4346200'),
(383, 'IV/a', '20', '4483100'),
(384, 'IV/a', '21', '4483100'),
(385, 'IV/a', '22', '4624300'),
(386, 'IV/a', '23', '4624300'),
(387, 'IV/a', '24', '4770000'),
(388, 'IV/a', '25', '4770000'),
(389, 'IV/a', '26', '4920200'),
(390, 'IV/a', '27', '4920200'),
(391, 'IV/a', '28', '5075200'),
(392, 'IV/a', '29', '5075200'),
(393, 'IV/a', '30', '5235000'),
(394, 'IV/a', '31', '5235000'),
(395, 'IV/a', '32', '5399900'),
(396, 'IV/b', '0', '3426900'),
(397, 'IV/b', '1', '3426900'),
(398, 'IV/b', '2', '3534800'),
(399, 'IV/b', '3', '3534800'),
(400, 'IV/b', '4', '3646200'),
(401, 'IV/b', '5', '3646200'),
(402, 'IV/b', '6', '3761000'),
(403, 'IV/b', '7', '3761000'),
(404, 'IV/b', '8', '3879500'),
(405, 'IV/b', '9', '3879500'),
(406, 'IV/b', '10', '4001600'),
(407, 'IV/b', '11', '4001600'),
(408, 'IV/b', '12', '4127700'),
(409, 'IV/b', '13', '4127700'),
(410, 'IV/b', '14', '4257700'),
(411, 'IV/b', '15', '4257700'),
(412, 'IV/b', '16', '4391800'),
(413, 'IV/b', '17', '4391800'),
(414, 'IV/b', '18', '4530100'),
(415, 'IV/b', '19', '4530100'),
(416, 'IV/b', '20', '4672800'),
(417, 'IV/b', '21', '4672800'),
(418, 'IV/b', '22', '4819900'),
(419, 'IV/b', '23', '4819900'),
(420, 'IV/b', '24', '4971700'),
(421, 'IV/b', '25', '4971700'),
(422, 'IV/b', '26', '5128300'),
(423, 'IV/b', '27', '5128300'),
(424, 'IV/b', '28', '5289800'),
(425, 'IV/b', '29', '5289800'),
(426, 'IV/b', '30', '5456400'),
(427, 'IV/b', '31', '5456400'),
(428, 'IV/b', '32', '5628300'),
(429, 'IV/c', '0', '3571900'),
(430, 'IV/c', '1', '3571900'),
(431, 'IV/c', '2', '3684400'),
(432, 'IV/c', '3', '3684400'),
(433, 'IV/c', '4', '3800400'),
(434, 'IV/c', '5', '3800400'),
(435, 'IV/c', '6', '3920100'),
(436, 'IV/c', '7', '3920100'),
(437, 'IV/c', '8', '4043600'),
(438, 'IV/c', '9', '4043600'),
(439, 'IV/c', '10', '4170900'),
(440, 'IV/c', '11', '4170900'),
(441, 'IV/c', '12', '4302300'),
(442, 'IV/c', '13', '4302300'),
(443, 'IV/c', '14', '4437800'),
(444, 'IV/c', '15', '4437800'),
(445, 'IV/c', '16', '4577500'),
(446, 'IV/c', '17', '4577500'),
(447, 'IV/c', '18', '4721700'),
(448, 'IV/c', '19', '4721700'),
(449, 'IV/c', '20', '4870400'),
(450, 'IV/c', '21', '4870400'),
(451, 'IV/c', '22', '5023800'),
(452, 'IV/c', '23', '5023800'),
(453, 'IV/c', '24', '5182000'),
(454, 'IV/c', '25', '5182000'),
(455, 'IV/c', '26', '5345200'),
(456, 'IV/c', '27', '5345200'),
(457, 'IV/c', '28', '5513600'),
(458, 'IV/c', '29', '5513600'),
(459, 'IV/c', '30', '5687200'),
(460, 'IV/c', '31', '5687200'),
(461, 'IV/c', '32', '5866400'),
(462, 'IV/d', '0', '3723000'),
(463, 'IV/d', '1', '3723000'),
(464, 'IV/d', '2', '3840200'),
(465, 'IV/d', '3', '3840200'),
(466, 'IV/d', '4', '3961200'),
(467, 'IV/d', '5', '3961200'),
(468, 'IV/d', '6', '4085900'),
(469, 'IV/d', '7', '4085900'),
(470, 'IV/d', '8', '4214600'),
(471, 'IV/d', '9', '4214600'),
(472, 'IV/d', '10', '4347300'),
(473, 'IV/d', '11', '4347300'),
(474, 'IV/d', '12', '4484300'),
(475, 'IV/d', '13', '4484300'),
(476, 'IV/d', '14', '4625500'),
(477, 'IV/d', '15', '4625500'),
(478, 'IV/d', '16', '4771200'),
(479, 'IV/d', '17', '4771200'),
(480, 'IV/d', '18', '4921400'),
(481, 'IV/d', '19', '4921400'),
(482, 'IV/d', '20', '5076400'),
(483, 'IV/d', '21', '5076400'),
(484, 'IV/d', '22', '5236300'),
(485, 'IV/d', '23', '5236300'),
(486, 'IV/d', '24', '5401200'),
(487, 'IV/d', '25', '5401200'),
(488, 'IV/d', '26', '5571400'),
(489, 'IV/d', '27', '5571400'),
(490, 'IV/d', '28', '5746800'),
(491, 'IV/d', '29', '5746800'),
(492, 'IV/d', '30', '5927800'),
(493, 'IV/d', '31', '5927800'),
(494, 'IV/d', '32', '6114500'),
(495, 'IV/e', '0', '3880400'),
(496, 'IV/e', '1', '3880400'),
(497, 'IV/e', '2', '4002700'),
(498, 'IV/e', '3', '4002700'),
(499, 'IV/e', '4', '4128700'),
(500, 'IV/e', '5', '4128700'),
(501, 'IV/e', '6', '4258700'),
(502, 'IV/e', '7', '4258700'),
(503, 'IV/e', '8', '4392900'),
(504, 'IV/e', '9', '4392900'),
(505, 'IV/e', '10', '4531200'),
(506, 'IV/e', '11', '4531200'),
(507, 'IV/e', '12', '4673900'),
(508, 'IV/e', '13', '4673900'),
(509, 'IV/e', '14', '4821100'),
(510, 'IV/e', '15', '4821100'),
(511, 'IV/e', '16', '4973000'),
(512, 'IV/e', '17', '4973000'),
(513, 'IV/e', '18', '5129600'),
(514, 'IV/e', '19', '5129600'),
(515, 'IV/e', '20', '5291200'),
(516, 'IV/e', '21', '5291200'),
(517, 'IV/e', '22', '5457800'),
(518, 'IV/e', '23', '5457800'),
(519, 'IV/e', '24', '5629700'),
(520, 'IV/e', '25', '5629700'),
(521, 'IV/e', '26', '5807000'),
(522, 'IV/e', '27', '5807000'),
(523, 'IV/e', '28', '5989900'),
(524, 'IV/e', '29', '5989900'),
(525, 'IV/e', '30', '6178600'),
(526, 'IV/e', '31', '6178600'),
(527, 'IV/e', '32', '6373200');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `kode_golongan` char(2) NOT NULL,
  `golongan` char(5) DEFAULT NULL,
  `pangkat` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`kode_golongan`, `golongan`, `pangkat`) VALUES
('11', 'I/a', 'Juru Muda'),
('12', 'I/b', 'Juru Muda Tk. I'),
('13', 'I/c', 'Juru'),
('14', 'I/d', 'Juru Tk. I'),
('21', 'II/a', 'Pengatur Muda'),
('22', 'II/b', 'Pengatur Muda Tk. I'),
('23', 'II/c', 'Pengatur'),
('24', 'II/d', 'Pengatur Tk. I'),
('31', 'III/a', 'Penata Muda'),
('32', 'III/b', 'Penata Muda Tk. I'),
('33', 'III/c', 'Penata'),
('34', 'III/d', 'Penata Tk. I'),
('41', 'IV/a', 'Pembina'),
('42', 'IV/b', 'Pembina Tk. I'),
('43', 'IV/c', 'Pembina Utama Muda'),
('44', 'IV/d', 'Pembina Utama Madya'),
('45', 'IV/e', 'Pembina Utama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` char(10) NOT NULL,
  `jabatan_id_pusat` varchar(255) DEFAULT NULL,
  `kode_skpd` char(5) DEFAULT NULL,
  `kode_unitkerja` char(8) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `eselon` char(5) DEFAULT NULL,
  `jenis` char(10) DEFAULT NULL,
  `kelas_jabatan` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `jabatan_id_pusat`, `kode_skpd`, `kode_unitkerja`, `nama_jabatan`, `eselon`, `jenis`, `kelas_jabatan`) VALUES
('32000001', NULL, 'MB32', 'UKMB0032', 'Kepala Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'II.b', 'Struktural', '13'),
('32000002', NULL, 'MB32', 'UKMB0032', 'Sekretaris Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'III.a', 'Struktural', '12'),
('32000003', NULL, 'MB32', 'UKMB0032', 'Kepala Bidang Mutasi', 'III.b', 'Struktural', '11'),
('32000100', NULL, 'MB32', 'UKMB0032', 'Pranata Komputer', 'JFT', 'Fungsional', '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_kerja`
--

CREATE TABLE `jam_kerja` (
  `kode_jam_kerja` char(4) NOT NULL,
  `nama_jam_kerja` varchar(20) NOT NULL,
  `awal_jam_masuk` time NOT NULL,
  `jam_masuk` time NOT NULL,
  `akhir_jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `lintashari` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `jam_kerja`
--

INSERT INTO `jam_kerja` (`kode_jam_kerja`, `nama_jam_kerja`, `awal_jam_masuk`, `jam_masuk`, `akhir_jam_masuk`, `jam_pulang`, `lintashari`) VALUES
('JK01', 'REGULER', '06:00:00', '08:00:00', '10:00:00', '16:00:00', '0'),
('JK02', '5 Hari Kerja', '21:00:00', '22:00:00', '23:59:00', '07:00:00', '0'),
('JK03', 'SHIFT MALAM', '21:00:00', '22:00:00', '23:00:00', '06:00:00', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_jabatan`
--

CREATE TABLE `jenis_jabatan` (
  `kode_jenis_jabatan` char(2) NOT NULL,
  `jenis_jabatan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `jenis_jabatan`
--

INSERT INTO `jenis_jabatan` (`kode_jenis_jabatan`, `jenis_jabatan`) VALUES
('1', 'Jabatan Struktural'),
('2', 'Jabatan Fungsional Tertentu'),
('3', NULL),
('4', 'Jabatan Fungsional Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kode_kabupaten` varchar(255) NOT NULL,
  `kabupaten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kawin`
--

CREATE TABLE `kawin` (
  `kode_jenis_kawin` char(2) NOT NULL,
  `jenis_kawin` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kawin`
--

INSERT INTO `kawin` (`kode_jenis_kawin`, `jenis_kawin`) VALUES
('1', 'Menikah'),
('2', 'Cerai Hidup'),
('3', 'Cerai Mati'),
('4', 'Belum Kawin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja_mingguan`
--

CREATE TABLE `kinerja_mingguan` (
  `kode_kinerja_mingguan` int(11) NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `tahun` char(4) DEFAULT NULL,
  `periode` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi_jamkerja`
--

CREATE TABLE `konfigurasi_jamkerja` (
  `nip` char(18) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `kode_jam_kerja` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `konfigurasi_jamkerja`
--

INSERT INTO `konfigurasi_jamkerja` (`nip`, `hari`, `kode_jam_kerja`) VALUES
('198707102023211034', 'Senin', NULL),
('198707102023211034', 'Selasa', NULL),
('198707102023211034', 'Rabu', NULL),
('198707102023211034', 'Kamis', NULL),
('198707102023211034', 'Jumat', NULL),
('198707102023211034', 'Sabtu', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi_jk_skpd`
--

CREATE TABLE `konfigurasi_jk_skpd` (
  `kode_jk_skpd` char(20) NOT NULL,
  `kode_skpd` char(5) DEFAULT NULL,
  `kode_unitkerja` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `konfigurasi_jk_skpd`
--

INSERT INTO `konfigurasi_jk_skpd` (`kode_jk_skpd`, `kode_skpd`, `kode_unitkerja`) VALUES
('JMB04UKMB0032', 'MB32', 'UKMB0032');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi_jk_skpd_detail`
--

CREATE TABLE `konfigurasi_jk_skpd_detail` (
  `kode_jk_skpd` char(20) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `kode_jam_kerja` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `konfigurasi_jk_skpd_detail`
--

INSERT INTO `konfigurasi_jk_skpd_detail` (`kode_jk_skpd`, `hari`, `kode_jam_kerja`) VALUES
('JMB04UKMB0032', 'Senin', 'JK02'),
('JMB04UKMB0032', 'Selasa', 'JK02'),
('JMB04UKMB0032', 'Rabu', 'JK02'),
('JMB04UKMB0032', 'Kamis', 'JK02'),
('JMB04UKMB0032', 'Jumat', 'JK02'),
('JMB04UKMB0032', 'Sabtu', 'JK02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi_lokasi`
--

CREATE TABLE `konfigurasi_lokasi` (
  `id` int(11) NOT NULL,
  `lokasi_kantor` varchar(255) DEFAULT NULL,
  `radius` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `konfigurasi_lokasi`
--

INSERT INTO `konfigurasi_lokasi` (`id`, `lokasi_kantor`, `radius`) VALUES
(1, '-7.73970923961632, 110.46181713092898', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuota`
--

CREATE TABLE `kuota` (
  `kode_kuota` char(3) NOT NULL,
  `kuota` varchar(10) DEFAULT NULL,
  `terisi` varchar(10) DEFAULT NULL,
  `sisa` varchar(10) DEFAULT NULL,
  `nomor_sk` varchar(50) DEFAULT NULL,
  `tanggal_sk` date DEFAULT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuota`
--

INSERT INTO `kuota` (`kode_kuota`, `kuota`, `terisi`, `sisa`, `nomor_sk`, `tanggal_sk`, `file`) VALUES
('01', '200', '200', '0', 'B-100', '2024-02-03', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_cuti`
--

CREATE TABLE `master_cuti` (
  `kode_cuti` char(4) NOT NULL,
  `nama_cuti` varchar(30) DEFAULT NULL,
  `jml_hari` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `master_cuti`
--

INSERT INTO `master_cuti` (`kode_cuti`, `nama_cuti`, `jml_hari`) VALUES
('CT01', 'Cuti Tahunan', 12),
('CT02', 'Melahirkan', 90),
('CT03', 'Luar Tanggungan Negara', 60),
('CT04', 'Sakit', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_tugasluar`
--

CREATE TABLE `master_tugasluar` (
  `kode_tugasluar` char(4) NOT NULL,
  `nama_tugasluar` varchar(100) DEFAULT NULL,
  `jml_hari` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_tugasluar`
--

INSERT INTO `master_tugasluar` (`kode_tugasluar`, `nama_tugasluar`, `jml_hari`) VALUES
('TLD', 'Tugas Luar Daerah', '5'),
('TLDD', 'Tugas Luar Dalam Daerah', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkat`
--

CREATE TABLE `pangkat` (
  `kode_pangkatgol` char(2) NOT NULL,
  `pangkat` varchar(30) DEFAULT NULL,
  `golongan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pangkat`
--

INSERT INTO `pangkat` (`kode_pangkatgol`, `pangkat`, `golongan`) VALUES
('1', NULL, 'I'),
('10', NULL, 'X'),
('11', NULL, 'XI'),
('12', NULL, 'XII'),
('13', NULL, 'XIII'),
('14', NULL, 'XIV'),
('15', NULL, 'XV'),
('16', NULL, 'XVI'),
('17', NULL, 'XVII'),
('2', NULL, 'II'),
('21', 'Pengatur Muda', 'II/a'),
('22', 'Pengatur Muda Tk. I', 'II/b'),
('23', 'Pengatur', 'II/c'),
('24', 'Pengatur Tk. I', 'II/d'),
('3', NULL, 'III'),
('31', 'Penata Muda', 'III/a'),
('32', 'Penata Muda Tk. I', 'III/b'),
('33', 'Penata', 'III/c'),
('34', 'Penata Tk. I', 'III/d'),
('4', NULL, 'IV'),
('41', 'Pembina', 'IV/a'),
('42', 'Pembina Tk. I', 'IV/b'),
('43', 'Pembina Utama Muda', 'IV/c'),
('44', 'Pembina Utama Madya', 'IV/d'),
('45', 'Pembina Utama', 'IV/e'),
('5', NULL, 'V'),
('51', 'Juru Muda', 'I/a'),
('52', 'Juru Muda Tk. I', 'I/b'),
('53', 'Juru', 'I/c'),
('54', 'Juru Tk. I', 'I/d'),
('6', NULL, 'VI'),
('7', NULL, 'VII'),
('8', NULL, 'VIII'),
('9', NULL, 'IX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `kode_pengadaan` char(5) NOT NULL,
  `jenis_pengadaan` varchar(10) DEFAULT NULL,
  `kode_jabatan` char(10) DEFAULT NULL,
  `kode_unitkerja` char(8) DEFAULT NULL,
  `kode_skpd` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_izin`
--

CREATE TABLE `pengajuan_izin` (
  `kode_izin` char(10) NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `tgl_izin_dari` date DEFAULT NULL,
  `tgl_izin_sampai` date DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `kode_tugasluar` char(4) DEFAULT NULL,
  `kode_cuti` char(4) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `file_dokumen` varchar(255) DEFAULT NULL,
  `status_approved` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pengajuan_izin`
--

INSERT INTO `pengajuan_izin` (`kode_izin`, `nip`, `tgl_izin_dari`, `tgl_izin_sampai`, `status`, `kode_tugasluar`, `kode_cuti`, `keterangan`, `file_dokumen`, `status_approved`) VALUES
('KC02240002', '198707102023211034', '2024-02-18', '2024-02-23', 'C', NULL, 'CT01', 'cuti tahunan', 'KC02240002.png', '1'),
('KI02240002', '198707102023211034', '2024-02-25', '2024-02-27', 'I', NULL, NULL, 'Acara Keluarga', NULL, '1'),
('KT01240001', '198707102023211034', '2024-01-10', '2024-01-13', 'T', 'TLD', NULL, 'Kegiatan Kendari', NULL, '1'),
('KT02240001', '198707102023211034', '2024-02-12', '2024-02-15', 'T', 'TLD', NULL, 'jakarta', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `nip` char(18) NOT NULL,
  `tgl_presensi` date NOT NULL,
  `jam_in` time DEFAULT NULL,
  `jam_out` time DEFAULT NULL,
  `foto_in` varchar(255) DEFAULT NULL,
  `foto_out` varchar(255) DEFAULT NULL,
  `lokasi_in` varchar(255) DEFAULT NULL,
  `lokasi_out` varchar(255) DEFAULT NULL,
  `kode_jam_kerja` char(4) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `kode_izin` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `nip`, `tgl_presensi`, `jam_in`, `jam_out`, `foto_in`, `foto_out`, `lokasi_in`, `lokasi_out`, `kode_jam_kerja`, `status`, `kode_izin`) VALUES
(7, '198707102023211034', '2024-01-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'KT01240001'),
(8, '198707102023211034', '2024-01-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'KT01240001'),
(9, '198707102023211034', '2024-01-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'KT01240001'),
(10, '198707102023211034', '2024-01-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'KT01240001'),
(12, '198707102023211034', '2024-02-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'KT02240001'),
(13, '198707102023211034', '2024-02-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'KT02240001'),
(14, '198707102023211034', '2024-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'KT02240001'),
(15, '198707102023211034', '2024-02-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'T', 'KT02240001'),
(16, '198707102023211034', '2024-02-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C', 'KC02240002'),
(17, '198707102023211034', '2024-02-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C', 'KC02240002'),
(18, '198707102023211034', '2024-02-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C', 'KC02240002'),
(19, '198707102023211034', '2024-02-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C', 'KC02240002'),
(20, '198707102023211034', '2024-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C', 'KC02240002'),
(21, '198707102023211034', '2024-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C', 'KC02240002'),
(22, '198707102023211034', '2024-02-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I', 'KI02240002'),
(23, '198707102023211034', '2024-02-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I', 'KI02240002'),
(24, '198707102023211034', '2024-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'I', 'KI02240002'),
(25, '198707102023211034', '2024-03-05', '21:58:45', NULL, '198707102023211034-2024-03-05-in.png', NULL, '-4.8103424,122.4835072', NULL, 'JK02', 'H', NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `q_rekappresensi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `q_rekappresensi` (
`nip` char(18)
,`nama_lengkap` varchar(100)
,`kode_jabatan` char(10)
,`tgl_1` varchar(335)
,`tgl_2` varchar(335)
,`tgl_3` varchar(335)
,`tgl_4` varchar(335)
,`tgl_5` varchar(335)
,`tgl_6` varchar(335)
,`tgl_7` varchar(335)
,`tgl_8` varchar(335)
,`tgl_9` varchar(335)
,`tgl_10` varchar(335)
,`tgl_11` varchar(335)
,`tgl_12` varchar(335)
,`tgl_13` varchar(335)
,`tgl_14` varchar(335)
,`tgl_15` varchar(335)
,`tgl_16` varchar(335)
,`tgl_17` varchar(335)
,`tgl_18` varchar(335)
,`tgl_19` varchar(335)
,`tgl_20` varchar(335)
,`tgl_21` varchar(335)
,`tgl_22` varchar(335)
,`tgl_23` varchar(335)
,`tgl_24` varchar(335)
,`tgl_25` varchar(335)
,`tgl_26` varchar(335)
,`tgl_27` varchar(335)
,`tgl_28` varchar(335)
,`tgl_29` varchar(335)
,`tgl_30` varchar(335)
,`tgl_31` varchar(335)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpd`
--

CREATE TABLE `skpd` (
  `kode_skpd` char(4) NOT NULL,
  `nama_skpd` varchar(255) DEFAULT NULL,
  `lokasi_kantor` varchar(255) DEFAULT NULL,
  `radius` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `skpd`
--

INSERT INTO `skpd` (`kode_skpd`, `nama_skpd`, `lokasi_kantor`, `radius`) VALUES
('MB01', 'Sekretariat Daerah Kabupaten Muna Barat', '-7.527506330943721, 110.58900149272706', '50'),
('MB02', 'Sekretariat DPRD Kabupaten Muna Barat', '-7.527506330943721, 110.58900149272706', '50'),
('MB32', 'Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia', '-4.79057152689387, 122.49122785082697', '5000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unitkerja`
--

CREATE TABLE `unitkerja` (
  `kode_unitkerja` char(8) NOT NULL,
  `nama_unitkerja` varchar(150) DEFAULT NULL,
  `kode_skpd` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `unitkerja`
--

INSERT INTO `unitkerja` (`kode_unitkerja`, `nama_unitkerja`, `kode_skpd`) VALUES
('UKMB0001', 'Sekretariat Daerah ', NULL),
('UKMB0002', 'Sekretariat DPRD', NULL),
('UKMB0004', 'Dinas Pendidikan dan Kebudayaan', NULL),
('UKMB0032', 'Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `uraian_kinerja_mingguan`
--

CREATE TABLE `uraian_kinerja_mingguan` (
  `kode_uraian_kegiatan` int(11) NOT NULL,
  `kode_kinerja_mingguan` char(6) DEFAULT NULL,
  `hari` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `uraian_kegiatan` varchar(255) DEFAULT NULL,
  `target` varchar(10) DEFAULT NULL,
  `realisasi` varchar(10) DEFAULT NULL,
  `kategori` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `kewenangan` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `kewenangan`, `photo`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator Utama', '198707102023211034.png', 'admin@gmail.com', NULL, '$2y$10$3PD/Of5esp.lGLELhdY4..ewLYtxtLe.gPDLpNEi9bh.VY8v4LgBC', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur untuk view `q_rekappresensi`
--
DROP TABLE IF EXISTS `q_rekappresensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_rekappresensi`  AS SELECT `asn`.`nip` AS `nip`, `asn`.`nama_lengkap` AS `nama_lengkap`, `asn`.`kode_jabatan` AS `kode_jabatan`, `presensi`.`tgl_1` AS `tgl_1`, `presensi`.`tgl_2` AS `tgl_2`, `presensi`.`tgl_3` AS `tgl_3`, `presensi`.`tgl_4` AS `tgl_4`, `presensi`.`tgl_5` AS `tgl_5`, `presensi`.`tgl_6` AS `tgl_6`, `presensi`.`tgl_7` AS `tgl_7`, `presensi`.`tgl_8` AS `tgl_8`, `presensi`.`tgl_9` AS `tgl_9`, `presensi`.`tgl_10` AS `tgl_10`, `presensi`.`tgl_11` AS `tgl_11`, `presensi`.`tgl_12` AS `tgl_12`, `presensi`.`tgl_13` AS `tgl_13`, `presensi`.`tgl_14` AS `tgl_14`, `presensi`.`tgl_15` AS `tgl_15`, `presensi`.`tgl_16` AS `tgl_16`, `presensi`.`tgl_17` AS `tgl_17`, `presensi`.`tgl_18` AS `tgl_18`, `presensi`.`tgl_19` AS `tgl_19`, `presensi`.`tgl_20` AS `tgl_20`, `presensi`.`tgl_21` AS `tgl_21`, `presensi`.`tgl_22` AS `tgl_22`, `presensi`.`tgl_23` AS `tgl_23`, `presensi`.`tgl_24` AS `tgl_24`, `presensi`.`tgl_25` AS `tgl_25`, `presensi`.`tgl_26` AS `tgl_26`, `presensi`.`tgl_27` AS `tgl_27`, `presensi`.`tgl_28` AS `tgl_28`, `presensi`.`tgl_29` AS `tgl_29`, `presensi`.`tgl_30` AS `tgl_30`, `presensi`.`tgl_31` AS `tgl_31` FROM (`asn` left join (select `presensi`.`nip` AS `nip`,max(if(`presensi`.`tgl_presensi` = '2024-01-01',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_1`,max(if(`presensi`.`tgl_presensi` = '2024-01-02',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_2`,max(if(`presensi`.`tgl_presensi` = '2024-01-03',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_3`,max(if(`presensi`.`tgl_presensi` = '2024-01-04',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_4`,max(if(`presensi`.`tgl_presensi` = '2024-01-05',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_5`,max(if(`presensi`.`tgl_presensi` = '2024-01-06',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_6`,max(if(`presensi`.`tgl_presensi` = '2024-01-07',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_7`,max(if(`presensi`.`tgl_presensi` = '2024-01-08',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_8`,max(if(`presensi`.`tgl_presensi` = '2024-01-09',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_9`,max(if(`presensi`.`tgl_presensi` = '2024-01-10',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_10`,max(if(`presensi`.`tgl_presensi` = '2024-01-11',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_11`,max(if(`presensi`.`tgl_presensi` = '2024-01-12',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_12`,max(if(`presensi`.`tgl_presensi` = '2024-01-13',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_13`,max(if(`presensi`.`tgl_presensi` = '2024-01-14',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_14`,max(if(`presensi`.`tgl_presensi` = '2024-01-15',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_15`,max(if(`presensi`.`tgl_presensi` = '2024-01-16',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_16`,max(if(`presensi`.`tgl_presensi` = '2024-01-17',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_17`,max(if(`presensi`.`tgl_presensi` = '2024-01-18',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_18`,max(if(`presensi`.`tgl_presensi` = '2024-01-19',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_19`,max(if(`presensi`.`tgl_presensi` = '2024-01-20',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_20`,max(if(`presensi`.`tgl_presensi` = '2024-01-21',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_21`,max(if(`presensi`.`tgl_presensi` = '2024-01-22',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_22`,max(if(`presensi`.`tgl_presensi` = '2024-01-23',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_23`,max(if(`presensi`.`tgl_presensi` = '2024-01-24',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_24`,max(if(`presensi`.`tgl_presensi` = '2024-01-25',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_25`,max(if(`presensi`.`tgl_presensi` = '2024-01-26',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_26`,max(if(`presensi`.`tgl_presensi` = '2024-01-27',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_27`,max(if(`presensi`.`tgl_presensi` = '2024-01-28',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_28`,max(if(`presensi`.`tgl_presensi` = '2024-01-29',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_29`,max(if(`presensi`.`tgl_presensi` = '2024-01-30',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_30`,max(if(`presensi`.`tgl_presensi` = '2024-01-31',concat(ifnull(`presensi`.`jam_in`,'NA'),'|',ifnull(`presensi`.`jam_out`,'NA'),'|',ifnull(`presensi`.`status`,'NA'),'|',ifnull(`jam_kerja`.`nama_jam_kerja`,'NA'),'|',ifnull(`jam_kerja`.`jam_masuk`,'NA'),'|',ifnull(`jam_kerja`.`jam_pulang`,'NA'),'|',ifnull(`presensi`.`kode_izin`,'NA'),'|',ifnull(`pengajuan_izin`.`keterangan`,'NA'),'|'),NULL)) AS `tgl_31` from ((`presensi` left join `jam_kerja` on(`presensi`.`kode_jam_kerja` = `jam_kerja`.`kode_jam_kerja`)) left join `pengajuan_izin` on(`presensi`.`kode_izin` = `pengajuan_izin`.`kode_izin`)) group by `presensi`.`nip`) `presensi` on(`asn`.`nip` = `presensi`.`nip`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`kode_agama`) USING BTREE;

--
-- Indeks untuk tabel `asn`
--
ALTER TABLE `asn`
  ADD PRIMARY KEY (`nip`) USING BTREE;

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`kode_golongan`) USING BTREE;

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`) USING BTREE;

--
-- Indeks untuk tabel `jam_kerja`
--
ALTER TABLE `jam_kerja`
  ADD PRIMARY KEY (`kode_jam_kerja`) USING BTREE;

--
-- Indeks untuk tabel `jenis_jabatan`
--
ALTER TABLE `jenis_jabatan`
  ADD PRIMARY KEY (`kode_jenis_jabatan`) USING BTREE;

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kode_kabupaten`) USING BTREE;

--
-- Indeks untuk tabel `kawin`
--
ALTER TABLE `kawin`
  ADD PRIMARY KEY (`kode_jenis_kawin`) USING BTREE;

--
-- Indeks untuk tabel `kinerja_mingguan`
--
ALTER TABLE `kinerja_mingguan`
  ADD PRIMARY KEY (`kode_kinerja_mingguan`) USING BTREE;

--
-- Indeks untuk tabel `konfigurasi_jk_skpd`
--
ALTER TABLE `konfigurasi_jk_skpd`
  ADD PRIMARY KEY (`kode_jk_skpd`) USING BTREE;

--
-- Indeks untuk tabel `konfigurasi_jk_skpd_detail`
--
ALTER TABLE `konfigurasi_jk_skpd_detail`
  ADD KEY `fk_jkskpd` (`kode_jk_skpd`) USING BTREE;

--
-- Indeks untuk tabel `konfigurasi_lokasi`
--
ALTER TABLE `konfigurasi_lokasi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kuota`
--
ALTER TABLE `kuota`
  ADD PRIMARY KEY (`kode_kuota`);

--
-- Indeks untuk tabel `master_cuti`
--
ALTER TABLE `master_cuti`
  ADD PRIMARY KEY (`kode_cuti`) USING BTREE;

--
-- Indeks untuk tabel `master_tugasluar`
--
ALTER TABLE `master_tugasluar`
  ADD PRIMARY KEY (`kode_tugasluar`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`kode_pangkatgol`);

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`kode_pengadaan`);

--
-- Indeks untuk tabel `pengajuan_izin`
--
ALTER TABLE `pengajuan_izin`
  ADD PRIMARY KEY (`kode_izin`) USING BTREE;

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`kode_skpd`) USING BTREE;

--
-- Indeks untuk tabel `unitkerja`
--
ALTER TABLE `unitkerja`
  ADD PRIMARY KEY (`kode_unitkerja`) USING BTREE;

--
-- Indeks untuk tabel `uraian_kinerja_mingguan`
--
ALTER TABLE `uraian_kinerja_mingguan`
  ADD PRIMARY KEY (`kode_uraian_kegiatan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=528;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi_lokasi`
--
ALTER TABLE `konfigurasi_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `konfigurasi_jk_skpd_detail`
--
ALTER TABLE `konfigurasi_jk_skpd_detail`
  ADD CONSTRAINT `fk_jkskpd` FOREIGN KEY (`kode_jk_skpd`) REFERENCES `konfigurasi_jk_skpd` (`kode_jk_skpd`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
