-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2013 at 05:46 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_primrose`
--

-- --------------------------------------------------------

--
-- Table structure for table `bb_captchas`
--

CREATE TABLE IF NOT EXISTS `bb_captchas` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `word` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=271 ;

-- --------------------------------------------------------

--
-- Table structure for table `bb_sessions`
--

CREATE TABLE IF NOT EXISTS `bb_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bb_sessions`
--

INSERT INTO `bb_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('005fbda7f076e4afed8f5b74916dbe11', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', 1366438021, ''),
('d41fad7de8e9888cf1c30d825f4f2b89', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1372264795, ''),
('efe17ce5b8e00652160b5c3cf68b7e94', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', 1366428594, ''),
('f4904e3dd8b819c6a1f8225dd157e8a3', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0', 1374222136, '');

-- --------------------------------------------------------

--
-- Table structure for table `bo_dem`
--

CREATE TABLE IF NOT EXISTS `bo_dem` (
  `ma` int(11) NOT NULL AUTO_INCREMENT,
  `trinh_duyet` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian` datetime NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ma`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `bo_dem`
--

INSERT INTO `bo_dem` (`ma`, `trinh_duyet`, `ip`, `thoi_gian`, `link`) VALUES
(1, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '127.0.0.1', '2013-03-16 09:20:33', '/shopus/'),
(2, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-17 18:32:33', '/shopus/'),
(3, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-18 05:50:40', '/shopus/'),
(4, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-18 05:53:36', '/shopus/'),
(5, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22', '::1', '2013-03-18 06:09:28', '/shopus/'),
(6, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-18 06:27:18', '/shopus/'),
(7, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-18 07:39:23', '/shopus/'),
(8, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-18 11:11:04', '/shopus/'),
(9, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-18 11:11:29', '/shopus/'),
(10, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-18 11:21:20', '/shopus/'),
(11, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-19 02:47:56', '/shopus/'),
(12, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-19 10:06:44', '/shopus/thanhtoan/xacnhan'),
(13, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-19 10:23:07', '/shopus/'),
(14, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-19 11:44:04', '/shopus/adminpanel'),
(15, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-20 02:34:41', '/shopus/adminpanel'),
(16, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-21 10:10:20', '/shopus/'),
(17, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-21 17:49:56', '/shopus/'),
(18, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-22 14:55:24', '/shopus/'),
(19, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-23 08:44:42', '/shopus/adminpanel'),
(20, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-03-26 11:19:12', '/shopus/adminpanel'),
(21, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Safari/537.31', '::1', '2013-04-10 18:54:13', '/shopus/'),
(22, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:19.0) Gecko/20100101 Firefox/19.0', '::1', '2013-04-10 19:19:50', '/shopus/adminpanel'),
(23, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', '::1', '2013-04-16 09:19:05', '/primrose/'),
(24, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', '::1', '2013-04-18 05:13:34', '/primrose/'),
(25, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', '::1', '2013-04-19 06:32:39', '/primrose/'),
(26, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', '::1', '2013-04-19 08:13:10', '/primrose/'),
(27, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', '::1', '2013-04-19 12:22:22', '/primrose/'),
(28, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', '::1', '2013-04-19 14:06:45', '/primrose/'),
(29, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31', '::1', '2013-04-19 16:33:14', '/primrose/'),
(30, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31', '::1', '2013-04-19 16:34:18', '/primrose/'),
(31, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0', '::1', '2013-04-20 05:19:35', '/primrose/'),
(32, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', '::1', '2013-06-26 18:38:46', '/primrose/'),
(33, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0', '::1', '2013-07-19 10:22:17', '/primrose/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Type` int(11) NOT NULL,
  `FullName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Username`, `Password`, `Type`, `FullName`, `Link`, `NgayTao`, `Status`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b', 77, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminrole`
--

CREATE TABLE IF NOT EXISTS `tbl_adminrole` (
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LoaiGame` int(1) NOT NULL,
  `Store` int(1) NOT NULL,
  `Platform` int(1) NOT NULL,
  `Game` int(1) NOT NULL,
  `SanPham` int(1) NOT NULL,
  `Setting` int(1) NOT NULL,
  `Blog` int(1) NOT NULL,
  `Support` int(1) NOT NULL,
  `PromotionCode` int(1) NOT NULL,
  `FreeStuff` int(1) NOT NULL,
  `Image` int(1) NOT NULL,
  `Email` int(1) NOT NULL,
  `Library` int(1) NOT NULL,
  `VietBlog` int(1) NOT NULL,
  `NguoiDung` int(11) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_adminrole`
--

INSERT INTO `tbl_adminrole` (`Username`, `LoaiGame`, `Store`, `Platform`, `Game`, `SanPham`, `Setting`, `Blog`, `Support`, `PromotionCode`, `FreeStuff`, `Image`, `Email`, `Library`, `VietBlog`, `NguoiDung`) VALUES
('admin', 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_baiviet`
--

CREATE TABLE IF NOT EXISTS `tbl_baiviet` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ten_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ten_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung_en` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung_vi` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`Id`, `Ten_en`, `Ten_vi`, `NoiDung_en`, `NoiDung_vi`, `GhiChu`) VALUES
(1, 'About us', 'Giới thiệu', '<p>\r\n	The content about us</p>', '<p>\r\n	Nội dung giới thiệu</p>\r\n', NULL),
(2, 'Homepage', 'Thông tin trang chủ', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.', 'Thông tin về chúng tôi nhà phân phối hàng cao cấp', NULL),
(3, 'Payment ', 'Hướng dẫn thanh toán', 'Payment', 'Nội dung hướng dẫn thanh toán', NULL),
(4, 'Privacy Notice', 'Chính sách', 'Privacy Notice data', 'Nội dung chính sách', NULL),
(5, 'Conditions of use', 'Điều khoản', 'Condition of use content', 'Nội dung điều khoản', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietdonhang`
--

CREATE TABLE IF NOT EXISTS `tbl_chitietdonhang` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdDonHang` int(11) NOT NULL,
  `IdSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE IF NOT EXISTS `tbl_donhang` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoDT` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDatHang` datetime NOT NULL,
  `TongSP` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `TrangThai` int(1) NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hinhanh`
--

CREATE TABLE IF NOT EXISTS `tbl_hinhanh` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdSanPham` int(11) NOT NULL,
  `UrlHinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `TrangThai` int(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_hinhanh`
--

INSERT INTO `tbl_hinhanh` (`Id`, `IdSanPham`, `UrlHinh`, `ThuTu`, `TrangThai`) VALUES
(11, 5, 'http://localhost/shopus/upload/images/16.jpg', 1, 1),
(12, 5, 'http://localhost/shopus/upload/images/15.jpg', 2, 1),
(13, 5, 'http://localhost/shopus/upload/images/17.jpg', 3, 1),
(14, 1, 'upload/images/product1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lienhe`
--

CREATE TABLE IF NOT EXISTS `tbl_lienhe` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `NgayTao` datetime NOT NULL,
  `TinhTrang` int(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`Id`, `Name`, `Phone`, `Email`, `TieuDe`, `NoiDung`, `NgayTao`, `TinhTrang`) VALUES
(1, 'dasda', '4546546456', 'ntduy2706@gmail.com', 'dsadad', 'dsadaddsadasd', '2013-04-19 17:27:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loaisanpham`
--

CREATE TABLE IF NOT EXISTS `tbl_loaisanpham` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Ten_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ten_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiCha` int(11) NOT NULL,
  `NoiBat` int(1) NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `TrangThai` int(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_loaisanpham`
--

INSERT INTO `tbl_loaisanpham` (`Id`, `Ten_en`, `Ten_vi`, `MaLoaiCha`, `NoiBat`, `ThuTu`, `TrangThai`) VALUES
(1, 'Candel 1', 'Nến loại 1', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE IF NOT EXISTS `tbl_sanpham` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdLoai` int(11) NOT NULL,
  `HinhDaiDien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ten_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Ten_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TomTat_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TomTat_vi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTa_en` text COLLATE utf8_unicode_ci,
  `MoTa_vi` text COLLATE utf8_unicode_ci,
  `Gia` int(11) NOT NULL,
  `NoiBat` int(1) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `ThuTu` int(11) NOT NULL,
  `TrangThai` int(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`Id`, `IdLoai`, `HinhDaiDien`, `Ten_en`, `Ten_vi`, `TomTat_en`, `TomTat_vi`, `MoTa_en`, `MoTa_vi`, `Gia`, `NoiBat`, `NgayTao`, `ThuTu`, `TrangThai`) VALUES
(1, 1, '/upload/images/product1.jpg', 'Candels White', 'Nến trắng', 'sdasdasdas', 'ddsadasdasdd', '<p>\r\n	dasdasdasd</p>\r\n', '<p>\r\n dasdadasdad</p>\r\n', 500000, 0, '2013-04-18 16:42:52', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
