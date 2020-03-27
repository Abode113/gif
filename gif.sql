-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 06:43 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gif`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gif` varchar(1000) NOT NULL,
  `title` varchar(200) NOT NULL,
  `source` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `gif`, `title`, `source`) VALUES
(21, 1, 'https://media1.giphy.com/media/WXB88TeARFVvi/200_d.gif?cid=4a6fbf980995cbefd206a10ff4897606ae55092008ff755e&rid=200_d.gif', 'dance party cat GIF', 'https://allinonefun.tumblr.com/post/64576645275/all-in-one-fun-dancing-cat'),
(23, 1, 'https://media3.giphy.com/media/mIMsLsQTJzAn6/200_d.gif?cid=4a6fbf989f555d3caa727534253f6e93451b2ab1b4bbf594&rid=200_d.gif', 'driving the muppets GIF', 'https://gifsgallery.com/drive+fast+gif'),
(24, 1, 'https://media3.giphy.com/media/qlfV3IKuyiry8/200_d.gif?cid=4a6fbf989f555d3caa727534253f6e93451b2ab1b4bbf594&rid=200_d.gif', 'angry video games GIF', 'https://gif-database.tumblr.com/post/20096167948'),
(25, 1, 'https://media2.giphy.com/media/mUudzD64JmfO8/200_d.gif?cid=4a6fbf98e366b6c8c060b5fb5de2dacd5ce9c7296d64d4cd&rid=200_d.gif', 'fritz lang GIF', 'https://www.reddit.com/r/Cinemagraphs/comments/1ihqln/fritz_lang/'),
(26, 1, 'https://media2.giphy.com/media/ZkAT3yRf0CMcE/200_d.gif?cid=4a6fbf98cb45638d22701e225c8151902254cdd5f2a2469c&rid=200_d.gif', 'game boy play GIF', 'https://wifflegif.com'),
(27, 1, 'https://media1.giphy.com/media/puxHAULAdUuly/200_d.gif?cid=4a6fbf98cb45638d22701e225c8151902254cdd5f2a2469c&rid=200_d.gif', 'play dancing GIF', 'https://www.reddit.com/r/gifs/comments/3jrmnb/peanuts_play_dodgeball_please_dont_sue_me/'),
(28, 1, 'https://media2.giphy.com/media/1ieIhzn7Q661W/200_d.gif?cid=4a6fbf9897b2cf07c871de7054e3a563efda6ce557f58107&rid=200_d.gif', 'finals GIF', 'https://www.reddit.com/r/gifs/comments/24era2/my_favorite_game_during_finals_week/'),
(29, 1, 'https://media1.giphy.com/media/NYBVJUGdiJdG8/200_d.gif?cid=4a6fbf9897b2cf07c871de7054e3a563efda6ce557f58107&rid=200_d.gif', 'sculptured software monopoly GIF', 'https://brotherbrain.tumblr.com/post/57975402007/monopoly-nes-sculptured-software-1991-gif'),
(30, 1, 'https://media1.giphy.com/media/VwM9w72cXiSHu/200_d.gif?cid=4a6fbf9897b2cf07c871de7054e3a563efda6ce557f58107&rid=200_d.gif', 'nintendo GIF', 'https://lesumirecastles.tumblr.com/post/38584736526'),
(31, 1, 'https://media0.giphy.com/media/1Mz9UUNNFDNUQ/200_d.gif?cid=4a6fbf9808600c160b239d4d78618707c6a0b043414f32d1&rid=200_d.gif', 'water pushing GIF', 'https://www.reddit.com/r/gifs/comments/1unyml/brothers/'),
(32, 1, 'https://media1.giphy.com/media/3og0IEYjzJ1Ruqe0QU/200_d.gif?cid=4a6fbf9808600c160b239d4d78618707c6a0b043414f32d1&rid=200_d.gif', 'apes movie #warfortheplanet GIF by War for the Planet of the Apes', ''),
(33, 1, 'https://media3.giphy.com/media/WOwiryOPA0G6jhKqB0/200_d.gif?cid=4a6fbf9842189937a78085064ba1698d082ac986d75112a8&rid=200_d.gif', 'Valentines Day Love GIF by BREAD TREE', ''),
(34, 1, 'https://media1.giphy.com/media/vFKqnCdLPNOKc/200_d.gif?cid=4a6fbf9842189937a78085064ba1698d082ac986d75112a8&rid=200_d.gif', 'white cat hello GIF', 'https://do-we-still-exist.tumblr.com/post/46611804125/follow-for-more'),
(35, 1, 'https://media3.giphy.com/media/ASd0Ukj0y3qMM/200_d.gif?cid=4a6fbf9842189937a78085064ba1698d082ac986d75112a8&rid=200_d.gif', 'The Simpsons Hello GIF', 'https://www.reactiongifs.com/ralph-wiggum-wave/'),
(36, 1, 'https://media1.giphy.com/media/OZgBLLODEHm9O/200_d.gif?cid=4a6fbf98ac545f15e27934fad9d795915e86f7e821a263c4&rid=200_d.gif', 'dota GIF', 'https://www.playdota.com/forums/showthread.php?p=9366122'),
(37, 1, 'https://media3.giphy.com/media/HImXCpzf8dIVa/200_d.gif?cid=4a6fbf984279112286ea1454cf999276e5a517ee4406bf71&rid=200_d.gif', 'art day GIF', 'https://www.minday.com/Art-Farm-Red-Barn-Gallery'),
(38, 1, 'https://media0.giphy.com/media/XnIo4sWkkREs0/200_d.gif?cid=4a6fbf981cf1de437eb66118cb34f9e5fa97ddbaed0db721&rid=200_d.gif', 'chip n dale eating GIF', 'https://gifake.net/post/21260242558/donald-applecore-1952'),
(39, 1, 'https://media0.giphy.com/media/HbvaeI4Lg0FOw/200_d.gif?cid=4a6fbf981cf1de437eb66118cb34f9e5fa97ddbaed0db721&rid=200_d.gif', 'Snow White And The Seven Dwarfs Queen GIF', 'https://amoviediary.tumblr.com/post/20887421875/snow-white'),
(40, 1, 'https://media1.giphy.com/media/laESBDZWUubAc/200_d.gif?cid=4a6fbf987e6f745fae1c2a26aeb5b8cd112b1d52ee85dac4&rid=200_d.gif', 'year getting GIF', 'https://www.reddit.com/r/gifs/comments/20egzr/a_year_after_it_happened_i_just_discovered_what_i/'),
(41, 1, 'https://media3.giphy.com/media/PfHrNe1cSKAjC/200_d.gif?cid=4a6fbf98c35090e1ac51acf38731c4a4ca2c865f6a445921&rid=200_d.gif', 'finding nemo hello GIF', 'https://teens.thecontemporaryaustin.org/post/123284092647/shark-week-on-fleek'),
(42, 1, 'https://media3.giphy.com/media/Ev64nMwKLeVGM/200_d.gif?cid=4a6fbf9846e4391e9a5f5905ea8c66803437016085482ffa&rid=200_d.gif', 'clash of clans larry GIF', 'https://baybad575.tumblr.com/post/120105726933/larry-dont-touch-that'),
(43, 1, 'https://media2.giphy.com/media/q69yZHIEzybWE/200_d.gif?cid=4a6fbf9846e4391e9a5f5905ea8c66803437016085482ffa&rid=200_d.gif', 'clash of clans guide GIF', 'https://nuvolaravera.tumblr.com/'),
(44, 1, 'https://media0.giphy.com/media/cztB1jXXhNqWA/200_d.gif?cid=4a6fbf981e87e3de7a1939553980e95045bc5b9b1d3be23a&rid=200_d.gif', 'loop perfect loops GIF', 'https://www.reddit.com/r/perfectloops/comments/7v9tf4/he_m_a_de_the_perfect_pubg_gif/'),
(45, 1, 'https://media0.giphy.com/media/l1J9NjAojJ9TJs7kY/200_d.gif?cid=4a6fbf981e87e3de7a1939553980e95045bc5b9b1d3be23a&rid=200_d.gif', 'battlegrounds GIF by gaming', ''),
(46, 1, 'https://media2.giphy.com/media/43p2YzowWwzug/200_d.gif?cid=4a6fbf981e87e3de7a1939553980e95045bc5b9b1d3be23a&rid=200_d.gif', 'nutshell GIF', 'https://www.reddit.com/r/gaming/comments/6rmf1y/pubg_in_a_nutshell_by_rocketbeans_tv/'),
(47, 1, 'https://media1.giphy.com/media/HKch5zpaH97ck/200_d.gif?cid=4a6fbf98c375acaca6cd212b88d7df32e579f2f3a7ec336b&rid=200_d.gif', 'failure GIF', 'https://www.gifbay.com/gif/mortal_failure-35599/'),
(48, 1, 'https://media2.giphy.com/media/7FLMSdUzzXpFS/200_d.gif?cid=4a6fbf98c375acaca6cd212b88d7df32e579f2f3a7ec336b&rid=200_d.gif', 'scenes kombat GIF', 'https://www.reddit.com/r/gifs/comments/41tb5u/behind_the_scenes_of_mortal_kombat/'),
(49, 1, 'https://media0.giphy.com/media/6x2j5c80J0GLC/200_d.gif?cid=4a6fbf982edf086b0b987cf02a4e4d8e4b52a029cfc76b42&rid=200_d.gif', 'tarzan GIF', 'https://blogs.disney.com/oh-my-disney/2014/06/14/what-its-like-doing-a...'),
(50, 1, 'https://media3.giphy.com/media/MUZR7KUD9AEAo/200_d.gif?cid=4a6fbf982edf086b0b987cf02a4e4d8e4b52a029cfc76b42&rid=200_d.gif', 'disney tarzan GIF', 'https://everdeenkatniss.tumblr.com/post/72497574506/he-was-confused-at-first-as-if-he-had-never-seen');

-- --------------------------------------------------------

--
-- Table structure for table `gifminifylinks`
--

CREATE TABLE `gifminifylinks` (
  `id` int(11) NOT NULL,
  `minifyLink` varchar(100) NOT NULL,
  `realLink` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gifminifylinks`
--

INSERT INTO `gifminifylinks` (`id`, `minifyLink`, `realLink`) VALUES
(1, 'HelloWorld', 'https://media1.giphy.com/media/RdUjppM43gI6I/200_d.gif?cid=4a6fbf98c8d6a8397889a2c87f7d87e0851e0bfc17757477&rid=200_d.gif'),
(2, 'rQ7Q4NViShw/wxNQ53WkMQ==', 'https://media0.giphy.com/media/LLHkw7UnvY3Kw/200_d.gif?cid=4a6fbf980c9c55f2c6c3f78f020a17adc0379916e94081fe&rid=200_d.gif'),
(3, 'FDU2pO0YkBeJ9XqeI6xLEA==', 'https://media0.giphy.com/media/kaq6GnxDlJaBq/200_d.gif?cid=4a6fbf988418fe02e580d724478a7e36811315f517282f1c&rid=200_d.gif'),
(4, '1ANUYNYdzmUKvK6cI5MkVg==', 'https://media1.giphy.com/media/RQSuZfuylVNAY/200_d.gif?cid=4a6fbf98a616a4b156fdd8af9eac2e31200497ec503e19a1&rid=200_d.gif'),
(5, 'HBdy5zQ0nHZp1yeS2ODYbw', 'https://media0.giphy.com/media/PsLIN8YlKy4rS/200_d.gif?cid=4a6fbf98d8112c02779c6d0bc3a415d91bfca7cb12c2b13d&rid=200_d.gif'),
(6, 'irEiFO5jjGTgEFX9kndjWg', 'https://media0.giphy.com/media/U3mqcxPLatA8JbxNg1/200_d.gif?cid=4a6fbf9806c884caeadb62908946d874cc07ed45ead761ed&rid=200_d.gif'),
(7, 'vsIH1b2VBHMWA9gjBTwlyw', 'https://media0.giphy.com/media/wkW0maGDN1eSc/200_d.gif?cid=4a6fbf98b2bbd2b54aa4d578065aaae09079f4c9cef8d21e&rid=200_d.gif'),
(8, 'SPi52R6zoUA24rBk1sk2iA', 'https://media0.giphy.com/media/km2mais9qzYI/200_d.gif?cid=4a6fbf98f43f00ed1ea794b7fa79d82c148e65bdbbde91fa&rid=200_d.gif'),
(9, '5UIJTywHLPoiSn+P8xu1og', 'https://media0.giphy.com/media/1cv7Gwf0Utdeg/200_d.gif?cid=4a6fbf9854a309d5af5d553f4c5b9bc24ab1cee5db62f19e&rid=200_d.gif');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `searchtext` varchar(100) NOT NULL,
  `searchtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `searchtext`, `searchtime`) VALUES
(2, 1, 'car', '2020-03-27'),
(43, 1, 'cat', '2020-03-27'),
(45, 1, 'lang', '2020-03-27'),
(46, 1, 'play', '2020-03-27'),
(47, 1, 'game', '2020-03-27'),
(48, 1, 'apes', '2020-03-27'),
(49, 1, 'hello', '2020-03-27'),
(50, 1, 'dota', '2020-03-27'),
(51, 1, 'necrophose', '2020-03-27'),
(52, 1, 'min', '2020-03-27'),
(53, 1, 'apple', '2020-03-27'),
(54, 1, 'year', '2020-03-27'),
(55, 1, 'shark', '2020-03-27'),
(56, 1, 'clash royal', '2020-03-27'),
(57, 1, 'pubg', '2020-03-27'),
(58, 1, 'mortal', '2020-03-27'),
(59, 1, 'tarazan', '2020-03-27'),
(60, 1, 'cats', '2020-03-27'),
(61, 1, 'toys', '2020-03-27'),
(62, 1, 'hard', '2020-03-27'),
(63, 1, 'hey day', '2020-03-27'),
(64, 1, 'boy', '2020-03-27'),
(65, 1, 'girl', '2020-03-27'),
(66, 1, 'dog', '2020-03-27'),
(67, 1, 'bird', '2020-03-27'),
(68, 1, 'fly', '2020-03-27'),
(69, 1, 'sell', '2020-03-27'),
(70, 1, 'animi', '2020-03-27'),
(71, 1, 'tiny', '2020-03-27'),
(72, 1, 'yet', '2020-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Abode', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `gifminifylinks`
--
ALTER TABLE `gifminifylinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
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
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `gifminifylinks`
--
ALTER TABLE `gifminifylinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
