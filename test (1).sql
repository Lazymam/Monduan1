-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2023 lúc 06:49 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(9) NOT NULL,
  `madh` varchar(20) NOT NULL,
  `iduser` int(6) NOT NULL,
  `nguoidat_ten` varchar(50) NOT NULL,
  `nguoidat_email` varchar(50) NOT NULL,
  `nguoidat_tel` varchar(20) NOT NULL,
  `nguoidat_diachi` varchar(100) NOT NULL,
  `nguoinhan_ten` varchar(50) DEFAULT NULL,
  `nguoinhan_diachi` varchar(100) DEFAULT NULL,
  `nguoinhan_tel` varchar(20) DEFAULT NULL,
  `total` int(9) NOT NULL,
  `ship` int(6) NOT NULL DEFAULT 0,
  `voucher` int(6) NOT NULL DEFAULT 0,
  `tongthanhtoan` int(9) NOT NULL,
  `pttt` tinyint(1) NOT NULL COMMENT '0: COD; 1: ck; 2: ví điện tử'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(6) NOT NULL,
  `idpro` int(6) NOT NULL,
  `iduser` int(6) NOT NULL,
  `noidung` text NOT NULL,
  `ngaybl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `idpro`, `iduser`, `noidung`, `ngaybl`) VALUES
(1, 0, 1, 'thanhhieu', '18:25:40 27/11/23'),
(2, 0, 1, '??p trai', '18:25:46 27/11/23'),
(3, 0, 1, 'haha', '18:29:10 27/11/23'),
(4, 0, 5, '', '21:29:48 27/11/23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(6) NOT NULL,
  `idpro` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(6) NOT NULL,
  `idbill` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0,
  `stt` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `home`, `stt`) VALUES
(1, 'Trà', 1, 1),
(2, 'Bánh', 0, 0),
(3, 'Cà phê', 1, 2),
(19, 'coffee', 0, 0),
(20, 'phamphuocdinh', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `price` int(6) NOT NULL,
  `view` int(9) NOT NULL DEFAULT 0,
  `bestseller` tinyint(1) NOT NULL DEFAULT 0,
  `iddm` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `img`, `price`, `view`, `bestseller`, `iddm`) VALUES
(1, 'Sản phẩm 1', 'sp1.webp', 100, 66, 1, 1),
(2, 'Sản phẩm 2', 'sp2.webp', 200, 235, 1, 1),
(4, 'Sản phẩm 4', 'sp4.webp', 400, 44, 1, 3),
(5, 'Cà phê', 'sp8.webp', 500000, 0, 0, 3),
(8, 'sanpham1', 'sp1.webp', 300, 0, 0, 2),
(9, 'sanpham1', 'sp4.webp', 0, 0, 0, 3),
(10, 'sanpham7', 'sp7.webp', 300, 0, 0, 3),
(11, 'Cà Phê Đen Đá', 'sp5.webp', 29, 0, 0, 3),
(12, 'The Coffee House Sữa Đá', 'sp2.webp', 32, 32, 0, 3),
(13, 'Cà Phê Sữa Đá Chai Fresh 250ML', 'sp6.webp', 75, 0, 0, 3),
(14, 'Cappuccino Đá', 'sp7.webp', 56, 0, 1, 3),
(15, 'Cappuccino Nóng', 'sp13.webp', 55, 0, 0, 3),
(16, 'Espresso Nóng', 'sp9.webp', 45, 50, 0, 3),
(21, 'Cold Brew Phúc Bồn Tử', 'sp10.webp', 49, 0, 1, 1),
(22, 'Cold Brew Sữa Tươi', 'sp11.webp', 49, 0, 0, 3),
(23, 'Cold Brew Truyền Thống', 'sp12.webp', 49, 0, 0, 1),
(24, 'Latte Nóng', 'sp14.webp', 55, 40, 1, 1),
(31, 'Hi-Tea Đào Kombucha', 'sp15.webp', 59, 50, 0, 1),
(32, 'Hi-Tea Yuzu Kombucha', 'sp16.webp', 59, 0, 0, 1),
(33, 'Phúc Bồn Tử Mandarin', 'sp16.webp', 49, 0, 0, 1),
(34, 'Hi-Tea Yuzu Trân Châu', 'sp17.webp', 49, 0, 0, 1),
(39, 'Bánh Mì Que Pate', 'sn3.webp', 15, 0, 0, 2),
(40, 'Bánh Mì Que Pate Cay', 'sn4.webp', 15, 0, 0, 2),
(41, 'Bánh Mì VN Thịt Nguội', 'sn5.webp', 25, 0, 0, 2),
(42, 'Croissant trứng muối', 'sn6.webp', 15, 0, 0, 2),
(44, 'Mochi Kem Phúc Bồn Tử', 'sn8.webp', 25, 0, 0, 2),
(45, 'Mochi Kem Việt Quất', 'sn9.webp', 15, 0, 0, 2),
(46, 'Mochi Kem Dừa Dứa', 'sn10.webp', 25, 0, 0, 2),
(47, 'Mochi Kem Chocolate', 'sn11.webp', 25, 0, 0, 2),
(49, 'Mochi Kem Xoài', 'sn13.webp', 26, 0, 1, 2),
(52, 'coffee', 'sn11.webp', 25, 0, 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `ten`, `diachi`, `email`, `dienthoai`, `role`) VALUES
(43, 'hieudichoinet', '123', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(47, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(48, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(49, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(50, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(51, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(52, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(53, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(54, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(55, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(56, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(57, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(58, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(59, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(60, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(61, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(62, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(63, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(64, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(65, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(66, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(67, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(68, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(69, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(70, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(71, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(72, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(73, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(74, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(75, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(76, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(77, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(78, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(79, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(80, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(81, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0),
(82, 'admin', 'phamthanhhieu', NULL, NULL, 'thanhhieu14092004@gmail.com', NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_dm` (`iddm`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_dm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
