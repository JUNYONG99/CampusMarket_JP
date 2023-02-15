-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.4.22-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- chat 데이터베이스 구조 내보내기
DROP DATABASE IF EXISTS `chat`;
CREATE DATABASE IF NOT EXISTS `chat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `chat`;

-- 테이블 chat.file 구조 내보내기
DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `fm_img` int(255) NOT NULL AUTO_INCREMENT,
  `fm_num` int(255) DEFAULT NULL,
  `main` varchar(255) DEFAULT NULL,
  `sub_1` varchar(255) DEFAULT NULL,
  `sub_2` varchar(255) DEFAULT NULL,
  `sub_3` varchar(255) DEFAULT NULL,
  `f_num` int(255) DEFAULT NULL,
  `num` int(255) DEFAULT NULL,
  `id` int(255) DEFAULT NULL,
  PRIMARY KEY (`fm_img`),
  KEY `num` (`num`),
  KEY `id` (`id`),
  CONSTRAINT `file_ibfk_1` FOREIGN KEY (`num`) REFERENCES `product` (`num`),
  CONSTRAINT `file_ibfk_2` FOREIGN KEY (`id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 chat.file:~34 rows (대략적) 내보내기
DELETE FROM `file`;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
INSERT INTO `file` (`fm_img`, `fm_num`, `main`, `sub_1`, `sub_2`, `sub_3`, `f_num`, `num`, `id`) VALUES
	(30, 818702130, './files/818702130/book1.png', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 57, NULL, NULL),
	(31, 818702130, './files/818702130/book2.png', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 58, NULL, NULL),
	(32, 818702130, './files/818702130/book7.png', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 59, NULL, NULL),
	(33, 818702130, './files/818702130/book6.png', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 60, NULL, NULL),
	(34, 818702130, './files/818702130/book8.png', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 61, NULL, NULL),
	(35, 818702130, './files/818702130/book5.png', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 62, NULL, NULL),
	(37, 818702130, './files/818702130/ghlrPtlfan.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 64, NULL, NULL),
	(39, 818702130, './files/818702130/공간.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 66, NULL, NULL),
	(40, 818702130, './files/818702130/디저트디자인.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 67, NULL, NULL),
	(43, 818702130, './files/818702130/물리치료.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 70, NULL, NULL),
	(44, 818702130, './files/818702130/물리치료2.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 71, NULL, NULL),
	(45, 818702130, './files/818702130/방사1.JPG', './files/818702130/방사2.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 72, NULL, NULL),
	(46, 818702130, './files/818702130/보건.JPG', './files/818702130/성인.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 73, NULL, NULL),
	(47, 818702130, './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 74, NULL, NULL),
	(48, 818702130, './files/818702130/보건.JPG', './files/818702130/성인.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 75, NULL, NULL),
	(50, 818702130, './files/818702130/세무.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 77, NULL, NULL),
	(54, 818702130, './files/818702130/지반공학.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 81, NULL, NULL),
	(55, 1083687293, './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 82, NULL, NULL),
	(56, 1083687293, './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 83, NULL, NULL),
	(57, 1083687293, './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 84, NULL, NULL),
	(58, 1083687293, './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 85, NULL, NULL),
	(59, 1083687293, './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 86, NULL, NULL),
	(60, 1083687293, './files/1083687293/art-g5445a33f5_1920.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 87, NULL, NULL),
	(61, 1083687293, './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 88, NULL, NULL),
	(63, 1083687293, './files/1083687293/세무실무.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 90, NULL, NULL),
	(66, 1083687293, './files/1083687293/치위생2.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 93, NULL, NULL),
	(67, 1083687293, './files/1083687293/치위생.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 94, NULL, NULL),
	(68, 1083687293, './files/1083687293/항공2.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 95, NULL, NULL),
	(69, 1083687293, './files/1083687293/항공3.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 96, NULL, NULL),
	(71, 1083687293, './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 98, NULL, NULL),
	(72, 1083687293, './files/1083687293/공구.JPG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 99, NULL, NULL),
	(85, 1083687293, './files/1083687293/dog03.PNG', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', './files/chatbot_profile_white.jpg', 112, NULL, NULL),
	(87, 1083687293, './files/1083687293/dog02.PNG', './files/1083687293/dog03.PNG', './files/1083687293/dog01 (1).PNG', './files/chatbot_profile_white.jpg', 114, NULL, NULL);
/*!40000 ALTER TABLE `file` ENABLE KEYS */;

-- 테이블 chat.member 구조 내보내기
DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(200) DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `code` mediumint(50) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 chat.member:~3 rows (대략적) 내보내기
DELETE FROM `member`;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id`, `unique_id`, `name`, `email`, `password`, `code`, `status`, `active`, `profile`) VALUES
	(39, 818702130, '白砂', '2018133066@g.shingu.ac.kr', '$2y$10$OREBcsmrydOeuNX7JWHLpeOB.rHLmTZTjafCHmYAMQjzx3hZljMvW', 0, 'verified', 'オフライン', './files//profile/dsada.JPG'),
	(40, 763923077, 'キルベロス', 'qlqktnv14@g.shingu.ac.kr', '$2y$10$dYuUKub1NQngwsuZtd5/SOKDKPFdG.vKzJZMY88bvYf37t/H1eyRC', 0, 'verified', 'オフライン', './files//profile/reciever.JPG'),
	(44, 1083687293, 'じゅん', 'june7933@g.shingu.ac.kr', '$2y$10$wPSoM3OHqIJENB4SCwGzFuWLKNWNnkibwDFTeV/5zTVXxv2eRRRrO', 0, 'verified', 'オフライン', './files/1083687293/profile/chat.JPG');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- 테이블 chat.messages 구조 내보내기
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) DEFAULT NULL,
  `outgoing_msg_id` int(255) DEFAULT NULL,
  `msg` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 chat.messages:~9 rows (대략적) 내보내기
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
	(198, 763923077, 1083687293, 'こんにちは！取引できますか？'),
	(199, 1083687293, 763923077, 'はい！できます！'),
	(200, 1083687293, 763923077, 'どんな商品を見て連絡しましたか？'),
	(201, 763923077, 1083687293, 'アンドロイドプログラミング - Android Studio活用見て連絡しました。'),
	(202, 763923077, 1083687293, '￥1,900合ってますか？'),
	(203, 1083687293, 763923077, 'はい～～'),
	(204, 1083687293, 818702130, 'こんにちは！'),
	(205, 818702130, 1083687293, 'こんにちは！　探す商品ありますか？'),
	(206, 1083687293, 818702130, 'いや…退屈で気楽にしました！');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- 테이블 chat.product 구조 내보내기
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `num` int(55) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `cate` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`num`),
  KEY `id` (`id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id`) REFERENCES `member` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4;

-- 테이블 데이터 chat.product:~27 rows (대략적) 내보내기
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`num`, `title`, `id`, `cate`, `department`, `major`, `state`, `price`, `content`, `reg_date`, `edit_date`, `member_id`) VALUES
	(57, 'リナックス実習 for Beginner', NULL, 'book', 'c', 'ITソフトウェア科', '販売中', 1400, 'リナックス実習 for Beginner', '2022-11-30 19:57:49', '2022-11-30 19:57:49', '818702130'),
	(58, 'アンドロイドプログラミング', NULL, 'book', 'c', 'ITソフトウェア科', '販売中', 1190, 'アンドロイドプログラミング - Android Studio活用', '2022-11-30 19:58:51', '2022-11-30 19:58:51', '818702130'),
	(59, 'OS', NULL, 'book', 'c', '情報通信保安課', '販売中', 1990, 'OS', '2022-11-30 20:00:10', '2022-11-30 20:00:10', '818702130'),
	(60, 'ビッグデータ分析', NULL, 'book', 'c', 'ITソフトウェア科', '販売中', 1700, 'ビッグデータ分析', '2022-11-30 20:01:28', '2022-11-30 20:01:28', '818702130'),
	(61, 'Do it! ジャンプ·トゥ·パイソン', NULL, 'book', 'c', 'ITソフトウェア科', '販売中', 1690, 'Do it! ジャンプ·トゥ·パイソン', '2022-11-30 20:03:07', '2022-11-30 20:03:07', '818702130'),
	(62, 'スプリングブート', NULL, 'book', 'c', 'ITソフトウェア科', '販売中', 2390, 'スプリングブート', '2022-11-30 20:03:57', '2022-11-30 20:03:57', '818702130'),
	(64, '会計と税務実務', NULL, 'book', 'd', '税務会計科', '販売完了', 2290, '会計と税務実務', '2022-11-30 20:28:24', '2022-11-30 20:28:24', '818702130'),
	(66, 'UX FOR XR', NULL, 'book', 'f', 'スマート建設情報科', '販売完了', 2200, 'UX FOR XR', '2022-11-30 20:31:29', '2022-11-30 20:31:29', '818702130'),
	(67, 'デザート·デザイン', NULL, 'book', 'a', '視覚デザイン科', '販売中', 1190, 'デザート·デザイン', '2022-11-30 20:32:22', '2022-11-30 20:32:22', '818702130'),
	(70, '小児理学療法', NULL, 'book', 'e', '物理療法学科', '販売中', 3300, '小児理学療法', '2022-11-30 20:35:14', '2022-11-30 20:35:14', '818702130'),
	(71, '神経系理学療', NULL, 'book', 'e', '物理療法学科', '販売中', 3790, '神経系理学療', '2022-11-30 20:35:55', '2022-11-30 20:35:55', '818702130'),
	(72, '放射線映像学', NULL, 'book', 'e', '放射線学科', '販売完了', 2200, '放射線映像学', '2022-11-30 20:36:51', '2022-11-30 20:36:51', '818702130'),
	(73, '保健法規/成人看護学', NULL, 'book', 'e', '保健医療行政学科', '販売中', 1690, '保健法規/成人看護学', '2022-11-30 20:38:12', '2022-11-30 20:38:12', '818702130'),
	(75, '保健法規/看護学', NULL, 'book', 'e', '保健医療行政学科', '販売完了', 1970, '保健法規/看護学', '2022-11-30 20:40:30', '2022-11-30 20:40:30', '818702130'),
	(77, '税務実務', NULL, 'book', 'd', '税務会計科', '販売中', 2490, '税務実務', '2022-11-30 20:43:47', '2022-11-30 20:43:47', '818702130'),
	(81, '地盤工学理解', NULL, 'book', 'f', '建築学科', '販売中', 3100, '地盤工学理解', '2022-11-30 20:50:20', '2022-11-30 20:50:20', '818702130'),
	(87, 'デザイン絵の具及び美術用品', NULL, 'tool', 'a', '繊維衣裳コーディネート科', '販売完了', 2700, 'デザイン絵の具及び美術用品', '2022-12-01 17:58:16', '2022-12-01 17:58:16', '1083687293'),
	(88, '書道道具', NULL, 'tool', 'a', '視覚デザイン科', '販売中', 1220, 'イメージはありませんが、状態はすっきりしています!', '2022-12-01 18:00:56', '2022-12-01 18:00:56', '1083687293'),
	(90, '税務実務', NULL, 'book', 'd', '税務会計科', '販売完了', 1200, '税務実務', '2022-12-01 18:02:26', '2022-12-01 18:02:26', '1083687293'),
	(93, '臨床歯科衛生コース', NULL, 'book', 'e', '放射線学科', '販売中', 2200, '臨床歯科衛生コース', '2022-12-01 18:05:03', '2022-12-01 18:05:03', '1083687293'),
	(94, '歯の衛生倫理', NULL, 'book', 'e', '放射線学科', '販売中', 1640, '歯の衛生倫理', '2022-12-01 18:06:05', '2022-12-01 18:06:05', '1083687293'),
	(95, '航空日本語会話', NULL, 'book', 'd', '航空サービス科', '販売中', 1090, '航空日本語会話', '2022-12-01 18:06:38', '2022-12-01 18:06:38', '1083687293'),
	(96, '航空英語会話', NULL, 'book', 'd', '航空サービス科', '販売完了', 1890, '航空英語会話', '2022-12-01 18:07:07', '2022-12-01 18:07:07', '1083687293'),
	(98, 'Oracleデータベース', NULL, 'book', 'c', 'ITソフトウェア科', '販売完了', 1790, 'Oracleデータベース', '2022-12-01 18:09:44', '2022-12-01 18:09:44', '1083687293'),
	(99, 'ドライバー 工具 セット', NULL, 'tool', 'c', '情報通信保安課', '販売中', 4390, 'ドライバー 工具 セット', '2022-12-03 14:18:24', '2022-12-03 14:18:24', '1083687293'),
	(112, '愛犬理論学', NULL, 'book', 'b', 'ペット科', '販売完了', 1490, '愛犬理論学', '2022-12-03 20:37:50', '2022-12-03 19:57:03', '1083687293'),
	(114, '愛犬学実戦', NULL, 'book', 'b', 'ペット科', '販売中', 2590, '愛犬学実戦 - セットシリーズです。 まとめてセットで売りましょう！', '2022-12-04 12:35:29', '2022-12-04 12:33:28', '1083687293');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
