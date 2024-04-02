-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 06:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kanban`
--

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `detail_descrip` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `completed_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `admin_id`, `name`, `description`, `detail_descrip`, `create_date`, `due_date`, `completed_date`) VALUES
(2, 1, 'Kanban Board Project', 'Creating the Kanban Board', 'A Kanban Board is an agile project management tool designed to help visualize work and maximize efficiency (or flow).', '2024-03-24 08:21:16', '2024-04-04 23:59:59', '2024-03-24 08:21:16'),
(3, 13, 'Project 2', 'Creating Project 2', 'Creating Project 2', '2024-03-24 08:27:07', '2024-04-04 23:59:59', '2024-03-24 08:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `project_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `user_id`, `project_id`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3),
(10, 10, 3),
(11, 11, 2),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(16, 16, 2),
(17, 17, 2),
(18, 18, 2),
(19, 19, 2),
(20, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `project_id`) VALUES
(1, 'Planning', 3),
(2, 'Doing', 3),
(3, 'Done', 3),
(4, 'Planning', 2),
(5, 'Doing', 2),
(6, 'Testing', 2),
(7, 'Done', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(100) NOT NULL,
  `project_id` int(100) NOT NULL,
  `stage_id` int(100) NOT NULL,
  `short_description` varchar(250) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `task_priority_color` varchar(100) NOT NULL,
  `task_priority_border` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `stage_id`, `short_description`, `task_name`, `task_priority_color`, `task_priority_border`) VALUES
(1, 3, 1, 'UI for EPDA\'s kanban project which is we need to present to our japanese CEO ', 'For UI', 'YPrimaryTaskColor', 'YDefaultCardBorder'),
(2, 3, 2, 'Database for EPDA\'s kanban project which is we need to present to our japanese CEO', 'For Database', 'YPrimaryTaskColor', 'YDefaultCardBorder'),
(3, 3, 3, 'Functions for EPDA\'s kanban project which is we need to present to our japanese CEO', 'For Functions', 'YPrimaryTaskColor', 'YDefaultCardBorder'),
(10, 2, 4, 'Project 2 Task 1', 'Task 1', 'YPrimaryTaskColor', 'YDefaultCardBorder'),
(11, 2, 5, 'Project 2 Task 2', 'Task 2', 'YPrimaryTaskColor', 'YDefaultCardBorder'),
(12, 2, 6, 'Project 2 Task 3', 'Task 3', 'YPrimaryTaskColor', 'YDefaultCardBorder'),
(15, 2, 7, 'Project 2 Task 4', 'Task 4', 'YPrimaryTaskColor', 'YDefaultCardBorder');

-- --------------------------------------------------------

--
-- Table structure for table `tasks_history`
--

CREATE TABLE `tasks_history` (
  `id` int(100) NOT NULL,
  `task_id` int(100) NOT NULL,
  `project_id` int(100) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `details` varchar(250) NOT NULL,
  `user_id` int(100) NOT NULL,
  `changed_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks_history`
--

INSERT INTO `tasks_history` (`id`, `task_id`, `project_id`, `stage_id`, `details`, `user_id`, `changed_date`) VALUES
(1, 1, 1, 1, 'changed the tasks (For UI) to doing stage form planning stage ', 1, '2024-03-27 17:18:32.000000'),
(2, 2, 1, 1, 'changed the tasks (For Database) to doing stage form planning stage ', 5, '2024-03-28 15:04:54.000000'),
(3, 3, 1, 1, 'changed the tasks (For UI) to doing stage form planning stage ', 7, '2024-03-27 15:06:05.000000'),
(4, 3, 1, 2, 'changed the tasks (For Function) to done stage form doing stage ', 9, '2024-03-30 15:06:05.000000');

-- --------------------------------------------------------

--
-- Table structure for table `task_members`
--

CREATE TABLE `task_members` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `task_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_members`
--

INSERT INTO `task_members` (`id`, `user_id`, `task_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3),
(10, 10, 3),
(11, 11, 10),
(12, 12, 10),
(13, 13, 10),
(14, 14, 11),
(15, 15, 11),
(16, 16, 11),
(17, 17, 12),
(18, 18, 12),
(19, 19, 12),
(20, 20, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `img`, `name`, `email`, `password`, `gender_id`, `role_id`) VALUES
(1, '', 'Aung Min Khant', 'sarsuke2007@gmail.com', '123', 1, 1),
(2, '', 'Lin Htet Ko Ko', 'LinHtet@gmail.com', '111', 1, 2),
(3, '', 'Shine Lin Aung', 'Shinee@gmail.com', '222', 1, 2),
(4, '', 'La Yaung', 'layaung@gmail.com', '123', 1, 2),
(5, '', 'Nyi Nay La', 'NNL@gmail.com', '444', 1, 2),
(6, '', 'Khant Thu Lin', 'KTL@gmail.com', '555', 1, 2),
(7, '', 'Si Thu Win', 'STW@gmail.com', '667', 1, 2),
(8, '', 'Htaw Kay', 'HK@gmail.com', '777', 1, 2),
(9, '', 'Myat Thu Kha', 'MTK@gmail.com', '888', 1, 2),
(10, '', 'Okkkar Maung', 'oak@gmail.com', '999', 1, 2),
(11, '', 'Zay Ya', 'zayya.z2345@gmail.com', '100', 1, 2),
(12, '', 'Paye Phyo Paing', 'PPP@gmail.com', '101', 1, 2),
(13, '', 'Htet Htet Htun', 'hht1918@gmail.com', '102', 2, 1),
(14, '', 'Yoon Mi Mi Hlaing', 'yoonmimihlaing000@gmail.com', '103', 2, 2),
(15, '', 'Ei Thinzar Lwin', 'eithinzarlwin17@gmail.com', '104', 2, 2),
(16, '', 'Su Myat Aung', 'sumyataung0206@gmail.com', '105', 2, 2),
(17, '', 'May Thingyan Phoo', 'deeaugust109@gmail.com', '106', 2, 2),
(18, '', 'Saung Yadanar Aung', 'saung@gmail.com', '107', 2, 2),
(19, '', 'Hnin Htet Htet Aung', 'Hninn@gmail.com', '108', 2, 2),
(20, '', 'Yin Myo Myat', 'yinmyo.myat24@gmail.com', '109', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks_history`
--
ALTER TABLE `tasks_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_members`
--
ALTER TABLE `task_members`
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
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tasks_history`
--
ALTER TABLE `tasks_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_members`
--
ALTER TABLE `task_members`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
