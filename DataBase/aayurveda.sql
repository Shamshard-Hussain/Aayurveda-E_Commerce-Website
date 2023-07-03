-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 10, 2023 at 02:44 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aayurveda`
--
CREATE DATABASE IF NOT EXISTS `aayurveda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `aayurveda`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserID`, `First_Name`, `Last_Name`, `email`, `password`) VALUES
(1, 'sham', 'shard', 'Admin@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Dob` varchar(10) NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Home_No` varchar(10) NOT NULL,
  `Street_name` varchar(25) NOT NULL,
  `City` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `img` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `Joined_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `Resgistration_Number` int(11) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Middle_Initials` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Nic_Number` varchar(12) NOT NULL,
  `phone` int(15) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Specialty_Type` varchar(30) NOT NULL,
  `Bio` text NOT NULL,
  `Image` text NOT NULL,
  `Home_Number` text NOT NULL,
  `Street_Name` text NOT NULL,
  `City_Name` text NOT NULL,
  `Password` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `Resgistration_Number`, `First_Name`, `Middle_Initials`, `Last_Name`, `Nic_Number`, `phone`, `Email`, `Gender`, `Specialty_Type`, `Bio`, `Image`, `Home_Number`, `Street_Name`, `City_Name`, `Password`, `status`) VALUES
(1, 123, 'S', 'Kanishka', 'Sadaruwan', '123456789V', 0, 'sachinkanishka95@gmail.com', 'Male', 'Gastritis specialist', 'Dr. sachin Kanishka is a highly respected gastritis specialist with over 30 years of experience in the field. He has dedicated his career to studying and treating digestive disorders, with a particular focus on gastritis. Dr Sachin is known for his compassionate bedside manner and his ability to connect with his patients on a personal level. He is widely regarded as one of the top experts in his field, and his patients have praised him for his exceptional care and expertise.', 'doc-1.png', '222', 'negombo', 'negombo', 'fcea920f7412b5da7be0cf42b8c93759', 'Offline now'),
(2, 1234, 'M', 'Shamshard', 'Hussain', '123456788V', 774466326, 'shamshard93@gmail.com', 'Male', 'Neuronlogy specialist', 'Dr. Sham shard is a board-certified neurology specialist with over 15 years of experience in the field. He completed his medical training at the University of California, San Francisco, and went on to complete her residency and fellowship at Stanford University Medical Center.\r\n\r\nDr. Sham shard has a particular interest in the diagnosis and treatment of neurological disorders such as Parkinson\'s disease, multiple sclerosis, and stroke. She is skilled in a wide range of diagnostic techniques, including MRI and CT scans, electromyography, and nerve conduction studies.', 'R.jpg', '222', 'negombo', 'negombo', 'fcea920f7412b5da7be0cf42b8c93759', 'Active now'),
(3, 12345, 'D', 'Yasith', 'Ranod', '987654321V', 77446632, 'ysithroanod@gmailcom', 'Male', 'Diabeltic specialist', 'Dr. Ysith Ranod is a skilled diabetic specialist with more than 15 years of experience in treating patients with diabetes. He received his medical degree from Johns Hopkins University and completed his residency at Harvard Medical School. Dr. Yasith is dedicated to providing his patients with the latest advancements in diabetes management and is known for his personalized approach to care. He is also actively involved in diabetes research and has authored numerous articles on the subject. In his free time, Dr. Yasith enjoys hiking, skiing, and spending time with his family.', 'OIP.jpg', '120', 'Kibulapitiya road,', 'Negombo', '25d55ad283aa400af464c76d713c07ad', 'Offline now'),
(4, 123456, 'Tharushi', 'Maduhansi', 'govithanthirige', '111111111v', 77446632, 'tharushimaduhansi@gmail.com', 'Female', 'Rheumatology specialist', 'Dr. Tharushi Maduhansi is a highly skilled rheumatology specialist with a passion for helping patients manage autoimmune diseases. With over 15 years of experience, she has a deep understanding of the complex nature of rheumatologic disorders and the latest treatments available. Dr. Tharushi is known for her compassionate and personalized approach, and she believes that a strong doctor-patient relationship is key to achieving the best possible outcomes. In her free time, she enjoys hiking and spending time with her family.', 'doc-2.png', '222', 'Suhada mawatha', 'Panadura', 'fcea920f7412b5da7be0cf42b8c93759', 'Offline now'),
(6, 1234567, 'K', 'Abhisheka', 'Palawattha', '987654321V', 774466326, 'Kavindi@gmail.com', 'Female', 'Arthritis specialist', 'Dr. Kavindi Abhisheka is a highly skilled rheumatology specialist with a passion for helping patients manage autoimmune diseases. With over 15 years of experience, she has a deep understanding of the complex nature of rheumatologic disorders and the latest treatments available. Dr. Kavindi Abhisheka is known for her compassionate and personalized approach, and she believes that a strong doctor-patient relationship is key to achieving the best possible outcomes. In her free time, she enjoys hiking and spending time with her family.', 'doc-3.png', '230', 'Rajapaksha Road', 'Kalaniya', 'fcea920f7412b5da7be0cf42b8c93759', 'Offline now');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) DEFAULT NULL,
  `Inquries` text,
  `date_Time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) DEFAULT NULL,
  `img` text,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` text,
  `product_id` text,
  `product_price` text,
  `product_quantity` text,
  `total` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_name`, `product_id`, `product_price`, `product_quantity`, `total`, `date`) VALUES
(5852, 1, 'Triphala', '2', '3000', '1', '3000', '2023-03-07 22:26:22'),
(893, 1, 'Neem', '5', '1500', '2', '3000', '2023-03-08 00:22:03'),
(893, 1, 'Triphala', '2', '3000', '1', '3000', '2023-03-08 00:22:03'),
(8962, 1, 'Brahmi', '1', '2500', '4', '10000', '2023-03-08 00:23:30'),
(8962, 1, 'Turmeric', '4', '2000', '1', '2000', '2023-03-08 00:23:30'),
(8690, 1, 'Triphala', '2', '3000', '1', '3000', '2023-03-08 02:30:27'),
(1872, 1, 'Brahmi', '1', '2500', '1', '2500', '2023-03-08 02:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `name` varchar(20) NOT NULL,
  `image` varchar(150) NOT NULL,
  `diseaseType` text NOT NULL,
  `price` int(11) NOT NULL,
  `info` text NOT NULL,
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`name`, `image`, `diseaseType`, `price`, `info`, `id`) VALUES
('Brahmi', 'Brahmi.jpeg', 'Cognitive impairment, memory loss, anxiety, depression, and related conditions', 2500, 'This herb is traditionally used to support cognitive function and promote mental clarity. It is believed to help reduce stress, anxiety, and depression, and may improve memory and concentration', 1),
('Triphala', 'Triphala.jpg', 'Digestive disorders, constipation, detoxification, and immune system support', 3000, 'This blend of three fruits (amla, haritaki, and bibhitaki) is often used as a digestive aid and to support overall health. It is believed to help regulate bowel movements, promote detoxification, and boost the immune system', 2),
('Ashwagandha', 'Ashwagandha.jpg', 'Anxiety, stress, fatigue, and related conditions', 3000, 'This Ayurvedic herb is commonly used to treat anxiety, stress, and fatigue. It is believed to help regulate the body\'s stress response, reduce inflammation, and improve brain function.\r\n\r\nTriphala: This blend of three fruits (amla, haritaki, and bibhitaki) is often used as a digestive aid and to support overall health. It is believed to help regulate bowel movements, promote detoxification, and boost the immune system', 3),
('Turmeric', 'Turmeric.jpg', 'immune system support, and digestive disorders', 2000, 'This bright yellow spice is a staple of Ayurvedic medicine and is commonly used to reduce inflammation, support the immune system, and promote digestive health. It is believed to have antioxidant and anti-inflammatory properties, and may be helpful for a wide range of conditions', 4),
('Neem', 'Neem.png', 'Skin disorders, oral health, and digestive disorders', 1500, 'This bitter herb is often used in Ayurvedic medicine as a natural remedy for skin disorders, such as acne, eczema, and psoriasis. It is also believed to have antibacterial and antifungal properties, and may be helpful for oral health and digestive disorders', 5),
('Shatavari', 'Shatavari.jpg', 'Women\'s health, hormonal imbalances, and related conditions', 2300, 'This Ayurvedic herb is traditionally used to support women\'s health, particularly during menopause and postpartum recovery. It is believed to have hormone-balancing effects and may help with symptoms such as hot flashes, mood swings, and vaginal dryness.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `send_order`
--

DROP TABLE IF EXISTS `send_order`;
CREATE TABLE IF NOT EXISTS `send_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `pCode` varchar(10) NOT NULL,
  `confirmation` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `send_order`
--

INSERT INTO `send_order` (`order_id`, `user_id`, `address`, `pCode`, `confirmation`) VALUES
(5852, 1, 'negombo,negombo', '123', 'delivered'),
(893, 1, 'negombo,negombo', '123', 'Pending'),
(8962, 1, 'negombo,negombo', '123', 'Pending'),
(8690, 1, 'negombo,negombo', '123', 'Pending'),
(1872, 1, 'negombo,negombo', '123', 'Pending');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
