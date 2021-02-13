-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 2 月 13 日 08:16
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `member_profile_table`
--

CREATE TABLE `member_profile_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `history` varchar(64) DEFAULT NULL,
  `number` int(6) NOT NULL,
  `goal` text NOT NULL,
  `fname` varchar(128) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='for EC web site test';

--
-- テーブルのデータのダンプ `member_profile_table`
--

INSERT INTO `member_profile_table` (`id`, `name`, `history`, `number`, `goal`, `fname`, `indate`) VALUES
(37, '小峯さん', '日本生まれ', 18, 'プログラミング', '18komine.png', '2021-02-13 16:40:38'),
(38, '西川さん', '日本生まれ', 36, 'プログラミング', '36nishikawa.png', '2021-02-13 16:41:05'),
(40, '安藤さん', '日本生まれ', 1, 'プログラミング', '01_ando.png', '2021-02-13 17:07:18'),
(41, '飯島さん', '日本生まれ', 2, 'プログラミング', '02_iijima.png', '2021-02-13 17:07:43'),
(42, '泉さん', '日本生まれ', 3, 'プログラミング', '03_izumi.png', '2021-02-13 17:08:35'),
(43, '大原さん', '日本生まれ', 8, 'プログラミング', '08_ohara.png', '2021-02-13 17:09:12'),
(44, '影山さん', '日本生まれ', 12, 'プログラミング', '12_kageyama.png', '2021-02-13 17:09:40'),
(45, '濱野さん', '日本生まれ', 37, 'プログラミング', '37_hamano.png', '2021-02-13 17:10:16'),
(46, '大下さん', '日本生まれ', 49, 'プログラミング', '49_oshimo.png', '2021-02-13 17:10:38'),
(47, '加藤さん', '日本生まれ', 13, 'プログラミング', '13_kato.png', '2021-02-13 17:11:03'),
(48, '稲田さん', '日本生まれ', 6, 'プログラミング', '06_inada.png', '2021-02-13 17:11:32'),
(49, '伊藤さん', '日本生まれ', 5, 'プログラミング', '05_ito.png', '2021-02-13 17:12:13'),
(50, 'さっちー', '日本生まれ', 0, 'プログラミング', '00_satachi.png', '2021-02-13 17:12:47'),
(51, '迫さん', '日本生まれ', 20, 'プログラミング', '20_sako.png', '2021-02-13 17:13:21');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `member_profile_table`
--
ALTER TABLE `member_profile_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `member_profile_table`
--
ALTER TABLE `member_profile_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
