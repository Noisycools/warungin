-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2022 pada 12.12
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warungin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site administration'),
(2, 'user', 'Reguler user'),
(3, 'kurir', 'Reguler Kurir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 7),
(3, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 02:12:54', 1),
(2, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 02:24:36', 1),
(3, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 02:40:29', 1),
(4, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 02:56:40', 1),
(5, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 03:03:48', 1),
(6, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 03:04:53', 1),
(7, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 03:11:54', 1),
(8, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 03:12:47', 1),
(9, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 03:19:36', 1),
(10, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 03:55:23', 1),
(11, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 04:19:27', 1),
(12, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 06:12:37', 1),
(13, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 06:18:19', 1),
(14, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 22:57:06', 1),
(15, '::1', 'adityanh1604@gmail.com', 7, '2021-09-28 23:56:25', 1),
(16, '::1', 'adityanh1604@gmail.com', 7, '2021-09-29 01:29:34', 1),
(17, '::1', 'adityanh1604@gmail.com', 7, '2021-09-29 05:06:18', 1),
(18, '::1', 'noisycools', NULL, '2021-09-29 09:09:06', 0),
(19, '::1', 'juned', NULL, '2021-09-29 09:09:40', 0),
(20, '::1', 'adityanh1604@gmail.com', 7, '2021-09-29 09:09:51', 1),
(21, '::1', 'adityanh1604@gmail.com', 7, '2021-09-30 22:30:53', 1),
(22, '::1', 'adityanh1604@gmail.com', 7, '2021-10-01 06:40:32', 1),
(23, '::1', 'loewibu@gmail.com', 8, '2021-10-01 09:43:06', 1),
(24, '::1', 'loewibu@gmail.com', 8, '2021-10-03 07:20:33', 1),
(25, '::1', 'loewibu@gmail.com', 8, '2021-10-03 22:01:14', 1),
(26, '::1', 'loewibu@gmail.com', 8, '2021-10-04 22:24:18', 1),
(27, '::1', 'loewibu@gmail.com', 8, '2021-10-05 22:40:00', 1),
(28, '::1', 'loewibu@gmail.com', 8, '2021-10-05 22:40:16', 1),
(29, '::1', 'loewibu@gmail.com', 8, '2021-10-21 10:39:45', 1),
(30, '::1', 'loewibu@gmail.com', 8, '2021-10-21 19:24:56', 1),
(31, '::1', 'noisycools', NULL, '2021-10-21 20:02:13', 0),
(32, '::1', 'noisycools', NULL, '2021-10-21 20:02:27', 0),
(33, '::1', 'adityanh1604@gmail.com', 7, '2021-10-21 20:02:47', 1),
(34, '::1', 'loewibu@gmail.com', 8, '2021-10-21 20:04:46', 1),
(35, '::1', 'noisycools', NULL, '2021-10-21 20:05:25', 0),
(36, '::1', 'adityanh1604@gmail.com', 7, '2021-10-21 20:05:34', 1),
(37, '::1', 'adityanh1604@gmail.com', 7, '2021-10-21 20:08:28', 1),
(38, '::1', 'loewibu@gmail.com', 8, '2021-10-21 20:30:21', 1),
(39, '::1', 'loewibu@gmail.com', 8, '2021-10-25 22:51:28', 1),
(40, '::1', 'adityanh1604@gmail.com', 7, '2021-10-26 00:31:14', 1),
(41, '::1', 'adityanh1604@gmail.com', 7, '2021-10-26 14:21:53', 1),
(42, '::1', 'adityanh1604@gmail.com', 7, '2021-10-26 22:34:57', 1),
(43, '::1', 'adityanh1604@gmail.com', 7, '2021-10-26 22:55:10', 1),
(44, '::1', 'adityanh1604@gmail.com', 7, '2021-10-27 01:52:17', 1),
(45, '::1', 'adityanh1604@gmail.com', 7, '2021-10-27 02:08:21', 1),
(46, '::1', 'loewibu@gmail.com', 8, '2021-10-27 02:49:00', 1),
(47, '::1', 'adityanh1604@gmail.com', 7, '2021-10-27 23:11:50', 1),
(48, '::1', 'loewibu@gmail.com', 8, '2021-10-28 00:24:25', 1),
(49, '::1', 'adityanh1604@gmail.com', 7, '2021-10-28 02:33:39', 1),
(50, '::1', 'adityanh1604@gmail.com', 7, '2021-10-28 02:37:45', 1),
(51, '::1', 'adityanh1604@gmail.com', 7, '2021-10-28 02:40:04', 1),
(52, '::1', 'loewibu@gmail.com', 8, '2021-10-28 02:41:39', 1),
(53, '::1', 'adityanh1604@gmail.com', 7, '2021-10-28 02:42:02', 1),
(54, '::1', 'adityanh1604@gmail.com', 7, '2021-10-28 06:15:15', 1),
(55, '::1', 'loewibu@gmail.com', 8, '2021-10-28 06:52:42', 1),
(56, '::1', 'adityanh1604@gmail.com', 7, '2021-10-28 07:13:20', 1),
(57, '::1', 'loewibu@gmail.com', 8, '2021-10-28 21:50:51', 1),
(58, '::1', 'adityanh1604@gmail.com', 7, '2021-10-28 22:03:40', 1),
(59, '::1', 'adityanh1604@gmail.com', 7, '2021-10-29 02:18:38', 1),
(60, '::1', 'adityanh1604@gmail.com', 7, '2021-10-31 23:26:57', 1),
(61, '::1', 'loewibu@gmail.com', 8, '2021-10-31 23:44:42', 1),
(62, '::1', 'adityanh1604@gmail.com', 7, '2021-10-31 23:48:26', 1),
(63, '::1', 'loewibu@gmail.com', 8, '2021-10-31 23:48:49', 1),
(64, '::1', 'adityanh1604@gmail.com', 7, '2021-10-31 23:59:18', 1),
(65, '::1', 'adityanh1604@gmail.com', 7, '2021-11-22 00:31:06', 1),
(66, '::1', 'adityanh1604@gmail.com', 7, '2021-11-22 21:50:01', 1),
(67, '::1', 'adityanh1604@gmail.com', 7, '2021-11-29 07:10:07', 1),
(68, '::1', 'loewibu@gmail.com', 8, '2021-11-29 07:48:26', 1),
(69, '::1', 'adityanh1604@gmail.com', 7, '2021-11-29 07:49:24', 1),
(70, '::1', 'juned@gmail.com', 9, '2021-11-29 23:34:13', 1),
(71, '::1', 'adityanh1604@gmail.com', 7, '2021-11-30 01:16:43', 1),
(72, '::1', 'juned@gmail.com', 9, '2021-11-30 02:53:27', 1),
(73, '::1', 'noisycools', NULL, '2021-11-30 02:56:06', 0),
(74, '::1', 'adityanh1604@gmail.com', 7, '2021-11-30 02:56:24', 1),
(75, '::1', 'adityanh1604@gmail.com', 7, '2021-11-30 07:40:22', 1),
(76, '::1', 'juned@gmail.com', 9, '2021-11-30 07:40:46', 1),
(77, '::1', 'adityanh1604@gmail.com', 7, '2021-12-13 07:42:24', 1),
(78, '::1', 'adityanh1604@gmail.com', 7, '2021-12-13 07:42:26', 1),
(79, '::1', 'juned@gmail.com', 9, '2021-12-13 08:58:10', 1),
(80, '::1', 'adityanh1604@gmail.com', 7, '2021-12-13 09:07:14', 1),
(81, '::1', 'juned@gmail.com', 9, '2021-12-15 04:42:02', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(5) UNSIGNED NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nomor_kontak` varchar(20) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `no_tlp` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `email`, `no_tlp`, `username`, `password`) VALUES
(1, 'Sabri Viman Saputra', 'Gg. Hasanuddin No. 118, Dumai 24459, Sulteng', 'simbolon.himawan@utami.net', '0660 6492 9315', 'respati37', '\\p^@7@<:@!i2'),
(2, 'Wulan Maya Lestari M.Ak', 'Jr. Suniaraja No. 167, Lubuklinggau 84502, Kaltim', 'hari66@yahoo.co.id', '(+62) 601 4475 314', 'harsanto.lailasar', '5=*FjI}=fJasB'),
(3, 'Mila Paris Utami', 'Dk. Bakau Griya Utama No. 174, Jambi 33440, NTT', 'anastasia.prastuti@susanti.name', '0832 5138 938', 'upik.hassanah', 'w[cJh;u}pLI#r9rx^X'),
(4, 'Unjani Mayasari', 'Ki. Batako No. 574, Mojokerto 75871, Kaltim', 'rahman.purwanti@gmail.com', '(+62) 25 3979 638', 'kusumo.rika', '!\"hiPVjKHR'),
(5, 'Indah Usada', 'Gg. Thamrin No. 8, Lhokseumawe 98350, Sulut', 'pandu.damanik@salahudin.net', '0277 0344 554', 'atma76', 'fCb|ygEdbeu5}'),
(6, 'Kambali Hutagalung S.Gz', 'Gg. Hasanuddin No. 986, Palangka Raya 99878, NTB', 'puspita.nrima@yahoo.co.id', '0998 8517 6047', 'yuniar.paris', '1M;(l,-)gby'),
(7, 'Kariman Omar Waskita', 'Jln. Baranang No. 761, Gunungsitoli 19524, Babel', 'praba20@pudjiastuti.com', '0513 5217 353', 'siregar.ibun', 'E{FY-w{<Cr/O>Q3+'),
(8, 'Patricia Uyainah', 'Jr. Orang No. 574, Bima 47995, Babel', 'lalita.widiastuti@yahoo.com', '0912 1930 957', 'juli01', ',KIkI6N.~p?'),
(9, 'Saka Putra', 'Ki. Orang No. 635, Gunungsitoli 42245, Sumut', 'ksuwarno@jailani.or.id', '(+62) 29 1500 278', 'adriansyah.kasusra', '}$[`*m@`tNsbv]bQK'),
(10, 'Eka Waluyo S.Psi', 'Jln. Muwardi No. 155, Bau-Bau 13273, Jatim', 'wkuswandari@gmail.co.id', '021 0124 812', 'vutami', 'C!_\"BYZv8\"'),
(11, 'Malika Namaga', 'Jr. Mulyadi No. 662, Pontianak 31091, Maluku', 'hastuti.putri@samosir.sch.id', '0658 0535 820', 'nasrullah44', '|N7jCAHl:cH'),
(12, 'Kariman Wahyudin', 'Ds. Bak Mandi No. 428, Sorong 46557, Sulut', 'uchita49@hakim.mil.id', '(+62) 28 3757 384', 'kala19', '%dS_|^%[DV'),
(13, 'Titi Palastri M.TI.', 'Gg. Arifin No. 564, Serang 21570, Sumbar', 'dnuraini@gmail.co.id', '0370 7321 820', 'nugroho.unjani', '{TAZ05yGyf<U}'),
(14, 'Gaduh Eluh Sitompul', 'Psr. Abdul Rahmat No. 788, Bogor 53156, Banten', 'waskita.irnanto@gmail.co.id', '(+62) 384 5025 247', 'dabukke.eli', 'KN]laP;Up{=v!l\"'),
(15, 'Embuh Prasetya', 'Jr. Lada No. 665, Tidore Kepulauan 62356, Sumut', 'putri27@rahayu.sch.id', '(+62) 499 4540 690', 'iusada', 'hV/h}_0ymW'),
(16, 'Dina Widiastuti', 'Kpg. Padma No. 300, Administrasi Jakarta Pusat 59010, Sulut', 'kezia89@gmail.com', '0415 5027 8707', 'bakijan14', ',yF8<Fs|UGh'),
(17, 'Danu Elon Wibisono S.T.', 'Kpg. Gading No. 124, Binjai 40481, NTB', 'megantara.cornelia@hasanah.or.id', '0230 1725 1928', 'wibisono.laswi', 'f$Yw1i|Z;HRF[Y'),
(18, 'Putri Rahimah', 'Psr. Sunaryo No. 940, Samarinda 16665, Jambi', 'adriansyah.nardi@nuraini.co.id', '027 5757 7744', 'gunarto.kamaria', '\'|[Pm7'),
(19, 'Rika Wastuti S.E.I', 'Jr. Ters. Kiaracondong No. 349, Balikpapan 67532, Banten', 'legawa86@suryatmi.go.id', '0964 8921 0917', 'hesti.pranowo', '9V(sv{7&g/'),
(20, 'Siti Ratna Wijayanti M.TI.', 'Ds. Sentot Alibasa No. 285, Kotamobagu 29163, Riau', 'isihotang@yahoo.com', '(+62) 458 4991 9009', 'zelaya.farida', '^~,P+FK;yH:=c,');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_belanja`
--

CREATE TABLE `daftar_belanja` (
  `username` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` int(5) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `img_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_belanja`
--

INSERT INTO `daftar_belanja` (`username`, `qty`, `nama_barang`, `harga_barang`, `harga_total`, `img_barang`) VALUES
('loewibu', 2, 'Chuba', 25000, 50000, 'img/ciki.jpg'),
('loewibu', 1, 'Indomie Goreng', 25000, 25000, 'img/images (31).jpeg'),
('noisycools', 1, 'Lifebuoy Shampo', 8000, 8000, 'shampoo.jpg'),
('noisycools', 1, 'Nestle Nescafe Classic Jar', 86900, 86900, 'nescafe_1.jpg'),
('noisycools', 2, 'Coki-coki', 17500, 35000, 'coki-coki_2.jpg'),
('juned', 1, 'Susu Frisian Flag', 7000, 7000, 'susukntlmanis_1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1632144504, 1),
(2, '2021-09-20-135701', 'App\\Database\\Migrations\\AddBlog', 'default', 'App', 1632150196, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_warung` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `username`, `nama`, `nama_warung`, `alamat`, `no_hp`, `email`) VALUES
(16, 'loewibu', 'Eren Jaeger', 'Indomaret Sejahtera', 'Jalan Ki Hajar Dewantara No. 57', '54546370', 'erenjaeger@gmail.com'),
(18, 'noisycools', 'Aditya Nur Huda', 'Warung Sukadapak', 'Jalan Bandung Lautan Api, No. 38', '081563957870', 'adityanh1604@gmail.com'),
(19, 'juned', 'Junaedi', 'Warung Juned', 'Jalan Kemerdekaan No. 241', '086789932', 'juned@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `harga_barang` double NOT NULL,
  `satuan_barang` varchar(50) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `kategori_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_barang`
--

INSERT INTO `tabel_barang` (`barang_id`, `nama_barang`, `slug`, `harga_barang`, `satuan_barang`, `foto_barang`, `kategori_barang`) VALUES
(1, 'Indomie Goreng', 'indomie-goreng', 25000, 'dus', 'images (31).jpeg', 'Makanan Instan'),
(2, 'Telur Ayam', 'telur-ayam', 20000, 'kg', 'telur.jpg', 'Bahan Masakan'),
(3, 'Lifebuoy Shampo', 'lifebuoy-shampo', 8000, 'pack', 'shampoo.jpg', 'Peralatan Mandi'),
(4, 'Kopikap', 'kopikap', 16000, 'dus', 'kopikap.jpg', 'Minuman'),
(5, 'Beras', 'beras', 12000, 'kg', 'beras.jpg', 'Bahan Masakan'),
(6, 'Chuba', 'chuba', 25000, 'pack', 'ciki.jpg', 'Makanan Ringan'),
(7, 'Susu Frisian Flag', 'susu-frisian-flag', 7000, 'sachet (6 pcs)', 'susukntlmanis_1.jpg', 'Minuman'),
(8, 'Coki-coki', 'coki-coki', 17500, 'pack (20 pcs)', 'coki-coki_2.jpg', 'Makanan Ringan'),
(9, 'Richeese Nabati Cheese Wafer', 'richeese-nabati-cheese-wafer', 20000, 'pack (20 pcs)', 'nabati_2.jpg', 'Makanan Ringan'),
(10, 'Nestle Nescafe Classic Jar', 'nestle-nescafe-classic-jar', 86900, 'botol 200g', 'nescafe_1.jpg', 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `nama_warung` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `username`, `nama_penerima`, `nama_warung`, `alamat`, `no_hp`, `email`, `barang`, `status`) VALUES
('wr-jcLH7', 'noisycools', 'Aditya Nur Huda', 'Warung Sukadapak', 'Jl. Baladewa No. 49', '+6281563957870', 'adityanh1604@gmail.com', '', ''),
('wr-NYBTu', 'noisycools', 'adit', 'Warung Sukadapak', 'Jalan Bandung Lautan Api, No. 38', '081563957870', 'adityanh1604@gmail.com', '', ''),
('wr-yCakd', 'loewibu', 'Uhon', 'Indomaret Sejahtera', 'Jalan Ki Hajar Dewantara No. 57', '54546370', 'erenjaeger@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'adityanh1604@gmail.com', 'noisycools', '$2y$10$Sy1StV5gL0EyOl1xaWQ1/ewEhefT4ft.q0EH5ahVOoTSlbRbgjZOe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-28 02:12:43', '2021-09-28 02:12:43', NULL),
(8, 'loewibu@gmail.com', 'loewibu', '$2y$10$KlRbRgEUTL34p8f3H2zhWONTB39kkvqZLOSiMj0mLR/A0dkMhKQNm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-28 05:55:27', '2021-09-28 05:55:27', NULL),
(9, 'juned@gmail.com', 'juned', '$2y$10$q/d/c774MLSBaNQs7pj1t.ywAMm8.gCpKMdfuVJwYdN17.DOEzdsi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-09-29 09:12:35', '2021-09-29 09:12:35', NULL),
(10, 'adminpusat@gmail.com', 'yanto', '$2y$10$ELjkxomHk5XQV.vWBqeBLuKUsVv8eHzll43hKJYAGD2reJXLzSMku', NULL, NULL, NULL, 'abb88ae3ef477b87d07c2c7e3e8cfa96', NULL, NULL, 0, 0, '2021-10-21 09:19:48', '2021-10-21 09:19:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indeks untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
