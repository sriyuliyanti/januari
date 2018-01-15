-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Okt 2017 pada 11.30
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kelulusan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cek`
--

CREATE TABLE IF NOT EXISTS `cek` (
  `nim` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` char(9) NOT NULL,
  `id_wali` int(11) DEFAULT NULL,
  `nama_mhs` varchar(30) DEFAULT NULL,
  `th_masuk` year(4) DEFAULT NULL,
  `status` enum('LC','LT','LL','BL') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_wali`, `nama_mhs`, `th_masuk`, `status`) VALUES
('', 2, 'aku', 2014, 'BL'),
('123', 12, 'fqc', 2017, 'LC'),
('165610122', 2, 'Sri Yuliyanti', 2016, 'BL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_semester`
--

CREATE TABLE IF NOT EXISTS `nilai_semester` (
`id_nilai` int(11) NOT NULL,
  `nim` char(9) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `ips` double DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `nilai_semester`
--

INSERT INTO `nilai_semester` (`id_nilai`, `nim`, `semester`, `sks`, `ips`) VALUES
(1, '1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prediksi`
--

CREATE TABLE IF NOT EXISTS `prediksi` (
`id_prediksi` int(11) NOT NULL,
  `nim` char(9) DEFAULT NULL,
  `hasil_prediksi` enum('LC','LT') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(3) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(4, 'kaprodi', 'kaprodi1', 2),
(5, 'admin', 'admin1', 1),
(6, 'akulah', 'akulah2', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali`
--

CREATE TABLE IF NOT EXISTS `wali` (
  `id_wali` int(15) NOT NULL,
  `nama_wali` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wali`
--

INSERT INTO `wali` (`id_wali`, `nama_wali`) VALUES
(12, 'ad'),
(212, 'adavgwe'),
(0, 'Al Agus Subagyo'),
(2, 'Fx. Henry Nugroh'),
(3, 'M.S Adnan S.Kom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`nim`), ADD KEY `FK_mahasiswa` (`id_wali`);

--
-- Indexes for table `nilai_semester`
--
ALTER TABLE `nilai_semester`
 ADD PRIMARY KEY (`id_nilai`), ADD KEY `FK_nilai_semester` (`nim`);

--
-- Indexes for table `prediksi`
--
ALTER TABLE `prediksi`
 ADD PRIMARY KEY (`id_prediksi`), ADD KEY `FK_prediksi` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
 ADD PRIMARY KEY (`id_wali`), ADD UNIQUE KEY `id_wali` (`id_wali`), ADD KEY `nama_wali` (`nama_wali`), ADD KEY `id_wali_2` (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_semester`
--
ALTER TABLE `nilai_semester`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
MODIFY `id_prediksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
ADD CONSTRAINT `FK_mahasiswa` FOREIGN KEY (`id_wali`) REFERENCES `wali` (`id_wali`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prediksi`
--
ALTER TABLE `prediksi`
ADD CONSTRAINT `FK_prediksi` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
