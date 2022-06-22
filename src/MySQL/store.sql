-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2022 lúc 05:01 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`, `role`, `isActive`) VALUES
(1, 'Khang', 'vietkhang04@gmail.com', 'Kk140', 'admin', 1),
(15, 'Khang', 'zeroapril0411@gmail.com', 'Ka140', 'user', 1),
(16, 'nvdat', 'nvdat04@gmail.com', 'Kk140', 'user', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `home` varchar(30) NOT NULL,
  `note` text NOT NULL,
  `district` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id`, `userID`, `home`, `note`, `district`, `city`, `province`, `phone`) VALUES
(3, 1, '', '', 'Phường C', 'Hà Tĩnh', 'Quận A', '0986935644'),
(5, 15, '', '', 'Phường C', 'Bắc Giang', 'Phủ Lý', '0907079754'),
(6, 15, '', '', 'Phường C', 'Hà Tĩnh', 'Quận A', '0986935644'),
(7, 16, '', '', 'Phường C', 'Hà Nam', 'Tân Yên', '0983377990');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `idUser`) VALUES
(2, 1),
(1, 15),
(3, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idCart` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `idProduct`, `idCart`, `quantity`, `price`, `total`) VALUES
(24, 3, 2, 1, 1300000, 1300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Tivi'),
(2, 'Điện gia dụng'),
(3, 'Máy giặt, máy sấy'),
(4, 'Bình nóng lạnh, máy lọc nước'),
(5, 'Tủ lạnh'),
(6, 'Sản phẩm khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_product`
--

CREATE TABLE `favorite_product` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `favorite_product`
--

INSERT INTO `favorite_product` (`id`, `idUser`) VALUES
(1, 15),
(2, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_product_detail`
--

CREATE TABLE `favorite_product_detail` (
  `id` int(11) NOT NULL,
  `idFavorite` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `favorite_product_detail`
--

INSERT INTO `favorite_product_detail` (`id`, `idFavorite`, `idProduct`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 2, 3),
(5, 2, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `idUser`, `name`, `address`, `phone`, `city`, `province`, `district`, `note`, `status`, `createdAt`) VALUES
(21, 1, 'Khang', '', '0986935644', 'Hà Nam', 'Tân Yên', 'Quận 1', '', 'Đã giao', '2022-06-17'),
(22, 1, 'Khang', '', '0986935644', 'Hà Nam', 'Phủ Lý', 'Phúc Hòa', 'Không giao giờ hành chính', 'Đã hủy', '2022-06-17'),
(23, 1, 'Khang', '', '0986935644', 'Hà Nam', 'Phủ Lý', 'Phúc Hòa', 'Không giao giờ hành chính', 'Đã giao', '2022-06-17'),
(24, 1, 'Khang', '', '0986935644', 'Hà Nam', 'Phủ Lý', 'Phúc Hòa', 'Không giao giờ hành chính', 'Đã giao', '2022-06-17'),
(25, 1, 'Khang', '', '0986935644', 'Hà Nam', 'Phủ Lý', 'Phúc Hòa', 'Không giao giờ hành chính', 'Đang giao hàng', '2022-06-18'),
(26, 15, 'Khang', '', '0907079754', 'Bắc Giang', 'Tân Yên', 'Phúc Hòa', '', 'Đang giao hàng', '2022-06-18'),
(27, 1, 'Khang', '', '0986935644', 'Hà Nam', 'Phủ Lý', 'Phúc Hòa', 'Không giao giờ hành chính', 'Đang giao hàng', '2022-06-18'),
(28, 1, 'Khang', '', '0986935644', 'Hà Nam', 'Phủ Lý', 'Phúc Hòa', 'Không giao giờ hành chính', 'Đang giao hàng', '2022-06-18'),
(29, 15, 'Khang', '', '0986935644', 'Hà Tĩnh', 'Quận A', 'Phường C', '', 'Đã hủy', '2022-06-18'),
(30, 15, 'Khang', '', '0907079754', 'Bắc Giang', 'Phủ Lý', 'Phường C', '', 'Đang giao hàng', '2022-06-19'),
(31, 16, 'Đạt', 'số 100', '0983377990', 'Vĩnh Phúc', 'Hà Nam', 'Việt Yên', '', 'Đang giao hàng', '2022-06-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `idOrder`, `idProduct`, `quantity`, `price`, `total`) VALUES
(14, 21, 2, 1, 27900000, 27900000),
(15, 22, 4, 1, 22000000, 22000000),
(16, 23, 2, 1, 27900000, 27900000),
(17, 24, 2, 1, 27900000, 27900000),
(18, 25, 2, 7, 27900000, 195300000),
(19, 25, 3, 1, 1300000, 1300000),
(20, 25, 4, 1, 22000000, 22000000),
(21, 26, 2, 1, 27900000, 27900000),
(22, 27, 8, 4, 1890000, 7560000),
(23, 27, 6, 1, 4500000, 4500000),
(24, 27, 7, 6, 6800000, 40800000),
(25, 27, 9, 1, 6700000, 6700000),
(26, 27, 10, 3, 7900000, 23700000),
(27, 28, 4, 1, 22000000, 22000000),
(28, 29, 5, 1, 5600000, 5600000),
(29, 29, 6, 1, 4500000, 4500000),
(30, 30, 2, 1, 20000000, 20000000),
(31, 30, 9, 1, 6700000, 6700000),
(32, 31, 5, 1, 5600000, 5600000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `imgs` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `createdAt` date NOT NULL,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `idType`, `name`, `description`, `imgs`, `price`, `createdAt`, `isDeleted`) VALUES
(2, 6, 'Android Tivi Panasonic 4K 65 inch TH-65GX655V', 'Đang cập nhật ...', '../assets/pictures/products/1.jpg', 20000000, '2022-05-27', 0),
(3, 7, 'Android Tivi LG 4K 65 inch TH11XV23', 'Đang cập nhật', '../assets/pictures/products/2.jpg\r\n', 1300000, '2022-05-27', 0),
(4, 7, 'Android Tivi Panasonic  43 inch TH-43GX655V', 'Đang cập nhật ...', '../assets/pictures/products/3.jpg', 22000000, '2022-06-15', 0),
(5, 9, 'Nồi chiên không dầu Sunhouse 6 lít SHD4026', 'Nồi chiên không dầu Sunhouse 6 lít SHD4026 sở hữu kiểu dáng nhỏ gọn, vừa vặn, không chiếm nhiều không gian diện tích nhưng vẫn nấu được đa dạng món ăn cho cả gia đình. Thiết kế bắt mắt, kết hợp với màu sắc trang nhã nồi chiên đem lại điểm nhấn nổi bật mang đến sự đẳng cấp, tiện nghi cho mọi không gian bếp.', '../assets/pictures/products/tivi_10.jpg', 5600000, '2022-06-18', 0),
(6, 11, 'Máy giặt Aqua 8 kg AQW-KS80GT S lồng đứng', 'Đang cập nhật ...', '../assets/pictures/products/anhc_06.jpg', 4500000, '2022-06-18', 0),
(7, 11, 'Máy giặt Samsung Inverter 8.5 kg WW85T4040CE/SV lồ', 'Đang cập nhật...', '../assets/pictures/products/anhc_08.jpg', 6800000, '2022-06-18', 0),
(8, 13, 'Bình nóng lạnh Casper 30 lít EH-30TH11', 'Bình nóng lạnh Casper EH-30TH11 30 lít sở hữu kiểu dáng nhỏ gọn nên không chiếm nhiều diện tích, tông màu trang nhã tạo điểm nhấn nổi bật cho không gian sử dụng. Sản phẩm phù hợp với nhiều không gian phòng tắm khác nhau, mang đến sự đẳng cấp và tiện nghi.', '../assets/pictures/products/anh_d_02.jpg', 1890000, '2022-06-18', 0),
(9, 13, 'Bình nóng lạnh Casper EH-30TH11 30 lít sở hữu kiểu', 'Đang cập nhật ...', '../assets/pictures/products/anh_d_01.jpg', 6700000, '2022-06-18', 0),
(10, 14, 'Máy lọc nước Karofi ERO100 10 lõi', 'Thương hiệu: Karofi\r\nModel: ERO100\r\nMã SP: GD.004508', '../assets/pictures/products/anhb_08.jpg', 7900000, '2022-06-18', 0),
(11, 16, 'Tủ lạnh Aqua Inverter 456 lít AQR-IGW525EM(GB)', 'Thương hiệu: Aqua\r\nModel: AQR-IGW525EM(GB)\r\nMã SP: DL.000782', '../assets/pictures/products/anh_web2_01.jpg', 20350000, '2022-06-18', 0),
(12, 15, 'Tủ lạnh Mitsubishi Inverter 365 lít MR-CGX46EN-GBR', 'Thương hiệu: Aqua\r\nModel: AQR-IGW525EM(GB)\r\nMã SP: DL.000782', '../assets/pictures/products/anh_web1_02.jpg', 19900000, '2022-06-18', 0),
(13, 15, 'Tủ lạnh Electrolux Inverter 253 lít EBB2802K-H', 'Thương hiệu: Electrolux\r\nModel: EBB2802K-H\r\nMã SP: DL.004262', '../assets/pictures/products/anh_web5_01.jpg', 7990000, '2022-06-18', 0),
(14, 9, 'Bếp từ đôi Sunhouse Mama MMB9208DIH', 'Thiết kế lắp âm sang trọng, hiện đại\r\nBếp từ đôi Sunhouse Mama MMB9208DIH thiết kế lắp âm tạo cảm giác rộng rãi, sang trọng, hiện đại cho không gian bếp của gia đình bạn. Mặt kính nguyên khối đen bóng cùng họa tiết đơn giản nhưng thanh lịch, tinh tế.', '../assets/pictures/products/anh_a_09.jpg', 11900000, '2022-06-18', 0),
(15, 10, 'Máy hút Panasonic MC-CG370GN46', 'Máy hút bụi Panasonic MC-CG370GN46 có thiết kế nhỏ gọn cùng trọng lượng siêu nhẹ chỉ 3.0kg, với công suất hút 250W tạo lực hút mạnh mẽ sẽ hút sạch bụi trong thời gian nhanh chóng và tiết kiệm điên năng trong quá trình sử dụng. Sản phẩm có bánh xe lớn giúp cho việc di chuyển máy hút bụi trở nên dễ dàng và nhẹ nhàng hơn.', '../assets/pictures/products/anh_a_03.jpg', 3500000, '2022-06-18', 0),
(16, 20, 'Bóng Đèn LED 18W - SBNL518', 'Bóng đèn tiết kiệm điện', '../assets/pictures/products/den-led-buld-lbl-7w-740x740.jpg', 360000, '2022-06-18', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`id`, `idCategory`, `name`) VALUES
(6, 1, 'Samsung'),
(7, 1, 'LG'),
(8, 1, 'Panasonic'),
(9, 2, 'Nhà bếp'),
(10, 2, 'Thiết bị gia đình'),
(11, 3, 'Máy giặt'),
(12, 3, 'Máy sấy quần áo'),
(13, 4, 'Bình nóng lạnh'),
(14, 4, 'Máy lọc nước'),
(15, 5, 'Tủ lạnh 2 cánh'),
(16, 5, 'Tủ lạnh 4 cánh'),
(17, 5, 'Tủ đông'),
(18, 5, 'Tủ mát'),
(19, 6, 'Máy phát điện'),
(20, 6, 'Đèn điện');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`email`);

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_user` (`userID`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_account` (`idUser`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cartdetail_product` (`idProduct`),
  ADD KEY `fk_cartdetail_cart` (`idCart`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_favorite_user` (`idUser`);

--
-- Chỉ mục cho bảng `favorite_product_detail`
--
ALTER TABLE `favorite_product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detailFavorite_favorite` (`idFavorite`),
  ADD KEY `fk_detailFavorite_product` (`idProduct`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_account` (`idUser`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderdetail_orders` (`idOrder`),
  ADD KEY `fk_orderdetail_product` (`idProduct`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_type` (`idType`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type_category` (`idCategory`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `favorite_product`
--
ALTER TABLE `favorite_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `favorite_product_detail`
--
ALTER TABLE `favorite_product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_user` FOREIGN KEY (`userID`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_account` FOREIGN KEY (`idUser`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `fk_cartdetail_cart` FOREIGN KEY (`idCart`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `fk_cartdetail_product` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `favorite_product`
--
ALTER TABLE `favorite_product`
  ADD CONSTRAINT `fk_favorite_user` FOREIGN KEY (`idUser`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `favorite_product_detail`
--
ALTER TABLE `favorite_product_detail`
  ADD CONSTRAINT `fk_detailFavorite_favorite` FOREIGN KEY (`idFavorite`) REFERENCES `favorite_product` (`id`),
  ADD CONSTRAINT `fk_detailFavorite_product` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_account` FOREIGN KEY (`idUser`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_orderdetail_orders` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_orderdetail_product` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_type` FOREIGN KEY (`idType`) REFERENCES `type` (`id`);

--
-- Các ràng buộc cho bảng `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `fk_type_category` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
