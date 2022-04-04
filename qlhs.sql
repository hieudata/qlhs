-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 04, 2022 lúc 02:40 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlhs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`Id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Admin', 'Hieu', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemdanh`
--

CREATE TABLE `diemdanh` (
  `Id` int(10) NOT NULL,
  `maKhoi` varchar(10) CHARACTER SET utf8 NOT NULL,
  `maLop` varchar(10) CHARACTER SET utf8 NOT NULL,
  `maNamHoc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `trangThai` varchar(120) CHARACTER SET utf8 NOT NULL,
  `ngayTao` varchar(20) CHARACTER SET utf8 NOT NULL,
  `admissionNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diemdanh`
--

INSERT INTO `diemdanh` (`Id`, `maKhoi`, `maLop`, `maNamHoc`, `trangThai`, `ngayTao`, `admissionNo`) VALUES
(1, '3', '4', '1', '1', '2020-11-01', 'ASDFLKJ'),
(2, '3', '4', '1', '1', '2020-11-01', 'ASDFLKJ'),
(3, '3', '4', '1', '1', '2020-11-01', 'HSKSDD'),
(170, '3', '4', '1', '1', '2020-11-01', 'JSLDKJ'),
(171, '1', '4', '1', '0', '2020-11-01', 'HSKDS9EE'),
(172, '1', '4', '1', '1', '2020-11-01', 'JKADA'),
(173, '1', '2', '1', '1', '2020-11-19', 'JSFSKDJ'),
(174, '1', '2', '1', '1', '2020-11-19', 'ASDFLKJ'),
(175, '1', '2', '1', '1', '2020-11-19', 'HSKSDD'),
(176, '1', '4', '1', '0', '2021-07-15', 'JSLDKJ'),
(177, '1', '4', '1', '0', '2021-07-15', 'JSFSKDJ'),
(178, '1', '4', '1', '0', '2021-07-15', 'JKADA'),
(179, '1', '2', '1', '0', '2021-09-27', 'HSKDS9EE'),
(180, '1', '2', '1', '1', '2021-09-27', 'AASDFLKJ'),
(181, '1', '2', '1', '1', '2021-09-27', 'HSKSDD'),
(182, '1', '2', '1', '0', '2021-10-06', 'JSLDKJ'),
(183, '1', '2', '1', '0', '2021-10-06', 'ASDFLKJ'),
(184, '1', '2', '1', '1', '2021-10-06', 'HSKSDD'),
(185, '1', '2', '1', '0', '2021-10-07', 'JSLDKJ'),
(186, '1', '2', '1', '0', '2021-10-07', 'ASDFLKJ'),
(187, '1', '2', '1', '0', '2021-10-07', 'ASDFLKJ'),
(188, '4', '6', '1', '0', '2021-10-07', 'ASDFLKJ'),
(189, '4', '6', '1', '0', '2021-10-07', 'ASDFLKJ'),
(190, '4', '6', '1', '0', '2021-10-07', 'ASDFLKJ'),
(191, '4', '6', '1', '0', '2021-10-07', 'ASDFLKJ'),
(192, '4', '6', '1', '0', '2021-10-07', ''),
(193, '4', '6', '1', '0', '2021-10-07', ''),
(194, '4', '6', '1', '0', '2021-10-07', ''),
(195, '4', '6', '1', '0', '2021-10-07', ''),
(196, '3', '4', '1', '0', '30-03-2022', ''),
(197, '3', '4', '1', '0', '30-03-2022', ''),
(198, '3', '4', '1', '0', '30-03-2022', ''),
(199, '1', '2', '1', '1', '30-03-2022', 'AMS005'),
(200, '1', '2', '1', '1', '30-03-2022', 'AMS007'),
(201, '1', '2', '1', '1', '30-03-2022', 'AMS011'),
(202, '1', '2', '1', '0', '30-03-2022', 'AMS012'),
(203, '1', '2', '1', '0', '30-03-2022', 'AMS170'),
(204, '1', '2', '1', '1', '31-03-2022', 'AMS005'),
(205, '1', '2', '1', '1', '31-03-2022', 'AMS007'),
(206, '1', '2', '1', '1', '31-03-2022', 'AMS011'),
(207, '1', '2', '1', '0', '31-03-2022', 'AMS012'),
(208, '1', '2', '1', '0', '31-03-2022', 'AMS170'),
(209, '1', '2', '3', '0', '01-04-2022', 'AMS005'),
(210, '1', '2', '3', '0', '01-04-2022', 'AMS007'),
(211, '1', '2', '3', '0', '01-04-2022', 'AMS011'),
(212, '1', '2', '3', '0', '01-04-2022', 'AMS012'),
(213, '1', '2', '3', '0', '01-04-2022', 'AMS170'),
(214, '1', '2', '3', '0', '03-04-2022', 'AMS005'),
(215, '1', '2', '3', '0', '03-04-2022', 'AMS007'),
(216, '1', '2', '3', '0', '03-04-2022', 'AMS011'),
(217, '1', '2', '3', '0', '03-04-2022', 'AMS012'),
(218, '1', '2', '3', '0', '03-04-2022', 'AMS170'),
(219, '1', '2', '3', '0', '04-04-2022', 'AMS005'),
(220, '1', '2', '3', '0', '04-04-2022', 'AMS007'),
(221, '1', '2', '3', '0', '04-04-2022', 'AMS011'),
(222, '1', '2', '3', '0', '04-04-2022', 'AMS012'),
(223, '1', '2', '3', '0', '04-04-2022', 'AMS170');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `maKhoi` varchar(10) CHARACTER SET utf8 NOT NULL,
  `maLop` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ngayTao` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`Id`, `firstName`, `lastName`, `email`, `password`, `phone`, `maKhoi`, `maLop`, `ngayTao`) VALUES
(1, 'Lan', 'Nguyễn', 'lan@gmail.com', '123', '09089898999', '1', '2', '1-10-2019');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

CREATE TABLE `hocky` (
  `Id` int(10) NOT NULL,
  `tenHK` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocky`
--

INSERT INTO `hocky` (`Id`, `tenHK`) VALUES
(1, 'Một'),
(2, 'Hai'),
(3, 'Ba');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ngaysinh` varchar(255) NOT NULL,
  `maKhoi` varchar(10) CHARACTER SET utf8 NOT NULL,
  `maLop` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ngayTao` varchar(50) CHARACTER SET utf8 NOT NULL,
  `admissionNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`Id`, `firstName`, `lastName`, `ngaysinh`, `maKhoi`, `maLop`, `ngayTao`, `admissionNumber`) VALUES
(1, 'Hiếu', 'Nguyễn', '2-2-2002', '1', '2', '9-2-2019', 'AMS005'),
(2, 'Nga', 'Phạm', '23-3-2002', '1', '2', '9-2-2019', 'AMS007'),
(3, 'Thúy', 'Lan', '23-11-2002', '1', '2', '2-9-2019', 'AMS011'),
(4, 'Hương', 'Trịnh', '2-3-2002', '1', '2', '2-9-2019', 'AMS012'),
(5, 'Phạm', 'Hải', '3-3-2003', '3', '4', '2-9-2019', 'AMS015'),
(6, 'Nhung', 'Đăng', '23-12-2002', '3', '4', '2-9-2019', 'AMS017'),
(7, 'Nguyễn', 'Nam', '23-2-2001', '3', '4', '1-11-2021', 'AMS019'),
(8, 'Thành', 'Trần', '13-3-2001', '3', '5', '1-11-2021', 'AMS021'),
(9, 'Trung', 'Trần', '13-11-2001', '3', '5', '1-11-2021', 'AMS110'),
(10, 'Hà', 'Nguyễn', '1-3-2000', '4', '6', '1-11-2021', 'AMS133'),
(11, 'Hà', 'Trần', '10-3-2000', '4', '6', '1-11-2021', 'AMS135'),
(12, 'Dương', 'Trần', '1-10-2000', '4', '6', '1-11-2021', 'AMS144'),
(13, 'Ngọc', 'Nguyễn', '10-10-2000', '4', '6', '18-12-2021', 'AMS148'),
(14, 'Lan', 'Trần', '10-2-2000', '4', '6', '18-12-2021', 'AMS151'),
(15, 'Linh', 'Nguyễn', '3-12-2000', '4', '6', '18-12-2021', 'AMS159'),
(16, 'Hà', 'Hoàng', '2-2-2000', '4', '6', '18-12-2021', 'AMS161'),
(17, 'Dương', 'Nguyễn', '6-5-2000', '4', '6', '18-12-2021', 'AMS163'),
(22, 'Trum', 'Trum', '28-03-2022', '1', '2', '28-03-2022', 'AMS170'),
(29, 'qwe', 'rqwe', '4-4-1999', '3', '4', '4-4-2022', 'qweadmissionNumber'),
(33, 'qwe', 'qwe', '04-04-2022', '11', '11', '04-04-2022', 'rwerwr');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoi`
--

CREATE TABLE `khoi` (
  `Id` int(10) NOT NULL,
  `khoiLop` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoi`
--

INSERT INTO `khoi` (`Id`, `khoiLop`) VALUES
(1, 'Sáu'),
(2, 'Bảy'),
(3, 'Tám'),
(4, 'Chín');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `Id` int(10) NOT NULL,
  `maKhoi` varchar(10) CHARACTER SET utf8 NOT NULL,
  `tenLop` varchar(255) CHARACTER SET utf8 NOT NULL,
  `trangthaiLop` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`Id`, `maKhoi`, `tenLop`, `trangthaiLop`) VALUES
(2, '1', '6A1', '0'),
(3, '2', '7A2', '1'),
(4, '3', '8A5', '1'),
(5, '3', '8A3', '1'),
(6, '4', '9A3', '1'),
(7, '4', '9A1', '0'),
(8, '1', '6A2', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

CREATE TABLE `namhoc` (
  `Id` int(10) NOT NULL,
  `namHoc` varchar(50) CHARACTER SET utf8 NOT NULL,
  `maHocKy` varchar(50) CHARACTER SET utf8 NOT NULL,
  `trangthaiHK` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ngayTao` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`Id`, `namHoc`, `maHocKy`, `trangthaiHK`, `ngayTao`) VALUES
(1, '2019/2020', '1', '0', '2-9-2019'),
(2, '2020/2021', '1', '0', '2-9-2020'),
(3, '2021/2022', '2', '1', '2-9-2021'),
(4, '2019/2020', '3', '0', '29-03-2022');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `khoi`
--
ALTER TABLE `khoi`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `khoi`
--
ALTER TABLE `khoi`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
