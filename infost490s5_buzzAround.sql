-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2023 at 06:08 PM
-- Server version: 5.7.41-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infost490s5_buzzAround`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `fname` varchar(11) NOT NULL,
  `lname` varchar(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(11) NOT NULL,
  `contact_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `index` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`fname`, `lname`, `phone`, `email`, `contact_time`, `message`, `index`) VALUES
('test', 'test', '11111', 'test@test.c', '2023-04-03 00:21:30', '', 1),
('test2', 'test2', '11111', 'test2@test.', '2023-04-03 00:22:16', '', 2),
('test3', 'test3', 'test3', 'test3@test.', '2023-04-03 00:42:03', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `hours` varchar(255) NOT NULL,
  `popularity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `event_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name`, `event_type`, `about`, `address`, `hours`, `popularity`, `image`, `event_added`) VALUES
(1, 'Brothers Bar & Grill', 'Bar', 'Brothers is a modernized throwback to the old Midwestern corner tavern. A clean, relaxed social hangout; our bar stock-full of cold beer and drink with a kitchen in the back serving up comfortable American food fare. Food portions are large and juicy.', '1213 N Water St, Milwaukee, WI 53202', 'Mon-Fri 11am-2pm', 'High', 'brothers.jpg', '2023-03-08 13:05:29'),
(2, 'Red Rock Saloon', 'Bar', 'Red Rock reinvented the Saloon…we\'ve replaced yellow-belly bartenders and saloon dancers with the fastest drink slingers in the Midwest. Put it this way, if Clint Eastwood were passing through town, Red Rock Saloon is where he\'d tie up his horse and stop ', '1225 N Water St, Milwaukee, WI 53202', 'Wed-Fri 5PM-Bar Close Sat-Sun 12PM-Bar Close', 'Medium', '', '2023-03-08 13:29:00'),
(3, 'Duke\'s On Water', 'Bar', 'Sports bar located in the heart of downtown Milwaukee on the corner of Water and Juneau.', '158 E Juneau Ave, Milwaukee, WI 53202', 'Mon-Thurs 3pm-2am Fri-Sun 11am-2:30am', 'Low', '', '2023-03-08 13:29:00'),
(4, 'Mojo MKE', 'Bar', 'Indoor and outdoor bar located in the heart of downtown Milwaukee featuring a exotic style.', '134 E Juneau Ave, Milwaukee, Wi 53202', 'Mon-Fri 4pm-2am Sat-Sun 12pm-2am', 'High', 'mojo.jpg', '2023-03-08 13:29:00'),
(5, 'Trinity Three Irish Pubs\r\n', 'Bar', 'Milwaukee\'s best place to party located in the heart of downtown! ', '125 E Juneau Ave, Milwaukee, WI 53202', 'Wed-Sat 9pm-2am Sun-Mon Closed', 'High', 'trinitys.jpg', '2023-03-08 13:38:42'),
(6, 'Harp Irish Pub', 'Bar', 'Great patio on the river with food, drinks and live music on Sundays from May-October! Conveniently located across the river from the Fiserv Forum and a great patio for happy hours drinks with weekday specials! DJ’s and dance floor every Friday and Saturd', '113 E Juneau Ave, Milwaukee, WI 53202', 'Tue-Thurs 4pm - 1:30pm\r\nFri 2pm -2am\r\nSat and Sun 12pm - 2am', 'Medium', '', '2023-03-08 13:38:42'),
(7, 'McGillycuddy\'s', 'Bar', 'Located in Milwaukee, Wis., McGillycuddy\'s Bar and Restaurant is full-service bar. The bar offers a variety of local Micro-Brews as well as a wide selection of beer from Miller Brewing Company.', '1135 N Water St, Milwaukee, Wi 53202', 'Tues-Sun 3pm-Bar Close', 'Medium', '', '2023-03-08 13:45:55'),
(8, 'Pourman\'s', 'Bar', 'Small batch bourbons\r\nMade from scratch old fashions\r\nBambino - beer/shot/cigar\r\nHeated smoking lounge', '1127 N Water St, Milwaukee, WI 53202', 'Mon-Fri 6pm-2am Sat-Sun 3pm-Bar Close', 'Low', '', '2023-03-08 13:48:36'),
(9, 'Fat Tuesday', 'Bar', 'Get the Party Started! Home of the famous 190 Octane. Please drink responsibly. Tag us with #fattuesdays', '333 W Juneau Ave, Milwaukee, WI 53203', 'Everyday 11am-Midnight', 'Medium', '', '2023-03-08 13:51:15'),
(10, 'Oak Barrel Public House', 'Bar', 'Oak Barrel is an American Public House located in the heart of Downtown Milwaukee on historical Old World Third Street. Just blocks away from the new Bucks arena, Fiserv Forum, convention center and Milwaukee Theater Oak Barrel is walking distance from an', '1033 N MLK Dr, Milwaukee, WI 53203', 'Mon-Thurs 11:00 am-12:30 am\r\nFri 11:00 am-2:30 am\r\nSat 10:00 am-2:30 am\r\nSun 10:00 am - 12:30 am', 'Medium', '', '2023-03-08 13:54:23'),
(11, 'Milwaukee Bucks v.s. Chicago Bulls', 'Sports', 'Enjoy a Milwaukee Bucks home game with your friends, and family, or as a group event. The Milwaukee Bucks offer many ticket packages to allow you to find the best fit for you!', '1111 Vel R. Phillips Ave, Milwaukee, WI 53203', 'Wed Apr 5, 2023 6:30pm-9pm', 'High', 'BullsvsMilwaukee.jpg', '2023-03-08 16:11:07'),
(12, 'DREW LYNCH', 'Concert', 'Drew Lynch captured the hearts of America with his Golden Buzzer performance on Season 10 of America’s Got Talent, where he finished in second place. Since, Drew has appeared on IFC’s Maron and CONAN, and amassed over 2 million subscribers on Youtube.', '144 E. Wells Street, Milwaukee, WI 53202', 'Sat Apr 15, 2023 8pm', 'Medium', '', '2023-03-08 16:11:07'),
(13, 'MADAGASCAR THE MUSICAL', 'Musical', 'Join Alex, Marty, Melman and Gloria as they bound out of the zoo and onto the stage in this live musical spectacular. This smash hit musical features all of your favorite crack-a-lackin’ friends as they escape from their home in New York’s Central Park Zo', '116 W. Wisconsin Avenue, Milwaukee, WI 53203', 'Wed Apr 19, 2023 7pm', 'Low', '', '2023-03-08 16:23:39'),
(14, 'Morgan Wallen: One Night At A Time World Tour', 'Concert', 'Morgan Wallen performing his One Night At A Time Tour', 'American Family Field \r\nOne Brewers Way, \r\nMilwaukee, WI 53214', 'Sat Apr 15, 2023 4pm', 'High', 'mwnighttour.jpg', '2023-03-08 16:23:39'),
(15, 'The Soul II Soul Tour', 'Concert', 'Kem, Ledisi, and Musiq Soulchild perfrom their Soul II tour at the UW-Milwaukee Panther Arena.', '400 West Kilbourn, Milwaukee, WI 53203', 'Sat Apr 15, 2023 8pm', 'Medium', '', '2023-03-08 16:34:55'),
(16, 'Wiz Khalifa with Joey Bada$$, Berner, Smoke DZA, and Chevy Woods', 'Concert', 'Wiz Khalifa performing with Joey Bada$$, Berner, Smoke DZA, and Chevy Woods at the Rave Eagles Club.', '2401 W. Wisconsin Avenue Milwaukee, WI 53233', 'Sun Apr 16, 2023 7pm', 'High', 'ravewiz.jpg', '2023-03-08 16:34:55'),
(17, 'Camp Bar Third Ward', 'Bar', 'Camp Bar is urban camping with a Northwoods feel. Voted Best Old Fashioned, Best Atmosphere and Best Bloody Mary. 3 locations in Milwaukee, Wauwatosa and Shorewood.', '525 E Menomonee St, Milwaukee, WI 53202', 'Mon-Thu 3pm - 2am\r\nFri 2pm-2:30am\r\nSat & Sun Noon-Bar Close', 'Medium', '', '2023-03-08 16:44:37'),
(18, 'Headphone Happy Hour', 'Concert', 'Milwaukee\'s Only Headphone Happy Hour is the perfect way for the music eclectics to relax, pregame, and enjoy a variety of music, drinks, and food on Saturday to start your night.', '1111 N Doctor M.L.K. Jr Dr \r\nMilwaukee, WI 53203', 'Sat Apr 19, 2023 6pm-9pm', 'High', 'headphone.jpg', '2023-03-08 16:44:37'),
(19, 'Ben Mulwana Album Release Show', 'Concert', 'Ben Mulwana is a Ugandan-born using thought-provoking lyrics and a diverse range of musical inspiration. His music has been described as afro-soul rock that takes on a unique storytelling quality. The single features a full band composition, bringing a dy', '224 West Bruce Street Milwaukee, WI 53204', 'Fri Apr 28, 2023 8pm', 'Medium', '', '2023-03-08 16:49:25'),
(20, 'Friday Night DJ', 'Concert', 'Fridays at the Jackalope Lounj aren\'t the same without DJ Erich! No cover. Come play.', '345 North Broadway Milwaukee, WI 53202', 'Fri, Apr 21, 2023 10:30pm', 'Low', '', '2023-03-08 16:49:25'),
(21, 'Milwaukee Brewers VS Boston Red Socks', 'Sports', 'Presentation of MLB where the Milwaukee Brewers take on the Boston Red Socks at American Family Field.', 'One Brewers Way, Milwaukee, WI 53214', 'Fri Apr 21, 2023 8:10pm', 'Medium', '', '2023-03-08 17:00:20'),
(23, 'Brickworld Milwaukee 2023', 'Convention', 'LEGO Exposition with 32,000 square feet of spectacular creations all made of LEGO bricks, interactive activities and vendors.', '640 South 84th Street West Allis, WI 53214', 'Sat April 15th, 2023 10am-6pm', 'High', 'lego.jpg', '2023-03-08 17:09:57'),
(24, 'Milwaukee Film Festival', 'Convention', 'Milwaukee Film is a nonprofit arts organization dedicated to entertaining, educating, and engaging our community through cinematic experiences, with a vision to make Milwaukee a center for film culture.', '2230 North Farwell Avenue\r\nMilwaukee, WI 53202', 'Fri April 21st, 2023 9am-8pm', 'High', 'mkefilm.jpg', '2023-03-08 17:09:57'),
(25, 'Yheti in Milwaukee ', 'Concert', 'Come watch Yheti come perfrom at the Miramar Theatre on April 21, 2023.', '2844 N Oakland Ave, Milwaukee, WI 53211', 'Fri April 21, 2023 9pm', 'Low', '', '2023-03-08 17:13:24'),
(26, 'Test Event', 'Database Test', 'This is a test event to make sure the query works.', '1234 road', 'All day ', 'low', '', '2023-03-15 13:48:33'),
(27, 'Red White Blue MKE', 'Bar', 'RWB Milwaukee, located at 1044 N Old World 3rd St. has been one of Milwaukee’s favorite party destinations for nearly 20 years.', '1044 N OLD WORLD 3RD ST MILWAUKEE, WI 53203', 'THR 9PM-2AM FRI 8PM-230AM SAT 8PM-230AM', 'Medium', '', '2023-03-16 14:26:41'),
(28, 'April Fools', 'Convention', 'A joking holiday.', '1234 Fool Street', 'All day', 'Low', '', '2023-03-27 13:36:34'),
(29, '', 'Meetup', 'qwerty', '1234 Oak Ave', 'All Day', 'Low', '', '2023-04-03 13:19:55'),
(30, '', 'Bar', 'Party all day in Madsion Wi!', '124 Mifflin Street', 'All Day', 'Med', '', '2023-04-03 13:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `account_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `pass`, `account_type`, `dob`, `account_creation`) VALUES
(2, 'Taylor', 'Teasdale', 'taylorteasdale@gmail.com', 'teasdal3', 'user', '1996-06-08', '2023-03-06 16:43:17'),
(10, 'test', 'test', 'test@uwm.edu', 'test222', 'user', '2023-03-06', '2023-03-06 17:00:00'),
(16, 'Jay', 'Dieten', 'jdetien@uwm.edu', 'afafsdfsfd', 'user', '1111-11-11', '2023-03-06 17:02:06'),
(18, 'Paul', 'Thompson', 'phthompson@uww.edu', 'dhghfdklgdfghdfkg', 'user', '2000-05-08', '2023-03-06 17:04:31'),
(19, 'Ronnie', 'Coleman', 'lightweightbaby@lift.com', 'GoldsGym888!!', 'business', '1776-07-04', '2023-03-06 18:04:58'),
(20, 'Garvin', 'Volquardsen', 'volquar3@uwm.edu', 'test', 'user', '2023-03-08', '2023-03-08 12:48:56'),
(22, 'The ', 'Admin', 'admin@mail.com', 'theadmin', 'admin', '0001-01-01', '2023-03-08 13:26:49'),
(25, 'testtest', 'test', 'testt@uwm.edu', 'test', 'user', '2023-03-08', '2023-03-08 13:35:40'),
(27, 'Peter', 'McLane', 'pemclane@uwm.edu', 'LinuxMasterRace@', 'user', '2001-06-05', '2023-03-15 11:25:16'),
(28, 'tedd', 'teddy', 'teddy@teddy.com', 'Teddy12345@@@@', 'user', '1900-01-01', '2023-04-05 12:44:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`index`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
