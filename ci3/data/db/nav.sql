-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-03-27 19:29:35
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `content` text NOT NULL,
  `video_url` varchar(200) NOT NULL
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
  `nickname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '0secret1male2female',
  `status` tinyint(4) NOT NULL COMMENT '0active1inactive',
  `update_time` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL,
  `source` tinyint(4) NOT NULL COMMENT '0正常，1本站'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_0`
--

CREATE TABLE `member_content_0` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_1`
--

CREATE TABLE `member_content_1` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_2`
--

CREATE TABLE `member_content_2` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_3`
--

CREATE TABLE `member_content_3` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_4`
--

CREATE TABLE `member_content_4` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_5`
--

CREATE TABLE `member_content_5` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_6`
--

CREATE TABLE `member_content_6` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_7`
--

CREATE TABLE `member_content_7` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_8`
--

CREATE TABLE `member_content_8` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_content_9`
--

CREATE TABLE `member_content_9` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `avatar_url` varchar(100) NOT NULL,
  `biography` varchar(200) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `member_relation`
--

CREATE TABLE `member_relation` (
  `id` bigint(20) NOT NULL,
  `own_id` int(11) NOT NULL,
  `other_id` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `nav`
--

CREATE TABLE `nav` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uri` varchar(100) NOT NULL,
  `sort_id` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `nav_category_id` tinyint(4) NOT NULL,
  `type` varchar(20) NOT NULL,
  `update_time` int(11) NOT NULL,
  `insert_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `nav`
--

INSERT INTO `nav` (`id`, `name`, `uri`, `sort_id`, `hits`, `nav_category_id`, `type`, `update_time`, `insert_time`) VALUES
(1, 'Json Format', 'site/tools/index', 0, 0, 1, 'jf', 1521926311, 1521926311),
(2, 'Base64 Encode', 'site/tools/index', 0, 0, 1, 'be', 1521926311, 1521926311),
(3, 'Base64 Decode', 'site/tools/index', 0, 0, 1, 'bd', 1521926311, 1521926311),
(4, 'GBK => UTF-8', 'site/tools/index', 0, 0, 1, 'gb2u', 1521926311, 1521926311),
(5, 'UTF-8 => GBK', 'site/tools/index', 0, 0, 1, 'u2gb', 1521926311, 1521926311),
(6, 'Unix => Date', 'site/tools/index', 0, 0, 1, 'u2d', 1521926311, 1521926311),
(7, 'Date => Unix', 'site/tools/index', 0, 0, 1, 'd2u', 1521926311, 1521926311),
(8, 'Md5', 'site/tools/index', 0, 0, 1, 'md5', 1521926311, 1521926311),
(9, 'Sha1', 'site/tools/index', 0, 0, 1, 'sha1', 1521926311, 1521926311),
(10, 'Url Encode', 'site/tools/index', 0, 0, 1, 'ue', 1521926311, 1521926311),
(11, 'Url Decode', 'site/tools/index', 0, 0, 1, 'ud', 1521926311, 1521926311),
(12, 'ASCII => Unicode', 'site/tools/index', 0, 0, 1, 'au', 1521926311, 1521926311),
(13, 'Unicode => ASCII', 'site/tools/index', 0, 0, 1, 'ua', 1521926311, 1521926311),
(14, 'Unicode => CN', 'site/tools/index', 0, 0, 1, 'uc', 1521926311, 1521926311),
(15, 'CN => Unicode', 'site/tools/index', 0, 0, 1, 'cu', 1521926311, 1521926311),
(16, '微博视频解析', 'site/tools/video', 0, 0, 2, 'weibo', 1521926311, 1521926311),
(17, '秒拍视频解析', 'site/tools/video', 0, 0, 2, 'miaopai', 1521926311, 1521926311),
(18, 'Facebook视频解析', 'site/tools/video', 0, 0, 2, 'facebook', 1521926311, 1521926311),
(19, 'Youtube视频解析', 'site/tools/video', 0, 0, 2, 'youtube', 1521926311, 1521926311),
(20, 'Tumblr', 'https://www.tumblr.com/', 0, 0, 3, '', 1521926311, 1521926311),
(21, 'Facebook', 'https://www.facebook.com/', 0, 0, 3, '', 1521926311, 1521926311),
(22, 'Twitter', 'https://twitter.com', 0, 0, 3, '', 1521926311, 1521926311),
(23, '新浪微博', 'https://weibo.com/', 0, 0, 3, '', 1521926311, 1521926311),
(24, '纯情少妇', 'http://www.sina-baidu.com/', 0, 0, 4, '', 1521926352, 1521926352),
(25, '巨乳王瑞儿', 'http://dh.dilifuli.net/', 0, 0, 4, '', 1521926352, 1521926352),
(26, '午夜AV', 'http://www.ak123.me/', 0, 0, 4, '', 1521926352, 1521926352),
(27, '野狼高清', 'http://ttav188.com/portal.php?lan', 0, 0, 4, '', 1521926352, 1521926352),
(28, '网红自拍', 'http://ttav188.com/portal.php?lan', 0, 0, 4, '', 1521926352, 1521926352),
(29, '驭女轩自拍', 'http://www.ynx.la/forum.php?lan', 0, 0, 7, '', 1521926352, 1521926352),
(30, '超多福利', 'https://www.chaoduofuli.com/portal.php?mod=index?lan', 0, 0, 4, '', 1521926352, 1521926352),
(31, '日本福利', 'http://www.ribenfuli.club/forum.php?lan', 0, 0, 4, '', 1521926352, 1521926352),
(32, 'AV字幕在线', 'http://www.123zmw.com/?lan', 0, 0, 6, '', 1521926352, 1521926352),
(33, '操B啦', 'http://www.38av.xyz/?lan', 0, 0, 4, '', 1521926352, 1521926352),
(34, '大JB操', 'http://www.djb777.com/?lan', 0, 0, 6, '', 1521926352, 1521926352),
(35, '爱趣福利', 'http://www.aiqufuli.net/?lan', 0, 0, 4, '', 1521926352, 1521926352),
(36, '老BB福利', 'http://seyiwu.com/?lan', 0, 0, 4, '', 1521926352, 1521926352),
(37, '看片福利吧', 'http://zaixianfl.com/?lan', 0, 0, 6, '', 1521926352, 1521926352),
(38, '8X影库', 'https://8xat.com/?lan', 0, 0, 4, '', 1521926352, 1521926352),
(39, '91日B', 'http://www.91ribiw.site/portal.php?mod=index?lan', 0, 0, 4, '', 1521926352, 1521926352),
(40, '李小璐视频', 'http://www.av997.info/?lan', 0, 0, 4, '', 1521926352, 1521926352),
(41, '冷傲美女', 'http://a.119links.in/click.php?fromid=22', 0, 0, 4, '', 1521926352, 1521926352),
(42, '辣妹直播', 'http://mm780.com/?lan', 0, 0, 4, '', 1521926352, 1521926352),
(43, 'Her看片网', 'http://t.cn/RYu6ChY', 0, 0, 4, '', 1521926352, 1521926352),
(44, '大西瓜Porn', 'http://www.sina-baidu.com/', 0, 0, 5, '', 1521926352, 1521926352),
(45, '69堂', 'http://www.69tang6.com/?lan', 0, 0, 6, '', 1521926352, 1521926352),
(46, '69社区', 'http://69tang.org/?lan', 0, 0, 5, '', 1521926352, 1521926352),
(47, '精品自拍视频', 'https://www.znflbbs.com/portal.php?lan', 0, 0, 5, '', 1521926352, 1521926352),
(48, '品香AV', 'http://www.pianxiangav1.com/?lan', 0, 0, 5, '', 1521926352, 1521926352),
(49, '凤来楼', 'http://flldizhi.com/?lan', 0, 0, 5, '', 1521926352, 1521926352),
(50, '操B在线', 'http://www.jibagao.com/?lan', 0, 0, 5, '', 1521926352, 1521926352),
(51, '原创夫妻自拍', 'http://365.sese365.cc/?lan', 0, 0, 5, '', 1521926352, 1521926352),
(52, '夫妻交友啪啪', 'http://www.xffuqi.com/?lan', 0, 0, 5, '', 1521926352, 1521926352),
(53, '午夜优质福利', 'https://www.wuyeziyuan.com/forum.php?lan', 0, 0, 5, '', 1521926352, 1521926352),
(54, '爱爱福利', 'http://www.aibifuli.info/?lan', 0, 0, 5, '', 1521926352, 1521926352),
(55, '草榴社区', 'https://cl.dety.men/index.php?u=296710&ext=96e5d', 0, 0, 5, '', 1521926352, 1521926352),
(56, '大波妹', 'http://www.dbmbbs.com/', 0, 0, 9, '', 1521926352, 1521926352),
(57, '国外视频聊天', 'http://video-girlz.com/', 0, 0, 5, '', 1521926352, 1521926352),
(58, '小妹福利社区', 'https://www.7afuli.com/portal.php?lan', 0, 0, 5, '', 1521926352, 1521926352),
(59, '精品啪啪资源', 'http://www.ppzy8.com/?lan', 0, 0, 5, '', 1521926352, 1521926352),
(60, '淘妹铺', 'http://taompu5.com/forum.php?fromuid=31169', 0, 0, 5, '', 1521926352, 1521926352),
(61, '本站地址', 'https://www.ebay.com/usr/landaohang', 0, 0, 5, '', 1521926352, 1521926352),
(62, '找AV导航', 'http://www.zhaoav.link/', 0, 0, 8, '', 1521926352, 1521926352),
(63, '1024社区', 'https://www.600vod.com/?lan', 0, 0, 5, '', 1521926352, 1521926352),
(64, '今日AV', 'http://javb.fun/?f=landizhi', 0, 0, 6, '', 1521926352, 1521926352),
(65, '蝌蚪窝', 'http://sexx109.com/', 0, 0, 6, '', 1521926352, 1521926352),
(66, '樱桃视频', 'http://email.yingtaodizhi.at.gmx.com.ytt0.space/', 0, 0, 6, '', 1521926352, 1521926352),
(67, '老司机视频', 'https://post.7yinyue.pw/', 0, 0, 6, '', 1521926352, 1521926352),
(68, '青娱乐视频', 'http://www.qyl50.com/', 0, 0, 6, '', 1521926352, 1521926352),
(69, '小妍看片', 'http://xiaoyankanpian.info/', 0, 0, 6, '', 1521926352, 1521926352),
(70, '81精品', 'https://81porn.ml/', 0, 0, 6, '', 1521926352, 1521926352),
(71, '妹妹撸', 'http://gglu.me/', 0, 0, 6, '', 1521926352, 1521926352),
(72, 'AV看看', 'http://www.avkkw.com/', 0, 0, 6, '', 1521926352, 1521926352),
(73, 'ALI碰视频', 'http://www.3658276.club/', 0, 0, 6, '', 1521926352, 1521926352),
(74, 'piao客分享', 'http://www.aaa886.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(75, '伊人影院', 'http://www.ramicball.net/', 0, 0, 6, '', 1521926352, 1521926352),
(76, 'E影城视', 'http://www.eyinchengshi.info/', 0, 0, 6, '', 1521926352, 1521926352),
(77, '爱上天堂', 'http://www.ttaavv.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(78, '宝宝色色网', 'http://www.bbss.pw/', 0, 0, 6, '', 1521926352, 1521926352),
(79, 'cbicbi', 'http://www.cbicbi.info/', 0, 0, 6, '', 1521926352, 1521926352),
(80, '日BB小姨子', 'http://www.ribb.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(81, '在线看片', 'http://kanhp.com/', 0, 0, 6, '', 1521926352, 1521926352),
(82, '狠狠撸在线', 'http://www.hjj191.com/', 0, 0, 6, '', 1521926352, 1521926352),
(83, '97超碰', 'http://www.48dv.com/', 0, 0, 6, '', 1521926352, 1521926352),
(84, '91夫妻自拍', 'http://www.91sp3.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(85, '国产自拍', 'http://www.gczp.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(86, '91你', 'http://91n.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(87, '超碰在线', 'http://www.yrdxj.com/', 0, 0, 6, '', 1521926352, 1521926352),
(88, 'caoliu视频', 'http://www.fuulii.net/', 0, 0, 6, '', 1521926352, 1521926352),
(89, '骑虎精品', 'https://www.8qihu.com/', 0, 0, 6, '', 1521926352, 1521926352),
(90, '久久爱', 'http://jjai1.info/', 0, 0, 6, '', 1521926352, 1521926352),
(91, '男人天堂网', 'http://226688.life/', 0, 0, 6, '', 1521926352, 1521926352),
(92, 'luoli诱惑', 'http://www.520pp.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(93, '污妹妹在线', 'http://www.91wuma.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(94, 'EWQ视讯', 'https://ewq.tv/', 0, 0, 6, '', 1521926352, 1521926352),
(95, '小黄人', 'http://www.xiaohr.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(96, 'AV屋', 'http://www.av720p2.club/', 0, 0, 6, '', 1521926352, 1521926352),
(97, '花丛间', 'http://huacongjian3.com/', 0, 0, 6, '', 1521926352, 1521926352),
(98, '爱看撸撸', 'http://www.aklulu.cn/', 0, 0, 6, '', 1521926352, 1521926352),
(99, '国产在线', 'http://88caocao.info/', 0, 0, 6, '', 1521926352, 1521926352),
(100, '七妹在线', 'http://www.dxj898.com/', 0, 0, 6, '', 1521926352, 1521926352),
(101, '69FAP', 'http://69fap.info/', 0, 0, 6, '', 1521926352, 1521926352),
(102, '完整视频', 'http://xfull.info/', 0, 0, 6, '', 1521926352, 1521926352),
(103, '狠狠撸影院', 'http://hhlyy3.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(104, '在线电影', 'http://www.6688se.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(105, 'AVTV', 'http://avtv003.pw/', 0, 0, 6, '', 1521926352, 1521926352),
(106, 'mmAV', 'http://www.mmav.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(107, '99视频', 'http://www.p99e.com/', 0, 0, 6, '', 1521926352, 1521926352),
(108, '夜上海', 'http://www.yeshanghai1.info/', 0, 0, 6, '', 1521926352, 1521926352),
(109, '69吱吱', 'http://www.69zz.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(110, '色和尚在线', 'http://www.kkkkmmmm.com/', 0, 0, 6, '', 1521926352, 1521926352),
(111, '夜来香', 'http://www.ylx1.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(112, '百草视频', 'http://www.100cao.me/', 0, 0, 6, '', 1521926352, 1521926352),
(113, '離離原上草', 'http://www.llysc.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(114, '佳影库', 'http://jiayingku.info/', 0, 0, 6, '', 1521926352, 1521926352),
(115, '可乐视频', 'https://map.map-av1024.info/', 0, 0, 6, '', 1521926352, 1521926352),
(116, '奶茶视频', 'http://www.naicha201.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(117, '大香蕉AV', 'http://www.aa99v.com/', 0, 0, 6, '', 1521926352, 1521926352),
(118, '熟女热', 'http://www.shunvre.ga/', 0, 0, 6, '', 1521926352, 1521926352),
(119, '久草视频', 'http://www.jiucao.org/', 0, 0, 6, '', 1521926352, 1521926352),
(120, '久草在线撸', 'http://www.dxj658.com/', 0, 0, 6, '', 1521926352, 1521926352),
(121, '雨后小故事', 'http://www.yhxgs.top/', 0, 0, 6, '', 1521926352, 1521926352),
(122, '擎天柱', 'http://qingtz.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(123, '艹彩色丝袜', 'http://ccssw3.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(124, '骑马视频', 'http://www.qimasp1.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(125, '农民看片', 'http://www.nmav3.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(126, 'AVTOP', 'http://www.avtop.top/', 0, 0, 6, '', 1521926352, 1521926352),
(127, '扒酷虎精品', 'https://www.8kuhu.com/', 0, 0, 6, '', 1521926352, 1521926352),
(128, '大香蕉伊人', 'http://www.dxjyrw.com/', 0, 0, 6, '', 1521926352, 1521926352),
(129, '久久热视频', 'http://www.jiujiureship8.com/', 0, 0, 6, '', 1521926352, 1521926352),
(130, '夜间飞行', 'http://www.yjav.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(131, '大鸟云', 'http://www.999av.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(132, '百度AV', 'http://www.a6q8.com/', 0, 0, 6, '', 1521926352, 1521926352),
(133, '高清资源', 'http://www.jav300.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(134, '东京无码', 'http://www.gaogao360.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(135, '无码中文', 'http://www.aaa999.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(136, 'TOKYO无码', 'http://www.papa99.club/', 0, 0, 6, '', 1521926352, 1521926352),
(137, '伊人在线', 'http://yrzx1.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(138, '小美眉', 'http://xiaomm3.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(139, '伊人情网', 'http://22331415.com/', 0, 0, 6, '', 1521926352, 1521926352),
(140, '啪啪啪AV網', 'http://pa.1jpav.com/', 0, 0, 6, '', 1521926352, 1521926352),
(141, '新农夫在线', 'http://www.xnf002.me/', 0, 0, 6, '', 1521926352, 1521926352),
(142, '干干干', 'http://gggzx.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(143, '官人我要', 'http://www.grwy3.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(144, '好AV吧', 'http://www.caoba123.com/', 0, 0, 6, '', 1521926352, 1521926352),
(145, '女王', 'http://nwz2.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(146, '灰灰视频', 'http://hh991.club/', 0, 0, 6, '', 1521926352, 1521926352),
(147, '操吧视频', 'http://www.caoba360.com/', 0, 0, 6, '', 1521926352, 1521926352),
(148, 'nsxs', 'http://www.nsxs.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(149, '哥哥欢在线', 'http://www.gegehuan.ga/', 0, 0, 6, '', 1521926352, 1521926352),
(150, '狐狸视频', 'http://www.hulisp.cn/', 0, 0, 6, '', 1521926352, 1521926352),
(151, '95自拍视频', 'http://95big.pw/', 0, 0, 6, '', 1521926352, 1521926352),
(152, '轻草视频', 'http://email.qingcaodizhi.at.gmail.com.q2c.space/', 0, 0, 6, '', 1521926352, 1521926352),
(153, '绿茶视频', 'http://email.lvchadz.at.gmx.com.6tea.space/', 0, 0, 6, '', 1521926352, 1521926352),
(154, '红杏视频', 'http://email.hongxingdizhi.at.gmail.com.redial.club/', 0, 0, 6, '', 1521926352, 1521926352),
(155, 'V2视频', 'http://email.v2dizhi.at.gmail.com.2via.space/', 0, 0, 6, '', 1521926352, 1521926352),
(156, 'D8视频', 'http://email.d8dizhi.at.gmail.com.dd91.space/', 0, 0, 6, '', 1521926352, 1521926352),
(157, '奇色视频', 'http://email.qisededizhi.at.gmail.com.qs9.space/', 0, 0, 6, '', 1521926352, 1521926352),
(158, '本色视频', 'http://email.bensededizhi.at.gmail.com.ben3.space/', 0, 0, 6, '', 1521926352, 1521926352),
(159, '春色视频', 'http://email.chunsedizhi.at.gmail.com.csister.space/', 0, 0, 6, '', 1521926352, 1521926352),
(160, '火兔视频', 'http://email.dizhi.at.f2.com.fin2.space/', 0, 0, 6, '', 1521926352, 1521926352),
(161, 'LOL幸福', 'http://www.lolxf.xyz/', 0, 0, 6, '', 1521926352, 1521926352),
(162, '在线福利', 'http://www.hctv666.com/?lan', 0, 0, 6, '', 1521926352, 1521926352),
(163, '5X社区', 'http://www.5xzz2.com/', 0, 0, 6, '', 1521926352, 1521926352),
(164, '草帽AV', 'https://c0033.win/', 0, 0, 6, '', 1521926352, 1521926352),
(165, 'Sex169影城', 'http://ig32.com/', 0, 0, 6, '', 1521926352, 1521926352),
(166, '18AV', 'http://kk2412.men/', 0, 0, 6, '', 1521926352, 1521926352),
(167, '7M视频', 'http://www.7mav2.com/', 0, 0, 6, '', 1521926352, 1521926352),
(168, '91自拍网', 'http://www.91bb91.com/', 0, 0, 6, '', 1521926352, 1521926352),
(169, '久久热', 'http://www.99dd3.com/', 0, 0, 6, '', 1521926352, 1521926352),
(170, 'IAVporn', 'https://www.iavzzz.com/', 0, 0, 6, '', 1521926352, 1521926352),
(171, '85Porn', 'https://www.85porn.com/', 0, 0, 6, '', 1521926352, 1521926352),
(172, 'BuzzAV', 'https://www.buzzav.com/', 0, 0, 6, '', 1521926352, 1521926352),
(173, 'SEKU', 'http://seku.tv/', 0, 0, 6, '', 1521926352, 1521926352),
(174, 'YJizz', 'http://www.yzz4.com/', 0, 0, 6, '', 1521926352, 1521926352),
(175, 'VOD视频', 'http://vod70.com/', 0, 0, 6, '', 1521926352, 1521926352),
(176, '姐姐要爱', 'http://www.zz1356.com/', 0, 0, 6, '', 1521926352, 1521926352),
(177, '爱色阁', 'http://www.ahqzwfw.com/', 0, 0, 6, '', 1521926352, 1521926352),
(178, '大姐姐视频', 'http://www.djjfuli.fun/', 0, 0, 6, '', 1521926352, 1521926352),
(179, '皮皮虾', 'http://www.avppx.com/', 0, 0, 6, '', 1521926352, 1521926352),
(180, '1717', 'http://www.yaoshe6.com/', 0, 0, 6, '', 1521926352, 1521926352),
(181, '27pao', 'http://www.57pcpc.com/', 0, 0, 6, '', 1521926352, 1521926352),
(182, 'CaoPorn', 'https://mv.rifree.com/', 0, 0, 6, '', 1521926352, 1521926352),
(183, 'AV中文', 'http://www.twav18.club/', 0, 0, 6, '', 1521926352, 1521926352),
(184, 'LXXLX', 'http://zhs.lxxlxxx.com/', 0, 0, 6, '', 1521926352, 1521926352),
(185, 'TubeCup', 'https://cn.txxx.com/', 0, 0, 6, '', 1521926352, 1521926352),
(186, '爱看视频', 'http://www.kankan333.com/', 0, 0, 6, '', 1521926352, 1521926352),
(187, '废柴视频网', 'http://fcw45.com/', 0, 0, 6, '', 1521926352, 1521926352),
(188, 'AV淘宝', 'http://www.222avtb.com/', 0, 0, 6, '', 1521926352, 1521926352),
(189, '91Porn', 'http://91.91p29.space/', 0, 0, 6, '', 1521926352, 1521926352),
(190, '好莱污论坛', 'http://www.hlwbbs66.com/', 0, 0, 7, '', 1521926352, 1521926352),
(191, '福利社区', 'http://fl477.com/', 0, 0, 7, '', 1521926352, 1521926352),
(192, '性吧春暖花开', 'http://sewxgirl.net/1096417', 0, 0, 7, '', 1521926352, 1521926352),
(193, '色中色', 'http://sendmyurl.com/', 0, 0, 7, '', 1521926352, 1521926352),
(194, '第一会所', 'http://162.252.9.15/forum/?fromuid=11991220', 0, 0, 7, '', 1521926352, 1521926352),
(195, 'Xiao77', 'http://x77925.net/bbs/', 0, 0, 7, '', 1521926352, 1521926352),
(196, '爱城', 'https://aisex.dasemm.com/bt/?u=701541', 0, 0, 7, '', 1521926352, 1521926352),
(197, '52尤物', 'http://www.52youwu.info/', 0, 0, 7, '', 1521926352, 1521926352),
(198, '奇色社区', 'http://qssq2.xyz/', 0, 0, 7, '', 1521926352, 1521926352),
(199, '花雨伞', 'http://jj3j.info/link', 0, 0, 7, '', 1521926352, 1521926352),
(200, '蜜蜂社区', 'http://sexbee4.xyz/', 0, 0, 7, '', 1521926352, 1521926352),
(201, '18p2p', 'http://14.102.250.19/forum/', 0, 0, 7, '', 1521926352, 1521926352),
(202, 'New-3Lunch', 'https://www.new-3lunch.net/?fromuid=441850', 0, 0, 7, '', 1521926352, 1521926352),
(203, 'WK綜合論壇', 'http://jkforum.org/?fromuid=376863', 0, 0, 7, '', 1521926352, 1521926352),
(204, '公仔箱論壇', 'https://www.tvboxnow.com/index.php', 0, 0, 7, '', 1521926352, 1521926352),
(205, '無限討論區', 'https://fastzone.org/?fromuid=99373', 0, 0, 7, '', 1521926352, 1521926352),
(206, '捷克論壇', 'https://www.jkforum.net/?fromuid=2571826', 0, 0, 7, '', 1521926352, 1521926352),
(207, '爱碧论坛', 'http://173.192.147.23/?fromuid=1209073', 0, 0, 7, '', 1521926352, 1521926352),
(208, '玛雅网', 'http://www.cccmaya.com/index.php', 0, 0, 7, '', 1521926352, 1521926352),
(209, '1024核工厂', 'http://y3.1024yxy.club/pw/', 0, 0, 7, '', 1521926352, 1521926352),
(210, 'XIAAV论坛', 'http://2018x.win/thread-349533-1-1.html?x=1736677', 0, 0, 7, '', 1521926352, 1521926352),
(211, '桃隐社区', 'http://user.taoy11.info/?fromuid=153059', 0, 0, 7, '', 1521926352, 1521926352),
(212, '椰族部落', 'http://yezucao.top/?454135', 0, 0, 7, '', 1521926352, 1521926352),
(213, 'AV狼', 'http://av.avlang19.info/index.php?a=3886', 0, 0, 7, '', 1521926352, 1521926352),
(214, '杜尚论坛', 'http://www.ds88.ml/', 0, 0, 7, '', 1521926352, 1521926352),
(215, '摩天轮社区', 'http://mtl7.xyz/', 0, 0, 7, '', 1521926352, 1521926352),
(216, '黑暗圣殿', 'http://204.152.220.40/index.php?fromuid=282768', 0, 0, 7, '', 1521926352, 1521926352),
(217, '痴汉俱乐部', 'http://www.piring.com/bbs/tcn/?fromuid=2061069', 0, 0, 7, '', 1521926352, 1521926352),
(218, 'MYHD1080', 'http://107.151.184.12/', 0, 0, 7, '', 1521926352, 1521926352),
(219, 'SEX169 論壇', 'http://149.56.45.111/bbs/?fromuid=141932', 0, 0, 7, '', 1521926352, 1521926352),
(220, '咪咪爱', 'http://www.aaamimi.com/', 0, 0, 7, '', 1521926352, 1521926352),
(221, '娜鲁湾论坛', 'http://www.naluone-dc.com/forum/index.php', 0, 0, 7, '', 1521926352, 1521926352),
(222, '迎客堂', 'http://www.ykt2.com/', 0, 0, 7, '', 1521926352, 1521926352),
(223, '魔王の家', 'http://dio7777.net/?fromuid=2077160', 0, 0, 7, '', 1521926352, 1521926352),
(224, '新巴黎中文社区', 'http://204.152.220.32/?fromuid=62536', 0, 0, 7, '', 1521926352, 1521926352),
(225, '男人草吧', 'http://www.nrcb3.com/', 0, 0, 7, '', 1521926352, 1521926352),
(226, '千百撸', 'https://777av.vip/', 0, 0, 7, '', 1521926352, 1521926352),
(227, '千岛酱', 'http://www.zexikj.com/', 0, 0, 7, '', 1521926352, 1521926352),
(228, '帝国AV', 'https://www.470dy.com/', 0, 0, 7, '', 1521926352, 1521926352),
(229, '亚洲在线', 'http://www.shunfengexp.com/', 0, 0, 7, '', 1521926352, 1521926352),
(230, 'CaoAV', 'https://caoav.net/', 0, 0, 7, '', 1521926352, 1521926352),
(231, '屋受論壇', 'https://wuso.me/?fromuid=10995', 0, 0, 7, '', 1521926352, 1521926352),
(232, '有B吗？', 'http://ww.b8bbb.com/?fromuid=65678', 0, 0, 7, '', 1521926352, 1521926352),
(233, '比思论坛', 'http://174.138.175.178/', 0, 0, 7, '', 1521926352, 1521926352),
(234, '色撸堂', 'http://www.selutang05.com/?lan', 0, 0, 7, '', 1521926352, 1521926352),
(235, '月色湾', 'http://yuesewan.co/', 0, 0, 7, '', 1521926352, 1521926352),
(236, '梦幻图码', 'http://mhtm.pw/?fromuid=12530', 0, 0, 7, '', 1521926352, 1521926352),
(237, '9453社區', 'http://9453pp.com/?fromuid=19246', 0, 0, 7, '', 1521926352, 1521926352),
(238, 'AV 天空', 'http://superav.info/', 0, 0, 7, '', 1521926352, 1521926352),
(239, '貳月紅論壇', 'https://wochalei.com/', 0, 0, 7, '', 1521926352, 1521926352),
(240, '三涩论坛', 'http://q2mm.com/', 0, 0, 7, '', 1521926352, 1521926352),
(241, '桃花族', 'http://vipthz.com/?fromuid=70941', 0, 0, 7, '', 1521926352, 1521926352),
(242, '柠檬导航', 'http://thank.gq/', 0, 0, 8, '', 1521926352, 1521926352),
(243, '百性色导航', 'http://baixingse.top/', 0, 0, 8, '', 1521926352, 1521926352),
(244, '500福利导航', 'http://www.500dh.org/', 0, 0, 8, '', 1521926352, 1521926352),
(245, '第一福利导航', 'http://www.ifulione.com/', 0, 0, 8, '', 1521926352, 1521926352),
(246, '4G福利导航', 'http://www.4gfl.com/', 0, 0, 8, '', 1521926352, 1521926352),
(247, '五姑娘导航', 'http://5g.d.h.5gnv.space/', 0, 0, 8, '', 1521926352, 1521926352),
(248, '蓝色导航', 'https://www.bluedh.info/', 0, 0, 8, '', 1521926352, 1521926352),
(249, '大爱导航', 'http://www.daaida.space/', 0, 0, 8, '', 1521926352, 1521926352),
(250, '约炮偷情导航', 'http://yptq.d.h.y9p1.space/', 0, 0, 8, '', 1521926352, 1521926352),
(251, '绿色小导航', 'http://g.e20.ru/', 0, 0, 8, '', 1521926352, 1521926352),
(252, '要啦导航', 'https://1la.co/', 0, 0, 8, '', 1521926352, 1521926352),
(253, '迷妹导航', 'http://www.mimeidh07.club/', 0, 0, 8, '', 1521926352, 1521926352),
(254, '骑士福利导航', 'http://74fuli.info/', 0, 0, 8, '', 1521926352, 1521926352),
(255, '番号库导航', 'http://www.91fhk.com/', 0, 0, 8, '', 1521926352, 1521926352),
(256, '污妹妹导航', 'http://www.wumm.xyz/', 0, 0, 8, '', 1521926352, 1521926352),
(257, '一楼一凤', 'http://1l1f3.xyz/', 0, 0, 8, '', 1521926352, 1521926352),
(258, 'AV导航天下', 'http://www.avtianxia.com/', 0, 0, 8, '', 1521926352, 1521926352),
(259, '金莲福利导航', 'http://www.jinliandh.info/', 0, 0, 8, '', 1521926352, 1521926352),
(260, '金瓶梅导航', 'http://www.jpmdh.info/', 0, 0, 8, '', 1521926352, 1521926352),
(261, 'S站第一导航', 'http://www.1dh.info/', 0, 0, 8, '', 1521926352, 1521926352),
(262, '色妹妹导航', 'http://www.semmdh.com/', 0, 0, 8, '', 1521926352, 1521926352),
(263, '591导航网', 'http://591dhw.com/', 0, 0, 8, '', 1521926352, 1521926352),
(264, '逼格福利导航', 'http://bige.d.h.orbige.space/', 0, 0, 8, '', 1521926352, 1521926352),
(265, '痴汉导航', 'http://chih.space/', 0, 0, 8, '', 1521926352, 1521926352),
(266, '草绿茶导航', 'http://caolvcha.d.h.c77l.space/', 0, 0, 8, '', 1521926352, 1521926352),
(267, '乱啪导航', 'http://luan9.space/', 0, 0, 8, '', 1521926352, 1521926352),
(268, '尼玛导航', 'http://www.nima1b.space/', 0, 0, 8, '', 1521926352, 1521926352),
(269, '找女优导航', 'http://nvyy.space/', 0, 0, 8, '', 1521926352, 1521926352),
(270, '福利导航', 'http://19xa.info/', 0, 0, 8, '', 1521926352, 1521926352),
(271, '福利嫂导航', 'http://www.fulisao.org/', 0, 0, 8, '', 1521926352, 1521926352),
(272, '藏姬阁导航', 'http://www.cjgdh456.com/', 0, 0, 8, '', 1521926352, 1521926352),
(273, '草骆驼导航', 'http://www.icluotuo.org/', 0, 0, 8, '', 1521926352, 1521926352),
(274, '一库福利导航', 'http://www.iyikudh.info/', 0, 0, 8, '', 1521926352, 1521926352),
(275, '夜夜流', 'http://yeyele.xyz/', 0, 0, 8, '', 1521926352, 1521926352),
(276, '夜色导航', 'http://www.yssp365.com/', 0, 0, 8, '', 1521926352, 1521926352),
(277, '小X福利导航', 'https://www.xxfldh.com/', 0, 0, 8, '', 1521926352, 1521926352),
(278, '色姐姐导航', 'http://ssmmlove.info/', 0, 0, 8, '', 1521926352, 1521926352),
(279, '我爱污导航', 'http://www.5iwu.xyz/', 0, 0, 8, '', 1521926352, 1521926352),
(280, '污哥哥导航', 'http://www.wugg.xyz/', 0, 0, 8, '', 1521926352, 1521926352),
(281, '成人色导航', 'http://www.crsedh.com/', 0, 0, 8, '', 1521926352, 1521926352),
(282, '羞射福利导航', 'http://www.xiushe.info/', 0, 0, 8, '', 1521926352, 1521926352),
(283, '哈哈色导航', 'http://www.ihhsedh.com/', 0, 0, 8, '', 1521926352, 1521926352),
(284, '咪咪色导航', 'http://www.mmsedh.xyz/', 0, 0, 8, '', 1521926352, 1521926352),
(285, '偷窥客', 'http://198.40.52.130/?fromuid=428789', 0, 0, 9, '', 1521926352, 1521926352),
(286, '少女写真论坛', 'http://www.taotum.com/', 0, 0, 9, '', 1521926352, 1521926352),
(287, '偷拍视频', 'http://voyeurhit.com/', 0, 0, 9, '', 1521926352, 1521926352),
(288, '我爱原味网', 'http://www.52yuanwei.site/?fromuid=190756', 0, 0, 9, '', 1521926352, 1521926352),
(289, '最爱原味网', 'http://www.zayw1.com/', 0, 0, 9, '', 1521926352, 1521926352),
(290, '女主天地', 'http://www.nztdsm11.com/', 0, 0, 9, '', 1521926352, 1521926352),
(291, '虐之恋', 'http://www.nuezhilian.com/', 0, 0, 9, '', 1521926352, 1521926352),
(292, '恶魔六点', 'http://s.emobaba.com/', 0, 0, 9, '', 1521926352, 1521926352),
(293, '潮人特色', 'https://love.crtslt.net/', 0, 0, 9, '', 1521926352, 1521926352),
(294, '雾都森林', 'http://www.wudusenlin.com/', 0, 0, 9, '', 1521926352, 1521926352),
(295, 'Young Dreams', 'http://www.young-dreams.com/', 0, 0, 9, '', 1521926352, 1521926352),
(296, '妩媚山庄', 'http://www.wumeisz.net/?fromuid=9546', 0, 0, 9, '', 1521926352, 1521926352),
(297, '熟女图片', 'http://www.milfsalute.com/', 0, 0, 9, '', 1521926352, 1521926352),
(298, 'Big Boobs', 'http://www.bigboobsalert.com/', 0, 0, 9, '', 1521926352, 1521926352),
(299, '大奶图片', 'http://www.bigbreastarchive.com/', 0, 0, 9, '', 1521926352, 1521926352),
(300, '美臀', 'http://assking.xyz/', 0, 0, 9, '', 1521926352, 1521926352),
(301, '爆乳丰臀画廊', 'http://www.foxhq.com/', 0, 0, 9, '', 1521926352, 1521926352),
(302, 'FarangDingDong', 'http://www.farangdingdong.com/', 0, 0, 9, '', 1521926352, 1521926352),
(303, '爱美腿', 'http://www.aaleg.com/', 0, 0, 9, '', 1521926352, 1521926352),
(304, '恋臀者', 'http://www.ltzurl.info/?fromuid=273955', 0, 0, 9, '', 1521926352, 1521926352),
(305, '玫瑰酒吧', 'http://www.meigui98.cc/?fromuid=161579', 0, 0, 9, '', 1521926352, 1521926352),
(306, '爱莲说', 'http://huaban.com/boards/16607428/', 0, 0, 9, '', 1521926352, 1521926352),
(307, '美趾莲', 'http://www.mzldc.info/', 0, 0, 9, '', 1521926352, 1521926352),
(308, '熟女视频', 'http://www.oldgrannypictures.com/', 0, 0, 9, '', 1521926352, 1521926352),
(309, 'Granny', 'http://zh.bonemygranny.com/', 0, 0, 9, '', 1521926352, 1521926352),
(310, 'Blackz', 'http://blackz.com/', 0, 0, 9, '', 1521926352, 1521926352),
(311, 'GhettoTube', 'http://www.ghettotube.com/', 0, 0, 9, '', 1521926352, 1521926352),
(312, 'Bdsmland', 'http://bdsmland.org/', 0, 0, 9, '', 1521926352, 1521926352),
(313, 'Gay', 'http://gay.jp/store/index18.php?url=/store/', 0, 0, 9, '', 1521926352, 1521926352),
(314, 'OK LesBians', 'http://www.oklesbians.com/', 0, 0, 9, '', 1521926352, 1521926352),
(315, 'Lesbian Porn', 'http://www.thelesbianporn.com/', 0, 0, 9, '', 1521926352, 1521926352),
(316, 'Ladyboyweb', 'http://www.ladyboyweb.com/', 0, 0, 9, '', 1521926352, 1521926352),
(317, 'Japan BDSM', 'http://japanbdsm.com/', 0, 0, 9, '', 1521926352, 1521926352),
(318, '吉人动漫', 'https://jren100.vip/', 0, 0, 10, '', 1521926352, 1521926352),
(319, 'E-Hentai', 'https://e-hentai.org/', 0, 0, 10, '', 1521926352, 1521926352),
(320, 'South Plus', 'http://106.185.27.223/', 0, 0, 10, '', 1521926352, 1521926352),
(321, '和邪社', 'https://www.hexieshe.com/', 0, 0, 10, '', 1521926352, 1521926352),
(322, '宅宅愛動漫', 'http://18h.animezilla.com/', 0, 0, 10, '', 1521926352, 1521926352),
(323, '177漫畫', 'http://www.177piczz.info/', 0, 0, 10, '', 1521926352, 1521926352),
(324, '紳士漫畫', 'http://www.wnacg.org/', 0, 0, 10, '', 1521926352, 1521926352),
(325, '绅士二次元', 'https://www.acg.tf/', 0, 0, 10, '', 1521926352, 1521926352),
(326, 'hentaiplay', 'http://hentaiplay.net/', 0, 0, 10, '', 1521926352, 1521926352),
(327, 'buster绅士', 'https://ht.acgbuster.com/', 0, 0, 10, '', 1521926352, 1521926352),
(328, '漫爱次元', 'https://www.comici.win/', 0, 0, 10, '', 1521926352, 1521926352),
(329, '紳士の庭', 'http://gmgard.com/', 0, 0, 10, '', 1521926352, 1521926352),
(330, 'Hentai4Daily', 'http://hentai4daily.com/', 0, 0, 10, '', 1521926352, 1521926352),
(331, '卡通泡泡', 'http://www.hentaibobo.com/', 0, 0, 10, '', 1521926352, 1521926352),
(332, '松鼠症倉庫', 'https://ahri8.com/', 0, 0, 10, '', 1521926352, 1521926352),
(333, 'Hentai Stigma', 'http://hentai.animestigma.com/', 0, 0, 10, '', 1521926352, 1521926352),
(334, 'Hentai Stream', 'http://hentaistream.com/', 0, 0, 10, '', 1521926352, 1521926352),
(335, 'Hentai xxx', 'https://www.hentai.xxx/', 0, 0, 10, '', 1521926352, 1521926352),
(336, 'FAKKU', 'https://www.fakku.net/', 0, 0, 10, '', 1521926352, 1521926352),
(337, 'Toon Addict', 'http://www.toonaddict.com/', 0, 0, 10, '', 1521926352, 1521926352),
(338, 'Mangago', 'http://www.mangago.me/', 0, 0, 10, '', 1521926352, 1521926352),
(339, 'AsmHentai', 'https://asmhentai.com/', 0, 0, 10, '', 1521926352, 1521926352),
(340, 'collection-3d', 'http://collection-3d.com/', 0, 0, 10, '', 1521926352, 1521926352),
(341, 'studiofow', 'https://www.studiofow.com/', 0, 0, 10, '', 1521926352, 1521926352),
(342, 'CartoonTube', 'https://www.cartoontube.xxx/', 0, 0, 10, '', 1521926352, 1521926352),
(343, 'CartoonVideos', 'https://www.cartoonpornvideos.com/', 0, 0, 10, '', 1521926352, 1521926352),
(344, '大香蕉直播', 'http://www.69k.fun/', 0, 0, 11, '', 1521926352, 1521926352),
(345, '24·录播站', 'http://www.24lubo.info/', 0, 0, 11, '', 1521926352, 1521926352),
(346, '幸福佳缘', 'http://www.xffuqi.com/?fromuid=61192', 0, 0, 11, '', 1521926352, 1521926352),
(347, '欲望之都', 'https://ywzd007.com/', 0, 0, 11, '', 1521926352, 1521926352),
(348, '蝴蝶俱乐部', 'http://www.hudie360.com/?fromuid=776852', 0, 0, 11, '', 1521926352, 1521926352),
(349, '逍遥游', 'http://www.xy18.info/?fromuid=678142', 0, 0, 11, '', 1521926352, 1521926352),
(350, '买春堂', 'http://204.152.220.3/?u=465979', 0, 0, 11, '', 1521926352, 1521926352),
(351, '红河谷', 'http://www.hhg007.info/?u=430488', 0, 0, 11, '', 1521926352, 1521926352),
(352, 'Online Cam', 'http://chaturbate.cc/', 0, 0, 11, '', 1521926352, 1521926352),
(353, 'Cams', 'https://cams.com/', 0, 0, 11, '', 1521926352, 1521926352),
(354, 'Cam2Fun', 'https://www.cam2fun.com/', 0, 0, 11, '', 1521926352, 1521926352),
(355, 'iFriends', 'https://www.ifriends.net/', 0, 0, 11, '', 1521926352, 1521926352),
(356, 'Naked', 'https://new.naked.com/', 0, 0, 11, '', 1521926352, 1521926352),
(357, 'camplace', 'https://www.camplace.com/', 0, 0, 11, '', 1521926352, 1521926352),
(358, 'Fapshows', 'https://www.fapshows.com/', 0, 0, 11, '', 1521926352, 1521926352),
(359, 'Riv Cams', 'http://www.rivcams.com/', 0, 0, 11, '', 1521926352, 1521926352),
(360, 'XloveCam', 'https://www.xlovecam.com', 0, 0, 11, '', 1521926352, 1521926352),
(361, 'WebCamClub', 'http://www.webcamclub.com/', 0, 0, 11, '', 1521926352, 1521926352),
(362, 'tnaflixcams', 'http://www.tnaflixcams.com/', 0, 0, 11, '', 1521926352, 1521926352),
(363, 'Camster', 'https://camster.com/', 0, 0, 11, '', 1521926352, 1521926352),
(364, 'bongacams', 'https://en.bongacams.com/', 0, 0, 11, '', 1521926352, 1521926352),
(365, 'MyFreeCams', 'https://www.myfreecams.com/', 0, 0, 11, '', 1521926352, 1521926352),
(366, '第一坊', 'http://www.pljhg.net/', 0, 0, 11, '', 1521926352, 1521926352),
(367, '来疯', 'http://www.laifeng.com/', 0, 0, 11, '', 1521926352, 1521926352),
(368, '六间房', 'https://www.6.cn/', 0, 0, 11, '', 1521926352, 1521926352),
(369, '聚星直播', 'http://jx.kuwo.cn/', 0, 0, 11, '', 1521926352, 1521926352),
(370, '花椒直播', 'http://www.huajiao.com/', 0, 0, 11, '', 1521926352, 1521926352),
(371, '操AV影院', 'http://caixinyong.com/', 0, 0, 12, '', 1521926352, 1521926352),
(372, '色白白视频', 'http://www.wlcgq.com/', 0, 0, 12, '', 1521926352, 1521926352),
(373, '奇葩美女福利', 'http://www.meinvfuli.top/', 0, 0, 12, '', 1521926352, 1521926352),
(374, '老司机日报', 'http://www.laosijiribao.net/', 0, 0, 12, '', 1521926352, 1521926352),
(375, '微拍福利网', 'http://www.weipaifuliw.top/', 0, 0, 12, '', 1521926352, 1521926352),
(376, '一库福利视频', 'http://www.yikufuli.com/', 0, 0, 12, '', 1521926352, 1521926352),
(377, '夜火在线', 'http://www.yehuoshipin.top/', 0, 0, 12, '', 1521926352, 1521926352),
(378, '妹子在线', 'http://www.meizishipin.top/', 0, 0, 12, '', 1521926352, 1521926352),
(379, '日出微拍福利', 'http://www.richuweipai.com/', 0, 0, 12, '', 1521926352, 1521926352),
(380, '20发资源网', 'http://www.20fa.com/', 0, 0, 12, '', 1521926352, 1521926352),
(381, '小天使影视', 'http://www.yuhangmi.com/', 0, 0, 12, '', 1521926352, 1521926352),
(382, '哇咔TV', 'http://www.wktv.info/', 0, 0, 12, '', 1521926352, 1521926352),
(383, '微拍网', 'http://www.weipaiwang.cc/', 0, 0, 12, '', 1521926352, 1521926352),
(384, '中出福利视频', 'http://www.zhongchufuli.com/', 0, 0, 12, '', 1521926352, 1521926352),
(385, '恋恋影视', 'http://v.33k.im/', 0, 0, 12, '', 1521926352, 1521926352),
(386, 'MM视频站', 'http://www.mmsp.me/', 0, 0, 12, '', 1521926352, 1521926352),
(387, '福利吧论坛', 'http://www.wnflb.com/', 0, 0, 12, '', 1521926352, 1521926352),
(388, '邀请码小组', 'http://www.douban.com/group/yaoqingzhuce/', 0, 0, 12, '', 1521926352, 1521926352),
(389, '每日福利', 'http://meirifuli8.zone/', 0, 0, 12, '', 1521926352, 1521926352),
(390, '绝对领域', 'http://www.jdlingyu.fun/', 0, 0, 12, '', 1521926352, 1521926352),
(391, '司机会所', 'https://www.dakashangche.org/', 0, 0, 12, '', 1521926352, 1521926352),
(392, '920神器网', 'http://920cn.com/', 0, 0, 12, '', 1521926352, 1521926352),
(393, '坏男孩', 'http://www.huainanhai.com/', 0, 0, 12, '', 1521926352, 1521926352),
(394, '猎奇之家', 'http://cn7t.net/', 0, 0, 12, '', 1521926352, 1521926352),
(395, '晋江文学城', 'http://bbs.jjwxc.net/', 0, 0, 12, '', 1521926352, 1521926352),
(396, '变装家园', 'http://www.7bz8.com/', 0, 0, 12, '', 1521926352, 1521926352),
(397, '捌零音乐论坛', 'http://www.pt80.net/', 0, 0, 12, '', 1521926352, 1521926352),
(398, '卡饭论坛', 'http://bbs.kafan.cn/', 0, 0, 12, '', 1521926352, 1521926352),
(399, 'HD高清迷', 'http://www.hdmee.me/', 0, 0, 12, '', 1521926352, 1521926352),
(400, '中国高清网', 'http://gaoqing.la/', 0, 0, 12, '', 1521926352, 1521926352),
(401, '我的高清影院', 'https://www.wodehd.com/', 0, 0, 12, '', 1521926352, 1521926352),
(402, '97影院', 'http://www.97lunli.net/', 0, 0, 12, '', 1521926352, 1521926352),
(403, '片搜网', 'http://www.pianso.cc/', 0, 0, 12, '', 1521926352, 1521926352),
(404, '无名影院', 'http://www.wmdyw.net/', 0, 0, 12, '', 1521926352, 1521926352),
(405, '02UN影院', 'http://avpian.tianeren.com/', 0, 0, 12, '', 1521926352, 1521926352),
(406, '慢慢看影院', 'http://www.mmsee.me/', 0, 0, 12, '', 1521926352, 1521926352),
(407, '微神马电影', 'http://www.vsmdy.com/', 0, 0, 12, '', 1521926352, 1521926352),
(408, '草民电影网', 'http://www.cmdy.tv/', 0, 0, 12, '', 1521926352, 1521926352),
(409, '四季高清网', 'http://www.44hd.cc/', 0, 0, 12, '', 1521926352, 1521926352),
(410, '猪猪乐园', 'http://98.126.51.43/', 0, 0, 12, '', 1521926352, 1521926352),
(411, '真好论坛', 'http://www.zhenhao2016.com/', 0, 0, 12, '', 1521926352, 1521926352),
(412, 'JavLibrary', 'http://www.19lib.com/cn/', 0, 0, 13, '', 1521926352, 1521926352),
(413, 'JavBus', 'https://www.javbus.pw/', 0, 0, 13, '', 1521926352, 1521926352),
(414, 'Javbooks', 'https://jmvbt.com/', 0, 0, 13, '', 1521926352, 1521926352),
(415, 'JAVTL', 'http://javtorrent.re/', 0, 0, 13, '', 1521926352, 1521926352),
(416, 'JAVHOO', 'https://www.javhoo.co/', 0, 0, 13, '', 1521926352, 1521926352),
(417, '脚盆网', 'http://jporn.link/', 0, 0, 13, '', 1521926352, 1521926352),
(418, '99番号网', 'https://www.99fanhaow.com/', 0, 0, 13, '', 1521926352, 1521926352),
(419, '番号海', 'http://www.fanhaohai6.com/', 0, 0, 13, '', 1521926352, 1521926352),
(420, '番号网', 'https://www.8550.org/', 0, 0, 13, '', 1521926352, 1521926352),
(421, '污污哒番号', 'http://www.zhaoqiang.org/', 0, 0, 13, '', 1521926352, 1521926352),
(422, 'AV小四郎', 'http://www.xcl111.com/', 0, 0, 13, '', 1521926352, 1521926352),
(423, 'JAVPOP', 'https://javpop.biz/', 0, 0, 13, '', 1521926352, 1521926352),
(424, 'JP Torrent', 'http://javtorrent.re/', 0, 0, 13, '', 1521926352, 1521926352),
(425, 'Dioguitar23', 'http://mo6699.net/', 0, 0, 13, '', 1521926352, 1521926352),
(426, 'JavArchive', 'http://javarchive.com/', 0, 0, 13, '', 1521926352, 1521926352),
(427, '素人系総合wiki', 'http://sougouwiki.com/', 0, 0, 13, '', 1521926352, 1521926352),
(428, '优优兵器谱', 'http://www.yybqp.com/?fromuid=226303', 0, 0, 13, '', 1521926352, 1521926352),
(429, 'DMM.R18', 'https://www.dmm.co.jp/', 0, 0, 13, '', 1521926352, 1521926352),
(430, 'みんなのAV', 'http://www.minnano-av.com/', 0, 0, 13, '', 1521926352, 1521926352),
(431, 'JAV Database', 'http://www.javdatabase.com/', 0, 0, 13, '', 1521926352, 1521926352),
(432, 'SpoonHK', 'https://www.spoonhk.com/', 0, 0, 13, '', 1521926352, 1521926352),
(433, '揭示板', 'http://www.fanup.info/', 0, 0, 13, '', 1521926352, 1521926352),
(434, 'AVGoogle', 'http://avgoogle.net/', 0, 0, 13, '', 1521926352, 1521926352),
(435, 'AVSOX', 'https://javfee.com/', 0, 0, 13, '', 1521926352, 1521926352),
(436, 'AVMOO', 'https://javmoo.net/', 0, 0, 13, '', 1521926352, 1521926352),
(437, 'AVMEMO', 'https://avmemo.com/', 0, 0, 13, '', 1521926352, 1521926352),
(438, 'NameThatPorn', 'https://namethatporn.com/', 0, 0, 13, '', 1521926352, 1521926352),
(439, 'Porn Dabster', 'https://porndabster.com/', 0, 0, 13, '', 1521926352, 1521926352),
(440, 'The Porn Dude', 'https://theporndude.com/', 0, 0, 13, '', 1521926352, 1521926352),
(441, 'Prime Porn List', 'https://www.primepornlist.com/', 0, 0, 13, '', 1521926352, 1521926352),
(442, 'Hegre', 'http://www.hegre.com/', 0, 0, 17, '', 1521926352, 1521926352),
(443, 'Twistys', 'https://www.twistys.com/', 0, 0, 13, '', 1521926352, 1521926352),
(444, 'elegantangel', 'http://www.elegantangel.com/', 0, 0, 13, '', 1521926352, 1521926352),
(445, 'Black Gfs', 'http://www.blackgfs.com/', 0, 0, 13, '', 1521926352, 1521926352),
(446, 'HotLegsandFeet', 'https://hotlegsandfeet.com/', 0, 0, 13, '', 1521926352, 1521926352),
(447, '1By-Day', 'https://1by-day.com/', 0, 0, 13, '', 1521926352, 1521926352),
(448, 'sandysfantasies', 'http://sandysfantasies.com/', 0, 0, 13, '', 1521926352, 1521926352),
(449, 'NubileFilms', 'http://www.nubilefilms.com/', 0, 0, 13, '', 1521926352, 1521926352),
(450, 'Evil Angel', 'https://www.evilangel.com/', 0, 0, 13, '', 1521926352, 1521926352),
(451, 'Marc Dorcel', 'https://www.dorcel.com/', 0, 0, 13, '', 1521926352, 1521926352),
(452, 'Private', 'https://www.private.com/', 0, 0, 13, '', 1521926352, 1521926352),
(453, 'julesjordan', 'http://www.julesjordanvideo.com/', 0, 0, 13, '', 1521926352, 1521926352),
(454, 'digitalplayground', 'https://www.digitalplayground.com/', 0, 0, 13, '', 1521926352, 1521926352),
(455, 'iafd', 'http://www.iafd.com/', 0, 0, 13, '', 1521926352, 1521926352),
(456, 'VRGirlz', 'https://www.vrgirlz.com/', 0, 0, 14, '', 1521926352, 1521926352),
(457, 'VRPorn', 'https://vrporn.com/', 0, 0, 14, '', 1521926352, 1521926352),
(458, 'VRTube', 'https://vrtube.xxx/', 0, 0, 14, '', 1521926352, 1521926352),
(459, 'VRTITTIES', 'http://vrtitties.com/', 0, 0, 14, '', 1521926352, 1521926352),
(460, 'VR Discussion', 'https://www.vrdiscussion.com/', 0, 0, 14, '', 1521926352, 1521926352),
(461, 'VR Sexperience', 'https://vrsexperience.com/', 0, 0, 14, '', 1521926352, 1521926352),
(462, 'Vr Porn List', 'http://www.vrpornlist.com/', 0, 0, 14, '', 1521926352, 1521926352),
(463, 'Virtual Taboo', 'https://virtualtaboo.com/', 0, 0, 14, '', 1521926352, 1521926352),
(464, 'Reality Lovers', 'https://realitylovers.com/', 0, 0, 14, '', 1521926352, 1521926352),
(465, 'BaDoinkVR', 'https://badoinkvr.com/', 0, 0, 14, '', 1521926352, 1521926352),
(466, 'PornfoxVR', 'https://www.pornfoxvr.com/', 0, 0, 14, '', 1521926352, 1521926352),
(467, 'PornqueenVR', 'https://www.pornqueenvr.com/', 0, 0, 14, '', 1521926352, 1521926352),
(468, 'Czech VR', 'https://www.czechvr.com/', 0, 0, 14, '', 1521926352, 1521926352),
(469, 'Naughty VR', 'http://www.naughtyvirtualreality.com/', 0, 0, 14, '', 1521926352, 1521926352),
(470, 'HoloGirls VR', 'https://www.hologirlsvr.com/', 0, 0, 14, '', 1521926352, 1521926352),
(471, 'Bdsm Porn VR', 'http://www.bdsmpornvr.com/', 0, 0, 14, '', 1521926352, 1521926352),
(472, 'Gayvirt', 'https://www.gayvirt.com/', 0, 0, 14, '', 1521926352, 1521926352),
(473, 'Tranniesvr', 'https://www.tranniesvr.com/', 0, 0, 14, '', 1521926352, 1521926352),
(474, 'Metaverse', 'https://metaversexxx.com/', 0, 0, 14, '', 1521926352, 1521926352),
(475, '疯情书库', 'https://www.aastory.club/', 0, 0, 15, '', 1521926352, 1521926352),
(476, '夜色小说', 'http://www.yesesu.com/', 0, 0, 15, '', 1521926352, 1521926352),
(477, '美女生活照', 'http://www.nucvrj.com/', 0, 0, 15, '', 1521926352, 1521926352),
(478, '蚂蚁小说', 'http://mayi02.xyz/', 0, 0, 15, '', 1521926352, 1521926352),
(479, '老司机书库', 'http://laosj.pw/', 0, 0, 15, '', 1521926352, 1521926352),
(480, '艳文屋', 'https://www.yanwenwu.com/', 0, 0, 15, '', 1521926352, 1521926352),
(481, '手银哥桃色小说', 'https://www.shouyinge.com/', 0, 0, 15, '', 1521926352, 1521926352),
(482, '小yin书', 'http://www.yinshu.xyz/', 0, 0, 15, '', 1521926352, 1521926352),
(483, '国模丽影', 'http://www.guomoart.com/', 0, 0, 15, '', 1521926352, 1521926352),
(484, '兔扑美束馆', 'http://www.tpmsg.com/', 0, 0, 15, '', 1521926352, 1521926352),
(485, '91自拍论坛', 'http://f.91p11.space/?fromuid=697480', 0, 0, 15, '', 1521926352, 1521926352),
(486, '老司机图片', 'https://post.7yinyue.pw/pic/', 0, 0, 15, '', 1521926352, 1521926352),
(487, '達蓋爾的旗幟', 'https://dd.ddder.us/thread0806.php?fid=16', 0, 0, 15, '', 1521926352, 1521926352),
(488, '炫美社', 'http://www.xuanmeishe.net/?fromuid=44978', 0, 0, 15, '', 1521926352, 1521926352),
(489, '微笑线街拍', 'http://www.siwahd.com/', 0, 0, 15, '', 1521926352, 1521926352),
(490, '街拍第一站', 'http://www.jp95.com/?fromuid=672975', 0, 0, 15, '', 1521926352, 1521926352),
(491, '魔镜原创摄影', 'http://www.520mojing.com/', 0, 0, 15, '', 1521926352, 1521926352),
(492, '启明星原创摄影', 'http://www.qmxyc.com/?fromuid=152203', 0, 0, 15, '', 1521926352, 1521926352),
(493, '九个太阳', 'http://www.9gty.net/forum.php', 0, 0, 15, '', 1521926352, 1521926352),
(494, 'Twitter美女', 'http://jigadori.fkoji.com/', 0, 0, 15, '', 1521926352, 1521926352),
(495, '豆瓣美女', 'https://www.dbmeinv.com/', 0, 0, 15, '', 1521926352, 1521926352),
(496, '性感美女', 'http://www.5442.com/', 0, 0, 15, '', 1521926352, 1521926352),
(497, '优女郎', 'http://www.ugirl.cc/', 0, 0, 15, '', 1521926352, 1521926352),
(498, '尤果网', 'http://www.ugirls.com/', 0, 0, 15, '', 1521926352, 1521926352),
(499, '妹子图', 'http://www.mzitu.com/', 0, 0, 15, '', 1521926352, 1521926352),
(500, '美女图片', 'http://www.mmjpg.com/', 0, 0, 15, '', 1521926352, 1521926352),
(501, '美女图片集', 'https://girl-atlas.com/', 0, 0, 15, '', 1521926352, 1521926352),
(502, '美女私房图', 'http://www.sifangtu.net/', 0, 0, 15, '', 1521926352, 1521926352),
(503, '九妹图社', 'http://www.99mm.me/', 0, 0, 15, '', 1521926352, 1521926352),
(504, '国模', 'http://www.2018guomo.org/?fromuid=130143', 0, 0, 15, '', 1521926352, 1521926352),
(505, '國模網', 'https://www.guomoo.co/', 0, 0, 15, '', 1521926352, 1521926352),
(506, '提姆正妹版', 'http://www.timliao.com/bbs/forumdisplay.php?fid=18', 0, 0, 15, '', 1521926352, 1521926352),
(507, 'jppornpic', 'http://www.jppornpic.com/', 0, 0, 15, '', 1521926352, 1521926352),
(508, 'paparaco', 'https://paparaco.me/', 0, 0, 15, '', 1521926352, 1521926352),
(509, 'pornpics', 'https://www.pornpics.com/', 0, 0, 15, '', 1521926352, 1521926352),
(510, 'TheFappening', 'http://thefappeningblog.com/', 0, 0, 15, '', 1521926352, 1521926352),
(511, 'Madame Voyeur', 'http://madamevoyeur.com/', 0, 0, 15, '', 1521926352, 1521926352),
(512, '裸女壁纸', 'http://www.nudevideoswallpapers.com/', 0, 0, 15, '', 1521926352, 1521926352),
(513, 'ftop壁纸', 'https://ftopx.com/', 0, 0, 15, '', 1521926352, 1521926352),
(514, 'ImageZog', 'http://imagezog.com/', 0, 0, 15, '', 1521926352, 1521926352),
(515, 'xxGifs', 'http://xxgifs.com/', 0, 0, 15, '', 1521926352, 1521926352),
(516, 'JuicyGif', 'http://juicygif.com/', 0, 0, 15, '', 1521926352, 1521926352),
(517, 'Pichunter', 'http://www.pichunter.com/', 0, 0, 15, '', 1521926352, 1521926352),
(518, '草榴小说', 'https://dd.ddder.us/thread0806.php?fid=20', 0, 0, 15, '', 1521926352, 1521926352),
(519, '線上看', 'https://www.jkforum.net/forum-544-1.html', 0, 0, 15, '', 1521926352, 1521926352),
(520, '情涩文学', 'https://wuso.me/forum-novel-1.html', 0, 0, 15, '', 1521926352, 1521926352),
(521, '老哥读', 'http://www.laogedu.net/', 0, 0, 15, '', 1521926352, 1521926352),
(522, 'BeemTube', 'https://beemtube.com/', 0, 0, 16, '', 1521926352, 1521926352),
(523, 'Redtube', 'https://www.redtube.com/', 0, 0, 16, '', 1521926352, 1521926352),
(524, 'TNAFlix', 'https://www.tnaflix.com/', 0, 0, 16, '', 1521926352, 1521926352),
(525, 'keezm', 'http://www.keezmovies.com/', 0, 0, 16, '', 1521926352, 1521926352),
(526, 'Hd21', 'https://www.hd21.com/', 0, 0, 16, '', 1521926352, 1521926352),
(527, 'PornoMovies', 'https://www.pornomovies.com/', 0, 0, 16, '', 1521926352, 1521926352),
(528, '精彩片断', 'http://instantfap.com/', 0, 0, 16, '', 1521926352, 1521926352),
(529, 'ThisVid', 'https://thisvid.com/', 0, 0, 16, '', 1521926352, 1521926352),
(530, 'Rush Porn', 'https://www.rushporn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(531, 'FetishShrine', 'https://www.fetishshrine.com/', 0, 0, 16, '', 1521926352, 1521926352),
(532, 'TUB99', 'https://tub99.com/', 0, 0, 16, '', 1521926352, 1521926352),
(533, 'TUBXPORN', 'https://www.tubxporn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(534, 'SeeMyPorn', 'http://www.seemyporn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(535, 'UPORNO', 'https://www.uporno.xxx/', 0, 0, 16, '', 1521926352, 1521926352),
(536, 'xHamster', 'https://xhamster.com/', 0, 0, 16, '', 1521926352, 1521926352),
(537, 'XFreeHD', 'https://xfreehd.com/', 0, 0, 16, '', 1521926352, 1521926352),
(538, 'XNXX', 'https://www.xnxx.com/', 0, 0, 16, '', 1521926352, 1521926352),
(539, 'Alot Porn', 'http://www.alotporn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(540, 'PornTrex', 'https://www.porntrex.com/', 0, 0, 16, '', 1521926352, 1521926352),
(541, 'YourPorn', 'https://yourporn.sexy/', 0, 0, 16, '', 1521926352, 1521926352),
(542, 'DrTuber', 'http://www.drtuber.com/', 0, 0, 16, '', 1521926352, 1521926352),
(543, 'PornCorn', 'https://porncorn.co/', 0, 0, 16, '', 1521926352, 1521926352),
(544, 'PerfectGirls', 'http://www.perfectgirls.net/', 0, 0, 16, '', 1521926352, 1521926352),
(545, 'MOVIESHARK', 'http://www.movieshark.com/', 0, 0, 16, '', 1521926352, 1521926352),
(546, 'AbsoluPorn', 'http://www.absoluporn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(547, 'PornDig', 'https://www.porndig.com/', 0, 0, 16, '', 1521926352, 1521926352),
(548, 'Pornorio', 'http://pornorio.org/', 0, 0, 16, '', 1521926352, 1521926352),
(549, 'PornoXO', 'https://www.pornoxo.com/', 0, 0, 16, '', 1521926352, 1521926352),
(550, 'PornVe', 'https://pornve.com/', 0, 0, 16, '', 1521926352, 1521926352),
(551, 'PornFun', 'https://pornfun.com/', 0, 0, 16, '', 1521926352, 1521926352),
(552, 'Pornsland', 'https://porns.land/', 0, 0, 16, '', 1521926352, 1521926352),
(553, 'ShesFreaky', 'https://www.shesfreaky.com/', 0, 0, 16, '', 1521926352, 1521926352),
(554, 'HOODAMA', 'http://www.hoodamateurs.com/', 0, 0, 16, '', 1521926352, 1521926352),
(555, 'HDMOVZ', 'https://www.hdmovz.com/', 0, 0, 16, '', 1521926352, 1521926352),
(556, 'LentaPorno', 'http://lentaporno.com/', 0, 0, 16, '', 1521926352, 1521926352),
(557, 'DatoPorn', 'http://datoporn.co/', 0, 0, 16, '', 1521926352, 1521926352),
(558, 'Faapy', 'https://faapy.com/', 0, 0, 16, '', 1521926352, 1521926352),
(559, 'FreeHDPorn', 'http://www.freehdpornx.com/', 0, 0, 16, '', 1521926352, 1521926352),
(560, 'vPorn', 'https://www.vporn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(561, 'TOPXX', 'http://topxx.net/', 0, 0, 16, '', 1521926352, 1521926352),
(562, 'Homeporn', 'http://homepornbay.com/', 0, 0, 16, '', 1521926352, 1521926352),
(563, 'YourFlicks', 'https://www.submityourflicks.com/', 0, 0, 16, '', 1521926352, 1521926352),
(564, 'YourAmateur', 'https://www.youramateurporn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(565, 'HomeMovies', 'http://www.homemoviestube.com/', 0, 0, 16, '', 1521926352, 1521926352),
(566, 'VoyeurSeason', 'http://www.voyeurseason.com/', 0, 0, 16, '', 1521926352, 1521926352),
(567, 'Pentasex', 'https://www.pentasex.co/', 0, 0, 16, '', 1521926352, 1521926352),
(568, 'PornHD', 'https://www.pornhd.com/', 0, 0, 16, '', 1521926352, 1521926352),
(569, 'Pornmaki', 'http://pornmaki.com/', 0, 0, 16, '', 1521926352, 1521926352),
(570, 'ProPorn', 'https://www.proporn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(571, 'Pornxs', 'https://pornxs.com/', 0, 0, 16, '', 1521926352, 1521926352),
(572, 'PORN', 'https://www.porn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(573, 'Pornjam', 'https://www.pornjam.com/', 0, 0, 16, '', 1521926352, 1521926352),
(574, 'xxxkinky', 'https://www.xxxkinky.com/', 0, 0, 16, '', 1521926352, 1521926352),
(575, 'Eroxia', 'http://www.eroxia.com/', 0, 0, 16, '', 1521926352, 1521926352),
(576, 'Tube8', 'https://www.tube8.com/', 0, 0, 16, '', 1521926352, 1521926352),
(577, 'Porn300', 'https://www.porn300.com/', 0, 0, 16, '', 1521926352, 1521926352),
(578, 'sexytube', 'https://www.sexytube.me/', 0, 0, 16, '', 1521926352, 1521926352),
(579, 'Huge6', 'https://www.huge6.com/', 0, 0, 16, '', 1521926352, 1521926352),
(580, 'Analdin', 'https://www.analdin.com/', 0, 0, 16, '', 1521926352, 1521926352),
(581, 'HPJav', 'https://hpjav.com/', 0, 0, 16, '', 1521926352, 1521926352),
(582, 'POPJAV', 'https://popjav.com/', 0, 0, 16, '', 1521926352, 1521926352),
(583, 'HDTube', 'http://hdtube.co/', 0, 0, 16, '', 1521926352, 1521926352),
(584, 'JavDoe', 'https://www.javdoe.com/', 0, 0, 16, '', 1521926352, 1521926352),
(585, 'JavBoss', 'https://www.javboss.com/', 0, 0, 16, '', 1521926352, 1521926352),
(586, 'JAVCL', 'http://javcl.com/', 0, 0, 16, '', 1521926352, 1521926352),
(587, 'AV01', 'https://av01.tv/', 0, 0, 16, '', 1521926352, 1521926352),
(588, 'LetFap', 'http://letfap.com/', 0, 0, 16, '', 1521926352, 1521926352),
(589, '無料AV アダルト', 'http://adultdouga-db.com/', 0, 0, 16, '', 1521926352, 1521926352),
(590, 'BeeJP', 'http://beejp.net/', 0, 0, 16, '', 1521926352, 1521926352),
(591, 'JavFinder', 'https://javfinder.is/', 0, 0, 16, '', 1521926352, 1521926352),
(592, 'Osaka', 'https://www.osakamotion.net/', 0, 0, 16, '', 1521926352, 1521926352),
(593, 'xxxfk', 'https://xxffo.com/', 0, 0, 16, '', 1521926352, 1521926352),
(594, 'JAVROOT', 'http://javroot.com/', 0, 0, 16, '', 1521926352, 1521926352),
(595, 'TokyoPorn', 'http://www.tokyoporn.com/', 0, 0, 16, '', 1521926352, 1521926352),
(596, 'Adult TV', 'http://www.adult-sex-porn-tv.com/', 0, 0, 16, '', 1521926352, 1521926352),
(597, 'BTSOW种子', 'https://btso.pw/search', 0, 0, 17, '', 1521926352, 1521926352),
(598, '爱人BT', 'http://365.sesebt.cc/', 0, 0, 17, '', 1521926352, 1521926352),
(599, 'AV种子', 'http://ivtorrent.com/', 0, 0, 17, '', 1521926352, 1521926352),
(600, 'AIO Search', 'http://www.aiosearch.com/', 0, 0, 17, '', 1521926352, 1521926352),
(601, 'BTDigg', 'http://www.btdiggjx.org/', 0, 0, 17, '', 1521926352, 1521926352),
(602, 'The Pirate Bay', 'https://thepiratebay.org/', 0, 0, 17, '', 1521926352, 1521926352),
(603, 'Torrentz', 'http://torrentz.com/', 0, 0, 17, '', 1521926352, 1521926352),
(604, 'Torrent Crazy', 'http://torrentcrazy.to/', 0, 0, 17, '', 1521926352, 1521926352),
(605, 'Torrentkitty', 'https://www.torrentkitty.tv/search/', 0, 0, 17, '', 1521926352, 1521926352),
(606, 'TorrentSearch', 'http://torrentsearchweb.pw/', 0, 0, 17, '', 1521926352, 1521926352),
(607, 'Rarbg', 'https://rarbg.is/torrents.php', 0, 0, 17, '', 1521926352, 1521926352),
(608, 'TrovaPorno', 'https://www.trovaporno.com/', 0, 0, 17, '', 1521926352, 1521926352),
(609, 'Toorgle', 'http://www.toorgle.com/', 0, 0, 17, '', 1521926352, 1521926352),
(610, 'SeePeer', 'https://www.seedpeer.eu/', 0, 0, 17, '', 1521926352, 1521926352),
(611, 'iDope', 'https://idope.se/', 0, 0, 17, '', 1521926352, 1521926352),
(612, 'isoHunt', 'https://isohunts.to/', 0, 0, 17, '', 1521926352, 1521926352),
(613, 'LimeTorrents', 'https://www.limetorrents.cc/', 0, 0, 17, '', 1521926352, 1521926352),
(614, 'torrents', 'https://torrents.me/', 0, 0, 17, '', 1521926352, 1521926352),
(615, 'demonoid', 'https://www.demonoid.pw/', 0, 0, 17, '', 1521926352, 1521926352),
(616, 'FileDron', 'http://filedron.com/', 0, 0, 17, '', 1521926352, 1521926352),
(617, 'QueenTorrent', 'http://www.queentorrent.net/', 0, 0, 17, '', 1521926352, 1521926352);
INSERT INTO `nav` (`id`, `name`, `uri`, `sort_id`, `hits`, `nav_category_id`, `type`, `update_time`, `insert_time`) VALUES
(618, 'nahghtyblog', 'https://www.naughtyblog.org/', 0, 0, 17, '', 1521926352, 1521926352),
(619, 'Nyaa', 'https://nyaa.site/', 0, 0, 17, '', 1521926352, 1521926352),
(620, 'Torrentbit', 'http://www.torrentbit.net/', 0, 0, 17, '', 1521926352, 1521926352),
(621, 'TorrentFunk', 'https://www.torrentfunk.com/', 0, 0, 17, '', 1521926352, 1521926352),
(622, 'Tokyo Toshokan', 'https://www.tokyotosho.info/', 0, 0, 17, '', 1521926352, 1521926352),
(623, '种子磁力搜索', 'https://bt2.bt87.cc/', 0, 0, 17, '', 1521926352, 1521926352),
(624, '橘子搜索', 'http://www.juzisousuo.com/', 0, 0, 17, '', 1521926352, 1521926352),
(625, '飞客BT', 'http://www.feikebt.com/', 0, 0, 17, '', 1521926352, 1521926352),
(626, 'BT工厂', 'http://www.btgongchang.pw/', 0, 0, 17, '', 1521926352, 1521926352),
(627, 'BTAVMO', 'http://www.btgcso.org/', 0, 0, 17, '', 1521926352, 1521926352),
(628, 'BTMon', 'http://www.btmon.com/', 0, 0, 17, '', 1521926352, 1521926352),
(629, '磁力猪', 'http://www.cilizhu2.com/', 0, 0, 17, '', 1521926352, 1521926352),
(630, 'BT包菜', 'http://www.btbaocai.me/', 0, 0, 17, '', 1521926352, 1521926352),
(631, 'BT樱桃', 'http://www.btcerise.me/', 0, 0, 17, '', 1521926352, 1521926352),
(632, '屌丝搜', 'http://www.diaosisou.org/', 0, 0, 17, '', 1521926352, 1521926352),
(633, 'BT快搜', 'http://www.btkuai.cc/', 0, 0, 17, '', 1521926352, 1521926352),
(634, 'BT蚂蚁', 'http://www.btanv.com/', 0, 0, 17, '', 1521926352, 1521926352),
(635, 'Btbook', 'http://www.btbook.me/', 0, 0, 17, '', 1521926352, 1521926352),
(636, '善用搜索', 'https://www.betterso.com/', 0, 0, 18, '', 1521926352, 1521926352),
(637, '福利搜索', 'https://boodigo.com/', 0, 0, 18, '', 1521926352, 1521926352),
(638, '相似搜索', 'https://www.similarsitesearch.com/cn/', 0, 0, 18, '', 1521926352, 1521926352),
(639, '清洗种子', 'http://360xixi.com/', 0, 0, 18, '', 1521926352, 1521926352),
(640, '种子磁链互转', 'http://www.torrent.org.cn/', 0, 0, 18, '', 1521926352, 1521926352),
(641, '电子书搜索', 'https://www.jiumodiary.com/', 0, 0, 18, '', 1521926352, 1521926352),
(642, '下载crx', 'http://chrome-extension-downloader.com/', 0, 0, 18, '', 1521926352, 1521926352),
(643, '种子上传', 'http://www.jandown.com/', 0, 0, 18, '', 1521926352, 1521926352),
(644, '印象笔记', 'https://www.yinxiang.com/?from=evernote', 0, 0, 18, '', 1521926352, 1521926352),
(645, 'Google短网址', 'https://goo.gl/', 0, 0, 18, '', 1521926352, 1521926352),
(646, '百度短网址', 'http://dwz.cn/', 0, 0, 18, '', 1521926352, 1521926352),
(647, '新浪短网址', 'http://sina.lt/', 0, 0, 18, '', 1521926352, 1521926352),
(648, 'Google翻譯', 'http://translate.google.cn/', 0, 0, 18, '', 1521926352, 1521926352),
(649, 'Google图片搜索', 'https://www.google.com.hk/imghp?hl=zh-CN', 0, 0, 18, '', 1521926352, 1521926352),
(650, 'PC上WAP', 'http://www.pctowap.com/', 0, 0, 18, '', 1521926352, 1521926352),
(651, '工具箱', 'http://tool.114la.com/', 0, 0, 18, '', 1521926352, 1521926352),
(652, '视频地址解析', 'http://www.flvcd.com/', 0, 0, 18, '', 1521926352, 1521926352),
(653, '全能VIP视频解析', 'http://tv.dsqndh.com/', 0, 0, 18, '', 1521926352, 1521926352),
(654, 'VIP视频解析站', 'http://52yzk.com/', 0, 0, 18, '', 1521926352, 1521926352),
(655, '微博视频下载', 'http://www.weibovideo.com/', 0, 0, 18, '', 1521926352, 1521926352),
(656, 'tumblr浏览', 'http://noneblr.com/', 0, 0, 18, '', 1521926352, 1521926352),
(657, 'Youtube下载', 'http://en.savefrom.net/', 0, 0, 18, '', 1521926352, 1521926352),
(658, '91视频采集', 'http://www.caijilian.com/', 0, 0, 18, '', 1521926352, 1521926352),
(659, '百度云盘', 'http://pan.baidu.com/', 0, 0, 18, '', 1521926352, 1521926352),
(660, '115网盘', 'http://www.115.com/', 0, 0, 18, '', 1521926352, 1521926352),
(661, 'Reverse IP Check', 'http://www.yougetsignal.com/tools/web-sites-on-web-server/', 0, 0, 18, '', 1521926352, 1521926352),
(662, 'IP反查域名', 'http://dns.aizhan.com/', 0, 0, 18, '', 1521926352, 1521926352);

-- --------------------------------------------------------

--
-- 表的结构 `nav_category`
--

CREATE TABLE `nav_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sort_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0正常，1隐藏',
  `hits` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `nav_category`
--

INSERT INTO `nav_category` (`id`, `name`, `sort_id`, `status`, `hits`) VALUES
(1, 'Codec', 500, 0, 0),
(2, 'Video Parse', 400, 0, 0),
(3, 'Social', 300, 0, 0),
(4, '精品推荐', 0, 0, 0),
(5, '名站推荐', 0, 0, 0),
(6, '国内视频', 0, 0, 0),
(7, '综合论坛', 0, 0, 0),
(8, '福利导航', 0, 0, 0),
(9, '特色好站', 0, 0, 0),
(10, '动漫ACG', 0, 0, 0),
(11, '信息秀场', 0, 0, 0),
(12, '福利微拍', 0, 0, 0),
(13, '片商情报', 0, 0, 0),
(14, 'VR资源', 0, 0, 0),
(15, '美图小说', 0, 0, 0),
(16, '国外视频', 0, 0, 0),
(17, '搜索种子', 0, 0, 0),
(18, '在线工具', 0, 0, 0);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `category_id` (`category_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment_1`
--
ALTER TABLE `comment_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment_2`
--
ALTER TABLE `comment_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment_3`
--
ALTER TABLE `comment_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment_4`
--
ALTER TABLE `comment_4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment_5`
--
ALTER TABLE `comment_5`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment_6`
--
ALTER TABLE `comment_6`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment_7`
--
ALTER TABLE `comment_7`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment_8`
--
ALTER TABLE `comment_8`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `comment_9`
--
ALTER TABLE `comment_9`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `member_content_0`
--
ALTER TABLE `member_content_0`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_content_1`
--
ALTER TABLE `member_content_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_content_2`
--
ALTER TABLE `member_content_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_content_3`
--
ALTER TABLE `member_content_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_content_4`
--
ALTER TABLE `member_content_4`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_content_5`
--
ALTER TABLE `member_content_5`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_content_6`
--
ALTER TABLE `member_content_6`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_content_7`
--
ALTER TABLE `member_content_7`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_content_8`
--
ALTER TABLE `member_content_8`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_content_9`
--
ALTER TABLE `member_content_9`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_relation`
--
ALTER TABLE `member_relation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `own_id` (`own_id`,`other_id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sort_id` (`sort_id`),
  ADD KEY `nav_category_id` (`nav_category_id`);

--
-- Indexes for table `nav_category`
--
ALTER TABLE `nav_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_id` (`sort_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `article_content_0`
--
ALTER TABLE `article_content_0`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_content_1`
--
ALTER TABLE `article_content_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_content_2`
--
ALTER TABLE `article_content_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_content_3`
--
ALTER TABLE `article_content_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_content_4`
--
ALTER TABLE `article_content_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_content_5`
--
ALTER TABLE `article_content_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_content_6`
--
ALTER TABLE `article_content_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_content_7`
--
ALTER TABLE `article_content_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_content_8`
--
ALTER TABLE `article_content_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_content_9`
--
ALTER TABLE `article_content_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article_tag_relation`
--
ALTER TABLE `article_tag_relation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `comment_0`
--
ALTER TABLE `comment_0`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `member_content_0`
--
ALTER TABLE `member_content_0`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `member_content_1`
--
ALTER TABLE `member_content_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `member_content_2`
--
ALTER TABLE `member_content_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `member_content_3`
--
ALTER TABLE `member_content_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `member_content_4`
--
ALTER TABLE `member_content_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `member_content_5`
--
ALTER TABLE `member_content_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `member_content_6`
--
ALTER TABLE `member_content_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `member_content_7`
--
ALTER TABLE `member_content_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `member_content_8`
--
ALTER TABLE `member_content_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `member_content_9`
--
ALTER TABLE `member_content_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `member_relation`
--
ALTER TABLE `member_relation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=663;

--
-- 使用表AUTO_INCREMENT `nav_category`
--
ALTER TABLE `nav_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `tag_type`
--
ALTER TABLE `tag_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
