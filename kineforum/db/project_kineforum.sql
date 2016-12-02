-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 01 Okt 2016 pada 01.33
-- Versi Server: 5.6.32
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_kineforum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_program`
--

DROP TABLE IF EXISTS `data_program`;
CREATE TABLE `data_program` (
  `PROGRAM_ID` int(11) NOT NULL,
  `MEMBER_ID` int(11) DEFAULT NULL,
  `PROGRAM` varchar(500) DEFAULT NULL,
  `KETERANGAN` text,
  `DATE_MULAI` date DEFAULT NULL,
  `DATE_SELESAI` date DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_slot_film`
--

DROP TABLE IF EXISTS `data_slot_film`;
CREATE TABLE `data_slot_film` (
  `SLOT_FILM_ID` int(11) NOT NULL,
  `PROGRAM_ID` int(11) DEFAULT NULL,
  `FILM_ID` int(11) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri` (
  `GALERI_ID` int(11) NOT NULL,
  `PARENT_ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `FILE_NAME` text,
  `SIZE` int(11) DEFAULT NULL,
  `TYPE` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kineforum`
--

DROP TABLE IF EXISTS `kineforum`;
CREATE TABLE `kineforum` (
  `KINEFORUM_ID` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `LOKASI` varchar(255) DEFAULT NULL,
  `ALAMAT` text,
  `TELEPON` varchar(100) DEFAULT NULL,
  `KORDINAT` varchar(255) DEFAULT NULL,
  `USE_CAPTCHA` int(11) DEFAULT NULL,
  `USE_AKTIVASI_PENONTON` int(11) DEFAULT NULL,
  `LIMIT_LOGIN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `LOG_ID` int(11) NOT NULL,
  `MEMBER_ID` int(11) DEFAULT NULL,
  `KETERANGAN` text,
  `TIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_domisili`
--

DROP TABLE IF EXISTS `master_domisili`;
CREATE TABLE `master_domisili` (
  `DOMISILI_ID` int(11) NOT NULL,
  `DOMISILI` int(11) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_film`
--

DROP TABLE IF EXISTS `master_film`;
CREATE TABLE `master_film` (
  `FILM_ID` int(11) NOT NULL,
  `JENIS_FILM_ID` int(11) DEFAULT NULL,
  `FORMAT_ID` int(11) DEFAULT NULL,
  `JUDUL` varchar(255) DEFAULT NULL,
  `SUTRADARA` varchar(255) DEFAULT NULL,
  `DURASI` int(11) DEFAULT NULL,
  `TAHUN` int(11) DEFAULT NULL,
  `RUMAH_PRODUKSI` varchar(255) DEFAULT NULL,
  `SINOPSIS` text,
  `KETERANGAN` text,
  `POSTER` text,
  `NEGARA` varchar(255) DEFAULT NULL,
  `BAHASA` varchar(255) DEFAULT NULL,
  `SUBTEKS` varchar(255) DEFAULT NULL,
  `KONTAK_EMAIL` varchar(255) DEFAULT NULL,
  `KONTAK_HP` varchar(255) DEFAULT NULL,
  `KONTAK_ALAMAT` varchar(500) DEFAULT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_film`
--

INSERT INTO `master_film` (`FILM_ID`, `JENIS_FILM_ID`, `FORMAT_ID`, `JUDUL`, `SUTRADARA`, `DURASI`, `TAHUN`, `RUMAH_PRODUKSI`, `SINOPSIS`, `KETERANGAN`, `POSTER`, `NEGARA`, `BAHASA`, `SUBTEKS`, `KONTAK_EMAIL`, `KONTAK_HP`, `KONTAK_ALAMAT`, `STATUS`) VALUES
(1, 5, 1, 'Pesta PILKETOS', 'ADE PANGESTU', 12, 2014, 'KERTAS PUTIH', 'PANJANG', 'KETERNAGAN TIDAK ADA', 'TIDAK ADA', 'INDOENSIA', 'BAHASA INDONEISA, JAWA', 'BAHASA INDONESIA', 'adepanges@gmail.com', '082322254063', '-', 1),
(5, 6, 1, 'Ca baukan', 'ade', 120, 0, '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_format`
--

DROP TABLE IF EXISTS `master_format`;
CREATE TABLE `master_format` (
  `FORMAT_ID` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_format`
--

INSERT INTO `master_format` (`FORMAT_ID`, `NAMA`, `KETERANGAN`, `STATUS`) VALUES
(1, 'Digital', 'Digital', 1),
(2, '32MM', '32MM', 1),
(3, '16MM', '16MM', 1),
(4, '8MM', '8MM', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jadwal`
--

DROP TABLE IF EXISTS `master_jadwal`;
CREATE TABLE `master_jadwal` (
  `JADWAL_ID` int(11) NOT NULL,
  `STUDIO_ID` int(11) DEFAULT NULL,
  `MEMBER_ID` int(11) DEFAULT NULL,
  `SLOT_FILM_ID` int(11) DEFAULT NULL,
  `TIME_MULAI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TIME_SELESAI` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `POSTER` text,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jenis_film`
--

DROP TABLE IF EXISTS `master_jenis_film`;
CREATE TABLE `master_jenis_film` (
  `JENIS_FILM_ID` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_jenis_film`
--

INSERT INTO `master_jenis_film` (`JENIS_FILM_ID`, `NAMA`, `KETERANGAN`, `STATUS`) VALUES
(5, 'Dokumenter', 'Dokumenter', 1),
(6, 'Fiksi', 'Fiksi', 1),
(7, 'Animasi', 'Animasi', 1),
(8, 'dll', 'dll', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kapasitas`
--

DROP TABLE IF EXISTS `master_kapasitas`;
CREATE TABLE `master_kapasitas` (
  `KAPASITAS_ID` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `KAPASITAS` int(11) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_media_sosial`
--

DROP TABLE IF EXISTS `master_media_sosial`;
CREATE TABLE `master_media_sosial` (
  `MEDIA_SOSIAL_ID` int(11) NOT NULL,
  `MEDIA` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_studio`
--

DROP TABLE IF EXISTS `master_studio`;
CREATE TABLE `master_studio` (
  `STUDIO_ID` int(11) NOT NULL,
  `KAPASITAS_ID` int(11) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `MEMBER_ID` int(11) NOT NULL,
  `usergroup_id` int(11) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(1) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(255) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `ALAMAT` varchar(500) DEFAULT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_kineforum`
--

DROP TABLE IF EXISTS `member_kineforum`;
CREATE TABLE `member_kineforum` (
  `MEMBER_KINE_ID` int(11) NOT NULL,
  `DOMISILI_ID` int(11) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(255) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `INSTITUSI` varchar(255) DEFAULT NULL,
  `TIME_REGISTER` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TOKEN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rbac_modul`
--

DROP TABLE IF EXISTS `rbac_modul`;
CREATE TABLE `rbac_modul` (
  `modul_id` int(11) NOT NULL,
  `modul_name` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `data` text,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rbac_modul`
--

INSERT INTO `rbac_modul` (`modul_id`, `modul_name`, `nama`, `data`, `status`) VALUES
(1, 'App Kine', 'Sistem Manajemen Kineforum', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rbac_modul_fitur`
--

DROP TABLE IF EXISTS `rbac_modul_fitur`;
CREATE TABLE `rbac_modul_fitur` (
  `fitur_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `fitur_name` varchar(100) NOT NULL,
  `fitur` varchar(100) NOT NULL,
  `is_menu` tinyint(1) DEFAULT '0',
  `data` text,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rbac_modul_fitur`
--

INSERT INTO `rbac_modul_fitur` (`fitur_id`, `menu_id`, `fitur_name`, `fitur`, `is_menu`, `data`, `status`) VALUES
(1, 2, 'view_master_film', 'view_master_film', 1, '', 1),
(2, 2, 'add_master_film', 'add_master_film', NULL, '', 1),
(3, 2, 'upd_master_film', 'upd_master_film', NULL, '', 1),
(4, 2, 'del_master_film', 'del_master_film', NULL, '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rbac_modul_menu`
--

DROP TABLE IF EXISTS `rbac_modul_menu`;
CREATE TABLE `rbac_modul_menu` (
  `menu_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL DEFAULT '0',
  `menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rbac_modul_menu`
--

INSERT INTO `rbac_modul_menu` (`menu_id`, `modul_id`, `menu`, `link`, `icon`, `parent_id`, `status`) VALUES
(1, 1, 'Master', 'master', 'fa-archive', 0, 1),
(2, 1, 'Database Film', '#', 'film', 1, 1),
(3, 1, 'Data Film', 'master/film/app', 'film', 2, 1),
(4, 1, 'Data Format', 'master/film/format', 'format', 2, 1),
(5, 1, 'Data Jenis Film', 'master/film/jenis', 'jenis', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rbac_modul_usergroup`
--

DROP TABLE IF EXISTS `rbac_modul_usergroup`;
CREATE TABLE `rbac_modul_usergroup` (
  `usergroup_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL,
  `usergroup` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rbac_modul_usergroup_akses`
--

DROP TABLE IF EXISTS `rbac_modul_usergroup_akses`;
CREATE TABLE `rbac_modul_usergroup_akses` (
  `usergroup_id` int(11) NOT NULL,
  `fitur_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rbac_user`
--

DROP TABLE IF EXISTS `rbac_user`;
CREATE TABLE `rbac_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rbac_user_akses`
--

DROP TABLE IF EXISTS `rbac_user_akses`;
CREATE TABLE `rbac_user_akses` (
  `akses_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL,
  `usergroup_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_booking_seat`
--

DROP TABLE IF EXISTS `t_booking_seat`;
CREATE TABLE `t_booking_seat` (
  `BOOKING_ID` int(11) NOT NULL,
  `JADWAL_ID` int(11) DEFAULT NULL,
  `MEDIA_SOSIAL_ID` int(11) DEFAULT NULL,
  `KINE_ID` int(11) DEFAULT NULL,
  `TIME_BOOK` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_program`
--
ALTER TABLE `data_program`
  ADD PRIMARY KEY (`PROGRAM_ID`),
  ADD KEY `FK_REFERENCE_18` (`MEMBER_ID`);

--
-- Indexes for table `data_slot_film`
--
ALTER TABLE `data_slot_film`
  ADD PRIMARY KEY (`SLOT_FILM_ID`),
  ADD KEY `FK_REFERENCE_15` (`PROGRAM_ID`),
  ADD KEY `FK_REFERENCE_28` (`FILM_ID`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`GALERI_ID`);

--
-- Indexes for table `kineforum`
--
ALTER TABLE `kineforum`
  ADD PRIMARY KEY (`KINEFORUM_ID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`LOG_ID`),
  ADD KEY `FK_REFERENCE_20` (`MEMBER_ID`);

--
-- Indexes for table `master_domisili`
--
ALTER TABLE `master_domisili`
  ADD PRIMARY KEY (`DOMISILI_ID`);

--
-- Indexes for table `master_film`
--
ALTER TABLE `master_film`
  ADD PRIMARY KEY (`FILM_ID`),
  ADD KEY `FK_REFERENCE_6` (`JENIS_FILM_ID`),
  ADD KEY `FK_REFERENCE_7` (`FORMAT_ID`);

--
-- Indexes for table `master_format`
--
ALTER TABLE `master_format`
  ADD PRIMARY KEY (`FORMAT_ID`);

--
-- Indexes for table `master_jadwal`
--
ALTER TABLE `master_jadwal`
  ADD PRIMARY KEY (`JADWAL_ID`),
  ADD KEY `FK_REFERENCE_19` (`MEMBER_ID`),
  ADD KEY `FK_REFERENCE_23` (`SLOT_FILM_ID`),
  ADD KEY `FK_REFERENCE_5` (`STUDIO_ID`);

--
-- Indexes for table `master_jenis_film`
--
ALTER TABLE `master_jenis_film`
  ADD PRIMARY KEY (`JENIS_FILM_ID`);

--
-- Indexes for table `master_kapasitas`
--
ALTER TABLE `master_kapasitas`
  ADD PRIMARY KEY (`KAPASITAS_ID`);

--
-- Indexes for table `master_media_sosial`
--
ALTER TABLE `master_media_sosial`
  ADD PRIMARY KEY (`MEDIA_SOSIAL_ID`);

--
-- Indexes for table `master_studio`
--
ALTER TABLE `master_studio`
  ADD PRIMARY KEY (`STUDIO_ID`),
  ADD KEY `FK_REFERENCE_2` (`KAPASITAS_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MEMBER_ID`),
  ADD KEY `FK_usergroup_to_member` (`usergroup_id`);

--
-- Indexes for table `member_kineforum`
--
ALTER TABLE `member_kineforum`
  ADD PRIMARY KEY (`MEMBER_KINE_ID`),
  ADD KEY `FK_REFERENCE_21` (`DOMISILI_ID`);

--
-- Indexes for table `rbac_modul`
--
ALTER TABLE `rbac_modul`
  ADD PRIMARY KEY (`modul_id`),
  ADD UNIQUE KEY `nama_modul` (`nama`);

--
-- Indexes for table `rbac_modul_fitur`
--
ALTER TABLE `rbac_modul_fitur`
  ADD PRIMARY KEY (`fitur_id`),
  ADD UNIQUE KEY `fitur_name_unique` (`fitur_name`);

--
-- Indexes for table `rbac_modul_menu`
--
ALTER TABLE `rbac_modul_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `rbac_modul_usergroup`
--
ALTER TABLE `rbac_modul_usergroup`
  ADD PRIMARY KEY (`usergroup_id`);

--
-- Indexes for table `rbac_user`
--
ALTER TABLE `rbac_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_unique` (`username`);

--
-- Indexes for table `rbac_user_akses`
--
ALTER TABLE `rbac_user_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- Indexes for table `t_booking_seat`
--
ALTER TABLE `t_booking_seat`
  ADD PRIMARY KEY (`BOOKING_ID`),
  ADD KEY `FK_REFERENCE_22` (`MEDIA_SOSIAL_ID`),
  ADD KEY `FK_REFERENCE_24` (`KINE_ID`),
  ADD KEY `FK_REFERENCE_9` (`JADWAL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_program`
--
ALTER TABLE `data_program`
  MODIFY `PROGRAM_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_slot_film`
--
ALTER TABLE `data_slot_film`
  MODIFY `SLOT_FILM_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `GALERI_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kineforum`
--
ALTER TABLE `kineforum`
  MODIFY `KINEFORUM_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `LOG_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_domisili`
--
ALTER TABLE `master_domisili`
  MODIFY `DOMISILI_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_film`
--
ALTER TABLE `master_film`
  MODIFY `FILM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_format`
--
ALTER TABLE `master_format`
  MODIFY `FORMAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_jadwal`
--
ALTER TABLE `master_jadwal`
  MODIFY `JADWAL_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_jenis_film`
--
ALTER TABLE `master_jenis_film`
  MODIFY `JENIS_FILM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `master_kapasitas`
--
ALTER TABLE `master_kapasitas`
  MODIFY `KAPASITAS_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_media_sosial`
--
ALTER TABLE `master_media_sosial`
  MODIFY `MEDIA_SOSIAL_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_studio`
--
ALTER TABLE `master_studio`
  MODIFY `STUDIO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MEMBER_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member_kineforum`
--
ALTER TABLE `member_kineforum`
  MODIFY `MEMBER_KINE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rbac_modul`
--
ALTER TABLE `rbac_modul`
  MODIFY `modul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rbac_modul_fitur`
--
ALTER TABLE `rbac_modul_fitur`
  MODIFY `fitur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rbac_modul_menu`
--
ALTER TABLE `rbac_modul_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rbac_modul_usergroup`
--
ALTER TABLE `rbac_modul_usergroup`
  MODIFY `usergroup_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rbac_user`
--
ALTER TABLE `rbac_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rbac_user_akses`
--
ALTER TABLE `rbac_user_akses`
  MODIFY `akses_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_booking_seat`
--
ALTER TABLE `t_booking_seat`
  MODIFY `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_program`
--
ALTER TABLE `data_program`
  ADD CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`MEMBER_ID`) REFERENCES `member` (`MEMBER_ID`);

--
-- Ketidakleluasaan untuk tabel `data_slot_film`
--
ALTER TABLE `data_slot_film`
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`PROGRAM_ID`) REFERENCES `data_program` (`PROGRAM_ID`),
  ADD CONSTRAINT `FK_REFERENCE_28` FOREIGN KEY (`FILM_ID`) REFERENCES `master_film` (`FILM_ID`);

--
-- Ketidakleluasaan untuk tabel `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_REFERENCE_20` FOREIGN KEY (`MEMBER_ID`) REFERENCES `member` (`MEMBER_ID`);

--
-- Ketidakleluasaan untuk tabel `master_film`
--
ALTER TABLE `master_film`
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`JENIS_FILM_ID`) REFERENCES `master_jenis_film` (`JENIS_FILM_ID`),
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`FORMAT_ID`) REFERENCES `master_format` (`FORMAT_ID`);

--
-- Ketidakleluasaan untuk tabel `master_jadwal`
--
ALTER TABLE `master_jadwal`
  ADD CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`MEMBER_ID`) REFERENCES `member` (`MEMBER_ID`),
  ADD CONSTRAINT `FK_REFERENCE_23` FOREIGN KEY (`SLOT_FILM_ID`) REFERENCES `data_slot_film` (`SLOT_FILM_ID`),
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`STUDIO_ID`) REFERENCES `master_studio` (`STUDIO_ID`);

--
-- Ketidakleluasaan untuk tabel `master_studio`
--
ALTER TABLE `master_studio`
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`KAPASITAS_ID`) REFERENCES `master_kapasitas` (`KAPASITAS_ID`);

--
-- Ketidakleluasaan untuk tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `FK_usergroup_to_member` FOREIGN KEY (`usergroup_id`) REFERENCES `rbac_modul_usergroup` (`usergroup_id`);

--
-- Ketidakleluasaan untuk tabel `member_kineforum`
--
ALTER TABLE `member_kineforum`
  ADD CONSTRAINT `FK_REFERENCE_21` FOREIGN KEY (`DOMISILI_ID`) REFERENCES `master_domisili` (`DOMISILI_ID`);

--
-- Ketidakleluasaan untuk tabel `t_booking_seat`
--
ALTER TABLE `t_booking_seat`
  ADD CONSTRAINT `FK_REFERENCE_22` FOREIGN KEY (`MEDIA_SOSIAL_ID`) REFERENCES `master_media_sosial` (`MEDIA_SOSIAL_ID`),
  ADD CONSTRAINT `FK_REFERENCE_24` FOREIGN KEY (`KINE_ID`) REFERENCES `member_kineforum` (`MEMBER_KINE_ID`),
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`JADWAL_ID`) REFERENCES `master_jadwal` (`JADWAL_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
