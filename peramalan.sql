-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2019 pada 18.20
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peramalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` int(11) NOT NULL,
  `data_rill` double NOT NULL,
  `data_peramalan` double NOT NULL,
  `mape` double NOT NULL,
  `mse` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `backup`
--

INSERT INTO `backup` (`id`, `tahun`, `bulan`, `data_rill`, `data_peramalan`, `mape`, `mse`) VALUES
(20091, 2009, 1, 512, 512, 0, 0),
(20092, 2009, 2, 0, 512, 0, 0),
(20131, 2013, 1, 999, 999, 0, 0),
(20132, 2013, 2, 0, 999, 0, 0),
(20161, 2016, 1, 999, 999, 0, 0),
(20162, 2016, 2, 0, 999, 0, 0),
(20181, 2018, 1, 222, 222, 0, 0),
(20182, 2018, 2, 220, 222, -0.90909090909091, 2),
(20183, 2018, 3, 553, 221.8, 59.891500904159, 27423.36),
(20184, 2018, 4, 222, 284.728, -28.255855855856, 786.9603968),
(20185, 2018, 5, 5200, 272.80968, 94.75366, 2427720.4449502),
(20186, 2018, 6, 0, 1208.9758408, 0, 132874.78033073),
(20187, 2018, 7, 0, 979.270431048, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan`
--

CREATE TABLE `peramalan` (
  `id` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` int(11) NOT NULL,
  `data_rill` double NOT NULL,
  `data_peramalan` double DEFAULT NULL,
  `mape` double DEFAULT NULL,
  `mse` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peramalan`
--

INSERT INTO `peramalan` (`id`, `tahun`, `bulan`, `data_rill`, `data_peramalan`, `mape`, `mse`) VALUES
(20131, 2013, 1, 999, 999, 0, 0),
(20132, 2013, 2, 0, 999, 0, 0),
(20161, 2016, 1, 999, 999, 0, 0),
(20162, 2016, 2, 0, 999, 0, 0),
(20181, 2018, 1, 222, 222, 0, 0),
(20182, 2018, 2, 220, 222, -0.90909090909091, 2),
(20183, 2018, 3, 553, 221.8, 59.891500904159, 27423.36),
(20184, 2018, 4, 222, 284.728, -28.255855855856, 786.9603968),
(20185, 2018, 5, 5200, 272.80968, 94.75366, 2427720.4449502);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `fullname`, `password`, `level`, `date`) VALUES
(1111, 'boz', 'bozque', '$2y$10$mUF1CR/AEccDVUx4hsIabeH204grtpmz6hLcFZrr8bCl6HdjZJSSq', '', '0000-00-00'),
(123456, 'admin', 'administrator', '$2y$10$4bEo.XPFPad8bXdemQoaYuxa0wXe9xyLlY3b2VS8QS5Cp8QQdL4lG', 'Administrator', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20188;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
