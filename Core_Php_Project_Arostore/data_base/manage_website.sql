-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 12:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `about_us_detail` text NOT NULL,
  `main_banner_img` varchar(255) NOT NULL,
  `sub_banner_img` varchar(255) NOT NULL,
  `Banner_3rd_img` varchar(255) NOT NULL,
  `team_mamber_1_img` varchar(255) NOT NULL,
  `team_mamber_1_name` varchar(255) NOT NULL,
  `team_mamber_1_destination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_us_detail`, `main_banner_img`, `sub_banner_img`, `Banner_3rd_img`, `team_mamber_1_img`, `team_mamber_1_name`, `team_mamber_1_destination`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'left_team_bg.jpg', 'about_us_bg.jpg', 'about_us_bg.jpg', 'team_1.jpg', 'Natllie Sciver Brunt', 'CEO'),
(2, 'ffff', 'ffff', 'ffff', 'aaa', 'team_2.jpg', 'Kathrine Sandles', 'GM'),
(3, 'tayyab', 'tayyab', 'tayyab', 'aaa', 'team_3.jpg', 'John Wick', 'Account Officer'),
(4, 'jjj', 'jjj', 'jjj', 'aa', 'team_4.jpg', 'Elyssa Perry', 'Trainer');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_cat_id` varchar(255) NOT NULL,
  `blog_sub_cat_id` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_feature_img` varchar(255) NOT NULL,
  `blog_disc` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_cat_id`, `blog_sub_cat_id`, `blog_title`, `blog_feature_img`, `blog_disc`, `status`, `date`) VALUES
(1, '1', '1', 'yasir', 'admin_bg33.jpg', 'hjkl;lkj', 'Publish', '2023-09-06 06:49:34'),
(2, '1', '1', 'yasir', 'admin_bg3.jpg', 'fghjk', 'Publish', '2023-09-06 06:52:39'),
(3, '1', '1', 'yasir', 'admin_bg4.jpg', 'gthjop\r\n', 'Publish', '2023-09-05 19:00:00'),
(4, '1', '1', 'yasir', 'admin_bg3.jpg', 'cdsa', 'Publish', '2023-09-06 07:00:24'),
(5, '7', '13', 'yasir', 'team_1.jpg', 'asdfg', 'Publish', '2023-09-05 21:51:59'),
(6, '8', '14', 'yasir', 'team_3.jpg', 'aswertyhjk', 'Publish', '0000-00-00 00:00:00'),
(7, '5', '11', 'fg', 'admin_bg33.jpg', 'ertyhj', 'Publish', '2023-09-06 13:22:01'),
(10, '9', '20', 'Awards', 'team_4.jpg', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains', 'Publish', '2023-09-07 13:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `blog_cat_id` int(11) NOT NULL,
  `blog_cat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`blog_cat_id`, `blog_cat`, `status`) VALUES
(1, 'UK', 'Active'),
(3, 'cricket', 'Active'),
(5, 'pakis', 'Active'),
(6, 'india', 'Active'),
(7, 'UK', 'De-Active'),
(8, 'Australia', 'Active'),
(9, 'Newzeland', 'De-Active'),
(10, 'Bangladesh', 'De-Active'),
(11, 'Nepal', 'De-Active');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `comment_id` int(11) NOT NULL,
  `blog_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`comment_id`, `blog_id`, `user_name`, `email`, `comment`, `comment_time`) VALUES
(1, '9', 'admin', '113@gmail.com', 'Nice', '2023-09-26 09:11:56'),
(2, '9', 'ROMEO', '123@gmail.com', 'kkk', '2023-09-26 09:13:06'),
(3, '8', 'Muhammad Tayyab', '113asd@gmail.com', 'nice', '2023-09-26 09:16:05'),
(6, '11', 'admin', '111113@gmail.com', 'lovely', '2023-09-26 09:42:37'),
(7, '11', 'Muhammad Tayyab', '111113@gmail.com', 'amazing', '2023-09-26 09:43:46'),
(8, '4', 'ROMEO', '111113@gmail.com', 'amazing', '2023-09-26 10:12:40'),
(9, '10', 'yasir', '111113@gmail.com', 'awesome', '2023-09-26 11:37:34'),
(10, '11', 'tayyab', '123@gmail.com', 'Lovely and Amazing', '2023-09-26 15:34:32'),
(11, '8', 'shakeel', '123@gmail.com', 'Ganda Bacha', '2023-09-26 15:35:30'),
(12, '5', 'Muhammad Tayyab', '113@gmail.com', 'nice Words', '2023-10-01 09:11:25'),
(13, '2', 'Muhammad Tayyab', 'tay123@gmail.com', 'Nice Post', '2023-10-15 03:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `blog_sub_cat`
--

CREATE TABLE `blog_sub_cat` (
  `blog_sub_cat_id` int(11) NOT NULL,
  `blog_cat_id` varchar(255) NOT NULL,
  `blog_sub_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_sub_cat`
--

INSERT INTO `blog_sub_cat` (`blog_sub_cat_id`, `blog_cat_id`, `blog_sub_cat`) VALUES
(5, '3', 'yasir'),
(6, '3', 'hhs'),
(9, '3', 'boll'),
(11, '5', 'aserfghj'),
(12, '6', 'asdfg'),
(13, '7', 'asdfghj'),
(14, '8', 'awerfgh'),
(15, '9', 'sdfgh'),
(16, '9', 'asdfg'),
(17, '10', 'awerthj'),
(18, '11', 'qwerthjk'),
(19, '8', 'Sydney'),
(20, '9', 'Adelaide');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_message`
--

CREATE TABLE `contact_us_message` (
  `message_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_phone_number` varchar(255) NOT NULL,
  `message_status` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `message_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us_message`
--

INSERT INTO `contact_us_message` (`message_id`, `user_name`, `user_mail`, `user_phone_number`, `message_status`, `message`, `message_time`) VALUES
(0, 'Tayyab Jameel', 'tayyabjameel8315@gmail.com', '03096829592', 'Un-Read', 'need to ensure that your loop only iterates through the available rows in the query result', '2024-08-25 09:25:07.975579'),
(1, 'Muhammad Tayyab', 'tay1@gmail.com', '03134101883', 'Read', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2023-10-13 04:10:10.322210'),
(2, 'Muhammad Tayyab', 'hamzaking8315@gmail', '03134101883', 'Un-Read', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2023-10-11 18:18:10.186404'),
(3, 'Muhammad Tayyab', 'tay123@gmail.com', '03134101883', 'Un-Read', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2023-10-11 18:18:17.624403'),
(4, 'ROMEO', '113@gmail.com', '03134101883', 'Read', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2023-10-13 04:10:06.860349');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faqs_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faqs_id`, `question`, `answer`, `status`) VALUES
(1, 'lllll', 'nhbhk', 'Active'),
(2, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to ', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 'Active'),
(3, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to ', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to ', 'Active'),
(4, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to ', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to ', 'Active'),
(5, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to ', 'fcghchgn', 'De-Active');

-- --------------------------------------------------------

--
-- Table structure for table `manage_category`
--

CREATE TABLE `manage_category` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `cat_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_category`
--

INSERT INTO `manage_category` (`cat_id`, `category`, `status`, `cat_img`) VALUES
(25, 'Smart Watch', 'Active', 'img-1.jpg'),
(26, 'LEDs', 'Active', 'img-2.jpg'),
(27, 'Mobiles', 'Active', 'img-3.jpg'),
(29, 'Gaming', 'In-Active', 'img-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manage_site`
--

CREATE TABLE `manage_site` (
  `id` int(11) NOT NULL,
  `web_title` varchar(255) NOT NULL,
  `web_discription` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_site`
--

INSERT INTO `manage_site` (`id`, `web_title`, `web_discription`, `Email`, `address`, `telephone`, `logo`) VALUES
(1, 'jjkxjjjjjjjjj', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to', '113@gmail.com', 'lahore', '34567890', 'Screenshot (16).png');

-- --------------------------------------------------------

--
-- Table structure for table `manage_slider`
--

CREATE TABLE `manage_slider` (
  `id` int(11) NOT NULL,
  `slider_tit` varchar(255) NOT NULL,
  `slider_disc` varchar(255) NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `slider_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_slider`
--

INSERT INTO `manage_slider` (`id`, `slider_tit`, `slider_disc`, `slider_img`, `slider_status`) VALUES
(19, 'iPhone 15 Pro Max', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'Product-10-600x600-removebg-preview.png', 'Active'),
(20, 'Infinix Core 7', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'Product-15-600x600-removebg-preview.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `manege_product`
--

CREATE TABLE `manege_product` (
  `product_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `sub_img1` varchar(255) NOT NULL,
  `sub_img2` varchar(255) NOT NULL,
  `sub_img3` varchar(255) NOT NULL,
  `sub_img4` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `avg_rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manege_product`
--

INSERT INTO `manege_product` (`product_id`, `category`, `sub_category`, `product_title`, `product_price`, `product_desc`, `product_img`, `sub_img1`, `sub_img2`, `sub_img3`, `sub_img4`, `product_status`, `avg_rating`) VALUES
(71, '25', '27', 'Apple AirPods Pro 2021', '200.0', 'The ligands and the complexes were characterized through FTIR spectroscopy. Clear changes in certain regions of spectra indicated the successful synthesis of the ligands and the complexes. While NMR spectroscopy was used to have further insight into the s', 'Rectangle-1-600x600--DIYqzi.jpg', 'Product-8-600x600.jpg', 'Product-3-600x600.jpg', 'Product-51-600x600.jpg', 'Product-26-600x600.jpg', 'Publish', '0'),
(72, '25', '26', 'Air Cooler With A-RGB', '120.0', 'fidhvsdklzbvkaehgoiqhwoigfhqeoiagfoiasfhoigs', 'Rectangle-4-600x600.jpg', 'Product-5-600x600.jpg', 'Rectangle-5-600x600.jpg', 'img-5.jpg', 'banner-2.jpg', 'Publish', '0'),
(73, '26', '29', 'Apple AirPods Pro 2021', '500', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', 'Product-23-600x600.jpg', 'Product-23-600x600.jpg', 'Product-15-600x600.jpg', 'Rectangle-1-600x600.jpg', 'Rectangle-1-600x600.jpg', 'Publish', '4.1'),
(74, '25', '26', '24‑Mac with Apple M1 chip', '1520', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', 'Product-28-600x600.jpg', 'Product-51-600x600.jpg', 'Rectangle-4-600x600.jpg', 'Rectangle-4-600x600.jpg', 'Product-5-600x600.jpg', 'Publish', '4.1');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `order_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `product_name`, `product_price`, `product_quantity`, `order_status`, `order_number`, `order_time`, `user_id`) VALUES
(106, 'Oppo F19 Pro', '450', '4', 'Pending', 'Aro1776764027', '2023-10-06 17:38:43.489917', ''),
(107, 'Am-34 Classic Watch', '320', '5', 'Delivered', 'Aro1776764027', '2023-10-06 18:16:13.643336', ''),
(108, 'mobile cooling fan', '160', '5', 'Preparing', 'Aro1776764027', '2023-10-06 17:49:35.146009', ''),
(109, 'Cooling Fan x332', '190', '6', 'Pending', 'Aro1776764027', '2023-10-06 17:38:39.129744', ''),
(113, 'smart 55t speaker', '600', '5', 'Pending', 'Aro381105247', '2023-10-06 17:49:10.000000', ''),
(114, 'mobile cooling fan', '160', '4', 'Pending', 'Aro381105247', '2023-10-06 18:16:21.468045', ''),
(115, 'Cooling Fan x332', '190', '4', 'Pending', 'Aro381105247', '2023-10-06 18:16:28.314832', ''),
(116, 'mobile cooling fan', '160', '6', 'Pending', 'Aro1735696737', '2023-10-06 18:05:35.000000', ''),
(117, 'Am-34 Classic Watch', '320', '5', 'Pending', 'Aro225850806', '2023-10-06 18:08:19.000000', ''),
(118, 'Oppo F19 Pro', '450', '5', 'Pending', 'Aro225850806', '2023-10-06 18:08:19.000000', ''),
(119, 'm-99 room Speaker', '190', '5', 'Pending', 'Aro1057217750', '2023-10-06 18:13:07.000000', ''),
(120, 'smart 55t speaker', '600', '4', 'Pending', 'Aro3065616', '2023-10-06 18:14:43.000000', ''),
(121, 'mobile cooling fan', '160', '4', 'Pending', 'Aro3065616', '2023-10-06 18:14:43.000000', ''),
(122, 'smart 55t speaker', '600', '4', 'Pending', 'Aro265493961', '2023-10-06 18:15:43.000000', ''),
(123, 'mobile cooling fan', '160', '5', 'Pending', 'Aro1231236205', '2023-10-07 05:12:54.000000', ''),
(124, 'Am-34 Classic Watch', '320', '4', 'Preparing', 'Aro1921552724', '2023-10-11 16:40:51.919204', ''),
(125, 'smart 55t speaker', '600', '10', 'Preparing', 'Aro1449298590', '2023-10-11 16:40:30.627439', ''),
(126, 'Am-34 Classic Watch', '320', '3', 'Delivered', 'Aro1557982316', '2023-10-07 09:37:43.903827', ''),
(127, 'Am-34 Classic Watch', '320', '4', 'Delivered', 'Aro1594487563', '2023-10-08 09:21:05.704296', ''),
(128, '95-f mice speaker', '230', '6', 'Pending', 'Aro2011932217', '2023-10-12 18:45:20.000000', ''),
(129, 'Cooling Fan x332', '190', '2', 'Pending', 'Aro613873239', '2023-10-13 07:53:09.000000', ''),
(130, '95-f mice speaker', '230', '2', 'Pending', 'Aro613873239', '2023-10-13 07:53:09.000000', ''),
(131, '95-f mice speaker', '230', '3', 'Pending', 'Aro491324072', '2023-10-15 03:34:17.000000', ''),
(0, 'CRICKETT', '500', '8', 'Pending', 'Aro194452097', '2024-08-25 09:22:10.000000', '0'),
(0, 'Apple AirPods Pro 2021', '500', '6', 'Pending', 'Aro194452097', '2024-08-25 09:22:10.000000', '0'),
(0, 'CRICKETT', '500', '8', 'Pending', 'Aro1737057001', '2024-08-25 09:23:49.000000', '0'),
(0, 'Apple AirPods Pro 2021', '500', '6', 'Pending', 'Aro1737057001', '2024-08-25 09:23:49.000000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`admin_id`, `name`, `user_name`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'xxxxxxxx', 'admin.jpg'),
(2, 'Tayyab', 'admin11', 'adminq@gmail.com', 'admin11', 'admin1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `category`, `sub_category`) VALUES
(26, '25', 'player'),
(27, '25', 'Watcher'),
(28, '26', 'Goal  keeper'),
(29, '26', 'Defender'),
(30, '27', 'Classic player'),
(31, '27', 'Tdm Player'),
(32, '25', 'tayyab');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `user_email`, `user_pwd`, `user_img`) VALUES
(1, 'hamzaking8315@gmail', '430c84fcaff46f5f6617ddad874c155b', 'admin.png'),
(2, 'yasii113@gmail.com', '37fff357c237d67f2365eab6706bc898', 'Blog-2-720x484.jpg'),
(3, 'tay1@gmail.com', 'tay1', 'Blog-3-720x484.jpg'),
(4, 'tay2@gmail.com', 'tay123', 'admin.png'),
(5, 'tay3@gmail.com', 'tayyab123', 'banner-2.jpg'),
(6, 'tay4@gmail.com', '21661093e56e24cd60b10092005c4ac7', 'bg-breadcrumb.jpg'),
(7, 'tay5@gmail.com', 'khan', 'Blog-3-720x484.jpg'),
(8, 'tay6@gmail.com', 'khan', ''),
(9, 'hamzaking8315@gmail', 'tayyab', 'admin1.png'),
(10, 'tayyab124@gmail.com', 'awesome', 'admin4.png'),
(11, 'hamzaking8315@gmail', 'tayyab', ''),
(12, 'zainjamil611@gmail.com', 'zain1234', 'admin4.png'),
(0, 'admin@gmail.com', 'xxxxxxxx', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_order_info`
--

CREATE TABLE `user_order_info` (
  `user_order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order_info`
--

INSERT INTO `user_order_info` (`user_order_id`, `name`, `mobile`, `city`, `post`, `address`, `order_number`, `user_id`) VALUES
(13, 'Muhammad Tayyab', '34567890', 'vehari', 'vehari', 'yasir', 'Aro1776764027', NULL),
(14, 'Muhammad Tayyab', '34567890', 'FAWTQar', 'vehari', 'lahore', 'Aro381105247', NULL),
(15, 'admin', '6415', 'muktan', 'machi', 'Multan', 'Aro1735696737', NULL),
(16, 'Muhammad Tayyab', '0309-6829592', 'Khanewal', '84/15-L', 'Chak No. 83/15-L, P/O#84/15-L Mianchannu,Khanewal. ', 'Aro225850806', NULL),
(17, 'Muhammad Tayyab', '34567890', 'Khanewal', 'vehari', 'Tayyab', 'Aro1057217750', NULL),
(18, 'Muhammad Tayyab', '6415', 'vehari', 'machi', 'Aero', 'Aro3065616', NULL),
(19, 'Muhammad Tayyab', '0309-6829592', 'Khanewal', '84/15-L', 'MULTAN', 'Aro265493961', NULL),
(20, 'Muhammad Tayyab', '030000000000', 'Khanewal', '84/15-L', 'Khanewal', 'Aro1231236205', NULL),
(21, 'Muhammad Tayyab', '030000000000', 'Khanewal', '84/15-L', 'Khanewal', 'Aro1191516712', NULL),
(22, 'Muhammad Tayyab', '34567890', 'Khanewal', 'machi', 'tayyab', 'Aro1921552724', NULL),
(23, 'Muhammad Tayyab', '34567890', 'vehari', 'machi', 'lovely', 'Aro2029778984', NULL),
(24, 'Muhammad Tayyab', '34567890', 'Khanewal', 'machi', 'tayyab', 'Aro961886263', NULL),
(25, 'Muhammad Tayyab', '34567890', 'Khanewal', '84/15-L', 'Bhawalnagar', 'Aro1449298590', NULL),
(26, 'Muhammad Tayyab', '34567890', 'vehari', 'vehari', 'Lahore', 'Aro1557982316', NULL),
(27, 'zain', '03194469297', 'vehari', '84/15-L', 'Chak no 83 15 l', 'Aro1594487563', NULL),
(28, 'Muhammad Tayyab', '0309-6829592', 'Khanewal', 'vehari', 'lahore', 'Aro2011932217', NULL),
(29, 'Muhammad Tayyab', '6415', 'Khanewal', 'vehari', 'gagoo', 'Aro613873239', NULL),
(30, 'Muhammad Tayyab', '34567890', 'Khanewal', 'vehari', 'kwl', 'Aro491324072', NULL),
(0, 'Tayyab Jameel', '03096829592', 'Khanewal', '58101', 'Chak No.83/15-L', 'Aro1737057001', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_rating` varchar(255) NOT NULL,
  `user_review` varchar(255) NOT NULL,
  `review_date_time` datetime(6) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`review_id`, `user_name`, `user_rating`, `user_review`, `review_date_time`, `product_id`) VALUES
(1, 'admin', '4', 'tayyab', '2023-08-28 07:03:32.000000', NULL),
(2, 'admin', '4', 'tayyab', '2023-08-28 07:03:38.000000', NULL),
(3, 'admin', '4', 'tayyab', '2023-08-28 07:03:43.000000', NULL),
(4, 'admin', '5', 'tayyab', '2023-08-28 07:04:21.000000', NULL),
(5, 'admin', '3', 'tayyab', '0000-00-00 00:00:00.000000', NULL),
(6, 'admin11', '2', 'tacvb ', '2023-08-28 07:08:11.000000', NULL),
(7, 'admin11', '2', 'tacvb ', '2023-08-28 07:08:17.000000', NULL),
(8, 'admin11', '4', 'tayyab', '2023-08-28 07:36:11.000000', NULL),
(9, 'admin11', '0', 'tayyab', '2023-08-28 07:37:24.000000', NULL),
(10, 'admin', '4', 'tayyab', '2023-08-28 07:47:01.000000', NULL),
(11, 'usama', '2', 'tayyab', '2023-08-28 07:47:38.000000', NULL),
(12, 'usama raza', '2', 'tayyab', '2023-08-28 07:48:27.000000', NULL),
(13, 'admin', '4', 'yASIR', '2023-08-28 08:14:18.000000', NULL),
(14, 'admin', '4', 'tayyab', '2023-08-28 08:42:02.000000', NULL),
(15, 'tay123@gmail.com', '4', 'gfds', '2023-08-28 08:42:48.000000', NULL),
(16, 'admin', '4', 'tayyab', '2023-08-28 08:47:03.000000', NULL),
(17, 'admin5678', '4', 'rdzxfgchgjhvbm', '2023-08-28 08:49:02.000000', NULL),
(18, 'admin', '4', 'tayyab', '2023-08-28 08:51:09.000000', NULL),
(19, 'admin11', '3', 'jjjj', '2023-08-28 08:51:51.000000', NULL),
(20, 'admin', '4', 'tayyab', '2023-08-29 07:42:40.000000', NULL),
(21, 'admin', '4', 'tayyab', '2023-08-29 07:42:40.000000', 'ddd'),
(22, 'admin', '4', 'ffffffffffffffffff', '0000-00-00 00:00:00.000000', '73'),
(23, 'tayyab', '4', 'Amazing', '0000-00-00 00:00:00.000000', '74');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlisted_pd_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `user_account_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`blog_cat_id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `blog_sub_cat`
--
ALTER TABLE `blog_sub_cat`
  ADD PRIMARY KEY (`blog_sub_cat_id`);

--
-- Indexes for table `contact_us_message`
--
ALTER TABLE `contact_us_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faqs_id`);

--
-- Indexes for table `manage_category`
--
ALTER TABLE `manage_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `manage_site`
--
ALTER TABLE `manage_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_slider`
--
ALTER TABLE `manage_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manege_product`
--
ALTER TABLE `manege_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `blog_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blog_sub_cat`
--
ALTER TABLE `blog_sub_cat`
  MODIFY `blog_sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manage_category`
--
ALTER TABLE `manage_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `manage_site`
--
ALTER TABLE `manage_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_slider`
--
ALTER TABLE `manage_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manege_product`
--
ALTER TABLE `manege_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
