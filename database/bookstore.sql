

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price2` int(255) NOT NULL,
  `image_link` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantity` int(255) DEFAULT NULL,
  `total` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `transaction_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `data` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`transaction_id`, `id`, `product_id`, `qty`, `amount`, `data`, `status`) VALUES
(1, 3, 3, 2, '300000.0000', 'Mắt Biếc', 1),
(2, 4, 4, 1, '250000.0000', 'Tôi là ai - và nếu vậy thì bao nhiêu? (2007)', 0),
(3, 2, 6, 1, '16000.0000', 'Thám Tử Lừng Danh Conan - Tập 90', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phanhois`
--

CREATE TABLE `phanhois` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noidung` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_msg` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `phanhois`
--

INSERT INTO `phanhois` (`id`, `hoten`, `email`, `noidung`, `ngaytao`, `read_msg`) VALUES
(1, 'Tran Tran', 'tran@gmail.com', 'Sách hay lắm', '2020-12-04 15:33:03', 1),
(2, 'Tran Thinh', 'thinh@gmail.com', 'Sách rất hay', '2020-12-02 04:05:21', 1),
(3, 'Nhan', 'nhan@gmail.com', 'Sách chất lượng', '2020-12-02 02:47:54', 0),
(0, 'Kim Ngoc', 'ngoc@gmail.com', 'Sách hay', '2020-12-05 09:46:17', 1),
(0, 'Thanh Thanh', 'thanh@gmail.com', 'Sách hay ', '2020-12-05 10:08:24', 0),
(0, 'Ngan', 'ngan@gmail.com', 'Sách hay', '2020-12-07 03:37:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price1` int(255) NOT NULL,
  `price2` int(255) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `view` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `price1`, `price2`, `content`, `author`, `image_link`, `created`, `view`, `quantity`) VALUES
(3, 'Mắt biếc', 'Truyện', 75000, 60000, 'Một tác phẩm được nhiều người bình chọn là hay nhất của nhà văn này. Một tác phẩm đang được dịch và giới thiệu tại Nhật Bản (theo thông tin từ các báo)… Bởi sự trong sáng của một tình cảm, bởi cái kết thúc rất, rất buồn khi suốt câu chuyện vẫn là những điều vui, buồn lẫn lộn (cái kết thúc không như mong đợi của mọi người). Cũng bởi, mắt biếc… năm xưa nay đâu (theo lời một bài hát).', 'Nguyễn Nhật Ánh', 'product-4.jpg', '2019-06-01 10:32:17', 0, 4),
(4, ' Tôi là ai - và nếu vậy thì bao nhiêu? (2007)  ', 'Triết học, xã hội học', 300000, 250000, 'Trên thị trường sách Việt Nam hiện nay, khó có thể tìm được cuốn sách nào bàn về triết học dành cho bạn trẻ tốt hơn cuốn Tôi là ai - và nếu vậy thì bao nhiêu? của triết gia Đức Richard David Precht. Cuốn sách này không bàn những vấn đề kinh viện, mà nó bàn ngay vào ba câu hỏi mà con người luôn phải đối diện trong cuộc sống: Tôi có thể biết gì? Tôi nên làm gì? và Tôi có quyền hy vọng gì?', 'Richard David Precht ', '1575045356.jpg', '2019-11-29 23:35:56', 0, 3),
(5, 'Công Nghệ Blockchain', 'Công nghệ thông tin', 150000, 100000, 'Blockchain là chủ đề đang vô cùng nóng trên toàn cầu hiện nay. Nó cùng với Bitcoin và tiền kỹ thuật số trở thành đề tài bàn luận trên rất nhiều mặt báo và trong những cuộc trò chuyện của mọi người. Tuy nhiên, khi nói về blockchain vẫn còn nhiều tranh cãi. Có người lo lắng rằng Bitcoin có thể chỉ là bong bóng, nhiều người cho rằng công nghệ phía sau nó là một sự đột phá, và công nghệ ấy sẽ tiếp tục con đường của mình cho đến khi được chấp nhận và tích hợp với Internet.\r\n\r\nThậm chí, Jamie Dimon, CEO của JP Morgan, người đã gay gắt phản đối Bitcoin và gây ra nhiều lo lắng cho cộng đồng tiền kỹ thuật số cũng đã đồng ý rằng, công nghệ DLT (công nghệ sổ cái phân tán - distributed ledger technology) có tiềm năng rất lớn để thay đổi ngành tài chính và các ngành khác. Hơn nữa, JP Morgan cùng với nhiều ngân hàng đã tiến hành kiểm tra blockchain cho những trường hợp sử dụng khác nhau trong thực tế.\r\n\r\nVậy thì Blockchain thực chất là gì? Nó có thể ứng dụng vào những lĩnh vực nào trong cuộc sống và tại sao nó lại được quan tâm như vậy?', 'Nhiều tác giả', '1575044989.jpg', '2019-11-29 23:29:49', 0, 4),
(6, 'Thám Tử Lừng Danh Conan - Tập 90', 'Truyện tranh trinh thám', 18000, 16000, 'Sự thật nào sẽ được làm sáng tỏ đằng sau mối bất hòa giữa hai con người phục vụ công lí ở hai vị thế khác nhau - mật vụ FBI Akai và cảnh sát Amuro!?\r\n\r\nCuộc phiêu lưu mới sẽ đưa độc giả đến gần hơn với Tổ chức Áo Đen, tiết lộ mối quan hệ giữa Sera và “em gái ngoài lãnh địa”!!\r\n\r\nCuối cùng, chuyện tình cảm giữa Heiji và Kazuha cũng có nhiều chuyển biến…!! Tóm lại là sau một thời gian gây bão, thám tử Conan tập 90 đã ấn định ngày phát hành: 24.02 trên toàn quốc!! Chúc các bạn một năm mới tưng bừng và hào hứng nhé…!!', 'Gosho Aoyama', '1575043438.png', '2019-11-29 23:03:58', 0, 7),
(7, 'Thám Tử Lừng Danh Conan - Tuyển Tập Đặc Biệt: Những Câu Chuyện Lãng Mạn - Tập 1', 'Truyện tranh trinh thám', 20000, 18000, 'Cuốn sách này tập hợp những mẩu chuyện lãng mạn giữa Conan (Shinichi) và Ran. Chuyện tình giữa Conan (Shinichi) và Ran khiến độc giả không sao rời mắt được... Tình cảm giữa họ tiến triển từng bước, như mưa dầm thấm lâu...!?', 'Gosho Aoyama', '1575043621.jpg', '2019-11-29 23:07:01', 0, 4),
(8, 'One Piece - Tập 80', 'Truyện tranh', 17000, 16000, 'Sau khi lên được tàu hỏa trên biển, Sanji đã hội ngộ Sogeking và Franky. Kế hoạch đoạt lại Robin bắt đầu. Nào ngờ trên tàu lại có những tay sát thủ lão luyện đang đợi họ. Trong khi đó, Luffy và những người khác vẫn đang tức tốc đuổi theo.\r\n\r\nNhững chuyến phiêu lưu trên đại dương xoay quanh ONE PIECE lại bắt đầu!!\r\n\r\n', 'Eiichiro Oda', '1575043782.jpg', '2019-11-29 23:09:42', 0, 5),
(9, 'DẠY CON ĐỐI MẶT VỚI VÁN CỜ CUỘC ĐỜI', 'Đời sống', 89000, 53000, 'Dạy Con Đối Mặt Với Ván Cờ Cuộc Đời được viết với quan niệm: Những quân cờ vua nhỏ bé không chỉ mang đến cho con người những cung bậc cảm xúc khác nhau mà còn dạy con người nhiều bài học về cuộc đời.\r\n\r\nCuốn sách là trang nhật ký của các thành viên trong một gia đình có con đang ở giai đoạn “khủng hoảng tuổi lên 7”. Cu Tý nghịch ngợm, hay tò mò về những thứ xung quanh mình và yêu thích chơi cờ vua. Người mẹ dịu dàng, thường mang trong mình những nỗi lo lắng đến mức thái quá. Người bố bận rộn nhưng luôn cố gắng dành thời gian để làm bạn cùng con.\r\n\r\nXuyên suốt 5 chương sách là những tình huống mà bạn đã bắt gặp đâu đó trong cuộc sống hằng ngày. Tư duy cờ vua sẽ giúp bạn ứng phó với chúng một cách nhẹ nhàng, hiệu quả nhất. Bạn sẽ bất ngờ khi khám phá ra rằng, cờ vua không chỉ đơn thuần là một một thể thao trí tuệ mà còn ẩn chứa nhiều triết lý về cuộc sống.\r\n\r\nNuôi dạy con trưởng thành là một chặng đường dài và trên hành trình làm cha mẹ, mỗi phụ huynh vẫn còn nhiều bài học phải trải qua.\r\n\r\nDạy con đối mặt với ván cờ cuộc đời sẽ đem đến cho bạn nhiều bài học hữu ích về nuôi dạy con, về cách đứng vững giữa cuộc đời nhiều thử thách.', 'Nguyễn Hữu Huấn', '1575044198.jpg', '2019-11-29 23:16:38', 0, 4),
(10, 'Sinh Ra Để Trở Thành Steve Jobs', 'Kĩ năng', 15000, 116000, 'Sinh ra để trở thành Steve Jobs mang đến câu trả lời cho thắc mắc lớn nhất của cả thế giới về cuộc đời, sự nghiệp của CEO và nhà đồng sáng lập Apple: Làm thế nào một gã trai trẻ kiêu căng, ngạo mạn và đầy khinh suất, bị tống cổ ra khỏi chính công ty mà mình sáng lập ra, lại có thể trở thành một nhà lãnh đạo có tầm nhìn kiệt suất nhất thời đại, và làm thay đổi cuộc sống thường ngày của hàng tỉ con người trên hành tinh này? Schlender và Tetzeli đã kể một câu chuyện hoàn toàn khác về một con người có thực đã biết vượt qua những thất bại của bản thân và học cách tối đa hóa điểm mạnh của chính mình, dựa trên những câu chuyện chưa từng được tiết lộ từ những người thân thuộc nhất với Jobs, bao gồm các thành viên trong gia đình Jobs, các cựu lãnh đạo hàng đầu và những nhân vật quan trọng nhất là Apple, Pixar và Disney, như Tim Cook, Jony Ive, Eddy Cue, Ad Catmull, John Lasserter, Robert Iger.\r\n“Chúng tôi muốn mang đến một hiểu biết sâu hơn về kho kỹ năng và khả năng tiến bộ không ngừng trong kinh doanh của Steve Jobs, và những nỗ lực gần như thần thánh nhằm tạo ảnh hưởng lên thế giới của anh. Chúng tôi muốn thể hiện những điều đó đã được tiếp năng lượng một cách phi thường như thế nào bởi tài năng độc đáo của một người tự học, và bởi chủ nghĩa lý tưởng chân chính cũng như nỗi ám ảnh đến cuồng dại của anh đối với các tiêu chuẩn thẩm mĩ khắt khe nhưng lại rất nhất quán, và ý thức lớn lao về sứ mệnh của anh. Ngay từ đầu, anh đã luôn trắc ẩn về những nỗi lo lắng và nhu cầu của những con người bình thường, những người muốn tìm thấy các công cụ mới để trao đổi cho bản thân sức mạnh và sự tiến bộ trong một thế giới ngày càng phức tạp, bất hòa và xáo trộn.”\r\n', 'Brent Schlender', 'product-12.jpg', '2019-06-01 10:25:22', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `status`, `user_id`, `amount`, `payment`, `payment_info`, `message`, `created`) VALUES
(1, 1, 3, '100000.0000', '', '', '', 0),
(2, 0, 4, '250000.0000', '', '', '', 0),
(3, 0, 2, '16000.0000', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `user_name`, `email`, `phone`, `address`, `password`) VALUES
(1, 'Mai', 'mai', 'mai@gmail.com', '0327542020', 'daklak', '123456'),
(2, 'Cẩm Tú', 'tu', 'camtu@gmail.com', '033333444', 'Hà  Nội', '123456'),
(3, 'Linh', 'linh', 'linh@gmail.com', '0399999', 'tphcm', '123456'),
(4, 'Trần Ngân', 'ngan', 'ngan@gmail.com', '0399933', 'tphcm', '123456'),
(5, 'Nhan', 'nhan', 'nhan@gmail.com', '0386133243', 'Hà  Nội', '123456'),
(6, 'Thinh', 'thinh', 'thinh@gmail.com', '0385133222', 'TPHCM', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `FULLTEXT` (`id_user`) USING BTREE;

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
