-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2019 pada 02.23
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `foto`, `email`, `password`, `nama`, `tangal_lahir`, `alamat`, `telepon`, `tanggal_join`) VALUES
('ADM0001', '', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'Admin Pertama', '0000-00-00', '', '', '2019-11-08 15:45:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
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
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_kategori`, `id_admin`, `judul`, `pengarang`, `tanggal_pos`, `isi`, `foto`, `status`) VALUES
('001-ART-10111930', 5, 'ADM0001', 'Makanan Khas Bandung', 'Nining', '2019-11-10', 'Seblak adalah makanan khas dari Bandung', 'umkm.PNG', 'berjalan'),
('001-ART-11071931', 2, '001-ADM-08071931', 'Artikel Ekonomi', 'Nining', '2019-12-02', '<div xss=removed><b>ARTIKEL EKONOMI</b></div><div xss=removed><b><br></b></div><div xss=removed>hahahahhhaa hhhahhdhhaha slcmsdlld fklsamxadjkel dsklf;sfl;ekfkf mncjfhuelsko djf ksljkjfoeidjks</div>', 'Being-an-authentic-leader1.png', 'berjalan'),
('001-ART-12071931', 3, '001-ADM-08071931', 'UMKM Asal Bandung Ini Memiliki Omzet Rp 25 Juta per Bulan', 'Reza', '2019-07-14', 'Peranan Usaha Mikro, Kecil, dan Menengah (UMKM) di perekonomian nasional terhitung cukup besar. Kementerian Koperasi dan Usaha Kecil Menengah (Kemenkop UKM) 2018 menunjukkan bahwa total pelaku UMKM di Indonesia mencapai 59,2 juta orang.  Jumlah tersebut tentu mampu membuat perekonomian suatu daerah bahkan negara meningkat.\r\n\r\nSalah satu daerah penghasil UMKM terbanyak ialah Bandung. Yap, Kota Kembang itu memang terkenal akan kerajinan tangan yang bisa menghasilkan keuntungan. Data terkini, terdapat 300 ribuan UMKM di Bandung.', 'artikel1.jfif', 'berjalan'),
('010-ART-09071931', 1, '001-ADM-08071931', 'Koperasi dan UMKM Gandeng Generasi Muda di Era Industri 4.0', 'SINDOnews', '2019-12-02', 'KOTA BANDUNG - Wakil Gubernur Jawa Barat Uu Ruzhanul Ulum mendorong koperasi dan Usaha Mikro Kecil dan Menengah (UMKM) agar mampu bersaing di era revolusi industri 4.0. Salah satunya dengan memanfaatkan ruang digital atau e-commerce dengan sebaik-baiknya.\r\n\r\n\"Baik penjual maupun pembeli sama-sama membutuhkanya, karena e-commerce tidak saja menawarkan kemudahan, tetapi juga efisiensi waktu, tenaga dan biaya,\" kata Uu saat membuka acara Cooperative Fair 2019 dengan tema ‘Generasi Milenial Jabar Juara’ di Plaza Metro Indah Mall, Kota Bandung, Jumat (23/8/19).\r\n\r\nMenurut Uu, tantangan koperasi dan UMKM saat ini tidak hanya soal bagaimana memanfaatkan teknologi informasi yang terus berkembang, tetapi juga mengubah pola pikir dan sistem tata kelola usaha. Maka itu, kapabilitas Sumber Daya Manusia (SDM) harus ditingkatkan.', '57I3gHbs_400x400.jpg', 'berjalan'),
('011-ART-09071931', 3, '001-ADM-08071931', 'LA LA LA', 'Saya', '2019-12-02', 'kakakakakakakaka kikikikikikikikikikiki kukukukukukukukuku kekekekekekekekekeke kokokokokokokokoko', 'images.jpg', 'berjalan'),
('012-ART-09071931', 1, '001-ADM-08071931', 'PAM PAM PAM', 'Unknow', '2019-11-10', '<p>ppppppppppppppppppp uuuuuuuuuuuuuuuuuuuu yyyyyyyyyyyyyyyyyyyyyyyy</p>', 'anggota.png', 'selesai'),
('013-ART-09071931', 3, '001-ADM-08071931', 'TANPA JUDUL', 'Unknow', '2019-12-02', '<p>hahahahahahahahah hahahahahahahaha hahahahahahaha hahahahahahahaha hahahahahahaha hahahahaahaha hahahahahahahaha hahahahahahaha hahahahahahahaha hahahahaahahaha</p>', 'Being-an-authentic-leader.png', 'berjalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `benefit`
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
-- Dumping data untuk tabel `benefit`
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
(29, '001-PRJ-180719012743', 'Benefit 1', '10000000', '20000000', 'llll'),
(30, '001-PRJ-021219085624', 'Benefit 1', '100000', '1000000', 'Miniatur patung kaca'),
(31, '001-PRJ-021219085624', 'Benefit 2', '1000000', '2000000', 'Patung Kaca ukuran sedang'),
(32, '001-PRJ-150919073128', 'Benefit 1', '5000000', '20000000', 'miniatur barang'),
(33, '001-PRJ-161219051819', 'Benefit 1', '1000000', '5000000', 'barokah'),
(34, '001-PRJ-161219084505', 'Benefit 1', '10000', '4000000', 'miniatur project'),
(35, '001-PRJ-161219084505', 'Benefit 2', '1000000', '5000000', 'Sebagian dari project');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` varchar(25) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_project` varchar(20) NOT NULL,
  `id_benefit` int(11) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `tanggal_donasi` date NOT NULL,
  `status_benefit` enum('Menunggu Konfirmasi','Benefit Sudah Dikirim') NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `status` enum('pending','berhasil','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_user`, `id_project`, `id_benefit`, `nominal`, `tanggal_donasi`, `status_benefit`, `bukti_pembayaran`, `status`) VALUES
('001-DNS-161219033618', '001-USER-10071904412', '001-PRJ-180719124719', 26, '200000', '2019-12-16', 'Menunggu Konfirmasi', '52.jpg', 'pending'),
('001-DNS-180919060039', '001-USER-12071908433', '001-PRJ-140719113546', 18, '10000000', '2019-09-18', 'Benefit Sudah Dikirim', 'bg.jpg', 'berhasil'),
('001-DNS-180919062200', '001-USER-12071908433', '001-PRJ-110719072020', 7, '5000000', '2019-09-18', 'Menunggu Konfirmasi', 'download4.jpg', 'pending'),
('001-DNS-260819110749', '001-USER-12071908433', '001-PRJ-140719113546', 18, '20000000', '2019-08-26', 'Benefit Sudah Dikirim', 'chef-156108__34061.png', 'berhasil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sosial'),
(2, 'Ekonomi'),
(3, 'Teknologi'),
(5, 'Makanann');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pendanaan`
--

CREATE TABLE `kategori_pendanaan` (
  `id_pendanaan` int(11) NOT NULL,
  `nama_pendanaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_pendanaan`
--

INSERT INTO `kategori_pendanaan` (`id_pendanaan`, `nama_pendanaan`) VALUES
(1, 'Usaha'),
(2, 'Project'),
(3, 'Kegiatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
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
  `status_data` varchar(20) NOT NULL,
  `tingkat` enum('standar','medium','','') NOT NULL,
  `jenis_pendanaan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_project`, `id_user`, `foto`, `nama`, `detail`, `dana_dibutuhkan`, `tanggal_buat`, `tanggal_berakhir`, `surat_perjanjian`, `proposal`, `status`, `status_data`, `tingkat`, `jenis_pendanaan`) VALUES
('001-PRJ-021219085624', '001-USER-02121908540', 'patungkaca1.jpg', 'Patung Kaca', 'patung yang terbuat dari kaca yang dapat digunakan sebagai hiasan maupun oleh - oleh', 5500000, '2019-12-02', '2020-06-02', 'permohonan_pindah_antar_kota_atau_provinsi1.pdf', 'form_permohonan_kk_baru_WNI2.pdf', 'pending', 'Lengkap', 'standar', ''),
('001-PRJ-110719072020', '001-USER-11071907193', 'perca.jpg', 'Usaha Kerajinan Kain Perca', 'Kain perca dapat dimanfaatkan untuk menciptakan berbagai produk. Salah satu orang yang terinspirasi untuk memproduksi barang dari kain perca adalah Tina Agustina. Lewat brand Perca Perca, Tina memberikan berbagai pilihan barang unik sekaligus limited edition yang terbuat dari kain perca. Pada 2009 lalu, Tina memulai usaha dengan mengikuti sebuah pameran craft (kerajinan), dia melihat salah satu peserta pameran menjual barang-barang dari kain perca yang berasal dari Solo. “Peminat kerajinan tersebut banyak sekali. Hanya sayang kualitas dan desainnya tidak seperti yang diharapkan, “ ujar Tina. Tina terpikir untuk mengeksplorasi produk tersebut dengan sentuhan yang sedikit berbeda, yakni kualitas jahitan dan desain serta diferensiasi produk yang cukup banyak. Untuk bahan baku, kain perca batik didapatkan dari Solo dan Yogyakarta. Sedangkan untuk kain selain batik didapatkan dari Bandung dan sekitarnya. Perca Perca mengeluarkan beragam  produk. Harganya mulai  Rp35.000 hingga jutaan rupiah. Produknya a.l. bed cover, bed runner, table runner, taplak kulkas, tutup galon, sarung bantal lantai, sejadah, tempat tissue, softcase laptop, dompet kosmetik, tas kulit combine perca, dan tas imitasi combine perca. Produk lainnya adalah 1 set chusion (sarung bantal kursi + taplak panjang) dan 1 set placemate (alas piring). “Produk kami limited edition dan desainnya eksklusif, karena terbuat dari kain perca yang jumlahnya terbatas, “ tuturnya. Tina memberdayakan perempuan dari masyarakat sekitar tempat tinggalnya, daerah Awiligar, Bandung, untuk mengerjakan produk Perca Perca. Hasilnya, produk tersebut sudah menarik pembeli dari Jawa, Sumatra, dan Kalimantan. “Kalau pameran, orang Eropa dan Jepang juga selalu membeli produk perca kami, “ kata Tina. Melihat produk Perca Perca cukup unik dan berbeda dengan yang lain, banyak orang yang ingin belajar membuat produk dari perca.  Namun sejauh ini belum terfasilitasi pelatihan karena keterbatasan tenaga kerja. “Tidak mudah untuk mencari tenaga kerja yang terampil dan menyukai kerajinan perca ini, serta menyesuaikan desain dengan ketersediaan kain perca,” katanya.(k60/yri) FB : Perca Perca Bandung Twitter : @Perca2Bdg www.percaperca.com', 30000000, '2019-07-11', '2020-01-11', 'form_permohonan_kk_baru_WNI.pdf', 'permohonan_pindah_datang_dalam_desa.pdf', 'berjalan', 'Lengkap', 'medium', 'Project'),
('001-PRJ-110719080142', '001-USER-11071907193', 'mizone1.jpg', 'Jembatan Layang', 'Jembatan yang dibangun dengan arsitektur yang unik dan menarik', 55000000, '2019-07-11', '2020-01-11', 'permohonan_pindah_antar_kota_atau_provinsi.pdf', 'keterangan_kelahiran1.pdf', 'tolak', 'Lengkap', 'standar', 'Project'),
('001-PRJ-110719081954', '001-USER-10071904412', 'kepemimpinan-etis-melakukan-sesuatu-yang-benar.jpg', 'Project Pertama Saya', 'bismillah ya', 50000000, '2019-07-11', '2019-07-20', '57I3gHbs_400x400.jpg', 'KTP1.pdf', 'selesai', 'Lengkap', 'standar', 'Project'),
('001-PRJ-110719082539', '001-USER-10071904412', 'merlin_137077992_cb8e07e0-a188-45fb-9ee0-2c81adf18f6d-articleLarge1.jpg', 'Project Kelompok', 'hehehe', 20000000, '2019-07-11', '2019-07-11', 'ds.png', 'pencatatan_perceraian.pdf', 'selesai', 'Lengkap', 'standar', 'Usaha'),
('001-PRJ-120719012149', '001-USER-11071907193', 'craft.png', 'Usaha Kerajian Tangan', 'Usaha kerajinan tangan atau produk handmade memiliki prospek atau peluang usaha yang bagus. Terlebih jika Anda memiliki minat dalam seni dan kreativitas maka untuk memulai usaha ini sangatlah mudah. Selain itu, usaha kerajinan tangan juga sangat cocok untuk usaha dengan modal kecil. Anda dapat memulai nya dengan memanfaatkan limbah bekas yang sudah tidak terpakai. Olahlah limbah tersebut menjadi produk yang unik dan bermanfaat. Contohnya seperti tas, dompet, kalung, gelang, anting, dan sebagainya. Buatlah produk kerajinan yang menjadi buruan wisatawan-wisatawan yang datang ke Bandung. Akan lebih baik lagi jika Anda dapat membuat produk handmade yang dapat menjadi ciri khas oleh-oleh kota kembang tersebut.', 10000000, '2019-07-12', '2020-01-12', 'pencatatan_perceraian.pdf', 'JSoft_-_Surat_Penawaran_Produk_dan_Jasa_Pratistha_Hasra.pdf', 'berjalan', 'Lengkap', 'standar', 'Usaha'),
('001-PRJ-140719111334', '001-USER-11071907193', 'rotan.jpg', 'Usaha Kerajinan Rotan', 'ROTAN yang dijadikan kerajinan rotan adalah hasil hutan yang banyak dihasilkan di Indonesia. Rotan banyak ditemukan di hutan-hutan di Sumatra, Jawa, Kalimantan, Sulawesi, dan Nusa Tenggara. Indonesia merupakan pemasok rotan terbesar di dunia hingga 70 persen. Sebanyak 30 persen lagi rotan dipasok dari Malaysia, Filipina, Sri Lanka, dan Bangladesh.\r\n\r\nRotan sebelum digunakan untuk bahan baku termasuk untuk kerajinan rotan  harus melalui pengolahan terlebih dahulu. Rotan dimasak dengan minyak tanah untuk rotan berukuran sedang/besar dan melakukan pengasapan dengan belerang untuk rotan berukuran kecil.', 100000000, '2019-07-14', '2020-01-14', 'KTP.pdf', 'form_permohonan_kk_baru_WNI.pdf', 'berjalan', 'Lengkap', 'standar', 'Usaha'),
('001-PRJ-140719113546', '001-USER-10071904412', 'fashion.jpg', 'Usaha Fashion Bandung', 'Bandung merupakan kota yang sangat populer dengan bisnis fashion atau pakaian. Hal ini karena di sana ada banyak sekali tempat belanja pakaian yang murah dan berkualitas. Selain banyaknya tempat belanja, Bandung juga dikenal melahirkan tren fashion dengan inovasi dan kreativitas yang tidak terbatas. Sehingga tidak heran, ada banyak orang yang datang ke Bandung untuk membeli pakaian baik dipakai sendiri maupun untuk dijual kembali.\r\n\r\nPesatnya bisnis ini membuat peluang usaha di bidang pakaian terbuka lebar. Bisnis fashion merupakan salah satu bisnis yang dapat disesuaikan dengan modal yang dimiliki. Jika Anda memiliki modal kecil, Anda dapat membuka usaha atau toko pakaian di daerah yang banyak dikunjungi wisatawan, contohnya seperti Ciampelas dan Dago. Selain membuka usaha di tempat tersebut, untuk menambahkan keuntungan, Anda pun dapat membuka bisnis online. Mengingat bisnis online kini juga sangat menguntungkan', 50000000, '2019-07-14', '2020-01-14', 'pelaporan_mati_WNI.pdf', 'keterangan_kelahiran2.pdf', 'berjalan', 'Lengkap', 'standar', 'Kegiatan'),
('001-PRJ-150919073128', '001-USER-10071904412', '', 'Usaha UMKM', 'Usaha kecil menengah (UKM) adalah salah satu motor penggerak perekonomian di negara kita. Bahkan menurut informasi yang saya baca di berbagai media informasi, Usaha mikro, kecil, dan menengah (UMKM) merupakan ‘tulang punggung’ perekonomian di Indonesia.\r\n\r\nUsaha kecil menengah (UKM) yang ada di negara kita ini menyumbang sekitar 60?ri PDB (Product Domestic Bruto) dan juga memberikan kesempatan kerja pada banyak masyarakat kita. Jadi, bisnis UKM (Usaha Kecil Menengah) di Indonesia akan terus berkembang dan memberikan peluang usaha yang menguntungkan bagi mereka yang menyukai dunia wirausaha.', 15000000, '2019-09-15', '2020-03-15', '', '', 'berjalan', 'Lengkap', 'standar', ''),
('001-PRJ-161219051819', '001-USER-10071904412', 'Formal_Fashion.PNG', 'Project Mahasiswa Baru', 'ini project kreatif dari mahasiswa baru', 20000000, '2019-12-16', '2020-06-16', '(KSM)_NINING_PARWATI.pdf', '(DAFTAR_NILAI)_NINING_PARWATI.pdf', 'berjalan', 'Lengkap', 'standar', ''),
('001-PRJ-161219084505', '001-USER-10071904412', 'anggota11.png', 'Jembatan Layang', 'jembatan layang adalah jembatan yang menghubungan dua daerah', 10000000, '2019-12-16', '2020-01-16', 'keterangan_kelahiran1.pdf', 'form_permohonan_perubahan_kk_WNI11.pdf', 'pending', 'Belum Lengkap', 'standar', ''),
('001-PRJ-180719012743', '001-USER-10071904412', 'chef-156108__340.png', 'Project Baru', 'kjkkjbbhb', 55000000, '2019-07-18', '2020-01-18', 'KTP2.pdf', 'form_permohonan_kk_baru_WNI1.pdf', 'tolak', 'Lengkap', 'medium', 'Usaha'),
('001-PRJ-180719110427', '001-USER-12071908433', 'sepatu.png', 'Usaha Sepatu Bandung', 'Keuntungan bisnis sepatu selain pangsa pasar yang sangat luas dan banyak pilihan produsen, usaha ini juga dapat dijalankan sebagai bisnis kecil-kecilan dengan modal minim bahkan nol. Anda cukup berbekal katalog atau brosur yang diberikan pabrik usaha pembuatan sepatu yang kemudian diedarkan ke sejumlah teman dan lingkungan terdekat. Jika ada orang yang memesan sepatu maka sobat bisa menghubungi pihak pabrik untuk menanyakan kesediaan stok barang tersebut.  Uang muka dari pembelian sepatu bisa anda ambil sebagai keuntungan.', 50000000, '2019-07-18', '2020-01-18', 'images.jpg', 'pencatatan_perkawinan.pdf', 'berjalan', 'Lengkap', 'medium', 'Usaha'),
('001-PRJ-180719111048', '001-USER-18071911100', 'Keripik Pisang.jpg', 'Usaha Keripik Pisang Rasa', ' keripik pisang kepok adalah salah satu komoditi perkebunan yang banyak\r\ndihasilkan oleh para petani, dengan harapan memberdayakan warga, membeli\r\nhasil perkebunan cocok tanam pisang sehinga hasil pisang panenan dapat terserap,\r\ndbantu oleh tenaga ahli pengolahan makanan ringan keripik pisang coklat ini\r\nbrand banana harajuku lahir, dengan filosofi (hanya rajin jualan untuk dapat sukses)\r\nkini alhamdulillah bisa menjadi kuliner lezat untuk hidangan saat santai bersama\r\nkerabat, rekan kerja dan juga keluarga', 40000000, '2019-07-18', '2020-01-18', 'Being-an-authentic-leader.png', 'permohonan_pindah_antar_desa_dalam_1_kecamatan.pdf', 'berjalan', 'Lengkap', 'standar', 'Kegiatan'),
('001-PRJ-180719123854', '001-USER-11071907193', 'ds.png', 'Project Ketiga', 'shdkakdx, x', 30000000, '2019-07-18', '2020-01-18', 'KTP1.pdf', 'form_permohonan_perubahan_kk_WNI.pdf', 'tolak', 'Lengkap', 'medium', 'Usaha'),
('001-PRJ-180719124719', '001-USER-11071907193', 'kerajinan tangan.jfif', 'Usaha Kerajinan Kayu', 'Usaha kerajinan tangan atau produk handmade mempunyai prospek atau kesempatan usaha yang bagus. Terlebih apabila Anda mempunyai minat dalam kreatifitas dan seni maka untuk mengawali usaha ini sangat gampang. Disamping itu, usaha kerajinan tangan juga begitu cocok untuk usaha dengan modal kecil. Sehingga Anda bisa mengawali nya dengan memakai limbah bekas yang telah tidak terpakai. Dengan begitu olahlah limbah itu jadi produk yang bermanfaat dan unik. Misalnya seperti dompet, tas, kalung, anting, gelang dan lain-lain. Bikinlah produk kerajinan yang jadi buruan wisatawan yang berkunjung ke Bandung. Akan lebih baik lagi apabila Anda bisa membuat produk handmade yang bisa jadi ciri-ciri oleh-oleh kota kembag/bandung itu', 35000000, '2019-07-18', '2020-01-18', 'chef-156108__340.png', 'form_permohonan_perubahan_kk_WNI1.pdf', 'berjalan', 'Lengkap', 'standar', 'Kegiatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `id_project` varchar(255) NOT NULL,
  `jenis_request` text NOT NULL,
  `status` enum('pending','proses','selesai','') NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_project` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id_request`, `id_project`, `jenis_request`, `status`, `deskripsi`, `foto_project`) VALUES
(1, '001-PRJ-180719124719', 'Permintaan Laporan Progress Project', 'pending', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan_user`
--

CREATE TABLE `tanggapan_user` (
  `id_tanggapan_user` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggal_pos` date NOT NULL,
  `status` enum('aktif','tidak aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggapan_user`
--

INSERT INTO `tanggapan_user` (`id_tanggapan_user`, `id_user`, `isi`, `tanggal_pos`, `status`) VALUES
(6, '001-USER-12071908433', 'Aplikasi ini sangat membantu saya dalam mencari dana untuk mengembangkan usaha yang saya miliki', '2019-09-18', 'aktif'),
(8, '001-USER-10071904412', 'aplikasi ini sangat membantu kami para pelaku UMKM dalam menggalang dana untuk mengembangkan usaha', '2019-12-16', 'aktif'),
(9, '001-USER-10071904412', 'aplikasinya sangat membantu sekali', '2019-12-16', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
  `tanggal_join` datetime NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `foto`, `email`, `password`, `tanggal_lahir`, `alamat`, `telepon`, `pekerjaan`, `tanggal_join`, `status`) VALUES
('001-USER-02121908540', 'ayas', '', 'ayas@gmail.com', '$2y$10$v7sDDn74revkt4Nf3CgBuOWWwPAI62PMFltjNRQ8JX3N8XOIaUqeG', '0000-00-00', NULL, NULL, NULL, '2019-02-12 08:55:06', 'Tidak Aktif'),
('001-USER-04081902070', 'Hamba Allah', '', 'hamba@gmail.com', '$2y$10$FSgyXMH2z3qDKdQ2IksG3eUYnZ1ocGCHK3EkQ2o32yHmlV2lXwyHi', '0000-00-00', '', '', '', '2019-04-08 14:07:42', 'Tidak Aktif'),
('001-USER-10071904412', 'Aan Yuni Adi Saputri', '', 'aanyas@gmail.com', '$2y$10$NQ9.lJ8hM.E4uX6p9jKC.OGcacGlBiT2ioeuhH2wN5MQRqKwRHjsq', '0000-00-00', '', '', '', '2019-10-07 16:41:44', 'Tidak Aktif'),
('001-USER-11071907193', 'Nining Parwati', '', 'niningparwati04@gmail.com', '$2y$10$.llex2vWgsoWLIybhm/MNe2GXkBU3BhZIYajGi3gPWYWjsdwpzTsC', '0000-00-00', NULL, NULL, NULL, '2019-11-07 19:19:54', 'Aktif'),
('001-USER-12071908433', 'Zahra Dhia Syarafana', '', 'zahra@gmail.com', '$2y$10$K.tgtShnMO74WSNMoTNGI.6LBnljX5YLwIJ8SGui2T8oUZhbZ0mzC', '0000-00-00', '', '', '', '2019-12-07 20:44:21', 'Aktif'),
('001-USER-17091907204', 'irfan hs', '', 'irfan@gmail.com', '$2y$10$iXQyLattRp5xGtohuqCyY.tGJ3SQC9IyawzBK6DzfFtKr/LSp4GQO', '0000-00-00', NULL, NULL, NULL, '0000-00-00 00:00:00', 'Tidak Aktif'),
('001-USER-18071911100', 'User Satu', '', 'usersatu@gmail.com', '$2y$10$8ZVTglVsrey4C.WhEJ6s/O6OWVoHeWWGuRlE7OoX11wbZBrGX5aoG', '0000-00-00', NULL, NULL, NULL, '0000-00-00 00:00:00', 'Tidak Aktif'),
('001-USER-18071911544', 'User Kedua', '', 'userkedua@gmail.com', '$2y$10$O4YPc7n3F29wx5W3SHGGbu8BgMJksDQeM7yf36eulk5cI2M54ijQm', '0000-00-00', NULL, NULL, NULL, '0000-00-00 00:00:00', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `artikel_ibfk_1` (`id_kategori`);

--
-- Indeks untuk tabel `benefit`
--
ALTER TABLE `benefit`
  ADD PRIMARY KEY (`id_benefit`),
  ADD KEY `id_project` (`id_project`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `id_benefit` (`id_benefit`),
  ADD KEY `donasi_ibfk_1` (`id_user`),
  ADD KEY `id_project` (`id_project`);

--
-- Indeks untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kategori_pendanaan`
--
ALTER TABLE `kategori_pendanaan`
  ADD PRIMARY KEY (`id_pendanaan`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `tanggapan_user`
--
ALTER TABLE `tanggapan_user`
  ADD PRIMARY KEY (`id_tanggapan_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `benefit`
--
ALTER TABLE `benefit`
  MODIFY `id_benefit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tanggapan_user`
--
ALTER TABLE `tanggapan_user`
  MODIFY `id_tanggapan_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `benefit`
--
ALTER TABLE `benefit`
  ADD CONSTRAINT `benefit_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Ketidakleluasaan untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`);

--
-- Ketidakleluasaan untuk tabel `tanggapan_user`
--
ALTER TABLE `tanggapan_user`
  ADD CONSTRAINT `tanggapan_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
