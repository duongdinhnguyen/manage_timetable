-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2022 lúc 06:39 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manage_timetable`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `actived_flag` int(1) NOT NULL DEFAULT 1,
  `reset_password_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`, `actived_flag`, `reset_password_token`, `updated`, `created`) VALUES
(1, '1234', 'e10adc3949ba59abbe56e057f20f883e', 1, '', '2022-01-08 20:05:08', '2021-12-30 12:30:43'),
(2, 'duonq', 'e10adc3949ba59abbe56e057f20f883e', 1, '', '2022-01-08 15:30:18', '2021-12-31 10:11:01'),
(3, 'duonqdinhnquyen', '29672f6663473703e7f34877e82be388', 1, '123456', '2021-12-31 12:20:17', '2021-12-31 12:20:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) NOT NULL,
  `school_year` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `week_day` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `lesson` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `schedules`
--

INSERT INTO `schedules` (`id`, `school_year`, `subject_id`, `teacher_id`, `week_day`, `lesson`, `notes`, `updated`, `created`) VALUES
(28, '2', 2, 2, 'Thứ 2', 'l19249.txt', 'n78036.txt', '2022-01-06 12:57:06', '2022-01-06 12:57:06'),
(29, '1', 13, 4, 'Thứ 2', 'l44517.txt', 'n7850.txt', '2022-01-08 15:34:45', '2022-01-07 07:49:40'),
(30, '2', 12, 6, 'Thứ 5', 'l10158.txt', 'n1883.txt', '2022-01-07 19:02:42', '2022-01-07 18:14:35'),
(31, '2', 13, 4, 'Chủ nhật', 'l80413.txt', 'n32856.txt', '2022-01-08 08:11:13', '2022-01-07 19:45:22'),
(32, '3', 15, 7, 'Chủ nhật', 'l2394.txt', 'n37951.txt', '2022-01-08 21:20:21', '2022-01-08 21:20:21'),
(34, '1', 16, 8, 'Chủ nhật', 'l75404.txt', 'n50940.txt', '2022-01-08 21:43:10', '2022-01-08 21:43:10'),
(35, '1', 16, 8, 'Chủ nhật', 'l80811.txt', 'n80730.txt', '2022-01-08 21:52:33', '2022-01-08 21:52:33'),
(36, '1', 16, 8, 'Chủ nhật', 'l69314.txt', 'n76502.txt', '2022-01-08 22:18:38', '2022-01-08 22:18:38'),
(37, '2', 17, 10, 'Chủ nhật', 'l36695.txt', 'n6661.txt', '2022-01-09 00:37:00', '2022-01-09 00:37:00'),
(38, '4', 21, 14, 'Thứ 6', 'l80025.txt', 'n83219.txt', '2022-01-09 00:37:24', '2022-01-09 00:37:24'),
(39, '3', 19, 9, 'Thứ 7', 'l55390.txt', 'n97644.txt', '2022-01-09 00:37:53', '2022-01-09 00:37:53'),
(40, '2', 17, 11, 'Thứ 4', 'l18755.txt', 'n50512.txt', '2022-01-09 00:38:28', '2022-01-09 00:38:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `school_year` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `avatar`, `description`, `school_year`, `updated`, `created`) VALUES
(16, 'Đại số tuyến tính', 'dai-so-tuyen-tinh-0-855.jpg', 'đây là môn đại số tuyến tính', '3', '2022-01-08 21:30:10', '2022-01-08 21:01:10'),
(17, 'Toán rời rạc', '2013-11-26-02-50-31_Giao-trinh-Toan-roi-rac-Lon.jpg', 'đây là môn Toán rời rạc', '3', '2022-01-08 21:30:43', '2022-01-08 21:01:43'),
(18, 'Giải tích 1', '2013-09-09-12-49-53_GIAI-TICH-1-large.jpg', 'Đây là môn tối ưu hóa', '3', '2022-01-08 21:31:32', '2022-01-08 21:01:32'),
(19, 'Giải tích 2', 'giao-trinh-giai-tich-2-0-367.jpg', 'môn học giáo trính giải tích 2', '2', '2022-01-09 00:35:14', '2022-01-09 00:01:14'),
(20, 'Xác suất thống kê', 'bai-tap-xac-suat-thong-ke-0-182.jpg', 'xác suất và thống kê', '4', '2022-01-09 00:35:44', '2022-01-09 00:01:44'),
(21, 'Trí tuệ nhân tạo', 'product_5b_0f_b9_87dd2fe1c7bf07fbcc14a7d270752510.jpg', 'AI', '4', '2022-01-09 00:36:14', '2022-01-09 00:01:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `specialized` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `degree` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `avatar`, `description`, `specialized`, `degree`, `updated`, `created`) VALUES
(8, 'Giảng viên A', '5d9b24dec11c65802139bb2fafcfe6e3.png_wh860.png', 'giảng viên A', '1', '4', '2022-01-08 21:28:25', '2022-01-08 21:01:25'),
(9, 'Giảng viên B', 'kisspng-portable-network-graphics-teacher-clip-art-educati-5cb984ac001b33.1188784615556619960004.jpg', 'giảng viên B', '3', '4', '2022-01-08 21:28:48', '2022-01-08 21:01:48'),
(10, 'Giảng viên C', 'pngtree-illustrator-of-the-beginning-of-the-school-quarter-png-image_4533769.jpg', 'Giảng viên C', '2', '2', '2022-01-08 21:29:25', '2022-01-08 21:01:25'),
(11, 'Giảng viên D', 'vector-illustration-cartoon-scientist-29889031.jpg', 'Giảng viên D', '2', '3', '2022-01-09 00:28:59', '2022-01-09 00:01:59'),
(12, 'Giảng viên E', 'kisspng-portable-network-graphics-teacher-clip-art-educati-5cb984ac001b33.1188784615556619960004.jpg', 'Giảng viên E', '2', '3', '2022-01-09 00:29:31', '2022-01-09 00:01:31'),
(13, 'Giảng viên F', 'f48af786eafdefe141347866f2b12352.png_wh860.png', 'đây là giảng viên F', '3', '5', '2022-01-09 00:29:53', '2022-01-09 00:01:53'),
(14, 'Giảng viên G', '5d9b24dec11c65802139bb2fafcfe6e3.png_wh860.png', 'Giảng viên khoa Toán', '2', '3', '2022-01-09 00:34:30', '2022-01-09 00:01:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Chỉ mục cho bảng `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
