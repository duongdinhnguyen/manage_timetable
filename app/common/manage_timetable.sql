-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2022 lúc 02:32 PM
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
(1, '1234', 'e10adc3949ba59abbe56e057f20f883e', 1, 'duonqdinhnquyen', '2022-01-01 10:29:28', '2021-12-30 12:30:43'),
(2, 'duonq', 'e10adc3949ba59abbe56e057f20f883e', 1, '', '2021-12-31 10:11:01', '2021-12-31 10:11:01'),
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
(11, '2020', 1, 2, 'Thứ 4', 'l15361.txt', 'n3882.txt', '2022-01-02 17:57:37', '2022-01-02 17:57:37'),
(12, '2020', 1, 2, 'Thứ 3', 'l61645.txt', 'n92059.txt', '2022-01-02 18:28:57', '2022-01-02 18:28:57'),
(13, '2021', 3, 1, 'Thứ 6', 'l80396.txt', 'n70688.txt', '2022-01-02 18:29:27', '2022-01-02 18:29:27'),
(14, '2019', 2, 2, 'Thứ 7', 'l16749.txt', 'n86285.txt', '2022-01-02 18:29:48', '2022-01-02 18:29:48'),
(15, '2020', 3, 3, 'Chủ nhật', 'l96126.txt', 'n18370.txt', '2022-01-02 18:30:22', '2022-01-02 18:30:22'),
(16, '2018', 1, 1, 'Thứ 3', 'l41256.txt', 'n7118.txt', '2022-01-02 18:30:50', '2022-01-02 18:30:50'),
(17, '2020', 3, 2, 'Thứ 4', 'l82776.txt', 'n97517.txt', '2022-01-02 18:31:41', '2022-01-02 18:31:41');

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
(1, 'Toán lớp 10', 'sach-giao-khoa-dai-so-lop-10.jpg', 'Toán 10 gồm: Đại số và Giải tích', '2019', '2022-01-01 12:05:43', '2022-01-01 12:05:43'),
(2, 'Toán lớp 18', 'sach-giao-khoa-toan-8.jpg', 'Toán 8 gồm: Đại số và Giải tích', '2021', '2022-01-01 12:05:43', '2022-01-01 12:05:43'),
(3, 'Toán lớp 9', 'sach-giao-khoa-toan-lop-9.jpg', 'Nội dung chương trình Toán lớp 9 bao gồm hai phần: Đại số và Hình học và chia thành 8 chủ đề', '2020', '2021-12-31 13:35:31', '2021-12-31 13:35:31');

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
(1, 'Thầy giáo A', 'kisspng-teacher-school-cartoon-teacher-picture-5a7c0acc557e82.3205671315180786683502.jpg', 'Người thầy tận tâm', 'Khoa hoc m', 'Pho giao s', '2022-01-01 12:34:47', '2022-01-01 12:34:47'),
(2, 'Thầy giáo B', 'png-clipart-teacher-job-cartoon-education-professor-teacher-class-fictional-character.png', 'Người thầy tận tâm', 'Khoa hoc d', 'Giao su', '2022-01-01 12:34:47', '2022-01-01 12:34:47'),
(3, 'Thầy giáo C', 'pngtree-illustrator-of-the-beginning-of-the-school-quarter-png-image_4533769.jpg', 'Người thầy tận tâm', 'Hai duong', 'Tien si', '2022-01-01 12:34:47', '2022-01-01 12:34:47');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
