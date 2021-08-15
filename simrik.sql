-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 15, 2021 at 08:36 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `sn` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link_same_as` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adsdata`
--

CREATE TABLE `adsdata` (
  `sn` int(11) NOT NULL,
  `adssn` int(11) NOT NULL,
  `language` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adtext` text COLLATE utf8_unicode_ci NOT NULL,
  `adpic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `sn` int(11) NOT NULL,
  `categoryname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_of` int(11) NOT NULL,
  `show_content` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`sn`, `categoryname`, `display_order`, `language`, `slug`, `subcategory_of`, `show_content`) VALUES
(21, 'About Us', 1, 'English', 'about-us', 0, 'Yes'),
(22, 'Construction', 2, 'English', 'construction', 0, 'Yes'),
(23, 'Security', 3, 'English', 'security', 0, 'Yes'),
(28, 'Teams', 4, 'English', 'teams', 0, 'Yes'),
(29, 'Contacts', 5, 'English', 'contacts', 0, 'Yes'),
(30, 'Nepal', 2, 'English', 'nepal', 28, 'Yes'),
(31, 'Hong Kong', 1, 'English', 'hong-kong', 28, 'Yes'),
(32, 'Security Services', 1, 'English', 'security-services', 23, 'Yes'),
(33, 'Security Service Clients', 2, 'English', 'security-service-clients', 23, 'Yes'),
(34, 'Projects', 1, 'English', 'projects', 22, 'Yes'),
(35, 'Construction Services', 2, 'English', 'construction-services', 22, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `categoryfields`
--

CREATE TABLE `categoryfields` (
  `sn` int(11) NOT NULL,
  `category_sn` int(11) NOT NULL,
  `fieldname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `control` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `options` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `required` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `sn` int(11) NOT NULL,
  `display_order` int(11) NOT NULL,
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`sn`, `display_order`, `language`) VALUES
(254, 4, 'English'),
(255, 3, 'English'),
(256, 2, 'English'),
(257, 1, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `formdata`
--

CREATE TABLE `formdata` (
  `sn` int(11) NOT NULL,
  `formsn` int(11) NOT NULL,
  `fdsn` int(11) NOT NULL,
  `data_value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `unique_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `sn` int(11) NOT NULL,
  `formname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `header` text COLLATE utf8_unicode_ci NOT NULL,
  `footer` text COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formsdetail`
--

CREATE TABLE `formsdetail` (
  `sn` int(11) NOT NULL,
  `formsn` int(11) NOT NULL,
  `fieldname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `control` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `options` text COLLATE utf8_unicode_ci NOT NULL,
  `displayorder` int(11) NOT NULL,
  `required` varchar(9) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `sn` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `hppics` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`sn`, `description`, `hppics`, `display_order`) VALUES
(30, 'Home Page Slider', 'Yes', 1),
(31, 'Three Runway Project', 'No', 2),
(32, 'Tuen Min Chek Lap Kok Link Project', 'No', 3),
(33, 'Express Rail Links Project', 'No', 4);

-- --------------------------------------------------------

--
-- Table structure for table `gallerydata`
--

CREATE TABLE `gallerydata` (
  `sn` int(11) NOT NULL,
  `gallerysn` int(11) NOT NULL,
  `language` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallerydata`
--

INSERT INTO `gallerydata` (`sn`, `gallerysn`, `language`, `title`, `content`) VALUES
(41, 30, 'English', 'Home Page Slider', ''),
(42, 30, 'Nepali', '', ''),
(43, 31, 'English', 'Three Runway Project', ''),
(44, 31, 'Nepali', '', ''),
(45, 32, 'English', 'Tuen Min Chek Lap Kok Link Project', ''),
(46, 32, 'Nepali', '', ''),
(47, 33, 'English', 'Express Rail Links Project', ''),
(48, 33, 'Nepali', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallerypics`
--

CREATE TABLE `gallerypics` (
  `sn` int(11) NOT NULL,
  `gallerysn` int(11) NOT NULL,
  `picpath` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallerypics`
--

INSERT INTO `gallerypics` (`sn`, `gallerysn`, `picpath`, `display_order`) VALUES
(181, 30, '/upload/images/gallery/security.jpeg', 18),
(182, 30, '/upload/images/gallery/construction.jpeg', 19),
(183, 31, '/upload/images/projects/threerunway/three_runway1.jpeg', 13),
(184, 31, '/upload/images/projects/threerunway/three_runway2.jpeg', 14),
(185, 31, '/upload/images/projects/threerunway/three_runway3.jpeg', 15),
(186, 31, '/upload/images/projects/threerunway/three_runway4.jpeg', 16),
(187, 31, '/upload/images/projects/threerunway/three_runway5.jpeg', 17),
(188, 32, '/upload/images/projects/tmclkl/TMCLKL_photo_01.jpeg', 10),
(189, 32, '/upload/images/projects/tmclkl/TMCLKL_photo_02.jpeg', 11),
(190, 32, '/upload/images/projects/tmclkl/TMCLKL_photo_03-1.jpeg', 12),
(191, 33, '/upload/images/projects/expressrail/ERL_photo_01.jpeg', 1),
(192, 33, '/upload/images/projects/expressrail/ERL_photo_06.jpeg', 2),
(193, 33, '/upload/images/projects/expressrail/ERL_photo_07.jpeg', 3),
(194, 33, '/upload/images/projects/expressrail/ERL_photo_08.jpeg', 4),
(195, 33, '/upload/images/projects/expressrail/ERL_photo_09.jpeg', 5),
(196, 33, '/upload/images/projects/expressrail/ERL_photo_10.jpeg', 6),
(197, 33, '/upload/images/projects/expressrail/ERL_photo_12.jpeg', 7),
(198, 33, '/upload/images/projects/expressrail/ERL_photo_13.jpeg', 8),
(199, 33, '/upload/images/projects/expressrail/ERL_photo_16.jpeg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `gallerypicsdata`
--

CREATE TABLE `gallerypicsdata` (
  `sn` int(11) NOT NULL,
  `gallerypicssn` int(11) NOT NULL,
  `language` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallerypicsdata`
--

INSERT INTO `gallerypicsdata` (`sn`, `gallerypicssn`, `language`, `caption`) VALUES
(357, 181, 'English', 'Quality and Comprehensive. Security Service. More about Security.'),
(358, 181, 'Nepali', ''),
(359, 182, 'English', 'We have the ability. We have the experience. More about Construction.'),
(360, 182, 'Nepali', ''),
(361, 183, 'English', 'Image 1'),
(362, 183, 'Nepali', ''),
(363, 184, 'English', 'Image 2'),
(364, 184, 'Nepali', ''),
(365, 185, 'English', 'Image 3'),
(366, 185, 'Nepali', ''),
(367, 186, 'English', 'Image 4'),
(368, 186, 'Nepali', ''),
(369, 187, 'English', 'Image 5'),
(370, 187, 'Nepali', ''),
(371, 188, 'English', 'Image 1'),
(372, 188, 'Nepali', ''),
(373, 189, 'English', 'Image 2'),
(374, 189, 'Nepali', ''),
(375, 190, 'English', 'Image 3'),
(376, 190, 'Nepali', ''),
(377, 191, 'English', 'Image 1'),
(378, 191, 'Nepali', ''),
(379, 192, 'English', 'Image 2'),
(380, 192, 'Nepali', ''),
(381, 193, 'English', 'Image 3'),
(382, 193, 'Nepali', ''),
(383, 194, 'English', 'Image 4'),
(384, 194, 'Nepali', ''),
(385, 195, 'English', 'Image 5'),
(386, 195, 'Nepali', ''),
(387, 196, 'English', 'Image 6'),
(388, 196, 'Nepali', ''),
(389, 197, 'English', 'Image 7'),
(390, 197, 'Nepali', ''),
(391, 198, 'English', 'Image 8'),
(392, 198, 'Nepali', ''),
(393, 199, 'English', 'Image 9'),
(394, 199, 'Nepali', '');

-- --------------------------------------------------------

--
-- Table structure for table `langrel`
--

CREATE TABLE `langrel` (
  `sn` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `pageid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `rellang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `relid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `sn` int(11) NOT NULL,
  `lng` decimal(10,5) NOT NULL,
  `lat` decimal(10,5) NOT NULL,
  `address1` text COLLATE utf8_unicode_ci NOT NULL,
  `address2` text COLLATE utf8_unicode_ci NOT NULL,
  `address3` text COLLATE utf8_unicode_ci NOT NULL,
  `naddress1` text COLLATE utf8_unicode_ci NOT NULL,
  `naddress2` text COLLATE utf8_unicode_ci NOT NULL,
  `naddress3` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `sn` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `submenu_of` int(11) NOT NULL,
  `menu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `menutype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mid` int(11) NOT NULL,
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`sn`, `title`, `link`, `display_order`, `submenu_of`, `menu`, `menutype`, `mid`, `language`) VALUES
(187, 'Home', '/', 1, 0, 'Main', 'link', 0, 'English'),
(188, 'About Us', 'https://www.simrikservice.com/category/about-us/1', 2, 0, 'Main', 'category', 21, 'English'),
(189, 'Introduction', 'https://www.simrikservice.com/post/introduction', 1, 188, 'Main', 'posts', 235, 'English'),
(190, 'Company Profile', 'https://www.simrikservice.com/post/company-profile', 2, 188, 'Main', 'posts', 236, 'English'),
(191, 'Security', 'https://www.simrikservice.com/category/security/1', 3, 0, 'Main', 'category', 23, 'English'),
(194, 'Teams', 'https://www.simrikservice.com/category/teams/1', 5, 0, 'Main', 'category', 28, 'English'),
(195, 'Hong Kong', 'https://www.simrikservice.com/category/hong-kong/1', 2, 194, 'Main', 'category', 31, 'English'),
(196, 'Nepal', 'https://www.simrikservice.com/category/nepal/1', 1, 194, 'Main', 'category', 30, 'English'),
(197, 'Contacts', 'https://www.simrikservice.com/category/contacts/1', 6, 0, 'Main', 'category', 29, 'English'),
(198, 'Nepal', 'https://www.simrikservice.com/post/nepal', 1, 197, 'Main', 'posts', 233, 'English'),
(199, 'Hong Kong', 'https://www.simrikservice.com/post/hong-kong', 2, 197, 'Main', 'posts', 234, 'English'),
(200, 'Construction', 'https://www.simrikservice.com/category/construction/1', 4, 0, 'Main', 'category', 22, 'English'),
(203, 'Security Services', 'https://www.simrikservice.com/category/security-services/1', 1, 191, 'Main', 'category', 32, 'English'),
(204, 'Security Service Clients', 'https://www.simrikservice.com/category/security-service-clients/1', 2, 191, 'Main', 'category', 33, 'English'),
(205, 'Projects', 'https://www.simrikservice.com/category/projects/1', 1, 200, 'Main', 'category', 34, 'English'),
(206, 'Construction Services', 'https://www.simrikservice.com/category/construction-services/1', 2, 200, 'Main', 'category', 35, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `sn` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `accesslevel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`sn`, `author`, `post_date`, `title`, `content`, `excerpt`, `post_status`, `slug`, `accesslevel`, `password`, `language`) VALUES
(9, 18, '2021-08-08 09:33:12', 'Intro', '&lt;h4&gt;Simrik Security Gurkha Force &amp;amp; Simrik Construction Engineering Limited&lt;/h4&gt;\r\n\r\n&lt;p&gt;Simrik Security Gurkha Force &amp;amp; Simrik Construction Engineering Limited is a&amp;nbsp;&lt;a href=&quot;/hk&quot;&gt;Hong Kong&lt;/a&gt;&amp;nbsp;and&amp;nbsp;&lt;a href=&quot;https://www.simrikservice.com/nepal&quot;&gt;Nepal&lt;/a&gt;&amp;nbsp;based Gurkha security company providing a quality and comprehensive security and specialized construction services with highly trained, motivated and discipline personnels.&lt;/p&gt;\r\n\r\n&lt;p&gt;Simrik Security Gurkha Force &amp;amp; Simrik Construction Engineering Limited (SSGF &amp;amp; SCEL) offers a multi range of security and construction services to customers in Hong Kong &amp;amp; Nepal.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/upload/.thumbs/images/about/home_about.jpeg&quot; style=&quot;height:300px; width:268px&quot; /&gt;&lt;/p&gt;\r\n', '', 'Published', 'intro', 'Public', '', 'English'),
(10, 18, '2021-08-09 08:57:27', 'Services Introduction', '&lt;p&gt;Simrik Security Gurkha Force &amp;amp; Simrik Construction Engineering Limited is a Hong Kong based Gurkha security company providing a quality and comprehensive security service composed of highly trained and motivated ex British/Indian professional army trained Gurkhas and Chinese security officers.The security services provided are:&lt;/p&gt;\r\n', '', 'Published', 'services-introduction', 'Public', '', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `sn` int(11) NOT NULL,
  `pisn` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`sn`, `pisn`, `user_id`, `p`) VALUES
(62, 1, 18, 1),
(63, 2, 18, 1),
(64, 3, 18, 1),
(65, 4, 18, 1),
(66, 5, 18, 1),
(67, 6, 18, 1),
(68, 7, 18, 1),
(69, 8, 18, 1),
(70, 9, 18, 1),
(71, 10, 18, 1),
(72, 11, 18, 1),
(73, 12, 18, 1),
(74, 13, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_items`
--

CREATE TABLE `permission_items` (
  `sn` int(11) NOT NULL,
  `item` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_items`
--

INSERT INTO `permission_items` (`sn`, `item`, `dp`) VALUES
(1, 'Manage Categories', 0),
(2, 'Category Custom Fields', 1),
(3, 'Posts', 1),
(4, 'Slide Pictures / Gallery', 1),
(5, 'Media', 1),
(6, 'Settings', 0),
(7, 'Ad Banners', 1),
(8, 'Menu', 0),
(9, 'Google Map', 0),
(10, 'Social Settings', 1),
(11, 'Pages', 0),
(12, 'Menus', 0),
(13, 'Featured Posts', 0);

-- --------------------------------------------------------

--
-- Table structure for table `postdata`
--

CREATE TABLE `postdata` (
  `sn` int(11) NOT NULL,
  `post_sn` int(11) NOT NULL,
  `fieldname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `control` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `options` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `data_value` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `sn` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comment_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `category_sn` int(11) NOT NULL,
  `slug` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `accesslevel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `gallery_sn` int(11) NOT NULL,
  `featured_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`sn`, `author`, `post_date`, `title`, `content`, `excerpt`, `post_status`, `comment_status`, `category_sn`, `slug`, `display_order`, `accesslevel`, `password`, `gallery_sn`, `featured_image`) VALUES
(233, 18, '2021-08-09 06:54:21', 'Nepal', '', '&lt;p&gt;Nepal Address&lt;br /&gt;\r\nStreet Name XXX-X&lt;br /&gt;\r\nKathmandu, Nepal&lt;br /&gt;\r\nPhone: 977-98xxxxxxxxx&lt;/p&gt;\r\n', 'Published', 'Allow', 29, 'nepal', 2, 'Public', '', 0, ''),
(235, 18, '2021-08-09 06:57:42', 'Introduction', '', '', 'Published', 'Allow', 21, 'introduction', 1, 'Public', '', 0, ''),
(236, 18, '2021-08-09 06:57:51', 'Company Profile', '', '', 'Published', 'Allow', 21, 'company-profile', 2, 'Public', '', 0, ''),
(237, 18, '2021-08-09 08:18:33', 'Manned Guarding', '&lt;p&gt;Our manned security and services include:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Security Guards&lt;/li&gt;\r\n	&lt;li&gt;Gatemen&lt;/li&gt;\r\n	&lt;li&gt;Key Holding&lt;/li&gt;\r\n	&lt;li&gt;Stewarding&lt;/li&gt;\r\n	&lt;li&gt;Door Supervising&lt;/li&gt;\r\n	&lt;li&gt;Access Control&lt;/li&gt;\r\n	&lt;li&gt;CCTV Monitoring&lt;/li&gt;\r\n	&lt;li&gt;Patrolling of premises&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Day/Night Security Guards, Gatemen, Key Holding, Stewarding, Door Supervising, Access Control, CCTV Monitoring, Patrolling of premises&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'manned-guarding', 1, 'Public', '', 0, '/upload/images/security/manned-guarding.png'),
(238, 18, '2021-08-09 08:34:48', 'Residential Security', '&lt;ul&gt;\r\n	&lt;li&gt;Apartment Complex&lt;/li&gt;\r\n	&lt;li&gt;Gated Neighborhoods&lt;/li&gt;\r\n	&lt;li&gt;Condominiums&lt;/li&gt;\r\n	&lt;li&gt;Access Control&lt;/li&gt;\r\n	&lt;li&gt;Patrolling&lt;/li&gt;\r\n	&lt;li&gt;Car Park&lt;/li&gt;\r\n	&lt;li&gt;CCTV Monitoring&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Apartment Complex, Gated Neighborhoods, Condominiums, Access Control, Patrolling, Car Park, CCTV Monitoring&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'residential-security', 6, 'Public', '', 0, '/upload/images/security/residential-security.png'),
(239, 18, '2021-08-09 08:35:45', 'Corporate Security', '&lt;ul&gt;\r\n	&lt;li&gt;Building Openings/Closings&lt;/li&gt;\r\n	&lt;li&gt;Security Checks&lt;/li&gt;\r\n	&lt;li&gt;Onsite Foot Patrol&lt;/li&gt;\r\n	&lt;li&gt;Employee and Executive Protection&lt;/li&gt;\r\n	&lt;li&gt;Access Control&lt;/li&gt;\r\n	&lt;li&gt;CCTV Monitoring&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Building Openings/Closings, Security Checks, Onsite Foot Patrol, Employee and Executive Protection, Access Control, CCTV Monitoring&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'corporate-security', 2, 'Public', '', 0, '/upload/images/security/corporate-security.png'),
(241, 18, '2021-08-09 08:37:44', 'Airport Security', '&lt;ul&gt;\r\n	&lt;li&gt;Boarding Gate Security&lt;/li&gt;\r\n	&lt;li&gt;Access Controls&lt;/li&gt;\r\n	&lt;li&gt;Guarding Facility Service&lt;/li&gt;\r\n	&lt;li&gt;CCTV Monitoring&lt;/li&gt;\r\n	&lt;li&gt;Patrolling&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Boarding Gate Security, Access Controls, Guarding Facility Service, CCTV Monitoring, Patrolling&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'airport-security', 7, 'Public', '', 0, '/upload/images/security/airport-security.png'),
(242, 18, '2021-08-09 08:38:54', 'Hotel Security', '&lt;ul&gt;\r\n	&lt;li&gt;Doorman, Lobby Concierge&lt;/li&gt;\r\n	&lt;li&gt;Security patrols of premises and surrounding&lt;/li&gt;\r\n	&lt;li&gt;Executive protection services for high profile guests and celebrities&lt;/li&gt;\r\n	&lt;li&gt;Security for special events at the hotel&lt;/li&gt;\r\n	&lt;li&gt;Access Controlling&lt;/li&gt;\r\n	&lt;li&gt;Patrolling&lt;/li&gt;\r\n	&lt;li&gt;CCTV&lt;/li&gt;\r\n	&lt;li&gt;Lost/Found Properties&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Doorman, Lobby Concierge, Security patrols of premises and surrounding, Executive protection services for high profile guests and celebrities ...&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'hotel-security', 8, 'Public', '', 0, '/upload/images/security/hotel-security.png'),
(243, 18, '2021-08-09 08:42:46', 'Retail Security', '&lt;ul&gt;\r\n	&lt;li&gt;Physical protection&lt;/li&gt;\r\n	&lt;li&gt;Loss/theft prevention&lt;/li&gt;\r\n	&lt;li&gt;CCTV Monitoring&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Physical protection, Loss/theft prevention, CCTV Monitoring&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'retail-security', 10, 'Public', '', 0, '/upload/images/security/retail-security.png'),
(244, 18, '2021-08-09 08:43:28', 'Hospital Security', '&lt;ul&gt;\r\n	&lt;li&gt;Keeping medical professional and patients safe&lt;/li&gt;\r\n	&lt;li&gt;Onsite patrol in and out of the vicinity&lt;/li&gt;\r\n	&lt;li&gt;CCTV monitoring&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Keeping medical professional and patients safe, Onsite patrol in and out of the vicinity, CCTV monitoring&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'hospital-security', 3, 'Public', '', 0, '/upload/images/security/hospital-security.png'),
(245, 18, '2021-08-09 08:45:20', 'Construction Security', '&lt;ul&gt;\r\n	&lt;li&gt;Onsite patrol&lt;/li&gt;\r\n	&lt;li&gt;24/7 surveillance monitoring (CCTV, etc.)&lt;/li&gt;\r\n	&lt;li&gt;Immediately halts to unauthorized visits and loitering on the site&lt;/li&gt;\r\n	&lt;li&gt;Security consulting &amp;ndash; risk assessment and recommendations&lt;/li&gt;\r\n	&lt;li&gt;Fire evacuation/Alarms&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Onsite patrol, 24/7 surveillance monitoring (CCTV, etc.), Immediately halts to unauthorized visits and loitering on the site ...&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'construction-security', 4, 'Public', '', 0, '/upload/images/security/construction-security.png'),
(246, 18, '2021-08-09 08:46:07', 'Close Protections', '&lt;ul&gt;\r\n	&lt;li&gt;Bodyguards &amp;amp; chauffeurs&lt;/li&gt;\r\n	&lt;li&gt;Event security&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Bodyguards &amp;amp; chauffeurs, Event security&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'close-protections', 9, 'Public', '', 0, '/upload/images/security/close-protection.png'),
(247, 18, '2021-08-09 08:46:56', 'University/School security', '&lt;ul&gt;\r\n	&lt;li&gt;Chaperone services for schools or large groups of students&lt;/li&gt;\r\n	&lt;li&gt;CCTV Monitoring&lt;/li&gt;\r\n	&lt;li&gt;Protection and safety of staff/Properties&lt;/li&gt;\r\n	&lt;li&gt;Patrolling of premises&lt;/li&gt;\r\n	&lt;li&gt;Fire evacuation/Alarms&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Chaperone services for schools or large groups of students, CCTV Monitoring, Protection and safety of staff/Properties ...&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'university-school-security', 5, 'Public', '', 0, '/upload/images/security/university-scurity.png'),
(248, 18, '2021-08-09 08:47:31', 'Dog Security Handlers', '&lt;ul&gt;\r\n	&lt;li&gt;Trained to pick up on intruders or hidden persons within the patrol&lt;/li&gt;\r\n	&lt;li&gt;The Dogs are also trained to accept other people in their environment and react on command&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;Trained to pick up on intruders or hidden persons within the patrol ...&lt;/p&gt;\r\n', 'Published', 'Allow', 32, 'dog-security-handlers', 11, 'Public', '', 0, '/upload/images/security/dog-security.png'),
(249, 18, '2021-08-09 09:53:20', 'Davidraj Rai CPP - Operations/Admin Director', '&lt;p&gt;40 plus years of experience in the Brigade of Gurkhas, British Army and private security firms in Hong Kong, United Kingdom and Asia Pacific. A combat soldier in the Brigade of Gurkhas, British Army from 1973 &amp;ndash; 1991. In 1991, David was employed with the Royal Military Police (Special Investigation Branch) MOD UK based in Hong Kong.&lt;/p&gt;\r\n\r\n&lt;p&gt;Worked in close liaison with several Hong Kong law enforcement agencies. He possesses comprehensive and practical knowledge and experience in physical security management which entails emergency planning, surveillance/counter surveillance, threat assessment, security systems emergency planning, security survey, risk assessment and contingency planning, provision of highly trained security guards as required by required by individual clients. Other qualifications are:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;CPP (American Society of Industrial Security) USA&lt;/li&gt;\r\n	&lt;li&gt;MSyI (Dip) Security Institute UK&lt;/li&gt;\r\n	&lt;li&gt;Security Management Level 1 &amp;amp; 2, (International Institute of&lt;/li&gt;\r\n	&lt;li&gt;Security/City and Guild) UK&lt;/li&gt;\r\n	&lt;li&gt;TASK Special Security: Level 3&lt;/li&gt;\r\n	&lt;li&gt;BTEC Ad. Dip. Security Management &amp;amp; Close Protection (UK)&lt;/li&gt;\r\n	&lt;li&gt;ILM Intro to Supervisory Management&lt;/li&gt;\r\n	&lt;li&gt;NVQ Security, Safety &amp;amp; Loss Prevention UK&lt;/li&gt;\r\n	&lt;li&gt;Counter Surveillance &amp;ndash; Metropolitan Police London&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;40 plus years of experience in the Brigade of Gurkhas, British Army and private security firms in Hong Kong, United Kingdom and Asia Pacific. A combat soldier in the Brigade of Gurkhas, British Army from 1973 &amp;ndash; 1991. In 1991, David was employed with the Royal Military Police (Special Investigation Branch) MOD UK based in Hong Kong.&lt;/p&gt;\r\n', 'Published', 'Allow', 31, 'davidraj-rai-cpp-operations-admin-director', 1, 'Public', '', 0, '/upload/images/team/Davidraj_Rai_CPP.png'),
(250, 18, '2021-08-09 09:54:01', 'Harichandra Rai - Managing Director', '&lt;p&gt;Practical in-depth working experience and knowledge in security industry and heading construction business sectors for several years in Hong Kong and Nepal.&lt;/p&gt;\r\n', '&lt;p&gt;Practical in-depth working experience and knowledge in security industry and heading construction business sectors for several years in Hong Kong and Nepal.&lt;/p&gt;\r\n', 'Published', 'Allow', 31, 'harichandra-rai-managing-director', 2, 'Public', '', 0, '/upload/images/team/Harichandra_Rai.png'),
(251, 18, '2021-08-09 09:54:31', 'Ganga Ram Rai - Operations Director', '&lt;p&gt;Served in the Gurkha Brigade, Indian Army for some years and was involved in several military operations which involved counter terrorism. He has an extensive experience spanning from 20 plus years in the private security industry in Hong Kong that includes VIP executive protection, personal bodyguarding, advanced driving, security survey, threat assessment and security cover in CIT logistical operations.&lt;/p&gt;\r\n', '&lt;p&gt;Served in the Gurkha Brigade, Indian Army for some years and was involved in several military operations which involved counter terrorism. He has an extensive experience spanning from 20 plus years in the private security industry in Hong Kong that includes VIP executive protection, personal bodyguarding, advanced driving, security survey, threat assessment and security cover in CIT logistical operations.&lt;/p&gt;\r\n', 'Published', 'Allow', 31, 'ganga-ram-rai-operations-director', 3, 'Public', '', 0, '/upload/images/team/Ganga_Ram_Rai.png'),
(252, 18, '2021-08-09 09:55:13', 'Pang Chi Hung Gregory - Non-Executive Director', '&lt;p&gt;20 plus years of experience in administrative, public relations, human resources, security management and general affairs in different industry ranging from commercial, entertainment, retail, manufacturing and constructions in Hong Kong. Gregory has worked as a Director on large scale factories that employs 16,000 workers in the mainland China, focusing on general affairs, supervision in security operations by overseeing the of training and disciplinary practice of around 260 security personnel&amp;rsquo;s. Also, worked and manage 70 security personnel with media company ATV.&lt;/p&gt;\r\n', '&lt;p&gt;20 plus years of experience in administrative, public relations, human resources, security management and general affairs in different industry ranging from commercial, entertainment, retail, manufacturing and constructions in Hong Kong. Gregory has worked as a Director on large scale factories that employs 16,000 workers in the mainland China, focusing on general affairs, supervision in security operations by overseeing the of training and disciplinary practice of around 260 security personnel&amp;rsquo;s. Also, worked and manage 70 security personnel with media company ATV.&lt;/p&gt;\r\n', 'Published', 'Allow', 31, 'pang-chi-hung-gregory-non-executive-director', 4, 'Public', '', 0, '/upload/images/team/Pang_Chi_Hung_Gregory.jpeg'),
(253, 18, '2021-08-09 10:13:02', 'Davidraj Rai CPP - Operations/Admin Director', '&lt;p&gt;40 plus years of experience in the Brigade of Gurkhas, British Army and private security firms in Hong Kong, United Kingdom and Asia Pacific. A combat soldier in the Brigade of Gurkhas, British Army from 1973 &amp;ndash; 1991. In 1991, David was employed with the Royal Military Police (Special Investigation Branch) MOD UK based in Hong Kong.&lt;/p&gt;\r\n\r\n&lt;p&gt;Worked in close liaison with several Hong Kong law enforcement agencies. He possesses comprehensive and practical knowledge and experience in physical security management which entails emergency planning, surveillance/counter surveillance, threat assessment, security systems emergency planning, security survey, risk assessment and contingency planning, provision of highly trained security guards as required by required by individual clients. Other qualifications are:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;CPP (American Society of Industrial Security) USA&lt;/li&gt;\r\n	&lt;li&gt;MSyI (Dip) Security Institute UK&lt;/li&gt;\r\n	&lt;li&gt;Security Management Level 1 &amp;amp; 2, (International Institute of&lt;/li&gt;\r\n	&lt;li&gt;Security/City and Guild) UK&lt;/li&gt;\r\n	&lt;li&gt;TASK Special Security: Level 3&lt;/li&gt;\r\n	&lt;li&gt;BTEC Ad. Dip. Security Management &amp;amp; Close Protection (UK)&lt;/li&gt;\r\n	&lt;li&gt;ILM Intro to Supervisory Management&lt;/li&gt;\r\n	&lt;li&gt;NVQ Security, Safety &amp;amp; Loss Prevention UK&lt;/li&gt;\r\n	&lt;li&gt;Counter Surveillance &amp;ndash; Metropolitan Police London&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '&lt;p&gt;40 plus years of experience in the Brigade of Gurkhas, British Army and private security firms in Hong Kong, United Kingdom and Asia Pacific. A combat soldier in the Brigade of Gurkhas, British Army from 1973 &amp;ndash; 1991. In 1991, David was employed with the Royal Military Police (Special Investigation Branch) MOD UK based in Hong Kong.&lt;/p&gt;\r\n', 'Published', 'Allow', 31, 'davidraj-rai-cpp-operations-admin-director-6110ffae46eec', 5, 'Public', '', 0, '/upload/images/team/Davidraj_Rai_CPP.png'),
(254, 18, '2021-08-09 10:40:50', 'Three Runway System Project', '', '&lt;p&gt;Here goes the detailed description, images and other information about this project.&lt;/p&gt;\r\n', 'Published', 'Allow', 34, 'three-runway-system-project', 1, 'Public', '', 31, '/upload/.thumbs/images/projects/threerunway/three_runway1.jpeg'),
(255, 18, '2021-08-09 10:44:45', 'To Kwa Wan SCL 1109', '', '&lt;p&gt;Here goes the detailed description, images and other information about this project.&lt;/p&gt;\r\n', 'Published', 'Allow', 34, 'to-kwa-wan-scl-1109', 2, 'Public', '', 0, '/upload/.thumbs/images/projects/tokwawan/TKW_photo_01.jpeg'),
(256, 18, '2021-08-09 10:51:48', 'Tuen Min Chek Lap Kok Link', '', '&lt;p&gt;Here goes the detailed description, images and other information about this project.&lt;/p&gt;\r\n', 'Published', 'Allow', 34, 'tuen-min-chek-lap-kok-link', 4, 'Public', '', 32, '/upload/.thumbs/images/projects/tmclkl/TMCLKL_photo_01.jpeg'),
(257, 18, '2021-08-09 10:54:16', 'Express Rail Links', '', '&lt;p&gt;Here goes the detailed description, images and other information about this project.&lt;/p&gt;\r\n', 'Published', 'Allow', 34, 'express-rail-links', 3, 'Public', '', 33, '/upload/images/projects/expressrail/ERL_photo_09.jpeg'),
(258, 18, '2021-08-15 06:23:01', 'Hong kong', '', '&lt;p&gt;Hongkong Address&lt;br /&gt;\r\nStreet Name XXX-X&lt;br /&gt;\r\nHongkong, HK&lt;br /&gt;\r\nPhone: 11234567899&lt;/p&gt;\r\n', 'Published', 'Allow', 29, 'hong-kong-6118b2d0679d9', 1, 'Public', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `sn` int(11) NOT NULL,
  `picpath` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `resourcetype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `caption_English` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `caption_Nepali` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `caption_Japanese` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resourses_use`
--

CREATE TABLE `resourses_use` (
  `sn` int(11) NOT NULL,
  `resourcesn` int(11) NOT NULL,
  `used_module` int(11) NOT NULL,
  `used_sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `hitcount` int(11) NOT NULL DEFAULT 0,
  `showhitcount` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `companyname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `feedbackemail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `postperpage` int(11) NOT NULL,
  `hptitle` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lastupdated` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`hitcount`, `showhitcount`, `companyname`, `address`, `city`, `country`, `phone`, `fax`, `email`, `feedbackemail`, `postperpage`, `hptitle`, `lastupdated`) VALUES
(548044, '1', 'Simrik Security Gurkha Force & Simrik Construction Engineering Limited', 'Trade Tower, Thapathali', 'Kathmandu, Nepal', 'P.O.Box: 4565', 'Tel: 5111111 (Hunting Line)', 'Fax: 977-1-5111112', 'simrik@gmail.com', 'simrik@gmail.com', 10, 'Simrik Security Gurkha Force & Simrik Construction Engineering Limited', '');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `sn` int(11) NOT NULL,
  `service` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`sn`, `service`, `link`, `display_order`) VALUES
(3, 'facebook', 'unitedinsurancenepal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `useronline`
--

CREATE TABLE `useronline` (
  `timestamp` int(15) NOT NULL DEFAULT 0,
  `ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `pass` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `active` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `user_level`, `active`, `registration_date`) VALUES
(18, 'Sudeep', 'Gurung', 'info@database.com.np', 'cec1ffe41c1ae395b211c6b57788ac507ae8c48f', 5, NULL, '2012-11-19 10:42:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `adsdata`
--
ALTER TABLE `adsdata`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `adssn` (`adssn`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `display_order` (`display_order`);

--
-- Indexes for table `categoryfields`
--
ALTER TABLE `categoryfields`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `category_sn` (`category_sn`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `formdata`
--
ALTER TABLE `formdata`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `post_sn` (`fdsn`),
  ADD KEY `fdsn` (`fdsn`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `formsdetail`
--
ALTER TABLE `formsdetail`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `formsn` (`formsn`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `gallerydata`
--
ALTER TABLE `gallerydata`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `gallerysn` (`gallerysn`);

--
-- Indexes for table `gallerypics`
--
ALTER TABLE `gallerypics`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `gallerysn` (`gallerysn`);

--
-- Indexes for table `gallerypicsdata`
--
ALTER TABLE `gallerypicsdata`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `gallerypicssn` (`gallerypicssn`);

--
-- Indexes for table `langrel`
--
ALTER TABLE `langrel`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `permission_itemsn` (`pisn`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `permission_items`
--
ALTER TABLE `permission_items`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `postdata`
--
ALTER TABLE `postdata`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `post_sn` (`post_sn`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `category_sn` (`category_sn`),
  ADD KEY `display_order` (`display_order`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `resourses_use`
--
ALTER TABLE `resourses_use`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `resourcesn` (`resourcesn`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `useronline`
--
ALTER TABLE `useronline`
  ADD PRIMARY KEY (`timestamp`),
  ADD KEY `ip` (`ip`),
  ADD KEY `file` (`file`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `login` (`email`,`pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adsdata`
--
ALTER TABLE `adsdata`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categoryfields`
--
ALTER TABLE `categoryfields`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formdata`
--
ALTER TABLE `formdata`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formsdetail`
--
ALTER TABLE `formsdetail`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `gallerydata`
--
ALTER TABLE `gallerydata`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `gallerypics`
--
ALTER TABLE `gallerypics`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `gallerypicsdata`
--
ALTER TABLE `gallerypicsdata`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `langrel`
--
ALTER TABLE `langrel`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `permission_items`
--
ALTER TABLE `permission_items`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `postdata`
--
ALTER TABLE `postdata`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resourses_use`
--
ALTER TABLE `resourses_use`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adsdata`
--
ALTER TABLE `adsdata`
  ADD CONSTRAINT `adsdata_ibfk_1` FOREIGN KEY (`adssn`) REFERENCES `ads` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categoryfields`
--
ALTER TABLE `categoryfields`
  ADD CONSTRAINT `categoryfields_ibfk_1` FOREIGN KEY (`category_sn`) REFERENCES `category` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formdata`
--
ALTER TABLE `formdata`
  ADD CONSTRAINT `formdata_ibfk_1` FOREIGN KEY (`fdsn`) REFERENCES `formsdetail` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formsdetail`
--
ALTER TABLE `formsdetail`
  ADD CONSTRAINT `formsdetail_ibfk_1` FOREIGN KEY (`formsn`) REFERENCES `forms` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallerydata`
--
ALTER TABLE `gallerydata`
  ADD CONSTRAINT `gallerydata_ibfk_1` FOREIGN KEY (`gallerysn`) REFERENCES `gallery` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallerypics`
--
ALTER TABLE `gallerypics`
  ADD CONSTRAINT `gallerypics_ibfk_1` FOREIGN KEY (`gallerysn`) REFERENCES `gallery` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallerypicsdata`
--
ALTER TABLE `gallerypicsdata`
  ADD CONSTRAINT `gallerypicsdata_ibfk_1` FOREIGN KEY (`gallerypicssn`) REFERENCES `gallerypics` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`pisn`) REFERENCES `permission_items` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
