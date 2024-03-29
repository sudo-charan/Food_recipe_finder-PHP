-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 08:01 PM
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
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `IsLoggedIn` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`, `Email`, `IsLoggedIn`) VALUES
(1, 'admin', 'admin123', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `featured_recipes`
--

CREATE TABLE `featured_recipes` (
  `id` int(11) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featured_recipes`
--

INSERT INTO `featured_recipes` (`id`, `recipe_name`, `description`, `image`) VALUES
(1, 'Dosa', 'Ingredients: - 1 cup rice - 1/4 cup urad dal (black gram dal) - Salt to taste Instructions: 1. Soak rice and urad dal separately for 4-5 hours. 2. Grind them to a smooth batter separately. 3. Mix both batters, add salt and let it ferment overnight. 4. Heat a non-stick pan, pour a ladleful of batter, spread it thin, and cook until golden brown. Serve hot with chutney and sambar.\r\n\r\n', '660438b87664a_OIG.jpg'),
(3, 'Idli', 'Ingredients: - 1 cup rice - 1/4 cup urad dal (black gram dal) - Salt to taste Instructions: 1. Soak rice and urad dal separately for 4-5 hours. 2. Grind them to a smooth batter separately. 3. Mix both batters, add salt and let it ferment overnight. 4. Heat a non-stick pan, pour a ladleful of batter, spread it thin, and cook until golden brown. Serve hot with chutney and sambar.\r\n\r\n', '6604395114fb1_unnamed.jpg'),
(4, 'samosa', 'Ingredients: - 1 cup rice - 1/4 cup urad dal (black gram dal) - Salt to taste Instructions: 1. Soak rice and urad dal separately for 4-5 hours. 2. Grind them to a smooth batter separately. 3. Mix both batters, add salt and let it ferment overnight. 4. Heat a non-stick pan, pour a ladleful of batter, spread it thin, and cook until golden brown. Serve hot with chutney and sambar.\r\n\r\n', '660439627b429_ritsugit.jpeg'),
(5, 'Maggie', 'Ingredients: - 1 cup rice - 1/4 cup urad dal (black gram dal) - Salt to taste Instructions: 1. Soak rice and urad dal separately for 4-5 hours. 2. Grind them to a smooth batter separately. 3. Mix both batters, add salt and let it ferment overnight. 4. Heat a non-stick pan, pour a ladleful of batter, spread it thin, and cook until golden brown. Serve hot with chutney and sambar.\r\n\r\n', '66043976239e1_narutogit.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(27, 'raj', 'example@gmail.com', 'Hey im user of your website. I really likes your recipes and also your website designs. Love your works.', '2024-03-27 18:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `signup_date` date DEFAULT NULL,
  `signup_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`, `Email`, `signup_date`, `signup_time`) VALUES
(22, 'nikki', '123', 'darkfireoffical007@gmail.com', '2024-03-27', '12:35:22'),
(23, 'charan', '123', 'charanofficial30@gmail.com', '2024-03-27', '12:35:32'),
(24, 'bhatta', '123', 'examplebhatta@gmail.com', '2024-03-27', '12:36:07'),
(25, 'arjun_kumar', 'password1', 'arjun.kumar@example.com', '2024-03-27', '12:38:46'),
(26, 'deepa_nair', 'password2', 'deepa.nair@example.com', '2024-03-27', '12:38:46'),
(27, 'akash_reddy', 'password3', 'akash.reddy@example.com', '2024-03-27', '12:38:46'),
(28, 'priya_rajan', 'password4', 'priya.rajan@example.com', '2024-03-27', '12:38:46'),
(29, 'ramesh_gopal', 'password5', 'ramesh.gopal@example.com', '2024-03-27', '12:38:46'),
(30, 'anu_sharma', 'password6', 'anu.sharma@example.com', '2024-03-27', '12:38:46'),
(31, 'vikram_patel', 'password7', 'vikram.patel@example.com', '2024-03-27', '12:38:46'),
(32, 'divya_menon', 'password8', 'divya.menon@example.com', '2024-03-27', '12:38:46'),
(33, 'prakash_singh', 'password9', 'prakash.singh@example.com', '2024-03-27', '12:38:46'),
(34, 'lakshmi_krishnan', 'password10', 'lakshmi.krishnan@example.com', '2024-03-27', '12:38:46'),
(35, 'suresh_kumar', 'password11', 'suresh.kumar@example.com', '2024-03-27', '12:38:46'),
(36, 'priyanka_shah', 'password12', 'priyanka.shah@example.com', '2024-03-27', '12:38:46'),
(37, 'karthik_naidu', 'password13', 'karthik.naidu@example.com', '2024-03-27', '12:38:46'),
(38, 'anjali_gupta', 'password14', 'anjali.gupta@example.com', '2024-03-27', '12:38:46'),
(39, 'manoj_kannan', 'password15', 'manoj.kannan@example.com', '2024-03-27', '12:38:46'),
(40, 'geeta_balaji', 'password16', 'geeta.balaji@example.com', '2024-03-27', '12:38:46'),
(41, 'vijay_mishra', 'password17', 'vijay.mishra@example.com', '2024-03-27', '12:38:46'),
(42, 'anusha_rao', 'password18', 'anusha.rao@example.com', '2024-03-27', '12:38:46'),
(43, 'prasad_reddy', 'password19', 'prasad.reddy@example.com', '2024-03-27', '12:38:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `featured_recipes`
--
ALTER TABLE `featured_recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `featured_recipes`
--
ALTER TABLE `featured_recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
