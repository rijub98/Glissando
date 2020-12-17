-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 05:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glissando`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `admin` boolean NOT NULL,

  PRIMARY KEY (`u_id`),

  UNIQUE KEY `username` (`username`) USING BTREE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `first_name`, `last_name`, `username`, `password`, `email`, `admin`) VALUES
(1, 'Riju', 'Bhattacharyya', 'riju45', 'qwe', 'rijubhattacharya@hotmail.com', true);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(20) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(50) NOT NULL,
  `artist_bio` varchar(500) NOT NULL,
  `artist_photo` text NOT NULL,

   PRIMARY KEY (`artist_id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_bio`, `artist_photo`) VALUES
(1, 'Taylor Swift', 'Taylor Alison Swift is an American singer-songwriter. Her narrative songwriting, which often centers around her personal life, has received widespread critical plaudits and media coverage. Born in West Reading, Pennsylvania, Swift relocated to Nashville, Tennessee in 2004 to pursue a career in country music.', '1605370860_4593865_taylor.jpg'),
(2, 'Imagine Dragons', 'Imagine Dragons is an American pop rock band from Las Vegas, Nevada, consisting of lead singer Dan Reynolds, lead guitarist Wayne Sermon, bassist Ben McKee, and drummer Daniel Platzman', '1605370939_4671640_id.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(20) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(50) NOT NULL,
  `album_release_date` date NOT NULL,
  `album_genre` varchar(50) NOT NULL,
  `album_cover_image` text NOT NULL,
  `artist_id` int(20) NOT NULL,

  PRIMARY KEY (`album_id`),
  
  FOREIGN KEY (`artist_id`) REFERENCES artist(`artist_id`) ON UPDATE CASCADE ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `album_name`, `album_release_date`, `album_genre`, `album_cover_image`, `artist_id`) VALUES
(1, 'Lover', '2019-08-10', 'POP', '1605349364_9747628_Taylor_Swift_-_Lover.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(20) NOT NULL AUTO_INCREMENT,
  `song_name` varchar(50) NOT NULL,
  `song_file` varchar(50) NOT NULL,
  `song_cover_image` varchar(50) NOT NULL,
  `album_id` int(20) NOT NULL,

  PRIMARY KEY (`song_id`),

  FOREIGN KEY (`album_id`) REFERENCES albums(`album_id`) ON UPDATE CASCADE ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_name`, `song_file`, `song_cover_image`, `album_id`) VALUES
(1, 'Lover', '1605415633_7758210_Taylor_Swift_-_Lover.mp3', '1605415633_2212673_Taylor_Swift_-_Lover.png', 1);

-- --------------------------------------------------------



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
