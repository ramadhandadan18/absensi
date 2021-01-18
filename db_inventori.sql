-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Apr 2017 pada 20.12
-- Versi Server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_inventori`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `barang_id` varchar(11) NOT NULL,
  `barang_nama` varchar(30) DEFAULT NULL,
  `barang_satuan` varchar(30) DEFAULT NULL,
  `barang_harga` double DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`barang_id`),
  KEY `barang_kategori_id` (`barang_kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`barang_id`, `barang_nama`, `barang_satuan`, `barang_harga`, `barang_kategori_id`) VALUES
('B001', 'Sampo Clear Men 100ml', 'Pcs', 12000, 1),
('B002', 'Mie Goreng', 'Pcs', 1900, 2),
('B003', 'Kratindaeng', 'Botol', 5000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_barang_id` varchar(11) DEFAULT NULL,
  `detail_disc` double DEFAULT NULL,
  `detail_qty` int(11) DEFAULT NULL,
  `detail_jual_nofaktur` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `detail_barang_id` (`detail_barang_id`),
  KEY `detail_jual_nofaktur` (`detail_jual_nofaktur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `tbl_detail`
--

INSERT INTO `tbl_detail` (`detail_id`, `detail_barang_id`, `detail_disc`, `detail_qty`, `detail_jual_nofaktur`) VALUES
(1, 'B001', 1000, 2, 'F001'),
(2, 'B002', 0, 1, 'F001'),
(3, 'B001', 1000, 2, 'F002'),
(4, 'B003', 0, 1, 'F002'),
(5, 'B001', 1000, 2, 'F003'),
(6, 'B002', 0, 1, 'F003'),
(7, 'B002', 1000, 2, 'F004'),
(8, 'B003', 0, 1, 'F004'),
(9, 'B001', 1000, 2, 'F005'),
(10, 'B002', 0, 1, 'F005'),
(11, 'B003', 1000, 2, 'F005'),
(12, 'B002', 0, 1, 'F006'),
(13, 'B003', 1000, 2, 'F006'),
(14, 'B002', 0, 1, 'F006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jual`
--

CREATE TABLE IF NOT EXISTS `tbl_jual` (
  `jual_nofaktur` varchar(10) NOT NULL,
  `jual_tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`jual_nofaktur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jual`
--

INSERT INTO `tbl_jual` (`jual_nofaktur`, `jual_tanggal`) VALUES
('F001', '2017-01-12 05:00:00'),
('F002', '2017-01-12 05:00:00'),
('F003', '2017-01-13 07:00:00'),
('F004', '2017-01-14 00:00:00'),
('F005', '2017-01-15 00:00:00'),
('F006', '2017-01-15 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Sampo'),
(2, 'Makanan'),
(3, 'Minuman');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`barang_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD CONSTRAINT `tbl_detail_ibfk_1` FOREIGN KEY (`detail_barang_id`) REFERENCES `tbl_barang` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_ibfk_2` FOREIGN KEY (`detail_jual_nofaktur`) REFERENCES `tbl_jual` (`jual_nofaktur`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
