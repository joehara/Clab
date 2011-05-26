-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2011 at 05:58 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-1ubuntu9.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `LanguageC`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE IF NOT EXISTS `academic_year` (
  `Academic_id` int(11) NOT NULL AUTO_INCREMENT,
  `Academic_detail` int(20) NOT NULL,
  PRIMARY KEY (`Academic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`Academic_id`, `Academic_detail`) VALUES
(1, 2554);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'YWRtaW4=');

-- --------------------------------------------------------

--
-- Table structure for table `headlesson`
--

CREATE TABLE IF NOT EXISTS `headlesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson` int(10) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `hard` int(11) NOT NULL,
  `easy` int(11) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `headlesson`
--

INSERT INTO `headlesson` (`id`, `lesson`, `detail`, `hard`, `easy`, `time`) VALUES
(1, 1, 'การประกาศตัวแปร', 2, 2, '00:30:00'),
(2, 3, 'คำสั่งและเงื่อนไข', 1, 1, '00:30:00'),
(3, 4, 'การควบคุมทิศทางแบบวนรอบ', 1, 1, '00:10:00'),
(4, 7, 'ฟังค์ชั่นในภาษาซี', 1, 1, '00:30:00'),
(5, 6, 'พอยน์เตอร์', 1, 1, '00:30:00'),
(7, 5, 'อาร์เรย์และสตริงค์', 1, 1, '00:30:00'),
(6, 8, 'สตรัคเจอร์และยูเนียน', 1, 1, '00:30:00'),
(8, 2, 'การป้อนข้อมูลและการคำนวณทางคณิตศาสตร์ในภาษาซี', 1, 2, '00:20:00'),
(9, 9, 'การติดต่อกับแฟ้มข้อมูล', 0, 0, '00:00:00'),
(17, 10, 'count', 2, 0, '00:30:00'),
(18, 11, 'สวัสดีครับ', 1, 0, '01:00:00'),
(19, 12, 'สบายดีเปล่า', 0, 0, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `proposition`
--

CREATE TABLE IF NOT EXISTS `proposition` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `proposition` varchar(1000) NOT NULL,
  `help` varchar(1000) NOT NULL,
  `create_by` varchar(40) NOT NULL,
  `level` int(5) NOT NULL,
  `ref_lesson` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `proposition`
--

INSERT INTO `proposition` (`question_id`, `proposition`, `help`, `create_by`, `level`, `ref_lesson`) VALUES
(34, 'จงแสดงผลการหาร 5/4 และทศนิยม', '#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n//type your code here\r\nreturn 0;\r\n}', '', 0, 2),
(35, 'จงแสดงข้อความ OK', '#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n//type your code here;\r\n\r\nreturn 0;\r\n}', 'ครูซ่า ปราบขาโจ๋', 0, 1),
(27, 'จงแสดงข้อความ \n', '#include&lt;stdio.h&gt;\r\nint main(){\r\n                    //type your code here\r\nreturn 0;\r\n}', '', 0, 1),
(22, 'จงแสดงตัวเลข 10 เป็นชนิด float', '#include<stdio.h>\r\nint main(){\r\n                           //type your code\r\nreturn 0;\r\n}', '', 0, 1),
(23, 'จงแสดงผลการคำนวณ 5!', '#include<stdio.h>\r\nint main(){\r\n                 //type your code\r\n\r\nreturn 0;\r\n}', '', 0, 2),
(33, 'จงแสดงข้อความ I Love Thailand', '#include&lt;stdio.h&gt;\r\nint main(){\r\n                     //type you code here\r\nreturn 0;\r\n}', '', 1, 1),
(32, 'จงแสดงข้อความ I Love You', '#include&lt;stdio.h&gt;\r\nint main(){\r\n                 //type your code here\r\nreturn 0;\r\n}', '', 1, 1),
(21, 'จงแสดงข้อควม Hello World', '#include&lt;stdio.h&gt;\r\nint main(){\r\n                    //type your code\r\nreturn 0;\r\n}\r\n', '', 1, 1),
(36, 'จงแสดงข้อความ Yellow', '#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n\r\n//type your code here\r\n\r\nreturn 0;\r\n}', '', 0, 1),
(37, 'จงแสดงข้อความ KING', '#include&lt;stdio.h&gt;', '', 0, 1),
(38, 'จงแสดงตัวเลข 23', '#include&lt;stdio.h&gt;', '', 1, 1),
(39, 'จงแสดงผลการบวกเลข 4+5', '#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n          //type your code here\r\nreturn 0;\r\n}', '', 1, 2),
(40, 'จงแสดงผลการบวกเลข 4+8', '#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n             //type your code here\r\n\r\nreturn 0;\r\n}', '', 1, 2),
(41, 'จงแสดงคำว่า scholl', '#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\nprintf(&quot;scholl&quot;);\r\nreturn 0;\r\n}', '', 1, 2),
(42, '<p>\r\n	<span style="background-color: rgb(255, 140, 0);">จงแสดงข้อความ</span> <span style="color: rgb(0, 100, 0);"><strong><span style="font-size: 22px;">Hello World</span></strong></span>&nbsp;<span style="color: rgb(255, 0, 0);"><span style="font-size: 22px;"> 5</span></span> ครั้ง <img alt="enlightened" height="20" src="http://172.20.22.4/ckeditor/plugins/smiley/images/lightbulb.gif" title="enlightened" width="20" /></p>\r\n', '#include&lt;stdio.h&gt;\r\nint main( ){\r\n\r\nreturn 0;\r\n}', '', 1, 1),
(43, '<p>\r\n	จงเขียนโปรแกรมให้ทำการอ่านไฟล์จาก <strong><span style="font-size: 16px;"><span style="color: rgb(255, 0, 0);">notpad</span></span></strong></p>\r\n', '#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n//type your code here\r\nreturn 0;\r\n}\r\n        ', 'ชูพันธุ์ รัตนโภคา', 1, 1),
(44, '<p>\r\n	บทที่ 2 จงทำการบวกเลข 10 บวกกัน 10 ครั้ง</p>\r\n', '#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n//type your code here\r\nreturn 0;\r\n}\r\n        ', 'ชูพันธุ์ รัตนโภคา', 0, 2),
(45, '<p>\r\n	จงใช้วิธีการ for loop เพื่อทำการแสดงผล Hello 10 ครั้้ง</p>\r\n', '#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n//type your code here\r\nreturn 0;\r\n}\r\n        ', 'ชูพันธ์ รัตนโภคา', 1, 3),
(46, '<p>\r\n	การทำงานของเราในวันนนี้</p>\r\n', '&lt;p&gt;\r\n	#include&lt;stdio.h&gt; int main(){ //type your code here return 0; } &lt;/stdio.h&gt;&lt;/p&gt;\r\n', 'ครูซ่า ปราบขาโจ๋', 0, 4),
(47, '<p>\r\n	ก็ค่อยๆทำมันไปเรื่อยๆนะวันนี้</p>\r\n', '&lt;p&gt;\r\n	#include&lt;stdio.h&gt; int main(){ //type your code here return 0; } &lt;/stdio.h&gt;&lt;/p&gt;\r\n', 'ครูซ่า ปราบขาโจ๋', 0, 5),
(48, '<p>\r\n	อาจารย์ก็ยังไม่มา ไปเที่ยวไหนไม่รู้</p>\r\n', '&lt;p&gt;\r\n	#include&lt;stdio.h&gt; int main(){ //type your code here return 0; } &lt;/stdio.h&gt;&lt;/p&gt;\r\n', 'ครูซ่า ปราบขาโจ๋', 0, 6),
(49, '<p>\r\n	ฟังก์ชั่นเป็นยังไงหว่า มองแล้วก็ยัง งง</p>\r\n', '&lt;p&gt;\r\n	#include&lt;stdio.h&gt; int main(){ //type your code here return 0; } &lt;/stdio.h&gt;&lt;/p&gt;\r\n', 'ครูซ่า ปราบขาโจ๋', 0, 7),
(50, '<p>\r\n	เรื่อง สตัคเจอร์ก็ลืมไปนานแล้วว</p>\r\n', '&lt;p&gt;\r\n	#include&lt;stdio.h&gt; int main(){ //type your code here return 0; } &lt;/stdio.h&gt;&lt;/p&gt;\r\n', 'ครูซ่า ปราบขาโจ๋', 0, 8),
(51, '<p>\r\n	จงแสดงคำ Hello jaja</p>\r\n', '&lt;p&gt;\r\n	#include&lt;stdio.h&gt; int main(){ //type your code here return 0; } &lt;/stdio.h&gt;&lt;/p&gt;\r\n', 'ชูพันธุ์ รัตนโภคา', 0, 2),
(52, '<p>\r\n	จงแสดงความดีใจออกทางหน้าจอ</p>\r\n', '\r\n#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n//type your code here\r\nreturn 0;\r\n}\r\n        ', 'ชูพันธุ์ รัตนโภคา', 1, 3),
(53, '<p>\r\n	Hello World <img alt="" src="http://euro2008girls.com/pics/sexy-soccer_austrian-german-girls.jpg " style="width: 500px; height: 350px;" /></p>\r\n', '\r\n#include&lt;stdio.h&gt;\r\nint main(){\r\n\r\n//type your code here\r\nreturn 0;\r\n}\r\n        ', 'ชูพันธุ์ รัตนโภคา', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `random`
--

CREATE TABLE IF NOT EXISTS `random` (
  `random_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_question` int(11) NOT NULL,
  `ref_student` int(11) NOT NULL,
  PRIMARY KEY (`random_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `random`
--

INSERT INTO `random` (`random_id`, `ref_question`, `ref_student`) VALUES
(1, 36, 221),
(2, 39, 221),
(3, 21, 1),
(4, 33, 1),
(5, 37, 1),
(6, 27, 1),
(7, 40, 1),
(8, 23, 1),
(9, 45, 1),
(10, 46, 1),
(11, 47, 1),
(12, 48, 1),
(13, 49, 1),
(14, 50, 1),
(15, 38, 2),
(16, 33, 2),
(17, 37, 2),
(18, 27, 2),
(19, 21, 3),
(20, 38, 3),
(21, 27, 3),
(22, 37, 3),
(23, 40, 3),
(24, 23, 3),
(25, 45, 3),
(35, 46, 13),
(34, 45, 13),
(33, 51, 12),
(36, 51, 2),
(37, 40, 4),
(38, 51, 4),
(39, 34, 4);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(10) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`) VALUES
(1, 'ECT-T31'),
(2, 'ECT-X');

-- --------------------------------------------------------

--
-- Table structure for table `sendanswer`
--

CREATE TABLE IF NOT EXISTS `sendanswer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_question` int(11) NOT NULL,
  `ref_student` int(11) NOT NULL,
  `code` varchar(2000) NOT NULL,
  `time_answer` date NOT NULL,
  `teacher_check` varchar(255) NOT NULL,
  `code_comment` varchar(2000) NOT NULL,
  `result` int(11) NOT NULL,
  `check_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `sendanswer`
--

INSERT INTO `sendanswer` (`answer_id`, `ref_question`, `ref_student`, `code`, `time_answer`, `teacher_check`, `code_comment`, `result`, `check_date`, `status`) VALUES
(29, 40, 1, '#include<stdio.h>\r\nint main(){\r\n\r\n             //type your code here\r\n\r\nreturn 0;\r\n}', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '', 222, '2011-05-26', 1),
(30, 46, 1, '<p>\r\n	#include<stdio.h> int main(){ //type your code here return 0; } </stdio.h></p>\r\n', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '', 1, '2011-05-26', 1),
(27, 27, 1, '#include<stdio.h>\r\nint main(){\r\n                    //type your code here\r\nreturn 0;\r\n}', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '', 1, '2011-05-26', 1),
(28, 23, 1, '#include<stdio.h>\r\nint main(){\r\n                 //type your code\r\n\r\nreturn 0;\r\n}', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '', 1, '2011-05-26', 1),
(26, 21, 1, '#include<stdio.h>\r\nint main(){\r\n                    //type your code\r\nreturn 0;\r\n}\r\n', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '', 20, '2011-05-26', 1),
(31, 33, 1, '#include<stdio.h>\r\nint main(){\r\n                     //type you code here\r\nreturn 0;\r\n}', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '', 2, '2011-05-26', 1),
(32, 27, 2, '#include<stdio.h>\r\nint main(){\r\n                    //type your code here\r\nreturn 0;\r\n}', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '<p>\r\n	ห่วยเเตกกกกกกกกกกกกกกกกกก</p>\r\n<p>\r\n	จริงๆๆๆ นะ &lt;ได้เปล่า\n&gt;</p>\r\n', 5, '2011-05-26', 1),
(33, 33, 2, '#include<stdio.h>\r\nint main(){\r\n                     //type you code here\r\nreturn 0;\r\n}', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '', 1, '2011-05-26', 1),
(34, 37, 2, '#include<stdio.h>', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '<p>\r\n	fsdfsdfsdfsdfsdf</p>\r\n<p>\r\n	dsfsfdf</p>\r\n<p>\r\n	&lt;&lt;&lt;&lt; &gt;&gt;&gt;&gt;&gt;</p>\r\n', 2, '2011-05-26', 1),
(35, 38, 2, '#include<stdio.h>', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '', 1, '2011-05-26', 1),
(36, 51, 2, '<p>\r\n	#include<stdio.h> int main(){ //type your code here return 0; } </stdio.h></p>\r\n', '2011-05-26', 'ชูพันธุ์ รัตนโภคา', '', 2, '2011-05-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `code_st` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `section` varchar(10) NOT NULL,
  `year` int(20) NOT NULL,
  `teach` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `permission` int(11) NOT NULL,
  `st_reg` date NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `code_st`, `password`, `name`, `section`, `year`, `teach`, `email`, `phone`, `permission`, `st_reg`) VALUES
(1, '1', 'MTIzNA==', 'one one', 'ECT-T31', 2554, 'ชูพันธุ์ รัตนโภคา', 'one@bk.com', '66', 1, '2011-05-05'),
(2, '2', 'MTIzNA==', 'two two', 'ECT-T31', 2554, 'ชูพันธุ์ รัตนโภคา', 'two@bk.com', '66', 1, '2011-05-05'),
(3, '3', 'MTIzNA==', 'สาม สาม', 'ECT-T31', 2554, 'ชูพันธุ์ รัตนโภคา', '3@bk.com', '66', 1, '2011-05-05'),
(4, '4', 'MTIzNA==', 'สี่ สี่', 'ECT-T31', 2554, 'ชูพันธุ์ รัตนโภคา', '4@bk.com', '66', 1, '2011-05-05'),
(5, '5', 'MTIzNA==', 'ห้า ห้า', 'ECT-T31', 2554, 'ชูพันธุ์ รัตนโภคา', '5@bk.com', '66', 1, '2011-05-05'),
(6, '6', 'MTIzNA==', 'หก หก', 'ECT-T31', 2554, 'สมชาย ส่องช่วย', '6@bk.com', '66', 1, '2011-05-05'),
(7, '7', 'MTIzNA==', 'เจ็ด เจ็ด', 'ECT-T31', 2554, 'สมชาย ส่องช่วย', '7@bk.com', '66', 1, '2011-05-05'),
(8, '8', 'MTIzNA==', 'แปด แปด', 'ECT-T31', 2554, 'สมชาย ส่องช่วย', '8@bk.com', '66', 1, '2011-05-05'),
(9, '9', 'MTIzNA==', 'เก้า เก้า', 'ECT-T31', 2554, 'สมชาย ส่องช่วย', '9@bk.com', '66', 1, '2011-05-05'),
(10, '10', 'MTIzNA==', 'สิบ สิบ', 'ECT-T31', 2554, 'สมชาย ส่องช่วย', '10@bk.com', '66', 1, '2011-05-05'),
(12, '15', 'MTIzNA==', 'สิบ ห้า', 'ECT-T31', 2554, 'ชูพันธุ์ รัตนโภคา', '15@15.com', '66', 1, '2011-05-19'),
(13, '20', 'MTIzNA==', 'ยี่สิบ', 'ECT-T31', 2554, 'สมชาย ส่องช่วย', 'kk@cc.com', '66', 1, '2011-05-19'),
(14, '25', 'MTIzNA==', 'ppoo', 'ECT-T31', 2554, 'ชูพันธุ์ รัตนโภคา', 'kk@cc.com', '66', 0, '2011-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `name`, `email`, `phone`, `address`, `reg_date`) VALUES
(1, 'choopan', 'MTIzNA==', 'ชูพันธุ์ รัตนโภคา', 'choopan@kmutnb.ac.th', '66', 'bkk', '2011-05-05'),
(2, 'som', 'MTIzNA==', 'สมชาย ส่องช่วย', 'som@kmutnb.ac.th', '66', 'bkk', '2011-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_random`
--

CREATE TABLE IF NOT EXISTS `teacher_random` (
  `question_id` int(11) NOT NULL,
  `teacher_id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

--
-- Dumping data for table `teacher_random`
--

INSERT INTO `teacher_random` (`question_id`, `teacher_id`) VALUES
(50, 2),
(48, 2),
(47, 2),
(46, 2),
(45, 2),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(48, 1),
(38, 1),
(49, 2),
(46, 1),
(50, 1),
(49, 1),
(47, 1),
(45, 1),
(37, 1),
(21, 1),
(33, 1),
(27, 1),
(39, 1),
(23, 1),
(34, 1),
(40, 1),
(44, 1),
(51, 1),
(53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `time_fix`
--

CREATE TABLE IF NOT EXISTS `time_fix` (
  `fix_id` int(11) NOT NULL AUTO_INCREMENT,
  `fix_sec` varchar(10) NOT NULL,
  `fix_year` varchar(10) NOT NULL,
  `ref_lesson` int(11) NOT NULL,
  `ref_teacher` int(11) NOT NULL,
  `time_finish` date NOT NULL,
  PRIMARY KEY (`fix_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `time_fix`
--

INSERT INTO `time_fix` (`fix_id`, `fix_sec`, `fix_year`, `ref_lesson`, `ref_teacher`, `time_finish`) VALUES
(1, 'ECT-T31', '2554', 1, 1, '2011-05-04'),
(2, 'ECT-X', '2554', 1, 1, '2011-05-31'),
(3, 'ECT-T31', '2554', 2, 1, '2011-05-31');
