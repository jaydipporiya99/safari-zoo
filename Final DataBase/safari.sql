-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2026 at 01:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safari`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phno` bigint(15) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `dob`, `email`, `password`, `phno`, `address`) VALUES
(1, 'admin', '2001-01-01', 'rsidd018@gmail.com', 'admin', 9558794838, 'bhavnagar');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `img3` varchar(50) NOT NULL,
  `conservation_status` varchar(50) NOT NULL,
  `life_span` varchar(50) NOT NULL,
  `body_size` varchar(50) NOT NULL,
  `native_habitat` varchar(200) NOT NULL,
  `diet` varchar(200) NOT NULL,
  `desc` varchar(400) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animal_gallery`
--

CREATE TABLE `animal_gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal_gallery`
--

INSERT INTO `animal_gallery` (`id`, `name`, `img`, `type`) VALUES
(1, 'lion', 'about-us.jpg', 'amphibians'),
(2, 'fISH', 'a_ig-5.jpg', 'fish'),
(3, 'Z', 'banner-img.png', 'reptiles'),
(4, '.', 'animal_1.jpg', 'amphibians'),
(5, '.', 'animal_2.jpg', 'amphibians'),
(6, '.', 'animal_3.jpg', 'amphibians'),
(7, '.', 'animal_4.jpg', 'amphibians'),
(8, '.', 'animal_5.jpg', 'amphibians'),
(9, '.', 'animal_6.jpg', 'insects'),
(10, '.', 'animal_7.jpg', 'reptiles'),
(11, '.', 'animal_8.jpg', 'insects'),
(12, '.', 'animal_9.jpg', 'insects'),
(13, '.', 'a_ig-1.jpg', 'fish'),
(14, '.', 'a_ig-2.jpg', 'fish'),
(15, '.', 'a_ig-4.jpg', 'mammals'),
(16, '.', 'animal-details.jpg', 'amphibians'),
(17, '.', 'crocodile1.jpg', 'amphibians'),
(18, '.', 'a_ig-6.jpg', 'mammals'),
(19, '.', 'about-bg.jpg', 'amphibians'),
(20, '.', 'beetle2.jpg', 'amphibians'),
(21, '.', 'butterfly1.jpg', 'birds'),
(22, '.', 'butterfly2.jpg', 'mammals'),
(23, '.', 'clownfish1.jpg', 'birds'),
(24, '.', 'frog1.jpg', 'reptiles'),
(25, '.', 'clownfish2.jpg', 'fish'),
(26, '.', 'eagle1.jpg', 'amphibians');

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

CREATE TABLE `checkup` (
  `id` int(11) NOT NULL,
  `animalId` varchar(50) NOT NULL,
  `medicalAssistantId` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `age` int(50) NOT NULL,
  `temperature` int(50) NOT NULL,
  `heartRate` int(50) NOT NULL,
  `weight` int(50) NOT NULL,
  `bodyConditionScore` int(50) NOT NULL,
  `appearance` varchar(50) NOT NULL,
  `appetite` varchar(50) NOT NULL,
  `urineFrequency` varchar(50) DEFAULT NULL,
  `urineConsistency` varchar(50) DEFAULT NULL,
  `urineColor` varchar(50) DEFAULT NULL,
  `activityLevel` varchar(50) NOT NULL,
  `behaviorDescription` varchar(50) NOT NULL,
  `vaccinationName` varchar(50) DEFAULT NULL,
  `vaccinationDate` varchar(50) DEFAULT NULL,
  `treatmentRequirement` varchar(50) NOT NULL,
  `notes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` bigint(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phno`, `subject`, `desc`) VALUES
(1, 'sidd', 'rsidd018@gmail.com', 9558794838, 'purchase threfting', 'ghshgsug'),
(2, 'Jaydip', 'jaydipj046@gmail.com', 6356312540, '4545', '5455');

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(11) NOT NULL,
  `donor_first_name` varchar(50) NOT NULL,
  `donor_last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `donate_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donate`
--

INSERT INTO `donate` (`id`, `donor_first_name`, `donor_last_name`, `email`, `amount`, `message`, `address`, `city`, `donate_title`) VALUES
(1, 'jaydip poriya', '...', 'jaydipj046@gmail.com', 20000, 'thank you ', 'surat gujarat', 'Surat', 'Impala'),
(2, 'jaydip poriya', '...', 'jaydipj046@gmail.com', 20000, 'thank ', 'surat gujarat', 'Surat', 'Impala'),
(3, 'jaydip poriya', '...', 'jaydipj046@gmail.com', 500, 'hello', 'surat gujarat', 'Surat', 'Warm & Collaborative');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `title`, `img`, `desc`) VALUES
(1, 'Red Panda', 'donation_1.jpg', 'The red panda (Ailurus fulgens) is a rare and vuln'),
(2, 'Impala', 'donation_2.jpg', 'The Impala is the heart of the African savanna—ele'),
(3, 'Warm & Collaborative', 'donation_3.jpg', 'Building a world-class home for our animals is lik'),
(4, 'Plain Tiger', 'butterfly1.jpg', 'Small Wonders, Big Impact\r\nNot every resident of o');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `phno` bigint(15) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `date` varchar(15) NOT NULL,
  `month` varchar(15) NOT NULL,
  `img` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `desc`, `date`, `month`, `img`) VALUES
(2, 'The Seasonal Festiva', 'As the cherry blossoms bloom, we invite you to cel', '04122026', 'October', 'events_1.jpg'),
(3, 'The Family Fun Event', 'Hop into spring with us! Join our annual \"Egg-Vent', '05092026', 'November', 'events_2.jpg'),
(4, 'The Creative Worksho', 'Let your imagination run wild! Our \"Wild Art\" day ', '04062026', 'September', 'events_3.jpg'),
(5, 'The Milestone Celebr', 'We did it! Thanks to your incredible support, we’v', '04052026', 'August', 'events_4.jpg'),
(6, 'Giants of the Savann', 'Join us for an unforgettable evening dedicated to ', '01022026', 'July', 'events_7.jpg'),
(7, 'The Zoo Food Truck R', 'Take a bite out of the wild! Join us for a weekend', '12122026', 'December', 'events_12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `feedback` varchar(11) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `des` varchar(100) NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `role`, `des`, `img`) VALUES
(1, 'Medical Treatment of', 'full-time', 'The Zoo Animal Medical Treatment Program is designed to ensure the health, safety, and welfare of al', 'medical.jpg'),
(2, 'Ticket Checker', 'full-time', 'We are looking for a responsible and customer-friendly Ticket Checker to join our zoo project team. ', 'ticket.jpg'),
(3, 'Animal Trainer', 'full-time', 'We are seeking a skilled and passionate Animal Trainer to join our zoo project team. The role involv', 'trainer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

CREATE TABLE `job_apply` (
  `id` int(11) NOT NULL,
  `job_title` varchar(20) NOT NULL,
  `file` varchar(20) NOT NULL,
  `message` varchar(100) NOT NULL,
  `applicant` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phno` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_apply`
--

INSERT INTO `job_apply` (`id`, `job_title`, `file`, `message`, `applicant`, `email`, `phno`, `address`) VALUES
(1, 'Animal Trainer', '', 'trhtrh', 'jaydip', 'poriyajay515@gmail.c', '6356312540', '');

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `phno` bigint(15) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pid` int(10) NOT NULL,
  `pqty` int(10) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `address` varchar(11) NOT NULL,
  `landmark` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `link` varchar(20) NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `name`, `link`, `img`) VALUES
(1, 'vantara', 'https://vantarazoo.o', 'logo_1.png'),
(2, 'Gujarat Tourism', 'https://gujarattouri', 'logo_2.png'),
(3, 'wildlife institute o', 'https://wii.gov.in/', 'logo_4.png'),
(4, 'nature protects if s', 'https://www.cbd.int/', 'logo_5.png'),
(5, 'PETA', 'https://www.peta.org', 'logo_6.png'),
(6, 'BHNS India', 'https://indianwildli', 'logo_7.png'),
(7, 'Super tails', 'https://supertails.c', 'logo_8.png'),
(8, 'WWF', 'https://www.worldwil', 'logo_9.png'),
(9, 'wildlife SOS', 'https://wildlifesos.', 'logo_11.png'),
(10, 'sanctuary', 'https://ahmedabadtou', 'logo_12.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `old_price` int(10) NOT NULL,
  `new_price` int(10) NOT NULL,
  `material` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `img1` varchar(20) NOT NULL,
  `img2` varchar(20) NOT NULL,
  `img3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `child` int(10) NOT NULL,
  `adults` int(10) NOT NULL,
  `senior` varchar(20) NOT NULL,
  `total_amount` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `persons` int(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `fname`, `email`, `child`, `adults`, `senior`, `total_amount`, `date`, `lname`, `persons`) VALUES
(1, 'jaydip', 'poriyajay515@gmail.c', 6, 0, '0', '240', '2026-03-20', 'poriya', 0),
(2, 'no name', 'jaydipj046@gmail.com', 1, 2, '3', '380', '2026-03-18', 'name', 0),
(6, 'jaydip', 'poriyajay515@gmail.c', 2, 0, '0', '80', '2026-03-18', 'poriya', 0),
(7, 'jaydip', 'poriyajay515@gmail.c', 2, 0, '0', '80', '2026-03-18', 'poriya', 0),
(8, 'jaydip', 'poriyajay515@gmail.c', 0, 1, '0', '80', '2026-04-11', 'poriya', 0),
(11, 'jaydip poriya', 'jaydipj046@gmail.com', 0, 24, '2', '2040', '2026-04-30', '...', 26),
(12, 'jaydip poriya', 'jaydipj046@gmail.com', 0, 64, '0', '5120', '2026-04-30', '...', 64),
(13, 'jaydip poriya', 'jaydipj046@gmail.com', 13, 93, '3', '8140', '2026-04-30', '...', 109),
(14, 'jaydip poriya', 'jaydipj046@gmail.com', 1, 0, '0', '40', '2026-05-01', '...', 1),
(15, 'jaydip poriya', 'jaydipj046@gmail.com', 1, 0, '1', '100', '2026-04-30', '...', 2),
(16, 'jaydip poriya', 'jaydipj046@gmail.com', 1, 0, '0', '40', '2026-05-02', '...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phno` bigint(15) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `password`, `phno`, `city`) VALUES
(1, 'sidd', 'rathod', 'rsidd018@gmail.com', '1234', 9558794838, 'surat'),
(2, 'jaydip', 'poriya', 'poriyajay515@gmail.com', '123456', 6356312540, 'surat'),
(3, 'jaydip', 'poriya', 'poriyajay515@gmail.com', '1234', 6356312540, 'surat'),
(4, 'jaydip', 'poriya', 'jaydipj046@gmail.com', '123456', 6356312540, 'surat'),
(5, 'Jaydip', 'Poriya', 'jaydipj046@gmail.com', '123456', 6356312540, 'Surat'),
(6, 'jaydip poriya', '...', 'jaydipj046@gmail.com', '123', 6356312540, 'Surat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_gallery`
--
ALTER TABLE `animal_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkup`
--
ALTER TABLE `checkup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animal_gallery`
--
ALTER TABLE `animal_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `checkup`
--
ALTER TABLE `checkup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donate`
--
ALTER TABLE `donate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_apply`
--
ALTER TABLE `job_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
