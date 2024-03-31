-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 07:21 AM
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
(10, 'Chicken Chettinad', '   - Ingredients:\r\n     - 500g chicken pieces\r\n     - 2 onions, finely chopped\r\n     - 3 tomatoes, pureed\r\n     - 2 tsp ginger-garlic paste\r\n     - 2 tbsp Chettinad masala\r\n     - 1 tsp turmeric powder\r\n     - Salt to taste\r\n     - Oil for cooking\r\n\r\n   - Instructions:\r\n     1. Heat oil in a pan, add onions, and sauté until golden.\r\n     2. Add ginger-garlic paste, tomato puree, Chettinad masala, turmeric, and salt. Cook for 5 minutes.\r\n     3. Add chicken pieces, mix well, cover, and cook until chicken is tender.\r\n     4. Garnish with coriander leaves and serve hot.', '6605abad2b607_Chicken Chettinad.jpeg'),
(11, 'Hyderabadi Biryani', '   - Ingredients:\r\n     - 500g basmati rice\r\n     - 500g chicken/mutton, marinated\r\n     - 4 onions, thinly sliced\r\n     - 2 tomatoes, chopped\r\n     - 2 tbsp biryani masala\r\n     - 1 cup yogurt\r\n     - 1 tsp turmeric powder\r\n     - Oil/ghee for cooking\r\n     - Salt to taste\r\n\r\n   - Instructions:\r\n     1. Cook rice until 70% done, drain, and keep aside.\r\n     2. In a pan, heat oil/ghee, sauté onions until golden. Add tomatoes, biryani masala, turmeric, and salt.\r\n     3. Add marinated chicken/mutton and cook until half done.\r\n     4. Layer cooked rice over the meat mixture. Sprinkle saffron milk and cover with a lid.\r\n     5. Cook on low heat for 20 minutes. Serve hot with raita.', '6605abf8e7273_Hyderabadi Biryani.jpeg'),
(12, 'Andhra Fish Curry', '   - Ingredients:\r\n     - 500g fish pieces\r\n     - 1 onion, finely chopped\r\n     - 2 tomatoes, chopped\r\n     - 2 tbsp tamarind paste\r\n     - 3-4 green chillies, slit\r\n     - 1 tsp mustard seeds\r\n     - 1 tsp fenugreek seeds\r\n     - 1 tsp red chilli powder\r\n     - Salt to taste\r\n     - Oil for cooking\r\n\r\n   - Instructions:\r\n     1. Heat oil in a pan, add mustard seeds, fenugreek seeds, and let them splutter.\r\n     2. Add onions, green chillies, and sauté until onions turn translucent.\r\n     3. Add tomatoes, tamarind paste, red chilli powder, and salt. Cook until tomatoes are soft.\r\n     4. Add fish pieces, mix gently, cover, and cook until fish is done.\r\n     5. Garnish with coriander leaves and serve hot with rice.', '6605ac958d2b9_Andhra Fish Curry.jpeg'),
(13, 'Kerala Fish Moilee', '   - Ingredients:\r\n     - 500g fish fillets\r\n     - 1 onion, finely chopped\r\n     - 2 green chillies, slit\r\n     - 1 cup thick coconut milk\r\n     - 1 tsp ginger-garlic paste\r\n     - 1 tsp turmeric powder\r\n     - 1 tsp mustard seeds\r\n     - 2-3 curry leaves\r\n     - Salt to taste\r\n     - Oil for cooking\r\n\r\n   - Instructions:\r\n     1. Heat oil in a pan, add mustard seeds, curry leaves, and let them splutter.\r\n     2. Add onions, green chillies, and sauté until onions are translucent.\r\n     3. Add ginger-garlic paste, turmeric powder, and salt. Cook for 2 minutes.\r\n     4. Add fish fillets and coconut milk. Simmer until fish is cooked.\r\n     5. Serve hot with steamed rice.', '6605ad1ee64ab_Kerala Fish Moilee.jpeg'),
(14, 'Mangalorean Prawn Curry', '   - Ingredients:\r\n     - 500g prawns, cleaned\r\n     - 1 onion, finely chopped\r\n     - 2 tomatoes, chopped\r\n     - 1 cup coconut milk\r\n     - 2 tbsp red chilli powder\r\n     - 1 tsp turmeric powder\r\n     - 1 tsp mustard seeds\r\n     - 2-3 curry leaves\r\n     - Salt to taste\r\n     - Oil for cooking\r\n\r\n   - Instructions:\r\n     1. Heat oil in a pan, add mustard seeds, curry leaves, and let them splutter.\r\n     2. Add onions and sauté until golden. Add tomatoes and cook until soft.\r\n     3. Add red chilli powder, turmeric, and salt. Stir well.\r\n     4. Add prawns and coconut milk. Cook until prawns are done.\r\n     5. Garnish with coriander leaves and serve with rice or roti.', '6605b16abcdf7_Mangalorean Prawn Curry.jpeg'),
(15, 'Butter Chicken', '   - Ingredients:\r\n     - 500g chicken pieces\r\n     - 2 onions, finely chopped\r\n     - 2 tomatoes, pureed\r\n     - 1 cup yogurt\r\n     - 2 tbsp butter\r\n     - 1 tbsp ginger-garlic paste\r\n     - 1 tsp red chilli powder\r\n     - 1 tsp garam masala\r\n     - 1 tsp kasuri methi (dried fenugreek leaves)\r\n     - Salt to taste\r\n     - Oil for cooking\r\n\r\n   - Instructions:\r\n     1. Marinate chicken with yogurt, red chilli powder, and salt for 1 hour.\r\n     2. Heat oil in a pan, add onions and sauté until golden. Add ginger-garlic paste and sauté for 2 minutes.\r\n     3. Add tomato puree, garam masala, and salt. Cook until oil separates.\r\n     4. Add marinated chicken and cook until chicken is tender.\r\n     5. Add butter and kasuri methi. Simmer for 5 minutes.\r\n     6. Serve hot with naan or rice.', '6605b235c7527_Butter Chicken.jpeg'),
(18, 'Strawberry Milkshake', '   - Ingredients:\r\n     - 2 cups strawberry ice cream\r\n     - 1 cup milk\r\n     - 1 cup fresh strawberries\r\n     - 2 tbsp sugar (optional)\r\n   \r\n   - Instructions:\r\n     - Blend all ingredients until smooth.\r\n     - Serve chilled with a strawberry garnish.', '6606c82953242_Strawberry Milkshake.jpeg'),
(19, 'Mango Milkshake', '   - Ingredients:\r\n     - 2 ripe mangoes, peeled and diced\r\n     - 2 cups vanilla ice cream\r\n     - 1 cup milk\r\n     - 2 tbsp sugar (optional)\r\n   \r\n   - Instructions:\r\n     - Blend mangoes, ice cream, milk, and sugar until smooth.\r\n     - Serve chilled.', '6606c8723fd38_Mango Milkshake.jpeg');

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
(27, 'raj', 'example@gmail.com', 'Hey im user of your website. I really likes your recipes and also your website designs. Love your works.', '2024-03-27 18:48:25'),
(31, 'Charan', 'charanofficial30@gmail.com', '⭐️⭐️⭐️⭐️☆ (4/5)\n\nI recently stumbled upon RecipeHeaven.com while searching for some new dinner ideas, and I must say, I was pleasantly surprised! The website boasts an extensive collection of recipes ranging from quick weeknight dinners to gourmet desserts.', '2024-03-29 14:30:49');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
