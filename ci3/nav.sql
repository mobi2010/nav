-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-03-07 18:02:35
-- 服务器版本： 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

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
  `category_id` int(11) NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_0`
--

CREATE TABLE `article_content_0` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_1`
--

CREATE TABLE `article_content_1` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_2`
--

CREATE TABLE `article_content_2` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_3`
--

CREATE TABLE `article_content_3` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_4`
--

CREATE TABLE `article_content_4` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_5`
--

CREATE TABLE `article_content_5` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_6`
--

CREATE TABLE `article_content_6` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_7`
--

CREATE TABLE `article_content_7` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_8`
--

CREATE TABLE `article_content_8` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article_content_9`
--

CREATE TABLE `article_content_9` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL,
  `content` text NOT NULL
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
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sort_id` tinyint(4) NOT NULL
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
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8 INSERT_METHOD=LAST UNION=(`comment_0`,`comment_1`,`comment_2`,`comment_3`,`comment_4`,`comment_5`,`comment_6`,`comment_7`,`comment_8`,`comment_9`);

-- --------------------------------------------------------

--
-- 表的结构 `comment_0`
--

CREATE TABLE `comment_0` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_1`
--

CREATE TABLE `comment_1` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_2`
--

CREATE TABLE `comment_2` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_3`
--

CREATE TABLE `comment_3` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_4`
--

CREATE TABLE `comment_4` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_5`
--

CREATE TABLE `comment_5` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_6`
--

CREATE TABLE `comment_6` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_7`
--

CREATE TABLE `comment_7` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_8`
--

CREATE TABLE `comment_8` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment_9`
--

CREATE TABLE `comment_9` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `content` varchar(200) NOT NULL,
  `reply_content` varchar(200) NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `person_avatar`
--

CREATE TABLE `person_avatar` (
  `id` int(11) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `person_identity`
--

CREATE TABLE `person_identity` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
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
-- Indexes for table `article_content_0`
--
ALTER TABLE `article_content_0`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_content_1`
--
ALTER TABLE `article_content_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_content_2`
--
ALTER TABLE `article_content_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_content_3`
--
ALTER TABLE `article_content_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_content_4`
--
ALTER TABLE `article_content_4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_content_5`
--
ALTER TABLE `article_content_5`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_content_6`
--
ALTER TABLE `article_content_6`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_content_7`
--
ALTER TABLE `article_content_7`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_content_8`
--
ALTER TABLE `article_content_8`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_content_9`
--
ALTER TABLE `article_content_9`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `article_tag_relation`
--
ALTER TABLE `article_tag_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sort_id` (`sort_id`);

--
-- Indexes for table `comment_0`
--
ALTER TABLE `comment_0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_1`
--
ALTER TABLE `comment_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_2`
--
ALTER TABLE `comment_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_3`
--
ALTER TABLE `comment_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_4`
--
ALTER TABLE `comment_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_5`
--
ALTER TABLE `comment_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_6`
--
ALTER TABLE `comment_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_7`
--
ALTER TABLE `comment_7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_8`
--
ALTER TABLE `comment_8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_9`
--
ALTER TABLE `comment_9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
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
  ADD UNIQUE KEY `name` (`name`),
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
-- 使用表AUTO_INCREMENT `article_content_0`
--
ALTER TABLE `article_content_0`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_content_1`
--
ALTER TABLE `article_content_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_content_2`
--
ALTER TABLE `article_content_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_content_3`
--
ALTER TABLE `article_content_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_content_4`
--
ALTER TABLE `article_content_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_content_5`
--
ALTER TABLE `article_content_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_content_6`
--
ALTER TABLE `article_content_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_content_7`
--
ALTER TABLE `article_content_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_content_8`
--
ALTER TABLE `article_content_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_content_9`
--
ALTER TABLE `article_content_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `article_tag_relation`
--
ALTER TABLE `article_tag_relation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_0`
--
ALTER TABLE `comment_0`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_1`
--
ALTER TABLE `comment_1`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_2`
--
ALTER TABLE `comment_2`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_3`
--
ALTER TABLE `comment_3`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_4`
--
ALTER TABLE `comment_4`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_5`
--
ALTER TABLE `comment_5`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_6`
--
ALTER TABLE `comment_6`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_7`
--
ALTER TABLE `comment_7`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_8`
--
ALTER TABLE `comment_8`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `comment_9`
--
ALTER TABLE `comment_9`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `feedback`
--
ALTER TABLE `feedback`
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
