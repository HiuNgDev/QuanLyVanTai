-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 02:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `id` int(11) NOT NULL,
  `id_transprot` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE `tbl_driver` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `driver_license` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `url_avatar` varchar(255) DEFAULT NULL,
  `url_identification_front` varchar(255) DEFAULT NULL,
  `url_identification_back` varchar(255) DEFAULT NULL,
  `status_work` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`id`, `id_user`, `name`, `age`, `address`, `driver_license`, `salary`, `status`, `url_avatar`, `url_identification_front`, `url_identification_back`, `status_work`) VALUES
(2, 3, 'Vũ Xuân Triều', 25, 'Hà Đông Hà Nội Việt Nam', 'A1', '15.000.000', 0, NULL, NULL, NULL, 1),
(3, 4, 'Phạm Thành Đạt', 30, 'tp Phủ Lí tỉnh Hà Nam', 'A2', '15.000.000', 1, NULL, NULL, NULL, 1),
(4, 5, 'Nguyễn Trường Giang', 24, 'Đông Ngạc Đông Mĩ Nam Định', 'B2', '10.000.000', 1, NULL, NULL, NULL, 0),
(5, 6, 'Hồ Đức Văn', 25, 'Đông Hưng Thái Bình', 'A2', '20.000.000', 0, NULL, NULL, NULL, 1),
(6, 7, 'Phạm Đức Đăng', 26, 'tp Nam Định Nam Định Việt Nam', 'A1', '12.000.000', 1, NULL, NULL, NULL, 1),
(7, 8, 'Hồ Xuân Hoàng', 22, 'Nam Định Nam Định Việt Namtp', 'A1', '17.000.000', 1, NULL, NULL, NULL, 1),
(8, 9, 'Phạm Đoàn Nguyên', 20, 'Cẩm Phả yp Quảng Nình VN', 'B2', '10.000.000', 0, NULL, NULL, NULL, 1),
(9, 10, 'Phạm Quốc Huy', 22, 'Hoàng Văn Thụ tp Hà Nội VN', 'B3', '15.000.000', 1, NULL, NULL, NULL, 1),
(10, 11, 'Dương Bảo Dạt', 25, 'Lê Quang Đạo tp Thái Bình', 'B1', '17.500.000', 1, NULL, NULL, NULL, 1),
(11, 12, 'Phùng Đình Sơn', 29, 'Đường 19M Hưng Nhân tp Thái Bình', 'B2', '16.500.000', 1, NULL, NULL, NULL, 1),
(12, 13, 'Phạm Vũ Quân', 20, 'Đông Hưng Thái Bình', 'A1', '10.000.000', 1, NULL, NULL, NULL, 1),
(13, 14, 'Nguyễn Ngọc Anh', 23, 'Quận 1 thành phố Hồ Chí Minh', 'B2', '35000000', 0, NULL, NULL, NULL, 0),
(14, 15, 'Nguyễn Hương Thảo', 26, 'Quận 2 thành phố Hồ Chí Minh', 'A1', '32000000', 1, NULL, NULL, NULL, 1),
(15, 16, 'Nguyễn Văn A', 30, 'Quận Thủ Đức thành phố Hồ Chí Minh', 'B1', '32000000', 1, NULL, NULL, NULL, 1),
(16, 17, 'Hoàng Văn Mạnh', 22, 'Thanh Xuân Hà Nội', 'A2', '20000000', 1, NULL, NULL, NULL, 0),
(17, 18, 'Hoàng Văn Thao', 23, 'Văn Quán Hà Đông Hà Nội', 'B1', '20000000', 1, NULL, NULL, NULL, 0),
(18, 19, 'Hoàng Anh Kỳ', 22, 'Chiến Thắng Hà Đông Hà Nội', 'A1', '22000000', 1, NULL, NULL, NULL, 1),
(19, 20, 'Hoàng Anh Dũng', 20, 'Nguyễn Văn Trỗi Mộ Lao Hà Đông Hà Nội', 'B1', '20000000', 1, NULL, NULL, NULL, 0),
(20, 21, 'Vũ Thành Trung', 23, 'Mộ Lao Hà Đông Hà Nội', 'A2', '21000000', 1, NULL, NULL, NULL, 1),
(21, 22, 'Đoàn Thành Công', 24, 'Hoàn Kiếm Hà Nội', 'B1', '2500000', 1, NULL, NULL, NULL, 0),
(22, 23, 'Phùng A Chánh', 22, 'Hạ Long Quảng Ninh', 'B1', '23000000', 1, NULL, NULL, NULL, 0),
(23, 24, 'Phùng A Di', 23, 'Hạ Long Quảng Trị', 'B2', '33000000', 1, NULL, NULL, NULL, 0),
(24, 25, 'Nguyễn Thị B', 21, 'Hạ Long Quảng Bình', 'B1', '34000000', 1, NULL, NULL, NULL, 0),
(25, 26, 'Vũ Thị Thùy', 22, 'Hoàng Mai Hà Đông Hà Nội', 'B3', '12543454', 0, NULL, NULL, NULL, 0),
(26, 27, 'Trần Thị Hương', 23, 'Thanh Trì Hà Đông Hà Nội', 'B2', '125435645', 0, NULL, NULL, NULL, 0),
(27, 28, 'Bùi Thị Minh', 22, 'Thanh Trì Phúc Thọ Hà Nội', 'B2', '33333333', 0, NULL, NULL, NULL, 0),
(28, 29, 'Lưu Cẩm Sơn', 28, 'Thanh Trì Phúc Thọ Cà Mau', 'B2', '33333377', 0, NULL, NULL, NULL, 0),
(29, 30, 'Nguyễn Thị Hân', 33, 'HÀ Đông HÀ Nội', 'A2', '32000000', 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `id` int(11) NOT NULL,
  `distric` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `address_details` varchar(255) NOT NULL,
  `logtitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`id`, `distric`, `province`, `code`, `address_details`, `logtitude`, `latitude`) VALUES
(1, 'Phạm Ngũ lão', 'Tp Hồ Chí Minh', '10000', 'Phạm Ngũ Lão quận 1 tp Hồ Chí Minh', '106.629664', '10.823099'),
(2, 'Nguyễn Thái Học', 'Hà Nội', '10000', 'số 23 Nguyễn Thái Học Hà Đông Hà Nội', '105.804817', '21.028511'),
(3, 'Nguyễn Tuân', 'Quảng Trị', '10000', '22 đường Nguyễn Tuân tp Quảng Trị tỉnh Quảng Trị', '106.963409', '16.794347'),
(4, 'Trần Phú ', 'Hà Nội', '12345', 'Km10 Nguyễn Trãi Trần Phú Hà Đông', NULL, NULL),
(5, ' hoàng mai', 'Hà Nội', '24352', '31 nguyễn đức cảnh trần phú hoàng mai hà nội', NULL, NULL),
(6, 'Quang Tri', 'Quang Bình', '26354', 'Ngõ 234 Bình thạnh Gò Vấp Quảng Trị', NULL, NULL),
(7, 'abcg', 'Hà Tĩnh', '17624', '67 Nguyễn Thanh Trì Hoàng Mai Hà Nội', NULL, NULL),
(8, 'ưuhfah', 'Quảng ninh', '27854', '89 Hàm Long Bãi Cháy Thành phố Hạ Long Quảng Ninh', NULL, NULL),
(9, 'Gia han', 'Hà Nội', '76555', 'Ct36tt8 Khu đô Thị Văn Quán Mộ Lao Hà Nội', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transport`
--

CREATE TABLE `tbl_transport` (
  `id` int(11) NOT NULL,
  `id_start_place` int(11) NOT NULL,
  `id_stop_place` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_truck` int(11) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_stop` datetime DEFAULT NULL,
  `fuel` float DEFAULT NULL,
  `status` int(11) NOT NULL,
  `price_flue` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transport`
--

INSERT INTO `tbl_transport` (`id`, `id_start_place`, `id_stop_place`, `id_driver`, `id_truck`, `date_start`, `date_stop`, `fuel`, `status`, `price_flue`) VALUES
(1, 2, 1, 7, 1, '2021-12-10 17:09:52', '2021-12-11 00:00:00', 15, 1, 50000),
(2, 1, 2, 6, 4, '2021-12-11 00:00:00', '2021-12-12 00:00:00', 12, 1, 50000),
(8, 1, 2, 3, 2, '2021-12-10 00:00:00', '2021-12-13 00:00:00', 23, 1, 100000),
(9, 3, 1, 2, 8, '2021-12-12 00:00:00', '2021-12-22 00:00:00', 32, 1, 122222),
(10, 3, 2, 8, 3, '2021-12-11 00:00:00', '2022-01-01 00:00:00', 32, 1, 30000),
(11, 2, 3, 5, 1, '2021-12-10 00:00:00', '2021-12-13 00:00:00', 50, 1, 200000),
(12, 2, 3, 7, 4, '2021-12-21 00:00:00', '2022-01-01 00:00:00', 45, 1, 344444),
(13, 1, 3, 9, 10, '2021-09-23 00:00:00', '2022-01-01 00:00:00', 35, 1, 32000),
(14, 4, 1, 11, 9, '2021-02-12 00:00:00', '2021-06-12 00:00:00', 43, 1, 2137465),
(15, 3, 5, 10, 5, '2021-05-12 00:00:00', '2021-06-12 00:00:00', 53, 1, 217351),
(16, 3, 3, 14, 14, '2021-12-31 00:00:00', '2022-01-07 00:00:00', 23, 1, 4343333),
(17, 3, 2, 6, 15, '2022-01-01 00:00:00', NULL, NULL, 0, NULL),
(18, 4, 2, 15, 13, '2022-01-06 00:00:00', NULL, NULL, 0, NULL),
(19, 4, 7, 20, 17, '2021-12-31 00:00:00', NULL, NULL, 0, NULL),
(20, 5, 5, 12, 16, '2021-12-31 00:00:00', NULL, NULL, 0, NULL),
(21, 4, 6, 18, 24, '2021-12-31 00:00:00', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck`
--

CREATE TABLE `tbl_truck` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `license_plate` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `max_weight` int(11) NOT NULL,
  `date_registery` datetime NOT NULL,
  `date_registery_expried` datetime NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_truck`
--

INSERT INTO `tbl_truck` (`id`, `name`, `license_plate`, `height`, `max_weight`, `date_registery`, `date_registery_expried`, `status`) VALUES
(1, 'Xe Tải 12T', '29F4-34234', 12, 15, '2021-12-10 10:12:16', '2021-12-31 10:12:16', 1),
(2, 'Xe Container', '17M5-67398', 15, 20, '2021-12-10 10:13:43', '2021-12-31 10:13:43', 1),
(3, 'Xe Bán Tải', '25G7-78456', 5, 10, '2021-12-10 10:14:51', '2021-12-31 10:14:51', 1),
(4, 'Xe Bán Tải', '25M6-56784', 4, 8, '2021-12-10 10:55:07', '2023-01-31 00:00:00', 1),
(5, 'Xe Con', '29M5-74568', 4, 9, '2020-10-10 00:00:00', '2022-12-29 00:00:00', 1),
(6, 'Xe Bán Tải 2', '15K4-98760', 12, 18, '2020-12-10 00:00:00', '2022-01-08 00:00:00', 0),
(7, 'Xe Container 30T', '15H4-76584', 20, 30, '2020-11-14 00:00:00', '2021-10-09 00:00:00', 0),
(8, 'Xe Vận Tải 2', '17H9-56478', 12, 20, '2021-12-11 00:00:00', '2022-12-10 00:00:00', 1),
(9, 'Xe Container 2', '34M4-57786', 23, 50, '2021-12-11 00:00:00', '2022-12-07 00:00:00', 1),
(10, 'Xe Con Taxi', '15M8-75637', 2, 4, '2021-12-11 00:00:00', '2022-12-31 00:00:00', 1),
(11, 'xe con taxi 2', '36H2-26151', 3, 5, '2021-02-22 00:00:00', '2021-08-21 00:00:00', 0),
(12, 'xe Container', '29N2-12374', 6, 10, '2021-02-23 00:00:00', '2021-06-24 00:00:00', 0),
(13, 'xe taxi 7', '19N7-12632', 2, 5, '2021-12-31 00:00:00', '2022-01-19 00:00:00', 1),
(14, 'xe tai 6', '23M8-17363', 6, 12, '2021-12-31 00:00:00', '2022-01-18 00:00:00', 1),
(15, 'xe container 8', '12N7-26351', 6, 10, '2021-12-31 00:00:00', '2022-01-26 00:00:00', 1),
(16, 'xe bup be', '23H7-36274', 3, 7, '2022-01-01 00:00:00', '2022-01-05 00:00:00', 1),
(17, 'xe bay', '29F9-62538', 3, 8, '2021-12-31 00:00:00', '2022-01-08 00:00:00', 1),
(18, 'xe máy bay b52', '12G4-27645', 5, 9, '2021-12-15 00:00:00', '2021-12-29 00:00:00', 0),
(19, 'Xe bán tải 3T', '23H0-87236', 3, 9, '2021-12-21 00:00:00', '2021-12-27 00:00:00', 0),
(20, 'xe con 4', '34G5-25678', 1, 4, '2021-12-07 00:00:00', '2021-12-28 00:00:00', 0),
(21, 'xe can', '29N8-12475', 3, 5, '2022-01-01 00:00:00', '2022-01-05 00:00:00', 0),
(22, 'xe bán tải lớn', '34H5-12378', 10, 13, '2022-01-01 00:00:00', '2022-01-04 00:00:00', 0),
(23, 'Xe taxi 11', '54G6-12396', 3, 10, '2022-01-01 00:00:00', '2022-02-17 00:00:00', 0),
(24, 'xe bb', '35G5-98788', 2, 7, '2021-12-31 00:00:00', '2022-01-08 00:00:00', 1),
(25, 'xe  aa', '23H6-44445', 2, 5, '2022-01-01 00:00:00', '2022-01-07 00:00:00', 0),
(26, 'xe taxi 22', '67Y5-98768', 3, 8, '2022-01-07 00:00:00', '2022-02-25 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `numberphone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `numberphone`, `password`, `role`) VALUES
(1, '0983397440', '$2y$10$lNFBYV7N4f5AxNBPkF8fHekrDwrUrQjYMmrmCnp6za7bsu.3ynYrm', 0),
(3, '0123456789', '$2y$10$QdeBzhtLrAJUPjKtQQwlZO3YDcuysSGqTYLUp3OxYSc7zqzSvVSgW', 1),
(4, '0987654321', '$2y$10$iQ3uCYpeh4AQde4CxpiG8ex8u5SfRlQ0nownILHfwTNPgdLqAXO.a', 1),
(5, '08765432109', '$2y$10$McZSbOnWEBIG.rqLiNJdDeo15Hxgle7twqMb11yP6seDgpsrAJPGC', 1),
(6, '0765432189', '$2y$10$P2FNQuW0k.6zWijAC1FXT.uz1n/uxi0k7VUEy3.Za0R2fzK/ZM.Iu', 1),
(7, '023456718', '$2y$10$RO93mpOaKav4AIK7p/PcY.3GEqRX2IOToc6RId22UC0GYHPxq9Gri', 1),
(8, '073456718', '$2y$10$salmtRsklg9teMpo8YQy/OAGN8yG7g5hX/zPLFE8JYSvNnDvF2Oc2', 1),
(9, '0465378456', '$2y$10$mC38570wpVaW5uvMFGvubOEKSkVgbqxzTdPFhjwktfyVYeN4BN7eS', 1),
(10, '0565378456', '$2y$10$RVzLy6TDFgg17SMjrQA/k.jy3iYZdY2xqvUhCpYXwl58eXeOO1qdO', 1),
(11, '0665378456', '$2y$10$TkibR/sYhtmn.CWVBGVJWuFYeUIHycLB4BB4f9MN8nrCRGcQqSagi', 1),
(12, '0785378456', '$2y$10$/DVG7DP1AwsUUEZJgFOjHucSbPf4JAeATJ5gFtFwv0i5xdb8SuvgK', 1),
(13, '0222222222', '$2y$10$OX.aCdOjXtz5BEI.bLrfiOSG.Wh2JM9DiuGg4wNWXAZ8VQvXJqbL6', 1),
(14, '03686264747', '$2y$10$Ck40dlv7gwRWHLOXhufGJes9LV4NAgSkgkcJ7Y7Hzeo9kYmSP4rsC', 1),
(15, '0836477263', '$2y$10$BfkIYwTbvubGxti.VUsKGe92iqm5HkGl5VZsB1bAkqkrz9bPM.XR6', 1),
(16, '09876533783', '$2y$10$pD.UuRqd9S/w8BEZsUbDQ.LLVBN02TP.D0E/QUGqe6brQAkM4coDm', 1),
(17, '093752685', '$2y$10$RFC8suo.Nza6.397j9GSA.4STjLhoflKbscAk17jg/WkhQugTMD7G', 1),
(18, '0937523244', '$2y$10$feh6IWJuQ6.Q.F8dgu3JvOY.AcwaD6MUcWMlW.p1tAZhT3xWUe6JC', 1),
(19, '0937523323', '$2y$10$EFBDeLlqCgPQDw/N26LbXOtDCGaxh/6/kacoaJNH3bUefAX0GVt1C', 1),
(20, '0937523567', '$2y$10$b6mrgvqcp6T69YgH2eDcpux1Wds0k3413KE/RDqedIDeKBXBZPOAC', 1),
(21, '0937233567', '$2y$10$Fnmxqi9Cu3FD9kVjCEvkquJ1VjUnPs8TvzlcwqC6TMAf/djA6UtUS', 1),
(22, '0937233767', '$2y$10$9su9kOC5qtiDHqCAeZyKhOapAK1Pv/5KU.CpvzaWs6lTiIeVtaZbe', 1),
(23, '0947294729', '$2y$10$UU1KflqZUUAMpVMisULfke6hf0uCg8cM.ep4Afi53eny/TQrKD5kq', 1),
(24, '0947294754', '$2y$10$LCAyXMSSk1N4JPzHe2Lfk.tzQs04mFjaCHgd.bmA5ee0LWg.UujL.', 1),
(25, '0947294723', '$2y$10$zw1TmxQx//U8mZwxZ17OAuKyhC9f8EE059qxmEYtBFrSCJNQi.ENW', 1),
(26, '0983334567', '$2y$10$X2okrj0aoZXg/y5jZ6XBxOBOb1VSxkhWfSTYpatR1AWcoWhaY7I.C', 1),
(27, '0233334567', '$2y$10$.wp0z5Es2PmZ0XgWDSiYnuqpCxi0d1sHrEQ45FeqS/bqzxGUFLzgy', 1),
(28, '0233334222', '$2y$10$S1F0NSNd2Yv48UqRulLtV.WzYCnwgItYzeHvKvrmdvFXafr4nuaPu', 1),
(29, '0233355222', '$2y$10$Uc3w4OP9x.oFZhYQcVZ20O4LRtZf7TCDl4CYrHdl7dFF9rc.e6JFy', 1),
(30, '03747623332', '$2y$10$yda8HJ07TmSseKIE5jjgiulrIze8w6lHnOnfD.kwkjIxPp5aqr2WK', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transprot` (`id_transprot`),
  ADD KEY `id_driver` (`id_driver`);

--
-- Indexes for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transport`
--
ALTER TABLE `tbl_transport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_start_place` (`id_start_place`),
  ADD KEY `id_stop_place` (`id_stop_place`),
  ADD KEY `id_driver` (`id_driver`),
  ADD KEY `id_truck` (`id_truck`);

--
-- Indexes for table `tbl_truck`
--
ALTER TABLE `tbl_truck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_transport`
--
ALTER TABLE `tbl_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_truck`
--
ALTER TABLE `tbl_truck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD CONSTRAINT `tbl_bill_ibfk_1` FOREIGN KEY (`id_transprot`) REFERENCES `tbl_transport` (`id`),
  ADD CONSTRAINT `tbl_bill_ibfk_2` FOREIGN KEY (`id_driver`) REFERENCES `tbl_driver` (`id`);

--
-- Constraints for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD CONSTRAINT `tbl_driver_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_transport`
--
ALTER TABLE `tbl_transport`
  ADD CONSTRAINT `tbl_transport_ibfk_1` FOREIGN KEY (`id_start_place`) REFERENCES `tbl_place` (`id`),
  ADD CONSTRAINT `tbl_transport_ibfk_2` FOREIGN KEY (`id_stop_place`) REFERENCES `tbl_place` (`id`),
  ADD CONSTRAINT `tbl_transport_ibfk_3` FOREIGN KEY (`id_driver`) REFERENCES `tbl_driver` (`id`),
  ADD CONSTRAINT `tbl_transport_ibfk_4` FOREIGN KEY (`id_truck`) REFERENCES `tbl_truck` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
