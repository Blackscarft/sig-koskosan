-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2021 pada 16.07
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giskos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `maps`
--

CREATE TABLE `maps` (
  `id` int(11) NOT NULL,
  `judul` varchar(156) NOT NULL,
  `harga` varchar(156) NOT NULL,
  `url` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(156) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maps`
--

INSERT INTO `maps` (`id`, `judul`, `harga`, `url`, `deskripsi`, `kategori`, `latitude`, `longitude`) VALUES
(3, 'Kost De Kost Grogol Solo Baru Sukoharjo', '1300000', 'https://static.mamikos.com/uploads/cache/data/style/2019-04-15/5CkGKozp-540x720.jpg', 'K. Mandi Dalam  Â· WiFi  Â· AC  Â· Kloset Duduk  Â· Kasur  Â· Akses 24 Jam', '3', '-7.59620434', '110.82230877'),
(4, 'Kost Panda Ag 26 Grogol Sukoharjo', '1300000', 'https://static.mamikos.com/uploads/cache/data/style/2019-01-05/k6CmtCkU-540x720.jpg', 'K. Mandi Dalam  Â· WiFi  Â· AC  Â· Kloset Duduk  Â· Kasur  Â· Akses 24 Jam', '3', '-7.61060146', '110.81226826'),
(5, 'Kost Triyanto Kwarasan Grogol Sukoharjo', '800000', 'https://static.mamikos.com/uploads/cache/data/style/2020-06-30/PPcUsgCB-540x720.jpg', 'K. Mandi Dalam  Â· WiFi  Â· Kloset Duduk  Â· Kasur  Â· Akses 24 Jam', '3', '-7.59434300', '110.81239600'),
(6, 'Kost Ridho Grogol Sukoharjo', '800000', 'https://static.mamikos.com/uploads/cache/data/style/2020-09-14/rS4aCtX3-540x720.jpg', 'K. Mandi Dalam  Â· WiFi  Â· AC  Â· Kasur  Â· Akses 24 Jam', '1', '-7.60318050', '110.81035890'),
(7, 'Kost Daisy Grogol Sukoharjo', '1000000', 'https://static.mamikos.com/uploads/cache/data/style/2021-03-15/dZ8ZhkOv-540x720.jpg', 'K. Mandi Dalam  Â· WiFi  Â· AC  Â· Kloset Duduk  Â· Kasur  Â· Akses 24 Jam', '2', '-7.59414340', '110.81302130'),
(8, 'Kost Exclusive Mango Grogol Sukoharjo', '1750000', 'https://static.mamikos.com/uploads/cache/data/style/2021-03-31/vUWkXmz4-540x720.jpg', 'K. Mandi Dalam  Â· WiFi  Â· AC  Â· Kloset Duduk  Â· Kasur', '3', '-7.60398560', '110.80866190'),
(13, 'Kost Nabila Solo Baru Grogol Sukoharjo', '550000', 'https://static.mamikos.com/uploads/cache/data/style/2021-04-27/HdRb20hM-540x720.jpg', 'K. Mandi Dalam  Â· Kloset Duduk  Â· Kasur  Â· Akses 24 Jam', '2', '-7.59650600', '110.81513100'),
(14, 'Kost Putri Airani Grogol Sukoharjo', '1600000', 'https://static.mamikos.com/uploads/cache/data/style/2020-04-23/AIs9pVys-540x720.jpg', 'K. Mandi Dalam  Â· AC  Â· Kloset Duduk  Â· Kasur  Â· Akses 24 Jam', '2', '-7.59861973', '110.82449913');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
