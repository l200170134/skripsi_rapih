-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2020 pada 07.44
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` int(10) NOT NULL,
  `bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`id_bank`, `bank`) VALUES
(1, 'BANK MANDIRI'),
(2, 'BNI'),
(3, 'BRI'),
(4, 'BTN'),
(5, 'BANK JATENG'),
(6, 'BANK BUKOPIN'),
(7, 'BANK CIMB NIAGA'),
(8, 'BANK MEGA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(10) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `divisi`, `icon`) VALUES
(1, 'Direksi', 'fas fa-user-tie'),
(2, 'HRD GA', 'fas fa-chalkboard-teacher'),
(3, 'Marketing', 'ion ion-stats-bars'),
(4, 'Purchasing', 'fas fa-cart-plus'),
(5, 'Gudang', 'fas fa-box-open'),
(6, 'Armada', 'fas fa-truck\r\n'),
(7, 'Teknisi', 'fas fa-tools'),
(8, 'IT', 'fas fa-laptop-code'),
(9, 'Account Receivable', 'fas fa-money-check'),
(10, 'Finance Accounting', 'fas fa-money-bill-alt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_evaluasi`
--

CREATE TABLE `tb_evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `id_daily` int(11) NOT NULL,
  `evaluasi` varchar(500) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_evaluasi`
--

INSERT INTO `tb_evaluasi` (`id_evaluasi`, `id_daily`, `evaluasi`, `penulis`, `status`) VALUES
(120, 208, 'Bagus', 'ENI040', 1),
(121, 209, 'Bagus', 'ENI040', 1),
(122, 210, 'Bagus', 'ENI040', 1),
(123, 211, 'Bagus', 'ENI040', 1),
(124, 212, 'Bagus', 'ENI040', 1),
(125, 213, 'Bagus', 'ENI040', 1),
(126, 214, 'lanjutkan', 'direksi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `gaji` int(100) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `nip`, `gaji`, `tgl_pembayaran`, `bulan`, `tahun`) VALUES
(78, '20250056', 1200000, '2020-12-22', '1', 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Staff'),
(2, 'Asisten Manajer'),
(3, 'Manajer'),
(4, 'Senior Manajer'),
(5, 'Direksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kpi`
--

CREATE TABLE `tb_kpi` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `id_divisi` int(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kpi`
--

INSERT INTO `tb_kpi` (`id_pertanyaan`, `pertanyaan`, `id_divisi`, `active`) VALUES
(35, 'Kinerja pegawai', 3, 1),
(36, 'Pemenuhan target', 3, 1),
(37, 'Ketepatan pemenuhan target', 3, 1),
(38, 'Perilaku sehari-hari', 3, 0),
(41, 'Kelengkapan surat surat', 1, 1),
(42, 'asd', 1, 1),
(43, 'Keaktifkan pegawai', 1, 1),
(44, 'Keaktifkan pegawai', 1, 1),
(45, 'asdadasad', 1, 1),
(46, 'asdasasd', 1, 1),
(47, 'adasd', 1, 1),
(48, 'adasdasdasd', 1, 1),
(49, 'asdasdasda', 1, 1),
(50, 'adassada', 1, 1),
(60, 'Pencarian data', 3, 0),
(61, 'Ketepatan pemenuhan target harian 2', 3, 0),
(62, 'KPI 1', 3, 1),
(63, 'KPI 21', 3, 0),
(64, 'KPI 3', 3, 1),
(65, 'KPI 1', 10, 1),
(66, 'KPI 2', 10, 1),
(67, 'KPI 3', 10, 1),
(68, 'KPI 4', 10, 1),
(69, 'KPI 5', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kpi_value`
--

CREATE TABLE `tb_kpi_value` (
  `id_nilai` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `kpiFK` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kpi_value`
--

INSERT INTO `tb_kpi_value` (`id_nilai`, `nip`, `kpiFK`, `id_divisi`, `bulan`, `tahun`, `value`) VALUES
(522, '20250056', 65, 10, 1, 2020, 5),
(523, '20250056', 66, 10, 1, 2020, 5),
(524, '20250056', 67, 10, 1, 2020, 5),
(525, '20250056', 68, 10, 1, 2020, 5),
(526, '20250056', 69, 10, 1, 2020, 5),
(527, '20250056', 65, 10, 2, 2020, 4),
(528, '20250056', 66, 10, 2, 2020, 3),
(529, '20250056', 67, 10, 2, 2020, 3),
(530, '20250056', 68, 10, 2, 2020, 3),
(531, '20250056', 69, 10, 2, 2020, 4),
(537, '20250056', 65, 10, 1, 2020, 5),
(538, '20250056', 66, 10, 1, 2020, 2),
(539, '20250056', 67, 10, 1, 2020, 3),
(540, '20250056', 68, 10, 1, 2020, 4),
(541, '20250056', 69, 10, 1, 2020, 4),
(542, '20250056', 65, 10, 4, 2020, 3),
(543, '20250056', 66, 10, 4, 2020, 3),
(544, '20250056', 67, 10, 4, 2020, 4),
(545, '20250056', 68, 10, 4, 2020, 1),
(546, '20250056', 69, 10, 4, 2020, 1),
(547, '20250056', 65, 10, 3, 2020, 4),
(548, '20250056', 66, 10, 3, 2020, 4),
(549, '20250056', 67, 10, 3, 2020, 2),
(550, '20250056', 68, 10, 3, 2020, 1),
(551, '20250056', 69, 10, 3, 2020, 2),
(552, '20250056', 65, 10, 5, 2020, 5),
(553, '20250056', 66, 10, 5, 2020, 2),
(554, '20250056', 67, 10, 5, 2020, 2),
(555, '20250056', 68, 10, 5, 2020, 2),
(556, '20250056', 69, 10, 5, 2020, 5),
(557, '20250056', 65, 10, 5, 2020, 3),
(558, '20250056', 66, 10, 5, 2020, 2),
(559, '20250056', 67, 10, 5, 2020, 3),
(560, '20250056', 68, 10, 5, 2020, 3),
(561, '20250056', 69, 10, 5, 2020, 4),
(562, '20250056', 65, 10, 6, 2020, 3),
(563, '20250056', 66, 10, 6, 2020, 4),
(564, '20250056', 67, 10, 6, 2020, 3),
(565, '20250056', 68, 10, 6, 2020, 3),
(566, '20250056', 69, 10, 6, 2020, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ldr_daily`
--

CREATE TABLE `tb_ldr_daily` (
  `id` int(10) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `id_divisi` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `aktivitas` varchar(1000) NOT NULL,
  `hasil` varchar(100) NOT NULL,
  `catatan` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `urgensi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ldr_daily`
--

INSERT INTO `tb_ldr_daily` (`id`, `nip`, `id_divisi`, `tgl`, `aktivitas`, `hasil`, `catatan`, `status`, `urgensi`) VALUES
(208, '20250056', 10, '2020-12-21', 'melakukan kegiatan 1', 'Selesai', 'selesai melakukan kegiatan 1', 'Approve', 'Selesai'),
(209, '20250056', 10, '2020-12-20', 'melakukan tugas 2', 'Selesai', 'Selesai melakukan tugas 2', 'Approve', 'Selesai'),
(210, '20250056', 10, '2020-12-19', 'melakukan tugas 3', 'Selesai', 'Selesai melakukan tugas 3', 'Approve', 'Selesai'),
(211, '20250056', 10, '2020-12-18', 'melakukan tugas 4', 'Selesai', 'Selesai melakukan tugas 4', 'Approve', 'Selesai'),
(212, '20250056', 10, '2020-12-18', 'melakukan tugas 5', 'Selesai', 'Selesai melakukan tugas 5', 'Approve', 'Selesai'),
(213, '20250056', 10, '2020-12-17', 'melakukan tugas 6', 'Selesai', 'Selesai melakukan tugas 6', 'Approve', 'Selesai'),
(214, '20250056', 10, '2020-12-22', 'melakukan tugas 7', 'Selesai', 'Selesai melakukan tugas 7', 'Pending', 'Urgensi'),
(215, '20250056', 10, '2020-12-22', 'menambahkan tugas 9', 'Proses', '', 'Pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ldr_jurnal`
--

CREATE TABLE `tb_ldr_jurnal` (
  `id` int(100) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `tgl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ldr_jurnal`
--

INSERT INTO `tb_ldr_jurnal` (`id`, `nip`, `aktivitas`, `jam`, `tgl`) VALUES
(78, '20250056', 'input jurnal 1', ' 11:42:12 ', ' 22-12-2020 '),
(79, '20250056', 'input jurnal 1', ' 11:43:08 ', ' 22-12-2020 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_office`
--

CREATE TABLE `tb_office` (
  `id_office` int(10) NOT NULL,
  `office` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_office`
--

INSERT INTO `tb_office` (`id_office`, `office`) VALUES
(1, 'Bandung'),
(2, 'Tangerang'),
(3, 'Solo'),
(4, 'Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` int(10) NOT NULL,
  `perusahaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `perusahaan`) VALUES
(1, 'PT. Sinar Grafindo'),
(2, 'PT. Aneka Grafindo'),
(3, 'PT. Mitra Bhineka Sarana'),
(4, 'PT. Sumber Tirta Sejati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id`, `status`) VALUES
(1, 'Perjanjian Kerja Waktu Tertentu (PKWT)'),
(2, 'Perjanjian Kerja Waktu Tidak Tentu (PKWTT)'),
(3, 'Probation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status_data`
--

CREATE TABLE `tb_status_data` (
  `id_status` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_mulai` varchar(100) NOT NULL,
  `tgl_akhir` varchar(100) NOT NULL,
  `aktivasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status_data`
--

INSERT INTO `tb_status_data` (`id_status`, `nip`, `status`, `tgl_mulai`, `tgl_akhir`, `aktivasi`) VALUES
(114, '20250056', 3, '2020-01-15', '2020-04-14', 1),
(115, '20250056', 1, '2020-04-15', '2021-04-14', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_strukturgaji`
--

CREATE TABLE `tb_strukturgaji` (
  `id_strukturGaji` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `gaji_pokok` int(10) NOT NULL,
  `tun_kehadiran` int(10) NOT NULL,
  `uang_makan` int(10) NOT NULL,
  `uang_transport` int(10) NOT NULL,
  `lembur` int(10) NOT NULL,
  `lain_lain` int(10) NOT NULL,
  `bulan_mulai` int(11) NOT NULL,
  `tahun_awal` varchar(5) NOT NULL,
  `bulan_akhir` int(11) NOT NULL,
  `tahun_akhir` varchar(5) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_strukturgaji`
--

INSERT INTO `tb_strukturgaji` (`id_strukturGaji`, `nip`, `gaji_pokok`, `tun_kehadiran`, `uang_makan`, `uang_transport`, `lembur`, `lain_lain`, `bulan_mulai`, `tahun_awal`, `bulan_akhir`, `tahun_akhir`, `status`) VALUES
(20, '20250056', 20000000, 200000, 500000, 300000, 500000, 100000, 1, '2020', 8, '2020', 1),
(21, '20250056', 2200000, 500000, 300000, 300000, 500000, 100000, 8, '2020', 12, '2020', 1),
(22, '20250056', 24000000, 600000, 300000, 300000, 200000, 200000, 12, '2020', 0, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nip` varchar(16) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_divisi` int(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `no_hp_kel` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `no_rek` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `pernikahan` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `alamat_ktp` varchar(250) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nik` varchar(17) NOT NULL,
  `jk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nip`, `username`, `password`, `role_id`, `is_active`, `nama`, `id_divisi`, `image`, `email`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `no_hp_kel`, `bank`, `no_rek`, `npwp`, `perusahaan`, `office`, `pernikahan`, `alamat`, `alamat_ktp`, `jabatan`, `nik`, `jk`) VALUES
('00000001', 'direksi', 'direksi', 4, 1, 'Direksi', 1, '111.jpg', 'dikersi@gmail.com', 'Karanganyar', '1980-01-01', '00000000001', '00000000001', 'BNI', '0000000000', '000000000000001', 'PT. Sinar Grafindo', 'Solo', 'Menikah', 'SURAKARTA', 'SURAKARTA', 'Direksi', '0000000000000001', 'Laki-Laki'),
('10150008', 'LEONNASURYOWIDIGDO', '', 1, 1, 'LEONNA SURYO WIDIGDO', 2, '52.png', 'email_pegawai@gmail.com', 'SURAKARTA', '1992-07-29', '00000000001', '00000000001', 'BNI', '0000000000', '000000000', 'PT. Mitra Bhineka Sarana', 'Solo', 'Menikah', 'KANGGOTAN RT 02/02 PARWADININGRATAN JEBRES SKA', 'SURAKARTA', 'Staff', '3372046907920000', 'Perempuan'),
('10150033', 'TRIANALESTARI', 'TRI033', 1, 1, 'TRIANA LESTARI', 3, '54.png', 'email_pegawai@gmail.com', 'TANJUNG RATU', '1994-07-28', '00000000001', '00000000001', 'BANK MANDIRI', '0000000000', '000000000', 'PT. Aneka Grafindo', 'Solo', 'Menikah', 'WIDYAPURA RT.005/ RW.003, KEL.SINGOPURAN, KEC. KARTASURA, KAB. SUKOHARJO', 'SUKOHARJO', 'Staff', '3311126807940000', 'Perempuan'),
('10150071', 'TRIWAHYUNI', 'TRI071', 1, 1, 'TRI WAHYUNI', 4, '55.png', 'email_pegawai@gmail.com', 'PURWOREJO', '1993-04-04', '00000000001', '00000000001', 'BANK MANDIRI', '0000000000', '000000000', 'PT. Mitra Bhineka Sarana', 'Solo', 'Menikah', 'KEDUNGPOH RT 02/ RW 01 KEDUNGPOH LOANO PURWOREJO', 'PURWOREJO', 'Staff', '3306154404930000', 'Perempuan'),
('20250038', 'INESDWIPURNAMASARI', 'INE038', 2, 1, 'INES DWI PURNAMASARI', 3, '53.png', 'email_pegawai@gmail.com', 'SUKOHARJO', '1995-08-22', '00000000001', '00000000001', 'BANK MANDIRI', '0000000000', '000000000', 'PT. Sinar Grafindo', 'Solo', 'Menikah', 'WARUNG WATU RT 01/03 SINGOPURAN KARTOSURA SUKOHARJO', 'SUKOHARJO', 'Asisten Manajer', '3311126208950000', 'Perempuan'),
('20250040', 'ENI040', 'ENIKISLAMIYAH', 2, 1, 'ENIK ISLAMIYAH', 10, '51.png', 'email_pegawai@gmail.com', 'YOGYAKARTA', '1983-11-07', '000000000000', '000000000000', 'BNI', '0000000000', '000000000', 'PT. Sinar Grafindo', 'Solo', 'Menikah', 'PERUM GRAHA CANDI MAS C-30 GEDONGAN RT 1/05,COLOMADU', 'KARANGANYAR', 'Senior Manajer', '3515075107830000', 'Perempuan'),
('20250055', 'ALEXANDERYOSTEN', 'ALE055', 2, 1, 'ALEXANDER YOSTEN', 3, '23.jpg', 'email_pegawai@gmail.com', 'KARAWANG', '1979-05-22', '00000000001', '00000000001', 'BANK MANDIRI', '0000000000', '000000000', 'PT. Sinar Grafindo', 'Solo', 'Menikah', 'JL. MANGGIS I NO 17 JAJAR SKA', 'SURAKARTA', 'Manajer', '3175032205790000', 'Laki-Laki'),
('20250056', 'ADI056', 'ADITYASANDRYALAKSANA', 1, 1, 'ADITYA SANDRYA LAKSANA', 10, '11.jpg', 'email_pegawai@gmail.com', 'BANDUNG', '1997-05-19', '081987654323', '0812738291738', 'BNI', '0000000000', '0000000000', 'PT. Sinar Grafindo', 'Solo', 'Belum Menikah', 'PERUM MENJANGAN INDAH RT.023/RW.004, KEL. SAMBON, KEC. BANYUDONO, BOYOLALI', 'BOYOLALI', 'Staff', '3309091905970000', 'Laki-Laki'),
('30350004', 'DODYFITRIARDHI', 'DOD004', 1, 1, 'DODY FITRIARDHI', 10, '22.jpg', 'email_pegawai@gmail.com', 'KARANGANYAR', '1990-01-01', '00000000001', '00000000001', 'BANK MANDIRI', '0000000000', '000000000', 'PT. Aneka Grafindo', 'Solo', 'Menikah', 'NGERANGAN RT 04/III, GAWANAN COLOMADU', 'KARANGANYAR', 'Staff', '3313121712850000', 'Laki-Laki'),
('30350026', 'YOGA ARISANDYSETIAWAN', 'YOG026', 3, 1, 'YOGA ARI SANDY SETIAWAN', 2, '311.jpg', 'email_pegawai@gmail.com', 'NGAWI', '1991-01-17', '00000000001', '00000000001', 'BANK MANDIRI', '0000000000', '000000000', 'PT. Aneka Grafindo', 'Solo', 'Menikah', 'DSN KETANGGI LOR RT 004/002, DS KARTOHARJO NGAWI', 'NGAWI', 'Asisten Manajer', '3521051701910000', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_page`
--

CREATE TABLE `user_access_page` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id_page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_page`
--

INSERT INTO `user_access_page` (`id`, `role_id`, `id_page`) VALUES
(73, 1, 69),
(74, 1, 56),
(75, 1, 57),
(76, 1, 58),
(77, 1, 59),
(78, 1, 60),
(79, 1, 61),
(80, 1, 62),
(81, 1, 63),
(82, 1, 70),
(83, 1, 71),
(84, 2, 56),
(85, 2, 69),
(86, 2, 57),
(87, 2, 58),
(88, 2, 60),
(89, 2, 63),
(90, 2, 61),
(91, 2, 59),
(92, 2, 62),
(93, 2, 70),
(94, 2, 71),
(95, 2, 74),
(96, 2, 75),
(97, 2, 77),
(98, 2, 76),
(99, 2, 78),
(100, 2, 79),
(101, 2, 80),
(102, 2, 81),
(103, 2, 82),
(104, 2, 83),
(105, 2, 84),
(106, 2, 85),
(107, 2, 86),
(108, 2, 87),
(109, 2, 88),
(144, 3, 56),
(145, 3, 57),
(146, 3, 58),
(147, 3, 59),
(148, 3, 60),
(149, 3, 61),
(150, 3, 62),
(151, 3, 63),
(152, 3, 64),
(153, 3, 65),
(154, 3, 66),
(155, 3, 67),
(156, 3, 68),
(157, 3, 69),
(158, 3, 71),
(159, 3, 72),
(160, 3, 73),
(168, 3, 70),
(169, 3, 78),
(170, 3, 79),
(171, 3, 80),
(172, 3, 81),
(173, 3, 82),
(174, 3, 83),
(175, 3, 84),
(227, 4, 56),
(228, 4, 69),
(229, 4, 85),
(230, 4, 86),
(231, 4, 87),
(232, 4, 88),
(233, 4, 57),
(234, 4, 58),
(235, 4, 59),
(236, 4, 60),
(237, 4, 61),
(238, 4, 62),
(239, 4, 63),
(240, 4, 64),
(241, 4, 65),
(242, 4, 70),
(243, 4, 78),
(244, 2, 89),
(245, 2, 91),
(246, 2, 92),
(247, 4, 90),
(248, 3, 93),
(249, 4, 91),
(250, 4, 92),
(251, 3, 94),
(252, 3, 95),
(253, 3, 96),
(254, 3, 97),
(255, 3, 98),
(256, 3, 99),
(257, 3, 100),
(258, 2, 101),
(259, 1, 101),
(260, 3, 101),
(261, 2, 102),
(262, 2, 103),
(263, 2, 104),
(264, 3, 105),
(265, 3, 106),
(266, 3, 107),
(267, 3, 108),
(268, 3, 109),
(269, 3, 110),
(270, 3, 111),
(271, 3, 103),
(272, 1, 107),
(273, 4, 93),
(275, 1, 122),
(277, 2, 119),
(278, 2, 120),
(279, 2, 121),
(280, 2, 118),
(281, 3, 112),
(282, 3, 113),
(283, 3, 114),
(284, 3, 115),
(285, 3, 116),
(286, 3, 117),
(287, 3, 122),
(288, 1, 123),
(289, 2, 123),
(290, 3, 123),
(291, 3, 124),
(294, 3, 118),
(295, 2, 126),
(297, 2, 93),
(299, 4, 128),
(300, 2, 93),
(301, 4, 118),
(302, 3, 129),
(303, 3, 130),
(304, 3, 131),
(305, 3, 132);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_sidebar`
--

CREATE TABLE `user_access_sidebar` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `sidebar_id` int(11) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_sidebar`
--

INSERT INTO `user_access_sidebar` (`id`, `role_id`, `sidebar_id`, `urutan`) VALUES
(56, 1, 10, 1),
(57, 1, 1, 2),
(58, 1, 5, 3),
(59, 1, 9, 4),
(60, 1, 6, 5),
(61, 2, 10, 1),
(62, 2, 1, 2),
(63, 2, 5, 3),
(64, 2, 2, 4),
(65, 2, 11, 5),
(67, 2, 8, 7),
(68, 3, 10, 1),
(69, 3, 1, 2),
(70, 3, 5, 3),
(71, 3, 3, 4),
(72, 3, 6, 6),
(73, 3, 9, 5),
(74, 4, 10, 1),
(77, 4, 3, 4),
(81, 4, 1, 2),
(82, 2, 6, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_page`
--

CREATE TABLE `user_page` (
  `id_page` int(11) NOT NULL,
  `nama_page` varchar(128) NOT NULL,
  `url_page` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_page`
--

INSERT INTO `user_page` (`id_page`, `nama_page`, `url_page`) VALUES
(56, 'Dashboard', 'Dashboard/'),
(57, 'Daily', 'Daily/'),
(58, 'Daily Form', 'Daily/daily_form'),
(59, 'Daily Report', 'Daily/daily_report'),
(60, 'Daily Proses Tambah', 'Daily/daily_proses_tambah'),
(61, 'Daily Proses Hapus', 'Daily/daily_proses_hapus'),
(62, 'Daily Update', 'Daily/daily_update'),
(63, 'Daily Proses Update', 'Daily/daily_proses_update'),
(64, 'Data Karyawan', 'Data_karyawan/'),
(65, 'Detail Karyawan', 'Data_karyawan/detail_karyawan'),
(66, 'Tambah Data Karyawan', 'Data_karyawan/tambah_data_karyawan'),
(67, 'Update Data Karyawan', 'Data_karyawan/update_data_karyawan'),
(68, 'Detail Karyawan Tambah', 'Data_karyawan/detail_karyawan_tambah'),
(69, 'Data Pribadi', 'Data_pribadi/'),
(70, 'Evaluasi', 'Evaluasi/'),
(71, 'Gaji', 'Gaji/'),
(72, 'Input Gaji Karyawan', 'Gaji/input_gaji_karyawan'),
(73, 'Edit Gaji Karyawan', 'Gaji/edit_gaji_karyawan'),
(74, 'Jurnal', 'Jurnal/'),
(75, 'Jurnal Form', 'Jurnal/jurnal_form'),
(76, 'Jurnal Proses Tambah', 'Jurnal/jurnal_proses_tambah'),
(77, 'Jurnal Proses Hapus', 'Jurnal/jurnal_proses_hapus'),
(78, 'Kinerja', 'Kinerja/'),
(79, 'Kinerja Update', 'Kinerja/kinerja_update'),
(80, 'Kinerja Form', 'Kinerja/kinerja_form'),
(81, 'Kinerja Proses Tambah', 'Kinerja/kinerja_proses_tambah'),
(82, 'Kinerja Proses Hapus', 'Kinerja/kinerja_proses_hapus'),
(83, 'Kinerja Proses Update', 'Kinerja/kinerja_proses_update'),
(84, 'Kinerja Search', 'Kinerja/kinerja_search'),
(85, 'Monitoring', 'Monitoring/'),
(86, 'Monitoring Daily', 'Monitoring/monitoring_daily'),
(87, 'Monitoring Update', 'Monitoring/monitoring_update'),
(88, 'Monitoring Report', 'Monitoring/monitoring_report'),
(89, 'Jurnal List', 'Jurnal/jurnal_list'),
(90, 'Monitoring Direksi', 'Monitoring/monitoring_direksi'),
(91, 'Monitoring Proses Update', 'Monitoring/monitoring_proses_update'),
(92, 'Monitoring Tambah', 'Monitoring/monitoring_tambah'),
(93, 'Data Pribadi Hrd', 'Data_pribadi/data_pribadi'),
(94, 'Status Karyawan Form', 'Data_pribadi/status_karyawan_form'),
(95, 'Status Karyawan Update', 'Data_pribadi/status_karyawan_update'),
(96, 'Status Karyawan Tambah', 'Data_pribadi/status_karyawan_tambah'),
(97, 'Status Karyawan Hapus', 'Data_pribadi/status_karyawan_hapus'),
(98, 'Status Karyawan Proses Update', 'Data_pribadi/status_karyawan_update_proses'),
(99, 'Detail karyawan Update', 'Data_karyawan/detail_karyawan_update'),
(100, 'Data Karyawan Hapus', 'Data_karyawan/hapus_data_karyawan'),
(101, 'Daily Pagination', 'Daily/index'),
(102, 'Monitoring Pagination', 'Monitoring/index'),
(103, 'Kinerja Pagination', 'Kinerja/index'),
(104, 'Jurnal Pagination', 'Jurnal/index'),
(105, 'Gaji Form', 'Gaji/gaji_form'),
(106, 'Gaji Tambah Proses', 'Gaji/gaji_tambah_proses'),
(107, 'Gaji View karyawan', 'Gaji/index'),
(108, 'Gaji View', 'Gaji/gaji_view'),
(109, 'Gaji Update', 'Gaji/gaji_update'),
(110, 'Gaji Update Proses', 'Gaji/gaji_update_proses'),
(111, 'Gaji Hapus Proses', 'Gaji/gaji_hapus_proses'),
(112, 'KPI Form\r\n', 'Evaluasi/kpi_form'),
(113, 'KPI Tambah Proses\r\n', 'Evaluasi/kpi_tambah_proses'),
(114, 'KPI Data\r\n', 'Evaluasi/kpi'),
(115, 'KPI Hapus Proses\r\n', 'Evaluasi/kpi_hapus_proses'),
(116, 'KPI Form Update\r\n', 'Evaluasi/kpi_update'),
(117, 'KPI Form Update Proses\r\n', 'Evaluasi/kpi_update_proses'),
(118, 'KPI Value\r\n', 'Evaluasi/kpivalue'),
(119, 'KPI Value Form\r\n', 'Evaluasi/kpivalue_form'),
(120, 'KPI Value Tambah Proses\r\n', 'Evaluasi/kpivalue_tambah_proses'),
(121, 'KPI Value Hapus Proses\r\n', 'Evaluasi/kpivalue_hapus_proses'),
(122, 'Evaluasi Karyawan (Index)\r\n', 'Evaluasi/index_karyawan'),
(123, 'Export to CSV', 'Daily/export_csv'),
(124, 'Data Pribadi index', 'Data_pribadi/index'),
(125, 'Kpi Value HRD', 'Evaluasi/kpivalue'),
(126, 'Data Karyawan Detail (Leader)', 'Data_karyawan/detail_karyawan_leader'),
(128, 'Evaluasi Index Direksi', 'Evaluasi/index_direksi'),
(129, 'Rincian Gaji Form', 'Gaji/rinciangaji_form'),
(130, 'Rincian Gaji Update', 'Gaji/rinciangaji_update'),
(131, 'gaji proses tambah', 'Gaji/rinciangaji_tambah_proses'),
(132, 'Rincian gaji Hapus', 'Gaji/rincian_hapus'),
(133, 'Rincian Gaji Update Proses\r\n', 'Gaji/rinciangaji_update_proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `nama_role`) VALUES
(1, 'Karyawan'),
(2, 'Leader'),
(3, 'Hrd'),
(4, 'Direksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sidebar`
--

CREATE TABLE `user_sidebar` (
  `id_sidebar` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sidebar`
--

INSERT INTO `user_sidebar` (`id_sidebar`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 'Data Pribadi', 'Data_pribadi', 'nav-icon fas fa-user', 1),
(2, 'Monitoring', 'Monitoring', 'nav-icon fas fa-chalkboard-teacher', 1),
(3, 'Data Karyawan', 'Data_karyawan', 'nav-icon fas fa-user-friends', 1),
(5, 'Daily Activity', 'Daily', 'nav-icon fas fa-archive', 1),
(6, 'Gaji', 'Gaji', 'nav-icon fas fa-credit-card', 1),
(8, 'Jurnal', 'Jurnal', 'nav-icon fas fa-archive', 1),
(9, 'Evaluasi', 'Evaluasi/index_karyawan', 'nav-icon fas fa-star', 1),
(10, 'Dashboard', 'Dashboard', 'nav-icon fas fa-tachometer-alt', 1),
(11, 'Kinerja', 'Evaluasi', 'nav-icon fas fa-user-check', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indeks untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `id_dailyFK` (`id_daily`);

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `nipFK` (`nip`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_kpi`
--
ALTER TABLE `tb_kpi`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `kpi_id_divisi` (`id_divisi`);

--
-- Indeks untuk tabel `tb_kpi_value`
--
ALTER TABLE `tb_kpi_value`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `NipKpi` (`nip`),
  ADD KEY `kpiFk` (`kpiFK`);

--
-- Indeks untuk tabel `tb_ldr_daily`
--
ALTER TABLE `tb_ldr_daily`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_divisiDaily` (`id_divisi`),
  ADD KEY `NIpDaily` (`nip`);

--
-- Indeks untuk tabel `tb_ldr_jurnal`
--
ALTER TABLE `tb_ldr_jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NipJurnal` (`nip`);

--
-- Indeks untuk tabel `tb_office`
--
ALTER TABLE `tb_office`
  ADD PRIMARY KEY (`id_office`);

--
-- Indeks untuk tabel `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_status_data`
--
ALTER TABLE `tb_status_data`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `status_nip` (`nip`),
  ADD KEY `statusId` (`status`);

--
-- Indeks untuk tabel `tb_strukturgaji`
--
ALTER TABLE `tb_strukturgaji`
  ADD PRIMARY KEY (`id_strukturGaji`),
  ADD KEY `Fknip` (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `user_access_page`
--
ALTER TABLE `user_access_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_roleFK` (`role_id`),
  ADD KEY `id_pageFK` (`id_page`);

--
-- Indeks untuk tabel `user_access_sidebar`
--
ALTER TABLE `user_access_sidebar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`sidebar_id`);

--
-- Indeks untuk tabel `user_page`
--
ALTER TABLE `user_page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user_sidebar`
--
ALTER TABLE `user_sidebar`
  ADD PRIMARY KEY (`id_sidebar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bulan`
--
ALTER TABLE `tb_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `tb_kpi`
--
ALTER TABLE `tb_kpi`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `tb_kpi_value`
--
ALTER TABLE `tb_kpi_value`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT untuk tabel `tb_ldr_daily`
--
ALTER TABLE `tb_ldr_daily`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT untuk tabel `tb_ldr_jurnal`
--
ALTER TABLE `tb_ldr_jurnal`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_status_data`
--
ALTER TABLE `tb_status_data`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `tb_strukturgaji`
--
ALTER TABLE `tb_strukturgaji`
  MODIFY `id_strukturGaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_access_page`
--
ALTER TABLE `user_access_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT untuk tabel `user_access_sidebar`
--
ALTER TABLE `user_access_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `user_page`
--
ALTER TABLE `user_page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sidebar`
--
ALTER TABLE `user_sidebar`
  MODIFY `id_sidebar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_evaluasi`
--
ALTER TABLE `tb_evaluasi`
  ADD CONSTRAINT `id_dailyFK` FOREIGN KEY (`id_daily`) REFERENCES `tb_ldr_daily` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `nipFK` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kpi`
--
ALTER TABLE `tb_kpi`
  ADD CONSTRAINT `kpi_id_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `tb_divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kpi_value`
--
ALTER TABLE `tb_kpi_value`
  ADD CONSTRAINT `NipKpi` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kpiFk` FOREIGN KEY (`kpiFK`) REFERENCES `tb_kpi` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_ldr_daily`
--
ALTER TABLE `tb_ldr_daily`
  ADD CONSTRAINT `NIpDaily` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_divisiDaily` FOREIGN KEY (`id_divisi`) REFERENCES `tb_divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_ldr_jurnal`
--
ALTER TABLE `tb_ldr_jurnal`
  ADD CONSTRAINT `NipJurnal` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_status_data`
--
ALTER TABLE `tb_status_data`
  ADD CONSTRAINT `NipStatus` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `statusId` FOREIGN KEY (`status`) REFERENCES `tb_status` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_strukturgaji`
--
ALTER TABLE `tb_strukturgaji`
  ADD CONSTRAINT `Fknip` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_page`
--
ALTER TABLE `user_access_page`
  ADD CONSTRAINT `id_pageFK` FOREIGN KEY (`id_page`) REFERENCES `user_page` (`id_page`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_roleFK` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_sidebar`
--
ALTER TABLE `user_access_sidebar`
  ADD CONSTRAINT `menu_id` FOREIGN KEY (`sidebar_id`) REFERENCES `user_sidebar` (`id_sidebar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
