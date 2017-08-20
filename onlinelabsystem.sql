-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 09:57 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinelabsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminactions`
--

CREATE TABLE IF NOT EXISTS `adminactions` (
  `actionId` int(10) NOT NULL,
  `actionName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminactions`
--

INSERT INTO `adminactions` (`actionId`, `actionName`) VALUES
(1, 'CREATE NEW PROBLEMS'),
(2, 'DELETE PROBLEMS'),
(3, 'UPDATE PROBLEMS'),
(4, 'ADD STUDENTS'),
(5, 'CHECK SUBMISSIONS'),
(6, 'GIVE CLARIFICATIONS'),
(7, 'SEE PROBLEMS');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_of_actions`
--

CREATE TABLE IF NOT EXISTS `attributes_of_actions` (
  `WHOSE` int(10) NOT NULL DEFAULT '0',
  `WHICH` int(10) NOT NULL DEFAULT '0',
  `ATTRIBUTES` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes_of_actions`
--

INSERT INTO `attributes_of_actions` (`WHOSE`, `WHICH`, `ATTRIBUTES`) VALUES
(1, 1, 'PROID'),
(1, 2, 'MEMLMT'),
(1, 3, 'TIMELMT'),
(1, 4, 'PRONAME'),
(1, 5, 'PRODES'),
(1, 6, 'PROINCON'),
(1, 7, 'PROOUTCON'),
(1, 8, 'PROINSAM'),
(1, 9, 'PROOUTSAM'),
(2, 1, 'PROID'),
(3, 1, 'PROID'),
(3, 2, 'MEMLMT'),
(3, 3, 'TIMELMT'),
(3, 4, 'PRONAME'),
(3, 5, 'PRODES'),
(3, 6, 'PROINCON'),
(3, 7, 'PROOUTCON'),
(3, 8, 'PROINSAM'),
(3, 10, 'PROOUTSAM'),
(4, 1, 'USERNAME'),
(4, 2, 'PASSWORD'),
(4, 3, 'STDNAME'),
(4, 4, 'USERTYPE');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE IF NOT EXISTS `problems` (
  `PROID` varchar(10) NOT NULL DEFAULT '',
  `MEMLMT` float DEFAULT NULL,
  `TIMELMT` float DEFAULT NULL,
  `PRONAME` varchar(60) DEFAULT NULL,
  `PRODES` text,
  `PROINCON` text,
  `PROOUTCON` text,
  `PROINSAM` text,
  `PROOUTSAM` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`PROID`, `MEMLMT`, `TIMELMT`, `PRONAME`, `PRODES`, `PROINCON`, `PROOUTCON`, `PROINSAM`, `PROOUTSAM`) VALUES
('1', 32, 2, 'Box Sorting', '<p>You are constantly getting threats from your mom to tidy up your desk. On top of your desk, there are lots and lots of cubic boxes of various sizes (You are a collector of boxes?!). Each box can contain one other box, which has size strictly smaller than itself. You have to put the boxes one inside of another in such a configuration that there are minimum number of boxes on the table.</p>', '<p>Input will start with the number of test cases, T (T <= 100). Following that will be the number of boxes, N (0 < N <= 100,000). The following N integers will denote the length of one side for each box, X (0 < X <= 2^30 ).</p>', '<p>For each test case, print one line of output, "Case Y: Z". Where Y is the number of test case and Z is the minimum number of boxes on the table.</p>', '2<br>5<br>1 5 4 2 3<br>2<br>5 5', 'Case 1: 1<br>Case 2: 2'),
('2', 32, 2, 'Monkey Banana Problem', '<p>You are in the world of mathematics to solve the great &quot;Monkey Banana Problem&quot;. It states that, a monkey enters into a diamond shaped two dimensional array and can jump in any of the adjacent cells <b>down</b> from its current position (see figure). While moving from one cell to another, the monkey eats all the bananas kept in that cell. The monkey enters into the array from the upper part and goes out through the lower part. Find the maximum number of bananas the monkey can eat.</p>  <p align=center style=''text-align:center''><span style=''color:red''><img src="images/monkey.png"></span></p>', '<p>Input starts with an integer <b>T (</b><b>&#8804; 50)</b>,denoting the number of test cases.</p><p>Every case starts with an integer <b>N (1 &#8804; N &#8804;100)</b>. It denotes that, there will be <b>2*N - 1</b> rows. The <b>i<sup>th</sup>(1 &#8804; i &#8804; N)</b> line of next <b>N</b> lines contains exactly <b>i</b>numbers. Then there will be <b>N - 1</b> lines. The <b>j<sup>th</sup> (1&#8804; j &lt; N)</b> line contains <b>N - j</b> integers. Each number isgreater than zero and less than <b>2<sup>15</sup></b>.</p>', '<p>For each case, print the case number and maximum number of\r\nbananas eaten by the monkey.</p>', '<p><span style=''font-size:12.0pt;font-family:"Courier New"''>2</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>4</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>7</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>6 4</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>2 5 10</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>9 8 12 2</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>2 12 7</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>8 2</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>10</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>2</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>1</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>2 3</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>1</span></p>', '<p><span style=''font-size:12.0pt;font-family:"Courier New"''>Case 1: 63</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>Case 2: 5</span></p>'),
('4', 64, 2, 'Box Sorting ii', '										<p>You are constantly getting threats from your mom to tidy up your desk. On top of your desk, there are lots and lots of cubic boxes of various sizes (You are a collector of boxes?!). Each box can contain one other box, which has size strictly smaller than itself. You have to put the boxes one inside of another in such a configuration that there are minimum number of boxes on the table.</p>', '<p>Input will start with the number of test cases, T (T <= 100). Following that will be the number of boxes, N (0 < N <= 100,000). The following N integers will denote the length of one side for each box, X (0 < X <= 2^30 ).</p>', '												<p>For each test case, print one line of output, "Case Y: Z". Where Y is the number of test case and Z is the minimum number of boxes on the table.</p>', '2<br>5<br>1 5 4 2 3<br>2<br>5 5', 'Case 1: 1<br>Case 2: 2'),
('5', 32, 2, 'Monkey Banana Problem III', '<p>You are in the world of mathematics to solve the great &quot;Monkey Banana Problem&quot;. It states that, a monkey enters into a diamond shaped two dimensional array and can jump in any of the adjacent cells <b>down</b> from its current position (see figure). While moving from one cell to another, the monkey eats all the bananas kept in that cell. The monkey enters into the array from the upper part and goes out through the lower part. Find the maximum number of bananas the monkey can eat.</p>  <p align=center style=''text-align:center''><span style=''color:red''><img src="images/monkey.png"></span></p>', '<p>Input starts with an integer <b>T (</b><b>&#8804; 50)</b>,denoting the number of test cases.</p><p>Every case starts with an integer <b>N (1 &#8804; N &#8804;100)</b>. It denotes that, there will be <b>2*N - 1</b> rows. The <b>i<sup>th</sup>(1 &#8804; i &#8804; N)</b> line of next <b>N</b> lines contains exactly <b>i</b>numbers. Then there will be <b>N - 1</b> lines. The <b>j<sup>th</sup> (1&#8804; j &lt; N)</b> line contains <b>N - j</b> integers. Each number isgreater than zero and less than <b>2<sup>15</sup></b>.</p>', '<p>For each case, print the case number and maximum number of\r\nbananas eaten by the monkey.</p>', '<p><span style=''font-size:12.0pt;font-family:"Courier New"''>2</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>4</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>7</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>6 4</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>2 5 10</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>9 8 12 2</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>2 12 7</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>8 2</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>10</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>2</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>1</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>2 3</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>1</span></p>', '<p><span style=''font-size:12.0pt;font-family:"Courier New"''>Case 1: 63</span></p> <p><span style=''font-size:12.0pt;font-family:"Courier New"''>Case 2: 5</span></p>'),
('6', 3232.02, 1.5, 'Monkey Banana Problem III', '<p>You are constantly getting threats from your mom to tidy up your desk. On top of your desk, there are lots and lots of cubic boxes of various sizes (You are a collector of boxes?!). Each box can contain one other box, which has size strictly smaller than itself. You have to put the boxes one inside of another in such a configuration that there are minimum number of boxes on the table.</p>', '<p>Input will start with the number of test cases, T (T <= 100). Following that will be the number of boxes, N (0 < N <= 100,000). The following N integers will denote the length of one side for each box, X (0 < X <= 2^30 ).</p>', '<p>For each test case, print one line of output, "Case Y: Z". Where Y is the number of test case and Z is the minimum number of boxes on the table.</p>', '2<br>5<br>1 5 4 2 3<br>2<br>5 5', 'Case 1: 1<br>Case 2: 2'),
('7', 32, 0.00000001, 'Hello Habib!!', 'Print a sentence to say Hello to the developer of the site of <b>online lab system</b>', 'No Input!! :)', 'Only "Hello Habib" in a line.', 'No Input.', '"Hello Habib"');

-- --------------------------------------------------------

--
-- Table structure for table `userpass`
--

CREATE TABLE IF NOT EXISTS `userpass` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `UserType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpass`
--

INSERT INTO `userpass` (`Username`, `Password`, `NAME`, `UserType`) VALUES
('123025', 'b3255c99872151bf6ac05160cfe11408', 'Asmaul Husna', 'admin'),
('123036', 'e10adc3949ba59abbe56e057f20f883e', 'Md. Munawar Hussain', 'user'),
('HabibRahman', '25f9e794323b453885f5181f1b624d0b', 'HABIBUR RAHMAN', 'admin'),
('habib_ruet', '25f9e794323b453885f5181f1b624d0b', 'HABIBUR RAHMAN', 'user'),
('mrx', '25f9e794323b453885f5181f1b624d0b', 'MR.X', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminactions`
--
ALTER TABLE `adminactions`
 ADD PRIMARY KEY (`actionId`);

--
-- Indexes for table `attributes_of_actions`
--
ALTER TABLE `attributes_of_actions`
 ADD PRIMARY KEY (`WHOSE`,`WHICH`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
 ADD PRIMARY KEY (`PROID`);

--
-- Indexes for table `userpass`
--
ALTER TABLE `userpass`
 ADD PRIMARY KEY (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
