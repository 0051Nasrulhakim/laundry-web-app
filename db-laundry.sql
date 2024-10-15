-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2024 pada 12.58
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
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_prod_jasa` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `id_transaksi` bigint(20) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_prod_jasa` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_history`
--

INSERT INTO `order_history` (`id`, `id_transaksi`, `id_kasir`, `id_prod_jasa`, `harga`, `total_harga`, `qty`) VALUES
(1, 20241012011552, 0, 9, 8000, 96000, 12),
(2, 20241012011552, 0, 11, 7000, 7000, 1),
(3, 20241012011552, 0, 9, 8000, 96000, 12),
(4, 20241012011552, 0, 11, 7000, 7000, 1),
(5, 20241012012159, 0, 9, 8000, 48000, 6),
(6, 20241012012441, 0, 9, 8000, 168000, 21),
(7, 20241012013115, 0, 10, 6000, 6000, 1),
(8, 20241013112648, 0, 8, 10000, 40000, 4),
(9, 20241013112648, 0, 10, 6000, 6000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_transaksi`
--

CREATE TABLE `order_transaksi` (
  `id_transaksi` bigint(20) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `total_harga_transaksi` int(11) NOT NULL,
  `nama_pembeli` text NOT NULL,
  `alamat_pembeli` text NOT NULL,
  `no_hp` bigint(15) NOT NULL,
  `tanggal_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_transaksi`
--

INSERT INTO `order_transaksi` (`id_transaksi`, `id_kasir`, `total_harga_transaksi`, `nama_pembeli`, `alamat_pembeli`, `no_hp`, `tanggal_order`) VALUES
(20241012011552, 0, 103000, 'nama pembeli', 'wqwqwqwqwqw', 812227643944, '0000-00-00 00:00:00'),
(20241012012159, 0, 48000, 'Nasrul Hakim', '2121212122', 212122, '2024-10-12 13:22:07'),
(20241012012441, 0, 168000, 'Nasrul Hakim', 'sasasa', 109919918818177, '2024-10-12 13:24:49'),
(20241012013115, 0, 6000, 'nama pembeli', 'sasa', 109919918818177, '2024-10-12 13:31:24'),
(20241013112648, 0, 46000, 'tes nama pembeli', 'tes alamat', 81227643944, '2024-10-13 11:28:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_produk_jasa`
--
ALTER TABLE `master_produk_jasa`
  ADD PRIMARY KEY (`id_prod_jasa`);

--
-- Indeks untuk tabel `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_transaksi`
--
ALTER TABLE `order_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `master_produk_jasa`
--
ALTER TABLE `master_produk_jasa`
  MODIFY `id_prod_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
