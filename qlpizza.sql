-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2017 at 04:31 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlpizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `MaDonhang` int(11) NOT NULL,
  `MaMonan` varchar(10) NOT NULL,
  `Giatien` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  PRIMARY KEY (`MaDonhang`,`MaMonan`),
  KEY `chitiet_ibfk_2` (`MaMonan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaDonhang`, `MaMonan`, `Giatien`, `Soluong`) VALUES
(1, 'cb01', 12, 12),
(1, 'cb02', 12, 12),
(1, 'cb5', 1, 1),
(2, 'cb5', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `MaDonhang` int(11) NOT NULL AUTO_INCREMENT,
  `ThoiGianDathang` datetime NOT NULL,
  `TongGiatien` int(11) NOT NULL DEFAULT '0',
  `Giamgia` int(11) NOT NULL DEFAULT '0',
  `Thanhtien` int(11) NOT NULL DEFAULT '0',
  `MaNguoidung` int(11) NOT NULL,
  PRIMARY KEY (`MaDonhang`),
  KEY `MaNguoidung` (`MaNguoidung`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MaDonhang`, `ThoiGianDathang`, `TongGiatien`, `Giamgia`, `Thanhtien`, `MaNguoidung`) VALUES
(1, '0000-00-00 00:00:00', 248000, 0, 248000, 1),
(2, '0000-00-00 00:00:00', 300000, 25000, 275000, 2),
(3, '0000-00-00 00:00:00', 0, 10, 0, 3),
(44, '2017-12-08 04:47:44', 587000, 10, 528300, 3),
(48, '2017-12-08 04:59:42', 178000, 0, 178000, 7),
(50, '2017-12-08 05:18:07', 339000, 0, 339000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `loaimonan`
--

DROP TABLE IF EXISTS `loaimonan`;
CREATE TABLE IF NOT EXISTS `loaimonan` (
  `MaLoaiMonan` varchar(10) NOT NULL,
  `TenLoaiMonan` varchar(50) NOT NULL,
  PRIMARY KEY (`MaLoaiMonan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaimonan`
--

INSERT INTO `loaimonan` (`MaLoaiMonan`, `TenLoaiMonan`) VALUES
('cb', 'Combo'),
('mc', 'Món chính'),
('mkv', 'Món khai vị'),
('mn', 'Món nước'),
('pz', 'Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `loainguoidung`
--

DROP TABLE IF EXISTS `loainguoidung`;
CREATE TABLE IF NOT EXISTS `loainguoidung` (
  `MaLoaiNguoidung` varchar(10) NOT NULL,
  `TenLoaiNguoidung` varchar(50) NOT NULL,
  PRIMARY KEY (`MaLoaiNguoidung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loainguoidung`
--

INSERT INTO `loainguoidung` (`MaLoaiNguoidung`, `TenLoaiNguoidung`) VALUES
('admin', 'Người quản trị'),
('gm', 'Gold Member'),
('nm', 'Normal Member');

-- --------------------------------------------------------

--
-- Table structure for table `monan`
--

DROP TABLE IF EXISTS `monan`;
CREATE TABLE IF NOT EXISTS `monan` (
  `MaMonan` varchar(10) NOT NULL,
  `TenMonan` varchar(50) NOT NULL,
  `Giatien` int(11) NOT NULL,
  `Chitiet` varchar(255) NOT NULL,
  `Hinhanh` varchar(255) NOT NULL,
  `MaLoaiMonan` varchar(10) NOT NULL,
  PRIMARY KEY (`MaMonan`),
  KEY `MaLoaiMonan` (`MaLoaiMonan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monan`
--

INSERT INTO `monan` (`MaMonan`, `TenMonan`, `Giatien`, `Chitiet`, `Hinhanh`, `MaLoaiMonan`) VALUES
('cb01', 'Combo phô mai viền 3 vị', 339000, '1 Bánh pizza phô mai viền 3 vị\r\n1 salad cá ngừ\r\n2 lon nước ngọt', 'cb01.png', 'cb'),
('cb02', 'Combo mua 1 tặng 1', 248000, '2 bánh pizza tự chọn\r\n1 salad bogo\r\n1 chai nước ngọt 1,5l', 'cb02.png', 'cb'),
('cb5', 'asgddg', 22152, 'sajdfhkhksjhfd', 'cb5.png', 'cb'),
('mc01', 'Spaghetti seafood black peper ', 119000, 'Mỳ ý hải sản với sốt tiêu đen cay nồng thơm ngon.', 'mc01.png', 'mc'),
('mc02', 'Spaghetti bolognese', 109000, 'Mỳ ý bò bằm sốt cà chua', 'mc02.png', 'mc'),
('mkv01', 'Crinkle fries', 59000, 'Khoai tây chiên thơm ngon giòn rụm.', 'mkv01.png', 'mkv'),
('mkv02', 'Tuna bacon salad', 69000, 'Salad cá ngừ cùng với thịt xông khói.', 'mkv02.png', 'mkv'),
('mn01', 'Coca can', 29000, 'Coca lon mát lạnh', 'mn01.png', 'mn'),
('mn02', 'Fanta can', 29000, 'Fanta lon mát lạnh', 'mn02.png', 'mn'),
('pz01', 'Pizza Seafood Pesto', 189000, 'Bánh pizza hải sản với sốt pesto thơm lừng.', 'pz01.png', 'pz'),
('pz02', 'Pizza Ocean Delight', 189000, 'Bánh pizza hải sản với các loại rau củ tươi ngon.', 'pz02.png', 'pz');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `MaNguoidung` int(10) NOT NULL AUTO_INCREMENT,
  `TenNguoidung` varchar(50) NOT NULL,
  `Matkhau` varchar(50) NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Gioitinh` varchar(3) NOT NULL DEFAULT 'nam',
  `Sodienthoai` varchar(10) NOT NULL,
  `Diachi` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Diem` int(11) NOT NULL DEFAULT '0',
  `MaLoaiNguoidung` varchar(10) NOT NULL,
  PRIMARY KEY (`MaNguoidung`),
  KEY `MaLoaiNguoidung` (`MaLoaiNguoidung`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`MaNguoidung`, `TenNguoidung`, `Matkhau`, `Ngaysinh`, `Gioitinh`, `Sodienthoai`, `Diachi`, `Email`, `Diem`, `MaLoaiNguoidung`) VALUES
(1, 'yuan', 'ass', '2017-11-08', 'nam', '09090909', 'asdasdafasd', 'asdasdasdasd', 0, 'nm'),
(2, 'trong', 'ass2', '2017-11-15', 'nam', '142313543', 'asjdlakjdlaks', 'aaa', 0, 'admin'),
(3, 'gay', '123', '2017-11-11', 'nam', '11111', '111111', 'gay3', 444, 'gm'),
(7, 'admin', '123', '2017-11-01', 'nam', '000000000', '000000000', 'admin', 0, 'admin'),
(9, 'Trong', '123', '2017-11-08', 'nu', '906464196', 'au duong lan f1 q8', 'Trong@yahoo.com', 0, 'nm');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitiet_ibfk_1` FOREIGN KEY (`MaDonhang`) REFERENCES `donhang` (`MaDonhang`),
  ADD CONSTRAINT `chitiet_ibfk_2` FOREIGN KEY (`MaMonan`) REFERENCES `monan` (`MaMonan`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaNguoidung`) REFERENCES `nguoidung` (`MaNguoidung`);

--
-- Constraints for table `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `monan_ibfk_1` FOREIGN KEY (`MaLoaiMonan`) REFERENCES `loaimonan` (`MaLoaiMonan`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`MaLoaiNguoidung`) REFERENCES `loainguoidung` (`MaLoaiNguoidung`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
