-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 31, 2023 lúc 09:42 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `teaplus`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `bill_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_tel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 Thanh toán trực tiếp\r\n2 Chuyển khoản\r\n3 Thanh toán online',
  `ngaydathang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tatal` int(11) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0.Đơn hàng mới\r\n1.Đang xử lý\r\n2.Đang giao hàng\r\n3.Đã giao hàng\r\n4 : Đã hủy đơn hàng',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receive_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receive_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receive` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_pttt`, `ngaydathang`, `tatal`, `bill_status`, `note`, `receive_name`, `receive_address`, `receive`) VALUES
(64, 3, 'cs', 'Tổ 5 cơ thạch hà nội', '354', 2, '15:36:16pm 29/03/2023', 52005, 4, '', '', '', ''),
(65, 3, 'cs', 'Tổ 5 cơ thạch hà nội', '346', 1, '18:01:13pm 29/03/2023', 52005, 4, 'hdfh', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `ngaybinhluan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idpro` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sugar` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `ice` int(11) NOT NULL,
  `topping` int(15) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `idbill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `sugar`, `size`, `ice`, `topping`, `soluong`, `thanhtien`, `idbill`) VALUES
(62, 3, 81, 'upload/ts16.jpg', 'Trà sữa Panda', 25000, 2000, 5000, 5, 10000, 1, 42005, 64),
(63, 3, 81, 'upload/ts16.jpg', 'Trà sữa Panda', 25000, 2000, 5000, 5, 10000, 1, 42005, 65);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(1, 'trà sữa trân châu'),
(2, 'trà sữa matcha'),
(3, 'trà sữa dâu tây'),
(4, 'trà sữa chocalate'),
(5, 'trà sữa việt quất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tensp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sugar` int(15) NOT NULL,
  `size` int(15) NOT NULL,
  `ice` int(15) NOT NULL,
  `topping` int(15) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` tinyint(11) NOT NULL DEFAULT 1,
  `thanhtien` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 : chưa thanh toán ,\r\n2 : đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `idsp`, `id_user`, `tensp`, `image`, `sugar`, `size`, `ice`, `topping`, `gia`, `soluong`, `thanhtien`, `status`) VALUES
(146, 81, 3, 'Trà sữa Panda', 'upload/ts16.jpg', 2000, 5000, 5, 10000, 25000, 1, 42005, 2),
(148, 81, 3, 'Trà sữa Panda', 'upload/ts16.jpg', 2000, 5000, 5, 10000, 25000, 1, 42005, 2),
(150, 81, 3, 'Trà sữa Panda', 'upload/ts16.jpg', 2000, 5000, 5, 17000, 25000, 1, 49005, 1),
(151, 81, 3, 'Trà sữa Panda', 'upload/ts16.jpg', 2000, 5000, 5, 4000, 25000, 1, 36005, 1),
(152, 75, 3, 'Tigar Sugar', 'upload/ts10.jpg', 2000, 5000, 5, 4000, 35000, 1, 46005, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `hovaten` varchar(255) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `loinhan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `hovaten`, `dienthoai`, `email`, `diachi`, `loinhan`) VALUES
(2, '', '981896360', 'quangnvph24106@fpt.edu.vn', '34 le thanh phuong', '123'),
(3, '', '981896360', 'quangnvph24106@fpt.edu.vn', '', '12dfv'),
(12, 'nguyễn văn quang', '0981896360', 'quangnvph24106@fpt.edu.vn', 'trịnh văn bô , xuân phơng', 'quang đẹp trai vl\r\n'),
(13, 'nguyễn văn quang', '0981896360', 'quangnvph24106@fpt.edu.vn', 'trịnh văn bô , xuân phơng', 'jcbvfjdb sdvkdf sknjvkjdnfkjv dkjfvjkb skvjnjdk skdvnjjkb skdjvnjkv skdjvkjfb skdvjk');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luotxem` int(11) NOT NULL,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `image`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(67, '', 'Trà đào dâu tây kem phô mai ', 46000, 'ts2.jpg', 'good', 0, 3),
(68, '', 'Sữa chua mận hạt sen ', 35000, 'ts3.jpg', 'good', 0, 2),
(69, '', 'Trà mận hạt sen', 25000, 'ts4.jpg', 'good', 0, 1),
(70, '', 'Ô long xoài kem cà phê', 30000, 'ts5.jpg', 'good', 0, 5),
(71, '', 'Trà đào bưởi hồng trân châu baby', 25000, 'ts6.jpg', 'good', 0, 5),
(72, '', 'Trà xoài bưởi hồng', 25000, 'ts7.jpg', 'good', 0, 1),
(73, '', 'Choco ngũ cốc cà phê ', 35000, 'ts8.jpg', 'good', 0, 4),
(74, '', 'Hồng trà ngũ cốc kem cà phê', 30000, 'ts9.jpg', 'good', 0, 2),
(75, '', 'Tigar Sugar', 35000, 'ts10.jpg', 'good', 0, 1),
(76, '', 'Trà sữa ba anh em', 25000, 'ts14.jpg', 'good', 0, 4),
(77, '', 'Ô long kem phô mai', 25000, 'ts12.jpg', 'delicious', 0, 2),
(78, '', 'Trà sữa nhiệt đới', 25000, 'ts13.jpg', 'very good', 0, 3),
(79, '', 'Trà sữa hạnh phúc', 25000, 'ts11.jpg', 'good', 0, 4),
(80, '', 'Trà Sữa Kim Cương Đen Okinawa', 25000, 'ts15.jpg', 'good', 0, 5),
(81, '', 'Trà sữa Panda', 25000, 'ts16.jpg', '  good ', 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `avatar`, `email`, `address`, `tel`, `role`) VALUES
(3, 'cs', '123', '294659957_570216171236595_481134.jpg', 'lale07305@gmail.com', 'Tổ 5 cơ thạch hà nội', '', 1),
(4, 'sdc', '123', '', 'dwsdw@gmail.com', NULL, NULL, 0),
(5, 'we', '123', '330845739_5779065388815784_80568.jpg', 'as@gmail.com', 'Tổ 5 cơ thạch hà nội', '0363128962', 0),
(6, 'duc1', '123', '', 'ducnvph24098@gmail.vn', NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_bill` (`idbill`),
  ADD KEY `cart_user` (`iduser`),
  ADD KEY `cart_sanpham` (`idpro`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giohang_sanpham` (`idsp`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `cart_sanpham` FOREIGN KEY (`idpro`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_sanpham` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
