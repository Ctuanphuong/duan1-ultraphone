-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2022 lúc 04:30 AM
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
-- Cấu trúc bảng cho bảng `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name_bank` varchar(255) NOT NULL,
  `num_bank` varchar(255) NOT NULL,
  `name_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `bill_code` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `full_name` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1.Thanh toán khi nhận hàng 2.Chuyển khoản ngân hàng 3.Thanh toán online',
  `order_date` datetime NOT NULL,
  `total_amount` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0.Đơn hàng mới \r\n1.Đang xử lý\r\n2.Đang giao hàng\r\n3.Đã giao hàng',
  `status_pay` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `bill_code`, `id_user`, `id_pro`, `user_name`, `name_pro`, `full_name`, `address`, `phone`, `email`, `payment`, `order_date`, `total_amount`, `status`, `status_pay`) VALUES
(76, '15386', 24, 0, 'phuongct', '', 'Chu Tuấn Phương', 'Ngọa Long, Minh Khai, Bắc Từ Liêm, Hà Nội', 335099885, 'ctuanphuong18@gmail.com', 1, '2022-12-14 10:15:51', 9850000, 3, '1'),
(77, '81963', 25, 0, 'quanglinhnb', '', 'Đỗ Quang Linh', 'Nam Từ Liêm, Hà Nội', 123456789, 'linhdqph19316@fpt.edu.vn', 1, '2022-12-14 10:21:49', 5990000, 0, '0'),
(78, '74231', 25, 0, 'quanglinhnb', '', 'Đỗ Quang Linh', 'Nam Từ Liêm, Hà Nội', 123456789, 'linhdqph19316@fpt.edu.vn', 1, '2022-12-14 10:22:13', 36999000, 3, '1'),
(79, '82413', 23, 0, 'min', '', 'Min mun', '80 Xuân Phương, Nam Từ Liêm, Hà Nội', 987654321, 'minhnvph20397@fpt.edu.vn', 1, '2022-12-14 10:24:05', 3180000, 0, '0'),
(80, '82735', 23, 0, 'min', '', 'Min mun', '80 Xuân Phương, Nam Từ Liêm, Hà Nội', 987654321, 'minhnvph20397@fpt.edu.vn', 1, '2022-12-14 10:24:32', 4690000, 3, '1'),
(81, '65817', 24, 0, 'phuongct', '', 'Chu Tuấn Phương', 'Ngọa Long, Minh Khai, Bắc Từ Liêm, Hà Nội', 335099885, 'ctuanphuong18@gmail.com', 1, '2022-12-14 10:26:18', 20950000, 3, '1'),
(82, '57184', 24, 0, 'phuongct', '', 'Chu Tuấn Phương', 'Ngọa Long, Minh Khai, Bắc Từ Liêm, Hà Nội', 335099885, 'ctuanphuong18@gmail.com', 1, '2022-12-14 10:27:31', 18600000, 3, '1'),
(83, '25761', 24, 0, 'phuongct', '', 'Chu Tuấn Phương', 'Ngọa Long, Minh Khai, Bắc Từ Liêm, Hà Nội', 335099885, 'ctuanphuong18@gmail.com', 1, '2022-12-14 10:28:33', 2990000, 3, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `img_pro` varchar(255) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `price_pro` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `user_name`, `id_pro`, `img_pro`, `name_pro`, `price_pro`, `quantity`, `total_amount`, `id_bill`) VALUES
(66, 24, 'phuongct', 8, 'oppo_reno4g.jpg', 'OPPO Reno6 5G', 9850000, 1, 9850000, 76),
(67, 25, 'quanglinhnb', 26, 'realme-5-tim-new-600x600.jpg', 'Realme 5 4GB/128GB', 5990000, 1, 5990000, 77),
(68, 25, 'quanglinhnb', 7, 'iPhone_14_Pro_Max-Pur1.jpg', 'iPhone 14 Pro Max 256GB', 36999000, 1, 36999000, 78),
(69, 23, 'min', 28, 'huawei-p30-pro-1-600x600.jpg', 'Huawei P30 Pro 8G/256G', 3180000, 1, 3180000, 79),
(70, 23, 'min', 11, 'realme-c35-thumb-new-600x600.jpg', ' Realme C35 128GB', 4690000, 1, 4690000, 80),
(71, 24, 'phuongct', 20, 'xiaomi-12s-ultra-050722-023437-600x600.jpg', 'Xiaomi 12S Ultra', 20950000, 1, 20950000, 81),
(72, 24, 'phuongct', 24, 'apple-iphone-x-new-1.jpg', 'iPhone X 512GB ', 18600000, 1, 18600000, 82),
(73, 24, 'phuongct', 21, 'vsmart-active-3-tim-600x600-200x200.jpg', ' Vsmart Active 3 (6GB/64GB) ', 2990000, 1, 2990000, 83);

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
(10, 'Realme'),
(11, 'Xiaomi'),
(12, 'Vsmart'),
(13, 'Huawei'),
(14, 'Sonny');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `comment_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_cmt`, `content`, `id_user`, `user_name`, `full_name`, `id_pro`, `comment_date`) VALUES
(13, 'điện thoại rất đẹp', 24, 'phuongct', 'Chu Tuấn Phương', 30, '12/14/2022 10:14:35am'),
(14, 'so luxury !!!', 24, 'phuongct', 'Chu Tuấn Phương', 24, '12/14/2022 10:14:57am'),
(15, 'Sản phẩm tuyệt vờiii', 24, 'phuongct', 'Chu Tuấn Phương', 7, '12/14/2022 10:15:11am'),
(16, 'khong duoc dep cho lam', 24, 'phuongct', 'Chu Tuấn Phương', 23, '12/14/2022 10:15:30am'),
(17, 'giá cả rất hợp lý', 25, 'quanglinhnb', 'Đỗ Quang Linh', 30, '12/14/2022 10:20:27am'),
(18, 'điện thoại rẻ mà dùng rất tốt', 25, 'quanglinhnb', 'Đỗ Quang Linh', 21, '12/14/2022 10:21:04am'),
(19, 'xịn quáaa', 25, 'quanglinhnb', 'Đỗ Quang Linh', 9, '12/14/2022 10:21:25am'),
(20, 'sang chảnh quáa', 23, 'min', 'Min mun', 27, '12/14/2022 10:24:53am'),
(21, 'qua depp', 23, 'min', 'Min mun', 24, '12/14/2022 10:25:06am'),
(22, 'sản phẩm tuyệt vờii', 23, 'min', 'Min mun', 22, '12/14/2022 10:25:25am'),
(23, 'sản phẩm tốt', 23, 'min', 'Min mun', 30, '12/14/2022 10:25:40am');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_bank`
--

CREATE TABLE `history_bank` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `tranid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `history_bank`
--

INSERT INTO `history_bank` (`id`, `amount`, `comment`, `time`, `tranid`) VALUES
(21, '1000', 'CUSTOMER 94173 Trace 985625', '30/11/2022 14:30:00', 'FT22334261631086BNK'),
(22, '0', 'CUSTOMER DO QUANG LINH chuyen khoan - Ma gia o dich/ Trace 401309', '30/11/2022 13:40:00', 'FT22334147891961'),
(23, '0', 'CUSTOMER Thanh toan QR DO QUANG LINH chuyen  khoan - Ma giao dich/ Trace 031916', '30/11/2022 11:45:00', 'FT22334401685537'),
(24, '0', 'CUSTOMER DO QUANG LINH chuyen khoan - Ma gia o dich/ Trace 070167', '30/11/2022 11:18:00', 'FT22334305991988'),
(25, '100000', 'CUSTOMER MBVCB 2768157086 025846 NGUYEN KHAC  TOAN chuyen tien CT tu 04510004281 92 NGUYEN KHAC TOAN toi 60000000003  DO QUANG LINH Ngan hang Quan Doi  ', '30/11/2022 10:44:00', 'FT22334426800035BNK'),
(26, '0', 'CUSTOMER Thanh toan QR DO QUANG LINH chuyen  khoan - Ma giao dich/ Trace 462972', '30/11/2022 09:02:00', 'FT22334100078954'),
(27, '1000', 'CUSTOMER Linh 17654 Trace 588656', '30/11/2022 02:33:00', 'FT22334547643305BNK'),
(28, '1000', 'CUSTOMER Linh 04678 Trace 581325', '30/11/2022 02:18:00', 'FT22334507816023BNK'),
(29, '1000', 'CUSTOMER Chuyen tien Trace 571867', '30/11/2022 01:53:00', 'FT22334062224594BNK');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_pro` int(11) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `img_pro` varchar(255) NOT NULL,
  `short_des` text NOT NULL,
  `detail_des` text NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `idcate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_pro`, `name_pro`, `price`, `discount`, `img_pro`, `short_des`, `detail_des`, `view`, `idcate`) VALUES
(7, 'iPhone 14 Pro Max 256GB', 36999000, 10, 'iPhone_14_Pro_Max-Pur1.jpg', 'iPhone 14 Pro Max đem đến những trải nghiệm không thể tìm thấy trên mọi thế hệ iPhone trước đó với màu Tím Deep Purple sang trọng, camera 48MP lần đầu xuất hiện, chip A16 Bionic và màn hình “viên thuốc” Dynamic Island linh hoạt, nịnh mắt.', '•	Màn hình: OLED6.7\"Super Retina XDR\r\n•	Hệ điều hành: iOS 16\r\n•	Camera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\n•	Camera trước: 12 MP\r\n•	Chip: Apple A16 Bionic\r\n•	RAM: 6 GB\r\n•	Dung lượng lưu trữ: 256 GB\r\n•	SIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\n•	Pin, Sạc: 4323 mAh20 W\r\n\r\n', 130, 8),
(8, 'OPPO Reno6 5G', 9850000, 0, 'oppo_reno4g.jpg', 'Nối tiếp sự thành công của dòng Reno5, OPPO mới đây đã trình làng bộ đôi siêu phẩm thuộc dòng OPPO Reno6 series có cấu hình mạnh mẽ, thiết kế ấn tượng. Trong đó, chiếc OPPO Reno6 5G với những cải tiến mới mẻ hơn thế hệ tiền nhiệm chắc chắn sẽ là một siêu phẩm trên thị trường smartphone hiện nay mà bạn không nên bỏ lỡ!', '•	Màn hình: AMOLED6.43\"Full HD+\r\n•	Hệ điều hành: Android 11\r\n•	Camera sau: Chính 64 MP & Phụ 8 MP, 2 MP\r\n•	Camera trước: 32 MP\r\n•	Chip: MediaTek Dimensity 900 5G\r\n•	RAM: 8 GB\r\n•	Dung lượng lưu trữ: 128 GB\r\n•	SIM: 2 Nano SIMHỗ trợ 5G\r\n•	Pin, Sạc: 4300 mAh65 W\r\n\r\n', 45, 7),
(9, 'Galaxy S22 Ultra 8/128GB', 17990000, 0, 'Galaxy-S22-Ultra-Black-600x600.jpg', 'Samsung Galaxy S22 Ultra đơn giản nhưng đồng thời cũng tuyệt đẹp. Các góc cạnh của sản phẩm hoàn thiện sắc nét, vuông vắn. Cụm camera vuông như mọi năm đã biến mất, thay vào đó là một thiết kế đồng bộ camera với mặt lưng. Chúng phẳng hơn và liền lạc, tổng thể là đơn giản nhưng đẹp mắt.', '•	Công nghệ màn hình: Dynamic AMOLED 2X\r\n•	Độ phân giải: 3088 x 1440\r\n•	Màn hình rộng: 6.8\", Tần số quét: 1 - 120 Hz\r\n•	Độ phân giải: 12MP (UW) + 108MP (W) + 12MP (Tele3x) + 12MP (Tele10x), 40MP\r\n•	Hệ điều hành: Android 12\r\n•	Chip xử lý (CPU): Snapdragon® 8 Gen 1 (4nm)\r\n•	Bộ nhớ trong (ROM): 128GB\r\n•	RAM: 8GB\r\n•	Mạng di động: 5G\r\n•	Số khe sim: 1 nano SIM + 1 e-SIM\r\n•	Dung lượng pin: 5000 mAh\r\n', 184, 1),
(11, ' Realme C35 128GB', 4690000, 0, 'realme-c35-thumb-new-600x600.jpg', 'Realme C35 sở hữu màu sắc như xanh ngọc sang trọng, đen tuyền huyền bí cùng các đường nét thiết kế tỉ mỉ, điện thoại này được thiết kế với khung bo góc làm bằng vật liệu 2D phát sáng linh động, làm cho tổng thể vẻ ngoài của máy trở nên phong cách hơn.', '•	Màn hình: IPS LCD6.6\"Full HD+\r\n•	Hệ điều hành: Android 11\r\n•	Camera sau: Chính 50 MP & Phụ 2 MP, 0.3 MP\r\n•	Camera trước: 8 MP\r\n•	Chip: Unisoc T616\r\n•	RAM: 4GB\r\n•	Dung lượng lưu trữ: 128 GB\r\n•	SIM: 2 Nano SIM Hỗ trợ 4G\r\n•	Pin, Sạc: 5000 mAh18 W\r\n', 26, 10),
(20, 'Xiaomi 12S Ultra', 20950000, 0, 'xiaomi-12s-ultra-050722-023437-600x600.jpg', 'Mới đây thì bộ ba Xiaomi 12S series cũng được cho ra mắt, trong đố nỏi bật hơn hết chính là Xiaomi 12S Ultra nhờ có thiết kế cao cấp, cùng những thông số kỹ thuật hàng đầu trong ngành điện thoại. Điểm nhấn chính của mẫu Ultra là hệ thống camera với sự hợp tác cùng thương hiệu nhiếp ảnh nổi tiếng Leica.', '• Màn hình: AMOLED6.73\"\r\n• Hệ điều hành: Android 12\r\n• Camera sau: Chính 50 MP & Phụ 48 MP, 48 MP\r\n• Camera trước: 32 MP\r\n• Chip: Snapdragon 8+ Gen 1\r\n• RAM: 8GB\r\n• Dung lượng lưu trữ: 256 GB\r\n• SIM: 2 Nano SIMHỗ trợ 5G\r\n• Pin, Sạc: 4850 mAh67 W\r\n', 117, 11),
(21, ' Vsmart Active 3 (6GB/64GB) ', 2990000, 0, 'vsmart-active-3-tim-600x600-200x200.jpg', 'Vsmart Active 3 (6GB/64GB) là một smartphone có hiệu năng ổn định, thời lượng pin cả ngày dài và còn nhiều tính năng đặc biệt khác nữa, hứa hẹn sẽ mang đến cho bạn một thiết bị công nghệ chẳng những thời trang mà còn rất hiện đại.', '•	Màn hình: AMOLED6.39\"Full HD+\r\n•	Hệ điều hành: Android 9 (Pie)\r\n•	Camera sau: Chính 48 MP & Phụ 8 MP, 2 MP\r\n•	Camera trước: 16 MP\r\n•	Chip: MediaTek Helio P60\r\n•	RAM: 6 GB\r\n•	Dung lượng lưu trữ: 64 GB\r\n•	SIM:2 Nano SIM (SIM 2 chung khe thẻ nhớ) Hỗ trợ 4G\r\n•	Pin, Sạc: 4020 mAh15 W\r\n', 21, 12),
(22, ' Xiaomi POCO F3 ', 7290000, 0, 'xanh_22p2-68.jpg', 'Sở hữu sức mạnh “vô đối” đến từ CPU của nhà Qualcomm, Xiaomi POCO F3 mang đến người dùng cơ hội trải nghiệm hiệu năng của flagship hàng đầu trong mức giá tầm trung, một “món hời” mà các tín đồ “hệ gaming” không thể nào bỏ qua.', '•	Màn hình: AMOLED6.67\"Full HD+\r\n•	Hệ điều hành: Android 11\r\n•	Camera sau: Chính 48 MP & Phụ 8 MP, 5 MP\r\n•	Camera trước: 20 MP\r\n•	Chip: Snapdragon 870\r\n•	RAM: 6 GB\r\n•	Dung lượng lưu trữ: 128 GB\r\n•	SIM: 2 Nano SIM Hỗ trợ 5G\r\n•	Pin, Sạc: 4520 mAh\r\n\r\n', 252, 11),
(23, 'Sony Xperia 5 Mark 2', 10000000, 15, 'sony-xperia-5-plus-600x600-1-600x600.jpg', 'Được xem như là bản kết hợp của thế hệ tiền nhiệm Xperia 1 Mark 2 và bản nâng cấp của Xperia 5 nên Xperia 5 Mark 2 có tất cả những gì tinh tuý nhất về kiểu dáng của  thiết kế bên ngoài cho dòng sản phẩm của Sony.', '• Hệ điều hành: Android 10, upgradable to Android 12\r\n• Chipset: Qualcomm SM8250 Snapdragon 865 5G (7 nm+)\r\n• Độ phân giải: 1080 x 2520 pixels\r\n• Màn hình rộng: 6.1 inches\r\n• Camera sau: 12MP + 12MP + 12MP\r\n• RAM: 8 GB\r\n• Bộ nhớ trong ( Rom): 128 GB\r\n• Camera trước: 8MP\r\n• Dung lượng pin: 4000 mAh\r\n\r\n', 43, 14),
(24, 'iPhone X 512GB ', 18600000, 0, 'apple-iphone-x-new-1.jpg', 'iPhone Xs Max 512GB là chiếc smartphone mạnh mẽ của Apple mang nhiều ưu điểm vượt trội hơn so với các phiên bản iPhone trước đó, từ thiết kế, cấu hình và các tính năng ưu việt.', '\r\n• Màn hình: 2K, 5.8\" inch, 1125 x 2436 pixels, 19.5:9 ratio, Super Retina 463ppi, 3D touch, TrueTone Dolby Vision HDR10, 120Hz touch-sensing\r\n• CPU: Apple A12 Bionic, 6 nhân 64-bit, 7nm,  Neural Engine 5 ngàn tỉ phép tính mỗi giây.\r\n• RAM: 4GB\r\n• Hệ điều hành: iOS 12\r\n• Camera chính: Dual 12 MP, Wide f/1.8 & Tele f/2.4, Quay phim 4K 2160p@30fps\r\n• Camera phụ: 7 MP, f/2.2 xóa phông\r\n• Bộ nhớ trong: 512GB\r\n• Thẻ nhớ ngoài: không\r\n• Dung lượng pin: 2658 mAh\r\n', 46, 8),
(25, ' Xiaomi 11T Pro 5G 12GB ', 14390000, 0, 'Xiaomi-11T-White-1-2-3-600x600.jpg', 'Xiaomi 11T Pro - mẫu smartphone được nâng cấp đáng kể với camera 108 MP xuất sắc, màn hình tần số quét 120 Hz đẹp tuyệt mỹ cùng hiệu năng mạnh mẽ từ Snapdragon 888 đáng kinh ngạc nhưng lại có mức giá hấp dẫn đến bất ngờ.', '•	Màn hình: AMOLED6.67\"Full HD+\r\n•	Hệ điều hành: Android 11\r\n•	Camera sau: Chính 108 MP & Phụ 8 MP, 5 MP\r\n•	Camera trước: 16 MP\r\n•	Chip: Snapdragon 888\r\n•	RAM: 12 GB\r\n•	Dung lượng lưu trữ: 256 GB\r\n•	SIM: 2 Nano SIMHỗ trợ 5G\r\n•	Pin, Sạc: 5000 mAh120 W\r\n', 12, 11),
(26, 'Realme 5 4GB/128GB', 5990000, 0, 'realme-5-tim-new-600x600.jpg', 'Mới đây, bộ đôi smartphone Realme 5 và Realme 5 Pro chính thức được Realme giới thiệu tại thành phố Hồ Chí Minh, trong đó Realme 5 4GB/128GB là phiên bản với mức giá rẻ hơn, tuy nhiên những tính năng nổi bật như cụm 4 camera, dung lượng pin lớn vẫn được ưu ái giữ lại.', '• Màn hình: IPS LCD6.5\"HD+\r\n• Hệ điều hành: Android 9 (Pie)\r\n• Camera sau: Chính 12 MP & Phụ 8 MP, 2 MP, 2 MP\r\n• Camera trước: 13 MP\r\n• Chip: Snapdragon 665\r\n• RAM: 4 GB\r\n• Dung lượng lưu trữ: 128 GB\r\n• SIM: 2 Nano SIMHỗ trợ 4G\r\n• Pin, Sạc: 5000 mAh\r\n', 11, 10),
(27, 'Samsung Galaxy Z Flip 4', 20590000, 10, 'samsung-galaxy-z-flip4-5g-128gb-thumb-tim-600x600.jpg', 'Tiếp tục là một mẫu smartphone màn hình gập độc đáo, đầy lôi cuốn và mới mẻ từ hãng công nghệ Hàn Quốc, dự kiến sẽ có tên là Samsung Galaxy Z Flip 4 với nhiều nâng cấp. Đây hứa hẹn sẽ là một siêu phẩm bùng nổ trong thời gian tới và thu hút được sự quan tâm của đông đảo người dùng với nhiều cải tiến từ ngoại hình, camera, bộ vi xử lý và viên pin được nâng cấp.', '• Kích thước màn hình: 6.7 inches\r\n• Công nghệ màn hình: Dynamic AMOLED 2X\r\n• Camera sau: Camera góc rộng: 12 MP, f/1.8, PDAF, OIS\r\n• Camera góc siêu rộng: 12 MP, f/2.2, 123˚\r\n• Camera trước: 10 MP, f/2.4\r\n• Chipset: Snapdragon 8+ Gen 1 (4 nm)\r\n• Dung lượng RAM: 8 GB\r\n• Bộ nhớ trong: 128 GB\r\n• Pin: 3700 mAh\r\n• Thẻ SIM: 2 SIM (nano‑SIM và eSIM)\r\n• Hệ điều hành: Android 12, One UI 4.1.1\r\n• Tính năng màn hình: Màn hình chính: 6.7 inches\r\n• Màn hình ngoài: 2.1 inches, Super AMOLED 120Hz, HDR10+, 1200 nits (peak)\r\n', 436, 1),
(28, 'Huawei P30 Pro 8G/256G', 3180000, 0, 'huawei-p30-pro-1-600x600.jpg', 'Điện thoại Huawei P30 Pro – Siêu phẩm Flagship tiếp theo của Huawei Huawei P30 Pro, Huawei P30 và P30 Lite là 3 mẫu điện thoại mới nhất sẽ được Huawei ra mắt vào ngày 26/3 tại Paris, Pháp. Trong đó, P30 Pro là phiên bản cao cấp nhất với nhiều công nghệ đột phá đặt biệt là camera. Với dòng P của mình Huawei cho thấy khả năng dẫn đầu mảng cameraphone.', '•	Màn hình: OLED6.47\"Full HD+ \r\n•	Hệ điều hành: Android 9 (Pie) \r\n•	Camera sau: Chính 40 MP & Phụ 20 MP, 8 MP, TOF 3D \r\n•	Camera trước: 32 MP Chip: Kirin 980 \r\n•	RAM: 8 GB \r\n•	Dung lượng lưu trữ: 256 GB\r\n•	SIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ) Hỗ trợ 4G \r\n•	Pin, Sạc: 4200 mAh\r\n', 74, 13),
(30, 'OPPO A77S 8GB/128GB', 6000000, 15, '9283447401-oppo-a77s-128gb-ram-8gb.jpg', 'OPPO vừa cho ra mắt mẫu điện thoại tầm trung mới với tên gọi OPPO A77s, máy sở hữu màn hình lớn, thiết kế đẹp mắt, hiệu năng ổn định cùng khả năng mở rộng RAM lên đến 8 GB vô cùng nổi bật trong phân khúc.', '• Màn hình: IPS LCD6.56\"HD+\r\n• Hệ điều hành: Android 12\r\n• Camera sau: Chính 50 MP & Phụ 2 MP\r\n• Camera trước: 8 MP\r\n• Chip: Snapdragon 680 4G\r\n• RAM: 8 GB\r\n• Dung lượng lưu trữ: 128 GB\r\n• SIM: 2 Nano SIM Hỗ trợ 4G\r\n• Pin, Sạc: 5000 mAh33 W\r\n', 14, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `id_ques` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `contennt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`id_ques`, `name`, `email`, `phone`, `contennt`) VALUES
(14, 'Chu Tuấn Phương', 'ctuanphuong18@gmail.com', '0335099885', 'Tôi muốn mua iPhone 11 Promax, mong shop sẽ update thêm'),
(15, 'Chu Tuấn Phương', 'ctuanphuong18@gmail.com', '0335099885', 'Shop có tuyển nhân viên giao hàng ko ạ ?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT 0,
  `email_user` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_user` varchar(25) NOT NULL,
  `img_user` varchar(255) NOT NULL,
  `register_date` date DEFAULT NULL,
  `last_login` date DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `password`, `full_name`, `sex`, `email_user`, `address`, `phone_user`, `img_user`, `register_date`, `last_login`, `role`) VALUES
(16, 'admin', '000000', 'Admin Ultraphone', 0, 'zatuzick03@gmail.com', '', '', '', NULL, NULL, 1),
(23, 'min', '250303', 'Min mun', 0, 'minhnvph20397@fpt.edu.vn', '', '', '', NULL, NULL, 0),
(24, 'phuongct', '180803', 'Chu Tuấn Phương', 0, 'ctuanphuong18@gmail.com', 'Ngọa Long, Minh Khai, Bắc Từ Liêm, Hà Nội', '0335099885', 'z3908780836163_88f267db3445b3b010eb4b6f12755f67.jpg', NULL, NULL, 0),
(25, 'quanglinhnb', '000000', 'Đỗ Quang Linh', 0, 'linhdqph19316@fpt.edu.vn', '', '', '', NULL, NULL, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `history_bank`
--
ALTER TABLE `history_bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `lk_cate_product` (`idcate`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_ques`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `history_bank`
--
ALTER TABLE `history_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `id_ques` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_bill_cart` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`),
  ADD CONSTRAINT `lk_pro_cart` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `lk_pro_cmt` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `lk_cate_product` FOREIGN KEY (`idcate`) REFERENCES `category` (`id_cate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
