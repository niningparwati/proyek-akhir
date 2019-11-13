-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 04:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tangal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `tanggal_join` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `foto`, `email`, `password`, `nama`, `tangal_lahir`, `alamat`, `telepon`, `tanggal_join`) VALUES
('001-ADM-08071931', '', 'niningparwati04@gmail.com', '$2y$10$T/1j.pbMdyn6CEA0sWYl2uyQAzKbZAjkHGSuKyb1eKnyiJBTIZy6y', 'Nining Parwati', '0000-00-00', '', '', '2019-07-08 09:56:56'),
('001-ADM-120719082142', '', 'admin@gmail.com', '$2y$10$rzbH/AgIsL9gg7uAKBabcecUNEUIvg2EneOB5./LiNMk1XjShikLy', 'Admin', '0000-00-00', '', '', '2019-07-12 13:23:42'),
('001-ADM-120719082822', '', 'uproject@gmail.com', '$2y$10$XXxprAXTTKqTUhxXNdVt7Ok5jGJqGcafE3kes5Hbu04fJ6R2KTmWO', 'UProject', '0000-00-00', '', '', '2019-07-12 13:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(20) NOT NULL,
  `tanggal_pos` date NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('pending','berjalan','selesai','batal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_kategori`, `id_admin`, `judul`, `pengarang`, `tanggal_pos`, `isi`, `foto`, `status`) VALUES
('001-ART-11071931', 2, '001-ADM-08071931', 'Artikel Ekonomi', 'Nining', '2019-07-18', '<div xss=removed><b>ARTIKEL EKONOMI</b></div><div xss=removed><b><br></b></div><div xss=removed>hahahahhhaa hhhahhdhhaha slcmsdlld fklsamxadjkel dsklf;sfl;ekfkf mncjfhuelsko djf ksljkjfoeidjks</div>', 'Being-an-authentic-leader1.png', 'pending'),
('001-ART-12071931', 3, '001-ADM-08071931', 'Teknologi 2019', 'Unknow', '2019-07-14', '<p>hehhehehe akakkaa heiwudioas kjsaljdkwj mnaljdklaw mdkjwll;aka jhdidwksnc sjkdjoiowoks </p>', 'questions-1014060_960_720.jpg', 'berjalan'),
('010-ART-09071931', 1, '001-ADM-08071931', 'WA WA WA WA', 'Unknow', '2019-07-14', '<p>hahahahahaha hihihihihihi huhuhuhuhu hehehehehehe hohohohohoho</p>', '57I3gHbs_400x400.jpg', 'berjalan'),
('011-ART-09071931', 3, '001-ADM-08071931', 'LA LA LA', 'Saya', '2019-07-12', 'kakakakakakakaka kikikikikikikikikikiki kukukukukukukukuku kekekekekekekekekeke kokokokokokokokoko', 'images.jpg', 'batal'),
('012-ART-09071931', 1, '001-ADM-08071931', 'PAM PAM PAM', 'Unknow', '2019-07-12', '<p>ppppppppppppppppppp uuuuuuuuuuuuuuuuuuuu yyyyyyyyyyyyyyyyyyyyyyyy</p>', 'anggota.png', 'selesai'),
('013-ART-09071931', 3, '001-ADM-08071931', 'TANPA JUDUL', 'Unknow', '2019-07-12', '<p>hahahahahahahahah hahahahahahahaha hahahahahahaha hahahahahahahaha hahahahahahaha hahahahaahaha hahahahahahahaha hahahahahahaha hahahahahahahaha hahahahaahahaha</p>', 'Being-an-authentic-leader.png', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `benefit`
--

CREATE TABLE `benefit` (
  `id_benefit` int(11) NOT NULL,
  `id_project` varchar(20) NOT NULL,
  `nama_benefit` varchar(50) DEFAULT NULL,
  `minimal` varchar(20) NOT NULL,
  `maksimal` varchar(20) NOT NULL,
  `isi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit`
--

INSERT INTO `benefit` (`id_benefit`, `id_project`, `nama_benefit`, `minimal`, `maksimal`, `isi`) VALUES
(1, '001-PRJ-110719081954', 'Benefit Level A', '0', '2000000', 'pencantuman logo'),
(2, '001-PRJ-110719081954', 'Benefit Level B', '2000000', '40000000', 'pencantuman logo dan publikasi'),
(3, '001-PRJ-110719082539', 'Benefit 1', '0', '5000000', 'aaa'),
(4, '001-PRJ-110719082539', 'Benefit 2', '5000000', '20000000', 'bbb'),
(6, '001-PRJ-110719072020', 'Level 1', '0', '3000000', 'pembacaan nama donatur dalam acara peresmian patung'),
(7, '001-PRJ-110719072020', 'Level 2', '3000000', '10000000', 'pembuatan stand di acara peresmian patung'),
(8, '001-PRJ-110719072020', 'Level 3', '10000000', '20000000', 'pencantuman nama/logo di area patung'),
(9, '001-PRJ-110719080142', 'Benefit 1', '0', '15000000', 'mendapat 1 gelas cantik'),
(10, '001-PRJ-110719080142', 'Benefit 2', '15000000', '30000000', 'mendapat 1 buah piring cantik'),
(11, '001-PRJ-120719012149', 'Level 1', '0', '5000000', 'satu gelas cantik'),
(12, '001-PRJ-120719012149', 'Level 2', '5000000', '10000000', 'satu piring cantik'),
(13, '001-PRJ-120719012149', 'Level 3', '10000000', '50000000', 'satu payung cantik'),
(14, '001-PRJ-120719012149', 'Level 4', '50000000', '100000000', 'pencantuman nama'),
(15, '001-PRJ-140719111334', 'Level 1', '0', '10000000', 'mendapat benefit yang pertama'),
(16, '001-PRJ-140719111334', 'Level 2', '10000000', '50000000', 'mendapat benefit yang kedua'),
(17, '001-PRJ-140719113546', 'Benefit 1', '0', '5000000', 'hadiah benefit pertama'),
(18, '001-PRJ-140719113546', 'Benefit 2', '5000000', '50000000', 'hadiah benefit kedua'),
(19, '001-PRJ-180719110427', 'A', '0', '10000000', 'dapat A'),
(20, '001-PRJ-180719110427', 'B', '10000000', '30000000', 'dapat B'),
(21, '001-PRJ-180719110427', 'C', '30000000', '50000000', 'dapat C'),
(22, '001-PRJ-180719111048', 'Satu A', '0', '15000000', 'dapat Satu A'),
(23, '001-PRJ-180719111048', 'Satu B', '15000000', '30000000', 'dapat Satu B'),
(24, '001-PRJ-180719123854', 'Ketiga A', '0', '10000000', 'dapat Ketiga A'),
(25, '001-PRJ-180719123854', 'Ketiga B', '10000000', '30000000', 'dapat Ketiga B'),
(26, '001-PRJ-180719124719', '1', '0', '5000000', '1'),
(27, '001-PRJ-180719124719', '2', '5000000', '20000000', '2'),
(28, '001-PRJ-180719012743', 'Benefit 2', '0', '10000000', 'kkk'),
(29, '001-PRJ-180719012743', 'Benefit 1', '10000000', '20000000', 'llll');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` varchar(25) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_project` varchar(20) NOT NULL,
  `id_benefit` int(11) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `tanggal_donasi` date NOT NULL,
  `status_benefit` enum('Menunggu Konfirmasi','Benefit Sudah Dikirim') NOT NULL,
  `bukti_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_user`, `id_project`, `id_benefit`, `nominal`, `tanggal_donasi`, `status_benefit`, `bukti_pembayaran`) VALUES
('001-DNS-120719034710', '001-USER-11071907193', '001-PRJ-110719072020', 6, '10000000', '2019-07-12', 'Benefit Sudah Dikirim', 'chef-156108__3403.png'),
('001-DNS-150719105129', '001-USER-11071907193', '001-PRJ-110719072020', 8, '10000000', '2019-07-15', 'Menunggu Konfirmasi', 'chef-156108__34060.png'),
('001-DNS-150719105247', '001-USER-10071904412', '001-PRJ-110719081954', 2, '5000000', '2019-07-15', 'Menunggu Konfirmasi', 'mizone.jpg'),
('001-DNS-170719011211', '001-USER-10071904412', '001-PRJ-110719072020', 6, '2000000', '2019-07-17', 'Menunggu Konfirmasi', 'anggota2.png'),
('001-DNS-170719011524', '001-USER-10071904412', '001-PRJ-110719072020', 7, '3000000', '2019-07-17', 'Menunggu Konfirmasi', 'kepemimpinan-etis-melakukan-sesuatu-yang-benar.jpg'),
('001-DNS-170719011642', '001-USER-10071904412', '001-PRJ-110719072020', 8, '10000000', '2019-07-17', 'Menunggu Konfirmasi', 'images6.jpg'),
('001-DNS-170719012945', '001-USER-11071907193', '001-PRJ-110719081954', 1, '20000000', '2019-07-17', 'Menunggu Konfirmasi', 'anggota3.png'),
('001-DNS-170719013048', '001-USER-11071907193', '001-PRJ-110719081954', 1, '20000000', '2019-07-17', 'Menunggu Konfirmasi', 'download1.jpg'),
('001-DNS-170719013122', '001-USER-11071907193', '001-PRJ-110719081954', 1, '40000000', '2019-07-17', 'Menunggu Konfirmasi', 'images8.jpg'),
('001-DNS-170719013353', '001-USER-11071907193', '001-PRJ-110719081954', 1, '40000000', '2019-07-17', 'Menunggu Konfirmasi', 'download2.jpg'),
('001-DNS-170719013751', '001-USER-11071907193', '001-PRJ-110719081954', 1, '41000000', '2019-07-17', 'Menunggu Konfirmasi', '57I3gHbs_400x4001.jpg'),
('001-DNS-170719014421', '001-USER-12071908433', '001-PRJ-110719081954', 2, '20000000', '2019-07-17', 'Menunggu Konfirmasi', 'download3.jpg'),
('001-DNS-170719014600', '001-USER-12071908433', '001-PRJ-110719081954', 2, '20000000', '2019-07-17', 'Menunggu Konfirmasi', 'ds3.png'),
('001-DNS-170719014650', '001-USER-12071908433', '001-PRJ-110719081954', 1, '40000000', '2019-07-17', 'Menunggu Konfirmasi', 'ds4.png'),
('001-DNS-170719014720', '001-USER-12071908433', '001-PRJ-110719081954', 1, '41000000', '2019-07-17', 'Menunggu Konfirmasi', 'ds5.png'),
('001-DNS-170719015208', '001-USER-12071908433', '001-PRJ-110719081954', 1, '40000000', '2019-07-17', 'Menunggu Konfirmasi', 'ds6.png'),
('001-DNS-170719040615', '001-USER-11071907193', '001-PRJ-110719081954', 2, '10000000', '2019-07-17', 'Menunggu Konfirmasi', '57I3gHbs_400x400.jpg'),
('001-DNS-170719041641', '001-USER-10071904412', '001-PRJ-110719072020', 8, '10000000', '2019-07-17', 'Menunggu Konfirmasi', 'images5.jpg'),
('001-DNS-170719041655', '001-USER-10071904412', '001-PRJ-110719072020', 8, '10000000', '2019-07-17', 'Menunggu Konfirmasi', 'the-art-4.png'),
('001-DNS-170719091051', '001-USER-12071908433', '001-PRJ-110719072020', 7, '4000000', '2019-07-17', 'Menunggu Konfirmasi', '51.jpg'),
('001-DNS-210719090005', '001-USER-11071907193', '001-PRJ-180719110427', 20, '10000000', '2019-07-21', 'Menunggu Konfirmasi', 'ds15.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sosial'),
(2, 'Ekonomi'),
(3, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `dana_dibutuhkan` bigint(20) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `surat_perjanjian` varchar(100) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `status` enum('pending','berjalan','tolak','selesai') NOT NULL,
  `status_data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `id_user`, `foto`, `nama`, `detail`, `dana_dibutuhkan`, `tanggal_buat`, `tanggal_berakhir`, `surat_perjanjian`, `proposal`, `status`, `status_data`) VALUES
('001-PRJ-110719072020', '001-USER-11071907193', 'images.jpg', 'Patung Raksasa', 'Patung ini merupakan salah satu patung raksasa dengan desain yang sangat unik dan memiliki daya seni yang luar biasa', 30000000, '2019-07-11', '2020-01-11', 'form_permohonan_kk_baru_WNI.pdf', 'permohonan_pindah_datang_dalam_desa.pdf', 'berjalan', 'Lengkap'),
('001-PRJ-110719080142', '001-USER-11071907193', 'mizone1.jpg', 'Jembatan Layang', 'Jembatan yang dibangun dengan arsitektur yang unik dan menarik', 55000000, '2019-07-11', '2020-01-11', 'permohonan_pindah_antar_kota_atau_provinsi.pdf', 'keterangan_kelahiran1.pdf', 'tolak', 'Lengkap'),
('001-PRJ-110719081954', '001-USER-10071904412', 'kepemimpinan-etis-melakukan-sesuatu-yang-benar.jpg', 'Project Pertama Saya', 'bismillah ya', 50000000, '2019-07-11', '2019-07-20', '57I3gHbs_400x400.jpg', 'KTP1.pdf', 'selesai', 'Lengkap'),
('001-PRJ-110719082539', '001-USER-10071904412', 'merlin_137077992_cb8e07e0-a188-45fb-9ee0-2c81adf18f6d-articleLarge1.jpg', 'Project Kelompok', 'hehehe', 20000000, '2019-07-11', '2019-07-11', 'ds.png', 'pencatatan_perceraian.pdf', 'selesai', 'Lengkap'),
('001-PRJ-120719012149', '001-USER-11071907193', 'syarat-seorang-pemimpin--telaah-kitab-ajhizah-daulah-khilafah1.jpg', 'Proyek Tingkat', 'Proyek tingkat merupakan hahsasdjak hsakjkja jncjasnka jjdwklandh eojsklajdhf jsklaieuiu jdhsdhie fwwww', 10000000, '2019-07-12', '2020-01-12', 'pencatatan_perceraian.pdf', 'JSoft_-_Surat_Penawaran_Produk_dan_Jasa_Pratistha_Hasra.pdf', 'berjalan', 'Lengkap'),
('001-PRJ-140719111334', '001-USER-11071907193', 'anggota.png', 'Proyek Akhir', 'dkasjkjdnd jdhfieiiurut kajdlaeoifj fksl;adepkd mnvnkdf alepekdjf jfkslmamck ldfkjf', 100000000, '2019-07-14', '2020-01-14', 'KTP.pdf', 'form_permohonan_kk_baru_WNI.pdf', 'pending', 'Lengkap'),
('001-PRJ-140719113546', '001-USER-10071904412', 'kepemimpinan-etis-melakukan-sesuatu-yang-benar2.jpg', 'Project Teman', 'kf kjkdjsk gfhdjh jjksjka jmxnmnx hdhhfks ieouowf kkskmkc', 50000000, '2019-07-14', '2020-01-14', 'pelaporan_mati_WNI.pdf', 'keterangan_kelahiran2.pdf', 'berjalan', 'Lengkap'),
('001-PRJ-180719012743', '001-USER-10071904412', 'chef-156108__340.png', 'Project Baru', 'kjkkjbbhb', 55000000, '2019-07-18', '2020-01-18', 'KTP2.pdf', 'form_permohonan_kk_baru_WNI1.pdf', 'pending', 'Lengkap'),
('001-PRJ-180719110427', '001-USER-12071908433', 'the-art-4.png', 'Project Satu', 'jsdkskfdkkfnc mslmxlspeir mkcmkdk maksk huehhri nadnhdjw kamswooej hddirijka jakjdeijd hdskjkdjjf hrysjahsiey jdhud7rhj kalsopehrb hsbwhwkaha lakjsod', 50000000, '2019-07-18', '2020-01-18', 'images.jpg', 'pencatatan_perkawinan.pdf', 'berjalan', 'Lengkap'),
('001-PRJ-180719111048', '001-USER-18071911100', 'questions-1014060_960_720.jpg', 'Jembatan Dua', 'djdaskjdkjkd heiwuewoj hakskakd ndhdjsfkskd hewueyioqon nskakd kalsko heuwehw jkajsiw bheyrutb dbcgdhaj jakqhiwueeydh', 40000000, '2019-07-18', '2020-01-18', 'Being-an-authentic-leader.png', 'permohonan_pindah_antar_desa_dalam_1_kecamatan.pdf', 'berjalan', 'Lengkap'),
('001-PRJ-180719123854', '001-USER-11071907193', 'ds.png', 'Project Ketiga', 'shdkakdx, x', 30000000, '2019-07-18', '2020-01-18', 'KTP1.pdf', 'form_permohonan_perubahan_kk_WNI.pdf', 'pending', 'Lengkap'),
('001-PRJ-180719124719', '001-USER-11071907193', 'anggota1.png', 'Project Keempat', 'djsakdkjjoeon x dkasjlda', 35000000, '2019-07-18', '2020-01-18', 'chef-156108__340.png', 'form_permohonan_perubahan_kk_WNI1.pdf', 'berjalan', 'Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan_user`
--

CREATE TABLE `tanggapan_user` (
  `id_tanggapan_user` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggal_pos` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan_user`
--

INSERT INTO `tanggapan_user` (`id_tanggapan_user`, `id_user`, `isi`, `tanggal_pos`) VALUES
(1, '001-USER-11071907193', 'hadadkks ncnnckskmkd hewkdklaskdd mnxn<mmzo hfkdklaswwsl djo3jkjammas gdufhiisjjians 3njkajdosodj jfjhshkfh skehajjajbja', '2019-07-17'),
(3, '001-USER-12071908433', 'hdsfjksjdn kslkalklsa nkdkjflksl ueojdskmx mcmxslsas jdlkdakpwpkd ncjdjhsuhuurb mnkxnkldas djowodjoeoo ', '2019-07-18'),
(4, '001-USER-10071904412', 'kdooas hisdiisjd wtuehidajd ndhsuken kjsdjoejod nshaklask bchdueka jdhiew,alxkl hdjdlowiodj jskasale', '2019-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text,
  `telepon` varchar(15) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `tanggal_join` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `foto`, `email`, `password`, `tanggal_lahir`, `alamat`, `telepon`, `pekerjaan`, `tanggal_join`) VALUES
('001-USER-04081902070', 'Hamba', '', 'hamba@gmail.com', '$2y$10$FSgyXMH2z3qDKdQ2IksG3eUYnZ1ocGCHK3EkQ2o32yHmlV2lXwyHi', '0000-00-00', NULL, NULL, NULL, '2019-04-08 14:07:42'),
('001-USER-10071904412', 'Aan Yuni Adi Saputri', '', 'aanyas@gmail.com', '$2y$10$NQ9.lJ8hM.E4uX6p9jKC.OGcacGlBiT2ioeuhH2wN5MQRqKwRHjsq', '0000-00-00', '', '', '', '2019-10-07 16:41:44'),
('001-USER-11071907193', 'Nining Parwati', '', 'niningparwati04@gmail.com', '$2y$10$.llex2vWgsoWLIybhm/MNe2GXkBU3BhZIYajGi3gPWYWjsdwpzTsC', '0000-00-00', NULL, NULL, NULL, '2019-11-07 19:19:54'),
('001-USER-12071908433', 'Zahra Dhia', '', 'zahra@gmail.com', '$2y$10$K.tgtShnMO74WSNMoTNGI.6LBnljX5YLwIJ8SGui2T8oUZhbZ0mzC', '0000-00-00', NULL, NULL, NULL, '2019-12-07 20:44:21'),
('001-USER-18071911100', 'User Satu', '', 'usersatu@gmail.com', '$2y$10$8ZVTglVsrey4C.WhEJ6s/O6OWVoHeWWGuRlE7OoX11wbZBrGX5aoG', '0000-00-00', NULL, NULL, NULL, '0000-00-00 00:00:00'),
('001-USER-18071911544', 'User Kedua', '', 'userkedua@gmail.com', '$2y$10$O4YPc7n3F29wx5W3SHGGbu8BgMJksDQeM7yf36eulk5cI2M54ijQm', '0000-00-00', NULL, NULL, NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `artikel_ibfk_1` (`id_kategori`);

--
-- Indexes for table `benefit`
--
ALTER TABLE `benefit`
  ADD PRIMARY KEY (`id_benefit`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `id_benefit` (`id_benefit`),
  ADD KEY `donasi_ibfk_1` (`id_user`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `tanggapan_user`
--
ALTER TABLE `tanggapan_user`
  ADD PRIMARY KEY (`id_tanggapan_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benefit`
--
ALTER TABLE `benefit`
  MODIFY `id_benefit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tanggapan_user`
--
ALTER TABLE `tanggapan_user`
  MODIFY `id_tanggapan_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id_kategori`);

--
-- Constraints for table `benefit`
--
ALTER TABLE `benefit`
  ADD CONSTRAINT `benefit_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Constraints for table `tanggapan_user`
--
ALTER TABLE `tanggapan_user`
  ADD CONSTRAINT `tanggapan_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
