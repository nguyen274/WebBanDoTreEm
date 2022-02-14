-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 02:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_dm` int(11) NOT NULL,
  `ten_dm` varchar(50) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`ma_dm`, `ten_dm`, `mo_ta`) VALUES
(1, 'đồ ăn', 'Gồm các loại đồ ăn như sữa, bột ăn dặm, thực phẩm chức năng với công thức an toàn cho trẻ.'),
(2, 'quần áo', 'Đồ sơ sinh, đồ thời trang các loại.'),
(3, 'đồ đi chơi', 'Những vật dụng giúp trẻ ra ngoài như xe đẩy, xe tập đi, đai, địu giữ bé, các loại xe dành cho bé, túi đựng đồ cho mẹ và bé.'),
(4, 'đồ ngủ', 'Giường, đệm, ga, nôi, chăn, chiếu, túi ngủ, màn chắn giường.'),
(5, 'vệ sinh', 'Gồm những vật dụng vệ sinh như khăn giấy, bô, bỉm, tã giấy, các loại sản phẩm dung dịch vệ sinh thích hợp cho trẻ.'),
(6, 'chăm sóc sức khỏe', 'Nơi bán tủ thuốc gia đình, nhiệt kế cho bé, túi chườm, dụng cụ cho trẻ uống thuốc, dụng cụ đuổi bắt muỗi, vv...'),
(7, 'đồ chơi', 'Đồ chơi các loại dành cho bé.');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ngay_mua` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma_hd` int(11) NOT NULL,
  `gia_tien` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ten_kh` varchar(50) NOT NULL,
  `dien_thoai` int(11) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `dia_chi` text NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten_kh`, `dien_thoai`, `ngay_sinh`, `email`, `dia_chi`, `trang_thai`, `username`, `password`) VALUES
(2, 'Tên lửa đạn đạo', 1001010100, '2020-12-25', 'hack@gmail.com', '32 Thường Tín', 1, 'tnt123', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_nv` int(11) NOT NULL,
  `ten_nv` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cmnd` int(11) NOT NULL,
  `dia_chi` text NOT NULL,
  `dien_thoai` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `chuc_nang` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`ma_nv`, `ten_nv`, `username`, `password`, `cmnd`, `dia_chi`, `dien_thoai`, `email`, `chuc_nang`) VALUES
(15, 'Joseph', 'jo0304seph', '123456', 123456, '12 Nguyễn An Ninh', 989423522, 'jo0304se@gmail.com', 1),
(18, 'orange', 'orange_candy', '123456', 0, '87 Hàng Tre', 643572311, 'orange@gmail.com', 0),
(20, 'Geburah', 'strength005', '12345', 12345, '90 Hàng Buồm', 989423527, 'geburah@gmail.com', 1),
(21, 'Crain', 'cane2203', '123456', 1301004201, '32 Tràng Thi', 989423527, 'lemon@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nha_pp`
--

CREATE TABLE `nha_pp` (
  `ma_npp` int(11) NOT NULL,
  `ten_npp` varchar(50) NOT NULL,
  `dia_chi` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `dien_thoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nha_pp`
--

INSERT INTO `nha_pp` (`ma_npp`, `ten_npp`, `dia_chi`, `email`, `dien_thoai`) VALUES
(1, 'Qhang', '36 Tương Mai', 'Zhein@gmail.com', 987654321);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `ma_dm` int(11) NOT NULL,
  `gia_tien` int(11) NOT NULL,
  `nha_pp` int(11) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_dm`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD KEY `ma_hd` (`ma_hd`),
  ADD KEY `san_pham` (`san_pham`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_nv`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `nha_pp`
--
ALTER TABLE `nha_pp`
  ADD PRIMARY KEY (`ma_npp`),
  ADD UNIQUE KEY `dien_thoai` (`dien_thoai`),
  ADD UNIQUE KEY `ten_npp` (`ten_npp`,`dia_chi`,`email`) USING HASH;

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ma_dm` (`ma_dm`),
  ADD KEY `nha_pp` (`nha_pp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `ma_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `ma_nv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nha_pp`
--
ALTER TABLE `nha_pp`
  MODIFY `ma_npp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Constraints for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_1` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`),
  ADD CONSTRAINT `hoa_don_chi_tiet_ibfk_2` FOREIGN KEY (`san_pham`) REFERENCES `san_pham` (`ma_sp`),
  ADD CONSTRAINT `ma_hd` FOREIGN KEY (`ma_hd`) REFERENCES `hoa_don` (`ma_hd`),
  ADD CONSTRAINT `san_pham` FOREIGN KEY (`san_pham`) REFERENCES `san_pham` (`ma_sp`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_dm`) REFERENCES `danh_muc` (`ma_dm`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`nha_pp`) REFERENCES `nha_pp` (`ma_npp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
