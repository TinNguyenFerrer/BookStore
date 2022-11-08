-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 09, 2022 lúc 04:56 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `databasebansach`
--
CREATE DATABASE IF NOT EXISTS `databasebansach` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `databasebansach`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

DROP TABLE IF EXISTS `chitietdathang`;
CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaDatHang` int(11) NOT NULL,
  `GiamGia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`, `GiamGia`) VALUES
(45, 6, 4, 100000, NULL),
(46, 1, 5, 128000, NULL),
(47, 2, 3, 92000, NULL),
(48, 1, 1, 128000, NULL),
(49, 2, 6, 92000, NULL),
(50, 7, 4, 85000, NULL),
(51, 2, 1, 92000, NULL),
(52, 6, 1, 100000, NULL),
(53, 1, 4, 128000, NULL),
(54, 2, 1, 92000, NULL),
(55, 26, 3, 234000, NULL),
(56, 27, 1, 300000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

DROP TABLE IF EXISTS `dathang`;
CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `NgayDH` date NOT NULL,
  `NgayGH` date DEFAULT NULL,
  `TrangThaiHD` varchar(20) NOT NULL DEFAULT 'Chưa duyệt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`, `TrangThaiHD`) VALUES
(45, 11, 12, '2021-11-27', '2021-11-27', 'Đã Giao'),
(46, 11, 12, '2021-11-27', '2021-11-27', 'Đã Giao'),
(47, 12, 12, '2021-11-27', '2021-11-27', 'Đã Giao'),
(48, 13, 12, '2021-11-27', '2022-05-09', 'Đã Giao'),
(49, 13, 12, '2021-11-27', NULL, 'Đã duyệt'),
(50, 13, 9, '2021-11-27', NULL, 'Đã duyệt'),
(51, 13, 12, '2021-11-27', '2022-05-05', 'Đã Giao'),
(52, 12, NULL, '2021-11-27', NULL, 'Chưa duyệt'),
(53, 12, NULL, '2021-11-27', NULL, 'Chưa duyệt'),
(54, 10, NULL, '2022-05-05', NULL, 'Chưa duyệt'),
(55, 10, 12, '2022-05-05', '2022-05-05', 'Đã Giao'),
(56, 13, 9, '2022-05-09', '2022-05-09', 'Đã Giao');

--
-- Bẫy `dathang`
--
DROP TRIGGER IF EXISTS `SuaSoLuong`;
DELIMITER $$
CREATE TRIGGER `SuaSoLuong` AFTER UPDATE ON `dathang` FOR EACH ROW BEGIN 
	DECLARE SoLuongLay int(11) DEFAULT 0; 
	if(STRCMP(NEW.TrangThaiHD,"Đã Duyệt")=0)THEN 
    	SET SoLuongLay = (SELECT SoLuong FROM chitietdathang WHERE SoDonDH=NEW.SoDonDH); 
        UPDATE `hanghoa` SET `SoLuongHang` = (SoLuongHang-SoLuongLay) 
        	WHERE `hanghoa`.`MSHH` = 
            (SELECT MSHH FROM `chitietdathang`WHERE SoDonDH=NEW.SoDonDH); 
    END IF; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

DROP TABLE IF EXISTS `hanghoa`;
CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(300) NOT NULL,
  `MoTaHH` varchar(2000) DEFAULT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `MoTaHH`, `Gia`, `SoLuongHang`) VALUES
(1, 'Câu Truyện Ngôn Ngữ ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Phương cách giao tiếp chính của loài người, ngôn ngữ là một phần vô cùng phong phú và đa dạng trong đời sống của chúng ta. Có khoảng 6.000 ngôn ngữ trên thế giới, tuy rất nhiều trong số đó cũng đang biến mất nhanh chóng. Những ngôn ngữ vẫn được sử dụng thì mỗi ngày đều thay da đổi thịt, đến mức các thế hệ sống trong cùng một mái nhà có thể nói năng theo những cách rất khác nhau. Nắm bắt được sự phức tạp tinh tế của ngôn ngữ luôn hiện hữu quanh mình cũng đòi hỏi nhiều tâm sức hơn bạn tưởng, nhưng Câu chuyện ngôn ngữ của David Crystal có thể dẫn dắt bạn vào hành trình tìm hiểu này theo cách đơn giản và gợi mở nhiều hứng thú nhất.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', 128000, 90),
(2, 'Nghìn lẻ một đêm', '                        Nghìn Lẻ Một Đêm, tác phẩm vĩ đại bậc nhất của nền văn học Ả Rập, là một trong những công trình sáng tạo phong phú và hoàn mỹ của nền văn học thế giới.\r\n\r\nNhững truyện cổ tích này thể hiện với mức hoàn hảo, kỳ diệu xu hướng của nhân dân lao động muốn buông mình theo phép nhiệm màu của những ảo giác êm đẹp, theo sự kết hợp phóng khoáng của từ ngữ, thể hiện sức mạnh vũ bão của trí tưởng tượng hoa mỹ của các dân tộc phương Đông - người Ả Rập, người Ba Tư, người Ấn Độ.                    ', 92000, 71),
(6, 'Anna Tóc Đỏ', 'Mới ngày nào cô bé Anne mặt tàn nhang và dễ kích động vừa mới đặt chân lên đảo Hoàng Tử Edward đã gây bao xôn xao, xáo trộn. Vậy mà giờ đây Anne đã vụt lớn thành một thiếu nữ mười sáu tuổi tươi tắn và xinh đẹp. Tuổi mười sáu đặt lên vai cô nhiều trọng trách: một cô giáo làng với tham vọng gieo những ước vọng đẹp đẽ trong tâm hồn trẻ thơ, một sáng lập viên Hội Cải tạo với mong muốn biến Avonlea thành một ngôi làng xanh sạch đẹp hơn, và một người bảo hộ bất đắc dĩ của hai đứa bé sinh đôi mồ côi rất đáng yêu nhưng cũng gây lắm chuyện đau đầu. Nhưng tuổi mười sáu vẫn không làm mất đi trong Anne tính lãng mạn vô phương cứu chữa cũng như chẳng khiến Anne thôi vướng vào vô số sự cố dở khóc dở cười chẳng khác gì những học trò nhỏ tinh nghịch và hăng hái của cô.\r\n\r\nMười một, mười sáu rồi mười tám, Anne từng bước trưởng thành nhưng vẫn không thôi là Anne thánh thiện, lạc quan và căng tràn sức sống – nguồn cảm hứng tinh khôi quyến rũ biết bao thế hệ bạn đọc đủ mọi lứa tuổi trên khắp thế giới.', 100000, 96),
(7, 'Hai Năm Trên Hoang Đảo', 'Một sự cố xảy ra trong đêm tối – du thuyền Sloughi mất tích và trôi dạt vào Thái Bình Dương, mang theo mười lăm cậu bé từ tám đến mười bốn tuổi, không một cơ may được cứu giúp cũng chẳng có người lớn nào để cậy trông. Vừa thoát khỏi bão tố và những con sóng dữ của đại dương, du thuyền lại dạt vào một miền đất hoang sơ, bí ẩn. Kì nghỉ hè mơ ước bỗng chốc hóa thành một \"trường học\" sinh tồn gian khổ: các cậu bé phải tự xoay xở để kiếm cái ăn, chốn ở và sống sót qua bao thử thách, hiểm nguy với hi vọng mong manh được thấy lại quê nhà.\r\n\r\nHai năm trên hoang đảo của Jules Verne trước hết là một cuộc phiêu lưu kì thú mở ra bao điều mới lạ về thế giới tự nhiên, đồng thời khơi gợi khao khát trưởng thành và ý chí tự lập ở các em nhỏ. Nhưng nhìn rộng ra, đây cũng là bức tranh thu nhỏ về công cuộc thám hiểm và chinh phục những vùng đất mới từng là một chương quan trọng trong lịch sử loài người. Qua đó, độc giả có dịp hiểu thêm về mối quan hệ giữa con người nhỏ bé nhưng giàu trí khôn và nghị lực với thiên nhiên kì vĩ, đôi khi khắc nghiệt nhưng hào phóng vô cùng.', 85000, 112),
(20, 'Nguyên Tử Dưới Tấm Ván Sàn ', '            Hãy thử tưởng tượng thế giới xung quanh chúng ta giống như một căn nhà. Khi đó, khoa học chính là sức mạnh ẩn giấu bên trong ngôi nhà của bạn. Nó giúp ngôi nhà vững chắc như đá tảng, trụ vững trong giông gió, tràn ngập ánh sáng vào ban đêm và ấm áp vào buổi sáng ngày đông lạnh giá.\r\n\r\n \r\n\r\nCó thể cả đời bạn chẳng hề nghĩ đến khoa học, nhưng bạn không thể sống được một phần tỉ giây mà không dùng đến khoa học, dù theo cách này hay cách khác. Đủ mọi chuyện lạ lùng, khó hiểu, và đôi khi vô cùng bối rối xảy ra trong nhà bạn mỗi ngày, thì ngạc nhiên thay, không ít thì nhiều cũng có thể giải thích bằng khoa học.\r\n\r\n \r\n\r\nTừ lớp bụi trên giá sách đến vết rách ở chiếc quần jean, Nguyên Tử Dưới Tấm Ván Sàn đưa chúng ta bước vào chuyến thăm thú với những điểm dừng chân quanh nhà mình, và hé lộ những lời giải thích khoa học hấp dẫn và bất ngờ đằng sau mọi sự việc diễn ra hằng ngày.            \r\n                    ', 185000, 70),
(21, 'Sự Sống Là Gì?', '                              Sự sống hiện diện ở khắp nơi xung quanh chúng ta, với những cách thức, hình dáng vô cùng phong phú và đa dạng. Sự sống là một điều thực sự phi thường. Nhưng việc “sống” có ý nghĩa như thế nào đối với chúng ta và muôn loài?\r\n\r\n \r\n\r\nTìm hiểu cách các tế bào sống hoạt động là công việc mà tác giả Paul Nurse – nhà di truyền học đoạt giải Nobel, đã dành cả sự nghiệp để dày công nghiên cứu. Trong Sự Sống Là Gì? – 5 Yếu Tố Cơ Bản Của Sinh Học, Paul Nurse sẽ dẫn dắt độc giả bước vào cuộc hành trình khám phá định nghĩa về sự sống thông qua 5 ý tưởng lớn đã đặt nền móng cho sinh học.\r\n\r\n \r\n\r\nBằng những kinh nghiệm cá nhân trong và ngoài phòng phí nghiệm, tác giả từng bước lần theo gốc rễ của sự tò mò và sử dụng nền tảng tri thức của mình để tiết lộ với độc giả cách mà sinh học vận hành, cả ở hiện tại lẫn trong quá khứ. Ông chia sẻ với chúng ta những thử thách, những cơ hội may mắn, và những khoảnh khắc bừng tỉnh đầy xúc động khi khám phá ra điều mới.\r\n\r\n \r\n\r\nĐể sống sót qua những thử thách mà loài người hiện nay phải đối mặt – từ biến đổi khí hậu tới dịch bệnh, suy giảm đa dạng sinh học và vấn đề an ninh lương thực – tất cả chúng ta phải hiểu được một điều quan trọng: Sự Sống Là Gì?. Và đó chính là chủ đề của cuốn sách này.                  \r\n                                        ', 58000, 23),
(22, 'Cẩm Nang Cỏ Cây Kỳ Quái', '               Thực vật á? Mấy cái cây yếu xìu chứ gì? Này này, bạn hiểu sai cả rồi nhé!!\r\n\r\nBạn có biết chuối là một loài cỏ? Chúa tể muôn loài có thể bỏ mạng chỉ vì đạp nhầm một quả cây bé tin hin, có loài nấm tưởng nhỏ bé nhưng thực ra to gấp 190 lần sân vận động Tokyo Dome…\r\n\r\nĐây chỉ là ba trong số hàng trăm câu chuyện về những loài cỏ cây kỳ quái được kể lại một cách độc đáo và hài hước trong cuốn cẩm nang quái chiêu này.\r\n\r\n“Cẩm Nang Cỏ Cây Kì Quái” - trợ thủ đắc lực giúp bạn “hóng hớt drama” trong thế giới thực vật ngỡ quá yên bình.         \r\n                    ', 145000, 200),
(23, 'Hai Số Phận ( Bìa Cứng )', '                        \r\n                   “Hai số phận” không chỉ đơn thuần là một cuốn tiểu thuyết, đây có thể xem là \"thánh kinh\" cho những người đọc và suy ngẫm, những ai không dễ dãi, không chấp nhận lối mòn.\r\n\r\n“Hai số phận” làm rung động mọi trái tim quả cảm, nó có thể làm thay đổi cả cuộc đời bạn. Đọc cuốn sách này, bạn sẽ bị chi phối bởi cá tính của hai nhân vật chính, hoặc bạn là Kane, hoặc sẽ là Abel, không thể nào nhầm lẫn. Và điều đó sẽ khiến bạn thấy được chính mình.\r\n\r\nKhi bạn yêu thích tác phẩm này, người ta sẽ nhìn ra cá tính và tâm hồn thú vị của bạn!\r\n\r\n“Nếu có giải thưởng Nobel về khả năng kể chuyện, giải thưởng đó chắc chắn sẽ thuộc về Archer.” - Daily Telegraph\r\n\r\n“Hai số phận” (Kane & Abel) là câu chuyện về hai người đàn ông đi tìm vinh quang. William Kane là con một triệu phú nổi tiếng trên đất Mỹ, lớn lên trong nhung lụa của thế giới thượng lưu. Wladek Koskiewicz là đứa trẻ không rõ xuất thân, được gia đình người bẫy thú nhặt về nuôi. Một người được ấn định để trở thành chủ ngân hàng khi lớn lên, người kia nhập cư vào Mỹ cùng đoàn người nghèo khổ. \r\n\r\nTrải qua hơn sáu mươi năm với biết bao biến động, hai con người giàu hoài bão miệt mài xây dựng vận mệnh của mình . “Hai số phận” nói về nỗi khát khao cháy bỏng, những nghĩa cử, những mối thâm thù, từng bước đường phiêu lưu, hiện thực thế giới và những góc khuất... mê hoặc người đọc bằng ngôn từ cô đọng, hai mạch truyện song song được xây dựng tinh tế từ những chi tiết nhỏ nhất.)  ', 150000, 300),
(24, 'Chỉ Thời Gian Có Thể Cất Lời', '          Được biết đên rộng rãi ở Việt Nam với cuốn tiểu thuyết Hai số phận (tập 1 của series Kane và Abel), Jeffrey Archer là một tiểu thuyết gia với thủ pháp kể chuện cực kỳ lôi cuốn và hấp dẫn độc giả khiến chúng ta không thể rời mắt khỏi cuốn sách ngay từ trang đầu. Tài năng tuyệt vời ấy thêm một lần nữa lại được tác giả sử dụng trong biên niên Clifton, series ăn khách toàn thế giới của ông đang được Bách Việt mang tới với độc giả Việt Nam.\r\n\r\nLấy bối cảnh thành phố cảng Bristol nước Anh vào những thập niên đầu thế kỷ 20 mà nhân vậy chính là một cậu bé, Harry Clifton, người mang trong mình những bí ẩn về thân thế. Số phận đưa đẩy khiến Harry có một cuộc đời khác với cha và các bác ruột mình, cậu gắng sức chiến thắng định mệnh dường như đã được ăn bài sẵn để mở cho mình một lối đi riêng. Liệu rằng, Harry có thực sự vượt lên được những hoàn cảnh éo le đeo đuổi cậu suốt từ thời thơ ấu cho tới tận khi trưởng thành?              \r\n                    ', 400000, 200),
(25, 'Bí Mật - Tập 5 - Bạn Phải Chấm Dứt Việc Này Đi', '                        \r\n          CÁI NGÀY MÀ TÔI CANH CÁNH LO SỢ CŨNG ĐÃ ĐẾN. XÉT CHO CÙNG, BÍ MẬT HÃY CỨ MÃI LÀ BÍ MẬT.\r\n\r\nVÀ BÂY GIỜ, CHÚNG TA ĐÃ ĐẾN ĐƯỢC ĐÂY: TẬP CUỐI CÙNG (HOẶC KHÔNG?) TRONG TRƯỜNG THIÊN TIỂU THUYẾT “BÍ MẬT” CỦA TÔI.\r\n\r\n \r\n\r\nChuyến tham quan ngoại khoá đến Bảo tàng Lịch sử Tự nhiên ở địa phương trở nên đầy nguy hiểm khi Cass vô tình làm gãy ngón tay của một xác ướp vô giá. “Tội cố ý phá hoại tài sản công” này mở màn cho chuyến thám hiểm của Cass cùng hai người bạn Max-Ernest và Yo-Yoji đến vùng đất của những kim tự tháp hùng vĩ, các ngôi mộ phủ bụi và những xác chết biết đi. Ai Cập chăng? Hay một nơi nào đó xa lạ hơn thế…\r\n\r\nBí Mật vẫn đang ẩn giấu đâu đó giữa vùng đất ấy. Bạn ở đó, khám phá nó. Trong khi cuộc sống hiện tại của tôi – với sô-cô-la bầu bạn – lại lâm vào tình cảnh nguy hiểm hơn bao giờ hết. Bởi vậy, tôi van xin bạn: BẠN PHẢI CHẤM DỨT VIỆC NÀY ĐI!          ', 290000, 23),
(26, 'Bài Học Diệu Kỳ Từ Chiếc Xe Rác (Khổ Nhỏ)', '                                                                        \r\n      Hạnh phúc không ở ngoài tầm tay\r\n\r\nPhép lịch sự không hề mất.\r\n\r\nCam kết nói Không với \"xe rác\" khiến cho hạnh phúc và phép lịch sự trở thành hiện thực. Điều này hỗ trợ điều kia trong một vòng tròn khép kín.\r\n\r\nMục lục\r\n\r\nCam kết thứ nhất: Hãy bỏ qua những \"chiếc xe rác\"\r\nCam kết thứ hai: Đừng tự \"vấy bẩn\" cuộc sống của mình\r\nCam kết thứ ba: Đừng biến mình thành \"chiếc xe rác\"\r\nCam kết thứ tư: Giúp người khác thôi \"xả rác\"\r\nCam kết thứ năm: Cuộc sống không có \"xe rác\"\r\nCam kết thứ sáu: Xây dựng một gia đình không có \"xe rác\"\r\nCam kết thứ bảy: Xây dựng môi trường làm việc không có \"xe rác\"                                                      ', 234000, 27),
(27, 'Thuật Tư Tưởng (Tái Bản 2021)', '     THUẬT TƯ TƯỞNG là cuốn sách hướng dẫn các phương pháp suy luận, phân tích giúp người đọc có thể phán đoán một cách chính xác, logic theo tinh thần khoa học. Vì tư tưởng mà sai thì mọi lý luận và học hỏi đi theo phía sau nó cũng sẽ sai theo nên tập suy nghĩ cho đúng đắn là một việc làm tối cần thiết trước khi đi vào một học hỏi nghiên cứu nào, suy nghĩ, tư tưởng là một tiền đề tối quan trọng cần phải hiểu biết và rèn luyện trước tiên. Đây là cuốn sách nằm trong bộ ba cuốn sách rèn luyện phương pháp tự học của học giả Thu Giang Nguyễn Duy Cần, giúp các bạn thanh thiếu niên có một phương pháp học tập, làm việc đúng đắn và hợp lý.                   \r\n                    ', 300000, 499);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

DROP TABLE IF EXISTS `hinhhanghoa`;
CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` varchar(100) NOT NULL,
  `MSHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(1, 'ngon_ngu.jpg', 1),
(2, 'nghin-le-1-dem-tap-2.jpg', 2),
(4, 'anna_toc_do.jpg', 6),
(5, 'hai-nam-tren-hoang-dao.jpg', 7),
(15, 'NguyenTuDuoiTamVanSan.jpg', 20),
(16, 'khoa-hoc-quanh-ta-su-song-la-gi-_118044_1.jpg', 21),
(17, 'cam-nang-co-cay-ky-quai_116988_1.jpg', 22),
(18, 'hai-so-phan-bia-cung-_112507_3.jpg', 23),
(19, 'chi-thoi-gian-co-the-cat-loi_102205_1.jpg', 24),
(20, 'bi-mat-tap-5-ban-phai-cham-dut-viec-nay-di_118042_1.jpg', 25),
(21, 'bai-hoc-dieu-ky-tu-chiec-xe-rac-kho-lon-_114470_1.jpg', 26),
(22, 'thuat-tu-tuong-tai-ban-2021-_115790_1.jpg', 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `HoTenKH` varchar(50) NOT NULL,
  `MatKhau` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(500) DEFAULT NULL,
  `SoDienThoai` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `MatKhau`, `DiaChi`, `SoDienThoai`) VALUES
(10, 'Nguyễn Đức Tín', '202cb962ac59075b964b07152d234b70', '45 đường 30/4 Phường Xuân Khánh Ninh Kiều Cần Thơ', '0504367283'),
(11, 'Nguyễn Văn Tiêu', '202cb962ac59075b964b07152d234b70', '85 xã tân hiệp Kiên giang', '0604783728'),
(12, 'Nguyễn Đức Công', '202cb962ac59075b964b07152d234b70', '23 đường 30/4, Phường Xuân Khánh, Ninh Kiều, Cần Thơ', '389283629'),
(13, 'Nguyễn Tèo', '202cb962ac59075b964b07152d234b70', '34 Kinh 7b Xã tân hiệp Kiên Giang', '0504367283'),
(14, 'Nguyễn Văn Tèo', '202cb962ac59075b964b07152d234b70', '444 Kinh 7b Giồng Riềng, Xã tân hiệp Kiên Giang', '0504367283'),
(15, 'SD', 'dda93f23a5263f5428ae5ceb67ecb515', 'Tổng Lãnh Sự Quán Pháp tại Thành Phố Hồ Chí Minh\r\n27, Nguyễn Thị Minh Khai, P. Bến Nghé, Quận 1', '53075043503'),
(16, 'SDD', '1f5b84faef0acd02b23a08bd33dfdcc5', '222 Đường Lê Lợi, phường Bến Thành, quận 1.', '53075043503'),
(17, 'SDDD', '81dc9bdb52d04dc20036dbd8313ed055', '135 Nam Kỳ Khởi Nghĩa, Bến Nghé, Quận 1.', '53075043503'),
(19, 'Nguyễn Vũ v', '202cb962ac59075b964b07152d234b70', '56 Giồng Riềng Kiên Giangw', '0446898099');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `HoTenNV` varchar(50) NOT NULL,
  `MatKhau` varchar(50) DEFAULT NULL,
  `ChucVu` varchar(20) NOT NULL,
  `DiaChi` varchar(500) NOT NULL,
  `SoDienThoai` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `MatKhau`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES
(8, 'Nguyễn Vũ Luân', '202cb962ac59075b964b07152d234b70', 'Quản Lý', '23 Hòn Đất Tân Hiệp Kiên Giang', '04468987400'),
(9, 'Nguyễn Văn Duy', '202cb962ac59075b964b07152d234b70', 'Duyệt Đơn', 'Võ Thị Sáu Cần thơ', '0446898700'),
(12, 'Ngô Thị Dung', '202cb962ac59075b964b07152d234b70', 'Duyệt Đơn', '23 Hòn Đất Tân Hiệp Kiên Giang', '0446898700'),
(13, 'Nguyễn Đức Tín', '202cb962ac59075b964b07152d234b70', 'Quản Lý', '23 Hòn Đất Tân Hiệp Kiên Giang', '0446898099'),
(14, 'Nguyễn Luận', '202cb962ac59075b964b07152d234b70', 'Duyệt Đơn', '1212 Võ Thị Sáu An Giang', '044684000'),
(15, 'Công Phượng', 'd9b1d7db4cd6e70935368a1efb10e377', 'Duyệt Đơn', '23 Hòn Đất Tân Hiệp sóc trăng t', '097687863'),
(16, 'Hoàng Phượng', '202cb962ac59075b964b07152d234b70', 'Duyệt Đơn', '23 Hòn Đất Tân Hiệp sóc trăng', '0976878630'),
(17, 'Hoàng Hùng', '202cb962ac59075b964b07152d234b70', 'Duyệt Đơn', '23 KDC352 Ninh Kiều Cần Thơ', '807090089');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `ChiTiet_HangHoa` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `DatHang_KhachHang` (`MSKH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`),
  ADD UNIQUE KEY `Ten_duy_nhat` (`HoTenKH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `ChiTiet_DatHang` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ChiTiet_HangHoa` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `DatHang_KhachHang` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
