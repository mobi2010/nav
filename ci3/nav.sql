-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-03-03 15:59:17
-- 服务器版本： 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nav`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL COMMENT '摘要',
  `content` text NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_tag_relation`
--

CREATE TABLE `article_tag_relation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表';

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8 INSERT_METHOD=LAST UNION=(`comment_00`,`comment_01`,`comment_02`,`comment_03`,`comment_04`,`comment_05`,`comment_06`,`comment_07`,`comment_08`,`comment_09`,`comment_10`,`comment_11`,`comment_12`,`comment_13`,`comment_14`,`comment_15`,`comment_16`,`comment_17`,`comment_18`,`comment_19`,`comment_20`,`comment_21`,`comment_22`,`comment_23`,`comment_24`,`comment_25`,`comment_26`,`comment_27`,`comment_28`,`comment_29`,`comment_30`,`comment_31`,`comment_32`,`comment_33`,`comment_34`,`comment_35`,`comment_36`,`comment_37`,`comment_38`,`comment_39`,`comment_40`,`comment_41`,`comment_42`,`comment_43`,`comment_44`,`comment_45`,`comment_46`,`comment_47`,`comment_48`,`comment_49`,`comment_50`,`comment_51`,`comment_52`,`comment_53`,`comment_54`,`comment_55`,`comment_56`,`comment_57`,`comment_58`,`comment_59`,`comment_60`,`comment_61`,`comment_62`,`comment_63`,`comment_64`,`comment_65`,`comment_66`,`comment_67`,`comment_68`,`comment_69`,`comment_70`,`comment_71`,`comment_72`,`comment_73`,`comment_74`,`comment_75`,`comment_76`,`comment_77`,`comment_78`,`comment_79`,`comment_80`,`comment_81`,`comment_82`,`comment_83`,`comment_84`,`comment_85`,`comment_86`,`comment_87`,`comment_88`,`comment_89`,`comment_90`,`comment_91`,`comment_92`,`comment_93`,`comment_94`,`comment_95`,`comment_96`,`comment_97`,`comment_98`,`comment_99`);

-- --------------------------------------------------------

--
-- 表的结构 `comment_00`
--

CREATE TABLE `comment_00` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_01`
--

CREATE TABLE `comment_01` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_02`
--

CREATE TABLE `comment_02` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_03`
--

CREATE TABLE `comment_03` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_04`
--

CREATE TABLE `comment_04` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_05`
--

CREATE TABLE `comment_05` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_06`
--

CREATE TABLE `comment_06` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_07`
--

CREATE TABLE `comment_07` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_08`
--

CREATE TABLE `comment_08` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_09`
--

CREATE TABLE `comment_09` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_10`
--

CREATE TABLE `comment_10` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_11`
--

CREATE TABLE `comment_11` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_12`
--

CREATE TABLE `comment_12` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_13`
--

CREATE TABLE `comment_13` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_14`
--

CREATE TABLE `comment_14` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_15`
--

CREATE TABLE `comment_15` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_16`
--

CREATE TABLE `comment_16` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_17`
--

CREATE TABLE `comment_17` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_18`
--

CREATE TABLE `comment_18` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_19`
--

CREATE TABLE `comment_19` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_20`
--

CREATE TABLE `comment_20` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_21`
--

CREATE TABLE `comment_21` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_22`
--

CREATE TABLE `comment_22` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_23`
--

CREATE TABLE `comment_23` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_24`
--

CREATE TABLE `comment_24` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_25`
--

CREATE TABLE `comment_25` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_26`
--

CREATE TABLE `comment_26` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_27`
--

CREATE TABLE `comment_27` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_28`
--

CREATE TABLE `comment_28` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_29`
--

CREATE TABLE `comment_29` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_30`
--

CREATE TABLE `comment_30` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_31`
--

CREATE TABLE `comment_31` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_32`
--

CREATE TABLE `comment_32` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_33`
--

CREATE TABLE `comment_33` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_34`
--

CREATE TABLE `comment_34` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_35`
--

CREATE TABLE `comment_35` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_36`
--

CREATE TABLE `comment_36` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_37`
--

CREATE TABLE `comment_37` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_38`
--

CREATE TABLE `comment_38` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_39`
--

CREATE TABLE `comment_39` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_40`
--

CREATE TABLE `comment_40` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_41`
--

CREATE TABLE `comment_41` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_42`
--

CREATE TABLE `comment_42` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_43`
--

CREATE TABLE `comment_43` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_44`
--

CREATE TABLE `comment_44` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_45`
--

CREATE TABLE `comment_45` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_46`
--

CREATE TABLE `comment_46` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_47`
--

CREATE TABLE `comment_47` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_48`
--

CREATE TABLE `comment_48` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_49`
--

CREATE TABLE `comment_49` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_50`
--

CREATE TABLE `comment_50` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_51`
--

CREATE TABLE `comment_51` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_52`
--

CREATE TABLE `comment_52` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_53`
--

CREATE TABLE `comment_53` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_54`
--

CREATE TABLE `comment_54` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_55`
--

CREATE TABLE `comment_55` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_56`
--

CREATE TABLE `comment_56` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_57`
--

CREATE TABLE `comment_57` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_58`
--

CREATE TABLE `comment_58` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_59`
--

CREATE TABLE `comment_59` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_60`
--

CREATE TABLE `comment_60` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_61`
--

CREATE TABLE `comment_61` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_62`
--

CREATE TABLE `comment_62` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_63`
--

CREATE TABLE `comment_63` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_64`
--

CREATE TABLE `comment_64` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_65`
--

CREATE TABLE `comment_65` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_66`
--

CREATE TABLE `comment_66` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_67`
--

CREATE TABLE `comment_67` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_68`
--

CREATE TABLE `comment_68` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_69`
--

CREATE TABLE `comment_69` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_70`
--

CREATE TABLE `comment_70` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_71`
--

CREATE TABLE `comment_71` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_72`
--

CREATE TABLE `comment_72` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_73`
--

CREATE TABLE `comment_73` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_74`
--

CREATE TABLE `comment_74` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_75`
--

CREATE TABLE `comment_75` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_76`
--

CREATE TABLE `comment_76` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_77`
--

CREATE TABLE `comment_77` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_78`
--

CREATE TABLE `comment_78` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_79`
--

CREATE TABLE `comment_79` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_80`
--

CREATE TABLE `comment_80` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_81`
--

CREATE TABLE `comment_81` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_82`
--

CREATE TABLE `comment_82` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_83`
--

CREATE TABLE `comment_83` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_84`
--

CREATE TABLE `comment_84` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_85`
--

CREATE TABLE `comment_85` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_86`
--

CREATE TABLE `comment_86` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_87`
--

CREATE TABLE `comment_87` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_88`
--

CREATE TABLE `comment_88` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_89`
--

CREATE TABLE `comment_89` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_90`
--

CREATE TABLE `comment_90` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_91`
--

CREATE TABLE `comment_91` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_92`
--

CREATE TABLE `comment_92` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_93`
--

CREATE TABLE `comment_93` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_94`
--

CREATE TABLE `comment_94` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_95`
--

CREATE TABLE `comment_95` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_96`
--

CREATE TABLE `comment_96` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_97`
--

CREATE TABLE `comment_97` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_98`
--

CREATE TABLE `comment_98` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_99`
--

CREATE TABLE `comment_99` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '0secret1male2female',
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0active1inactive',
  `update_time` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '姓名',
  `birthday` int(11) NOT NULL COMMENT '生日',
  `gender` tinyint(4) NOT NULL COMMENT '性别(0women，1men)',
  `bust` tinyint(4) NOT NULL COMMENT '胸围cm',
  `waist` tinyint(4) NOT NULL COMMENT '腰围cm',
  `hips` tinyint(4) NOT NULL COMMENT '臀围cm',
  `hobby` varchar(100) NOT NULL COMMENT '爱好',
  `region` tinyint(4) NOT NULL COMMENT '地区',
  `introduction` varchar(200) NOT NULL COMMENT '简介',
  `status` tinyint(4) NOT NULL COMMENT '状态(0合法，1冻结)',
  `update_time` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `person_avatar`
--

CREATE TABLE `person_avatar` (
  `id` int(11) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `person_identity`
--

CREATE TABLE `person_identity` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tag_type_id` tinyint(4) NOT NULL,
  `sort_id` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表';

-- --------------------------------------------------------

--
-- 表的结构 `tag_type`
--

CREATE TABLE `tag_type` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sort_id` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_tag_relation`
--
ALTER TABLE `article_tag_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_00`
--
ALTER TABLE `comment_00`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_01`
--
ALTER TABLE `comment_01`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_02`
--
ALTER TABLE `comment_02`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_03`
--
ALTER TABLE `comment_03`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_04`
--
ALTER TABLE `comment_04`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_05`
--
ALTER TABLE `comment_05`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_06`
--
ALTER TABLE `comment_06`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_07`
--
ALTER TABLE `comment_07`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_08`
--
ALTER TABLE `comment_08`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_09`
--
ALTER TABLE `comment_09`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_10`
--
ALTER TABLE `comment_10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_11`
--
ALTER TABLE `comment_11`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_12`
--
ALTER TABLE `comment_12`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_13`
--
ALTER TABLE `comment_13`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_14`
--
ALTER TABLE `comment_14`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_15`
--
ALTER TABLE `comment_15`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_16`
--
ALTER TABLE `comment_16`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_17`
--
ALTER TABLE `comment_17`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_18`
--
ALTER TABLE `comment_18`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_19`
--
ALTER TABLE `comment_19`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_20`
--
ALTER TABLE `comment_20`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_21`
--
ALTER TABLE `comment_21`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_22`
--
ALTER TABLE `comment_22`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_23`
--
ALTER TABLE `comment_23`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_24`
--
ALTER TABLE `comment_24`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_25`
--
ALTER TABLE `comment_25`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_26`
--
ALTER TABLE `comment_26`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_27`
--
ALTER TABLE `comment_27`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_28`
--
ALTER TABLE `comment_28`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_29`
--
ALTER TABLE `comment_29`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_30`
--
ALTER TABLE `comment_30`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_31`
--
ALTER TABLE `comment_31`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_32`
--
ALTER TABLE `comment_32`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_33`
--
ALTER TABLE `comment_33`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_34`
--
ALTER TABLE `comment_34`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_35`
--
ALTER TABLE `comment_35`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_36`
--
ALTER TABLE `comment_36`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_37`
--
ALTER TABLE `comment_37`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_38`
--
ALTER TABLE `comment_38`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_39`
--
ALTER TABLE `comment_39`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_40`
--
ALTER TABLE `comment_40`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_41`
--
ALTER TABLE `comment_41`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_42`
--
ALTER TABLE `comment_42`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_43`
--
ALTER TABLE `comment_43`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_44`
--
ALTER TABLE `comment_44`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_45`
--
ALTER TABLE `comment_45`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_46`
--
ALTER TABLE `comment_46`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_47`
--
ALTER TABLE `comment_47`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_48`
--
ALTER TABLE `comment_48`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_49`
--
ALTER TABLE `comment_49`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_50`
--
ALTER TABLE `comment_50`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_51`
--
ALTER TABLE `comment_51`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_52`
--
ALTER TABLE `comment_52`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_53`
--
ALTER TABLE `comment_53`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_54`
--
ALTER TABLE `comment_54`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_55`
--
ALTER TABLE `comment_55`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_56`
--
ALTER TABLE `comment_56`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_57`
--
ALTER TABLE `comment_57`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_58`
--
ALTER TABLE `comment_58`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_59`
--
ALTER TABLE `comment_59`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_60`
--
ALTER TABLE `comment_60`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_61`
--
ALTER TABLE `comment_61`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_62`
--
ALTER TABLE `comment_62`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_63`
--
ALTER TABLE `comment_63`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_64`
--
ALTER TABLE `comment_64`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_65`
--
ALTER TABLE `comment_65`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_66`
--
ALTER TABLE `comment_66`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_67`
--
ALTER TABLE `comment_67`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_68`
--
ALTER TABLE `comment_68`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_69`
--
ALTER TABLE `comment_69`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_70`
--
ALTER TABLE `comment_70`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_71`
--
ALTER TABLE `comment_71`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_72`
--
ALTER TABLE `comment_72`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_73`
--
ALTER TABLE `comment_73`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_74`
--
ALTER TABLE `comment_74`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_75`
--
ALTER TABLE `comment_75`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_76`
--
ALTER TABLE `comment_76`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_77`
--
ALTER TABLE `comment_77`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_78`
--
ALTER TABLE `comment_78`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_79`
--
ALTER TABLE `comment_79`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_80`
--
ALTER TABLE `comment_80`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_81`
--
ALTER TABLE `comment_81`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_82`
--
ALTER TABLE `comment_82`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_83`
--
ALTER TABLE `comment_83`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_84`
--
ALTER TABLE `comment_84`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_85`
--
ALTER TABLE `comment_85`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_86`
--
ALTER TABLE `comment_86`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_87`
--
ALTER TABLE `comment_87`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_88`
--
ALTER TABLE `comment_88`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_89`
--
ALTER TABLE `comment_89`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_90`
--
ALTER TABLE `comment_90`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_91`
--
ALTER TABLE `comment_91`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_92`
--
ALTER TABLE `comment_92`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_93`
--
ALTER TABLE `comment_93`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_94`
--
ALTER TABLE `comment_94`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_95`
--
ALTER TABLE `comment_95`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_96`
--
ALTER TABLE `comment_96`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_97`
--
ALTER TABLE `comment_97`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_98`
--
ALTER TABLE `comment_98`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_99`
--
ALTER TABLE `comment_99`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person_avatar`
--
ALTER TABLE `person_avatar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `person_identity`
--
ALTER TABLE `person_identity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sort_id` (`sort_id`),
  ADD KEY `tag_type_id` (`tag_type_id`);

--
-- Indexes for table `tag_type`
--
ALTER TABLE `tag_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sort_id` (`sort_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_tag_relation`
--
ALTER TABLE `article_tag_relation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_00`
--
ALTER TABLE `comment_00`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_01`
--
ALTER TABLE `comment_01`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_02`
--
ALTER TABLE `comment_02`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_03`
--
ALTER TABLE `comment_03`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_04`
--
ALTER TABLE `comment_04`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_05`
--
ALTER TABLE `comment_05`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_06`
--
ALTER TABLE `comment_06`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_07`
--
ALTER TABLE `comment_07`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_08`
--
ALTER TABLE `comment_08`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_09`
--
ALTER TABLE `comment_09`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_10`
--
ALTER TABLE `comment_10`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_11`
--
ALTER TABLE `comment_11`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_12`
--
ALTER TABLE `comment_12`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_13`
--
ALTER TABLE `comment_13`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_14`
--
ALTER TABLE `comment_14`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_15`
--
ALTER TABLE `comment_15`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_16`
--
ALTER TABLE `comment_16`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_17`
--
ALTER TABLE `comment_17`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_18`
--
ALTER TABLE `comment_18`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_19`
--
ALTER TABLE `comment_19`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_20`
--
ALTER TABLE `comment_20`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_21`
--
ALTER TABLE `comment_21`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_22`
--
ALTER TABLE `comment_22`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_23`
--
ALTER TABLE `comment_23`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_24`
--
ALTER TABLE `comment_24`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_25`
--
ALTER TABLE `comment_25`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_26`
--
ALTER TABLE `comment_26`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_27`
--
ALTER TABLE `comment_27`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_28`
--
ALTER TABLE `comment_28`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_29`
--
ALTER TABLE `comment_29`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_30`
--
ALTER TABLE `comment_30`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_31`
--
ALTER TABLE `comment_31`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_32`
--
ALTER TABLE `comment_32`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_33`
--
ALTER TABLE `comment_33`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_34`
--
ALTER TABLE `comment_34`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_35`
--
ALTER TABLE `comment_35`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_36`
--
ALTER TABLE `comment_36`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_37`
--
ALTER TABLE `comment_37`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_38`
--
ALTER TABLE `comment_38`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_39`
--
ALTER TABLE `comment_39`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_40`
--
ALTER TABLE `comment_40`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_41`
--
ALTER TABLE `comment_41`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_42`
--
ALTER TABLE `comment_42`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_43`
--
ALTER TABLE `comment_43`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_44`
--
ALTER TABLE `comment_44`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_45`
--
ALTER TABLE `comment_45`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_46`
--
ALTER TABLE `comment_46`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_47`
--
ALTER TABLE `comment_47`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_48`
--
ALTER TABLE `comment_48`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_49`
--
ALTER TABLE `comment_49`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_50`
--
ALTER TABLE `comment_50`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_51`
--
ALTER TABLE `comment_51`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_52`
--
ALTER TABLE `comment_52`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_53`
--
ALTER TABLE `comment_53`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_54`
--
ALTER TABLE `comment_54`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_55`
--
ALTER TABLE `comment_55`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_56`
--
ALTER TABLE `comment_56`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_57`
--
ALTER TABLE `comment_57`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_58`
--
ALTER TABLE `comment_58`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_59`
--
ALTER TABLE `comment_59`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_60`
--
ALTER TABLE `comment_60`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_61`
--
ALTER TABLE `comment_61`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_62`
--
ALTER TABLE `comment_62`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_63`
--
ALTER TABLE `comment_63`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_64`
--
ALTER TABLE `comment_64`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_65`
--
ALTER TABLE `comment_65`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_66`
--
ALTER TABLE `comment_66`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_67`
--
ALTER TABLE `comment_67`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_68`
--
ALTER TABLE `comment_68`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_69`
--
ALTER TABLE `comment_69`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_70`
--
ALTER TABLE `comment_70`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_71`
--
ALTER TABLE `comment_71`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_72`
--
ALTER TABLE `comment_72`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_73`
--
ALTER TABLE `comment_73`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_74`
--
ALTER TABLE `comment_74`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_75`
--
ALTER TABLE `comment_75`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_76`
--
ALTER TABLE `comment_76`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_77`
--
ALTER TABLE `comment_77`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_78`
--
ALTER TABLE `comment_78`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_79`
--
ALTER TABLE `comment_79`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_80`
--
ALTER TABLE `comment_80`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_81`
--
ALTER TABLE `comment_81`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_82`
--
ALTER TABLE `comment_82`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_83`
--
ALTER TABLE `comment_83`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_84`
--
ALTER TABLE `comment_84`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_85`
--
ALTER TABLE `comment_85`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_86`
--
ALTER TABLE `comment_86`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_87`
--
ALTER TABLE `comment_87`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_88`
--
ALTER TABLE `comment_88`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_89`
--
ALTER TABLE `comment_89`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_90`
--
ALTER TABLE `comment_90`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_91`
--
ALTER TABLE `comment_91`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_92`
--
ALTER TABLE `comment_92`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_93`
--
ALTER TABLE `comment_93`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_94`
--
ALTER TABLE `comment_94`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_95`
--
ALTER TABLE `comment_95`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_96`
--
ALTER TABLE `comment_96`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_97`
--
ALTER TABLE `comment_97`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_98`
--
ALTER TABLE `comment_98`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_99`
--
ALTER TABLE `comment_99`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `person_avatar`
--
ALTER TABLE `person_avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `person_identity`
--
ALTER TABLE `person_identity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `tag_type`
--
ALTER TABLE `tag_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
