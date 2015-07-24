-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2015 at 09:12 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nytimes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mod_permissions` text COLLATE utf8_unicode_ci,
  `cat_permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `sort` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `mod_permissions`, `cat_permissions`, `logged_at`, `sort`, `is_active`, `is_featured`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 'handaa.1224@gmail.com', '11611531cc390b3d047142569042fca3', 'content;comment;category;poll;banner;client;page;feedback;admin;menu', '', '2014-12-20 21:51:58', 0, 1, 0, '2011-02-05 13:04:13', '2014-12-12 04:37:10', 0, 0),
(2, 'batsukhd.mn@gmail.com', '11611531cc390b3d047142569042fca3', 'content;comment;category;poll;banner;client;page;feedback;admin;menu', '', '2015-07-24 08:02:52', 0, 1, 0, '2011-02-05 13:04:13', '2014-12-12 04:37:08', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'filled with path',
  `target` tinyint(1) NOT NULL COMMENT '0-self, 1-blank',
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'defined in constants',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sort` int(11) NOT NULL,
  `nb_views` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_featured` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`),
  KEY `position` (`position`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `path`, `mobile_img`, `ext`, `link`, `route`, `target`, `position`, `start_date`, `end_date`, `sort`, `nb_views`, `is_active`, `is_featured`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(2, 'b5e8c29a3ef264c33b5d33a75d650ffa62fc60b9.jpg', '', 'jpg', 'http://baavar.mn/advertisement.htm', 'b5e8c29a3ef264c33b5d33a75d650ffa62fc60b9-jpg', 1, 'header', '0000-00-00', '0000-00-00', 100, 0, 1, 0, '2015-05-14 01:12:43', '2015-01-02 03:41:12', 1, 1),
(3, 'f2132b0bf2df6d635d59e7218f297a8ba1ef1342.jpg', '', 'jpg', 'http://www.agaar.mn/index', 'f2132b0bf2df6d635d59e7218f297a8ba1ef1342-jpg', 1, 'home-top', '2015-01-02', '2015-01-31', 100, 0, 0, 0, '2015-05-14 01:11:11', '2015-05-14 01:09:01', 1, 1),
(4, '1bc5f5cc0331d7f734a9b81bc29d7b728073c1d9.swf', 'f332ac6d11eb2e6acc9878cb664595f4e554d6e0.png', 'swf', 'http://baavar.mn/advertisement.htm', '1bc5f5cc0331d7f734a9b81bc29d7b728073c1d9-swf', 1, 'right-top', '2015-01-13', '2015-01-13', 100, 0, 1, 0, '2015-01-12 20:56:30', '2015-01-12 20:56:30', 1, 1),
(5, '745590b43f2c0b6f02f8fa421b1394f0bb7ac125.png', '', 'png', 'http://etop.mn/', '745590b43f2c0b6f02f8fa421b1394f0bb7ac125-png', 1, 'right-middle', '0000-00-00', '0000-00-00', 100, 0, 1, 0, '2015-05-14 19:17:40', '2015-05-14 19:17:40', 2, 2),
(6, '96aa59b901852a01da3a2e9845289dc0dc0d2b04.jpg', '', 'jpg', 'http://baavar.mn/t/turul-buriin-bayart-zoriulsan-amtat-byaluunii-zahialga.htm', '96aa59b901852a01da3a2e9845289dc0dc0d2b04-jpg', 1, 'middle1', '0000-00-00', '0000-00-00', 100, 0, 1, 0, '2015-05-14 01:32:35', '2015-05-14 01:32:35', 2, 2),
(7, 'c763de4e2dfdde175e09042bd25373fa090a0e47.jpg', '', 'jpg', 'http://baavar.mn/advertisement.htm', 'c763de4e2dfdde175e09042bd25373fa090a0e47-jpg', 1, 'middle2', '0000-00-00', '0000-00-00', 100, 0, 0, 0, '2015-04-07 05:54:34', '2015-01-02 03:51:50', 2, 2),
(8, '3d25cba5e3aa13e6796cc8dec530aeb7be9c9c2e.jpg', '', 'jpg', 'http://baavar.mn/advertisement.htm', '3d25cba5e3aa13e6796cc8dec530aeb7be9c9c2e-jpg', 1, 'footer', '0000-00-00', '0000-00-00', 100, 0, 1, 0, '2015-01-18 00:54:45', '2015-01-18 00:54:45', 1, 1),
(9, 'aec51eda66a08053e6d83f9396c8e4ccbf157158.swf', '', 'swf', '', 'aec51eda66a08053e6d83f9396c8e4ccbf157158-swf', 1, 'floating', '0000-00-00', '0000-00-00', 100, 0, 0, 0, '2014-12-25 18:09:22', '2014-12-25 18:09:22', 1, 1),
(10, 'a7854e770c1df8556785c20bd87c9c5c75fba215.jpg', '', 'jpg', 'http://baavar.mn/advertisement.htm', 'a7854e770c1df8556785c20bd87c9c5c75fba215-jpg', 1, 'middle3', '0000-00-00', '0000-00-00', 100, 0, 0, 0, '2015-03-04 06:32:32', '2015-01-02 03:30:52', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'not used in url yet',
  `sort` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `route` (`route`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `route`, `sort`, `is_active`, `updated_at`, `created_at`, `created_aid`, `updated_aid`) VALUES
(36, 'Сагсан бөмбөг', 'sagsan-bumbug', 100, 1, '2015-07-23 22:02:47', '2015-07-24 05:02:47', 2, 2),
(37, 'Хөл бөмбөг', 'hul-bumbug', 99, 1, '2015-07-23 22:03:06', '2015-07-24 05:03:06', 2, 2),
(38, 'Үндэсний бөх', 'undesnii-buh', 98, 1, '2015-07-23 22:03:37', '2015-07-24 05:03:37', 2, 2),
(39, 'Жүдо', 'judo', 97, 1, '2015-07-23 22:04:23', '2015-07-24 05:04:23', 2, 2),
(40, 'Бокс', 'boks', 96, 1, '2015-07-23 22:04:59', '2015-07-24 05:04:59', 2, 2),
(41, 'Сумо', 'sumo', 95, 1, '2015-07-23 22:05:43', '2015-07-24 05:05:43', 2, 2),
(42, 'Буудлага', 'buudlaga', 93, 1, '2015-07-23 22:06:59', '2015-07-24 05:06:12', 2, 2),
(43, 'Moтoр спорт', 'motor-sport', 94, 1, '2015-07-23 23:45:27', '2015-07-24 05:06:47', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category_content`
--

CREATE TABLE IF NOT EXISTS `category_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `content_id` (`content_id`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `category_content`
--

INSERT INTO `category_content` (`id`, `category_id`, `content_id`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 37, 129, '2015-07-24 05:08:38', '0000-00-00 00:00:00', 2, 2),
(4, 36, 132, '2015-07-24 06:11:17', '0000-00-00 00:00:00', 2, 2),
(5, 41, 131, '2015-07-24 06:35:06', '0000-00-00 00:00:00', 2, 2),
(6, 39, 130, '2015-07-24 06:35:35', '0000-00-00 00:00:00', 2, 2),
(8, 38, 133, '2015-07-24 06:38:20', '0000-00-00 00:00:00', 2, 2),
(9, 42, 134, '2015-07-24 06:40:38', '0000-00-00 00:00:00', 2, 2),
(10, 40, 135, '2015-07-24 06:42:33', '0000-00-00 00:00:00', 2, 2),
(11, 43, 136, '2015-07-24 06:46:44', '0000-00-00 00:00:00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `logo`, `sort`, `is_active`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(2, 'c661f0eb0f65f3ffc4b0d5b71da9f9d706cd17fb.png', 100, 1, '2014-12-12 18:54:34', '2014-12-12 10:54:34', 1, 1),
(4, 'f507f3a1e4a0194174e2d037c75b54e4c9eaa27a.png', 100, 0, '2014-12-15 04:17:18', '2014-12-12 10:55:37', 1, 1),
(6, 'beaf70b2bc1e7c6e9c7ba96aaf1386cc631ff60d.png', 100, 1, '2014-12-12 18:56:44', '2014-12-12 10:56:44', 1, 1),
(7, '13ba070d9d2cdddd27007750c20139140fa43029.png', 100, 1, '2014-12-12 18:57:09', '2014-12-12 10:57:09', 1, 1),
(8, '6fbe0e45f6740b71732404bae6729658daf23f50.png', 100, 1, '2014-12-12 18:57:32', '2014-12-12 10:57:32', 1, 1),
(10, 'aef209b57b63f91910fc0209fa113ecde0a4e3cf.gif', 100, 1, '2014-12-12 07:10:41', '2014-12-12 07:10:41', 2, 2),
(11, '5272c62cb7b3e293b5360ebecb275b631a8ea247.png', 100, 1, '2014-12-17 08:29:52', '2014-12-17 08:29:52', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `avator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `nb_like` int(11) NOT NULL DEFAULT '0',
  `nb_unlike` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `object_type` (`object_type`),
  KEY `object_id` (`object_id`),
  KEY `ip_address` (`ip_address`),
  KEY `name` (`name`),
  KEY `nb_love` (`nb_like`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `route` varchar(1000) NOT NULL,
  `cover` varchar(1000) NOT NULL,
  `intro` text,
  `body` text,
  `source` varchar(1000) DEFAULT NULL,
  `source_link` varchar(1000) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `nb_views` int(11) DEFAULT '0',
  `nb_love` int(11) NOT NULL DEFAULT '0',
  `nb_comment` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `is_top` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `ask18` tinyint(1) NOT NULL,
  `post_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `route` (`route`(255)),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `route`, `cover`, `intro`, `body`, `source`, `source_link`, `sort`, `nb_views`, `nb_love`, `nb_comment`, `is_active`, `is_new`, `is_top`, `is_featured`, `ask18`, `post_at`, `created_at`, `updated_at`, `created_aid`, `updated_aid`, `keywords`) VALUES
(129, 'Ливерпүүл клуб Кристиан Бентекэг танилцууллаа', 'livyerpuul-klub-kristian-byentyekeg-taniltsuullaa', '/u/201507/t600-84cb5cba67553a5ac943bcb62ec46345d5096d85.jpg', 'Английн премьерлигийн Ливерпүүл клуб Бельги довтлогч Кристиан Бентекэг 32.5 сая паундаар дуусгалаа.', 'Улаанууд довтлогч Рахим Стерлингийг Манчестер Сити клуб рүү 49 сая паундаар явуулаад байсан. Улмаар түүний оронд Астон Вилла клубын довтлогч Кристиан Бентекэг нэгтгэж байгаа юм. Кристиан Бентекэ одоо 25 настай Бельгийн шилдэг довтлогчдын нэг бөгөөд “Би энд ирсэндээ үнэхээр их баяртай байна. Би энд цом хүртэхийн төлөө ирсэн. Мөн багийнхныхаа хамтаар том зорилтуудад хүрэхийн төлөө ирсэн. Би баяртай байна” гэжээ. Кристиан Бентекэ ийнхүү Ливерпүүлийн хувьд хоёр дахь өндөр үнэтэй наймаа болж байна. Тэд өмнө нь Нью Кастлын довтлогч Энди Кэрролын төлөө 35 сая паунд зарцуулсан нь клубын түүхэн дэх хамгийн өндөр үнэтэй наймаа болсон билээ. ', '', '', 1, 3, 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-07-24 05:08:38', '0000-00-00 00:00:00', 2, 2, ''),
(130, 'Манай таван жүдоч Тайванийг зорино', 'manai-tavan-judoch-taivaniig-zorino', '/u/201507/t600-785390d31307d49f2834d4e7664b2db2f1364431.jpg', 'Монголын Жүдо Бөхийн Холбооны тамирчид Тайван улсад ээлжит тэмцээндээ оролцох гэж байна.\r\n ', '\r\nМанай жүдочид энэ сарын 25, 26-нд Тайваний нийслэл Тайпей хотноо болох "Asian Judo Open" буюу Азийн нээлттэй тэмцээнд оролцох юм. Тус тэмцээнд манай улсаас эрэгтэйчүүдийн 66 кг-д 2015 оны УАШТ-ий хүрэл медальт Мөнхтөрийн Ганболд болон өнгөрсөн сард ОХУ-ын Минусинск хотноо болсон ОУТ-ээс хүрэл медаль хүртсэн Баттогтохын Эрхэмбаяр нар өрсөлдөх юм.\r\n\r\nХарин эмэгтэйчүүдийн 48 кг-д 2015 оны улсын аварга Эрдэнэцогтын Гэрэлмаа, 57 кг-д Баярбатын Баасанжаргал нар барилдах бөгөөд тэдэнтэй хамт хашир туршлагатай мастер Пүрэвжаргалын Лхамдэгд Тайванийг зорих юм.', '', '', 1, 1, 0, 0, 1, 0, 1, 1, 0, '0000-00-00 00:00:00', '2015-07-24 06:05:29', '0000-00-00 00:00:00', 2, 2, ''),
(131, 'Ёкозүно Хакүхогийн наадамд олон зочид уригдана', 'yokozuno-hakuhogiin-naadamd-olon-zochid-urigdana', '/u/201507/t600-4f338654169bb4a5674cb711c972ba67d41dcaa2.jpg', 'Хакүхо Мөнхбатын Даваажаргал Олимпийн мөнгөн медальт бөх, аав Жигжидийн Мөнхбатын адил Монгол Улсын хөдөлмөрийн баатар болов. ', '2015.02.17. Улаанбаатар хот\r\n Японы хэвлэлүүд Хакүхо аваргыг эх орондоо очиж, Монгол Улсын Хөдөлмөрийн баатар цолондоо хүндэтгэл үзүүлэх наадам, хүлээн авалт хийх гэж байгаа тухай мэдээлж байна.\r\n\r\nСануулахад, Монгол Улсын Ерөнхийлөгч Ц.Элбэгдорж өнгөрсөн хоёрдугаар сард Монгол Улсын Хөдөлмөрийн баатар цолыг мэргэжлийн сүмо бөхийн ёкозүно, сүмогийн оргил дээд амжилтын эзэн Мөнхбатын Даваажаргалд олгосон юм.\r\n Төрийн ордонд болсон Хөдөлмөрийн баатар цол олгох ёслол дээр Ерөнхийлөгч сүмо бөхийн 29 настай супер аваргыг мэргэжлийн сүмогийн дөрвөн дээд амжилтын эзэн болоод байгааг онцлон тэмдэглэж байв.\r\n\r\nЯпоны хэвлэлүүдийн мэдээлснээр Их аварга Хакүхо М.Даваажаргал долдугаар сарын 27-нд эх орондоо ирж, ёслолын цайллага, наадам хийх бололтой. Гэхдээ хугацааны хувьд өөр өөрөөр мэдээлж байгаа ч ихэнх хэвлэл долдугаар сарын 29-нд энэхүү шинэ цолны хүндэтгэлийн ёслол болно гэж бичжээ.\r\n\r\nИх аварга Хакүхо М.Даваажаргал долдугаар сарын тэмцээнийг ёкозүна Какүрюү М.Анандын хамт тэргүүлж байгаа билээ.', '', '', 1, 0, 0, 0, 1, 0, 1, 1, 0, '0000-00-00 00:00:00', '2015-07-24 06:08:52', '0000-00-00 00:00:00', 2, 2, ''),
(132, 'Өсвөрийн сагсчид Леброн Жеймсийн төрөлх нутгийг зорино', 'usvuriin-sagschid-lyebron-jyeimsiin-turulh-nutgiig-zorino', '/u/201507/t600-ada28527801d51bee408953c19e641fffe754779.jpg', 'АНУ-ын Клевленд хотноо “Cleveland Cavaliers” багийн ивээл дор жил бүр уламжлал болон зохион байгуулагддаг ОУ-ын Хүүхдийн Континентал Кап тэмцээнд оролцох Монголын өсвөрийн баг тамирчид долоодугаар сарын 1-нд буюу маргааш АНУ-ыг зориход бэлэн боллоо.', ' Монголын өсвөрийн баг тамирчид энэхүү тэмцээнд гурав дахь жилээ оролцож байгаа баг 2013 онд U14 насны шигшээ баг, 2014 онд U13, U15 насны эмэгтэй, U13, U15, U18насны эрэгтэй насны ангилалаар 5-н баг 60 гаруй хүний бүрэлдэхүүнтэйгээр амжилттай оролцсон билээ.\r\n2014 оны тэмцээнд эмэгтэй баг хүрэл медаль хүртсэн бол эрэгтэй багууд 5, 9, 11-р байруудад шалгарсан амжилттай оролцсон.\r\n\r\n\r\n2015 онд бага нас, ахлах насны ангилалаар эрэгтэй 2 баг, эмэгтэй нэг баг оролцохоор болж бэлтгэл сургуулилтаа ханган 30 гаруй хүний бүрэлдэхүүнтэй АНУ-ыг зорих гэж байна.\r\n\r\n\r\nДэлхийн 31 улсын 5100 гаруй тамирчид спортын 3 төрлөөр өрсөлддөг энэхүү тэмцээнд Монголын өсвөрийн баг тамирчид жил бүр оролцон туршлага солилцсоноор ур чадвараа дээшлүүлэхэд томоохон түлхэц болдог.\r\n\r\n\r\nМҮСБХ-ноос өсвөрийн тамирчдаа бэлтгэн энэхүү наадамд оролцуулан, ирээдүйд НБА-д оролцох зорилго тавин хичээллэж буй үе тэнгийн тамирчидтай өрсөлдөж байгаа манай өсвөрийн тамирчид Монголынхоо одоо цагийн өсвөр үеийн шилдэг тамирчдаар зүй ёсоор нэрлэгдэж ирээдүйд ч сагсан бөмбөгийн хөгжлийн өнгө төрхийг тодорхойлох шилдэг тамирчид юм.', '', '', 1, 0, 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-07-24 06:11:17', '0000-00-00 00:00:00', 2, 2, ''),
(133, 'Аварга А.Сүхбат Увсын наадмын хоёрын даваанд тахимаа өгчээ', 'avarga-a-suhbat-uvsiin-naadmiin-hoyoriin-davaand-tahimaa-ugchee', '/u/201507/t600-b32a4770c654224e54898f31b69bf255a6484554.jpg', 'Увс аймаг байгуулагдсаны түүхт 90 жилийн ойн баяр наадмын бөхийн барилдаан өчигдөр эхэлсэн юм.', 'Уг барилдааны зүүний тэргүүнд дархан аварга А.Сүхбатыг гарч барилдана гэж байсан ч барилдаан эхлэхэд тэрээр талбайд гараагүй юм. Харин тэрээр хоёрын даваанаас Увс аймагт хүрэлцэн очиж барилджээ.  Тэрээр өчигдөр үдээс хойш Увс аймагт онгоцоор очин ийнхүү шууд баяр наадмын талбайд гарч барилдсан юм.\r\nАварга А.Сүхбат хоёрын даваанд сумын заан н.Лхамхүүтэй барилдаж байгаад тахимаа өгсөн байна.', '', '', 1, 0, 0, 0, 1, 0, 1, 1, 0, '0000-00-00 00:00:00', '2015-07-24 06:37:12', '0000-00-00 00:00:00', 2, 2, ''),
(134, 'О.Гүндэгмаа ”Дэлхийн цом”-оос мөнгөн медаль хүртлээ', 'o-gundegmaa-', '/u/201507/t600-c5411670cd5f26cc814eb3432d8707e961018744.jpg', 'АНУ-ын Форт Бинен хотод зохиогдож буй 2016 оны олимпийн эрх олгох буудлага спортын Дэлхийн цомын аварга шалгаруулах тэмцээний хийн гар бууны 10 метрийн дасгалд манай тамирчин О.Гүндэгмаа мөнгөн медаль хүртлээ.', 'Тэрээр 384 оноогоор 8-р байраар финалд шалгарч, улмаар финалд амжилттай буудаж, мөнгөн медаль хүртсэн байна. Энэ дасгалд нийт 91 буудагч өрсөлдсөнөөс Болгарын буудагч, "Дэлхийн цом"-ын аварга Бонева Антонита түрүүлж, Грекийн залуу буудагч Анна Коракаки хүрэл медаль хүртжээ. Манай тамирчин, ОУХМ Т.Баярцэцэг 383 оноогоор 13-р байрт бичигджээ. О.Гүндэгмаа энэ удаагийн дэлхийн цомын 25 метрийн спорт гар бууны төрөлд алтан медаль хүртсэнээр Рио-2016 олимпийг зорих эрхээ өвөртлөөд байгаа билээ.', '', '', 1, 0, 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-07-24 06:40:38', '0000-00-00 00:00:00', 2, 2, ''),
(135, 'Амир Хан: Майвэдертэй тулалдахад бэлэн', 'amir-han-maivedyertei-tulaldahad-belen', '/u/201507/t600-f0e41744e02909e6bee246eccbb13b1c6e47ca7b.jpg', 'Өнгөрсөн амралтын өдрүүдэд болсон мэргэжлийн боксын зууны шилдэг тулаан гэх Флод Майвэдер болон Мэнни Пакьяо нарын өрсөлдөөнд Флод Майвэдер ялалт байгуулсан.', 'Тэрээр ялсныхаа дараа рингэн дээрээс есдүгээр сард дараагийн тулаанаа хийх бөгөөд Британийн шилдэг боксчин Амир Ханыг дуэльд дуудсан юм.\r\nХарин Амир Хан түүнтэй тулалдахад бэлэн гэдгээ мэдэгджээ. 28 настай боксчин Амир Хан хэлэхдээ “Есдүгээр сарын дунд үеэр тулалдахад түүний хувьд яг л боломжийн хугацаа гэж бодож байна. Би түүнд бэлтгэлээ хийх, бас амрахад нь хангалттай хугацаа өгье. Тэгээд тулаан болох болно” гэсэн байна.', '', '', 1, 1, 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-07-24 06:42:33', '0000-00-00 00:00:00', 2, 2, ''),
(136, 'Мотоциклийн бартаат замын уралдаан болно', 'mototsikliin-bartaat-zamiin-uraldaan-bolno', '/u/201507/t600-5054d42ee3cff7e5a3ba8711a684993e5e9789f2.jpg', 'Монголын автомашин, мотоциклийн спортын холбоо, "Speed" авто, мото клубээс хамтран мотоциклийн бартаат замын "ЭНДУРО" цуврал уралдаан зохион байгуулахаар болжээ.', 'Уралдааны эхний шат тавдугаар сарын 9-нд Ар гүнтэд болох аж. Харин өнөөдөр уралдааны техникийн зөвлөгөөн МҮОХ-ын хурлын танхимд болж, баг тамирчдад мэдээлэл өгөх юм байна.', '', '', 1, 2, 0, 0, 1, 0, 0, 0, 0, '0000-00-00 00:00:00', '2015-07-24 06:46:44', '0000-00-00 00:00:00', 2, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `organization`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'MobiCom', 'Dulamkhand B', 'handaa.1224@gmail.com', '99071053', 'test', '2014-11-25 09:55:29'),
(2, 'Firewall Solution', 'Dulamkhand B', 'handaa.1224@gmail.com', '99071053', 'test', '2014-11-27 09:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `iscover` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `folder` (`folder`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `content_id`, `folder`, `filename`, `description`, `iscover`, `sort`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 129, '201507', '84cb5cba67553a5ac943bcb62ec46345d5096d85.jpg', '', 1, 1, '2015-07-24 05:09:24', '2015-07-23 22:09:24', 2, 2),
(2, 130, '201507', '785390d31307d49f2834d4e7664b2db2f1364431.jpg', '', 1, 1, '2015-07-24 06:05:51', '2015-07-23 23:06:30', 2, 2),
(3, 131, '201507', '4f338654169bb4a5674cb711c972ba67d41dcaa2.jpg', '', 1, 1, '2015-07-24 06:09:38', '2015-07-23 23:09:38', 2, 2),
(4, 132, '201507', 'ada28527801d51bee408953c19e641fffe754779.jpg', '', 1, 1, '2015-07-24 06:11:38', '2015-07-23 23:11:38', 2, 2),
(6, 133, '201507', 'b32a4770c654224e54898f31b69bf255a6484554.jpg', '', 1, 1, '2015-07-24 06:38:03', '2015-07-23 23:38:39', 2, 2),
(7, 134, '201507', 'c5411670cd5f26cc814eb3432d8707e961018744.jpg', '', 1, 1, '2015-07-24 06:41:14', '2015-07-23 23:41:14', 2, 2),
(8, 135, '201507', 'f0e41744e02909e6bee246eccbb13b1c6e47ca7b.jpg', '', 1, 1, '2015-07-24 06:42:52', '2015-07-23 23:42:52', 2, 2),
(9, 136, '201507', '5054d42ee3cff7e5a3ba8711a684993e5e9789f2.jpg', '', 1, 1, '2015-07-24 06:47:01', '2015-07-23 23:47:01', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `love`
--

CREATE TABLE IF NOT EXISTS `love` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `object_type` (`object_type`),
  KEY `object_id` (`object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `route`, `name`, `is_active`, `sort`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 'biznyes', 'Бизнес', 1, 96, '2015-07-23 03:40:56', '2015-07-23 20:48:42', 1, 1),
(2, 'ediin-zasag', 'Эдийн засаг', 1, 93, '2015-07-23 03:40:56', '2015-07-23 20:47:52', 1, 1),
(3, 'niigem', 'Нийгэм', 1, 92, '2015-07-23 03:41:42', '2015-07-23 20:47:32', 1, 1),
(4, 'sport', 'Спорт', 1, 95, '2015-07-23 03:41:42', '2015-07-23 20:48:30', 1, 1),
(5, 'olon-uls', 'Олон улс', 1, 94, '2015-07-23 03:42:20', '2015-07-23 20:48:07', 1, 1),
(6, 'sonin-hachin', 'Сонин хачин', 1, 97, '2015-07-23 03:42:20', '2015-07-23 20:48:55', 1, 1),
(7, 'uls-tur', 'Улс төр', 1, 91, '2015-07-23 03:43:09', '2015-07-23 20:47:20', 1, 1),
(8, '18', '18+', 1, 90, '2015-07-23 03:43:09', '2015-07-23 20:46:05', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`),
  KEY `created_at` (`created_at`),
  KEY `updated_at` (`updated_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `type`, `title`, `intro`, `image`, `content`, `is_active`, `sort`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 'about', 'Вэбийн тухай', 'Mанай сайт нь 2015 оны 1-р сарын 1-с эхэлж үйл ажиллагаагаа явуулж эхэлсэн билээ. Дэлхий дахины сонин содон сонирхолтой мэдээллийг гэрэл зургаар цаг алдахгүй хүргэх, Монголын нийгэмд болж буй мэдээллийг нэг цэгээс хурдан шуурхай дамжуулах, авъяаслаг залуусыгаа бусдад таниулах, тэдний бүтээлийг дэмжих зорилгоор ажиллаж байна.', '', 'Монгол улсын интернэт хэрэглэгчид бүх аймаг, сум, хот дүүрэг болон дэлхийн өнцөг булан бүрээс манай сайт руу хандаж байгаагаас гадна үйл ажиллагаа явуулж эхэлсэн цагаас өнөөг хүртэлх хугацаанд олон төрлийн шинэ соргог, хүртээмжтэй салбаруудыг сайтад нэмж ажиллагаанд оруулсаар байгаа нь манай сайтыг хэрэглэгчдийн тоог өдрөөс өдөрт тасралтгүй өсөн нэмэгдүүлж байна. \r\n\r\nwww.baavar.mn сайт нь мэдээллийн цар хүрээгээ өргөжүүлэн тэлж одоогоор Мэдээ, Дуу хөгжим, Видео, Бүлэг, Үйл явдал, Санал асуулга, Тоглоом, Зарлал, Форум, Онигоо, Блог, Галерей, Сорил, Кино зэрэг олон салбар чиглэлээр мэдээ мэдээлэл, контентуудыг өдөр тутам интернэтийн сүлжээгээр дэлхий даяар цацаж байна. Энэ мэдээ танд таалагдаж байвал найзууддаа хуваалцаарай.', 1, 100, '2014-12-04 23:22:32', '2014-12-04 16:26:28', 1, 1),
(2, 'advertisement', 'Сурталчилгаа байршуулах', '<b>Сурталчилгаа байршуулах</b>\r\nА: 200''000₮ /өдрийн/\r\nB: 200''000₮ /өдрийн/\r\nC: 200''000₮ /өдрийн/\r\nD: 150''000₮ /өдрийн/\r\nE: 200''000₮ /өдрийн/\r\nF: 150''000₮ /өдрийн/\r\nG: 150''000₮ /өдрийн/\r\nH: 150''000₮ /өдрийн/\r\nI: 150''000₮ /өдрийн/\r\n\r\n<b>Спонсор мэдээ нийтлэх</b>\r\nТОП мэдээ: 300''000₮ /өдрийн/\r\nОНЦЛОХ мэдээ: 200''000₮ /өдрийн/\r\nЭНГИЙН мэдээ: 100''000₮ /өдрийн/\r\n\r\n<i>Энэхүү үнэ тарифт НӨАТ багтсан болно.</i>', 'ea3d01cb2b14cae341e351e2451023795c733bf9.png', 'Сайтын статистик судалгаа.\r\nӨдрийн давхардаагүй хандалт. ~50 000 хэрэглэгч хандаж,\r\nДавхардсан тоогоор. ~300 000 хуудас дуудагдаж байна.\r\n\r\n\r\nХөнгөлөлт. \r\nХэрвээ танай байгууллага урт хугацаагаар реклам, баннер байршуулах тохиолдолд өдрийн үнээс хямдрах болно.\r\nЖишээ нь. Нэг сараас дээш хугацаатай баннер байршуулах бол тухайн байрлалын өдрийн үнээс 5000 хасах, харин 6 сараас дээш бол 10000 төгрөг хөнгөлөх бөгөөд сард 2 удаа PR мэдээ оруулах эрх олгоно.\r\n\r\nДавуу тал. \r\nМанай дээрх баннеруудын харагдах байдал, хэмжээ нь хаана ч байхгүй тийм том орон зайг таны бизнес мэдээллийн талбарт зориулдаг бөгөөд баннерууд солигдохгүй, зөвхөн таны баннер заасан хугацаанд давуу эрхтэй байрлах болно.', 1, 100, '2014-12-04 23:22:32', '2014-12-14 13:16:39', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `options_addable` tinyint(1) NOT NULL,
  `multiple_choice` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `item_id`, `title`, `route`, `body`, `options_addable`, `multiple_choice`, `sort`, `is_active`, `is_featured`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 0, 'Агаарын бохирдлын үндэсний хороо байх нь зөв үү?', 'agaariin-bohirdliin-undesnii-horoo-baih-n-zuv-uu', '', 0, 0, 100, 0, 0, '2014-12-10 05:48:48', '2014-12-20 06:57:48', 1, 1),
(2, 0, 'Та тэтгэвэртээ гарвал юу хийнэ гэж боддог вэ', 'ta-tetgevertee-garval-yuu-hiine-gej-boddog-ve', '', 0, 0, 100, 1, 1, '2014-12-20 07:15:47', '2015-05-21 01:49:51', 2, 2),
(3, 0, 'Таны амьжиргааны түвшин ямар байна?', 'tanii-am-jirgaanii-tuvshin-yamar-baina', '', 0, 0, 100, 1, 0, '2015-01-09 22:57:27', '2015-05-21 01:46:23', 2, 2),
(4, 0, 'Та хөгширсөн хойноо юу хийнэ гэж төсөөлдөг вэ?', 'ta-hugshirsun-hoinoo-yuu-hiine-gej-tusuuldug-ve', '', 0, 0, 100, 1, 0, '2015-05-21 01:50:33', '2015-05-21 02:15:30', 2, 2),
(5, 0, 'Хэн хамгийн сайн дуулдаг вэ?', 'hen-hamgiin-sain-duuldag-ve', '', 0, 0, 100, 1, 0, '2015-06-02 19:35:38', '2015-06-02 19:36:05', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `poll_option`
--

CREATE TABLE IF NOT EXISTS `poll_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nb_vote` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `poll_id` (`poll_id`),
  KEY `user_id` (`user_id`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `poll_option`
--

INSERT INTO `poll_option` (`id`, `poll_id`, `body`, `image`, `nb_vote`, `user_id`, `ip`, `is_active`, `sort`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 1, 'Зөв', 'fce66ce64690c0283eb6bfe850e66469bb223657.jpg', 3, 1, '124.158.94.35', 1, 100, '2014-12-20 06:12:03', '2015-01-06 22:46:16', 1, 1),
(2, 1, 'Буруу', '08a67c795cad362cd8ec2e8e8711e3d476649999.jpg', 8, 1, '124.158.94.35', 1, 100, '2014-12-20 06:12:11', '2015-01-06 22:45:58', 1, 1),
(3, 1, 'Мэдэхгүй байна', '594b56f00434e63da268272acb2c33c54fc22ee0.jpg', 6, 1, '124.158.94.35', 1, 100, '2014-12-20 06:12:29', '2015-01-06 22:45:43', 1, 1),
(5, 2, 'Mozilla \r\n', '', 78, 2, '122.201.21.117', 1, 100, '2014-12-20 07:17:29', '2014-12-20 07:18:44', 2, 2),
(6, 2, 'Chrome', '', 105, 2, '122.201.21.117', 1, 100, '2014-12-20 07:19:29', '2014-12-20 07:19:29', 2, 2),
(7, 2, 'Байрны гадаа хөзөр даалуу нүднэ дээ', '', 58, 2, '124.158.94.35', 1, 100, '2014-12-20 07:19:49', '2015-05-21 01:48:52', 2, 2),
(8, 3, 'Сайн', 'b8e5dd4a29f146b0088ea597743a080a113c1b8b.jpg', 78, 2, '124.158.94.35', 1, 99, '2015-01-09 23:00:34', '2015-04-16 18:20:22', 2, 2),
(10, 3, 'Дунд зэрэг', '6eff0e1875c748eb901b4248fe5edae74c807a54.jpg', 159, 2, '124.158.94.35', 1, 3, '2015-01-18 19:42:55', '2015-04-16 18:18:53', 2, 2),
(11, 3, 'Маш сайн', '5a2a76156ddd740016cba6269a2d2a70c3a55c3f.png', 136, 2, '124.158.94.35', 1, 100, '2015-01-18 19:46:36', '2015-04-16 18:21:22', 2, 2),
(12, 3, 'Муу', '75f24305f3ad5a5612cfa09a336bf509cbebc724.png', 115, 2, '124.158.94.35', 1, 2, '2015-04-16 18:19:57', '2015-04-16 18:22:05', 2, 2),
(13, 3, 'Маш муу', '772ed5e35547b87f0f47838d076782daf075a3e0.jpg', 71, 2, '124.158.94.35', 1, 1, '2015-04-16 18:21:49', '2015-04-16 18:22:15', 2, 2),
(14, 4, 'Байрны гадаа хөзөр даалуу нүднэ дээ', 'ef344b5c6f6b9dd6524df63adbdde39a16c15433.jpg', 35, 2, '124.158.94.35', 1, 100, '2015-05-21 01:53:33', '2015-05-21 01:53:33', 2, 2),
(15, 4, 'Хөдөө гарч мал маллана', '0db2968e2b57aa15b8072ce0265459d57d8a1fc4.jpg', 52, 2, '124.158.94.35', 1, 100, '2015-05-21 01:55:01', '2015-05-21 01:55:01', 2, 2),
(16, 4, 'Газар олж хашаа хатгаад төмс ногоо тарина ', '3a07fd3d2add1a979c41b43fb630f246e9caa1de.jpg', 79, 2, '124.158.94.35', 1, 100, '2015-05-21 01:59:31', '2015-05-21 01:59:31', 2, 2),
(17, 4, 'Бодибилдингээр хичээллэнээ', '2460885e9b35e3f4136c1f3fb36eb54d61713096.jpg', 188, 2, '124.158.94.35', 1, 100, '2015-05-21 02:07:38', '2015-05-21 02:07:39', 2, 2),
(18, 4, 'Юу ч хийхгүй гэртээ зурагт үзээд байж байна', '3aaee01c9b75c00efc92923387590baeca78dc32.jpg', 43, 2, '124.158.94.35', 1, 100, '2015-05-21 02:08:21', '2015-05-21 02:08:21', 2, 2),
(19, 4, 'Үр ач нараа өсгөнө', 'c7cfb0d164c034ae7680a0459c9c1954d565b8eb.jpg', 42, 2, '124.158.94.35', 1, 100, '2015-05-21 02:11:38', '2015-05-21 02:11:38', 2, 2),
(20, 5, 'Ариунаа', 'ff107e6ca194507b087182c427a13dcccee1051e.jpg', 30, 2, '124.158.94.35', 1, 100, '2015-06-02 19:36:30', '2015-06-02 19:48:09', 2, 2),
(21, 5, 'Болд', '385308f2ba0de10afb99e66826af4f8410ef8649.jpg', 10, 2, '124.158.94.35', 1, 100, '2015-06-02 19:36:47', '2015-06-02 19:36:47', 2, 2),
(22, 5, 'Баярцэцэг', '10d5a07cd40d9e5cbcfc8a4612f210af4a83c06b.jpg', 30, 2, '124.158.94.35', 1, 100, '2015-06-02 19:37:04', '2015-06-02 19:37:04', 2, 2),
(23, 5, 'Лхагваа', '89f00bb014ac893ca6a521c5fac454f421fa3c72.jpg', 77, 2, '124.158.94.35', 1, 100, '2015-06-02 19:37:44', '2015-06-02 19:37:44', 2, 2),
(26, 5, 'Жавхлан', '877ffca51fe0d713467bf3f725652b062dd5b9e5.jpg', 79, 2, '124.158.94.35', 1, 100, '2015-06-02 19:44:32', '2015-06-02 19:44:32', 2, 2),
(27, 5, 'Дэлгэрмөрөн', '43c7c2eb116ba347fa2f3b8bee50ccfb25b51a01.jpg', 12, 2, '124.158.94.35', 1, 100, '2015-06-02 19:45:22', '2015-06-02 19:45:22', 2, 2),
(28, 5, 'Амараа', '3a87dfcf76a193a2eb0f7fb9bf5518d8c4881de7.jpg', 26, 2, '124.158.94.35', 1, 100, '2015-06-02 19:48:53', '2015-06-02 19:48:53', 2, 2),
(29, 5, 'Сараа', '741ab90c09d466e4fccab14b933b0b4d2902c3af.jpg', 36, 2, '124.158.94.35', 1, 100, '2015-06-02 19:49:29', '2015-06-02 19:49:29', 2, 2),
(30, 5, 'Наран', 'b472268c9ffe865f3eb79c9be0da41ddf93d9ede.jpg', 51, 2, '124.158.94.35', 1, 100, '2015-06-02 19:49:41', '2015-06-02 19:49:41', 2, 2),
(31, 5, 'Сэрчмаа', '435e453a9c86ef45ea027585b391c8a7676fa638.jpg', 17, 2, '124.158.94.35', 1, 100, '2015-06-02 19:56:34', '2015-06-02 19:56:34', 2, 2),
(32, 5, 'Батчулуун', 'da8efeed53f5939ad7115972d47240070a67f5c8.jpg', 70, 2, '103.229.123.121', 1, 100, '2015-06-03 05:15:11', '2015-06-03 05:15:11', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `poll_option_vote`
--

CREATE TABLE IF NOT EXISTS `poll_option_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `option_id` (`option_id`),
  KEY `user_id` (`user_id`),
  KEY `ip` (`ip`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `logged_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `firstname`, `lastname`, `fullname`, `email`, `mobile`, `avator`, `is_active`, `created_at`, `updated_at`, `logged_at`, `activation_code`, `ip`) VALUES
(1, '11611531cc390b3d047142569042fca3', 'Дуламханд', 'Батжаргал', 'Дуламханд.Батжаргал', 'handaa.1224@gmail.com', '99071053', '48-browser-girl-chrome-icon.png', 1, '2011-02-02 09:04:13', '0000-00-00 00:00:00', '2014-11-16 15:23:46', '', ''),
(7, '11611531cc390b3d047142569042fca3', 'Dulamzaya', 'Batjargal', 'Dulamzaya.Batjargal', 'dulamzaya@yahoo.com', '99099078', '6f64d2ffdde833ded05ddfdb9cb4063aecf061f9.jpg', 1, '2011-12-08 03:39:09', '2013-11-29 16:09:23', '0000-00-00 00:00:00', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `category_content`
--
ALTER TABLE `category_content`
  ADD CONSTRAINT `category_content_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `category_content_ibfk_6` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`),
  ADD CONSTRAINT `category_content_ibfk_7` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `category_content_ibfk_8` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`),
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `image_ibfk_3` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `page_ibfk_2` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
