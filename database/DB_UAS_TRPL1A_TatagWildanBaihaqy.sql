-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2026 at 02:32 AM
-- Server version: 12.3.2-MariaDB
-- PHP Version: 8.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB_UAS_TRPL1A_TatagWildanBaihaqy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `semester` int(11) NOT NULL,
  `tarif_ukt_nominal` decimal(10,2) NOT NULL,
  `jenis_pembayaran` enum('mandiri','bidikmisi','prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomer_kip_kuliah` varchar(30) DEFAULT NULL,
  `dana_saku_subsidi` decimal(10,2) DEFAULT NULL,
  `nama_instansi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_syarat` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `semester`, `tarif_ukt_nominal`, `jenis_pembayaran`, `golongan_ukt`, `nama_wali`, `nomer_kip_kuliah`, `dana_saku_subsidi`, `nama_instansi_beasiswa`, `minimal_ipk_syarat`) VALUES
(1, 'Tatag Willdan', '202601001', 2, 7500000.00, 'mandiri', 'Golongan 5', 'Budi Santoso', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', '202601002', 2, 6000000.00, 'mandiri', 'Golongan 4', 'Ahmad Subarjo', NULL, NULL, NULL, NULL),
(3, 'Randi Pangalila', '202601003', 4, 7500000.00, 'mandiri', 'Golongan 5', 'Hendra Wijaya', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', '202601004', 4, 9000000.00, 'mandiri', 'Golongan 6', 'Agus Setiawan', NULL, NULL, NULL, NULL),
(5, 'Fajar Nugraha', '202601005', 6, 6000000.00, 'mandiri', 'Golongan 4', 'Tono Sutrisno', NULL, NULL, NULL, NULL),
(6, 'Riska Amelia', '202601006', 6, 7500000.00, 'mandiri', 'Golongan 5', 'Dedi Prasetyo', NULL, NULL, NULL, NULL),
(7, 'Bambang Pamungkas', '202601007', 2, 9000000.00, 'mandiri', 'Golongan 6', 'Joko Widodo', NULL, NULL, NULL, NULL),
(8, 'Andi Wijaya', '202601008', 2, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2026-001', 1200000.00, NULL, NULL),
(9, 'Budi Setiawan', '202601009', 2, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2026-002', 1200000.00, NULL, NULL),
(10, 'Citra Kirana', '202601010', 4, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2026-003', 1200000.00, NULL, NULL),
(11, 'Dimas Anggara', '202601011', 4, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2026-004', 1200000.00, NULL, NULL),
(12, 'Eka Putri', '202601012', 6, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2026-005', 1200000.00, NULL, NULL),
(13, 'Gilang Dirga', '202601013', 6, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2026-006', 1200000.00, NULL, NULL),
(14, 'Hani Syahputri', '202601014', 2, 0.00, 'bidikmisi', NULL, NULL, 'KIP-2026-007', 1200000.00, NULL, NULL),
(15, 'Irfan Bachdim', '202601015', 2, 2000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(16, 'Julia Perez', '202601016', 4, 1500000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa BI', 3.25),
(17, 'Kevin Sanjaya', '202601017', 4, 0.00, 'prestasi', NULL, NULL, NULL, NULL, 'Kemenpora', 3.00),
(18, 'Lesti Andryani', '202601018', 6, 2000000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Unggulan', 3.50),
(19, 'Muhammad Ali', '202601019', 6, 1500000.00, 'prestasi', NULL, NULL, NULL, NULL, 'Beasiswa BI', 3.25),
(20, 'Nadiem Makarim', '202601020', 2, 0.00, 'prestasi', NULL, NULL, NULL, NULL, 'Tanoto Foundation', 3.75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
