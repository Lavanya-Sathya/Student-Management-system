-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 10:18 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `status`, `created_at`) VALUES
(1, 'admin', 'admin123', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notice`
--

CREATE TABLE IF NOT EXISTS `admin_notice` (
  `id` int(11) NOT NULL,
  `USN` varchar(30) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_notice`
--

INSERT INTO `admin_notice` (`id`, `USN`, `dept_id`, `sem_id`, `comment`, `status`, `created_at`) VALUES
(4, 'CS01', 0, 0, 'Your Profile is not Approved by the admin. Please update all the details.', 1, '2023-01-28 16:18:56'),
(5, '', 3, 0, 'Hello every one welcome to Electronics and communication department', 1, '2023-01-29 21:05:28'),
(6, '', 3, 7, 'Hello Welcome to the section 1c of ec dept', 1, '2023-01-29 21:19:46'),
(7, 'EC02', 0, 0, 'Your Profile is not Approved by the admin. ', 1, '2023-01-29 21:20:49'),
(8, 'CS01', 0, 0, 'Your Profile has been Approved by the admin. ', 1, '2023-01-31 05:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `image`, `category`, `author`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Lorem ipsum dolor sit amet. Eum reiciendis deserunt hic dolores itaque eos rerum quae.', '<p><span style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">Ut nobis galisum quo doloremque ullam id explicabo harum est minima quod et unde totam. Et quisquam quis nam inventore animi aut tenetur alias id tempore nostrum qui tempora corporis non praesentium illo in magni corporis. Et autem sapiente sed dolorem illum id molestiae sunt et odit harum 33 quisquam nostrum. Aut molestiae facere et asperiores rerum aut laboriosam odio ut corrupti dolorum vel magni maxime aut atque numquam ad quibusdam pariatur!</span><br></p>', '3574afe178339c7d5cf21a1854f36267.jpg', 14, 'tempora', 1, '2023-01-08 18:13:10', NULL),
(23, 'Lorem ipsum dolor sit amet. Vel reprehenderit dolor ad molestiae', '<p><span style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">Lorem ipsum dolor sit amet. Vel reprehenderit dolor ad molestiae quisquam qui praesentium voluptate aut omnis sapiente ex distinctio distinctio aut atque tenetur. Ut dicta ullam est Quis nihil qui mollitia molestiae et iusto voluptatem et voluptatibus nostrum 33 laborum quia. Eum quidem animi est unde quia et minus veniam. Non quae sint ut voluptatem galisum vel voluptatem quod vel ducimus nemo qui omnis voluptatum.</span><br></p>', '583c401360970b90afceecba80cdffa9.jpg', 14, 'consequatur', 1, '2023-01-08 18:14:07', NULL),
(24, 'Qui voluptas quod et fugit dolorum ut quis neque eos officiis nesciunt', '<p><span style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">Aut nostrum alias est consequuntur distinctio qui magnam consequatur aut laboriosam dolores. Ut molestiae perferendis vel dicta animi ex perspiciatis omnis est earum ipsa. Et repudiandae sint et sint soluta est sint harum vel facilis sint et commodi molestiae.</span><span style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;">Lorem ipsum dolor sit amet. Et harum distinctio et sint distinctio ea voluptatem quaerat quo nihil quidem ab harum nemo sit optio magni? Ut distinctio dolor qui voluptate galisum id rerum debitis et fuga ipsum qui quas rerum et nemo pariatur et voluptates ipsam. Est quis quae hic sint porro aut voluptatum labore ea sunt distinctio vel consequatur saepe qui velit velit sed minus velit? Ut obcaecati similique sed alias nostrum sed iure explicabo et voluptatibus molestias aut repellat impedit est consequatur aperiam 33 similique dolorem.</span><br></p>', '8f028c2c7a498e4fb5a3456fd8a3e7cd.jpg', 14, 'impedit', 1, '2023-01-08 18:15:03', NULL),
(25, 'Idea Presentation Lorem ipsum dolor sit amet. Et autem aliquid qui omnis asperiores ut', '<p><span style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">Nam iure provident non voluptatibus commodi est voluptas nihil ex commodi accusamus et magnam perspiciatis! 33 earum blanditiis est fuga omnis non voluptatibus aperiam et tempora quidem non asperiores libero qui delectus repellendus.&nbsp;</span><span style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;">Sed ratione harum ut nemo excepturi sed harum libero. Eum quis perferendis vel consequatur repellendus ut ipsam minima rem dicta esse est veniam ipsa sed illo dolores.&nbsp;</span><span style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;">Lorem ipsum dolor sit amet. Et autem aliquid qui omnis asperiores ut dolores consequatur qui ipsam obcaecati sit cumque nihil! Est magnam impedit qui modi quod in recusandae reprehenderit est cumque molestias ut excepturi sunt?</span><br></p>', '8ed26e1f93415ec7bb35e4ee133af738.jpg', 16, 'excepturi', 1, '2023-01-08 18:16:16', NULL),
(26, 'Poster Presentation non ipsum similique est quisquam adipisci aut maiores ipsam.', '<p><span style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">Lorem ipsum dolor sit amet. Et voluptas temporibus sed velit beatae et eveniet asperiores. At dolorem reiciendis ut quibusdam eaque non perferendis asperiores ut quia illum. Aut alias aliquid ex galisum fugit quo iste labore non perferendis illum eos nobis quasi. Est velit neque rem dolorum perferendis qui architecto nihil et placeat galisum non ipsum similique est quisquam adipisci aut maiores ipsam.&nbsp;</span><span style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;">Est magnam sapiente qui dolores nobis sit laborum voluptatem et illum sapiente est voluptas nulla ut doloremque odio sit voluptatem alias. Est cupiditate explicabo qui assumenda minima aut aperiam adipisci. Nam maiores veritatis et quis vero in consequuntur assumenda in veritatis rerum. In Quis velit et voluptatem ratione quo perferendis iusto.</span><br></p>', '9da0c95e0e6de8b481e48573d01e043f.jpg', 16, 'ipsum', 1, '2023-01-08 18:17:28', NULL),
(27, 'Paper Presentation 33 voluptas blanditiis aut soluta reiciendis est aliquam deleniti.', '<p style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;">Lorem ipsum dolor sit amet. 33 quaerat nobis ea iste mollitia 33 rerum vitae eum porro voluptate qui culpa deserunt? Ea corporis voluptas ab deserunt velit cum blanditiis accusamus ut accusantium cupiditate et tenetur velit. Qui minima facere in distinctio ipsa non autem fugiat est possimus mollitia cum explicabo sunt vel deserunt reiciendis est aliquam deleniti.&nbsp;<span style="font-size: 1rem;">33 voluptas blanditiis aut soluta maiores ab deserunt temporibus eos sint iure ea reiciendis molestias. Et natus incidunt eum sequi impedit 33 maiores eius. Aut voluptas recusandae eos animi dolorem ut odit dolorem qui dicta consequatur non doloremque quia et consequatur corporis qui sint blanditiis.</span></p><p style="font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;"><br></p>', 'eb66799286b6a1baf6c8ad0e26ba5e69.jpg', 16, 'consequatur', 1, '2023-01-08 18:18:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(14, 'CyberSecurity', 'ec504b7bd8939aa219c7c9bab7dfe30f.jpg', 1, '2023-01-01 19:19:05', '2023-01-08 17:57:21'),
(16, 'Presentation', '00c4b5c525be1829a9caccced0a7bf86.jpg', 1, '2023-01-08 18:11:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `state_id`) VALUES
(1, 'Bengaluru', 1),
(2, 'Mysuru', 1),
(3, 'Belagavi', 1),
(4, 'Mandya', 1),
(5, 'Vishakapatnam', 2),
(6, 'Vijayawada', 2),
(7, 'Tirupati', 2),
(8, 'Chittoor', 2),
(9, 'Chennai', 3),
(10, 'Madurai', 3),
(11, 'Coimbatore', 3),
(12, 'Vellore', 3),
(13, 'Thiruvananthapuram', 4),
(14, 'Kochi', 4),
(15, 'Kozhikode', 4),
(16, 'Thrissur', 4),
(17, 'Hyderabad', 5),
(18, 'Warangal', 5),
(19, 'Karimnagar', 5),
(20, 'Mumbai', 6),
(21, 'Pune', 6),
(22, 'Nashik', 6),
(23, 'Panaji', 7),
(24, 'Margao', 7),
(25, 'Bhopal', 8),
(26, 'Indore', 8),
(27, 'Jabalpur', 8),
(28, 'Gwalior', 8),
(29, 'Bhubaneswar', 9),
(30, 'Rourkela', 9),
(31, 'Raipur', 10),
(32, 'Bilaspur', 10),
(33, 'Kolkata', 11),
(34, 'Siliguri', 11),
(35, 'Houston', 12),
(36, 'San Antonio', 12),
(37, 'Dallas', 12),
(38, 'Austin', 12),
(39, 'Manhattan', 13),
(40, 'Brooklyn', 13),
(41, 'Bronx', 13),
(42, 'Queens ', 13),
(43, 'Newark', 14),
(44, 'Paterson', 14),
(45, 'Jersey City', 14),
(46, 'Elizabeth', 14),
(47, 'Mexico City', 15),
(48, 'Tijuana', 15),
(49, 'Seattle', 16),
(50, 'Spokane', 16);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `article_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `name`, `comment`, `status`, `article_id`, `created_at`) VALUES
(1, 'John Doe', 'Et natus incidunt eum sequi impedit 33 maiores eius. Aut voluptas recusandae eos animi dolorem ut odit dolorem qui dicta consequatur non doloremque quia et consequatur corporis qui sint blanditiis.\r\n\r\n', 1, 27, '2023-01-09 11:38:08'),
(2, 'deleniti', 'Qui minima facere in distinctio ipsa non autem fugiat est possimus mollitia cum explicabo sunt vel deserunt reiciendis est aliquam deleniti. ', 1, 27, '2023-01-09 11:39:36'),
(3, 'cupiditate ', '33 rerum vitae eum porro voluptate qui culpa deserunt? Ea corporis voluptas ab deserunt velit cum blanditiis accusamus ut accusantium cupiditate et tenetur velit', 1, 27, '2023-01-09 11:40:17'),
(4, 'galisum ', 'ut alias aliquid ex galisum fugit quo iste labore non perferendis illum eos nobis quasi. Est velit neque rem dolorum perferendis qui architecto nihil et placeat galisum non ipsum similique est quisquam adipisci', 1, 26, '2023-01-09 11:41:39'),
(5, 'nobis ', 'Et voluptas temporibus sed velit beatae et eveniet asperiores. At dolorem reiciendis ut quibusdam eaque non perferendis asperiores ut quia illum. Aut alias aliquid ex galisum fugit quo iste labore non perferendis illum eos nobis quasi.', 1, 26, '2023-01-09 12:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'India'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`) VALUES
(3, 'Electronics and Communication Engineering'),
(4, 'Computer Science and Engineering'),
(5, 'Information Science and Engineering'),
(7, 'Mechanical Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL,
  `USN` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `institute` varchar(150) NOT NULL,
  `year_of_passing` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `USN`, `qualification`, `institute`, `year_of_passing`, `percentage`) VALUES
(1, 'EC01', 'UG', 'abc college of engineering', 2018, 82),
(2, 'EC01', 'X', 'abc school', 2015, 82),
(3, 'EC01', 'XII', 'abc', 2017, 82),
(6, 'EC02', 'UG', 'xyzcollege of engineering', 2018, 82),
(4, 'EC02', 'X', 'xyz school', 2013, 78),
(5, 'EC02', 'XII', 'xyz pu school', 2015, 65);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `USN` varchar(15) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `f_occupation` varchar(30) NOT NULL,
  `f_qualification` varchar(30) NOT NULL,
  `f_mobile` int(11) NOT NULL,
  `f_email` varchar(30) NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `m_occupation` varchar(30) NOT NULL,
  `m_qualification` varchar(30) NOT NULL,
  `m_mobile` int(11) NOT NULL,
  `m_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`USN`, `f_name`, `f_occupation`, `f_qualification`, `f_mobile`, `f_email`, `m_name`, `m_occupation`, `m_qualification`, `m_mobile`, `m_email`) VALUES
('CS01', '', '', '', 0, '', '', '', '', 0, ''),
('EC01', 'sathya', 'abc', 'abc', 2147483647, 'sathyalavanya5@gmail.com', 'xyz', 'abc', 'abc', 2147483647, 'sathyalavanya5@gmail.com'),
('EC02', 'Rahul', 'Business', 'UG', 2147483647, 'rahul@gmail.com', 'Revathi', 'Business', 'UG', 2147483647, 'revathi@gmail.com'),
('EC04', '', '', '', 0, '', '', '', '', 0, ''),
('ME01', '', '', '', 0, '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL,
  `USN` varchar(20) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `sub_id` varchar(30) NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `USN`, `dept_id`, `sem_id`, `sub_id`, `points`, `created_at`) VALUES
(31, 'EC01', 3, 7, 'ECE_DE', 2, '2023-01-30 09:38:05'),
(32, 'EC01', 3, 7, 'ECE_FE', 4, '2023-01-30 09:38:05'),
(34, 'EC01', 3, 7, 'ECE_NT', 4, '2023-01-30 09:38:05'),
(35, 'EC01', 3, 7, 'ECE_SS', 5, '2023-01-30 09:38:05'),
(36, 'CS01', 4, 6, 'CSE_PC', 3, '2023-01-31 05:35:21'),
(37, 'CS01', 4, 6, 'CSE_P', 4, '2023-01-31 05:35:21'),
(38, 'CS01', 4, 6, 'CSE_DS', 2, '2023-01-31 05:35:21'),
(39, 'CS01', 4, 6, 'CSE_A', 4, '2023-01-31 05:35:21'),
(40, 'CS01', 4, 6, 'CSE_N', 5, '2023-01-31 05:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `sem`
--

CREATE TABLE IF NOT EXISTS `sem` (
  `sem_id` int(11) NOT NULL,
  `section` varchar(11) NOT NULL,
  `d_no` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`sem_id`, `section`, `d_no`) VALUES
(5, 'CSE_1A', 4),
(6, 'CSE_3A', 4),
(7, 'ECE_1C', 3),
(9, 'ISE_1A', 5),
(10, 'ISE_3A', 5),
(15, 'ECE_1B', 3),
(16, 'ECE_1A', 3),
(18, 'MECH_1B', 7);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `country_id`) VALUES
(1, 'Karnataka', 1),
(2, 'Andhra Pradesh', 1),
(3, 'Tamil Nadu', 1),
(4, 'Kerala', 1),
(5, 'Telangana', 1),
(6, 'Maharashtra', 1),
(7, 'Goa', 1),
(8, 'Madhya Pradesh', 1),
(9, 'Orissa', 1),
(10, 'Chhattisgarh', 1),
(11, 'West Bengal', 1),
(12, 'Texas', 2),
(13, 'New York', 2),
(14, 'New Jersey', 2),
(15, 'Mexico', 2),
(16, 'Washington', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE IF NOT EXISTS `student_detail` (
  `USN` varchar(15) NOT NULL,
  `name` varchar(25) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `city` int(15) NOT NULL,
  `state` int(15) NOT NULL,
  `country` int(15) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email_id` varchar(70) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`USN`, `name`, `dept_id`, `sem_id`, `dob`, `gender`, `blood_group`, `image`, `city`, `state`, `country`, `address`, `phone_no`, `email_id`, `password`, `status`) VALUES
('CS01', 'Ram', 4, 6, '0000-00-00', '', '', '', 0, 0, 0, '', 0, 'ram@gmail.com', 'ram12', 1),
('EC01', 'Divya', 3, 7, '2019-04-01', 'female', 'o+', '8f5a5a5f0f71c1ebe4564e1a38755112.jpg', 1, 1, 1, '1st street avenue road, India', 2147483647, 'divya1@gmail.com', 'divya', 1),
('EC02', 'Janu', 3, 7, '1995-06-06', 'female', 'o+', 'b22bd23367c78b4843d0eaf7ef3f2e5a.png', 0, 0, 0, '1st main bengaluru', 2147483647, 'janu@gmail.com', 'janu', 0),
('EC04', 'Sathya', 3, 7, '0000-00-00', '', '', '', 0, 0, 0, '', 0, 'sathya@gamil.com', 'sathya', 0),
('ME01', 'shree', 7, 18, '0000-00-00', '', '', '', 0, 0, 0, '', 0, 'shree@gmail.com', 'shree', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `sem_id`, `d_id`) VALUES
(1, 'ECE_Sp', 'Signal Processing', 16, 3),
(3, 'CSE_OR', 'operational research', 5, 4),
(4, 'CSE_CN', 'Computer Networks', 5, 4),
(5, 'CSE_OS', 'Operating System', 5, 4),
(6, 'ECE_DE', 'Digital Electronics', 7, 3),
(7, 'ECE_E', 'Electronic', 16, 3),
(8, 'ECE_FE', 'Fundamental of Electronics', 7, 3),
(9, 'ECE_CN', 'Computer Networks', 7, 3),
(10, 'ECE_NT', 'Network Theory', 7, 3),
(11, 'ECE_SS', 'Signals and System', 7, 3),
(12, 'CSE_PC', 'Programming in Computers', 6, 4),
(13, 'CSE_P', 'Python', 6, 4),
(14, 'CSE_DS', 'Data Structure', 6, 4),
(15, 'CSE_A', 'Algorithms', 6, 4),
(16, 'CSE_N', 'Networks', 6, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notice`
--
ALTER TABLE `admin_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`USN`,`qualification`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`USN`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sem`
--
ALTER TABLE `sem`
  ADD PRIMARY KEY (`sem_id`),
  ADD UNIQUE KEY `section` (`section`),
  ADD KEY `d_no` (`d_no`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD PRIMARY KEY (`USN`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `sem_id` (`sem_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_code` (`subject_code`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `d_id` (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_notice`
--
ALTER TABLE `admin_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `sem`
--
ALTER TABLE `sem`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student_detail` (`USN`);

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `family_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student_detail` (`USN`);

--
-- Constraints for table `sem`
--
ALTER TABLE `sem`
  ADD CONSTRAINT `sem_ibfk_1` FOREIGN KEY (`d_no`) REFERENCES `department` (`d_id`),
  ADD CONSTRAINT `sem_ibfk_2` FOREIGN KEY (`d_no`) REFERENCES `department` (`d_id`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD CONSTRAINT `student_detail_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`d_id`),
  ADD CONSTRAINT `student_detail_ibfk_2` FOREIGN KEY (`sem_id`) REFERENCES `sem` (`sem_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `sem` (`sem_id`),
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
