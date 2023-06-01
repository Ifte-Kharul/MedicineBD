-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 09:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicinebd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(1, 'ifte kharul islam', 'iftekharul.tamim@gmail.com', '$2y$10$TXdSNCAhjh712LKMC8/BpuMa5d7MiRq3dQOvT1cSMpdZ3d2KtR78W');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Tablets'),
(2, 'Injection'),
(6, 'Capsule'),
(7, 'Cream'),
(8, 'Drop');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_title`) VALUES
(1, 'Beacon Pharmaceuticals Ltd'),
(2, 'Beximco Pharmaceuticals'),
(3, 'Essential Drugs Company Ltd'),
(5, 'GlaxoSmithKline'),
(6, 'Square Pharmaceuticals Limited');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 2, 645292162, 10, 3, 'pending'),
(2, 2, 1202933674, 16, 5, 'pending'),
(3, 2, 2091826071, 3, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `company_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(2, 'Betapro 2.5', 'bisoprolol-hemifumarate', 'betapro,bisoprolol,hemifumarate', 1, 2, 'Betapro.jpg', 'bet.webp', 'Betapro.jpg', 180, '2022-07-21 16:04:56', 'true'),
(3, 'Napa', 'Paracetamol', 'Napa,Paracetamol', 1, 2, '1658422695napa.jpg', '1658422695napa.jpg', '1658422695napa.jpg', 10, '2022-07-21 16:58:15', 'true'),
(5, ' Bendamustine', 'Bendamax', 'Bendamax, Bendamustine,injection', 2, 1, '1660026477100-mg-bendamustine-hydrochloride-for-injection-500x500.webp', '1660026477100-mg-bendamustine-hydrochloride-for-injection-500x500.webp', '1660026477100-mg-bendamustine-hydrochloride-for-injection-500x500.webp', 200, '2022-08-09 06:27:57', 'true'),
(6, 'Carboplatin', 'Carboplat 150', 'Carboplatin,Carboplat', 2, 1, '1660026571Carboplat-150-2.jpg', '1660026571Carboplat-150-2.jpg', '1660026571Carboplat-150-2.jpg', 250, '2022-08-09 06:29:31', 'true'),
(7, 'Crizotinib', 'Crizonix', 'Crizonix,Crizotinib', 6, 1, '1660026795Web-carton.png', '1660026795Web-carton.png', '1660026795Web-carton.png', 380, '2022-08-09 06:33:15', 'true'),
(9, 'Duac', 'clindamycin phosphate and benzoyl peroxide', 'Duac,clindamycin phosphate and benzoyl peroxide', 7, 5, '16600271041530722146_Duac.jpg', '16600271041530722146_Duac.jpg', '16600271041530722146_Duac.jpg', 25, '2022-08-09 06:38:24', 'true'),
(10, 'Ace', 'Paracetamol', 'Ace,Paracetamol', 1, 6, '1660027283index.jpg', '1660027283index.jpg', '1660027283index.jpg', 11, '2022-08-09 06:41:23', 'true'),
(11, 'Alacot® DS Eye Drops', 'Antiallergic 0.2% Eye Drops', 'Antiallergic,Alacot,Eye Drops', 8, 6, '1660027436Alacot-DS1.jpg', '1660027436Alacot-DS1.jpg', '1660027436Alacot-DS1.jpg', 85, '2022-08-09 06:43:56', 'true'),
(12, 'Alice™ Lotion ', 'Ivermectin BP 0.5%', 'Ivermectin,Alice', 7, 6, '1660027557Alice loiton_for web site.jpg', '1660027557Alice loiton_for web site.jpg', '1660027557Alice loiton_for web site.jpg', 98, '2022-08-09 06:45:57', 'true'),
(16, 'Amodis', 'Metronidazole Amoebocides (Amoebocides) ', 'Amodis,Metronidazole,Amoebocides', 1, 6, '1660039897AMODIS-400.jpg', '1660039897AMODIS-400.jpg', '1660039897AMODIS-400.jpg', 45, '2022-08-09 10:11:37', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `product_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_state`) VALUES
(1, 2, 10, 33, 645292162, 3, '2022-08-09 10:15:07', 'Complete'),
(2, 2, 16, 225, 1202933674, 5, '2022-08-10 08:01:42', 'Complete'),
(3, 2, 3, 10, 2091826071, 1, '2022-08-10 08:05:32', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 645292162, 33, 'COD', '2022-08-09 10:15:07'),
(2, 2, 1202933674, 225, 'COD', '2022-08-10 08:01:42'),
(3, 3, 2091826071, 10, 'COD', '2022-08-10 08:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'Ifte_kharul', 'iftekharul.tamim@gmail.com', '$2y$10$FXlZrhmgiZmxid2..FzZY.nZsSBw0C3cjfq6OA0CHk6oRW489h6Ei', 'DSC_0072.JPG', '127.0.0.1', 'Rajshahi', '01521570262'),
(3, 'Tamim', 'tamim@gmail.com', '$2y$10$yRn5NKQ3ybhWp7/wCQ1lTuIOeNrNbVTO8gq78jwXEMpqmLcy0BiLG', 'DSC_0073.JPG', '::1', 'Talaimari,Rajshahi', '12345678901');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_orders_ibfk_1` (`user_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
