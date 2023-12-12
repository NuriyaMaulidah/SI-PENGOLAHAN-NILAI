-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2023 pada 09.58
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utsoop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `Ttl` varchar(20) NOT NULL,
  `Alamat` varchar(20) NOT NULL,
  `Jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `Ttl`, `Alamat`, `Jk`) VALUES
(202101, 'Hasanah', 'Bondowoso,21-08-1997', 'Bondowoso', '0'),
(202102, 'Lukman', 'Bondowoso,21-08-1995', 'Bondowoso', '0'),
(202103, 'Bunga Citra', 'Bondowoso,01-12-1990', 'Situbndo', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `kode_mp` int(20) NOT NULL,
  `nama_mp` varchar(30) NOT NULL,
  `kelas` int(20) NOT NULL,
  `guru_mp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`kode_mp`, `nama_mp`, `kelas`, `guru_mp`) VALUES
(111, 'Bahasa Inggris', 9, 'Vanesha Agustin'),
(112, 'PJOK', 8, 'Ahmad Kholil'),
(113, 'IPA', 7, 'Amelia syarifah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `Ttl` varchar(30) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `Ttl`, `Alamat`, `Jk`) VALUES
(65438, 'Fatma Nur Afifah', 'Purbalingga, 27-02-2004', 'Kalimantan Barat', '0'),
(65439, 'Galang Sapa Pratama', 'Teluk Batang,31-07-2003', 'Kalimantan Barat', '1'),
(65440, 'Sumiati', 'teluk batang,04-07-2003', 'Kalimantan Barat', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
