-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 1 月 08 日 20:20
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `favorite_music`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `artist` varchar(64) NOT NULL,
  `title` varchar(64) NOT NULL,
  `URL` text NOT NULL,
  `recommend` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `artist`, `title`, `URL`, `recommend`, `indate`) VALUES
(1, 'ZORN', '震エテ眠レ', 'https://youtu.be/EggplZC8bM0', '労働者ラップスター', '2020-12-28 10:23:56'),
(2, 'd', 'd', 'd', 'd', '2020-12-28 13:52:48'),
(3, '舐達磨', 'BUDS MONTAGE', 'https://youtu.be/zaBp1Jh3Bkc', 'DELTA9kidsのフックが激ヤバです', '2020-12-28 13:56:48'),
(4, '舐達磨', 'BUDS MONTAGE', 'https://youtu.be/zaBp1Jh3Bkc', 'DELTA9kidsのフックが激ヤバ', '2020-12-28 13:59:31'),
(5, 'sushiboys', 'OMG', 'https://youtu.be/wagPf84yVWk', 'サンプリングがうまい', '2020-12-28 14:01:25'),
(6, 'sushiboys', 'ISCREAM', 'https://youtu.be/PsS9vj65lJ0', '夏っぽくて爽やか　ほぼポップ　身内ネタを歌っているだけなのに引き込まれる', '2020-12-28 14:08:28');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
