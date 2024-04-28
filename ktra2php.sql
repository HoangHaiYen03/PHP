-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2024 lúc 11:23 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ktra2php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `Sohoadon` int(5) NOT NULL,
  `mahang` varchar(5) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giaban` decimal(19,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `Sohoadon` int(5) NOT NULL,
  `Ngaychonhang` date NOT NULL,
  `Nguoidathang` varchar(50) NOT NULL,
  `Chedo` int(1) NOT NULL,
  `ngaydathang` date NOT NULL,
  `ngaythanhtoan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihang`
--

CREATE TABLE `loaihang` (
  `Maloai` varchar(5) NOT NULL,
  `Tenloai` varchar(50) NOT NULL,
  `Mota` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihang`
--

INSERT INTO `loaihang` (`Maloai`, `Tenloai`, `Mota`) VALUES
('CV', 'Chân váy', NULL),
('D', 'Đầm', NULL),
('GL', 'Gile', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` varchar(5) NOT NULL,
  `TenSP` varchar(100) NOT NULL,
  `HinhAnh` varchar(50) NOT NULL,
  `MoTa` text DEFAULT NULL,
  `Gia` decimal(10,2) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Maloai` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSP`, `HinhAnh`, `MoTa`, `Gia`, `SoLuong`, `Maloai`) VALUES
('CV04', 'Chân váy kaki xòe', 'cvxoe.jpg', 'Cơ bản, Hàn Quốc, Tối giản, sexy, Đường phố', 195000.00, 50, 'CV'),
('CV05', 'Chân váy kaki chữ A có nút ', 'cvchua.jpg', 'Mini', 195000.00, 28, 'CV'),
('D02', 'Đầm dây cổ vuông nơ xếp ly ', 'damdaycovuong.jpg', 'Cơ bản, Hàn Quốc, Tối giản, sexy, Đường phố', 385000.00, 47, 'D'),
('D14', 'Đầm 2 dây phồng 3 nơ', 'dam2day.jpg', 'Sọc caro', 315000.00, 78, 'D'),
('D21', 'Đầm cột dây cổ yếm gắn nơ 2 bên ', 'damno.jpg', 'Đường phố', 385000.00, 120, 'D'),
('D24', 'Đầm thun dây đuôi phồng', 'damthundayduoiphong.jpg', 'Cổ chữ V', 355000.00, 232, 'D'),
('GL03', 'Áo gile nữ dạng vest cài khuy', 'aogile.jpg', 'Hàn Quốc, Tối giản, Retro, Cổ điển', 325000.00, 50, 'GL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID` int(11) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `Quyen` enum('user','admin') NOT NULL,
  `HoatDong` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `TenDangNhap`, `MatKhau`, `Quyen`, `HoatDong`) VALUES
(1, 'user1', 'password1', 'user', 'yes'),
(2, 'user2', 'password2', 'user', 'yes'),
(3, 'user3', 'password3', 'user', 'yes'),
(4, 'user4', 'password4', 'user', 'yes'),
(5, 'user5', 'password5', 'user', 'yes'),
(6, 'admin1', 'adminpass1', 'admin', 'yes'),
(7, 'admin2', 'adminpass2', 'admin', 'yes'),
(8, 'admin3', 'adminpass3', 'admin', 'yes'),
(9, 'admin4', 'adminpass4', 'admin', 'yes'),
(10, 'admin5', 'adminpass5', 'admin', 'yes');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`Sohoadon`,`mahang`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`Sohoadon`);

--
-- Chỉ mục cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`Maloai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `fk_maloai` (`Maloai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `Sohoadon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_maloai` FOREIGN KEY (`Maloai`) REFERENCES `loaihang` (`Maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
