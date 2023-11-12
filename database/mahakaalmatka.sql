-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 11:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahakaalmatka`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `abc`
-- (See below for the actual view)
--
CREATE TABLE `abc` (
`id` int(11)
,`description` text
,`status` enum('ACTIVE','INACTIVE')
);

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `title2` varchar(200) NOT NULL,
  `discription2` varchar(500) NOT NULL,
  `title3` varchar(200) NOT NULL,
  `discription3` varchar(500) NOT NULL,
  `title4` varchar(200) NOT NULL,
  `discription4` varchar(500) NOT NULL,
  `title5` varchar(200) NOT NULL,
  `discription5` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `discription`, `title2`, `discription2`, `title3`, `discription3`, `title4`, `discription4`, `title5`, `discription5`) VALUES
(3, 'INDIAN PEOPLE ARE CRAZY ABOUT SATTAMATKAa', 'This has been heard that Indian people are crazy about the SattaMatka. We have a team of expert who provides the expert with all the updates and facts that they want to know about the SattaMatka. Most the Indian people are crazy about this game as they find themselves very lucky and predictable for the games that can help them to win money.', 'SOME FUN FACTS ABOUT GENERAL INFORMATION ABOUT MATKA', 'The market of SattaMatka is growing rapidly among the youth and they are getting indulge in the game on a wider basis. It has been found that every individual person needs a proper mindset in order to get indulge in this game where betting is required. Some people do analyze the market so that they can get to the same from the charts. They refer to all kinds of the website where they can check the charts and these websites include Milan day, Milan night, Galisatta king, Kalyan matka Bazar, today', 'FUNDING SOURCE', 'SattaMatka is one of the significant sources of income for many people who are willing to earn cash prices. Playing as well as winning the game will contribute to increasing the income.', 'ACCURATE AND QUICK RESULTS', 'Reliable and immediate results that are worth playing the game. Our website helps you with all the results.', 'asdfasdf', 'asdfasdfsa');

-- --------------------------------------------------------

--
-- Table structure for table `bdescription`
--

CREATE TABLE `bdescription` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bdescription`
--

INSERT INTO `bdescription` (`id`, `description`, `status`) VALUES
(1, 'SATTA MATKA | SATTAMATKA | MATKA RESULT | KALYAN MATKA | SATTA MATKA.COM | KALYAN MATKA TIPS | DPBOSS | SATTA MATKA FAST RESULT | MATKA FIX AND | MATKA CHART | SATTA KING | MATKA GAME | MPBOSS | KUBER MATKA INDIA | SATTA MATKA JI | KAPIL SATTA MATKA GURU SATTAMATKA143 | MATKA WORLD | DELHI MATKA | KALYAN MATKA | FIX SATTA MATKA | SATTA MATKA MOBI ORG IN COM W2M R8ME MATKA CLUB CENTER WAPKA ME WEB | SPORT | SATTA MATKA HELP GOD WEB | GAMBLING STAR | SATTA KING | GALI NUMBER | SATTA GAME | SATTA MATKA REPORT | SATTA MATKA SOFTWARE | KALYAN MATKA | SATTAMATKA | DISAWAR SATTA | SATTAMATKA |SATTA KING SATTA | MATKA SITE | GALI SATTA | DISHAWER SATTA |TODAY FREE GAME | SATTA MARKET | GALI RESULT | DISHAWER GAME |MATKA NUMBER | FIX MATKA | SATTA KING SULTAN | SATTA MATKA | SATTA MATKA RESULTS | SATTA09 | SATTAMATKA | MATKA TIPS | FREE MATKA RESULT | KALYAN MATKA RESULTS | SATTA MATKA TRICK | MATKA', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(14) NOT NULL,
  `brand_name` varchar(128) DEFAULT NULL,
  `brand_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(14) NOT NULL,
  `cat_name` varchar(64) DEFAULT NULL,
  `cat_status` enum('ACTIVE','INACTIVE') DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id` int(11) NOT NULL,
  `market_id` int(20) NOT NULL,
  `open` time DEFAULT NULL,
  `close` time DEFAULT NULL,
  `jodi` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id`, `market_id`, `open`, `close`, `jodi`) VALUES
(11, 25, '13:00:00', '14:00:00', 0),
(12, 2, '13:10:00', '14:10:00', 0),
(13, 3, '14:15:00', '16:15:00', 0),
(14, 16, '15:15:00', '17:15:00', 0),
(15, 4, '16:30:00', '18:30:00', 0),
(16, 2, '16:30:00', '18:30:00', 0),
(17, 5, '21:05:00', '23:10:00', 0),
(18, 6, '21:10:00', '23:50:00', 0),
(19, 7, '21:35:00', '00:05:00', 0),
(20, 14, '21:30:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(14) NOT NULL,
  `color_name` varchar(64) DEFAULT NULL,
  `color_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `desclaimer`
--

CREATE TABLE `desclaimer` (
  `id` int(11) NOT NULL,
  `desclaimer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desclaimer`
--

INSERT INTO `desclaimer` (`id`, `desclaimer`) VALUES
(1, 'DISCLAIMER FOR ( SATTA-MATKA.COM ) :- Viewing Satta-Matka.Com Is Strictly At Your Own Risk ❋❋❋\nAll Content Contained On Website Is For informational Purposes only ❋❋❋  \nWe Are Not illegal Matka Gambling Operator and Bookie ❋❋❋\nWe Warn You Satta Matka Gambling in Your City/State/Country May be Banned or Illegal ❋❋❋\nSatta-Matka.Com Does Not Accept Responsibility For Any loss or Damage ❋❋❋\nWe  Will Help You Make Money or Recover Lost Money With Numerology Theory ❋❋❋\nIf You Doesn\'t Agree With Our \"Site Disclaimer\" ❋❋❋ Please Quit Our Site Right Now ❋❋❋ THANK YOU ❋❋❋DISCLAIMER FOR ( SATTA-MATKA.COM ) :- Viewing Satta-Matka.'),
(2, 'hell desclaimer');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`) VALUES
(2, 'Q1: What Is Satta Matka Game?', 'Ans: Have You Ever Heard Of SattaMatka Game? Here, We Are With A Basic Understanding Of Matka Game. It Is Considered A Gambling Game That Is Enjoyed By Many People Nowadays. This Is Considered As One Of The Fashionable Games That Have Been Played By The Youth Generally. It Is Not Only Popular In India But Across The World With The Name SattaMatka.', 'Active'),
(4, 'Q2: What is the history of Matka?', 'Ans: Matka game started 50 decades back by Ratan Khatri, when people used to place bets on opening as well as closing rates. Now, it is one of the attractive games for youth and players are winning through the best matka tips. Deep down the history of the matka game is very big which is not only difficult to understand but also complex one. ', 'Active'),
(5, 'Q3: What are the different types of Matkagames?', 'Ans: • Single: - Single type allows you to choose any number between 0-9. After selecting your number, you can play the game. •   Jodi/Pair: - Jodi is a Hindi word. You can select any Jodi number between 00-99 digits and play the game to win cash. •   Patti/Panna: -It is the result of some three digits that comes as a result of betting done by people. The smartest thing is that a 3-digit number is Patti but you can only make use of a limited 3-digit number altogether. ', 'Active'),
(6, 'Q4: How to win SattaMatka game?', 'Ans: SattaMatka game can be won by making perfect guess helps to win huge amount of money. Always remember that be practical and functional while playing Matka games. It is essential for the player to take wise decisions as the amount invested is totally dependent on the decision taken by the player. It’s the perfect time to learn quick tips and tricks for winning this game.', 'Active'),
(7, 'Q5: How to get expert guide for Sattamatka?', 'Ans: Our experts guide you in the market of SattaBazar with the best Matka tips. It is the perfect time to get good guidance and knowledge for understanding the KalyanMatka and Kalyan chart. We have resourceful people who can help you in getting a deep insight into the processes that will assist for successful gaming in the sattamatka game. Professional of our website guides you after preparing proper charts and figures so that they can provide the guidance to the players for the right steps.', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `user_id`, `full_name`, `comment`, `date`) VALUES
(17, 'U36', 'Adalweng12', 'hdfguuifdghfughfuhgfghfughfgg', '2022-05-02 13:28:42'),
(18, 'U36', 'Adalweng12', 'bjhvjjvjbvbvvbvbvbvbvvb', '2022-05-02 14:51:53'),
(19, 'U36', 'Adalweng12', 'fudyfuyfudfudyfudf', '2022-05-02 15:01:05'),
(20, 'U36', 'Adalweng12', 'fsdfjsdhfsdfsdfsdfsd', '2022-05-02 15:03:53'),
(21, 'U36', 'Adalweng12', 'vcvcvcvcvcvcv', '2022-05-02 15:03:59'),
(22, 'U36', 'Adalweng12', 'dvvbvcbvncbnvbcbcbc', '2022-05-02 15:39:21'),
(23, 'U36', 'Adalweng12', 'xcvcvcvcvcvcvcv', '2022-05-02 15:43:56'),
(24, 'U36', 'Adalweng12', 'Test', '2022-05-03 08:45:06'),
(25, 'U869', 'staff23', 'Test 1', '2022-05-09 10:16:29'),
(26, 'U869', 'staff23', 'Test 02', '2022-05-09 10:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `freetip`
--

CREATE TABLE `freetip` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `market_id` varchar(50) NOT NULL,
  `open` int(20) NOT NULL,
  `close` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freetip`
--

INSERT INTO `freetip` (`id`, `date`, `market_id`, `open`, `close`) VALUES
(2, '2022-03-02', '7', 151, 534),
(5, '2022-03-23', '1', 123, 456),
(6, '2022-03-29', '8', 456, 132);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(14) NOT NULL,
  `group_name` varchar(128) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guessing_pass`
--

CREATE TABLE `guessing_pass` (
  `id` int(11) NOT NULL,
  `pass` text NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guessing_pass`
--

INSERT INTO `guessing_pass` (`id`, `pass`, `status`) VALUES
(1, '\n26-3-2022<br>\nSridevi close patti 348 pass<br>\nSridevi close 5 pass<br>\nTime Bazar open patti 357 pass<br>\nTime Bazar open 5 pass<br>\nTime Bazar jodi 59 pass<br>\nMilan day close patti 238 pass<br>\nMilan day close 3 pass<br>\nKalyan open patti 130 pass<br>\nKalyan open 4 pass<br>\nKalyan single jodi 47 pass<br>\nKalyan close patti 278 pass<br>\nKalyan close 7 pass<br>\nMilan night open 7 pass<br>\nMilan night jodi 74 pass<br>\nMilan night close 4 pass<br>\nRajdhani night open patti 179 pass<br>\nRajdhani night open 7 pass<br>\nRajdhani night jodi 77 pass<br>\nMain Bazar open 6 pass<br>\nMain Bazar single jodi 64 pass<br>\nMain Bazar close patti 248 pass<br>\nMain Bazar close 4 pass<br>\nKalyan Night open 4 pass<br>\nKalyan Night close 7 pass<br>', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `kalyanachuk`
--

CREATE TABLE `kalyanachuk` (
  `id` int(20) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kalyanachuk`
--

INSERT INTO `kalyanachuk` (`id`, `description`, `status`) VALUES
(1, '!!! कल्याण अचूक सिंगके जोड़ी !!!', 'Active'),
(2, 'सिर्फ़ एक गेम बदलेगा आपकी जिंदगी', 'Active'),
(3, 'जो आज तक हमसे जुडा है वो सिर्फ़ एक बार में मालामाल हुआ है', 'Active'),
(4, 'आज कल्याण बाजार में सिंगल जोडी 2 पत्ती', 'Active'),
(5, 'सीधा मटका आफ़िस के मेनेजर से लीक [101% अचूक]', 'Active'),
(6, 'क्या आप भी सिर्फ़ एक दिन में अचूक जोडी खेलकर पूरा लोस कवर करके लखपती बनना चाहोगे', 'Active'),
(7, 'तो अभी एडवांस चार्ज देकर गेम लेकर माला माल हो जाओ', 'Active'),
(8, 'एडवांस चार्ज<br> VIP 1 दिन = 5500/-<br>VVIP मेंबरशिप 1 हफ़्ते = 7500/-<br>VIP 1 महीने गेम = 10500/-', 'Active'),
(9, 'एडवांस बुकिंग के बाद ही आपको रिजल्ट के 2 घंटे पहले कल्याण बाजार मे सिंगल जोडी 2 पत्ती आपके मोबाइल पर् SMS से देंगे', 'Active'),
(10, 'कॉल टाइम 9 बजे से 3 बजे तक', 'Active'),
(11, 'For Booking', 'Active'),
(12, 'ट्रायल मांगने वाले लोग काल ना करें', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `liveupdate`
--

CREATE TABLE `liveupdate` (
  `id` int(20) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liveupdate`
--

INSERT INTO `liveupdate` (`id`, `description`, `status`) VALUES
(1, '!!! कल्याण अचूक सिंगल जोड़ी और पट्टी !!!<br>\nसोमवार कल्याण जोड़ी और पट्टी पास<br>\nकल्याण { 358 } और { 66 } पास<br>\nMangalvaar ( मंगलवार ) 26/4/2022<br>\nकल्याण और मैंन बाजार डेट फ़िक्स सिंगल जोडी और पट्टी है<br>\n1 जोडी 2 पत्ती<br>\nजो की 101% पास होगी कल की तरह एडवांस फीस 5500/-<br>\nकॉल एडमिन सर<br>\n9898394402<br>\n9898394402<br>\nट्रायल मांगने वाले लोग कॉल ना करें<br>', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `liveupdatelist`
--

CREATE TABLE `liveupdatelist` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `market_id` int(200) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `date` date DEFAULT NULL,
  `day` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liveupdatelist`
--

INSERT INTO `liveupdatelist` (`id`, `user_id`, `user_type`, `market_id`, `status`, `date`, `day`) VALUES
(2, 'U36', 'Admin', 1, 'Active', NULL, ''),
(3, 'U36', 'Admin', 1, 'Active', '2022-05-03', 'TUE');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` int(20) NOT NULL,
  `market_name` varchar(200) NOT NULL,
  `jodi_chart_url` varchar(200) DEFAULT NULL,
  `panel_chart_url` varchar(200) DEFAULT NULL,
  `result_open_start_time` time DEFAULT NULL,
  `result_open_end_time` time DEFAULT NULL,
  `result_close_start_time` time DEFAULT NULL,
  `result_close_end_time` time DEFAULT NULL,
  `result_display_start_time` time NOT NULL,
  `result_display_end_time` time NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `market_name`, `jodi_chart_url`, `panel_chart_url`, `result_open_start_time`, `result_open_end_time`, `result_close_start_time`, `result_close_end_time`, `result_display_start_time`, `result_display_end_time`, `status`) VALUES
(25, 'TIME BAZAR', 'time-bazar-matka-chart', 'time-bazar-matka-panel-chart-pana-chart-patti-chart', '15:26:00', '15:28:00', '14:00:00', '14:30:00', '13:00:00', '14:00:00', 'Active'),
(26, 'KALYAN', 'kalyan-matka-jodi-chart', 'kalyan-matka-panel-chart-pana-chart-patti-chart', '15:28:00', '15:41:00', '16:30:00', '16:40:00', '16:28:00', '18:31:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `market_assign`
--

CREATE TABLE `market_assign` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `market_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `market_assign`
--

INSERT INTO `market_assign` (`id`, `user_id`, `market_id`, `status`, `created_at`) VALUES
(1, 'U847', 26, 'Active', '2022-07-09 09:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `mdescription`
--

CREATE TABLE `mdescription` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mdescription`
--

INSERT INTO `mdescription` (`id`, `description`, `status`) VALUES
(1, 'WORLD\'S FIRST MATKA SITE SATTA-MATKA.COM IS PROVIDING RELIABLE INDIAN MATKA SATTA MATKA FREE GAME KALYAN MATKA TIPS MATKA TIPS MATKA RESULT SATTA MATKA GUESSING MATKA CHART MUMBAI MATKA DPBOSS KAPIL MATKA.', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(14) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `comment_id` varchar(64) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `note_image` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime` varchar(128) DEFAULT NULL,
  `notification_status` enum('seen','unseen') NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `image` varchar(20) NOT NULL,
  `text` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `image`, `text`, `status`) VALUES
(1, 'dummy1.jpg', 'sdfsdfgskd.fsdgfsbvs1010', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `packegelist`
--

CREATE TABLE `packegelist` (
  `id` int(11) NOT NULL,
  `packege_id` varchar(20) NOT NULL,
  `cost` int(30) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packegelist`
--

INSERT INTO `packegelist` (`id`, `packege_id`, `cost`, `status`) VALUES
(7, '10', 5500, 'Active'),
(8, '11', 10500, 'Active'),
(9, '12', 25000, 'Active'),
(10, '13', 50000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `packeges`
--

CREATE TABLE `packeges` (
  `id` int(11) NOT NULL,
  `packege_name` varchar(150) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packeges`
--

INSERT INTO `packeges` (`id`, `packege_name`, `status`) VALUES
(10, 'WEEKLY FEES', 'Active'),
(11, 'MONTHLY FEES', 'Active'),
(12, '3 MONTH FEES', 'Active'),
(13, 'PERMANENT', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `popularity`
--

CREATE TABLE `popularity` (
  `id` int(11) NOT NULL,
  `title1` text NOT NULL,
  `discription1` text NOT NULL,
  `title2` text NOT NULL,
  `discription2` text NOT NULL,
  `title3` text NOT NULL,
  `discription3` text NOT NULL,
  `title4` text NOT NULL,
  `discription4` text NOT NULL,
  `title5` text NOT NULL,
  `discription5` text NOT NULL,
  `title6` text NOT NULL,
  `discription6` text NOT NULL,
  `title7` text NOT NULL,
  `discription7` text NOT NULL,
  `title8` text NOT NULL,
  `discription8` text NOT NULL,
  `title9` text NOT NULL,
  `discription9` text NOT NULL,
  `title10` text NOT NULL,
  `discription10` text NOT NULL,
  `title11` text NOT NULL,
  `discription11` text NOT NULL,
  `title12` text NOT NULL,
  `discription12` text NOT NULL,
  `title13` text NOT NULL,
  `discription13` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `popularity`
--

INSERT INTO `popularity` (`id`, `title1`, `discription1`, `title2`, `discription2`, `title3`, `discription3`, `title4`, `discription4`, `title5`, `discription5`, `title6`, `discription6`, `title7`, `discription7`, `title8`, `discription8`, `title9`, `discription9`, `title10`, `discription10`, `title11`, `discription11`, `title12`, `discription12`, `title13`, `discription13`) VALUES
(3, 'POPULARITY OF SATTAMATKA', 'Nowadays, the popularity of SatttaMatka is an increase because people are investing their amount to get money by playing simple games like Kalyan Matka. It all depends on the tricks you use and how you make money faster.\n\nSattamtaka website is here to guide you further with the amazing tricks and tactics that can assist you to win and enjoy the game. It’s time to try your luck with us.', 'ONLINE MATKA', 'Do you know the fact that the Matka game is played online? Yes, our website can assist you in playing online Matka games by putting in genuine efforts. In order to play this Matka game online, all you have to do is just a few clicks on our website.\n\nIn order to play this online Matka game, the player needs to pay full attention or focus on their gameplay as this game requires proper attention of the player on the moves and selection through this, they can win the game. There is also the possibility that they might not win as this game involves a wide range of risks.\n\nVisiting the online website for the game will help you in reducing the chances of the risk as you will get the proper assistance from the experts who will guide you for the right investment of money. Also, professional experts will teach you how to earn money but starting with the smaller amount and then reaching the highest amount. The best benefit of this app is that you don’t have to visit any place to play this game as all you have to do is focus on the game and you can do the same from home.\n\nWhile playing online matka through websites you have to ensure that you are reading the terms and conditions properly without any miss as this will help you. All you have to do while playing online matka is to be proactive while trusting any website.', 'IMPROVE YOUR KNOWLEDGE IN SATTA MARKET', 'Any person who is interested in playing Satta wants to learn the ways through which they can improve their knowledge about this game. The first and foremost thing that any person needs to do is to remember the rules of the games. However, most of the person forget the same and get carried away to try their luck for earning money.\n\nPerfect knowledge about the tricks and tips are required which can be used by the people while playing online satta. In order to improve the knowledge for the satta market or satta game, there is a need to follow some matka guessing that are presented below: -\n\nAlways take the advice from the experienced player who has gained money in the market and also faced loss. This helps to learn about the market and contribute to attaining success by winning money.\nPersonshould know about the difference between fake websites and original websites as this can decide whether you will get good money or not. This difference can be identified when the person is experience and beginner might not be able to analyse the same.\nhttps://satta-matka.com is one of the well-known websites in the market with more than 100 professionals who are working with them.\nSattamatka promises for the different games which include Kalyan matka, milanmatka, Rajdhani matka, Milan matka and Delhi games. Try these games and get experience and knowledge about sattamatka games.\nAll the persons who are interested in Satta market should learn some tricks like accurate guessing, studying different tricks, and keeping all updates. It is essential for the player to focus more on the blogs and articles that can give the right information.', 'WHAT ARE KALYANMATKA AND ITS TIPS?', 'Kalyan sattamatka was started in the year 1950 around when people used to bet on the prices of cotton. These prices include the opening and closing prices of cotton. This practice was continued and it was able to make its way to the Bombay cotton exchange starting from the New York cotton exchange. However, later on, this practice was stopped by the New York Cotton exchange in 1961 but the people were addicted to this practice and they continued this practice. The gamblers continue this practice by making use of the piece of paper and this is how it is still continued. Kalyan SattaMatka is still continued and its growth into the market where people are investing and earning a huge amount. Many people are interested in this type of gambling because they have the motive to earn maximum money from the website.\n\nWhile playing KalyanMatkait is essential to focus and learn a fewmatka tips related to matka guessing. Sattamatka’s website is here to help you with tips through experts. Our website helps you out with all sort of queries and provide reliable details. If you are engaged in the Satta market or willing to engage then you don’t have to worry, we are here for the guidance. Visit our website now for the details related to the satta market and also suggestions that can make you win.\n\nNot only this, our website has a wide range of features which include proper learning and guidance for the Kalyan chart, Kalyan panel chart, Kalyan results, and others.', 'VISIT OUR WEBSITE FOR SATTAMATKA RESULTS', 'Playing SattaMatka online makes you visit the online website which is getting popular nowadays. Our website works with the aim to provide an effective gaming experience to the customers. Here we are with our website, you can trust our guidance to learn playing the game, and also our website promotes players. You can easily visit our website and get information on investing at the right place. Get the good Matka experience and recommend it to everyone from beginners to adults. SattaMatka chart reflects the live results across the markets.', 'WHAT IS SATTAMATKA GAME STRATEGY?', 'Entertainment is possible through SattaMatka game as it allows you to keep things in mind and play games. People allow you to enjoy some benefits such as big prizes and endless fun by investing their money. It’s the perfect time to try your luck now and get the chance to be rich. In order to play this game, the first and foremost strategy is to play Matka through a smartphone or device that is considered as the basic element that is required.\n\nEvery person has their own strategy for playing the game and it provides the support for the opportunities in order to pick the small amount and also to begin the game. Don’t begin the game with a big amount as there might be adverse chances. One of the strategies is to check the Matka number today and win someday as it provides accurate results. Satta is a very popular game and SattaMatka is the best website that allows guidance for the different types of Kalyan SattaMatka, Matka tips, and guessing.', 'HOW TO USE THIS GAME?', 'New beginners, we are here to help you with this information about the SattaMatka game as we know that you might wonder how to play this game. It is very easy to play this game as all you have to do is understand the basic rules. The game will begin when the people will see the slips with the numbers. Among all the slips, only one distinct number is guaranteed to be the winner of the lottery. The slip includes the numbers from the range of 00 to 99 and now players get the chance to select one. If one has the luck then the number will be the winner of the lottery. In the end, the winners of the lottery will be considered as the queens and kings of this game. This is a win of all the amount invested by the people.\n\nOur website helps you with all the basic instructions of the game so that you get the proper guidance. Also, our professional and experienced experts can assist you further with the instructions that can be used by you for the best play. It is considered as one of the best and most popular places where they can play the sattamatka games.\n', 'WHAT SHOULD YOU KNOW BEFORE PLAYING SATTAMATKA GAMES?', 'In the satta market, it is essential for you to become aware of some of the elements before playing sattamatka games. Here, our website has some specialist that generally covers all types of sattamatka games. It includes kalyanmatka, satta batta, kalyan chart and panel and also results of sattamatka. In the world of the internet, people are searching about sattamatka on Google so that they can get a wide range of information from the websites that can be in the form of news, article information, and others. Before playing the games in the market, it is essential for you to understand that you are playing in a safe and secure environment. Also, make sure you are dealing with people who are trustworthy and can be reliable for any decisions.\n\n', 'IS ONLINE SATTA PLAYING IS A GOOD CHOICE?', 'Most of you want to know the fact that online playing is a good choice or not. If you are an existing or new player then too Satta playing is considered as one of the good choices as you can easily enjoy satta game by staying at your home. It is convenient enough to be at home and play at your home. Also, you don’t have to visit any place for playing different games. Our website is good enough for you to enjoy this game and if in case there are any questions or problems then you can get the revert from the customer representatives. We provide the way through which you can easily chat with our customer service representative and they will give you advice or help you further. Satta Playing is one of the best choices for anyone who wants convenience as well as variety.\n\n', 'WHICH IS THE BEST ONLINE WEBSITE TO PLAY SATTAMATKA?', 'This is the most frequent question which is asked by the people.https://satta-matka.com/ is the best website for the online Sattamatka as we work with the motive to provide information related to the Indian lottery system. Also, this platform is designed in a way that you can connect with the people who are likely to bet on the lotteries, collect the winnings and enjoy the game. The interface of the website is good which allows the players to easily access the website. Also, this is one of the trustworthy websites so that you can rely on the website for depositing Matka amount and also for winning the amount. Considering the recent trends this will be difficult for you to decide which website to choose or not. Thus, you can try our website service and then trust us for the different types of SattaMatka, Kalyan Matka and others.\n\n', 'WHAT IS THE MINIMUM DEPOSIT AMOUNT TO PLAY SATTAMATKA ONLINE?', 'Some of you might want to know about the amount you should deposit in the initial phase of the gaming. Definitely, the new players should know the amount that they have to deposit in Sattamatka online game. The minimum despite amount is approximately Rs. 100 to Rs. 500. Once they deposit their amount then they can bet on any market they want. Online Satta requires a person to open the account so that they can start with the gameplay but in that account, they have 500 deposit Matka or with the small amount that can be 100 deposit matka.\n\nIt is essential to take precautions whenever you deposit an amount as it can lead to the high risk of losing money for the entire amount that has been deposited by you in the account. However, if you are an experienced player or taking guidance from an experienced website or person then you can deposit more amount in order to play this game. Also, if any person wants to try luck and have less amount then they can invest less amount in starting but can get amount quickly.', 'WHERE TO GET THE FASTEST SATTAMATKA RESULTS?', 'Every individual person who waits to see the results of SattaMatka wants the fastest results. SattaMatka is the fastest live updates are available on the websites. The fastest result will lead to the feeling of satisfaction that can help the player to make the decision whether they want to play further or want to quit playing it. Also, the king or queen of the Matka game will get to know whether they are winning the prices or not.\n\n', 'IS THE SATTAMATKA GAME LEGAL IN INDIA?', 'Satta is one kind of game that is played among two or more individuals. As far as now, betting is not legal in India and there are restrictions on it but talking about the correct information about this aspect on our websites.\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(14) NOT NULL,
  `pro_id` varchar(64) DEFAULT NULL,
  `cat_id` int(14) DEFAULT NULL,
  `subcat_id` int(14) DEFAULT NULL,
  `brand_id` int(14) DEFAULT NULL,
  `pro_sku` varchar(64) DEFAULT NULL,
  `pro_name` varchar(256) DEFAULT NULL,
  `pro_price` varchar(64) DEFAULT NULL,
  `selling_price` varchar(64) DEFAULT NULL,
  `discount` varchar(64) DEFAULT NULL,
  `discount_starts` varchar(64) DEFAULT NULL,
  `discount_end` varchar(64) DEFAULT NULL,
  `pro_image` varchar(64) DEFAULT NULL,
  `pro_image1` varchar(128) DEFAULT NULL,
  `pro_image2` varchar(128) DEFAULT NULL,
  `pro_image3` varchar(128) DEFAULT NULL,
  `pro_summery` varchar(512) DEFAULT NULL,
  `pro_details` varchar(1024) DEFAULT NULL,
  `quantity` varchar(64) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(14) NOT NULL,
  `pro_id` varchar(64) DEFAULT NULL,
  `color_id` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(14) NOT NULL,
  `pro_id` varchar(128) DEFAULT NULL,
  `img_url` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(14) NOT NULL,
  `pro_id` varchar(64) DEFAULT NULL,
  `size_id` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `market_id` int(200) NOT NULL,
  `result_open` int(3) NOT NULL,
  `result_close` varchar(3) NOT NULL,
  `result_no` int(100) NOT NULL,
  `full_result` varchar(500) DEFAULT NULL,
  `resultopn_no` int(2) DEFAULT NULL,
  `resultcls_no` int(2) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `day` varchar(20) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `user_type`, `market_id`, `result_open`, `result_close`, `result_no`, `full_result`, `resultopn_no`, `resultcls_no`, `status`, `day`, `date`) VALUES
(114, 'U36', 'Admin', 25, 123, '236', 61, '123-61-236', NULL, NULL, 'Active', 'THU', '0000-00-00 00:00:00'),
(116, 'U847', 'User', 26, 343, '434', 1, '343-01-434', NULL, NULL, 'Active', 'THU', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitelogo` varchar(128) DEFAULT NULL,
  `sitetitle` varchar(256) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `copyright` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `currency` varchar(128) DEFAULT NULL,
  `symbol` varchar(64) DEFAULT NULL,
  `system_email` varchar(128) DEFAULT NULL,
  `facebook` varchar(500) DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `g_plus` text DEFAULT NULL,
  `youtube` text DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `meta_data` text DEFAULT NULL,
  `meta_key` varchar(255) NOT NULL,
  `copy_right` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitelogo`, `sitetitle`, `description`, `copyright`, `contact`, `currency`, `symbol`, `system_email`, `facebook`, `twitter`, `g_plus`, `youtube`, `address`, `meta_data`, `meta_key`, `copy_right`) VALUES
(1, 'sattamatkalogo.png', 'SATTA MATKA | SATTAMATKA | MATKA | KALYAN MATKA | DPBOSS', 'satta, matka, satta matka, kuber matka, kalyan matka tips, free matka world, satta number, dpboss, fix matka result, gali satta number, satta king, sattamatka.com.', 'madCoderz', '09898394402', 'USD', '$', 'hello@demo.com', 'https://www.facebook.com/', 'https://twitter.com/?lang=en', 'https://twitter.com/?lang=en', 'https://www.youtube.com/', 'Makon lake view 3234', 'satta-mataka', 'SATTA MATKA, MATKA RESULT, KALYAN MATKA, KALYAN MATKA TIPS, MATKA CHART, MUMBAI MATKA , DPBOSS', ' SATTA-MATKA.COM<br> ALL RIGHTS RESERVED (2000-2022)');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(14) NOT NULL,
  `size_name` varchar(64) DEFAULT NULL,
  `size_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `social_link`
--

CREATE TABLE `social_link` (
  `id` int(14) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `twitter` varchar(256) DEFAULT NULL,
  `google_plus` varchar(256) DEFAULT NULL,
  `skype` varchar(256) DEFAULT NULL,
  `flicker` varchar(256) DEFAULT NULL,
  `youtube` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `subcat_id` int(14) NOT NULL,
  `cat_id` int(14) DEFAULT NULL,
  `subcat_name` varchar(64) DEFAULT NULL,
  `subcat_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `to_do_list`
--

CREATE TABLE `to_do_list` (
  `id` int(14) NOT NULL,
  `user_id` varchar(64) DEFAULT NULL,
  `to_dodata` varchar(256) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL,
  `value` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(14) NOT NULL,
  `user_id` varchar(64) DEFAULT NULL,
  `full_name` varchar(128) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `ip_address` varchar(512) DEFAULT NULL,
  `forgotten_code` varchar(512) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `dob` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL DEFAULT 'MALE',
  `country` varchar(128) DEFAULT NULL,
  `created_on` varchar(128) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `user_type` enum('User','Admin','Staff') NOT NULL DEFAULT 'User',
  `confirm_code` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `full_name`, `email`, `password`, `ip_address`, `forgotten_code`, `address`, `dob`, `image`, `contact`, `gender`, `country`, `created_on`, `status`, `user_type`, `confirm_code`) VALUES
(10, 'U36', 'Adalweng12', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '::1', 'bfc958008879d88d8075e76e188e44ee', 'Altstadt, 06108 Halle (Saale), Germany', '15/05/1992', 'U362.jpg', '08333533545', 'MALE', 'Germany', '10/27/2017', 'ACTIVE', 'Admin', '1660'),
(12, 'U691', 'example1', 'example@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL, NULL, 'U691.jpg', '1122334455', '', NULL, '2022-02-24', 'ACTIVE', 'User', NULL),
(13, 'U869', 'staff23', 'staff@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, 'at post tumsar', '2022-03-15', 'U869.jpg', '80800888888', '', 'INDIA', '2022-03-22', 'ACTIVE', 'Staff', NULL),
(17, 'U870', 'staff1334', 'staff1@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, NULL, 'at post tumsar', '2022-03-15', 'U869.jpg', '80800888888', '', 'INDIA', '2022-03-22', 'ACTIVE', 'Staff', NULL),
(18, 'U847', 'example2', 'example2@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL, NULL, 'U8471.jpg', '111212112145545455', '', NULL, '2022-03-25', 'ACTIVE', 'User', NULL),
(19, 'U808', 'staff2', 'staff2@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, NULL, 'at post tumsar', NULL, 'U808.jpg', '13131321231', '', NULL, '2022-03-25', 'ACTIVE', 'Staff', NULL),
(20, 'U622', 'demouser', 'demouser@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL, NULL, 'U6226.jpg', '2222222221', '', NULL, '2022-03-26', 'ACTIVE', 'User', NULL),
(21, 'U355', 'param', 'param@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '::1', NULL, NULL, NULL, 'U3551.jpg', '1313132123131', '', NULL, '03/26/2022', 'INACTIVE', 'User', '490133695'),
(29, 'U822', 'registration', 'registration@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL, NULL, 'U8221.jpg', '02020202020', '', NULL, '2022-04-28', 'ACTIVE', 'User', NULL),
(30, 'U796', 'registration1221', 'registration1221@gmail.com', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', NULL, NULL, NULL, NULL, 'U796.jpg', '7878787878', '', NULL, '2022-04-28', 'ACTIVE', 'User', NULL),
(31, 'U857', 'registration5555', 'registration5555@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, 'tumsar', NULL, 'U8571.jpg', '7878787878', '', NULL, '2022-04-28', 'ACTIVE', 'User', NULL),
(32, 'U733', 'registration5555', 'registration555510@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, NULL, 'tumsar', NULL, 'U733.jpg', '7878787878', '', NULL, '2022-04-28', 'ACTIVE', 'User', NULL),
(33, 'U959', 'registration5555', 'registration55551011@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, NULL, 'tumsar', NULL, 'U959.jpg', '7878787878', '', NULL, '2022-04-28', 'ACTIVE', 'User', NULL),
(34, 'U740', 'akabar', 'akabar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, 'mohadi', NULL, NULL, '2511053053', 'MALE', NULL, '2022-04-28', 'ACTIVE', 'User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(14) NOT NULL,
  `user_id` varchar(128) DEFAULT NULL,
  `group_id` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp_img`
--

CREATE TABLE `whatsapp_img` (
  `id` int(11) NOT NULL,
  `image` varchar(20) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `whatsapp_img`
--

INSERT INTO `whatsapp_img` (`id`, `image`, `status`, `date`) VALUES
(9, 'whatsapp1.jpeg', 'Active', '2022-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wiki`
--

INSERT INTO `wiki` (`id`, `description`) VALUES
(1, 'Satta-Matka.Com Is No 1 Of Satta Gambling That People Used To Play Physically And Online Matka, But Now It Has Been Converted Satta Bazar Online And Everyone Can Access This Matka Game, Matka Tips Today And Play For The Win Satta Batta. The Basic Reason For Playing This Satta Matka Tips Is To Make Money In A Short Time. The Person Who Wins The Kalyan Matka Game Gets All The Money And It Is A Huge Amount. Usually, The Amount Of Winning Depends On The Investment Of The Other People. If You Are Playing Big Amount Fix Satta Matka, Then You Will Have To Invest Large Amount And The Winner Will Get A Huge Amount. So It Depends On The Investor. We Also Provide Fastest Matka Result, Matka Chart, Free Matka Game So All Satta Master Can Become Satta King And We Are Always Here To Give You Kalyan Matka, Mumbai Matka Milan Day/Night, Rajdhani Day/Night And Time Bazar Matka Tips For Big Profit');

-- --------------------------------------------------------

--
-- Structure for view `abc`
--
DROP TABLE IF EXISTS `abc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `abc`  AS SELECT `bdescription`.`id` AS `id`, `bdescription`.`description` AS `description`, `bdescription`.`status` AS `status` FROM `bdescription``bdescription`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bdescription`
--
ALTER TABLE `bdescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `desclaimer`
--
ALTER TABLE `desclaimer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freetip`
--
ALTER TABLE `freetip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guessing_pass`
--
ALTER TABLE `guessing_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kalyanachuk`
--
ALTER TABLE `kalyanachuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liveupdate`
--
ALTER TABLE `liveupdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liveupdatelist`
--
ALTER TABLE `liveupdatelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market_assign`
--
ALTER TABLE `market_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mdescription`
--
ALTER TABLE `mdescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packegelist`
--
ALTER TABLE `packegelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packeges`
--
ALTER TABLE `packeges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popularity`
--
ALTER TABLE `popularity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `social_link`
--
ALTER TABLE `social_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `to_do_list`
--
ALTER TABLE `to_do_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whatsapp_img`
--
ALTER TABLE `whatsapp_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bdescription`
--
ALTER TABLE `bdescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `desclaimer`
--
ALTER TABLE `desclaimer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `freetip`
--
ALTER TABLE `freetip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guessing_pass`
--
ALTER TABLE `guessing_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kalyanachuk`
--
ALTER TABLE `kalyanachuk`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `liveupdate`
--
ALTER TABLE `liveupdate`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `liveupdatelist`
--
ALTER TABLE `liveupdatelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `market_assign`
--
ALTER TABLE `market_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mdescription`
--
ALTER TABLE `mdescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packegelist`
--
ALTER TABLE `packegelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `packeges`
--
ALTER TABLE `packeges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `popularity`
--
ALTER TABLE `popularity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_link`
--
ALTER TABLE `social_link`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `subcat_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `whatsapp_img`
--
ALTER TABLE `whatsapp_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
