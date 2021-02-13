-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 2 月 13 日 07:56
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
(32, '安藤さん', '日本生まれ', 1, 'プログラミング', '1ando.png', '2021-02-13 16:36:47'),
(33, '飯島さん', '日本生まれ', 2, 'プログラミング', '2iijima.png', '2021-02-13 16:37:59'),
(34, '泉さん', '日本生まれ', 3, 'プログラミング', '3izumi.png', '2021-02-13 16:38:33'),
(35, '伊藤さん', '日本生まれ', 5, 'プログラミング', '5ito.png', '2021-02-13 16:39:09'),
(36, '稲田さん', '日本生まれ', 6, 'プログラミング', '6inada.png', '2021-02-13 16:39:34'),
(37, '小峯さん', '日本生まれ', 18, 'プログラミング', '18komine.png', '2021-02-13 16:40:38'),
(38, '西川さん', '日本生まれ', 36, 'プログラミング', '36nishikawa.png', '2021-02-13 16:41:05'),
(39, '迫さん', '日本生まれ', 20, 'プログラミング', 'brewdog-punkipa.jpg', '2021-02-13 16:41:56');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
