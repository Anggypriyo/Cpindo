-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2022 pada 15.28
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pindo_cp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `foto_barang` varchar(200) DEFAULT NULL,
  `id_katbar` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `foto_barang`, `id_katbar`, `deleted_at`) VALUES
(1, 'Minyak Goreng', NULL, 2, NULL),
(2, 'Beras 5KG', '/img/no_image.jpg', 3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_detbg` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detpem` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_katbar` int(11) NOT NULL,
  `nama_katbar` varchar(25) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_katbar`, `nama_katbar`, `deleted_at`) VALUES
(1, 'Alat Masak', NULL),
(2, 'Bahan Masak', NULL),
(3, 'Bahan Pokok', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_katmenu` int(11) NOT NULL,
  `nama_katmenu` varchar(25) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_katmenu`, `nama_katmenu`, `deleted_at`) VALUES
(1, 'Nasi Goreng', NULL),
(2, 'Reguler', NULL),
(3, 'Sayuran', NULL),
(4, 'Appetizer', NULL),
(5, 'Kwetiaw', NULL),
(6, 'Menu Nasi', NULL),
(7, 'Mie', NULL),
(8, 'Bihun', NULL),
(9, 'Ayam', NULL),
(10, 'Sapi', NULL),
(11, 'Gurami', NULL),
(12, 'Kakap', NULL),
(13, 'Kepiting Soka', NULL),
(14, 'Soup', NULL),
(15, 'Udang', NULL),
(16, 'Cumi', NULL),
(17, 'Kopi', NULL),
(18, 'Latte', NULL),
(19, 'Ice Cream', NULL),
(20, 'Milkshake', NULL),
(21, 'Soda Dan Mojito', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pemesanan`
--

CREATE TABLE `kategori_pemesanan` (
  `id_katpem` int(11) NOT NULL,
  `nama_katpem` varchar(50) NOT NULL,
  `harga_katpem` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_pemesanan`
--

INSERT INTO `kategori_pemesanan` (`id_katpem`, `nama_katpem`, `harga_katpem`, `deleted_at`) VALUES
(1, 'Sewa Meja Saja', 0, NULL),
(2, 'Sewa Gazebo Saja', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_profil`
--

CREATE TABLE `kategori_profil` (
  `id_katprof` int(11) NOT NULL,
  `nama_katprof` varchar(25) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_profil`
--

INSERT INTO `kategori_profil` (`id_katprof`, `nama_katprof`, `deleted_at`) VALUES
(1, 'Tentang Pindo', NULL),
(2, 'Tampilan Utama Pindo', NULL),
(3, 'Lokasi Pindo', NULL),
(4, 'Foto Deskripsi Pindo', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga_menu` int(11) DEFAULT NULL,
  `foto_menu` varchar(200) DEFAULT NULL,
  `id_katmenu` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga_menu`, `foto_menu`, `id_katmenu`, `deleted_at`) VALUES
(1, 'Nasi Goreng Special Pindo', 33750, '/img/menu/1642859705-09087029-ad3c-4797-8c00-e62b725b94d6_Go-Biz_20210723_154105.jpeg', 1, NULL),
(2, 'Nasi Goreng Ayam', 21250, '/img/menu/1642859760-gambar_2022-01-22_205554.png', 1, NULL),
(3, 'Nasi Goreng Jawa', 25000, '/img/menu/1642859760-gambar_2022-01-22_205554.png', 1, NULL),
(4, 'Nasi Goreng Seafood', 31250, '/img/menu/1642859874-gambar_2022-01-22_205752.png', 1, NULL),
(5, 'Nasi Goreng Ikan Asin', 27500, NULL, 1, NULL),
(6, 'Nasi Goreng Omelette', 27500, '/img/menu/1642860006-gambar_2022-01-22_210004.png', 1, NULL),
(7, 'Capcay Spesial', 33750, '/img/menu/1642860345-gambar_2022-01-22_210540.png', 3, NULL),
(8, 'Sapo Tahu', 50000, '/img/menu/1642860393-gambar_2022-01-22_210629.png', 3, NULL),
(9, 'Tauge Ikan Asin', 18750, '/img/menu/1642861015-gambar_2022-01-22_211647.png', 3, NULL),
(10, 'Brookoli Bawang', 33750, '/img/menu/1642861053-gambar_2022-01-22_211730.png', 3, NULL),
(11, 'Fish n Chips', 28750, '/img/menu/1642861085-gambar_2022-01-22_211802.png', 4, NULL),
(12, 'Chicken Skin Crispy', 18750, '/img/menu/1642861126-gambar_2022-01-22_211843.png', 4, NULL),
(13, 'Mie Goreng Ayam', 22500, '/img/menu/1642861179-gambar_2022-01-22_211936.png', 7, NULL),
(14, 'Mie Goreng Lada Hitam', 27500, '/img/menu/1642861954-gambar_2022-01-22_213228.png', 7, NULL),
(15, 'Mie Goreng Lada Hitam', 27500, '/img/menu/1642861954-gambar_2022-01-22_213228.png', 7, NULL),
(16, 'Bihun Goreng Ayam', 22500, '/img/menu/1642862075-gambar_2022-01-22_213402.png', 8, NULL),
(17, 'Kwetiaw Goreng Ayam', 27500, '/img/menu/1642862007-gambar_2022-01-22_213321.png', 5, NULL),
(18, 'Koloke', 37500, '/img/menu/1642862117-gambar_2022-01-22_213510.png', 9, NULL),
(19, 'Ayam Kecap', 37500, '/img/menu/1642862162-gambar_2022-01-22_213557.png', 9, NULL),
(20, 'Ayam Pedas', 37500, '/img/menu/1642862240-gambar_2022-01-22_213715.png', 9, NULL),
(21, 'Sapi Pedas', 60000, '/img/menu/1642862342-gambar_2022-01-22_213857.png', 10, NULL),
(22, 'Kakap Thai Dressing', 60000, '/img/menu/1642862407-gambar_2022-01-22_214002.png', 12, NULL),
(23, 'Gurami 7 ons', 105000, '/img/menu/1642862500-gambar_2022-01-22_214138.png', 11, NULL),
(24, 'Gurami 6 Ons', 90000, '/img/menu/1642862539-gambar_2022-01-22_214215.png', 11, NULL),
(25, 'Kepiting Soka', 106250, '/img/menu/1642862747-gambar_2022-01-22_214543.png', 13, NULL),
(26, 'Kepiting Soka Asam Manis', 106250, '/img/menu/1642862845-gambar_2022-01-22_214719.png', 13, NULL),
(27, 'Udang Tepung', 60000, '/img/menu/1642862937-gambar_2022-01-22_214853.png', 15, NULL),
(28, 'Udang Pedas', 60000, '/img/menu/1642862971-gambar_2022-01-22_214920.png', 15, NULL),
(29, 'Cumi Telur Asin', 62500, '/img/menu/1642863001-gambar_2022-01-22_214959.png', 16, NULL),
(30, 'Kopi Tubruk', 6250, NULL, 17, NULL),
(31, 'Greentea Latte', 17500, '/img/menu/1642863485-gambar_2022-01-22_215800.png', 18, NULL),
(32, 'Ice Cream Pindo', 18750, '/img/menu/1642863663-gambar_2022-01-22_220058.png', 19, NULL),
(33, 'Milkshake Mocca', 12500, '/img/menu/1642863883-gambar_2022-01-22_220438.png', 20, NULL),
(34, 'Milkshake Blue', 17500, '/img/menu/1642863930-gambar_2022-01-22_220525.png', 20, NULL),
(35, 'Es Leci', 15000, '/img/menu/1642863983-gambar_2022-01-22_220616.png', 2, NULL),
(36, 'Es Kopi Susu', 17500, '/img/menu/1642864022-gambar_2022-01-22_220652.png', 2, NULL),
(37, 'Leci Mojito', 21250, '/img/menu/1642864074-gambar_2022-01-22_220749.png', 21, NULL),
(38, 'Arizona Sunset', 22500, '/img/menu/1642864104-gambar_2022-01-22_220821.png', 21, NULL),
(39, 'Blue Sky', 21250, '/img/menu/1642864130-gambar_2022-01-22_220846.png', 21, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `bukti_pemesanan` varchar(200) DEFAULT NULL,
  `tgl_pemesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_pengambilan` datetime NOT NULL,
  `status_pemesanan` tinyint(1) NOT NULL,
  `ket_pemesanan` varchar(300) DEFAULT NULL,
  `id_katpem` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `bukti_pemesanan`, `tgl_pemesanan`, `tgl_pengambilan`, `status_pemesanan`, `ket_pemesanan`, `id_katpem`, `deleted_at`) VALUES
(1, NULL, '2022-01-04 15:22:55', '2022-01-05 22:20:00', 0, 'a.n Lek Tri', 1, NULL),
(2, '/img/no_image.jpg', '2022-01-23 13:52:46', '2022-01-23 20:43:00', 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `bukti_pengadaan` varchar(200) DEFAULT NULL,
  `tgl_pengadaan` datetime NOT NULL,
  `status_pengadaan` tinyint(1) NOT NULL,
  `ket_pengadaan` varchar(300) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `bukti_pengadaan`, `tgl_pengadaan`, `status_pengadaan`, `ket_pengadaan`, `deleted_at`) VALUES
(1, '/img/pengadaan/1642864343-gambar_2022-01-22_221221.png', '2022-01-05 22:24:00', 0, 'Pengadaan Bahan Masak dan Bahan Pokok', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `judul_profil` varchar(30) NOT NULL,
  `path_profil` varchar(200) DEFAULT NULL,
  `id_katprof` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `judul_profil`, `path_profil`, `id_katprof`, `deleted_at`) VALUES
(2, '2012', '/img/profil/1642344012-Yuuki.Asuna.full.1522819.jpg', 2, NULL),
(3, 'Waifu Material', '/img/profil/1642344041-Yuuki.Asuna.full.1522819.jpg', 2, NULL),
(4, 'Selamat Datang', NULL, 2, NULL),
(12, 'Selamat', NULL, 2, NULL),
(13, 'Selamat 2', '/img/no_image.jpg', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_barang_katbar` (`id_katbar`) USING BTREE;

--
-- Indeks untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_detbg`),
  ADD KEY `fK_detbg_barang` (`id_barang`) USING BTREE,
  ADD KEY `fk_detbg_pengadaan` (`id_pengadaan`) USING BTREE;

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detpem`),
  ADD KEY `fk_detpem_menu` (`id_menu`) USING BTREE,
  ADD KEY `fk_detpem_pemesanan` (`id_pemesanan`) USING BTREE;

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_katbar`);

--
-- Indeks untuk tabel `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_katmenu`);

--
-- Indeks untuk tabel `kategori_pemesanan`
--
ALTER TABLE `kategori_pemesanan`
  ADD PRIMARY KEY (`id_katpem`);

--
-- Indeks untuk tabel `kategori_profil`
--
ALTER TABLE `kategori_profil`
  ADD PRIMARY KEY (`id_katprof`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fk_menu_katmenu` (`id_katmenu`) USING BTREE;

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `fk_pemesanan_katpem` (`id_katpem`) USING BTREE;

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `fk_profil_katprof` (`id_katprof`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id_detbg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detpem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_katbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_katmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2223;

--
-- AUTO_INCREMENT untuk tabel `kategori_pemesanan`
--
ALTER TABLE `kategori_pemesanan`
  MODIFY `id_katpem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_profil`
--
ALTER TABLE `kategori_profil`
  MODIFY `id_katprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_katbar` FOREIGN KEY (`id_katbar`) REFERENCES `kategori_barang` (`id_katbar`);

--
-- Ketidakleluasaan untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `fk_detbg_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_detbg_pengadaan` FOREIGN KEY (`id_pengadaan`) REFERENCES `pengadaan` (`id_pengadaan`);

--
-- Ketidakleluasaan untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `fk_detpem_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `fk_detpem_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_katmenu` FOREIGN KEY (`id_katmenu`) REFERENCES `kategori_menu` (`id_katmenu`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_pemesanan_katpem` FOREIGN KEY (`id_katpem`) REFERENCES `kategori_pemesanan` (`id_katpem`);

--
-- Ketidakleluasaan untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `fk_profil_katprof` FOREIGN KEY (`id_katprof`) REFERENCES `kategori_profil` (`id_katprof`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
