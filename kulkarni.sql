-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 07:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kulkarni`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_place` text DEFAULT NULL,
  `promo_video` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `date_place`, `promo_video`, `created`, `updated`, `deleted`) VALUES
(1, 'Welcome to <span>Our Medical</span>', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut\r\n                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation\r\n                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>\r\n                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut\r\n                    laoreet dolore magna aliquam erat volutpat. </p>', 'Since 1990 - 2020, Battery Park, New York', 'https://www.youtube.com/embed/cQUUkZnyoD0', '2023-08-16 08:48:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_features`
--

CREATE TABLE `about_features` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_features`
--

INSERT INTO `about_features` (`id`, `title`, `content`, `icon`, `created`, `updated`, `deleted`) VALUES
(1, 'Emergency Treatment', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis eges\r\n                            vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'icofont icofont-paralysis-disability', '2023-08-16 08:43:06', NULL, NULL),
(2, 'High Quality Laboratory', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis eges\r\n                            vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.', 'icofont icofont-laboratory', '2023-08-16 08:43:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `thumbnail` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `tag` text DEFAULT NULL,
  `author` text DEFAULT NULL,
  `author_img` text DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `thumbnail`, `title`, `content`, `tag`, `author`, `author_img`, `isActive`, `created`, `updated`, `deleted`) VALUES
(1, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n                                doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n                                quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:15:22', NULL, NULL),
(2, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:17:56', NULL, NULL),
(3, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:17:56', NULL, NULL),
(4, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(5, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(6, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(7, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(8, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(9, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(10, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(11, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(12, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(13, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(14, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(15, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(16, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL),
(17, '1.jpg', 'What You Need To Know About Bone Marrow Transplantation', 'Pellentesque Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium\r\n doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et\r\n quasi architecto beatae vitae dicta sunt explicabo.', 'hashtheme, Sensiv', 'Admin', '1.jpg', 0, '2023-08-16 04:18:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website_url` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `name`, `email`, `website_url`, `message`, `created`, `updated`, `deleted`) VALUES
(1, 1, 'Soumya', 'soumya.nayak@ikontel.com', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod\r\n                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                                            quis nostrud exercitation ullamco laboris nisi.', '2023-08-16 06:02:52', NULL, NULL),
(2, 1, 'Arpita', 'arpita.s@ikontel.com', '', 'Hello from front end', '2023-08-16 06:06:05', NULL, NULL),
(3, 1, 'Testing', 'testing@gmail.com', '', 'Testing', '2023-08-16 06:50:15', NULL, NULL),
(4, 2, 'Soumya', 's@gmail.com', '', 'Hello', '2023-08-16 06:55:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `image`, `created`, `updated`, `deleted`) VALUES
(1, 'client1', '3.png', '2023-08-16 10:58:46', NULL, NULL),
(2, 'client1', '1.png', '2023-08-16 10:59:44', NULL, NULL),
(3, 'client2', '2.png', '2023-08-16 10:59:44', NULL, NULL),
(4, 'client3', '3.png', '2023-08-16 10:59:44', NULL, NULL),
(5, 'client4', '4.png', '2023-08-16 10:59:44', NULL, NULL),
(6, 'client5', '2.png', '2023-08-16 10:59:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `map` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `social_links` text DEFAULT NULL,
  `opening_hours` text DEFAULT NULL,
  `copyright` text DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `map`, `address`, `phone`, `email`, `social_links`, `opening_hours`, `copyright`, `isActive`, `created`, `updated`, `deleted`) VALUES
(1, 'https://maps.google.com/maps?q=10004%2C%20Battery%20Park%2C%20New%20York%2C%20USA%20&t=&z=13&ie=UTF8&iwloc=&output=embed', '10004, Battery Park, <br> New York, USA', '+88-675-128763', 'info@your_site.com', '{\"facebook\":\"\",\"instagram\":\"https://www.instagram.com\",\"twitter\":\"https://www.twitter.com/your_twitter_handle\",\"youtube-play\":\"https://www.youtube.com\"}', '<h6>Mon - Fri : 08:00 - 17:00</h6>\n                        <h6>Sat - Sun : 12:00 - 19:00</h6>\n                        <h6>EMERGENCY SERVICE : 24*7</h6>', 'Copyright © 2023 Kulkarni Medzone', 0, '2023-08-16 07:29:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

CREATE TABLE `contact_enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_enquiries`
--

INSERT INTO `contact_enquiries` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created`, `updated`, `deleted`) VALUES
(1, 'Soumya', 'soumya.nayak@ikontel.com', '8908930619', 'Testing', 'Hello from front end', '2023-08-16 08:30:11', NULL, NULL),
(2, 'Soumya', 'test@gmail.com', '8908930619', 'Testing', 'Hello from front end', '2023-08-17 10:55:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `speciality` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `img`, `name`, `speciality`, `description`, `isActive`, `created`, `updated`, `deleted`) VALUES
(1, 'doc.jpg', 'Stevest Henry', 'Ophthalmologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', 0, '2023-08-17 06:08:47', NULL, NULL),
(2, 'doc.jpg', 'Williums Kevins', 'Dermatologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', 0, '2023-08-17 06:08:47', NULL, NULL),
(3, 'doc.jpg', 'Kewillues Jenifer', 'Radiologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', 0, '2023-08-17 06:08:47', NULL, NULL),
(4, 'doc.jpg', 'Marquis Williums', 'Urologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', 0, '2023-08-17 06:08:47', NULL, NULL),
(5, 'doc.jpg', 'Revenna Warner', 'Neurologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', 0, '2023-08-17 06:08:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `isActive`, `created`, `updated`, `deleted`) VALUES
(1, 'What are the lab charges ?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam, quis nostrud.', 0, '2023-08-16 10:33:50', NULL, NULL),
(2, 'How to get appointment?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam, quis nostrud.', 0, '2023-08-16 10:33:50', NULL, NULL),
(3, 'How to book health check?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam, quis nostrud.', 0, '2023-08-16 10:33:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `catagory` text NOT NULL,
  `catagory_icon` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `img`, `catagory`, `catagory_icon`, `created`, `updated`, `deleted`) VALUES
(1, 'GALLERY TITLE1', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', '1.jpg', 'home-care', 'icofont icofont-paralysis-disability', '2023-08-16 11:39:21', NULL, NULL),
(3, 'GALLERY TITLE3', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', '3.jpg', 'diabetes-solution', 'icofont icofont-pills', '2023-08-16 11:42:04', NULL, NULL),
(4, 'GALLERY TITLE4', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', '4.jpg', 'diabetes-solution', 'icofont icofont-pills', '2023-08-16 11:42:04', NULL, NULL),
(5, 'GALLERY TITLE5', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', '5.jpg', 'home-care', 'icofont icofont-paralysis-disability', '2023-08-16 11:42:04', NULL, NULL),
(7, 'GALLERY TITLE7', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', '3.jpg', 'home-care', 'icofont icofont-paralysis-disability', '2023-08-16 11:42:04', NULL, NULL),
(8, 'GALLERY TITLE8', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', '1.jpg', 'dental-medicine', 'icofont icofont-paralysis-disability', '2023-08-16 11:42:04', NULL, NULL),
(10, 'GALLERY TITLE10', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', '10.jpg', 'bariatric-surgery', 'icofont icofont-surgeon', '2023-08-16 11:42:04', NULL, NULL),
(11, 'GALLERY TITLE11', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', '11.jpg', 'dental-medicine', 'icofont icofont-paralysis-disability', '2023-08-16 11:42:04', NULL, NULL),
(12, 'GALLERY TITLE12', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', '12.jpg', 'dental-medicine', 'icofont icofont-paralysis-disability', '2023-08-16 11:42:04', NULL, NULL),
(14, 'GALLERY TITLE2', 'Lorem ipsum dolor sit amet, consectetur adipiscing.', 'image-380x380.jpg', 'dental-medicine', 'icofont icofont-paralysis-disability', '2023-08-16 11:42:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `img`, `created`, `updated`, `deleted`) VALUES
(1, 'image-1050x400.jpg', '2023-08-17 04:14:05', NULL, NULL),
(2, 'image-1050x400.jpg', '2023-08-17 04:14:38', NULL, NULL),
(3, 'image-1050x400.jpg', '2023-08-17 04:14:38', NULL, NULL),
(4, 'image-1050x400.jpg', '2023-08-17 04:14:38', NULL, NULL),
(5, 'image-1050x400.jpg', '2023-08-17 04:14:38', NULL, NULL),
(6, 'image-1050x400.jpg', '2023-08-17 04:14:38', NULL, NULL),
(7, 'image-1050x400.jpg', '2023-08-17 04:14:38', NULL, NULL),
(8, 'image-1050x400.jpg', '2023-08-17 04:14:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `logo` text DEFAULT NULL,
  `org_name` text DEFAULT NULL,
  `heading` text DEFAULT NULL,
  `paragraph` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`id`, `logo`, `org_name`, `heading`, `paragraph`, `created`, `updated`, `deleted`) VALUES
(1, 'logo.png', 'Kulkarni Medzone', 'Welcome to Kulkarni Medzone: Your Health Oasis', 'Hey there, wonderful soul! We\'re so thrilled to have you here at Kulkarni Medzone, your cosy corner of care. We\'re not just any hospital – we\'re your dedicated partners on this amazing journey to better health. So, let\'s dive in and explore the world of compassionate healthcare together.', '2023-08-14 03:09:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `icon_class` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `icon_class`) VALUES
(1, 'uil uil-phone'),
(2, 'uil uil-phone'),
(3, 'fa fa-external-link'),
(4, 'uil uil-cloud-upload'),
(5, 'uil uil-comment-alt-lines'),
(6, 'uil uil-megaphone'),
(7, 'uil uil-megaphone'),
(8, 'uil uil-layer-group'),
(9, 'uil uil-layer-group'),
(10, 'bi bi-telephone'),
(11, 'uil uil-outgoing-call'),
(12, 'fa fa-cloud-download'),
(13, 'fa fa-cloud'),
(14, 'uil uil-phone'),
(15, 'uil uil-phone'),
(16, 'uil uil-phone'),
(17, 'uil uil-headphones'),
(18, 'uil uil-envelopes'),
(19, 'uil uil-layer-group'),
(20, 'uil uil-layer-group'),
(21, 'uil uil-layer-group'),
(22, 'uil uil-phone'),
(23, 'uil uil-layer-group'),
(24, 'uil uil-headphones'),
(25, 'uil uil-layer-group'),
(26, 'uil uil-layer-group'),
(27, 'uil uil-layer-group'),
(28, 'uil uil-layer-group'),
(29, 'uil uil-layer-group'),
(30, 'uil uil-layer-group'),
(31, 'uil uil-layer-group'),
(32, 'uil uil-layer-group'),
(33, 'uil uil-layer-group'),
(34, 'uil uil-layer-group'),
(35, 'uil uil-layer-group'),
(36, 'uil uil-layer-group'),
(37, 'uil uil-layer-group'),
(38, 'uil uil-layer-group'),
(39, 'uil uil-layer-group'),
(40, 'uil uil-layer-group'),
(41, 'uil uil-layer-group'),
(42, 'uil uil-layer-group'),
(43, 'uil uil-layer-group'),
(44, 'uil uil-layer-group'),
(45, 'uil uil-layer-group'),
(46, 'uil uil-layer-group'),
(47, 'uil uil-layer-group'),
(48, 'uil uil-layer-group'),
(49, 'uil uil-layer-group'),
(50, 'uil uil-layer-group'),
(51, 'uil uil-layer-group'),
(52, 'uil uil-layer-group'),
(53, 'uil uil-layer-group'),
(54, 'uil uil-layer-group'),
(55, 'uil uil-layer-group'),
(56, 'uil uil-layer-group'),
(57, 'uil uil-layer-group'),
(58, 'uil uil-layer-group'),
(59, 'uil uil-layer-group'),
(60, 'uil uil-layer-group'),
(61, 'uil uil-layer-group'),
(62, 'uil uil-layer-group'),
(63, 'uil uil-layer-group'),
(64, 'uil uil-layer-group'),
(65, 'uil uil-layer-group'),
(66, 'uil uil-layer-group'),
(67, 'uil uil-layer-group'),
(68, 'uil uil-cloud-upload'),
(69, 'uil uil-cloud-upload'),
(70, 'uil uil-cloud-upload'),
(71, 'uil uil-cloud-upload'),
(72, 'uil uil-cloud-upload'),
(73, 'uil uil-cloud-upload'),
(74, 'uil uil-cloud-upload'),
(75, 'uil uil-layer-group'),
(76, 'uil uil-layer-group'),
(77, 'uil uil-layer-group'),
(78, 'uil uil-layer-group'),
(79, 'uil uil-layer-group'),
(80, 'uil uil-layer-group'),
(81, 'uil uil-layer-group'),
(82, 'uil uil-layer-group'),
(83, 'uil uil-layer-group'),
(84, 'uil uil-layer-group'),
(85, 'uil uil-layer-group'),
(86, 'uil uil-layer-group'),
(87, 'uil uil-layer-group'),
(88, 'uil uil-layer-group'),
(89, 'uil uil-layer-group'),
(90, 'uil uil-layer-group'),
(91, 'uil uil-layer-group'),
(92, 'uil uil-layer-group'),
(93, 'uil uil-layer-group');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `count` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `count`, `icon`, `created`, `updated`, `deleted`) VALUES
(1, 'Happy Patients', '1250', 'icofont icofont-users-alt-2', '2023-08-17 05:18:14', NULL, NULL),
(2, 'Medical Workers', '1350', 'icofont icofont-nurse-alt', '2023-08-17 05:18:14', NULL, NULL),
(3, 'Total Doctors', '1560', 'icofont icofont-doctor-alt', '2023-08-17 05:18:14', NULL, NULL),
(4, 'Medical Experience', '1670', 'icofont icofont-hat-alt', '2023-08-17 05:18:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `thumbnail` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img1` text DEFAULT NULL,
  `img2` text DEFAULT NULL,
  `img3` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `thumbnail`, `title`, `description`, `img1`, `img2`, `img3`, `created`, `updated`, `deleted`) VALUES
(1, '1.jpg', 'General medicine', 'Expert General Medicine Care at Kulkarni Medzone: Your Path to Comprehensive Wellness\r\nComprehensive General Medicine Services for Your Health Needs\r\nWhen it comes to your health, having a reliable healthcare partner is essential. At Kulkarni Medzone in Bangalore, we\'re dedicated to providing expert General Medicine services that cater to a diverse range of health concerns. Our team of skilled and compassionate General Medicine physicians stands at the forefront of medical excellence, offering a holistic approach that encompasses preventive care, accurate diagnosis, and personalized treatment plans.\r\nTailored Care from Our Dedicated General Medicine Physicians\r\nOur team of General Medicine physicians at Kulkarni Medzone boasts an extensive range of knowledge and experience. From managing common ailments like colds, flu, and infections, to addressing complex conditions such as diabetes, hypertension, and respiratory disorders, our experts are committed to promoting your overall well-being. What sets us apart is our emphasis on personalized care. Our physicians take the time to attentively listen, skillfully diagnose, and collaboratively work with you to create effective healthcare strategies that suit your unique needs.\r\nA Trusted Name in General Medicine: Kulkarni Medzone\r\nWhen it comes to your health, you deserve the best. Kulkarni Medzone has earned its reputation as a trusted brand in general medicine, both in Bangalore and beyond. Our services go beyond traditional medical care; we believe in fostering lasting relationships with our patients. This is why we\'re not just your healthcare providers; we\'re your partners on the journey to optimal health.\r\nExperience Patient-Centric General Medicine at Kulkarni Medzone\r\nYour healthcare experience should be centred around you. That\'s the belief we hold dear at Kulkarni Medzone in Bangalore. When you step into our state-of-the-art facilities, you\'re greeted by a patient-centric environment designed to make you feel comfortable and cared for. Our approach is grounded in the highest standards of medical practice, combined with a focus on your unique needs. With Kulkarni Medzone, you\'re not just receiving medical care – you\'re embarking on a journey towards a healthier and happier you.\r\nIn every step of your healthcare journey, Kulkarni Medzone in Bangalore is here to provide unparalleled General Medicine services that prioritize your well-being. With our experienced physicians, patient-centric approach, and commitment to excellence, we invite you to experience healthcare like never before. Your health is our priority, and we\'re honored to be a part of your wellness story.\r\n', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(2, '1.jpg', 'Gynaecology', 'Expert Gynaecological Care at Kulkarni Medzone: Nurturing Women\'s Health in Bangalore\nGynaecology, a specialized branch of medicine, is dedicated to the health and well-being of the female reproductive system. At Kulkarni Medzone in Bangalore, we are deeply committed to providing genuine and authentic gynaecological care that caters to the unique health needs of women. Our team of skilled professionals is genuinely passionate about offering comprehensive services, empowering women to prioritize their well-being.\nComprehensive Gynaecological Services:\nNestled in the heart of Bangalore, Kulkarni Medzone stands as a true symbol of excellence in gynaecological care. Our range of gynaecological services genuinely encompasses a wide spectrum of concerns, ensuring that women receive thorough attention to their health. With a heartfelt patient-centric approach, our dedicated team of gynaecologists ensures that every woman\'s journey through our doors is met with sincere and personalized care, resonating with their individual health goals.\nExpert Gynaecologists at Your Service:\nChoosing the best gynaecologist is an integral decision for women seeking quality healthcare. At Kulkarni Medzone, we deeply comprehend the significance of this choice, which is why we have thoughtfully assembled a team of experienced and skilled gynaecologists. Our experts genuinely specialize in diagnosing and treating a myriad of gynaecological conditions, ensuring that women receive accurate assessments and effective treatments from compassionate professionals who truly understand their concerns.\nEmpowering Through Knowledge:\nEducation is the cornerstone of well-informed healthcare decisions, and at Kulkarni Medzone, we ardently believe in empowering women through genuine knowledge. Our gynaecologists are genuinely committed to taking the time to educate patients about their reproductive health, menstrual cycles, and available treatment options. By fostering a deeper understanding of their bodies, women genuinely become active participants in their healthcare journey, making choices that genuinely contribute to their overall well-being.\nHolistic Approach to Women\'s Wellness:\nUnderstanding that women\'s health extends far beyond the boundaries of the reproductive system, Kulkarni Medzone embraces a holistic approach that genuinely encompasses physical, emotional, and mental well-being. Our gynaecologists collaborate seamlessly with other medical specialists, ensuring a genuinely comprehensive care that addresses all aspects of women\'s wellness.\nA Trusted Partner in Women\'s Health:\nFor women in Bangalore, Kulkarni Medzone is not just a healthcare facility; it is a genuinely trusted partner dedicated to nurturing well-being. With a team of seasoned gynaecologists, we genuinely offer not only medical expertise but also a compassionate understanding of the unique health journey that each woman embarks upon. From routine examinations to intricate treatments, Kulkarni Medzone genuinely stands as the ultimate destination for gynaecological care, providing unwavering support and genuine guidance.\nIn the vibrant city of Bangalore, Kulkarni Medzone genuinely takes pride in being a beacon of gynaecological care. Our commitment to excellence, patient-centric approach, and dedication to empowering women through knowledge make us a truly preferred choice for women seeking comprehensive and personalized gynaecological services. With Kulkarni Medzone by their side, every woman can genuinely embark on a health journey marked by informed decisions and holistic well-being.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(3, '1.jpg', 'Comprehensive diabetic care', 'Comprehensive Diabetic Care at Kulkarni Medzone: Nurturing Wellness in Bangalore\r\nThe realm of diabetes management demands meticulous attention and a comprehensive approach that respects the unique needs of each individual. Kulkarni Medzone, situated in the heart of Bangalore, takes profound pride in extending genuine and authentic diabetic treatment, meticulously tailored to embrace the distinctive health journey of every patient. Our commitment rests not only in medical expertise but in fostering a compassionate partnership that empowers individuals to lead enriching lives despite the challenges posed by diabetes.\r\nUnderstanding Diabetes:\r\nDiabetes isn\'t just a medical condition; it\'s a complex interplay between biology and lifestyle. This intricate dance requires a thoughtful orchestration of medical, dietary, and emotional factors. At Kulkarni Medzone, we acknowledge the depth of this complexity and approach each case with a genuine understanding of the nuances it holds. We comprehend that diabetes journeys aren\'t uniform, and our approach to care honours this uniqueness.\r\nComprehensive Diabetic Services:\r\nKulkarni Medzone emerges as a beacon of authenticity and dedication in the landscape of diabetic treatment. Our suite of comprehensive diabetic services isn\'t merely a list of medical interventions; it\'s a testament to our commitment to enveloping patients in genuine care. Our team, comprising seasoned endocrinologists, compassionate nutritionists, and educators, collaborates seamlessly, ensuring a holistic approach that transcends the boundaries of medicine.\r\nPersonalized Treatment Plans:\r\nCookie-cutter solutions have no place in our approach to diabetes management. At Kulkarni Medzone, we honour the individuality of each patient and curate personalized treatment plans that encompass medical nuances, lifestyle intricacies, and aspirations. Our experts immerse themselves in understanding medical histories, dietary preferences, and personal goals to create a roadmap that encompasses medication strategies, blood glucose monitoring, dietary alterations, fitness recommendations, and emotional fortitude.\r\nEmpowering Through Education:\r\nKnowledge is a potent tool that transcends prescription pads. Our approach delves deep into education, empowering patients with authentic insights into diabetes management. Our dedicated diabetes educators work earnestly, equipping individuals with a profound understanding of their condition, fostering self-awareness, and nurturing the confidence needed to make well-informed decisions that resonate with their well-being.\r\nPreventing Complications:\r\nComprehensive care isn\'t limited to the present; it extends into the realm of prevention. At Kulkarni Medzone, we hold prevention as a cornerstone of authentic diabetic care. Regular screenings, proactive eye examinations, meticulous foot care – these practices aren\'t mere routines but authentic safeguards against potential complications. By detecting and addressing issues at their inception, we ensure our patients face the future with resilience.\r\nIn a world where authenticity is rare, Kulkarni Medzone shines as a genuine partner in diabetic care. Our commitment to authenticity isn\'t confined to medical prowess; it permeates our approach, fostering connections that are rooted in empathy and respect. With Kulkarni Medzone as your ally, you\'re embarking on a journey that doesn\'t merely manage diabetes but embraces life authentically – complexities, triumphs, and all.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(4, '1.jpg', 'Precision diabetes', 'Precision Diabetes Care at Kulkarni Medzone: Navigating Wellness with Personalized Approach in Bangalore\r\nDiabetes, a complex metabolic disorder, affects millions worldwide. In the quest for more effective and individualized management, the concept of precision diabetes care emerges as a beacon of hope. At Kulkarni Medzone in Bangalore, we embrace this innovative approach with authenticity and dedication, aiming to revolutionize diabetes care by tailoring treatments to each individual\'s unique needs.\r\nUnderstanding Precision Diabetes Care:\r\nPrecision diabetes care marks a significant departure from the one-size-fits-all approach. It recognizes that no two individuals experience diabetes in the same way. Instead of generalizing treatment, precision diabetes care involves intricate analyses of genetic, environmental, and lifestyle factors. Kulkarni Medzone\'s commitment to this approach exemplifies our genuine desire to provide the most accurate and effective care possible.\r\nPersonalized Treatments with a Human Touch:\r\nAt Kulkarni Medzone, precision diabetes care is more than a buzzword; it\'s the cornerstone of our philosophy. Our authentic and caring team of professionals, including endocrinologists, nutritionists, and diabetes educators, invests time and effort into understanding each patient\'s distinct biological makeup, lifestyle choices, and medical history. This personalized insight guides the creation of treatment plans that genuinely cater to the whole person, not just the disease.\r\n\r\nEmpowering Through Knowledge:\r\nEmpowerment lies at the heart of precision diabetes care. Kulkarni Medzone\'s educators don\'t just impart information; they genuinely empower individuals to become active participants in their health journey. Through authentic education, patients gain a deeper understanding of their condition, learning how genetics, diet, physical activity, and stress uniquely influence their diabetes management. This genuine understanding empowers them to make informed decisions that impact their well-being.\r\n\r\nPreventing Future Complexities:\r\nOne of the most remarkable aspects of precision diabetes care is its potential to foresee and prevent future complications. By delving into an individual\'s genetic predispositions, lifestyle choices, and environmental factors, Kulkarni Medzone\'s experts work genuinely to anticipate potential challenges and design strategies that deter complications before they arise. This proactive and genuine approach aims to provide a healthier and more fulfilling life for individuals living with diabetes.\r\n\r\nA Future of Authentic Diabetes Management:\r\nAs Bangalore\'s vanguard of precision diabetes care, Kulkarni Medzone is committed to shaping the future of diabetes management. Our dedication to authenticity, innovation, and personalized attention defines us as more than a healthcare provider – we are a genuine partner in your journey towards balanced health. With us by your side, you\'re not just managing diabetes; you\'re embracing an authentic and personalized path to wellness that genuinely empowers you to live life to the fullest.\r\n\r\nPrecision diabetes care is an authentic paradigm shift in diabetes management. At Kulkarni Medzone, it isn\'t just a concept; it\'s a heartfelt commitment to revolutionizing the way we approach diabetes care. Through genuine personalized treatments, authentic education, and proactive prevention, we are redefining the landscape of diabetes care in Bangalore. Kulkarni Medzone isn\'t just a brand; it\'s a genuine ally in your pursuit of a healthier, more fulfilling life with diabetes.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(5, '1.jpg', 'Diabetes reversal programmes', 'Empowering Wellness through Personalized Diabetes Reversal Programs at Kulkarni Medzone\r\nIn the realm of diabetes management, the pursuit of reversing diabetes has gained significant traction. At Kulkarni Medzone in Bangalore, we embrace this challenge with authenticity and dedication, offering diabetes reversal programs that empower individuals to regain control over their health. Our approach transcends generic solutions, focusing on personalized strategies that address the unique needs of each individual.\r\n\r\nUnderstanding Diabetes Reversal Programs:\r\nDiabetes reversal isn\'t just an ideal; it\'s a scientifically backed endeavor involving lifestyle modifications to enhance insulin sensitivity and stabilize blood sugar levels. Kulkarni Medzone\'s diabetes reversal programs are rooted in this concept, aiming to guide participants towards a healthier and more fulfilling life.\r\n\r\nPersonalized Guidance for Lasting Results:\r\nOur diabetes reversal programs at Kulkarni Medzone are far from one-size-fits-all approaches. Our authentic team, comprising endocrinologists, nutritionists, and wellness coaches, collaborates closely with each participant. By comprehending their distinct medical history, dietary preferences, and lifestyle habits, we craft tailored plans that genuinely pave the path for sustained diabetes reversal.\r\n\r\nEmpowering Through Lifestyle Changes:\r\nAt the core of our approach is the empowerment of individuals to enact informed lifestyle changes. Our authentic education and guidance empower participants to recognize the impact of their daily choices on diabetes management. From making nutritious dietary selections to engaging in regular physical activity and adopting stress management techniques, our diabetes reversal programs are meticulously designed to catalyze a holistic shift towards enhanced well-being.\r\n\r\nCelebrating Progress and Milestones:\r\nDiabetes reversal isn\'t an instantaneous feat; it\'s an ongoing journey characterized by progress and milestones. At Kulkarni Medzone, we wholeheartedly celebrate each incremental triumph. Our supportive environment, led by genuine professionals, instills participants with the encouragement they require to remain motivated and steadfast in their pursuits.\r\n\r\nA Future of Health and Vitality:\r\nKulkarni Medzone envisions a future where diabetes reversal isn\'t just theoretical – it\'s a tangible reality for many. Our commitment to authenticity and innovation propels our dedication to continually refine and elevate our diabetes reversal programs. As a trusted brand in Bangalore, we are genuinely invested in pioneering the path towards heightened health and vitality for individuals seeking liberation from the constraints of diabetes.\r\nThe diabetes reversal programs at Kulkarni Medzone transcend mere programs; they exemplify our heartfelt commitment to transforming lives. Our authentic approach, coupled with personalized guidance and the celebration of progress, fosters a nurturing environment wherein individuals can embark on a journey towards improved health. By embracing Kulkarni Medzone\'s diabetes reversal programs, you\'re embracing a genuine and individualized path that leads to enhanced well-being and a future teeming with vitality.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(6, '1.jpg', 'Gen surgery', 'Expert General Surgery Services at Kulkarni Medzone: Nurturing Health and Wellness in Bangalore\r\nThe realm of general surgery is a cornerstone of modern medical care, addressing a diverse spectrum of surgical conditions. Kulkarni Medzone in Bangalore is proud to offer a comprehensive array of general surgery services, encompassing surgical expertise, patient-centered care, and a commitment to fostering health and well-being.\r\nUnderstanding General Surgery:\r\nGeneral surgery encompasses an extensive range of procedures designed to diagnose, treat, and manage various surgical conditions. From routine hernia repairs and gallbladder surgeries to intricate interventions involving the abdomen, breast, skin, and soft tissues, general surgery\'s scope is vast and diverse. At Kulkarni Medzone, our team of adept general surgeons is equipped to handle this breadth of challenges.\r\nComprehensive Surgical Services:\r\nKulkarni Medzone shines as a beacon of excellence within the general surgery landscape in Bangalore. Our comprehensive suite of surgical services goes beyond medical intervention; it encompasses a holistic approach to patient care. A dedicated team of surgeons collaborates seamlessly, ensuring that each patient receives tailored attention and a personalized treatment plan.\r\nPersonalized Care for Every Patient:\r\nCentral to our general surgery services is the principle of personalized care. Kulkarni Medzone recognizes the uniqueness of each patient, and this understanding guides their surgical journey. Our commitment to patient-centred care ensures that medical aspects are harmoniously aligned with the emotional well-being of every individual.\r\nMinimally Invasive Techniques for Enhanced Recovery:\r\nIn harmony with technological advancements, Kulkarni Medzone readily embraces minimally invasive techniques when suitable. These innovative approaches, such as laparoscopic and robotic-assisted surgeries, offer an array of advantages including smaller incisions, reduced discomfort, shorter hospital stays, and quicker recuperation. Our dedication to staying at the forefront of surgical techniques underscores our commitment to enhancing patient comfort and overall outcomes.\r\nA Trusted Partner in Surgical Care:\r\nKulkarni Medzone stands as a genuine and trusted partner in the realm of surgical care for the people of Bangalore. Our brand epitomizes authenticity, expertise, and steadfast support for patients navigating the complexities of general surgery. With a focus on comprehensive patient education, meticulous preoperative assessments, and diligent postoperative follow-up, we ensure that each patient\'s surgical journey is defined by trust, transparency, and optimal results.\r\nGeneral surgery plays an indispensable role in addressing a myriad of surgical conditions, and Kulkarni Medzone is dedicated to delivering unparalleled care in Bangalore. Our commitment to surgical proficiency, personalized care, and embracing innovative techniques underscores our resolve to promote patient well-being. When you choose Kulkarni Medzone for your general surgery needs, you\'re choosing a genuine ally in your pursuit of restored health and an enhanced quality of life.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(7, '1.jpg', 'Nutrition education', 'Empowering Health through Comprehensive Nutrition Education: Kulkarni Medzone\'s Holistic Approach\r\nNutrition serves as the cornerstone of overall well-being, and a deep understanding of it can significantly impact our health. Kulkarni Medzone, a trusted name in Bangalore, is dedicated to offering comprehensive nutrition education that empowers individuals to make well-informed dietary choices. Our commitment to holistic well-being is reflected in our nutrition programs designed to foster lasting health improvements.\r\n\r\nUnderstanding Nutrition Education:\r\nNutrition education surpasses the mere transmission of facts; it equips individuals with the knowledge and tools needed for meaningful dietary decisions. This education encompasses the vital role of nutrients, portion management, strategic meal planning, and the profound influence of food on our general health. Kulkarni Medzone recognizes the pivotal role of nutrition education in promoting healthier lifestyles.\r\n\r\nComprehensive Nutrition Programs:\r\nAt Kulkarni Medzone, we stand as a beacon of excellence in the realm of nutrition education in Bangalore. Our comprehensive range of nutrition programs goes beyond basic guidance, delving deep into the intricacies of nourishment and its far-reaching effects. Our team of dedicated nutritionists collaborates seamlessly to offer a holistic approach that aligns with individual health aspirations.\r\n\r\nPersonalized Guidance for Lasting Impact:\r\nCentral to our nutrition education approach is the principle of personalization. Our authentic and empathetic nutritionists at Kulkarni Medzone understand that every individual\'s nutritional requirements are unique. By meticulously assessing dietary habits, existing health conditions, and personal goals, we create personalized plans that genuinely resonate with each person.\r\n\r\nBuilding Strong Foundations for Health:\r\nNutrition education is not about quick fixes; it\'s about establishing a robust foundation for sustained well-being. Kulkarni Medzone\'s nutrition programs emphasize the significance of making gradual, sustainable dietary modifications. By imparting authentic insights into balanced nutrition, nutrient-rich food choices, and mindful eating practices, we empower individuals to take proactive control of their health journey.\r\n\r\nPreventing Health Challenges through Nutrition:\r\nA fundamental aspect of nutrition education lies in its potential to prevent health challenges before they manifest. Through comprehensive education about the pivotal role of nutrition in averting chronic ailments such as diabetes, heart disease, and obesity, Kulkarni Medzone strives to be a proactive partner in individual well-being. By imparting knowledge, we aim to contribute to a healthier and more vibrant future.\r\n\r\nTransforming Lives Through Knowledge:\r\nKulkarni Medzone envisions a future where nutrition education becomes a catalyst for transforming lives. Our commitment to authenticity and innovation fuels our nutrition programs, ensuring that each participant gains a holistic understanding of how nutrition impacts their overall well-being. As a respected brand, we take pride in cultivating a culture of informed dietary choices that lead to tangible improvements in health outcomes.\r\nNutrition education holds the potential to empower individuals to take active control of their health and wellness. Kulkarni Medzone\'s dedication to providing comprehensive and genuine nutrition education reflects our unwavering commitment to nurturing lasting health enhancements in Bangalore. By embracing our nutrition programs, you\'re embarking on a meaningful journey towards holistic well-being and a future marked by vitality and improved quality of life.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(8, '1.jpg', 'Neurology', 'Elevating Neurological Health: Your journey with Kulkarni Hospital\r\nEver wondered about the intricate world of the nervous system? At Kulkarni Hospital, we\'re not just about medical expertise; we\'re your partners on a unique journey to better brain health and overall well-being. Let\'s dive into the captivating realm of neurology and explore how we\'re making a genuine difference in Bangalore.\r\nEmbarking on the Neurology Adventure:\r\nNeurology – it\'s more than just a medical term. It\'s the field that unveils the secrets of your nervous system, the powerhouse behind your body\'s functions. Kulkarni Hospital isn\'t just another healthcare facility; we\'re your guides on an adventure that aims to enhance your brain health and quality of life.\r\n\r\nUnderstanding Neurology:\r\nPicture this: your brain, spinal cord, nerves, and muscles are like a symphony orchestra, playing in perfect harmony. Neurology steps in when there\'s a hiccup in this orchestra. It\'s the branch of medicine that deciphers the messages your body sends and receives. At Kulkarni Hospital, we\'re not just solving puzzles; we\'re ensuring your well-being.\r\n\r\nYour Personalized Neurology Experience:\r\nCookie-cutter solutions ? Not our style. When you step into Kulkarni Hospital, you become part of a family. Our passionate team of neurologists isn\'t here to throw jargon at you; they genuinely care about your story. We take the time to understand not just the medical side but also your emotions. Why? Because your journey to well-being is as unique as you are.\r\n\r\nUnravelling the Mysteries:\r\nNeurological issues can be like riddles waiting to be solved. From migraine enigmas to the complexities of Parkinson\'s, we\'re the detectives of Kulkarni Hospital, armed with cutting-edge tools and a passion for progress. We\'re not just treating; we\'re untangling the threads of these neurological mysteries for a better you.\r\n\r\nInnovating for Your Brain Health:\r\nGuess what? We\'re not just stopping at solving puzzles. Our neurologists at Kulkarni Hospital are like explorers, venturing into the uncharted territories of neurological science. We\'re staying on top of the latest breakthroughs so that you receive the most advanced treatments available.\r\n\r\nTaking Wellness Beyond the Surface:\r\nNeurological conditions aren\'t just about the body; they touch the soul too. That\'s why our approach is holistic. We don\'t work in isolation; we collaborate with experts from various fields to ensure your overall well-being. At Kulkarni Hospital, we\'re not just doctors; we\'re advocates for your complete health.\r\n\r\nEmpowerment through Knowledge:\r\nFacing neurological challenges can be daunting, but knowledge is your ally. Our neurologists at Kulkarni Hospital don\'t speak in medical jargon; they\'re here to have a conversation. They\'ll break down diagnoses, discuss treatment options, and share prevention tips in a language you can understand. Because when you\'re informed, you\'re in control of your well-being journey.\r\nNeurology isn\'t a distant land of medical complexities; it\'s a journey that you, Kulkarni Hospital, and your brain embark upon together. With personalized care, innovation, and a commitment to your overall well-being, we\'re here to guide you. Choosing Kulkarni Hospital isn\'t just seeking medical help; it\'s choosing a partner who cares about your brain health and is dedicated to empowering you every step of the way.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(9, '1.jpg', 'Gastroenterology', 'Embark on a Journey to Digestive Wellness: Your Guide to Gastroenterology with Kulkarni Medzone\r\nHey there, let\'s chat about something that hits close to home – your digestive system! At Kulkarni Medzone, we\'re not your typical medical center; we\'re your companions on a quest to ensure your digestive health is in top form. Get ready to explore the world of gastroenterology with a human touch, all courtesy of Kulkarni Medzone.\r\n\r\nNavigating the Gastroenterology Universe:\r\nGastroenterology – it sounds complex, but it\'s all about understanding the intricate pathways of your digestive tract. And guess what? We\'re here to unravel the mysteries and keep your tummy and overall health on track.\r\n\r\nBeyond Routine Check-Ups: Comprehensive Gastroenterology Care:\r\nWhen you step into Kulkarni Medzone, you\'re not just getting a routine check-up. We\'re taking it a step further. We dive deep into your digestive system, crafting personalized care plans tailored just for you. Our team of friendly gastroenterologists works together to ensure you receive the attention and care you deserve.\r\n\r\nPersonalized Care for a Happier Belly:\r\nHere\'s the secret ingredient – personalization! Our team isn\'t just about medical jargon; they genuinely care about your well-being. They\'ll take the time to understand not just the medical details, but also your emotional state. This connection is the basis for creating treatment plans as unique as you are, all geared towards boosting your digestive health.\r\n\r\nFrom Bloating to Complex Conditions: We\'ve Got Your Back:\r\nWhether it\'s occasional bloating or more intricate issues like irritable bowel syndrome, we\'re here to help. We\'re your health detectives, equipped with the latest tools and a genuine commitment to making you feel your best – whether it\'s common concerns or puzzle-like conditions like Crohn\'s disease or celiac disease.\r\n\r\nInnovating for Your Gut Health:\r\nWe\'re not content with the status quo; we\'re on a mission to make your gut feel fantastic. Our gastroenterologists at Kulkarni Medzone aren\'t your average doctors; they\'re like explorers in the realm of medical science. They\'re always on the lookout for innovative ways to keep your digestive system thriving.\r\n\r\nYour Well-being, Inside and Out: Holistic Digestive Care:\r\nRemember, it\'s not just about the physical. Your digestive health has a ripple effect on your entire well-being. That\'s why we take a holistic approach, collaborating with experts from various fields. We\'re not just treating symptoms; we\'re ensuring you\'re feeling your best from the inside out.\r\n\r\nEmpowerment through Knowledge:\r\nFeeling overwhelmed by all the talk about digestive systems and diseases? Fear not – we\'re here to break it down for you. Our gastroenterologists don\'t throw around complex medical terms; they\'re here to have a conversation. They\'ll explain everything in plain language, so you\'re in the driver\'s seat of your health journey.\r\nSo, there you have it – gastroenterology isn\'t as intimidating as it might sound. It\'s about understanding your belly and making sure it\'s happy. At Kulkarni Medzone, we\'re not just about medical care; we\'re about genuine care for your digestive health. With personalized approaches, innovation, and a sprinkle of human touch, we\'re your companions on the road to a healthier gut. Ready to take the plunge ? Choose Kulkarni Medzone for your gastroenterology needs and get set for a journey to digestive well-being that\'s as unique as you are.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(10, '1.jpg', 'Endocrinology', 'Navigating Hormonal Harmony: Your Journey into Endocrinology with Kulkarni Medzone\r\nHey there, ever wondered how your body\'s inner messengers work their magic? It\'s all thanks to the fascinating world of endocrinology! But hold on, we\'re not diving into a boring science lecture here. At Kulkarni Medzone, we\'re your partners on a journey to unravel the secrets of hormonal health. Ready to explore the captivating universe of endocrinology ? Let\'s dive in!\r\n\r\nEmbarking on an Endocrinology Adventure:\r\nEndocrinology – okay, it\'s a bit of a mouthful, but it\'s like your body\'s very own messaging system. And guess what? Kulkarni Medzone is your guide to understanding how these messages keep your body in sync and harmony.\r\n\r\nBeyond Check-Ups: Your Comprehensive Hormonal Experience:\r\nHold up, we\'re not here for a quick check-up and a pat on the back. Kulkarni Medzone believes in going above and beyond. We\'re talking in-depth evaluations, personalized care plans, and ongoing support. Our squad of skilled endocrinologists is like your health dream team, all working together to give your hormonal health the royal treatment.\r\n\r\nPersonalized Care for Your Hormonal Symphony:\r\nNow, here\'s the magic touch – personalization! Our endocrinologists aren\'t just white coats; they\'re your partners in health. They\'ll take the time to understand not only the medical mumbo-jumbo but also your unique story. This genuine connection is what helps us create treatment plans that are as individual as you are, all aimed at getting your hormones in perfect harmony.\r\n\r\nJuggling Hormones, One Step at a Time:\r\nPicture this: your hormones are like a circus act, balancing everything from energy levels to emotions. Kulkarni Medzone\'s endocrinology maestros are the ringmasters, making sure every act is flawless. Whether it\'s managing thyroid troubles, tackling diabetes, or taming adrenal issues, we\'re here to make sure your hormonal show is a hit.\r\n\r\nPioneering the Future of Hormonal Health:\r\nGuess what? We\'re not just content with the basics. Our endocrinologists at Kulkarni Medzone are like the trailblazers of the hormonal world. They\'re always in the know, keeping up with the latest breakthroughs. Why? So you can benefit from the coolest and most cutting-edge treatments out there.\r\n\r\nHolistic Care for Your Hormones and Happiness:\r\nHold the phone – it\'s not just about hormones; it\'s about your overall happiness too. Kulkarni Medzone believes in the whole package. We collaborate with experts from all corners to make sure your hormonal health isn\'t just a checkbox; it\'s a ticket to a vibrant and joyful life.\r\n\r\nEmpowering You with Hormonal Wisdom:\r\nFeeling overwhelmed by all this hormone talk? Don\'t worry, we\'re here to break it down in human terms. Our endocrinologists won\'t bombard you with jargon; they\'ll have a real conversation. They\'ll help you understand what\'s going on in your body, so you can make the best choices for your journey to hormonal well-being.\r\nEndocrinology might sound like a fancy word, but it\'s all about the magical world of your body\'s messengers. At Kulkarni Medzone, we\'re not just about medical care; we\'re about being your partners in hormonal harmony. With personalized touches, innovation, and a dash of authentic care, we\'re your go-to destination for all things endocrinology. Ready to take the plunge? Choose Kulkarni Medzone for your hormonal health needs and step into a world where balance, vitality, and well-being reign supreme.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(11, '1.jpg', 'Cardiology', '<p class=\"mb-3\">Exploring Cardiology: Your Heart&#39;s Journey with Kulkarni Medzone</p>\n\n                        <p class=\"mb-3\">Hey there, fellow heart enthusiasts! Ready to take a dive into the fascinating\n                            world of cardiology ?\n                            We&#39;re not about dull medical jargon here – at Kulkarni Medzone, we&#39;re all about\n                            making your heart\n                            health journey exciting and understandable. Join us as we embark on a journey through the\n                            mysteries and wonders of cardiology, where your heart takes centre stage!</p>\n\n                        <div class=\"row mt-3\">\n                            <div class=\"col-lg-4 col-md-4 col-sm-12 col-12\">\n                                <img class=\"img-fluid\"\n                                    src=\"https://images.unsplash.com/photo-1631217873436-b0fa88e71f0a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fFBhdGllbnRzfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60\"\n                                    alt=\"\">\n                            </div>\n                            <div class=\"col-lg-8 col-md-8 col-sm-12 col-12\">\n                                <div class=\"row\">\n                                    <div class=\"col-12\">\n                                        <ul>\n                                            <p class=\"mb-3\">Unravelling the Heart&#39;s Secrets:</p>\n\n                                            <p class=\"mb-3\">Alright, so cardiology – it&#39;s not just about\n                                                stethoscopes and EKGs. It&#39;s like a symphony of beats and\n                                                rhythms that keep you ticking. Kulkarni Medzone knows that cardiology\n                                                isn&#39;t just about diagnosing;\n                                                it&#39;s about preserving the harmony of your heart&#39;s melody for\n                                                years to come.</p>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n\n                        <div class=\"row mt-4\">\n                            <div class=\"col-lg-12\">\n\n                                <p class=\"mb-3\">Comprehensive Care, Beyond the Surface:</p>\n\n                                <p class=\"mb-3\">Say goodbye to one-size-fits-all solutions! At Kulkarni Medzone,\n                                    we&#39;re all about digging deep into\n                                    your heart&#39;s story. Our cardiology services go beyond the basics; we&#39;re\n                                    talking about a full-on\n                                    exploration of your cardiovascular system. From pinpoint diagnostics to crafting\n                                    personalized plans\n                                    that suit you like your favourite pair of jeans – we&#39;re here to give your heart\n                                    the VIP treatment it\n                                    deserves.</p>\n\n                                <p class=\"mb-3\">Personal Touch for Your Precious Heart:</p>\n\n                                <p class=\"mb-3\">Let&#39;s get personal, shall we? Our cardiology experts at Kulkarni\n                                    Medzone aren&#39;t just doctors; they&#39;re\n                                    your heart&#39;s best friends. They&#39;ll sit down with you, chat about not just\n                                    your medical history but also\n                                    your life&#39;s dreams. That&#39;s because understanding you is key to creating a\n                                    heart-healthy plan that fits\n                                    like a glove.</p>\n\n                                <p class=\"mb-3\">Rhythms, Beats, and Healthy Hearts:</p>\n\n                                <p class=\"mb-3\">Imagine your heart as a rock star drummer, keeping the rhythm of your\n                                    life. Our cardiology rock\n                                    stars at Kulkarni Medzone ensure every beat is on point. From keeping tabs on blood\n                                    pressure to\n                                    tackling tricky heart conditions, we&#39;re here to keep your heart&#39;s groove\n                                    going strong.</p>\n\n                                <p class=\"mb-3\">Pioneering the Future of Heart Health:</p>\n\n                                <p class=\"mb-3\">We&#39;re not your average cardiology centre; we&#39;re like the\n                                    trailblazers of heart health. Kulkarni\n                                    Medzone&#39;s cardiology team is all about staying ahead of the game. We&#39;re\n                                    constantly on the lookout\n                                    for the latest breakthroughs in heart science, so you get nothing but the best when\n                                    it comes to your\n                                    heart&#39;s well-being.</p>\n\n                                <p class=\"mb-3\">Holistic Heart Care for Your Full Potential:</p>\n\n                                <p class=\"mb-3\">Your heart isn&#39;t just a pump; it&#39;s the rhythm of your life&#39;s\n                                    symphony. Kulkarni Medzone&#39;s approach\n                                    involves a team effort. We&#39;re not just treating a heart – we&#39;re elevating\n                                    your overall well-being. It&#39;s\n                                    not just about checking boxes; it&#39;s about ensuring you&#39;re living your life\n                                    in tune with your heart&#39;s\n                                    desires.</p>\n\n                                <p class=\"mb-3\">Empowering You with Heart Wisdom:</p>\n\n                                <p class=\"mb-3\">Feeling a bit lost in the world of heart health? Don&#39;t worry;\n                                    we&#39;re here to be your guides. Our\n                                    cardiology pros at Kulkarni Medzone won&#39;t confuse you with fancy words;\n                                    they&#39;ll break it down in a\n                                    way that&#39;s as clear as day. When you&#39;re armed with knowledge, you&#39;re\n                                    steering the ship towards a\n                                    healthier, happier heart.</p>\n\n                                <p class=\"mb-3\">Cardiology isn&#39;t just about EKGs and numbers; it&#39;s about the\n                                    symphony of your heart&#39;s health. At\n                                    Kulkarni Medzone, we&#39;re not just another medical center; we&#39;re your partners\n                                    in preserving and\n                                    cherishing your heart&#39;s melody. With personalized care, innovation, and a\n                                    genuine passion for your\n                                    well-being, we&#39;re your go-to team for all things cardiology. Ready to take the\n                                    leap ? Choose Kulkarni\n                                    Medzone for your heart health journey, and let&#39;s create a melody that keeps your\n                                    heart singing\n                                    strong.</p>\n                                <div class=\"row mt-4\">\n                                    <div class=\"col-lg-12\">\n\n                                    </div>\n                                </div>\n                            </div>\n                        </div>', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(12, '1.jpg', 'Fully automated Laboratory', 'A New Era of Healthcare: Your Journey into Kulkarni Medzone\'s Fully Automated Laboratory\r\nHey there, health enthusiasts! Hold on tight because we\'re about to introduce you to something that\'s changing the game in healthcare – Kulkarni Medzone\'s fully automated laboratory. It\'s not just about machines; it\'s about a technological marvel that\'s revolutionizing how we diagnose and care for you. Join us as we take you on a tour of this futuristic world where precision, speed, and patient comfort converge.\r\n\r\nEmbracing the Power of Technology:\r\nStep into our automated laboratory, and you\'ll witness technology at its finest. We\'re talking about a system that handles everything from collecting samples to analyzing data – all with the precision of a seasoned pro. It\'s like having a team of expert scientists working tirelessly behind the scenes to ensure your results are as accurate as can be.\r\n\r\nA Game-Changer for Healthcare:\r\nSo, what\'s the big deal? Let\'s break it down. Imagine a world where human errors are minimized, where your test results come back faster than ever before. That\'s the magic of automation. It\'s not just about saving time; it\'s about giving you and your healthcare providers the information you need to make informed decisions about your health.\r\n\r\nPutting You First:\r\nWe get it – medical tests can be intimidating. But guess what? Our fully automated laboratory is designed with your comfort in mind. Say goodbye to long and uncomfortable procedures. With automation, sample collection becomes a breeze, and you\'ll be in and out in no time. It\'s all about making your experience as smooth as possible.\r\n\r\nPrecision Redefined:\r\nLet\'s talk accuracy. When it comes to your health, every detail matters. Our automated systems leave no room for guesswork. Whether it\'s complex blood tests or intricate imaging analysis, you can rest assured that every piece of data is captured and processed with utmost precision.\r\n\r\nEmpowering Our Experts:\r\nNow, you might be wondering – does automation mean less human touch? Absolutely not! In fact, it\'s quite the opposite. By taking care of repetitive tasks, our skilled healthcare professionals have more time to focus on what truly matters – you. It\'s about combining the power of technology with the warmth of human care to provide you with personalized insights and guidance.\r\n\r\nYour Data, Your Security:\r\nWe understand that your health data is sensitive. That\'s why our fully automated laboratory comes with top-notch security measures. Your information is safe and sound, and digital records make it easier than ever for you and your healthcare team to access and share vital information. It\'s all about collaboration for your well-being.\r\n\r\nPioneering the Future:\r\nBut wait, there\'s more! Our automated laboratory isn\'t just about the present; it\'s a hub for medical innovation. With technology driving the show, we\'re constantly exploring new ways to enhance diagnostics, improve treatment protocols, and gain a deeper understanding of health conditions. It\'s a dynamic space where progress is always in the making.\r\nWelcome to the future of healthcare, where automation meets compassion – all at Kulkarni Medzone\'s fully automated laboratory. It\'s not just about machines; it\'s about elevating your healthcare experience. With cutting-edge technology, precision diagnostics, and a team that\'s dedicated to your well-being, we\'re here to redefine what it means to care for you. So, why wait? Embrace the future with us and experience healthcare like never before.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL);
INSERT INTO `services` (`id`, `thumbnail`, `title`, `description`, `img1`, `img2`, `img3`, `created`, `updated`, `deleted`) VALUES
(13, '1.jpg', 'X-ray', 'Unveiling the Magic of X-Rays: Your Journey with Kulkarni Medzone\r\nHey there, fellow explorers of the unknown! Today, we\'re about to embark on an exciting adventure into the world of X-rays – those incredible rays that let us peek inside the human body like never before. Hold on tight as we join forces with Kulkarni Medzone to unravel the mysteries of X-rays, decode their language, and uncover the secrets they hold for your health.\r\n\r\nX-Rays: More Than Just Sci-Fi Gadgets:\r\nBelieve it or not, X-rays aren\'t confined to science fiction stories. These amazing rays are like our allies in the quest for understanding the human body. At Kulkarni Medzone, we recognize how crucial X-rays are in modern medicine, giving us a superpower to look inside and reveal the inner workings of your bones, tissues, and organs.\r\n\r\nPrecision Detective Work for Better Diagnoses:\r\nThink of X-rays as our Sherlock Holmes in the medical world. Equipped with Kulkarni Medzone\'s advanced X-ray technology, our medical wizards can capture detailed snapshots that help spot fractures, locate foreign objects, and unveil conditions that might have remained hidden otherwise. Imagine turning on the lights in a dark room, guiding us towards the right treatment path.\r\n\r\nComfort is Key: Making X-Rays Painless:\r\nWe understand the jitters that come with medical procedures. Rest assured, Kulkarni Medzone has your back. Our high-tech X-ray equipment prioritizes your comfort. With shorter scan times and minimal radiation exposure, we aim to minimize hassle and maximize your peace of mind while you\'re getting that insider\'s view of your body.\r\n\r\nX-Rays: The Science behind the Magic:\r\nWondering how X-rays work their magic? It\'s all about controlled radiation passing through you, creating images on a special detector. These images serve as snapshots, unveiling the secrets of your insides. This process helps us catch any health hiccups that might be hiding in the shadows.\r\n\r\nPersonalized Care with Digital Precision:\r\nBid farewell to old-school film X-rays. Kulkarni Medzone is embracing the digital revolution. Beyond reducing radiation exposure, this digital approach enables our medical maestros to zoom in, enhance images, and play detective with your health. The outcome ? Spot-on diagnoses and treatments tailored to fit you perfectly.\r\n\r\nMore than Just Bones: X-Rays in Action:\r\nX-rays are versatile problem-solvers. In orthopaedics, they\'re the go-to detectives for bone fractures, joint issues, and spine conditions. But their talents extend beyond bones – they\'re instrumental in diagnosing lung troubles, dental questions, and a myriad of other medical mysteries.\r\n\r\nSafety First: The Experts behind the Scenes:\r\nSafety is paramount at Kulkarni Medzone. Our skilled radiology team adheres to strict protocols, ensuring X-ray procedures are both safe and efficient. You\'re in good hands while we work our X-ray magic to provide the answers you need.\r\nX-rays aren\'t mere tools; they\'re like adventurers in the healthcare realm. Kulkarni Medzone is your trusted guide, using X-rays to bring clarity to your health narrative. Through precision imaging, prioritizing your comfort, and adding a touch of X-ray enchantment, we\'re here to illuminate the path to accurate diagnoses and effective treatments. Ready to dive into the world of X-rays with us ?', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(14, '1.jpg', 'ECG 2Decho', 'The Heart\'s Harmonious Tale: Discovering ECG and 2D Echo with Kulkarni Medzone\r\nHello, fellow health adventurers! Today, we\'re embarking on an incredible journey – a journey that delves straight into the heart of cardiac care. Together, with the warmth of Kulkarni Medzone, we\'ll dive into the magic of ECG and 2D Echo. Brace yourselves for a heartwarming exploration of these wonderful tools that are like musical notes to your heart\'s song.\r\n\r\nUnderstanding ECG: Capturing the Heart\'s Beat:\r\nImagine ECG as a heart\'s storyteller, capturing the rhythm of your heartbeats. At Kulkarni Medzone, we\'re here to understand your heart\'s language. This amazing graph records the electric signals that conduct each heartbeat. It\'s like translating heartbeats into a beautiful melody, helping our experts spot any irregularities and guiding you towards a healthier and happier beat.\r\n\r\n2D Echo: Witnessing Your Heart\'s Dance:\r\nNow, picture this – 2D Echo, your heart\'s dance partner. Kulkarni Medzone brings you this heartwarming ultrasound experience, a moving picture of your heart\'s structure and rhythm. It\'s as if you\'re watching your heart waltz and twirl right in front of your eyes. With 2D Echo, we catch any unexpected steps, ensuring that every heartbeat is in perfect sync, just like a beautiful dance.\r\n\r\nThe Dynamic Duo for Your Heart\'s Health:\r\nThink of ECG and 2D Echo as the dynamic duo of heart health. At Kulkarni Medzone, we believe in teamwork. ECG sets the beat, revealing the heart\'s electrical tale, while 2D Echo paints the heart\'s architectural masterpiece. Together, they create a full heart picture, guiding our skilled experts to make precise diagnoses and craft personalized care that feels like a warm hug.\r\n\r\nDecoding the Heart\'s Whisper:\r\nYour heart speaks a unique language, and ECG and 2D Echo are our translators. ECG listens to the heart\'s conversations, catching irregular heartbeats, potential hurdles, and subtle whispers. Meanwhile, 2D Echo paints the scene, helping us see heart chambers, blood flow, and the heartfelt story of your health. This heart-to-tech conversation helps us make decisions that genuinely care for your well-being.\r\n\r\nEmpowering Your Heart\'s Journey:\r\nLet\'s talk prevention – it\'s like giving your heart a protective hug. ECG and 2D Echo are your partners in this heart-warming journey. ECG acts like an early alarm, catching little hiccups before they turn into big tumbles. And 2D Echo ? It\'s like your heart\'s mirror, checking muscle strength and making sure every corner of your heart is happy and strong.\r\n\r\nPersonalized Care Straight from the Heart:\r\nGuess what? At Kulkarni Medzone, we\'re not just about heartbeats; we\'re about your heart\'s unique story. ECG and 2D Echo help us write personalized care plans that match your heart\'s tune. Whether it\'s keeping a watchful eye on old pals, checking on recovery after heart adventures, or ensuring your heart\'s overall well-being sings with joy, these tools are your heart\'s best friends.\r\n\r\nSafety, Expertise, and Your Heart\'s Song:\r\nYour safety is our top note. Kulkarni Medzone\'s skilled team handles ECG and 2D Echo with the utmost care. Our top-notch equipment ensures readings that are right on key, while our talented medical crew interprets the results with a touch of heart. It\'s like a perfect duet – technology and compassion – all for the sake of your heart\'s happiness.\r\nOrchestrating Heart Health with ECG and 2D Echo:\r\nIn the symphony of cardiac care, ECG and 2D Echo are the stars. At Kulkarni Medzone, we\'re your conductors, using these tools to listen to your heart\'s melody, decode its emotions, and compose a beautiful tune of well-being. So, when it comes to your heart\'s health, join us at Kulkarni Medzone, and let ECG and 2D Echo guide your heart toward a life filled with warmth and heart-warming notes.', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL),
(15, '1.jpg', 'Super specialty consultations', 'Embark on a Health Adventure with Super Specialty Consultations at Kulkarni Medzone\r\nHey there, fellow health explorers! Ready to dive into something exciting ? We\'re about to explore the world of super specialty consultations. Here at Kulkarni Medzone, we\'re all about taking care of you in the best way possible. So, let\'s get started on this journey – it\'s like a special care package for your health!\r\n\r\nDiscovering the Magic of Super Specialty Consultations:\r\nPicture having a team of health heroes, each really good at a specific thing – that\'s super specialty consultations! At Kulkarni Medzone, we\'ve got a group of doctors who are masters in their fields, like heart stuff or brain stuff. These experts have done a lot of learning and practicing, so they can give you extra good care and solutions that really fit your health needs.\r\n\r\nFinding Your Way with Super Specialty Care:\r\nIn the world of health, things can get pretty tricky. But don\'t worry – at Kulkarni Medzone, we\'re like your health guides. We\'ll connect you with the right expert who can help solve your health mysteries. Our goal is to make sure you\'re with the perfect person to help you feel better.\r\n\r\nYour Story, Your Care: Personal and Just for You:\r\nRemember how shoes come in different sizes? Well, health care should be like that too. Super specialty consultations at Kulkarni Medzone are all about making sure the care you get is just right for you. Our super experts take the time to learn about your health history, your lifestyle, and what you like. It\'s like making a plan that really suits you and helps you feel your best.\r\n\r\nA Symphony of Care: Bringing Different Experts Together:\r\nHealth isn\'t just one thing – it\'s a mix of different stuff. Kulkarni Medzone knows this, and that\'s why we have a bunch of experts from different areas. They work together, like a team, to make a plan that covers everything your health needs. It\'s like making sure all the pieces of your health puzzle fit perfectly.\r\n\r\nUnveiling the Future: Special Tests and Cool Treatments:\r\nGuess what? Super specialty consultations come with a cool bonus – you get access to fancy tests and treatments that regular doctors might not have. The super experts at Kulkarni Medzone know all about the newest tools and tricks. They can dive deep into your health questions and give you new ideas to feel better and have more energy.\r\n\r\nChampioning Your Well-being: Getting Awesome Results:\r\nWhen you choose super specialty consultations at Kulkarni Medzone, you\'re picking a path that leads to great results. Our super experts have a history of helping people a lot. Whether it\'s taking care of on-going health stuff, doing complicated procedures, or being like a health coach, they\'re here to help you feel awesome.\r\n\r\nA Heartfelt Touch: Connecting with You on a Personal Level:\r\nAt Kulkarni Medzone, we\'re not just doctors – we\'re people who care. Our super experts combine their big brain knowledge with a kind heart. They get that you\'re not just a bunch of medical facts – you\'re a person with feelings and dreams. Your journey with us is all about understanding, trust, and working together.\r\n\r\nStart Your Super Specialty Adventure with Kulkarni Medzone:\r\nAlright, it\'s time to begin your journey to better health! Super specialty consultations at Kulkarni Medzone are like a special pass to feeling better. With care just for you, cool tests, and a team that really cares, we\'re here to be your partners on this health adventure. So, let\'s get started – choose Kulkarni Medzone for super specialty consultations and let\'s make your health awesome!', 'image-713x400.jpg', '5.jpg', 'image-713x400.jpg', '2023-08-14 06:37:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `content`, `created`, `updated`, `deleted`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto atque inventore illo perspiciatis. Earum voluptate quis exercitationem consequatur natus excepturi consequuntur incidunt, autem recusandae delectus ratione totam corporis cumque veritatis reprehenderit iusto magnam soluta asperiores. Eius tempore veritatis temporibus, architecto dolore suscipit a consectetur corrupti praesentium nulla? Maxime, dolorem! Enim beatae asperiores voluptates natus non saepe eveniet doloribus blanditiis nesciunt fuga reiciendis nostrum corporis dolore, distinctio iure esse, cum magni! Voluptatum facere, magni minima cumque odit atque nesciunt magnam repudiandae reiciendis corrupti aliquid nulla quaerat vero, at unde, reprehenderit inventore animi labore vitae soluta cum maiores sint quis porro! Inventore dolorum, sequi ex nam possimus atque odit repudiandae perferendis maxime nulla aperiam fugit tempore porro autem, voluptas omnis. Autem repellat adipisci ducimus provident quae nemo quo ea esse optio, repudiandae eius totam, delectus est recusandae neque at reprehenderit veritatis. Eaque voluptates sed asperiores quod. Fuga, molestiae facilis enim voluptatibus possimus quod. Eius sequi quasi incidunt, iure rerum sed, eos distinctio doloribus deleniti repellendus earum illum quos vero fuga quam similique? Distinctio incidunt inventore porro culpa praesentium. Nisi nam sit saepe maiores, aut architecto dolores. Praesentium quae dignissimos perferendis, earum quia quo numquam accusantium sint. Praesentium quo est, consequuntur, ratione ex error rem, nesciunt in ipsum accusamus sequi. Molestiae praesentium, aliquid in, molestias dolores deserunt error voluptates animi atque obcaecati labore nisi odio earum impedit corporis iste eaque rerum sint saepe id? Earum temporibus dolorum soluta, facere magni ratione odio dicta deleniti ex molestias eveniet eius quam fuga inventore veniam cumque nostrum adipisci vero dolores. Dolorum placeat aliquam vel neque architecto tempore fugit. Sapiente, a. Distinctio voluptatem deleniti quidem sapiente labore illo adipisci quod recusandae vitae assumenda, placeat ducimus dignissimos aperiam voluptas culpa sed quaerat soluta quis rem. Veniam dignissimos cumque dolore in provident cum ut reiciendis corporis velit sapiente eligendi ab saepe, fugit fugiat minus obcaecati! Nemo, sapiente. Nobis delectus quasi sequi blanditiis doloribus neque cupiditate aspernatur quidem dicta, libero deleniti repellendus quia sed. Ducimus quidem quos recusandae aliquid cupiditate rem accusamus obcaecati at nesciunt inventore. Illum, sit ratione? Libero, explicabo soluta. Mollitia quidem provident explicabo ducimus aliquam laboriosam, doloribus eum, voluptatem corporis molestiae, est deserunt. Nesciunt ab cumque assumenda fugit in. Doloremque esse ipsam impedit sunt fugit, corrupti quasi praesentium voluptas corporis maxime ullam similique aliquam? Dolores laborum quisquam quidem itaque repellendus, aliquam enim vitae perferendis delectus? Blanditiis repudiandae consequuntur sit ea sapiente repellendus odio nulla necessitatibus ut minus!', '2023-08-17 17:52:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `posted_by` text DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `content`, `posted_by`, `created`, `updated`, `deleted`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetured adipiscing elit, sed do eiusmod temporinci\r\n                                incididunt ut labore et dolore magna aliqua.', 'Soumya', '2023-08-16 10:47:20', NULL, NULL),
(2, 'Lorem ipsum dolor sit amet consectetured adipiscing elit, sed do eiusmod temporinci\r\n                                incididunt ut labore et dolore magna aliqua.', 'Arpita', '2023-08-16 10:47:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uuid` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `orgCode` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(200) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `password`, `phone`, `role`, `orgCode`, `status`, `image`, `created_on`, `updated_on`, `last_login`, `browser`) VALUES
(1, 'f1583e3c-31cc-11ee-96e6-d2d5b50d1d6b', 'Sudeshna Priyadarshini', 'sudeshna@ikontel.com', '$2y$10$oaBN7OMloUz6jOCL.VEP3eygRwa3BURME30MSS4BHAX0dq6vjoMRa', 9999999999, 'SuperAdmin', NULL, 1, NULL, '2023-08-03 07:11:18', NULL, '2023-08-09 10:06:09', 'Google Chrome'),
(3, '77ee4db1-369c-11ee-add4-a6ad6e21595c', 'Soumya Prakash Nayak', 'soumya.nayak@ikontel.com', '$2y$10$pIiSKn6xchzkedpS3NVB.uIzvFsIdccMuSzsIlDpJMRk7KtD7nZx6', 8908930619, 'Admin', 'lax123', 1, NULL, '2023-08-09 10:06:54', NULL, '2023-08-09 10:07:07', 'Mozilla Firefox');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_features`
--
ALTER TABLE `about_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_features`
--
ALTER TABLE `about_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
