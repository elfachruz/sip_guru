-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 18. Juli 2017 jam 08:42
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipguru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`user`, `pass`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(12) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `id_mapel` int(11) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `email`, `id_mapel`) VALUES
(1, '1011101011', 'Ahmad bakri', 'ahmad.i@sipguru.com', 1),
(4, '1023400122', 'Supardi Nasir', 's.nasir@sipguru.com', 2),
(5, '1001123343', 'Sakinah', 'sakinah@sipguru.com', 3),
(6, '1020304012', 'ahmad munawir', 'ahmadmunawir83@gmail.com', 2),
(7, '1013455432', 'Suratman handoyo', 'suratman_h@sipguru.com', 6),
(8, '1003443781', 'Yusuf ismail', 'yusuf_is@sipguru.com', 12),
(9, '1012234681', 'Suryana Saputra', 'suryana_ss@sipguru.com', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mtpelajaran`
--

CREATE TABLE IF NOT EXISTS `mtpelajaran` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `mapel` varchar(30) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `mtpelajaran`
--

INSERT INTO `mtpelajaran` (`id_mapel`, `mapel`) VALUES
(1, 'Pendidikan Agama Islam'),
(2, 'Matematika'),
(3, 'Fisika'),
(4, 'Kimia'),
(5, 'Biologi'),
(6, 'Pancasila'),
(7, 'Sejarah'),
(8, 'Sosiologi'),
(9, 'Ekonomi'),
(10, 'Wirausaha'),
(11, 'Bahasa Inggris'),
(12, 'Bahasa Indonesia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
