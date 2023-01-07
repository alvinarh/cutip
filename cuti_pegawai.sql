-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2023 pada 12.37
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuti_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `nama`, `password`, `role`) VALUES
('1', 'admin@gmail.com', 'admin', 'c3ec0f7b054e729c5a716c8125839829', 1),
('2', 'admin1@gmail.com', 'admin1', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_cuti`
--

CREATE TABLE `ket_cuti` (
  `id` int(10) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ket_cuti`
--

INSERT INTO `ket_cuti` (`id`, `keterangan`) VALUES
(1, 'Cuti Sakit'),
(2, 'Cuti Melahirkan'),
(3, 'Cuti Alasan Penting'),
(4, 'Cuti Besar'),
(5, 'Cuti Tahunan'),
(6, 'Cuti Diluar Tanggungan Negara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_cuti`
--

CREATE TABLE `permohonan_cuti` (
  `id_cuti` int(10) NOT NULL,
  `kode_pegawai` char(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `mulai_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `surat_dokter` varchar(255) NOT NULL,
  `surat_melahirkan` varchar(255) NOT NULL,
  `surat_alasanpenting` varchar(255) NOT NULL,
  `surat_besar` varchar(255) NOT NULL,
  `surat_tahunan` varchar(255) NOT NULL,
  `surat_diluartn` varchar(255) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `verifikasi` int(10) NOT NULL,
  `perihal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permohonan_cuti`
--

INSERT INTO `permohonan_cuti` (`id_cuti`, `kode_pegawai`, `nama`, `tanggal_pengajuan`, `mulai_cuti`, `akhir_cuti`, `surat_dokter`, `surat_melahirkan`, `surat_alasanpenting`, `surat_besar`, `surat_tahunan`, `surat_diluartn`, `keterangan`, `verifikasi`, `perihal`) VALUES
(37, 'PGW-2023-00019', 'Rina', '2023-01-03', '2023-01-03', '2023-03-10', '', 'surat-melahirkanPGW-2023-00020-03-01-2023.pdf', '', '', '', '', 'Cuti Melahirkan', 0, ''),
(38, 'PGW-2022-00009', 'Siska ', '2023-01-03', '2023-01-12', '2023-07-21', '', 'surat-melahirkanPGW-2023-00020-03-01-20231.pdf', '', '', '', '', 'Cuti Melahirkan', 3, ''),
(39, 'PGW-2023-00019', 'Rina', '2023-01-03', '2023-01-04', '2023-05-04', '', 'surat-melahirkanPGW-2023-00020-03-01-20232.pdf', '', '', '', '', 'Cuti Melahirkan', 1, ''),
(40, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-05', '2023-04-05', '', 'surat-melahirkanPGW-2023-00020-04-01-2023.pdf', '', '', '', '', 'Cuti Melahirkan', 0, ''),
(41, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-12', '2023-01-14', 'surat-dokterPGW-2023-00020-04-01-2023.pdf', '', '', '', '', '', 'Cuti Sakit', 1, 'Sakit Demam'),
(42, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-18', '2023-01-19', 'surat-dokterPGW-2023-00020-04-01-20231.pdf', '', '', '', '', '', 'Cuti Sakit', 2, 'Sakit Flu'),
(43, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-06', '2023-04-06', '', 'surat-melahirkanPGW-2023-00020-04-01-20231.pdf', '', '', '', '', 'Cuti Melahirkan', 0, ''),
(44, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-05', '2023-02-05', '', 'surat-melahirkanPGW-2023-00020-04-01-20232.pdf', '', '', '', '', 'Cuti Melahirkan', 0, ''),
(45, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-10', '2023-03-10', '', 'surat-melahirkanPGW-2023-00020-04-01-20233.pdf', '', '', '', '', 'Cuti Melahirkan', 0, ''),
(46, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-05', '2023-01-11', 'surat-dokterPGW-2023-00020-04-01-20232.pdf', '', '', '', '', '', 'Cuti Sakit', 3, 'Sakit Demam'),
(47, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-04', '2023-01-06', 'surat-dokterPGW-2023-00020-04-01-20233.pdf', '', '', '', '', '', 'Cuti Sakit', 3, 'Sakit Flu'),
(48, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-04', '2023-01-13', 'surat-dokterPGW-2023-00020-04-01-20234.pdf', '', '', '', '', '', 'Cuti Sakit', 3, 'Wisuda Anak'),
(49, 'PGW-2023-00019', 'Rina', '2023-01-04', '2023-01-04', '2023-01-13', 'surat-dokterPGW-2023-00020-04-01-20235.pdf', '', '', '', '', '', 'Cuti Sakit', 1, 'sakit panas'),
(50, 'PGW-2023-00019', 'Rina', '2023-01-05', '2023-01-12', '2023-03-12', '', 'surat-melahirkanPGW-2023-00020-05-01-2023.pdf', '', '', '', '', 'Cuti Melahirkan', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pimpinan`
--

CREATE TABLE `pimpinan` (
  `kode_pimpinan` char(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(120) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pimpinan`
--

INSERT INTO `pimpinan` (`kode_pimpinan`, `nama`, `jabatan`, `email`, `password`, `no_telp`, `role`) VALUES
('1', 'pimpinan', 'Setda', 'pimpinan@gmail.com', 'pimpinan', '082345432334', 2),
('2', 'pimpinan1', 'Setda', 'pimpinan1@gmail.com', '90973652b88fe07d05a4304f0a945de8', '082345432334', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kode_pegawai` char(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `jenis_kel` char(10) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(120) NOT NULL,
  `status` varchar(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kode_pegawai`, `nama`, `jabatan`, `jenis_kel`, `no_telp`, `alamat`, `email`, `password`, `status`, `role`) VALUES
('PGW-2022-00009', 'Siska ', 'Staff Humas', 'Perempuan', '087654321231', 'Jl. Sendangwungu', 'siska02@gmail.com', 'user', 'Tidak Aktif', 3),
('PGW-2022-00014', 'Priskillia', 'Staff Persidangan', 'Perempuan', '0876543456', 'Jl. Mataram', 'priskillia@gmail.com', 'user', 'Aktif', 3),
('PGW-2022-00015', 'Cahya Ayu Ningrum', 'Staff Rumah Tangga', 'Perempuan', '082327543567', 'Jl. Tembalang', 'cahyaayu@gmail.com', 'user', 'Aktif', 3),
('PGW-2022-00016', 'Mentari', 'Staff Perlengkapan', 'Perempuan', '082327654432', 'Jl. Tamansari', 'mentari@gmail.com', 'user', 'Aktif', 3),
('PGW-2022-00018', 'Diana S', 'Staff Humas', 'Perempuan', '083254654345', 'Jl. Mawar', 'diana@gmail.com', 'user', 'Keluar', 3),
('PGW-2023-00019', 'Rina p', 'Staff Humas', 'Perempuan', '082327654432', 'Jl. Baru', 'rina@gmail.com', '12345', 'Aktif', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ket_cuti`
--
ALTER TABLE `ket_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permohonan_cuti`
--
ALTER TABLE `permohonan_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`kode_pimpinan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_pegawai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ket_cuti`
--
ALTER TABLE `ket_cuti`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `permohonan_cuti`
--
ALTER TABLE `permohonan_cuti`
  MODIFY `id_cuti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
