-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 09, 2023 at 07:47 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujianonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(3, 'Akuntansi'),
(2, 'Multimedia'),
(1, 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `mtk` double NOT NULL,
  `indo` double NOT NULL,
  `ipa` double NOT NULL,
  `inggris` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nisn`, `mtk`, `indo`, `ipa`, `inggris`, `total`) VALUES
(85, '1998', 67, 56, 45, 34, 35.633333333333);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `orangtua` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ijazah_depan` varchar(200) NOT NULL,
  `ijazah_belakang` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `bukti_transfer` varchar(200) DEFAULT NULL,
  `jenis_transfer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama`, `alamat`, `asal_sekolah`, `orangtua`, `telepon`, `jurusan`, `username`, `ijazah_depan`, `ijazah_belakang`, `foto`, `bukti_transfer`, `jenis_transfer`) VALUES
(140, '1998', 'Ridwan Dwi Susilo', 'Yogyakarta', 'SMP Negeri Indonesia', 'SBY', '085814431078', 'TKJ', 'ridwands', '29c2cc03-687b-4a6c-ad93-3a36d130078c1.jpeg', '29c2cc03-687b-4a6c-ad93-3a36d130078c2.jpeg', '9798ebfc-f4c9-4e15-a911-62273a9d0889.jpeg', '29c2cc03-687b-4a6c-ad93-3a36d130078c.jpeg', 'Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` int(5) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(300) NOT NULL,
  `b` varchar(300) NOT NULL,
  `c` varchar(300) NOT NULL,
  `d` varchar(300) NOT NULL,
  `knc_jawaban` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `jurusan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `soal`, `a`, `b`, `c`, `d`, `knc_jawaban`, `gambar`, `tanggal`, `aktif`, `jurusan`) VALUES
(47, 'Jenis beban yang dibayar terlebih dahulu disebut', 'Harta Lancar', 'Faktur dagang', 'Aktifa', 'Harta Tetap', 'a', '', '0000-00-06', 'Y', 'Akuntansi'),
(46, 'Peralatan merupakan jenis investasi ', 'Jurnal umum', 'Harta Tetap', 'Lain lain', 'Harta lancar', 'b', '', '0000-00-05', 'Y', 'Akuntansi'),
(45, 'Account Receivable merupakan istilah dari', 'Piutang Dagang', 'Aktiva', 'Harta', 'Peralatan', 'a', '', '0000-00-04', 'Y', 'Akuntansi'),
(44, 'Yang dimaksud dengan FAKTUR adalah', 'Bukti penjual', 'Bukti transaksi', 'Bukti kas masuk', 'Bukti penyediaan barang', 'b', '', '0000-00-03', 'Y', 'Akuntansi'),
(43, 'Pemindahan catatan kedalam buku besar disebut', 'Posting', 'Buku Piutang', 'Buku Kas', 'Faktur', 'a', '', '0000-00-02', 'Y', 'Akuntansi'),
(41, 'Akun aktiva dalam akuntans yaitu', 'Kas', 'Hutang', 'Aktifa', 'Infestasi', 'a', '', '0000-00-00', 'Y', 'Akuntansi'),
(42, 'Berikut ini merupakan jenis buku transaksi, kecuali', 'Piutang', 'Hutang', 'Faktur', 'Kas', 'd', '', '0000-00-01', 'Y', 'Akuntansi'),
(30, 'Kumpulan titik disebut', 'Intensitas', 'Pixcel', 'Layer', 'Contras', 'b', '', '0000-00-09', 'Y', 'Multimedia'),
(29, 'Untuk menutup program aplikasi photoshop bisa menggunakan shortcut', 'CTRL + S', 'CTRL + L', 'CTRL + A', 'CTRL + Q', 'd', '', '0000-00-08', 'Y', 'Multimedia'),
(28, 'Yang termasuk program berbasis vektor dalam kategori program modeling adalah', 'Layer', 'Autocad', '3D Studio MAX', 'Photosho', 'c', '', '0000-00-07', 'Y', 'Multimedia'),
(27, 'Dibawah ini software pengolah gambar vektor/digital illustrator adalah', 'Bitmap', 'Corel Draw', 'Macromedia ', 'Paint', 'a', '', '0000-00-06', 'Y', 'Multimedia'),
(26, 'RAM kepanjangan dari', 'Ready Acsess Memory', '', 'Read Acsess Modem', 'Random Acsess Memory', 'd', '', '0000-00-05', 'Y', 'Multimedia'),
(25, 'Default untuk penyimpanan file dari software Flash adalah', 'fla', 'Ard', 'Jpg', 'Avi', 'a', '', '0000-00-04', 'Y', 'Multimedia'),
(24, 'Salah satu software pengolah audio adalah', 'Adobe Photoshop', 'PIxcel', 'Adobe Audition', 'Swis Max', 'c', '', '0000-00-03', 'Y', 'Multimedia'),
(23, 'Software yang digunakan untuk membuat animasi teks adalah', 'Corel Draw', 'Rotate', 'Adobe Flash', 'Swish Max', 'd', '', '0000-00-02', 'Y', 'Multimedia'),
(22, 'Jika ingin memotong gambar hasil scan, maka digunakanlah ', 'Rotate', 'Brush', 'Crop', 'Zoom', 'c', '', '0000-00-01', 'Y', 'Multimedia'),
(21, 'Softwaware yang digunakan untuk membuat web design adalah', 'Dreamweaver', 'Macromedia Flash', 'Corel Draw', 'Adobe Photoshop', 'a', '', '0000-00-00', 'Y', 'Multimedia'),
(48, 'Program akuntansi berbasis komputer adalah', 'MYOB', 'RPL', 'Excel', 'Word', 'a', '', '0000-00-07', 'Y', 'Akuntansi'),
(49, 'Nama lain dari rata tengah yaitu', 'Left', 'Right', 'Center', 'Justify', 'c', '', '0000-00-08', 'Y', 'Akuntansi'),
(50, 'Nama lain dari akuntansi yaitu', 'Finance', 'Penulisan', 'Pembukuan', 'Looping', 'c', '', '0000-00-09', 'Y', 'Akuntansi'),
(51, 'Alat yang berfungsi untuk menghubungkan 2 jaringan dengan segmen yang berbeda adalah', 'Router', 'Switch', 'AP', 'Kabel', 'a', '', '0000-00-00', 'Y', 'TKJ'),
(52, 'Berikut adalah fungsi dari Firewall, yaitu ….', 'Penghubung antara 2 jaringan yang berbeda', 'Mengatur dan mengontrol lalu lintas jaringan', 'Penghubung antara 2 jaringan ke internet menggunakan 1 IP', 'Program yang melakukan request tehadap konten dari Internet/Intranet', 'b', '', '0000-00-01', 'Y', 'TKJ'),
(53, 'Dalam Model OSI Layer, yang berfungsi untuk menerima data dari Session Layer adalah….', 'Network Layer', ' Data Link Layer', 'Transport Layer', 'Physical Layer', 'c', '', '0000-00-02', 'Y', 'TKJ'),
(54, 'Subnet Mask yang dapat digunakan pada IP kelas B adalah….', '255.0.0.0', '255.255.0.0', '255.255.255.248', '255.255.255.0', 'b', '', '0000-00-03', 'Y', 'TKJ'),
(55, 'Jenis topologi yang memiliki node tengah sebagai pusat penghubung dari suatu jaringan adalah topologi….', 'Topologi Bus', 'Topologi Ring', 'Topologi Tree', ' Topologi Star', 'd', '', '0000-00-04', 'Y', 'TKJ'),
(56, 'Sebuah program tambahan yang berfungsi sebagai alat mempermudah penggunaan PC disebut….', 'Sistem Operasi', ' Program Paket', 'Bahasa Pemrograman', 'software Aplikasi', 'd', '', '0000-00-05', 'Y', 'TKJ'),
(57, 'Dibawah ini merupakan salah satu contoh SOJ pure, kecuali….', 'Linux Debian', 'FreeBSD', 'Fedora', 'Windows', 'a', '', '0000-00-06', 'Y', 'TKJ'),
(58, 'Berikut ini adalah contoh-contoh media transmisi yang menggunakan kabel, kecuali….', 'Fiber Optic', 'Wireless', 'STP', 'Coaxial/Coax/BNC', 'b', '', '0000-00-07', 'Y', 'TKJ'),
(59, 'Protokol umum yang sering digunakan oleh mailserver adalah, kecuali….', 'SMTP', 'POP3', 'IMAP', 'TCP/IP', 'a', '', '0000-00-08', 'Y', 'TKJ'),
(60, 'Dibawah ini merupakan program-program atau aplikasi e-mail secara umum, kecuali….', 'a. MTA', 'MDA', 'SMTP', 'MUA', 'a', '', '0000-00-09', 'Y', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id_token` int(20) NOT NULL,
  `token` varchar(300) NOT NULL,
  `nisn` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id_token`, `token`, `nisn`) VALUES
(28, '$2y$10$x2HqG0AfCqF8YwgpiXv3yut2GnIbgL.ENgN/x43tKQU9sPqO.tjv.', '1998');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(100) NOT NULL,
  `ujian` double NOT NULL,
  `nisn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `ujian`, `nisn`) VALUES
(39, 5.3333333333333, '1998');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('operator','kepsek','calonsiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(4, 'operator', '202cb962ac59075b964b07152d234b70', 'operator'),
(16, 'kepsek', '202cb962ac59075b964b07152d234b70', 'kepsek'),
(99, 'ridwands', '202cb962ac59075b964b07152d234b70', 'calonsiswa'),
(100, 'sleman', '962012d09b8170d912f0669f6d7d9d07', 'calonsiswa'),
(101, 'bebas', '76d80224611fc919a5d54f0ff9fba446', 'calonsiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD UNIQUE KEY `jurusan` (`jurusan`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nim` (`nisn`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nim` (`nisn`),
  ADD KEY `username` (`username`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`jurusan`);

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
