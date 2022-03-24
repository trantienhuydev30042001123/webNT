-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2021 lúc 03:37 PM
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
-- Cơ sở dữ liệu: `db_bandogo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `adminStatus`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brandname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandstatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brandname`, `brandstatus`) VALUES
(1, 'Bàn,ghế', 1),
(2, 'Giương·', 1),
(3, 'Tủ', 1),
(4, 'Cửa', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `userid`, `productid`, `date`, `content`, `status`) VALUES
(8, 1, 1, '2021-11-01 21:25:26', 'dẹp', 0),
(11, 1, 1, '2021-11-02 19:34:34', 'abc', 0),
(12, 1, 1, '2021-11-10 11:18:55', ';aksfhdf', 0),
(13, 2, 1, '2021-11-10 11:19:23', 'iwfugew', 0),
(14, 2, 2, '2021-11-10 11:19:43', 'areyifgaw8e7', 0),
(15, 2, 2, '2021-11-10 11:23:02', 'areyifgaw8e7', 0),
(16, 2, 2, '2021-11-10 11:23:31', 'areyifgaw8e7', 0),
(17, 2, 2, '2021-11-10 11:24:38', 'areyifgaw8e7', 0),
(18, 2, 1, '2021-11-14 10:51:58', 'gnigsh', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `productid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `productPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`productid`, `orderid`, `number`, `productPrice`) VALUES
(1, 4, 1, 2000000),
(1, 6, 2, 2000000),
(1, 14, 1, 2000000),
(1, 15, 4, 2000000),
(1, 16, 1, 2000000),
(1, 19, 3, 20000000),
(1, 20, 3, 20000000),
(1, 21, 1, 20000000),
(1, 24, 1, 20000000),
(2, 5, 3, 8000000),
(2, 7, 2, 8000000),
(2, 10, 1, 8000000),
(2, 13, 1, 8000000),
(2, 14, 1, 8000000),
(2, 20, 2, 8000000),
(2, 23, 3, 8000000),
(2, 24, 1, 8000000),
(3, 17, 1, 12000000),
(4, 17, 1, 15000000),
(5, 8, 1, 5000000),
(6, 11, 1, 4000000),
(9, 5, 1, 1000000000),
(9, 9, 5, 1000000000),
(9, 12, 1, 1000000000),
(15, 22, 1, 30000000),
(17, 18, 1, 4000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordermethod`
--

CREATE TABLE `ordermethod` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ordermethod`
--

INSERT INTO `ordermethod` (`id`, `name`, `status`) VALUES
(1, 'trực tiếp cho người giao hàng', 1),
(2, 'chuyển khoản', 1),
(3, 'trả tại cửa hàng', 1),
(4, 'paypal', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ordermethodid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Chia xử lý; 2: Đang xử lý; 3: Đã xử lý;4: Hủy; ',
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `ordermethodid`, `userid`, `orderdate`, `status`, `name`, `address`, `mobile`, `email`, `note`) VALUES
(17, 2, 1, '2021-11-07 21:22:21', 3, 'Trần Tiến Huy', 'Hà Nam', '0385265170', 'trantienhuy2001@gmail.com', 'abcd'),
(18, 3, 2, '2021-11-07 21:23:32', 2, 'Huy Trần', 'Hà Nội', '0385265170', 'toan200@gmail.com', 'abcd'),
(19, 1, 1, '2021-11-10 01:20:31', 2, 'Trần Tiến Huy', 'Hà Nam', '0385265171', 'trantienhuy2001@gmail.com', ''),
(20, 1, 1, '2021-11-10 01:25:03', 2, 'Trần Tiến Huy', 'Hà Nam', '0385265171', 'trantienhuy2001@gmail.com', ''),
(21, 1, 1, '2021-11-10 01:55:07', 1, 'Trần Tiến Huy', 'Hà Nam', '0385265171', 'trantienhuy2001@gmail.com', ''),
(22, 1, 1, '2021-11-10 10:45:26', 3, 'Nguyen tien long', 'ha noi', '0385265171', 'longa3k16@gmail.com', 'phai tra tien'),
(23, 1, 2, '2021-11-14 10:34:39', 3, 'phạm thế lâm', 'Hà Nội', '0131232123', 'laml2r@gmail.com', ''),
(24, 1, 2, '2021-11-14 21:36:03', 1, 'Trần Văn Toàn', 'Hà Nội', '0131232123', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `priceFrom` int(11) NOT NULL,
  `priceTo` int(11) NOT NULL,
  `priceStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prices`
--

INSERT INTO `prices` (`id`, `priceFrom`, `priceTo`, `priceStatus`) VALUES
(1, 0, 2500000, 1),
(2, 2500000, 5000000, 1),
(3, 5000000, 10000000, 1),
(4, 10000000, 20000000, 1),
(5, 20000000, 1000000000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `productName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productImage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productView` int(11) NOT NULL,
  `productStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `brandid`, `productName`, `productImage`, `productPrice`, `productDescription`, `productView`, `productStatus`) VALUES
(1, 1, 'Bộ bàn ghế ăn gỗ sồi-1m6-Phun màu mẫu oval', '4-Ban-concorde.jpg', 20000000, 'Bộ bàn ghế ăn gỗ Sồi 6 ghế vẫn bảo tồn được vẻ đẹp truyền thống, nhưng được nâng cấp sang trọng hơn để phù hợp với cả không gian hiện đại lẫn cổ điển.Với thiết kế giống mẫu bàn Oval tự nhiên.', 1, 1),
(2, 1, 'Bộ bàn ghế chất lượng cao 01', '3.png', 8000000, 'Rất phù hợp với căn hộ thiết kế kiểu mới.', 1, 1),
(3, 1, 'Bộ bàn ghế chất lượng cao 02', '5-22-1536x1536.jpg', 12000000, 'Giá cả rẻ, thiết kế trẻ trung, năng động.', 1, 1),
(4, 1, 'Bộ bàn ghế chất lượng cao 03', '9-10.jpg', 15000000, 'Mang lại trải nghiệm thoải mái cho người sử dụng sản phẩm.', 0, 1),
(5, 2, 'Giường ngủ hiện đại 01', 'giuong-ngu-hien-dai-nang-xanh-1.jpg', 5000000, 'Mẫu giường hiện đại giúp phòng ngủ trở nên nổi bật hơn.', 1, 1),
(6, 2, 'Giường ngủ làm bằng gỗ thông', 'giường-ngủ-gỗ-thông-đẹp.jpg', 4000000, 'Giúp cho người sử dụng có một giấc ngủ ngon hơn.', 0, 1),
(10, 3, 'Tủ trang trí phong cách hiện đại 01', 'nv003-2.jpg', 5000000, '', 0, 1),
(11, 4, 'CỬA GỖ HIỆN ĐẠI CAO CẤP 01', '147-2.png', 15000000, '', 1, 1),
(12, 3, 'Tủ trang trí thiết kế đẹp 02', 'nv004.jpg', 3000000, '', 0, 1),
(13, 4, 'Cửa Đi MDF Hiện Đại', '06411.jpg', 1000000, '', 0, 1),
(14, 1, 'Bàn ghế ăn hiện đại BAG64', 'BAG64.jpg', 6000000, '', 0, 1),
(15, 2, 'Giường ngủ hiện đại 02', '9001-4.jpg', 30000000, '', 0, 1),
(16, 3, 'Tủ trang trí thiết kế đẹp 03', '5508-ava.jpg', 11000000, '', 0, 1),
(17, 4, 'CỬA HIỆN ĐẠI CAO CẤP 02', 'hang.jpg', 4000000, '', 0, 1),
(18, 1, 'Bộ bàn ghế chất lượng cao 03', 'tphcm-1.jpg', 18000000, '', 0, 1),
(19, 4, 'Cửa Đi Gỗ 01', 'cao.jpg', 1200000, '', 0, 1),
(20, 3, 'Tủ quần áo TA06', 'he.jpg', 13000000, 'Mẫu tủ quần áo 3 cánh mở kết hợp kệ trang trí tinh tế, giúp tối ưu công năng sử dụng nhưng vẫn tiết kiệm được diện tích phòng ngủ. Tối ưu sự mộc mạc và nhẹ nhàng cho phòng ngủ nhỏ thoáng đãng.\r\n\r\n- Chiều cao tủ cao, thích hợp cho những ngôi nhà diện tích khiêm tốn, tạo sự an toàn và thuận tiện.\r\n\r\n- Chất liệu gỗ công nghiệp, cách phối màu đơn giản, hiện đại, đem đến cho phòng ngủ của bạn vẻ đẹp thẩm mỹ hoàn thiện.', 0, 1),
(21, 2, 'Giường ngủ hiện đại 02', '800x595.jpg', 14000000, '', 0, 1),
(22, 4, 'CỬA GỖ HIỆN ĐẠI CAO CẤP 03', 'dai.jpg', 80000000, '', 0, 1),
(23, 2, 'Giường ngủ gỗ hiện đại WB108', 'batch102.jpg', 22000000, '', 0, 1),
(24, 3, 'Tủ Quần Áo Cửa Lùa 01', 'biet-4.jpg', 23000000, 'Tủ quần áo cửa lùa 1m6 thích hợp với các thiết kế nội thất cho phòng ngủ có diện tích nhỏ. Với cửa mở truyền thống, trong quá trình thi công các kiến trúc sư sẽ phải dành một khoảng trống nhỏ để mở cửa tủ. Nhưng với tủ quần áo cửa lùa, việc dành khoảng trống mở cửa tủ đã không cần thiết nữa.Tủ quần áo cửa lùa 1m6 mang đến cho phòng ngủ một không gian rộng rãi. Từ đó, người dùng có thể tận dụng được tối đa diện tích sử dụng trong căn phòng. Đối với bên trong tủ, các ngăn cũng được thiết kế và phân chia khoa học. Giúp đựng quần áo, đồ dùng tư trang và phụ kiện gọn gàng, hiệu quả.', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `mobile`, `address`, `email`, `status`) VALUES
(1, 'trantienhuy2001', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Tiến Huy', '0385265171', 'Hà Nam', 'trantienhuy2001@gmail.com', 1),
(2, 'tranvantoan', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Văn Toàn', '0131232123', 'Hà Nội', '', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`productid`,`orderid`);

--
-- Chỉ mục cho bảng `ordermethod`
--
ALTER TABLE `ordermethod`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `ordermethod`
--
ALTER TABLE `ordermethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
