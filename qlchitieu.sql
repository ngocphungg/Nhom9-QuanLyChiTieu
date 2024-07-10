-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2023 lúc 07:37 PM
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
-- Cơ sở dữ liệu: `qlchitieu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_type` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `kieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_type`, `name`, `kieu`) VALUES
(1, 'Lương', 'Thu'),
(2, 'Thưởng', 'Thu'),
(3, 'Ăn Uống', 'Chi'),
(4, 'Di chuyển', 'Chi'),
(5, 'Du lịch', 'Chi'),
(6, 'Học tập', 'Chi'),
(7, 'Mua sắm', 'Chi'),
(8, 'Sức khỏe', 'Chi'),
(9, 'Chơi bida', 'Chi'),
(11, 'Mẹ cho', 'Thu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_expense`
--

CREATE TABLE `data_expense` (
  `id_expense` int(8) NOT NULL,
  `id_acc` int(11) NOT NULL,
  `amount` int(50) NOT NULL,
  `note` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id_type_exp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `data_expense`
--

INSERT INTO `data_expense` (`id_expense`, `id_acc`, `amount`, `note`, `date`, `id_type_exp`) VALUES
(1, 0, 123, NULL, NULL, 0),
(2, 0, 234, NULL, NULL, 0),
(4, 0, 0, NULL, NULL, 0),
(5, 0, 0, NULL, NULL, 0),
(8, 0, 0, NULL, NULL, 0),
(11, 1, 100000, '1231', '2023-10-14', 1),
(12, 1, 3534, '1231', '2023-10-03', 2),
(13, 1, 50000, 'đổ xăng', '2023-10-15', 2),
(14, 1, 100000, 'ăn', '2023-10-12', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `data_income`
--

CREATE TABLE `data_income` (
  `id_income` int(8) NOT NULL,
  `id_acc` int(8) NOT NULL,
  `amount` int(50) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `id_type_inc` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `data_income`
--

INSERT INTO `data_income` (`id_income`, `id_acc`, `amount`, `note`, `date`, `id_type_inc`) VALUES
(1, 1, 2000, '798', '2023-10-14', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodich`
--

CREATE TABLE `giaodich` (
  `id_gd` int(8) NOT NULL,
  `id_type` int(8) NOT NULL,
  `amount` int(8) NOT NULL,
  `date` date NOT NULL,
  `note` text NOT NULL,
  `id_acc` int(8) NOT NULL,
  `kieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giaodich`
--

INSERT INTO `giaodich` (`id_gd`, `id_type`, `amount`, `date`, `note`, `id_acc`, `kieu`) VALUES
(10, 1, 10000, '2023-10-17', '123123', 1, 'Thu'),
(12, 4, 2000, '2023-10-16', '1321', 1, 'Chi'),
(13, 1, 33333, '2023-10-17', '1123', 1, 'Thu'),
(14, 9, 3000, '2023-10-18', '1231', 1, 'Chi'),
(15, 9, 3000, '2023-10-18', '1231', 1, 'Chi'),
(16, 9, 3000, '2023-10-18', 'nhap', 1, 'Chi'),
(17, 9, 3000, '2023-10-18', 'nhap', 1, 'Chi'),
(18, 11, 123, '2023-10-18', '798', 1, 'Thu'),
(19, 7, 11111, '2023-10-18', '111', 1, 'Chi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_accounts`
--

CREATE TABLE `list_accounts` (
  `id_acc` int(8) NOT NULL,
  `name_acc` varchar(50) NOT NULL,
  `money_acc` int(50) NOT NULL,
  `thu` int(11) NOT NULL,
  `chi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `list_accounts`
--

INSERT INTO `list_accounts` (`id_acc`, `name_acc`, `money_acc`, `thu`, `chi`) VALUES
(1, 'Tiền mặt', 61678, 43456, 25111),
(2, 'Chuyển khoản ngân hàng', 43333, 0, 0),
(3, 'Thẻ ghi nợ', 43333, 0, 0),
(12, 'Đi học', 10000, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_exp`
--

CREATE TABLE `type_exp` (
  `id_type_exp` int(8) NOT NULL,
  `name_exp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `type_exp`
--

INSERT INTO `type_exp` (`id_type_exp`, `name_exp`) VALUES
(1, 'Ăn uống'),
(2, 'Di Chuyển'),
(3, 'Mua Sắm'),
(4, 'Giải Trí'),
(5, 'Sức Khỏe'),
(6, 'Du Lịch'),
(7, 'Học Tập'),
(8, 'Sở Thích');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_income`
--

CREATE TABLE `type_income` (
  `id_type_inc` int(8) NOT NULL,
  `name_inc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `type_income`
--

INSERT INTO `type_income` (`id_type_inc`, `name_inc`) VALUES
(1, 'Tiền lương'),
(2, 'Tiền thưởng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_tk` int(8) NOT NULL,
  `email` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_tk`, `email`, `name`, `pass`) VALUES
(1, 'phungngoc@gmail.com', 'ngoc', 'aaa'),
(2, 'diep@gmail.com', 'diep', '2411'),
(3, 'ha@gmail.com', 'happy', '12345');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_type`);

--
-- Chỉ mục cho bảng `data_expense`
--
ALTER TABLE `data_expense`
  ADD PRIMARY KEY (`id_expense`);

--
-- Chỉ mục cho bảng `data_income`
--
ALTER TABLE `data_income`
  ADD PRIMARY KEY (`id_income`);

--
-- Chỉ mục cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`id_gd`);

--
-- Chỉ mục cho bảng `list_accounts`
--
ALTER TABLE `list_accounts`
  ADD PRIMARY KEY (`id_acc`);

--
-- Chỉ mục cho bảng `type_exp`
--
ALTER TABLE `type_exp`
  ADD PRIMARY KEY (`id_type_exp`);

--
-- Chỉ mục cho bảng `type_income`
--
ALTER TABLE `type_income`
  ADD PRIMARY KEY (`id_type_inc`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_type` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `data_expense`
--
ALTER TABLE `data_expense`
  MODIFY `id_expense` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `data_income`
--
ALTER TABLE `data_income`
  MODIFY `id_income` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `id_gd` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `list_accounts`
--
ALTER TABLE `list_accounts`
  MODIFY `id_acc` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_tk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
