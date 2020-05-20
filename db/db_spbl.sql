-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 05:49 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spbl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id_alternatif` varchar(7) NOT NULL,
  `nama_alternatif` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
('ALT-001', 'Pangan'),
('ALT-002', 'Sandang'),
('ALT-003', 'Kematian'),
('ALT-004', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_analisis_prioritas`
--

CREATE TABLE `tb_analisis_prioritas` (
  `id_analisis` varchar(12) NOT NULL,
  `id_peristiwa` varchar(12) NOT NULL,
  `paket_pangan` double NOT NULL,
  `paket_sandang` double NOT NULL,
  `paket_kematian` double NOT NULL,
  `paket_lainnya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_analisis_prioritas`
--

INSERT INTO `tb_analisis_prioritas` (`id_analisis`, `id_peristiwa`, `paket_pangan`, `paket_sandang`, `paket_kematian`, `paket_lainnya`) VALUES
('001/ANS/2020', '001/PRS/2020', 86, 89.5, 30.25, 63.5);

--
-- Triggers `tb_analisis_prioritas`
--
DELIMITER $$
CREATE TRIGGER `status_laporan_insert` AFTER INSERT ON `tb_analisis_prioritas` FOR EACH ROW BEGIN
UPDATE tb_observasi_lapangan
SET laporan_tahap1 = 3, laporan_tahap2 = 3
WHERE id_peristiwa = id_peristiwa;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `status_laporan_update` AFTER UPDATE ON `tb_analisis_prioritas` FOR EACH ROW BEGIN
UPDATE tb_observasi_lapangan
SET laporan_tahap1 = 3, laporan_tahap2 = 3
WHERE id_peristiwa = id_peristiwa;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `id_bobot` varchar(7) NOT NULL,
  `id_alternatif` varchar(7) NOT NULL,
  `id_kriteria` varchar(7) NOT NULL,
  `bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot`
--

INSERT INTO `tb_bobot` (`id_bobot`, `id_alternatif`, `id_kriteria`, `bobot`) VALUES
('BBT-001', 'ALT-001', 'KRT-001', 30),
('BBT-002', 'ALT-001', 'KRT-002', 50),
('BBT-003', 'ALT-001', 'KRT-003', 0),
('BBT-004', 'ALT-001', 'KRT-004', 0),
('BBT-005', 'ALT-001', 'KRT-005', 20),
('BBT-006', 'ALT-002', 'KRT-001', 25),
('BBT-007', 'ALT-002', 'KRT-002', 60),
('BBT-008', 'ALT-002', 'KRT-003', 0),
('BBT-009', 'ALT-002', 'KRT-004', 0),
('BBT-010', 'ALT-002', 'KRT-005', 15),
('BBT-011', 'ALT-003', 'KRT-001', 5),
('BBT-012', 'ALT-003', 'KRT-002', 0),
('BBT-013', 'ALT-003', 'KRT-003', 5),
('BBT-014', 'ALT-003', 'KRT-004', 60),
('BBT-015', 'ALT-003', 'KRT-005', 30),
('BBT-016', 'ALT-004', 'KRT-001', 20),
('BBT-017', 'ALT-004', 'KRT-002', 30),
('BBT-018', 'ALT-004', 'KRT-003', 30),
('BBT-019', 'ALT-004', 'KRT-004', 0),
('BBT-020', 'ALT-004', 'KRT-005', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kebutuhan_logistik`
--

CREATE TABLE `tb_kebutuhan_logistik` (
  `id_kebutuhan` varchar(12) NOT NULL,
  `id_peristiwa` varchar(12) NOT NULL,
  `beras` int(10) NOT NULL,
  `telur` int(10) NOT NULL,
  `mie_instan` int(10) NOT NULL,
  `air_minum` int(10) NOT NULL,
  `pakaian_balita` int(10) NOT NULL,
  `pakaian_anak_l` int(10) NOT NULL,
  `pakaian_anak_p` int(10) NOT NULL,
  `pakaian_remaja_l` int(10) NOT NULL,
  `pakaian_remaja_p` int(10) NOT NULL,
  `pakaian_dewasa_l` int(10) NOT NULL,
  `pakaian_dewasa_p` int(10) NOT NULL,
  `selimut` int(10) NOT NULL,
  `sleeping_bag` int(10) NOT NULL,
  `matras` int(10) NOT NULL,
  `sabun_mandi` int(10) NOT NULL,
  `sabun_cuci` int(10) NOT NULL,
  `paket_kesehatan` int(10) NOT NULL,
  `popok_bayi` int(10) NOT NULL,
  `susu_bayi` int(10) NOT NULL,
  `selimut_bayi` int(10) NOT NULL,
  `pembalut` int(10) NOT NULL,
  `kantong_mayat` int(10) NOT NULL,
  `kain_kafan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kebutuhan_logistik`
--

INSERT INTO `tb_kebutuhan_logistik` (`id_kebutuhan`, `id_peristiwa`, `beras`, `telur`, `mie_instan`, `air_minum`, `pakaian_balita`, `pakaian_anak_l`, `pakaian_anak_p`, `pakaian_remaja_l`, `pakaian_remaja_p`, `pakaian_dewasa_l`, `pakaian_dewasa_p`, `selimut`, `sleeping_bag`, `matras`, `sabun_mandi`, `sabun_cuci`, `paket_kesehatan`, `popok_bayi`, `susu_bayi`, `selimut_bayi`, `pembalut`, `kantong_mayat`, `kain_kafan`) VALUES
('001/KLG/2020', '001/PRS/2020', 28, 210, 210, 280, 3, 16, 7, 15, 13, 10, 9, 70, 7, 73, 219, 73, 1, 36, 2970, 3, 26, 1, 1);

--
-- Triggers `tb_kebutuhan_logistik`
--
DELIMITER $$
CREATE TRIGGER `sts_laporan_insert` AFTER INSERT ON `tb_kebutuhan_logistik` FOR EACH ROW BEGIN
UPDATE tb_observasi_lapangan
SET laporan_tahap1 = 3, laporan_tahap2 = 3
WHERE id_peristiwa = id_peristiwa;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sts_laporan_update` AFTER UPDATE ON `tb_kebutuhan_logistik` FOR EACH ROW BEGIN
UPDATE tb_observasi_lapangan
SET laporan_tahap1 = 3, laporan_tahap2 = 3
WHERE id_peristiwa = id_peristiwa;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` varchar(7) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
('KRT-001', 'Jml. Korban Terdampak'),
('KRT-002', 'Jml. Korban Mengungsi'),
('KRT-003', 'Jml. Korban Luka'),
('KRT-004', 'Jml. Korban Meninggal dan Hilang'),
('KRT-005', 'Kondisi Pasca Bencana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_observasi_lapangan`
--

CREATE TABLE `tb_observasi_lapangan` (
  `id_observasi` int(11) NOT NULL,
  `id_peristiwa` varchar(12) NOT NULL,
  `korban_terdampak` int(10) DEFAULT NULL,
  `korban_mengungsi` int(10) DEFAULT NULL,
  `korban_luka` int(10) DEFAULT NULL,
  `korban_meninggal` int(10) DEFAULT NULL,
  `korban_hilang` int(10) DEFAULT NULL,
  `pasca_bencana` varchar(7) DEFAULT NULL,
  `pengungsi_laki_laki` int(10) DEFAULT NULL,
  `pl_balita` int(10) DEFAULT NULL,
  `pl_anak_anak` int(10) DEFAULT NULL,
  `pl_remaja` int(10) DEFAULT NULL,
  `pl_dewasa` int(10) DEFAULT NULL,
  `pl_lansia` int(10) DEFAULT NULL,
  `pengungsi_perempuan` int(10) DEFAULT NULL,
  `pp_balita` int(10) DEFAULT NULL,
  `pp_anak_anak` int(10) DEFAULT NULL,
  `pp_remaja` int(10) DEFAULT NULL,
  `pp_dewasa` int(10) DEFAULT NULL,
  `pp_lansia` int(10) DEFAULT NULL,
  `laporan_tahap1` int(1) DEFAULT NULL,
  `laporan_tahap2` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_observasi_lapangan`
--

INSERT INTO `tb_observasi_lapangan` (`id_observasi`, `id_peristiwa`, `korban_terdampak`, `korban_mengungsi`, `korban_luka`, `korban_meninggal`, `korban_hilang`, `pasca_bencana`, `pengungsi_laki_laki`, `pl_balita`, `pl_anak_anak`, `pl_remaja`, `pl_dewasa`, `pl_lansia`, `pengungsi_perempuan`, `pp_balita`, `pp_anak_anak`, `pp_remaja`, `pp_dewasa`, `pp_lansia`, `laporan_tahap1`, `laporan_tahap2`) VALUES
(18, '001/PRS/2020', 85, 73, 2, 1, 0, 'Waspada', 43, 2, 16, 15, 7, 3, 30, 1, 7, 13, 5, 4, 3, 3);

--
-- Triggers `tb_observasi_lapangan`
--
DELIMITER $$
CREATE TRIGGER `update_status_laporan` BEFORE UPDATE ON `tb_observasi_lapangan` FOR EACH ROW BEGIN
    IF (NEW.korban_terdampak <> OLD.korban_terdampak || NEW.korban_mengungsi <> OLD.korban_mengungsi || NEW.korban_luka <> OLD.korban_luka || NEW.korban_hilang <> OLD.korban_hilang || NEW.korban_meninggal <> OLD.korban_meninggal || NEW.pasca_bencana <> OLD.pasca_bencana)
    THEN
        SET NEW.laporan_tahap1 = 2;
    END IF;
    
    IF (NEW.pengungsi_laki_laki <> OLD.pengungsi_laki_laki || NEW.pl_balita <> OLD.pl_balita || NEW.pl_anak_anak <> OLD.pl_anak_anak || NEW.pl_remaja <> OLD.pl_remaja || NEW.pl_dewasa <> OLD.pl_dewasa || NEW.pl_lansia <> OLD.pl_lansia || NEW.pengungsi_perempuan <> OLD.pengungsi_perempuan || NEW.pp_balita <> OLD.pp_balita || NEW.pp_anak_anak <> OLD.pp_anak_anak || NEW.pp_remaja <> OLD.pp_remaja || NEW.pp_dewasa <> OLD.pp_dewasa || NEW.pp_lansia <> OLD.pp_lansia)
    THEN
        SET NEW.laporan_tahap2 = 2;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peristiwa`
--

CREATE TABLE `tb_peristiwa` (
  `id_peristiwa` varchar(12) NOT NULL,
  `jenis_bencana` varchar(100) NOT NULL,
  `nama_inisial` varchar(100) NOT NULL,
  `cakupan_lokasi` text NOT NULL,
  `tanggal_peristiwa` date NOT NULL,
  `jam_peristiwa` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peristiwa`
--

INSERT INTO `tb_peristiwa` (`id_peristiwa`, `jenis_bencana`, `nama_inisial`, `cakupan_lokasi`, `tanggal_peristiwa`, `jam_peristiwa`) VALUES
('001/PRS/2020', 'Banjir', 'Banjir di Kel. Cipaku', 'Jl. Gunung Gadung Kp. Legok Muncang RT. 002 s.d. RT. 003 RW. 015 Kel. Cipaku Kec. Bogor Selatan', '2020-05-13', '05:00');

--
-- Triggers `tb_peristiwa`
--
DELIMITER $$
CREATE TRIGGER `hapus_peristiwa` BEFORE DELETE ON `tb_peristiwa` FOR EACH ROW BEGIN
 DELETE FROM tb_observasi_lapangan
 WHERE id_peristiwa = OLD.id_peristiwa;
 
 DELETE FROM tb_analisis_prioritas
 WHERE id_peristiwa = OLD.id_peristiwa;
 
 DELETE FROM tb_kebutuhan_logistik
 WHERE id_peristiwa = OLD.id_peristiwa;
 END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_peristiwa` AFTER INSERT ON `tb_peristiwa` FOR EACH ROW BEGIN
 INSERT INTO tb_observasi_lapangan SET
 id_peristiwa = NEW.id_peristiwa, korban_terdampak = 0, korban_mengungsi = 0, korban_luka = 0, korban_meninggal = 0, korban_hilang = 0, pasca_bencana = 0, pengungsi_laki_laki = 0, pl_balita = 0, pl_anak_anak = 0, pl_remaja = 0, pl_dewasa = 0, pl_lansia = 0, pengungsi_perempuan = 0, pp_balita = 0, pp_anak_anak = 0, pp_remaja = 0, pp_dewasa = 0, pp_lansia = 0, laporan_tahap1 = 0, laporan_tahap2 = 0;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kriteria`
--

CREATE TABLE `tb_sub_kriteria` (
  `id_sub_kriteria` varchar(7) NOT NULL,
  `id_kriteria` varchar(7) NOT NULL,
  `deskripsi` varchar(20) NOT NULL,
  `utility` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sub_kriteria`
--

INSERT INTO `tb_sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `utility`) VALUES
('SKR-001', 'KRT-001', '1 s.d. 20', 25),
('SKR-002', 'KRT-001', '21 s.d. 30', 50),
('SKR-003', 'KRT-001', '31 s.d. 50', 75),
('SKR-004', 'KRT-001', '> 50', 100),
('SKR-005', 'KRT-002', '0', 0),
('SKR-006', 'KRT-002', '1 s.d. 10', 25),
('SKR-007', 'KRT-002', '11 s.d. 20', 50),
('SKR-008', 'KRT-002', '21 s.d. 30', 75),
('SKR-009', 'KRT-002', '> 30', 100),
('SKR-010', 'KRT-003', '0', 0),
('SKR-011', 'KRT-003', '1 s.d. 5', 25),
('SKR-012', 'KRT-003', '6 s.d. 10', 50),
('SKR-013', 'KRT-003', '11 s.d. 15', 75),
('SKR-014', 'KRT-003', '> 15', 100),
('SKR-015', 'KRT-004', '0', 0),
('SKR-016', 'KRT-004', '1 s.d. 2', 25),
('SKR-017', 'KRT-004', '3 s.d. 5', 50),
('SKR-018', 'KRT-004', '6 s.d. 10', 75),
('SKR-019', 'KRT-004', '> 10', 100),
('SKR-020', 'KRT-005', 'Normal', 0),
('SKR-021', 'KRT-005', 'Waspada', 30),
('SKR-022', 'KRT-005', 'Siaga', 70),
('SKR-023', 'KRT-005', 'Awas', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(7) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hak_akses` varchar(5) NOT NULL,
  `foto_akun` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `jenis_kelamin`, `jabatan`, `username`, `password`, `hak_akses`, `foto_akun`) VALUES
('USR-001', 'Ekky Ardian Fitran', 'L', 'Staf Administrasi', 'ekky', 'ekky', 'admin', 'ava-1589620931.jpg'),
('USR-002', 'Aulia Rahman Syah', 'L', 'Surveyor/Petugas Lapangan', 'aulia', 'aulia', 'trc', 'ava-1589642175.jpg'),
('USR-003', 'Rizki Darmawan', 'L', 'Kepala Bidang Penanganan Darurat', 'rizki', 'rizki', 'ketua', 'ava-1589646081.png'),
('USR-004', 'Indri Elia Selviasih', 'P', 'Surveyor/Petugas Lapangan', 'indri', 'indri', 'trc', 'ava-1589624062.jpg'),
('USR-005', 'Sri Rizki Ananda', 'P', 'Surveyor/Petugas Lapangan', 'Sri', 'sri', 'trc', 'ava-1589624300.jpg'),
('USR-006', 'Ridwan Kamil', 'L', 'Surveyor/Petugas Lapangan', 'Kamil', 'kamil', 'trc', 'ava-1589624350.jpg'),
('USR-007', 'Deri Adam', 'L', 'Surveyor/Petugas Lapangan', 'Adam', 'adam', 'trc', 'ava-1589624390.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tb_analisis_prioritas`
--
ALTER TABLE `tb_analisis_prioritas`
  ADD PRIMARY KEY (`id_analisis`),
  ADD KEY `id_peristiwa` (`id_peristiwa`);

--
-- Indexes for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `tb_kebutuhan_logistik`
--
ALTER TABLE `tb_kebutuhan_logistik`
  ADD PRIMARY KEY (`id_kebutuhan`),
  ADD KEY `id_peristiwa` (`id_peristiwa`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_observasi_lapangan`
--
ALTER TABLE `tb_observasi_lapangan`
  ADD PRIMARY KEY (`id_observasi`),
  ADD KEY `id_peristiwa` (`id_peristiwa`);

--
-- Indexes for table `tb_peristiwa`
--
ALTER TABLE `tb_peristiwa`
  ADD PRIMARY KEY (`id_peristiwa`);

--
-- Indexes for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_observasi_lapangan`
--
ALTER TABLE `tb_observasi_lapangan`
  MODIFY `id_observasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_analisis_prioritas`
--
ALTER TABLE `tb_analisis_prioritas`
  ADD CONSTRAINT `tb_analisis_prioritas_ibfk_1` FOREIGN KEY (`id_peristiwa`) REFERENCES `tb_peristiwa` (`id_peristiwa`);

--
-- Constraints for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  ADD CONSTRAINT `tb_bobot_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`),
  ADD CONSTRAINT `tb_bobot_ibfk_2` FOREIGN KEY (`id_alternatif`) REFERENCES `tb_alternatif` (`id_alternatif`);

--
-- Constraints for table `tb_kebutuhan_logistik`
--
ALTER TABLE `tb_kebutuhan_logistik`
  ADD CONSTRAINT `tb_kebutuhan_logistik_ibfk_1` FOREIGN KEY (`id_peristiwa`) REFERENCES `tb_peristiwa` (`id_peristiwa`);

--
-- Constraints for table `tb_observasi_lapangan`
--
ALTER TABLE `tb_observasi_lapangan`
  ADD CONSTRAINT `tb_observasi_lapangan_ibfk_1` FOREIGN KEY (`id_peristiwa`) REFERENCES `tb_peristiwa` (`id_peristiwa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sub_kriteria`
--
ALTER TABLE `tb_sub_kriteria`
  ADD CONSTRAINT `tb_sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
