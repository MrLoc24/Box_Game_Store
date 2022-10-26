-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2022 lúc 09:24 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `boxgame` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
use `boxgame`;
--
-- Cơ sở dữ liệu: `boxgame`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_admin`
--

CREATE TABLE `account_admin` (
  `adminId` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `phone` varchar(10) DEFAULT NULL,
  `create_at` varchar(45) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account_admin`
--

INSERT INTO `account_admin` (`adminId`, `name`, `email`, `password`, `status`, `phone`, `create_at`, `update_at`, `image`) VALUES
('loc', 'Mr. Clown', 'loclongla1999@gmail.com', '1234', b'1', NULL, NULL, NULL, 'img/admin/adminloc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `cartId` int(11) NOT NULL,
  `gameId` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_master`
--

CREATE TABLE `cart_master` (
  `cardId` int(11) NOT NULL,
  `userId` varchar(45) NOT NULL,
  `create_at` timestamp GENERATED ALWAYS AS (current_timestamp()) VIRTUAL,
  `status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `gameId` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category`, `type`, `gameId`) VALUES
(33, 'Adventure', 'Uncharted___Legacy_of_Thieves'),
(34, 'FPS-Shooter', 'Uncharted___Legacy_of_Thieves'),
(35, 'PvE', 'Uncharted___Legacy_of_Thieves'),
(36, 'PvP', 'Uncharted___Legacy_of_Thieves'),
(37, 'Sandbox', 'Uncharted___Legacy_of_Thieves'),
(38, 'Strategic', 'Uncharted___Legacy_of_Thieves'),
(39, 'PvE', 'War_Thunder'),
(40, 'PvP', 'War_Thunder'),
(41, 'Strategic', 'War_Thunder'),
(42, 'Crafting', 'PC_Building_Simulator_3'),
(43, 'Family', 'PC_Building_Simulator_3'),
(45, 'Crafting', 'SuchArt___Genius_Artist_Simulator'),
(46, 'Family', 'SuchArt___Genius_Artist_Simulator'),
(47, 'Adventure', 'JARS'),
(48, 'PvE', 'JARS'),
(49, 'Strategic', 'JARS'),
(50, 'Adventure', 'Source_of_Madness'),
(51, 'MOBA', 'Source_of_Madness'),
(52, 'Sandbox', 'Source_of_Madness'),
(53, 'Strategic', 'Source_of_Madness'),
(54, 'Adventure', 'Railway_Empire'),
(55, 'Crafting', 'Railway_Empire'),
(56, 'Sandbox', 'Railway_Empire'),
(65, 'Adventure', 'A_Plague_Tale_Requiem'),
(66, 'Horror', 'A_Plague_Tale_Requiem'),
(67, 'PvE', 'A_Plague_Tale_Requiem'),
(68, 'Sandbox', 'A_Plague_Tale_Requiem'),
(69, 'Strategic', 'A_Plague_Tale_Requiem');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game`
--

CREATE TABLE `game` (
  `gameId` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(1000) NOT NULL,
  `about` varchar(2000) DEFAULT NULL,
  `icon` varchar(100) NOT NULL,
  `banner` varchar(200) DEFAULT NULL,
  `gameplay` varchar(100) NOT NULL,
  `release_date` datetime NOT NULL,
  `developer` varchar(45) NOT NULL,
  `developer_web` varchar(100) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `sale` int(11) DEFAULT 0,
  `number_sold` int(100) DEFAULT NULL,
  `top_page` bit(1) DEFAULT NULL,
  `coming_soon` bit(1) DEFAULT NULL,
  `most_played` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `game`
--

INSERT INTO `game` (`gameId`, `price`, `description`, `about`, `icon`, `banner`, `gameplay`, `release_date`, `developer`, `developer_web`, `create_time`, `sale`, `number_sold`, `top_page`, `coming_soon`, `most_played`) VALUES
('A_Plague_Tale_Requiem', 59.99, 'Embark on a heartrending journey into a brutal, breathtaking world, and discover the cost of saving those you love in a desperate struggle for survival. Strike from the shadows or unleash hell with a variety of weapons, tools and unearthly powers.', NULL, 'img/game/A_Plague_Tale_Requiem/icon/icon.jpg', 'img/game/A_Plague_Tale_Requiem/banner/banner.jpg', 'img/game/A_Plague_Tale_Requiem/gameplay/', '2020-10-18 00:00:00', 'Focus Entertaiment', 'https://www.focus-entmt.com', '2022-10-23 13:44:32', 0, NULL, b'1', b'1', b'1'),
('JARS', 9.99, 'JARS is a strategy game featuring puzzles and elements of tower defense. Join Victor in his spooky yet endearing world and prepare for a quest to uncover the secrets of his family’s basement. Will you save the world or get grounded by mother?', NULL, 'img/game/JARS/icon/icon.jpg', NULL, 'img/game/JARS/gameplay/', '2021-10-20 00:00:00', 'Mousetrap Games', 'https://store.epicgames.com/en-US/p/jars-e39063', '2022-10-24 03:30:27', 10, NULL, b'0', b'0', b'0'),
('PC_Building_Simulator_3', 39.99, 'Grow your empire as you learn to repair, build and customize PCs at the next level. Experience deeper simulation, an upgraded career mode, and powerful new customization features. Use realistic parts from 40+ hardware brands to bring your ultimate PC to life.', 'Start your own PC business in Career Mode, and learn to build and repair PCs. Upgrade your workshop and unlock new tools and equipment as you level up. Turn a profit while going the extra mile for your customers, and watch the positive reviews roll in. Unleash your creativity in Free Build Mode. Select from 1200+ components to plan and execute a powerhouse PC. Install upgraded water cooling, overclock your CPU & GPU, and tweak RAM timings to turbocharge performance. Use 3DMark and Cinebench benchmarks to test and optimize your design. Add sequenced RGB lighting, spray paint and stickers to create the ultimate custom rig. Customize your workshop with new walls, floors, posters and furniture, and make your PC building space your own. Go deeper into your builds with realistic hardware and software simulation. Optimize cooling with the Fan Control app and thermal camera, track power consumption with Power Monitor, and add custom water blocks to GPUs, CPUs, RAM and Motherboards. 18 original tracks that span the genres from French Touch, UK Garage and Grime to Indie Rock, soulful Dub and Synth Pop ballads. Gavin employs original vintage synths and studio equipment throughout the record, elevating the production beyond the purely digital, and creating an album with warmth, character and retro charm. Get the official soundtrack on Bandcamp', 'img/game/PC_Building_Simulator_2/icon/icon.jpg', NULL, 'img/game/PC_Building_Simulator_2/gameplay/', '2022-10-12 00:00:00', 'Spiral House Ltd', 'https://store.epicgames.com/en-US/p/pc-building-simulator-2', '2022-10-24 03:07:01', 30, NULL, b'0', b'0', b'0'),
('Railway_Empire', 49.99, 'In Railway Empire, you will create an elaborate and wide-ranging rail network, purchase over 40 different trains modelled in extraordinary detail, and buy or build railway stations, factories and attractions to keep your network ahead of the competition.', NULL, 'img/game/Railway_Empire/icon/icon.jpg', NULL, 'img/game/Railway_Empire/gameplay/', '2020-09-10 00:00:00', 'Gaming Minds Studios', 'https://store.epicgames.com/en-US/p/railway-empire', '2022-10-24 03:44:49', 70, NULL, b'0', b'0', b'0'),
('Source_of_Madness', 29.99, 'Source of Madness is a side-scrolling dark action roguelite set in a twisted Lovecraftian inspired world powered by procedural generation and AI machine learning. Take on the role of a new Acolyte as they embark on a nightmarish odyssey.', NULL, 'img/game/Source_of_Madness/icon/icon.jpg', NULL, 'img/game/Source_of_Madness/gameplay/', '2020-10-11 00:00:00', 'Carry Castle', 'https://store.epicgames.com/en-US/p/source-of-madness-287857', '2022-10-24 03:35:33', 20, NULL, b'0', b'0', b'1'),
('SuchArt___Genius_Artist_Simulator', 19.99, 'A unique artist sim game with realistic paint mixing, physics and numerous painting tools. Upgrade and customize your studio, complete tasks, sell and expose art, buy instruments and get famous!', NULL, 'img/game/SuchArt___Genius_Artist_Simulator/icon/icon.jpg', NULL, 'img/game/SuchArt___Genius_Artist_Simulator/gameplay/', '2022-10-10 00:00:00', 'Voolgi', 'https://store.epicgames.com/en-US/p/suchart-genius-artist-simulator', '2022-10-24 03:20:45', 20, NULL, b'0', b'0', b'1'),
('Uncharted___Legacy_of_Thieves', 59.99, 'Play as Nathan Drake and Chloe Frazer in their own standalone adventures as they confront their pasts and forge their own legacies. This game includes the critically acclaimed single-player stories from both UNCHARTED 4: A Thief’s End and UNCHARTED: The Lost Legacy.', 'img/game/Uncharted___Legacy_of_Thieves/banner/banner.jpg', 'img/game/Uncharted___Legacy_of_Thieves/icon/icon.jpg', NULL, 'img/game/Uncharted___Legacy_of_Thieves/gameplay/', '2022-10-19 00:00:00', 'Naghty Dog', 'https://www.naughtydog.com/', '2022-10-23 15:44:36', 0, NULL, b'1', b'1', b'1'),
('War_Thunder', 0, 'War Thunder is the most comprehensive free-to-play, cross-platform, MMO military game dedicated to aviation, armoured vehicles, and naval craft, from the early 20th century to the most advanced modern combat units. Join now and take part in major battles on land, in the air, and at sea.', NULL, 'img/game/War_Thunder/icon/icon.jpg', 'img/game/War_Thunder/banner/banner.jpg', 'img/game/War_Thunder/gameplay/', '2013-08-15 00:00:00', 'Gaijin Entertaiment', 'https://gaijin.net/', '2022-10-23 15:56:06', 0, NULL, b'1', b'0', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `cardId` int(11) NOT NULL,
  `userId` varchar(45) NOT NULL,
  `card_number` int(12) NOT NULL,
  `cvv` int(3) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `userId` varchar(45) NOT NULL,
  `gameId` varchar(45) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `star` float NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `system_requirement`
--

CREATE TABLE `system_requirement` (
  `sysId` int(11) NOT NULL,
  `gameId` varchar(45) NOT NULL,
  `version` varchar(45) NOT NULL,
  `os` varchar(45) NOT NULL,
  `storage` varchar(45) NOT NULL,
  `ram` varchar(45) NOT NULL,
  `chip` varchar(100) NOT NULL,
  `graphic` varchar(200) DEFAULT NULL,
  `internet` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `system_requirement`
--

INSERT INTO `system_requirement` (`sysId`, `gameId`, `version`, `os`, `storage`, `ram`, `chip`, `graphic`, `internet`) VALUES
(9, 'Uncharted___Legacy_of_Thieves', '10', 'Window', '100GB', '12GB', 'i7', '1050Ti', NULL),
(10, 'War_Thunder', '10', 'Window', '50GB', '12GB', 'i7', '1080Ti', NULL),
(11, 'PC_Building_Simulator_3', '10', 'Window', '40GB', '12 GB', 'Intel Core i5-10400 or AMD Ryzen 5 3600', 'NVIDIA GeForce GTX 1660 Super, 6 GB or AMD Radeon RX 5600 XT, 6 GB', NULL),
(12, 'SuchArt___Genius_Artist_Simulator', '64-Bit Windows 7/8/10', 'Window', '20GB', '8GB', 'Intel Core i5-2400 @ 3.1 GHz or AMD FX-6300 @ 3.5 GHz or equivalent', 'GTX 770 2GB or higher', NULL),
(13, 'JARS', '10', 'Window', '10GB', '4GB', 'Intel i5 +', 'Nvidia GTX 460 / Radeon HD 7800 or better', NULL),
(14, 'Source_of_Madness', '7+', 'Window', '1GB', '4GB', 'Intel i5+', 'Nvidia GTX 460 / Radeon HD 7800 or better', NULL),
(15, 'Railway_Empire', '7, 8, 10 64bit', 'Window', '7GB', '8GB', 'Intel Core i5 2400s @ 2.5 GHz or AMD FX 4100 @ 3.6', 'nVidia GeForce GTX 680 or AMD Radeon HD7970 or better (2048MB VRAM or more, with Shader Model 5.0)', NULL),
(16, 'PC_Building_Simulator_3', '15', 'MAC', '20GB', '8Gb', 'A15', '1050Ti', NULL),
(17, 'A_Plague_Tale_Requiem', '10', 'window', '200GB', '12GB', 'i5', '1050Ti', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`type`) VALUES
('Adventure'),
('Crafting'),
('Family'),
('FPS-Shooter'),
('Garden'),
('Horror'),
('MOBA'),
('Puzzle'),
('PvE'),
('PvP'),
('Sandbox'),
('Simulator'),
('Strategic');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userId` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `remember_token` varchar(45) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp(),
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cartId`,`gameId`),
  ADD KEY `game_cart` (`gameId`);

--
-- Chỉ mục cho bảng `cart_master`
--
ALTER TABLE `cart_master`
  ADD PRIMARY KEY (`cardId`),
  ADD KEY `name_cart` (`userId`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category`),
  ADD KEY `game_cate` (`gameId`),
  ADD KEY `type_cate` (`type`);

--
-- Chỉ mục cho bảng `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameId`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`cardId`),
  ADD KEY `user_payment` (`userId`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`userId`,`gameId`),
  ADD KEY `game_cmt` (`gameId`);

--
-- Chỉ mục cho bảng `system_requirement`
--
ALTER TABLE `system_requirement`
  ADD PRIMARY KEY (`sysId`),
  ADD KEY `game_sys_re` (`gameId`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart_master`
--
ALTER TABLE `cart_master`
  MODIFY `cardId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `cardId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `system_requirement`
--
ALTER TABLE `system_requirement`
  MODIFY `sysId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart` FOREIGN KEY (`cartId`) REFERENCES `cart_master` (`cardId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_cart` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart_master`
--
ALTER TABLE `cart_master`
  ADD CONSTRAINT `name_cart` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `game_cate` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `type_cate` FOREIGN KEY (`type`) REFERENCES `type` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `user_payment` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `game_cmt` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_cmt` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `system_requirement`
--
ALTER TABLE `system_requirement`
  ADD CONSTRAINT `game_sys_re` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
