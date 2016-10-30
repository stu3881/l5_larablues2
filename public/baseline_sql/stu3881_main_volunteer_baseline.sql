-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2015 at 12:46 PM
-- Server version: 5.5.41
-- PHP Version: 5.4.39-1+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stu3881_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE IF NOT EXISTS `volunteer` (
  `v_index` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `v_name` varchar(100) DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `v_phone` varchar(100) DEFAULT '',
  `v_member` varchar(5) DEFAULT '?',
  `v_flag` tinyint(4) NOT NULL DEFAULT '1',
  `v_assign` varchar(100) DEFAULT '',
  `v_notes` varchar(100) DEFAULT '',
  PRIMARY KEY (`v_index`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=228 ;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`v_index`, `v_name`, `email`, `v_phone`, `v_member`, `v_flag`, `v_assign`, `v_notes`) VALUES
(200, 'Jane Smith', 'janiesmith@cox.net', '682-9607', 'life', 0, 'x', 'Scotts w'),
(2, 'Arturo Rifenburg', 'arifeapa@yahoo.com', '', 'life', 0, '', ''),
(6, 'Bob and Traci Pitts', 'bugdiver1@yahoo.com', '', 'life', 0, '', 'solid, reliable helpers'),
(7, 'Bettie Weiss', 'bweiss@SantaBarbaraCA.gov', '', 'life', 0, '', '1st shift merchandise or membership'),
(8, 'Connie Booton', 'cbooton@co.slo.ca.us', '', 'no', 0, '', 'member SLO BS, incoming president'),
(9, 'Christine Owens', 'cdanger@cox.net', '', 'no', 0, '', 'membership expired 3/29/04'),
(11, 'David Mollkoy', 'cmollkoy@aol.com', '', 'life', 0, '', 'Wife is Cathy'),
(12, 'Cathy Mollkoy', 'cmollkoy@sbch.org', '', 'life', 0, '', 'Husband is David'),
(13, 'Daniel Simon', 'danielkentsimon@cs.com', '', 'life', 0, '', ''),
(14, 'Rockey', 'djrockey@gmail.com', '', '', 0, '', ''),
(15, 'Fred Silsbee', 'FSilsbee@aol.com', '965-6586', 'life', 0, '', 'prefers 1st bar shift'),
(16, 'Randall Kempf', 'goleta@msn.com', '', 'life', 0, '', ''),
(17, 'Brad & Greta Liedke', 'h2obugbrad@aol.com', '967-8291', 'life', 0, '', ''),
(18, 'Charlene Anderson', 'charlene927@verizon.net', '', 'no', 0, '', 'not even on mailing list x'),
(20, 'Janie Arnold', 'Janie [jarnold@typecraft.com]', '331 3274 (cell)', 'life', 0, '', 'old email is momcat17@cox.net'),
(21, 'Lee Brown', 'jetandlee@charter.net', '', 'life', 0, '', 'lives in Ventura'),
(22, 'Jill Yeomans', 'jillyeom@silcom.com', '', 'life', 0, '', ''),
(23, 'Judy Klein', 'jklein@vetronix.com', '', 'life', 0, '', ''),
(24, 'Joanna Hulse', 'joannahulce@yahoo.com', '', 'no', 0, '', 'not even on mailing list'),
(25, 'Ken Brown', 'kcbrown@raytheon.com', '', 'life', 0, '', ''),
(29, 'Lorraine Cass', 'lcgram3@yahoo.com', '450-0241', 'life', 0, '', ''),
(30, 'Laura Ericson', 'lericson1@cox.net', '683-2854', 'life', 0, '', 'CD/Raffle Sales'),
(31, 'Louis Andaloro', 'louis@silcom.com', '966-7363', 'v_mem', 0, '', 'friend of Barry'),
(187, 'Caitlin Coad', 'caitlincoad@umail.ucsb.edu', '', '', 0, '', 'Potential UCSB liaison'),
(33, 'Matthew Berger', 'matthewb@mbergerlaw.com', '', 'life', 0, '', 'Wife, Madelyn Swed'),
(34, 'Merle Betz', 'merlebetz@hotmail.com', '', 'life', 0, '', ''),
(35, 'Pam Libera', 'pamlib@gmail.com', '688-0285', 'life', 0, '', 'lives in Solvang'),
(36, 'Paul Goodwin', 'pgoodwin14@cox.net', '', 'life', 0, '', ''),
(37, 'Penelope Tinker', 'ptinker@ci.santa-barbara.ca.us', '', 'life', 0, '', ''),
(38, 'Peter Stone', 'recvry@msn.com', '', 'life', 0, '', ''),
(39, 'Richard Glass', 'rglass@fcbank.com', '', 'life', 0, '', ''),
(40, 'Roger House', 'roger.house@sbcglobal.net', '', 'life', 0, '', 'lives in Ojai'),
(41, 'Ross Emery', 'rossemery@sbcglobal.net', '', 'life', 0, '', 'lives in Ventura'),
(42, 'Steve Espinoza', 'sespinoza11@yahoo.com', '', 'life', 0, '', ''),
(43, 'Sharon Stanwick', 'reddragonfly@sbcglobal.net', '640-8454', 'life', 0, '', 'previously Seiders,  1st shift bar'),
(48, 'Madelyn Swed', 'Swedlight@aol.com', '', 'life', 0, '', ''),
(49, 'Sally Swift', 'swiftsally@hotmail.com', '', 'no', 0, '', ''),
(50, 'Todd Howell', 'thowell@tharpe-howell.com', '', 'life', 0, '', 'works with son Josh, 1st shift ticket sales'),
(51, 'Sharon Smith', 'thp4you@yahoo.com', '455-9688', 'life', 0, '', ''),
(52, 'Toni Kiraly', 'tonikiraly@cox.net', '689-7976', 'life', 0, '', 'likes to work at raffle table'),
(53, 'Marcia Boudreaux', 'toon_child@yahoo.com', '766-0999', 'life', 0, '', 'Wife of Leo, 1st shift bar'),
(55, 'Wayne & Kathy Wilcox', 'WWilcox990@aol.com', '', 'no', 0, '', 'set up crew, on mailing list'),
(57, 'Dave Bettles', 'davebettles@aol.com', '649-9091', 'life', 0, '', 'lives in Ojai'),
(58, 'Gary Brayton', 'gbrayton@cox.net', '453-0007', 'life', 0, '', ''),
(60, 'Erika Smith', 'usherucsb@yahoo.com', '682-1165', 'life', 0, '', 'usually works memberhsip w/ Leslie'),
(61, 'Barbara Newman', '', '965-5055', 'no', 0, '', 'not on list, no money, membership'),
(63, 'Anthony Perez', '', '451-1230', 'no', 0, '', 'membership expired 10/15/06, joined as annual on 10/24/05, no email'),
(201, 'Julie Lewis', 'deliad805@gmail.com', '', 'yes', 0, '', ''),
(66, 'Wendy Schumer', 'wendyss@aol.com', '', 'life', 0, '', 'wendy.schumer@hp.com'),
(67, 'Mike Weissman', 'mike@weissman.org', '', 'yes', 0, '', ''),
(69, 'Michal Lynch', 'michalcathy@cox.net', '', 'no', 0, '', ''),
(71, 'John Skovmand', 'john@seebers.com', '687-1908', 'life', 0, '', 'Board Member & Wife'),
(72, 'Margaret Connor', 'connors@nceas.ucsb.edu', '566-4755', 'yes', 0, '', 'Carpinteria'),
(73, 'Michele DeCant', 'mdc8907@cox.net', '895-7051', 'life', 0, '', 'SB'),
(74, 'Siena DiFrancesco', 'sweetladysiena@aol.com', '453-8067', 'yes', 0, '', 'SB'),
(78, 'Paul K.Sharp', '', '656-4330/218-8213', 'yes', 0, '', 'Member in Ventura'),
(79, 'Melinda Neely', '', '884-1039', 'no', 0, '', ''),
(80, 'Larry Padilla', '', '455-7916', 'life', 0, '', ''),
(81, 'Frank Yates', '', '637-4330', 'no', 0, '', '563-0597'),
(84, 'Amy Lee', '', '637-4218', 'no', 0, '', ''),
(85, 'Bobby Lara', '', '569-0458', 'no', 0, '', ''),
(0, 'Jim Barmore', '', '276-5919', 'life', 0, 'deh', 'Santa Paula'),
(91, 'Robert Fratrick', 'freestonepeach@cox.net', '', 'no', 0, '', ''),
(92, 'Nancy Peka', 'npeka@cox.net', '', 'no', 0, '', ''),
(94, 'Laura Dewey', 'lgdcfls@west.net', '966-7949', 'life', 0, '', '637-0768'),
(96, 'Clyde Hudson', 'clydetech@yahoo.com', '258-6375', 'yes', 0, '', ''),
(97, 'Karla Freeman', 'karla@magicofmidlife.com', '687-4260', 'yes', 0, '', ''),
(98, 'Charles Nicholson', 'chnmd@cox.net', '687-4902', 'life', 0, '', 'Board Member cell 895-0221'),
(99, 'Leslie Griffin', 'griffinl@sbcc.edu', '898-2032', 'life', 0, '', 'Board Member (on Sabbatical)'),
(100, 'Jim Cunningham', 'jamescunningham@cox.net', '680-2374', 'life', 0, '', 'Board Member'),
(101, 'Jeffrey Sipress', 'jghere@machinearts.com', '965-5344', 'life', 0, '', 'Board Member, Photographer'),
(103, 'Rosie Keller', 'keller.rosie@gmail.com', '965-1990', 'life', 0, '', 'Board Member'),
(104, 'Barry Keller', 'kyrrab.cal@verizon.net', '965-1990', 'life', 0, '', 'Board Member'),
(218, '', '', '', '', 0, '', ''),
(219, '', '', '', '', 0, '', ''),
(106, 'Leo Schumaker', 'leos_bluesland@yahoo.com', '766-0999', 'life', 0, '', 'Board Member'),
(107, 'Sharon Byrne', 'lsbyrne@cox.net', '453-3424', 'life', 0, '', 'Board Member'),
(108, 'Michael Meredith', 'mmeredith1@yahoo.com', '', 'life', 0, '', 'Board Member--5703800'),
(109, 'Bob Michaels', 'rmichaels70@cox.net', '964-7923', 'life', 0, '', 'Board Member-450-7606'),
(110, 'Steve Daniels', 'sdmdsb@cox.net', '966-2548', 'life', 0, '', 'Board Member'),
(111, 'Skip Willis', 'skip2go@yahoo.com', '966-0251', 'life', 0, '', 'Past Board Member'),
(113, 'Susan Soria', 'susansoria@cox.net', '687-1908', 'life', 0, '', 'Board Member'),
(114, 'Susan Soria', 'susansoria@verizon.net', '687-1908', 'life', 0, '', 'Board Member'),
(116, 'Dean Thomas', 'jester10@adelphia.net', '985-5247', 'yes', 0, '', ''),
(117, 'Michael Mead', 'michaelmead@cox.net', '895-9697', 'life', 0, '', ''),
(119, 'K.C. Hamann', 'hamann.kc@gmail.com', '914.309-0389', 'no', 0, '', ''),
(121, 'Rick Flora', 'qcoofsb@hotmail.com', '', 'life', 0, '', ''),
(122, 'Linda Grand', 'ldgrand@gmail.com', '898-9313', 'yes', 0, '', ''),
(123, 'Spencer Dean', 'hog65@aol.com', '681-1175', 'yes', 0, '', ''),
(124, 'Judith Hamilton', 'jhhphd@aol.com', '687-4902', 'yes', 0, '', ''),
(125, 'Mike Fogelsonger', 'mafsb@cox.net', '964-4037', 'yes', 0, '', ''),
(126, 'Dave Boynton', '', '689-8732', 'yes', 0, '', ''),
(127, 'David Rockey', 'djrockey@gmail.com.', '', '', 0, '', ''),
(128, 'Jim  & Lorinda McCurdy', 'lojas101@hotmail.com', '964-5628', 'life', 0, '', 'Jimmy Mac from KTYD'),
(129, 'Miriam Hospodar', 'scribblescribble@cox.net', '687-9960', '', 0, '', ''),
(131, 'Fred Dabby', 'freddabby@cox.net', '895--6026', 'life', 0, '', ''),
(134, 'Butchie Olmstead', 'ephone6@mindspring.com', '735-8125', 'life', 0, '', 'Lompoc, harp player, wheelchair, but independent'),
(135, 'Bill Alsup', 'bnlalsup@adelphia.net', '983-4738', 'life', 0, '', 'Oxnard'),
(139, 'Norman Skau', 'norman@peoplewhocare.com', '688-3197', 'life', 0, '', 'Solvang'),
(140, 'Chris & Dan Maggio', 'daniels.maggio@verizon.net', '934-3465', '', 0, '', 'From Avila Beach Blues show'),
(141, 'Dorothy Littlejohn', 'dlittlejohn1@cox.net', '', '', 0, '', 'From Avila Beach Blues show'),
(160, 'JD (Stephen) Ferrara', 'stephenferrara66@yahoo.com', '944-2240', '', 0, '', ''),
(168, 'Lillian Doner', 'lilsdoner@gmail.com', '898-1083', 'life', 0, '', ''),
(145, 'John Higginson', 'jhiggin3@ix.netcom.com', '450-0426', 'life', 0, '', ''),
(146, 'Rod Durham', 'rmdurham@cox.net', '569-2988', 'life', 0, '', ''),
(147, 'Michael Goldberg', 'calidrugalcoholrecovery@yahoo.com', '403-0378', '', 0, '', ''),
(191, 'Lola Paredes', 'dparedes1@hotmail.com', ' 698-8137', 'yes', 0, '', ''),
(149, 'Margie Basch', '', '569-6469', '', 0, '', ''),
(150, 'Daphne von Essen', 'daphneve@cox.net', '', 'life', 0, '', ''),
(151, 'Ken and Lori Rees', 'youkai@adelphia.net', '987-9128', 'life', 0, '', ''),
(156, 'Mark Gardner', 'markg51@hotmail.com', '981-8971', 'life', 0, '', 'From Oxnard--Kenny Sultan guitar guy'),
(152, 'Matt & Karen Furey', 'mattandada@sbcblobal.net', '', 'life', 0, '', ''),
(153, 'David Lawson', 'davilawson@gmail.com', '682-8369', 'yes', 0, '', 'Signed up at Nick Moss'),
(165, 'Jo Rogers', 'pawsy1@cox.net', '969-9725', 'life', 0, '', ''),
(162, 'R.J. Runjavac', 'slivovitx@hotmail.com', '687-1251', 'life', 0, '', ''),
(157, 'Daniel Lower', 'dianadaniel@cox.net', '966-7671', 'life', 0, '', 'guitar teacher for the Blues For Youth program'),
(158, 'Barbara Donahue', 'barbaradonahue@gmail.com', '', '', 0, '', 'From newsletter'),
(159, 'Barry White', 'barrydavidwhite@yahoo.com', '', '', 0, '', ''),
(163, 'Rob Allison', 'sbroballison@yahoo.com', '', 'yes', 0, '', ''),
(164, 'Tom & Renata Hundley', 'renatahundley@sbcglobal.net', ' 658-7446', 'yes', 0, '', 'wife\\''s email (Renata--life)'),
(173, 'Kathryn Denlinger', 'kdenlinger@msn.com', '964-3726', '', 0, '', 'also Michael Iuele'),
(175, 'Evan Grosswirth', 'Flight442@aol.com', '', 'life', 0, '', 'musician/Ventura'),
(194, 'Ana Perez', 'APerez@Tecolote.com', '', '', 0, '', ''),
(178, 'Michael Goodwin', 'mgoodwinsb@cox.net', '965-5642', '', 0, '', 'cell 895-8836'),
(182, 'Bonnie Rand', '', '969-4355', '', 0, '', 'Maybe'),
(185, 'Jeana Morelli', 'babydoll.jeana4@gmail.com', '962-5683', '', 0, '', ''),
(198, 'Diana Wilk', 'lupo@cox.net', '682-0171', 'life', 0, '', ''),
(192, 'Paul Tefft', 'tefftmech@msn.com', '207-9308', '', 0, '', ''),
(195, 'Kati Kiraly', 'kaitlyn_king@yahoo.com', '', 'life', 0, '', ''),
(224, 'RosieM Keller', 'keller.rosie@gmail.com', '', '?', 1, '', ''),
(206, '', 'sbroallison@yahoo.com', '', '?', 1, '', ''),
(225, '', '', '', '?', 1, '', ''),
(220, '', '', '', '', 0, '', ''),
(221, '', '', '', '', 1, '', ''),
(226, 'aaa', NULL, '', 'y', 1, '', 'znote'),
(227, 'aaab', NULL, '', 'y', 1, '', 'znote2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
