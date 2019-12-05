-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2019 pada 13.41
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restdungingi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'wpu123', 1, 0, 0, NULL, 1),
(2, 3, 'rahasia', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:api/penduduk/index:get', 5, 1557046500, 'rahasia'),
(2, 'uri:api/penduduk/index:get', 10, 1556487872, 'wpu123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE `statistik` (
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('::1', '2019-04-25', 201, '1556235694'),
('::1', '2019-04-26', 225, '1556274069'),
('::1', '2019-04-28', 5, '1556494161'),
('::1', '2019-05-03', 22, '1556926144'),
('::1', '2019-05-04', 163, '1556977184'),
('::1', '2019-05-05', 17, '1557046907'),
('::1', '2019-05-08', 1, '1557276241'),
('::1', '2019-07-15', 10, '1563200583'),
('::1', '2019-08-11', 9, '1565538997'),
('::1', '2019-08-17', 8, '1566048982'),
('::1', '2019-08-18', 6, '1566110970'),
('::1', '2019-09-19', 15, '1568883776'),
('::1', '2019-09-20', 1, '1569023648'),
('::1', '2019-09-21', 38, '1569069011'),
('::1', '2019-09-22', 5, '1569159654'),
('::1', '2019-09-23', 5, '1569207746'),
('::1', '2019-10-02', 2, '1569979870'),
('::1', '2019-10-10', 3, '1570673464'),
('::1', '2019-10-11', 5, '1570760224'),
('::1', '2019-10-21', 3, '1571620063'),
('::1', '2019-11-28', 1, '1574909436'),
('::1', '2019-12-03', 51, '1575413919'),
('::1', '2019-12-04', 9, '1575434237'),
('::1', '2019-12-05', 5, '1575549461');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `agenda_id` int(11) NOT NULL,
  `agenda_nama` varchar(200) DEFAULT NULL,
  `agenda_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda_deskripsi` text,
  `agenda_mulai` date DEFAULT NULL,
  `agenda_selesai` date DEFAULT NULL,
  `agenda_tempat` varchar(90) DEFAULT NULL,
  `agenda_waktu` varchar(30) DEFAULT NULL,
  `agenda_keterangan` varchar(200) DEFAULT NULL,
  `agenda_author` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`agenda_id`, `agenda_nama`, `agenda_tanggal`, `agenda_deskripsi`, `agenda_mulai`, `agenda_selesai`, `agenda_tempat`, `agenda_waktu`, `agenda_keterangan`, `agenda_author`) VALUES
(5, 'Pemilu 2019', '2019-04-11 05:55:30', 'Pemilihan Anggota Legislatif DPRD Kota, DPRD Provinsi,DPRRI,DPD Ri dan Presiden dan wakil presiden periode 2019 sd 2024', '2019-04-17', '2019-04-18', 'TPS Masing masing sesuai domisili', '08:00 sd 12:00', 'Wajib bagi seluruh warga negara', 'Ramli Taliki'),
(6, 'rekapitulasi suara tkt kecamatan', '2019-04-20 23:44:05', 'rekap perolehan suara pemilu preseidien dan caleg', '2019-04-21', '2019-04-22', 'Aula kantor Kecamatan', '08:00 sd 12:00', 'sd selesai', 'Ramli Taliki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_album`
--

CREATE TABLE `tbl_album` (
  `album_id` int(11) NOT NULL,
  `album_nama` varchar(50) DEFAULT NULL,
  `album_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `album_pengguna_id` int(11) DEFAULT NULL,
  `album_author` varchar(60) DEFAULT NULL,
  `album_count` int(11) DEFAULT '0',
  `album_cover` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_album`
--

INSERT INTO `tbl_album` (`album_id`, `album_nama`, `album_tanggal`, `album_pengguna_id`, `album_author`, `album_count`, `album_cover`) VALUES
(5, 'slider', '2019-02-02 04:52:28', 5, 'Ramli', -5, 'e98a401ae1a003fdef3a0cdb5e0db2f7.jpg'),
(6, 'Umkm', '2019-02-16 02:01:46', 5, 'Ramli', 4, '9062b0fd27f4c0c9d57e1816eb9ccb2c.png'),
(7, 'Galeri', '2019-04-21 00:05:00', 9, 'Ramli Taliki', 1, '862596d293a4f63ad0869b14d22d1b34.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bulan`
--

CREATE TABLE `tbl_bulan` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bulan`
--

INSERT INTO `tbl_bulan` (`id`, `name`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agusutus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_camat`
--

CREATE TABLE `tbl_camat` (
  `camat_id` int(11) NOT NULL,
  `camat_nip` varchar(30) DEFAULT NULL,
  `camat_nama` varchar(70) DEFAULT NULL,
  `camat_jenkel` varchar(2) DEFAULT NULL,
  `camat_periode` varchar(80) DEFAULT NULL,
  `camat_mapel` varchar(120) DEFAULT NULL,
  `camat_photo` varchar(40) DEFAULT NULL,
  `camat_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_camat`
--

INSERT INTO `tbl_camat` (`camat_id`, `camat_nip`, `camat_nama`, `camat_jenkel`, `camat_periode`, `camat_mapel`, `camat_photo`, `camat_tgl_input`) VALUES
(1, '927482658274982', 'Sri Yanti Ano, SP,M.Si', 'P', '2014 sd 2019', 'Camat ', '548480adcf2fa69170947bce53685916.jpg', '2017-01-26 07:49:43'),
(11, '1443553456664577', 'Admin Dungingi', 'P', '2020', 'Camat', NULL, '2019-04-20 23:38:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `CustomerID` int(15) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(100) NOT NULL,
  `PostalCode` varchar(200) NOT NULL,
  `Country` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`CustomerID`, `CustomerName`, `Address`, `City`, `PostalCode`, `Country`) VALUES
(1, 'ramli', 'jl kalimantan', 'gorontalo', '96112', 'indonesia'),
(2, 'afdal', 'jl manado', 'gorontalo', '96138', 'indonesia'),
(3, 'Customer Name', 'Address', 'City', 'Postal Code', 'country'),
(4, 'andi', 'liluwo', 'gorontalo', '96112', 'indonesia'),
(5, 'firman', 'tomsel', 'gorontalo', '96113', 'indonesia'),
(6, 'deden', 'hbt', 'gorontalo', '96114', 'indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dataekbang`
--

CREATE TABLE `tbl_dataekbang` (
  `dataekbang_id` int(11) NOT NULL,
  `dataekbang_nama` varchar(50) NOT NULL,
  `dataekbang_author` varchar(60) NOT NULL,
  `dataekbang_pengguna_id` int(11) NOT NULL,
  `dataekbang_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dataekbang`
--

INSERT INTO `tbl_dataekbang` (`dataekbang_id`, `dataekbang_nama`, `dataekbang_author`, `dataekbang_pengguna_id`, `dataekbang_count`) VALUES
(11, 'Proyek', 'Afdhal Dzikri', 6, 4),
(12, 'Jembatan', 'Afdhal Dzikri', 6, 13),
(13, 'Koperasi', 'Afdhal Dzikri', 6, 12),
(14, 'bank', 'Ramli Taliki', 9, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datakesra`
--

CREATE TABLE `tbl_datakesra` (
  `datakesra_id` int(11) NOT NULL,
  `datakesra_nama` varchar(50) NOT NULL,
  `datakesra_author` varchar(60) NOT NULL,
  `datakesra_pengguna_id` int(11) NOT NULL,
  `datakesra_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_datakesra`
--

INSERT INTO `tbl_datakesra` (`datakesra_id`, `datakesra_nama`, `datakesra_author`, `datakesra_pengguna_id`, `datakesra_count`) VALUES
(14, 'Musholla', 'Afdhal Dzikri', 6, 1),
(15, 'Masjid', 'Afdhal Dzikri', 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datapem`
--

CREATE TABLE `tbl_datapem` (
  `datapem_id` int(11) NOT NULL,
  `datapem_nama` varchar(50) NOT NULL,
  `datapem_author` varchar(60) NOT NULL,
  `datapem_pengguna_id` int(11) NOT NULL,
  `datapem_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_datapem`
--

INSERT INTO `tbl_datapem` (`datapem_id`, `datapem_nama`, `datapem_author`, `datapem_pengguna_id`, `datapem_count`) VALUES
(14, 'Penduduk Perempuan', 'Afdhal Dzikri', 6, 0),
(15, 'Penduduk Laki-Laki', 'Afdhal Dzikri', 6, 2),
(16, 'tangga umur', 'Ramli Taliki', 9, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_datatrantib`
--

CREATE TABLE `tbl_datatrantib` (
  `datatrantib_id` int(11) NOT NULL,
  `datatrantib_nama` varchar(50) NOT NULL,
  `datatrantib_author` varchar(60) NOT NULL,
  `datatrantib_pengguna_id` int(11) NOT NULL,
  `datatrantib_count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_datatrantib`
--

INSERT INTO `tbl_datatrantib` (`datatrantib_id`, `datatrantib_nama`, `datatrantib_author`, `datatrantib_pengguna_id`, `datatrantib_count`) VALUES
(15, 'Kasus Pencurian', 'Afdhal Dzikri', 6, 2),
(16, 'Pembunuhan', 'Admin Kecamatan Dungingi', 11, 0),
(17, 'poskamling', 'Ramli Taliki', 9, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ekbang`
--

CREATE TABLE `tbl_ekbang` (
  `ekbang_id` int(11) NOT NULL,
  `ekbang_judul` varchar(60) NOT NULL,
  `ekbang_dataekbang_id` int(11) DEFAULT NULL,
  `ekbang_hbt` int(11) NOT NULL,
  `ekbang_lib` int(11) NOT NULL,
  `ekbang_tld` int(11) NOT NULL,
  `ekbang_tom` int(11) NOT NULL,
  `ekbang_tomsel` int(11) NOT NULL,
  `ekbang_total` int(11) NOT NULL,
  `ekbang_pengguna_id` int(11) NOT NULL,
  `ekbang_author` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ekbang`
--

INSERT INTO `tbl_ekbang` (`ekbang_id`, `ekbang_judul`, `ekbang_dataekbang_id`, `ekbang_hbt`, `ekbang_lib`, `ekbang_tld`, `ekbang_tom`, `ekbang_tomsel`, `ekbang_total`, `ekbang_pengguna_id`, `ekbang_author`) VALUES
(41, 'ty', 13, 1, 5, 5, 5, 1, 0, 9, 'Ramli Taliki'),
(50, 'PBB', 12, 1, 2, 3, 4, 5, 0, 9, 'Ramli Taliki'),
(51, 'PBB', 13, 6, 6, 6, 6, 6, 0, 9, 'Ramli Taliki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ektp`
--

CREATE TABLE `tbl_ektp` (
  `ektp_id` int(11) NOT NULL,
  `ektp_kelurahan_id` int(11) NOT NULL,
  `ektp_judul` varchar(50) NOT NULL,
  `ektp_alamat` varchar(50) NOT NULL,
  `ektp_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ektp`
--

INSERT INTO `tbl_ektp` (`ektp_id`, `ektp_kelurahan_id`, `ektp_judul`, `ektp_alamat`, `ektp_ket`) VALUES
(12, 1, 'afandi dj', 'jalan apel', 'Sudah merekam'),
(9, 2, 'Andika Lamusu', 'Molosipat', 'Belum Merekam'),
(14, 3, 'Deden', 'Jalan Apel II', 'Belum Merekam'),
(17, 5, 'paris', 'paguyaman', 'Sudah merekam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(11) NOT NULL,
  `file_judul` varchar(120) DEFAULT NULL,
  `file_deskripsi` text,
  `file_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `file_oleh` varchar(60) DEFAULT NULL,
  `file_download` int(11) DEFAULT '0',
  `file_data` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `file_judul`, `file_deskripsi`, `file_tanggal`, `file_oleh`, `file_download`, `file_data`) VALUES
(2, 'Dasar-dasar CSS', 'Modul dasar-dasar CSS 3. Modul ini membantu anda untuk memahami struktur dasar CSS', '2017-01-23 04:30:01', 'Erte', 0, 'ab9a183ff240deadbedaff78e639af2f.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_judul` varchar(60) DEFAULT NULL,
  `galeri_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `galeri_gambar` varchar(40) DEFAULT NULL,
  `galeri_album_id` int(11) DEFAULT NULL,
  `galeri_pengguna_id` int(11) DEFAULT NULL,
  `galeri_author` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`galeri_id`, `galeri_judul`, `galeri_tanggal`, `galeri_gambar`, `galeri_album_id`, `galeri_pengguna_id`, `galeri_author`) VALUES
(19, 'okoce', '2019-03-27 08:53:23', '7d345da8035933692d759d2228fc8393.jpg', 6, 9, 'Ramli Taliki'),
(21, 'PBB', '2019-04-21 00:05:27', '5f5f8ffca94c0c3282c75de140f82775.jpg', 7, 9, 'Ramli Taliki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `guru_id` int(11) NOT NULL,
  `guru_nip` varchar(30) DEFAULT NULL,
  `guru_nama` varchar(70) DEFAULT NULL,
  `guru_jenkel` varchar(2) DEFAULT NULL,
  `guru_tmp_lahir` varchar(80) DEFAULT NULL,
  `guru_tgl_lahir` varchar(80) DEFAULT NULL,
  `guru_mapel` varchar(120) DEFAULT NULL,
  `guru_photo` varchar(40) DEFAULT NULL,
  `guru_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`guru_id`, `guru_nip`, `guru_nama`, `guru_jenkel`, `guru_tmp_lahir`, `guru_tgl_lahir`, `guru_mapel`, `guru_photo`, `guru_tgl_input`) VALUES
(1, '927482658274982', 'Sri Yanti Ano, SP,M.Si', 'P', 'Gorontalo', '25 September 1993', 'Camat ', '548480adcf2fa69170947bce53685916.jpg', '2017-01-26 07:49:43'),
(2, '198408132003121002', 'Ramli A Taliki, SSTP', 'L', 'Gorontalo', '13 Agustus 1984', 'SekCam', 'ea60229864aa7a9489f2cd9fd183d3b0.jpg', '2017-01-26 13:38:54'),
(3, '442434', 'Joko Subroto', 'L', 'Jakarta', '25 September 1989', 'Staf', '9cd4923cc50d9e11f0fadd9a0a8d62ae.jpg', '2017-01-26 13:41:20'),
(10, '24135', 'fwfewrgg', 'L', 'grwggg', 'gggg', 'ggggg', NULL, '2019-04-20 23:49:47'),
(8, '113244', 'Ririn Febriesta', 'P', 'Padang', '27 September 1994', 'Staf', NULL, '2017-01-27 04:28:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hotel`
--

CREATE TABLE `tbl_hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_nama` varchar(100) NOT NULL,
  `hotel_kel` varchar(100) NOT NULL,
  `hotel_alamat` varchar(100) NOT NULL,
  `hotel_pemilik` varchar(100) NOT NULL,
  `hotel_kontak` varchar(100) NOT NULL,
  `hotel_ijin` varchar(100) NOT NULL,
  `hotel_ket` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hotel`
--

INSERT INTO `tbl_hotel` (`hotel_id`, `hotel_nama`, `hotel_kel`, `hotel_alamat`, `hotel_pemilik`, `hotel_kontak`, `hotel_ijin`, `hotel_ket`) VALUES
(1, 'Palma', 'Libuo', 'Jalan Palma', 'Arifin Ali', '085240021410', 'Lengkap', '10 Kamar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_huangobotu`
--

CREATE TABLE `tbl_huangobotu` (
  `huangobotu_id` int(11) NOT NULL,
  `huangobotu_judul` varchar(100) NOT NULL,
  `huangobotu_isi` text NOT NULL,
  `huangobotu_gambar` varchar(5000) NOT NULL,
  `huangobotu_alamat` varchar(100) NOT NULL,
  `huangobotu_hp` varchar(100) NOT NULL,
  `huangobotu_lurah` varchar(100) NOT NULL,
  `huangobotu_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_huangobotu`
--

INSERT INTO `tbl_huangobotu` (`huangobotu_id`, `huangobotu_judul`, `huangobotu_isi`, `huangobotu_gambar`, `huangobotu_alamat`, `huangobotu_hp`, `huangobotu_lurah`, `huangobotu_ket`) VALUES
(9, 'Kelurahan Huangobotu', '<p>1. Profil Singkat<br />\r\nKelurahan Huangobotu terletak di wilayah kecamatan Dungingi dnegan jumlah penduduk&nbsp;</p>\r\n\r\n<p>2. Batas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Utara&nbsp;: Kelurahan Tomulabutao Selatan</li>\r\n	<li>Selatan : Kelurahan Buladu dan Tuladenggi</li>\r\n	<li>Timur : Kelurahan Dulalowo dan Wumialo</li>\r\n	<li>Barat : Sungai Bolango, Kabupaten Gorontalo</li>\r\n</ul>\r\n\r\n<p>3. Luas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Luas Kelurahan Huangobotu 1,23 KM&sup2;</li>\r\n</ul>\r\n', 'c1166b598de85bc474fdc9e0ddb29472.jpg', 'Jalan Apel II', '0852123456', 'Sukamto Mooduto', 'Ibukota Kecamatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ijin`
--

CREATE TABLE `tbl_ijin` (
  `ijin_id` int(11) NOT NULL,
  `ijin_judul` varchar(100) NOT NULL,
  `ijin_tanggal` date NOT NULL,
  `ijin_isi` text NOT NULL,
  `ijin_gambar` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ijin`
--

INSERT INTO `tbl_ijin` (`ijin_id`, `ijin_judul`, `ijin_tanggal`, `ijin_isi`, `ijin_gambar`) VALUES
(4, 'Ijin Usaha Mikro Kecil (IUMK)', '0000-00-00', '<p>1. Persyaratan IUMK :</p>\r\n\r\n<ul>\r\n	<li>FC KTP&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</li>\r\n	<li>SKU kelurahan</li>\r\n	<li>Pas Photo 4X6 Warna</li>\r\n	<li>Mengisi Formulir</li>\r\n	<li>Bukti Pelunasan PBB&nbsp;&nbsp; &nbsp;</li>\r\n</ul>\r\n\r\n<p>3. SOP</p>\r\n\r\n<ul>\r\n	<li>Masyarakat meyiapkan dokumen persyaratan termasuk pengantar RT RW dan Pelunasan PBB</li>\r\n	<li>Masyarakat mendatangani kantor kelurahan sesuai domisili</li>\r\n	<li>kelurahan Akan memberikan pengantar KTP</li>\r\n	<li>Setelah mendapatkan pengantar KTP masyarakat mendatangi kantor kecamatan untuk melakukan perekaman</li>\r\n	<li>atau bisa langsung menuju ke dinas catatan sipil</li>\r\n</ul>\r\n\r\n<p>4. Biaya</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><big><tt>GRATIS</tt></big></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>5. Waktu</p>\r\n\r\n<ul>\r\n	<li>1 X 24 Jam Setelah Verifikasi lapangan oleh petugas</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 'd42ed33e0876c77d26e4b477fd73b4e7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_pesan` text,
  `inbox_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox_status` int(11) DEFAULT '1' COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`inbox_id`, `inbox_nama`, `inbox_email`, `inbox_kontak`, `inbox_pesan`, `inbox_tanggal`, `inbox_status`) VALUES
(10, 'Ramli A Taliki', 'ramliagustiawan@gmail.com', '085240021410', 'IUMK', '2019-01-30 23:59:13', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(30) DEFAULT NULL,
  `kategori_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`, `kategori_tanggal`) VALUES
(1, 'Pelayanan Publik', '2016-09-06 05:49:04'),
(2, 'Pemerintahan', '2016-09-06 05:50:01'),
(3, 'Ekonomi Pembangunan', '2016-09-06 05:59:39'),
(5, 'Pemberdayaan Masyarakat', '2016-09-06 06:19:26'),
(6, 'Ketentraman Dan Ketertiban', '2016-09-07 02:51:09'),
(15, 'Kepemudaan', '2019-03-31 06:21:59'),
(16, 'Kepegawaian', '2019-03-31 06:22:09'),
(21, 'Umum', '2019-04-14 06:57:56'),
(19, 'Keagamaan', '2019-03-31 06:30:58'),
(20, 'Adat Istiadat', '2019-03-31 06:31:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`kelas_id`, `kelas_nama`) VALUES
(1, 'Lurah Tomulabutao Selatan'),
(2, 'Lurah Huangobotu'),
(3, 'Lurah Tuladenggi'),
(4, 'Libuo'),
(5, 'Lurah Tomulabutao'),
(6, 'Seklur Huangobotu'),
(7, 'Seklur Libuo'),
(8, 'Seklur Tuladenggi'),
(9, 'Seklur Tomulabutao'),
(10, 'Seklur Tomulabutao Selatan'),
(11, 'Kasie Pem & Trantib Huangobotu'),
(12, 'Kasie Pem & Trantib Libuo'),
(13, 'Kasie Pem & Trantib Tuladenggi'),
(14, 'Kasie Pem & Trantib Tomulabutao'),
(15, 'Kasie Pem & Trantib Tomsel'),
(27, 'Kasie PMK Libuo'),
(18, 'Staf ASN'),
(19, 'Bendahara'),
(20, 'TPKD'),
(21, 'Kasie Ekbang Huangobotu'),
(26, 'Kasie PMK Huangobotu'),
(22, 'Kasie Ekbang Libuo'),
(23, 'Kasie Ekbang Tuladenggi'),
(24, 'Kasie Ekbang Tomulabutao'),
(25, 'Kasie Ekbang Selatan'),
(28, 'Kasie PMK Tuladenggi'),
(29, 'Kasie PMK Tomulabutao'),
(30, 'Kasie PMK Tomulabutao Selatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelurahan`
--

CREATE TABLE `tbl_kelurahan` (
  `kelurahan_id` int(11) NOT NULL,
  `kelurahan_nama` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelurahan`
--

INSERT INTO `tbl_kelurahan` (`kelurahan_id`, `kelurahan_nama`) VALUES
(1, 'Huangobotu'),
(2, 'Libuo'),
(3, 'Tuladenggi'),
(4, 'Tomulabutao'),
(5, 'Tomulabutao Selatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kesra`
--

CREATE TABLE `tbl_kesra` (
  `kesra_id` int(11) NOT NULL,
  `kesra_judul` varchar(60) NOT NULL,
  `kesra_datakesra_id` int(11) DEFAULT NULL,
  `kesra_hbt` int(11) NOT NULL,
  `kesra_lib` int(11) NOT NULL,
  `kesra_tld` int(11) NOT NULL,
  `kesra_tom` int(11) NOT NULL,
  `kesra_tomsel` int(11) NOT NULL,
  `kesra_total` int(11) NOT NULL,
  `kesra_pengguna_id` int(11) NOT NULL,
  `kesra_author` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kesra`
--

INSERT INTO `tbl_kesra` (`kesra_id`, `kesra_judul`, `kesra_datakesra_id`, `kesra_hbt`, `kesra_lib`, `kesra_tld`, `kesra_tom`, `kesra_tomsel`, `kesra_total`, `kesra_pengguna_id`, `kesra_author`) VALUES
(27, 'Masuk', 13, 2, 2, 2, 2, 2, 10, 6, 'Afdhal Dzikri'),
(29, 'Layang', 12, 1, 1, 1, 1, 1, 111, 6, 'Afdhal Dzikri'),
(30, 'Gantung', 12, 1, 1, 0, 1, 0, 5, 6, 'Afdhal Dzikri'),
(31, 'Masuk', 11, 5, 5, 5, 5, 5, 25, 6, 'Afdhal Dzikri'),
(32, 'asn', 13, 1, 1, 1, 1, 1, 0, 6, 'Afdhal Dzikri'),
(33, 'Kelurahan', 15, 3, 3, 3, 3, 3, 15, 6, 'Afdhal Dzikri'),
(34, 'Kelurahan', 15, 16, 5, 6, 9, 11, 0, 9, 'Ramli Taliki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `komentar_id` int(11) NOT NULL,
  `komentar_nama` varchar(30) DEFAULT NULL,
  `komentar_email` varchar(50) DEFAULT NULL,
  `komentar_isi` varchar(120) DEFAULT NULL,
  `komentar_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `komentar_status` varchar(2) DEFAULT NULL,
  `komentar_tulisan_id` int(11) DEFAULT NULL,
  `komentar_parent` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`komentar_id`, `komentar_nama`, `komentar_email`, `komentar_isi`, `komentar_tanggal`, `komentar_status`, `komentar_tulisan_id`, `komentar_parent`) VALUES
(1, 'M Fikri', 'fikrifiver97@gmail.com', ' Nice Post.', '2018-08-07 15:09:07', '1', 24, 0),
(2, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', ' Awesome Post', '2018-08-07 15:14:26', '1', 24, 0),
(3, 'Joko', 'joko@gmail.com', 'Thank you.', '2018-08-08 03:54:56', '1', 24, 1),
(9, 'user', 'user@gmail.com', ' Kegiatan yang bagus dan perlu digalakkan bravo pemkec dungingi', '2019-03-31 06:38:22', '1', 25, 0),
(11, 'Ramli Taliki', '', 'siap', '2019-04-14 08:03:48', '1', 25, 9),
(12, 'Ramli Agustiawan Taliki, S.STP', 'ramliagustiawan@gmail.com', ' tes', '2019-04-15 04:57:12', '1', 30, 0),
(13, 'Ramli Taliki', '', 'oke', '2019-04-15 04:57:42', '1', 30, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lapen`
--

CREATE TABLE `tbl_lapen` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` int(11) NOT NULL,
  `kelurahan` varchar(128) NOT NULL,
  `lawal` int(11) NOT NULL,
  `pawal` int(11) NOT NULL,
  `lpawal` int(11) NOT NULL,
  `llahir` int(11) NOT NULL,
  `plahir` int(11) NOT NULL,
  `lplahir` int(11) NOT NULL,
  `lmati` int(11) NOT NULL,
  `pmati` int(11) NOT NULL,
  `lpmati` int(11) NOT NULL,
  `ldatang` int(11) NOT NULL,
  `pdatang` int(11) NOT NULL,
  `lpdatang` int(11) NOT NULL,
  `lpergi` int(11) NOT NULL,
  `ppergi` int(11) NOT NULL,
  `lppergi` int(11) NOT NULL,
  `lakhir` int(11) NOT NULL,
  `pakhir` int(11) NOT NULL,
  `lpakhir` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lapen`
--

INSERT INTO `tbl_lapen` (`id`, `tanggal`, `bulan`, `kelurahan`, `lawal`, `pawal`, `lpawal`, `llahir`, `plahir`, `lplahir`, `lmati`, `pmati`, `lpmati`, `ldatang`, `pdatang`, `lpdatang`, `lpergi`, `ppergi`, `lppergi`, `lakhir`, `pakhir`, `lpakhir`) VALUES
(13, '2019-01-31', 1, 'Tomulabutao', 1169, 1731, 0, 0, 0, 0, 2, 1, 0, 6, 4, 0, 2, 1, 0, 0, 0, 0),
(10, '2019-01-31', 1, 'Huangobotu', 4009, 4168, 0, 1, 0, 0, 5, 0, 0, 16, 16, 0, 6, 12, 0, 0, 0, 0),
(11, '2019-01-31', 1, 'Libuo', 2856, 2832, 0, 0, 0, 0, 2, 1, 0, 12, 11, 0, 11, 6, 0, 0, 0, 0),
(12, '2019-01-31', 1, 'Tuladenggi', 1452, 1538, 0, 4, 2, 0, 1, 2, 0, 9, 9, 0, 2, 3, 0, 0, 0, 0),
(14, '2019-01-31', 1, 'Tomulabutao Selatan', 1967, 1960, 0, 1, 3, 0, 2, 4, 0, 3, 4, 0, 5, 8, 0, 0, 0, 0),
(15, '2019-02-28', 2, 'Huangobotu', 4015, 4172, 0, 2, 2, 0, 1, 1, 0, 1, 2, 0, 2, 3, 0, 0, 0, 0),
(16, '2019-02-28', 2, 'Libuo', 2855, 2836, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_layanan`
--

CREATE TABLE `tbl_layanan` (
  `layanan_id` int(11) NOT NULL,
  `layanan_judul` varchar(50) NOT NULL,
  `layanan_pemohon` varchar(50) NOT NULL,
  `layanan_tanggal` date NOT NULL,
  `layanan_kelurahan_id` int(11) NOT NULL,
  `layanan_ket` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_layanan`
--

INSERT INTO `tbl_layanan` (`layanan_id`, `layanan_judul`, `layanan_pemohon`, `layanan_tanggal`, `layanan_kelurahan_id`, `layanan_ket`) VALUES
(7, 'Kelurahan Tuladenggi', 'Abas', '2019-04-03', 3, 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_libuo`
--

CREATE TABLE `tbl_libuo` (
  `libuo_id` int(11) NOT NULL,
  `libuo_judul` varchar(100) NOT NULL,
  `libuo_isi` text NOT NULL,
  `libuo_gambar` varchar(5000) NOT NULL,
  `libuo_alamat` varchar(100) NOT NULL,
  `libuo_hp` varchar(100) NOT NULL,
  `libuo_lurah` varchar(100) NOT NULL,
  `libuo_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_libuo`
--

INSERT INTO `tbl_libuo` (`libuo_id`, `libuo_judul`, `libuo_isi`, `libuo_gambar`, `libuo_alamat`, `libuo_hp`, `libuo_lurah`, `libuo_ket`) VALUES
(3, 'Kelurahan Libuo', '<p>1. Profil Singkat<br />\r\nKelurahan Huangobotu terletak di wilayah kecamatan Dungingi dnegan jumlah penduduk&nbsp;</p>\r\n\r\n<p>2. Batas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Utara&nbsp;: Kelurahan Tomulabutao Selatan</li>\r\n	<li>Selatan : Kelurahan Buladu dan Tuladenggi</li>\r\n	<li>Timur : Kelurahan Dulalowo dan Wumialo</li>\r\n	<li>Barat : Sungai Bolango, Kabupaten Gorontalo</li>\r\n</ul>\r\n\r\n<p>3. Luas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Luas Kelurahan Huangobotu 1,23 KM&sup2;<br />\r\n	&nbsp;</li>\r\n</ul>\r\n', '57c19cc4f4bb3b08298ebc62b52cd6ae.jpg', 'Jalan Duku', '0852123456', 'Hi. Arifin Ali', 'Kelurahan Libuo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_aktivitas`
--

CREATE TABLE `tbl_log_aktivitas` (
  `log_id` int(11) NOT NULL,
  `log_nama` text,
  `log_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `log_ip` varchar(20) DEFAULT NULL,
  `log_pengguna_id` int(11) DEFAULT NULL,
  `log_icon` blob,
  `log_jenis_icon` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lpm`
--

CREATE TABLE `tbl_lpm` (
  `lpm_id` int(11) NOT NULL,
  `lpm_nama` varchar(100) NOT NULL,
  `lpm_ketua` varchar(100) NOT NULL,
  `lpm_alamat` varchar(100) NOT NULL,
  `lpm_telepon` varchar(100) NOT NULL,
  `lpm_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lpm`
--

INSERT INTO `tbl_lpm` (`lpm_id`, `lpm_nama`, `lpm_ketua`, `lpm_alamat`, `lpm_telepon`, `lpm_ket`) VALUES
(1, 'LPM Dungingi', 'Risman Taha, SE', 'Kecamatan Dungingi', '085240021410', 'DPC LPM'),
(4, 'Karang Taruna', 'Aton Malik', 'Kecamatan Dungingi', '04358526697', 'Tomulabutao Selatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nonijin`
--

CREATE TABLE `tbl_nonijin` (
  `nonijin_id` int(11) NOT NULL,
  `nonijin_judul` varchar(100) NOT NULL,
  `nonijin_isi` text NOT NULL,
  `nonijin_ket` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nonijin`
--

INSERT INTO `tbl_nonijin` (`nonijin_id`, `nonijin_judul`, `nonijin_isi`, `nonijin_ket`) VALUES
(8, 'KTP', '<p>Prosedur Pembuatan Kartu Tanda Penduduk (KTP)</p>\r\n\r\n<p>1. Pendaftaran KTP Baru Untuk Usia 17 Tahun</p>\r\n\r\n<ul>\r\n	<li>Surat Pengantar dari Ketua RT / RW Setempat</li>\r\n	<li>Bukti Pelunasan PBB</li>\r\n	<li>Surat Pengantar Dari Kelurahan Setempat</li>\r\n	<li>Pengesahan / Mengetahui Kecamatan</li>\r\n	<li>Melakukan Pendadftaran dan Perekaman Data di Pos Pelayanan DISPENDUKCAPIL Kecamatan Setempat</li>\r\n</ul>\r\n\r\n<p>2. Pendaftaran KTP Dari Luar Kota</p>\r\n\r\n<ul>\r\n	<li>Surat Pengantar dari Ketua RT / RW Setempat Dengan Menunjukan Bukti Surat Pindah Dari Kota Asal</li>\r\n	<li>Surat Pengantar Dari Kelurahan Setempat</li>\r\n	<li>Bukti Pelunasan PBB</li>\r\n	<li>Pengesahan / Mengetahui Kecamatan</li>\r\n	<li>Melakukan Pendaftaran KTP Dengan Menunjukan KTP Asli Dari Daerah Asal.</li>\r\n	<li>Sumber : Dispendu Capil Kota Semarang</li>\r\n</ul>\r\n\r\n<p>3. Prosedur / SOP</p>\r\n\r\n<ul>\r\n	<li>Masyarakat meyiapkan dokumen persyaratan termasuk pengantar RT RW dan Pelunasan PBB</li>\r\n	<li>Masyarakat mendatangani kantor kelurahan sesuai domisili</li>\r\n	<li>kelurahan Akan memberikan pengantar KTP</li>\r\n	<li>Setelah mendapatkan pengantar KTP masyarakat mendatangi kantor kecamatan untuk melakukan perekaman</li>\r\n	<li>atau bisa langsung menuju ke dinas catatan sipil</li>\r\n</ul>\r\n\r\n<p>4. Biaya</p>\r\n\r\n<ul>\r\n	<li><strong><span class=\"marker\">GRATIS</span></strong></li>\r\n</ul>\r\n\r\n<p>5. Waktu</p>\r\n\r\n<ul>\r\n	<li>15 Menit Setelah berkas dinyatakan lengkap<br />\r\n	&nbsp;</li>\r\n</ul>\r\n', 'Sumber DKCS Kota Gorontalo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nopen`
--

CREATE TABLE `tbl_nopen` (
  `nopen_id` int(11) NOT NULL,
  `nopen_user` varchar(10000) NOT NULL,
  `nopen_hp` varchar(100) NOT NULL,
  `nopen_ket` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nopen`
--

INSERT INTO `tbl_nopen` (`nopen_id`, `nopen_user`, `nopen_hp`, `nopen_ket`) VALUES
(14, 'Sriyanti Ano, SP, M.Si', '085240021410', 'Camat'),
(15, 'Ramli Taliki, SSTP', '085240021410', 'Sekretaris Kecamatan'),
(16, 'pemadam kebakaran ', '0852123456', 'damkar'),
(18, 'damkar', '0852123456', 'damkar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_online`
--

CREATE TABLE `tbl_online` (
  `id` int(11) NOT NULL,
  `id_session` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pbb`
--

CREATE TABLE `tbl_pbb` (
  `pbb_id` int(11) NOT NULL,
  `pbb_kode` int(100) NOT NULL,
  `pbb_kelurahan` varchar(100) NOT NULL,
  `pbb_target` int(255) NOT NULL,
  `pbb_realisasi` int(255) NOT NULL,
  `pbb_denda` int(255) NOT NULL,
  `pbb_total` int(255) NOT NULL,
  `pbb_persen` int(100) NOT NULL,
  `pbb_tanggal` date NOT NULL,
  `pbb_rank` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pbb`
--

INSERT INTO `tbl_pbb` (`pbb_id`, `pbb_kode`, `pbb_kelurahan`, `pbb_target`, `pbb_realisasi`, `pbb_denda`, `pbb_total`, `pbb_persen`, `pbb_tanggal`, `pbb_rank`) VALUES
(6, 1, 'Huangobotu', 100000, 50000, 5000, 55000, 55, '2019-03-14', 12),
(7, 4, 'Huangobotu', 100000, 50000, 5000, 123, 12, '2019-03-14', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pem`
--

CREATE TABLE `tbl_pem` (
  `pem_id` int(11) NOT NULL,
  `pem_judul` varchar(60) NOT NULL,
  `pem_datapem_id` int(11) DEFAULT NULL,
  `pem_hbt` int(11) NOT NULL,
  `pem_lib` int(11) NOT NULL,
  `pem_tld` int(11) NOT NULL,
  `pem_tom` int(11) NOT NULL,
  `pem_tomsel` int(11) NOT NULL,
  `pem_total` int(11) NOT NULL,
  `pem_pengguna_id` int(11) NOT NULL,
  `pem_author` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pem`
--

INSERT INTO `tbl_pem` (`pem_id`, `pem_judul`, `pem_datapem_id`, `pem_hbt`, `pem_lib`, `pem_tld`, `pem_tom`, `pem_tomsel`, `pem_total`, `pem_pengguna_id`, `pem_author`) VALUES
(27, 'pemerintahan', 12, 2, 2, 2, 2, 2, 1000, 6, 'Afdhal Dzikri'),
(29, 'Layang', 12, 1, 1, 1, 1, 1, 111, 6, 'Afdhal Dzikri'),
(33, 'Laki Laki', 15, 100, 100, 100, 100, 100, 500, 6, 'Afdhal Dzikri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `id` int(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(100) NOT NULL,
  `gdr` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `stts` varchar(100) NOT NULL,
  `shdk` varchar(100) NOT NULL,
  `shdrt` int(100) NOT NULL,
  `pddk_akhir` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `no_kk` int(100) NOT NULL,
  `nama_kk` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `no_kota` int(100) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `nama_kec` varchar(100) NOT NULL,
  `no_kel` int(100) NOT NULL,
  `nama_kel` varchar(100) NOT NULL,
  `rw` int(10) NOT NULL,
  `rt` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_moto` varchar(100) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_tentang` text,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(20) DEFAULT NULL,
  `pengguna_facebook` varchar(35) DEFAULT NULL,
  `pengguna_twitter` varchar(35) DEFAULT NULL,
  `pengguna_linkdin` varchar(35) DEFAULT NULL,
  `pengguna_google_plus` varchar(35) DEFAULT NULL,
  `pengguna_status` int(2) DEFAULT '1',
  `pengguna_level` varchar(3) DEFAULT NULL,
  `pengguna_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_photo` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_moto`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_tentang`, `pengguna_email`, `pengguna_nohp`, `pengguna_facebook`, `pengguna_twitter`, `pengguna_linkdin`, `pengguna_google_plus`, `pengguna_status`, `pengguna_level`, `pengguna_register`, `pengguna_photo`) VALUES
(11, 'Admin Kecamatan Dungingi', NULL, 'L', 'adminkecamatan', '25f9e794323b453885f5181f1b624d0b', NULL, 'dungingioffice@gmail.com', '04358526697', NULL, NULL, NULL, NULL, 1, '2', '2019-04-08 00:59:26', '25c8ce47340ce047b2b68eb9bbb84dd8.png'),
(9, 'Ramli Taliki', NULL, 'L', 'ramli', '5fd708837396ac710ec20c81c41653a1', NULL, 'ramliagustiawan@yahoo.com', '085240021410', NULL, NULL, NULL, NULL, 1, '1', '2019-03-31 06:34:06', '27785bbdffa077167836965ce8758e77.jpg'),
(12, 'Kepala Seksi', NULL, 'L', 'database', '25f9e794323b453885f5181f1b624d0b', NULL, 'dungingioffice@gmail.com', '04358526697', NULL, NULL, NULL, NULL, 1, '3', '2019-04-14 00:09:32', '1276d4a878677e9eaeee0da9b7f6cc33.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `pengumuman_judul` varchar(150) DEFAULT NULL,
  `pengumuman_deskripsi` text,
  `pengumuman_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengumuman_author` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`pengumuman_id`, `pengumuman_judul`, `pengumuman_deskripsi`, `pengumuman_tanggal`, `pengumuman_author`) VALUES
(5, 'Pengumuman ', 'di', '2019-01-31 03:07:23', 'Ramli Taliki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL,
  `hits` int(11) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`pengunjung_id`, `pengunjung_tanggal`, `pengunjung_ip`, `pengunjung_perangkat`, `hits`, `online`) VALUES
(930, '2018-08-09 08:04:59', '::1', 'Chrome', 0, '0'),
(931, '2019-01-30 09:44:48', '::1', 'Chrome', 0, '0'),
(932, '2019-01-30 23:54:57', '::1', 'Chrome', 0, '0'),
(933, '2019-02-01 02:09:53', '::1', 'Chrome', 0, '0'),
(934, '2019-02-01 02:09:53', '::1', 'Chrome', 0, '0'),
(935, '2019-02-02 00:54:50', '::1', 'Chrome', 0, '0'),
(936, '2019-02-03 05:27:31', '::1', 'Chrome', 0, '0'),
(937, '2019-02-03 05:27:31', '::1', 'Chrome', 0, '0'),
(938, '2019-02-05 01:35:27', '::1', 'Chrome', 0, '0'),
(939, '2019-02-06 02:40:41', '::1', 'Chrome', 0, '0'),
(940, '2019-02-07 00:35:33', '::1', 'Chrome', 0, '0'),
(941, '2019-02-07 00:35:33', '::1', 'Chrome', 0, '0'),
(942, '2019-02-09 12:06:48', '::1', 'Chrome', 0, '0'),
(943, '2019-02-09 22:40:32', '::1', 'Chrome', 0, '0'),
(944, '2019-02-09 22:40:32', '::1', 'Chrome', 0, '0'),
(945, '2019-02-14 01:27:17', '::1', 'Chrome', 0, '0'),
(946, '2019-02-15 22:46:00', '::1', 'Chrome', 0, '0'),
(947, '2019-02-15 22:46:00', '::1', 'Chrome', 0, '0'),
(948, '2019-02-17 03:51:26', '::1', 'Chrome', 0, '0'),
(949, '2019-02-25 04:57:46', '::1', 'Chrome', 0, '0'),
(950, '2019-02-26 00:44:22', '::1', 'Chrome', 0, '0'),
(951, '2019-02-26 00:44:22', '::1', 'Chrome', 0, '0'),
(952, '2019-02-27 04:59:56', '::1', 'Chrome', 0, '0'),
(953, '2019-02-27 04:59:56', '::1', 'Chrome', 0, '0'),
(954, '2019-02-28 04:50:15', '::1', 'Chrome', 0, '0'),
(955, '2019-03-03 23:59:49', '::1', 'Chrome', 0, '0'),
(956, '2019-03-05 05:27:32', '::1', 'Chrome', 0, '0'),
(957, '2019-03-11 08:44:52', '::1', 'Chrome', 0, '0'),
(958, '2019-03-12 08:36:39', '::1', 'Firefox', 0, '0'),
(959, '2019-03-12 23:23:34', '::1', 'Firefox', 0, '0'),
(960, '2019-03-14 01:00:27', '::1', 'Chrome', 0, '0'),
(961, '2019-03-15 01:19:43', '::1', 'Chrome', 0, '0'),
(962, '2019-03-15 01:19:43', '::1', 'Chrome', 0, '0'),
(963, '2019-03-15 23:13:50', '::1', 'Firefox', 0, '0'),
(964, '2019-03-16 22:56:56', '::1', 'Firefox', 0, '0'),
(965, '2019-03-20 08:44:01', '::1', 'Chrome', 0, '0'),
(966, '2019-03-21 09:38:17', '::1', 'Opera', 0, '0'),
(967, '2019-03-22 22:33:54', '::1', 'Firefox', 0, '0'),
(968, '2019-03-22 22:33:54', '::1', 'Firefox', 0, '0'),
(969, '2019-03-23 22:19:32', '::1', 'Firefox', 0, '0'),
(970, '2019-03-24 21:49:33', '::1', 'Chrome', 0, '0'),
(971, '2019-03-26 02:34:01', '::1', 'Chrome', 0, '0'),
(972, '2019-03-26 02:34:01', '::1', 'Chrome', 0, '0'),
(973, '2019-03-27 00:58:39', '::1', 'Chrome', 0, '0'),
(974, '2019-03-27 00:58:39', '::1', 'Chrome', 0, '0'),
(975, '2019-03-28 08:20:26', '::1', 'Firefox', 0, '0'),
(976, '2019-03-28 22:09:46', '::1', 'Chrome', 0, '0'),
(977, '2019-03-29 23:08:29', '::1', 'Firefox', 0, '0'),
(978, '2019-03-30 22:20:05', '::1', 'Firefox', 0, '0'),
(979, '2019-04-01 00:45:14', '::1', 'Chrome', 0, '0'),
(980, '2019-04-02 01:21:31', '::1', 'Chrome', 0, '0'),
(981, '2019-04-02 23:16:14', '::1', 'Chrome', 0, '0'),
(982, '2019-04-07 12:59:44', '36.75.142.45', 'Chrome', 0, '0'),
(983, '2019-04-08 00:04:54', '36.84.49.157', 'Chrome', 0, '0'),
(984, '2019-04-08 05:11:32', '36.84.49.157', 'Chrome', 0, '0'),
(985, '2019-04-08 12:02:57', '36.75.142.45', 'Chrome', 0, '0'),
(986, '2019-04-08 12:02:57', '36.75.142.45', 'Chrome', 0, '0'),
(987, '2019-04-08 21:56:47', '195.181.168.56', 'Chrome', 0, '0'),
(988, '2019-04-09 00:29:06', '180.249.200.87', 'Chrome', 0, '0'),
(989, '2019-04-09 04:42:36', '36.75.142.45', 'Chrome', 0, '0'),
(990, '2019-04-09 04:42:36', '36.75.142.45', 'Chrome', 0, '0'),
(991, '2019-04-09 06:52:12', '36.84.49.157', 'Chrome', 0, '0'),
(992, '2019-04-10 01:08:49', '36.84.49.9', 'Chrome', 0, '0'),
(993, '2019-04-10 04:52:45', '36.75.142.45', 'Firefox', 0, '0'),
(994, '2019-04-10 06:40:53', '36.84.49.9', 'Chrome', 0, '0'),
(995, '2019-04-10 07:00:56', '64.233.173.139', 'Chrome', 0, '0'),
(996, '2019-04-10 07:02:44', '64.233.173.137', 'Chrome', 0, '0'),
(997, '2019-04-10 07:03:03', '64.233.173.138', 'Chrome', 0, '0'),
(998, '2019-04-11 00:11:16', '36.84.49.154', 'Chrome', 0, '0'),
(999, '2019-04-11 04:50:14', '36.75.142.45', 'Chrome', 0, '0'),
(1000, '2019-04-11 07:19:05', '36.84.49.154', 'Chrome', 0, '0'),
(1001, '2019-04-11 08:41:21', '::1', 'Firefox', 0, '0'),
(1002, '2019-04-11 22:23:37', '::1', 'Chrome', 0, '0'),
(1003, '2019-04-12 21:55:53', '::1', 'Firefox', 0, '0'),
(1004, '2019-04-13 23:09:04', '::1', 'Firefox', 0, '0'),
(1005, '2019-04-14 21:38:46', '::1', 'Firefox', 0, '0'),
(1006, '2019-04-15 22:29:51', '::1', 'Chrome', 0, '0'),
(1007, '2019-04-15 22:29:51', '::1', 'Chrome', 0, '0'),
(1008, '2019-04-16 22:53:09', '::1', 'Chrome', 0, '0'),
(1009, '2019-04-17 21:25:03', '::1', 'Chrome', 0, '0'),
(1010, '2019-04-18 22:45:20', '::1', 'Firefox', 0, '0'),
(1011, '2019-04-19 21:41:41', '::1', 'Chrome', 0, '0'),
(1012, '2019-04-20 22:23:27', '::1', 'Firefox', 0, '0'),
(1013, '2019-04-21 21:35:09', '::1', 'Chrome', 0, '0'),
(1014, '2019-04-21 21:35:09', '::1', 'Chrome', 0, '0'),
(1015, '2019-04-22 21:18:09', '::1', 'Chrome', 0, '0'),
(1016, '2019-04-23 16:00:20', '::1', 'Chrome', 0, '0'),
(1017, '2019-04-24 22:08:04', '::1', 'Chrome', 0, '0'),
(1018, '2019-04-25 23:40:58', '::1', 'Firefox', 1, ''),
(1019, '2019-04-28 23:14:21', '::1', 'Chrome', 1, ''),
(1020, '2019-05-03 12:51:03', '::1', 'Chrome', 1, ''),
(1021, '2019-05-03 22:14:03', '::1', 'Chrome', 1, ''),
(1022, '2019-05-05 00:51:35', '::1', 'Chrome', 1, ''),
(1023, '2019-05-08 00:44:01', '::1', 'Chrome', 1, ''),
(1024, '2019-07-15 14:15:02', '::1', 'Chrome', 1, ''),
(1025, '2019-08-11 12:50:58', '::1', 'Chrome', 1, ''),
(1026, '2019-08-17 13:22:23', '::1', 'Firefox', 1, ''),
(1027, '2019-08-18 06:48:33', '::1', 'Chrome', 1, ''),
(1028, '2019-09-19 08:34:26', '::1', 'Chrome', 1, ''),
(1029, '2019-09-20 23:54:04', '::1', 'Chrome', 1, ''),
(1030, '2019-09-22 02:45:04', '::1', 'Chrome', 1, ''),
(1031, '2019-09-23 02:50:22', '::1', 'Chrome', 1, ''),
(1032, '2019-10-02 01:31:01', '::1', 'Chrome', 1, ''),
(1033, '2019-10-10 01:47:55', '::1', 'Chrome', 1, ''),
(1034, '2019-10-11 01:30:16', '::1', 'Chrome', 1, ''),
(1035, '2019-10-21 00:41:58', '::1', 'Chrome', 1, ''),
(1036, '2019-11-28 02:50:35', '::1', 'Chrome', 1, ''),
(1037, '2019-12-03 21:13:22', '::1', 'Chrome', 1, ''),
(1038, '2019-12-05 00:45:49', '::1', 'Chrome', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perum`
--

CREATE TABLE `tbl_perum` (
  `perum_id` int(11) NOT NULL,
  `perum_nama` varchar(100) NOT NULL,
  `perum_kelurahan` varchar(100) NOT NULL,
  `perum_tahun` varchar(100) NOT NULL,
  `perum_alamat` varchar(100) NOT NULL,
  `perum_developer` varchar(100) NOT NULL,
  `perum_jumlah` int(11) NOT NULL,
  `perum_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_perum`
--

INSERT INTO `tbl_perum` (`perum_id`, `perum_nama`, `perum_kelurahan`, `perum_tahun`, `perum_alamat`, `perum_developer`, `perum_jumlah`, `perum_ket`) VALUES
(1, 'Asparaga', 'Huangobotu', '1997', 'Kelurahan Huangobotu RW 4 RT 01', 'PT. Asparaga', 500, '2000 KK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peta`
--

CREATE TABLE `tbl_peta` (
  `peta_id` int(11) NOT NULL,
  `peta_judul` varchar(100) NOT NULL,
  `peta_tanggal` date NOT NULL,
  `peta_isi` text NOT NULL,
  `peta_gambar` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peta`
--

INSERT INTO `tbl_peta` (`peta_id`, `peta_judul`, `peta_tanggal`, `peta_isi`, `peta_gambar`) VALUES
(4, 'Peta Kecamatan Dungingi', '2019-04-21', '<p>Sumber : Google Maps</p>\r\n', '39b486402035784cc6d5e12cdbe34dfa.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poll`
--

CREATE TABLE `tbl_poll` (
  `id` int(11) NOT NULL,
  `Sbaik` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `cukup` int(11) NOT NULL,
  `kurang` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_poll`
--

INSERT INTO `tbl_poll` (`id`, `Sbaik`, `baik`, `cukup`, `kurang`) VALUES
(3, 0, 1, 0, 0),
(4, 0, 0, 0, 1),
(5, 1, 0, 0, 0),
(6, 1, 0, 0, 0),
(7, 1, 0, 0, 0),
(8, 0, 0, 0, 0),
(9, 0, 0, 1, 0),
(10, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_potensi`
--

CREATE TABLE `tbl_potensi` (
  `potensi_id` int(11) NOT NULL,
  `potensi_kelurahan_id` int(11) NOT NULL,
  `potensi_judul` varchar(50) NOT NULL,
  `potensi_gambar` varchar(5000) NOT NULL,
  `potensi_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_potensi`
--

INSERT INTO `tbl_potensi` (`potensi_id`, `potensi_kelurahan_id`, `potensi_judul`, `potensi_gambar`, `potensi_ket`) VALUES
(4, 3, 'Kebun Jagung', '46efdc0ded8da72f004021a62d67e1da.jpg', 'Jalan Beringin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sejarah`
--

CREATE TABLE `tbl_sejarah` (
  `sejarah_id` int(11) NOT NULL,
  `sejarah_judul` varchar(100) NOT NULL,
  `sejarah_tanggal` date NOT NULL,
  `sejarah_isi` text NOT NULL,
  `sejarah_gambar` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sejarah`
--

INSERT INTO `tbl_sejarah` (`sejarah_id`, `sejarah_judul`, `sejarah_tanggal`, `sejarah_isi`, `sejarah_gambar`) VALUES
(5, 'Sejarah Kecamatan Dungingi', '0000-00-00', '<p>Menurut sejarah, Jazirah Gorontalo terbentuk kurang lebih 400 tahun lalu dan merupakan salah satu kota tua di Sulawesi selain Kota Makassar, Pare-pare dan Manado. Gorontalo pada saat itu menjadi salah satu pusat penyebaran agama Islam di Indonesia Timur yaitu dari Ternate, Gorontalo, Bone. Seiring dengan penyebaran agama tersebut Gorontalo menjadi pusat pendidikan dan perdagangan masyarakat di wilayah sekitar seperti Bolaang Mongondow (Sulut), Buol Toli-Toli, Luwuk Banggai, Donggala (Sulteng) bahkan sampai ke Sulawesi Tenggara.Gorontalo menjadi pusat pendidikan dan perdagangan karena letaknya yang strategis menghadap Teluk Tomini (bagian selatan) dan Laut Sulawesi (bagian utara).</p>\r\n\r\n<p>Kedudukan Kota Kerajaan Gorontalo mulanya berada di Kelurahan Hulawa Kecamatan Telaga sekarang, tepatnya di pinggiran sungai Bolango. Menurut Penelitian, pada tahun 1024 H, kota Kerajaan ini dipindahkan dari Keluruhan Hulawa ke Dungingi Kelurahan Tuladenggi Kecamatan Dungingi &nbsp;sekarang.&nbsp;Kemudian dimasa Pemerintahan Sultan Botutihe kota Kerajaan ini dipindahkan dari Dungingi di pinggiran sungai Bolango, ke satu lokasi yang terletak &nbsp;antara dua&nbsp; &nbsp;kelurahan yaitu Kelurahan Biawao dan Kelurahan Limba B.</p>\r\n\r\n<p>Pada masa pemerintahan Bapak Medi Botutihe selaku Walikota Gorontalo pada tahun 1997 yang merupakan juga keturunan dari Raja Botutihe serta dengan pertimbangan memperpendek rentang kendali guna mendekatkan pelayanan kepada masyarakat dan juga karena merasa terpanggil untuk menghidupkan kembali sejarah gorontalo terutama agar Dungingi&nbsp; ibu kota gorontalo yang lama tidak terlupakan. Maka pada tahun 2003 dibentuklah Kecamatan Dungingi yang sebelumnya termasuk dalam wilayah Kecamatan Kota Barat yang terdiri dari 11 Kelurahan. Setelah terjadinya pemekaran sampai saat ini Kecamatan Dungingi terdiri dari 5 Kelurahan, yakni :</p>\r\n\r\n<ol>\r\n	<li>Kelurahan Huangobotu</li>\r\n	<li>Kelurahan Libuo</li>\r\n	<li>Kelurahan Tuladenggi</li>\r\n	<li>Kelurahan Tomulabutao</li>\r\n	<li>Kelurahan Tomulabutao Selatan.</li>\r\n</ol>\r\n\r\n<p>Kecamatan Dungingi terletak diantara 1&deg; Lintang Utara dan 123&deg; Bujur Timur. Luas Dungingi adalah 4.10 Km2; yang didominasi oleh dataran. Daerah yang berbatasan langsung dengan kabupaten gorontalo ini dilalui oleh sungai bolango dengan panjang 3,3 Km.</p>\r\n', '79b3e6997c97d3e557b3cdcd2fa9a269.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `service_judul` varchar(30) NOT NULL,
  `service_gambar` varchar(2500) NOT NULL,
  `service_metod` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_judul`, `service_gambar`, `service_metod`) VALUES
(1, 'Layanan Perijinan', 'bdfbc455fa6ec2712459c50ebc29d5ff.png', 'ijin'),
(2, 'Layanan Non Perijinan', '8bbede6e9b14b5cb7828c9421b9cb8d2.png', 'nonijin'),
(3, 'PBB', '40192424183291205044673d11b42cd4.png', 'pbb'),
(6, 'Berita', 'd1776e6ff4e00ce6f8bfe71bcac6c285.png', 'blog');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nis` varchar(20) DEFAULT NULL,
  `siswa_nama` varchar(70) DEFAULT NULL,
  `siswa_jenkel` varchar(2) DEFAULT NULL,
  `siswa_kelas_id` int(11) DEFAULT NULL,
  `siswa_photo` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `siswa_jenkel`, `siswa_kelas_id`, `siswa_photo`) VALUES
(1, '9287482', 'Alvaro Sanchez', 'L', 1, '083d547659a2d4bb15c0322d15955da5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(100) NOT NULL,
  `slider_judul` varchar(100) NOT NULL,
  `slider_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slider_gambar` mediumtext NOT NULL,
  `active` tinyint(1) NOT NULL,
  `slider_album_id` int(100) NOT NULL,
  `slider_pengguna_id` int(100) NOT NULL,
  `slider_author` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_judul`, `slider_tanggal`, `slider_gambar`, `active`, `slider_album_id`, `slider_pengguna_id`, `slider_author`) VALUES
(80, 'slider1', '2019-04-21 03:06:08', '1afcc323c9b43da05bf1f21bb109a8b6.jpg', 0, 5, 9, 'Ramli Taliki'),
(81, 'slider2', '2019-04-21 03:06:19', '8187735dd52f74c3025b33f3b84ab9bd.jpg', 0, 5, 9, 'Ramli Taliki'),
(90, 'slider3', '2019-12-04 01:10:18', '9c929a5901734a679fda23a3ca00b192.jpg', 1, 5, 9, 'Ramli Taliki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sotk`
--

CREATE TABLE `tbl_sotk` (
  `sotk_id` int(11) NOT NULL,
  `sotk_judul` varchar(100) NOT NULL,
  `sotk_isi` text NOT NULL,
  `sotk_gambar` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sotk`
--

INSERT INTO `tbl_sotk` (`sotk_id`, `sotk_judul`, `sotk_isi`, `sotk_gambar`) VALUES
(1, 'Struktur Organisasi Kecamatan Dungingi', '<p><br />\r\n&nbsp;</p>\r\n', 'cb1ad5a16b214ce6d90ddc553aae304f.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `testimoni_id` int(11) NOT NULL,
  `testimoni_nama` varchar(30) DEFAULT NULL,
  `testimoni_isi` varchar(120) DEFAULT NULL,
  `testimoni_email` varchar(35) DEFAULT NULL,
  `testimoni_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tld`
--

CREATE TABLE `tbl_tld` (
  `tld_id` int(11) NOT NULL,
  `tld_judul` varchar(100) NOT NULL,
  `tld_isi` text NOT NULL,
  `tld_gambar` varchar(5000) NOT NULL,
  `tld_alamat` varchar(100) NOT NULL,
  `tld_hp` varchar(100) NOT NULL,
  `tld_lurah` varchar(100) NOT NULL,
  `tld_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tld`
--

INSERT INTO `tbl_tld` (`tld_id`, `tld_judul`, `tld_isi`, `tld_gambar`, `tld_alamat`, `tld_hp`, `tld_lurah`, `tld_ket`) VALUES
(5, 'Kelurahan Tuladenggi', '<p>1. Profil Singkat<br />\r\nKelurahan Huangobotu terletak di wilayah kecamatan Dungingi dnegan jumlah penduduk&nbsp;</p>\r\n\r\n<p>2. Batas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Utara&nbsp;: Kelurahan Tomulabutao Selatan</li>\r\n	<li>Selatan : Kelurahan Buladu dan Tuladenggi</li>\r\n	<li>Timur : Kelurahan Dulalowo dan Wumialo</li>\r\n	<li>Barat : Sungai Bolango, Kabupaten Gorontalo</li>\r\n</ul>\r\n\r\n<p>3. Luas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Luas Kelurahan Huangobotu 1,23 KM&sup2;<br />\r\n	&nbsp;</li>\r\n</ul>\r\n', 'f04a6db9d42b60ec9fb369c93b334e00.jpg', 'Jalan Beringin', '0852123456', 'Agus Taha', 'Kelurahan Tuladenggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tomin`
--

CREATE TABLE `tbl_tomin` (
  `tomin_id` int(11) NOT NULL,
  `tomin_judul` varchar(100) NOT NULL,
  `tomin_isi` text NOT NULL,
  `tomin_gambar` varchar(5000) NOT NULL,
  `tomin_alamat` varchar(100) NOT NULL,
  `tomin_hp` varchar(100) NOT NULL,
  `tomin_lurah` varchar(100) NOT NULL,
  `tomin_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tomin`
--

INSERT INTO `tbl_tomin` (`tomin_id`, `tomin_judul`, `tomin_isi`, `tomin_gambar`, `tomin_alamat`, `tomin_hp`, `tomin_lurah`, `tomin_ket`) VALUES
(9, 'Kelurahan Tomulabutao', '<p>1. Profil Singkat<br />\r\nKelurahan Huangobotu terletak di wilayah kecamatan Dungingi dnegan jumlah penduduk&nbsp;</p>\r\n\r\n<p>2. Batas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Utara&nbsp;: Kelurahan Tomulabutao Selatan</li>\r\n	<li>Selatan : Kelurahan Buladu dan Tuladenggi</li>\r\n	<li>Timur : Kelurahan Dulalowo dan Wumialo</li>\r\n	<li>Barat : Sungai Bolango, Kabupaten Gorontalo</li>\r\n</ul>\r\n\r\n<p>3. Luas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Luas Kelurahan Huangobotu 1,23 KM&sup2;<br />\r\n	&nbsp;</li>\r\n</ul>\r\n', '3de1ad9d6dc08af54bb7a8a36dbcb483.jpg', 'Jalan Beringin', '0852123456', 'Herson Tahir, S.Pd', 'Tomin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tomsel`
--

CREATE TABLE `tbl_tomsel` (
  `tomsel_id` int(11) NOT NULL,
  `tomsel_judul` varchar(100) NOT NULL,
  `tomsel_isi` text NOT NULL,
  `tomsel_gambar` varchar(5000) NOT NULL,
  `tomsel_alamat` varchar(100) NOT NULL,
  `tomsel_hp` varchar(100) NOT NULL,
  `tomsel_lurah` varchar(100) NOT NULL,
  `tomsel_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tomsel`
--

INSERT INTO `tbl_tomsel` (`tomsel_id`, `tomsel_judul`, `tomsel_isi`, `tomsel_gambar`, `tomsel_alamat`, `tomsel_hp`, `tomsel_lurah`, `tomsel_ket`) VALUES
(6, 'Kelurahan Tomulabutao Selatan', '<p>1. Profil Singkat<br />\r\nKelurahan Huangobotu terletak di wilayah kecamatan Dungingi dnegan jumlah penduduk&nbsp;</p>\r\n\r\n<p>2. Batas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Utara&nbsp;: Kelurahan Tomulabutao Selatan</li>\r\n	<li>Selatan : Kelurahan Buladu dan Tuladenggi</li>\r\n	<li>Timur : Kelurahan Dulalowo dan Wumialo</li>\r\n	<li>Barat : Sungai Bolango, Kabupaten Gorontalo</li>\r\n</ul>\r\n\r\n<p>3. Luas Wilayah</p>\r\n\r\n<ul>\r\n	<li>Luas Kelurahan Huangobotu 1,23 KM&sup2;<br />\r\n	&nbsp;</li>\r\n</ul>\r\n', '9ee1dbb038ccbe3936b2697bc1376066.jpg', 'Jalan Durian', '0852123456', 'Adelina Luma', 'Tomsel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_trantib`
--

CREATE TABLE `tbl_trantib` (
  `trantib_id` int(11) NOT NULL,
  `trantib_judul` varchar(60) NOT NULL,
  `trantib_datatrantib_id` int(11) DEFAULT NULL,
  `trantib_hbt` int(11) NOT NULL,
  `trantib_lib` int(11) NOT NULL,
  `trantib_tld` int(11) NOT NULL,
  `trantib_tom` int(11) NOT NULL,
  `trantib_tomsel` int(11) NOT NULL,
  `trantib_total` int(11) NOT NULL,
  `trantib_pengguna_id` int(11) NOT NULL,
  `trantib_author` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_trantib`
--

INSERT INTO `tbl_trantib` (`trantib_id`, `trantib_judul`, `trantib_datatrantib_id`, `trantib_hbt`, `trantib_lib`, `trantib_tld`, `trantib_tom`, `trantib_tomsel`, `trantib_total`, `trantib_pengguna_id`, `trantib_author`) VALUES
(27, 'Masuk', 13, 2, 2, 2, 2, 2, 10, 6, 'Afdhal Dzikri'),
(29, 'Layang', 12, 1, 1, 1, 1, 1, 111, 6, 'Afdhal Dzikri'),
(30, 'Gantung', 12, 1, 1, 0, 1, 0, 5, 6, 'Afdhal Dzikri'),
(31, 'Masuk', 11, 5, 5, 5, 5, 5, 25, 6, 'Afdhal Dzikri'),
(32, 'asn', 13, 1, 1, 1, 1, 1, 0, 6, 'Afdhal Dzikri'),
(33, 'Rumah', 15, 2, 2, 2, 2, 2, 10, 6, 'Afdhal Dzikri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tulisan`
--

CREATE TABLE `tbl_tulisan` (
  `tulisan_id` int(11) NOT NULL,
  `tulisan_judul` varchar(100) DEFAULT NULL,
  `tulisan_isi` text,
  `tulisan_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tulisan_kategori_id` int(11) DEFAULT NULL,
  `tulisan_kategori_nama` varchar(30) DEFAULT NULL,
  `tulisan_views` int(11) DEFAULT '0',
  `tulisan_gambar` varchar(40) DEFAULT NULL,
  `tulisan_pengguna_id` int(11) DEFAULT NULL,
  `tulisan_author` varchar(40) DEFAULT NULL,
  `tulisan_img_slider` int(2) NOT NULL DEFAULT '0',
  `tulisan_slug` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tulisan`
--

INSERT INTO `tbl_tulisan` (`tulisan_id`, `tulisan_judul`, `tulisan_isi`, `tulisan_tanggal`, `tulisan_kategori_id`, `tulisan_kategori_nama`, `tulisan_views`, `tulisan_gambar`, `tulisan_pengguna_id`, `tulisan_author`, `tulisan_img_slider`, `tulisan_slug`) VALUES
(25, 'Gerakan Shalat Subuh Berjamaah', '<p>REPUBLIKA.CO.ID,&nbsp;SUKABUMI-- Pemerintah Kota (Pemkot) Sukabumi berkomitmen mendorong terus Gerakan Shalat Subuh Berjamaah. Hal ini ditunjukkan dengan kehadiran Wali Kota Sukabumi Achmad Fahmi dan Wakil Wali Kota Sukabumi Andri Setiawan Hamami dalam gerakan tersebut.</p>\r\n\r\n<p>Sebelumnya Pemkot Sukabumi mulai menggencarkan kembali gerakan Shalat Subuh berjamaah sejak Wali Kota Sukabumi Achmad Fahmi dan Wakil Wali Kota Sukabumi Andri Setiawan Hamami setelah dilantik pada 20 September 2018 lalu. Pemda mendorong Gerakan Shalat Subuh Berjamaah dilaksanakan sebanyak tiga kali dalam sepekan.</p>\r\n', '2018-08-08 13:26:08', 19, 'Keagamaan', 35, '55e2807573ac06aee47ea858e61b383b.jpg', 6, 'Afdhal Dzikri', 0, 'gerakan-shalat-subuh-berjamaah'),
(31, 'tgregrgtr', '<p>thtrhtrhtrhtrh</p>\r\n', '2019-04-20 23:42:10', 3, 'Ekonomi Pembangunan', 20, 'cca3cc08da0d7cfaa4131ca23893c2b5.jpg', 9, 'Ramli Taliki', 0, 'tgregrgtr'),
(27, 'Tes', '<p>Teatesdgdgdg</p>\r\n', '2019-04-07 22:05:09', 1, 'Pelayanan Publik', 2, '9f620ed2a9626196cbaaf6a38d960ea8.jpg', 9, 'Ramli Taliki', 0, 'tes'),
(28, 'Tes upload dari hp', '<p>Berita ini di upload pakai hp</p>\r\n', '2019-04-08 00:09:16', 6, 'Ketentraman Dan Ketertiban', 9, '294f71e8185bdd121f61ddbbe707974d.jpg', 9, 'Ramli Taliki', 0, 'tes-upload-dari-hp'),
(29, 'Tes TEs TEs ', '<p>serhtrshtrjytjtfjmuyfkfmnhfmmum</p>\r\n\r\n<p>murmuymkuymuymmurmumumu</p>\r\n\r\n<p>murmurmurmrmmumm</p>\r\n', '2019-04-09 11:48:28', 2, 'Pemerintahan', 1, '2f2d966d6bd8711d7dbdc665f2c20540.png', 9, 'Ramli Taliki', 0, 'tes-tes-tes'),
(30, 'Dungingi dlm Berita', '<p>Segera kunjungi website kecamatan dungingi</p>\r\n', '2019-04-10 06:55:58', 17, 'Umum', 51, '65ba1812999ac1edc11ef344a02887f1.png', 9, 'Ramli Taliki', 0, 'dungingi-dlm-berita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tunggakan`
--

CREATE TABLE `tbl_tunggakan` (
  `tunggakan_id` int(11) NOT NULL,
  `tunggakan_kelurahan_id` int(11) NOT NULL,
  `tunggakan_judul` varchar(50) NOT NULL,
  `tunggakan_jumlah` int(11) NOT NULL,
  `tunggakan_tahun` year(4) NOT NULL,
  `tunggakan_ket` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tunggakan`
--

INSERT INTO `tbl_tunggakan` (`tunggakan_id`, `tunggakan_kelurahan_id`, `tunggakan_judul`, `tunggakan_jumlah`, `tunggakan_tahun`, `tunggakan_ket`) VALUES
(10, 4, 'mantap test', 12000000, 2015, ' Lunas'),
(11, 5, 'Sejarah ', 12000000, 2018, 'Pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_umkm`
--

CREATE TABLE `tbl_umkm` (
  `umkm_id` int(100) NOT NULL,
  `umkm_judul` varchar(100) NOT NULL,
  `umkm_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `umkm_gambar` mediumtext NOT NULL,
  `umkm_album_id` int(100) NOT NULL,
  `umkm_pengguna_id` int(100) NOT NULL,
  `umkm_author` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_umkm`
--

INSERT INTO `tbl_umkm` (`umkm_id`, `umkm_judul`, `umkm_tanggal`, `umkm_gambar`, `umkm_album_id`, `umkm_pengguna_id`, `umkm_author`) VALUES
(6, 'try1', '2019-02-16 02:25:32', '148efb013ac0bebe70b2167ebcae89eb.jpg', 6, 5, 'Ramli'),
(8, 'try2', '2019-02-16 02:31:37', '736e128ed92f1bb4bd1692c13dfcacd7.jpg', 6, 5, 'Ramli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_visi`
--

CREATE TABLE `tbl_visi` (
  `visi_id` int(11) NOT NULL,
  `visi_judul` varchar(100) NOT NULL,
  `visi_tanggal` date NOT NULL,
  `visi_isi` text NOT NULL,
  `visi_gambar` varchar(10000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_visi`
--

INSERT INTO `tbl_visi` (`visi_id`, `visi_judul`, `visi_tanggal`, `visi_isi`, `visi_gambar`) VALUES
(8, 'Visi & Misi', '0000-00-00', '<h3><span class=\"marker\"><em><strong>Visi Kecamatan Dungingi</strong></em></span></h3>\r\n\r\n<p>Penetapan visi, misi dan arah pembangunan didasarkan atas kondisi riil, permasalahan, potensi, peluang dan tantangan pembangunan untuk jangka waktu 5 (lima) tahun mendatang. Keberhasilan dan kekurangan atas pelaksanaan kebijakan-kebijakan pembangunan Kota Gorontalo merupakan titik tolak untuk menetapkan prioritas bidang yang dikembangkan ke depan.</p>\r\n\r\n<p>Berdasarkan daripada itu maka ditetapkan visi Kecamatan Dungingi&nbsp;adalah</p>\r\n\r\n<blockquote>\r\n<p><span class=\"marker\"><strong>&ldquo;Terwujudnya Pelayanan Publik Yang Prima&rdquo;</strong></span></p>\r\n</blockquote>\r\n\r\n<p>Visi Kecamatan Kedungkandang tersebut merupakan visi yang terintegrasi dan menjadi satu kesatuan dengan visi Kota Malang yakni</p>\r\n\r\n<p>&ldquo;Terwujudnya Kota Malang sebagai Kota Pendidikan Yang Berkualitas, Berbudaya, Berwawasan Lingkungan Menuju Masyarakat Sejahtera&rdquo;</p>\r\n\r\n<p>Berdasarkan pada visi tersebut diharapkan dapat mendukung pencapaian tujuan yang telah digariskan sehingga gerak laju pertumbuhan pembangunan maupun dalam perekonomian diwilayah Kecamatan Kedungkandang diharapkan dapat mewujudkan keinginan warga yang divisikan tersebut.</p>\r\n\r\n<h3><span class=\"marker\"><em><strong>Misi Kecamatan Dungingi</strong></em></span></h3>\r\n\r\n<p>Visi Pemerintah Kecamatan Kedungkandang ini juga dapat diwujudkan melalui Misi Kecamatan. Adapun Misi Kecamatan Kedungkandang adalah</p>\r\n\r\n<p>&ldquo;Mewujudkan Kualitas Pelayanan Publik yang Profesional dan Akuntabel&rdquo;</p>\r\n\r\n<p>yang dapat dijabarkan sebagai berikut :</p>\r\n\r\n<ol>\r\n	<li>Mewujudkan pelayanan masyarakat yang berkualitas, transparan dan akuntabel;</li>\r\n	<li>Mewujudkan budaya tertib hukum dan tertib lingkungan dalam masyarakat;</li>\r\n	<li>Mewujudkan usaha-usaha guna mendukung penerimaan pendapatan daerah yang optimal;</li>\r\n	<li>Mewujudkan pelaksanaan pembangunan yang berbasis partisipasi masyarakat.</li>\r\n</ol>\r\n\r\n<p>Dengan ditetapkannya misi Kecamatan Kedungkandang tersebut diatas, nantinya diharapkan gerak pembangunan, penyelenggaraan pemerintahan dan pelayanan masyarakat di wilayah Kecamatan Kedungkandang dan kelurahan yang berada diwilayahnya dapat sinergis dalam mencapai tujuan yang diarahkan untuk mewujudkan visi Kota Malang.</p>\r\n', '26c47e2605a50c2d6dda2892bb678d83.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `pengguna_id`, `menu_id`) VALUES
(1, 1, 9),
(9, 1, 10),
(8, 1, 11),
(4, 2, 10),
(5, 3, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(11, 'kepalaseksi'),
(10, 'adminkantor'),
(9, 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_ss_menu`
--

CREATE TABLE `user_ss_menu` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(128) NOT NULL,
  `menu_ss` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `pengguna_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_ss_menu`
--

INSERT INTO `user_ss_menu` (`id`, `menu_id`, `menu_ss`, `title`, `url`, `icon`, `pengguna_status`) VALUES
(1, '9', '1', 'Editor', '#', 'fa fa-fw fa-list', 1),
(2, '10', '3', 'Galeri', '#', 'fa fa-fw fa-camera', 1),
(3, '10', '2', 'Pelayanan', '#', 'fa fa-fw fa-desktop', 1),
(4, '10', '4', 'Aparatur', '#', 'fa fa-fw fa-user-plus', 1),
(5, '10', '5', 'Kelurahan', '#', 'fa fa-fw fa-building', 1),
(6, '11', '6', 'Pemerintahan', '#', 'fa fa-fw fa-arrows', 1),
(7, '11', '7', 'Trantibum', '#', 'fa fa-fw fa-shield', 1),
(8, '11', '8', 'Pemberdayaan & Kesra', '#', 'fa fa-fw fa-stack-overflow', 1),
(9, '11', '9', 'Ekonomi Pembangunan', '#', 'fa fa-fw fa-shopping-cart', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `pengguna_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `subtitle`, `url`, `icon`, `pengguna_status`) VALUES
(7, 9, 'Pengguna', '', 'superadmin/pengguna', 'fa fa-fw fa-users', 1),
(5, 9, 'Menu Management', '', 'superadmin/menu', 'fa fa-fw fa-home', 1),
(6, 9, 'SubMenu Management', '', 'superadmin/menu/submenu', 'fa fa-fw fa-bars', 1),
(8, 10, 'Berita', '', 'adminkantor/tulisan', 'fa fa-fw fa-newspaper-o', 1),
(9, 10, 'Daftar Layanan', '', 'adminkantor/layanan', 'fa fa-fw fa-fax', 1),
(10, 9, 'Role', '', 'superadmin/login/role', 'fa fa-fw fa-user', 1),
(11, 9, 'Download', '', 'superadmin/files', 'fa fa-fw fa-file', 1),
(12, 9, 'Komentar', '', 'superadmin/komentar', 'fa fa-fw fa-comments-o', 1),
(13, 10, 'Pengumuman', '', 'adminkantor/pengumuman', 'fa fa-fw fa-bullhorn', 1),
(14, 10, 'Agenda', '', 'adminkantor/agenda', 'fa fa-fw fa-book', 1),
(15, 10, 'Inbox', '', 'adminkantor/inbox', 'fa fa-fw fa-inbox', 1),
(16, 9, 'Kategori Berita', '', 'superadmin/kategori', 'fa fa-fw fa-check-square-o', 1),
(17, 10, 'Nomor Penting', '', 'adminkantor/nopen', 'fa fa-fw fa-phone', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tree_menu`
--

CREATE TABLE `user_tree_menu` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(128) NOT NULL,
  `menu_tree` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `pengguna_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_tree_menu`
--

INSERT INTO `user_tree_menu` (`id`, `menu_id`, `menu_tree`, `title`, `url`, `icon`, `pengguna_status`) VALUES
(1, '9', '1', 'sejarah', 'superadmin/sejarah', 'fa fa-fw fa-history', 1),
(2, '9', '1', 'Visi & Misi', 'superadmin/visi_misi', 'fa fa-fw fa-external-link-square', 1),
(3, '9', '1', 'Peta', 'superadmin/peta', 'fa fa-fw fa-map-marker ', 1),
(4, '10', '2', 'Perijinan', 'adminkantor/ijin', 'fa fa-fw fa-folder-open-o ', 1),
(5, '10', '2', 'Non Perijinan', 'adminkantor/nonijin', 'fa fa-fw fa-folder-open', 1),
(6, '10', '3', 'Galeri', 'adminkantor/galeri', 'fa fa-fw fa-picture-o', 1),
(7, '9', '1', 'SOTK', 'superadmin/sotk', 'fa fa-fw fa-sitemap', 1),
(8, '9', '1', 'Service', 'superadmin/service', 'fa fa-fw fa-bar-chart', 1),
(9, '9', '1', 'Daftar Camat', 'superadmin/camat', 'fa fa-fw fa-user-secret', 1),
(10, '10', '3', 'Album', 'adminkantor/album', 'fa fa-fw fa-camera-retro', 1),
(11, '9', '1', 'Slider', 'superadmin/slider', 'fa fa-fw fa-sliders', 1),
(12, '11', '9', 'UMKM', 'kepalaseksi/umkm', 'fa fa-fw  fa-shopping-bag', 1),
(13, '10', '4', 'Aparat Kecamatan', 'adminkantor/guru', 'fa fa-fw fa-user', 1),
(14, '10', '4', 'Aparat Kelurahan', 'adminkantor/siswa', 'fa fa-fw fa-user', 1),
(15, '11', '6', 'Data Pemerintahan', 'kepalaseksi/pem', 'fa fa-fw fa-book', 1),
(16, '11', '6', 'Master Pemerintahan', 'kepalaseksi/datapem', 'fa fa-fw fa-briefcase', 1),
(17, '11', '6', 'Kependudukan', 'kepalaseksi/penduduk', 'fa fa-fw fa-share-square-o', 1),
(18, '11', '6', 'PBB', 'kepalaseksi/pbb', 'fa fa-fw fa-tags', 1),
(19, '11', '6', 'Tunggakan', 'kepalaseksi/tunggakan', 'fa fa-times-circle', 1),
(20, '11', '6', 'E-KTP', 'kepalaseksi/ektp', 'fa fa-fw fa-credit-card-alt', 1),
(21, '11', '7', 'Data Trantib', 'kepalaseksi/trantib', 'fa fa-fw  fa-bookmark', 1),
(22, '11', '7', 'Master Trantib', 'kepalaseksi/datatrantib', 'fa fa-fw fa-wrench', 1),
(23, '11', '8', 'Data PMK', 'kepalaseksi/kesra', 'fa fa-fw fa-umbrella', 1),
(24, '11', '8', 'Master PMK', 'kepalaseksi/datakesra', 'fa fa-fw fa-life-ring', 1),
(25, '11', '8', 'Ormas', 'kepalaseksi/lpm', 'fa fa-fw fa-users', 1),
(26, '11', '9', 'Data Ekbang', 'kepalaseksi/ekbang', 'fa fa-fw  fa-pie-chart', 1),
(27, '11', '9', 'Master Ekbang', 'kepalaseksi/dataekbang', 'fa fa-fw fa-clipboard', 1),
(28, '11', '9', 'Potensi', 'kepalaseksi/potensi', 'fa fa-fw fa-plug', 1),
(29, '10', '5', 'Huangobotu', 'adminkantor/huangobotu', 'fa fa-fw fa-university', 1),
(30, '10', '5', 'Libuo', 'adminkantor/libuo', 'fa fa-fw fa-university', 1),
(31, '10', '5', 'Tuladenggi', 'adminkantor/tuladenggi', 'fa fa-fw fa-university', 1),
(32, '10', '5', 'Tomulabutao', 'adminkantor/tomin', 'fa fa-fw fa-university', 1),
(33, '10', '5', 'Tomulabutao Selatan', 'adminkantor/tomsel', 'fa fa-fw fa-university', 1),
(34, '11', '6', 'Laporan Penduduk', 'kepalaseksi/lapen', 'fa fa-fw fa-bookmark', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indeks untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `album_pengguna_id` (`album_pengguna_id`);

--
-- Indeks untuk tabel `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_camat`
--
ALTER TABLE `tbl_camat`
  ADD PRIMARY KEY (`camat_id`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indeks untuk tabel `tbl_dataekbang`
--
ALTER TABLE `tbl_dataekbang`
  ADD PRIMARY KEY (`dataekbang_id`),
  ADD KEY `dataekbang_pengguna_id` (`dataekbang_pengguna_id`),
  ADD KEY `dataekbang_nama` (`dataekbang_nama`);

--
-- Indeks untuk tabel `tbl_datakesra`
--
ALTER TABLE `tbl_datakesra`
  ADD PRIMARY KEY (`datakesra_id`),
  ADD KEY `dataekbang_pengguna_id` (`datakesra_pengguna_id`),
  ADD KEY `dataekbang_nama` (`datakesra_nama`);

--
-- Indeks untuk tabel `tbl_datapem`
--
ALTER TABLE `tbl_datapem`
  ADD PRIMARY KEY (`datapem_id`),
  ADD KEY `dataekbang_pengguna_id` (`datapem_pengguna_id`),
  ADD KEY `dataekbang_nama` (`datapem_nama`);

--
-- Indeks untuk tabel `tbl_datatrantib`
--
ALTER TABLE `tbl_datatrantib`
  ADD PRIMARY KEY (`datatrantib_id`),
  ADD KEY `dataekbang_pengguna_id` (`datatrantib_pengguna_id`),
  ADD KEY `dataekbang_nama` (`datatrantib_nama`);

--
-- Indeks untuk tabel `tbl_ekbang`
--
ALTER TABLE `tbl_ekbang`
  ADD PRIMARY KEY (`ekbang_id`),
  ADD KEY `ek_dataek_id` (`ekbang_dataekbang_id`),
  ADD KEY `ekbang_pengguna_id` (`ekbang_pengguna_id`);

--
-- Indeks untuk tabel `tbl_ektp`
--
ALTER TABLE `tbl_ektp`
  ADD PRIMARY KEY (`ektp_id`),
  ADD KEY `ektp_kelurahan_id` (`ektp_kelurahan_id`);

--
-- Indeks untuk tabel `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indeks untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`galeri_id`),
  ADD KEY `galeri_album_id` (`galeri_album_id`),
  ADD KEY `galeri_pengguna_id` (`galeri_pengguna_id`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indeks untuk tabel `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indeks untuk tabel `tbl_huangobotu`
--
ALTER TABLE `tbl_huangobotu`
  ADD PRIMARY KEY (`huangobotu_id`);

--
-- Indeks untuk tabel `tbl_ijin`
--
ALTER TABLE `tbl_ijin`
  ADD PRIMARY KEY (`ijin_id`);

--
-- Indeks untuk tabel `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indeks untuk tabel `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
  ADD PRIMARY KEY (`kelurahan_id`);

--
-- Indeks untuk tabel `tbl_kesra`
--
ALTER TABLE `tbl_kesra`
  ADD PRIMARY KEY (`kesra_id`),
  ADD KEY `ek_dataek_id` (`kesra_datakesra_id`),
  ADD KEY `ekbang_pengguna_id` (`kesra_pengguna_id`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `komentar_tulisan_id` (`komentar_tulisan_id`);

--
-- Indeks untuk tabel `tbl_lapen`
--
ALTER TABLE `tbl_lapen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD PRIMARY KEY (`layanan_id`),
  ADD KEY `layanan_kelurahan_id` (`layanan_kelurahan_id`);

--
-- Indeks untuk tabel `tbl_libuo`
--
ALTER TABLE `tbl_libuo`
  ADD PRIMARY KEY (`libuo_id`);

--
-- Indeks untuk tabel `tbl_log_aktivitas`
--
ALTER TABLE `tbl_log_aktivitas`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_pengguna_id` (`log_pengguna_id`);

--
-- Indeks untuk tabel `tbl_lpm`
--
ALTER TABLE `tbl_lpm`
  ADD PRIMARY KEY (`lpm_id`);

--
-- Indeks untuk tabel `tbl_nonijin`
--
ALTER TABLE `tbl_nonijin`
  ADD PRIMARY KEY (`nonijin_id`);

--
-- Indeks untuk tabel `tbl_nopen`
--
ALTER TABLE `tbl_nopen`
  ADD PRIMARY KEY (`nopen_id`);

--
-- Indeks untuk tabel `tbl_online`
--
ALTER TABLE `tbl_online`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pbb`
--
ALTER TABLE `tbl_pbb`
  ADD PRIMARY KEY (`pbb_id`);

--
-- Indeks untuk tabel `tbl_pem`
--
ALTER TABLE `tbl_pem`
  ADD PRIMARY KEY (`pem_id`),
  ADD KEY `ek_dataek_id` (`pem_datapem_id`),
  ADD KEY `ekbang_pengguna_id` (`pem_pengguna_id`);

--
-- Indeks untuk tabel `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indeks untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- Indeks untuk tabel `tbl_perum`
--
ALTER TABLE `tbl_perum`
  ADD PRIMARY KEY (`perum_id`);

--
-- Indeks untuk tabel `tbl_peta`
--
ALTER TABLE `tbl_peta`
  ADD PRIMARY KEY (`peta_id`);

--
-- Indeks untuk tabel `tbl_poll`
--
ALTER TABLE `tbl_poll`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_potensi`
--
ALTER TABLE `tbl_potensi`
  ADD PRIMARY KEY (`potensi_id`),
  ADD KEY `potensi_kelurahan_id` (`potensi_kelurahan_id`);

--
-- Indeks untuk tabel `tbl_sejarah`
--
ALTER TABLE `tbl_sejarah`
  ADD PRIMARY KEY (`sejarah_id`);

--
-- Indeks untuk tabel `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indeks untuk tabel `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indeks untuk tabel `tbl_sotk`
--
ALTER TABLE `tbl_sotk`
  ADD PRIMARY KEY (`sotk_id`);

--
-- Indeks untuk tabel `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`testimoni_id`);

--
-- Indeks untuk tabel `tbl_tld`
--
ALTER TABLE `tbl_tld`
  ADD PRIMARY KEY (`tld_id`);

--
-- Indeks untuk tabel `tbl_tomin`
--
ALTER TABLE `tbl_tomin`
  ADD PRIMARY KEY (`tomin_id`);

--
-- Indeks untuk tabel `tbl_tomsel`
--
ALTER TABLE `tbl_tomsel`
  ADD PRIMARY KEY (`tomsel_id`);

--
-- Indeks untuk tabel `tbl_trantib`
--
ALTER TABLE `tbl_trantib`
  ADD PRIMARY KEY (`trantib_id`),
  ADD KEY `ek_dataek_id` (`trantib_datatrantib_id`),
  ADD KEY `ekbang_pengguna_id` (`trantib_pengguna_id`);

--
-- Indeks untuk tabel `tbl_tulisan`
--
ALTER TABLE `tbl_tulisan`
  ADD PRIMARY KEY (`tulisan_id`),
  ADD KEY `tulisan_kategori_id` (`tulisan_kategori_id`),
  ADD KEY `tulisan_pengguna_id` (`tulisan_pengguna_id`);

--
-- Indeks untuk tabel `tbl_tunggakan`
--
ALTER TABLE `tbl_tunggakan`
  ADD PRIMARY KEY (`tunggakan_id`);

--
-- Indeks untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  ADD PRIMARY KEY (`umkm_id`);

--
-- Indeks untuk tabel `tbl_visi`
--
ALTER TABLE `tbl_visi`
  ADD PRIMARY KEY (`visi_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_ss_menu`
--
ALTER TABLE `user_ss_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_tree_menu`
--
ALTER TABLE `user_tree_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_camat`
--
ALTER TABLE `tbl_camat`
  MODIFY `camat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `CustomerID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_dataekbang`
--
ALTER TABLE `tbl_dataekbang`
  MODIFY `dataekbang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_datakesra`
--
ALTER TABLE `tbl_datakesra`
  MODIFY `datakesra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_datapem`
--
ALTER TABLE `tbl_datapem`
  MODIFY `datapem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_datatrantib`
--
ALTER TABLE `tbl_datatrantib`
  MODIFY `datatrantib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_ekbang`
--
ALTER TABLE `tbl_ekbang`
  MODIFY `ekbang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbl_ektp`
--
ALTER TABLE `tbl_ektp`
  MODIFY `ektp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_hotel`
--
ALTER TABLE `tbl_hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_huangobotu`
--
ALTER TABLE `tbl_huangobotu`
  MODIFY `huangobotu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_ijin`
--
ALTER TABLE `tbl_ijin`
  MODIFY `ijin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelurahan`
--
ALTER TABLE `tbl_kelurahan`
  MODIFY `kelurahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_kesra`
--
ALTER TABLE `tbl_kesra`
  MODIFY `kesra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_lapen`
--
ALTER TABLE `tbl_lapen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  MODIFY `layanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_libuo`
--
ALTER TABLE `tbl_libuo`
  MODIFY `libuo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_log_aktivitas`
--
ALTER TABLE `tbl_log_aktivitas`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_lpm`
--
ALTER TABLE `tbl_lpm`
  MODIFY `lpm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_nonijin`
--
ALTER TABLE `tbl_nonijin`
  MODIFY `nonijin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_nopen`
--
ALTER TABLE `tbl_nopen`
  MODIFY `nopen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_online`
--
ALTER TABLE `tbl_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pbb`
--
ALTER TABLE `tbl_pbb`
  MODIFY `pbb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_pem`
--
ALTER TABLE `tbl_pem`
  MODIFY `pem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1039;

--
-- AUTO_INCREMENT untuk tabel `tbl_perum`
--
ALTER TABLE `tbl_perum`
  MODIFY `perum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_peta`
--
ALTER TABLE `tbl_peta`
  MODIFY `peta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_poll`
--
ALTER TABLE `tbl_poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_potensi`
--
ALTER TABLE `tbl_potensi`
  MODIFY `potensi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_sejarah`
--
ALTER TABLE `tbl_sejarah`
  MODIFY `sejarah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `tbl_sotk`
--
ALTER TABLE `tbl_sotk`
  MODIFY `sotk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `testimoni_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_tld`
--
ALTER TABLE `tbl_tld`
  MODIFY `tld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_tomin`
--
ALTER TABLE `tbl_tomin`
  MODIFY `tomin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_tomsel`
--
ALTER TABLE `tbl_tomsel`
  MODIFY `tomsel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_trantib`
--
ALTER TABLE `tbl_trantib`
  MODIFY `trantib_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tbl_tulisan`
--
ALTER TABLE `tbl_tulisan`
  MODIFY `tulisan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_tunggakan`
--
ALTER TABLE `tbl_tunggakan`
  MODIFY `tunggakan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  MODIFY `umkm_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_visi`
--
ALTER TABLE `tbl_visi`
  MODIFY `visi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_ss_menu`
--
ALTER TABLE `user_ss_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_tree_menu`
--
ALTER TABLE `user_tree_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
