-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2024 lúc 04:40 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

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
  `Ngaychonhang` date NOT NULL DEFAULT current_timestamp(),
  `Nguoidathang` varchar(50) NOT NULL,
  `Chedo` int(1) NOT NULL,
  `ngaydathang` date NOT NULL DEFAULT current_timestamp(),
  `ngaythanhtoan` date NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `phuongthuc` varchar(30) NOT NULL,
  `SDT` int(11) NOT NULL
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
('CV01', 'Chân váy xếp ly cạp thấp', 'cvxepli.jpg', 'Mini', 200000.00, 104, 'CV'),
('CV04', 'Chân váy kaki xòe', 'cvxoe.jpg', 'Cơ bản, Hàn Quốc, Tối giản, sexy, Đường phố', 195000.00, 50, 'CV'),
('CV05', 'Chân váy kaki chữ A có nút ', 'cvchua.jpg', 'Mini', 195000.00, 28, 'CV'),
('CVTN0', 'Chân váy xếp ly phom phồng basic', 'cvbasic.jpg', 'Mini', 195000.00, 28, 'CV'),
('D02', 'Đầm dây cổ vuông nơ xếp ly ', 'damdaycovuong.jpg', 'Cơ bản, Hàn Quốc, Tối giản, sexy, Đường phố', 385000.00, 47, 'D'),
('D07', 'Đầm dây hai tầng cúp ngực', 'dam2daybong.jpg', 'váy xòe', 298000.00, 45, 'D'),
('D13', 'Đầm jean cổ vuông cài khuy', 'damjean.jpg', 'Mini', 195000.00, 240, 'D'),
('D14', 'Đầm 2 dây phồng 3 nơ', 'dam2day.jpg', 'Sọc caro', 315000.00, 78, 'D'),
('D21', 'Đầm cột dây cổ yếm gắn nơ 2 bên ', 'damno.jpg', 'Đường phố', 385000.00, 120, 'D'),
('D24', 'Đầm thun dây đuôi phồng', 'damthundayduoiphong.jpg', 'Cổ chữ V', 355000.00, 232, 'D'),
('GL03', 'Áo gile nữ dạng vest cài khuy', 'aogile.jpg', 'Hàn Quốc, Tối giản, Retro, Cổ điển', 325000.00, 50, 'GL'),
('GL04', 'Áo gile nữ CỔ VUÔNG cài khuy ', 'gile.jpg', 'Denim', 315000.00, 50, 'GL');

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `Sohoadon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
