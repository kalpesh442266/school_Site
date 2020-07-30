-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2020 at 07:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `class_name` int(11) NOT NULL,
  `sub_name` int(11) NOT NULL,
  `activity_description` int(11) NOT NULL,
  `submit_date` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `activity_title` int(11) NOT NULL,
  `activity_upload_path` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'kalpesh', 'admin@admin.com', 'admin'),
(2, 'John', 'john@example.com', 'admin1234'),
(2, 'John', 'john@example.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `stud_roll_no` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sub_name` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `present` int(11) NOT NULL,
  `absent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `class_teacher` text NOT NULL,
  `number_of_students` int(11) NOT NULL,
  `standard` text NOT NULL,
  `division` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `handouts`
--

CREATE TABLE `handouts` (
  `id` text NOT NULL,
  `description` text NOT NULL,
  `path` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `title` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `homework_submitted`
--

CREATE TABLE `homework_submitted` (
  `sub_name` int(11) NOT NULL,
  `class_name` int(11) NOT NULL,
  `student_roll_no` int(11) NOT NULL,
  `teacher_remarks` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `admission_no` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `photo` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` text NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `class_name` varchar(15) NOT NULL,
  `admission_date` varchar(15) NOT NULL,
  `academic_year` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile_no` varchar(110) NOT NULL,
  `parent_name` varchar(25) NOT NULL,
  `parent_mobile_no` varchar(25) NOT NULL,
  `parent_email` varchar(25) NOT NULL,
  `pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`admission_no`, `name`, `photo`, `gender`, `dob`, `roll_no`, `class_name`, `admission_date`, `academic_year`, `email`, `mobile_no`, `parent_name`, `parent_mobile_no`, `parent_email`, `pwd`) VALUES
('1', 'kalpesh', 'photo', 'male', '29/01/1999', '1', '1A', '20/12/2019', '2019-20', 'kalpeshrane@outlook.com', '7028647137', 'bharat', '8495625184', 'bharat@gmail.com', 'kalpesh'),
('2', 'shree', 'photos/file_name.jpeg', 'male', '2020-07-30', '23', '1A', '2020-07-11', '2018-19', 'shree@gmail.com', '7485964152', 'shubham', '9495625184', 'shubham@gmail.com', 'shree'),
('3', 'ramukaka', 'photos/file_name.jpeg', 'male', '2020-07-30', '23', '1A', '2020-07-22', '2018-19', 'ramukaka@gmail.com', '7485964152', 'shubham', '9495625184', 'shubham@gmail.com', 'ramukaka');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `teacher_name` int(11) NOT NULL,
  `class_name` int(11) NOT NULL,
  `syllabus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pwd` text NOT NULL,
  `education` text NOT NULL,
  `job_start_date` varchar(20) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `gender`, `email`, `pwd`, `education`, `job_start_date`, `contact_number`, `photo`) VALUES
(1, 'kalpesh', 'male', 'kalpeshbrane@outlook.com', 'kalpesh', 'BE (computer)', '2020-07-30', '7028647137', 'photos/file_name.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`admission_no`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
