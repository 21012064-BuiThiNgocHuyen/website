-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2024 lúc 12:13 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(4, 'Áo nắng', 2),
(6, 'Đồng hồ', 4),
(8, 'Hoa tai', 4),
(9, 'Vòng tay ', 6),
(10, 'Quần Jeans', 7),
(11, 'Chân váy', 1),
(12, 'Giày', 12),
(13, 'Balo', 1),
(14, 'Túi xách', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(1, 'honghanh', 'b8a357038b5616c2f0363d81d599fb4c', 1),
(3, 'huyen', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `id` int(11) NOT NULL,
  `tenbaiviet` varchar(100) NOT NULL,
  `tomtat` longtext NOT NULL,
  `noidung` longtext NOT NULL,
  `id_danhmuc` longtext NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`id`, `tenbaiviet`, `tomtat`, `noidung`, `id_danhmuc`, `tinhtrang`, `hinhanh`) VALUES
(2, 'Các mặt hàng sắp được ra mắt', 'Mua hàng trong tháng 7 này, khách hàng sẽ thỏa thích lựa chọn. Cửa hàng chúng tôi đang nhập một số mẫu áo mới..', 'Các mặt hàng sớm được ra mắt', '5', 0, '1716717046 flower2.jpg'),
(3, 'Giảm giá các mặt hàng áo', 'Các mặt hàng áo nắng, áo dài tay,.. sẽ được giảm giá 5% khi mua từ 400.000đ, giảm 10% các đơn hàng từ 800.000đ', 'Các mặt hàng giảm giá bao gồm áo nắng, áo sơ mi, áo phông...', '4', 0, '1718636817 giày nữ.jpg'),
(4, 'Giảm giá các mặt hàng trang sức', 'Các mặt hàng áo nắng, áo dài tay,.. sẽ được giảm giá 5% khi mua từ 400.000đ, giảm 10% các đơn hàng từ 800.000đ', 'Các mặt hàng áo nắng, áo dài tay,.. sẽ được giảm giá 5% khi mua từ 400.000đ, giảm 10% các đơn hàng từ 800.000đ', '2', 1, '1718379817 group5.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(20) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_date`) VALUES
(25, 9, '4031', 0, '2024-06-17 17:23:40'),
(27, 7, '1402', 0, '2024-06-17 22:12:14'),
(28, 7, '2476', 1, '2024-06-17 22:14:18'),
(29, 7, '9612', 1, '2024-06-17 22:15:50'),
(30, 7, '134', 1, '2024-06-18 13:06:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `code_cart` varchar(20) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(14, '264', 24, 1),
(15, '264', 24, 1),
(16, '289', 27, 2),
(17, '289', 26, 2),
(18, '8094', 27, 1),
(19, '8094', 24, 1),
(20, '8094', 22, 1),
(21, '8094', 21, 1),
(22, '1137', 28, 1),
(23, '1137', 25, 1),
(24, '9641', 28, 3),
(25, '8980', 26, 1),
(26, '8980', 28, 1),
(27, '6639', 25, 1),
(28, '6639', 24, 1),
(29, '6639', 29, 1),
(30, '6639', 16, 1),
(31, '2327', 26, 1),
(32, '7845', 37, 2),
(33, '7464', 40, 1),
(34, '7464', 31, 1),
(35, '4031', 40, 1),
(36, '9458', 38, 1),
(37, '1402', 58, 1),
(38, '1402', 59, 1),
(39, '2476', 44, 2),
(40, '2476', 56, 1),
(41, '9612', 55, 1),
(42, '9612', 52, 1),
(43, '134', 59, 2),
(44, '134', 48, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `sodienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `sodienthoai`) VALUES
(7, 'Hồng Hạnh', 'hn@gmail.com', 'Hà Đông, Hà Nội', '25f9e794323b453885f5181f1b624d0b', '0987654321'),
(8, 'Bùi Huyền', 'huyen@gmail.com', 'Hải Dương', '1bbd886460827015e5d605ed44252251', '0987654321'),
(9, 'b', 'b@gmail.com', 'hđ-hà nội', '202cb962ac59075b964b07152d234b70', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmucbaiviet`
--

CREATE TABLE `tbl_danhmucbaiviet` (
  `id_baiviet` int(11) NOT NULL,
  `tendanhmuc_baiviet` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmucbaiviet`
--

INSERT INTO `tbl_danhmucbaiviet` (`id_baiviet`, `tendanhmuc_baiviet`, `thutu`) VALUES
(4, 'Tin tức tháng 5', 2),
(5, 'Tin tức tháng 7', 4),
(6, 'Tạp chí áo nắng ', 3),
(7, 'Tạp chí thời trang', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id` int(11) NOT NULL,
  `thongtinlienhe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id`, `thongtinlienhe`) VALUES
(1, 'Liên hệ:0987654321\r\nWebsite: http://localhost/website/index.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(250) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
(27, 'áo dài tay trắng', 'OA2', '200000', 9, '1716218712 nature.jpeg', 's', 'd', 1, 7),
(35, 'Vòng ngọc', 'SS5', '400000', 18, '1718634613 vòng tay 3.jpg', 'Vòng ngọc không chỉ là món trang sức đẹp mắt mà còn mang ý nghĩa phong thủy và tinh thần, là sự lựa chọn tuyệt vời để tôn lên vẻ đẹp và sự quý phái của người đeo.', 'Ngọc bích: Loại ngọc có màu xanh lục đặc trưng, thường được ưa chuộng nhờ vào vẻ đẹp tinh khiết và ý nghĩa phong thủy mang lại may mắn và sức khỏe.\r\n Các loại đá quý khác: Vòng ngọc cũng có thể được làm từ các loại đá quý như ruby, sapphire, thạch anh, mang đến sự đa dạng về màu sắc và kiểu dáng.', 1, 9),
(39, 'Áo chống nắng full body', 'TT06', '400000', 12, '1718633769 áo nắng body.jpg', 'Áo chống nắng full body rất phù hợp cho những người phải làm việc hoặc di chuyển nhiều ngoài trời, đặc biệt là trong các hoạt động thể thao, du lịch, và công việc ngoài trời.', 'Mẫu mã và màu sắc của áo chống nắng full body rất phong phú, từ các màu sắc trung tính như trắng, đen, xám, đến các màu sáng và họa tiết thời trang.', 1, 4),
(40, 'Chân váy ngắn', 'MD123', '320000', 20, '1718633887 chân váy.jpg', 'Chân váy ngắn mang lại vẻ ngoài trẻ trung, năng động và nữ tính, là lựa chọn phổ biến trong tủ đồ của nhiều phụ nữ.', 'Vải cotton: Mềm mại, thoáng mát và thấm hút mồ hôi tốt, phù hợp cho mùa hè.\r\nVải len hoặc dạ: Ấm áp, phù hợp cho mùa thu và đông.', 1, 11),
(44, 'Quần jean', 'AS01', '320000', 32, '1718634039 quần jean.jpg', 'Quần jean là một loại trang phục phổ biến và được ưa chuộng trên toàn thế giới, nổi bật với tính bền bỉ, phong cách đa dạng và khả năng thích ứng với nhiều hoàn cảnh khác nhau', 'Denim: Quần jean được làm từ vải denim, một loại vải bông dày và bền. Denim truyền thống thường có màu xanh chàm, nhưng ngày nay có rất nhiều màu sắc khác nhau.', 1, 10),
(45, 'Vòng tay bạc', 'PO002', '350000', 99, '1718634263 vòng tay 1.jpg', 'òng tay bạc là một món trang sức phổ biến, được ưa chuộng nhờ vào vẻ đẹp tinh tế, tính đa dạng trong thiết kế và ý nghĩa phong thủy', 'Bạc nguyên chất: Vòng tay thường được làm từ bạc nguyên chất hoặc bạc sterling (hợp kim bạc chứa 92.5% bạc và 7.5% kim loại khác, thường là đồng)', 1, 9),
(46, 'vòng tay mạ vàng', 'PS001', '899000', 12, '1718634401 vòng tay 2.jpg', 'Vòng tay mạ vàng là một món trang sức tuyệt vời, không chỉ làm tôn lên vẻ đẹp của người đeo mà còn mang ý nghĩa cá nhân và phong thủy. Với sự đa dạng trong thiết kế và tính linh hoạt trong phong cách', 'Lõi kim loại: Vòng tay mạ vàng thường có lõi làm từ các kim loại như đồng, bạc, hoặc thép không gỉ. Những kim loại này mang lại độ bền và chắc chắn cho vòng tay.\r\nLớp mạ vàng: Bên ngoài được phủ một lớp vàng mỏng, thường là vàng 14K, 18K hoặc 24K. Độ dày của lớp mạ vàng có thể khác nhau, ảnh hưởng đến độ bền và giá trị của vòng tay.', 1, 9),
(47, 'Giày thể thao nam', 'FR2', '620000', 42, '1718635156 giày thể thao.jpg', 'Giày thể thao nam không chỉ cung cấp sự thoải mái và hiệu suất cho các hoạt động thể thao mà còn là một phần quan trọng của phong cách thời trang nam giới. Với sự đa dạng về thiết kế và tính năng, ', 'Vải lưới: Chất liệu này thường được sử dụng cho phần trên của giày, mang lại sự thoáng khí và nhẹ nhàng.\r\nDa: Da thật hoặc da tổng hợp cung cấp độ bền cao và hỗ trợ tốt cho bàn chân.\r\nVật liệu tổng hợp: Thường nhẹ và bền, dễ dàng làm sạch và bảo trì.', 1, 12),
(48, 'Giày thể thao nữ', 'FR03', '620000', 42, '1718635309 giày nữ.jpg', 'Giày thể thao không chỉ cung cấp sự thoải mái và hiệu suất cho các hoạt động thể thao mà còn là một phần quan trọng của phong cách thời trang nữ giới. Với sự đa dạng về thiết kế và tính năng, gi', 'Vải lưới: Chất liệu này thường được sử dụng cho phần trên của giày, mang lại sự thoáng khí và nhẹ nhàng.\r\nDa: Da thật hoặc da tổng hợp cung cấp độ bền cao và hỗ trợ tốt cho bàn chân.\r\nVật liệu tổng hợp: Thường nhẹ và bền, dễ dàng làm sạch và bảo trì.\r\nCao su: Dùng cho đế giày, cung cấp độ bám tốt và độ bền cao.', 1, 12),
(49, 'Chân váy dài', 'PO008', '250000', 50, '1718635543 chân váy dài.jpg', 'Chân váy dài không chỉ là một lựa chọn thời trang nữ tính mà còn là biểu tượng của sự thanh lịch và tinh tế. Với sự đa dạng về chất liệu, kiểu dáng và màu sắc, chân váy dài luôn là một phần q', 'Vải cotton: Thường là lựa chọn phổ biến cho chân váy dài vì sự thoải mái và dễ bảo quản.\r\nVải lụa (Silk): Mang lại vẻ sang trọng và mềm mại, thích hợp cho các dịp đặc biệt.\r\nVải chiffon: Nhẹ và mềm mại, tạo cảm giác bay bổng và thướt tha.\r\nVải denim: Cho phong cách cá nhân và sành điệu, thích hợp cho các bữa tiệc hoặc sự kiện không quá trang trọng.\r\n', 1, 11),
(50, 'Chân váy dài', 'PO009', '250000', 52, '1718635663 chân váy dài2.jpg', 'Chân váy dài là một loại váy có chiều dài từ dưới gối đến đến mắt cá chân hoặc thậm chí dài hơn, thường được thiết kế để mang lại vẻ đẹp thanh lịch, nữ tính và phù hợp cho nhiều dịp kh', 'Vải cotton: Thường là lựa chọn phổ biến cho chân váy dài vì sự thoải mái và dễ bảo quản.\r\nVải lụa (Silk): Mang lại vẻ sang trọng và mềm mại, thích hợp cho các dịp đặc biệt.\r\nVải chiffon: Nhẹ và mềm mại, tạo cảm giác bay bổng và thướt tha.\r\nVải denim: Cho phong cách cá nhân và sành điệu, thích hợp cho các bữa tiệc hoặc sự kiện không quá trang trọng.\r\n', 1, 11),
(51, 'Đồng hồ đeo tay', 'FE01', '1499000', 12, '1718635883 đồng hồ 1.jpg', 'Đồng hồ đeo tay không chỉ là công cụ xem giờ mà còn là một phần quan trọng của phong cách cá nhân, thể hiện gu thẩm mỹ và đẳng cấp của người sở hữu. Với sự đa dạng về kiểu dáng, chức năng ', 'Thép không gỉ: Bền, không bị ăn mòn và có thể đánh bóng lại.\r\nTitanium: Nhẹ hơn thép không gỉ, rất bền và chống ăn mòn tốt.\r\nVàng hoặc bạch kim: Mang lại vẻ sang trọng và đắt tiền.\r\nNhựa hoặc silicone: Thường dùng cho đồng hồ thể thao hoặc casual, nhẹ và bền.', 1, 6),
(52, 'Đồng hồ mạ vàng', 'FE02', '2999000', 10, '1718635974 đồng hồ mạ vàng.jpg', 'Đồng hồ mạ vàng là một lựa chọn tuyệt vời để sở hữu một chiếc đồng hồ có vẻ ngoài sang trọng và đẳng cấp mà không cần phải đầu tư quá nhiều vào đồng hồ vàng thật. Với sự kết hợp ', 'Vật liệu cơ bản: Đồng hồ mạ vàng thường được làm từ thép không gỉ, titanium, hoặc các kim loại khác. Chất liệu này thường rất bền và chịu được sự ma sát và va đập.\r\nQuá trình mạ vàng: Đồng hồ được mạ vàng bằng cách áp dụng một lớp mạ vàng lên bề mặt kim loại cơ bản. Quá trình này có thể sử dụng các phương pháp mạ vàng hóa học hoặc điện hóa để đảm bảo lớp mạ vàng bền và đẹp.', 1, 6),
(53, 'Đồng hồ mạ bạc', 'FE04', '1999000', 20, '1718636119 đồng hồ bạc.png', 'Đồng hồ mạ bạc là một lựa chọn tuyệt vời để sở hữu một chiếc đồng hồ có vẻ ngoài sang trọng và đẳng cấp mà không cần phải đầu tư quá nhiều vào đồng hồ bạc thật. Với sự kết hợp ', 'Vật liệu cơ bản: Đồng hồ mạ bạc thường được làm từ thép không gỉ (stainless steel), titan, hoặc các kim loại khác. Chất liệu này thường rất bền và chịu được sự ma sát và va đập.\r\nQuá trình mạ bạc: Đồng hồ được tráng một lớp mạ bạc để tạo ra bề mặt bóng và đẹp mắt. Quá trình này có thể sử dụng các phương pháp mạ bạc hóa học hoặc điện hóa để đảm bảo lớp mạ bạc bền và không bong tróc.\r\n', 1, 6),
(54, 'Áo nắng yody', 'PO005', '420000', 34, '1718636326 áo nắng.jpg', 'Áo nắng không chỉ là một món đồ thời trang mà còn là công cụ bảo vệ da hiệu quả khỏi các tác hại của ánh nắng mặt trời. Với sự đa dạng về chất liệu, kiểu dáng và tính năng, áo nắng là sự', 'Vải UV: Thường là chất liệu chuyên dụng được gia công để chống tia UV. Các loại vải như polyester, nylon, spandex có khả năng chống nắng tốt và khô nhanh.\r\nLụa tổng hợp: Có cảm giác mềm mại và sang trọng, thích hợp cho việc đi chơi hoặc dự tiệc ngoài trời.\r\nVải cotton: Thoáng mát và thấm hút mồ hôi tốt, phù hợp cho các hoạt động ngoài trời vào mùa hè.', 1, 4),
(55, 'Hoa tai thời trang', 'MD001', '300000', 34, '1718636434 hoa tai 1.jpg', 'Hoa tai là một món trang sức không thể thiếu trong tủ đồ của phụ nữ, mang đến sự thanh lịch và sành điệu cho bất kỳ trang phục nào. Với sự đa dạng về chất liệu, kiểu dáng và màu sắc, bạn có t', 'Vàng và bạc: Hoa tai có thể được làm từ vàng và bạc để mang lại vẻ sang trọng và đẳng cấp. Vàng và bạc cũng thường được mạ vàng hoặc mạ bạc để tăng tính thẩm mỹ và bền bỉ.\r\nNgọc trai: Sử dụng ngọc trai tự nhiên hoặc nhân tạo để tạo nên vẻ đẹp sang trọng và quý phái.\r\nĐá quý: Các đá quý như kim cương, ruby, ngọc lục bảo, xanh lam,... thường được sử dụng để làm hoa tai cao cấp ', 1, 8),
(56, 'Hoa tai thời trang', 'MD002', '330000', 34, '1718636473 hoa tai 2.jpg', 'Hoa tai là một món trang sức không thể thiếu trong tủ đồ của phụ nữ, mang đến sự thanh lịch và sành điệu cho bất kỳ trang phục nào. Với sự đa dạng về chất liệu, kiểu dáng và màu sắc, bạn có t', 'Vàng và bạc: Hoa tai có thể được làm từ vàng và bạc để mang lại vẻ sang trọng và đẳng cấp. Vàng và bạc cũng thường được mạ vàng hoặc mạ bạc để tăng tính thẩm mỹ và bền bỉ.\r\nNgọc trai: Sử dụng ngọc trai tự nhiên hoặc nhân tạo để tạo nên vẻ đẹp sang trọng và quý phái.', 1, 8),
(57, 'Hoa tai thời trang', 'MD003', '340000', 34, '1718636507 hoa tai 3.webp', 'Hoa tai là một món trang sức không thể thiếu trong tủ đồ của phụ nữ, mang đến sự thanh lịch và sành điệu cho bất kỳ trang phục nào. Với sự đa dạng về chất liệu, kiểu dáng và màu sắc, bạn có t', 'Vàng và bạc: Hoa tai có thể được làm từ vàng và bạc để mang lại vẻ sang trọng và đẳng cấp. Vàng và bạc cũng thường được mạ vàng hoặc mạ bạc để tăng tính thẩm mỹ và bền bỉ.\r\nNgọc trai: Sử dụng ngọc trai tự nhiên hoặc nhân tạo để tạo nên vẻ đẹp sang trọng và quý phái.', 1, 8),
(58, 'Balo Laptop', 'HF01', '430000', 55, '1718636728 balo.jpg', 'Balo là một món đồ không thể thiếu đối với nhiều người, không chỉ vì tính tiện dụng mà còn bởi sự đa dạng trong thiết kế và phong cách. Việc lựa chọn balo phù hợp với nhu cầu sử dụng và phong', 'Vải: Phổ biến vì tính nhẹ, bền và khả năng chống nước tốt.\r\nPolyester: Cũng là loại vải bền và chống nước, nhưng có thể không nhẹ bằng nylon.\r\nDa tổng hợp hoặc da thật: Thường được sử dụng cho các balo có thiết kế sang trọng và đẳng cấp.', 1, 13),
(59, 'Túi đeo thời trang', 'HF02', '340000', 19, '1718637024 túi xách.jpg', 'Túi xách không chỉ là một vật dụng hữu ích mà còn là biểu tượng của phong cách và cá tính cá nhân. Việc lựa chọn túi xách phù hợp với nhu cầu và phong cách riêng sẽ giúp bạn tự tin và thể hiện p', 'Vải canvas: Vải bố canvas thường được sử dụng cho các túi xách thời trang. Nó nhẹ nhàng, bền bỉ và có thể có nhiều màu sắc và hoa văn khác nhau.\r\nVải dù  và polyester: Các loại vải này thường được sử dụng cho túi xách thể thao và túi xách công nghệ, với khả năng chống nước và dễ dàng vệ sinh.', 1, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydat` varchar(30) NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(100) NOT NULL,
  `soluongban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban`) VALUES
(1, '2024-05-11', 2, '100000', 10),
(2, '2024-06-11', 3, '20000', 8),
(3, '2024-06-17', 3, '1020000', 250000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vanchuyen`
--

CREATE TABLE `tbl_vanchuyen` (
  `id_vanchuyen` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_vanchuyen`
--

INSERT INTO `tbl_vanchuyen` (`id_vanchuyen`, `name`, `phone`, `address`, `id_dangky`) VALUES
(4, 'Nguyễn Thị Hồng Hạnh', '0987654322', 'Hà Đông, Hà Nội', 7),
(6, 'bùi', '0123456789', 'Hà Đông - Hà Nội', 9);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- Chỉ mục cho bảng `tbl_danhmucbaiviet`
--
ALTER TABLE `tbl_danhmucbaiviet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_vanchuyen`
--
ALTER TABLE `tbl_vanchuyen`
  ADD PRIMARY KEY (`id_vanchuyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmucbaiviet`
--
ALTER TABLE `tbl_danhmucbaiviet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_vanchuyen`
--
ALTER TABLE `tbl_vanchuyen`
  MODIFY `id_vanchuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
