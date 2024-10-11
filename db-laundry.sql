-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2024 pada 14.27
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
-- Database: `db-laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_produk_jasa`
--

CREATE TABLE `master_produk_jasa` (
  `id_prod_jasa` int(11) NOT NULL,
  `nama_jasa_pelayanan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_produk_jasa`
--

INSERT INTO `master_produk_jasa` (`id_prod_jasa`, `nama_jasa_pelayanan`, `harga`, `satuan`) VALUES
(8, 'Cuci Strika Express', 10000, 'Kg'),
(9, 'Cuci Strika Semi Express', 8000, 'Kg'),
(10, 'Cuci reguler', 6000, 'Kg'),
(11, 'Cuci Lipat Express', 7000, 'Kg'),
(12, 'Cuci Lipat Reguler', 5000, 'Kg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_produk_jasa`
--
ALTER TABLE `master_produk_jasa`
  ADD PRIMARY KEY (`id_prod_jasa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_produk_jasa`
--
ALTER TABLE `master_produk_jasa`
  MODIFY `id_prod_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
