-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2014 at 09:56 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cb`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET latin1 NOT NULL,
  `date_held` date NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(500) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `title_ar` varchar(250) NOT NULL,
  `text_ar` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `title`, `date_held`, `date_joined`, `text`, `image`, `title_ar`, `text_ar`) VALUES
(3, 'Title', '2014-09-27', '2014-09-09 13:21:38', 'Description', 'blue1_1410268898.jpg', 'العنوان', 'م قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع م قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع م قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع ');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(2, 'Alexandria'),
(62, 'Asuwt'),
(60, 'Aswan'),
(11, 'Dahab'),
(59, 'Domyat'),
(4, 'Ein El Sokhna'),
(234, 'El Gouna'),
(3, 'Greater Cairo'),
(8, 'Hurghada'),
(61, 'Luxor'),
(233, 'Mansoura'),
(10, 'Marsa Allam'),
(12, 'Marsa Matrouh'),
(7, 'North Coast'),
(238, 'Other'),
(232, 'Ras Sedr'),
(236, 'Sahl Hasheesh '),
(5, 'Sharm El Sheikh'),
(237, 'Sohag'),
(235, 'Soma Bay '),
(64, 'Tanta');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `propertyId` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone`, `comments`, `propertyId`) VALUES
(1, 'sara', 'nahal', 'sara@test.com', '123456', 'qwertyu', 10835),
(2, 'sara', 'nahal', 'saranahal@aucegypt.edu', '1234567890', 'sdfsdf', 230524),
(3, 'sara', 'nahal', 'saranahal@aucegypt.edu', '1234567890', 'sdfsdf', 230524);

-- --------------------------------------------------------

--
-- Table structure for table `contacts_interest`
--

CREATE TABLE `contacts_interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `interest` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contacts_interest`
--

INSERT INTO `contacts_interest` (`id`, `userid`, `interest`) VALUES
(1, 1, 'buying'),
(2, 18, 'buying'),
(3, 19, 'buying'),
(4, 20, 'buying'),
(5, 2, 'buying'),
(6, 3, 'buying');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `text_ar` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `feature` text NOT NULL,
  `feature_ar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `title_ar`, `text`, `text_ar`, `image`, `date_joined`, `feature`, `feature_ar`) VALUES
(5, 'COURSE 1', 'المادة 1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. \n\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum. \n\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.', 'انفجرت اليوم قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع إصابات، حيث قام أحد الأشخاص المجهولين بإلقاء قنبلة يدوية من أعلى كوبرى مشاة بالسيدة زينب على شريط المترو، فيما ألقى آخر قنبلة أخرى على مترو الزهراء وهو ما أدى إلى انفجار محدود. وأوضح المهندس على فضالى، رئيس شركة المترو، أن انفجار قنبلتين فى محطتى السيدة زينب وزهراء المعادى بالخط الأول لم يسفرا عن أى إصابات، وكان بهما "بارود ومسامير"، مستطردا: "يبدو أن من ألقاهما كان يريد إثارة الفزع بين الركاب".انفجرت اليوم قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع إصابات، حيث قام أحد الأشخاص المجهولين بإلقاء قنبلة يدوية من أعلى كوبرى مشاة بالسيدة زينب على شريط المترو، فيما ألقى آخر قنبلة أخرى على مترو الزهراء وهو ما أدى إلى انفجار محدود. وأوضح المهندس على فضالى، رئيس شركة المترو، أن انفجار قنبلتين فى محطتى السيدة زينب وزهراء المعادى بالخط الأول لم يسفرا عن أى إصابات، وكان بهما "بارود ومسامير"، مستطردا: "يبدو أن من ألقاهما كان يريد إثارة الفزع بين الركاب".انفجرت اليوم قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع إصابات، حيث قام أحد الأشخاص المجهولين بإلقاء قنبلة يدوية من أعلى كوبرى مشاة بالسيدة زينب على شريط المترو، فيما ألقى آخر قنبلة أخرى على مترو الزهراء وهو ما أدى إلى انفجار محدود. وأوضح المهندس على فضالى، رئيس شركة المترو، أن انفجار قنبلتين فى محطتى السيدة زينب وزهراء المعادى بالخط الأول لم يسفرا عن أى إصابات، وكان بهما "بارود ومسامير"، مستطردا: "يبدو أن من ألقاهما كان يريد إثارة الفزع بين الركاب".انفجرت اليوم قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع إصابات، حيث قام أحد الأشخاص المجهولين بإلقاء قنبلة يدوية من أعلى كوبرى مشاة بالسيدة زينب على شريط المترو، فيما ألقى آخر قنبلة أخرى على مترو الزهراء وهو ما أدى إلى انفجار محدود. وأوضح المهندس على فضالى، رئيس شركة المترو، أن انفجار قنبلتين فى محطتى السيدة زينب وزهراء المعادى بالخط الأول لم يسفرا عن أى إصابات، وكان بهما "بارود ومسامير"، مستطردا: "يبدو أن من ألقاهما كان يريد إثارة الفزع بين الركاب".انفجرت اليوم قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع إصابات، حيث قام أحد الأشخاص المجهولين بإلقاء قنبلة يدوية من أعلى كوبرى مشاة بالسيدة زينب على شريط المترو، فيما ألقى آخر قنبلة أخرى على مترو الزهراء وهو ما أدى إلى انفجار محدود. وأوضح المهندس على فضالى، رئيس شركة المترو، أن انفجار قنبلتين فى محطتى السيدة زينب وزهراء المعادى بالخط الأول لم يسفرا عن أى إصابات، وكان بهما "بارود ومسامير"، مستطردا: "يبدو أن من ألقاهما كان يريد إثارة الفزع بين الركاب".انفجرت اليوم قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع إصابات، حيث قام أحد الأشخاص المجهولين بإلقاء قنبلة يدوية من أعلى كوبرى مشاة بالسيدة زينب على شريط المترو، فيما ألقى آخر قنبلة أخرى على مترو الزهراء وهو ما أدى إلى انفجار محدود. وأوضح المهندس على فضالى، رئيس شركة المترو، أن انفجار قنبلتين فى محطتى السيدة زينب وزهراء المعادى بالخط الأول لم يسفرا عن أى إصابات، وكان بهما "بارود ومسامير"، مستطردا: "يبدو أن من ألقاهما كان يريد إثارة الفزع بين الركاب".', 'blue1_1410273516.jpg', '2014-09-09 14:38:36', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.', 'انفجرت اليوم قنبلتان بمحطتين مختلفتين فى الخط الأول لمترو الأنفاق "الزهراء والسيدة زينب" دون وقوع أى خسائر فى الأرواح، أو وقوع إصابات، حيث قام أحد الأشخاص المجهولين بإلقاء قنبلة يدوية من أعلى كوبرى مشاة بالسيدة زينب على شريط المترو، فيما ألقى آخر قنبلة أخرى على مترو الزهراء وهو ما أدى إلى انفجار محدود. وأوضح المهندس على فضالى، رئيس شركة المترو، أن انفجار قنبلتين فى محطتى السيدة زينب وزهراء المعادى بالخط الأول لم يسفرا عن أى إصابات، وكان بهما "بارود ومسامير"، مستطردا: "يبدو أن من ألقاهما كان يريد إثارة الفزع بين الركاب".'),
(6, 'ewrwer', 'nbnmdb', 'sdfsf', 'sdfsdfs', 'agnes_1415195851.jpg', '2014-11-05 13:57:31', '<p>sdfghj</p>\n\n<table border="1" cellpadding="1" cellspacing="1" style="width:100%">\n	<tbody>\n		<tr>\n			<td>sdfsdf</td>\n			<td>sdfsdf</td>\n		</tr>\n		<tr>\n			<td>asdas</td>\n			<td>asdasda</td>\n		</tr>\n		<tr>\n			<td>asdasdas</td>\n			<td>adsadasd</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n', 'sdfsdfs'),
(7, 'course1', 'course1', '', '', '_1415196552.', '2014-11-05 14:09:12', '<p><img alt="" src="http://localhost/ColdwellBanker/application/static/images/bkgnd_careers.png" style="height:682px; width:1351px" /></p>\n\n<table border="3" cellpadding="1" cellspacing="1" style="width:100%">\n	<tbody>\n		<tr>\n			<td>sara</td>\n			<td>sara</td>\n		</tr>\n		<tr>\n			<td>sara</td>\n			<td>sara</td>\n		</tr>\n		<tr>\n			<td>sara</td>\n			<td>sara</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n', ''),
(8, 'Test', 'Test', '', '', '', '2014-11-06 10:24:55', '<p><img alt="" src="http://localhost/ColdwellBanker/application/static/images/bkgnd_careers.png" style="height:20%; width:60%" />test course</p>\n\n<p>hakjsdamfnsm slkdfjsal, f, wlakejrlkwelmrf ,wmf</p>\n\n<p>&nbsp;</p>\n', '<p><img alt="" src="http://localhost/ColdwellBanker/application/static/images/bkgnd_careers.png" style="height:20%; width:60%" />test course</p>\n\n<p>hakjsdamfnsm slkdfjsal, f, wlakejrlkwelmrf ,wmf</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `city_id`) VALUES
(1, 'Agamy Bitash', 2),
(33, 'Agamy Hanovile', 2),
(3, 'Azarita', 2),
(31, 'Bahary', 2),
(24, 'Bolkly', 2),
(4, 'Borg El Arab', 2),
(44, 'Camb Chezar', 2),
(45, 'Cliopatra', 2),
(5, 'Down Town', 2),
(2, 'El Amriya', 2),
(7, 'El Gomrok', 2),
(35, 'El Hamam', 2),
(39, 'El Shallalat', 2),
(43, 'El Shatby', 2),
(38, 'Ganakless', 2),
(9, 'Gleem', 2),
(6, 'Ibrahimia', 2),
(42, 'Kafr Abdu', 2),
(28, 'King Mariout', 2),
(10, 'Louran', 2),
(11, 'Maamoura', 2),
(12, 'Mandara', 2),
(13, 'Manshia', 2),
(20, 'Marina', 2),
(14, 'Miami', 2),
(17, 'Moharam Bek', 2),
(32, 'Moharram Beik', 2),
(15, 'Montazah', 2),
(37, 'Mustafa Kamel', 2),
(16, 'Mustafa Kamel - Officer', 2),
(8, 'Raml Station', 2),
(18, 'Roushdy', 2),
(29, 'Saba Pacha', 2),
(41, 'San Stefano', 2),
(36, 'Semouha', 2),
(19, 'Semouha - Taawoneyat', 2),
(34, 'Sidi Abdel Rahman', 2),
(21, 'Sidi Bishr', 2),
(26, 'Sidi Gaber', 2),
(25, 'Sporting', 2),
(23, 'Stanley', 2),
(40, 'Tharwat', 2),
(30, 'Victoria', 2),
(27, 'Wabour El Maiia', 2),
(22, 'Zezenya', 2),
(245, 'Asla', 11),
(248, 'Downtown', 11),
(247, 'Laguna', 11),
(246, 'Masbat', 11),
(244, 'Zarnouq', 11),
(305, '10th of Ramadan', 3),
(107, '6th October', 3),
(46, 'Abbaseya', 3),
(83, 'Abo Rawash', 3),
(81, 'Abou Za`abl', 3),
(95, 'Agouza', 3),
(82, 'Azhar', 3),
(80, 'Bab El Louk', 3),
(496, 'Blind', 3),
(99, 'Boulaq El Dakrour', 3),
(108, 'Cairo Alex Road', 3),
(69, 'Cairo Ismailia Road', 3),
(78, 'Cairo Suez Road', 3),
(47, 'Daher', 3),
(91, 'Dokki', 3),
(48, 'Down Town', 3),
(49, 'Ein Shams', 3),
(66, 'El Amrya', 3),
(85, 'El Helmiya ElGedeeda', 3),
(104, 'El Mansoreya', 3),
(50, 'El Matareya', 3),
(51, 'El Nozha', 3),
(67, 'El Rehab', 3),
(68, 'El Sayeda Zienab', 3),
(73, 'El Wahat Road', 3),
(96, 'Embaba', 3),
(93, 'Fisal', 3),
(53, 'Garden City', 3),
(54, 'Gesr El Suez', 3),
(103, 'Geziret El Dahab', 3),
(74, 'Ghamra', 3),
(97, 'Giza', 3),
(106, 'Hadabet Hadayek AlAhram', 3),
(105, 'Hadayek Al Ahram', 3),
(55, 'Hadayek El Koba', 3),
(89, 'Hadayek ElZatoun', 3),
(72, 'Hadayek Helwan', 3),
(92, 'Haram', 3),
(56, 'Heliopolis', 3),
(57, 'Helwan', 3),
(70, 'Hikestep', 3),
(75, 'Kobbri El Kobba', 3),
(79, 'Lazoghly', 3),
(76, 'Maadi', 3),
(84, 'Madinati', 3),
(58, 'Manial', 3),
(86, 'Mansheyat El Bakry', 3),
(98, 'Maryoutia', 3),
(100, 'Meet Okba', 3),
(90, 'Mohandeseen', 3),
(59, 'Mokattam', 3),
(60, 'Nasr City', 3),
(88, 'New Cairo', 3),
(87, 'Obour City', 3),
(61, 'Ramses', 3),
(77, 'Road El- Farag', 3),
(102, 'Sakara', 3),
(94, 'Shabramant', 3),
(206, 'Shorook', 3),
(62, 'Shoubra', 3),
(63, 'Shoubra El Kheima', 3),
(101, 'Tersa', 3),
(71, 'Zahraa Nasr City', 3),
(64, 'Zaitoun', 3),
(65, 'Zamalek', 3),
(216, 'Ahyaa', 8),
(254, 'Air Port', 8),
(217, 'Alkawsar', 8),
(214, 'Downtown', 8),
(221, 'Eldahar', 8),
(444, 'Esplanada', 8),
(225, 'Gefton', 8),
(256, 'Gouna', 8),
(484, 'Hurghada', 8),
(224, 'Magawish', 8),
(226, 'Makadi Bay ', 8),
(445, 'Mastaba', 8),
(308, 'Other', 8),
(493, 'Riyad Resort', 8),
(303, 'Safaga', 8),
(255, 'Sahl Hasheesh', 8),
(222, 'Sekala', 8),
(227, 'Soma Bay', 8),
(223, 'Villages', 8),
(242, 'Berenice', 10),
(312, 'Las Cabanas', 10),
(237, 'Marsa Hermes', 10),
(238, 'Marsa Shagara', 10),
(239, 'Nakary Bay', 10),
(497, 'Other', 10),
(240, 'Port Ghalib', 10),
(241, 'Wadi El Gimal', 10),
(243, 'Wadi Lahami', 10),
(257, 'Downtown', 12),
(495, 'Marsa Matrouh', 12),
(311, 'Sea Coast', 12),
(208, 'Agami', 7),
(209, 'Borg Elarab', 7),
(210, 'Marina', 7),
(490, 'North Coast', 7),
(499, 'Other', 7),
(211, 'Sidi Abdel Rahman', 7),
(498, 'Other', 232),
(483, 'Ras Sedr', 232),
(160, 'Aida', 5),
(234, 'Air Port', 5),
(204, 'Arij', 5),
(201, 'Bella Vista Resort', 5),
(494, 'Delta Sharm Resort', 5),
(230, 'Downtown', 5),
(153, 'El Tower', 5),
(252, 'Elysee', 5),
(152, 'Hadaba', 5),
(163, 'Hay El Nour (new)', 5),
(162, 'Hay El Nour (old)', 5),
(202, 'Hayat', 5),
(158, 'Marina', 5),
(159, 'Montazah', 5),
(231, 'Naama Bay', 5),
(232, 'Naama Heights', 5),
(249, 'Naama Town', 5),
(235, 'Nabq Bay', 5),
(151, 'Old Market', 5),
(228, 'Old Town', 5),
(229, 'Other', 5),
(154, 'Peace Road', 5),
(157, 'Ras Nusrani', 5),
(203, 'Regina', 5),
(161, 'Rowabi', 5),
(236, 'Ruweisat', 5),
(164, 'Sea St.', 5),
(155, 'Sedi Mohamed', 5),
(156, 'Sharks bay', 5),
(233, 'Sharks Bay', 5),
(150, 'Sharm El Sheikh', 5),
(253, 'Sharm L', 5),
(492, 'Sunny Lakes', 5),
(250, 'Sunterra', 5),
(251, 'The View', 5);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_identifier` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `vacancy_id` (`vacancy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `user_identifier`, `first_name`, `last_name`, `vacancy_id`, `cv`, `date_joined`) VALUES
(2, '34', 'Leonard', 'Dudley', 1, 'test.pdf', '2014-09-02 12:49:03'),
(3, 'test@test.com', 'test', 'test', 1, 'test.pdf', '2014-09-02 12:49:03'),
(4, 'test@test.com', 'test', 'test', 1, 'test.pdf', '2014-09-02 12:49:03'),
(5, 'test@test.com', 'test', 'test', 1, 'test.pdf', '2014-09-02 12:49:03'),
(6, '35', 'Lida', 'Ebonie', 1, 'test.pdf', '2014-09-02 12:49:03'),
(7, 'test@test.com', 'test', 'test', 1, 'test.pdf', '2014-09-02 12:49:03'),
(8, '103', 'Lizzie', 'Malka', 1, 'test.pdf', '2014-09-02 12:49:03'),
(9, '13', 'Wanita', 'Rhonda', 1, 'test.pdf', '2014-09-02 12:49:03'),
(10, 'test@test.com', 'test', 'test', 1, 'test.pdf', '2014-09-02 12:49:03'),
(11, '73', 'Collin', 'Mel', 1, 'test.pdf', '2014-09-02 12:49:03'),
(12, 'test@test.com', 'test', 'test', 2, 'test.pdf', '2014-09-02 12:49:03'),
(13, 'test@test.com', 'test', 'test', 2, 'test.pdf', '2014-09-02 12:49:03'),
(14, 'test@test.com', 'test', 'test', 2, 'test.pdf', '2014-09-02 12:49:03'),
(15, '97', 'Royal', 'Teodoro', 2, 'test.pdf', '2014-09-02 12:49:03'),
(16, 'test@test.com', 'test', 'test', 2, 'test.pdf', '2014-09-02 12:49:03'),
(17, 'test@test.com', 'test', 'test', 2, 'test.pdf', '2014-09-02 12:49:03'),
(18, '102', 'Buddy', 'Garrett', 2, 'test.pdf', '2014-09-02 12:49:03'),
(19, '75', 'Collin', 'Raymon', 2, 'test.pdf', '2014-09-02 12:49:03'),
(20, 'test@test.com', 'test', 'test', 2, 'test.pdf', '2014-09-02 12:49:03'),
(21, '8', 'Russ', 'Kendrick', 2, 'test.pdf', '2014-09-02 12:49:04'),
(22, '91', 'Lezlie', 'Fransisca', 3, 'test.pdf', '2014-09-02 12:49:04'),
(23, '98', 'Ling', 'Shira', 3, 'test.pdf', '2014-09-02 12:49:04'),
(24, 'test@test.com', 'test', 'test', 3, 'test.pdf', '2014-09-02 12:49:04'),
(25, '43', 'Ward', 'Edgar', 3, 'test.pdf', '2014-09-02 12:49:04'),
(26, '9', 'Dan', 'Giovanni', 3, 'test.pdf', '2014-09-02 12:49:04'),
(27, '88', 'Nathalie', 'Kristi', 3, 'test.pdf', '2014-09-02 12:49:04'),
(28, 'test@test.com', 'test', 'test', 3, 'test.pdf', '2014-09-02 12:49:04'),
(29, '51', 'Lizzie', 'Shira', 3, 'test.pdf', '2014-09-02 12:49:04'),
(30, 'test@test.com', 'test', 'test', 3, 'test.pdf', '2014-09-02 12:49:04'),
(31, '13', 'Wanita', 'Rhonda', 3, 'test.pdf', '2014-09-02 12:49:04'),
(32, 'test@test.com', 'test', 'test', 4, 'test.pdf', '2014-09-02 12:49:04'),
(33, '82', 'Fawn', 'Keira', 4, 'test.pdf', '2014-09-02 12:49:04'),
(34, '15', 'Luciano', 'Rodolfo', 4, 'test.pdf', '2014-09-02 12:49:04'),
(35, 'test@test.com', 'test', 'test', 4, 'test.pdf', '2014-09-02 12:49:04'),
(36, 'test@test.com', 'test', 'test', 4, 'test.pdf', '2014-09-02 12:49:04'),
(37, '5', 'Art', 'Erich', 4, 'test.pdf', '2014-09-02 12:49:04'),
(38, 'test@test.com', 'test', 'test', 4, 'test.pdf', '2014-09-02 12:49:05'),
(39, '101', 'Maia', 'Gita', 4, 'test.pdf', '2014-09-02 12:49:05'),
(40, 'test@test.com', 'test', 'test', 4, 'test.pdf', '2014-09-02 12:49:05'),
(41, '81', 'Rosann', 'Paola', 4, 'test.pdf', '2014-09-02 12:49:05'),
(42, '100', 'Alfredo', 'John', 5, 'test.pdf', '2014-09-02 12:49:05'),
(43, '15', 'Luciano', 'Rodolfo', 5, 'test.pdf', '2014-09-02 12:49:05'),
(44, '52', 'Ranee', 'Floretta', 5, 'test.pdf', '2014-09-02 12:49:05'),
(45, 'test@test.com', 'test', 'test', 5, 'test.pdf', '2014-09-02 12:49:05'),
(46, 'test@test.com', 'test', 'test', 5, 'test.pdf', '2014-09-02 12:49:05'),
(47, '94', 'Ward', 'Harrison', 5, 'test.pdf', '2014-09-02 12:49:05'),
(48, '19', 'Shavonne', 'Sheridan', 5, 'test.pdf', '2014-09-02 12:49:05'),
(49, '20', 'Lashell', 'Maia', 5, 'test.pdf', '2014-09-02 12:49:05'),
(50, '48', 'Rhonda', 'Floretta', 5, 'test.pdf', '2014-09-02 12:49:05'),
(51, '52', 'Ranee', 'Floretta', 5, 'test.pdf', '2014-09-02 12:49:05'),
(52, 'test@test.com', 'test', 'test', 6, 'test.pdf', '2014-09-02 12:49:05'),
(53, '65', 'Erin', 'Wally', 6, 'test.pdf', '2014-09-02 12:49:05'),
(54, '27', 'Royal', 'Porfirio', 6, 'test.pdf', '2014-09-02 12:49:05'),
(55, '94', 'Ward', 'Harrison', 6, 'test.pdf', '2014-09-02 12:49:05'),
(56, '62', 'Yee', 'Joselyn', 6, 'test.pdf', '2014-09-02 12:49:05'),
(57, 'test@test.com', 'test', 'test', 6, 'test.pdf', '2014-09-02 12:49:06'),
(58, '99', 'Miguel', 'Foster', 6, 'test.pdf', '2014-09-02 12:49:06'),
(59, '46', 'Jesica', 'Lavonda', 6, 'test.pdf', '2014-09-02 12:49:06'),
(60, 'test@test.com', 'test', 'test', 6, 'test.pdf', '2014-09-02 12:49:06'),
(61, 'test@test.com', 'test', 'test', 6, 'test.pdf', '2014-09-02 12:49:06'),
(62, '79', 'Tempie', 'Lizzie', 7, 'test.pdf', '2014-09-02 12:49:06'),
(63, 'test@test.com', 'test', 'test', 7, 'test.pdf', '2014-09-02 12:49:06'),
(64, '85', 'Paola', 'Kristi', 7, 'test.pdf', '2014-09-02 12:49:06'),
(65, '85', 'Paola', 'Kristi', 7, 'test.pdf', '2014-09-02 12:49:06'),
(66, 'test@test.com', 'test', 'test', 7, 'test.pdf', '2014-09-02 12:49:06'),
(67, 'test@test.com', 'test', 'test', 7, 'test.pdf', '2014-09-02 12:49:06'),
(68, 'test@test.com', 'test', 'test', 7, 'test.pdf', '2014-09-02 12:49:06'),
(69, '12', 'Margarito', 'Lewis', 7, 'test.pdf', '2014-09-02 12:49:06'),
(70, 'test@test.com', 'test', 'test', 7, 'test.pdf', '2014-09-02 12:49:06'),
(71, '35', 'Lida', 'Ebonie', 7, 'test.pdf', '2014-09-02 12:49:06'),
(72, 'test@test.com', 'test', 'test', 8, 'test.pdf', '2014-09-02 12:49:06'),
(73, '24', 'Andreas', 'Houston', 8, 'test.pdf', '2014-09-02 12:49:06'),
(74, 'test@test.com', 'test', 'test', 8, 'test.pdf', '2014-09-02 12:49:06'),
(75, '71', 'Blake', 'Orlando', 8, 'test.pdf', '2014-09-02 12:49:06'),
(76, 'test@test.com', 'test', 'test', 8, 'test.pdf', '2014-09-02 12:49:06'),
(77, 'test@test.com', 'test', 'test', 8, 'test.pdf', '2014-09-02 12:49:07'),
(78, '44', 'Blythe', 'Marylouise', 8, 'test.pdf', '2014-09-02 12:49:07'),
(79, '6', 'Elin', 'Jolie', 8, 'test.pdf', '2014-09-02 12:49:07'),
(80, 'test@test.com', 'test', 'test', 8, 'test.pdf', '2014-09-02 12:49:07'),
(81, 'test@test.com', 'test', 'test', 8, 'test.pdf', '2014-09-02 12:49:07'),
(82, '77', 'Andreas', 'Ali', 9, 'test.pdf', '2014-09-02 12:49:07'),
(83, '102', 'Buddy', 'Garrett', 9, 'test.pdf', '2014-09-02 12:49:07'),
(84, '52', 'Ranee', 'Floretta', 9, 'test.pdf', '2014-09-02 12:49:07'),
(85, 'test@test.com', 'test', 'test', 9, 'test.pdf', '2014-09-02 12:49:07'),
(86, 'test@test.com', 'test', 'test', 9, 'test.pdf', '2014-09-02 12:49:07'),
(87, 'test@test.com', 'test', 'test', 9, 'test.pdf', '2014-09-02 12:49:07'),
(88, '101', 'Maia', 'Gita', 9, 'test.pdf', '2014-09-02 12:49:07'),
(89, 'test@test.com', 'test', 'test', 9, 'test.pdf', '2014-09-02 12:49:07'),
(90, 'test@test.com', 'test', 'test', 9, 'test.pdf', '2014-09-02 12:49:07'),
(91, '83', 'Claude', 'Armando', 9, 'test.pdf', '2014-09-02 12:49:07'),
(92, 'test@test.com', 'test', 'test', 10, 'test.pdf', '2014-09-02 12:49:07'),
(93, '17', 'Rosann', 'Nathalie', 10, 'test.pdf', '2014-09-02 12:49:08'),
(94, 'test@test.com', 'test', 'test', 10, 'test.pdf', '2014-09-02 12:49:08'),
(95, 'test@test.com', 'test', 'test', 10, 'test.pdf', '2014-09-02 12:49:08'),
(96, 'test@test.com', 'test', 'test', 10, 'test.pdf', '2014-09-02 12:49:08'),
(97, 'test@test.com', 'test', 'test', 10, 'test.pdf', '2014-09-02 12:49:08'),
(98, 'test@test.com', 'test', 'test', 10, 'test.pdf', '2014-09-02 12:49:08'),
(99, '29', 'Shavonne', 'Elin', 10, 'test.pdf', '2014-09-02 12:49:08'),
(100, 'test@test.com', 'test', 'test', 10, 'test.pdf', '2014-09-02 12:49:08'),
(101, 'test@test.com', 'test', 'test', 10, 'test.pdf', '2014-09-02 12:49:08'),
(102, 'amr@amr.com', 'Amr', 'Ahmed', 11, 'test_1409738574.pdf', '2014-09-03 10:02:54'),
(103, '2', 'Sara', 'Nahal', 11, 'test_1409738773.pdf', '2014-09-03 10:06:13'),
(104, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1412173730.pdf', '2014-10-01 14:28:50'),
(105, 'test@test.com', 'test', 'test', 11, 'My_Last_Advising_sheet_1412174389.pdf', '2014-10-01 14:39:49'),
(106, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1414504854.pdf', '2014-10-28 14:00:54'),
(107, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1414505265.pdf', '2014-10-28 14:07:45'),
(108, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415118725.pdf', '2014-11-04 16:32:06'),
(109, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415118736.pdf', '2014-11-04 16:32:16'),
(110, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415118775.pdf', '2014-11-04 16:32:55'),
(111, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415118822.pdf', '2014-11-04 16:33:42'),
(112, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415118876.pdf', '2014-11-04 16:34:36'),
(113, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415118941.pdf', '2014-11-04 16:35:41'),
(114, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415118959.pdf', '2014-11-04 16:35:59'),
(115, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415118981.pdf', '2014-11-04 16:36:21'),
(116, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415119583.pdf', '2014-11-04 16:46:23'),
(117, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415174297.pdf', '2014-11-05 07:58:17'),
(118, 'sara@h.com', 'sara', 'nahal', 11, 'My_Last_Advising_sheet_1415174452.pdf', '2014-11-05 08:00:52'),
(119, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415189701.pdf', '2014-11-05 12:15:01'),
(120, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415189746.pdf', '2014-11-05 12:15:46'),
(121, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415189994.pdf', '2014-11-05 12:19:54'),
(122, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415190008.pdf', '2014-11-05 12:20:08'),
(123, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415190013.pdf', '2014-11-05 12:20:13'),
(124, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415190166.pdf', '2014-11-05 12:22:46'),
(125, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415190306.pdf', '2014-11-05 12:25:06'),
(126, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415190322.pdf', '2014-11-05 12:25:22'),
(127, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415190374.pdf', '2014-11-05 12:26:14'),
(128, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415190472.pdf', '2014-11-05 12:27:52'),
(129, '2', 'Sara', 'Nahal', 11, 'My_Last_Advising_sheet_1415190496.pdf', '2014-11-05 12:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h1_en` varchar(255) NOT NULL,
  `h1_ar` varchar(255) NOT NULL,
  `h2_en` varchar(255) NOT NULL,
  `h2_ar` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `alt_logo` varchar(255) NOT NULL,
  `link_en` varchar(255) NOT NULL,
  `link_ar` varchar(255) NOT NULL,
  `order` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `h1_en`, `h1_ar`, `h2_en`, `h2_ar`, `image`, `logo`, `alt_logo`, `link_en`, `link_ar`, `order`, `is_active`) VALUES
(11, 'NOW HALF PRICE', 'الأن بنصف الثمن', 'PAYMENT ON 6 MONTHS', 'الدفع على ٦ شهور', 'banner1_1410868480.jpg', 'logo1_1410868480.jpg', 'logo1_1410868480.jpg', 'viewAllProperties', 'viewAllProperties', 1, 1),
(12, 'YOUR DREAM HOUSE', 'منزل أحلامك', 'NOW FOR HALF PRICE', 'الأن بنصف السعر', 'banner3_1410868578.jpg', 'logo2_1410868578.jpg', 'logo2_1410868578.jpg', 'viewAllProperties', 'viewAllProperties', 2, 1),
(13, 'SECOND PHASE RESERVATION', 'حجز المرحلة الثانية', 'OPEN NOW!', 'مفتوح الأن', 'banner4_1410869026.jpg', 'logo4_1410869026.jpg', 'logo4_1410869026.jpg', 'viewAllProperties', 'viewAllProperties', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_en` varchar(255) NOT NULL,
  `district_ar` varchar(255) NOT NULL,
  `address_en` varchar(500) NOT NULL,
  `address_ar` varchar(500) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `district_en`, `district_ar`, `address_en`, `address_ar`, `start_time`, `end_time`, `phone`, `longitude`, `latitude`) VALUES
(1, 'District', 'منطقة', 'Address', 'العنوان', '9', '17', 'Phone', '151.2152', '-33.8569'),
(2, 'Mohandeseen', 'مهندسين', '53, Shehab Street, Mohandeseen, Giza', '٥٣ ش شهاب', '9:00 am', '10:00 pm', '1234567890', '151.2152', '-33.8569');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `features` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `user_id`, `area`, `category`, `type`, `price`, `district`, `features`, `address`, `is_valid`, `date_joined`, `city`) VALUES
(104, 2, '100', '', 'Building', '100,000 - 250,000', 'Agamy Bitash', 'featuresss', 'address', 0, '2014-09-09 12:28:39', 'Alexandria'),
(105, 2, '50', '', 'Apartment', '100,000 - 250,000', 'Agamy Bitash', 'asdfghjk', 'sadfghjk', 0, '2014-10-02 11:40:50', 'Alexandria'),
(106, 2, '50', '', 'Apartment', '100,000 - 250,000', 'Agamy Bitash', 'asdfghjmk,', 'awsedfghjk', 0, '2014-10-02 12:44:28', 'Alexandria'),
(107, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', 'Agamy Bitash', 'sfsdfsdff', 'sdfsfasf', 0, '2014-10-13 10:59:34', 'Alexandria'),
(108, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', 'Agamy Bitash', 'sfsdfsdff', 'sdfsfasf', 0, '2014-10-13 11:31:09', 'Alexandria'),
(109, 2, '50', 'Residential', 'Apartment', '750,000 - 1,000,000', 'Agamy Bitash', 'sfsdfsdf', 'sdfsfs', 0, '2014-10-28 13:28:21', 'Alexandria'),
(110, 2, '50', 'Commercial', 'Building', '100,000 - 250,000', 'Agamy Bitash', 'jbmnb', 'dsfsf', 0, '2014-11-05 10:48:16', 'Alexandria'),
(111, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '0', 'sdfsfsd', 'adsdf', 0, '2014-11-05 12:34:41', 'Asuwt'),
(112, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '0', 'sdfsdf', 'sdfsdf', 0, '2014-11-05 12:35:16', 'Asuwt'),
(113, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'dfghjkl', 'sdfghjk', 0, '2014-11-05 12:39:04', 'Asuwt'),
(114, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'dfghjkl', 'sdfghjk', 0, '2014-11-05 12:39:56', 'Asuwt'),
(115, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'dfghjk', 'asdrtyu', 0, '2014-11-05 12:41:44', 'Asuwt'),
(116, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'sdfghjk', 'asdfghj', 0, '2014-11-05 12:43:13', 'Alexandria'),
(117, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'sdfghjk', 'asdfghj', 0, '2014-11-05 12:44:13', 'Alexandria'),
(118, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'sdfghjk', 'asdfghj', 0, '2014-11-05 12:44:22', 'Alexandria'),
(119, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'sdfghjk', 'asdfghj', 0, '2014-11-05 12:46:08', 'Alexandria'),
(120, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'sdfghjk', 'asdfghj', 0, '2014-11-05 12:48:17', 'Alexandria'),
(121, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'sgdfgdfg', 'sdfdfg', 0, '2014-11-05 12:49:07', 'Alexandria'),
(122, 2, '50', 'Residential', 'Apartment', '100,000 - 250,000', '', 'sdfsdf', 'sdfdsf', 0, '2014-11-05 12:50:20', 'Alexandria');

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

CREATE TABLE `property_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `property_image`
--

INSERT INTO `property_image` (`id`, `property_id`, `image_url`, `date_joined`) VALUES
(3, 104, 'blue1_1410265719.jpg', '2014-09-09 12:28:39'),
(4, 104, 'blue2_1410265719.jpeg', '2014-09-09 12:28:39'),
(5, 104, 'book_1410265719.jpg', '2014-09-09 12:28:39'),
(6, 104, 'cs_1410265719.jpg', '2014-09-09 12:28:39'),
(7, 105, 'agnes_1412250051.jpg', '2014-10-02 11:40:51'),
(8, 106, 'agnes_1412253868.jpg', '2014-10-02 12:44:28'),
(9, 107, 'agnes_1413197974.jpg', '2014-10-13 10:59:34'),
(10, 108, 'agnes_1413199869.jpg', '2014-10-13 11:31:09'),
(11, 109, 'agnes_1414502901.jpg', '2014-10-28 13:28:21'),
(12, 110, 'My_Last_Advising_sheet_1415184496.pdf', '2014-11-05 10:48:16'),
(13, 111, 'agnes_1415190881.jpg', '2014-11-05 12:34:41'),
(14, 111, 'braces2_1415190885.png', '2014-11-05 12:34:45'),
(15, 112, 'dentures_1415190916.png', '2014-11-05 12:35:16'),
(16, 112, 'agnes_1415190920.jpg', '2014-11-05 12:35:20'),
(17, 113, 'agnes_1415191144.jpg', '2014-11-05 12:39:04'),
(18, 113, 'dentures_1415191144.png', '2014-11-05 12:39:04'),
(19, 114, 'agnes_1415191196.jpg', '2014-11-05 12:39:56'),
(20, 114, 'dentures_1415191196.png', '2014-11-05 12:39:56'),
(21, 115, 'agnes_1415191304.jpg', '2014-11-05 12:41:44'),
(22, 115, 'dentures_1415191304.png', '2014-11-05 12:41:44'),
(23, 116, 'dentures_1415191393.png', '2014-11-05 12:43:13'),
(24, 116, 'agnes_1415191393.jpg', '2014-11-05 12:43:13'),
(25, 117, 'dentures_1415191453.png', '2014-11-05 12:44:13'),
(26, 117, 'agnes_1415191453.jpg', '2014-11-05 12:44:13'),
(27, 118, 'dentures_1415191462.png', '2014-11-05 12:44:22'),
(28, 118, 'agnes_1415191462.jpg', '2014-11-05 12:44:22'),
(29, 119, 'dentures_1415191568.png', '2014-11-05 12:46:08'),
(30, 119, 'agnes_1415191568.jpg', '2014-11-05 12:46:08'),
(31, 120, 'dentures_1415191697.png', '2014-11-05 12:48:17'),
(32, 120, 'agnes_1415191697.jpg', '2014-11-05 12:48:17'),
(33, 121, 'agnes_1415191747.jpg', '2014-11-05 12:49:07'),
(34, 121, 'dentures_1415191747.png', '2014-11-05 12:49:07'),
(35, 122, 'agnes_1415191820.jpg', '2014-11-05 12:50:20'),
(36, 122, 'dentures_1415191820.png', '2014-11-05 12:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `super_user`
--

CREATE TABLE `super_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_salt` varchar(8) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `super_user`
--

INSERT INTO `super_user` (`id`, `username`, `password`, `password_salt`, `first_name`, `last_name`, `email`, `is_active`) VALUES
(1, 'root', 'b95f02330379a91c53b07aa04cd7decc', '12345678', 'Amr', 'Bakr', 'amrsamo75@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_salt` varchar(8) NOT NULL,
  `birthday` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `first_name`, `last_name`, `location`, `phone`, `password`, `password_salt`, `birthday`, `is_active`, `is_valid`, `date_joined`) VALUES
(1, 'root', 'amrsamo75@gmail.com', 'Amr', 'Bakr', 'Egypt', '010000000', 'b95f02330379a91c53b07aa04cd7decc', '12345678', '0000-00-00', 0, 1, '2014-08-25 12:41:35'),
(2, 'Sara', 'sara@sara.com', 'Sara', 'Nahal', 'Egypt', '010000000', 'b95f02330379a91c53b07aa04cd7decc', '12345678', '0000-00-00', 1, 1, '2014-08-25 13:57:05'),
(4, 'Valencia.Ling_119', 'Valencia.Ling_119@test.com', 'Valencia', 'Ling', 'Egypt', '834083228', 'e7e00406046374858de8f8ab7a40a313', 'K8arYyEk', '0000-00-00', 1, 1, '2014-08-26 10:25:49'),
(5, 'Art.Erich_7146', 'Art.Erich_7146@test.com', 'Art', 'Erich', 'Egypt', '451852471', 'e0b54c7f103c94b749d0b81add6cfa19', 'o73KxVlZ', '0000-00-00', 0, 1, '2014-08-26 10:25:49'),
(6, 'Elin.Jolie_5263', 'Elin.Jolie_5263@test.com', 'Elin', 'Jolie', 'Egypt', '993281141', '44d36fa1bf194094dd86d97238b5d842', '0LUpb1nX', '0000-00-00', 0, 1, '2014-08-26 10:25:49'),
(7, 'Giovanni.Randall_732', 'Giovanni.Randall_732@test.com', 'Giovanni', 'Randall', 'Egypt', '466143058', '5977e5d88402951697b2a2769c047e3d', '6RhlpK3n', '0000-00-00', 0, 1, '2014-08-26 10:25:49'),
(8, 'Russ.Kendrick_8818', 'Russ.Kendrick_8818@test.com', 'Russ', 'Kendrick', 'Egypt', '677285475', 'b33dc7d819bbf3b272c4681aa07baece', '1igF2ZIY', '0000-00-00', 0, 1, '2014-08-26 10:25:49'),
(9, 'Dan.Giovanni_5895', 'Dan.Giovanni_5895@test.com', 'Dan', 'Giovanni', 'Egypt', '338777188', '472e33f86b209f5ca42e79a2ef3c2de2', 'wJ9OWLcR', '0000-00-00', 1, 0, '2014-08-26 10:25:50'),
(10, 'Hubert.Terrence_7652', 'Hubert.Terrence_7652@test.com', 'Hubert', 'Terrence', 'Egypt', '348550548', 'd82ea8fd0f020949fd6aab82e790bfda', 'uG0fYhue', '0000-00-00', 1, 0, '2014-08-26 10:25:50'),
(11, 'Lashon.Patty_655', 'Lashon.Patty_655@test.com', 'Lashon', 'Patty', 'Egypt', '459558744', '3d0996079d353a9a3fd84302e3087cf6', 'mqIaZ66b', '0000-00-00', 0, 1, '2014-08-26 10:25:50'),
(12, 'Margarito.Lewis_9452', 'Margarito.Lewis_9452@test.com', 'Margarito', 'Lewis', 'Egypt', '760540877', 'f395d957e73ff06fec5888b2f216145f', '8Fd63Efv', '0000-00-00', 1, 0, '2014-08-26 10:25:50'),
(13, 'Wanita.Rhonda_4108', 'Wanita.Rhonda_4108@test.com', 'Wanita', 'Rhonda', 'Egypt', '101284549', '4c1c655ab9bc52371b3f9fd3da1dc3b9', 'zJK4TBkb', '0000-00-00', 0, 1, '2014-08-26 10:25:50'),
(14, 'Valencia.Neva_9549', 'Valencia.Neva_9549@test.com', 'Valencia', 'Neva', 'Egypt', '646428500', '2adedfb47a9f7cfdacc7a472bc347d91', 'PZjiG2Ea', '0000-00-00', 1, 0, '2014-08-26 10:25:50'),
(15, 'Luciano.Rodolfo_5979', 'Luciano.Rodolfo_5979@test.com', 'Luciano', 'Rodolfo', 'Egypt', '649939040', 'be011e970d808bb4aeed9d89764df7fb', '0BEdRJjL', '0000-00-00', 0, 0, '2014-08-26 10:25:50'),
(16, 'Elisha.Kenny_3901', 'Elisha.Kenny_3901@test.com', 'Elisha', 'Kenny', 'Egypt', '355712767', '6d452d93888d24bd7e1e3d7ed8eeee0d', 'K17xtCJW', '0000-00-00', 0, 1, '2014-08-26 10:25:50'),
(17, 'Rosann.Nathalie_5713', 'Rosann.Nathalie_5713@test.com', 'Rosann', 'Nathalie', 'Egypt', '740356866', '41d0c4e839a81156615050f0a82ac75c', 'arQ6rIU9', '0000-00-00', 0, 0, '2014-08-26 10:25:50'),
(18, 'Milo.Lance_8448', 'Milo.Lance_8448@test.com', 'Milo', 'Lance', 'Egypt', '289811089', 'a3c5fd402d43b4634a4bd759401b6670', 'AclxCc7I', '0000-00-00', 1, 0, '2014-08-26 10:25:50'),
(19, 'Shavonne.Sheridan_3428', 'Shavonne.Sheridan_3428@test.com', 'Shavonne', 'Sheridan', 'Egypt', '934294345', 'df796922a62706ec7131c7355894cbe7', '1YAtSDV2', '0000-00-00', 0, 0, '2014-08-26 10:25:50'),
(20, 'Lashell.Maia_6718', 'Lashell.Maia_6718@test.com', 'Lashell', 'Maia', 'Egypt', '384220855', '1cc37c073b1f733ea0114d2560240aa0', '61yeHbvY', '0000-00-00', 0, 1, '2014-08-26 10:25:50'),
(21, 'Rufus.Merle_2617', 'Rufus.Merle_2617@test.com', 'Rufus', 'Merle', 'Egypt', '195324631', 'a5a03b950e7dcf38a24044047f9e58e2', 'RXDpwHsL', '0000-00-00', 1, 1, '2014-08-26 10:25:50'),
(22, 'Marhta.Patty_674', 'Marhta.Patty_674@test.com', 'Marhta', 'Patty', 'Egypt', '625368157', 'cc0e27fde76d33eb69f40c045f374743', 'XscfuGnI', '0000-00-00', 1, 1, '2014-08-26 10:25:50'),
(23, 'Sheba.Lizzie_401', 'Sheba.Lizzie_401@test.com', 'Sheba', 'Lizzie', 'Egypt', '723800288', 'afd6388d66fec6a59328b1e8ec17cf05', 'AHulRU8e', '0000-00-00', 1, 1, '2014-08-26 10:25:50'),
(24, 'Andreas.Houston_7134', 'Andreas.Houston_7134@test.com', 'Andreas', 'Houston', 'Egypt', '40571304', '123de70b53e0a27c93249ee99814fe43', 'jCFE70ua', '0000-00-00', 0, 0, '2014-08-26 10:25:50'),
(25, 'Bradley.Mel_9684', 'Bradley.Mel_9684@test.com', 'Bradley', 'Mel', 'Egypt', '935291022', 'e723ff816a6dcfbf01876992c766bf3a', 'qHw6IOsW', '0000-00-00', 0, 0, '2014-08-26 10:25:50'),
(26, 'Odis.Elijah_901', 'Odis.Elijah_901@test.com', 'Odis', 'Elijah', 'Egypt', '932719173', '0079e5e505978715c967f7d69693d45a', 'PGZBOIER', '0000-00-00', 1, 1, '2014-08-26 10:25:50'),
(27, 'Royal.Porfirio_6773', 'Royal.Porfirio_6773@test.com', 'Royal', 'Porfirio', 'Egypt', '901962507', '867c72e50f5135de44c82d245e5368f5', 'bcXQFXSw', '0000-00-00', 0, 1, '2014-08-26 10:25:50'),
(28, 'Carline.Fransisca_9614', 'Carline.Fransisca_9614@test.com', 'Carline', 'Fransisca', 'Egypt', '121152737', '44f6dced67978e9ffd849765ea74f202', 'xC55DFXw', '0000-00-00', 0, 0, '2014-08-26 10:25:50'),
(29, 'Shavonne.Elin_3876', 'Shavonne.Elin_3876@test.com', 'Shavonne', 'Elin', 'Egypt', '442863283', '0cb351a4e00377255112d20f6184d2d4', 'GU9RA7df', '0000-00-00', 0, 1, '2014-08-26 10:25:50'),
(30, 'Sheba.Elise_1888', 'Sheba.Elise_1888@test.com', 'Sheba', 'Elise', 'Egypt', '770653326', '1de2d1fd1f214300ea4707373b83d5ae', 'J3ZWwTd5', '0000-00-00', 0, 1, '2014-08-26 10:25:51'),
(31, 'Mark.Ward_7887', 'Mark.Ward_7887@test.com', 'Mark', 'Ward', 'Egypt', '944753654', 'c66106513b676b9d07c379532f423781', 'NIPsRNzm', '0000-00-00', 1, 1, '2014-08-26 10:25:51'),
(32, 'Carline.Phung_1719', 'Carline.Phung_1719@test.com', 'Carline', 'Phung', 'Egypt', '337555167', 'd8b258c66e1bf82d7fb1ead472c25c55', 'Hex2KYtE', '0000-00-00', 1, 0, '2014-08-26 10:25:51'),
(33, 'Ivory.Elijah_3979', 'Ivory.Elijah_3979@test.com', 'Ivory', 'Elijah', 'Egypt', '325563309', '511fd9f05bb95476470e32d8ec4b9a61', 'BiS0HhBR', '0000-00-00', 0, 0, '2014-08-26 10:25:51'),
(34, 'Leonard.Dudley_2039', 'Leonard.Dudley_2039@test.com', 'Leonard', 'Dudley', 'Egypt', '125477400', '821535192f3ba4a5e5cfecbcb6464185', 'yD4OHhmA', '0000-00-00', 0, 0, '2014-08-26 10:25:51'),
(35, 'Lida.Ebonie_9750', 'Lida.Ebonie_9750@test.com', 'Lida', 'Ebonie', 'Egypt', '912751940', 'fc1153812352d9ec7a6b2afda46c49ff', 'nIjP1xa0', '0000-00-00', 1, 1, '2014-08-26 10:25:51'),
(36, 'Genaro.Dwight_2962', 'Genaro.Dwight_2962@test.com', 'Genaro', 'Dwight', 'Egypt', '509521189', '0f0d69ddafc87675c3427c641463e137', 'ePxWMcz4', '0000-00-00', 0, 0, '2014-08-26 10:25:51'),
(37, 'Maia.Shaquita_3282', 'Maia.Shaquita_3282@test.com', 'Maia', 'Shaquita', 'Egypt', '598459757', '8b98c4c60fcbd29be9c111d747bff87f', 'mlA3A7Ho', '0000-00-00', 0, 1, '2014-08-26 10:25:51'),
(38, 'Alda.Trisha_3696', 'Alda.Trisha_3696@test.com', 'Alda', 'Trisha', 'Egypt', '79787054', '953ca02e2db3954725df47428fe4ee08', 'P0hFV97A', '0000-00-00', 1, 1, '2014-08-26 10:25:51'),
(39, 'Silvana.Jolie_7806', 'Silvana.Jolie_7806@test.com', 'Silvana', 'Jolie', 'Egypt', '70438355', '0cb54d8c3bb7bf9ef2191e234b4927d9', 'D3ozR40Y', '0000-00-00', 0, 1, '2014-08-26 10:25:51'),
(40, 'Rachell.Kristi_5143', 'Rachell.Kristi_5143@test.com', 'Rachell', 'Kristi', 'Egypt', '835887360', '2ec6b3084c1216c66b0a02b62ea43927', 'BW2AZ0qn', '0000-00-00', 0, 0, '2014-08-26 10:25:51'),
(41, 'Raul.Charley_8557', 'Raul.Charley_8557@test.com', 'Raul', 'Charley', 'Egypt', '40611349', '6cefc8e1e63dfe9a2af6fe24777da1b9', 'DKHXWR0c', '0000-00-00', 0, 1, '2014-08-26 10:25:51'),
(42, 'Mike.Dwight_107', 'Mike.Dwight_107@test.com', 'Mike', 'Dwight', 'Egypt', '811648741', '440dcd4a3cc1429b1f01ae27178ddbd5', 'HUrOp5V3', '0000-00-00', 0, 1, '2014-08-26 10:25:51'),
(43, 'Ward.Edgar_9645', 'Ward.Edgar_9645@test.com', 'Ward', 'Edgar', 'Egypt', '908954581', 'ba0f83404147db961e2cbda004fa87b3', 'miVUN2fO', '0000-00-00', 1, 1, '2014-08-26 10:25:51'),
(44, 'Blythe.Marylouise_736', 'Blythe.Marylouise_736@test.com', 'Blythe', 'Marylouise', 'Egypt', '537574304', 'c3dcce2cdf36c41d5d96e411ce9722bd', 'gU4dP1eF', '0000-00-00', 0, 0, '2014-08-26 10:25:51'),
(45, 'Yahaira.Madelaine_2344', 'Yahaira.Madelaine_2344@test.com', 'Yahaira', 'Madelaine', 'Egypt', '500488062', '1573d6aadf66b246f90361f0a31c752b', 'L0t6IcTX', '0000-00-00', 0, 0, '2014-08-26 10:25:51'),
(46, 'Jesica.Lavonda_8805', 'Jesica.Lavonda_8805@test.com', 'Jesica', 'Lavonda', 'Egypt', '754912545', '6a8a17e707a220b4e6e7acd11c57b01f', 'b8bi6gAb', '0000-00-00', 0, 1, '2014-08-26 10:25:51'),
(47, 'Arletta.Aline_5020', 'Arletta.Aline_5020@test.com', 'Arletta', 'Aline', 'Egypt', '767045585', '72b30e9311d66cf7a3c3eca2d4ab9bf3', 'fENOG4k5', '0000-00-00', 0, 0, '2014-08-26 10:25:51'),
(48, 'Rhonda.Floretta_3613', 'Rhonda.Floretta_3613@test.com', 'Rhonda', 'Floretta', 'Egypt', '1026936', '8d9e1bc64737c68651812b294c0e6bd7', 'tBEBROLP', '0000-00-00', 1, 1, '2014-08-26 10:25:52'),
(49, 'Lida.Katherine_2424', 'Lida.Katherine_2424@test.com', 'Lida', 'Katherine', 'Egypt', '97649841', 'e4e86e3365a29ef2ff6498606c1548e9', 'DicgH7QT', '0000-00-00', 0, 0, '2014-08-26 10:25:52'),
(50, 'Kristopher.Matthew_8873', 'Kristopher.Matthew_8873@test.com', 'Kristopher', 'Matthew', 'Egypt', '608137155', '46c2ae5c4626bc28c93a2aebeec06fd9', 'dohPNGdb', '0000-00-00', 0, 0, '2014-08-26 10:25:52'),
(51, 'Lizzie.Shira_2820', 'Lizzie.Shira_2820@test.com', 'Lizzie', 'Shira', 'Egypt', '613125408', '2f59c42c977c9e5b1cc4503f8747a337', 'fhp6eJOZ', '0000-00-00', 0, 1, '2014-08-26 10:25:52'),
(52, 'Ranee.Floretta_4656', 'Ranee.Floretta_4656@test.com', 'Ranee', 'Floretta', 'Egypt', '201390759', 'f01ba47fc3546854f5f7fa3ad1e9828b', 'WaKWLP7a', '0000-00-00', 0, 1, '2014-08-26 10:25:52'),
(53, 'Jung.Ena_1325', 'Jung.Ena_1325@test.com', 'Jung', 'Ena', 'Egypt', '287090149', '541b9098cd6a59531c67249c0202c18e', 'UNT0uEkv', '0000-00-00', 1, 0, '2014-08-26 10:25:52'),
(54, 'Marybelle.Luba_6999', 'Marybelle.Luba_6999@test.com', 'Marybelle', 'Luba', 'Egypt', '370075373', '0e3630033d76d03a3341632c39c56d14', 'k00OgkPI', '0000-00-00', 1, 0, '2014-08-26 10:25:52'),
(55, 'Elise.Marhta_3568', 'Elise.Marhta_3568@test.com', 'Elise', 'Marhta', 'Egypt', '912331141', 'bdf78b9e12f9b77955f5304ddc57a39f', 'Z4nuZFiZ', '0000-00-00', 1, 0, '2014-08-26 10:25:52'),
(56, 'Berta.Cecila_815', 'Berta.Cecila_815@test.com', 'Berta', 'Cecila', 'Egypt', '106399621', '6825469ffba31bc4c7ffa09eaec92719', 'ddAF72yA', '0000-00-00', 1, 1, '2014-08-26 10:25:52'),
(57, 'Damion.Mitch_1324', 'Damion.Mitch_1324@test.com', 'Damion', 'Mitch', 'Egypt', '631014720', '0220270c4b817b04ec28f73e406c1c90', 'vlekeJb7', '0000-00-00', 1, 1, '2014-08-26 10:25:52'),
(58, 'Merle.Rayford_6167', 'Merle.Rayford_6167@test.com', 'Merle', 'Rayford', 'Egypt', '942491648', '620f55600e30ced04925fc915a227218', 'XydMrsng', '0000-00-00', 0, 0, '2014-08-26 10:25:52'),
(59, 'Hank.Jamey_4982', 'Hank.Jamey_4982@test.com', 'Hank', 'Jamey', 'Egypt', '760952068', '5da40512f51011e74f2fcd47af6c79c7', '2WjySrpv', '0000-00-00', 0, 1, '2014-08-26 10:25:52'),
(60, 'Hugh.Colton_2024', 'Hugh.Colton_2024@test.com', 'Hugh', 'Colton', 'Egypt', '301025624', '4367ba3142f8d254b26ee7a3f4279cc1', 'zQ1beqrT', '0000-00-00', 1, 1, '2014-08-26 10:25:52'),
(61, 'Gregorio.Porfirio_769', 'Gregorio.Porfirio_769@test.com', 'Gregorio', 'Porfirio', 'Egypt', '304713442', 'c18d699f6000027cdc9cabad960048e6', 'UTXe0bBo', '0000-00-00', 0, 1, '2014-08-26 10:25:52'),
(62, 'Yee.Joselyn_7812', 'Yee.Joselyn_7812@test.com', 'Yee', 'Joselyn', 'Egypt', '52114406', 'aa51cd92f94c21b69bb32f17ea24fd56', 'Kd8owbpA', '0000-00-00', 1, 0, '2014-08-26 10:25:52'),
(63, 'Odis.Ward_7404', 'Odis.Ward_7404@test.com', 'Odis', 'Ward', 'Egypt', '696336588', 'c9dc99742aae7b75b537c7eb72b832ad', 'LszYvJWm', '0000-00-00', 1, 0, '2014-08-26 10:25:52'),
(64, 'Blossom.Elise_5320', 'Blossom.Elise_5320@test.com', 'Blossom', 'Elise', 'Egypt', '92521573', 'a4094d255e9e46e2d7ffe284a24922f5', '7uQ6FRRv', '0000-00-00', 1, 1, '2014-08-26 10:25:52'),
(65, 'Erin.Wally_4843', 'Erin.Wally_4843@test.com', 'Erin', 'Wally', 'Egypt', '895609493', '9514d989448f650ee0358aefb2c27321', 'w6kzqwsS', '0000-00-00', 0, 0, '2014-08-26 10:25:52'),
(66, 'Rashida.Alysha_203', 'Rashida.Alysha_203@test.com', 'Rashida', 'Alysha', 'Egypt', '597356998', 'd91404afe06654b78f677a147512e1e9', 'dOXpuN6d', '0000-00-00', 1, 1, '2014-08-26 10:25:52'),
(67, 'Marylouise.Gladis_9990', 'Marylouise.Gladis_9990@test.com', 'Marylouise', 'Gladis', 'Egypt', '68525887', 'b55c67a3bf6e8389249d37db4672a3f7', 'gRUipS4J', '0000-00-00', 0, 1, '2014-08-26 10:25:52'),
(68, 'Toya.Phung_1449', 'Toya.Phung_1449@test.com', 'Toya', 'Phung', 'Egypt', '12218573', '1030b44b848b079dea5577bde63fbcb8', 'G2cqs3GA', '0000-00-00', 1, 0, '2014-08-26 10:25:53'),
(69, 'Elijah.Kirk_9308', 'Elijah.Kirk_9308@test.com', 'Elijah', 'Kirk', 'Egypt', '251412736', '668c4721c1a6e82cd97508bea2b9b435', 'BR3pq5kD', '0000-00-00', 1, 0, '2014-08-26 10:25:53'),
(70, 'Renda.Bertha_1325', 'Renda.Bertha_1325@test.com', 'Renda', 'Bertha', 'Egypt', '567593304', '02a64667c463f9e80d0e6ed2b1493835', 'DJB65Qpz', '0000-00-00', 1, 1, '2014-08-26 10:25:53'),
(71, 'Blake.Orlando_5814', 'Blake.Orlando_5814@test.com', 'Blake', 'Orlando', 'Egypt', '793418294', '9d2ab022cf74946bb81c390ecda2ea03', 'uXNwK6Lo', '0000-00-00', 1, 0, '2014-08-26 10:25:53'),
(72, 'Viola.Nathalie_4223', 'Viola.Nathalie_4223@test.com', 'Viola', 'Nathalie', 'Egypt', '965011503', 'fb5724b88eeeb954a38cbe1eb9b5aaa0', 'LiI6x4hm', '0000-00-00', 0, 1, '2014-08-26 10:25:53'),
(73, 'Collin.Mel_2449', 'Collin.Mel_2449@test.com', 'Collin', 'Mel', 'Egypt', '309136242', '55547b132a587d7f749f512bbec70ac7', 'VNVg6sFQ', '0000-00-00', 1, 1, '2014-08-26 10:25:53'),
(74, 'Raymon.Cortez_2345', 'Raymon.Cortez_2345@test.com', 'Raymon', 'Cortez', 'Egypt', '460696459', '7bee5bc15e58bdc4e24fd5d7ba957804', 'ZqgTI0F6', '0000-00-00', 1, 0, '2014-08-26 10:25:53'),
(75, 'Collin.Raymon_2700', 'Collin.Raymon_2700@test.com', 'Collin', 'Raymon', 'Egypt', '840008509', '53d8b6343fee6912974718cf231dbe41', 'eakAXEia', '0000-00-00', 1, 1, '2014-08-26 10:25:53'),
(76, 'Ervin.Leonard_2283', 'Ervin.Leonard_2283@test.com', 'Ervin', 'Leonard', 'Egypt', '562146742', '8435f241ff652b80933eaca7961773a4', 'dSiGEoIN', '0000-00-00', 1, 0, '2014-08-26 10:25:53'),
(77, 'Andreas.Ali_3547', 'Andreas.Ali_3547@test.com', 'Andreas', 'Ali', 'Egypt', '39339275', '76b56eef69a50b4fa37b97df6cddcfad', '5YwSv7N8', '0000-00-00', 0, 0, '2014-08-26 10:25:53'),
(78, 'Evie.Debrah_5739', 'Evie.Debrah_5739@test.com', 'Evie', 'Debrah', 'Egypt', '577168424', '3dc0d92fe99383cfc5a99782874fd63e', 'GqOXeAwG', '0000-00-00', 1, 1, '2014-08-26 10:25:53'),
(79, 'Tempie.Lizzie_2416', 'Tempie.Lizzie_2416@test.com', 'Tempie', 'Lizzie', 'Egypt', '919509468', '957581d73b145f0e9640598a723d902a', 'Q5z2kc2q', '0000-00-00', 0, 1, '2014-08-26 10:25:53'),
(80, 'Lou.Jacques_4187', 'Lou.Jacques_4187@test.com', 'Lou', 'Jacques', 'Egypt', '995005398', '6df3e9025a3e1050603b2e0c1b0c29a4', 'bJcldFWu', '0000-00-00', 1, 1, '2014-08-26 10:25:53'),
(81, 'Rosann.Paola_404', 'Rosann.Paola_404@test.com', 'Rosann', 'Paola', 'Egypt', '601669716', '032c37fd767236230149838fe94bedd7', 'ES3DjyLM', '0000-00-00', 1, 1, '2014-08-26 10:25:53'),
(82, 'Fawn.Keira_8548', 'Fawn.Keira_8548@test.com', 'Fawn', 'Keira', 'Egypt', '125298148', 'd08c792c91fe2a71b50e1610f79f0744', '78dvEGYn', '0000-00-00', 1, 0, '2014-08-26 10:25:53'),
(83, 'Claude.Armando_9772', 'Claude.Armando_9772@test.com', 'Claude', 'Armando', 'Egypt', '34430011', '0b7ced57b019cb47071597d2de2660c3', 'K2BtK75T', '0000-00-00', 1, 1, '2014-08-26 10:25:53'),
(84, 'Ivory.Tomas_5204', 'Ivory.Tomas_5204@test.com', 'Ivory', 'Tomas', 'Egypt', '22743186', 'd2dd6da9da979c031d59de21d31ca293', 'jNXmJi5F', '0000-00-00', 0, 1, '2014-08-26 10:25:53'),
(85, 'Paola.Kristi_7884', 'Paola.Kristi_7884@test.com', 'Paola', 'Kristi', 'Egypt', '991910837', 'e3c54354acd7e30be539a5216593ab79', 'uJqEoe6H', '0000-00-00', 0, 1, '2014-08-26 10:25:53'),
(86, 'Miranda.Margot_5431', 'Miranda.Margot_5431@test.com', 'Miranda', 'Margot', 'Egypt', '644840163', '75ca1c18018489650e44a907773eb64e', '75QjVSD2', '0000-00-00', 0, 1, '2014-08-26 10:25:53'),
(87, 'Milo.Lewis_1429', 'Milo.Lewis_1429@test.com', 'Milo', 'Lewis', 'Egypt', '687732267', '0209526e714650b13448da4c6b44881f', 'DHzDPlCM', '0000-00-00', 0, 1, '2014-08-26 10:25:53'),
(88, 'Nathalie.Kristi_9194', 'Nathalie.Kristi_9194@test.com', 'Nathalie', 'Kristi', 'Egypt', '225220872', 'c11de1111499c6a34693f99926aa707d', 'D8GyTaBl', '0000-00-00', 0, 0, '2014-08-26 10:25:53'),
(89, 'Nolan.Miguel_6049', 'Nolan.Miguel_6049@test.com', 'Nolan', 'Miguel', 'Egypt', '4808941', 'd4ad323b2d51d7622ee990a9c9b5c2ac', 'U2y3l2A6', '0000-00-00', 0, 0, '2014-08-26 10:25:54'),
(90, 'Jayson.Raymon_1594', 'Jayson.Raymon_1594@test.com', 'Jayson', 'Raymon', 'Egypt', '896122572', '1302308be30a380e8e6f13d0d30b18e6', 'vZ8ATjdH', '0000-00-00', 1, 0, '2014-08-26 10:25:54'),
(91, 'Lezlie.Fransisca_8058', 'Lezlie.Fransisca_8058@test.com', 'Lezlie', 'Fransisca', 'Egypt', '543172331', 'a9e3852b84623614c48fd3fde6409fbe', 'ZhcHtlE5', '0000-00-00', 1, 1, '2014-08-26 10:25:54'),
(92, 'Erich.Cedric_2539', 'Erich.Cedric_2539@test.com', 'Erich', 'Cedric', 'Egypt', '990205947', '874465b7f7bf4e8e88697e4b79d55507', 'xkh6ID6s', '0000-00-00', 1, 0, '2014-08-26 10:25:54'),
(93, 'Willie.Elijah_489', 'Willie.Elijah_489@test.com', 'Willie', 'Elijah', 'Egypt', '259272562', '9f5c8173e51fd1f047226f86d0107519', 'TNQZTBgn', '0000-00-00', 1, 0, '2014-08-26 10:25:54'),
(94, 'Ward.Harrison_7463', 'Ward.Harrison_7463@test.com', 'Ward', 'Harrison', 'Egypt', '484918997', '978eca21c52c9e0d9a5a50b5022f1107', 'crVX4YCR', '0000-00-00', 1, 1, '2014-08-26 10:25:54'),
(95, 'Floretta.Ranee_2675', 'Floretta.Ranee_2675@test.com', 'Floretta', 'Ranee', 'Egypt', '255816506', '6104070ad085a9d5f14983aab566c028', '3QUbDBdW', '0000-00-00', 0, 0, '2014-08-26 10:25:54'),
(96, 'Lelia.Marybelle_9926', 'Lelia.Marybelle_9926@test.com', 'Lelia', 'Marybelle', 'Egypt', '842579711', 'bc0f8eb78bb7e746ca65f54ee4913590', 'mQyyOM2w', '0000-00-00', 0, 0, '2014-08-26 10:25:54'),
(97, 'Royal.Teodoro_9206', 'Royal.Teodoro_9206@test.com', 'Royal', 'Teodoro', 'Egypt', '165450818', 'ae19e83737501701033d91993bb74719', 'csPZ5ro5', '0000-00-00', 1, 0, '2014-08-26 10:25:54'),
(98, 'Ling.Shira_1127', 'Ling.Shira_1127@test.com', 'Ling', 'Shira', 'Egypt', '825735219', '4cc435d223d7f90a8d9dbc08e0102c8e', 'stTdNU7K', '0000-00-00', 1, 0, '2014-08-26 10:25:54'),
(99, 'Miguel.Foster_458', 'Miguel.Foster_458@test.com', 'Miguel', 'Foster', 'Egypt', '557437443', '29305a7ae453aa7e176bff4a1ee4c684', 'NqaLy16Z', '0000-00-00', 1, 1, '2014-08-26 10:25:54'),
(100, 'Alfredo.John_1938', 'Alfredo.John_1938@test.com', 'Alfredo', 'John', 'Egypt', '963953273', '0c44d68d72e5bec92400911da14a46ff', 'UQQq29LN', '0000-00-00', 1, 0, '2014-08-26 10:25:54'),
(101, 'Maia.Gita_4077', 'Maia.Gita_4077@test.com', 'Maia', 'Gita', 'Egypt', '605390174', 'c42520a12fd0a971d077cb51be6a1f38', 'xjXGnWex', '0000-00-00', 0, 0, '2014-08-26 10:25:54'),
(102, 'Buddy.Garrett_7780', 'Buddy.Garrett_7780@test.com', 'Buddy', 'Garrett', 'Egypt', '261121595', '72ca0514cabbc68762c2f9a11cfa17b6', 'nnPvtuYu', '0000-00-00', 0, 0, '2014-08-26 10:25:54'),
(103, 'Lizzie.Malka_8364', 'Lizzie.Malka_8364@test.com', 'Lizzie', 'Malka', 'Egypt', '192101434', '2688cde4cb00fa5bf82d9e2f1532fea9', 'TIU1HhDG', '0000-00-00', 0, 1, '2014-08-26 10:25:54'),
(104, 'testuser', 'test@user.com', 'testing', 'ama', 'asmsms', '0101010', '0920798651a9462dc4110bde8eb112d5', '49oWEjGs', '0000-00-00', 0, 0, '2014-08-26 15:05:04'),
(105, 'amrahmed', 'amr@amr.com', 'Amr', 'Ahmed', 'Cairo', '0100000000', 'cdd1db321ee3731888092fcbac306557', 'TWw4mptZ', '0000-00-00', 0, 0, '2014-08-31 13:50:52'),
(106, 'shshshshshsh', 'amamaR2@msms.com', 'sjsjsjss', 'shshshsh', 'hshs', 'hsh', '4a28d68c7abd5b2ea427ae2e99a3290b', 'EIjq978a', '0000-00-00', 0, 0, '2014-09-07 12:00:54'),
(107, 'amrtest', 'hello@test.com', 'Amr', 'Bakr', 'Egypt', '01002090035', 'a1b7c22d16eb56962a3a112aca290d6d', 'I0uVH0mo', '0000-00-00', 0, 0, '2014-09-09 13:28:20'),
(108, 'saraaaa', 'saranahal@aucegypt.edu', 'sara', 'nahal', 'Egypt', '201207663557', '5da10592858ea8b91418894aa23eacf7', 'aaBJjQ8S', '1991-05-30', 1, 0, '2014-10-13 15:53:05'),
(109, 'saranahal', 'saranahal@aucegypt.edu', 'sara', 'nahal', 'egypt', '00201234567890', '19822e94f2142a3d45705c06ceccfffc', 'SrJLsiF8', '1991-05-03', 0, 0, '2014-10-19 13:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_favorites`
--

CREATE TABLE `user_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `property_id` (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_favorites`
--

INSERT INTO `user_favorites` (`id`, `user_id`, `property_id`, `date_joined`) VALUES
(1, 2, 210479, '2014-10-27 12:27:10'),
(3, 2, 210480, '2014-10-27 21:32:13'),
(4, 2, 210462, '2014-10-27 21:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_newsletter`
--

CREATE TABLE `user_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_identifier` varchar(255) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_newsletter`
--

INSERT INTO `user_newsletter` (`id`, `user_identifier`, `date_joined`) VALUES
(1, '105', '2014-08-31 13:50:52'),
(4, '2', '2014-08-31 14:13:33'),
(7, 'test@test.com', '2014-08-31 14:35:14'),
(8, 'amr@amr.com', '2014-08-31 14:35:32'),
(20, '', '2014-11-02 09:49:00'),
(21, '', '2014-11-02 09:52:00'),
(22, 'sara@test.com', '2014-11-02 09:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_property_alert`
--

CREATE TABLE `user_property_alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_identifier` varchar(255) NOT NULL,
  `property_data` varchar(500) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user_property_alert`
--

INSERT INTO `user_property_alert` (`id`, `user_identifier`, `property_data`, `date_joined`) VALUES
(5, '2', 'city=''Cairo'',district=''Maadi'',type=''Building''', '2014-08-31 12:28:34'),
(8, 'amr@amr.com', 'city=''Giza'',district=''Maadi'',type=''Apartment''', '2014-08-31 12:29:02'),
(9, 'amr2@amr.com', 'city=''Giza'',district=''Maadi'',type=''Apartment''', '2014-08-31 12:29:03'),
(10, 'amr1111@amr.com', 'city=''Giza'',district=''Maadi'',type=''Apartment''', '2014-08-31 12:29:06'),
(11, 'sara@sara.com', 'city=''Giza'',district=''Maadi'',type=''Apartment''', '2014-08-31 12:29:12'),
(12, 'test@test.com', 'city=''Giza'',district=''Maadi'',type=''Apartment''', '2014-08-31 12:29:19'),
(15, '2', 'city=''Alexandria'',district=''Maadi'',type=''Office'',price=''250000 - 500000'',area=''130 - 150 m2''', '2014-08-31 13:07:19'),
(16, '2', 'city=''Mahala'',district=''Mohandeseen'',type=''Apartment'',price=''1000000 - 2000000'',area=''50 - 100 m2''', '2014-08-31 13:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_validation`
--

CREATE TABLE `user_validation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(40) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_validation`
--

INSERT INTO `user_validation` (`id`, `user_id`, `email`, `token`, `is_valid`, `date_joined`, `type`) VALUES
(1, 106, 'amama2222R2@msms.com', 'c74767ee42763a476bd76e326e39df1024c931ef', 1, '2014-09-07 12:01:10', 0),
(3, 108, 'saranahal@aucegypt.edu', 'bdf29190d9d0c34c35e78ddb166825b338c8eef1', 1, '2014-10-13 15:53:06', 1),
(4, 109, 'saranahal@aucegypt.edu', 'c0e872a74e16e3340af46b2c34634b586b3b5a42', 1, '2014-10-19 13:50:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `end_date` date NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name_ar` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description_ar` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `name`, `description`, `end_date`, `date_joined`, `name_ar`, `description_ar`) VALUES
(1, 'Computer Science', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-09-03', '2014-09-02 12:30:14', '', ''),
(2, 'Marketing', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-09-18', '2014-09-02 12:30:14', '', ''),
(3, 'Design', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-10-03', '2014-09-02 12:30:14', '', ''),
(4, 'Accounting', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-10-18', '2014-09-02 12:30:14', '', ''),
(5, 'Developer', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-11-02', '2014-09-02 12:30:14', '', ''),
(6, 'Technical', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-11-17', '2014-09-02 12:30:14', '', ''),
(7, 'Customer Support', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-12-02', '2014-09-02 12:30:14', '', ''),
(8, 'Security', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-12-17', '2014-09-02 12:30:14', '', ''),
(9, 'Engineer', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-01-01', '2014-09-02 12:30:15', '', ''),
(10, 'Art', 'Lorem ipsum dolor sit amet, ex sed partem prompta, ne usu altera maluisset consetetur. Ex vel corpora mnesarchum, te fastidii epicurei qui, ad vidit omnis convenire vel. Qui suas error choro id, nonumy lucilius iudicabit eum et. An per quis vituperatoribus. Utroque veritus mea cu, cum quod mazim ei.', '2014-01-16', '2014-09-02 12:30:15', '', ''),
(11, 'Other', 'Other', '0000-00-00', '2014-09-02 14:29:49', '', ''),
(12, 'name', 'description', '0000-00-00', '2014-09-09 12:18:08', 'الأسم', 'وصف'),
(13, 'vacancy 1', '<p>Lorem ipsum dolor sit amet, etiam audire in est, et his sint maiorum voluptua. Nam dico nostrum ex, te vis labore fabulas urbanitas. Saepe reprehendunt vim ad, error urbanitas qui at, eos posse possit phaedrum te. Et eos omittam accusamus, te vis prompta suavitate delicatissimi. Inermis maiorum epicurei ea mea, scripta accusata consequat an vel.</p>\n\n<p>Vix delenit facilisis at. Magna veritus incorrupte sit ex. His id quaerendum reformidans, his graeci doctus pertinax cu. Altera graeci senser', '0000-00-00', '2014-11-06 14:47:53', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_image`
--
ALTER TABLE `property_image`
  ADD CONSTRAINT `property_image_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD CONSTRAINT `user_favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
