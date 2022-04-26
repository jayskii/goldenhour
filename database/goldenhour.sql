-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2021 pada 03.33
-- Versi server: 8.0.26
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goldenhour`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `janjitemu_jadwal`
--

CREATE TABLE `janjitemu_jadwal` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_faskes` int NOT NULL,
  `id_poli` int NOT NULL,
  `id_dokter` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `janjitemu_jadwal_rincian`
--

CREATE TABLE `janjitemu_jadwal_rincian` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_jadwal` int NOT NULL,
  `id_hari` int NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `janjitemu_janjitemu`
--

CREATE TABLE `janjitemu_janjitemu` (
  `id` int NOT NULL,
  `nama` int NOT NULL,
  `id_pasien` int NOT NULL,
  `id_faskes` int NOT NULL,
  `id_poli` int NOT NULL,
  `id_dokter` int NOT NULL,
  `keluhan_utama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `waktu_tunggu_mulai` timestamp NULL DEFAULT NULL,
  `waktu_tunggu_selesai` timestamp NULL DEFAULT NULL,
  `waktu_tunggu_durasi` float DEFAULT NULL,
  `waktu_janjitemu_mulai` timestamp NULL DEFAULT NULL,
  `waktu_janjitemu_selesai` timestamp NULL DEFAULT NULL,
  `waktu_janjitemu_durasi` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_dokter`
--

CREATE TABLE `mst_dokter` (
  `id` int NOT NULL,
  `id_orang` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_faskes`
--

CREATE TABLE `mst_faskes` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_provinsi` int DEFAULT NULL,
  `id_kabkota` int DEFAULT NULL,
  `id_kecamatan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_orang`
--

CREATE TABLE `mst_orang` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `id_jenis_kelamin` int DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telepon` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `handphone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nomor_asuransi` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor_ktp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_orang`
--

INSERT INTO `mst_orang` (`id`, `nama`, `nik`, `id_jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `handphone`, `email`, `nomor_asuransi`, `alamat`, `nomor_ktp`) VALUES
(1, 'Thomas', '32130306860004', 1, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Thomas', '32130306860004', 1, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Thomas', '32130306860004', 1, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_pasien`
--

CREATE TABLE `mst_pasien` (
  `id` int NOT NULL,
  `id_orang` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_pasien`
--

INSERT INTO `mst_pasien` (`id`, `id_orang`, `nama`) VALUES
(1, 0, 'Thomas'),
(2, 0, 'Alfa'),
(3, 0, 'Edison'),
(4, 1, 'Thomas'),
(5, 1, 'Thomas'),
(6, 1, 'Thomas'),
(7, 1, 'Thomas'),
(8, 1, 'Thomas'),
(9, 1, 'Thomas'),
(10, 1, 'Thomasss Alfa Edison sfd'),
(11, 1, 'Thomasss Alfa Edison sfd'),
(12, 1, 'Sona Febrina'),
(13, 0, 'Thomas'),
(14, 0, 'Thomas'),
(15, 0, 'Thomas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_poli`
--

CREATE TABLE `mst_poli` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_faskes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_hari`
--

CREATE TABLE `ref_hari` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_hari`
--

INSERT INTO `ref_hari` (`id`, `nama`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_jenis_kelamin`
--

CREATE TABLE `ref_jenis_kelamin` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ref_jenis_kelamin`
--

INSERT INTO `ref_jenis_kelamin` (`id`, `nama`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_kabkota`
--

CREATE TABLE `ref_kabkota` (
  `id` int NOT NULL,
  `nama` int NOT NULL,
  `id_provinsi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_kecamatan`
--

CREATE TABLE `ref_kecamatan` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_kabkota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_provinsi`
--

CREATE TABLE `ref_provinsi` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Pasien');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_user`
--

CREATE TABLE `user_user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_user_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_user`
--

INSERT INTO `user_user` (`id`, `username`, `password`, `id_user_role`) VALUES
(1, 'admin', '$2y$13$5Myme6HMZNEDxaHsZEZtOeR2HpNXgDh7dLdGqHKkEs3iM3oM9NAOu', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `janjitemu_jadwal`
--
ALTER TABLE `janjitemu_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `janjitemu_jadwal_rincian`
--
ALTER TABLE `janjitemu_jadwal_rincian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `janjitemu_janjitemu`
--
ALTER TABLE `janjitemu_janjitemu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_dokter`
--
ALTER TABLE `mst_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_faskes`
--
ALTER TABLE `mst_faskes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_orang`
--
ALTER TABLE `mst_orang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_pasien`
--
ALTER TABLE `mst_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_poli`
--
ALTER TABLE `mst_poli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_hari`
--
ALTER TABLE `ref_hari`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_jenis_kelamin`
--
ALTER TABLE `ref_jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_kabkota`
--
ALTER TABLE `ref_kabkota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ref_provinsi`
--
ALTER TABLE `ref_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_user`
--
ALTER TABLE `user_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `janjitemu_jadwal`
--
ALTER TABLE `janjitemu_jadwal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `janjitemu_jadwal_rincian`
--
ALTER TABLE `janjitemu_jadwal_rincian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `janjitemu_janjitemu`
--
ALTER TABLE `janjitemu_janjitemu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_dokter`
--
ALTER TABLE `mst_dokter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_faskes`
--
ALTER TABLE `mst_faskes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_orang`
--
ALTER TABLE `mst_orang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mst_pasien`
--
ALTER TABLE `mst_pasien`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mst_poli`
--
ALTER TABLE `mst_poli`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_hari`
--
ALTER TABLE `ref_hari`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ref_jenis_kelamin`
--
ALTER TABLE `ref_jenis_kelamin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ref_kabkota`
--
ALTER TABLE `ref_kabkota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ref_provinsi`
--
ALTER TABLE `ref_provinsi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_user`
--
ALTER TABLE `user_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
