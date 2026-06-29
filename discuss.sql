-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2026 at 08:14 AM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int NOT NULL,
  `answer` varchar(300) NOT NULL,
  `question_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`) VALUES
(1, 'I dont know', 1, 7),
(2, 'Rasmus Lerdorf in 1994', 1, 7),
(3, 'Rasmus Lerdorf in 1994', 1, 7),
(4, '', 1, 7),
(5, 'Transitioning from university to the professional world is a steep learning curve. As a fresher, mastering a massive, unfamiliar codebase and navigating agile sprints are the biggest hurdles', 2, 7),
(6, 'bridging the gap between college theory and enterprise-level production.', 2, 7),
(7, '???', 8, 7),
(8, '', 8, 7),
(9, '', 8, 7),
(10, '', 8, 7),
(11, '', 8, 7),
(12, '', 8, 7),
(13, '??', 8, 7),
(14, 'what was that', 8, 7),
(15, 'FIFA (the Fédération Internationale de Football Association) was collectively created by seven European nations on May 21, 1904, in Paris, France.', 11, 9),
(16, '', 5, 10),
(17, '', 5, 10),
(18, '', 5, 10),
(19, 'ios', 5, 10),
(20, 'why so much blank ans ', 5, 10),
(21, 'yes Rasmus is correct', 1, 11),
(22, 'There is no single \"best\" language for Data Structures and Algorithms (DSA), as the ideal choice depends completely on your specific goals. However, C++, Java, and Python are the absolute industry standards. Companies evaluate your underlying problem-solving logic rather than the language itself.', 13, 10),
(23, 'C++ and Java are the top picks for interviews, while Python is ideal for beginners', 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `answer_likes`
--

CREATE TABLE `answer_likes` (
  `id` int NOT NULL,
  `answer_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answer_likes`
--

INSERT INTO `answer_likes` (`id`, `answer_id`, `user_id`, `created_at`) VALUES
(3, 22, 10, '2026-06-28 14:10:03'),
(22, 22, 12, '2026-06-28 14:43:37'),
(24, 23, 12, '2026-06-28 14:45:03'),
(25, 15, 12, '2026-06-28 15:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'General'),
(2, 'Technology'),
(3, 'Education'),
(4, 'Science'),
(5, 'Health'),
(6, 'Sports'),
(7, 'Entertainment'),
(8, 'Movies & TV'),
(9, 'Gaming'),
(10, 'Travel'),
(11, 'Food'),
(12, 'Art & Design'),
(13, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `category_id`, `user_id`) VALUES
(1, 'who invented PHP', 'PHP ?', 2, 1),
(2, 'Can you tell me challenges you faced while implementing new software ?', 'kindly tell me more about the challenges you faced while implementing new software as a freshers .', 2, 1),
(5, 'Do I prefer iOS or Android, and how long do I plan to keep this phone ?', 'Operating systems dictate your app ecosystem and interface customization. It\'s also vital to check the manufacturer\'s software update policy.', 1, 6),
(6, ' What is the powerhouse of the cell?', 'It is related to Biology', 4, 7),
(11, 'who invented fifa ?', 'NA', 6, 7),
(13, 'better lang for DSA', 'AI & DS student', 2, 11),
(14, 'how to open sports brand', 'Opening a sports shop involves a strategies i want that actually\r\n', 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`) VALUES
(1, 'c.shreyaa_', 'ceshweta3@gmail.com', '123', 'Kalepadal , Hadapsar ,Pune'),
(5, 'siddhi', 'siddhi123@gmail.com', '123', 'Moshi'),
(6, 'anushka', 'anushka123@gmail.com', '1234', 'Wagholi'),
(7, 'aniket', 'aniketgite0405@gmail.com', '123', 'Otur'),
(8, 'soham', 'soham@gmail.com', '123', 'Paithan'),
(9, 'bitti', 'bitti123@gmail.com', '$2y$10$/Uqt7mwKhRoWMkB2DAnR0ulNfHNrlvaTjdp8iJvexnP8m9E5z6SBS', 'Wagholi'),
(10, 'Sayli', 'sayli@gmail.com', '$2y$10$XLtXc9/HZGxT4nGd6FyxMuRdnR.C46nkf.iXwQXLLM64iFATPjCce', 'Talegaon'),
(11, 'rishi', 'rishi123@gmail.com', '$2y$10$svEh98/TNairzuJzt80DSe1zfAV8PgoU6v54.Xe/n3.1EsiX7LL1C', 'Latur'),
(12, 'Virat Kohli', 'virat@gmail.com', '$2y$10$Lwkoqnl6ZBZ6rApUCFmO.uodWyW/7SPx1IkNL1pu9byljwjNlmz46', 'Delhi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_likes`
--
ALTER TABLE `answer_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `answer_id` (`answer_id`,`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `answer_likes`
--
ALTER TABLE `answer_likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
