-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2021 pada 17.07
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maintenance`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nm_barang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bendungan`
--

CREATE TABLE `bendungan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengaduan`
--

CREATE TABLE `detail_pengaduan` (
  `id` int(11) NOT NULL,
  `pengaduan_id` int(11) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) NOT NULL,
  `bendungan_id` int(11) NOT NULL,
  `pintu_air_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_maintenance`
--

CREATE TABLE `jenis_maintenance` (
  `id` int(11) NOT NULL,
  `jenis` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_maintenance`
--

INSERT INTO `jenis_maintenance` (`id`, `jenis`) VALUES
(1, 'Ganti Gomok'),
(2, 'Stir tidak ada'),
(3, 'Pintu Keras');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nama_app` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `tanggal_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(150) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `jenkel` varchar(25) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `no_pengaduan` varchar(50) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `bendungan_id` int(11) NOT NULL,
  `pintu_air_id` int(11) NOT NULL,
  `rincian_kendala` text NOT NULL,
  `catatan` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `tanggal_pengaduan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `nip` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `jenkel` varchar(20) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `bendungan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pintu_air`
--

CREATE TABLE `pintu_air` (
  `id` int(11) NOT NULL,
  `bendungan_id` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `lebar` varchar(10) DEFAULT NULL,
  `tinggi_kerangka` varchar(10) DEFAULT NULL,
  `tinggi_daun_pintu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_user`
--

CREATE TABLE `status_user` (
  `id_status` int(11) NOT NULL,
  `status_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_user`
--

INSERT INTO `status_user` (`id_status`, `status_user`) VALUES
(1, 'Aktif'),
(2, 'Non Aktif'),
(3, 'Cuti'),
(4, 'Internship');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `akses_level` varchar(20) DEFAULT NULL,
  `bendungan_id` int(11) NOT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `bendungan_id`, `tanggal_update`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin1', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Super Administrator', 0, '2019-01-28 20:55:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bendungan`
--
ALTER TABLE `bendungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pengaduan`
--
ALTER TABLE `detail_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_maintenance`
--
ALTER TABLE `jenis_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pintu_air_id` (`pintu_air_id`),
  ADD KEY `fk_bendungan_main_id` (`bendungan_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `pintu_air`
--
ALTER TABLE `pintu_air`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bendungan_id` (`bendungan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bendungan`
--
ALTER TABLE `bendungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pengaduan`
--
ALTER TABLE `detail_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_maintenance`
--
ALTER TABLE `jenis_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pintu_air`
--
ALTER TABLE `pintu_air`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `fk_bendungan_main_id` FOREIGN KEY (`bendungan_id`) REFERENCES `bendungan` (`id`),
  ADD CONSTRAINT `fk_pintu_air_id` FOREIGN KEY (`pintu_air_id`) REFERENCES `pintu_air` (`id`);

--
-- Ketidakleluasaan untuk tabel `pintu_air`
--
ALTER TABLE `pintu_air`
  ADD CONSTRAINT `fk_bendungan_id` FOREIGN KEY (`bendungan_id`) REFERENCES `bendungan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
