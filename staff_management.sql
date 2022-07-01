-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3310
-- Thời gian đã tạo: Th6 13, 2022 lúc 09:16 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `staff_management`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_department`
--

CREATE TABLE `m_department` (
  `department_code` smallint(6) NOT NULL,
  `department_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useflag` smallint(6) NOT NULL COMMENT '0:delete, 1:use\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `m_department`
--

INSERT INTO `m_department` (`department_code`, `department_name`, `tel`, `mail`, `description`, `note`, `useflag`) VALUES
(1, 'Phong Phat Trien He Thong', '111', 'phongKTHT@gmail.com', 'Phong Phat Trien He Thong', '', 1),
(2, 'Phong Phat Trien San Pham', '123', 'phongPTSP@gmail.com', 'Phong Phat Trien San Pham', '', 1),
(3, 'Phong Kinh Doanh', '456', 'phongKT@gmail.com', 'Phong Kinh Doanh', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_user`
--

CREATE TABLE `m_user` (
  `code` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_code` smallint(6) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `tel1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipno` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useflag` smallint(6) NOT NULL COMMENT '0:delete, 1:use'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `m_user`
--

INSERT INTO `m_user` (`code`, `name`, `department_code`, `birthday`, `tel1`, `tel2`, `tel3`, `zipno`, `address1`, `address2`, `note`, `useflag`) VALUES
(1, 'Bui Thanh Loc', 1, '2022-05-17', '123', '123', '', '77', 'HCM', 'BINH DINH', NULL, 1),
(2, 'Le Ngoc Linh', 1, '2022-05-17', '123', '321', '', '11', 'HCM', 'QUANG NGAI', NULL, 1),
(3, 'Nguyen Thi Trang', 3, '2022-05-01', '321', '123', '', '11', 'HCM', 'NGHE AN', NULL, 1),
(4, 'Vo Thanh Quang', 1, '2022-05-23', '456', '123', '', '23', 'HCM', 'DAK NONG', NULL, 1),
(5, 'Nguyen Van Nam', 2, '2022-05-10', '345', '543', '', '11', 'HCM', 'GIA LAI', NULL, 1),
(6, 'Loc Thanh Bui', 2, '2022-05-02', '123', '321', '', '23', NULL, 'HCM', 'HCM', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `m_department`
--
ALTER TABLE `m_department`
  ADD PRIMARY KEY (`department_code`);

--
-- Chỉ mục cho bảng `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `m_department`
--
ALTER TABLE `m_department`
  MODIFY `department_code` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `m_user`
--
ALTER TABLE `m_user`
  MODIFY `code` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
