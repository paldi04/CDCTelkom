-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 05:11 PM
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
-- Database: `cdc_telkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(120) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` bigint(20) NOT NULL,
  `content_label` varchar(60) NOT NULL,
  `content_type` varchar(1) NOT NULL COMMENT 'C, M, E, K',
  `content_file` text NOT NULL COMMENT '{"img":"asd.jpg"}',
  `content_desc` text NOT NULL,
  `content_created_by` bigint(20) NOT NULL,
  `content_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(20) NOT NULL,
  `level_pengguna` varchar(1) NOT NULL,
  `level_status` char(1) NOT NULL DEFAULT 'A'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`, `level_pengguna`, `level_status`) VALUES
(1, 'Superadmin', '1', 'A'),
(20, 'Company', '1', 'A'),
(21, 'JobSeeker', '1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `low_id` bigint(20) NOT NULL,
  `low_company` bigint(20) NOT NULL,
  `low_jenjang` text NOT NULL,
  `low_jurusan` text NOT NULL,
  `low_level` text NOT NULL,
  `low_syarat` text NOT NULL,
  `low_syarat_khusus` text NOT NULL,
  `low_info` text NOT NULL,
  `low_jumlah` int(11) NOT NULL,
  `low_valid_until` date NOT NULL,
  `low_kategori` int(11) NOT NULL COMMENT '1 = Full Time 2 = Part Time',
  `low_image` varchar(120) NOT NULL,
  `low_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `low_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(5) NOT NULL,
  `module_parent_id` int(3) NOT NULL,
  `module_name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `module_link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `module_icon` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `module_level` int(11) NOT NULL DEFAULT '1',
  `module_status` enum('A','B') COLLATE latin1_general_ci NOT NULL,
  `module_urut` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_parent_id`, `module_name`, `module_link`, `module_icon`, `module_level`, `module_status`, `module_urut`) VALUES
(154, 0, 'Profil', '/admin/profil', 'fa-user', 1, 'A', 3),
(140, 142, 'Level', '/level', 'fa-university', 1, 'A', 1),
(141, 142, 'Hak Akses', '/hak_akses', 'fa-university', 1, 'A', 2),
(142, 0, 'Pengaturan', '/pengaturan', 'fa-gear', 1, 'A', 7),
(143, 142, 'Pengaturan Menu', '/pengaturan_menu', 'fa-university', 1, 'A', 3),
(146, 142, 'Pengaturan User', '/pengaturan_user', 'fa-user', 1, 'A', 4),
(148, 0, 'Dashboard', '/index', 'fa-dashboard', 1, 'A', 1),
(149, 0, 'Sumber Data', '/sumberdata', 'fa-gear', 1, 'A', 2),
(150, 149, 'Data Jobseeker', '/sumber_jobseeker', 'fa-gear', 1, 'A', 1),
(151, 149, 'Data Mahasiswa', '/sumber_mahasiswa', 'fa-gear', 1, 'A', 2),
(152, 149, 'Data Alumni', '/sumber_alumni', 'fa-gear', 1, 'A', 3),
(153, 149, 'Data Perusahaan', '/sumber_perusahaan', 'fa-gear', 1, 'A', 4),
(155, 0, 'Lowongan Pekerjaan', '/admin/lowongan', 'fa-list', 1, 'A', 4),
(156, 0, 'Pelamar', '/admin/pelamar', 'fa-list', 1, 'A', 5),
(157, 0, 'Campus Recruitment', '/admin/campus', 'fa-dashboard', 1, 'A', 6),
(158, 0, 'Logout', '/admin/logout', 'fa-power-off', 1, 'A', 8);

-- --------------------------------------------------------

--
-- Table structure for table `module_akses`
--

CREATE TABLE `module_akses` (
  `ak_module_id` int(11) NOT NULL,
  `ak_level_id` int(11) NOT NULL,
  `ak_hak` varchar(1) NOT NULL DEFAULT 'F',
  `ak_insert` char(1) NOT NULL DEFAULT 'F',
  `ak_update` char(1) NOT NULL DEFAULT 'F',
  `ak_delete` char(1) NOT NULL DEFAULT 'F',
  `ak_download` char(1) NOT NULL DEFAULT 'F',
  `ak_upload` char(1) NOT NULL DEFAULT 'F'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_akses`
--

INSERT INTO `module_akses` (`ak_module_id`, `ak_level_id`, `ak_hak`, `ak_insert`, `ak_update`, `ak_delete`, `ak_download`, `ak_upload`) VALUES
(1, 1, 'T', 'F', 'F', 'F', 'N', 'N'),
(140, 1, 'T', 'T', 'T', 'T', 'N', 'N'),
(141, 1, 'T', 'N', 'T', 'N', 'N', 'N'),
(142, 1, 'T', 'T', 'T', 'T', 'N', 'N'),
(146, 1, 'T', 'T', 'T', 'T', 'N', 'N'),
(1, 20, 'T', 'T', 'T', 'T', 'N', 'N'),
(140, 20, 'F', 'F', 'F', 'T', 'N', 'N'),
(141, 20, 'F', 'N', 'T', 'N', 'N', 'N'),
(142, 20, 'F', 'F', 'F', 'F', 'N', 'N'),
(143, 20, 'F', 'F', 'F', 'F', 'N', 'N'),
(146, 20, 'F', 'F', 'F', 'F', 'N', 'N'),
(140, 21, 'F', 'F', 'F', 'F', 'F', 'F'),
(1, 21, 'T', 'T', 'T', 'T', 'F', 'F'),
(143, 1, 'T', 'T', 'T', 'T', 'N', 'N'),
(141, 21, 'F', 'F', 'F', 'F', 'F', 'F'),
(142, 21, 'F', 'F', 'F', 'F', 'F', 'F'),
(143, 21, 'F', 'F', 'F', 'F', 'F', 'F'),
(146, 21, 'F', 'F', 'F', 'F', 'F', 'F'),
(148, 1, 'T', 'N', 'N', 'N', 'N', 'N'),
(148, 20, 'T', 'N', 'N', 'N', 'N', 'N'),
(148, 21, 'T', 'N', 'N', 'N', 'N', 'N'),
(149, 1, 'F', 'F', 'F', 'F', 'F', 'F'),
(149, 20, 'F', 'F', 'F', 'F', 'F', 'F'),
(149, 21, 'T', 'F', 'F', 'F', 'F', 'F'),
(150, 1, 'F', 'F', 'F', 'F', 'F', 'F'),
(150, 20, 'F', 'F', 'F', 'F', 'F', 'F'),
(150, 21, 'T', 'F', 'F', 'F', 'F', 'F'),
(151, 1, 'F', 'F', 'F', 'F', 'F', 'F'),
(151, 20, 'F', 'F', 'F', 'F', 'F', 'F'),
(151, 21, 'T', 'F', 'F', 'F', 'F', 'F'),
(152, 1, 'F', 'F', 'F', 'F', 'F', 'F'),
(152, 20, 'F', 'F', 'F', 'F', 'F', 'F'),
(152, 21, 'T', 'F', 'F', 'F', 'F', 'F'),
(153, 1, 'F', 'F', 'F', 'F', 'F', 'F'),
(153, 20, 'F', 'F', 'F', 'F', 'F', 'F'),
(153, 21, 'T', 'F', 'F', 'F', 'F', 'F'),
(154, 1, 'T', 'F', 'F', 'F', 'F', 'F'),
(154, 20, 'T', 'F', 'F', 'F', 'F', 'F'),
(154, 21, 'F', 'F', 'F', 'F', 'F', 'F'),
(155, 1, 'T', 'F', 'F', 'F', 'F', 'F'),
(155, 20, 'T', 'F', 'F', 'F', 'F', 'F'),
(155, 21, 'F', 'F', 'F', 'F', 'F', 'F'),
(156, 1, 'T', 'F', 'F', 'F', 'F', 'F'),
(156, 20, 'T', 'F', 'F', 'F', 'F', 'F'),
(156, 21, 'F', 'F', 'F', 'F', 'F', 'F'),
(157, 1, 'T', 'F', 'F', 'F', 'F', 'F'),
(157, 20, 'T', 'F', 'F', 'F', 'F', 'F'),
(157, 21, 'F', 'F', 'F', 'F', 'F', 'F'),
(158, 1, 'T', 'F', 'F', 'F', 'F', 'F'),
(158, 20, 'T', 'F', 'F', 'F', 'F', 'F'),
(158, 21, 'F', 'F', 'F', 'F', 'F', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `pel_id` bigint(20) NOT NULL,
  `pel_users_job` bigint(20) NOT NULL,
  `pel_low_id` bigint(20) NOT NULL,
  `pel_status` varchar(15) NOT NULL COMMENT 'lolos administrasi, psikotes, wawancara, di tolak, di terima',
  `pel_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pel_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(32) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(38) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(18) NOT NULL,
  `user_ip` varchar(20) DEFAULT NULL,
  `user_level` int(11) NOT NULL,
  `user_status` char(1) NOT NULL DEFAULT 'A',
  `user_session` varchar(32) DEFAULT NULL,
  `user_flag` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pass`, `user_fullname`, `user_email`, `user_phone`, `user_ip`, `user_level`, `user_status`, `user_session`, `user_flag`) VALUES
('1', 'admintest', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin.bmt@globalinfinite.com', '0', '', 1, 'A', NULL, '2019-12-13 16:54:26'),
('20150317214846899201', 'company', '21232f297a57a5a743894a0e4a801fc3', 'company', 'bayu@simaya.net', '082320282891', '', 20, 'A', NULL, '2019-12-13 17:29:28'),
('20150317214846899202', 'jobseeker', '21232f297a57a5a743894a0e4a801fc3', 'jobseeker', 'bayu@simaya.net', '082320282891', '', 21, 'A', NULL, '2019-12-13 17:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `us_id` bigint(20) NOT NULL,
  `us_email` varchar(80) NOT NULL,
  `us_pass` varchar(120) NOT NULL,
  `us_type` int(11) NOT NULL COMMENT '1 = Job 2 = Company',
  `us_data` bigint(20) NOT NULL,
  `us_status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = Aktif',
  `us_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `us_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_id`, `us_email`, `us_pass`, `us_type`, `us_data`, `us_status`, `us_create`, `us_update`) VALUES
(1, 'admin@admin.admin', '21232f297a57a5a743894a0e4a801fc3', 0, 0, 1, '2019-12-18 17:55:11', '2019-12-18 17:55:11'),
(2, 'company@company.company', '21232f297a57a5a743894a0e4a801fc3', 2, 1, 1, '2019-12-18 17:55:11', '2019-12-18 17:55:11'),
(3, 'job@job.job', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 1, '2019-12-18 17:55:11', '2019-12-18 17:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `users_company`
--

CREATE TABLE `users_company` (
  `uscom_id` bigint(20) NOT NULL,
  `uscom_nama_com` varchar(40) NOT NULL,
  `uscom_tmpt_berdiri` varchar(20) NOT NULL,
  `uscom_tgl_berdiri` varchar(12) NOT NULL,
  `uscom_nohp` varchar(20) NOT NULL,
  `uscom_jenis` varchar(40) NOT NULL COMMENT 'Lokal, Nasional, MultiNasional',
  `uscom_bidang` varchar(40) NOT NULL,
  `uscom_telepon` varchar(20) NOT NULL,
  `uscom_prov` varchar(20) NOT NULL,
  `uscom_kota` varchar(20) NOT NULL,
  `uscom_alamat` text NOT NULL,
  `uscom_kode_pos` int(11) NOT NULL,
  `uscom_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uscom_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_company`
--

INSERT INTO `users_company` (`uscom_id`, `uscom_nama_com`, `uscom_tmpt_berdiri`, `uscom_tgl_berdiri`, `uscom_nohp`, `uscom_jenis`, `uscom_bidang`, `uscom_telepon`, `uscom_prov`, `uscom_kota`, `uscom_alamat`, `uscom_kode_pos`, `uscom_create`, `uscom_update`) VALUES
(1, 'Pt. Company', 'Bandung', '12-12-2012', '082211112222', 'local', 'local', '', 'Jawa Barat', 'Bandung', 'jln. ', 40151, '2019-12-18 17:58:48', '2019-12-18 17:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `users_jobseeker`
--

CREATE TABLE `users_jobseeker` (
  `usjob_id` bigint(20) NOT NULL,
  `usjob_nama` varchar(40) NOT NULL,
  `usjob_nim` bigint(20) NOT NULL,
  `usjob_tmpt_lahir` varchar(20) NOT NULL,
  `usjob_tgl_lahir` varchar(12) NOT NULL,
  `usjob_nohp` varchar(15) NOT NULL,
  `usjob_gender` varchar(1) NOT NULL,
  `usjob_prov` varchar(20) NOT NULL,
  `usjob_kota` varchar(20) NOT NULL,
  `usjob_alamat` text NOT NULL,
  `usjob_kode_pos` int(11) NOT NULL,
  `usjob_ktp` varchar(40) NOT NULL,
  `usjob_profesi` varchar(40) NOT NULL,
  `usjob_prog_study` varchar(40) NOT NULL,
  `usjob_thn_msk` int(11) NOT NULL,
  `usjob_thn_lls` int(11) NOT NULL,
  `us_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `us_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_jobseeker`
--

INSERT INTO `users_jobseeker` (`usjob_id`, `usjob_nama`, `usjob_nim`, `usjob_tmpt_lahir`, `usjob_tgl_lahir`, `usjob_nohp`, `usjob_gender`, `usjob_prov`, `usjob_kota`, `usjob_alamat`, `usjob_kode_pos`, `usjob_ktp`, `usjob_profesi`, `usjob_prog_study`, `usjob_thn_msk`, `usjob_thn_lls`, `us_create`, `us_update`) VALUES
(1, 'Beny', 333222111, 'Bandung', '12-12-1992', '082233332222', 'L', 'Jawa Barat', 'Bandung', 'jln. Jln', 40151, '1231241251224', 'Freelancer', 'abc', 2019, 0, '2019-12-18 18:01:00', '2019-12-18 18:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`low_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `module_akses`
--
ALTER TABLE `module_akses`
  ADD UNIQUE KEY `ma_idx` (`ak_module_id`,`ak_level_id`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`pel_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`);

--
-- Indexes for table `users_company`
--
ALTER TABLE `users_company`
  ADD PRIMARY KEY (`uscom_id`);

--
-- Indexes for table `users_jobseeker`
--
ALTER TABLE `users_jobseeker`
  ADD PRIMARY KEY (`usjob_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `low_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `pel_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `us_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_company`
--
ALTER TABLE `users_company`
  MODIFY `uscom_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_jobseeker`
--
ALTER TABLE `users_jobseeker`
  MODIFY `usjob_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
