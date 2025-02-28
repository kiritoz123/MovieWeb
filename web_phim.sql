-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https:
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 23, 2024 lúc 03:17 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


;
;
;
;

--
-- Cơ sở dữ liệu: `web_phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_binhluan` int(11) NOT NULL,
  `id_phim` int(11) DEFAULT NULL,
  `id_nguoidung` int(11) DEFAULT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaybinhluan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id_binhluan`, `id_phim`, `id_nguoidung`, `noidung`, `ngaybinhluan`) VALUES
(1, 51, 1, 'Hay', '2024-01-22 10:36:08'),
(2, 51, 1, 'Hay', '2024-01-22 10:36:11'),
(3, 58, 3, 'hay', '2024-01-22 12:02:18'),
(4, 58, 3, 'cũng được', '2024-01-22 12:03:31'),
(5, 55, 3, 'hay đó', '2024-01-22 12:04:08'),
(6, 55, 1, 'hay', '2024-01-22 14:14:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bo_suu_tap`
--

CREATE TABLE `bo_suu_tap` (
  `id_bosuutap` int(11) NOT NULL,
  `id_phim` int(11) DEFAULT NULL,
  `id_nguoidung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bo_suu_tap`
--

INSERT INTO `bo_suu_tap` (`id_bosuutap`, `id_phim`, `id_nguoidung`) VALUES
(1, 62, 3),
(3, 59, 3),
(7, 55, 1),
(8, 58, 1),
(9, 58, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daodien_phim`
--

CREATE TABLE `daodien_phim` (
  `id_daodien_phim` int(11) NOT NULL,
  `id_daodien` int(11) DEFAULT NULL,
  `id_phim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daodien_phim`
--

INSERT INTO `daodien_phim` (`id_daodien_phim`, `id_daodien`, `id_phim`) VALUES
(144, 1, 51),
(145, 1, 52),
(146, 1, 53),
(149, 1, 54),
(153, 1, 58),
(154, 1, 59),
(156, 1, 55),
(158, 1, 56),
(162, 1, 60),
(163, 2, 57),
(169, 7, 62),
(170, 7, 61),
(171, 1, 63),
(172, 1, 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dao_dien`
--

CREATE TABLE `dao_dien` (
  `id_daodien` int(11) NOT NULL,
  `ten_dao_dien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `que_quan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nghe_nghiep` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daodien_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dao_dien`
--

INSERT INTO `dao_dien` (`id_daodien`, `ten_dao_dien`, `ngay_sinh`, `que_quan`, `nghe_nghiep`, `gioi_tinh`, `thong_tin`, `daodien_avatar`) VALUES
(1, 'Bong Joon-ho', '1969-09-14', 'Bongdeok-dong, Daegu, Hàn Quốc', 'Đạo diễn, Nhà Biên Kịch', 'Nam', 'Bong Joon-ho (Tiếng Hàn: 봉준호, sinh ngày 14 tháng 9 năm 1969) là một nam đạo diễn, nhà biên kịch kiêm nhà sản xuất điện ảnh người Hàn Quốc. Là chủ nhân của bốn tượng vàng của giải Oscar, các tác phẩm của ông có đặc điểm là nhấn mạnh vào các chủ đề xã hội, cùng với đó là sự pha trộn giữa các thể loại, yếu tố hài châm biếm tinh tế và sự thay đổi tâm trạng của không chỉ các nhân vật trong phim mà còn cả các khán giả một cách bất ngờ, đột ngột và khó đoán.[1]\r\n\r\nBong Joon-ho lần đầu được công chúng biết đến qua tác phẩm đầu tay Barking Dogs Never Bite (2000), trước khi ông được nhận sự tán dương nhiệt liệt từ giới chuyên môn cũng như các khán giả thông qua các tác phẩm Hồi ức kẻ sát nhân (2003), Quái vật sông Hàn (2006), Người mẹ (2009), Chuyến tàu băng giá (2013) và Ký sinh trùng (2019). Các tác phẩm kể trên đều nằm trong số những bộ phim có doanh thu cao nhất ở Hàn Quốc, trong đó Ký sinh trùng cũng là phim điện ảnh Hàn Quốc có doanh thu cao nhất trong lịch sử.[2]', '3.jpg'),
(2, 'Adam', '1988-01-07', 'USA', 'Đạo diễn', 'Nam', 'Chưa cập nhật thông tin', '4.jpg'),
(6, 'Kim Ki Duk', '1975-05-09', 'Hàn Quốc', 'Đạo diễn', 'Nam', 'Chưa cập nhật thông tin', 'a7-160-1607704335-6249-1607704465.jpg'),
(7, ' Anthony Russo', '1970-02-01', 'Cleveland, Ohio, Hoa Kỳ', 'Đạo diễn,Biên kịch', 'Nsm', 'Anthony J. Russo là nhà làm phim và nhà sản xuất người Mỹ làm việc cùng với anh trai Joseph Russo. Họ đã đạo diễn You, Me và Dupree, Cherry và các phim Marvel Captain America: The Winter Soldier, Captain America: Civil War, Avengers: Infinity War và Avengers: Endgame. Endgame là một trong những bộ phim có doanh thu cao nhất mọi thời đại.', 'tải xuống.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienvien_phim`
--

CREATE TABLE `dienvien_phim` (
  `id_dienvien_phim` int(11) NOT NULL,
  `id_dienvien` int(11) DEFAULT NULL,
  `id_phim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dienvien_phim`
--

INSERT INTO `dienvien_phim` (`id_dienvien_phim`, `id_dienvien`, `id_phim`) VALUES
(157, 1, 51),
(158, 1, 52),
(159, 1, 53),
(162, 1, 54),
(166, 1, 58),
(167, 1, 59),
(169, 1, 55),
(171, 1, 56),
(176, 1, 60),
(177, 2, 57),
(185, 2, 62),
(186, 8, 62),
(187, 9, 62),
(188, 10, 62),
(189, 8, 61),
(190, 9, 61),
(191, 10, 61),
(192, 4, 63),
(193, 5, 63),
(194, 6, 63),
(195, 7, 63),
(196, 1, 45),
(197, 4, 45),
(198, 5, 45),
(199, 6, 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dien_vien`
--

CREATE TABLE `dien_vien` (
  `id_dienvien` int(11) NOT NULL,
  `ten_dien_vien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `que_quan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nghe_nghiep` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienvien_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dien_vien`
--

INSERT INTO `dien_vien` (`id_dienvien`, `ten_dien_vien`, `ngay_sinh`, `que_quan`, `nghe_nghiep`, `gioi_tinh`, `thong_tin`, `dienvien_avatar`) VALUES
(1, 'Lee Min Ho', '1988-01-03', 'Dongjak-gu, Seoul, Hàn Quốc', 'Diễn viên', 'Nam', 'Lee Min-ho được sinh ra trong một gia đình không mấy khá giả tại Seoul. Khi còn nhỏ, anh ấy từng mơ ước trở thành một cầu thủ bóng đá chuyên nghiệp. Anh đã gia nhập vào một đội bóng đá nam do siêu sao bóng đá Cha Bum-kun làm đội trưởng và được người này huấn luyện vô cùng bài bản. Nhưng đáng tiếc thay, Lee Min-ho đã gặp phải một chấn thương ngay trong một trận bóng đá lớn và điều này đã khiến cho nam tài tử họ Lee phải từ bỏ cái giấc mơ trở thành cầu thủ bóng đá năm nào. Trong thời gian học trung học, anh chuyển hướng sang làm streamer bán mĩ phẩm.\r\n\r\nLee Min-ho đã tốt nghiệp chuyên ngành Điện ảnh & Nghệ thuật tại Đại học Konkuk. Sau khi tốt nghiệp, anh đã quyết định rẽ hướng sang con đường diễn xuất.', '20220401_Lee_Min-ho_이민호_ELLE_Taiwan_(3).jpg'),
(2, 'Chris Evans', '1988-01-03', '', '', '0', 'aaa', '2.jpg'),
(3, 'b', '2024-01-21', 'b', 'b', 'Nam', 'b', '4.jpg'),
(4, 'Song Kang', '1994-04-23', 'Suwon, Gyeonggi, South Korea', 'Diễn viên', 'Nam', 'Đây là một tên người Triều Tiên, họ là Song. Song Kang là một nam diễn viên, người mẫu người Hàn Quốc, anh xuất hiện lần đầu trên truyền hình trong loạt phim hài lãng mạn 2017 Kẻ nói dối và người tình. Năm 2019, anh bắt đầu được mọi người chú ý tới với vai diễn Hwang Sun-oh trong bộ phim Love Alarm.', 'dMUXkMfkTEw3qrJisk0mQCQxmBI.jpg'),
(5, 'Kim You-jung', '1999-09-22', 'Seoul, South Korea', 'Diễn viên', 'Nữ', 'Sau khi ra mắt diễn xuất, cô trở thành một trong những nữ diễn viên nhí nổi tiếng nhất Hàn Quốc. Kim sau đó chuyển sang vai diễn tuổi teen, tham gia bộ phim truyền hình Dong Yi, Moon Embrace the Sun, May Queen và Angry Mom. Wikipedia', 'gbIccJcabgD0D4HhnyarEzdGzXh.jpg'),
(6, 'Lee Sang-yi', '1991-11-07', 'South Korea', 'Diễn viên', 'Nam', 'Chưa có thông tin về diễn viên này', '4OSOux7D8ZIbNsA7eINSwmHM9nb.jpg'),
(7, 'Kim Hae-sook', '1955-12-30', 'Busan, South Korea', 'Diễn viên', 'Nữ', 'Kim Hae Sook là một nữ diễn viên Hàn Quốc. Cô xuất hiện lần đầu tiên vào năm 1974. Cô đã giành được nhiều giải thưởng cho các vai diễn khác nhau của mình trong vô số bộ phim truyền hình và phim. Bạn có thể tìm thấy cô ấy trong các bộ phim truyền hình và phim như, Tôi nghe giọng nói của bạn (2013), Hồi Pinocchio, (2015), Cha Cha là Strange, (2017), Mẹ của Mine Mine (2019), Thirst (2009) , The Hand maiden (2016) và The Thief (2012).', 'gbWb5gXuhGCnTSogCrmMPD65F8w.jpg'),
(8, 'Robert Downey Jr.', '1965-04-03', 'New York City, New York, USA', 'Diễn viên', 'Nam', 'Một diễn viên người Mỹ. Downey xuất hiện lần đầu trên màn ảnh vào năm 1970, khi mới 5 tuổi, khi anh xuất hiện trong bộ phim Pound của cha mình, và đã làm việc liên tục trong phim và truyền hình kể từ đó. Trong những năm 1980, ông đã có những vai diễn trong một loạt các bộ phim về tuổi sắp tới gắn liền với Gói Brat. Less Than Zero (1987) đặc biệt đáng chú ý, không chỉ bởi vì đây là lần đầu tiên diễn xuất của Downey được các nhà phê bình thừa nhận, mà còn bởi vai trò đã đẩy thói quen ma túy đã tồn tại của Downey tiến thêm một bước. Sau Zero, Downey bắt đầu hạ cánh trong các bộ phim lớn hơn như Air America (1990), Soapdish (1991) và Natural Born Killers (1994). Anh đóng vai Charlie Chaplin trong bộ phim Chaplin năm 1992, anh nhận được đề cử giải Oscar cho Nam diễn viên xuất sắc nhất.', 'im9SAqJPZKEbVZGmjXuLI4O7RvM.jpg'),
(9, 'Chris Hemsworth', '1983-08-11', 'Melbourne, Victoria, Australia', 'Diễn viên', 'Nam', 'Chris Hemsworth (sinh ngày 11 tháng 8 năm 1983) là một diễn viên người Úc. Anh được biết đến với vai diễn Kim Hyde trong loạt phim truyền hình Úc Home and Away (2004) và vai Thor trong các bộ phim Vũ trụ điện ảnh Marvel Thor (2011), The Avengers (2012), Thor: The Dark World (2013) và Avengers: Age of Ultron (2015). Anh cũng từng xuất hiện trong bộ phim hành động khoa học viễn tưởng Star Trek (2009), phim kinh dị phiêu lưu A Perfect Getaway (2009), phim hài kinh dị The Cabin in the Woods (2012), phim hành động giả tưởng đen tối Snow White and the Huntsman (2012 ), bộ phim chiến tranh Red Dawn (2012) và bộ phim truyền hình thể thao tiểu sử Rush (2013).\r\n\r\nMô tả ở trên từ bài viết Wikipedia Chris Hemsworth, được cấp phép theo CC-BY-SA, danh sách đầy đủ những người đóng góp trên Wikipedia.', 'xkHHiJXraaMFXgRYspN6KVrFn17.jpg'),
(10, 'Brie Larson', '1989-10-01', 'Sacramento, California, USA', 'Diễn viên', 'Nữ', 'Brianne Sidonie Desaulniers (sinh ngày 1 tháng 10 năm 1989), được biết đến với tên chuyên nghiệp là Brie Larson, là một nữ diễn viên, đạo diễn và ca sĩ người Mỹ. Sinh ra ở Sacramento, California, Larson được học tại nhà trước khi cô học diễn xuất tại Nhà hát Nhạc viện Hoa Kỳ. Cô bắt đầu sự nghiệp diễn xuất của mình trên truyền hình, xuất hiện thường xuyên trong bộ phim sitcom Raising Dad năm 2001, được đề cử giải Nghệ sĩ trẻ.\r\n\r\nKhi còn là thiếu niên, Larson đã có những vai diễn ngắn ngủi trong bộ phim năm 2004 13 Đi về 30 và Ngủ cùng. Diễn xuất của cô trong bộ phim hài Hoot (2006) đã được khen ngợi và sau đó cô đóng vai phụ trong các bộ phim Greenberg (2010), Scott Pilgrim vs. the World (2010), 21 Jump Street (2012), và Don Jon (2013) . Từ năm 2009 đến 2011, Larson nổi bật như một thiếu niên nổi loạn trong loạt phim truyền hình Hoa Kỳ của Tara.\r\n\r\nVai diễn đột phá của Larson đến với bộ phim truyền hình độc lập Short Term 12 (2013), mà cô nhận được nhiều lời khen ngợi. Thành công hơn nữa đến vào năm 2015 khi cô đóng vai chính trong Room, một bộ phim được hoan nghênh dựa trên tiểu thuyết cùng tên của Emma Donoghue. Cô đã giành được một số giải thưởng cho vai diễn một nạn nhân bị bắt cóc mẹ đang gặp rắc rối trong phim, bao gồm Giải thưởng Học viện, Giải thưởng BAFTA, Giải thưởng phê bình, Giải thưởng Quả cầu vàng, Giải thưởng Hiệp hội Diễn viên và Nữ diễn viên xuất sắc nhất Canada. Năm 2017, cô đóng vai một nhiếp ảnh gia chiến tranh trong bộ phim phiêu lưu Kong: Skull Island, bản phát hành có doanh thu cao nhất của cô.', 'iqZ5uKJWbwSITCK4CqdlUHZTnXD.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id_nguoidung` int(11) NOT NULL,
  `ten_nguoi_dung` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_nguoi_dung` enum('admin','nguoi_dung') COLLATE utf8mb4_unicode_ci DEFAULT 'nguoi_dung',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id_nguoidung`, `ten_nguoi_dung`, `mat_khau`, `email`, `loai_nguoi_dung`, `avatar`) VALUES
(1, 'Hiếu', '123456', 'a123@gmail.com', 'nguoi_dung', 'avatar.png'),
(3, 'Huy', '123456', 'admin@gmail.com', 'admin', '20220401_Lee_Min-ho_이민호_ELLE_Taiwan_(3).jpg'),
(4, 'Nguyễn Thành Hiếu', '123456', 'stackskill0@gmail.com', 'nguoi_dung', 'tram-ty-tieu-chu-nha-nien-dai.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id_phim` int(11) NOT NULL,
  `ten_phim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nam_san_xuat` int(11) DEFAULT NULL,
  `mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_phim` int(11) NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_bia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `diem_danh_gia` float NOT NULL,
  `link_trailer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoi_luong` int(11) NOT NULL,
  `luot_xem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id_phim`, `ten_phim`, `nam_san_xuat`, `mo_ta`, `loai_phim`, `hinh_anh`, `anh_bia`, `created_at`, `diem_danh_gia`, `link_trailer`, `thoi_luong`, `luot_xem`) VALUES
(37, 'Người phương Bắc', 2022, '12345698677', 0, '1.png', '', '2024-01-17 09:53:35', 8.1, '', 120, 0),
(45, 'Yêu Tinh', 2013, '123', 1, '9f2ebe75ed95973678d2aba817b6da5d.jpg', '', '2024-01-17 17:18:47', 6.5, 'https:
(51, 'Doctor Strange 2', 2022, '123', 0, '2.png', '', '2024-01-18 05:57:30', 7.8, 'https:
(52, 'Ký Ức', 2022, '123', 0, '3.png', '', '2024-01-18 05:59:23', 7, 'https:
(53, 'Morbius', 2023, '123', 0, '6.png', '', '2024-01-18 06:00:17', 7, 'https:
(54, 'The Unbearable Weight of Massive Talent', 2022, '123', 0, '4.png', '', '2024-01-18 06:09:07', 6.2, 'https:
(55, 'The Batman', 2022, 'Bộ phim đưa khán giả dõi theo hành trình phá án và diệt trừ tội phạm của chàng Hiệp sĩ Bóng đêm Batman, với một câu chuyện hoàn toàn khác biệt với những phần phim đã ra mắt trước đây. Thế giới ngầm ở thành phố Gotham xuất hiện một tên tội phạm kỳ lạ tên Riddler chuyên nhắm vào nhân vật tai to mặt lớn. Và sau mỗi lần phạm tội, hắn đều để lại một câu đố bí ẩn cho Batman. Khi bắt tay vào phá giải các câu đố này, Batman dần lật mở những bí ẩn động trời giữa gia đình anh và tên trùm tội phạm Carmine Falcon.\r\nDIỄN VIÊN', 0, '8.png', '', '2024-01-18 06:11:21', 8.2, 'https:
(56, 'Uncharted', 2022, '123', 0, 'movie-6.png', '', '2024-01-18 06:12:10', 5.5, 'https:
(57, 'Những Ngày Hoàn Hảo', 2023, '123', 0, 'qaDRPB900LrvMIe3QEgpif7pJMJ.jpg', 'perfect-days-17040316694691076979464.webp', '2024-01-18 06:13:46', 7.9, 'https:
(58, 'Như Hoa Trên Cát', 2023, '123', 1, 'lyeBjKdpv3HhtgCNBZ0Ekk7dZr.jpg', '', '2024-01-18 06:15:20', 8.5, 'https:
(59, 'Đảo Hải Tặc', 2003, '123', 1, 'e3NBGiAifW9Xt8xD5tpARskjccO.jpg', '', '2024-01-18 06:17:49', 8.5, 'https:
(60, 'Nhất Niệm Quan Sơn', 2023, '123', 1, '7DKpFBcZNZWsmApAtYhuQWo1LJD (1).jpg', 'Nhat-Niem-Quan-Son-1-01.jpg', '2024-01-18 06:19:38', 8.2, 'https:
(61, 'The Marvels', 2023, 'Carol Danvers vô tình bị vướng vào một liên kết sức mạnh đặc biệt với Kamala Khan và Monica Rambeau, khiến họ mỗi lần sử dụng năng lực sẽ chuyển đổi vị trí cho nhau. Trong khi đó, một ác nhân người Kree có tên Dar-Benn đã tìm thấy chiếc vòng ma thuật, giúp ả ta xé toạc thực tại và hấp thụ năng lượng nguy hiểm.', 0, 'Ag3D9qXjhJ2FUkrlJ0Cv1pgxqYQ.jpg', '', '2024-01-20 10:03:02', 5.7, 'https:
(62, ' Avengers: Endgame', 2019, 'Sau những sự kiện tàn khốc trong Avengers: Infinity War, vũ trụ bị hủy hoại do những nỗ lực của Thanos. Với sự giúp đỡ của các đồng minh còn lại, Avengers phải tập hợp lại một lần nữa để đảo ngược hành động của Thanos và khôi phục trật tự cho vũ trụ vĩnh viễn, bất kể hậu quả có thể xảy ra.', 0, 'or06FN3Dka5tukK1e9sl16pB3iy.jpg', '3515432-endgamedek-15561710302491765206118.webp', '2024-01-20 10:08:23', 8.2, 'https:
(63, 'Chàng quỷ của tôi', 2023, 'Một ác quỷ bỗng mất hết sức mạnh sau khi vướng vào một nữ thừa kế lạnh lùng. Nhưng có thể cô nắm giữ chìa khóa giúp anh tìm lại năng lực đã mất... và mở cửa trái tim anh.', 1, 'ciRcOqVWR4wiSQRPCPml1X9PaAp.jpg', 'AAAABeL-khUK_CwyMApXmxxiyAZGMAE_hCfQK_cwYQd2MMRX-UviUJL1mKQuOxND8D2kH3c_Ht5tM20rOq3j9oIRCZuxxMxUZ2y0bRqu.jpg', '2024-01-23 06:31:46', 9.1, 'https:

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim_bo`
--

CREATE TABLE `phim_bo` (
  `id_phimbo` int(11) NOT NULL,
  `id_phim` int(11) DEFAULT NULL,
  `so_tap` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phim_bo`
--

INSERT INTO `phim_bo` (`id_phimbo`, `id_phim`, `so_tap`, `created_at`) VALUES
(13, 45, 10, '2024-01-17 17:18:47'),
(14, 58, 16, '2024-01-18 06:15:20'),
(15, 59, 855, '2024-01-18 06:17:49'),
(16, 60, 25, '2024-01-18 06:19:38'),
(17, 63, 16, '2024-01-23 06:31:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim_le`
--

CREATE TABLE `phim_le` (
  `id_phimle` int(11) NOT NULL,
  `id_phim` int(11) DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phim_le`
--

INSERT INTO `phim_le` (`id_phimle`, `id_phim`, `video_url`, `created_at`) VALUES
(7, 37, '2023-12-25 17-42-18.mp4', '2024-01-17 06:10:31'),
(12, 51, 'Slomo.mp4', '2024-01-18 05:57:30'),
(13, 52, 'Slomo.mp4', '2024-01-18 05:59:23'),
(14, 53, 'Slomo.mp4', '2024-01-18 06:00:17'),
(15, 54, 'Slomo.mp4', '2024-01-18 06:09:07'),
(16, 55, 'Slomo.mp4', '2024-01-18 06:11:21'),
(17, 56, 'Slomo.mp4', '2024-01-18 06:12:10'),
(18, 57, '2023-12-25 17-42-18.mp4', '2024-01-18 06:13:46'),
(19, 61, 'Mèo đi hia_ Điều ước cuối cùng - Puss in Boots_ The Last Wish (2022) _ Xem phim - Google Chrome 2023-01-20 21-56-26.mp4', '2024-01-20 10:03:02'),
(20, 62, '2023-12-25 17-42-18.mp4', '2024-01-20 10:08:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quocgia_phim`
--

CREATE TABLE `quocgia_phim` (
  `id_quocgia_phim` int(11) NOT NULL,
  `id_quocgia` int(11) DEFAULT NULL,
  `id_phim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quocgia_phim`
--

INSERT INTO `quocgia_phim` (`id_quocgia_phim`, `id_quocgia`, `id_phim`) VALUES
(21, 2, 51),
(22, 2, 52),
(23, 2, 53),
(24, 2, 54),
(25, 2, 55),
(26, 2, 56),
(27, 5, 57),
(28, 4, 58),
(29, 5, 59),
(30, 6, 60),
(31, 4, 45),
(32, 2, 61),
(33, 2, 62),
(34, 4, 63);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quoc_gia`
--

CREATE TABLE `quoc_gia` (
  `id_quocgia` int(11) NOT NULL,
  `ten_quoc_gia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quoc_gia`
--

INSERT INTO `quoc_gia` (`id_quocgia`, `ten_quoc_gia`) VALUES
(1, 'Việt Nam'),
(2, 'Mĩ'),
(3, 'Đức'),
(4, 'Hàn Quốc'),
(5, 'Nhật Bản'),
(6, 'Trung Quốc'),
(8, 'Nga ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tap_phim`
--

CREATE TABLE `tap_phim` (
  `id_tapphim` int(11) NOT NULL,
  `tap` int(11) DEFAULT NULL,
  `url_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_phimbo` int(11) DEFAULT NULL,
  `id_phim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tap_phim`
--

INSERT INTO `tap_phim` (`id_tapphim`, `tap`, `url_video`, `id_phimbo`, `id_phim`) VALUES
(15, 1, '1.mp4', 13, 45),
(16, 2, '2023-12-25 17-42-18.mp4', 13, 45),
(17, 1, 'Slomo.mp4', 14, 58),
(18, 1, 'Slomo.mp4', 16, 60),
(19, 1, 'Slomo.mp4', 15, 59),
(20, 2, '2023-12-25 17-42-18.mp4', 15, 59),
(21, 1, 'Slomo.mp4', 17, 63);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai_phim`
--

CREATE TABLE `theloai_phim` (
  `id_theloai_phim` int(11) NOT NULL,
  `id_theloai` int(11) DEFAULT NULL,
  `id_phim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai_phim`
--

INSERT INTO `theloai_phim` (`id_theloai_phim`, `id_theloai`, `id_phim`) VALUES
(152, 1, 51),
(153, 2, 51),
(154, 5, 51),
(155, 1, 52),
(156, 1, 53),
(157, 2, 53),
(162, 1, 54),
(167, 6, 58),
(168, 7, 59),
(172, 1, 55),
(174, 1, 56),
(175, 2, 56),
(184, 1, 60),
(185, 2, 60),
(186, 5, 60),
(187, 6, 57),
(200, 1, 62),
(201, 2, 62),
(202, 5, 62),
(203, 12, 62),
(204, 1, 61),
(205, 2, 61),
(206, 5, 61),
(207, 2, 63),
(208, 3, 63),
(209, 6, 63),
(210, 1, 45),
(211, 6, 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `the_loai`
--

CREATE TABLE `the_loai` (
  `id_theloai` int(11) NOT NULL,
  `ten_the_loai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `the_loai`
--

INSERT INTO `the_loai` (`id_theloai`, `ten_the_loai`) VALUES
(1, 'Hành động'),
(2, 'Bí ẩn'),
(3, 'Giật gân'),
(4, 'Kinh dị'),
(5, 'Trinh thám'),
(6, 'Tình cảm'),
(7, 'Anime'),
(8, 'Chiến tranh'),
(9, 'Âm nhạc'),
(10, 'Lịch sử'),
(11, 'Hoạt hình'),
(12, 'Phiêu lưu');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `id_phim` (`id_phim`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `bo_suu_tap`
--
ALTER TABLE `bo_suu_tap`
  ADD PRIMARY KEY (`id_bosuutap`),
  ADD KEY `id_phim` (`id_phim`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `daodien_phim`
--
ALTER TABLE `daodien_phim`
  ADD PRIMARY KEY (`id_daodien_phim`),
  ADD KEY `id_daodien` (`id_daodien`),
  ADD KEY `id_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `dao_dien`
--
ALTER TABLE `dao_dien`
  ADD PRIMARY KEY (`id_daodien`);

--
-- Chỉ mục cho bảng `dienvien_phim`
--
ALTER TABLE `dienvien_phim`
  ADD PRIMARY KEY (`id_dienvien_phim`),
  ADD KEY `id_dienvien` (`id_dienvien`),
  ADD KEY `id_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `dien_vien`
--
ALTER TABLE `dien_vien`
  ADD PRIMARY KEY (`id_dienvien`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id_nguoidung`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id_phim`);

--
-- Chỉ mục cho bảng `phim_bo`
--
ALTER TABLE `phim_bo`
  ADD PRIMARY KEY (`id_phimbo`),
  ADD KEY `id_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `phim_le`
--
ALTER TABLE `phim_le`
  ADD PRIMARY KEY (`id_phimle`),
  ADD KEY `id_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `quocgia_phim`
--
ALTER TABLE `quocgia_phim`
  ADD PRIMARY KEY (`id_quocgia_phim`),
  ADD KEY `id_quocgia` (`id_quocgia`),
  ADD KEY `id_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `quoc_gia`
--
ALTER TABLE `quoc_gia`
  ADD PRIMARY KEY (`id_quocgia`);

--
-- Chỉ mục cho bảng `tap_phim`
--
ALTER TABLE `tap_phim`
  ADD PRIMARY KEY (`id_tapphim`),
  ADD KEY `id_phim` (`id_phim`),
  ADD KEY `tap_phim_ibfk_1` (`id_phimbo`);

--
-- Chỉ mục cho bảng `theloai_phim`
--
ALTER TABLE `theloai_phim`
  ADD PRIMARY KEY (`id_theloai_phim`),
  ADD KEY `id_theloai` (`id_theloai`),
  ADD KEY `id_phim` (`id_phim`);

--
-- Chỉ mục cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`id_theloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `bo_suu_tap`
--
ALTER TABLE `bo_suu_tap`
  MODIFY `id_bosuutap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `daodien_phim`
--
ALTER TABLE `daodien_phim`
  MODIFY `id_daodien_phim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT cho bảng `dao_dien`
--
ALTER TABLE `dao_dien`
  MODIFY `id_daodien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dienvien_phim`
--
ALTER TABLE `dienvien_phim`
  MODIFY `id_dienvien_phim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT cho bảng `dien_vien`
--
ALTER TABLE `dien_vien`
  MODIFY `id_dienvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id_nguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id_phim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `phim_bo`
--
ALTER TABLE `phim_bo`
  MODIFY `id_phimbo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `phim_le`
--
ALTER TABLE `phim_le`
  MODIFY `id_phimle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `quocgia_phim`
--
ALTER TABLE `quocgia_phim`
  MODIFY `id_quocgia_phim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `quoc_gia`
--
ALTER TABLE `quoc_gia`
  MODIFY `id_quocgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tap_phim`
--
ALTER TABLE `tap_phim`
  MODIFY `id_tapphim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `theloai_phim`
--
ALTER TABLE `theloai_phim`
  MODIFY `id_theloai_phim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `id_theloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoi_dung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `bo_suu_tap`
--
ALTER TABLE `bo_suu_tap`
  ADD CONSTRAINT `bo_suu_tap_ibfk_1` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`),
  ADD CONSTRAINT `bo_suu_tap_ibfk_2` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoi_dung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `daodien_phim`
--
ALTER TABLE `daodien_phim`
  ADD CONSTRAINT `daodien_phim_ibfk_1` FOREIGN KEY (`id_daodien`) REFERENCES `dao_dien` (`id_daodien`),
  ADD CONSTRAINT `daodien_phim_ibfk_2` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`);

--
-- Các ràng buộc cho bảng `dienvien_phim`
--
ALTER TABLE `dienvien_phim`
  ADD CONSTRAINT `dienvien_phim_ibfk_1` FOREIGN KEY (`id_dienvien`) REFERENCES `dien_vien` (`id_dienvien`),
  ADD CONSTRAINT `dienvien_phim_ibfk_2` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`);

--
-- Các ràng buộc cho bảng `phim_bo`
--
ALTER TABLE `phim_bo`
  ADD CONSTRAINT `phim_bo_ibfk_1` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phim_le`
--
ALTER TABLE `phim_le`
  ADD CONSTRAINT `phim_le_ibfk_1` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `quocgia_phim`
--
ALTER TABLE `quocgia_phim`
  ADD CONSTRAINT `quocgia_phim_ibfk_1` FOREIGN KEY (`id_quocgia`) REFERENCES `quoc_gia` (`id_quocgia`),
  ADD CONSTRAINT `quocgia_phim_ibfk_2` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`);

--
-- Các ràng buộc cho bảng `tap_phim`
--
ALTER TABLE `tap_phim`
  ADD CONSTRAINT `tap_phim_ibfk_1` FOREIGN KEY (`id_phimbo`) REFERENCES `phim_bo` (`id_phimbo`),
  ADD CONSTRAINT `tap_phim_ibfk_2` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `theloai_phim`
--
ALTER TABLE `theloai_phim`
  ADD CONSTRAINT `theloai_phim_ibfk_1` FOREIGN KEY (`id_theloai`) REFERENCES `the_loai` (`id_theloai`),
  ADD CONSTRAINT `theloai_phim_ibfk_2` FOREIGN KEY (`id_phim`) REFERENCES `phim` (`id_phim`);
COMMIT;

;
;
;
