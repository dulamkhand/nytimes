-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2014 at 07:29 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `baavar`
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `mod_permissions`, `cat_permissions`, `logged_at`, `sort`, `is_active`, `is_featured`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 'handaa.1224@gmail.com', '11611531cc390b3d047142569042fca3', 'content;image;feedback;poll;subs;user;admin', '', '0000-00-00 00:00:00', 0, 1, 0, '2011-02-05 06:04:13', '2014-11-21 02:16:42', 0, 0),
(2, 'arslan@gmail.com', '11611531cc390b3d047142569042fca3', 'item;link;bests', '', '0000-00-00 00:00:00', 0, 1, 0, '2011-02-05 06:04:13', '2014-11-08 12:07:14', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'filled with path',
  `target` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-self, 1-blank',
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'defined in constants',
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
  KEY `position` (`position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `banner`
--


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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `route` (`route`),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `route`, `sort`, `is_active`, `updated_at`, `created_at`, `created_aid`, `updated_aid`) VALUES
(1, 'Авто ертөнц', '', 100, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(2, 'Архитектур', '', 98, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(3, 'Амьтны ертөнц', '', 96, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(4, 'Алдартан', '', 94, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(5, 'Баячууд', '', 92, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(6, 'Байгаль', '', 90, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(7, 'Бизнес', '', 88, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(8, 'Видео', '', 86, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(9, 'Гоо сайхан', '', 84, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(10, 'Дизайн', '', 82, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(11, 'Дуу хөгжим', '', 80, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(12, 'Зөвлөгөө', '', 78, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(13, 'Кино ертөнц', '', 76, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(14, 'Монгол', '', 74, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(15, 'Мэдээлэл', '', 72, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(16, 'Нийгэм', '', 70, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(17, 'Нийтлэл', '', 68, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(18, 'Пөөх!', '', 66, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(19, 'Спорт', '', 64, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(20, 'Сурталчилгаа', '', 62, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(21, 'Технологи', '', 60, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(22, 'Тоглоом', '', 58, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(23, 'Түүх', '', 56, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(24, 'Хоолны ертөнц', '', 54, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(25, 'Хошин шог', '', 52, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(26, 'Хүмүүс', '', 50, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(27, 'Эрүүл мэнд', '', 48, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1),
(28, '+18 эротик', '', 46, 1, '2014-11-21 09:18:54', '0000-00-00 00:00:00', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `category_content`
--

INSERT INTO `category_content` (`id`, `category_id`, `content_id`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(5, 4, 2, '2014-11-21 07:04:42', '0000-00-00 00:00:00', 1, 1),
(6, 10, 2, '2014-11-21 07:04:42', '0000-00-00 00:00:00', 1, 1),
(7, 15, 2, '2014-11-21 07:04:42', '0000-00-00 00:00:00', 1, 1),
(8, 4, 1, '2014-11-21 07:05:49', '0000-00-00 00:00:00', 1, 1),
(9, 5, 1, '2014-11-21 07:05:49', '0000-00-00 00:00:00', 1, 1),
(10, 9, 1, '2014-11-21 07:05:49', '0000-00-00 00:00:00', 1, 1),
(11, 10, 1, '2014-11-21 07:05:49', '0000-00-00 00:00:00', 1, 1),
(16, 18, 4, '2014-11-21 09:59:16', '0000-00-00 00:00:00', 1, 1),
(17, 12, 5, '2014-11-21 10:05:26', '0000-00-00 00:00:00', 1, 1);

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
  `nb_love` int(11) NOT NULL DEFAULT '0',
  `deactivated` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `object_type` (`object_type`),
  KEY `object_id` (`object_id`),
  KEY `ip_address` (`ip_address`),
  KEY `name` (`name`),
  KEY `nb_love` (`nb_love`),
  KEY `deactivated` (`deactivated`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=82 ;

--
-- Dumping data for table `comment`
--


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
  `nb_views` int(11) DEFAULT NULL,
  `nb_love` int(11) NOT NULL DEFAULT '0',
  `nb_comment` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `is_top` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `ask18` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_aid` int(11) NOT NULL,
  `updated_aid` int(11) NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `route` (`route`(255)),
  KEY `created_aid` (`created_aid`),
  KEY `updated_aid` (`updated_aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `route`, `cover`, `intro`, `body`, `source`, `source_link`, `sort`, `nb_views`, `nb_love`, `nb_comment`, `is_active`, `is_new`, `is_top`, `is_featured`, `ask18`, `created_at`, `updated_at`, `created_aid`, `updated_aid`, `keywords`) VALUES
(1, 'Ким Кардашьян Австраличуудыг алмайруулав', 'kim-kardash-yan-avstralichuudiig-almairuulav', '/u/201411/7569d2e5a0ef8fbcfbc570edaea01467176cac62.jpg', 'Онлайн ертөнцийн тачаангуй хатан хаан Ким Кардашьян өөрийн нэрийн үнэртэй усны нээлтэнд оролцохоор Австралийн хоёр дахь том хот болох Мельбурнед зочилсон байна. Өмссөн даашинз нь түүнийг үнэхээр өвөрмөц бөгөөд халуухан харагдуулж байна.', '', '', '', 1, NULL, 0, 0, 1, 0, 1, 1, 1, '2014-11-21 06:17:01', '0000-00-00 00:00:00', 1, 1, ''),
(2, 'Дэлхийн удирдагчдын хөгжилтэй хувцаслалтууд', 'delhiin-udirdagchdiin-hugjiltei-huvtsaslaltuud', '/u/201411/d371ced76d77e5e022354eda203cefb0637f6255.jpg', 'Сүүлийн жилүүдээс эхэлж APEC (Ази Номхон Далайн уулзалт)-ийн уулзалт хаана ямар улсад болно, тухай улсынхаа үндэсний хувцасыг төрийн тэргүүнүүд өмсдөг бичигдээгүй хуультай болсон байна. Тэдний өмссөн өмсгөл Дэлхий дахины анхаарлыг маш ихээр татдаг болсон билээ. Ингээд Олон Улсын уулзалт, айлчлалын үеэр ерөнхийлөгчид хэрхэн хувцасладаг болохыг харцгаая.', '', '', '', 1, NULL, 0, 0, 1, 0, 1, 1, 1, '2014-11-21 06:17:18', '0000-00-00 00:00:00', 1, 1, ''),
(3, 'Бид юу хийж чадах вэ?', '', '', 'Хүн ам олноор суурьших их хотын хувьд агаарын бохирдол бол даван туулах шаардлагатай хөгжлийн томоохон сорилт бөгөөд яг энэ асуудлыг амжилттай даван туулсан бодит жишээ олон байдаг. ', '', '', '', 1, NULL, 0, 0, 0, 0, 0, 0, 0, '2014-11-21 09:30:19', '0000-00-00 00:00:00', 1, 1, ''),
(4, 'Хүний үснээс ч жижиг баримал', 'hunii-usnees-ch-jijig-barimal', '/u/201411/d773637060daf421c37de0c946ad8a8608b180e4.jpg', 'Жонти Гурвиц (Jonty Hurwitz) бол өөрийн өвөрмөц барималуудаараа дэлхий даяар алдартай хэдий ч өөрийн авъяас чадварыг үргэжлүүлэн хөгжүүлсээр байгаа юм. Тэрээр саяхнаас бидний үснээс ч жижиг хэмжээтэй барималыг бүтээж эхэлсэн байна. ', '', '', '', 1, NULL, 0, 0, 1, 0, 0, 0, 0, '2014-11-21 09:55:57', '0000-00-00 00:00:00', 1, 1, ''),
(5, 'Таныг илүү мэргэжлийн, ёс зүйтэй харагдуулах 15 дүрэм', 'taniig-iluu-mergejliin-yos-zuitei-haragduulah-15-durem', '/u/201411/57574dcc381fe3a4a4c2cbb7cfb6c949ca463c06.jpg', 'Ажлын ёс суртахуун гэдэг бол таныг амжилтанд хүргэх гол түлхүүр. Та бусдад мэргэжлийн, ажлаа сайн мэддэг, итгэлтэй нэгэн гэдгээ харуулснаар амьдрал тань эерэгээр сайжирч, үргэлж өөдөө тэмүүлэх болно шүү. Гэхдээ улс орны онцлог зан заншлаас хамаараад мэндэх хэв маяг, үйл хөдлөл зэрэг нь өөр өөр гэдгийг санаарай. ', '', '', '', 1, NULL, 0, 0, 1, 0, 0, 1, 0, '2014-11-21 09:57:57', '0000-00-00 00:00:00', 1, 1, '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `feedback`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `content_id`, `folder`, `filename`, `description`, `iscover`, `sort`, `created_at`, `updated_at`, `created_aid`, `updated_aid`) VALUES
(1, 2, '201411', 'a38eb1e4ef9d27713b83aa5182da013be5d40dac.jpg', '', 0, 1, '2014-11-21 08:32:12', '0000-00-00 00:00:00', 1, 1),
(2, 2, '201411', 'd371ced76d77e5e022354eda203cefb0637f6255.jpg', '1. ОХУ-ын ерөнхий сайд Дмитрий Медведев Зүүн Азийн орнуудын уулзалтын үеэр, Мьянмар, 2014 оны 11 сарын 12.', 1, 1, '2014-11-21 08:35:14', '0000-00-00 00:00:00', 1, 1),
(3, 2, '201411', '8dbead42999c769b45ac13c01c695d386e33c4b8.jpg', '2. ОХУ-ын ерөнхийлөгч Владимир Путин болон Хятадын удирдагч Си Цзиньпин эхнэрийнхээ хамтаар Ази Номхон Далайн уулзалтын үеэр, 2014 оны 11 сарын  10. ', 0, 1, '2014-11-21 08:37:09', '0000-00-00 00:00:00', 1, 1),
(4, 2, '201411', '83da0a9b52bcb07569e7cbc85d9387a71178eb82.jpg', 'Саяхан болж өнгөрсөн Бээжинд болсон APEC-ийн уулзалтын үеэр Путин Хятадын тэргүүн хатагтайн мөрөн дээр алчуур тохож өгч байсан нь нэлээд шуугиан тарьсан юм. Түүний энэ халамжтай байдлыг олон талаас нь янз бүрээр бичих болжээ. ', 0, 1, '2014-11-21 08:43:20', '0000-00-00 00:00:00', 1, 1),
(5, 1, '201411', '7569d2e5a0ef8fbcfbc570edaea01467176cac62.jpg', '', 1, 1, '2014-11-21 08:44:47', '0000-00-00 00:00:00', 1, 1),
(6, 1, '201411', '4b895f3e20205ee71c1463324709abbd2167cd1f.jpg', '', 0, 1, '2014-11-21 09:11:38', '0000-00-00 00:00:00', 1, 1),
(7, 5, '201411', '57574dcc381fe3a4a4c2cbb7cfb6c949ca463c06.jpg', '', 1, 100, '2014-11-21 10:07:33', '0000-00-00 00:00:00', 1, 1),
(8, 5, '201411', 'b93e49414b9d8a2b4e1bd7efbe344d6cf9b89ebf.jpg', '1. Уулзалтын үеэр сандрах хэрэггүй\r\nХуруугаараа товших, хөлөө савчуулах ийш тийш харах зэрэг үйлдлүүд гаргахаас та юун түрүүнд зайлсхийх хэрэгтэй. Хэрэв та сандарч байгаа бол, энэ нь таныг хулчгар нэгэн гэдгийг илтгэнэ.', 0, 99, '2014-11-21 10:08:15', '0000-00-00 00:00:00', 1, 1),
(9, 5, '201411', 'ec273d911c4cd46c68d97c5ea42cd374f9cac910.jpg', '2. Утасныхаа дууг silent дээр нь тавь.\r\nГар утас тань уулзалтын дундуур хангинадаг уу? үнэхээр сайнгүй зүйл шүү. Энэ таныг ажил хэргийн түншид тань найдваргүй, хайнга хүн шиг харагдуулна. Утасныхаа дууг хаах хэрэгтэй. Хэрэв та одоо ч энэ асуудлаа шийдэж чадахгүй бол, хурал цуглаан, уулзалтанд орохын өмнө утсаа өөрийнхөө ширээн дээр орхихыг санал болгож байна.\r\n', 0, 98, '2014-11-21 10:08:39', '0000-00-00 00:00:00', 1, 1),
(10, 5, '201411', '2b68e413add34ad9562712e450d5a37d5c9a3951.jpg', '3. Өөрийнхөө хоолыг ид.\r\nЭнэ бол олон нийт, коллеж, сургууль гээд хаа сайгүй тулгараад байгаа асуудал юм. Та өөрөө хоолоо бэлдэж идэх ёстой шүү дээ. Хоолоо авчраагүй гэдэг нь таны өөртөө туслах гэж байгаа шинж биш бөгөөд, та хоолны цагаар зүгээр л ганцаараа үлдэх хэрэгтэй. ', 0, 97, '2014-11-21 10:08:59', '0000-00-00 00:00:00', 1, 1),
(11, 4, '201411', 'd773637060daf421c37de0c946ad8a8608b180e4.jpg', '', 1, 100, '2014-11-21 10:12:33', '0000-00-00 00:00:00', 1, 1),
(12, 4, '201411', '402652872962ea3c045fc5a1d5839c4389220fa0.jpg', ' Барималын хэмжээ нь 5-6 цагийн дотор ургах таны хумсны хэмжээтэй тэнцэнэ хэмээн ярьсан байна. Барималыг бүтээхийн тулд тэрээр 3D хэвлэгч машиныг ашигладаг байна. Ингээд алдарт барималчийн өвөрмөц бичил бүтээлүүдийг томруулан харцгаая.\r\n\r\nЗүүний сүвэгч доторх бариамал', 0, 99, '2014-11-21 10:13:04', '0000-00-00 00:00:00', 1, 1),
(13, 4, '201411', '83da4c4b9fb6550bf2802382903695570cb19252.jpg', 'Баримал бүрийг хэдэн сарын туршид 10 гаруй хүнтэй баг болон Карлсруэ-ийн Технологийн Их Сургууль, Вейцманы Шинжлэх Ухааны Их Сургуулийнхан хамтран бүтээдэг байна. ', 0, 97, '2014-11-21 10:13:29', '0000-00-00 00:00:00', 1, 1),
(14, 4, '201411', 'fbcd361b3d00282930ee4b96d7e475cd243f9f34.jpg', 'Шоргоолжны толгойн дээрх баримал (100 х 90 х 100 мкм) ', 0, 96, '2014-11-21 10:14:01', '0000-00-00 00:00:00', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table `love`
--

INSERT INTO `love` (`id`, `object_type`, `object_id`, `created_at`, `updated_at`, `user_id`, `ip_address`) VALUES
(50, 'item', 46, '2014-11-16 15:07:41', '0000-00-00 00:00:00', 1, '127.0.0.1'),
(51, 'item', 45, '2014-11-16 16:20:03', '0000-00-00 00:00:00', 1, '127.0.0.1'),
(52, 'item', 46, '2014-11-16 16:20:39', '0000-00-00 00:00:00', 1, '127.0.0.1'),
(53, 'item', 44, '2014-11-16 16:24:01', '0000-00-00 00:00:00', 1, '127.0.0.1'),
(54, 'item', 2, '2014-11-16 17:26:54', '0000-00-00 00:00:00', 1, '127.0.0.1');

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
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `poll`
--


-- --------------------------------------------------------

--
-- Table structure for table `poll_option`
--

CREATE TABLE IF NOT EXISTS `poll_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
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
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `poll_option`
--


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

--
-- Dumping data for table `subscriber`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `firstname`, `lastname`, `fullname`, `email`, `mobile`, `avator`, `is_active`, `created_at`, `updated_at`, `logged_at`, `activation_code`, `ip`) VALUES
(1, '11611531cc390b3d047142569042fca3', 'Дуламханд', 'Батжаргал', 'Дуламханд.Батжаргал', 'handaa.1224@gmail.com', '99071053', '48-browser-girl-chrome-icon.png', 1, '2011-02-02 02:04:13', '0000-00-00 00:00:00', '2014-11-16 08:23:46', '', ''),
(7, '11611531cc390b3d047142569042fca3', 'Dulamzaya', 'Batjargal', 'Dulamzaya.Batjargal', 'dulamzaya@yahoo.com', '99099078', '6f64d2ffdde833ded05ddfdb9cb4063aecf061f9.jpg', 1, '2011-12-07 20:39:09', '2013-11-29 09:09:23', '0000-00-00 00:00:00', '', ''),
(8, '11611531cc390b3d047142569042fca3', 'Gunjmaa', 'Batbaatar', 'Gunjmaa.Batbaatar', 'gunjee_hi@yahoo.com', '95259621', '48-girl-bunny-finger-icon.png', 1, '2011-12-07 12:43:17', '2013-11-29 10:17:21', '0000-00-00 00:00:00', '', ''),
(9, '11611531cc390b3d047142569042fca3', 'Dulamsuren', 'Batjargal', 'Б.Дуламсүрэн', 'duuya2012@gmail.com', '99022507', '0ac6be888f01ba00bcf8061942939f4e2432528b.jpg', 1, '2013-05-05 19:11:25', '2013-11-29 10:50:05', '2013-05-05 13:35:42', '3976c78326b6ccca00b89c399e16142b', ''),
(10, '11611531cc390b3d047142569042fca3', 'Narantsetseg', 'Dashnyam', 'Narantsetseg.Dashnyam', 'girasole.mgl@gmail.com', '99928075', '48-browser-girl-firefox-icon.png', 1, '2013-05-05 19:13:50', '2013-05-05 11:13:50', '0000-00-00 00:00:00', '0ac72fdf65cb0d9a6147f0ff3d7cb46c', '127.0.0.1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_2` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_2` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `category_content`
--
ALTER TABLE `category_content`
  ADD CONSTRAINT `category_content_ibfk_8` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `category_content_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `category_content_ibfk_6` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`),
  ADD CONSTRAINT `category_content_ibfk_7` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_3` FOREIGN KEY (`updated_aid`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`),
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`created_aid`) REFERENCES `admin` (`id`);
