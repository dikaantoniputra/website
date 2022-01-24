-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2021 pada 11.10
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokogame`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(12) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, '04220012', 'dika', 'dika antoni putra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Playstation'),
(2, 'pc'),
(3, 'STIK PS\r\n'),
(4, 'kaset ps'),
(5, 'XBOX'),
(6, 'STIK XBOX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'jakarta', 19000),
(2, 'bandung', 21000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `gambar_profile` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon`, `alamat_pelanggan`, `gambar_profile`) VALUES
(1, 'dikaantoniputra@gmail.com', 'dika', 'dika hangggara putra hangara', '082264463640', '																																																		wwwww																																																																									', 'Desain tanpa judul.png'),
(3, 'wimaputra@gmail.com', 'wimaputra', 'wima kagebunsin', '082264463640', '           										        ', 'dika.jpeg'),
(4, 'dikaantoniputra17@gmail.com', 'dwda', 'wadwa', '222222222222222', '222222222222', ''),
(5, 'dikahanggara2@gmail.com', 'dikaantoni putra', 'bh', 'wadadawdaw', 'dwadawd', ''),
(6, 'rachmat@gmail.com', 'dika', 'rachmat', '', '', ''),
(7, 'bh@gmail.com', 'bh', 'bh', '', '', ''),
(8, 'dikaantoniputra171@gmail.com', 'dika', 'dika hanggara2', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(9, 35, 'wadwa', '2312', 2147483647, '2021-10-18', '20211018140905');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_lengkap` varchar(150) NOT NULL,
  `kodepos` varchar(100) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_lengkap`, `kodepos`, `status_pembelian`, `resi_pengiriman`) VALUES
(35, 1, 2, '2021-10-18', 6021000, 'bandung', 21000, 'bluaran', '60275', 'sudah kirim pembayaran', ''),
(36, 1, 1, '2021-10-19', 111000, 'jakarta', 21000, 'bluaran', '324124', 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(53, 35, 28, 1, 'PS 5', 6000000, 70, 70, 6000000),
(54, 36, 24, 1, 'ps3 fat', 90000, 80000, 80000, 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `berat_produk` int(100) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(22, 1, 'PS 2 FAT HDD 160gb', 200000, 3000, 'sony_ps2-fat-sony-hardisk_full02.jpg', '                      SONY PS3 SUPERSLIM OFW/HFW\r\nHDD 160GB FULLGAME....\r\nHARDISK INTERNAL\r\nSERI CECH- 4000/4200/4300 REFURBISH JEPANG(RANDOM)\r\nSEGEL VOID\r\nMESIN REFURBISH\r\nSUDAH DIINSTALL HEN DAN MULTIMAN.\r\nSUPPORT HARDISK EXTERNAL....\r\n\r\nPAKET KOMPLIT SIAP MAEN...\r\n▪︎SONY PLAYSTATION 3\r\nSUPER SLIM\r\n▪︎HARDISK 160GB FULLGAME\r\n▪︎ 2~STICK ORIGINAL PABRIK\r\n▪︎1~KABEL HDMI\r\n▪︎1~KABEL USB STICK\r\n▪︎1~DUS PS3                ', 50),
(23, 1, 'ps 2slim ', 400000, 400, 'ps2slim.jfif', '                      Sony Playstation PS2 Seri Slim Hardisk Usb \r\n\r\nBrand: Sony Selanjutnya \r\n\r\nVideo Game dari Sony\r\n\r\nSony Playstation PS2 Seri Slim \r\n\r\nProduct details of Sony Playstation PS2 Seri Slim \r\n\r\nSony PS2 dengan prosesor 300Mhz memungkinkan Anda memainkan setiap genre games Playstation dengan kualitas gambar yang jernih dan tajam, dengan kualitas suara mengagumkan yang hampir mendekati pengalaman menonton film. \r\n\r\nFitur Lengkap\r\nSony Playstation 2 ini dapat menjadi pilihan Anda untuk memainkan berbagai bentuk game yang seru dan sangat menarik. Dari mulai game yang berhubungan dengan petualangan, hingga game berbentuk olah raga. Konsol yang dibekali dengan dual shock serta analog ini dapat mempermudah permainan game Anda, serta membuatnya semakin seru untuk dimainkan.\r\n\r\nSehingga Ps2 menjadi lebih awet, dan mudah untuk mengganti permainan\r\nSpesifikasi Sony Playstation PS2 \r\nSeri Slim \r\n\r\nApa yang ada di dalam kotak:	\r\n\r\n1 Pcs PS2 Slim multi optik / bisa kaset \r\n\r\n2 Pcs Stick Analog Getar Original \r\n\r\n1 Pcs AV cable power\r\n\r\n1 Pcs Hardisk Usb Hdd 120Gb + Game\r\n\r\nConsole PS2 Slim Tipis \r\nWarna	Hitam\r\nModel	Playstation PS2 Seri Slim Tipis rs acc                ', -1),
(24, 1, 'ps3 fat', 90000, 80000, 'ps3.jpg', '           Sony Playstation PS2 Seri Slim Hardisk Usb \r\n\r\nBrand: Sony Selanjutnya \r\n\r\nVideo Game dari Sony\r\n\r\nSony Playstation PS2 Seri Slim \r\n\r\nProduct details of Sony Playstation PS2 Seri Slim \r\n\r\nSony PS2 dengan prosesor 300Mhz memungkinkan Anda memainkan setiap genre games Playstation dengan kualitas gambar yang jernih dan tajam, dengan kualitas suara mengagumkan yang hampir mendekati pengalaman menonton film. \r\n\r\nFitur Lengkap\r\nSony Playstation 2 ini dapat menjadi pilihan Anda untuk memainkan berbagai bentuk game yang seru dan sangat menarik. Dari mulai game yang berhubungan dengan petualangan, hingga game berbentuk olah raga. Konsol yang dibekali dengan dual shock serta analog ini dapat mempermudah permainan game Anda, serta membuatnya semakin seru untuk dimainkan.\r\n\r\nSehingga Ps2 menjadi lebih awet, dan mudah untuk mengganti permainan\r\nSpesifikasi Sony Playstation PS2 \r\nSeri Slim \r\n\r\nApa yang ada di dalam kotak:	\r\n\r\n1 Pcs PS2 Slim multi optik / bisa kaset \r\n\r\n2 Pcs Stick Analog Getar Original \r\n\r\n1 Pcs AV cable power\r\n\r\n1 Pcs Hardisk Usb Hdd 120Gb + Game\r\n\r\nConsole PS2 Slim Tipis \r\nWarna	Hitam\r\nModel	Playstation PS2 Seri Slim Tipis rs acc        ', 99),
(25, 1, 'ps3 slim', 11000, 800, 'ps3slim.jpg', 'Sony Playstation PS2 Seri Slim Hardisk Usb \r\n\r\nBrand: Sony Selanjutnya \r\n\r\nVideo Game dari Sony\r\n\r\nSony Playstation PS2 Seri Slim \r\n\r\nProduct details of Sony Playstation PS2 Seri Slim \r\n\r\nSony PS2 dengan prosesor 300Mhz memungkinkan Anda memainkan setiap genre games Playstation dengan kualitas gambar yang jernih dan tajam, dengan kualitas suara mengagumkan yang hampir mendekati pengalaman menonton film. \r\n\r\nFitur Lengkap\r\nSony Playstation 2 ini dapat menjadi pilihan Anda untuk memainkan berbagai bentuk game yang seru dan sangat menarik. Dari mulai game yang berhubungan dengan petualangan, hingga game berbentuk olah raga. Konsol yang dibekali dengan dual shock serta analog ini dapat mempermudah permainan game Anda, serta membuatnya semakin seru untuk dimainkan.\r\n\r\nSehingga Ps2 menjadi lebih awet, dan mudah untuk mengganti permainan\r\nSpesifikasi Sony Playstation PS2 \r\nSeri Slim \r\n\r\nApa yang ada di dalam kotak:	\r\n\r\n1 Pcs PS2 Slim multi optik / bisa kaset \r\n\r\n2 Pcs Stick Analog Getar Original \r\n\r\n1 Pcs AV cable power\r\n\r\n1 Pcs Hardisk Usb Hdd 120Gb + Game\r\n\r\nConsole PS2 Slim Tipis \r\nWarna	Hitam\r\nModel	Playstation PS2 Seri Slim Tipis rs acc', 80),
(26, 1, 'ps4', 300000, 800, 'ps4.jpg', 'Sony Playstation PS2 Seri Slim Hardisk Usb \r\n\r\nBrand: Sony Selanjutnya \r\n\r\nVideo Game dari Sony\r\n\r\nSony Playstation PS2 Seri Slim \r\n\r\nProduct details of Sony Playstation PS2 Seri Slim \r\n\r\nSony PS2 dengan prosesor 300Mhz memungkinkan Anda memainkan setiap genre games Playstation dengan kualitas gambar yang jernih dan tajam, dengan kualitas suara mengagumkan yang hampir mendekati pengalaman menonton film. \r\n\r\nFitur Lengkap\r\nSony Playstation 2 ini dapat menjadi pilihan Anda untuk memainkan berbagai bentuk game yang seru dan sangat menarik. Dari mulai game yang berhubungan dengan petualangan, hingga game berbentuk olah raga. Konsol yang dibekali dengan dual shock serta analog ini dapat mempermudah permainan game Anda, serta membuatnya semakin seru untuk dimainkan.\r\n\r\nSehingga Ps2 menjadi lebih awet, dan mudah untuk mengganti permainan\r\nSpesifikasi Sony Playstation PS2 \r\nSeri Slim \r\n\r\nApa yang ada di dalam kotak:	\r\n\r\n1 Pcs PS2 Slim multi optik / bisa kaset \r\n\r\n2 Pcs Stick Analog Getar Original \r\n\r\n1 Pcs AV cable power\r\n\r\n1 Pcs Hardisk Usb Hdd 120Gb + Game\r\n\r\nConsole PS2 Slim Tipis \r\nWarna	Hitam\r\nModel	Playstation PS2 Seri Slim Tipis rs acc', 50),
(28, 1, 'PS 5', 6000000, 70, 'ps51.png', '                      PS3 SUPER SLIM 250GB\r\nSpesifikasi Sebagai Berikut :\r\n\r\n- PS3 SuperSlim Refurbish sony HDD 500 Gb + FREE Game\r\n- 2 Bh Stick Wireless\r\n- 1 Bh Cable Usb Cas Stick\r\n- 1Bh Cable Hdmi\r\n- 1 Bh Cable Power\r\n- 1 Bh Dus\r\n\r\n\r\nKami Kasih Garansi Ke Agan Utk Mesin PS3 Nya,Berikut Garansi Yang Kami Berikan :\r\n-1bln tukar baru.\r\n- 2bln sperpat.\r\n-1thn garansi service tidak termasuk sperpat selama segel tidak dibongkar dan rusak\r\n\r\n\r\nSYARAT & KETENTUAN GARANSI BERLAKU JIKA SEGEL GARANSI MASIH UTUH DAN BARANG MASIH LAYAK DITUKAR BARU JIKA TERJADI KERUSAKAN DALAM 1 BULAN                ', 79),
(29, 5, 'xbox360', 500000, 1000, 'xbox360.jpg', 'Xbox One adalah sebuah produk konsol permainan video rumah generasi kedelapan yang dikembangkan oleh Microsoft. Diumumkan pada Mei 2013, ini adalah penerus dari Xbox 360 dan konsol ketiga dalam keluarga Xbox. Ini pertama kali dirilis di Amerika Utara, sebagian Eropa, Australia, dan Brasil pada November 2013, dan di Jepang, Tiongkok, dan negara-negara Eropa lainnya pada September 2014. Ini adalah konsol permainan Xbox pertama yang dirilis di Tiongkok, khususnya di Zona Perdagangan Bebas Shanghai. Microsoft memasarkan perangkat ini sebagai \"sistem hiburan all in one\", oleh karena itu dinamakan Xbox One. Xbox One bersaing dengan Sony PlayStation 4 dan Nintendo Wii U dan Switch.\r\n\r\nTidak seperti Xbox sebelumnya yang mengugnakan arsitektur Power PC, Xbox One kembali ke arsitektur x86 yang digunakan pada Xbox pertama. Ditenagai dengan Accelerated Processing Unit (APU) milik AMD. Konsol menekannkan komputasi awan, jejaring sosial, dan kemuampuan untuk merekam dan membagikan klip video ataupun tangkapan layar dari permainan, atau menyiarkan langsung ke layanan steraming seperti Mixer dan Twitch. Permainan juga dapat dimainkan jauh dari konsol melalui LAN dan perangkat WIndows 10 yang mendukung. Konsol dapat memutar Cakram Blu-Ray, dan menampilkan program televisi dari dekoder atau penerima siaran untuk televisi digital terestrial dengan diperkaya dengan infromasi tambahan. Terdapat paket konsol dengan sensor Kinect, dijual dengan nama \"Kinect 2.0\", memberikan pengenalan suara dan deteksi gerak yang lebih baik.', 40),
(30, 5, 'xbox ONE', 20000000, 2500, 'xbox-one-x.jpg', '           Xbox One adalah sebuah produk konsol permainan video rumah generasi kedelapan yang dikembangkan oleh Microsoft. Diumumkan pada Mei 2013, ini adalah penerus dari Xbox 360 dan konsol ketiga dalam keluarga Xbox. Ini pertama kali dirilis di Amerika Utara, sebagian Eropa, Australia, dan Brasil pada November 2013, dan di Jepang, Tiongkok, dan negara-negara Eropa lainnya pada September 2014. Ini adalah konsol permainan Xbox pertama yang dirilis di Tiongkok, khususnya di Zona Perdagangan Bebas Shanghai. Microsoft memasarkan perangkat ini sebagai \"sistem hiburan all in one\", oleh karena itu dinamakan Xbox One. Xbox One bersaing dengan Sony PlayStation 4 dan Nintendo Wii U dan Switch.\r\n\r\nTidak seperti Xbox sebelumnya yang mengugnakan arsitektur Power PC, Xbox One kembali ke arsitektur x86 yang digunakan pada Xbox pertama. Ditenagai dengan Accelerated Processing Unit (APU) milik AMD. Konsol menekannkan komputasi awan, jejaring sosial, dan kemuampuan untuk merekam dan membagikan klip video ataupun tangkapan layar dari permainan, atau menyiarkan langsung ke layanan steraming seperti Mixer dan Twitch. Permainan juga dapat dimainkan jauh dari konsol melalui LAN dan perangkat WIndows 10 yang mendukung. Konsol dapat memutar Cakram Blu-Ray, dan menampilkan program televisi dari dekoder atau penerima siaran untuk televisi digital terestrial dengan diperkaya dengan infromasi tambahan. Terdapat paket konsol dengan sensor Kinect, dijual dengan nama \"Kinect 2.0\", memberikan pengenalan suara dan deteksi gerak yang lebih baik.        ', 200),
(31, 2, 'pc alien ware', 10000000, 50000, 'pc1.jpg', 'Komputer kantor hemat.\r\nJenis komputer kantor hemat ini adalah komputer yang memiliki harga ekonomis. Artinya komputer ini mampu menekan harga hingga harga jualnya sesuai dengan budget konsumen. Namun jangan khawatir spesifikasi komputer kantor hemat tetap dapat digunakan untuk menjalankan fungsi fungsi dasar pekerjaan kantor dengan cukup baik.\r\n\r\nKomputer kantor handal\r\nJenis komputer kantor yang satu ini mengusung konsep “komputer dengan performa terbaik” dimana tentunya spesifikasi komputer kantor handal ini lebih tinggi dibandingkan komputer pada umumnya.', 40),
(32, 2, 'pc asus rog ', 1000000000, 30000, 'pc2.1.jpg', 'Komputer kantor hemat.\r\nJenis komputer kantor hemat ini adalah komputer yang memiliki harga ekonomis. Artinya komputer ini mampu menekan harga hingga harga jualnya sesuai dengan budget konsumen. Namun jangan khawatir spesifikasi komputer kantor hemat tetap dapat digunakan untuk menjalankan fungsi fungsi dasar pekerjaan kantor dengan cukup baik.\r\n\r\nKomputer kantor handal\r\nJenis komputer kantor yang satu ini mengusung konsep “komputer dengan performa terbaik” dimana tentunya spesifikasi komputer kantor handal ini lebih tinggi dibandingkan komputer pada umumnya.', 20),
(33, 2, 'pc hp', 2000000, 20000, 'pchp2.1.png', 'Komputer kantor hemat.\r\nJenis komputer kantor hemat ini adalah komputer yang memiliki harga ekonomis. Artinya komputer ini mampu menekan harga hingga harga jualnya sesuai dengan budget konsumen. Namun jangan khawatir spesifikasi komputer kantor hemat tetap dapat digunakan untuk menjalankan fungsi fungsi dasar pekerjaan kantor dengan cukup baik.\r\n\r\nKomputer kantor handal\r\nJenis komputer kantor yang satu ini mengusung konsep “komputer dengan performa terbaik” dimana tentunya spesifikasi komputer kantor handal ini lebih tinggi dibandingkan komputer pada umumnya.', 20),
(35, 6, 'STIK XBOX ONE', 200000, 2000, 'stik xbox.jpg', '           DIKA ANTONI PUTRA        ', 30),
(36, 3, 'STIK PS 5', 20000, 2000, 'STIK PS5.png', '                      Komputer kantor hemat.\r\nJenis komputer kantor hemat ini adalah komputer yang memiliki harga ekonomis. Artinya komputer ini mampu menekan harga hingga harga jualnya sesuai dengan budget konsumen. Namun jangan khawatir spesifikasi komputer kantor hemat tetap dapat digunakan untuk menjalankan fungsi fungsi dasar pekerjaan kantor dengan cukup baik.\r\n\r\nKomputer kantor handal\r\nJenis komputer kantor yang satu ini mengusung konsep “komputer dengan performa terbaik” dimana tentunya spesifikasi komputer kantor handal ini lebih tinggi dibandingkan komputer pada umumnya.                ', 20),
(37, 3, 'STIK PS 4', 20000, 2000, 'stikps4.jpg', 'Komputer kantor hemat.\r\nJenis komputer kantor hemat ini adalah komputer yang memiliki harga ekonomis. Artinya komputer ini mampu menekan harga hingga harga jualnya sesuai dengan budget konsumen. Namun jangan khawatir spesifikasi komputer kantor hemat tetap dapat digunakan untuk menjalankan fungsi fungsi dasar pekerjaan kantor dengan cukup baik.\r\n\r\nKomputer kantor handal\r\nJenis komputer kantor yang satu ini mengusung konsep “komputer dengan performa terbaik” dimana tentunya spesifikasi komputer kantor handal ini lebih tinggi dibandingkan komputer pada umumnya.', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(7, 23, 'ps2slim.jfif'),
(8, 23, 'ps2slim1.jpg'),
(9, 23, 'ps2slim.jpg'),
(10, 22, '20211016172341ps2.jpg'),
(11, 22, '20211016172349PS2-Fat-Slim.jpg'),
(12, 22, '20211016172406sony_ps2-fat-sony-hardisk_full02.jpg'),
(13, 22, '20211016172409'),
(14, 24, 'ps3.jpg'),
(15, 24, 'ps32.jpg'),
(16, 24, 'ps31.jpg'),
(17, 25, 'ps3slim.jpg'),
(18, 25, 'ps3slim2.jpg'),
(19, 25, 'ps3slim3.jpg'),
(20, 26, 'ps4.jpg'),
(21, 26, 'ps42.jpg'),
(22, 26, 'ps43.jpg'),
(23, 27, 'ps52.jpg'),
(24, 27, 'ps5.jpg'),
(25, 27, 'ps5.png'),
(26, 28, 'ps5.png'),
(27, 28, 'ps52.jpg'),
(28, 28, 'ps5.jpg'),
(29, 29, 'xbox360.jpg'),
(30, 29, 'xbox3601.jfif'),
(31, 29, 'xbox-3602.jpeg'),
(32, 30, 'xboxone1.jpg'),
(33, 30, 'xboxone2.jpg'),
(34, 30, 'xbox-one-x.jpg'),
(35, 31, 'pc1.jpg'),
(36, 31, 'pc1.1.jpg'),
(37, 31, 'pc1.2.jpg'),
(38, 32, 'pc2.1.jpg'),
(39, 32, 'pc2.1.jfif'),
(40, 32, 'pcrog.jpg'),
(41, 33, 'pchp2.1.png'),
(42, 33, 'pc3.1.jpg'),
(43, 33, 'pc hp.jpg'),
(44, 34, 'stikps4.jpg'),
(45, 34, 'stikps4.1.jpg'),
(46, 34, 'stik4.2.webp'),
(47, 35, 'stik xbox.jpg'),
(48, 35, 'stikxbox.jpg'),
(49, 35, 'stikxbox2.jfif'),
(52, 36, '20211019064619ps5.jfif'),
(53, 36, '20211019064629PS5.1.jpg'),
(54, 37, 'stikps4.jpg'),
(55, 37, 'stik4.2.webp'),
(56, 37, 'stikps4.1.jpg'),
(57, 36, '20211019064823STIK PS5.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
