-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jun 2018 pada 00.38
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `kd_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`kd_user`, `nama`, `no_hp`, `username`, `password`) VALUES
(1, 'Muhamad Jalaludin', '089624940234', 'jalal', 'jalal'),
(2, 'Raditor', '089624940234', 'raditor', 'raditor'),
(3, 'Jalaludin', '089624940234', 'udin', 'udin'),
(4, 'Saepulloh', '089624940234', 'epul', 'epul'),
(5, 'Abdullah', '089624940234', 'adul', 'adul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilihan`
--

CREATE TABLE `pemilihan` (
  `kd_pemilihan` varchar(6) NOT NULL,
  `nis` int(11) NOT NULL,
  `kd_upd` varchar(6) NOT NULL,
  `kd_senbud` varchar(6) NOT NULL,
  `tgl_pemilihan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `pemilihan`
--
DELIMITER $$
CREATE TRIGGER `pilih_upd` AFTER INSERT ON `pemilihan` FOR EACH ROW BEGIN
 UPDATE upd SET
    kuota = kuota - 1
WHERE kd_upd = new.kd_upd;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_pemilihan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `q_pemilihan` (
`kd_pemilihan` varchar(6)
,`nis` int(11)
,`kd_upd` varchar(6)
,`kd_senbud` varchar(6)
,`tgl_pemilihan` date
,`nama_siswa` varchar(100)
,`rayon` varchar(10)
,`rombel` varchar(10)
,`upd` varchar(25)
,`senbud` varchar(25)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `senbud`
--

CREATE TABLE `senbud` (
  `kd_senbud` varchar(6) NOT NULL,
  `senbud` varchar(25) NOT NULL,
  `instruktur_senbud` varchar(100) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `senbud`
--

INSERT INTO `senbud` (`kd_senbud`, `senbud`, `instruktur_senbud`, `hari`, `kuota`) VALUES
('SB001', 'Gitar 1', 'Hendri Prawira', 'Senin', 50),
('SB002', 'Teater 1', 'Angga', 'Senin', 50),
('SB003', 'Seni Suara', 'Arief Dimas', 'Rabu', 50),
('SB004', 'Teater 2', 'Angga', 'Selasa', 50),
('SB005', 'Gitar 2', 'Hendri Prawira', 'Senin', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `rayon` varchar(10) NOT NULL,
  `rombel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `jk`, `rayon`, `rombel`, `email`, `username`, `password`) VALUES
(11605617, 'Muhamad Jalaludin', 'L', 'Wik 1', 'RPL XI-2', 'muhamadjalaludin68@gmail.com', 'jalaludin', 'jalaludin'),
(11605618, 'Muhamad Meidy Mahardika', 'L', 'Wik 2', 'RPL XI-2', 'muhamadmeidy@gmail.com', 'meidy', 'meidy'),
(11605619, 'Muhamad Abdullah', 'L', 'Wik 3', 'RPL XI-3', 'abdullah@gmail.com', 'abdul', 'abdul'),
(11605620, 'Muhamad Sahill', 'L', 'Wik 4', 'RPL XI-4', 'sahill74@gmail.com', 'sahil', 'sahil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upd`
--

CREATE TABLE `upd` (
  `kd_upd` varchar(6) NOT NULL,
  `upd` varchar(25) NOT NULL,
  `instruktur` varchar(100) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upd`
--

INSERT INTO `upd` (`kd_upd`, `upd`, `instruktur`, `hari`, `kuota`) VALUES
('PD0001', 'Sepak bola', 'jalaludin', 'Sabtu', 50),
('PD0002', 'Futsal', 'Abdullah', 'Sabtu', 50),
('PD0003', 'Marawis', 'Abdul kodir', 'Kamis', 50),
('PD0004', 'Bulu tangkis', 'Ferry firmansyah', 'Sabtu', 50),
('PD0005', 'voli', 'Nurjalil', 'Rabu', 50);

-- --------------------------------------------------------

--
-- Struktur untuk view `q_pemilihan`
--
DROP TABLE IF EXISTS `q_pemilihan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_pemilihan`  AS  select `pemilihan`.`kd_pemilihan` AS `kd_pemilihan`,`pemilihan`.`nis` AS `nis`,`pemilihan`.`kd_upd` AS `kd_upd`,`pemilihan`.`kd_senbud` AS `kd_senbud`,`pemilihan`.`tgl_pemilihan` AS `tgl_pemilihan`,`siswa`.`nama_siswa` AS `nama_siswa`,`siswa`.`rayon` AS `rayon`,`siswa`.`rombel` AS `rombel`,`upd` AS `upd`,`senbud`.`senbud` AS `senbud` from (((`pemilihan` join `siswa` on((`pemilihan`.`nis` = `siswa`.`nis`))) join `upd` on((`pemilihan`.`kd_upd` = `kd_upd`))) join `senbud` on((`pemilihan`.`kd_senbud` = `senbud`.`kd_senbud`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_user`);

--
-- Indexes for table `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD PRIMARY KEY (`kd_pemilihan`),
  ADD KEY `nis` (`nis`),
  ADD KEY `kd_upd` (`kd_upd`),
  ADD KEY `kd_senbud` (`kd_senbud`);

--
-- Indexes for table `senbud`
--
ALTER TABLE `senbud`
  ADD PRIMARY KEY (`kd_senbud`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `upd`
--
ALTER TABLE `upd`
  ADD PRIMARY KEY (`kd_upd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD CONSTRAINT `pemilihan_ibfk_1` FOREIGN KEY (`kd_upd`) REFERENCES `upd` (`kd_upd`),
  ADD CONSTRAINT `pemilihan_ibfk_2` FOREIGN KEY (`kd_senbud`) REFERENCES `senbud` (`kd_senbud`),
  ADD CONSTRAINT `pemilihan_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
