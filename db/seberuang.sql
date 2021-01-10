-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 06:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seberuang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dtsuratkeluar`
--

CREATE TABLE `tb_dtsuratkeluar` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `isi` varchar(10000) NOT NULL,
  `id_templat` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dtsuratkeluar`
--

INSERT INTO `tb_dtsuratkeluar` (`id`, `no_surat`, `isi`, `id_templat`, `id_surat`) VALUES
(1, '421.3/001/SMAN 1 - SBRG/SMhn/III/2020', 'Christina Firda Efendi@Lomba OSN@Kementrian Pendidikan@Senin@09/03/2020@07.00@13.00@Aula SMAN 01 Seberuang', 10, 1),
(2, '421.3/002/SMAN 1 - SBRG/SMhn/III/2020', 'Herman Santoso@Lomba OSN@Kementrian Pendidikan@Senin@09/03/2020@07.00@13.00@Aula SMAN 01 Seberuang', 10, 2),
(3, '421.3/003/SMAN 1 - SBRG/SPot/III/2020', 'Morgan@Kamis@12/03/2020@13.00@13.30@Ruang Kepala Sekolah', 6, 3),
(7, '421.3/005/SMAN 1 - SBRG/SK/V/2020', 'Tentang : Libur@Menimbang : Berat Badan@Mengingat : Kalo siswa suka libur@Memutuskan : Sekolah ditiadakan celamanyaaa', 1, 5),
(8, '421.3/006/SMAN 1 - SBRG/SKb/V/2020', 'Nama : Sebut saja bunga@NISN : 3472384798@Kelas : X IPA 12@Tempat Lahir : New York@Tanggal Lahir : 1994-12-01', 2, 6),
(9, '421.3/007/SMAN 1 - SBRG/SKks/V/2020', 'Nama Siswa : Berondong@NISN : 4348237897@Nomor Induk : 83748@Kelas : X IPS 2@Tempat Lahir : Bandung@Tanggal Lahir : 1993-12-09@Jenis Kelamin : Perempuan@Alamat : Jalan jalan keliling kota... CAKEPPP@Orang Tua : Akeu@pekerjaan : Product Manager@Alasan : Suka suka saya dongss', 4, 7),
(10, '421.3/008/SMAN 1 - SBRG/SKua/V/2020', 'Nama Pemberi : sdasd@NIP Pemberi : sdasd@Unit Pemberi : sadsa@Jabatan Pemberi : dsad@alamat_pemberi : asdsada@Nama Penerima : sdsadas@NIP Penerima : dasd@Unit Penerima : sdsad@Jabatan Penerima : asdsa@Alamat Penerima : dsad@Dari Bulan : asda@Hingga Bulan : sdsa@Tahun : 2020', 5, 8),
(11, '421.3/009/SMAN 1 - SBRG/SKua/V/2020', 'Nama Pemberi : jkajslkj@NIP Pemberi : kjhjhk@Unit Pemberi : jdslkjlkajdlk@Jabatan Pemberi : jlkjlkjlkj@alamat_pemberi : kljkljl@Nama Penerima : kjlkjlkjlkjl@NIP Penerima : jlkjlkjkl@Unit Penerima : sadasdasd@Jabatan Penerima : jlkjlkjl@Alamat Penerima : dsdsds@Dari Bulan : dsdad@Hingga Bulan : asdasd@Tahun : 2020', 5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `password`, `level`) VALUES
(1, 'Kepsek', '123', 2),
(2, 'TU1', '234', 1),
(3, 'TU2', '345', 1),
(10, 'popcorn1', 'pop1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id` int(11) NOT NULL,
  `tgl_buat` date NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `disposisi` varchar(20) NOT NULL DEFAULT 'Tidak Disposisi',
  `jenis_surat` varchar(20) NOT NULL,
  `file` varchar(50) DEFAULT NULL,
  `id_pembuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id`, `tgl_buat`, `kategori`, `disposisi`, `jenis_surat`, `file`, `id_pembuat`) VALUES
(1, '2020-03-02', 'Surat Permohonan Izin (SMhn)', 'Tidak Disposisi', 'Surat Keluar', '', 3),
(2, '2020-03-02', 'Surat Permohonan Izin (SMhn)', 'Tidak Disposisi', 'Surat Keluar', '', 3),
(3, '2020-03-05', 'Surat Pemanggilan Orang Tua (SPot)', 'Tidak Disposisi', 'Surat Keluar', '', 2),
(4, '2020-03-15', 'Surat Keterangan Menerima Pindah Sekolah (SKms)', 'Disposisi', 'Surat Masuk', '2191024y21ws2.jpg', 3),
(5, '2020-05-17', 'Surat Keputusan (SK)', 'Disposisi', 'Surat Keluar', 'Surat Keputusan 5ec10b4a0b3fc.docx', 2),
(6, '2020-05-17', 'Surat Keterangan Biasa (SKb)', 'Tidak Disposisi', 'Surat Keluar', 'Surat Keterangan Biasa 5ec10b9337af9.docx', 2),
(7, '2020-05-17', 'Surat Keterangan Pindah Sekolah (SKks)', 'Disposisi', 'Surat Keluar', 'Surat Keterangan Pindah Sekolah 5ec10bf465621.docx', 2),
(8, '2020-05-17', 'Surat Kuasa (SKua)', 'Tidak Disposisi', 'Surat Keluar', 'Surat Kuasa 5ec10c56d0ecc.docx', 2),
(10, '2020-05-17', 'Surat Pengantar', 'Didisposisi', 'Surat Masuk', '5ec1114156b4a_5ec1114156b4e.jpg', 2),
(11, '2020-05-17', 'Surat Kuasa (SKua)', 'Tidak Disposisi', 'Surat Keluar', 'Surat Kuasa 5ec11bdf18c6c.docx', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_templat`
--

CREATE TABLE `tb_templat` (
  `id` int(11) NOT NULL,
  `nama_templat` varchar(200) NOT NULL,
  `kode_templat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_templat`
--

INSERT INTO `tb_templat` (`id`, `nama_templat`, `kode_templat`) VALUES
(1, 'Surat Keputusan', 'SK'),
(2, 'Surat Keterangan Biasa', 'SKb'),
(3, 'Surat Keterangan Menerima Pindah Sekolah', 'SKms'),
(4, 'Surat Keterangan Pindah Sekolah', 'SKks'),
(5, 'Surat Kuasa', 'SKua'),
(6, 'Surat Pemanggilan Orang Tua', 'SPot'),
(7, 'Surat Pemberitahuan', 'SBer'),
(8, 'Surat Pengantar', 'SPgt'),
(9, 'Surat Perintah Tugas', 'SPt'),
(10, 'Surat Permohonan Izin', 'SMhn'),
(11, 'Surat Pernyataan', 'SPny'),
(12, 'Surat Rekomendasi', 'SRek'),
(13, 'Surat Undangan', 'SUnd'),
(14, 'Surat Lainnya', 'SLn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dtsuratkeluar`
--
ALTER TABLE `tb_dtsuratkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idSurat` (`id_surat`),
  ADD KEY `fk_idTemplat` (`id_templat`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idPembuat` (`id_pembuat`);

--
-- Indexes for table `tb_templat`
--
ALTER TABLE `tb_templat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dtsuratkeluar`
--
ALTER TABLE `tb_dtsuratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_templat`
--
ALTER TABLE `tb_templat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dtsuratkeluar`
--
ALTER TABLE `tb_dtsuratkeluar`
  ADD CONSTRAINT `fk_idSurat` FOREIGN KEY (`id_surat`) REFERENCES `tb_surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idTemplat` FOREIGN KEY (`id_templat`) REFERENCES `tb_templat` (`id`);

--
-- Constraints for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD CONSTRAINT `fk_idPembuat` FOREIGN KEY (`id_pembuat`) REFERENCES `tb_pengguna` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
