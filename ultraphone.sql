-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2022 lúc 03:06 PM
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
-- Cơ sở dữ liệu: `ultraphone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1.Thanh toán khi nhận hàng 2.Chuyển khoản ngân hàng 3.Thanh toán online',
  `order_date` varchar(50) NOT NULL,
  `total_bill` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0.Đơn hàng mới \r\n1.Đang xử lý\r\n2.Đang giao hàng\r\n3.Đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `img_pro` varchar(255) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `price_pro` int(10) NOT NULL,
  `count_pro` int(10) NOT NULL,
  `total_money` int(10) NOT NULL,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_cate` int(11) NOT NULL,
  `name_cate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_cate`, `name_cate`) VALUES
(1, 'Samsung'),
(7, 'Oppo'),
(8, 'iPhone'),
(10, 'Realme');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `comment_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(25) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `img_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img_pro` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `idcate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_pro`, `name_pro`, `price`, `img_pro`, `description`, `view`, `idcate`) VALUES
(7, 'iPhone 14 Pro Max 256GB', 36999000, 'iPhone_14_Pro_Max-Pur1.jpg', 'iPhone 14 Pro Max đem đến những trải nghiệm không thể tìm thấy trên mọi thế hệ iPhone trước đó với màu Tím Deep Purple sang trọng, camera 48MP lần đầu xuất hiện, chip A16 Bionic và màn hình “viên thuốc” Dynamic Island linh hoạt, nịnh mắt.', 0, 8),
(8, 'Điện thoại di động OPPO Reno6 5G', 9850000, 'oppo_reno4g.jpg', 'Nối tiếp sự thành công của dòng Reno5, OPPO mới đây đã trình làng bộ đôi siêu phẩm thuộc dòng OPPO Reno6 series có cấu hình mạnh mẽ, thiết kế ấn tượng. Trong đó, chiếc OPPO Reno6 5G với những cải tiến mới mẻ hơn thế hệ tiền nhiệm chắc chắn sẽ là một siêu phẩm trên thị trường smartphone hiện nay mà bạn không nên bỏ lỡ!', 0, 7),
(9, 'Galaxy S22 Ultra 8/128GB', 1799999, 'Galaxy-S22-Ultra-Black-600x600.jpg', 'Những nâng cấp lớn về hiệu năng, dung lượng pin, và trên hết là camera sau chính là những điểm khiến nó trở thành siêu phẩm trong phân khúc cao cấp. Dưới đây là những thông tin cần biết về dòng điện thoại vừa ra mắt của Samsung. Dưới đây là thông số cấu hình của Samsung S22 Ultra vừa được gã khổng lồ Hàn Quốc giới thiệu.', 0, 1),
(11, ' Realme C35 128GB', 4690000, 'realme-c35-thumb-new-600x600.jpg', 'Realme C35 sở hữu màu sắc như xanh ngọc sang trọng, đen tuyền huyền bí cùng các đường nét thiết kế tỉ mỉ, điện thoại này được thiết kế với khung bo góc làm bằng vật liệu 2D phát sáng linh động, làm cho tổng thể vẻ ngoài của máy trở nên phong cách hơn.', 0, 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_acc_cart` (`id_user`),
  ADD KEY `lk_pro_cart` (`id_pro`),
  ADD KEY `lk_bill_cart` (`id_bill`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `lk_user_cmt` (`id_user`),
  ADD KEY `lk_pro_cmt` (`id_pro`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `lk_cate_product` (`idcate`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_acc_cart` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`),
  ADD CONSTRAINT `lk_bill_cart` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `lk_pro_cart` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `lk_pro_cmt` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`),
  ADD CONSTRAINT `lk_user_cmt` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id_user`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `lk_cate_product` FOREIGN KEY (`idcate`) REFERENCES `category` (`id_cate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
